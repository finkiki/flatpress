# Bearggero Theme for FlatPress 1.5+

A responsive, modern theme for FlatPress focused on contextual separation, readability, and an attractive color palette.

## Compatibility

**FlatPress:** 1.5 RC (master branch)  
**Smarty:** 5.5+ (tested with 5.7.0)  
**PHP:** 7.1+ (as per FlatPress requirements)  
**Browsers:** All modern browsers supporting HTML5 (Chrome, Firefox, Safari, Edge) and mobile browsers

### Recent Updates (December 2024)
- ✅ **Smarty 5.5+ compatibility**: All templates updated with modern Smarty syntax
- ✅ **Fixed 500 errors**: Resolved deprecated syntax issues causing theme failures
- ✅ **Enhanced responsive design**: Improved mobile layout with additional breakpoints
- ✅ **Variable safety**: Added proper `isset()` checks throughout templates

### Known Limitations
- iFrames (YouTube, Vimeo) may not display in some older mobile browsers
- Requires JavaScript for optimal widget functionality

## Features

- **Fully Responsive**: Optimized layouts for desktop (1200px+), tablet (600-900px), and mobile (480px-600px, <480px)
- **Mobile-First**: Touch-friendly navigation and form elements
- **Contextual Design**: Clear visual separation between content sections
- **Readable Typography**: Optimized font sizes and line-heights for all screen sizes
- **Modern Color Palette**: Professional color scheme based on blues and earth tones
- **Flexible Layout**: Support for left and right widget areas
- **Smarty 5.5+ Compatible**: Modern template syntax throughout

## Installation

1. Download or clone this theme into `fp-interface/themes/bearggerov2`
2. Log into your FlatPress admin panel
3. Navigate to the Themes section
4. Select "Bearggero" theme
5. Configure widgets as described below

## Admin Access

For a cleaner look, the admin link is not displayed on the main page. To access the admin panel, append `admin.php` to your URL:

```
example.com/flatpress/ → example.com/flatpress/admin.php
```

**Note:** This theme includes custom admin panel styling with enlarged panels and fonts for better readability.

## Working with Entries

### High Definition Images

For responsive images that scale properly, use the `hdImg` class:

```html
<img class="hdImg" src="fp-content/images/img.png" alt="Description">
```

Or with BBCode's HTML tag:
```
[html]<img class="hdImg" src="fp-content/images/img.png">[/html]
```

Images with the `hdImg` class automatically scale to fill the container width while maintaining aspect ratio.

### Embedded Content (iFrames)

iFrames are automatically styled to fill the entry width (100% width, 600px height). You can customize with inline styles:

```html
<iframe src="https://www.youtube.com/embed/..." 
        style="width: 100%; height: 400px;" 
        frameborder="0" allowfullscreen></iframe>
```

## Static Pages & Menus

### Custom Menu Widget

The theme uses a custom "Menus" widget to display navigation links dynamically. 

**Setup:**
1. Create a static page (e.g., "menu") containing your navigation links in BBCode format
2. Add links without spaces between tags:
   ```
   [url=?]Home[/url][url=?p=about]About[/url][url=?p=contact]Contact[/url]
   ```
3. Configure the widget (see Widgets section below)

**Important:** Spacing matters! Don't include spaces between BBCode tags as they will appear in the rendered menu.

## Widgets Configuration

This theme utilizes custom widgets for enhanced functionality:

### Sticky Widget
Displays a "sticky" post at the top of the homepage that remains even when new entries are added. The sticky content comes from a static page.

### Menus Widget
Dynamically generates the navigation menu from a static page containing BBCode links.

### Widget Setup

Add this code to **Manage Widgets (raw mode)**:

```php
'sticky' => 
array (
  0 => 'blockparser:about',
),
'Menus' => 
array (
  0 => 'blockparser:menu',
),
```

Replace `blockparser:about` and `blockparser:menu` with your actual static page names.

**Standard Widgets:**
- The theme registers `left` and `right` widgetsets for sidebar content
- All standard FlatPress widgets (categories, archives, search, etc.) are supported

## Recommended Plugins

The theme works best with these FlatPress plugins:

- **blockParser**: Required for static page widgets
- **BBcode**: For formatting entries and static pages
- **adminArea**: Enhanced admin panel features
- **categories**: Category management and display
- **jQuery**: JavaScript functionality
- **locker**: Security features
- **QuickSpamFilter**: Comment spam protection
- **BearggeroReadmore** (optional): Custom styling for "Read More" links
  - Download from: https://github.com/dronious/bearggero-readmore
  - Install in `fp-plugins/` directory
  - Enable via admin panel

## Responsive Breakpoints

The theme includes optimized layouts for multiple screen sizes:

- **Desktop (>900px)**: Full two-column layout with sidebar
- **Tablet (600-900px)**: Centered navigation, adjusted typography
- **Mobile Large (480-600px)**: Single column, stacked widgets, optimized spacing
- **Mobile Small (<480px)**: Compact layout, full-width navigation buttons, iOS-optimized form inputs

## Changelog

### Version 1.2 (December 2024)
- **Fixed**: All Smarty 5.5+ compatibility issues
- **Fixed**: 500 errors when theme is selected
- **Added**: Proper `isset()` checks for all template variables
- **Added**: Enhanced responsive layout with additional breakpoints (480px)
- **Improved**: Mobile form input handling (prevents iOS zoom)
- **Improved**: Comment section layout on mobile devices
- **Improved**: Typography scaling across all screen sizes
- **Updated**: All template include statements to use quoted syntax
- **Updated**: Documentation with compatibility notes

### Version 1.1
- Initial responsive layout updates
- Basic mobile device support

### Version 1.0
- Original theme release

## Credits

**Original Authors:** Darren Guinness & Alvin Jude  
**Based on:** Leggero theme by NoWhereMan and Drudo  
**Updated for FlatPress 1.5 & Smarty 5.5+:** 2024

## Support

For issues, questions, or suggestions:
- Visit the [FlatPress Forum](https://forum.flatpress.org)
- Check the [FlatPress Wiki](https://wiki.flatpress.org)
- Report bugs on the FlatPress GitHub repository

## License

This theme is released under the same license as FlatPress (GNU GPLv2).
