# Gutenberg Strategy: Block Patterns in Classic Themes

## Purpose
This document defines how Classic WordPress Themes leverage the modern Gutenberg Block Editor using pure PHP Block Patterns (`patterns/*.php`) without requiring Node.js build pipelines or custom React development.

## Scope & Implementation Rules
1. **Zero-Build Principle:**
   - Do NOT build custom React blocks with `@wordpress/create-block`.
   - Express marketing sections as Block Patterns composed of core WordPress blocks (`core/group`, `core/columns`, `core/heading`, `core/paragraph`, `core/image`, `core/buttons`).
2. **Pattern File Structure (`patterns/{slug}.php`):**
   - Place in the theme's `patterns/` directory (auto-discovered in WP 6.0+).
   - Provide standard file header comment:
     ```php
     <?php
     /**
      * Title: {{Pattern Name}}
      * Slug: {{theme-slug}}/{{pattern-slug}}
      * Categories: {{theme-slug}}-marketing
      * Keywords: {{kw1}}, {{kw2}}
      * Block Types: core/post-content
      */
     ?>
     ```
3. **Markup & Design Token Presets:**
   - Use block comment attributes matching core blocks.
   - Use color and typography presets defined in `theme.json` or fallback core presets.
   - All user-facing strings must be translatable via `esc_html_e( '...', 'theme-slug' )`.
   - Asset paths must use dynamic helper: `<?php echo esc_url( get_template_directory_uri() ); ?>/assets/...`.
4. **Editor Styles Parity:**
   - Enqueue `assets/css/editor.css` via `add_editor_style()` to ensure the backend block editor matches the frontend styling.
