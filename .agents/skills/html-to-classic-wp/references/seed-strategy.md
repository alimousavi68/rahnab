# Seed Strategy: Idempotent Demo Content Generation

## Purpose
This document details how initial demo content extracted from static HTML is seeded into the WordPress database upon theme activation, ensuring the site reproduces the original design prototype immediately out-of-the-box.

## Scope & Implementation Contract
1. **Idempotency Guarantee:**
   - The seeding routine must never duplicate records if run multiple times.
   - Guard execution using an option check:
     ```php
     if ( get_option( '{theme_slug}_demo_seeded' ) ) {
         return;
     }
     ```
2. **Execution Targets:**
   - **Core Pages:** Insert pages for Home, Blog, About, Contact, Services using `wp_insert_post()`.
   - **Reading Options:** Assign static front page (`page_on_front`) and posts index (`page_for_posts`).
   - **Navigation Menus:** Build primary menu, attach items, and assign to theme location via `set_theme_mod( 'nav_menu_locations', ... )`.
   - **CPT Demo Records:** Create sample CPT posts (e.g. Portfolio projects) with associated post meta.
   - **Customizer Theme Mods:** Populate header contact phone, email, and footer copyright text.
3. **Trigger Mechanism:**
   - Hooked to theme activation: `add_action( 'after_switch_theme', '{prefix}_seed_initial_content' )` or executed via WP-CLI during migration.
