<?php
/**
 * Theme Name: Bearggero
 * Theme URI: https://github.com/dartarrow/bearggero
 * Description: A refreshed Bearggero theme updated for FlatPress 1.5 with a responsive, mobile-friendly layout.
 * Version: 1.5.0
 * Author: dartarrow; updated by FlatPress contributors
 * Author URI: https://www.flatpress.org/
 */

$theme ['name'] = 'bearggero';
$theme ['author'] = 'dartarrow; updated by FlatPress contributors';
$theme ['www'] = 'https://www.flatpress.org/';
$theme ['description'] = 'A refreshed Bearggero theme updated for FlatPress 1.5 with a responsive, mobile-friendly layout.';
$theme ['version'] = 1.5;

$theme ['default_style'] = 'default';
$theme ['admin_custom_interf'] = true;

register_widgetset('top');
register_widgetset('left');
register_widgetset('right');
register_widgetset('bottom');
register_widgetset('footer');
