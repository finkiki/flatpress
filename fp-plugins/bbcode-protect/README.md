# BBCode Content Protection Plugin

Version: 1.0.0

A FlatPress plugin that allows password-protecting content blocks using BBCode `[protect]...[/protect]` tags. Compatible with FlatPress master (1.5 rc) and Smarty 5.5+.

## Features

- **BBCode Tag**: Use `[protect]...[/protect]` to password-protect content sections
- **Per-Entry Passwords**: Set a password for an entire entry (stored securely with password_hash)
- **Inline Passwords**: Optionally use `[protect pwd="password"]...[/protect]` for block-specific passwords
- **Session Management**: Remembers unlocked content with signed tokens
- **Rate Limiting**: Prevents brute-force attacks with configurable attempt limits
- **Feed Protection**: Automatically strips protected content from RSS/Atom feeds
- **Cache-Aware**: Can bypass caching for protected content
- **Responsive Design**: Mobile-friendly password forms
- **Progressive Enhancement**: Works without JavaScript; enhanced UX with jQuery (optional)
- **Smarty 5.5+ Compatible**: Uses modern Smarty template syntax with graceful fallback
- **Multi-language Support**: Available in 15 languages (cs-cz, da-dk, de-de, el-gr, en-us, es-es, eu-es, fr-fr, it-it, ja-jp, nl-nl, pt-br, ru-ru, sl-si, tr-tr)

## Requirements

- FlatPress 1.5 rc or later
- PHP 7.4 or later (for password_hash/password_verify)
- Smarty 5.5+ (recommended; works with earlier versions in fallback mode)

## Installation

1. Copy the `bbcode-protect` folder to your `fp-plugins/` directory
2. The plugin will be automatically activated on next page load
3. Navigate to Admin → Config → Content Protection to configure settings

## Usage

### Basic Usage with Per-Entry Password

1. Set a password for your entry in the entry editor metadata
2. In your post content, wrap protected sections:

```
[protect]
This content is password protected and requires the entry password.
[/protect]
```

### Inline Password (if enabled)

If "Allow inline passwords" is enabled in settings:

```
[protect pwd="mypassword"]
This content has its own specific password.
[/protect]
```

### Multiple Protected Blocks

You can have multiple protected blocks in one entry:

```
Some public content here.

[protect]
First protected section.
[/protect]

More public content.

[protect pwd="different"]
Second protected section with different password.
[/protect]
```

## Admin Configuration

Access settings at: **Admin → Config → Content Protection**

### General Settings

- **Allow inline passwords**: Enable/disable inline `pwd=""` attribute
- **Password Prompt Text**: Customize the message shown above password form
- **Remember Duration**: How long (in seconds) to remember unlocked content (default: 3600 = 1 hour)

### Security Settings

- **Maximum Failed Attempts**: Limit password attempts before rate limiting (default: 5)
- **Attempt Window**: Time period for counting failed attempts (default: 300 = 5 minutes)

### Cache Settings

- **Bypass cache for protected content**: Prevent caching of pages with protected blocks

## Setting Passwords

### Global Default Password

To set a site-wide default password used for all `[protect][/protect]` blocks:

1. Go to Admin → Config → Content Protection
2. Enter a password in the "Default Password" field
3. Click "Save Settings"

The default password will be used when:
- A `[protect][/protect]` block has no inline password
- The entry has no per-entry password set
- This provides a convenient way to protect multiple entries with the same password

**Note**: Leave the field blank to disable password protection by default.

### Per-Entry Passwords

To set a password for a specific entry (overrides the default password):

1. Go to Admin → Entries → Write/Edit Entry
2. Look for the "Content Protection" metadata panel
3. Enter your desired password
4. The password will be hashed securely before storage

**Note**: Entry passwords are stored using PHP's `password_hash()` function with the bcrypt algorithm. Plaintext passwords are never stored.

### Inline Passwords

To use a different password for each protected block within an entry:

1. Enable "Allow inline passwords" in Admin → Config → Content Protection
2. Use syntax: `[protect pwd="your-password"]content[/protect]`

**Note**: Inline passwords are less secure as they're stored in plaintext in the entry content.

## Password Priority

When multiple passwords are configured, they are checked in this order:

1. **Inline password** (if enabled and specified in BBCode)
2. **Per-entry password** (if set in entry metadata)
3. **Global default password** (if set in admin settings)

## Security Notes

### Password Storage

- **Global default password**: Stored as bcrypt hash in plugin configuration
- **Entry passwords**: Stored as bcrypt hashes in entry metadata
- **Inline passwords**: Stored in plaintext in BBCode (not recommended for sensitive content)
- **Session tokens**: Cryptographically signed with HMAC-SHA256

### Rate Limiting

The plugin implements rate limiting to prevent brute-force attacks:
- Tracks failed attempts per protected block
- Configurable attempt limit and time window
- Attempts stored in server-side sessions only

### Feed Protection

Protected content is automatically replaced with `[This content is password protected]` in RSS/Atom feeds to prevent content leakage.

### Session Security

- Sessions use PHP's built-in session management
- Tokens are signed with site-specific secret (AUTH_KEY if available)
- Tokens expire after configured remember duration
- No passwords stored in cookies or client-side storage

### Best Practices

