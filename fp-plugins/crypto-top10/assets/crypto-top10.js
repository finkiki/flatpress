/**
 * Crypto Top 10 Widget - JavaScript
 * Fetches cryptocurrency data from CoinGecko API and displays charts
 */

(function() {
	'use strict';
	
	// Get localized strings from global variable
	const strings = window.CRYPTO_TOP10_STRINGS || {
		loading: 'Loading...',
		unavailable: 'Unavailable',
		error_list: 'Error loading cryptocurrency list',
		error_price: 'Error loading price data',
		select: 'Select cryptocurrency'
	};
	
	let cryptoData = [];
	let currentChart = null;
	
	// CoinGecko API endpoints
	const API_BASE = 'https://api.coingecko.com/api/v3';
	const LIST_URL = `${API_BASE}/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false`;
	
	/**
	 * Fetch the top 10 cryptocurrencies
	 */
	async function fetchTopCryptos() {
		try {
			const response = await fetch(LIST_URL);
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
			const data = await response.json();
			return data;
		} catch (error) {
			console.error('Error fetching crypto list:', error);
			showError(strings.error_list);
			return null;
		}
	}
	
	/**
	 * Fetch 7-day price history for a specific cryptocurrency
	 */
	async function fetchPriceHistory(coinId) {
		const url = `${API_BASE}/coins/${coinId}/market_chart?vs_currency=usd&days=7&interval=hourly`;
		try {
			const response = await fetch(url);
			if (!response.ok) {
				throw new Error('Network response was not ok');
			}
			const data = await response.json();
			return data;
		} catch (error) {
			console.error('Error fetching price history:', error);
			showError(strings.error_price);
			return null;
		}
	}
	
	/**
	 * Populate the dropdown with cryptocurrency options
	 */
	function populateDropdown(cryptos) {
		const select = document.getElementById('crypto-select');
		if (!select) return;
		
		// Clear existing options
		select.innerHTML = '';
		
		// Add options for each cryptocurrency
		cryptos.forEach((crypto, index) => {
			const option = document.createElement('option');
			option.value = crypto.id;
			option.textContent = `${crypto.name} (${crypto.symbol.toUpperCase()})`;
			select.appendChild(option);
		});
		
		// Set first option as selected
		if (cryptos.length > 0) {
			select.value = cryptos[0].id;
		}
	}
	
	/**
	 * Display current price
	 */
	function displayPrice(crypto) {
		const priceDiv = document.getElementById('crypto-price');
		if (!priceDiv || !crypto) return;
		
		const price = crypto.current_price !== undefined ? 
			`$${crypto.current_price.toLocaleString('en-US', {minimumFractionDigits: 2, maximumFractionDigits: 2})}` : 
			strings.unavailable;
		
		priceDiv.textContent = price;
	}
	
	/**
	 * Render the price chart using Chart.js
	 */
	function renderChart(priceData) {
		const canvas = document.getElementById('crypto-chart');
		if (!canvas) return;
		
		// Destroy existing chart if it exists
		if (currentChart) {
			currentChart.destroy();
		}
		
		if (!priceData || !priceData.prices || priceData.prices.length === 0) {
			showError(strings.error_price);
			return;
		}
		
		// Extract prices and timestamps
		const prices = priceData.prices.map(item => item[1]);
		const timestamps = priceData.prices.map(item => new Date(item[0]));
		
		// Create chart
		const ctx = canvas.getContext('2d');
		currentChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: timestamps,
				datasets: [{
					data: prices,
					borderColor: '#4CAF50',
					backgroundColor: 'rgba(76, 175, 80, 0.1)',
					borderWidth: 2,
					pointRadius: 0,
					pointHoverRadius: 4,
					pointHoverBackgroundColor: '#4CAF50',
					pointHoverBorderColor: '#fff',
					pointHoverBorderWidth: 2,
					tension: 0.4,
					fill: true
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false
					},
					tooltip: {
						enabled: true,
						mode: 'index',
						intersect: false,
						callbacks: {
							title: function(context) {
								const date = new Date(context[0].label);
								return date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
							},
							label: function(context) {
								return '$' + context.parsed.y.toFixed(2);
							}
						},
						backgroundColor: 'rgba(0, 0, 0, 0.8)',
						padding: 10,
						cornerRadius: 4
					}
				},
				scales: {
					x: {
						display: false
					},
					y: {
						display: false
					}
				},
				interaction: {
					mode: 'nearest',
					axis: 'x',
					intersect: false
				}
			}
		});
	}
	
	/**
	 * Show error message
	 */
	function showError(message) {
		const errorDiv = document.getElementById('crypto-error');
		if (errorDiv) {
			errorDiv.textContent = message;
			errorDiv.style.display = 'block';
		}
	}
	
	/**
	 * Hide error message
	 */
	function hideError() {
		const errorDiv = document.getElementById('crypto-error');
		if (errorDiv) {
			errorDiv.style.display = 'none';
		}
	}
	
	/**
	 * Load and display data for selected cryptocurrency
	 */
	async function loadCryptoData(coinId) {
		hideError();
		
		// Find the crypto in our data
		const crypto = cryptoData.find(c => c.id === coinId);
		if (crypto) {
			displayPrice(crypto);
		}
		
		// Fetch and display price history
		const priceHistory = await fetchPriceHistory(coinId);
		if (priceHistory) {
			renderChart(priceHistory);
		}
	}
	
	/**
	 * Initialize the widget
	 */
	async function init() {
		// Check if widget exists on page
		const widget = document.getElementById('crypto-top10-widget');
		if (!widget) return;
		
		// Fetch top cryptocurrencies
		cryptoData = await fetchTopCryptos();
		if (!cryptoData || cryptoData.length === 0) {
			return;
		}
		
		// Populate dropdown
		populateDropdown(cryptoData);
		
		// Load data for first cryptocurrency
		await loadCryptoData(cryptoData[0].id);
		
		// Setup change event listener
		const select = document.getElementById('crypto-select');
		if (select) {
			select.addEventListener('change', function() {
				loadCryptoData(this.value);
			});
		}
	}
	
	// Initialize when DOM is ready
	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', init);
	} else {
		init();
	}
})();
