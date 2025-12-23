<?php
/*
 * Plugin Name: Crypto Top 10
 * Version: 1.0.1
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
	// Load plugin strings
	$lang = lang_load('plugin:crypto-top10');
	
	$widget = array();
	$widget['subject'] = $lang['plugin']['crypto-top10']['title'];
	
	// Build HTML content directly
	$content = '
	<div id="crypto-top10-widget" class="crypto-top10">
		<div class="crypto-currency-selector">
			<button id="crypto-currency-usd" class="crypto-currency-btn active" data-currency="usd">$</button>
			<button id="crypto-currency-eur" class="crypto-currency-btn" data-currency="eur">€</button>
		</div>
		
		<div class="crypto-select-wrapper">
			<select id="crypto-select" class="crypto-select" disabled>
				<option value="">' . htmlspecialchars($lang['plugin']['crypto-top10']['loading']) . '</option>
			</select>
		</div>
		
		<div id="crypto-price-box" class="crypto-price-box">
			<div id="crypto-price" class="crypto-price">' . htmlspecialchars($lang['plugin']['crypto-top10']['loading']) . '</div>
			<div id="crypto-change" class="crypto-change"></div>
		</div>
		
		<div id="crypto-error" class="crypto-error" style="display: none;"></div>
	</div>';
	
	$widget['content'] = $content;
	
	return $widget;
}

/**
 * Function: plugin_crypto_top10_head
 * 
 * Enqueue CSS, JS and localized strings
 */
function plugin_crypto_top10_head() {
	// Only load if jQuery plugin is available
	if (!function_exists('plugin_jquery_head')) {
		return;
	}
	
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
		'error_price' => $lang['plugin']['crypto-top10']['error_price']
	);
	
	echo '
		<!-- BOF Crypto Top 10 -->
		<link rel="stylesheet" type="text/css" href="' . $css . '">
		<script nonce="' . $random_hex . '">
			window.CRYPTO_TOP10_STRINGS = ' . json_encode($strings) . ';
		</script>
		<script nonce="' . $random_hex . '" src="' . $js . '"></script>
		<!-- EOF Crypto Top 10 -->
	';
}

// Register widget and wp_head action
register_widget('crypto-top10', 'Crypto Top 10', 'plugin_crypto_top10_widget');
add_action('wp_head', 'plugin_crypto_top10_head', 10);
?>
