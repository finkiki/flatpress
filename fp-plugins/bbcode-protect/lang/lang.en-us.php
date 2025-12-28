<?php
/**
 * English (US) Language File for Content Protection Plugin
 */

$lang['plugin']['bbcode_protect'] = [
	'password_label' => 'Password:',
	'submit_button' => 'Submit',
	'wrong_password' => 'Incorrect password. Please try again.',
	'rate_limited' => 'Too many failed attempts. Please try again later.',
	'no_password_set' => 'No password has been set for this content.',
];

$lang['admin']['plugin']['bbcode_protect'] = [
	'title' => 'Content Protection Settings',
	'password_section' => 'Global Password',
	'default_password' => 'Default Password',
	'default_password_desc' => 'Global password for all protected content. Can be overridden per-entry.',
	'display_section' => 'Display Settings',
	'prompt_text' => 'Prompt Text',
	'prompt_text_desc' => 'Message shown above password form.',
	'remember_duration' => 'Remember Duration (seconds)',
	'remember_duration_desc' => 'How long content stays unlocked (default: 3600 = 1 hour).',
	'security_section' => 'Security Settings',
	'max_attempts' => 'Max Failed Attempts',
	'max_attempts_desc' => 'Number of failed attempts before rate limiting (default: 5).',
	'attempt_window' => 'Attempt Window (seconds)',
	'attempt_window_desc' => 'Time window for counting failed attempts (default: 300 = 5 minutes).',
	'usage_section' => 'Usage Instructions',
	'usage_text' => 'To protect content in your posts, use HTML comments:',
	'usage_note' => 'You can also set per-entry passwords in the entry editor.',
];

$lang['admin']['entry']['bbcode_protect'] = [
	'title' => 'Content Protection',
	'entry_password' => 'Entry Password',
	'entry_password_desc' => 'Password for protected content in this entry. Leave blank to use global default password.',
	'usage' => 'Usage:',
	'usage_text' => 'Wrap content with &lt;!--protect--&gt; and &lt;!--/protect--&gt; to protect it.',
];
