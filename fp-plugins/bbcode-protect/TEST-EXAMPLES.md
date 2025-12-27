# BBCode Content Protection Plugin - Test Examples

This document provides test examples for the BBCode Content Protection plugin.

## Example 1: Basic Protected Content

Public content here, visible to everyone.

[protect]
This content is protected by the entry password.
Only users who enter the correct password can see this text.
[/protect]

More public content here.

## Example 2: Multiple Protected Blocks

First public section.

[protect]
First protected block with entry password.
[/protect]

Middle public section.

[protect]
Second protected block, also using entry password.
[/protect]

Final public section.

## Example 3: Inline Password (if enabled)

Public content at the start.

[protect pwd="secret123"]
This block has its own specific password: secret123
[/protect]

More public content.

[protect pwd="different456"]
This block has a different password: different456
[/protect]

## Example 4: Mixed Protection

Public introduction.

[protect]
This uses the entry password.
[/protect]

Public middle section.

[protect pwd="inline789"]
This has an inline password: inline789
[/protect]

Public conclusion.

## Example 5: Protected Rich Content

[protect]
# Protected Heading

This is a **protected section** with *rich formatting*:

- Bullet point 1
- Bullet point 2
- Bullet point 3

You can include [b]BBCode[/b], [i]formatting[/i], and even [url=https://example.com]links[/url].

[img]images/example.jpg[/img]
[/protect]

## Testing Notes

### To test this plugin:

1. **Set an entry password**: When creating or editing an entry, set a password in the "Content Protection" panel
2. **Add protected blocks**: Use the [protect]...[/protect] tags in your content
3. **View the entry**: The protected blocks should show password forms
4. **Enter the password**: After entering the correct password, the content should be revealed
5. **Check session persistence**: Refresh the page - the content should remain unlocked
6. **Test wrong passwords**: Try entering incorrect passwords to see error messages
7. **Test rate limiting**: Try 5+ wrong passwords to trigger rate limiting
8. **Check feeds**: View the RSS/Atom feed to ensure protected content is hidden

### Expected Behavior:

- ✓ Unprotected content always visible
- ✓ Protected blocks show password form when locked
- ✓ Correct password unlocks content
- ✓ Wrong password shows error message
- ✓ Multiple failed attempts trigger rate limiting
- ✓ Unlocked content persists across page views (for configured duration)
- ✓ Each block can be unlocked independently (with inline passwords)
- ✓ Protected content hidden in RSS/Atom feeds
- ✓ Mobile-responsive password forms
- ✓ Works without JavaScript (progressive enhancement)

### Security Checklist:

- ✓ Entry passwords stored as bcrypt hashes
- ✓ No plaintext passwords in HTML source
- ✓ Session tokens cryptographically signed
- ✓ Rate limiting prevents brute force
- ✓ Feed protection prevents content leaks
- ✓ No fatal errors with missing passwords
- ✓ XSS protection via htmlspecialchars

## Advanced Usage

### Protect only sensitive parts:

```
Public introduction to the topic.

[protect]
**Sensitive Information:**

Username: admin
Password: secret123
API Key: abc-def-ghi-jkl
[/protect]

Public conclusion and contact information.
```

### Use for premium content:

```
## Article Preview (Free)

This is the introduction that everyone can read...

[protect]
## Full Article (Premium)

This is the full content available only to premium members
who have the password...
[/protect]
```

### Use for spoilers:

```
This movie is amazing! Here's my spoiler-free review...

[protect pwd="spoilers"]
**SPOILERS AHEAD!**

The twist ending reveals that...
[/protect]
```
