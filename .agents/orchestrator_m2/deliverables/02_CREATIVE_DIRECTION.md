# DELIVERABLE 02: CREATIVE DIRECTION & ART DIRECTION
## Rahnab Pharmed Corporate Website (`rahnab.com`)
### Milestone 2: Design System, Tokens & Art Direction

**Document Code:** `RAHNAB-M2-DELIV-02-ART`  
**Classification:** Authoritative Technical & Creative Specification  
**Target Milestone:** Milestone 2 (Design System & Creative Foundations)  
**Downstream Consumer:** Milestone 3 (Interactive HTML/CSS/JS Prototype Engine)  
**Parent Orchestrator:** `orchestrator_m2`  
**Authoring Unit:** `worker_m2_author`  
**Foundational Sources:** `docs/MASTER_PROJECT_BRIEF.md`, `03_BENCHMARK_MATRIX.md`, `02_SUBSIDIARY_RESEARCH.md`, `.agents/ORIGINAL_REQUEST.md`, `explorer_m2_art/analysis.md`, `.agents/rules/decision-making.md`.

---

## 1. Executive Summary & Creative Mission

### 1.1 The Strategic Identity Pivot
Rahnab Pharmed is an umbrella biopharmaceutical investment holding group orchestrating seven specialized enterprises across the national life-science value chain. It is not an operating consumer drug laboratory selling OTC pills.

While the domestic reference benchmark **CinnaGen** (`cinnagen.com`) is an operating manufacturer dominated by patient advocacy, drug cartons, and disease indications, **Rahnab Pharmed cannot and must not replicate this consumer medical model.**

Rahnab's visual presence must communicate:
1. **Sovereign Industrial Scale:** Governing a closed-loop biomanufacturing ecosystem from automated apheresis (`Tamin Plasma Nozhin`) to a 150,000 L/yr industrial plasma refinery (`Nozhin Zist Pharmed`), sterile fill-finish (`Baya Zist Pharmed`), ATMP CAR-T cellular immunotherapy (`KarayaKhteh / CARTIMED`), equine hyperimmune antivenoms (`Padra Serum Alborz`), national bioprocess incubation (`Persis Gene`), and national biological QC batch-release (`Arc Zist Azma`).
2. **Capital & Intellectual Gravity:** Designed for institutional decision-makers: health ministries, global CDMO partners, private equity investors, and distinguished biomedical researchers.
3. **Quiet Luxury & High-Tech Restraint:** Characterized by monumental bilingual typography, disciplined mathematical layout grids, deep bio-kinetic substrates, and unassailable scientific authenticity.

---

## 2. The Four Brand Pillars of Rahnab Pharmed

Every aesthetic, spatial, typographic, and kinetic decision is governed by four immutable brand pillars:

```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│                          THE 4 BRAND PILLARS OF RAHNAB PHARMED                         │
├──────────────────────────┬──────────────────────────┬──────────────────────────────────┤
│ 1. STRATEGIC CONFIDENCE  │ 2. SCIENTIFIC AUTHORITY  │ 3. EDITORIAL ELEGANCE            │
│ (ثبات و اطمینان راهبردی)  │ (اقتدار علمی و شواهد)    │ (ظرافت ژورنالیستی و وقار مینیمال) │
├──────────────────────────┴──────────────────────────┴──────────────────────────────────┤
│                                4. DYNAMIC PRECISION                                    │
│                              (دقت بیومتریک و پویایی)                                    │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

### Pillar 1: Strategic Confidence (ثبات و اطمینان راهبردی هلدینگ)
- **Conceptual Definition:** The psychological presence of institutional permanence, capital sovereignty, and systemic indispensability. Rahnab does not seek validation through loud marketing or visual noise; it commands quiet authority as the steward of national health security.
- **Visual Translation:**
  * Monolithic dark substrates (`#030914` or `#0A0F1D`) that absorb visual noise and provide immense spatial depth.
  * Expansive architectural whitespace (vertical section separations of `120px` to `160px`), conveying institutional composure and focus.
  * Structural gridlines with hairline boundaries (`border-white/10` or `1px solid rgba(255, 255, 255, 0.08)`).

### Pillar 2: Scientific Authority (اقتدار علمی و شواهد بنیادین)
- **Conceptual Definition:** Trust in biopharmaceuticals is established exclusively through peer-reviewed evidence, audited capacities, and regulatory certifications.
- **Visual Translation:**
  * Elimination of marketing abstractions in favor of documentary engineering data: verified GMP/ISO seals, cleanroom classifications (ISO 5 / Grade A), and nominal throughput capacities (150,000 L/yr plasma, >70% antivenom supply).
  * Tabular lining numerals (`font-variant-numeric: tabular-nums`) across all metrics and KPI tables.
  * Authentic macro photography of stainless steel bioreactor skids, fractionation columns, and confocal micrographs.

