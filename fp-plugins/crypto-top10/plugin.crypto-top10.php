<?php
/**
 * Plugin Name: Crypto Top 10
 * Type: Block
 * Version: 1.0.0
 * Plugin URI: https://www.flatpress.org
 * Author: FlatPress
 * Author URI: https://www.flatpress.org
 * Description: Displays top 10 cryptocurrencies by market cap with interactive price charts using CoinGecko API
 */

/**
 * Enqueue plugin assets (CSS, JS)
 */
function plugin_crypto_top10_head() {
	$random_hex = RANDOM_HEX;
	$pdir = plugin_geturl('crypto-top10');
	
	// Enqueue Chart.js from CDN
	echo '<script nonce="' . $random_hex . '" src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>' . "\n";
	
	// Enqueue plugin CSS
	$css = utils_asset_ver($pdir . 'assets/crypto-top10.css', SYSTEM_VER);
	echo '<link rel="stylesheet" href="' . $css . '">' . "\n";
	
	// Enqueue plugin JS
	$js = utils_asset_ver($pdir . 'assets/crypto-top10.js', SYSTEM_VER);
	echo '<script nonce="' . $random_hex . '" src="' . $js . '"></script>' . "\n";
	
	// Pass localized strings to JavaScript
	$lang = lang_load('plugin:crypto-top10');
	echo '<script nonce="' . $random_hex . '">
		window.cryptoTop10Lang = {
			title: "' . addslashes($lang['plugin']['crypto-top10']['title']) . '",
			select: "' . addslashes($lang['plugin']['crypto-top10']['select']) . '",
			loading: "' . addslashes($lang['plugin']['crypto-top10']['loading']) . '",
			unavailable: "' . addslashes($lang['plugin']['crypto-top10']['unavailable']) . '",
			errorList: "' . addslashes($lang['plugin']['crypto-top10']['error_list']) . '",
			errorPrice: "' . addslashes($lang['plugin']['crypto-top10']['error_price']) . '"
		};
	</script>' . "\n";
}

/**
 * Widget function - renders the crypto top 10 widget
 */
function plugin_crypto_top10_widget() {
	global $smarty;
	
	// Load plugin strings
	$lang = lang_load('plugin:crypto-top10');
	
	$entry = array();
	$entry['subject'] = $lang['plugin']['crypto-top10']['title'];
	
	// Get template content
	$smarty->assign('plugin_dir', plugin_geturl('crypto-top10'));
	$entry['content'] = $smarty->fetch('plugin:crypto-top10/crypto-top10.tpl');
	
	return $entry;
}

// Hook into wp_head to enqueue assets
add_action('wp_head', 'plugin_crypto_top10_head', 1);

// Register the widget
register_widget('crypto-top10', 'Crypto Top 10', 'plugin_crypto_top10_widget');
?>
