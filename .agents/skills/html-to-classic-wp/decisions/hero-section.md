# Decision Rule: Hero Section

## 1. Detection Cues (نشانه‌های تشخیص)
- Located immediately below `<header>` or `<nav>` on the homepage.
- Contains a prominent `<h1>` or `<h2>` headline, lead paragraph, background graphic/video, and 1–2 Call to Action (CTA) buttons.
- Class or ID names often match: `.hero`, `.hero-banner`, `.banner-wrap`, `#hero`, `.jumbotron`, `.intro-section`.

## 2. Architectural Options (گزینه‌های معماری)
- **Option A (Recommended): Gutenberg Block Pattern (`patterns/hero.php`)**
  Registers a native PHP pattern with core blocks (`core/cover`, `core/heading`, `core/paragraph`, `core/buttons`). Provides direct in-editor editing without custom code or fields.
- **Option B: Customizer Controls (`theme_mods`)**
  Registers text, media upload, and button URL settings in Customizer.
- **Option C: Post Meta (Custom Fields / Metabox)**
  Attached specifically to the Front Page editing screen.
- **Option D: Fixed Template Part (`template-parts/home/hero.php`)**
  Static code with hardcoded text, suitable only when the client specifically demands immutable branding.

## 3. Default Recommendation (پیشنهاد پیش‌فرض)
- **Gutenberg Block Pattern (`patterns/hero.php`)** with Confidence: **HIGH**.
- **Reason:** Block patterns maintain zero-build architecture, allow clients full visual editing in standard WordPress, and preserve exact prototype CSS classes.

## 4. Human Checkpoint Triggers (موارد نیازمند سوال از کاربر)
Prompt the user (**CP-02**) if:
1. The hero has complex interactive elements (e.g. multi-step filter, dynamic search bar, live currency ticker).
2. The user requested all global text to be editable via Customizer.
3. The hero needs video background controls not easily managed via block patterns.
