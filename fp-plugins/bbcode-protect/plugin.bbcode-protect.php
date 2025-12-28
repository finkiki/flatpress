<?php
/**
 * Plugin Name: BBCode Content Protection
 * Version: 1.0.0
 * Plugin URI: https://www.flatpress.org
 * Author: FlatPress
 * Author URI: https://www.flatpress.org
 * Description: Password-protect content blocks using BBCode [protect]...[/protect]. Supports per-entry passwords and inline passwords. Compatible with Smarty 5.5+.
 */

// Check Smarty version and set compatibility flag
if (!defined('BBCODE_PROTECT_SMARTY_OK')) {
	$smarty_version = defined('Smarty::SMARTY_VERSION') ? Smarty::SMARTY_VERSION : '0.0.0';
	define('BBCODE_PROTECT_SMARTY_OK', version_compare($smarty_version, '5.5.0', '>='));
}

// Default options
define('BBCODE_PROTECT_DEFAULT_OPTIONS', [
	'allow_inline_password' => true,
	'remember_duration' => 3600, // 1 hour default
	'prompt_text' => 'This content is password protected.',
	'bypass_cache' => true,
	'max_attempts' => 5,
	'attempt_window' => 300, // 5 minutes
]);

/**
 * Get plugin options
 * 
 * @return array Plugin configuration options
 */
function plugin_bbcode_protect_get_options() {
	$config = plugin_getoptions('bbcode-protect');
	return array_merge(BBCODE_PROTECT_DEFAULT_OPTIONS, is_array($config) ? $config : []);
}

/**
 * Initialize the plugin
 */
function plugin_bbcode_protect_startup() {
	// Ensure session is started
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	
	// Initialize session storage for unlocked blocks
	if (!isset($_SESSION['bbcode_protect_unlocked'])) {
		$_SESSION['bbcode_protect_unlocked'] = [];
	}
	
	// Initialize failed attempts tracking
	if (!isset($_SESSION['bbcode_protect_attempts'])) {
		$_SESSION['bbcode_protect_attempts'] = [];
	}
	
	// Add BBCode filter to content - run BEFORE standard BBCode plugin (priority 1)
	// Use priority -10 to ensure we run very early, before any BBCode processing
	add_filter('the_content', 'plugin_bbcode_protect_filter', -10);
	add_filter('the_excerpt', 'plugin_bbcode_protect_filter', -10);
	
	// Strip protected content from feeds
	if (function_exists('is_feed') || (isset($_GET['x']) && strpos($_GET['x'], 'feed') !== false)) {
		add_filter('the_content', 'plugin_bbcode_protect_strip_for_feed', 5);
		add_filter('the_excerpt', 'plugin_bbcode_protect_strip_for_feed', 5);
	}
	
	// Handle password submissions
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bbcode_protect_password'])) {
		plugin_bbcode_protect_handle_password();
	}
	
	// Clean up old attempts
	plugin_bbcode_protect_cleanup_attempts();
}

/**
 * Add CSS and JS to page head
 */
function plugin_bbcode_protect_head() {
	$plugindir = plugin_geturl('bbcode-protect');
	$random_hex = defined('RANDOM_HEX') ? RANDOM_HEX : '';
	$css = function_exists('utils_asset_ver') ? 
		utils_asset_ver($plugindir . 'res/bbcode-protect.css', defined('SYSTEM_VER') ? SYSTEM_VER : null) :
		$plugindir . 'res/bbcode-protect.css?v=' . time();
	
	echo '
		<!-- BOF bbcode-protect plugin -->
		<link rel="stylesheet" type="text/css" href="' . htmlspecialchars($css, ENT_QUOTES, 'UTF-8') . '">
	';
	
	// Optional jQuery enhancement
	$options = plugin_bbcode_protect_get_options();
	if (function_exists('plugin_jquery_head')) {
		$js = function_exists('utils_asset_ver') ? 
			utils_asset_ver($plugindir . 'res/bbcode-protect.js', defined('SYSTEM_VER') ? SYSTEM_VER : null) :
			$plugindir . 'res/bbcode-protect.js?v=' . time();
		echo '<script nonce="' . $random_hex . '" src="' . htmlspecialchars($js, ENT_QUOTES, 'UTF-8') . '" defer></script>';
	}
	echo '<!-- EOF bbcode-protect plugin -->';
}

/**
 * Handle password submission
 */
