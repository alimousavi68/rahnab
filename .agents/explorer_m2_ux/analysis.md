# Deep Technical Analysis: UX Architecture Blueprint
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)
### Milestone 2: Design System & UX/UI Architecture

**Document Code:** `ARCH-M2-UX-ANALYSIS`  
**Author:** UX Architecture Explorer (`explorer_m2_ux`)  
**Parent Agent:** `orchestrator_m2` (`088adcbc-4866-4916-bf9b-d2aa22ad7c7f`)  
**Working Directory:** `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_ux/`  
**Classification:** Enterprise UX Architecture & Behavioral Blueprint  
**Foundational Sources:** `docs/MASTER_PROJECT_BRIEF.md`, `.agents/ORIGINAL_REQUEST.md`, Milestone 0 (`01_REQUIREMENTS_DOCUMENT.md`, `02_SUBSIDIARY_RESEARCH.md`), Milestone 1 (`01_FINAL_SITEMAP.md`, `02_NAVIGATION_ARCHITECTURE.md`, `03_CONTENT_HIERARCHY.md`, `04_WORDPRESS_CPT_ARCHITECTURE.md`, `05_USER_FLOW_DIAGRAMS.md`), `.agents/orchestrator_m2/SCOPE.md`, `.agents/rules/`.

---

## 1. Executive Summary & Problem Boundary

This document establishes the definitive UX Architecture and interaction blueprint for the corporate website of **Rahnab Pharmed (هلدینگ سرمایه‌گذاری دارویی رهناب فارمد)**. 

### 1.1 The Core Challenge
Rahnab Pharmed is not an operating drug manufacturing company selling consumer medicines or retail packs. It is a sovereign-tier biopharmaceutical investment holding group that orchestrates seven specialized, high-technology subsidiaries spanning the entire life-science value chain: from early-stage molecular discovery and human plasmapheresis to industrial fractionation, cellular immunotherapy (CAR-T), critical emergency biological antivenoms, downstream aseptic fill-finish, and certified pharmacopeial batch-release testing.

Previous pharmaceutical web paradigms in the domestic market suffer from three fatal flaws:
1. **Generic Corporate Card Grids:** Presenting multi-billion-Rial operating entities as flat, disconnected cards that resemble a directory of sponsored links rather than an integrated supply chain.
2. **Consumer Healthcare Tropes:** Relying on clinical stock photography (smiling actors in blue lab coats holding test tubes), blue-and-cyan gradients, and retail hospital aesthetics that destroy institutional credibility.
3. **Disconnected B2B Pathways:** Burying critical industrial capacity data, cleanroom square footages, GMP certifications, and business development touchpoints behind opaque contact pages.

### 1.2 UX Architectural Objectives
- Deliver an **unbroken corporate narrative** that answers the 8 Strategic Homepage Questions.
- Present the 7 confirmed subsidiaries (Persis Gene, Nozhin Zist, Padra Serum, KarayaKhteh/CARTIMED, Tamin Plasma Nozhin, Baya Zist, Arc Zist Azma) as a **continuous biomanufacturing value chain**.
- Architect **zone-by-zone UX anatomies** for all major page templates (Homepage, About, Subsidiaries Directory, Single Subsidiary Profile, News/Media Hub, Contact).
- Design a **frictionless responsive experience** for mobile (360px–430px) and tablet (768px–1024px) utilizing ergonomic thumb zones, bottom sheets, and minimum 48px touch targets.
- Implement native **bidirectional UX logic** supporting Persian (RTL default) and English (LTR secondary) with CSS logical properties, mirrored reading vectors, and bidirectional isolation.

---

## 2. The 8 Strategic Homepage Questions

The homepage (`front-page.php`) serves as the executive front door of the holding group. Every pixel and viewport transition is engineered to address one of eight strategic user questions within seconds of landing.

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│                       THE 8 STRATEGIC HOMEPAGE QUESTIONS                    │
├─────────────────────────────────────────────────────────────────────────────┤
│ Q1: What does the user see in the first 3-5 seconds? (Hero Viewport)        │
│ Q2: What is the primary brand promise communicated? (Brand Thesis)          │
│ Q3: How is corporate scale & capability established without boasting?      │
│ Q4: How are the 7 subsidiaries presented as a continuous value chain?      │
│ Q5: How are credibility, clinical milestones & certifications highlighted?  │
│ Q6: How are news, press releases & congresses integrated into narrative?    │
│ Q7: What are the primary and secondary CTAs across varied personas?         │
│ Q8: What are the primary user pathways and conversion funnels?              │
└─────────────────────────────────────────────────────────────────────────────┘
```

---

### Question 1: What Does the User See in the First 3-5 Seconds?
*Viewport Canvas: Desktop 1440px+ (100dvh / 100vh)*

In the critical first 3 to 5 seconds, an institutional visitor (such as a pharma C-suite executive, government regulator, or private equity partner) must perceive **sovereignty, massive industrial scale, and scientific precision** without cognitive overload.

#### 1. Spatial Anatomy of the Hero Viewport
```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ [TOP SUSPENDED NAV: Glassmorphic Floating Pill (Logo | Primary Nav | Language | CTA)]   │
├────────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                        │
│  [CATEGORY EYEBROW BADGE]                                                              │
│  «هلدینگ سرمایه‌گذاری دارویی و زیست‌فناوری» / "Sovereign Biopharmaceutical Holding"    │
│                                                                                        │
│  [HERO H1 EDITORIAL HEADLINE]                                                          │
│  «پیشگام حاکمیت زیست‌فناوری و استقلال دارویی کشور»                                      │
│  "Pioneering National Biopharmaceutical Sovereignty & Healthcare Security"             │
│                                                                                        │
│  [STRATEGIC POSITIONING SUBTITLE]                                                      │
│  «هم‌افزایی سرمایه، دانش و صنعت در هدایت ۷ شرکت تخصصی؛ از انکوباسیون و سلول‌درمانی    │
│   تا پالایشگاه‌های سنگین پلاسما و رهایش زیست‌داروهای استراتژیک در مقیاس ملی»          │
│                                                                                        │
│  [DUAL ACTION BUTTONS]                                                                 │
│  [ 🔗 کشف زیست‌بوم رهناب (Scroll Indicator) ↓ ]   [ ✉️ درخواست همکاری‌های B2B → ]       │
│                                                                                        │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ [DOCKED DUAL-SURFACE PROOF STRIP: 4 QUANTITATIVE METRIC TILES]                        │
│ ┌───────────────────┬───────────────────┬───────────────────┬────────────────────────┐ │
│ │ ۷ شرکت دانش‌بنیان │ ۱۵۰,۰۰۰ لیتر       │ ۷۰٪+ سهم تأمین    │ ۱۰۰٪ بومی‌سازی         │ │
│ │ تخصصی در زنجیره   │ ظرفیت سالانه پالایش│ پادزهر و سرم کشور │ چرخه تولید بیودارو     │ │
│ └───────────────────┴───────────────────┴───────────────────┴────────────────────────┘ │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

#### 2. Visual Hooks & Background Articulation
- **Strict Anti-Cliché Rules:** Absolute ban on generic stock photography (smiling models in blue lab coats, generic stethoscopes, cartoon 3D pills, or rotating double helices).
- **Active Substrate:** High-contrast, deep bio-kinetic canvas (Bio-Kinetic Obsidian `#030914` or Sovereign Slate `#0A0F1D`) paired with an authentic, cinematic documentary backdrop or subtle, mathematical cell-flow canvas (low-opacity particle/node network indicating continuous biological processing).
- **Depth & Lighting:** Atmospheric depth of field with volumetric lighting, subtle focal highlights on typography, and microscopic lens blur that conveys bio-cleanroom sterility and clinical purity.

