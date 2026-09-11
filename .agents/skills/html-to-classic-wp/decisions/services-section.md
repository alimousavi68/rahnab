# Decision Rule: Services Section

## 1. Detection Cues (نشانه‌های تشخیص)
- Grid or flex container displaying 3–12 repeated items with icons/images, titles, short descriptions, and "Read More" links.
- Presence of an individual detail page in the prototype (e.g. `service-detail.html`, `service-single.html`) or anchor links.
- CSS classes / IDs: `.services`, `.services-grid`, `.service-item`, `.features-list`, `.what-we-do`.

## 2. Architectural Options (گزینه‌های معماری)
- **Option A (Multi-page with dedicated URLs): Custom Post Type (`services`) in Companion Plugin**
  Each service is a distinct post with featured image, excerpt, and full post content for `single-services.php`. Rendered on homepage via `WP_Query` secondary loop in a template part or pattern.
- **Option B (Single-page anchors / marketing only): Gutenberg Block Pattern**
  Uses `core/columns` and `core/column` blocks with cards. Ideal if there are NO individual service detail pages.
- **Option C: Static Template Part**
  Hardcoded in `template-parts/home/services.php` if services never change.

## 3. Default Recommendation (پیشنهاد پیش‌فرض)
- If prototype contains a dedicated detail page (`service-detail.html`):
  - **CPT `services` in Companion Plugin** (Confidence: **HIGH**).
- If prototype only lists 3–6 items without detail pages:
  - **Gutenberg Block Pattern** (Confidence: **HIGH**).

## 4. Human Checkpoint Triggers (موارد نیازمند سوال از کاربر)
Prompt the user if:
1. No detail page exists in the prototype, but the client might want expandable detail pages in the future.
2. The services require complex metadata (e.g. pricing tier, icon picker, downloadable brochure PDF).
