<?php
/**
 * Plugin Name: Content Protection
 * Version: 2.0.0
 * Plugin URI: https://www.flatpress.org
 * Author: FlatPress
 * Author URI: https://www.flatpress.org
 * Description: Password-protect content blocks using HTML comment markers. Supports per-entry passwords and global default passwords. Compatible with Smarty 5.5+.
 */

// Prevent direct access
if (!defined('FLATPRESS')) {
	die('This file cannot be accessed directly.');
}

// Default configuration
if (!defined('BBCODE_PROTECT_DEFAULTS')) {
	define('BBCODE_PROTECT_DEFAULTS', serialize([
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
function plugin_bbcode_protect_startup() {
	// Start session
	if (session_status() === PHP_SESSION_NONE) {
		@session_start();
	}
	
	// Initialize session data
	if (!isset($_SESSION['bbcode_protect_unlocked'])) {
		$_SESSION['bbcode_protect_unlocked'] = [];
	}
	if (!isset($_SESSION['bbcode_protect_attempts'])) {
		$_SESSION['bbcode_protect_attempts'] = [];
	}
	
	// Handle password submissions
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bbcode_protect_submit'])) {
		plugin_bbcode_protect_handle_submission();
	}
	
	// Add content filter
	add_filter('the_content', 'plugin_bbcode_protect_process', 10);
	
	// Clean old attempts
	plugin_bbcode_protect_cleanup_attempts();
}

/**
 * Add CSS to head
 */
function plugin_bbcode_protect_head() {
	$url = plugin_geturl('bbcode-protect');
	echo '<link rel="stylesheet" href="' . htmlspecialchars($url) . 'res/bbcode-protect.css?v=2.0">' . "\n";
	
	// Optional JS enhancement
	if (function_exists('plugin_jquery_head')) {
		echo '<script src="' . htmlspecialchars($url) . 'res/bbcode-protect.js?v=2.0" defer></script>' . "\n";
	}
}

/**
 * Get plugin configuration
 */
function plugin_bbcode_protect_config() {
	$config = plugin_getoptions('bbcode-protect');
	if (!is_array($config)) {
		$config = unserialize(BBCODE_PROTECT_DEFAULTS);
	}
	return $config;
}

/**
 * Process content and replace protection markers
 */
function plugin_bbcode_protect_process($content) {
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
			if (plugin_bbcode_protect_is_unlocked($block_id)) {
				return $protected_content;
			}
			
			// Show password form
			return plugin_bbcode_protect_render_form($block_id, $entry_id);
		},
		$content
	);
	
	return $content;
}

/**
 * Check if a block is unlocked
 */
function plugin_bbcode_protect_is_unlocked($block_id) {
	if (!isset($_SESSION['bbcode_protect_unlocked'][$block_id])) {
		return false;
	}
	
	$unlock_data = $_SESSION['bbcode_protect_unlocked'][$block_id];
	
	// Check expiration
	if (isset($unlock_data['expires']) && time() > $unlock_data['expires']) {
		unset($_SESSION['bbcode_protect_unlocked'][$block_id]);
		return false;
	}
	
	// Verify token signature
	if (!plugin_bbcode_protect_verify_token($unlock_data)) {
		unset($_SESSION['bbcode_protect_unlocked'][$block_id]);
		return false;
	}
	
	return true;
}

/**
 * Render password form
 */
function plugin_bbcode_protect_render_form($block_id, $entry_id) {
	global $lang;
	
	$config = plugin_bbcode_protect_config();
	$prompt = htmlspecialchars($config['prompt_text'], ENT_QUOTES, 'UTF-8');
	
	// Check for rate limiting
	$rate_limited = plugin_bbcode_protect_is_rate_limited($block_id);
	
	// Check for error message
	$error = '';
	if (isset($_SESSION['bbcode_protect_error']) && $_SESSION['bbcode_protect_error']['block'] === $block_id) {
		$error = $_SESSION['bbcode_protect_error']['message'];
		unset($_SESSION['bbcode_protect_error']);
	}
	
	$form = '<div class="bbcode-protect-container" id="bbcode-protect-' . $block_id . '">';
	$form .= '<div class="bbcode-protect-box">';
	$form .= '<p class="bbcode-protect-prompt">' . $prompt . '</p>';
	
	if ($error) {
		$form .= '<p class="bbcode-protect-error">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
	}
	
	if ($rate_limited) {
		$lang_msg = isset($lang['plugin']['bbcode_protect']['rate_limited']) ? 
			$lang['plugin']['bbcode_protect']['rate_limited'] : 
			'Too many failed attempts. Please try again later.';
		$form .= '<p class="bbcode-protect-error">' . htmlspecialchars($lang_msg, ENT_QUOTES, 'UTF-8') . '</p>';
	} else {
		$form .= '<form method="post" action="" class="bbcode-protect-form">';
		$form .= '<input type="hidden" name="bbcode_protect_block" value="' . htmlspecialchars($block_id, ENT_QUOTES, 'UTF-8') . '">';
		$form .= '<input type="hidden" name="bbcode_protect_entry" value="' . htmlspecialchars($entry_id, ENT_QUOTES, 'UTF-8') . '">';
		
		$lang_password = isset($lang['plugin']['bbcode_protect']['password_label']) ? 
			$lang['plugin']['bbcode_protect']['password_label'] : 'Password:';
		$form .= '<label for="bbcode-protect-pwd-' . $block_id . '">' . htmlspecialchars($lang_password, ENT_QUOTES, 'UTF-8') . '</label>';
		$form .= '<input type="password" id="bbcode-protect-pwd-' . $block_id . '" name="bbcode_protect_password" required maxlength="1000" autocomplete="off">';
		
		$lang_submit = isset($lang['plugin']['bbcode_protect']['submit_button']) ? 
			$lang['plugin']['bbcode_protect']['submit_button'] : 'Submit';
		$form .= '<button type="submit" name="bbcode_protect_submit" class="bbcode-protect-submit">' . htmlspecialchars($lang_submit, ENT_QUOTES, 'UTF-8') . '</button>';
		$form .= '</form>';
	}
	
	$form .= '</div></div>';
	
	return $form;
}

/**
 * Handle password submission
 */
function plugin_bbcode_protect_handle_submission() {
	if (!isset($_POST['bbcode_protect_block']) || !isset($_POST['bbcode_protect_password'])) {
		return;
	}
	
	$block_id = $_POST['bbcode_protect_block'];
	$entry_id = isset($_POST['bbcode_protect_entry']) ? $_POST['bbcode_protect_entry'] : '';
	$password = $_POST['bbcode_protect_password'];
	
	// Sanitize input
	$password = substr(str_replace("\0", '', $password), 0, 1000);
	
	// Check rate limiting
	if (plugin_bbcode_protect_is_rate_limited($block_id)) {
		$_SESSION['bbcode_protect_error'] = [
			'block' => $block_id,
			'message' => 'Too many failed attempts. Please try again later.'
		];
		return;
	}
	
	// Get the correct password hash
	$password_hash = plugin_bbcode_protect_get_password_hash($entry_id);
	
	if (!$password_hash) {
		$_SESSION['bbcode_protect_error'] = [
			'block' => $block_id,
			'message' => 'No password has been set for this content.'
		];
		return;
	}
	
	// Verify password
	if (password_verify($password, $password_hash)) {
		// Password correct - unlock block
		$config = plugin_bbcode_protect_config();
		$expires = time() + (int)$config['remember_duration'];
		
		$_SESSION['bbcode_protect_unlocked'][$block_id] = [
			'block' => $block_id,
			'expires' => $expires,
			'token' => plugin_bbcode_protect_generate_token($block_id, $expires)
		];
		
		// Redirect to show unlocked content
		$redirect_url = $_SERVER['REQUEST_URI'];
		if (strpos($redirect_url, '#') === false) {
			$redirect_url .= '#bbcode-protect-' . $block_id;
		}
		header('Location: ' . $redirect_url);
		exit;
	} else {
		// Wrong password - record attempt
		plugin_bbcode_protect_record_attempt($block_id);
		
		$_SESSION['bbcode_protect_error'] = [
			'block' => $block_id,
			'message' => 'Incorrect password. Please try again.'
		];
	}
}

/**
 * Get password hash for entry
 */
function plugin_bbcode_protect_get_password_hash($entry_id) {
	// Try per-entry password first
	if ($entry_id) {
		$entry_password = entry_getattrib($entry_id, 'bbcode_protect_password');
		if ($entry_password) {
			return $entry_password;
		}
	}
	
	// Fall back to global default password
	$config = plugin_bbcode_protect_config();
	if (!empty($config['default_password'])) {
		return $config['default_password'];
	}
	
	return null;
}

/**
 * Record failed attempt
 */
function plugin_bbcode_protect_record_attempt($block_id) {
	if (!isset($_SESSION['bbcode_protect_attempts'][$block_id])) {
		$_SESSION['bbcode_protect_attempts'][$block_id] = [];
	}
	
	$_SESSION['bbcode_protect_attempts'][$block_id][] = time();
}

/**
 * Check if rate limited
 */
function plugin_bbcode_protect_is_rate_limited($block_id) {
	if (!isset($_SESSION['bbcode_protect_attempts'][$block_id])) {
		return false;
	}
	
	$config = plugin_bbcode_protect_config();
	$max_attempts = (int)$config['max_attempts'];
	$window = (int)$config['attempt_window'];
	$now = time();
	
	// Count recent attempts
	$recent_attempts = array_filter(
		$_SESSION['bbcode_protect_attempts'][$block_id],
		function($timestamp) use ($now, $window) {
			return ($now - $timestamp) < $window;
		}
	);
	
	return count($recent_attempts) >= $max_attempts;
}

/**
 * Clean up old attempts
 */
function plugin_bbcode_protect_cleanup_attempts() {
	if (!isset($_SESSION['bbcode_protect_attempts'])) {
		return;
	}
	
	$config = plugin_bbcode_protect_config();
	$window = (int)$config['attempt_window'];
	$now = time();
	
	foreach ($_SESSION['bbcode_protect_attempts'] as $block_id => $attempts) {
		$_SESSION['bbcode_protect_attempts'][$block_id] = array_filter(
			$attempts,
			function($timestamp) use ($now, $window) {
				return ($now - $timestamp) < $window;
			}
		);
		
		if (empty($_SESSION['bbcode_protect_attempts'][$block_id])) {
			unset($_SESSION['bbcode_protect_attempts'][$block_id]);
		}
	}
}

/**
 * Generate signed token
 */
function plugin_bbcode_protect_generate_token($block_id, $expires) {
	$data = $block_id . '|' . $expires;
	$key = defined('AUTH_KEY') ? AUTH_KEY : 'fallback-key';
	return hash_hmac('sha256', $data, $key);
}

/**
 * Verify signed token
 */
function plugin_bbcode_protect_verify_token($unlock_data) {
	if (!isset($unlock_data['block']) || !isset($unlock_data['expires']) || !isset($unlock_data['token'])) {
		return false;
	}
	
	$expected_token = plugin_bbcode_protect_generate_token($unlock_data['block'], $unlock_data['expires']);
	return hash_equals($expected_token, $unlock_data['token']);
}

// Register startup hook
add_action('init', 'plugin_bbcode_protect_startup', 1);
add_action('wp_head', 'plugin_bbcode_protect_head');
add_action('admin_head', 'plugin_bbcode_protect_head');

// Load admin panels
if (defined('ADMIN_PANEL')) {
	@include_once(dirname(__FILE__) . '/panels/admin.plugin.panel.bbcode-protect.php');
	@include_once(dirname(__FILE__) . '/panels/admin.entry.panel.bbcode-protect.php');
}
