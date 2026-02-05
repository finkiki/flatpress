# Navigation Menu Setup Examples

## Example 1: Simple Navigation Menu

Create static pages and then enable them as navigation items.

### Step 1: Create Static Pages

Go to **Admin Panel > Static Pages** and create these pages:

#### About Page
```
Title: About
Content: Information about your blog...
```

#### Contact Page
```
Title: Contact
Content: Contact information...
```

### Step 2: Create BlockParser Navigation Items

Create files in `fp-content/static/` for navigation links:

#### File: `nav-home.txt`
```
Subject: Home
Content: <li><a href="./">Home</a></li>
```

#### File: `nav-about.txt`
```
Subject: About
Content: <li><a href="static.php?page=about">About</a></li>
```

#### File: `nav-contact.txt`
```
Subject: Contact
Content: <li><a href="static.php?page=contact">Contact</a></li>
```

### Step 3: Enable in BlockParser

1. Go to **Admin Panel > Widgets > BlockParser**
2. Enable: nav-home, nav-about, nav-contact
3. Go to **Admin Panel > Widgets**
4. Drag these widgets to the **Navigation** area
5. Save

## Example 2: Navigation with Dropdown (using nested lists)

#### File: `nav-resources.txt`
```
Subject: Resources
Content: <li class="menu-item-has-children">
    <a href="#">Resources</a>
    <ul class="sub-menu">
        <li><a href="static.php?page=docs">Documentation</a></li>
        <li><a href="static.php?page=tutorials">Tutorials</a></li>
    </ul>
</li>
```

Note: You'll need to add additional CSS for dropdown functionality.

## Example 3: Navigation with Icons

#### File: `nav-home-icon.txt`
```
Subject: Home
Content: <li><a href="./"><span class="icon">🏠</span> Home</a></li>
```

## Example 4: External Links in Navigation

#### File: `nav-github.txt`
```
Subject: GitHub
Content: <li><a href="https://github.com/yourusername" target="_blank" rel="noopener">GitHub</a></li>
```

## Custom CSS for Navigation

Add this to your custom CSS if you want to style the navigation further:

```css
/* Custom navigation styles */
.nav-menu .menu-item-has-children {
    position: relative;
}

.nav-menu .sub-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: var(--header-bg);
    list-style: none;
    padding: 0.5rem 0;
    min-width: 200px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}

.nav-menu .menu-item-has-children:hover .sub-menu {
    display: block;
}

.nav-menu .icon {
    margin-right: 0.5rem;
}
```

## Tips

1. **Keep URLs Simple**: Use relative paths for internal links
2. **Order Matters**: The order of widgets in the Navigation area determines menu order
3. **Mobile Friendly**: Keep menu items concise for mobile display
4. **Test Links**: Always test links after adding them
5. **Use BlockParser**: The BlockParser plugin is the easiest way to add custom menu items

## Troubleshooting

### Menu items don't appear
- Check that BlockParser plugin is enabled
- Verify widgets are in the "Navigation" area
- Clear FlatPress cache if enabled

### Menu items not clickable on mobile
- Ensure touch targets are at least 44px
- The theme already handles this, but custom CSS might override it

### Menu doesn't toggle on mobile
- Check JavaScript console for errors
- Ensure footer.tpl is included (contains the menu toggle script)

## Alternative: Using the Categories Widget

You can also use the Categories widget in the navigation area to create a category-based menu:

1. Go to **Admin Panel > Widgets**
2. Find "Categories" widget
3. Drag it to "Navigation" area
4. Categories will appear as navigation links
