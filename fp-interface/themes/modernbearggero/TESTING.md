# Bearggero Theme Testing Guide

## Prerequisites
- FlatPress 1.5 RC installation
- PHP 7.2+ (tested with PHP 8.3)
- Web server (Apache, Nginx, or PHP built-in server)

## Installation & Activation Testing

### 1. Install the Theme
1. Verify theme files exist in `fp-interface/themes/bearggero/`
2. Log into FlatPress admin panel
3. Navigate to: **Admin Panel > Themes**
4. Verify "Bearggero" appears in the theme list
5. Click "Activate" on Bearggero theme
6. **Expected Result**: Theme activates without 500 errors

### 2. Initial Theme Appearance
1. Visit the blog homepage
2. **Expected Results**:
   - Page loads without errors
   - Header displays with site title
   - Navigation menu appears in header
   - Default "Home" link appears if no widgets configured
   - Footer displays with FlatPress credit
   - Sidebar shows default welcome widget if no widgets configured

## Template Testing

### 3. Homepage/Index Page
1. Navigate to blog homepage
2. **Verify**:
   - Site title and subtitle display correctly
   - Blog posts display in entry format
   - Entry titles are clickable
   - Entry metadata shows (author, date, categories)
   - Pagination links appear if multiple pages exist
   - Sidebar widgets display

### 4. Single Post Page
1. Click on any blog post title
2. **Verify**:
   - Post content displays fully
   - Entry header shows title and metadata
   - Entry footer shows author, date, category info
   - Comments section appears (if enabled)
   - Comment form displays (if comments not locked)
   - Sidebar widgets display

### 5. Static Page
1. Navigate to a static page (if configured)
2. **Verify**:
   - Page title displays
   - Page content renders correctly
   - Sidebar widgets display
   - No entry-specific metadata shown

### 6. Archive/Category Pages
1. Navigate to archive or category page
2. **Verify**:
   - Multiple entries display
   - Pagination works
   - Layout matches homepage

### 7. Search Results
1. Use search functionality
2. **Verify**:
   - Search results display
   - Layout is consistent
   - No layout breaks

## Navigation Menu Testing

### 8. Configure Navigation Widget
1. Go to **Admin Panel > Static Pages**
2. Create a static page (e.g., "About")
3. Go to **Admin Panel > Widgets > BlockParser**
4. Enable the static page
5. Go to **Admin Panel > Widgets**
6. Find BlockParser widget for your page
7. Drag it to the **Navigation** widget area
8. Visit homepage
9. **Verify**:
   - Custom menu item appears in header
   - Link works correctly
   - Multiple menu items can be added

### 9. Mobile Menu Toggle
1. Resize browser to mobile width (< 768px) or use mobile device
2. **Verify**:
   - Hamburger menu button (☰) appears
   - Navigation menu is hidden initially
   - Clicking toggle button reveals menu
   - Menu items are vertically stacked
   - Menu items have adequate touch spacing (44px+)
   - Clicking toggle again hides menu

## Responsive Design Testing

### 10. Desktop View (> 1025px)
1. View on desktop resolution
2. **Verify**:
   - Content max-width is 1200px, centered
   - Main content is ~65% width
   - Sidebar is ~30% width
   - Navigation menu displays horizontally
   - No mobile menu toggle visible

### 11. Tablet View (769px - 1024px)
1. Resize to tablet width
2. **Verify**:
   - Content adjusts proportionally
   - Main content is ~60% width
   - Sidebar is ~35% width
   - Layout remains two-column
   - Footer widgets display in 2-column grid

### 12. Mobile View (< 768px)
1. Resize to mobile width
2. **Verify**:
   - Layout switches to single column
   - Main content full width
   - Sidebar appears below content
   - Mobile menu toggle appears
   - Footer widgets display single column
   - Touch targets are 44px+ minimum
   - Font size adequate for mobile (16px prevents zoom on iOS)

### 13. Landscape Mobile View
1. Use mobile device in landscape mode
2. **Verify**:
   - Header layout adjusts appropriately
   - Menu toggle remains functional
   - Content readable

