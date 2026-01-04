<?php
/**
 * Theme Name: Bearggero
 * Theme URI: http://www.flatpress.org/
 * Description: A modernized FlatPress theme with dark blue admin interface and responsive design.<br><br>This theme comes with <a href="admin.php?p=themes&action=style">different styles</a> - try them :)
 * Version: 1.0
 * Author: NoWhereMan, Drudo and Copilot
 * Author URI: http://www.flatpress.org/
 */
$theme ['name'] = 'bearggero';
$theme ['author'] = 'NoWhereMan, Drudo and Copilot';
$theme ['www'] = 'https://www.flatpress.org/';
$theme ['description'] = 'Modernized FlatPress Theme with dark blue admin interface and responsive design.';

$theme ['version'] = 1.0;

$theme ['style_def'] = 'style.css';
$theme ['style_admin'] = 'admin.css';

$theme ['default_style'] = 'leggero-v2';

// Other theme settings

// overrides default tabmenu
// and panel layout
remove_filter('admin_head', 'admin_head_action');

// register widgetsets
register_widgetset('right');
register_widgetset('left');
?>
