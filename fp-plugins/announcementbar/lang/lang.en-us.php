<?php
$lang['admin']['plugin']['submenu']['announcementbar'] = 'Announcement Bar';
$lang['admin']['plugin']['announcementbar'] = array(
	'head' => 'Announcement Bar Configuration',
	'desc' => 'Configure a sticky top notification/announcement bar that can be displayed on your site with scheduling, visibility rules, and dismissible options.',
	
	'general' => 'General Settings',
	'enabled' => 'Enable announcement bar',
	'enabled_long' => 'Check this to display the announcement bar on your site.',
	'content' => 'Announcement content',
	'content_long' => 'Enter your announcement message. Supports BBCode and HTML markup. Keep it concise for better mobile display.',
	
	'visibility' => 'Visibility Settings',
	'visibility_mode' => 'Display mode',
	'visibility_all' => 'Show on all pages',
	'visibility_include' => 'Show only on specified paths',
	'visibility_exclude' => 'Hide on specified paths',
	'visibility_mode_long' => 'Choose where the announcement bar should be displayed.',
	'visibility_patterns' => 'URL patterns',
	'visibility_patterns_long' => 'Enter one pattern per line. Use * as wildcard. Examples: /blog/*, /index.php, /static.php*',
	
	'dismissible_section' => 'Dismissible Settings',
	'dismissible' => 'Allow visitors to dismiss',
	'dismissible_long' => 'If enabled, visitors can close the announcement bar. Their choice is remembered via cookie/localStorage.',
	'dismiss_version' => 'Message version',
	'dismiss_version_long' => 'Change this value to show the bar again to visitors who previously dismissed it (e.g., when you update the message).',
	
	'scheduling' => 'Scheduling',
	'schedule_enabled' => 'Enable scheduling',
	'schedule_enabled_long' => 'Only display the announcement bar during a specific time window.',
	'schedule_start' => 'Start date/time',
	'schedule_start_long' => 'Announcement bar will not appear before this date/time (optional).',
	'schedule_end' => 'End date/time',
	'schedule_end_long' => 'Announcement bar will not appear after this date/time (optional).',
	
	'styling' => 'Styling',
	'bg_color' => 'Background color',
	'text_color' => 'Text color',
	'font_size' => 'Font size (px)',
	'font_size_long' => 'Font size in pixels (10-24).',
	'padding' => 'Padding (px)',
	'padding_long' => 'Vertical padding in pixels (5-30).',
	'height' => 'Height',
	'height_long' => 'Minimum height in pixels, or "auto" for automatic height.',
	
	'submit' => 'Save configuration',
	'msg_success' => 'Announcement bar configuration successfully saved.',
	'msg_error' => 'Announcement bar configuration not saved.'
);

$lang['plugin']['announcementbar'] = array(
	'close' => 'Close announcement'
);
?>
