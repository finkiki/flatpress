<?php
/**
 * Theme Name: Bearggero
 * Theme URI: https://www.flatpress.org/
 * Description: A modern, responsive theme for FlatPress 1.5 RC with header navigation menu, mobile support, and Smarty 5.7.0 compatibility.
 * Version: 1.0.0
 * Author: FlatPress Contributors
 * Author URI: https://www.flatpress.org/
 */

$theme['name'] = 'bearggero';
$theme['author'] = 'FlatPress Contributors';
$theme['www'] = 'https://www.flatpress.org/';
$theme['description'] = 'Modern, responsive theme with header navigation, mobile menu toggle, and full Smarty 5.7.0 compatibility.';

$theme['version'] = '1.0.0';

$theme['style_def'] = 'style.css';
$theme['style_admin'] = 'admin.css';

$theme['default_style'] = 'bearggero';

// Register widgetsets
register_widgetset('navigation'); // For header menu
register_widgetset('sidebar');    // For sidebar widgets
register_widgetset('footer');     // For footer widgets

// Override default admin layout if needed
// remove_filter('admin_head', 'admin_head_action');
?>