#### 3. Floating Pill Navigation at Viewport Top
- Suspended floating capsule (`max-w-[1280px]`, `h-[72px]`, `rounded-2xl`).
- High-refraction frosted glassmorphic background (`backdrop-blur-xl`, `bg-white/80` or `bg-slate-900/80` in dark mode, `border border-white/20`).
- Symmetrical layout: Brandmark on start side, 5 primary navigation links in center, language switcher (`FA | EN`) and Primary B2B Action button on end side.

#### 4. Docked Quantitative Proof Strip
- Suspended along the bottom margin of the hero viewport.
- 4 high-contrast monolithic stat modules featuring animated counter numbers:
  1. **۷ شرکت دانش‌بنیان:** 7 specialized knowledge-based ventures forming a closed-loop ecosystem.
  2. **۱۵۰,۰۰۰ لیتر پلاسما:** 150,000L annual human plasma fractionation capacity (Nozhin Zist).
  3. **۷۰٪+ سهم تأمین پادزهر:** Over 70% of national critical snake & scorpion antivenom supply (Padra Serum Alborz).
  4. **۱۰۰٪ بومی‌سازی ارزش:** Complete domestic value chain from cellular discovery to certified batch release.

---

### Question 2: What Is the Primary Brand Promise Communicated?

The primary brand promise of Rahnab Pharmed is:
> **"تکمیل چرخه حاکمیت سلامت؛ از سلول تا بالین، با زیرساخت‌های زیستی کاملاً بومی."**  
> *"Completing the Sovereign Healthcare Value Chain: From Molecular Discovery to Clinical Care via 100% Domestic Biomanufacturing Infrastructure."*

#### 1. The Core Strategic Thesis
In the pharmaceutical sector, capital alone does not produce biotherapeutics. Biomanufacturing requires an unbroken succession of highly regulated, capital-intensive, and technically hazardous stages:
- Early discovery is high-risk and slow (R&D bottleneck).
- Human source plasma collection requires extensive donor network infrastructure (sourcing bottleneck).
- Industrial plasma fractionation requires high-barrier heavy engineering refineries (capital expenditure bottleneck).
- Cell and gene therapies require ultra-clean Class A/B cleanroom suites (advanced ATMP bottleneck).
- Fill-finish requires sterile WFI distillation, depyrogenation, and lyophilization (aseptic packaging bottleneck).
- Commercial distribution requires independent, accredited biological batch-release authorization (regulatory bottleneck).

#### 2. The Holding Group Solution
Rahnab Pharmed communicates that it is **the strategic architect that solves every bottleneck** by orchestrating seven specialized enterprises under unified governance, centralized capital allocation, shared cGMP cleanroom facilities, and coordinated regulatory licensing.

---

### Question 3: How Is Corporate Scale & Sovereign Capability Established Without Boasting?

Corporate stature in life sciences is undermined by hyperbole and marketing boastfulness. High-value B2B stakeholders judge authority through **falsifiable engineering data, regulatory licenses, physical facility footprints, and clinical milestones**.

#### 1. The "Show, Don't Boast" Engineering Framework
The UX architecture establishes credibility by presenting audited operational facts:
- **Cleanroom & Refinery Footprint:** Detailed physical dimensions of the Sepehr Industrial Town plasma fractionation complex (Nazarabad, Alborz) and Safadasht industrial facilities.
- **Bioprocess Volumes:** Real, uninflated metrics: nominal 150,000-liter human plasma processing capacity per annum.
- **National Emergency Contribution:** Citing verified national healthcare statistics: Padra Serum Alborz supplies >70% of the Iranian Ministry of Health's required polyvalent snake and scorpion antivenoms (*SnaFab* and *ScoFab*).
- **First-of-its-Kind National Benchmarks:** Highlighting Arc Zist Azma as the **first dedicated biological quality control laboratory in Iran** and an official Collaborator Laboratory of the Iran Food and Drug Administration (IFDA).
- **Advanced Clinical Milestones:** Showcasing KarayaKhteh’s CARTIMED autologous CD19 CAR T-cell therapy trials for pediatric relapsed B-cell Acute Lymphoblastic Leukemia (B-ALL) conducted in partnership with Tehran University of Medical Sciences (TUMS).

#### 2. Visual Tone & Micro-Typography
- Data presented in clean, tabular data cards with micro-labels indicating unit of measure, regulatory issuing body, and audit year.
- Typography uses precise, tabular numerals with neutral slate annotations rather than loud promotional badges.

---

### Question 4: How Are the 7 Confirmed Subsidiaries Presented as a Continuous Biomanufacturing Value Chain?
*(Replacing the Generic Card Grid with the Continuous Flow Matrix)*

The fatal UX error of holding websites is treating subsidiaries like independent catalogue items in an eCommerce-style 3-column grid. Rahnab Pharmed's 7 subsidiaries exist in an **unbroken biological continuum**:

```text
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│                   THE RAHNAB 5-STAGE CONTINUOUS BIOMANUFACTURING VALUE CHAIN                           │
├───────────────────┬───────────────────┬───────────────────┬───────────────────┬────────────────────────┤
│ STAGE 1:          │ STAGE 2:          │ STAGE 3:          │ STAGE 4:          │ STAGE 5:               │
│ R&D & INCUBATION  │ BIOLOGICAL SOURCE │ INDUSTRIAL HEAVY  │ ATMP CELL THERAPY │ QUALITY CONTROL &      │
│                   │ HARVESTING        │ FRACTIONATION     │ & FILL-FINISH     │ BATCH RELEASE          │
├───────────────────┼───────────────────┼───────────────────┼───────────────────┼────────────────────────┤
│ • Persis Gene     │ • Tamin Plasma    │ • Nozhin Zist     │ • KarayaKhteh     │ • Arc Zist Azma        │
│   (پرسیس ژن)      │   Nozhin          │   Pharmed         │   (CARTIMED)      │   (آرک زیست آزما)      │
│   Venture         │   (تأمین پلاسما)   │   (نوژین زیست)     │   (کارایاخته)     │   First Biological QC  │
│   Accelerator,    │   Apheresis donor │   150kL Plasma    │   Autologous CD19 │   Laboratory in Iran,  │
│   Bioprocess R&D, │   center network; │   Fractionation   │   CAR-T Cell      │   IFDA Collaborator,   │
│   Cell banking    │   frozen source   │   Refinery; IVIG  │   Therapy (B-ALL) │   Bioassays & Release  │
│                   │   plasma feed     │   & Albumin       │                   │                        │
│                   │                   │                   │ • Baya Zist       │                        │
│                   │                   │ • Padra Serum     │   Pharmed         │                        │
│                   │                   │   Alborz          │   (بایا زیست)     │                        │
│                   │                   │   (پادرا سرم)      │   Downstream TFF, │                        │
│                   │                   │   Hyperimmune     │   Chromatography, │                        │
│                   │                   │   Sera & Antidotes│   Vial Fill-Finish│                        │
└───────────────────┴───────────────────┴───────────────────┴───────────────────┴────────────────────────┘
```

#### 1. Interactive Architectural Template: `template-parts/home/flow-matrix.php`
- **Desktop Mechanics:** An interactive, horizontal biomanufacturing pipeline spanning the width of the screen.
- **Directional Vectors:** Glowing kinetic flow vectors indicate material transformation (e.g., Tamin Plasma’s harvested human plasma physically flows into Nozhin Zist’s cold fractionation skids; purified bulk biologics from Nozhin and Baya flow into Arc Zist Azma for certified potency bioassays and batch release).
- **Interactive Node Dossiers:** Each company node displays:
  - High-resolution vector brandmark.
  - Value-chain stage badge & sequence identifier (e.g., `مرحله ۲: تأمین بیولوژیک`).
  - Anchor capability metric (e.g., `ظرفیت سالانه: ۱۵۰,۰۰۰ لیتر`).
  - Quick-Reveal Action: Clicking a node slides open an **in-context drawer** with full technical capabilities, facility photo, and executive summary, eliminating disruptive page reloads while preserving deep link access (`/subsidiaries/{slug}/`).
