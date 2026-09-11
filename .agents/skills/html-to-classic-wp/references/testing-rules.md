# Testing & Quality Assurance Rules

## Purpose
This document defines the automated validation routines, syntax linting procedures, runtime error marker scans, and accessibility baseline audits required before a theme conversion is certified as complete.

## Scope & Verification Standards
1. **PHP Syntax Validation:**
   - Execute `bash scripts/lint-php.sh [theme_dir]` running `php -l` across all `.php` files.
   - Zero syntax errors allowed.
2. **Runtime Error Marker Scan:**
   - Run `node scripts/scan-error-markers.mjs` against generated files and local URLs.
   - Scans for regex:
     ```regex
     /(fatal error|uncaught|wp_die|there has been a critical error|parse error|call to undefined function|failed to open stream|warning:\s|notice:\s|deprecated:\s|undefined (?:variable|array key|index))/i
     ```
   - Zero notices or warnings permitted.
3. **Mandatory Theme Hooks Audit:**
   - Run `node scripts/validate-theme.mjs [theme_dir]`.
   - Confirms presence of `wp_head()`, `wp_footer()`, `wp_body_open()`, `body_class()`, `post_class()`, `language_attributes()`, and `bloginfo('charset')`.
4. **Output Escaping Verification:**
   - Verify late escaping on all dynamic echos: `esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`.
   - Ensure post titles use `wp_kses_post(get_the_title())` or `the_title()`, never `esc_html(get_the_title())`.
5. **Accessibility Baseline (WCAG 2.1 AA):**
   - Skip link present as first focusable element (`href="#primary"`).
   - `.screen-reader-text` CSS rules present in `style.css`.
   - All `<img>` tags have descriptive or empty decorative `alt` attributes.
   - Semantic HTML5 landmarks (`<header>`, `<nav>`, `<main>`, `<footer>`) present.
