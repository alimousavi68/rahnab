# Architecture Rules: Classic WordPress Theme

## Purpose
This document provides the foundational engineering rules for generating standard, compliant, and robust Classic WordPress Themes (`.php` templates). It defines template hierarchy resolution, required WordPress core hooks, asset enqueueing conventions, and `functions.php` / `inc/` modularization.

## Scope & Core Guidelines
1. **Required File Baseline:**
   - `style.css`: Theme metadata header (Theme Name, Author, Version, Requires at least, Requires PHP, License, Text Domain).
   - `index.php`: Universal fallback template implementing the standard Loop and pagination.
2. **Template Hierarchy Specificity:**
   - Front Page: `front-page.php` (for static front page) vs `home.php` (for blog posts index).
   - Singular Post: `single-{post_type}.php` → `single.php` → `singular.php` → `index.php`.
   - Singular Page: `page-templates/template-{slug}.php` → `page-{slug}.php` → `page.php`.
   - Collections: `archive-{post_type}.php` → `taxonomy-{tax}.php` → `category.php` → `archive.php`.
   - Errors & Search: `404.php`, `search.php`.
3. **Mandatory Core Hooks:**
   - `<html <?php language_attributes(); ?>>`
   - `<meta charset="<?php bloginfo( 'charset' ); ?>">`
   - `wp_head()` immediately before `</head>`
   - `wp_body_open()` immediately after `<body>`
   - `<body <?php body_class(); ?>>`
   - `<article <?php post_class(); ?>>`
   - `wp_footer()` immediately before `</body>`
4. **functions.php Architecture:**
   - Keep `functions.php` lean (<50 lines).
   - Delegate setup to `inc/theme-setup.php` (`after_setup_theme`).
   - Delegate asset management to `inc/enqueue.php` (`wp_enqueue_scripts`).
   - Delegate customizer controls to `inc/customizer.php`.
   - Delegate custom template tags to `inc/template-tags.php`.
5. **Asset Enqueueing Standards & Modern Defer Strategy:**
   - All styles must be loaded via `wp_enqueue_style()`; all scripts via `wp_enqueue_script()`. Never hardcode `<script src="...">` in `header.php` or `footer.php`.
   - **WordPress 6.3+ Script Loading Strategy:** Non-critical front-end scripts (sliders, animations, main interactive scripts) must explicitly declare the `'strategy' => 'defer'` argument:
     ```php
     wp_enqueue_script(
         '{{THEME_SLUG}}-main',
         get_theme_file_uri('/assets/js/main.js'),
         ['jquery'],
         {{UPPER_SLUG}}_VERSION,
         [
             'in_footer' => true,
             'strategy'  => 'defer', // Native WP 6.3+ script deferral
         ]
     );
     ```
   - **Data Passing (Localization):** Send server-side data, REST URLs, and security nonces to scripts exclusively via `wp_localize_script()` or `wp_add_inline_script()`. Never echo variables into raw inline `<script>` tags.
   - **Pass 1 Asset Immutability Rule:** In Pass 1, static images and asset paths must remain in the theme's `assets/` folder and be referenced via `get_template_directory_uri() . '/assets/...'`. Do NOT attempt to import static theme assets into the WordPress Media Library during Pass 1.
