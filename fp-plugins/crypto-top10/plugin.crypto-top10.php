<?php
/*
 * Plugin Name: Crypto Top 10
 * Version: 1.0.0
 * Type: Block
 * Plugin URI: https://www.flatpress.org
 * Author: FlatPress
 * Author URI: https://www.flatpress.org
 * Description: Displays the top 10 cryptocurrencies by market cap with 7-day price chart using CoinGecko API.
 */

/**
 * Function: plugin_crypto_top10_widget
 * 
 * Generates the crypto widget content
 */
function plugin_crypto_top10_widget() {
	global $smarty;
	
	// Load plugin strings
	$lang = lang_load('plugin:crypto-top10');
	
	$widget = array();
	$widget['subject'] = $lang['plugin']['crypto-top10']['title'];
	
	// Get the plugin URL for assets
	$pdir = plugin_geturl('crypto-top10');
	
	// Assign variables to template
	$smarty->assign('crypto_plugin_url', $pdir);
	$smarty->assign('crypto_lang', $lang['plugin']['crypto-top10']);
	
	// Render the template
	ob_start();
	$smarty->display('plugin:crypto-top10/crypto-top10.tpl');
	$widget['content'] = ob_get_clean();
	
	return $widget;
}

/**
 * Function: plugin_crypto_top10_head
 * 
 * Enqueue CSS, JS and localized strings
 */
function plugin_crypto_top10_head() {
	$random_hex = RANDOM_HEX;
	$pdir = plugin_geturl('crypto-top10');
	
	// Load plugin strings for localization
	$lang = lang_load('plugin:crypto-top10');
	
	// Get asset URLs with versioning
	$css = utils_asset_ver($pdir . 'assets/crypto-top10.css', SYSTEM_VER);
	$js = utils_asset_ver($pdir . 'assets/crypto-top10.js', SYSTEM_VER);
	
	// Inject localized strings for JavaScript
	$strings = array(
		'loading' => $lang['plugin']['crypto-top10']['loading'],
		'unavailable' => $lang['plugin']['crypto-top10']['unavailable'],
		'error_list' => $lang['plugin']['crypto-top10']['error_list'],
		'error_price' => $lang['plugin']['crypto-top10']['error_price'],
		'select' => $lang['plugin']['crypto-top10']['select']
	);
	
	echo '
		<!-- BOF Crypto Top 10 -->
		<link rel="stylesheet" type="text/css" href="' . $css . '">
		<script nonce="' . $random_hex . '">
			window.CRYPTO_TOP10_STRINGS = ' . json_encode($strings) . ';
		</script>
		<script nonce="' . $random_hex . '" src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
		<script nonce="' . $random_hex . '" src="' . $js . '" defer></script>
		<!-- EOF Crypto Top 10 -->
	';
}

// Register widget and wp_head action
register_widget('crypto-top10', 'Crypto Top 10', 'plugin_crypto_top10_widget');
add_action('wp_head', 'plugin_crypto_top10_head', 10);
?>
