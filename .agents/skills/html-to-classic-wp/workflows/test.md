# Workflow: /test

## 1. Goal (هدف)
Execute an automated, multi-layer Quality Assurance suite covering PHP syntax integrity, WordPress architectural standards, mandatory hooks, accessibility baselines, runtime error markers, and escaping security.

## 2. Inputs (ورودی)
- `--theme <path>`: Path to the converted WordPress theme directory.
- `--plugin <path>`: Path to the companion plugin directory (optional).
- `--url <url>` or `--file <rendered.html>`: Rendered HTML output or live development URL for runtime scanning.

## 3. Execution Steps (مراحل اجرا)

```bash
# Resolve Skill root directory (where html-to-classic-wp is located)
SKILL_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
```

### Step 1: PHP Syntax Linting
Recursively scan all PHP files in theme and companion plugin for syntax errors:
```bash
"$SKILL_DIR/scripts/lint-php.sh" "<path-to-theme>"
"$SKILL_DIR/scripts/lint-php.sh" "<path-to-plugin>"
```
*Pass condition:* 0 syntax errors detected (`php -l` exit code 0).

### Step 2: WordPress Standards & Mandatory Hooks Validation
Validate theme structure, mandatory hooks (`wp_head`, `wp_footer`, `body_class`, `wp_body_open`), accessibility skip-links, and anti-patterns:
```bash
node "$SKILL_DIR/scripts/validate-theme.mjs" --theme "<path-to-theme>"
```
*Pass condition:* Exit code 0 (No CRITICAL issues).

### Step 3: Runtime Error & Marker Scanning
Scan rendered HTML output for PHP notices, warnings, fatal errors, or unrendered template tokens (`{{TOKEN}}`, unexpanded shortcodes):
```bash
# Via local rendered HTML file
node "$SKILL_DIR/scripts/scan-error-markers.mjs" --file "<path-to-rendered.html>"

# Or via cURL from local test server
curl -s http://localhost:8080 | node "$SKILL_DIR/scripts/scan-error-markers.mjs"
```
*Pass condition:* Clean output with zero fatal errors or warnings.

### Step 4: Security & Late-Escaping Audit
Verify late escaping rules across all dynamic outputs:
- Standard text: `esc_html(get_theme_mod(...))`
- HTML attributes: `esc_attr(...)`
- URLs: `esc_url(...)`
- Rich HTML: `wp_kses_post(...)`
- Post Titles: `the_title()` or `wp_kses_post(get_the_title())`. Never `esc_html(get_the_title())`.

## 4. Expected Output (خروجی مورد انتظار)
- Multi-layer QA report with clear pass/fail status per check.
- Actionable error snippets with file paths and line numbers if issues exist.
- Final sign-off certification certifying the theme is production-ready.
