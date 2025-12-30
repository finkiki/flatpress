# Announcement Bar Plugin for FlatPress

A configurable sticky top notification/announcement bar plugin for FlatPress 1.5+.

## Features

- **Sticky Top Bar**: Fixed position notification bar at the top of the page
- **Rich Content**: Supports BBCode and HTML markup for announcement content
- **Visibility Control**: Show on all pages or use pattern-based include/exclude rules
- **Dismissible**: Visitors can close the bar, choice persisted via cookie/localStorage
- **Scheduling**: Set start and end date/time for automatic display window
- **Custom Styling**: Configure background color, text color, font size, padding, and height
- **Responsive**: Mobile-friendly and responsive design
- **Accessible**: ARIA labels, keyboard navigation, focusable close button
- **Multi-language**: Supports 15 languages (en-us, de-de, fr-fr, it-it, es-es, nl-nl, pt-br, ru-ru, ja-jp, cs-cz, da-dk, el-gr, eu-es, sl-si, tr-tr)

## Installation

1. Copy the `announcementbar` folder to your `fp-plugins` directory
2. Go to **Admin Panel → Plugins** and enable the plugin
3. Configure the plugin at **Admin Panel → Plugins → Announcement Bar**

## Configuration

### General Settings
- **Enable announcement bar**: Toggle to show/hide the announcement bar
- **Announcement content**: Enter your message with BBCode/HTML support

### Visibility Settings
- **Display mode**: Choose where to show the bar:
  - Show on all pages
  - Show only on specified paths (include mode)
  - Hide on specified paths (exclude mode)
- **URL patterns**: One pattern per line, use `*` as wildcard
  - Examples: `/blog/*`, `/index.php`, `/static.php*`

### Dismissible Settings
- **Allow visitors to dismiss**: Let visitors close the bar
- **Message version**: Change this to show the bar again to visitors who dismissed it (e.g., increment when you update the message)

### Scheduling
- **Enable scheduling**: Only show during a specific time window
- **Start date/time**: Bar won't appear before this time
- **End date/time**: Bar won't appear after this time

### Styling
- **Background color**: Choose the bar's background color
- **Text color**: Choose the text color
- **Font size**: Set font size in pixels (10-24)
- **Padding**: Set vertical padding in pixels (5-30)
- **Height**: Set minimum height in pixels or "auto"

## Usage Examples

### Simple Announcement
```
Welcome to our new website! Check out our [b]latest features[/b].
```

### Time-Limited Promotion
1. Set content: `🎉 Special offer: 20% off until December 31st! [url=https://example.com/shop]Shop now[/url]`
2. Enable scheduling
3. Set end date to December 31st, 23:59

### Maintenance Notice
1. Set content: `⚠️ Scheduled maintenance on Sunday 2AM-4AM. Service may be unavailable.`
2. Set visibility to "Show on all pages"
3. Make it dismissible with version "maintenance-jan-2024"

### Blog-Only Announcement
1. Set content: `📰 Subscribe to our newsletter for weekly updates!`
2. Set visibility mode to "Show only on specified paths"
3. Add patterns: `/blog/*`, `/index.php`

## Browser Compatibility

- Modern browsers (Chrome, Firefox, Safari, Edge)
- Mobile browsers (iOS Safari, Chrome Mobile)
- Graceful degradation for older browsers

## Requirements

- FlatPress 1.5+ (master branch)
- PHP 8.3+
- Smarty 5.7.0+
- Optional: BBCode plugin for enhanced content formatting

## Technical Details

### Cookies and Local Storage
The plugin uses both cookies and localStorage to persist dismissal state:
- Cookie name: `announcementbar_dismissed`
- localStorage key: `announcementbar_dismissed`
- Value: Message version string

### Security
- All user-provided content is properly escaped
- BBCode rendering follows FlatPress security patterns
- XSS protection via htmlspecialchars
- CSP-compliant inline scripts with nonce

### Accessibility
- ARIA role="banner" on announcement bar
- ARIA label on close button
- Keyboard navigation support (Enter/Space to close)
- Focus management after dismissal
- Sufficient color contrast with default colors

## License

This plugin is part of the FlatPress standard distribution.

## Support

For issues, questions, or contributions, please visit:
- FlatPress Website: https://www.flatpress.org
- FlatPress GitHub: https://github.com/flatpressblog/flatpress

## Changelog

### Version 1.0.0
- Initial release
- Sticky top announcement bar
- Configurable content with BBCode/HTML support
- Visibility rules (all/include/exclude patterns)
- Dismissible with version-based reset
- Scheduling with start/end date/time
- Custom styling options
- Multi-language support (15 languages)
- Responsive and accessible design