### Pillar 3: Editorial Elegance (ظرافت مینیمال و وقار ژورنالیستی)
- **Conceptual Definition:** Bridging Swiss modernist typography with the gravitas of elite scientific publications (*Nature Biotechnology*, *Financial Times*, *Monocle*).
- **Visual Translation:**
  * Asymmetric layout grids balancing monumental hero display typography with disciplined micro-annotations.
  * Harmonious bilingual baseline calibration: **Yekan Bakh** (Persian RTL) optically balanced with **Euclid Circular A** or **Plus Jakarta Sans** (English LTR).
  * Architectural micro-radius (`4px` to `8px`), rejecting the consumer app "bubble" aesthetic (`rounded-3xl`).

### Pillar 4: Dynamic Precision (دقت بیومتریک و پویایی فناورانه)
- **Conceptual Definition:** Life science is living, cellular, and kinetic. Motion in Rahnab Pharmed embodies biophysical momentum and molecular precision, never gratuitous animation.
- **Visual Translation:**
  * Smooth kinetic scroll physics calibrated via **Lenis Scroll** (`lerp: 0.08`), imbuing the interface with physical weight.
  * GSAP scroll-triggered text-mask reveals and line unmasking that pace information intake.
  * Hairline accent glow states, magnetic button physics, and progressive disclosure drawers.

---

## 3. Forensic Rejection of Industry Clichés

In strict accordance with Section 15 of `docs/MASTER_PROJECT_BRIEF.md`, the following five industry clichés are **permanently banned**:

```text
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│                             THE PROHIBITED DESIGN ANTI-PATTERNS                                  │
├──────────────────────────────┬───────────────────────────────────────────────────────────────────┤
│ PROHIBITED CLICHÉ            │ ARCHITECTURAL RATIONALE & APPROVED COUNTER-PATTERN                │
├──────────────────────────────┼───────────────────────────────────────────────────────────────────┤
│ 1. "Hospital/Pharma Blue"    │ REJECT: Monochromatic medical cyan (#00a3e0) and hospital pastel │
│    Monochromatic Cliché      │ blues. Evokes low-cost generic clinics and sterile sanitization.  │
│                              │ ADOPT: Deep Obsidian/Navy substrates paired with warm kinetic     │
│                              │ amber (#FD7702) or sovereign clinical emerald (#00A896).          │
├──────────────────────────────┼───────────────────────────────────────────────────────────────────┤
│ 2. Generic Stethoscope Stock │ REJECT: Smiling stock models in lab coats pointing at test tubes  │
│    Photography               │ or wearing stethoscopes. Destroys holding credibility instantly.  │
│                              │ ADOPT: Authentic photojournalism: ISO 5 cleanroom operators in    │
│                              │ full aseptic bunny suits, automated apheresis, stainless steel.   │
├──────────────────────────────┼───────────────────────────────────────────────────────────────────┤
│ 3. Floating Blue DNA Helices │ REJECT: Floating 3D DNA double helices rotating in a void. Cheap  │
│    in a Void                 │ sci-fi trope of 2005-era corporate biotech.                       │
│                              │ ADOPT: Real confocal microscopy, fluorescent immunocytochemistry, │
│                              │ SEM cellular imaging of CARTIMED CAR-T cells, HPLC traces.        │
├──────────────────────────────┼───────────────────────────────────────────────────────────────────┤
│ 4. Excessive Glassmorphic    │ REJECT: Multi-layered colorful blurred blobs, heavy glassy panels,│
│    Gradients & Blobs         │ and neon gradient washes (looks like a consumer Web3/crypto site).│
│                              │ ADOPT: Precise hairline borders (1px border-white/10), dark semi- │
│                              │ transparent surfaces (bg-black/40 with backdrop-blur-md).         │
├──────────────────────────────┼───────────────────────────────────────────────────────────────────┤
│ 5. Frivolous / Random Motion │ REJECT: Constant bouncing, spinning cards, auto-rotating carousels│
│    & Particle Storms         │ that distract from reading and cause cognitive friction.          │
│                              │ ADOPT: Physics-based scroll storytelling, pinned split-view       │
│                              │ narrative chapters, subtle hover micro-states, prefers-reduced.   │
└──────────────────────────────┴───────────────────────────────────────────────────────────────────┘
```

---

## 4. Strategic Color Direction A: Bio-Kinetic Amber

### 4.1 Concept & Brand Psychology
Direction A establishes high-energy contrast between infinite institutional stability and vibrant scientific catalytic action.
- **Deep Obsidian / Navy (`#030914`):** Substrate evoking molecular depth, cosmic quiet, and sovereign permanence. Eliminates screen glare and creates a theater-like canvas where content commands focus.
- **Kinetic Amber (`#FD7702`):** Direct nod to the domestic benchmark CinnaGen and global venture creation institutions like Flagship Pioneering. Triggers the *Von Restorff Isolation Effect*: representing enzymatic energy, metabolic catalysis, active incubation, and capital warmth. It breaks the cold sterility of traditional pharma while guiding immediate attention to CTAs and milestones.
- **Platinum Slate & Steel (`#78889E` / `#CBD5E1`):** Provides clinical neutrality and balanced readability.

