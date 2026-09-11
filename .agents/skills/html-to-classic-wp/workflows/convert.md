# Workflow: /convert

## 1. Goal (هدف)
Execute the end-to-end conversion of a static prototype into an enterprise-grade Classic WordPress Theme and Companion Plugin following the strict Two-Pass strategy (Pass 1 Visual Reconstruction → Validation Gate → Pass 2 Dynamic Migration).

## 2. Inputs (ورودی)
- Verified `source-inventory.json` from the `/audit` workflow.
- Theme Configuration Parameters:
  - `{{THEME_SLUG}}` (e.g., `modern-corp`)
  - `{{THEME_NAME}}` (e.g., `Modern Corporate`)
  - `{{TEXT_DOMAIN}}` (e.g., `modern-corp`)
  - `{{AUTHOR}}` (e.g., `Agency Team`)
  - `{{CPT_KEY}}` (e.g., `portfolio` or `service`)

## 3. Execution Steps (مراحل اجرا)

### Phase 1: Pass 1 — Visual Reconstruction (100% Fidelity Gate)
```bash
# Resolve Skill root directory (where html-to-classic-wp is located)
SKILL_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
```

1. **Initialize Theme Directory:**
   Create `{theme-slug}/` directory and copy raw assets (`css/`, `js/`, `images/`, `fonts/`).
2. **Scaffold Theme Shell from Boilerplates:**
   - Instantiate `style.css` from `$SKILL_DIR/templates/classic-theme/style.css.tpl`.
   - Extract `header.php` from `$SKILL_DIR/templates/classic-theme/header.php.tpl` containing `wp_head()`, `body_class()`, `wp_body_open()`, and skip-link.
   - Extract `footer.php` from `$SKILL_DIR/templates/classic-theme/footer.php.tpl` containing `wp_footer()`.
   - Create `functions.php` from `$SKILL_DIR/templates/classic-theme/functions.php.tpl` and map assets discovered in `source-inventory.json`.
3. **Assemble Front Page & Core Templates:**
   - Scribe `front-page.php` from `$SKILL_DIR/templates/classic-theme/front-page.php.tpl` with raw HTML markup from `index.html` (retaining original classes, attributes, and inline text to guarantee 100% visual parity).
   - Create `index.php` fallback template from `$SKILL_DIR/templates/classic-theme/index.php.tpl`.
   - Create `page.php` and `404.php` from `$SKILL_DIR/templates/classic-theme/page.php.tpl` and `404.php.tpl`.
4. **Pass 1 Automated Validation:**
   Run the automated testing scripts:
   ```bash
   "$SKILL_DIR/scripts/lint-php.sh" "{theme-slug}"
   node "$SKILL_DIR/scripts/validate-theme.mjs" --theme "{theme-slug}"
   ```
5. **STOP at Human Validation Gate:**
   Request user approval to confirm visual fidelity before touching data structures.

---

### Phase 2: Pass 2 — Dynamic CMS Migration
*Triggered only after user passes the Validation Gate.*

1. **Decouple Global Chrome:**
   - Convert site branding, logo, and phone/email to Customizer settings (`inc/customizer.php`).
   - Register dynamic navigation menus (`wp_nav_menu`) and widget sidebars (`register_sidebar`).
2. **Generate Companion Plugin:**
   - Scaffold `{theme-slug}-core/` plugin using `$SKILL_DIR/templates/companion-plugin/plugin-bootstrap.php.tpl`.
   - Register CPTs and Taxonomies from `$SKILL_DIR/templates/companion-plugin/includes/` with `show_in_rest => true`.
   - Setup modular seed data structure from `$SKILL_DIR/templates/companion-plugin/seed/`.
3. **Decouple Marketing Sections into Block Patterns:**
   - Extract Hero, Services, and Testimonials into `patterns/*.php` using `$SKILL_DIR/templates/patterns/block-pattern.php.tpl`.
   - Clean `front-page.php` to serve exclusively as a layout orchestrator rendering `the_content()`.
4. **Final Security Escaping Sweep:**
   Enforce late escaping across all echo statements (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`). Titles must use `wp_kses_post(get_the_title())` or `the_title()`.

## 4. Expected Output (خروجی مورد انتظار)
1. Fully functional WordPress Classic Theme directory ready for activation.
2. Companion Plugin directory containing CPTs, taxonomies, and seed architecture.
3. Clean PHP syntax pass with zero lint or security errors.
4. Walkthrough report documenting template structure and editing instructions.
