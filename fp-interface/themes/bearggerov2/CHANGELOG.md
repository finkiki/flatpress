# Bearggero Theme Changelog

## Version 1.2 (December 2024)

### Smarty 5.5+ Compatibility
- **Fixed**: All deprecated Smarty syntax issues that caused 500 errors
- **Fixed**: Changed all `{include file=template.tpl}` to `{include file="template.tpl"}` (quoted syntax)
- **Fixed**: Replaced `$flatpress.charset` with `$fp_config.locale.charset` 
- **Fixed**: Updated conditional syntax: `{if $var}` → `{if isset($var) and $var}`
- **Fixed**: Added `isset()` checks for `$rawcontent`, `$categories`, `$entry_commslock`, `$smarty.get.x`
- **Fixed**: Updated date_format to use backtick syntax: `date_format:$fp_config.locale.dateformat` → `date_format:"\`$fp_config.locale.dateformat\`"`
- **Fixed**: Added `isset()` checks in cpheader.tpl for `$panel` and `$action` variables

### Enhanced Responsive Design
- **Added**: New 480px breakpoint for small mobile devices
- **Improved**: Typography scaling at all breakpoints (900px, 600px, 480px)
  - Desktop (>900px): Base sizing maintained
  - Tablet (600-900px): Reduced to 18px main font, centered navigation
  - Mobile Large (480-600px): 17px main font, stacked layout elements
  - Mobile Small (<480px): 16px main font, full-width buttons
- **Improved**: Form input handling - set to 16px font size to prevent iOS zoom on focus
- **Improved**: Comment section layout on mobile
  - Comment name and date stack vertically on screens <600px
  - Full-width comment sections on mobile
- **Improved**: Navigation buttons
  - Center-aligned on tablets
  - Flexible sizing (140px min) on mobile
  - Full-width on screens <480px
- **Improved**: Content spacing and padding optimized for smaller screens
- **Improved**: Blockquote and pre elements responsive sizing (95% width on mobile)
- **Improved**: Body container padding scales with screen size

### Documentation
- **Updated**: Complete rewrite of README.md with modern Markdown formatting
- **Added**: Comprehensive compatibility information (FlatPress 1.5 RC, Smarty 5.5+)
- **Added**: Detailed feature list and responsive breakpoint documentation
- **Added**: Step-by-step installation instructions
- **Added**: Widget configuration guide with code examples
- **Added**: Working with entries guide (images, iFrames)
- **Added**: Static pages and menu setup instructions
- **Added**: Recommended plugins list
- **Added**: Credits and license information
- **Added**: This CHANGELOG.md file

### Version Updates
- **Updated**: Theme version from 1.1 to 1.2 in theme.conf.php
- **Updated**: Style version from 1.1 to 1.2 in style.conf.php
- **Updated**: Theme description to mention Smarty 5.5+ compatibility

### Technical Improvements
- **Verified**: No deprecated `{php}` blocks present
- **Verified**: No `create_function` usage
- **Verified**: All template includes use proper syntax
- **Verified**: All conditional statements use proper isset checks

### Testing
- ✅ All template syntax validated against Smarty 5.5+ requirements
- ✅ Responsive CSS reviewed across all breakpoints
- ✅ No deprecated syntax or security issues found
- ⏳ Live instance testing pending (requires FlatPress setup)

## Version 1.1 (Previous Release)
- Initial responsive layout updates
- Basic mobile device support
- Updated for FlatPress 1.5 compatibility (partial)

## Version 1.0 (Original Release)
- Original theme by Darren Guinness & Alvin Jude
- Based on Leggero theme
- Desktop-focused design
- Custom widget support (sticky, Menus)
- HD image support with hdImg class
- Custom admin panel styling
