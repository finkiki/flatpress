<?php
/**
 * English language file for BBCode Protect plugin
 */

$lang['admin']['config']['submenu']['bbcode_protect'] = 'Content Protection';

$lang['admin']['config']['bbcode_protect'] = array(
	'head' => 'BBCode Content Protection Settings',
	'desc' => 'Configure password protection for content blocks using the [protect]...[/protect] BBCode tag.',
	
	// General settings
	'general_settings' => 'General Settings',
	'default_password_label' => 'Default Password',
	'default_password_desc' => 'Global password used for all [protect][/protect] blocks when no per-entry or inline password is set. Leave blank to disable password protection by default.',
	'allow_inline_password' => 'Allow inline passwords in BBCode',
	'allow_inline_password_desc' => 'When enabled, allows using [protect pwd="password"]...[/protect] syntax. When disabled, only per-entry passwords are used.',
	'prompt_text_label' => 'Password Prompt Text',
	'prompt_text_desc' => 'Text shown above the password input form.',
	'remember_duration_label' => 'Remember Duration (seconds)',
	'remember_duration_desc' => 'How long (in seconds) to remember the password after successful entry. Default: 3600 (1 hour).',
	
	// Security settings
	'security_settings' => 'Security Settings',
	'max_attempts_label' => 'Maximum Failed Attempts',
	'max_attempts_desc' => 'Maximum number of failed password attempts before rate limiting. Default: 5.',
	'attempt_window_label' => 'Attempt Window (seconds)',
	'attempt_window_desc' => 'Time window (in seconds) for counting failed attempts. Default: 300 (5 minutes).',
	
	// Cache settings
	'cache_settings' => 'Cache Settings',
	'bypass_cache' => 'Bypass cache for protected content',
	'bypass_cache_desc' => 'When enabled, pages with protected content will not be cached to prevent leaking unlocked content.',
	
	// Usage instructions
	'usage_title' => 'Usage Instructions',
	'usage_intro' => 'This plugin allows you to password-protect sections of your content using BBCode tags.',
	
	'usage_basic_title' => 'Basic Usage with Per-Entry Password',
	'usage_basic_example' => '[protect]This content is protected[/protect]',
	'usage_basic_desc' => 'Protects content using the password set in the entry metadata. Set the entry password in the entry editor.',
	
	'usage_inline_title' => 'Inline Password (if enabled)',
	'usage_inline_example' => '[protect pwd="mypassword"]This content is protected[/protect]',
	'usage_inline_desc' => 'Protects content with a specific inline password. Only works if "Allow inline passwords" is enabled above.',
	
	'usage_entry_title' => 'Setting Entry Password',
	'usage_entry_desc' => 'To set a password for an entire entry, add it in the entry editor metadata panel when creating or editing a post.',
	
	'submit' => 'Save Settings',
	'msgs' => array(
		1 => 'Settings saved successfully.',
		-1 => 'Error saving settings.'
	)
);

// Entry editor panel
$lang['admin']['entry']['bbcode_protect'] = array(
	'legend' => 'Content Protection',
	'description' => 'Set a password to protect [protect]...[/protect] blocks in this entry.',
	'password_label' => 'Entry Password',
	'note' => 'Leave blank to remove password protection. The password will be securely hashed.',
);

// Front-end messages
$lang['plugin']['bbcode_protect'] = array(
	'password_label' => 'Password:',
	'submit_button' => 'Submit',
	'error_wrong_password' => 'Incorrect password. Please try again.',
	'error_rate_limited' => 'Too many failed attempts. Please try again later.',
	'feed_replacement' => '[This content is password protected]',
);
?>
