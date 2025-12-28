<?php
/**
 * Plugin Name: Content Protection
 * Version: 2.0.1
 * Plugin URI: https://www.flatpress.org
 * Author: FlatPress
 * Author URI: https://www.flatpress.org
 * Description: Password-protect content blocks using HTML comment markers. Supports per-entry passwords and global default passwords. Compatible with Smarty 5.5+.
 */

// Default configuration
if (!defined('PASSWORDPROTECT_DEFAULTS')) {
	define('PASSWORDPROTECT_DEFAULTS', serialize([
		'default_password' => '', // Global default password (hashed)
		'default_password_plain' => '', // For re-editing
		'remember_duration' => 3600, // 1 hour
		'prompt_text' => 'This content is password protected.',
		'max_attempts' => 5,
		'attempt_window' => 300, // 5 minutes
	]));
}

/**
 * Plugin startup - register hooks
 */
function plugin_passwordprotect_startup() {
	// Start session
	if (session_status() === PHP_SESSION_NONE) {
		@session_start();
	}
	
	// Initialize session data
	if (!isset($_SESSION['passwordprotect_unlocked'])) {
		$_SESSION['passwordprotect_unlocked'] = [];
	}
	if (!isset($_SESSION['passwordprotect_attempts'])) {
		$_SESSION['passwordprotect_attempts'] = [];
	}
	
	// Handle password submissions
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['passwordprotect_submit'])) {
		plugin_passwordprotect_handle_submission();
	}
	
	// Add content filter
	add_filter('the_content', 'plugin_passwordprotect_process', 10);
	
	// Clean old attempts
	plugin_passwordprotect_cleanup_attempts();
}

/**
 * Add CSS to head
 */
function plugin_passwordprotect_head() {
	$url = plugin_geturl('passwordprotect');
	echo '<link rel="stylesheet" href="' . htmlspecialchars($url) . 'res/passwordprotect.css?v=2.0">' . "\n";
	
	// Optional JS enhancement
	if (function_exists('plugin_jquery_head')) {
		echo '<script src="' . htmlspecialchars($url) . 'res/passwordprotect.js?v=2.0" defer></script>' . "\n";
	}
}

/**
 * Get plugin configuration
 */
function plugin_passwordprotect_config() {
	$config = plugin_getoptions('passwordprotect');
	if (!is_array($config)) {
		$config = unserialize(PASSWORDPROTECT_DEFAULTS);
	}
	return $config;
}

/**
 * Process content and replace protection markers
 */
function plugin_passwordprotect_process($content) {
	global $entry;
	
	// Skip feeds - strip protected content
	if (isset($_GET['x']) && strpos($_GET['x'], 'feed') !== false) {
		return preg_replace('/<!--\s*protect\s*-->(.*?)<!--\s*\/protect\s*-->/is', 
			'<p><em>[Protected content - visit website to view]</em></p>', $content);
	}
	
	// Get entry ID for this content
	$entry_id = '';
	if (isset($entry['id'])) {
		$entry_id = $entry['id'];
	} elseif (isset($GLOBALS['entry']['id'])) {
		$entry_id = $GLOBALS['entry']['id'];
	}
	
	// Process protection markers
	$block_num = 0;
	$content = preg_replace_callback(
		'/<!--\s*protect\s*-->(.*?)<!--\s*\/protect\s*-->/is',
		function($matches) use ($entry_id, &$block_num) {
			$block_num++;
			$protected_content = $matches[1];
			$block_id = md5($entry_id . '_' . $block_num);
			
			// Check if already unlocked
			if (plugin_passwordprotect_is_unlocked($block_id)) {
				return $protected_content;
			}
			
			// Show password form
			return plugin_passwordprotect_render_form($block_id, $entry_id);
		},
		$content
	);
	
	return $content;
}

/**
 * Check if a block is unlocked
 */
function plugin_passwordprotect_is_unlocked($block_id) {
	if (!isset($_SESSION['passwordprotect_unlocked'][$block_id])) {
		return false;
	}
	
	$unlock_data = $_SESSION['passwordprotect_unlocked'][$block_id];
	
	// Check expiration
	if (isset($unlock_data['expires']) && time() > $unlock_data['expires']) {
		unset($_SESSION['passwordprotect_unlocked'][$block_id]);
		return false;
	}
	
	// Verify token signature
	if (!plugin_passwordprotect_verify_token($unlock_data)) {
		unset($_SESSION['passwordprotect_unlocked'][$block_id]);
		return false;
	}
	
	return true;
}