- **Cluster Filter Tabs:** Allows filtering the view by operational domain:
  - `[همه مراحل زیست‌بوم]` (Full Value Chain)
  - `[تحقیق و توسعه و شتاب‌دهی]` (R&D & Incubation)
  - `[پلاسما و فرآورده‌های خونی]` (Plasma & Blood Derivatives)
  - `[سلول‌درمانی و ژن‌درمانی]` (Cell & Gene Therapy)
  - `[پادزهرها و سرم‌های هایپرایمیون]` (Hyperimmune Sera & Antidotes)
  - `[تولید و پرکنی آسپتیک]` (Fill-Finish & Packaging)
  - `[کنترل کیفی و استانداردها]` (QC Bioassays & Batch Release)

---

### Question 5: How Are Credibility, Clinical Achievements, Patents, and Regulatory Certifications Highlighted?

Trust in biopharma cannot rely on verbal assurances; it requires institutional validation and verifiable regulatory credentials.

#### 1. The Trust & Credibility Engine (Homepage Zone 4)
- **Official Accreditations Grid:** High-resolution vector representations of official certification seals:
  - **آزمایشگاه همکار مرجع سازمان غذا و دارو (IFDA Collaborator Laboratory)** — Awarded to Arc Zist Azma.
  - **گواهی ملی GMP وزارت بهداشت و سازمان غذا و دارو** — Awarded to manufacturing cleanrooms across the holding.
  - **تأییدیه رسمی شرکت دانش‌بنیان (معاونت علمی و فناوری ریاست جمهوری)** — All 7 subsidiaries certified.
  - **استانداردهای بین‌المللی ISO/IEC 17025 (آزمایشگاه‌های آزمون و کالیبراسیون)**, **ISO 13485 (تجهیزات پزشکی و بیوتکنولوژی)**, و **ISO 9001**.
  - **عضویت قطعی در شبکه آزمایشگاهی فناوری‌های راهبردی کشور**.
- **Interactive License Verification Modal:** Clicking any regulatory plaque opens an inspectable modal revealing:
  - Legal registration number & national ID.
  - Issuing regulatory body and valid scope of testing/manufacturing.
  - Direct link to the dedicated `/compliance/` regulatory archive.

#### 2. Clinical Milestone Timeline
- Highlight cards showcasing verified breakthroughs:
  - **CARTIMED CAR-T Cell Clinical Trials:** Successful complete remission data in pediatric acute lymphoblastic leukemia (B-ALL) at TUMS.
  - **150,000L Fractionation Commissioning:** Official inauguration of the Sepehr refinery and production of domestic IVIG (*ImmunoJine*) and Albumin (*AlbuJine*).
  - **Emergency Antivenom Self-Sufficiency:** Padra Serum Alborz supplying >70% of national emergency antivenoms, displacing legacy foreign imports.

#### 3. Documentary Cleanroom Photography
- High-resolution, full-bleed imagery of actual operational facilities:
  - Stainless-steel bioreactor banks and automated microbial fermenters at Persis Gene.
  - Jacketed cold-ethanol precipitation fractionation vessels (-5°C to -10°C) at Nozhin Zist.
  - LC-MS mass spectrometers, HPLC systems, and Class A sterility testing isolators at Arc Zist Azma.
  - High-speed automated vial depyrogenation and aseptic filling lines at Safadasht.

---

### Question 6: How Are News, Press Releases, and Scientific Congresses Integrated into the Corporate Narrative?

News is not a disconnected blog; it is the **editorial pulse** of the holding, proving continuous scientific momentum, regulatory progression, and industrial milestones.

#### 1. Executive Editorial Layout (Homepage Zone 5)
```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ ZONE 5: EDITORIAL PULSE & CORPORATE COMMUNICATIONS                                     │
├──────────────────────────────────────────────────────┬─────────────────────────────────┤
│ LEAD FEATURED MILESTONE CARD (60% Width)              │ SECONDARY EDITORIAL STACK (40%) │
│ ┌──────────────────────────────────────────────────┐ │ ┌─────────────────────────────┐ │
│ │ [HERO 16:9 PHOTOGRAPH: Facility Inauguration]   │ │ │ [MINI CARD: IranPharma 2026]│ │
│ │ [CATEGORY: دستاوردهای صنعتی]  [ENTITY: نوژین زیست]│ │ │ رونمایی از دستاوردهای       │ │
│ │                                                  │ │ │ سلول‌درمانی کارتیمد در کنگره│ │
│ │ «بهره‌برداری کامل از پالایشگاه ۱۵۰,۰۰۰ لیتری      │ │ │ [تاریخ: ۱۴۰۵/۰۶/۱۵]         │ │
│ │  پلاسمای انسانی نوژین زیست فارمد در شهرک سپهر»   │ │ └─────────────────────────────┘ │
│ │                                                  │ │ ┌─────────────────────────────┐ │
│ │ گزارش تفصیلی از استقرار خطوط تولید فرآورده‌های   │ │ │ [MINI CARD: آرک زیست آزما]  │ │
│ │ مشتق از پلاسما و تأمین نیاز حیاتی بیمارستان‌های  │ │ │ تمدید گواهینامه آزمایشگاه   │ │
│ │ کشور به آلبومین و IVIG بومی.                     │ │ │ همکار مرجع غذا و دارو       │ │
│ │                                                  │ │ │ [تاریخ: ۱۴۰۵/۰۵/۲۸]         │ │
│ │ [تاریخ شمسی و میلادی: ۱۹ شهریور ۱۴۰۵ / Sep 2026] │ │ └─────────────────────────────┘ │
│ │ [زمان مطالعه: ۵ دقیقه]  [مطالعه کامل بیانیه ←]   │ │ [ 📥 دریافت مدیاکیت و تصاویر ] │
│ └──────────────────────────────────────────────────┘ │ [ 📰 آرشیو کامل اخبار و رویدادها│
└──────────────────────────────────────────────────────┴─────────────────────────────────┘
```

#### 2. Cross-Entity Tagging & Dynamic Context
- Every news item is tagged with its associated subsidiary entity (`_rahnab_news_related_company_id`).
- When reading an article, a dedicated sidebar card displays the associated company's brandmark, key capacity, and direct link to its profile.
- Conversely, visiting `/subsidiaries/nozhin-zist-pharmed/` automatically surfaces the latest press releases tagged to Nozhin Zist in Zone 7.
- Dedicated Press Kit trigger allows accredited journalists to download high-resolution 300-DPI imagery, executive headshots, and corporate backgrounders in a single package.

---

### Question 7: What Are the Primary and Secondary CTAs for Varied Personas?

A single generic "تماس با ما" button fails high-value institutional stakeholders. The UX specifies dedicated, differentiated calls-to-action tailored to four primary B2B personas:

