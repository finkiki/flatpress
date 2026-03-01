<?php
/**
 * Plugin Name: Entry Password Protection
 * Plugin URI: https://flatpress.org
 * Description: Password-protect individual blog entries and static pages. Allows admins to set per-entry passwords with hashed storage. Protected content remains hidden until correct password is provided.
 * Author: FlatPress
 * Version: 1.0.0
 * Author URI: https://flatpress.org
 */

// Storage directory for password hashes
define('ENTRYPASSWORD_DIR', CONTENT_DIR . 'entrypassword/');

/**
 * Returns the Entry Password Protection language array, cached per request.
 *
 * @return array
 */
function plugin_entrypassword_getlang() {
	static $cache = null;
	if (is_array($cache)) {
		return $cache;
	}
	$cache = lang_load('plugin:entrypassword');
	return is_array($cache) ? $cache : array();
}

/**
 * Normalize a language value to a scalar string.
 *
 * @param mixed  $value
 * @param string $default
 * @return string
 */
function plugin_entrypassword_langval($value, $default = '') {
	while (is_array($value)) {
		if (!$value) {
			return (string)$default;
		}
		$value = reset($value);
	}
	if (is_object($value) && method_exists($value, '__toString')) {
		return (string)$value;
	}
	return is_scalar($value) ? (string)$value : (string)$default;
}

/**
 * Get the password file path for an entry or static page.
 *
 * @param string $id Entry ID or static page ID
 * @param bool $is_static Whether this is a static page
 * @return string
 */
function plugin_entrypassword_get_file($id, $is_static = false) {
	if (!$id) {
		return '';
	}
	$type = $is_static ? 'static' : 'entry';
	return ENTRYPASSWORD_DIR . $type . '_' . $id . '.dat';
}

/**
 * Check if an entry/page has a password set.
 *
 * @param string $id Entry ID or static page ID
 * @param bool $is_static Whether this is a static page
 * @return bool
 */
function plugin_entrypassword_has_password($id, $is_static = false) {
	$file = plugin_entrypassword_get_file($id, $is_static);
	return $file && file_exists($file);
}

/**
 * Save password hash for an entry/page.
 *
 * @param string $id Entry ID or static page ID
 * @param string $password Plain text password
 * @param bool $is_static Whether this is a static page
 * @return bool
 */
function plugin_entrypassword_save_password($id, $password, $is_static = false) {
	if (!$id) {
		return false;
	}
	
	// Create directory if it doesn't exist
	if (!is_dir(ENTRYPASSWORD_DIR)) {
		@mkdir(ENTRYPASSWORD_DIR, 0755, true);
	}
	
	$file = plugin_entrypassword_get_file($id, $is_static);
	
	// If password is empty, remove the file
	if (empty($password)) {
		if (file_exists($file)) {
			return @unlink($file);
		}
		return true;
	}
	
	// Hash the password
	$hash = password_hash($password, PASSWORD_DEFAULT);
	return io_write_file($file, $hash);
}

/**
 * Verify password for an entry/page.
 *
 * @param string $id Entry ID or static page ID
 * @param string $password Plain text password to verify
 * @param bool $is_static Whether this is a static page
 * @return bool
 */
function plugin_entrypassword_verify_password($id, $password, $is_static = false) {
	$file = plugin_entrypassword_get_file($id, $is_static);
	
	if (!file_exists($file)) {
		return false;
	}
	
	$hash = io_load_file($file);
	if (!$hash) {
		return false;
	}
	
	return password_verify($password, trim($hash));
}

/**
 * Check if user has unlocked an entry/page in their session.
 *
 * @param string $id Entry ID or static page ID
 * @param bool $is_static Whether this is a static page
 * @return bool
 */
function plugin_entrypassword_is_unlocked($id, $is_static = false) {
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	
	$type = $is_static ? 'static' : 'entry';
	$key = 'entrypassword_' . $type . '_' . $id;
	
	return isset($_SESSION[$key]) && $_SESSION[$key] === true;
}

/**
 * Mark an entry/page as unlocked in session.
 *
 * @param string $id Entry ID or static page ID
 * @param bool $is_static Whether this is a static page
 */
