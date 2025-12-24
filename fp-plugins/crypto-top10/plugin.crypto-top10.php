<?php
declare(strict_types=1);
/*
 * Plugin Name: Crypto Top 10
 * Type: Block
 * Version: 1.0.0
 * Plugin URI: https://www.flatpress.org
 * Author: FlatPress
 * Author URI: https://www.flatpress.org
 * Description: Shows the top 10 cryptocurrencies by market cap with a small chart and selector.
 */

define('PLUGIN_CRYPTO_TOP10_ID', 'crypto-top10');

if (!function_exists('register_block')) {
	/**
	 * Fallback helper to mirror register_block() if it is not available in this FlatPress version.
	 *
	 * @param string   $widgetid
	 * @param string   $widgetname
	 * @param callable $widget_func
	 * @param int      $num_params
	 * @param array    $limit_params_to
	 * @return void
	 */
	function register_block($widgetid, $widgetname, $widget_func, $num_params = 0, $limit_params_to = array()) {
		register_widget($widgetid, $widgetname, $widget_func, $num_params, $limit_params_to);
	}
}

/**
 * Parse a simple key/value translation file.
 *
 * @param string $path
 * @return array<string,string>
 */
function plugin_crypto_top10_parse_lang_file($path) {
	$result = array();
	if (!is_readable($path)) {
		return $result;
	}

	$lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
	if (!is_array($lines)) {
		return $result;
	}

	foreach ($lines as $line) {
		$line = trim($line);
		if ($line === '' || strpos($line, '#') === 0) {
			continue;
		}

		$parts = explode('=', $line, 2);
		if (count($parts) < 2) {
			$parts = explode(':', $line, 2);
		}

		if (count($parts) === 2) {
			$key = trim($parts [0]);
			$val = trim($parts [1]);
			if ($key !== '') {
				$result [$key] = $val;
			}
		}
	}

	return $result;
}

/**
 * Load translations for the current locale with English fallback.
 *
 * @return array<string,string>
 */
function plugin_crypto_top10_get_lang() {
	static $strings = null;
	if ($strings !== null) {
		return $strings;
	}

	global $fp_config;

	$locale = LANG_DEFAULT;
	if (isset($fp_config) && is_array($fp_config) && isset($fp_config ['locale'] ['lang'])) {
		$locale = strtolower((string)$fp_config ['locale'] ['lang']);
	}
	$baseDir = plugin_getdir(PLUGIN_CRYPTO_TOP10_ID) . 'lang/';

	$fallbackFile = $baseDir . 'lang.en-us.txt';
	$langFile = $baseDir . 'lang.' . $locale . '.txt';

	$current = plugin_crypto_top10_parse_lang_file($langFile);
	$fallback = plugin_crypto_top10_parse_lang_file($fallbackFile);

	$strings = array_merge($fallback, $current);

	return $strings;
}

/**
 * Check whether the widget is active in any widgetset.
 *
 * @return bool
 */
function plugin_crypto_top10_is_active() {
	static $active = null;
	if ($active !== null) {
		return $active;
	}

	$active = false;
	$widgetsFile = CONFIG_DIR . 'widgets.conf.php';
	if (!file_exists($widgetsFile)) {
		$widgetsFile = ABS_PATH . 'fp-defaults/widgets.conf.php';
	}

	if (file_exists($widgetsFile)) {
		$fp_widgets = array();
		include ($widgetsFile);
		if (isset($fp_widgets) && is_array($fp_widgets)) {
			foreach ($fp_widgets as $slot => $widgets) {
				if (!is_array($widgets)) {
					continue;
				}
				foreach ($widgets as $widgetId) {
					if (strpos((string)$widgetId, PLUGIN_CRYPTO_TOP10_ID) === 0) {
						$active = true;
						break 2;
					}
				}
			}
		}
	}

	return $active;
}

/**
 * Register the widget.
 *
 * @return void
 */
