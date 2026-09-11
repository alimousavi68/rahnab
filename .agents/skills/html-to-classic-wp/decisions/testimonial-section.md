# Decision Rule: Testimonial Section

## 1. Detection Cues (نشانه‌های تشخیص)
- Slider (Swiper, Slick, OwlCarousel) or card grid containing quote text, client avatar image, client name, and company/designation.
- Star ratings or quote mark icons.
- CSS classes / IDs: `.testimonials`, `.testimonial-slider`, `.reviews`, `.quote-card`, `.client-feedback`.

## 2. Architectural Options (گزینه‌های معماری)
- **Option A (Dynamic feed): CPT `testimonial` in Companion Plugin**
  Client manages quotes as discrete posts. Supports easy addition/removal, star rating meta field, client company meta field.
- **Option B (Marketing cards): Gutenberg Block Pattern (`patterns/testimonials.php`)**
  Uses `core/quote` or `core/columns` with styled cards. Best for static testimonials that rarely change.
- **Option C: Customizer Repeater**
  *Not recommended* due to lack of native Customizer repeater and high complexity.

## 3. Default Recommendation (پیشنهاد پیش‌فرض)
- **CPT `testimonial` in Companion Plugin** if count > 4 or slider is present (Confidence: **MEDIUM-HIGH**).
- **Gutenberg Block Pattern** if only 2–3 static quote cards exist without carousel slider (Confidence: **HIGH**).

## 4. Human Checkpoint Triggers (موارد نیازمند سوال از کاربر)
Prompt the user (**CP-03**) with:
- "Should testimonials be managed as independent posts (CPT) with fields for client role/rating, or as an editable Block Pattern directly on the page?"
