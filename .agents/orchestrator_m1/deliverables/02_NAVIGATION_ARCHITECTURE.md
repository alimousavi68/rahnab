# DELIVERABLE 02: Navigation Architecture & Interaction Blueprint
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-IA-M1-02`  
**Classification:** Enterprise Navigation Systems & Interaction Architecture  
**Author:** Milestone 1 Architecture Author (`worker_m1_author`)  
**Status:** Approved Architectural Blueprint  
**Target Device Spectrum:** Desktop (1440px+), Laptop (1024-1439px), Tablet (768-1023px), Mobile (375-767px)  
**Constraint Level:** Architectural Specification (Zero PHP Implementation Code)  

---

## 1. Primary Desktop Navigation: The Floating Glassmorphic Pill

To project the authority of a premier biopharmaceutical holding without obstructing rich scientific content, the primary desktop navigation is engineered as a **floating glassmorphic pill container** suspended at the top of the viewport.

### 1.1 Structural Anatomy & CSS Specifications

```text
DESKTOP FLOATING PILL SPATIAL LAYOUT (1440PX VIEWPORT)
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ Outer Viewport Wrapper (Fixed, full width, flex center, pointer-events-none)                          │
│ ┌────────────────────────────────────────────────────────────────────────────────────────────────────┐ │
│ │ Interactive Pill: Max-Width 1280px | Height 72px | Rounded-2xl (16px)                             │ │
│ │ Background: rgba(255, 255, 255, 0.82) / Dark: rgba(0, 20, 40, 0.85)                              │ │
│ │ Backdrop Blur: blur(20px) | Border: 1px solid rgba(255, 255, 255, 0.3)                           │ │
│ │ Elevation Shadow: 0 12px 32px -4px rgba(0, 0, 0, 0.08), 0 4px 12px -2px rgba(0, 0, 0, 0.04)       │ │
│ └────────────────────────────────────────────────────────────────────────────────────────────────────┘ │
└────────────────────────────────────────────────────────────────────────────────────────────────────────┘
```

#### Behavioral States & Dynamic Scroll Transitions:
- **Resting State (`scrollY == 0`):**
  - Outer Wrapper Padding: `py-6 px-6` (vertical breathing room).
  - Background Opacity: `80%` (`backdrop-blur-md`).
  - Brandmark Scale: `100%` (Height: 38px).
- **Scrolled / Sticky State (`scrollY > 50`):**
  - Outer Wrapper Padding: `py-3 px-6` (compact, unobtrusive).
  - Background Opacity: `92%` (`backdrop-blur-xl`).
  - Subtle Border Accentuation: Border opacity increases to enhance separation from dark hero imagery.
  - Brandmark Scale: `92%` (Height: 34px).
  - Animation Curve: `cubic-bezier(0.16, 1, 0.3, 1)` with `300ms` duration.

---

### 1.2 Bilingual Spatial Alignment (RTL vs LTR)

In accordance with strict directional mirroring rules, the header layout adapts symmetrically between Persian and English:

```text
PERSIAN DESKTOP HEADER (RTL) — READING RIGHT TO LEFT:
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ [ارتباط با هلدینگ]  [FA / EN] │ [تماس با ما] [اخبار و رویدادها] [شرکت‌های تابعه ▾] [درباره رهناب] [صفحه اصلی] │ [لوگوی رهناب] │
│      (Interactive Utilities)   │                       (Primary Navigation Links)                      │  (Brandmark)  │
└────────────────────────────────────────────────────────────────────────────────────────────────────────┘

