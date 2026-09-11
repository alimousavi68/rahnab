# Decision Rule: Navigation Menu

## 1. Detection Cues (نشانه‌های تشخیص)
- `<nav>` element inside `<header>` with an unordered list (`<ul>`, `<li>`, `<a>`).
- Multi-level dropdown menus (`.dropdown`, `.sub-menu`, `.has-children`).
- Mobile hamburger toggle button (`.navbar-toggler`, `.menu-toggle`, `.hamburger`).
- CSS classes / IDs: `.main-nav`, `.primary-menu`, `.navbar`, `#site-navigation`.

## 2. Architectural Options (گزینه‌های معماری)
- **Option A (Filter Class Injection - Lightweight & Clean):**
  Uses native `wp_nav_menu()` and injects prototype classes via standard WordPress filters:
  - `nav_menu_css_class` (to add `.nav-item` or active states)
  - `nav_menu_link_attributes` (to add `.nav-link` or data attributes)
  - `nav_menu_submenu_css_class` (to customize dropdown `<ul>` classes)
- **Option B (Custom Walker Class - Complex Dropdowns):**
  A dedicated PHP class extending `Walker_Nav_Menu` for complex markup (e.g. Bootstrap 5 navbar markup with SVG icons, mega-menu structures).
- **Option C: Static HTML Fallback:**
  Hardcoded menu in `header.php`. Zero WordPress admin manageability. Only acceptable as an initial Pass 1 intermediate step.

## 3. Default Recommendation (پیشنهاد پیش‌فرض)
- **Filter Class Injection (Option A)** for standard 1-2 level menus (Confidence: **HIGH**).
- **Walker_Nav_Menu (Option B)** if framework requires specific DOM wrapping (e.g., Bootstrap 5 collapse/dropdown data attributes) (Confidence: **HIGH**).

## 4. Human Checkpoint Triggers (موارد نیازمند سوال از کاربر)
Prompt the user (**CP-04**) if:
1. Navigation includes a mega-menu with embedded widgets or multi-column card layouts.
2. Distinct mobile menu markup exists that cannot be unified with the desktop menu CSS.

## 5. Nav Parity Contract (قاعده الزام انطباق کلاس‌های ناوبری)
- **STRICT MANDATE:** The agent is **strictly prohibited** from replacing raw prototype `<nav>` HTML markup with `wp_nav_menu()` until the generated HTML output is guaranteed to retain the prototype's CSS classes on all levels (`<ul>`, `<li>`, `<a>`).
- **Standard Filter Injection:** In 90% of conversions, use `nav_menu_css_class` (to inject `.nav-item`) and `nav_menu_link_attributes` (to inject `.nav-link`).
- **Pass 1 Safety Guard:** If custom dropdown behavior or mobile toggle classes are complex and not yet mapped, keep the raw static `<nav>` HTML intact during Pass 1 to preserve 100% visual fidelity at the Validation Gate. Decouple into `wp_nav_menu` only in Pass 2 after testing filter/walker output.
