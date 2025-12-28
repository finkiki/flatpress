# Entry Password Protection Plugin

## Overview

The Entry Password Protection plugin allows FlatPress administrators to password-protect individual blog entries and static pages. Protected content remains completely hidden until the correct password is provided by the visitor.

## Features

- **Per-Entry Protection**: Set optional passwords for individual blog posts and static pages
- **Secure Storage**: Passwords are hashed using PHP's `password_hash()` function (bcrypt)
- **Session-Based Unlocking**: Once unlocked, content remains accessible for the session
- **RSS Protection**: Protected content doesn't leak through RSS feeds
- **Comment Hiding**: Comments are automatically hidden for protected entries
- **Multilingual**: Includes translations for 15 languages
- **Responsive Design**: Mobile-friendly password form with accessible markup
- **Theme Compatible**: Works with all FlatPress themes

## Installation

1. Copy the `entrypassword` folder to `fp-plugins/`
2. Enable the plugin in FlatPress admin panel (Plugins > Entry Password Protection)
3. The plugin is now active

## Usage

### Protecting Content

1. Create or edit a blog entry or static page
2. Scroll to the "Password Protection" section at the bottom of the editor
3. Enter a password in the "Password (optional)" field
4. Save the entry/page

**Note**: The password field is always empty when editing to prevent exposure. The current status (Protected/Public) is shown below the field.

### Removing Protection

1. Edit the protected entry/page
2. Leave the password field empty
3. Save the entry/page

### Viewing Protected Content

1. Visitors will see a password form instead of the content
2. Enter the correct password and submit
3. Content is unlocked for the current session
4. Comments and full content become visible

## Technical Details

### Password Storage

- Passwords are hashed using `PASSWORD_DEFAULT` (currently bcrypt)
- Hashes are stored in `fp-content/entrypassword/`
- File format: `entry_[ID].dat` or `static_[ID].dat`

### Session Management

- Uses PHP sessions to track unlocked entries per visitor
- Session key format: `entrypassword_[type]_[id]`
- Sessions persist until browser is closed or session expires

### Security Features

- Passwords never stored in plain text
- Hashes never exposed to client
- Input sanitization on all user inputs
- CSRF protection through form submission
- No timing attack vulnerabilities in verification

### Hooks Used

#### Admin Panel
- `simple_metatag_info`: Adds password field to entry/static editors
- `publish_post`: Saves password when entry is published
- `title_save_pre`: Saves password when static page is saved

#### Frontend
- `init`: Handles password form submissions (priority 5)
- `the_content`: Replaces content with password form if protected (priority 5)
- `the_content_rss`: Hides content in RSS feeds (priority 5)
- `wp_head`: Adds CSS stylesheet and sets comment lock (priorities 0, 15)

### Theme Integration

The plugin sets the following Smarty variables when content is protected:

- `$entrypassword_protected`: Set to `true` when password form is displayed
- `$entry_commslock`: Set to `true` to hide comment form

Themes can use these variables for additional customization:

```smarty
{if $entrypassword_protected}
    <!-- Show special message for protected content -->
{/if}
```

## Styling

The plugin includes scoped CSS with the following features:

- **Responsive**: Adapts to mobile, tablet, and desktop screens
- **Accessible**: High contrast mode support, focus states, ARIA attributes
- **Dark Mode**: Respects `prefers-color-scheme: dark`
- **Reduced Motion**: Respects `prefers-reduced-motion` for animations

### CSS Classes

- `.entrypassword-protected`: Main container
- `.entrypassword-box`: Password form box
- `.entrypassword-heading`: Form heading
- `.entrypassword-description`: Instructions text
- `.entrypassword-error`: Error message
- `.entrypassword-form`: Form element
- `.entrypassword-field`: Field container
- `.entrypassword-input`: Password input
- `.entrypassword-submit`: Submit button

## Translations

The plugin includes translations for:

- English (en-us)
- Czech (cs-cz)
- Danish (da-dk)
- German (de-de)
- Greek (el-gr)
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

## Compatibility

- **PHP**: 8.3+ (uses password_hash, password_verify, null coalescing operator)
- **FlatPress**: 1.5 rc (master branch)
- **Smarty**: 5.7.0

## Accessibility

The plugin follows WCAG 2.1 Level AA guidelines:

- Proper label-input associations
- ARIA attributes (`aria-required`, `role="alert"`)
- Keyboard navigation support
- Focus indicators
- Error messages announced to screen readers
- Sufficient color contrast ratios

## Troubleshooting

### Password form doesn't appear

- Check that the plugin is enabled
- Verify password file exists in `fp-content/entrypassword/`
- Clear browser cache and cookies

### Can't unlock content with correct password

- Check PHP error logs
- Verify sessions are working (`session.save_path`)
- Try a different browser
- Check for conflicting plugins

### Passwords reset after update

- Don't delete `fp-content/entrypassword/` directory
- Backup this directory before updates

## Development

### Adding Custom Behavior

You can hook into the plugin's functionality:

```php
// Example: Log when content is unlocked
add_action('init', function() {
    if (isset($_POST['entrypassword_submit'])) {
        // Custom logging code here
    }
}, 6); // Priority 6, after plugin's handler
```

### Testing

Manual testing checklist:

1. ✓ Public entry displays normally
2. ✓ Protected entry shows password form
3. ✓ Correct password unlocks content
4. ✓ Incorrect password shows error
5. ✓ Static pages work
6. ✓ Session persists across page loads
7. ✓ Comments hidden when locked
8. ✓ RSS doesn't leak content
9. ✓ Mobile/responsive layout
10. ✓ Accessibility (screen reader, keyboard)

## License

This plugin is part of FlatPress and follows the same license.

## Support

For issues or questions:
- Visit: https://flatpress.org
- Forum: https://flatpress.org/forum/
- GitHub: https://github.com/flatpressblog/flatpress

## Credits

Developed for FlatPress by the FlatPress community.

---

**Version**: 1.0.0  
**Last Updated**: December 2024
