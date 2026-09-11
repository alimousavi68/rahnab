# Decision Rule: Generic HTML Section (سکشن‌های عمومی)

## 1. Detection Cues (نشانه‌های تشخیص)
- Any `<section>` or `<div class="container">` block that does **not** qualify as Hero, Services, Testimonials, Navigation, or Blog/Widget area.
- Examples:
  - **Call to Action (CTA) Banners:** Headline, subtext, and action buttons on contrasting background (`.cta-section`, `.banner-cta`).
  - **Stats & Numbers Counter:** Numeric statistics with labels (`.stats-grid`, `.fun-facts`, `.counter-box`).
  - **Client & Partner Logos:** Grid or carousel of brand logos (`.brand-carousel`, `.partner-logos`, `.clients-wrap`).
  - **FAQ / Accordion:** Collapsible questions and answers (`.faq-accordion`, `.toggle-wrap`).
  - **Feature Grid / Value Proposition:** Icon boxes highlighting product advantages (`.why-choose-us`, `.core-values`).
  - **Team Grid:** Photos, names, positions, and social links of staff members (`.team-grid`, `.our-team`).

## 2. Architectural Options (گزینه‌های معماری)

| Option | Architecture | Ideal Use Case | Pros | Cons |
| :--- | :--- | :--- | :--- | :--- |
| **Option A (Default)** | **Gutenberg Block Pattern** (`patterns/section-name.php`) | Modular marketing content (CTA, Stats, Logos, FAQ, Why Choose Us). | Zero-build, editable in WP editor, preserves exact prototype CSS classes. | Requires user to edit within page canvas. |
| **Option B** | **CPT in Companion Plugin** | Repeatable entities with individual permalinks (Team Members, Projects). | Scalable, filterable, individual single templates (`single-{cpt}.php`). | Adds admin menu complexity if entity is small. |
| **Option C** | **Static Template Part** (`template-parts/sections/name.php`) | Fixed branding or complex SVG/JS animations that client shouldn't alter. | 100% markup fidelity, zero risk of editor breakage. | Zero client editability from WordPress admin. |
| **Option D** | **Customizer Settings** (`theme_mods`) | Global 1-line callouts, notification bars, emergency alerts. | Available across the entire site, live preview. | Limited to simple text/link fields. |

## 3. Default Recommendation & Decision Matrix (پیشنهاد پیش‌فرض)

1. **Does the section represent a business entity with detail pages?**
   - *Yes (e.g. Team Members with bios, Portfolio projects)* → **CPT in Companion Plugin** (Confidence: **HIGH**).
2. **Is the section an editable marketing element on a page?**
   - *Yes (CTA, Stats, Accordions, Values, Logo Grids)* → **Gutenberg Block Pattern** (Confidence: **HIGH**).
3. **Is the section complex interactive JS (e.g. Calculator, Filter, Map API)?**
   - *Yes* → **Companion Plugin Shortcode** (Confidence: **HIGH**).
4. **Is the section purely structural or immutable branding?**
   - *Yes* → **Static Template Part** (Confidence: **MEDIUM**).

## 4. Human Checkpoint Triggers (موارد نیازمند سوال از کاربر)
Prompt the user if:
1. An ambiguous section contains both marketing text and dynamic listing (e.g., "Latest 3 Projects" inside a branded CTA container).
   - *Question:* "Should this section be split into a dynamic CPT loop inside a Block Pattern, or remain a single static template part?"
2. An FAQ section has more than 10 questions:
   - *Question:* "Should FAQs be managed as an 'faq' Custom Post Type with categories, or as a Gutenberg Accordion Pattern?"