function plugin_bbcode_protect_handle_password() {
	global $post, $fp_params;
	
	if (!isset($_POST['bbcode_protect_block_id']) || !isset($_POST['bbcode_protect_password'])) {
		return;
	}
	
	$block_id = sanitize_text_field($_POST['bbcode_protect_block_id']);
	$password = $_POST['bbcode_protect_password'];
	
	// Validate password input
	if (!is_string($password)) {
		return;
	}
	// Limit password length to prevent DOS attacks
	if (strlen($password) > 1000) {
		$password = substr($password, 0, 1000);
	}
	// Remove null bytes
	$password = str_replace("\0", '', $password);
	
	$entry_id = isset($_POST['bbcode_protect_entry_id']) ? sanitize_text_field($_POST['bbcode_protect_entry_id']) : '';
	$inline_pwd = isset($_POST['bbcode_protect_inline_pwd']) ? $_POST['bbcode_protect_inline_pwd'] : '';
	
	// Check rate limiting
	if (plugin_bbcode_protect_is_rate_limited($block_id)) {
		$_SESSION['bbcode_protect_error'] = 'too_many_attempts';
		$_SESSION['bbcode_protect_error_block'] = $block_id;
		return;
	}
	
	// Get entry password hash if available
	$entry_password_hash = null;
	if (!empty($entry_id)) {
		// Try to load entry data if we don't have it in global $post
		if (isset($post['id']) && $post['id'] === $entry_id && isset($post['bbcode_protect_password'])) {
			$entry_password_hash = $post['bbcode_protect_password'];
		} else {
			// Try to load the entry from database
			// This is a fallback - in most cases $post should be set
			if (function_exists('entry_parse')) {
				$entry_data = entry_parse($entry_id);
				if ($entry_data && isset($entry_data['bbcode_protect_password'])) {
					$entry_password_hash = $entry_data['bbcode_protect_password'];
				}
			}
		}
	}
	
	// Try to verify password
	$verified = false;
	
	// Check inline password first (if provided and allowed)
	$options = plugin_bbcode_protect_get_options();
	if ($inline_pwd && $options['allow_inline_password']) {
		// For inline passwords, we do direct comparison (they're not hashed in BBCode)
		// This is less secure but necessary for BBCode attribute functionality
		$verified = hash_equals($inline_pwd, $password);
	} elseif ($entry_password_hash) {
		// For entry-level passwords, use secure password_verify
		$verified = password_verify($password, $entry_password_hash);
	} elseif (!empty($options['default_password'])) {
		// Try global default password as final fallback
		$verified = password_verify($password, $options['default_password']);
	}
	
	if ($verified) {
		// Create signed token
		$token = plugin_bbcode_protect_create_token($entry_id, $block_id);
		$_SESSION['bbcode_protect_unlocked'][$block_id] = [
			'token' => $token,
			'expires' => time() + $options['remember_duration']
		];
		unset($_SESSION['bbcode_protect_error']);
		unset($_SESSION['bbcode_protect_error_block']);
		
		// Clear attempts for this block
		if (isset($_SESSION['bbcode_protect_attempts'][$block_id])) {
			unset($_SESSION['bbcode_protect_attempts'][$block_id]);
		}
		
		// Redirect to same page to show unlocked content
		// This prevents form resubmission and ensures the content is rendered
		$redirect_url = $_SERVER['REQUEST_URI'];
		// Remove any existing hash and add success indicator
		$redirect_url = preg_replace('/#.*$/', '', $redirect_url);
		header('Location: ' . $redirect_url . '#bbcode_protect_' . $block_id);
		exit;
	} else {
		// Record failed attempt
		plugin_bbcode_protect_record_attempt($block_id);
		$_SESSION['bbcode_protect_error'] = 'wrong_password';
		$_SESSION['bbcode_protect_error_block'] = $block_id;
	}
}

/**
 * Create a signed token for unlocked content
 */
function plugin_bbcode_protect_create_token($entry_id, $block_id) {
	$secret = defined('AUTH_KEY') ? AUTH_KEY : 'flatpress_secret';
	$data = $entry_id . '|' . $block_id . '|' . time();
	return hash_hmac('sha256', $data, $secret);
}

/**
 * Verify a token
 */
function plugin_bbcode_protect_verify_token($token, $entry_id, $block_id) {
	$expected = plugin_bbcode_protect_create_token($entry_id, $block_id);
	return hash_equals($expected, $token);
}

/**
 * Check if block is unlocked
 */
function plugin_bbcode_protect_is_unlocked($block_id) {
	if (!isset($_SESSION['bbcode_protect_unlocked'][$block_id])) {
		return false;
	}
	
	$unlock_data = $_SESSION['bbcode_protect_unlocked'][$block_id];
	
	// Check if expired
	if ($unlock_data['expires'] < time()) {
		unset($_SESSION['bbcode_protect_unlocked'][$block_id]);
		return false;
	}
	
	return true;
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
	$options = plugin_bbcode_protect_get_options();
	if (!isset($_SESSION['bbcode_protect_attempts'][$block_id])) {
		return false;
	}
	
	$attempts = $_SESSION['bbcode_protect_attempts'][$block_id];
	$recent_attempts = array_filter($attempts, function($time) use ($options) {
		return $time > (time() - $options['attempt_window']);
	});
	
	return count($recent_attempts) >= $options['max_attempts'];
}

