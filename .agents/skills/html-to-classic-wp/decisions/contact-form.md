# Decision Rule: Contact Form

## 1. Detection Cues (نشانه‌های تشخیص)
- HTML `<form>` element containing `<input type="text">`, `<input type="email">`, `<textarea>`, `<select>`, and a submit `<button>`.
- Presence of client-side validation scripts or `action="contact.php"` / `action="#"`.
- CSS classes / IDs: `.contact-form`, `#contact-form`, `.inquiry-form`, `.booking-form`.

## 2. Architectural Options (گزینه‌های معماری)
- **Option A (Industry Standard): Compatible Shortcode Wrapper / CF7 / WPForms Styling**
  Theme provides CSS rules that map to popular form plugins (e.g. Contact Form 7 classes: `.wpcf7-form`, `.wpcf7-text`, `.wpcf7-submit`), and the page uses a shortcode placeholder `[contact_form]`.
- **Option B: Companion Plugin Native Form Handler**
  Companion plugin registers a custom shortcode `[{{THEME_SLUG}}_contact_form]` with `admin-post.php` or `wp_ajax_` handler and nonce security (`wp_create_nonce`, `wp_verify_nonce`).
- **Option C: Direct PHP mail() in Theme**
  **STRICTLY FORBIDDEN.** Violates WordPress theme guidelines and security standards.

## 3. Default Recommendation (پیشنهاد پیش‌فرض)
- **Companion Plugin Native Form Shortcode or Form Plugin Styled Classes** (Confidence: **HIGH**).
- **Reason:** Keeps business logic out of the theme, ensures anti-CSRF nonce verification, and prevents data loss when switching themes.

## 4. Human Checkpoint Triggers (موارد نیازمند سوال از کاربر)
Prompt the user (**CP-05**) with:
- "Should we style the form for an established plugin (like Contact Form 7 / WPForms), or provide a lightweight native handler inside the companion plugin?"
