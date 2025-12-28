<?php
/**
 * Entry Editor Panel
 */

function plugin_passwordprotect_entry_head() {
	?>
	<style>
		.passwordprotect-entry-panel { margin: 15px 0; padding: 15px; background: #f9f9f9; border-left: 4px solid #2271b1; }
		.passwordprotect-entry-panel label { display: block; font-weight: bold; margin-bottom: 5px; }
		.passwordprotect-entry-panel input[type="password"] { width: 100%; max-width: 400px; padding: 8px; }
		.passwordprotect-entry-panel .description { font-size: 0.9em; color: #666; margin-top: 5px; }
	</style>
	<?php
}

function plugin_passwordprotect_entry_write($entryid, $orig_entryid) {
	global $lang;
	
	// Get existing password if editing
	$entry_password_plain = '';
	if ($entryid) {
		$entry_password_plain = entry_getattrib($entryid, 'passwordprotect_password_plain');
	}
	
	?>
	<div class="passwordprotect-entry-panel">
		<h3><?php 
			echo isset($lang['admin']['entry']['passwordprotect']['title']) ? 
				$lang['admin']['entry']['passwordprotect']['title'] : 
				'Content Protection'; 
		?></h3>
		
		<label for="passwordprotect_entry_password"><?php 
			echo isset($lang['admin']['entry']['passwordprotect']['entry_password']) ? 
				$lang['admin']['entry']['passwordprotect']['entry_password'] : 
				'Entry Password'; 
		?></label>
		<input type="password" id="passwordprotect_entry_password" name="passwordprotect_entry_password" 
			value="<?php echo htmlspecialchars($entry_password_plain, ENT_QUOTES, 'UTF-8'); ?>" 
			autocomplete="new-password">
		<p class="description"><?php 
			echo isset($lang['admin']['entry']['passwordprotect']['entry_password_desc']) ? 
				$lang['admin']['entry']['passwordprotect']['entry_password_desc'] : 
				'Password for protected content in this entry. Leave blank to use global default password.'; 
		?></p>
		
		<p class="description"><strong><?php 
			echo isset($lang['admin']['entry']['passwordprotect']['usage']) ? 
				$lang['admin']['entry']['passwordprotect']['usage'] : 
				'Usage:'; 
		?></strong> <?php 
			echo isset($lang['admin']['entry']['passwordprotect']['usage_text']) ? 
				$lang['admin']['entry']['passwordprotect']['usage_text'] : 
				'Wrap content with &lt;!--protect--&gt; and &lt;!--/protect--&gt; to protect it.'; 
		?></p>
	</div>
	<?php
}

function plugin_passwordprotect_entry_save($entryid) {
	// Save per-entry password
	if (isset($_POST['passwordprotect_entry_password'])) {
		$plain_password = $_POST['passwordprotect_entry_password'];
		
		if (!empty($plain_password)) {
			// Hash password and save both hashed and plain versions
			$hashed_password = password_hash($plain_password, PASSWORD_BCRYPT);
			entry_setattrib($entryid, 'passwordprotect_password', $hashed_password);
			entry_setattrib($entryid, 'passwordprotect_password_plain', $plain_password);
		} else {
			// Clear password
			entry_setattrib($entryid, 'passwordprotect_password', '');
			entry_setattrib($entryid, 'passwordprotect_password_plain', '');
		}
	}
}

// Register entry editor hooks
admin_addpanelaction('entry', 'passwordprotect', false);