```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│                        PERSONA-SPECIFIC CALLS-TO-ACTION (CTAs)                         │
├────────────────────────────┬─────────────────────────────┬─────────────────────────────┤
│ Target Persona             │ Primary Call-to-Action      │ Secondary Call-to-Action    │
├────────────────────────────┼─────────────────────────────┼─────────────────────────────┤
│ 1. B2B Pharma Executives   │ «درخواست همکاری تولید       │ «بررسی زیرساخت‌ها و         │
│    & CDMO Partners         │ قراردادی و آنالیز کیفی»     │ تجهیزات بیوراکتور»          │
│                            │ -> /contact#b2b (pre-routed)│ -> /about/infrastructure/   │
├────────────────────────────┼─────────────────────────────┼─────────────────────────────┤
│ 2. Institutional Investors │ «دریافت شناسنامه جامع       │ «بررسی ساختار حاکمیت شرکتی  │
│    & Life-Science Funds    │ هلدینگ رهناب (PDF Fact Sheet)»│ و هیئت‌مدیره»             │
│                            │ -> Instant PDF download     │ -> /about/governance/       │
├────────────────────────────┼─────────────────────────────┼─────────────────────────────┤
│ 3. Regulators & MoH /      │ «مشاهده اعتبارنامه‌ها و     │ «درخواست بازدید رسمی از     │
│    Government Officials    │ مجوزهای GMP سازمان غذاودارو»│ پالایشگاه و سایت‌های تولیدی»│
│                            │ -> /compliance/             │ -> /contact/visiting/       │
├────────────────────────────┼─────────────────────────────┼─────────────────────────────┤
│ 4. Academic Scientists &   │ «ارسال پروپوزال شتاب‌دهی و  │ «آشنایی با شتاب‌دهنده       │
│    Biotech Founders        │ انکوباسیون مولکولی»         │ پرسیس ژن و آزمایشگاه‌ها»    │
│                            │ -> /contact#incubation      │ -> /subsidiaries/persis-gene│
└────────────────────────────┴─────────────────────────────┴─────────────────────────────┘
```

---

### Question 8: What Are the Primary User Pathways and Conversion Funnels?

Conversion on `rahnab.com` is not an eCommerce cart checkout; it is an **institutional engagement contract** (initiating CDMO negotiations, submitting an incubation proposal, downloading a corporate governance dossier, or scheduling a regulatory site audit).

```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│                              THE 4 MASTER CONVERSION FUNNELS                           │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ FUNNEL 1: B2B PHARMA CDMO & TESTING DISCOVERY                                          │
│ [Homepage / Search] ──► [Flow Matrix: Arc Zist / Nozhin] ──► [Single Subsidiary View]  │
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [Inspects Cleanroom & QC Specs] ──► [Clicks «ثبت درخواست B2B»] ──► [Pre-Populated Form]│
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [Submits with CSRF Nonce Guard] ──► [Instant Confirmation Modal + Tracking ID Received]│
├────────────────────────────────────────────────────────────────────────────────────────┤
│ FUNNEL 2: INSTITUTIONAL INVESTOR GOVERNANCE AUDIT                                      │
│ [English Homepage / LinkedIn] ──► [/en/about/governance/] ──► [Board & Academic Council│
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [/en/about/infrastructure/] ──► [Evaluates 150kL Refinery Asset] ──► [Download FactSheet│
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [Clicks «Connect with Investor Relations»] ──► [/en/contact/ with IR pre-selected]     │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ FUNNEL 3: REGULATORY COMPLIANCE & ACCREDITATION AUDIT                                  │
│ [Homepage Trust Plaque] ──► [/compliance/ Certificate Vault] ──► [Lightbox Modal Audit]│
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [Verifies National GMP & ISO 17025 Keys] ──► [Clicks «پروتکل‌های بازدید از سایت»]      │
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [Submits Site Inspection Request with Corporate Security Clearance]                    │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ FUNNEL 4: PRESS, MEDIA & SCIENCE JOURNALISM                                            │
│ [Social Media / Direct News Link] ──► [/news-events/{slug}/] ──► [Reads Official Dek]  │
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [Inspects Clinical Data Tables & Quotes] ──► [Clicks «دانلود مدیاکیت و تصاویر ۳۰۰DPI»] │
│       │                                                                  │             │
│       ▼                                                                  ▼             │
│ [Direct Link to Related Operating Entity: /subsidiaries/{slug}/]                       │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 3. Subpage UX Anatomies (Zone-by-Zone Engineering)

Every subpage template follows an architectural zone specification ensuring visual hierarchy, data-source binding, and responsive resilience.

---

### 3.1 About Us Suite
*(Template: `page-about.php`, with specialized sub-pages `page-governance.php`, `page-infrastructure.php`, and `page-compliance.php`)*

The About Us section is not a static corporate bio; it is a **scrollytelling narrative** of Rahnab's founding, mission, and industrial footprint.

```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ ZONE ANATOMY: ABOUT RAHNAB (`page-about.php`)                                          │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 1: HERO MANIFESTO & STRATEGIC SOVEREIGN MANDATE                                   │
│ • Large editorial typography: «معماری حاکمیت زیستی و تاب‌آوری دارویی در مقیاس ملی»    │
│ • 4K authentic documentary footage of laboratory cleanrooms and industrial bioreactors  │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 2: CORPORATE GENESIS & INTERACTIVE SCROLLYTELLING TIMELINE                        │
│ • Pinned scroll timeline tracking the evolution from 1395 (2016) to 1405 (2026):      │
│   - 1395: Foundation of Persis Gene (Incubation & pilot cleanrooms).                   │
│   - 1395: Launch of Padra Serum Alborz (Equine antivenom manufacturing).               │
│   - 1396: KarayaKhteh establishment & cell therapy clinical R&D.                       │
│   - 1400: Baya Zist Pharmed established (Aseptic fill-finish & downstream bioprocess). │
│   - 1401: Nozhin Zist Pharmed heavy industrial 150,000L plasma fractionation refinery. │
│   - 1402: Tamin Plasma Nozhin upstream apheresis collection network.                   │
│   - Strategic consolidation under Rahnab Pharmed Holding & Arc Zist Azma QC gateway.  │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 3: 4 STRATEGIC PILLARS OF HOLDING GOVERNANCE                                      │
│ • High-contrast interactive cards:                                                     │
│   1. نوآوری مرز دانش (Molecular & Genetic Innovation)                                  │
│   2. مقیاس صنعتی سنگین (Heavy Industrial Biomanufacturing)                             │
│   3. امنیت سلامت ملی (National Healthcare Sovereignty)                                 │
│   4. انطباق بین‌المللی cGMP (Global Quality & Ethical Standards)                       │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 4: GOVERNANCE & LEADERSHIP OVERVIEW                                               │
│ • Curated preview of the Board of Directors, Executive Committee, and Scientific       │
│   Advisory Council (Distinguished researchers from NIGEB and TUMS).                    │
│ • CTA link to full governance dossier (`/about/governance/`).                          │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 5: INDUSTRIAL ASSETS & CLEANROOM NETWORK PREVIEW                                  │
│ • Geospatial preview of the 4 manufacturing campuses:                                  │
│   - NIGEB Headquarters & Incubation Suites (Tehran).                                   │
│   - Sepehr Industrial Plasma Fractionation Refinery (Nazarabad, Alborz).               │
│   - Safadasht Downstream Purification & Fill-Finish Complex.                           │
│   - TUMS Comprehensive Research Cellular Laboratories (KarayaKhteh).                   │
│ • CTA link to dedicated technical specs (`/about/infrastructure/`).                    │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 6: DOWNLOADABLE CORPORATE FACT SHEET & ENGAGEMENT BANNER                          │
│ • One-click PDF dossier download with cryptographic hash & file size.                  │
│ • Primary CTA: [ارتباط با دبیرخانه اجرایی هلدینگ →]                                   │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

### 3.2 Subsidiaries Overview & Value-Chain Explorer
*(Template: `archive-company.php`)*