/**
 * Clean up old attempts
 */
function plugin_bbcode_protect_cleanup_attempts() {
	if (!isset($_SESSION['bbcode_protect_attempts'])) {
		return;
	}
	
	$options = plugin_bbcode_protect_get_options();
	foreach ($_SESSION['bbcode_protect_attempts'] as $block_id => $attempts) {
		$_SESSION['bbcode_protect_attempts'][$block_id] = array_filter($attempts, function($time) use ($options) {
			return $time > (time() - $options['attempt_window']);
		});
		
		if (empty($_SESSION['bbcode_protect_attempts'][$block_id])) {
			unset($_SESSION['bbcode_protect_attempts'][$block_id]);
		}
	}
}

/**
 * Main content filter to handle protected blocks
 */
function plugin_bbcode_protect_filter($content) {
	global $post, $fp_params;
	
	if (empty($content)) {
		return $content;
	}
	
	// Check for protected blocks
	if (strpos($content, '[protect') === false) {
		return $content;
	}
	
	// Try to get entry ID from various sources
	$entry_id = '';
	if (isset($post['id'])) {
		$entry_id = $post['id'];
	} elseif (isset($fp_params['entry'])) {
		$entry_id = $fp_params['entry'];
	}
	
	// Get entry password hash if available
	$entry_password_hash = null;
	if (isset($post['bbcode_protect_password'])) {
		$entry_password_hash = $post['bbcode_protect_password'];
	}
	
	$options = plugin_bbcode_protect_get_options();
	$block_counter = 0;
	
	// Pattern to match [protect]...[/protect] or [protect pwd="..."]...[/protect]
	// More flexible pattern that handles various formats
	$pattern = '/\[protect(?:\s+pwd\s*=\s*["\']([^"\']+)["\'])?\](.*?)\[\/protect\]/is';
	
	$content = preg_replace_callback($pattern, function($matches) use ($entry_id, $entry_password_hash, $options, &$block_counter) {
		$block_counter++;
		$block_id = $entry_id . '_block_' . $block_counter;
		$inline_password = isset($matches[1]) ? $matches[1] : null;
		$protected_content = $matches[2];
		
		// Check if block is unlocked
		if (plugin_bbcode_protect_is_unlocked($block_id)) {
			return $protected_content;
		}
		
		// Check if we have a password (inline, entry-level, or global default)
		$has_password = ($inline_password !== null && $options['allow_inline_password']) 
			|| $entry_password_hash !== null
			|| !empty($options['default_password']);
		
		if (!$has_password) {
			// No password configured anywhere, show content
			return $protected_content;
		}
		
		// Render password form
		return plugin_bbcode_protect_render_form($block_id, $entry_id, $inline_password);
	}, $content);
	
	return $content;
}

/**
 * Strip protected content from feeds
 */
function plugin_bbcode_protect_strip_for_feed($content) {
	if (empty($content)) {
		return $content;
	}
	
	// Replace protected blocks with a message
	$lang = lang_load('plugin:bbcode-protect');
	$replacement = isset($lang['plugin']['bbcode-protect']['feed_replacement']) ? 
		$lang['plugin']['bbcode-protect']['feed_replacement'] : 
		'[This content is password protected]';
	
	$pattern = '/\[protect(?:\s+pwd=["\'][^"\']+["\'])?\].*?\[\/protect\]/is';
	$content = preg_replace($pattern, $replacement, $content);
	
	return $content;
}

/**
 * Render password form
 */
function plugin_bbcode_protect_render_form($block_id, $entry_id, $inline_password = null) {
	global $smarty;
	
	// Load language
	$lang = lang_load('plugin:bbcode-protect');
	
	// Check for Smarty availability
	if (!BBCODE_PROTECT_SMARTY_OK || !isset($smarty)) {
		// Fallback to simple HTML
		return plugin_bbcode_protect_render_form_fallback($block_id, $entry_id, $inline_password, $lang);
	}
	
	try {
		$options = plugin_bbcode_protect_get_options();
		
		// Prepare template variables
		$smarty->assign('block_id', $block_id);
		$smarty->assign('entry_id', $entry_id);
		$smarty->assign('inline_pwd', $inline_password);
		$smarty->assign('prompt_text', $options['prompt_text']);
		
		// Only show error for this specific block
		$error = null;
		if (isset($_SESSION['bbcode_protect_error']) && 
		    isset($_SESSION['bbcode_protect_error_block']) && 
		    $_SESSION['bbcode_protect_error_block'] === $block_id) {
			$error = $_SESSION['bbcode_protect_error'];
			// Clear error after displaying
			unset($_SESSION['bbcode_protect_error']);
			unset($_SESSION['bbcode_protect_error_block']);
		}
		
		$smarty->assign('error', $error);
		$smarty->assign('lang', $lang);
		
		// Check if template exists
		$template_path = plugin_getdir('bbcode-protect') . '/tpls/password-form.tpl';
		if (!file_exists($template_path)) {
			return plugin_bbcode_protect_render_form_fallback($block_id, $entry_id, $inline_password, $lang);
		}
		
		return $smarty->fetch('plugin:bbcode-protect/password-form.tpl');
	} catch (Exception $e) {
		// Fallback on error
		return plugin_bbcode_protect_render_form_fallback($block_id, $entry_id, $inline_password, $lang);
	}
}