/**
 * Render password form
 */
function plugin_passwordprotect_render_form($block_id, $entry_id) {
	global $lang;
	
	$config = plugin_passwordprotect_config();
	$prompt = htmlspecialchars($config['prompt_text'], ENT_QUOTES, 'UTF-8');
	
	// Check for rate limiting
	$rate_limited = plugin_passwordprotect_is_rate_limited($block_id);
	
	// Check for error message
	$error = '';
	if (isset($_SESSION['passwordprotect_error']) && $_SESSION['passwordprotect_error']['block'] === $block_id) {
		$error = $_SESSION['passwordprotect_error']['message'];
		unset($_SESSION['passwordprotect_error']);
	}
	
	$form = '<div class="passwordprotect-container" id="passwordprotect-' . $block_id . '">';
	$form .= '<div class="passwordprotect-box">';
	$form .= '<p class="passwordprotect-prompt">' . $prompt . '</p>';
	
	if ($error) {
		$form .= '<p class="passwordprotect-error">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
	}
	
	if ($rate_limited) {
		$lang_msg = isset($lang['plugin']['passwordprotect']['rate_limited']) ? 
			$lang['plugin']['passwordprotect']['rate_limited'] : 
			'Too many failed attempts. Please try again later.';
		$form .= '<p class="passwordprotect-error">' . htmlspecialchars($lang_msg, ENT_QUOTES, 'UTF-8') . '</p>';
	} else {
		$form .= '<form method="post" action="" class="passwordprotect-form">';
		$form .= '<input type="hidden" name="passwordprotect_block" value="' . htmlspecialchars($block_id, ENT_QUOTES, 'UTF-8') . '">';
		$form .= '<input type="hidden" name="passwordprotect_entry" value="' . htmlspecialchars($entry_id, ENT_QUOTES, 'UTF-8') . '">';
		
		$lang_password = isset($lang['plugin']['passwordprotect']['password_label']) ? 
			$lang['plugin']['passwordprotect']['password_label'] : 'Password:';
		$form .= '<label for="passwordprotect-pwd-' . $block_id . '">' . htmlspecialchars($lang_password, ENT_QUOTES, 'UTF-8') . '</label>';
		$form .= '<input type="password" id="passwordprotect-pwd-' . $block_id . '" name="passwordprotect_password" required maxlength="1000" autocomplete="off">';
		
		$lang_submit = isset($lang['plugin']['passwordprotect']['submit_button']) ? 
			$lang['plugin']['passwordprotect']['submit_button'] : 'Submit';
		$form .= '<button type="submit" name="passwordprotect_submit" class="passwordprotect-submit">' . htmlspecialchars($lang_submit, ENT_QUOTES, 'UTF-8') . '</button>';
		$form .= '</form>';
	}
	
	$form .= '</div></div>';
	
	return $form;
}

/**
 * Handle password submission
 */
function plugin_passwordprotect_handle_submission() {
	if (!isset($_POST['passwordprotect_block']) || !isset($_POST['passwordprotect_password'])) {
		return;
	}
	
	$block_id = $_POST['passwordprotect_block'];
	$entry_id = isset($_POST['passwordprotect_entry']) ? $_POST['passwordprotect_entry'] : '';
	$password = $_POST['passwordprotect_password'];
	
	// Sanitize input
	$password = substr(str_replace("\0", '', $password), 0, 1000);
	
	// Check rate limiting
	if (plugin_passwordprotect_is_rate_limited($block_id)) {
		$_SESSION['passwordprotect_error'] = [
			'block' => $block_id,
			'message' => 'Too many failed attempts. Please try again later.'
		];
		return;
	}
	
	// Get the correct password hash
	$password_hash = plugin_passwordprotect_get_password_hash($entry_id);
	
	if (!$password_hash) {
		$_SESSION['passwordprotect_error'] = [
			'block' => $block_id,
			'message' => 'No password has been set for this content.'
		];
		return;
	}
	
	// Verify password
	if (password_verify($password, $password_hash)) {
		// Password correct - unlock block
		$config = plugin_passwordprotect_config();
		$expires = time() + (int)$config['remember_duration'];
		
		$_SESSION['passwordprotect_unlocked'][$block_id] = [
			'block' => $block_id,
			'expires' => $expires,
			'token' => plugin_passwordprotect_generate_token($block_id, $expires)
		];
		
		// Redirect to show unlocked content
		$redirect_url = $_SERVER['REQUEST_URI'];
		if (strpos($redirect_url, '#') === false) {
			$redirect_url .= '#passwordprotect-' . $block_id;
		}
		header('Location: ' . $redirect_url);
		exit;
	} else {
		// Wrong password - record attempt
		plugin_passwordprotect_record_attempt($block_id);
		
		$_SESSION['passwordprotect_error'] = [
			'block' => $block_id,
			'message' => 'Incorrect password. Please try again.'
		];
	}
}