The subsidiaries overview page serves as the central directory of the holding portfolio. It replaces static lists with an **interactive ecosystem explorer**.

#### Structural Zones:
1. **Zone 1: Ecosystem Rationale Hero:**
   - Editorial headline explaining the necessity of a vertically integrated biomanufacturing holding.
   - Micro-stats bar: 7 specialized companies, 150,000L fractionation, 70% antivenom supply, 100% domestic quality control.
2. **Zone 2: Value-Chain Filter Bar (Sticky Navigation):**
   - Horizontal pill bar with active count indicators:
     - `همه شرکت‌ها (۷)`
     - `تحقیق و توسعه و شتاب‌دهی (۱)` -> Persis Gene
     - `تأمین سورس پلاسما (۱)` -> Tamin Plasma Nozhin
     - `پالایش صنعتی پلاسما (۱)` -> Nozhin Zist Pharmed
     - `سلول‌درمانی و ژن‌درمانی (۱)` -> KarayaKhteh (CARTIMED)
     - `پادزهرها و سرم‌های هایپرایمیون (۱)` -> Padra Serum Alborz
     - `پرکنی آسپتیک و فرآوری (۱)` -> Baya Zist Pharmed
     - `کنترل کیفی و استانداردها (۱)` -> Arc Zist Azma
3. **Zone 3: Portfolio Grid & Quick-Reveal Drawers:**
   - Responsive CSS grid (`grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6`).
   - Cards display brandmark, legal name, value chain role, National ID, anchor capacity metric, and dual actions:
     - Action 1: [بررسی سریع (Quick Reveal Drawer)].
     - Action 2: [مشاهده شناسنامه کامل (Canonical URL)].
4. **Zone 4: Upstream / Downstream Material Transformation Matrix:**
   - Comprehensive technical table mapping raw material inputs, processing technology, finished biopharmaceutical outputs, and inter-holding handoffs.
5. **Zone 5: Institutional B2B Partnership Banner:**
   - Direct pathway for external pharmaceutical companies seeking CDMO capacity, plasma fractionation, or bioassay batch testing.

---

### 3.3 Canonical Single Subsidiary Profile
*(Template: `single-company.php` — 8 Modular Zones)*

Every subsidiary has a dedicated, permanent canonical single post route (`/subsidiaries/{slug}/` and `/en/subsidiaries/{slug}/`) engineered across 8 modular zones:

```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ ZONE ANATOMY: SINGLE SUBSIDIARY PROFILE (`single-company.php`)                        │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 1: HERO IDENTITY & OUTBOUND CITATION GATEWAY                                      │
│ • Official Vector Brandmark (High-res SVG, light/dark compatible)                      │
│ • Bilingual Legal Registered Name: e.g. شرکت نوژین زیست فارمد (سهامی خاص)               │
│ • Value-Chain Tier Badge & National ID (شناسه ملی: ۱۴۰۱۲۰۹۸۶۹۴) & شماره ثبت             │
│ • Foundation Year (Solar Hijri & Gregorian) + Industrial Park Location                 │
│ • Outbound Verified Portal Link (rel="noopener" target="_blank"): e.g. nojinepharmed.com│
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 2: STRATEGIC HOLDING POSITIONING & INVESTMENT THESIS                              │
│ • Executive narrative detailing the entity's distinct mission in Rahnab's ecosystem    │
│ • Sovereign impact statement (e.g. replacing $45M in annual blood product imports)     │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 3: QUANTITATIVE TECHNOLOGICAL METRICS & CAPACITIES (KPI ENGINE)                   │
│ • 4 High-contrast scientific metric tiles:                                             │
│   - Annual Processing Throughput (e.g. 150,000 L Plasma)                               │
│   - Total Cleanroom Footprint (e.g. 2,500 m² Class A-D)                                │
│   - National Market Share (e.g. >70% National Antivenom Supply)                        │
│   - Regulatory Standard Conformity (e.g. WHO-GMP, ISO 17025)                           │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 4: THERAPEUTIC / ACTIVITY PORTFOLIO PIPELINE                                      │
│ • Tabulated product and service pipeline:                                              │
│   - Product Brand Name (e.g. ImmunoJine, AlbuJine, SnaFab, ScoFab, CARTIMED)           │
│   - Active Molecular Entity / Monograph (e.g. Human Normal Immunoglobulin IVIG 5%/10%) │
│   - Clinical Indications (e.g. PID, ITP, Kawasaki Disease, Burn Shock)                 │
│   - Regulatory Approval Status (Commercial Marketed vs Active Clinical Trial)          │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 5: ACCREDITATIONS, REGULATORY SEALS & TRUST ENGINE                                │
│ • Inspectable badge vault: National GMP Certificate, IFDA License, Knowledge-Based     │
│   Enterprise Seal, ISO Accreditations with serial numbers and issuing authority.       │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 6: AUTHENTIC CLEANROOM & FACILITY PHOTO GALLERY                                   │
│ • Documentary cleanroom photography in high resolution with lightbox inspection.       │
│ • Strict prohibition against staged stock models.                                      │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 7: INTER-COMPANY SYNERGIES & TAGGED MILESTONES                                    │
│ • Visual upstream feed (e.g. receives plasma from Tamin Plasma) & downstream handoff    │
│   (e.g. unreleased batches tested at Arc Zist Azma before market entry).               │
│ • Latest 2-3 press releases and scientific papers tagged to this entity.               │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 8: DIRECT INSTITUTIONAL CONTACT CARD & B2B INQUIRY ROUTER                         │
│ • Facility physical address, phone switchboard, and official email.                    │
│ • Primary CTA Button: «درخواست همکاری B2B با این مجموعه»                               │
│   (Routes directly to `/contact#b2b-form` with this subsidiary pre-selected).          │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

### 3.4 News & Media Hub
*(Templates: `archive-news.php`, `archive-event.php`, and `single-news.php`)*

The communications hub serves journalists, analysts, and healthcare partners with curated corporate announcements and scientific milestones.

#### 1. News Archive (`archive-news.php`)
- **Category Filter Pills:** All, Holding Corporate News, Subsidiary Milestones, Scientific Breakthroughs, Regulatory Statements, Industry Events.
- **Entity Filter Dropdown:** Allows filtering the press archive by any of the 7 subsidiary companies or Rahnab Holding.
- **Featured Hero Release:** Full-width high-impact editorial card for the top milestone.
- **3-Column Editorial Grid:** Responsive card grid featuring 16:9 photography, category badge, Solar Hijri and Gregorian dual dates, reading time estimate, and excerpt.
- **Press Kit Banner:** Dedicated module allowing one-click download of the holding media kit (vector logos, facility photo archive, executive bios).

#### 2. Single Article Anatomy (`single-news.php`)
- **Editorial Header:** Large headline, secondary dek (subtitle), dual publication date, category badge, and author/office attribution.
- **Reading Progress Bar:** Subtle progress indicator pinned to top of viewport during long-form reading.
- **Article Body:** Generous line-height (`1.8`), drop-caps for editorial gravity, high-resolution inline figures with scientific captions, and pull-quotes.
- **Related Subsidiary Sidebar Card:** Floating card displaying the brandmark and profile link of the subsidiary associated with the news.
- **Social Sharing Utilities:** Native Web Share API trigger + copy link with verified toast notification.

#### 3. Events Directory (`archive-event.php`)
- **Temporal Filter:** Upcoming Congresses & Symposia vs Past Event Archive.
- **Event Cards:** Exhibition title, dates, venue/city, hall and booth numbers, abstract submission links, and `.ics` calendar file download.

---

### 3.5 Contact & Institutional Relations
*(Template: `page-contact.php`)*

The Contact page is an enterprise routing portal designed for friction-free communication.

