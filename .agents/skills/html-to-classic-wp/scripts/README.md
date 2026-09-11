# Automation Scripts Directory

This directory will store deterministic Node.js and Bash scripts used by the agent during conversion:
- `audit-source.mjs`: Parses HTML DOM, CSS design tokens, JS libraries, and asset paths into `source-inventory.json`.
- `validate-theme.mjs`: Verifies mandatory hooks (`wp_head`, `wp_footer`, `body_class`) and baseline a11y standards.
- `lint-php.sh`: Runs native `php -l` syntax checking on all PHP files.
- `scan-error-markers.mjs`: Scans rendered HTML for PHP notices, warnings, and fatal error strings.
