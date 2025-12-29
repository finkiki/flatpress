<?php
/**
 * Plugin Name: Announcement Bar
 * Version: 1.0.0
 * Plugin URI: https://www.flatpress.org
 * Author: FlatPress
 * Author URI: https://www.flatpress.org
 * Description: Displays a configurable sticky top notification/announcement bar with scheduling, visibility rules, and dismissible options. <a href="./admin.php?p=plugin&action=announcementbar">Configure</a>
 */

// Prevent direct access
defined('FP_CONTENT') or exit;

/**
 * Plugin setup check.
 *
 * @return int 1 if setup is ok, negative if there's an error
 */
function plugin_announcementbar_setup() {
	return 1;
}

/**
 * Returns the AnnouncementBar language array, cached per request.
 *
 * @return array
 */
function plugin_announcementbar_getlang() {
	static $cache = null;
	if (is_array($cache)) {
		return $cache;
	}
	$cache = lang_load('plugin:announcementbar');
	return is_array($cache) ? $cache : array();
}

/**
 * Normalize a language value to a scalar string.
 *
 * @param mixed  $value
 * @param string $default
 * @return string
 */
function plugin_announcementbar_langval($value, $default = '') {
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
 * Get plugin options.
 *
 * @return array
 */
function plugin_announcementbar_getoptions() {
	$defaults = array(
		'enabled' => false,
		'content' => '',
		'visibility_mode' => 'all', // all, include, exclude
		'visibility_patterns' => '',
		'dismissible' => false,
		'dismiss_version' => '1',
		'schedule_enabled' => false,
		'schedule_start' => '',
		'schedule_end' => '',
		'bg_color' => '#0066cc',
		'text_color' => '#ffffff',
		'height' => 'auto',
		'font_size' => '14',
		'padding' => '12'
	);
	
	$options = plugin_getoptions('announcementbar');
	return is_array($options) ? array_merge($defaults, $options) : $defaults;
}

/**
 * Check if announcement bar should be displayed based on visibility rules.
 *
 * @param array $options
 * @return bool
 */
function plugin_announcementbar_check_visibility($options) {
	if (!isset($options['visibility_mode'])) {
		return true;
	}
	
	$mode = $options['visibility_mode'];
	
	// Show on all pages
	if ($mode === 'all') {
		return true;
	}
	
	// Get current path
	$current_path = $_SERVER['REQUEST_URI'] ?? '';
	$patterns = isset($options['visibility_patterns']) ? $options['visibility_patterns'] : '';
	
	if (empty($patterns)) {
		return $mode === 'all';
	}
	
	// Split patterns by newline
	$pattern_list = array_filter(array_map('trim', explode("\n", $patterns)));
	
	foreach ($pattern_list as $pattern) {
		// Simple wildcard matching
		$regex_pattern = str_replace('*', '.*', preg_quote($pattern, '/'));
		if (preg_match('/^' . $regex_pattern . '$/i', $current_path)) {
			// Pattern matched
			return $mode === 'include';
		}
	}
	
	// No pattern matched
	return $mode === 'exclude';
}

/**
 * Check if announcement bar should be displayed based on schedule.
 *
 * @param array $options
 * @return bool
 */
function plugin_announcementbar_check_schedule($options) {
	if (empty($options['schedule_enabled'])) {
		return true;
	}
	
	$now = time();
	
	// Check start time
	if (!empty($options['schedule_start'])) {
		$start = strtotime($options['schedule_start']);
		if ($start !== false && $now < $start) {
			return false;
		}
	}
	
	// Check end time
	if (!empty($options['schedule_end'])) {
		$end = strtotime($options['schedule_end']);
		if ($end !== false && $now > $end) {
			return false;
		}
	}
	
	return true;
}

/**
 * Render BBCode and HTML safely.
 *
 * @param string $content
 * @return string
 */
function plugin_announcementbar_render_content($content) {
	if (empty($content)) {
		return '';
	}
	
	// Content is stored as-is from admin, so we need to sanitize it
	// Apply wp_specialchars if available (standard FlatPress sanitization)
	if (function_exists('wp_specialchars')) {
		$safe_content = wp_specialchars($content);
	} else {
		// Fallback to basic HTML escaping
		$safe_content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
	}
	
	// Apply BBCode filter if available
	if (function_exists('BBCode')) {
		$safe_content = BBCode($safe_content);
	}
	
	return $safe_content;
}

/**
 * Add CSS to head.
 */
function plugin_announcementbar_head() {
	$options = plugin_announcementbar_getoptions();
	
	// Check if enabled
	if (empty($options['enabled'])) {
		return;
	}
	
	// Check visibility
	if (!plugin_announcementbar_check_visibility($options)) {
		return;
	}
	
	// Check schedule
	if (!plugin_announcementbar_check_schedule($options)) {
		return;
	}
	
	$pdir = plugin_geturl('announcementbar');
	$random_hex = RANDOM_HEX;
	$css = utils_asset_ver($pdir . 'res/announcementbar.css', SYSTEM_VER);
	$js = utils_asset_ver($pdir . 'res/announcementbar.js', SYSTEM_VER);
	
	echo '
	<!-- BOF AnnouncementBar -->
	<link rel="stylesheet" type="text/css" href="' . $css . '">
	<script nonce="' . $random_hex . '" src="' . $js . '" defer></script>
	<!-- EOF AnnouncementBar -->
';
}

add_action('wp_head', 'plugin_announcementbar_head', 0);

/**
 * Add announcement bar HTML to footer.
 */
function plugin_announcementbar_footer() {
	$options = plugin_announcementbar_getoptions();
	
	// Check if enabled
	if (empty($options['enabled'])) {
		return;
	}
	
	// Check visibility
	if (!plugin_announcementbar_check_visibility($options)) {
		return;
	}
	
	// Check schedule
	if (!plugin_announcementbar_check_schedule($options)) {
		return;
	}
	
	// Get content
	$content = isset($options['content']) ? $options['content'] : '';
	if (empty($content)) {
		return;
	}
	
	// Render content
	$rendered_content = plugin_announcementbar_render_content($content);
	
	// Get styling options
	$bg_color = isset($options['bg_color']) ? $options['bg_color'] : '#0066cc';
	$text_color = isset($options['text_color']) ? $options['text_color'] : '#ffffff';
	$height = isset($options['height']) ? $options['height'] : 'auto';
	$font_size = isset($options['font_size']) ? $options['font_size'] : '14';
	$padding = isset($options['padding']) ? $options['padding'] : '12';
	$dismissible = !empty($options['dismissible']);
	$dismiss_version = isset($options['dismiss_version']) ? $options['dismiss_version'] : '1';
	
	$random_hex = RANDOM_HEX;
	
	$lang = plugin_announcementbar_getlang();
	$close_label = plugin_announcementbar_langval($lang ['plugin'] ['announcementbar'] ['close'] ?? 'Close', 'Close');
	
	// Build inline styles
	$inline_style = "background-color: {$bg_color}; color: {$text_color}; font-size: {$font_size}px; padding: {$padding}px;";
	if ($height !== 'auto') {
		$inline_style .= " min-height: {$height}px;";
	}
	
	echo '
	<!-- BOF AnnouncementBar HTML -->
	<div id="announcement_bar" 
		 class="announcement-bar' . ($dismissible ? ' announcement-bar-dismissible' : '') . '" 
		 style="' . htmlspecialchars($inline_style, ENT_QUOTES, 'UTF-8') . '"
		 data-dismiss-version="' . htmlspecialchars($dismiss_version, ENT_QUOTES, 'UTF-8') . '"
		 role="banner"
		 aria-label="Announcement">
		<div class="announcement-bar-content">
			' . $rendered_content . '
		</div>';
	
	if ($dismissible) {
		echo '
		<button class="announcement-bar-close" 
				aria-label="' . htmlspecialchars($close_label, ENT_QUOTES, 'UTF-8') . '"
				title="' . htmlspecialchars($close_label, ENT_QUOTES, 'UTF-8') . '">
			<span aria-hidden="true">&times;</span>
		</button>';
	}
	
	echo '
	</div>
	
	<script nonce="' . $random_hex . '">
		// Initialize announcement bar
		if (typeof jQuery !== "undefined" && typeof AnnouncementBar !== "undefined") {
			jQuery(document).ready(function($) {
				AnnouncementBar.init({
					dismissible: ' . ($dismissible ? 'true' : 'false') . ',
					version: "' . htmlspecialchars($dismiss_version, ENT_QUOTES, 'UTF-8') . '"
				});
			});
		}
	</script>
	<!-- EOF AnnouncementBar HTML -->
';
}

add_action('wp_footer', 'plugin_announcementbar_footer', 0);

// Load admin panel if in admin context
if (class_exists('AdminPanelAction')) {
	require_once(plugin_getdir('announcementbar') . 'panels/admin.plugin.panel.announcementbar.php');
}
?>