1. **Use global default password** for convenience across multiple entries
2. **Use per-entry passwords** for entry-specific protection or overriding the default
3. **Avoid inline passwords** for sensitive content (they're stored in plaintext)
4. **Set appropriate remember duration** - shorter for sensitive content
5. **Enable cache bypass** if using page caching
6. **Use strong passwords** - at least 12 characters with mixed case, numbers, and symbols
7. **Regularly update passwords** for highly sensitive content
8. **Don't share passwords** via insecure channels (email, comments, etc.)

## Feed Behavior

When content with `[protect]` tags appears in RSS/Atom feeds:
- Protected blocks are replaced with a placeholder message
- Unprotected content in the same entry remains visible
- This prevents password-protected content from leaking to feed readers

## Cache Handling

If your FlatPress installation uses caching:

1. Enable "Bypass cache for protected content" in plugin settings
2. The plugin detects protected content and can signal cache systems to skip caching
3. This prevents serving unlocked content to unauthorized users

**Note**: Cache bypass implementation depends on your cache setup and may require additional configuration.

## Smarty Version Compatibility

- **Smarty 5.5+**: Full support with template rendering
- **Earlier versions**: Automatic fallback to PHP-based HTML generation
- The plugin checks Smarty version on load and adapts automatically
- Admin panel shows a warning if Smarty < 5.5

## JavaScript Enhancement

The plugin includes optional JavaScript (requires jQuery 3.7.1 if available):
- Auto-focus password field when visible
- Loading state on form submission
- Smooth animations (with jQuery UI)

**All core functionality works without JavaScript** - the JS file only provides UX improvements.

## Mobile Responsiveness

Password forms are designed to be mobile-friendly:
- Responsive layout adapts to screen size
- Touch-friendly input fields and buttons
- Readable on devices from 320px width and up
- Dark mode support (if theme provides color scheme detection)

## Testing Checklist

### Basic Functionality
- [ ] Unprotected posts display normally
- [ ] Protected block shows password form
- [ ] Correct password unlocks content
- [ ] Unlocked content persists across page reloads (within remember duration)
- [ ] Wrong password shows error message

### Multiple Blocks
- [ ] Entry with multiple protected blocks works correctly
- [ ] Each block can be unlocked independently (with inline passwords)
- [ ] Unlocking one block doesn't affect others

### Inline Passwords
- [ ] Inline `pwd=""` attribute works when enabled
- [ ] Inline passwords are ignored when setting disabled
- [ ] Mixed inline and entry passwords work together

### Security
- [ ] Rate limiting triggers after max attempts
- [ ] Failed attempts reset after time window
- [ ] No plaintext passwords visible in HTML source
- [ ] No passwords exposed in browser dev tools

### Feeds
- [ ] Protected content replaced in RSS feed
- [ ] Protected content replaced in Atom feed
- [ ] Unprotected content still visible in feeds

### Edge Cases
- [ ] No fatal errors with missing password
- [ ] No fatal errors with missing template
- [ ] Works without JavaScript enabled
- [ ] Works on mobile devices (320px+ width)
- [ ] Works with page caching (if bypass enabled)

### Smarty Compatibility
- [ ] Works with Smarty 5.5+
- [ ] Fallback works with earlier Smarty versions
- [ ] Admin panel displays version warning if needed

## Troubleshooting

### Password form not showing
- Check that you've set an entry password or enabled inline passwords
- Verify template file exists: `fp-plugins/bbcode-protect/tpls/password-form.tpl`

### Content always locked/unlocked
- Check session configuration in `defaults.php`
- Verify PHP sessions are working: `session_status() !== PHP_SESSION_NONE`
- Clear browser cookies and sessions

### Rate limiting too aggressive
- Increase "Maximum Failed Attempts" in settings
- Increase "Attempt Window" duration

### Protected content in feeds
- Verify feed URLs: `?x=feed:rss2` or `?x=feed:atom`
- Check that feed filtering is active

### Cache issues
- Enable "Bypass cache for protected content"
- Clear your cache directory: `fp-content/cache/`
- Configure your cache plugin/system to respect cache bypass signals

## Files Structure

```
fp-plugins/bbcode-protect/
├── plugin.bbcode-protect.php       # Main plugin file
├── panels/
│   └── admin.plugin.panel.bbcode-protect.php  # Admin settings panel
├── tpls/
│   ├── password-form.tpl           # Password form template (Smarty)
│   └── admin.settings.tpl          # Admin settings template
├── lang/
│   └── lang.en-us.php             # English language file
├── res/
│   ├── bbcode-protect.css         # Stylesheet (responsive)
│   └── bbcode-protect.js          # Optional JavaScript enhancements
└── README.md                       # This file
```

## Changelog

### Version 1.0.0
- Initial release
- BBCode [protect] tag implementation
- Per-entry and inline password support
- Secure password hashing (bcrypt)
- Session-based unlock tracking with signed tokens
- Rate limiting for brute-force protection
- Feed content stripping
- Responsive password forms
- Optional JavaScript enhancements
- Smarty 5.5+ compatibility with fallback
- Comprehensive admin settings panel

## License

This plugin is part of the FlatPress project and follows the same license.

## Support

For issues, questions, or contributions:
- Visit: https://www.flatpress.org
- GitHub: https://github.com/flatpress/flatpress

## Credits

Developed for FlatPress by the FlatPress community.
