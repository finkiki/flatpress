<div id="crypto-top10-widget" class="crypto-top10">
	<div class="crypto-select-wrapper">
		<label for="crypto-select" class="crypto-label">{$crypto_lang.select}:</label>
		<select id="crypto-select" class="crypto-select">
			<option value="">{$crypto_lang.loading}</option>
		</select>
	</div>
	
	<div id="crypto-price" class="crypto-price"></div>
	
	<div class="crypto-chart-wrapper">
		<canvas id="crypto-chart"></canvas>
	</div>
	
	<div id="crypto-error" class="crypto-error" style="display: none;"></div>
</div>
