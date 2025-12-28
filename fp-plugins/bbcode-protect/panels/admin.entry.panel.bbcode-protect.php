<?php
/**
 * Entry password panel for BBCode Protect plugin
 * Adds password field to entry editor
 */

/**
 * Add password field to entry editor
 */
function plugin_bbcode_protect_entry_form() {
	global $post, $smarty;
	
	$password = '';
	if (isset($post['bbcode_protect_password_plain'])) {
		$password = $post['bbcode_protect_password_plain'];
	}
	
	$lang = lang_load('plugin:bbcode-protect');
	
	$output = '<fieldset id="admin-entry-bbcode-protect" class="bbcode-protect-entry-panel">';
	$output .= '<legend>' . htmlspecialchars($lang['admin']['entry']['bbcode_protect']['legend'], ENT_QUOTES, 'UTF-8') . '</legend>';
	$output .= '<p>' . htmlspecialchars($lang['admin']['entry']['bbcode_protect']['description'], ENT_QUOTES, 'UTF-8') . '</p>';
	$output .= '<p>';
	$output .= '<label for="bbcode_protect_password">' . htmlspecialchars($lang['admin']['entry']['bbcode_protect']['password_label'], ENT_QUOTES, 'UTF-8') . '</label><br>';
	$output .= '<input type="password" name="bbcode_protect_password" id="bbcode_protect_password" value="' . htmlspecialchars($password, ENT_QUOTES, 'UTF-8') . '" autocomplete="new-password">';
	$output .= '</p>';
	$output .= '<p class="bbcode-protect-note">' . htmlspecialchars($lang['admin']['entry']['bbcode_protect']['note'], ENT_QUOTES, 'UTF-8') . '</p>';
	$output .= '</fieldset>';
	
	return $output;
}

/**
 * Save entry password
 */
function plugin_bbcode_protect_entry_save($entry, $id) {
	if (isset($_POST['bbcode_protect_password']) && !empty($_POST['bbcode_protect_password'])) {
		$password = $_POST['bbcode_protect_password'];
		// Hash the password securely
		$entry['bbcode_protect_password'] = password_hash($password, PASSWORD_DEFAULT);
		// Store plain password temporarily for editing (will be cleared on next edit)
		$entry['bbcode_protect_password_plain'] = $password;
	} elseif (isset($_POST['bbcode_protect_password']) && empty($_POST['bbcode_protect_password'])) {
		// Password field was cleared - remove protection
		unset($entry['bbcode_protect_password']);
		unset($entry['bbcode_protect_password_plain']);
	}
	
	return $entry;
}

// Register hooks
add_action('simple_edit_form', 'plugin_bbcode_protect_entry_form');
add_filter('entry_save_pre', 'plugin_bbcode_protect_entry_save', 10, 2);
?>