## Media Testing

### 14. Responsive Images
1. View post with images
2. **Verify**:
   - Images scale to fit container
   - Images don't overflow on mobile
   - Aspect ratio maintained
   - Image quality acceptable

### 15. Embedded Content
1. View post with iframe/video embed
2. **Verify**:
   - Embedded content responsive
   - Video/iframe scales properly on mobile
   - No horizontal scrolling

## Widget Testing

### 16. Sidebar Widgets
1. Configure various sidebar widgets (calendar, categories, archives, etc.)
2. **Verify**:
   - Widgets display correctly
   - Widget titles styled appropriately
   - Widget content renders properly
   - No layout breaks

### 17. Footer Widgets
1. Add widgets to footer area
2. **Verify**:
   - Footer widgets display in grid layout
   - Grid adjusts for different screen sizes
   - Footer widget styling consistent

### 18. Missing Widgets Fallback
1. Remove all sidebar widgets
2. **Verify**:
   - Default welcome message appears
   - No empty/broken sidebar
3. Remove all navigation widgets
4. **Verify**:
   - Default "Home" link appears
   - No broken header menu

## Forms & Interactions

### 19. Comment Form
1. Navigate to post with comments enabled
2. **Verify**:
   - Comment form displays
   - Form inputs styled properly
   - Submit button styled
   - Form responsive on mobile

### 20. Search Form
1. Use search widget/form
2. **Verify**:
   - Search input styled
   - Search button functional
   - Form responsive

## Browser Testing

### 21. Cross-Browser Compatibility
Test in:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

**Verify**:
- Consistent appearance
- CSS works correctly
- JavaScript functions properly
- No console errors

## Accessibility Testing

### 22. Keyboard Navigation
1. Use Tab key to navigate
2. **Verify**:
   - Focus indicators visible
   - All links/buttons reachable
   - Menu toggle accessible via keyboard
   - Logical tab order

### 23. Screen Reader
1. Use screen reader tool
2. **Verify**:
   - Screen reader text available for menu toggle
   - ARIA attributes present
   - Content structure logical
   - Images have alt text (if content includes them)

## Performance Testing

### 24. Page Load
1. Test page load times
2. **Verify**:
   - CSS loads correctly
   - No 404 errors for assets
   - No console errors
   - Page renders quickly

### 25. Print View
1. Use browser print preview (Ctrl+P)
2. **Verify**:
   - Header/navigation hidden
   - Sidebar hidden
   - Content readable
   - Print-specific styles active

## Dark Mode Testing

### 26. Dark Mode Support
1. Set system to dark mode (if supported)
2. Visit blog
3. **Verify**:
   - Colors adjust for dark mode
   - Contrast remains readable
   - No white/light backgrounds

## Admin Panel Testing

### 27. Admin Panel Access
1. Access admin panel while Bearggero is active
2. **Verify**:
   - Admin panel loads correctly
   - Admin styles apply
   - No layout issues
   - All admin functions work

## Error Conditions

### 28. Missing Content
1. Navigate to non-existent page
2. **Verify**:
   - Error page displays properly
   - Layout maintained
   - No 500 errors

### 29. Empty States
1. View theme with no posts
2. **Verify**:
   - Appropriate empty message
   - No layout breaks

## Documentation Review

### 30. README Accuracy
1. Follow README setup instructions
2. **Verify**:
   - Instructions accurate
   - All mentioned features work
   - Examples correct

## Final Checks

### 31. Code Quality
- [x] No PHP syntax errors
- [x] No Smarty deprecated constructs
- [x] Proper isset() checks throughout
- [x] Code review passed
- [x] Security scan passed

### 32. File Structure
- [x] All required templates present
- [x] CSS files properly structured
- [x] Language files included
- [x] README documentation complete

## Test Results Summary

Record results for each test:
- ✓ Pass
- ✗ Fail (document issue)
- ⚠ Partial (document limitation)
- N/A (Not applicable)

## Known Limitations

Document any known limitations or issues discovered during testing.

## Recommendations

Document any suggestions for future improvements.
