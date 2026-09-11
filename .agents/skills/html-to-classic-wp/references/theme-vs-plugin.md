# Theme vs Plugin Territory & Packaging Boundaries

## Purpose
This document establishes the official separation of concerns between the Classic Theme and the Companion Plugin, ensuring compliance with WordPress core architecture and data portability guidelines.

## Scope & Architectural Partitioning
1. **Theme Territory (`wp-content/themes/{slug}/`):**
   - Purely presentational code: CSS stylesheets, JavaScript interactions, font files.
   - PHP layout templates (`header.php`, `footer.php`, `front-page.php`, `single.php`, `archive.php`).
   - Reusable template partials (`template-parts/`).
   - Theme Customizer visual controls (`theme_mods` for logo, header phone/email, footer copyright).
   - Core feature activations (`add_theme_support`).
2. **Companion Plugin Territory (`wp-content/plugins/{slug}-core/`):**
   - Business data models: Custom Post Types and Custom Taxonomies.
   - Interactive embeds: Custom shortcodes (`add_shortcode`).
   - Custom REST API endpoints (`register_rest_route`).
   - Backend integrations: Newsletter handlers, analytics scripts, webhook triggers.
3. **Packaging Decisions (Checkpoint CP-01):**
   - Strategy A (Default): Theme + Companion Plugin.
   - Strategy B: Must-Use Plugin (`mu-plugins/`).
   - Strategy C: Standalone Theme (`inc/post-types.php`) permitted strictly when single-ZIP delivery is explicitly requested.