function plugin_entrypassword_unlock($id, $is_static = false) {
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	
	$type = $is_static ? 'static' : 'entry';
	$key = 'entrypassword_' . $type . '_' . $id;
	$_SESSION[$key] = true;
}

/**
 * Handle password form submission.
 */
function plugin_entrypassword_handle_submission() {
	if (!isset($_POST['entrypassword_submit']) || !isset($_POST['entrypassword_id'])) {
		return;
	}
	
	$id = plugin_entrypassword_sanitize_text_field($_POST['entrypassword_id']);
	$is_static = isset($_POST['entrypassword_static']) && $_POST['entrypassword_static'] === '1';
	$password = isset($_POST['entrypassword_password']) ? $_POST['entrypassword_password'] : '';
	
	// Validate password length to prevent DoS via excessive bcrypt computation
	if (strlen($password) > 255) {
		$password = substr($password, 0, 255);
	}
	
	if (plugin_entrypassword_verify_password($id, $password, $is_static)) {
		plugin_entrypassword_unlock($id, $is_static);
		// Redirect to same page to clear POST data - sanitize URI to prevent header injection
		$redirect_url = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL);
		if ($redirect_url !== false && $redirect_url !== '') {
			header('Location: ' . $redirect_url);
			exit;
		}
	} else {
		// Set error flag for display
		if (session_status() === PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION['entrypassword_error_' . $id] = true;
	}
}

add_action('init', 'plugin_entrypassword_handle_submission', 5);

/**
 * Filter content to show password form if protected.
 *
 * @param string $content
 * @return string
 */
function plugin_entrypassword_filter_content($content) {
	global $fp_params;
	
	// Only filter on single entry or static page view
	if (!is_single() && !isset($fp_params['page'])) {
		return $content;
	}
	
	$is_static = isset($fp_params['page']);
	$id = $is_static ? $fp_params['page'] : $fp_params['entry'];
	
	if (!$id) {
		return $content;
	}
	
	// Check if password protected
	if (!plugin_entrypassword_has_password($id, $is_static)) {
		return $content;
	}
	
	// Check if already unlocked
	if (plugin_entrypassword_is_unlocked($id, $is_static)) {
		return $content;
	}
	
	// Show password form
	$lang = plugin_entrypassword_getlang();
	$strings = isset($lang['plugin']['entrypassword']) ? $lang['plugin']['entrypassword'] : array();
	
	$heading = plugin_entrypassword_langval($strings['heading'] ?? '', 'Protected Content');
	$description = plugin_entrypassword_langval($strings['description'] ?? '', 'This content is password protected. Please enter the password to view.');
	$label = plugin_entrypassword_langval($strings['password_label'] ?? '', 'Password:');
	$button = plugin_entrypassword_langval($strings['submit_button'] ?? '', 'Submit');
	$error_msg = plugin_entrypassword_langval($strings['error_message'] ?? '', 'Incorrect password. Please try again.');
	
	// Check for error
	$show_error = false;
	if (session_status() === PHP_SESSION_NONE) {
		session_start();
	}
	if (isset($_SESSION['entrypassword_error_' . $id])) {
		$show_error = true;
		unset($_SESSION['entrypassword_error_' . $id]);
	}
	
	$error_html = $show_error ? '<p class="entrypassword-error" role="alert">' . htmlspecialchars($error_msg, ENT_QUOTES, 'UTF-8') . '</p>' : '';
	
	$form = '
	<div class="entrypassword-protected" role="main">
		<div class="entrypassword-box">
			<h3 class="entrypassword-heading">' . htmlspecialchars($heading, ENT_QUOTES, 'UTF-8') . '</h3>
			<p class="entrypassword-description">' . htmlspecialchars($description, ENT_QUOTES, 'UTF-8') . '</p>
			' . $error_html . '
			<form method="post" action="" class="entrypassword-form">
				<input type="hidden" name="entrypassword_id" value="' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '">
				<input type="hidden" name="entrypassword_static" value="' . ($is_static ? '1' : '0') . '">
				<div class="entrypassword-field">
					<label for="entrypassword_password_' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($label, ENT_QUOTES, 'UTF-8') . '</label>
					<input 
						type="password" 
						id="entrypassword_password_' . htmlspecialchars($id, ENT_QUOTES, 'UTF-8') . '" 
						name="entrypassword_password" 
						class="entrypassword-input" 
						required 
						aria-required="true"
						autocomplete="off"
						maxlength="255"
					>
				</div>
				<button type="submit" name="entrypassword_submit" class="entrypassword-submit">' . htmlspecialchars($button, ENT_QUOTES, 'UTF-8') . '</button>
			</form>
		</div>
	</div>';
	
	// Set a Smarty variable to signal that this entry is password protected
	// This allows templates to conditionally hide comment blocks
	if (isset($GLOBALS['smarty']) && is_object($GLOBALS['smarty'])) {
		$GLOBALS['smarty']->assign('entrypassword_protected', true);
	}
	
	return $form;
}

