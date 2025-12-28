<?php
/**
 * Admin Plugin Settings Panel
 */

function plugin_passwordprotect_admin_config_submit() {
	if (!isset($_POST['passwordprotect'])) {
		return 0;
	}
	
	$config = [];
	
	// Handle default password
	if (!empty($_POST['passwordprotect']['default_password_plain'])) {
		$plain_password = $_POST['passwordprotect']['default_password_plain'];
		$config['default_password'] = password_hash($plain_password, PASSWORD_BCRYPT);
		$config['default_password_plain'] = $plain_password; // For re-editing
	} else {
		$config['default_password'] = '';
		$config['default_password_plain'] = '';
	}
	
	// Other settings
	$config['remember_duration'] = isset($_POST['passwordprotect']['remember_duration']) ? 
		(int)$_POST['passwordprotect']['remember_duration'] : 3600;
	$config['prompt_text'] = isset($_POST['passwordprotect']['prompt_text']) ? 
		$_POST['passwordprotect']['prompt_text'] : 'This content is password protected.';
	$config['max_attempts'] = isset($_POST['passwordprotect']['max_attempts']) ? 
		(int)$_POST['passwordprotect']['max_attempts'] : 5;
	$config['attempt_window'] = isset($_POST['passwordprotect']['attempt_window']) ? 
		(int)$_POST['passwordprotect']['attempt_window'] : 300;
	
	// Save configuration
	plugin_addoption('passwordprotect', $config);
	plugin_saveoptions();
	
	return 1;
}

function plugin_passwordprotect_admin_config_head() {
	?>
	<style>
		.passwordprotect-admin { max-width: 800px; }
		.passwordprotect-admin label { display: block; margin-top: 15px; font-weight: bold; }
		.passwordprotect-admin input[type="text"],
		.passwordprotect-admin input[type="password"],
		.passwordprotect-admin input[type="number"] { width: 100%; max-width: 400px; padding: 8px; }
		.passwordprotect-admin .description { font-size: 0.9em; color: #666; margin-top: 5px; }
		.passwordprotect-admin .section { margin-bottom: 20px; padding: 15px; background: #f9f9f9; border-left: 4px solid #2271b1; }
	</style>
	<?php
}

function plugin_passwordprotect_admin_config_main() {
	global $lang;
	
	$config = plugin_passwordprotect_config();
	$default_password_plain = isset($config['default_password_plain']) ? $config['default_password_plain'] : '';
	$remember_duration = isset($config['remember_duration']) ? $config['remember_duration'] : 3600;
	$prompt_text = isset($config['prompt_text']) ? $config['prompt_text'] : 'This content is password protected.';
	$max_attempts = isset($config['max_attempts']) ? $config['max_attempts'] : 5;
	$attempt_window = isset($config['attempt_window']) ? $config['attempt_window'] : 300;
	
	?>
	<div class="passwordprotect-admin">
		<h2><?php 
			echo isset($lang['admin']['plugin']['passwordprotect']['title']) ? 
				$lang['admin']['plugin']['passwordprotect']['title'] : 
				'Content Protection Settings'; 
		?></h2>
		
		<div class="section">
			<h3><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['password_section']) ? 
					$lang['admin']['plugin']['passwordprotect']['password_section'] : 
					'Global Password'; 
			?></h3>
			
			<label for="default_password"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['default_password']) ? 
					$lang['admin']['plugin']['passwordprotect']['default_password'] : 
					'Default Password'; 
			?></label>
			<input type="password" id="default_password" name="passwordprotect[default_password_plain]" 
				value="<?php echo htmlspecialchars($default_password_plain, ENT_QUOTES, 'UTF-8'); ?>" 
				autocomplete="new-password">
			<p class="description"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['default_password_desc']) ? 
					$lang['admin']['plugin']['passwordprotect']['default_password_desc'] : 
					'Global password for all protected content. Can be overridden per-entry.'; 
			?></p>
		</div>
		
		<div class="section">
			<h3><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['display_section']) ? 
					$lang['admin']['plugin']['passwordprotect']['display_section'] : 
					'Display Settings'; 
			?></h3>
			
			<label for="prompt_text"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['prompt_text']) ? 
					$lang['admin']['plugin']['passwordprotect']['prompt_text'] : 
					'Prompt Text'; 
			?></label>
			<input type="text" id="prompt_text" name="passwordprotect[prompt_text]" 
				value="<?php echo htmlspecialchars($prompt_text, ENT_QUOTES, 'UTF-8'); ?>">
			<p class="description"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['prompt_text_desc']) ? 
					$lang['admin']['plugin']['passwordprotect']['prompt_text_desc'] : 
					'Message shown above password form.'; 
			?></p>
			
			<label for="remember_duration"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['remember_duration']) ? 
					$lang['admin']['plugin']['passwordprotect']['remember_duration'] : 
					'Remember Duration (seconds)'; 
			?></label>
			<input type="number" id="remember_duration" name="passwordprotect[remember_duration]" 
				value="<?php echo (int)$remember_duration; ?>" min="60" max="86400">
			<p class="description"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['remember_duration_desc']) ? 
					$lang['admin']['plugin']['passwordprotect']['remember_duration_desc'] : 
					'How long content stays unlocked (default: 3600 = 1 hour).'; 
			?></p>
		</div>
		
		<div class="section">
			<h3><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['security_section']) ? 
					$lang['admin']['plugin']['passwordprotect']['security_section'] : 
					'Security Settings'; 
			?></h3>
			
			<label for="max_attempts"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['max_attempts']) ? 
					$lang['admin']['plugin']['passwordprotect']['max_attempts'] : 
					'Max Failed Attempts'; 
			?></label>
			<input type="number" id="max_attempts" name="passwordprotect[max_attempts]" 
				value="<?php echo (int)$max_attempts; ?>" min="1" max="20">
			<p class="description"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['max_attempts_desc']) ? 
					$lang['admin']['plugin']['passwordprotect']['max_attempts_desc'] : 
					'Number of failed attempts before rate limiting (default: 5).'; 
			?></p>
			
			<label for="attempt_window"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['attempt_window']) ? 
					$lang['admin']['plugin']['passwordprotect']['attempt_window'] : 
					'Attempt Window (seconds)'; 
			?></label>
			<input type="number" id="attempt_window" name="passwordprotect[attempt_window]" 
				value="<?php echo (int)$attempt_window; ?>" min="60" max="3600">
			<p class="description"><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['attempt_window_desc']) ? 
					$lang['admin']['plugin']['passwordprotect']['attempt_window_desc'] : 
					'Time window for counting failed attempts (default: 300 = 5 minutes).'; 
			?></p>
		</div>
		
		<div class="section">
			<h3><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['usage_section']) ? 
					$lang['admin']['plugin']['passwordprotect']['usage_section'] : 
					'Usage Instructions'; 
			?></h3>
			<p><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['usage_text']) ? 
					$lang['admin']['plugin']['passwordprotect']['usage_text'] : 
					'To protect content in your posts, use HTML comments:'; 
			?></p>
			<pre style="background: #f0f0f0; padding: 10px; overflow-x: auto;">
&lt;!--protect--&gt;
Your protected content here
&lt;!--/protect--&gt;</pre>
			<p><?php 
				echo isset($lang['admin']['plugin']['passwordprotect']['usage_note']) ? 
					$lang['admin']['plugin']['passwordprotect']['usage_note'] : 
					'You can also set per-entry passwords in the entry editor.'; 
			?></p>
		</div>
	</div>
	<?php
}

// Register admin panel
admin_addpanelaction('config', 'passwordprotect', true);
