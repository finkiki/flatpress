# Bearggero Theme for FlatPress

A modern, responsive theme for FlatPress 1.5 RC with full Smarty 5.7.0 compatibility.

## Features

- **Modern Design**: Clean, professional layout with a focus on readability
- **Fully Responsive**: Works seamlessly on desktop, tablet, and mobile devices
- **Mobile Navigation**: Toggle menu for small screens with touch-friendly spacing
- **Header Navigation Menu**: Configurable navigation menu in the header using FlatPress widgets
- **Widget Support**: Multiple widget areas (navigation, sidebar, footer)
- **Smarty 5.7.0 Compatible**: All templates updated to work with the latest Smarty version
- **Accessible**: Keyboard navigation support and screen reader friendly
- **Dark Mode Ready**: Respects user's color scheme preferences

## Installation

1. Copy the `bearggero` folder to `fp-interface/themes/`
2. Log in to your FlatPress admin panel
3. Go to Themes section
4. Activate the Bearggero theme

## Configuration

### Setting Up Navigation Menu

The theme displays a navigation menu in the header. To configure it:

1. Go to **Admin Panel > Widgets**
2. Find the **Navigation** widget area
3. Add widgets you want to appear in the header menu:
   - **BlockParser** widgets work great for custom menu items
   - You can also use other widgets that generate list items

#### Creating Custom Menu Items with BlockParser

1. Go to **Admin Panel > Static Pages**
2. Create new static pages (e.g., "About", "Contact")
3. Go to **Admin Panel > Widgets > BlockParser**
4. Enable the pages you want in your navigation
5. Drag the BlockParser widgets to the **Navigation** area

The BlockParser widget content should be formatted as a simple list:
```
Subject: About
Content: <ul><li><a href="static.php?page=about">About</a></li></ul>
```

### Widget Areas

The theme provides three widget areas:

1. **Navigation** - Appears in the header menu
2. **Sidebar** - Right sidebar on most pages
3. **Footer** - Footer widget area (displays in a grid layout)

### Responsive Breakpoints

- **Mobile**: < 768px (single column, hamburger menu)
- **Tablet**: 769px - 1024px
- **Desktop**: > 1025px
- **Large Desktop**: > 1400px

## Template Files

- `header.tpl` - Site header with navigation
- `footer.tpl` - Site footer with widgets
- `index.tpl` - Blog home page
- `default.tpl` - Default page template
- `static.tpl` - Static pages
- `entry-default.tpl` - Single blog post
- `comments.tpl` - Comments page
- `widgets.tpl` - Sidebar widgets
- `admin.tpl` - Admin panel wrapper
- `preview.tpl` - Theme preview (blog post)
- `previewstatic.tpl` - Theme preview (static page)

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Android)

## Compatibility

- **FlatPress Version**: 1.5 RC (master branch)
- **Smarty Version**: 5.7.0
- **PHP Version**: 7.1+ (tested with PHP 8.3)

## Customization

### Colors

The theme uses CSS custom properties (variables) for easy color customization. 
Edit `bearggero/res/style.css` and modify the `:root` section:

```css
:root {
    --primary-color: #2c5f8d;
    --secondary-color: #5a9fd4;
    --link-color: #2c5f8d;
    /* ... more variables */
}
```

### Layout

Maximum content width can be adjusted by changing `--max-width` variable in `style.css`.

## Changelog

### Version 1.0.0 (2026-01-02)
- Initial release
- Full Smarty 5.7.0 compatibility
- Responsive design with mobile menu
- Header navigation support
- Three widget areas
- Touch-friendly interface
- Accessible design
- Dark mode support

## Credits

Created for the FlatPress project by FlatPress Contributors.

## License

This theme is released under the same license as FlatPress (GNU GPLv2).

## Support

For questions and support, visit:
- FlatPress Forum: https://forum.flatpress.org
- FlatPress Wiki: https://wiki.flatpress.org

## Contributing

Contributions are welcome! Please submit issues and pull requests on the FlatPress GitHub repository.