/**
 * Get password hash for entry
 */
function plugin_passwordprotect_get_password_hash($entry_id) {
	// Try per-entry password first
	if ($entry_id) {
		$entry_password = entry_getattrib($entry_id, 'passwordprotect_password');
		if ($entry_password) {
			return $entry_password;
		}
	}
	
	// Fall back to global default password
	$config = plugin_passwordprotect_config();
	if (!empty($config['default_password'])) {
		return $config['default_password'];
	}
	
	return null;
}

/**
 * Record failed attempt
 */
function plugin_passwordprotect_record_attempt($block_id) {
	if (!isset($_SESSION['passwordprotect_attempts'][$block_id])) {
		$_SESSION['passwordprotect_attempts'][$block_id] = [];
	}
	
	$_SESSION['passwordprotect_attempts'][$block_id][] = time();
}

/**
 * Check if rate limited
 */
function plugin_passwordprotect_is_rate_limited($block_id) {
	if (!isset($_SESSION['passwordprotect_attempts'][$block_id])) {
		return false;
	}
	
	$config = plugin_passwordprotect_config();
	$max_attempts = (int)$config['max_attempts'];
	$window = (int)$config['attempt_window'];
	$now = time();
	
	// Count recent attempts
	$recent_attempts = array_filter(
		$_SESSION['passwordprotect_attempts'][$block_id],
		function($timestamp) use ($now, $window) {
			return ($now - $timestamp) < $window;
		}
	);
	
	return count($recent_attempts) >= $max_attempts;
}

/**
 * Clean up old attempts
 */
function plugin_passwordprotect_cleanup_attempts() {
	if (!isset($_SESSION['passwordprotect_attempts'])) {
		return;
	}
	
	$config = plugin_passwordprotect_config();
	$window = (int)$config['attempt_window'];
	$now = time();
	
	foreach ($_SESSION['passwordprotect_attempts'] as $block_id => $attempts) {
		$_SESSION['passwordprotect_attempts'][$block_id] = array_filter(
			$attempts,
			function($timestamp) use ($now, $window) {
				return ($now - $timestamp) < $window;
			}
		);
		
		if (empty($_SESSION['passwordprotect_attempts'][$block_id])) {
			unset($_SESSION['passwordprotect_attempts'][$block_id]);
		}
	}
}

/**
 * Generate signed token
 */
function plugin_passwordprotect_generate_token($block_id, $expires) {
	$data = $block_id . '|' . $expires;
	$key = defined('AUTH_KEY') ? AUTH_KEY : 'fallback-key';
	return hash_hmac('sha256', $data, $key);
}

/**
 * Verify signed token
 */
function plugin_passwordprotect_verify_token($unlock_data) {
	if (!isset($unlock_data['block']) || !isset($unlock_data['expires']) || !isset($unlock_data['token'])) {
		return false;
	}
	
	$expected_token = plugin_passwordprotect_generate_token($unlock_data['block'], $unlock_data['expires']);
	return hash_equals($expected_token, $unlock_data['token']);
}

// Register startup hook
add_action('init', 'plugin_passwordprotect_startup', 1);
add_action('wp_head', 'plugin_passwordprotect_head');
add_action('admin_head', 'plugin_passwordprotect_head');

// Load admin panels
if (defined('ADMIN_PANEL')) {
	@include_once(dirname(__FILE__) . '/panels/admin.plugin.panel.passwordprotect.php');
	@include_once(dirname(__FILE__) . '/panels/admin.entry.panel.passwordprotect.php');
}
