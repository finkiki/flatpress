/**
 * Crypto Top 10 Widget - JavaScript (jQuery version)
 * Displays cryptocurrency prices with auto-refresh
 */

(function($) {
	'use strict';
	
	// Get localized strings from global variable
	var strings = window.CRYPTO_TOP10_STRINGS || {
		loading: 'Loading...',
		unavailable: 'Unavailable',
		error_list: 'Error loading cryptocurrency list',
		error_price: 'Error loading price data',
		select: 'Select cryptocurrency'
	};
	
	var cryptoData = [];
	var $widget, $select, $priceBox, $price, $change, $error;
	var selectedCurrency = 'usd';
	var selectedCoinId = null;
	var updateInterval = null;
	
	// CoinGecko API endpoints
	var API_BASE = 'https://api.coingecko.com/api/v3';
	
	/**
	 * Get currency symbol
	 */
	function getCurrencySymbol(currency) {
		return currency === 'eur' ? '€' : '$';
	}
	
	/**
	 * Fetch the top 10 cryptocurrencies with retry logic
	 */
	function fetchTopCryptos(currency, retryCount) {
		retryCount = retryCount || 0;
		var url = API_BASE + '/coins/markets?vs_currency=' + currency + 
		          '&order=market_cap_desc&per_page=10&page=1&sparkline=false' +
		          '&price_change_percentage=24h';
		
		return $.ajax({
			url: url,
			method: 'GET',
			dataType: 'json',
			timeout: 15000,
			cache: false,
			headers: {
				'Accept': 'application/json'
			}
		}).fail(function(jqXHR, textStatus, errorThrown) {
			console.log('CoinGecko API error:', textStatus, errorThrown);
			
			// Retry up to 2 times on failure
			if (retryCount < 2) {
				console.log('Retrying... attempt', retryCount + 1);
				return setTimeout(function() {
					fetchTopCryptos(currency, retryCount + 1);
				}, 2000 * (retryCount + 1));
			} else {
				showError(strings.error_list);
				$select.prop('disabled', false);
			}
		});
	}
	
	/**
	 * Populate the dropdown with cryptocurrency options
	 */
	function populateDropdown(cryptos) {
		if (!$select || $select.length === 0) {
			return;
		}
		
		$select.empty();
		
		$.each(cryptos, function(index, crypto) {
			$select.append(
				$('<option></option>')
					.val(crypto.id)
					.text(crypto.name + ' (' + crypto.symbol.toUpperCase() + ')')
			);
		});
		
		// Set first option as selected and enable select
		if (cryptos.length > 0) {
			$select.val(cryptos[0].id);
			$select.prop('disabled', false);
			selectedCoinId = cryptos[0].id;
		}
	}
	
	/**
	 * Display current price and 24h change
	 */
	function displayPriceData(crypto) {
		if (!crypto) {
			$price.text(strings.unavailable);
			$change.text('').removeClass('positive negative');
			return;
		}
		
		// Display price
		var currencySymbol = getCurrencySymbol(selectedCurrency);
		var price = crypto.current_price !== undefined ? 
			currencySymbol + crypto.current_price.toLocaleString(undefined, {
				minimumFractionDigits: 2, 
				maximumFractionDigits: 6
			}) : 
			strings.unavailable;
		
		$price.text(price);
		
		// Display 24h price change percentage
		if (crypto.price_change_percentage_24h !== undefined) {
			var changePercent = crypto.price_change_percentage_24h;
			var changeText = (changePercent >= 0 ? '+' : '') + changePercent.toFixed(2) + '%';
			
			$change.text(changeText);
			$change.removeClass('positive negative');
			
			if (changePercent >= 0) {
				$change.addClass('positive');
			} else {
				$change.addClass('negative');
			}
		} else {
			$change.text('').removeClass('positive negative');
		}
	}
	
	/**
	 * Show error message
	 */
	function showError(message) {
		$error.text(message).show();
	}
	
	/**
	 * Hide error message
	 */
	function hideError() {
		$error.hide();
	}
	
	/**
	 * Update price for selected cryptocurrency
	 */
	function updatePrice() {
		if (!selectedCoinId) {
			return;
		}
		
		hideError();
		
		// Find the crypto in our data
		var crypto = null;
		$.each(cryptoData, function(index, c) {
			if (c.id === selectedCoinId) {
				crypto = c;
				return false;
			}
		});
		
		if (crypto) {
			displayPriceData(crypto);
		}
	}
	
	/**
	 * Load cryptocurrency data
	 */
	function loadCryptoData() {
		$select.prop('disabled', true);
		hideError();
		
		fetchTopCryptos(selectedCurrency).done(function(data) {
			if (data && data.length > 0) {
				cryptoData = data;
				
				// If this is initial load, populate dropdown
				if (!selectedCoinId) {
					populateDropdown(cryptoData);
					selectedCoinId = cryptoData[0].id;
				} else {
					// Just update the data, keep selection
					$select.prop('disabled', false);
				}
				
				updatePrice();
			} else {
				showError(strings.error_list);
				$select.prop('disabled', false);
			}
		}).fail(function() {
			$select.prop('disabled', false);
		});
	}
	
	/**
	 * Switch currency
	 */
	function switchCurrency(currency) {
		if (selectedCurrency === currency) {
			return;
		}
		
		selectedCurrency = currency;
		
		// Update button states
		$('.crypto-currency-btn').removeClass('active');
		$('#crypto-currency-' + currency).addClass('active');
		
		// Reload data with new currency
		loadCryptoData();
	}
	
	/**
	 * Start auto-update interval (every minute)
	 */
	function startAutoUpdate() {
		// Clear any existing interval
		if (updateInterval) {
			clearInterval(updateInterval);
		}
		
		// Update every 60 seconds
		updateInterval = setInterval(function() {
			loadCryptoData();
		}, 60000);
	}
	
	/**
	 * Initialize the widget
	 */
	function init() {
		// Check if widget exists on page
		$widget = $('#crypto-top10-widget');
		if ($widget.length === 0) {
			return;
		}
		
		$select = $('#crypto-select');
		$priceBox = $('#crypto-price-box');
		$price = $('#crypto-price');
		$change = $('#crypto-change');
		$error = $('#crypto-error');
		
		// Disable select initially
		$select.prop('disabled', true);
		
		// Setup currency selector buttons
		$('.crypto-currency-btn').on('click', function() {
			var currency = $(this).data('currency');
			switchCurrency(currency);
		});
		
		// Setup dropdown change event
		$select.on('change', function() {
			selectedCoinId = $(this).val();
			if (selectedCoinId) {
				updatePrice();
			}
		});
		
		// Load initial data
		loadCryptoData();
		
		// Start auto-update
		startAutoUpdate();
	}
	
	// Initialize when document is ready
	$(document).ready(init);
	
})(jQuery);