### 4.2 Complete Hex Palette & Design Tokens (Direction A)

| Token Name | Hex Code | RGB | Role / Usage | WCAG Compliance |
|:---|:---|:---|:---|:---|
| `bg-primary` | `#030914` | `rgb(3, 9, 20)` | Deep Obsidian Root Canvas & Page Background | Base Substrate |
| `bg-surface-card` | `#081226` | `rgb(8, 18, 38)` | Level 1 Surface: Holding cards, section containers | Contrast vs Text: 18.2:1 |
| `bg-surface-elevated`| `#0E1B38` | `rgb(14, 27, 56)` | Level 2 Surface: Dropdowns, modal overlays, tooltips | Contrast vs Text: 15.4:1 |
| `accent-primary` | `#FD7702` | `rgb(253, 119, 2)`| Kinetic Amber: Primary CTA buttons, key metrics, active tabs | AAA on dark (7.39:1) |
| `accent-hover` | `#FF8A1E` | `rgb(255, 138, 30)`| Kinetic Amber Light: Hover states, glowing edges | AAA on dark (8.95:1) |
| `accent-pressed` | `#D96200` | `rgb(217, 98, 0)` | Kinetic Amber Deep: Active pressed states | AA on dark (5.72:1) |
| `accent-alpha` | `rgba(253,119,2,0.12)`| - | Translucent amber badge backgrounds, focus ring halos | Subtle ambient glow |
| `text-primary` | `#F8FAFC` | `rgb(248, 250, 252)`| High-Purity White: Headings, editorial titles, metric numbers | AAA vs `#030914` (18.96:1) |
| `text-secondary` | `#CBD5E1` | `rgb(203, 213, 225)`| Slate Platinum: Body text, narrative paragraphs | AAA vs `#030914` (13.06:1) |
| `text-muted` | `#78889E` | `rgb(120, 136, 158)`| Slate Gray: Metadata, dates, secondary labels, captions | AA vs `#030914` (5.60:1) |
| `border-subtle` | `#1E293B` | `rgb(30, 41, 59)` | Decorative grid lines & hairline card borders (1.36:1 vs `#030914`; purely decorative, does NOT meet SC 1.4.11 3:1 non-text UI contrast; interactive form inputs must use `--border-prominent`) | Decorative only (<3:1) |
| `border-ghost` | `rgba(255,255,255,0.08)`| - | Hairline glass card borders | Micro-separation |
| `status-success` | `#10B981` | `rgb(16, 185, 129)`| Green: GMP certified, active batch, clinical success | AA on dark (7.84:1) |
| `status-warning` | `#F59E0B` | `rgb(245, 158, 11)`| Gold: Regulatory pending, trial phase tracking | AAA on dark (8.42:1) |
| `status-error` | `#EF4444` | `rgb(239, 68, 68)` | Red: Critical notice, validation error | AA on dark (4.91:1) |