#### 1. Structural Zones:
```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ ZONE ANATOMY: CONTACT & INSTITUTIONAL RELATIONS (`page-contact.php`)                   │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 1: CENTRAL COMMUNICATIONS DIRECTORY                                               │
│ • Official Holding Email: `info@rahnab.com`                                            │
│ • Central Switchboard: `021-49361200` (Direct click-to-call on mobile)                 │
│ • Official Postal Address: تهران، بلوار پژوهش، پژوهشگاه ملی مهندسی ژنتیک               │
│   و زیست‌فناوری، طبقه ۳، واحد ۳۰۲                                                      │
│ • Official Social Presence: LinkedIn — Rahnab Pharmed                                  │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 2: GEOSPATIAL CAMPUS MAP VISUALIZER                                               │
│ • Interactive Leaflet map centered on NIGEB headquarters (`35.7483° N, 51.1834° E`)    │
│ • Custom dark-mode vector pin + driving directions and transit guidance.               │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 3: MULTI-DEPARTMENTAL B2B INQUIRY FORM                                            │
│ • Dropdown Routing Categories:                                                         │
│   1. همکاری‌های B2B و تولید قراردادی (CDMO & Biomanufacturing)                          │
│   2. سرمایه‌گذاری و امور سهامداران (Investor Relations)                                │
│   3. پذیرش طرح‌های شتاب‌دهی و انکوباسیون (Biotech Incubation & R&D)                    │
│   4. امور رسانه‌ای و روابط عمومی (Media & Public Relations)                             │
│   5. نظارت دارویی، کیفیت و رگولاتوری (Pharmacovigilance & Regulatory Affairs)          │
│   6. ارتباط عمومی با دبیرخانه هلدینگ (General Secretariat)                             │
│ • Form Fields: Full Name, Corporate Email, Phone Number, Organization Name,            │
│   Job Title, Subject, Detailed Message.                                                │
│ • Anti-Spam & Security: Headless honeypot field + CSRF Nonce token (Zero annoying      │
│   visual CAPTCHAs that degrade the B2B executive experience).                          │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 4: INSTITUTIONAL VISITING PROTOCOLS & SECURITY CLEARANCE                          │
│ • Clear guidelines for booking on-site visits to the NIGEB holding suites or the       │
│   Sepehr plasma fractionation refinery, including security clearance timeframes.       │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 4. Responsive UX Architecture & Ergonomics

The site must deliver an uncompromised experience across all screen sizes, from narrow mobile devices (360px) to ultra-wide desktop monitors (1920px+).

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│                       RESPONSIVE VIEWPORT SPECTRUM                          │
├───────────────────┬───────────────────┬───────────────────┬─────────────────┤
│ MOBILE NARROW     │ MOBILE REGULAR    │ TABLET PORTRAIT   │ DESKTOP MASTER  │
│ 360px – 390px     │ 393px – 430px     │ 768px – 1024px    │ 1280px – 1920px │
└───────────────────┴───────────────────┴───────────────────┴─────────────────┘
```

---

### 4.1 Mobile Viewports (360px – 430px)
*Target devices: iPhone SE/13/14/15/16, Samsung Galaxy S22/S23/S24, Xiaomi 13/14*

#### 1. Ergonomic Thumb Zone Layout
- Hand anatomy studies show that 75% of one-handed mobile interactions occur in the bottom and middle zones of the screen. The upper corners are "dead zones" requiring uncomfortable hand re-positioning.
- **Sticky Conversion Dock:** A persistent bottom action dock (`fixed bottom-0 inset-x-0 z-40 bg-white/95 backdrop-blur-md border-t border-slate-200 py-3 px-4 flex gap-3 shadow-lg`) providing:
  - Button 1 (65% width): `[ ✉️ ثبت درخواست همکاری B2B ]` -> Triggers smooth scroll to form or opens Bottom Sheet.
  - Button 2 (35% width): `[ 📞 تماس مستقیم: ۰۲۱-۴۹۳۶۱۲۰۰ ]` -> Native `tel:` link.
- **Header Simplification:** Pinned 64px top bar containing only the vector Brandmark on the start side, the Language Switcher (`FA | EN`), and a 48px tactile Hamburger button on the end side.

#### 2. Off-Canvas Drawer Navigation
- Sliding drawer triggered by the hamburger icon.
- Full viewport height (`h-dvh`), sliding from the start side (right in RTL, left in LTR).
- Contains:
  - Top bar with Logo, Language Switcher, and a 48px Close (X) target.
  - Persistent quick-search input with instant search suggestions.
  - Primary navigation links formatted as clean, expandable accordions with minimum 52px vertical tap heights.
  - Subsidiary list grouped with company logos and short category descriptions.
  - Footer of drawer contains direct switchboard phone, email, and LinkedIn links.

#### 3. Touch Target Sizing (Strict Accessibility Minimum)
- **Minimum Tap Target:** Every interactive element (buttons, hamburger toggles, tab pills, accordion headers, form inputs) has a minimum bounding box of **48px × 48px**, with minimum 8px spatial separation between adjacent targets to eliminate mis-taps.
- Form inputs feature minimum 50px height with 16px font-size to prevent iOS Safari auto-zoom on input focus.

#### 4. Mobile Adaptation of the Biomanufacturing Value Chain
- On screens < 768px, the horizontal desktop pipeline reflows into an **elegant vertical timeline (Stepper)**:
  - Connecting vertical dashed line runs along the start margin.
  - Circular stage nodes (1 to 5) anchor each section.
  - Cards for each subsidiary feature compact summary badges, with a "نمایش جزئیات بیشتر" toggle that smoothly expands in place or slides open a **native-feeling Bottom Sheet**.

#### 5. Native Bottom Sheets for In-Context Details
- Instead of centered desktop modals (which are difficult to dismiss and view on mobile), in-context subsidiary dossiers and certification proofs open as **Draggable Bottom Sheets**:
  - `border-radius: 24px 24px 0 0` at top.
  - Visual drag handle indicator at top center.
  - Dismissible via downward swipe gesture or persistent top-corner close button.
  - Traps focus and locks body background scroll (`overflow: hidden` on `<body>`).

---

### 4.2 Tablet Viewports (768px – 1024px)
*Target devices: iPad Air, iPad Pro 11", Samsung Galaxy Tab S8/S9*

- **Grid Reflow:**
  - Homepage Hero: 2-column layout with typography on start side and hero visual on end side; quantitative proof strip adapts into a 2x2 grid.
  - Subsidiaries Directory: 2-column grid (`grid-cols-2 gap-6`).
  - News Archive: 2-column editorial card layout.
- **Adaptive Mega-Menu:**
  - On 768px–1024px touch tablets, the desktop hover mega-menu transitions to a clean touch-triggered tabbed modal overlay with comfortable 48px touch padding.
- **Landscape vs. Portrait Optimization:**
  - In landscape (1024px), full desktop floating pill navigation is displayed with scaled-down padding.
  - In portrait (768px), the header switches to the compact mobile bar with touch drawer.

---

## 5. Bidirectional RTL (Persian) vs LTR (English) UX Architecture

