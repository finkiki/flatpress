<div class="crypto-top10-widget" data-widget-id="{$crypto_top10_id}">
	<div class="crypto-top10-row">
		<label class="crypto-top10-label" for="crypto-top10-select-{$crypto_top10_id}">{$crypto_top10_strings.CRYPTO_TOP10_SELECT|default:'Select'}</label>
		<select id="crypto-top10-select-{$crypto_top10_id}" class="crypto-top10-select"></select>
	</div>
	<div class="crypto-top10-price" aria-live="polite">
		{$crypto_top10_strings.CRYPTO_TOP10_LOADING|default:'Loading…'}
	</div>
	<canvas class="crypto-top10-chart" width="320" height="140" aria-label="{$crypto_top10_strings.CRYPTO_TOP10_TITLE|default:'Top 10 Cryptos'}"></canvas>
	<div class="crypto-top10-error" role="alert" aria-live="polite"></div>
</div>