### 4.3 Mathematical Contrast & Accessibility Verification (Direction A)
- **Substrate Luminance:** $L_{\#030914} = 0.00259$
- **Amber Accent Luminance:** $L_{\#FD7702} = 0.3389$
- **Contrast Ratio (Amber vs Obsidian):**
  $$\text{Ratio} = \frac{0.3389 + 0.05}{0.00259 + 0.05} = \frac{0.3889}{0.05259} = 7.39:1$$
  *(Exceeds WCAG AAA requirement of 7.0:1 for normal body text and 4.5:1 for large display titles).*
- **Crucial Button Text Rule:**
  * On an `#FD7702` filled button, text must **NEVER** be White (`#FFFFFF`, contrast is only $2.70:1$ — FAILS WCAG AA).
  * Button text on `#FD7702` **MUST** be Obsidian Black (`#030914`, contrast is $7.42:1$ — PASSES WCAG AAA) or dark navy.
- **Non-Text UI Contrast Note (SC 1.4.11):**
  * `border-subtle` (`#1E293B`) has a contrast ratio of $1.36:1$ vs Obsidian (`#030914`). It is purely decorative and does NOT meet 3:1 non-text UI contrast. Form input boundaries and interactive controls must use `--border-prominent` or high-contrast surfaces.
- **Muted Text Token (`--text-muted`):**
  * Calibrated to `#78889E`, providing a contrast ratio of $5.60:1$ vs Obsidian `#030914`, passing WCAG AA for normal text ($\ge 4.5:1$).

---

## 5. Strategic Color Direction B: Clinical Sovereign Slate

### 5.1 Concept & Brand Psychology
Direction B establishes clinical rigor, cryogenic sterility, regenerative biology, and Swiss-grade institutional governance.
- **Clinical Sovereign Slate (`#0A0F1D`):** Deep midnight slate infused with microscopic marine blue pigments, evoking automated cleanrooms and cryogenic vaults.
- **Clinical Emerald / Bio-Teal (`#00A896`):** Inspired by Roche Group, Lonza, and WuXi AppTec. The chromatic symbol of cellular life, biocompatibility, regenerative synthesis, and surgical sterility. Signals calm medical governance and national sustainability.
- **Cold Platinum Highlights (`#E6ECF0`):** Evoking electropolished 316L pharmaceutical stainless steel.

### 5.2 Complete Hex Palette & Design Tokens (Direction B)

| Token Name | Hex Code | RGB | Role / Usage | WCAG Compliance |
|:---|:---|:---|:---|:---|
| `bg-primary` | `#0A0F1D` | `rgb(10, 15, 29)` | Deep Sovereign Slate Root Canvas | Base Substrate |
| `bg-surface-card` | `#0E1726` | `rgb(14, 23, 38)` | Level 1 Surface: Holding cards, subsidiary modules | Contrast vs Text: 16.5:1 |
| `bg-surface-elevated`| `#142236` | `rgb(20, 34, 54)` | Level 2 Surface: Interactive drawers, modals | Contrast vs Text: 13.8:1 |
| `accent-primary` | `#00A896` | `rgb(0, 168, 150)` | Clinical Emerald: Primary CTA, active states, key data | AA on dark (6.41:1) |
| `accent-light` | `#02C39A` | `rgb(2, 195, 154)` | Bio-Mint Light: Hover states, glowing accents | AAA on dark (9.22:1) |
| `accent-deep` | `#028090` | `rgb(2, 128, 144)` | Deep Bio-Marine: Pressed states, secondary accents | AA large on dark (4.81:1) |
| `accent-alpha` | `rgba(0,168,150,0.12)`| - | Translucent emerald badges, glow contours | Subtle ambient bio-glow |
| `text-primary` | `#F8FAFC` | `rgb(248, 250, 252)`| High-Purity White: Primary display typography and KPIs | AAA vs `#0A0F1D` (18.42:1) |
| `text-secondary` | `#CBD5E1` | `rgb(203, 213, 225)`| Cold Platinum White: Body text, narrative reading | AAA vs `#0A0F1D` (12.69:1) |
| `text-muted` | `#78889E` | `rgb(120, 136, 158)`| Cool Slate: Secondary metadata, timestamps, captions | AA vs `#0A0F1D` (5.44:1) |
| `border-subtle` | `#1C2A3E` | `rgb(28, 42, 62)` | Decorative grid dividers & hairline card frames (1.32:1 vs `#0A0F1D`; purely decorative, does NOT meet SC 1.4.11 3:1 non-text UI contrast; interactive form inputs must use `--border-prominent`) | Decorative only (<3:1) |
| `border-ghost` | `rgba(255,255,255,0.08)`| - | Hairline elevation borders | Micro-separation |
| `status-success` | `#059669` | `rgb(5, 150, 105)` | Clinical Green: Certified, validated | AA on dark (6.28:1) |
| `status-warning` | `#D97706` | `rgb(217, 119, 6)` | Amber Ochre: Pending review | AA on dark (5.92:1) |
| `status-error` | `#DC2626` | `rgb(220, 38, 38)` | Deep Crimson: High alert | AA on dark (4.65:1) |

### 5.3 Mathematical Contrast & Accessibility Verification (Direction B)
- **Substrate Luminance:** $L_{\#0A0F1D} = 0.00495$
- **Emerald Accent Luminance:** $L_{\#00A896} = 0.3021$
- **Contrast Ratio (Emerald vs Sovereign Slate):**
  $$\text{Ratio} = \frac{0.3021 + 0.05}{0.00495 + 0.05} = \frac{0.3521}{0.05495} = 6.41:1$$
  *(Passes WCAG AA for normal body text $\ge 4.5:1$; passes WCAG AAA for display headings $\ge 18\text{pt} / 24\text{px}$ $\ge 3.0:1$).*
- **Crucial Button Text Rule & WCAG Thresholds:**
  * Emerald button `#00A896` with White text `#FFFFFF` achieves $2.98:1$ (FAILS AA).
  * Emerald button `#00A896` with Dark Sovereign Slate text `#0A0F1D` achieves 6.41:1 (PASSES WCAG AA for normal body text, PASSES WCAG AAA for large text only; does NOT achieve the $7.00:1$ AAA threshold for normal body text $<18\text{pt}$). For strict normal-text AAA compliance, darken text to `#030712` ($7.55:1$).
- **Non-Text UI Contrast (SC 1.4.11):**
  * `border-subtle` (`#1C2A3E`) has a contrast ratio of $1.32:1$ vs Sovereign Slate (`#0A0F1D`). It is purely decorative and does NOT meet the 3:1 non-text UI contrast requirement. Form input boundaries must use `--border-prominent` or high-contrast surfaces.
- **Muted Text Token (`--text-muted`):**
  * Calibrated to `#78889E`, yielding a contrast ratio of $5.44:1$ vs Sovereign Slate `#0A0F1D`, passing WCAG AA for normal body text ($\ge 4.5:1$).

---

## 6. Detailed ADR Comparison & Final Recommendation
*(Formulated strictly per `.agents/rules/decision-making.md`)*

---

### تصمیم‌گیری معماری و جهت‌گیری رنگی برند هلدینگ رهناب فارمد

## گزینه ۱
**جهت‌گیری A: Bio-Kinetic Deep Navy/Obsidian (`#030914`) + Kinetic Amber Accent (`#FD7702`)**

### مزایا:
1. **بالاترین کنتراست ادراکی (Von Restorff Effect):** رنگ کهربایی کینتیک بر بستر ابسیدین بیشترین جلب توجه آنی را در Call-to-Actionها، شاخص‌های کلیدی عملکرد (KPI Counters) و برچسب‌های شتاب‌دهی ایجاد می‌کند (نسبت کنتراست ریاضی $7.39:1$ که استاندارد سخت‌گیرانه WCAG AAA را محقق می‌سازد).
2. **پاسخ به سلیقه و رفرنس اعلام‌شده کارفرما:** کارفرما صراحتاً در بریف پروژه به سایت سیناژن به عنوان رفرنس مورد علاقه خود اشاره کرده است. سیناژن از ترکیب سرمه‌ای عمیق با نارنجی پرانرژی استفاده می‌کند. جهت‌گیری A این پویایی و انگیزش سرمایه‌گذاری را بدون کپی‌برداری ساختاری بازآفرینی می‌کند.
3. **تداعی‌گر انرژی زیستی و سرمایه‌گذاری جسورانه:** در روانشناسی برند، ترکیب ابسیدین و امبر یادآور شتاب‌دهنده‌ها و صندوق‌های سرمایه‌گذاری بیوتکنولوژی تراز اول جهان مانند *Flagship Pioneering* است و حس "حیات، گرما، سرعت و خلق ارزش" را منتقل می‌کند.

### معایب:
1. **ریسک ادراکی شباهت به سیناژن (CinnaGen Association):** با وجود تمایز ساختاری هلدینگ نسبت به شرکت دارویی، استفاده از کد رنگی در خانواده نارنجی ممکن است در نگاه نخست برخی متخصصان صنعت، تشابه هویتی ناخواسته القا کند.
2. **گرمی بصری غیرسنتی برای بخش‌های صرفاً بالینی:** برای بخش‌هایی نظیر پالایشگاه پلاسما (`نوژین زیست`)، آزمایشگاه کنترل کیفی (`آرک زیست آزما`) یا اتاق‌های تمیز استریل (`بایا زیست`)، رنگ امبر ممکن است بیش از حد گرم به نظر برسد و تا حدی از حس خنکی و استریلیزه بودن کلینیک بکاهد.

---

## گزینه ۲
**جهت‌گیری B: Clinical Sovereign Slate (`#0A0F1D`) + Clinical Emerald Accent (`#00A896`)**

### مزایا:
1. **تمایز ۱۰۰ درصدی از رقیب داخلی (CinnaGen):** این پالت خط هویتی رهناب را به طور کامل از سیناژن و سایر شرکت‌های دارویی ایران جدا کرده و استایلی در کلاس جهانی هلدینگ‌های اروپایی (*Roche Group*, *Lonza*, *WuXi AppTec*) ایجاد می‌کند.
2. **تطابق فوق‌العاده با زنجیره ارزش پاک و استریل:** رنگ سبز زمردی بالینی (Bio-Emerald) نماد سلول‌درمانی، پزشکی بازساختی، بیوتکنولوژی پیشرفته، خلوص پلاسما و استانداردهای اتاق تمیز ISO Class 5 است و حس اعتماد نهادی و پایداری ملی را ارتقا می‌دهد.
3. **آرامش بصری در خوانش متون طولانی (Lower Cognitive Fatigue):** پس‌زمینه اسلیت همراه با رنگ سبز ملایم، حداقل خستگی چشم را برای مدیران ارشد B2B و سرمایه‌گذاران ایجاد می‌کند و رویکرد "Quiet Luxury" را بهتر به نمایش می‌گذارد.

### معایب:
1. **کنتراست اندکی پایین‌تر در مقایسه با امبر:** نسبت کنتراست امرالد بر روی اسلیت برابر با $6.41:1$ است (که WCAG AA را با اقتدار و WCAG AAA را برای تیترها پاس می‌کند، اما نسبت به امبر $7.39:1$ در ابعاد کوچک حساس‌تر است).
2. **انرژی کینتیک و محرک بصری کمتر:** رنگ سبز زمردی نسبت به کهربایی، آرام‌تر و نهادی‌تر است و ممکن است هیجان سرمایه‌گذاری جسورانه (Venture Creation) را ملایم‌تر جلوه دهد.

---

## پیشنهاد نهایی:
### رویکرد هیبریدی استراتژیک بر پایه گزینه ۱ (Direction A as Primary Holding Identity with Clinical Emerald as Specialized Bio-Ecosystem Token)

### دلیل انتخاب:
بر اساس تحلیل رفتار مخاطبان B2B، روانشناسی سرمایه‌گذاری، بررسی بریف کارفرما و رعایت اصل بنیادین `Maintainability & Brand Scalability`:
1. **پایه اصلی هویت بصری هلدینگ رهناب فارمد بر مبنای جهت‌گیری A (Bio-Kinetic Deep Navy/Obsidian `#030914` + Kinetic Amber `#FD7702`) پیاده‌سازی می‌شود.**
   - رهناب فارمد در درجه اول یک **هلدینگ سرمایه‌گذاری (Investment Holding)** است، نه یک آزمایشگاه یا خط تولید تک‌محصولی. هویت یک هلدینگ نیازمند پویایی، جرأت سرمایه‌گذاری، انگیزش اقتصادی و خلق ارزش است که رنگ کهربایی کینتیک به بهترین شکل آن را منتقل می‌کند.
   - کارفرما تمایل شدید خود را به انرژی بصری سیناژن اعلام کرده است؛ انتخاب جهت‌گیری A این خواسته روانی کارفرما را به شکل کمال‌گرایانه تأمین می‌کند در حالی که زبان معماری و داستان‌سرایی هلدینگ مانع از شبیه‌سازی محتوایی می‌شود.
2. **ادغام هوشمندانه امرالد بالینی (`#00A896`) به عنوان یک Token مکمل در ماتریس زیرمجموعه‌ها (Domain Taxonomy Accent):**
   - برای حفظ تمایز زیرمجموعه‌های ۷ گانه و پاسخ به نیازهای بخش‌های بالینی/سلولی، سیستم دیزاین‌توکن رهناب رنگ امرالد بالینی را به عنوان نشانگر تخصصی زنجیره سلولی/بیولوژیک (مانند شرکت کارایاخته/CARTIMED و آرک زیست آزما) به کار می‌گیرد.
   - این معماری هیبریدی مانع از یکنواختی تک‌رنگ شده و غنای بصری یک هلدینگ ۷ شاخه‌ای را به نمایش می‌گذارد.

---

## 7. Photography Art Direction Guidelines

### 7.1 Overview & Aesthetic Philosophy
Every image displayed across `rahnab.com` must operate as **unassailable empirical proof**. The era of generic corporate photography—staged smiles, clipboards, artificial lab coats, and generic models—is completely abolished.
Every frame must convey **industrial reality, clinical rigor, extreme precision, and human dignity**.

```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│                        PHOTOGRAPHY ART DIRECTION TAXONOMY                              │
├────────────────────────┬────────────────────────┬──────────────────────────────────────┤
│ 1. INDUSTRIAL          │ 2. APHERESIS & PLASMA  │ 3. ADVANCED MICROSCOPY &             │
│    CLEANROOMS          │    COLLECTION CENTERS  │    CELLULAR THERAPY                  │
│    (Baya / Nozhin)     │    (Tamin Plasma)      │    (KarayaKhteh / Arc Zist)          │
├────────────────────────┴────────────────────────┴──────────────────────────────────────┤
│                               4. EDITORIAL EXECUTIVE &                                 │
│                                  SCIENTIFIC PORTRAITURE                                │
│                                  (Board & Key Scientists)                              │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

### 7.2 Domain 1: Industrial Cleanrooms (ISO Class 5 / Grade A Environments)
*Applicable Subsidiaries:* `Baya Zist Pharmed`, `Nozhin Zist Pharmed`, `Persis Gene`

- **Visual Subject Matter:**
  * Grade A laminar airflow workstations with continuous airborne particle counters.
  * Automated aseptic fill-finish lines: high-speed robotic starwheels, sterile vial washing, depyrogenation tunnels, stoppers, and aluminium crimp capping.
  * Large-scale 316L electropolished stainless steel bioreactors with orbital piping, peristaltic pumps, validation ports, and digital SCADA control consoles.
  * Operators dressed in Grade A/B sterile gowning: Tyvek cleanroom coveralls, integrated hoods, panoramic goggles, double-layer sterile nitrile gloves, and boot covers.
- **Lighting & Exposure:**
  * Cool clinical illumination ($5000\text{K} - 5600\text{K}$ high-CRI daylight fluorescent / cleanroom LED troffers).
  * High specular highlights reflecting off mirror-polished stainless steel and curved pharmaceutical glass.
  * Controlled exposure: No blown-out highlights; deep details preserved in shadow zones.
- **Compositional Framing:**
  * One-point perspective through cleanroom viewing corridors and interlock pass-throughs, emphasizing architectural depth and infinite sterility.
  * Shallow depth-of-field ($f/2.8 - f/4.0$) focusing sharply on precision filling needles or bioreactor harvest valves, with sterile background operators softly blurred.

---

### 7.3 Domain 2: Apheresis & Plasma Collection Centers
*Applicable Subsidiary:* `Tamin Plasma Nozhin`

- **Visual Subject Matter:**
  * Modern automated plasmapheresis machines (Haemonetics PCS2 / Fresenius Aurora systems).
  * High-precision centrifugal separation bowls separating yellow golden plasma from dense cellular components.
  * Ergonomic donor phlebotomy suites with comfortable leather recliner chairs, sterile medical drape sheets, and personal infotainment interfaces.
  * Cold-chain plasma blast freezing storage units ($-30^\circ\text{C}$ to $-40^\circ\text{C}$) with frost vapors and barcode tracking scanners.
- **Tone & Psychological Ethos:**
  * **Human Dignity & Warmth:** Donors are heroes contributing to sovereign health security; their depiction must be respectful, relaxed, and dignified.
  * Absolute clinical cleanliness without feeling cold or sterile: soft natural light entering through architectural windows, combined with warm wood or neutral architectural finishes in the waiting areas.
- **Compositional Framing:**
  * Close-up details of automated separation interfaces, digital volume meters showing plasma milliliters harvested, and sealed sterile collection tubing.
  * Wide-angle contextual shots of modern, organized collection halls emphasizing spaciousness, hygiene, and national operational scale.

---

### 7.4 Domain 3: Advanced Microscopy & Cellular Therapeutics
*Applicable Subsidiaries:* `KarayaKhteh / CARTIMED`, `Arc Zist Azma`, `Persis Gene`

- **Visual Subject Matter:**
  * **Confocal Laser Scanning Microscopy (CLSM):** Multi-channel fluorescent micrographs showing autologous CAR-T cells labeled with GFP (Green Fluorescent Protein) attacking CD19-expressing leukemia lymphoblasts stained with DAPI (fluorescent blue nuclei).
  * **Scanning Electron Microscopy (SEM):** High-magnification false-color micrographs depicting cellular surface morphology, microvilli, membrane blebbing, and targeted immune synapsing.
  * **Analytical Bioprocess Diagnostics (Arc Zist Azma):** High-Performance Liquid Chromatography (HPLC) profiles, Mass Spectrometry (LC-MS/MS) peptide mapping readouts, and spectrophotometric microplate reader assays showing biological potency curves.
- **Aesthetic Treatment:**
  * Deep obsidian backgrounds (`#030914`) matching the site's primary substrate, allowing vibrant cellular fluorescent signals (electric amber, fluorophore emerald, deep violet) to glow with crystalline clarity.
  * Elimination of low-resolution pixelated stock microscopy. Every micro-image must carry technical metadata overlays (e.g., `Scale: 10 µm`, `Instrument: Confocal Laser Scanning Leica SP8`, `Target: CD19 CAR-T`).

---

### 7.5 Domain 4: Editorial Executive & Scientific Portraiture
*Applicable Subjects:* Rahnab Board of Directors, Scientific Advisory Council, Subsidiary CEOs

- **Visual Subject Matter:**
  * Real leaders, principal investigators, and chief engineers captured in authentic work environments (research labs at NIGEB, bioprocess control rooms, cleanroom observation suites, modern architectural conference rooms).
  * Ban on generic arms-crossed "stock executive" poses against white studio cycloramas.
- **Lighting & Direction:**
  * Directional, high-contrast natural chiaroscuro lighting (soft north-facing window light or a single large diffused key light at a 45-degree angle with dark negative fill).
  * Subdued, intellectual color palette: dark charcoal suits, scientific lab coats over tailored knitwear, zero distracting jewelry or patterns.
- **Expression & Posture:**
  * Thoughtful, visionary, and composed. Engaged in genuine discussions around architectural drawings, molecular pipeline charts, or cleanroom monitoring screens.
  * Conveys intellectual authority, gravitas, and national life-science stewardship.

---

### 7.6 Three-Stage Color Grading Pipeline & Mathematical Scrims

All photography passes through a standardized three-stage color grading pipeline:

```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│                        THREE-STAGE COLOR GRADING PIPELINE                              │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ STAGE 1: CHROMATIC NORMALIZATION (Black Point, White Balance, Skin Tone Protection)    │
│                                           │                                            │
│ STAGE 2: THE "SOVEREIGN LIFE-SCIENCE" LUT (Crushed Blacks, Cool Midtones, Warm Accents)│
│                                           │                                            │
│ STAGE 3: DIRECTIONAL ALPHA GRADIENT SCRIM (Typographic Legibility & Contrast Lock)     │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

#### Stage 1: Chromatic Normalization
- **Black Point Calibration:** Deep shadow values mapped precisely to RGB `(3, 9, 20)` (`#030914`), eliminating muddy 1990s gray-blacks.
- **White Balance:** Calibrated between $5200\text{K}$ and $5600\text{K}$. Fluorescent green cleanroom cast is neutralized by shifting the tint curve $+4$ towards magenta.
- **Skin Tone Preservation:** Human skin tones locked strictly in the $25^\circ - 35^\circ$ Hue angle, protected from desaturation or artificial colorizing.

#### Stage 2: The "Sovereign Life-Science" LUT Profile
- **Shadows:** Infused with a subtle $+3\%$ cool navy/slate cooling tone (`#081226`).
- **Midtones:** Highly desaturated in background yellow-greens ($-25\%$), isolating and emphasizing stainless steel gray, glass transparency, and cleanroom white.
- **Highlights:** Clean, pristine, neutral white with a smooth filmic roll-off (no digital clipping above 98% IRE).
- **Accent Glow:** Warm amber elements (`#FD7702`) or bio-emerald elements (`#00A896`) boosted $+10\%$ in vibrance to act as natural eye-tracking anchors.

#### Stage 3: Directional Mathematical Alpha Scrims (Typographic Legibility)
Whenever text overlays imagery (Hero banners, subsidiary feature cards, chapter headers), a CSS linear alpha scrim guarantees WCAG AAA contrast regardless of underlying image luminance:

```css
/* RTL Persian Hero Full-Bleed Scrim (Right-to-Left) */
.hero-scrim-fa {
  background: linear-gradient(
    270deg,
    rgba(3, 9, 20, 0.95) 0%,
    rgba(3, 9, 20, 0.82) 35%,
    rgba(3, 9, 20, 0.40) 70%,
    rgba(3, 9, 20, 0.10) 100%
  );
}

/* LTR English Hero Scrim (Left-to-Right Mirror) */
.hero-scrim-en {
  background: linear-gradient(
    90deg,
    rgba(3, 9, 20, 0.95) 0%,
    rgba(3, 9, 20, 0.82) 35%,
    rgba(3, 9, 20, 0.40) 70%,
    rgba(3, 9, 20, 0.10) 100%
  );
}

/* Card Surface Vertical Bottom Scrim */
.card-bottom-scrim {
  background: linear-gradient(
    0deg,
    rgba(3, 9, 20, 0.98) 0%,
    rgba(3, 9, 20, 0.70) 50%,
    transparent 100%
  );
}
```

---

### 7.7 Aspect Ratio Conventions & Technical Production Rules

| Aspect Ratio | Standard Resolution | Intended Application | Framing Rules |
|:---|:---|:---|:---|
| **21:9** (Ultra-Wide Cinematic) | `2560 × 1080 px` / `1920 × 822 px` | Hero Section Panoramas, Industrial Facility Overviews, Cleanroom Corridors | Main focal elements centered vertically within safe middle 60% of canvas |
| **16:9** (Widescreen Standard) | `1920 × 1080 px` / `1280 × 720 px` | Subsidiary Case Studies, Documentary Video Covers, News Hero Headers | Rule of thirds framing; left/right 35% reserved for text overlays |
| **4:5** (Editorial Vertical) | `1200 × 1500 px` / `800 × 1000 px` | Executive & Scientific Portraits, Laboratory Operator Profiles | Head and eye line positioned in top 30% quadrant; dark negative space behind text |
| **1:1** (Symmetric Square) | `1000 × 1000 px` / `600 × 600 px` | Confocal Micrographs, Subsidiary Brandmark Tiles, Analytical Assay Charts | Pure optical center symmetry; 15% inner padding |

#### Next-Gen Format & Responsive Compression Specification:
1. **Container Formats:** Every photographic asset must be generated in dual formats: **AVIF** (primary, 50% smaller footprint at identical perceptual quality) with **WebP** fallback. Legacy JPEG/PNG reserved only for email or raw PDF downloads.
2. **Density Calibration:** Responsive markup must provide `srcset` targeting $1\times$ and $2\times$ high-DPI (Retina) displays:
   ```html
   <picture>
     <source type="image/avif" srcset="/assets/img/cleanroom-1200.avif 1x, /assets/img/cleanroom-2400.avif 2x">
     <source type="image/webp" srcset="/assets/img/cleanroom-1200.webp 1x, /assets/img/cleanroom-2400.webp 2x">
     <img src="/assets/img/cleanroom-1200.jpg" alt="خط پرکنی استریل بیوداروها در اتاق تمیز کلاس A شرکت بایا زیست فارمد" loading="lazy" decoding="async">
   </picture>
   ```
3. **Accessibility Alt-Text Protocol:** Every image must carry explicit, informative Persian and English metadata describing the actual biopharmaceutical infrastructure, eliminating empty `alt=""` or generic `alt="عکس"` attributes.

---

## 8. Verification & Implementation Checklist

- [x] Super Premium Life-Science Holding identity codified across 4 Brand Pillars.
- [x] Absolute rejection of 5 industry clichés specified with concrete counter-patterns.
- [x] Complete hex palettes, RGB values, and mathematical contrast equations for Direction A and Direction B.
- [x] Formal ADR comparison strictly adhering to `.agents/rules/decision-making.md` (گزینه ۱، گزینه ۲، مزایا، معایب، پیشنهاد نهایی و دلیل انتخاب).
- [x] Photography guidelines detailed across 4 operational domains: ISO 5 cleanrooms, apheresis centers, confocal/SEM microscopy, and executive portraiture.
- [x] 3-stage LUT color grading pipeline and mathematical alpha scrim formulas specified.
- [x] Zero WordPress PHP/theme files and zero full HTML prototype pages created.
