(function ($) {
	'use strict';

	var strings = (window.cryptoTop10Config && window.cryptoTop10Config.strings) ? window.cryptoTop10Config.strings : {};
	var txt = function (key, fallback) {
		return strings[key] || fallback || '';
	};

	var fmtError = function (tpl, msg) {
		return (tpl || '').replace('{msg}', msg);
	};

	var listUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false';
	var historyUrl = function (id) {
		return 'https://api.coingecko.com/api/v3/coins/' + encodeURIComponent(id) + '/market_chart?vs_currency=usd&days=7&interval=hourly';
	};

	var formatPrice = function (value) {
		if (isNaN(value)) {
			return txt('unavailable', 'Unavailable');
		}
		if (value >= 1000) {
			return '$' + value.toLocaleString(undefined, { maximumFractionDigits: 0 });
		}
		return '$' + value.toLocaleString(undefined, { minimumFractionDigits: 2, maximumFractionDigits: 6 });
	};

	$(function () {
		$('.crypto-top10-widget').each(function () {
			var $widget = $(this);
			var $select = $widget.find('.crypto-top10-select');
			var $price = $widget.find('.crypto-top10-price');
			var $error = $widget.find('.crypto-top10-error');
			var $canvas = $widget.find('.crypto-top10-chart');
			var chart = null;
			var currentList = [];

			var setError = function (message) {
				$error.text(message || '');
			};

			var drawChart = function (points) {
				if (!$canvas.length || typeof Chart === 'undefined') {
					return;
				}

				var ctx = $canvas[0].getContext('2d');
				if (chart) {
					chart.destroy();
				}

				var labels = points.map(function (p) {
					return new Date(p[0]);
				});
				var values = points.map(function (p) {
					return p[1];
				});

				chart = new Chart(ctx, {
					type: 'line',
					data: {
						labels: labels,
						datasets: [{
							data: values,
							borderColor: '#3b82f6',
							backgroundColor: 'rgba(59, 130, 246, 0.08)',
							tension: 0.25,
							pointRadius: 0,
							borderWidth: 2,
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
								mode: 'index',
								intersect: false,
								callbacks: {
									label: function (ctx) {
										var d = ctx.raw;
										return formatPrice(d);
									},
									title: function (ctx) {
										var dt = ctx[0].label;
										if (!(dt instanceof Date)) {
											return '';
										}
										return dt.toLocaleString();
									}
								}
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
							intersect: false,
							mode: 'nearest'
						},
						elements: {
							point: {
								radius: 0
							}
						}
					}
				});
			};

			var updatePriceLine = function (coin) {
				if (!coin) {
					$price.text(txt('unavailable', 'Unavailable'));
					return;
				}
				$price.text(coin.name + ': ' + formatPrice(coin.current_price));
			};

			var loadHistory = function (coinId) {
				if (!coinId) {
					return;
				}

				var coin = currentList.find(function (c) { return c.id === coinId; });
				updatePriceLine(coin);
				setError('');

				$.ajax({
					url: historyUrl(coinId),
					method: 'GET',
					dataType: 'json',
					timeout: 15000,
					cache: false,
					headers: { 'accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
				})
					.done(function (res) {
						if (!res || !$.isArray(res.prices) || !res.prices.length) {
							setError(fmtError(txt('errorPrice', 'Failed to load price: {msg}'), 'empty response'));
							return;
						}
						drawChart(res.prices);
					})
					.fail(function (xhr) {
						setError(fmtError(txt('errorPrice', 'Failed to load price: {msg}'), xhr && xhr.statusText ? xhr.statusText : 'Error'));
					});
			};

			var populateSelect = function (list) {
				$select.empty();
				list.forEach(function (coin, idx) {
					var option = $('<option>')
						.val(coin.id)
						.text((idx + 1) + '. ' + coin.name + ' (' + coin.symbol.toUpperCase() + ')');
					$select.append(option);
				});
			};

			var loadList = function () {
				$price.text(txt('loading', 'Loading…'));
				setError('');
				$.ajax({
					url: listUrl,
					method: 'GET',
					dataType: 'json',
					timeout: 15000,
					cache: false,
					headers: { 'accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
				})
					.done(function (res) {
						if (!$.isArray(res)) {
							updatePriceLine(null);
							setError(fmtError(txt('errorList', 'Failed to load list: {msg}'), 'invalid response'));
							return;
						}
						currentList = res.slice(0, 10);
						populateSelect(currentList);
						if (currentList.length) {
							loadHistory(currentList[0].id);
						} else {
							updatePriceLine(null);
							setError(fmtError(txt('errorList', 'Failed to load list: {msg}'), 'no data'));
						}
					})
					.fail(function (xhr) {
						updatePriceLine(null);
						setError(fmtError(txt('errorList', 'Failed to load list: {msg}'), xhr && xhr.statusText ? xhr.statusText : 'Error'));
					});
			};

			$select.on('change', function () {
				loadHistory($(this).val());
			});

			loadList();
		});
	});
})(jQuery);
