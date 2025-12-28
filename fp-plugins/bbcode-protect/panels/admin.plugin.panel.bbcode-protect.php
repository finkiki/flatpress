<?php
/**
 * Admin panel for BBCode Protect plugin configuration
 */

class admin_config_bbcode_protect extends AdminPanelAction {
	
	var $lang = 'plugin:bbcode-protect';
	
	function setup() {
		global $lang;
		$lang = lang_load('plugin:bbcode-protect');
		$this->smarty->assign('admin_resource', 'plugin:bbcode-protect/admin.settings');
	}
	
	function main() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->onsubmit();
		}
		$this->assign_config_to_template();
	}
	
	/**
	 * Assign configuration to template
	 */
	function assign_config_to_template() {
		$options = plugin_bbcode_protect_get_options();
		
		foreach ($options as $key => $value) {
			$this->smarty->assign($key, $value);
		}
		
		// Assign plain password for editing (if it exists)
		if (isset($options['default_password_plain'])) {
			$this->smarty->assign('default_password_plain', $options['default_password_plain']);
		} else {
			$this->smarty->assign('default_password_plain', '');
		}
		
		// Check Smarty version
		$smarty_version = defined('Smarty::SMARTY_VERSION') ? Smarty::SMARTY_VERSION : '0.0.0';
		$this->smarty->assign('smarty_version', $smarty_version);
		$this->smarty->assign('smarty_ok', BBCODE_PROTECT_SMARTY_OK);
	}
	
	/**
	 * Handle form submission
	 */
	function onsubmit($data = null) {
		// Handle default password
		if (isset($_POST['default_password']) && !empty($_POST['default_password'])) {
			$password = $_POST['default_password'];
			// Validate password length
			if (strlen($password) > 1000) {
				$password = substr($password, 0, 1000);
			}
			// Remove null bytes
			$password = str_replace("\0", '', $password);
			// Hash the password securely
			plugin_addoption('bbcode-protect', 'default_password', password_hash($password, PASSWORD_DEFAULT));
			// Store plain password temporarily for editing (will be in config)
			plugin_addoption('bbcode-protect', 'default_password_plain', $password);
		} elseif (isset($_POST['default_password']) && empty($_POST['default_password'])) {
			// Password field was cleared - remove default password
			plugin_addoption('bbcode-protect', 'default_password', '');
			plugin_addoption('bbcode-protect', 'default_password_plain', '');
		}
		
		// Save other settings
		plugin_addoption('bbcode-protect', 'allow_inline_password', isset($_POST['allow_inline_password']));
		plugin_addoption('bbcode-protect', 'remember_duration', max(60, intval($_POST['remember_duration'])));
		plugin_addoption('bbcode-protect', 'prompt_text', sanitize_text_field($_POST['prompt_text']));
		plugin_addoption('bbcode-protect', 'bypass_cache', isset($_POST['bypass_cache']));
		plugin_addoption('bbcode-protect', 'max_attempts', max(1, intval($_POST['max_attempts'])));
		plugin_addoption('bbcode-protect', 'attempt_window', max(60, intval($_POST['attempt_window'])));
		
		plugin_saveoptions('bbcode-protect');
		
		$this->smarty->assign('success', 1);
		$this->assign_config_to_template();
		
		return 0;
	}
}

// Register admin panel
admin_addpanelaction('config', 'bbcode_protect', true);
?>
