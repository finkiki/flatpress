# Crypto Top 10 Plugin

## Overview
The Crypto Top 10 plugin displays the top 10 cryptocurrencies by market cap using CoinGecko's public API. It provides a dropdown to select cryptocurrencies and displays a 7-day price chart.

## Requirements
- **jQuery plugin must be enabled** - This plugin requires the FlatPress jQuery plugin (3.7.1) to be activated.

## Features
- Shows top 10 cryptocurrencies by market cap
- Dropdown selector for cryptocurrency selection
- Displays current price in USD
- 7-day price evolution line chart with hover tooltips
- Simple SVG-based chart (no external chart libraries)
- Minimal UI design suitable for sidebar widgets
- Responsive design that fits leggerov2 theme
- Full localization support for all 15 FlatPress languages

## Installation
1. **Enable the jQuery plugin first** - Go to Admin > Plugins and enable the "jQuery" plugin
2. Enable the "Crypto Top 10" plugin
3. Go to Admin > Widgets
4. Add the "Crypto Top 10" widget to your desired sidebar (recommended: right sidebar)

## Usage
Once the widget is added to a sidebar, it will automatically:
1. Fetch the top 10 cryptocurrencies from CoinGecko API
2. Display them in a dropdown menu
3. Show the current price for the selected cryptocurrency
4. Render a 7-day price chart with hourly data points
5. Update the chart when a different cryptocurrency is selected

## API Information
- **API Provider**: CoinGecko (https://www.coingecko.com)
- **API Key**: Not required (uses public API)
- **Rate Limits**: Standard CoinGecko free tier limits apply
- **Endpoints Used**:
  - Markets list: `/api/v3/coins/markets`
  - Price history: `/api/v3/coins/{id}/market_chart`

## Chart Features
- SVG-based line chart showing 7-day price evolution
- Minimal design with no axes or gridlines
- Hover tooltip displays:
  - Date and time
  - Price in USD (formatted)
- Smooth line with gradient fill
- Responsive SVG that adapts to container width

## Technical Details
- **Dependencies**: jQuery 3.7.1 (via FlatPress jQuery plugin)
- **Chart**: Custom SVG-based rendering (no external libraries)
- **API Calls**: Made client-side using jQuery AJAX
- **Error Handling**: Graceful degradation with user-friendly error messages
- **Performance**: Minimal impact, data fetched only when widget is visible
- **Browser Compatibility**: Modern browsers supporting SVG

## Localization
The plugin includes translations for:
- Czech (cs-cz)
- Danish (da-dk)
- German (de-de)
- Greek (el-gr)
- English (en-us)
- Spanish (es-es)
- Basque (eu-es)
- French (fr-fr)
- Italian (it-it)
- Japanese (ja-jp)
- Dutch (nl-nl)
- Portuguese (pt-br)
- Russian (ru-ru)
- Slovenian (sl-si)
- Turkish (tr-tr)

## File Structure
```
fp-plugins/crypto-top10/
├── assets/
│   ├── crypto-top10.css    # Sidebar-friendly styles
│   └── crypto-top10.js     # CoinGecko API integration & SVG chart logic
├── img/                     # Placeholder for future images
├── inc/                     # Placeholder for future includes
├── lang/                    # Language files for all locales
│   ├── lang.cs-cz.php
│   ├── lang.da-dk.php
│   └── ... (15 total)
└── plugin.crypto-top10.php  # Main plugin file
```

## Technical Details
- **Dependencies**: jQuery 3.7.1 (via FlatPress jQuery plugin)
- **Chart**: Custom SVG-based rendering (no external libraries)
- **API Calls**: Made client-side using jQuery AJAX
- **Error Handling**: Graceful degradation with user-friendly error messages
- **Performance**: Minimal impact, data fetched only when widget is visible
- **Browser Compatibility**: Modern browsers supporting SVG

## Troubleshooting

### Widget not displaying
- Ensure the **jQuery plugin is enabled** in Admin > Plugins
- Ensure the crypto-top10 plugin is enabled in Admin > Plugins
- Check that the widget is added to a sidebar in Admin > Widgets
- Verify browser console for JavaScript errors

### No cryptocurrency data showing
- Check internet connectivity
- Verify CoinGecko API is accessible from your server
- Check browser console for API errors
- CoinGecko may have rate limits; wait a few minutes and retry

### Chart not rendering
- Ensure jQuery plugin is enabled and loading correctly
- Check browser console for loading errors
- Verify JavaScript is enabled in the browser
- Check that your browser supports SVG

## License
This plugin is part of FlatPress and is distributed under the GNU GPLv2 license.

## Credits
- CoinGecko for providing the free cryptocurrency API
- Chart.js for the charting library
- FlatPress community