add_filter('the_content', 'plugin_entrypassword_filter_content', 5);

/**
 * Filter RSS content to hide protected entries.
 *
 * @param string $content
 * @return string
 */
function plugin_entrypassword_filter_rss_content($content) {
	global $fp_params;
	
	// Check if this is an RSS feed context
	if (!isset($fp_params['feed'])) {
		return $content;
	}
	
	$is_static = isset($fp_params['page']);
	$id = $is_static ? $fp_params['page'] : (isset($fp_params['entry']) ? $fp_params['entry'] : '');
	
	if (!$id) {
		return $content;
	}
	
	// Check if password protected
	if (plugin_entrypassword_has_password($id, $is_static)) {
		$lang = plugin_entrypassword_getlang();
		$strings = isset($lang['plugin']['entrypassword']) ? $lang['plugin']['entrypassword'] : array();
		$protected_msg = plugin_entrypassword_langval($strings['rss_protected'] ?? '', 'This content is password protected.');
		return htmlspecialchars($protected_msg, ENT_QUOTES, 'UTF-8');
	}
	
	return $content;
}

add_filter('the_content_rss', 'plugin_entrypassword_filter_rss_content', 5);

/**
 * Hide comment form for protected entries by setting entry_commslock.
 */
function plugin_entrypassword_hide_comment_form() {
	global $fp_params;
	
	// Only apply on single entry view
	if (!is_single() || !isset($fp_params['entry'])) {
		return;
	}
	
	$id = $fp_params['entry'];
	
	// If password protected and not unlocked, hide comment form
	if (plugin_entrypassword_has_password($id, false) && !plugin_entrypassword_is_unlocked($id, false)) {
		if (isset($GLOBALS['smarty']) && is_object($GLOBALS['smarty'])) {
			$GLOBALS['smarty']->assign('entry_commslock', true);
		}
	}
}

add_action('wp_head', 'plugin_entrypassword_hide_comment_form', 15);

/**
 * Add CSS to head.
 */
function plugin_entrypassword_head() {
	$pdir = plugin_geturl('entrypassword');
	$css = utils_asset_ver($pdir . 'res/entrypassword.css', SYSTEM_VER);
	echo '
	<!-- BOF Entry Password Protection -->
	<link rel="stylesheet" type="text/css" href="' . $css . '">
	<!-- EOF Entry Password Protection -->
';
}

add_action('wp_head', 'plugin_entrypassword_head', 0);

/**
 * Admin panel integration.
 */
