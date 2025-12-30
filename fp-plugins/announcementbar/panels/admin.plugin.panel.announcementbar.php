<?php
/**
 * Admin panel for Announcement Bar plugin.
 */

if (!class_exists('AdminPanelAction')) {
	die('Don\'t try to hack us.');
}

class admin_plugin_announcementbar extends AdminPanelAction {
	
	var $langres = 'plugin:announcementbar';
	
	/**
	 * Initializes this panel.
	 */
	function setup() {
		$this->smarty->assign('admin_resource', 'plugin:announcementbar/admin.plugin.announcementbar');
		$this->smarty->assign('plugin_url', plugin_geturl('announcementbar'));
		
		add_filter('wp_title', array(&$this, '_title'), 15, 2);
		add_action('wp_head', array(&$this, '_head'), 10);
	}
	
	/**
	 * Set page title.
	 */
	function _title($val, $sep) {
		return $val . " " . $sep . " Announcement Bar";
	}
	
	/**
	 * Add admin head scripts/styles.
	 */
	function _head() {
		if (!function_exists('plugin_jquery_head')) {
			return;
		}
		
		$pdir = plugin_geturl('announcementbar');
		$random_hex = RANDOM_HEX;
		
		// Add jQuery UI for date picker if needed
		echo '
		<style nonce="' . $random_hex . '">
			.announcement-preview {
				margin: 15px 0;
				padding: 12px;
				border-radius: 4px;
				text-align: center;
			}
			.form-group {
				margin-bottom: 15px;
			}
			.form-group label {
				display: block;
				margin-bottom: 5px;
				font-weight: bold;
			}
			.form-group input[type="text"],
			.form-group input[type="number"],
			.form-group input[type="datetime-local"],
			.form-group textarea,
			.form-group select {
				width: 100%;
				max-width: 600px;
				padding: 8px;
				border: 1px solid #ccc;
				border-radius: 4px;
			}
			.form-group textarea {
				min-height: 100px;
				font-family: monospace;
			}
			.form-group input[type="color"] {
				width: 100px;
				height: 40px;
				border: 1px solid #ccc;
				border-radius: 4px;
				cursor: pointer;
			}
			.form-group .help-text {
				font-size: 0.9em;
				color: #666;
				margin-top: 5px;
			}
			.inline-fields {
				display: flex;
				gap: 15px;
				align-items: center;
			}
			.inline-fields > div {
				flex: 1;
			}
			.fieldset-group {
				border: 1px solid #ddd;
				padding: 15px;
				margin-bottom: 15px;
				border-radius: 4px;
			}
			.fieldset-group legend {
				padding: 0 10px;
				font-weight: bold;
			}
		</style>
		';
	}
	
	/**
	 * Main panel view.
	 */
	function main() {
		$options = plugin_announcementbar_getoptions();
		$this->smarty->assign('options', $options);
	}
	
	/**
	 * Handle form submission.
	 */
	function onsubmit($data = null) {
		if (!isset($_POST['announcement-conf'])) {
			$this->smarty->assign('success', -1);
			// Reload options for display
			$options = plugin_announcementbar_getoptions();
			$this->smarty->assign('options', $options);
			return 0;
		}
		
		// Sanitize and save options
		$options = array();
		
		// Enabled
		$options['enabled'] = isset($_POST['enabled']);
		
		// Content (stored as-is, sanitized on render)
		$options['content'] = isset($_POST['content']) ? $_POST['content'] : '';
		
		// Visibility
		$visibility_mode = isset($_POST['visibility_mode']) ? $_POST['visibility_mode'] : 'all';
		$options['visibility_mode'] = in_array($visibility_mode, array('all', 'include', 'exclude')) ? $visibility_mode : 'all';
		$options['visibility_patterns'] = isset($_POST['visibility_patterns']) ? $_POST['visibility_patterns'] : '';
		
		// Dismissible
		$options['dismissible'] = isset($_POST['dismissible']);
		
		// Schedule
		$options['schedule_enabled'] = isset($_POST['schedule_enabled']);
		$options['schedule_start'] = isset($_POST['schedule_start']) ? sanitize_text_field($_POST['schedule_start']) : '';
		$options['schedule_end'] = isset($_POST['schedule_end']) ? sanitize_text_field($_POST['schedule_end']) : '';
		
		// Styling
		$options['bg_color'] = isset($_POST['bg_color']) ? sanitize_text_field($_POST['bg_color']) : '#0066cc';
		$options['text_color'] = isset($_POST['text_color']) ? sanitize_text_field($_POST['text_color']) : '#ffffff';
		$options['height'] = isset($_POST['height']) ? sanitize_text_field($_POST['height']) : 'auto';
		$options['font_size'] = isset($_POST['font_size']) && is_numeric($_POST['font_size']) ? intval($_POST['font_size']) : 14;
		$options['padding'] = isset($_POST['padding']) && is_numeric($_POST['padding']) ? intval($_POST['padding']) : 12;
		
		// Save all options
		foreach ($options as $key => $value) {
			plugin_addoption('announcementbar', $key, $value);
		}
		plugin_saveoptions('announcementbar');
		
		$this->smarty->assign('success', 1);
		$this->smarty->assign('options', $options);
		return 0;
	}
}

// Register the admin panel
admin_addpanelaction('plugin', 'announcementbar', true);
?>