ENGLISH DESKTOP HEADER (LTR) — READING LEFT TO RIGHT:
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ [RAHNAB LOGO] │ [Home] [About Rahnab] [Subsidiaries ▾] [News & Events] [Contact] │ [FA / EN]  [Corporate Inquiry] │
│  (Brandmark)  │                       (Primary Navigation Links)                 │      (Interactive Utilities)   │
└────────────────────────────────────────────────────────────────────────────────────────────────────────┘
```

---

### 1.3 Main Navigation Menu Hierarchy

1. **صفحه اصلی (Home):** `/` | `/en/` — Direct root navigation.
2. **درباره رهناب (About Rahnab):** `/about/` | `/en/about/` — Sub-menu dropdown:
   - *داستان و مأموریت هلدینگ (Corporate Narrative & Mission)*
   - *ارکان حاکمیت شرکتی و مدیران (Governance & Leadership)* — `/about/governance/`
   - *زیرساخت‌های تولیدی و آزمایشگاهی (Industrial Infrastructure)* — `/about/infrastructure/`
   - *مجوزها و استانداردهای کیفی (Accreditations & Compliance)* — `/compliance/`
3. **شرکت‌های زیرمجموعه (Subsidiary Companies):** `/subsidiaries/` | `/en/subsidiaries/` — Triggers the **Value-Chain Mega-Menu**.
4. **اخبار و رویدادها (News & Events):** `/news-events/` | `/en/news-events/` — Direct link with dynamic count badge for latest announcement.
5. **تماس با ما (Contact Us):** `/contact/` | `/en/contact/` — Direct link.

---

## 2. Subsidiaries Value-Chain Mega-Menu Architecture

The Subsidiaries navigation item triggers an enterprise-grade Mega-Menu engineered to convey the vertical integration of Rahnab Pharmed's life-science ecosystem. To ensure permanent responsiveness and prevent viewport boundary degradation as the portfolio expands from 7 to 15 or 20+ ventures, the Mega-Menu utilizes an **Adaptive Dual-Mode Architecture**.

---

### 2.1 Mode A: Primary Holding Tier (Portfolio Size <= 8 Subsidiaries) — "Ecosystem Panorama"

For the core 7-subsidiary holding structure, the Mega-Menu renders a comprehensive 3-column executive panorama:

```text
SUBSIDIARIES VALUE-CHAIN MEGA-MENU SPECIFICATION (RTL LAYOUT — MODE A)
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ CONTAINER: width: min(1080px, calc(100vw - 48px)) | max-height: min(560px, calc(85vh - 90px))          │
│ BORDER-RADIUS: 20px | BACKDROP-BLUR: 24px | PADDING: 32px | OVERFLOW: hidden                           │
├───────────────────────────────────┬─────────────────────────────────────────────┬────────────────────────┤
│ COLUMN 1: ECOSYSTEM MANDATE (25%) │ COLUMN 2: THE 7 HIGH-TECH SUBSIDIARIES (50%)│ COLUMN 3: HIGHLIGHT(25%)│
├───────────────────────────────────┼─────────────────────────────────────────────┼────────────────────────┤
│ • عنوان: زیست‌بوم یکپارچه زیست‌دارویی│ [R&D & ACCELERATION]                        │ [FEATURED MILESTONE]   │
│   رهناب فارمد                     │ • پرسیس ژن (Persis Gene)                    │ «بهره‌برداری از بزرگ‌ترین│
│                                   │   شتاب‌دهنده زیست‌فناوری، R&D و کشت سلولی   │   پالایشگاه پلاسمای    │
│ • شرح راهبردی:                     │                                             │   کشور در نوژین زیست»  │
│   هم‌افزایی ساختاریافته ۷ شرکت     │ [SOURCE & INDUSTRIAL BIOMANUFACTURING]      │                        │
│   دانش‌بنیان در سراسر زنجیره تولید │ • نوژین زیست فارمد (Nozhin Zist Pharmed)    │ • ظرفیت سالانه:        │
│   بیودارو: از تحقیق و توسعه ژنتیک  │   پالایشگاه پلاسمای انسانی (۱۵۰,۰۰۰ لیتر)    │   ۱۵۰,۰۰۰ لیتر پلاسما  │
│   تا پالایش صنعتی پلاسما، سلول‌درمانی│ • تأمین پلاسما نوژین (Tamin Plasma Nozhin)  │ • تأمین ملی IVIG       │
│   و کنترل کیفی نهایی.             │   شبکه مراکز پلاسمافرزیس و سورس پلاسما      │   و آلبومین انسانی     │
│                                   │ • بایا زیست فارمد (Baya Zist Pharmed)       │                        │
│ • دکمه اقدام اولیه:               │   تولید پروتئین‌های نوترکیب و پرکنی آسپتیک  │ [مطالعه گزارش دستاورد] │
│   [مشاهده اطلس کامل شرکت‌ها ←]    │                                             │ (/news-events/nozhin)  │
│   (/subsidiaries/)                │ [ADVANCED THERAPY & EMERGENCY BIOLOGICALS]  │                        │
│                                   │ • پادرا سرم البرز (Padra Serum Alborz)      │ ────────────────────── │
│ • شاخص اعتبار:                    │   سرم‌های هایپرایمیون و پادزهر مار و عقرب   │ [DIRECT B2B ACCESS]    │
│   ۱۰۰٪ زنجیره ارزش بومی و دارای   │ • کارایاخته / کارتیمد (KarayaKhteh)         │ پذیرش پروژه‌های انکوباسیون│
│   مجوزهای GMP و آزمایشگاه همکار   │   ایمونوتراپی سلولی و ژن‌درمانی CAR-T       │ و پالایش قراردادی      │
│   سازمان غذا و دارو               │                                             │ [ثبت درخواست B2B]      │
│                                   │ [QUALITY CONTROL & REGULATORY ASSURANCE]    │ (/contact#b2b)         │
│                                   │ • آرک زیست آزما (Arc Zist Azma)             │                        │
│                                   │   آزمایشگاه کنترل کیفی بیولوژیک و رهایش بچ  │                        │
└───────────────────────────────────┴─────────────────────────────────────────────┴────────────────────────┘
```

---

### 2.2 Mode B: Scaled Venture Portfolio (> 8 to 20+ Subsidiaries) — "2-Pane Master-Detail Directory"

When the portfolio scales beyond 8 subsidiaries through biotech spin-outs and holding acquisitions, the Mega-Menu automatically transitions to an adaptive **2-Pane Master-Detail Layout**. This prevents vertical list explosion, eliminates scrolling disorientation, and guarantees zero viewport overflow on standard 768p laptop monitors.

```text
SCALED MEGA-MENU ARCHITECTURE (2-PANE MASTER-DETAIL — MODE B)
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ TOP UTILITY & LIVE FILTER BAR (Height: 48px | Border-Bottom: 1px solid rgba(0, 0, 0, 0.06))             │
│ [ 🔍 جستجوی سریع شرکت، حوزه درمانی، یا محصول در زیست‌بوم رهناب... ]         [۲۰ شرکت تابعه در ۵ خوشه] │
├───────────────────────────────────────────────┬──────────────────────────────────────────────────────────┤
│ PANE 1: MASTER CLUSTER TABS (32% — ~340px)    │ PANE 2: DETAIL SUBSIDIARY CARDS (68% — ~700px)           │
│ (Vertical scroll container, max-h: 460px)     │ (Responsive 2-column card grid, max-h: 460px, auto-scroll│
├───────────────────────────────────────────────┼──────────────────────────────────────────────────────────┤
│ [▶] ۱. تحقیق، شتاب‌دهی و انکوباسیون      (۳) │ ┌──────────────────────────┐ ┌──────────────────────────┐ │
│     R&D, Cell Banking & Incubation            │ │ [LOGO] پرسیس ژن          │ │ [LOGO] شرکت نوآوران ژن   │ │
│                                               │ │ شتاب‌دهنده زیست‌فناوری   │ │ توسعه سلول‌های صنعتی     │ │
│ [ ] ۲. تأمین سورس پلاسما و بیوفرزیس     (۲) │ │ ظرفیت: ۱۰ خط موازی       │ │ بیوراکتورهای ۵۰۰L        │ │
│     Source Plasma & Apheresis Centers         │ └──────────────────────────┘ └──────────────────────────┘ │
│                                               │ ┌──────────────────────────┐                             │
│ [ ] ۳. پالایش صنعتی پلاسما و بیودارو     (۴) │ │ [LOGO] زیست‌پویا فارمد   │                             │
│     Fractionation & Biomanufacturing          │ │ کشت سلولی پیشرفته        │                             │
│                                               │ │ انطباق با cGMP           │                             │
│ [ ] ۴. ایمونوتراپی و ژن‌درمانی پیشرفته   (۳) │ └──────────────────────────┘                             │
│     Cell & Gene ATMP Therapeutics             │ ──────────────────────────────────────────────────────── │
│                                               │ [ 🔗 مشاهده اطلس کامل خوشه تحقیق و توسعه (۳ شرکت) ← ]    │
│ [ ] ۵. سرم‌های هایپرایمیون و پادزهرها    (۲) │   (/subsidiaries/cluster/rd-incubation/)                 │
│     Equine Sera & Antivenoms                  │                                                          │
│                                               │                                                          │
│ [ ] ۶. پرکنی آسپتیک و پروتئین نوترکیب   (۳) │                                                          │
│     Sterile Fill-Finish & Recombinants        │                                                          │
│                                               │                                                          │
│ [ ] ۷. کنترل کیفی بیولوژیک و رهایش بچ   (۳) │                                                          │
│     QC Bioassays & Batch Release Hub          │                                                          │
└───────────────────────────────────────────────┴──────────────────────────────────────────────────────────┘
```

#### 2.2.1 Spatial Clamping & Responsive Viewport Containment Specifications
- **Viewport Height Containment (768p Laptop Proof):**
  - Outer Container: `max-height: min(560px, calc(85vh - 90px))`.
  - On a 1366x768 display with 620px usable viewport, the menu occupies exactly 530px, leaving a safe 90px clearance and completely eliminating bottom viewport clipping.
- **Fluid Width Clamping:**
  - `width: min(1080px, calc(100vw - 48px))`.
  - On screens between 1024px and 1280px (or 1080p displays with 125% Windows scaling), width dynamically scales down from 1080px to 976px with zero horizontal overflow or clipping.
- **Pane 1 (Master Sidebar Mechanics):**
  - Width: `32%` (minimum 300px).
  - Background: Subtle frosted contrast (`rgba(0, 0, 0, 0.02)` / Dark: `rgba(255, 255, 255, 0.03)`).
  - Scrollbar: Custom thin scrollbar (`scrollbar-thin scrollbar-thumb-slate-200`).
  - Active Tab State: Accent background tint (`rgba(0, 114, 206, 0.08)`), high-contrast indicator bar, bold text.
  - Interaction: Hover switch with `100ms` intentional debounce; full keyboard arrow-key navigation support (`aria-selected="true"`).
- **Pane 2 (Detail Canvas Mechanics):**
  - Width: `68%` (minimum 640px).
  - Grid: 2-column CSS Grid (`grid-template-columns: repeat(2, minmax(0, 1fr))`, `gap: 16px`).
  - Overflow: `overflow-y: auto` with independent scroll containment (`overscroll-behavior: contain`).
  - Bottom Pinned Bar: Sticky cluster link pointing to `/subsidiaries/cluster/{cluster-slug}/`.

---

### 2.3 Interaction, Micro-Animations & Accessibility

- **Trigger:** Desktop hover trigger on «شرکت‌های زیرمجموعه» with `150ms` entry debounce to avoid accidental firing; instant trigger on keyboard `Enter` or `Space` (`aria-haspopup="true"`, `aria-expanded="false"`).
- **Reveal Motion:** GSAP slide-and-fade (`opacity: 0 -> 1`, `translateY: -8px -> 0px`, duration `250ms`, ease `power2.out`).
- **Tab Transitions (Mode B):** Cross-fade of subsidiary cards (`opacity: 0 -> 1`, duration `180ms`, ease `power1.out`).
- **Focus Trapping & Escape Handling:** `Escape` key instantly closes the menu and returns focus to the header toggle link.

---

## 3. Global Footer Architecture

The footer reinforces corporate longevity, regulatory transparency, and legal ownership. It is organized into four structured content columns, topped by the brand statement and sealed by the legal utility bar:

```text
GLOBAL INSTITUTIONAL FOOTER ARCHITECTURE
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ [RAHNAB PHARMED LOGO & CORPORATE MANIFESTO]                                                            │
│ هلدینگ سرمایه‌گذاری زیست‌دارویی رهناب فارمد — پیشگام حاکمیت سلامت، خودکفایی دارویی و توسعه زیست‌فناوری   │
├───────────────────┬───────────────────┬────────────────────────────┬───────────────────────────────────┤
│ ستون ۱: اکوسیستم   │ ستون ۲: حاکمیت    │ ستون ۳: استانداردها و مجوزها│ ستون ۴: ارتباط با هلدینگ و دفاتر  │
│    و شرکت‌های تابعه│    شرکتی و هلدینگ │                            │                                   │
├───────────────────┼───────────────────┼────────────────────────────┼───────────────────────────────────┤
│ • پرسیس ژن        │ • درباره رهناب    │ • استانداردهای GMP ملی و WHO│ • پژوهشگاه ملی مهندسی ژنتیک       │
│ • نوژین زیست فارمد│ • پیام مدیرعامل   │ • آزمایشگاه همکار غذاودارو │   و زیست‌فناوری، ط ۳، واحد ۳۰۲    │
│ • پادرا سرم البرز │ • هیئت‌مدیره و ارکان│ • شبکه آزمایشگاهی راهبردی  │ • تلفن مرکزی: ۰۲۱-۴۹۳۶۱۲۰۰        │
│ • کارایاخته       │ • زیرساخت‌های صنعتی│ • تأییدیه شرکت‌های دانش‌بنیان│ • ایمیل رسمی: info@rahnab.com     │
│ • تأمین پلاسما    │ • تاریخچه و افتخار│ • انطباق با فارماکوپه‌های بین‌المللی│ • شبکه لینکدین: Rahnab Pharmed   │
│ • بایا زیست فارمد │ • چشم‌انداز ۱۰ساله│ • اصول ایمنی زیستی (Biosafety)│ • پالایشگاه سپهر (نوژین زیست)    │
│ • آرک زیست آزما   │ • فرصت‌های همکاری │ • منشور اخلاق پزشکی و پژوهشی│ • درخواست جلسه حضوری و بازدید      │
├───────────────────┴───────────────────┴────────────────────────────┴───────────────────────────────────┤
│ [LEGAL COMPLIANCE & UTILITY BAR]                                                                       │
│ © ۲۰۲۶ شرکت رهناب فارمد (سهامی خاص). تمامی حقوق مادی و معنوی محفوظ است.                                 │
│ [حریم خصوصی کاربران]   •   [شرایط استفاده سازمانی]   •   [نقشه تفصیلی سایت]   •   [شناسه ملی هلدینگ رهناب فارمد]   │
└────────────────────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 4. Mobile Navigation Architecture (Ergonomics & Touch Zone)

On viewports below 1024px, the header switches to an ergonomic mobile pattern featuring an off-canvas drawer designed for single-hand mobile use, touch targets >= 48px, and compact vertical thumb zones.

```text
MOBILE DRAWER ERGONOMIC ANATOMY (375PX - 768PX)
┌────────────────────────────────────────────────────────┐
│ [TOP BAR: LOGO] ─────────── [FA / EN] ─── [CLOSE (X)]  │
│ (Height: 64px | Border-Bottom: 1px subtle divider)     │
├────────────────────────────────────────────────────────┤
│ [PERSISTENT LIVE SEARCH INPUT]                         │
│ [جستجو در شرکت‌ها، اخبار و محصولات...             🔍] │
├────────────────────────────────────────────────────────┤
│ PRIMARY NAVIGATION (ACCORDION STRUCTURE)               │
│                                                        │
│ 1. صفحه اصلی (Home)                                    │
│                                                        │
│ 2. درباره رهناب (About Rahnab)                       ▾ │
│    ├── داستان و مأموریت هلدینگ                         │
│    ├── ارکان حاکمیت و مدیران                           │
│    ├── زیرساخت‌های تولیدی                             │
│    └── مجوزها و گواهینامه‌ها                           │
│                                                        │
│ 3. شرکت‌های زیرمجموعه (Subsidiaries Portfolio)       ▾ │
│    │  [<= 8 Subsidiaries: Flat 7-item list]            │
│    │  [> 8 Subsidiaries: Nested Cluster Accordion]    │
│    ├── پرسیس ژن (شتاب‌دهنده بیوتک)                     │
│    ├── نوژین زیست فارمد (پالایشگاه پلاسما)             │
│    ├── پادرا سرم البرز (پادزهر و سرم)                  │
│    ├── کارایاخته / کارتیمد (سلول‌درمانی)               │
│    ├── تأمین پلاسما نوژین (مراکز پلاسما)               │
│    ├── بایا زیست فارمد (تولید بیودارو)                 │
│    └── آرک زیست آزما (کنترل کیفی بیولوژیک)             │
│    └── [مشاهده اطلس کامل شرکت‌ها ←]                    │
│                                                        │
│ 4. اخبار و رویدادها (News & Events)                    │
│                                                        │
│ 5. تماس و ارتباط سازمانی (Contact)                     │
├────────────────────────────────────────────────────────┤
│ STICKY THUMB-ZONE ACTIONS (COMPACT HORIZONTAL GRID)    │
│ ┌──────────────────────────┬─────────────────────────┐ │
│ │ [ 📞 تماس: ۰۲۱-۴۹۳۶۱۲۰۰ ]│ [ ✉️ ثبت درخواست B2B ] │ │
│ └──────────────────────────┴─────────────────────────┘ │
│ (Height: 64px | Fixed at bottom | WCAG 2.2 touch-ready)│
└────────────────────────────────────────────────────────┘
```

### 4.1 Mobile Viewport Optimization & Thumb-Zone Ergonomics
1. **Language Switcher Relocation (Vertical Space Optimization):**
   - The `[FA / EN]` toggle is relocated to the top bar of the mobile drawer adjacent to the Close (X) button.
   - This reclaims 48px of vertical height from the scrollable menu area.
2. **Compact Horizontal Thumb-Zone Grid:**
   - The primary action buttons (*تماس تلفنی مستقیم* and *ثبت درخواست B2B*) are configured in a **2-column horizontal grid** (`grid-template-columns: 1fr 1fr`, Height: 52px, Padding: 8px 16px, Total Container Height: 64px).
   - This replaces the three stacked 48px rows, reducing thumb-zone vertical footprint from 160px down to 64px, freeing nearly 100px of vertical scrolling space for comfortable accordion navigation on compact displays (e.g. iPhone SE / 375x667px).
3. **Adaptive Portfolio Accordion (> 8 Subsidiaries):**
   - When active subsidiaries exceed 8, the Subsidiaries accordion automatically renders a 2-tier nested accordion (Tier 1: Value-Chain Clusters; Tier 2: Subsidiaries in active cluster), preventing infinite single-level list scrolling.
- **Directional Slide-in:**
  - Persian (RTL): Drawer slides out from the **Right** edge.
  - English (LTR): Drawer slides out from the **Left** edge.
- **Scroll Locking:** When open, background document scrolling is disabled via `body-scroll-lock`.
- **Keyboard Trapping:** Tab focus cycles strictly inside the drawer until dismissed via `Escape` or the close icon.

---

## 5. Language Switcher Architecture & State Management

### 5.1 Touchpoints & Placements
1. **Desktop Header:** Positioned adjacent to the primary CTA in the floating pill (`[FA / EN]`).
2. **Mobile Drawer:** Positioned in the persistent top bar adjacent to the Close (X) button for instant thumb accessibility.
3. **Footer Utility Bar:** Text-based language toggle in the global footer.

### 5.2 State Persistence & Cookie Lifecycle
When a user explicitly selects a language:
- Preference is stored in browser `localStorage.setItem('rahnab_lang_pref', 'fa' | 'en')`.
- Cookie is registered: `Set-Cookie: rahnab_lang=en; Path=/; Max-Age=2592000; SameSite=Lax` (30-day persistence).
- On initial entry to root domain `rahnab.com`:
  - Default locale is Persian (`fa-IR`).
  - If `rahnab_lang=en` cookie is present and user did not arrive via a direct Persian URL, client is routed to `/en/`.

### 5.3 URL Mapping & Translation Resolution
- If an exact localized equivalent exists:
  - Persian `/subsidiaries/padra-serum/` toggles directly to English `/en/subsidiaries/padra-serum/`.
- If an exact localized equivalent does not yet exist:
  - Employs the **Graceful In-Page Bilingual Fallback** (Deliverable 01, Section 4.4): the layout switches language while presenting the verified source content with an editorial translation banner.

---
*Authored and verified by Milestone 1 Architecture Team (`worker_m1_author`).*