if (defined('SYSTEM_VER') && version_compare(SYSTEM_VER, '0.1010', '>=') && defined('MOD_ADMIN_PANEL')) {
	
	class plugin_entrypassword_admin {
		
		/**
		 * Add password field to entry/static editor.
		 */
		function simple() {
			global $fp_config;
			$charset = strtoupper($fp_config['locale']['charset'] ?? 'UTF-8');
			
			// Determine if this is entry or static page
			$is_static = isset($_REQUEST['p']) && $_REQUEST['p'] === 'static';
			
			// Get entry/page ID
			$id = '';
			if (isset($_REQUEST['entry']) && !empty($_REQUEST['entry'])) {
				$id = $_REQUEST['entry'];
			} elseif (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) {
				$id = $_REQUEST['page'];
				$is_static = true;
			} elseif (isset($_REQUEST['timestamp']) && !empty($_REQUEST['timestamp'])) {
				// New entry being created
				$id = bdb_idfromtime(BDB_ENTRY, $_REQUEST['timestamp']);
			}
			
			// Get existing password status (we don't show the password itself)
			$has_password = $id ? plugin_entrypassword_has_password($id, $is_static) : false;
			
			// Get language strings
			$lang = plugin_entrypassword_getlang();
			$strings = isset($lang['admin']['plugin']['entrypassword']) ? $lang['admin']['plugin']['entrypassword'] : array();
			
			$legend = plugin_entrypassword_langval($strings['legend'] ?? '', 'Password Protection');
			$description = plugin_entrypassword_langval($strings['admin_description'] ?? '', 'Set a password to protect this content. Leave empty to remove password protection.');
			$label = plugin_entrypassword_langval($strings['password_label'] ?? '', 'Password (optional):');
			$placeholder = plugin_entrypassword_langval($strings['password_placeholder'] ?? '', 'Enter password to protect this content');
			$status_text = $has_password ? plugin_entrypassword_langval($strings['status_protected'] ?? '', 'Currently protected') : plugin_entrypassword_langval($strings['status_public'] ?? '', 'Currently public');
			
			echo '<fieldset id="plugin_entrypassword">';
			echo '	<legend>' . htmlspecialchars($legend, ENT_QUOTES, $charset) . '</legend>';
			echo '	<p>' . htmlspecialchars($description, ENT_QUOTES, $charset) . '</p>';
			echo '	<div>';
			echo '		<input type="hidden" name="entrypassword_is_static" value="' . ($is_static ? '1' : '0') . '">';
			echo '		<input type="hidden" name="entrypassword_id" value="' . htmlspecialchars($id, ENT_QUOTES, $charset) . '">';
			echo '		<p><label for="entrypassword_field">' . htmlspecialchars($label, ENT_QUOTES, $charset) . '</label>';
			echo '			<input placeholder="' . htmlspecialchars($placeholder, ENT_QUOTES, $charset) . '" class="maxsize" id="entrypassword_field" type="password" name="entrypassword_field" value="" autocomplete="new-password" maxlength="255"><br>';
			echo '			<small><em>' . htmlspecialchars($status_text, ENT_QUOTES, $charset) . '</em></small>';
			echo '		</p>';
			echo '	</div>';
			echo '</fieldset>';
			
			return true;
		}
		
		/**
		 * Save password when entry is saved.
		 */
		function save_entry($id, $arr) {
			if (!isset($_POST['entrypassword_field'])) {
				return;
			}
			
			$password = $_POST['entrypassword_field'];
			
			// Validate password length to prevent DoS via excessive bcrypt computation
			if (strlen($password) > 255) {
				$password = substr($password, 0, 255);
			}
			
			$is_static = isset($_POST['entrypassword_is_static']) && $_POST['entrypassword_is_static'] === '1';
			
			// If we don't have an ID yet, try to get it
			if (empty($id) && isset($_POST['timestamp'])) {
				$id = bdb_idfromtime(BDB_ENTRY, $_POST['timestamp']);
			}
			
			if ($id) {
				plugin_entrypassword_save_password($id, $password, $is_static);
			}
		}
		
		/**
		 * Save password when static page is saved.
		 */
		function save_static($title) {
			if (!isset($_POST['entrypassword_field'])) {
				return $title;
			}
			
			$password = $_POST['entrypassword_field'];
			
			// Validate password length to prevent DoS via excessive bcrypt computation
			if (strlen($password) > 255) {
				$password = substr($password, 0, 255);
			}
			
			$id = isset($_POST['id']) ? $_POST['id'] : '';
			
			if ($id) {
				plugin_entrypassword_save_password($id, $password, true);
			}
			
			return $title;
		}
		
		/**
		 * Register hooks.
		 */
		function __construct() {
			add_filter('simple_metatag_info', array(&$this, 'simple'));
			add_filter('publish_post', array(&$this, 'save_entry'), 10, 2);
			add_filter('title_save_pre', array(&$this, 'save_static'));
		}
	}
	
	new plugin_entrypassword_admin();
}

/**
 * Sanitize text field (internal helper).
 */
if (!function_exists('plugin_entrypassword_sanitize_text_field')) {
	function plugin_entrypassword_sanitize_text_field($str) {
		return htmlspecialchars(strip_tags($str), ENT_QUOTES, 'UTF-8');
	}
}
?>