/**
 * Fallback form rendering without Smarty
 */
function plugin_bbcode_protect_render_form_fallback($block_id, $entry_id, $inline_password, $lang) {
	$options = plugin_bbcode_protect_get_options();
	$prompt_text = htmlspecialchars($options['prompt_text'], ENT_QUOTES, 'UTF-8');
	$error_msg = '';
	
	// Only show error for this specific block
	if (isset($_SESSION['bbcode_protect_error']) && 
	    isset($_SESSION['bbcode_protect_error_block']) && 
	    $_SESSION['bbcode_protect_error_block'] === $block_id) {
		$error = $_SESSION['bbcode_protect_error'];
		$error_msg = '<p class="bbcode-protect-error">';
		if ($error === 'wrong_password') {
			$error_msg .= isset($lang['plugin']['bbcode_protect']['error_wrong_password']) ? 
				htmlspecialchars($lang['plugin']['bbcode_protect']['error_wrong_password'], ENT_QUOTES, 'UTF-8') : 
				'Incorrect password. Please try again.';
		} elseif ($error === 'too_many_attempts') {
			$error_msg .= isset($lang['plugin']['bbcode_protect']['error_rate_limited']) ? 
				htmlspecialchars($lang['plugin']['bbcode_protect']['error_rate_limited'], ENT_QUOTES, 'UTF-8') : 
				'Too many failed attempts. Please try again later.';
		}
		$error_msg .= '</p>';
		unset($_SESSION['bbcode_protect_error']);
		unset($_SESSION['bbcode_protect_error_block']);
	}
	
	$block_id_escaped = htmlspecialchars($block_id, ENT_QUOTES, 'UTF-8');
	$entry_id_escaped = htmlspecialchars($entry_id, ENT_QUOTES, 'UTF-8');
	$inline_pwd_escaped = $inline_password ? htmlspecialchars($inline_password, ENT_QUOTES, 'UTF-8') : '';
	
	$inline_pwd_field = $inline_password ? 
		'<input type="hidden" name="bbcode_protect_inline_pwd" value="' . $inline_pwd_escaped . '">' : '';
	
	return <<<HTML
<div class="bbcode-protect-container">
	<div class="bbcode-protect-box">
		<p class="bbcode-protect-prompt">{$prompt_text}</p>
		{$error_msg}
		<form method="post" class="bbcode-protect-form" action="">
			<input type="hidden" name="bbcode_protect_block_id" value="{$block_id_escaped}">
			<input type="hidden" name="bbcode_protect_entry_id" value="{$entry_id_escaped}">
			{$inline_pwd_field}
			<div class="bbcode-protect-input-group">
				<label for="password_{$block_id_escaped}">Password:</label>
				<input type="password" 
					   id="password_{$block_id_escaped}" 
					   name="bbcode_protect_password" 
					   required 
					   autocomplete="off"
					   class="bbcode-protect-password-input">
			</div>
			<button type="submit" class="bbcode-protect-submit">Submit</button>
		</form>
	</div>
</div>
HTML;
}

/**
 * Check if current page has protected content (for cache bypass)
 */
function plugin_bbcode_protect_has_protected_content($content) {
	return strpos($content, '[protect') !== false;
}

// Initialize plugin
plugin_bbcode_protect_startup();
add_action('wp_head', 'plugin_bbcode_protect_head');

// Include admin panel if in admin area
if (class_exists('AdminPanelAction')) {
	require_once(plugin_getdir('bbcode-protect') . '/panels/admin.plugin.panel.bbcode-protect.php');
	// Include entry editor panel
	if (file_exists(plugin_getdir('bbcode-protect') . '/panels/admin.entry.panel.bbcode-protect.php')) {
		require_once(plugin_getdir('bbcode-protect') . '/panels/admin.entry.panel.bbcode-protect.php');
	}
}
?>
