/**
 * Crypto Top 10 Widget - JavaScript (jQuery version)
 * Fetches cryptocurrency data from CoinGecko API and displays simple SVG charts
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
	var $widget, $select, $price, $chart, $error, $tooltip;
	
	// CoinGecko API endpoints
	var API_BASE = 'https://api.coingecko.com/api/v3';
	var LIST_URL = API_BASE + '/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false';
	
	/**
	 * Fetch the top 10 cryptocurrencies
	 */
	function fetchTopCryptos() {
		return $.ajax({
			url: LIST_URL,
			method: 'GET',
			dataType: 'json',
			timeout: 10000
		}).fail(function() {
			showError(strings.error_list);
		});
	}
	
	/**
	 * Fetch 7-day price history for a specific cryptocurrency
	 */
	function fetchPriceHistory(coinId) {
		var url = API_BASE + '/coins/' + coinId + '/market_chart?vs_currency=usd&days=7&interval=hourly';
		return $.ajax({
			url: url,
			method: 'GET',
			dataType: 'json',
			timeout: 10000
		}).fail(function() {
			showError(strings.error_price);
		});
	}
	
	/**
	 * Populate the dropdown with cryptocurrency options
	 */
	function populateDropdown(cryptos) {
		$select.empty();
		
		$.each(cryptos, function(index, crypto) {
			$select.append(
				$('<option></option>')
					.val(crypto.id)
					.text(crypto.name + ' (' + crypto.symbol.toUpperCase() + ')')
			);
		});
		
		// Set first option as selected
		if (cryptos.length > 0) {
			$select.val(cryptos[0].id);
		}
	}
	
	/**
	 * Display current price
	 */
	function displayPrice(crypto) {
		if (!crypto) {
			$price.text(strings.unavailable);
			return;
		}
		
		var price = crypto.current_price !== undefined ? 
			'$' + crypto.current_price.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : 
			strings.unavailable;
		
		$price.text(price);
	}
	
	/**
	 * Render simple SVG line chart
	 */
	function renderChart(priceData) {
		$chart.empty();
		
		// Remove existing tooltip events and element
		$chart.off('mousemove mouseleave');
		if ($tooltip) {
			$tooltip.remove();
		}
		
		if (!priceData || !priceData.prices || priceData.prices.length === 0) {
			showError(strings.error_price);
			return;
		}
		
		var prices = priceData.prices.map(function(item) { return item[1]; });
		var timestamps = priceData.prices.map(function(item) { return new Date(item[0]); });
		
		// Chart dimensions
		var width = $chart.width();
		var height = 200;
		var padding = 5;
		
		// Calculate min and max for scaling
		var minPrice = Math.min.apply(null, prices);
		var maxPrice = Math.max.apply(null, prices);
		var priceRange = maxPrice - minPrice || 1;
		
		// Create SVG
		var svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
		svg.setAttribute('viewBox', '0 0 ' + width + ' ' + height);
		svg.setAttribute('preserveAspectRatio', 'xMidYMid meet');
		
		// Create path for line
		var pathData = '';
		var areaData = '';
		
		$.each(prices, function(index, price) {
			var x = (index / (prices.length - 1)) * width;
			var y = height - padding - ((price - minPrice) / priceRange) * (height - padding * 2);
			
			if (index === 0) {
				pathData = 'M' + x + ',' + y;
				areaData = 'M' + x + ',' + height + ' L' + x + ',' + y;
			} else {
				pathData += ' L' + x + ',' + y;
				areaData += ' L' + x + ',' + y;
			}
		});
		
		// Close area path
		areaData += ' L' + width + ',' + height + ' Z';
		
		// Add area
		var area = document.createElementNS('http://www.w3.org/2000/svg', 'path');
		area.setAttribute('d', areaData);
		area.setAttribute('class', 'chart-area');
		svg.appendChild(area);
		
		// Add line
		var line = document.createElementNS('http://www.w3.org/2000/svg', 'path');
		line.setAttribute('d', pathData);
		line.setAttribute('class', 'chart-line');
		svg.appendChild(line);
		
		$chart.append(svg);
		
		// Tooltip offset constants
		var TOOLTIP_OFFSET_X = 10;
		var TOOLTIP_OFFSET_Y = -40;
		
		// Create single tooltip instance
		$tooltip = $('<div class="chart-tooltip"></div>').appendTo('body');
		
		$chart.on('mousemove', function(e) {
			var offset = $chart.offset();
			var x = e.pageX - offset.left;
			var chartWidth = $chart.width();
			var relX = x / chartWidth;
			var index = Math.round(relX * (prices.length - 1));
			index = Math.max(0, Math.min(prices.length - 1, index));
			
			var price = prices[index];
			var date = timestamps[index];
			
			$tooltip.html(
				date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'}) +
				'<br>$' + price.toFixed(2)
			);
			
			// Calculate tooltip position with boundary detection
			var tooltipX = e.pageX + TOOLTIP_OFFSET_X;
			var tooltipY = e.pageY + TOOLTIP_OFFSET_Y;
			var tooltipWidth = $tooltip.outerWidth();
			var tooltipHeight = $tooltip.outerHeight();
			var viewportWidth = $(window).width();
			var viewportHeight = $(window).height();
			
			// Adjust if tooltip goes off right edge
			if (tooltipX + tooltipWidth > viewportWidth) {
				tooltipX = e.pageX - tooltipWidth - TOOLTIP_OFFSET_X;
			}
			
			// Adjust if tooltip goes off top edge
			if (tooltipY < 0) {
				tooltipY = e.pageY + 20;
			}
			
			$tooltip.css({
				display: 'block',
				left: tooltipX,
				top: tooltipY
			});
		});
		
		$chart.on('mouseleave', function() {
			$tooltip.hide();
		});
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
	 * Load and display data for selected cryptocurrency
	 */
	function loadCryptoData(coinId) {
		hideError();
		
		// Find the crypto in our data
		var crypto = null;
		$.each(cryptoData, function(index, c) {
			if (c.id === coinId) {
				crypto = c;
				return false;
			}
		});
		
		if (crypto) {
			displayPrice(crypto);
		}
		
		// Fetch and display price history
		fetchPriceHistory(coinId).done(function(priceHistory) {
			renderChart(priceHistory);
		});
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
		$price = $('#crypto-price');
		$chart = $('#crypto-chart');
		$error = $('#crypto-error');
		
		// Fetch top cryptocurrencies
		fetchTopCryptos().done(function(data) {
			cryptoData = data;
			
			if (!cryptoData || cryptoData.length === 0) {
				showError(strings.error_list);
				return;
			}
			
			// Populate dropdown
			populateDropdown(cryptoData);
			
			// Load data for first cryptocurrency
			loadCryptoData(cryptoData[0].id);
			
			// Setup change event listener
			$select.on('change', function() {
				loadCryptoData($(this).val());
			});
		});
	}
	
	// Initialize when document is ready
	$(document).ready(init);
	
})(jQuery);