The corporate website is designed from the foundation as a native bilingual platform:
- **Primary Locale:** Persian (`fa-IR`), `dir="rtl"`, root URL `https://rahnab.com/`.
- **Secondary Locale:** English (`en-US`), `dir="ltr"`, sub-path URL `https://rahnab.com/en/`.

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│                        BIDIRECTIONAL UX ARCHITECTURE                        │
├──────────────────────────────────────┬──────────────────────────────────────┤
│ PERSIAN LOCALE (fa-IR) — RTL DEFAULT │ ENGLISH LOCALE (en-US) — LTR SECONDARY│
├──────────────────────────────────────┼──────────────────────────────────────┤
│ • Root Route: /                      │ • Sub-path Route: /en/               │
│ • Reading Direction: Right-to-Left   │ • Reading Direction: Left-to-Right   │
│ • Eye Movement: Top-Right to Btm-Left│ • Eye Movement: Top-Left to Btm-Right│
│ • Typeface: Yekan Bakh / Peyda       │ • Typeface: Euclid Circular A / PJS  │
│ • Calendar: Solar Hijri (۱۴۰۵)       │ • Calendar: Gregorian (2026)         │
│ • Directional Vectors: Mirrored (←)  │ • Directional Vectors: Standard (→)  │
└──────────────────────────────────────┴──────────────────────────────────────┘
```

---

### 5.1 CSS Logical Properties & Symmetric Layout Mirroring
To ensure that switching languages produces an organically native interface rather than an awkward flip, all spacing, borders, positioning, and alignments are authored using **CSS Logical Properties**:

| Physical Property (Prohibited) | Logical Replacement (Mandatory) | Rationale & RTL/LTR Behavior |
|:---|:---|:---|
| `margin-left: 24px;` | `margin-inline-start: 24px;` | Becomes right-margin in RTL, left-margin in LTR |
| `padding-right: 16px;` | `padding-inline-end: 16px;` | Becomes left-padding in RTL, right-padding in LTR |
| `left: 0;` | `inset-inline-start: 0;` | Correctly docks elements to the logical starting edge |
| `right: 0;` | `inset-inline-end: 0;` | Correctly docks elements to the logical trailing edge |
| `text-align: right;` | `text-align: start;` | Naturally aligns text to start edge of reading direction |
| `border-left: 2px solid;` | `border-inline-start: 2px solid;` | Places accent border on the leading edge |

---

### 5.2 Reading Vectors & Typographical Rhythms

#### 1. F-Shaped / Z-Shaped Scanning Patterns
- **Persian RTL:** The user's eye naturally enters at the **top-right corner**, scans across the top to the left, drops down the right margin, and scans across subheadings. Consequently:
  - Brandmark is positioned at the **Far Right**.
  - Section title eyebrow tags and H2 headings are aligned to the **Right**.
  - Form field labels and required asterisks are aligned to the **Right**.
  - Primary call-to-action buttons in cards are placed at the **Bottom-Left** (the terminal eye exit point).
- **English LTR:** The vector is mirrored:
  - Brandmark is positioned at the **Far Left**.
  - Section titles, H2s, and form labels are aligned to the **Left**.
  - Primary action buttons are placed at the **Bottom-Right**.

#### 2. Typographical Rhythm & Line Height Pairing
- Persian script features pronounced vertical ascenders (alef, laam) and descenders (re, ze, noon, ye). Setting standard Latin line-heights (`1.4 - 1.5`) causes cramped, illegible Persian text.
- **Persian Scale:** Line-height is set to **`1.75 - 1.85`** for body copy, with generous tracking (`letter-spacing: 0` or slightly negative for display headlines).
- **English Scale:** Line-height is set to **`1.5 - 1.6`** with neutral tracking.
- **Matched Optical Weight:** The primary Persian display font (**Yekan Bakh** or **Peyda**) is optically balanced with the Latin grotesque font (**Euclid Circular A** or **Plus Jakarta Sans**) across matched font-weight tiers (Regular 400, Medium 500, SemiBold 600, Bold 700).

---

### 5.3 Directional vs. Static Icons Rules

Not all icons should be flipped when transitioning from LTR to RTL. Flipping the wrong icons breaks cognitive associations:

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│                    ICON DIRECTIONALITY RULES FOR RTL / LTR                  │
├──────────────────────────────────────┬──────────────────────────────────────┤
│ CATEGORY 1: DIRECTIONAL (MUST MIRROR)│ CATEGORY 2: STATIC (DO NOT MIRROR)   │
├──────────────────────────────────────┼──────────────────────────────────────┤
│ • Chevrons & Arrows (← / →)          │ • Telephone receiver & Smartphone    │
│ • Back / Forward navigation vectors  │ • Email envelope & Send paper plane  │
│ • Tab sequence progression indicators│ • Calendar & Clock / Time icons      │
│ • Horizontal workflow connecting lines│ • Download / Upload arrows (vertical)│
│ • Breadcrumb divider slashes ( \ )   │ • Microscope, DNA helix, Bioreactor  │
│ • Drawer entry slides (from start)   │ • Checkmarks, Warning shields, Locks │
│                                      │ • Search magnifying glass            │
│ Implementation:                      │ Implementation:                      │
│ [dir="rtl"] .icon-directional {      │ .icon-static {                       │
│   transform: scaleX(-1);             │   transform: none !important;        │
│ }                                    │ }                                    │
└──────────────────────────────────────┴──────────────────────────────────────┘
```

---

### 5.4 Numbers, Calendars, Dates, and Bidirectional Isolation (`<bdi>`)

#### 1. Numerals and High-Tech Metrics
- In Persian biopharmaceutical and engineering contexts, international metric units and technical numbers (e.g. `150,000 L`, `70%`, `ISO 17025`, `021-49361200`) are standardly rendered using **tabular Latin digits** for maximum legibility, while informal dates and narrative numbers may use Persian digits (`۰ ۱ ۲ ۳ ۴ ۵ ۶ ۷ ۸ ۹`).
- Tabular figures (`font-variant-numeric: tabular-nums;`) are enforced across all statistical counters and metric grids so that animating counter numbers do not cause horizontal layout jitter.

#### 2. Dual Calendar System
- **Persian View:** Primary date displayed in the official Solar Hijri calendar (e.g., `۱۹ شهریور ۱۴۰۵`), accompanied by the Gregorian date in secondary micro-type (`Sep 9, 2026`).
- **English View:** Gregorian calendar exclusively (e.g., `September 9, 2026`).

#### 3. Bidirectional Isolation (`<bdi>` & `unicode-bidi: isolate;`)
- When Latin pharmaceutical trade names, molecule acronyms, or phone numbers are embedded inside Persian sentences, browser bidirectional algorithms often invert trailing punctuation (e.g. placing periods or brackets at the wrong side of the phrase).
- **Rule:** Every inline Latin string inside Persian markup (such as `CARTIMED`, `ImmunoJine`, `AlbuJine`, `SnaFab`, `ScoFab`, `WHO-GMP`, `CD19 CAR-T`) must be wrapped in `<bdi>` (Bidirectional Isolation) tags or styled with `unicode-bidi: isolate;`:
  ```html
  <p>تولید صنعتی فرآورده ایمونوگلوبولین وریدی با نام تجاری <bdi class="font-sans font-semibold">ImmunoJine®</bdi> در پالایشگاه نوژین زیست فارمد.</p>
  ```

---

## 6. Architectural Decision Records (ADRs)
*(Formulated strictly per `.agents/rules/decision-making.md`)*

---

### ADR-01: Subsidiary Presentation Architecture (Continuous Flow Matrix vs. Static Card Grid)

#### گزینه ۱: شبکه کارت‌های متداول (Static 3x3 Card Grid)
- **مزایا:** پیاده‌سازی بسیار سریع و ساده در قالب‌های آماده؛ سازگاری اولیه با کدهای قدیمی بدون نیاز به محاسبات ریاضی یا SVG؛ ساختار جعبه‌ای آشنا برای توسعه‌دهندگان مبتدی.
- **معایب:** از بین بردن هویت هلدینگ و تبدیل آن به یک دایرکتوری لینک تجاری معمولی؛ عدم نمایش ارزش‌افزوده و هم‌افزایی فنی بین ۷ شرکت؛ القای حس شرکت‌های منفصل و بی‌ارتباط با یکدیگر به مخاطب B2B و سرمایه‌گذاران.

