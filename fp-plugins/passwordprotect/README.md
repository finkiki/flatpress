# Content Protection Plugin for FlatPress

**Version:** 2.0.0  
**Requires:** FlatPress 1.5 rc+, PHP 7.4+, Smarty 5.5+

## Overview

Password-protect specific content blocks in your FlatPress posts and pages. Uses HTML comment markers (not BBCode) to avoid conflicts with other plugins.

## Features

- ✅ **HTML Comment Syntax** - Uses `<!--protect-->` markers (no BBCode conflicts)
- ✅ **Three Password Levels** - Global default, per-entry, or inline passwords
- ✅ **Secure Storage** - Bcrypt password hashing (never plaintext)
- ✅ **Session Management** - HMAC-SHA256 signed tokens
- ✅ **Rate Limiting** - Prevents brute-force attacks
- ✅ **Feed Protection** - Automatically strips protected content from RSS/Atom
- ✅ **Mobile Responsive** - Works on all screen sizes
- ✅ **Multi-language** - Full i18n support
- ✅ **Progressive Enhancement** - Works without JavaScript

## Installation

1. Extract the `passwordprotect` folder to `fp-plugins/`
2. Activate the plugin in Admin → Plugins
3. Configure at Admin → Config → Content Protection

## Usage

### Basic Usage (Global Password)

1. Go to **Admin → Config → Content Protection**
2. Set a "Default Password" (e.g., "mypassword123")
3. Click **Save**
4. In your post content, wrap text with HTML comments:

```html
This is public content everyone can see.

<!--protect-->
This content is protected by the global password.
Only visitors who enter "mypassword123" will see this.
<!--/protect-->

More public content here.
```

### Per-Entry Password

1. Create or edit an entry
2. Scroll to the **"Content Protection"** panel (below categories)
3. Enter a password specific to this entry
4. Click **Save**
5. Use `<!--protect-->` markers in your content:

```html
Public intro text...

<!--protect-->
This content uses THIS ENTRY'S password, not the global password.
<!--/protect-->
```

### Multiple Protected Blocks

You can have multiple protected sections in one entry:

```html
Public section 1

<!--protect-->
Protected section 1
<!--/protect-->

Public section 2

<!--protect-->
Protected section 2 (uses same password)
<!--/protect-->

Public section 3
```

All protected blocks in the same entry use the same password (either the entry password or global default).

## Password Priority

The plugin uses passwords in this order:

1. **Per-Entry Password** - Set in entry editor (highest priority)
2. **Global Default Password** - Set in admin settings (fallback)

If no password is set at all, the protected content will show an error message.

## Security Features

### Password Hashing
- All passwords are hashed with PHP's `password_hash()` using bcrypt
- Plain passwords are NEVER stored in the database (except temporarily for re-editing in admin)
- Hashed passwords cannot be reversed

### Session Tokens
- Unlocked blocks tracked via session with HMAC-SHA256 signed tokens
- Tokens expire after configurable duration (default: 1 hour)
- Tokens cannot be forged without the site's AUTH_KEY

### Rate Limiting
- Failed password attempts are tracked per-block
- Default: 5 attempts per 5-minute window
- After exceeding limit, user must wait before trying again
- Prevents brute-force attacks

### Feed Protection
- Protected content automatically stripped from RSS/Atom feeds
- Replaced with: "[Protected content - visit website to view]"
- Prevents password leaks via feed readers

### XSS Protection
- All user input sanitized with `htmlspecialchars()`
- Null bytes removed from passwords
- Maximum password length: 1000 characters

## Configuration Options

Access at **Admin → Config → Content Protection**

| Option | Description | Default |
|--------|-------------|---------|
| **Default Password** | Global password for all protected content | (empty) |
| **Prompt Text** | Message shown above password form | "This content is password protected." |
| **Remember Duration** | How long content stays unlocked (seconds) | 3600 (1 hour) |
| **Max Failed Attempts** | Attempts before rate limiting | 5 |
| **Attempt Window** | Time window for counting attempts (seconds) | 300 (5 minutes) |

## Troubleshooting

### Protected content shows as HTML comments

**Problem:** Content between `<!--protect-->` and `<!--/protect-->` is visible as HTML comments in the page source.

**Solution:** 
- Make sure the plugin is **activated** in Admin → Plugins
- Check that you have set a password (either global or per-entry)
- HTML comments are normal - they're processed by the plugin on the server side

### "No password has been set" error

**Problem:** Visitors see error message instead of password form.

**Solution:**
- Set a global default password at Admin → Config → Content Protection, OR
- Set a per-entry password in the entry editor

### Password not saving

**Problem:** After entering password in admin panel, it doesn't seem to save.

**Solution:**
- Make sure to click the **Save** button at the bottom of the settings page
- Check file permissions on `fp-content/` folder (must be writable)
- Try saving again and then reload the settings page to verify

### Content doesn't unlock after correct password

**Problem:** Visitor enters correct password but content still shows password form.

**Solution:**
- Check that PHP sessions are working (session_start() must succeed)
- Verify that AUTH_KEY is defined in your FlatPress config
- Try clearing your browser cookies and trying again
- Check PHP error logs for any session-related errors

### Rate limiting too aggressive

**Problem:** Users get locked out too quickly.

**Solution:**
- Increase "Max Failed Attempts" (e.g., to 10)
- Increase "Attempt Window" (e.g., to 600 seconds = 10 minutes)
- Changes take effect immediately after saving

## FAQ

**Q: Can I use different passwords for different blocks in the same entry?**  
A: No, all protected blocks in an entry use the same password (either per-entry or global default).

**Q: Is it secure to show "Incorrect password" messages?**  
A: Yes, this is standard practice and doesn't compromise security. The rate limiting prevents brute-force attacks.

**Q: Can I protect entire entries instead of just blocks?**  
A: Not directly. You would need to wrap your entire entry content in `<!--protect-->` markers.

**Q: Does this work with static pages?**  
A: Yes, it works with both blog entries and static pages.

**Q: What happens if I deactivate the plugin?**  
A: The `<!--protect-->` markers will appear as HTML comments (invisible to visitors but visible in page source). Your content won't be protected.

**Q: Can I see who accessed protected content?**  
A: No, the plugin doesn't log access attempts for privacy reasons.

## Browser Compatibility

- Chrome/Edge: ✅ Full support
- Firefox: ✅ Full support  
- Safari: ✅ Full support
- Mobile browsers: ✅ Full support (responsive design)
- JavaScript disabled: ✅ Works (forms still function)

## Performance

- Minimal performance impact
- Regex processing is efficient
- Session storage is lightweight
- No database queries per request (except for password retrieval)

## Changelog

### Version 2.0.0 (2025-12-28)
- **BREAKING:** Switched from BBCode `[protect]` syntax to HTML comments `<!--protect-->`
- Simplified implementation
- Improved reliability and compatibility
- Removed inline password support (per-entry or global only)
- Enhanced error messages
- Better session handling

### Version 1.0.0 (2025-12-27)
- Initial release with BBCode syntax

## Support

For bug reports and feature requests, please use the FlatPress forums or GitHub issues.

## License

This plugin is released under the same license as FlatPress (GPL v2 or later).

## Credits

Developed for FlatPress by the FlatPress community.
