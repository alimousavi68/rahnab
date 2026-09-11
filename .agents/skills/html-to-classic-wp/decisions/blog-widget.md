# Decision Rule: Blog & Widget Areas

## 1. Detection Cues (نشانه‌های تشخیص)
- Lateral side column (`<aside>`, `.sidebar`, `.col-lg-4`) containing search box, category list, recent posts, tags, or author bio.
- Multi-column footer segments containing arbitrary menus, recent tweets, contact details, or text summaries.
- CSS classes / IDs: `#secondary`, `.widget-area`, `.sidebar`, `.footer-widget`, `.footer-column`.

## 2. Architectural Options (گزینه‌های معماری)
- **Option A (Standard WordPress Classic): Dynamic Sidebar (`register_sidebar`)**
  Registered in `functions.php` via `widgets_init` action. Outputted via `dynamic_sidebar('sidebar-1')` in `sidebar.php` or `footer.php`.
- **Option B: Fixed PHP Template Part**
  Static code in `template-parts/sidebar.php`. Lacks client editability from WordPress Admin > Appearance > Widgets.
- **Option C: Block Template Part**
  *Not recommended* in Classic Themes as it introduces FSE complexity.

## 3. Default Recommendation (پیشنهاد پیش‌فرض)
- **Dynamic Sidebar (`register_sidebar`)** (Confidence: **HIGH**).
- **Reason:** Full compliance with WordPress Theme Guidelines, allows clients to manage widgets via Appearance > Widgets or Customizer, and supports standard core widgets (Search, Categories, Recent Posts).

## 4. Human Checkpoint Triggers (موارد نیازمند سوال از کاربر)
Prompt the user if:
1. The sidebar contains non-standard custom UI (e.g. interactive loan calculator, weather API badge).
2. The user requests completely hardcoded sidebar content with zero admin widget capability.