function plugin_crypto_top10_init() {
	register_block(PLUGIN_CRYPTO_TOP10_ID, 'Crypto Top 10', 'plugin_crypto_top10_widget');
}

add_action('init', 'plugin_crypto_top10_init');

/**
 * Render widget content.
 *
 * @return array{id?:string,subject:string,content:string}
 */
function plugin_crypto_top10_widget() {
	global $smarty;

	$strings = plugin_crypto_top10_get_lang();

	if ($smarty instanceof Smarty) {
		$smarty->assign('crypto_top10_strings', $strings);
		$smarty->assign('crypto_top10_id', PLUGIN_CRYPTO_TOP10_ID);
		$content = $smarty->fetch('plugin:' . PLUGIN_CRYPTO_TOP10_ID . '/crypto-top10');
	} else {
		$content = '<div class="crypto-top10-widget">' . ($strings ['CRYPTO_TOP10_TITLE'] ?? 'Top 10 Cryptos') . '</div>';
	}

	return array(
		'subject' => isset($strings ['CRYPTO_TOP10_TITLE']) ? $strings ['CRYPTO_TOP10_TITLE'] : 'Top 10 Cryptos',
		'content' => $content
	);
}

/**
 * Enqueue front-end assets when the widget is active.
 *
 * @return void
 */
function plugin_crypto_top10_head() {
	if (defined('ADMIN_PANEL')) {
		return;
	}

	if (!plugin_crypto_top10_is_active()) {
		return;
	}

	$random_hex = RANDOM_HEX;
	$plugindir = plugin_geturl(PLUGIN_CRYPTO_TOP10_ID);

	$css = utils_asset_ver($plugindir . 'assets/crypto-top10.css', SYSTEM_VER);
	$js = utils_asset_ver($plugindir . 'assets/crypto-top10.js', SYSTEM_VER);

	// Always use the bundled jQuery 3.7.1 to satisfy dependency.
	$jquery = utils_asset_ver(plugin_geturl('jquery') . 'res/jquery/3.7.1/jquery-3.7.1.js', SYSTEM_VER);

	$strings = plugin_crypto_top10_get_lang();
	$config = array(
		'strings' => array(
			'title' => isset($strings ['CRYPTO_TOP10_TITLE']) ? $strings ['CRYPTO_TOP10_TITLE'] : 'Top 10 Cryptos',
			'select' => isset($strings ['CRYPTO_TOP10_SELECT']) ? $strings ['CRYPTO_TOP10_SELECT'] : 'Select',
			'loading' => isset($strings ['CRYPTO_TOP10_LOADING']) ? $strings ['CRYPTO_TOP10_LOADING'] : 'Loading…',
			'unavailable' => isset($strings ['CRYPTO_TOP10_UNAVAILABLE']) ? $strings ['CRYPTO_TOP10_UNAVAILABLE'] : 'Unavailable',
			'errorList' => isset($strings ['CRYPTO_TOP10_ERROR_LIST']) ? $strings ['CRYPTO_TOP10_ERROR_LIST'] : 'Failed to load list: {msg}',
			'errorPrice' => isset($strings ['CRYPTO_TOP10_ERROR_PRICE']) ? $strings ['CRYPTO_TOP10_ERROR_PRICE'] : 'Failed to load price: {msg}',
		),
	);

	echo '
		<!-- BOF Crypto Top 10 -->
		<link rel="stylesheet" href="' . $css . '">
		<script nonce="' . $random_hex . '" src="' . $jquery . '"></script>
		<script nonce="' . $random_hex . '" src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
		<script nonce="' . $random_hex . '">window.cryptoTop10Config = ' . json_encode($config, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) . ';</script>
		<script nonce="' . $random_hex . '" src="' . $js . '"></script>
		<!-- EOF Crypto Top 10 -->
	';
}

add_action('wp_head', 'plugin_crypto_top10_head');
?> 