#### گزینه ۲: ماتریس جریان پیوسته زیست‌ساخت (Continuous Biomanufacturing Flow Matrix)
- **مزایا:** نمایش زنجیره ارزش عمودی و بسته هلدینگ از R&D (پرسیس ژن) تا پالایشگاه (نوژین زیست) و کنترل کیفی (آرک زیست آزما)؛ انتقال فوری جایگاه حاکمیتی و زیرساختی هلدینگ؛ ایجاد تمایز قاطع بصری نسبت به رقبا و رد کامل کلیشه‌های دارویی؛ امکان فیلتر پویا بر اساس مراحل تولید و دراورهای تعاملی بدون ترک صفحه.
- **معایب:** نیازمند طراحی پیچیده‌تر، مدیریت تعاملی در دسکتاپ و بازآرایی خلاقانه به حالت Stepper عمودی در موبایل.

#### پیشنهاد نهایی: گزینه ۲ (ماتریس جریان پیوسته زیست‌ساخت)
- **دلیل انتخاب:** طبق اصل استراتژیک بریف، رهناب فارمد یک هلدینگ پیشگام با زنجیره ارزش کامل است نه یک وبلاگ یا فروشگاه. ماتریس پیوسته مستقیماً ارزش راهبردی هلدینگ را به شرکای دارویی و سرمایه‌گذاران ثابت می‌کند و ارزش نگهداری و اعتبار آن بسیار فراتر از هزینه پیاده‌سازی اولیه است.

---

### ADR-02: Subsidiary In-Depth Disclosure (In-Context Quick Drawers vs. Direct Page Redirects)

#### گزینه ۱: هدایت مستقیم به صفحه تک‌شرکت با کلیک روی هر المان (Direct Navigation Only)
- **مزایا:** رفتار وب سنتی؛ عدم نیاز به برنامه‌نویسی جاوااسکریپت برای باز و بسته شدن لایه‌های درون‌صفحه‌ای.
- **معایب:** ایجاد اصطکاک ناوبری شدید؛ کاربر برای مقایسه یا ارزیابی قابلیت‌های ۷ شرکت مجبور به ۷ بار خروج از صفحه اصلی و بازگشت با دکمه Back مرورگر است که باعث سردرگمی شناختی و خروج زودهنگام مخاطب B2B می‌شود.

#### گزینه ۲: افشای تدریجی درون‌صفحه‌ای با دراور تعاملی + دکمه شناسنامه کامل (Progressive Disclosure via In-Context Drawer + Deep Link)
- **مزایا:** کاربر بدون ترک ماتریس ارزش صفحه اصلی یا دایرکتوری، ظرفیت‌های فنی، عکس‌های کلین‌روم و بیانیه شرکت را در یک دراور شناور مطالعه می‌کند و در صورت تمایل، با یک کلیک به URL دائمی `/subsidiaries/{slug}/` منتقل می‌شود؛ سرعت بالا و تجربه کاربری روان.
- **معایب:** نیازمند مدیریت وضعیت (State Management)، کنترل کلید `Escape` و حفظ دسترس‌پذیری کیبورد (A11y Focus Trapping).

#### پیشنهاد نهایی: گزینه ۲ (افشای تدریجی با دراور تعاملی + دکمه صفحه اختصاصی)
- **دلیل انتخاب:** بالاترین بازدهی ارگونومیک برای مدیران سازمانی و تصمیم‌گیرندگان؛ حفظ پیوستگی ذهنی کاربر در حین بررسی زیست‌بوم هلدینگ، همراه با پشتیبانی کامل از URLهای دائمی سئو.

---

### ADR-03: Dual-Language Routing & Bilingual Fallback Protocol

#### گزینه ۱: ریدایرکت خودکار به صفحه اصلی یا نمایش خطای ۴۰۴ در صورت عدم ترجمه یک شرکت در نسخه انگلیسی
- **مزایا:** کدنویسی اندک؛ حذف نیاز به صفحات واسط.
- **معایب:** نابودی سئوی بین‌المللی؛ ارورهای ناگهانی ۴۰۴ برای شرکت‌های بین‌المللی؛ انتقال حس ناقص بودن و عدم بلوغ سازمانی به سرمایه‌گذاران خارجی.

#### گزینه ۲: معماری ساب‌پث (`/en/`) با پروتکل لایه اعلان ترجمه و برچسب `noindex, follow` (Graceful In-Page Resolution)
- **مزایا:** صفحات انگلیسی در همان مسیر ساب‌پث با پوسته کامل انگلیسی (`dir="ltr"`) باز می‌شوند؛ در صورت عدم بارگذاری ترجمه قطعی، یک بنر رسمی حقوقی اعلام می‌کند که متن مرجع فارسی در حال ترجمه رسمی است؛ برچسب خودکار `noindex, follow` از جریمه گوگل جلوگیری کرده و لینک‌های خروجی را حفظ می‌کند.
- **معایب:** نیازمند اینترسپت کوئری در لایه روتر و مدیریت هدایت canonical.

#### پیشنهاد نهایی: گزینه ۲ (معماری ساب‌پث با لایه اعلان رسمی و محافظت سئو)
- **دلیل انتخاب:** حفاظت ۱۰۰٪ از اعتبار برند سازمانی هلدینگ در مجامع بین‌المللی و تضمین اعتبار دامنه اصلی در موتورهای جستجو.

---

### ADR-04: Mobile Biomanufacturing Value Chain Flow Architecture

#### گزینه ۱: کاروسل اسکرول افقی بدون شکست سطر (Horizontal Snap Carousel)
- **مزایا:** حفظ چینش خطی دسکتاپ به صورت افقی در موبایل.
- **معایب:** خطای اسکرول ناخواسته هنگام حرکت عمودی کاربر در صفحه؛ پنهان ماندن مراحل حیاتی ۴ و ۵ در بیرون کادر صفحه موبایل؛ نیاز به تلاش فیزیکی مضاعف شست.

#### گزینه ۲: گام‌شمار عمودی ارگونومیک همراه با بازشونده‌های آکاردئونی (Ergonomic Vertical Stepper)
- **مزایا:** تطابق ۱۰۰٪ با نحوه اسکرول طبیعی تک‌دست موبایل؛ نمایش شفاف شماره مراحل (۱ تا ۵) در امتداد یک خط عمودی پیوسته؛ عدم قطع اسکرول عمودی صفحه؛ باز شدن اطلاعات در قالب Bottom Sheet بومی.
- **معایب:** تغییر ساختار CSS از Grid افقی به Flex عمودی در بریک‌پوینت `< 768px`.

#### پیشنهاد نهایی: گزینه ۲ (گام‌شمار عمودی ارگونومیک در موبایل)
- **دلیل انتخاب:** رعایت اصول طراحی کاربرمحور و ارگونومی موبایل (WCAG 2.2 AA)، ایجاد خوانایی بی‌نقص در نمایشگرهای کوچک.

---

## 7. Next Steps & Downstream Deliverable Mapping

This analysis provides the complete architectural foundation for:
1. **`01_UX_BLUEPRINT.md`** (To be authored by `worker_m2_author` in `.agents/orchestrator_m2/deliverables/`).
2. Creative Art Direction alignment with `explorer_m2_art` (ensuring visual hierarchy maps directly to color palettes and photography directions).
3. Design tokens and motion language alignment with `explorer_m2_tokens_motion` (ensuring GSAP scroll-triggers, micro-interactions, and Tailwind RTL utilities mirror this UX blueprint).
