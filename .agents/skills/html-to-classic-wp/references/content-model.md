# Content Model Specification: Entities, Taxonomies & Meta

## Purpose
This document defines data modeling standards for Custom Post Types (CPT), Custom Taxonomies, and Post Meta fields generated during conversion.

## Scope & Guidelines
1. **Custom Post Type (CPT) Registration:**
   - Prefix post types (e.g. `{prefix}_portfolio`, `{prefix}_service`).
   - Enable REST API (`show_in_rest => true`) for block editor and REST endpoint compatibility.
   - Configure `supports` explicitly (`title`, `editor`, `thumbnail`, `excerpt`, `custom-fields`).
   - Define custom rewrite slugs matching original HTML URLs.
2. **Custom Taxonomies:**
   - Hierarchical (category-like) for broad classifications.
   - Non-hierarchical (tag-like) for attributes.
   - Register on `init` alongside CPTs with `show_in_rest => true`.
3. **Custom Fields / Post Meta:**
   - Prefix meta keys (e.g. `_{prefix}_client_name`, `_{prefix}_project_date`).
   - Store scalar values as plain text; serialize arrays defensively.
   - Use late escaping on output: `esc_html()`, `esc_url()`, or `wp_kses_post()`.
4. **Querying Architecture:**
   - Never instantiate `new WP_Query` on archive templates; use `pre_get_posts` on the main query.
   - Restrict `new WP_Query` to secondary feeds and always execute `wp_reset_postdata()`.
