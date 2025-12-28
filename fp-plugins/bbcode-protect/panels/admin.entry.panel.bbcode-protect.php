<?php
/**
 * Entry Editor Panel
 */

function plugin_bbcode_protect_entry_head() {
	?>
	<style>
		.bbcode-protect-entry-panel { margin: 15px 0; padding: 15px; background: #f9f9f9; border-left: 4px solid #2271b1; }
		.bbcode-protect-entry-panel label { display: block; font-weight: bold; margin-bottom: 5px; }
		.bbcode-protect-entry-panel input[type="password"] { width: 100%; max-width: 400px; padding: 8px; }
		.bbcode-protect-entry-panel .description { font-size: 0.9em; color: #666; margin-top: 5px; }
	</style>
	<?php
}

function plugin_bbcode_protect_entry_write($entryid, $orig_entryid) {
	global $lang;
	
	// Get existing password if editing
	$entry_password_plain = '';
	if ($entryid) {
		$entry_password_plain = entry_getattrib($entryid, 'bbcode_protect_password_plain');
	}
	
	?>
	<div class="bbcode-protect-entry-panel">
		<h3><?php 
			echo isset($lang['admin']['entry']['bbcode_protect']['title']) ? 
				$lang['admin']['entry']['bbcode_protect']['title'] : 
				'Content Protection'; 
		?></h3>
		
		<label for="bbcode_protect_entry_password"><?php 
			echo isset($lang['admin']['entry']['bbcode_protect']['entry_password']) ? 
				$lang['admin']['entry']['bbcode_protect']['entry_password'] : 
				'Entry Password'; 
		?></label>
		<input type="password" id="bbcode_protect_entry_password" name="bbcode_protect_entry_password" 
			value="<?php echo htmlspecialchars($entry_password_plain, ENT_QUOTES, 'UTF-8'); ?>" 
			autocomplete="new-password">
		<p class="description"><?php 
			echo isset($lang['admin']['entry']['bbcode_protect']['entry_password_desc']) ? 
				$lang['admin']['entry']['bbcode_protect']['entry_password_desc'] : 
				'Password for protected content in this entry. Leave blank to use global default password.'; 
		?></p>
		
		<p class="description"><strong><?php 
			echo isset($lang['admin']['entry']['bbcode_protect']['usage']) ? 
				$lang['admin']['entry']['bbcode_protect']['usage'] : 
				'Usage:'; 
		?></strong> <?php 
			echo isset($lang['admin']['entry']['bbcode_protect']['usage_text']) ? 
				$lang['admin']['entry']['bbcode_protect']['usage_text'] : 
				'Wrap content with &lt;!--protect--&gt; and &lt;!--/protect--&gt; to protect it.'; 
		?></p>
	</div>
	<?php
}

function plugin_bbcode_protect_entry_save($entryid) {
	// Save per-entry password
	if (isset($_POST['bbcode_protect_entry_password'])) {
		$plain_password = $_POST['bbcode_protect_entry_password'];
		
		if (!empty($plain_password)) {
			// Hash password and save both hashed and plain versions
			$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);
			entry_setattrib($entryid, 'bbcode_protect_password', $hashed_password);
			entry_setattrib($entryid, 'bbcode_protect_password_plain', $plain_password);
		} else {
			// Clear password
			entry_setattrib($entryid, 'bbcode_protect_password', '');
			entry_setattrib($entryid, 'bbcode_protect_password_plain', '');
		}
	}
}

// Register entry editor hooks
admin_addpanelaction('entry', 'bbcode_protect', false);
