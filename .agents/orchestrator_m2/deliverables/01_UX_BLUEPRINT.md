# DELIVERABLE 01: UX BLUEPRINT & CORPORATE NARRATIVE
## Rahnab Pharmed Corporate Website (`rahnab.com`)
### Milestone 2: Design System, Tokens & Art Direction

**Document Code:** `RAHNAB-M2-DELIV-01-UX`  
**Classification:** Authoritative Technical Blueprint & System Architecture  
**Target Milestone:** Milestone 2 (Design System & UX/UI Architecture)  
**Downstream Consumer:** Milestone 3 (Interactive HTML/CSS/JS Prototype Engine)  
**Parent Orchestrator:** `orchestrator_m2`  
**Authoring Unit:** `worker_m2_author`  
**Foundational Sources:** `docs/MASTER_PROJECT_BRIEF.md`, `.agents/ORIGINAL_REQUEST.md`, Milestone 0 (`01_REQUIREMENTS_DOCUMENT.md`, `02_SUBSIDIARY_RESEARCH.md`), Milestone 1 (`01_FINAL_SITEMAP.md`, `02_NAVIGATION_ARCHITECTURE.md`, `03_CONTENT_HIERARCHY.md`, `04_WORDPRESS_CPT_ARCHITECTURE.md`, `05_USER_FLOW_DIAGRAMS.md`), `explorer_m2_ux/analysis.md`, `.agents/rules/`.

---

## 1. Executive Summary & Problem Boundary

This document establishes the authoritative User Experience (UX) Architecture, Corporate Narrative Flow, and Behavioral Interaction Logic for the corporate web portal of **Rahnab Pharmed (هلدینگ دارویی و زیست‌فناوری رهناب فارمد)**.

### 1.1 The Corporate Stature Challenge
Rahnab Pharmed is not an operating consumer pharmaceutical laboratory selling blister packs or over-the-counter formulations. It is a sovereign-tier biopharmaceutical investment holding group that finances, governs, and orchestrates seven specialized, high-barrier bio-enterprises across Iran’s national life-science ecosystem:
1. **Persis Gene (پرسیس ژن):** National bioprocess accelerator, cell banking, and molecular discovery incubator.
2. **Tamin Plasma Nozhin (تأمین پلاسما نوژین):** Upstream national apheresis donor center network supplying raw human source plasma.
3. **Nozhin Zist Pharmed (نوژین زیست فارمد):** Heavy industrial 150,000 L/year plasma fractionation refinery producing vital blood derivatives (IVIG, Albumin).
4. **Padra Serum Alborz (پادرا سرم البرز):** National producer of hyperimmune equine antivenoms and emergency antidotes supplying >70% of the country's needs.
5. **KarayaKhteh / CARTIMED (کارایاخته تجهیز آزما):** Advanced Therapy Medicinal Products (ATMP) and clinical autologous CD19 CAR T-cell immunotherapy.
6. **Baya Zist Pharmed (بایا زیست فارمد):** Advanced downstream bioprocessing, tangential flow filtration (TFF), and robotic sterile vial fill-finish.
7. **Arc Zist Azma (آرک زیست آزما):** First dedicated biological quality control laboratory in Iran, official collaborator of the Iran Food and Drug Administration (IFDA), and national batch-release gateway.

### 1.2 UX Architectural Mandates
- **Rejection of Generic Card Grids:** The 7 operating companies must not be displayed as disconnected catalogue tiles. They form an **unbroken biological value chain** from molecular incubation to clinical batch release.
- **B2B / Institutional Gravity:** Eliminating generic consumer healthcare clichés (stethoscopes, smiling models, blue gradients). Content density, engineering metrics, cleanroom square footages, and regulatory accreditations must command the canvas.
- **Bilingual Bidirectionality:** Persian (`fa-IR`, RTL default) and English (`en-US`, LTR secondary) engineered symmetrically from the ground up using CSS Logical Properties and bidirectional isolation.
- **Ergonomic Multi-Device Parity:** Full touch optimization across mobile (360px–430px) and tablet (768px–1024px) utilizing thumb-zone conversion docks, vertical stepper reflows, and native-feeling bottom sheets.

---

## 2. The 8 Strategic Homepage Questions (Exhaustive Architectural Answers)

The homepage (`front-page.php`) is engineered as an unbroken executive narrative. Every viewport transition directly answers one of the eight strategic user questions within seconds of interaction.

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│                       THE 8 STRATEGIC HOMEPAGE QUESTIONS                    │
├─────────────────────────────────────────────────────────────────────────────┤
│ Q1: What does the user see in the first 3-5 seconds? (Hero Viewport)        │
│ Q2: What is the primary brand promise communicated? (Brand Thesis)          │
│ Q3: How is corporate scale & sovereign capability established without boast?│
│ Q4: How are the 7 subsidiaries presented as a continuous value chain?      │
│ Q5: How are credibility, clinical milestones & certifications highlighted?  │
│ Q6: How are news, press releases & congresses integrated into narrative?    │
│ Q7: What are the primary and secondary CTAs across varied personas?         │
│ Q8: What are the primary user pathways and conversion funnels?              │
└─────────────────────────────────────────────────────────────────────────────┘
```

---

### Question 1: What Does the User See in the First 3-5 Seconds?
*Canvas: 100dvh Desktop Viewport (1440px+)*

In the critical first 3 to 5 seconds, an institutional stakeholder (pharma C-suite, sovereign health regulator, private equity partner) must perceive **sovereign authority, massive industrial scale, and scientific precision** without visual clutter.

#### Spatial Topology Diagram
```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ [SUSPENDED NAV PILL: Glassmorphic Capsule (Logo | 5 Nav Items | Lang Toggle | CTA)]     │
├────────────────────────────────────────────────────────────────────────────────────────┤
│                                                                                        │
│  [CATEGORY EYEBROW CHIP]                                                               │
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

#### Anatomical Breakdown:
1. **Suspended Glassmorphic Navigation Capsule:**
   - Width: `max-w-[1280px]`, Height: `72px`, Radius: `16px` (`rounded-2xl`).
   - Material: `backdrop-blur-xl bg-surface-primary/80 border border-border-subtle`.
   - Start side: Rahnab Pharmed vector brandmark.
   - Center: 5 primary navigation links (`درباره رهناب`, `شرکت‌های زیرمجموعه`, `زنجیره ارزش`, `اخبار و رویدادها`, `ارتباط سازمانی`).
   - End side: Dual-state language toggle (`FA | EN`) and Primary B2B Action Button (`ثبت درخواست B2B`).
2. **Substrate & Atmosphere:**
   - Deep Bio-Kinetic Obsidian (`#030914`) substrate with directional volumetric depth.
   - Elimination of blue-gradient hospital clichés and 3D floating DNA models.
   - High-precision mathematical particle-flow canvas indicating continuous biological pipeline activity.
3. **Hero H1 Headline:**
   - Set in `display-2xl` clamp typography with masked kinetic line reveals.
   - Bilingual copy:
     * FA: «پیشگام حاکمیت زیست‌فناوری و استقلال دارویی کشور»
     * EN: "Pioneering National Biopharmaceutical Sovereignty & Healthcare Security"
4. **Docked Proof Strip:**
   - Monolithic proof strip pinned to bottom of hero viewport.
   - 4 audited operational metrics with live tabular counter animations (`font-tabular-nums`).

---

### Question 2: What Is the Primary Brand Promise Communicated?

The primary brand thesis of Rahnab Pharmed is:
> **«تکمیل چرخه حاکمیت سلامت؛ از سلول تا بالین، با زیرساخت‌های زیستی کاملاً بومی.»**  
> *"Completing the Sovereign Healthcare Value Chain: From Molecular Discovery to Clinical Care via 100% Domestic Biomanufacturing Infrastructure."*

#### The Structural Problem & Solution
- **The National Biopharma Bottleneck:** Developing biologics is fraught with severe systemic chokepoints: discovery is capital-scarce, plasma sourcing requires logistical donor networks, fractionation requires heavy refineries, cell therapy demands ultra-clean suites, and batch-release requires independent accredited laboratories.
- **The Rahnab Solution:** Rahnab Pharmed eliminates these bottlenecks by integrating the entire biopharmaceutical lifecycle under unified capital governance, shared infrastructure, and synchronized regulatory compliance.

---

### Question 3: How Is Corporate Scale Established Without Boasting?

In institutional life sciences, hyperbole degrades trust. Stature is proven exclusively through **falsifiable engineering data, verified capacities, regulatory licenses, and physical cleanroom footprints**.

#### The "Show, Don't Boast" Verification Matrix
| Metric Dimension | Audited Industrial Fact | Operational Facility & Location | Strategic Impact |
|:---|:---|:---|:---|
| **Industrial Plasma Fractionation** | **150,000 Liters / Year** nominal capacity | Nozhin Zist Pharmed, Sepehr Industrial Park, Nazarabad, Alborz | Eliminates $45M+ in annual national foreign exchange outflows for Albumin & IVIG. |
| **National Antivenom Self-Sufficiency** | **>70% Supply Share** of national polyvalent snake/scorpion antivenoms | Padra Serum Alborz, Karaj | Critical emergency defense against lethal envenomation across Iran. |
| **Advanced Cellular Immunotherapy** | **CD19 CAR-T Cell Clinical Trial (CARTIMED)** | KarayaKhteh, TUMS Comprehensive Stem Cell Center | Complete clinical remissions in pediatric relapsed/refractory B-ALL. |
| **First Biological QC Laboratory** | **Official Collaborator of IFDA & ISO 17025** | Arc Zist Azma, Tehran | Authorized independent batch-release testing for recombinant drugs. |
| **Aseptic Fill-Finish & TFF** | **Class A/B Downstream Suites** | Baya Zist Pharmed, Safadasht Industrial Complex | Sterile formulation, vial filling, and automated lyophilization. |
| **National Biotech Incubation** | **15+ High-Tech Spinouts Accelerated** | Persis Gene, Karaj Innovation Hub | Bioprocess optimization, pilot fermenters, and master cell banking. |

---

### Question 4: How Are the 7 Subsidiaries Presented as a Continuous Biomanufacturing Value Chain?
*(Replacing the Generic 3-Column Card Grid)*

The core UX breakthrough of `rahnab.com` is the **Continuous Biomanufacturing Value Chain Matrix (`template-parts/home/flow-matrix.php`)**. Rather than isolated cards, the 7 subsidiaries are presented in an unbroken 5-stage biological pipeline:

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

#### Desktop Value-Chain Mechanics
- **300vh Pinned Scrub Timeline:** Synchronized through GSAP ScrollTrigger and Lenis smooth scroll. As the user scrolls, each value-chain stage illuminates sequentially.
- **Directional Kinetic Vectors:** Glowing accent conduits connect nodes, illustrating material handoffs (e.g. raw frozen plasma from Tamin Plasma feeding Nozhin Zist skids; purified biologics flowing to Arc Zist Azma for potency release).
- **In-Context Quick-Reveal Drawer:** Clicking any company node slides open a glassmorphic drawer displaying:
  - High-res vector brandmark and legal national ID.
  - Value chain tier and core operational footprint.
  - Direct action: `[مشاهده شناسنامه کامل]` linking to canonical single post `/subsidiaries/{slug}/`.
- **Domain Cluster Filter Pills:** Sticky category chips allowing instant filtering by biopharma domain.

---

### Question 5: How Are Credibility, Clinical Achievements & Regulatory Certifications Highlighted?

Institutional credibility is delivered through Homepage Zone 4: **The Trust & Credibility Engine**.

#### 1. Official Regulatory Accreditation Grid
- **آزمایشگاه همکار مرجع سازمان غذا و دارو (IFDA Collaborator Laboratory):** Arc Zist Azma accreditation plaque.
- **گواهینامه ملی GMP وزارت بهداشت:** Cleanroom manufacturing certification across Nozhin Zist, Padra Serum, and Baya Zist.
- **تأییدیه رسمی شرکت دانش‌بنیان (معاونت علمی و فناوری ریاست جمهوری):** Held by all 7 subsidiary enterprises.
- **استانداردهای بین‌المللی ISO:** ISO/IEC 17025 (Testing and Calibration Laboratories), ISO 13485 (Medical Devices & Biotech), and ISO 9001 (Quality Management).
- **Interactive License Verification Modal:** Clicking any seal opens a native `<dialog>` modal showing certificate number, audit validity period, and direct link to the regulatory document repository.

#### 2. Clinical Breakthrough Spotlight
- CARTIMED autologous CD19 CAR-T pediatric leukemia trial data published in partnership with TUMS.
- Industrial commissioning of the 150,000-liter plasma fractionation refinery.
- Padra Serum Alborz supplying >70% of national emergency antivenoms, ending foreign dependence.

---

### Question 6: How Are News, Press Releases & Congresses Integrated into the Narrative?

News is framed as the **Editorial Pulse of the Holding Group** (Homepage Zone 5). It demonstrates operational momentum and continuous scientific advancement.

#### Structural Layout
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

#### Cross-Entity Tagging & Contextual Binding
- Every article is bound to its parent subsidiary via `_rahnab_news_related_company_id`.
- Reading an article surfaces a sidebar card for the operating subsidiary with a direct profile link.
- Visiting `/subsidiaries/nozhin-zist-pharmed/` automatically queries and renders press releases tagged to Nozhin Zist.

---

### Question 7: What Are the Primary and Secondary CTAs Across Varied Personas?

A single generic "تماس با ما" CTA fails B2B institutional visitors. The UX blueprint implements **Persona-Targeted Multi-Action Gateways**:

| Target Institutional Persona | Primary Call-to-Action | Secondary Call-to-Action | Target Destination Route |
|:---|:---|:---|:---|
| **1. B2B Pharma Executives & CDMOs** | «درخواست همکاری تولید قراردادی و آنالیز کیفی» | «بررسی مشخصات فنی کلین‌روم‌ها» | `/contact#b2b` (Pre-routed CDMO form) |
| **2. Institutional Investors & Funds** | «دریافت شناسنامه جامع هلدینگ (PDF Fact Sheet)» | «بررسی حاکمیت شرکتی و هیئت‌مدیره» | Instant PDF download & `/about/governance/` |
| **3. Regulators & MoH Officials** | «مشاهده گواهینامه‌های GMP و ISO 17025» | «درخواست بازدید رسمی از سایت‌های تولیدی» | `/compliance/` & `/contact#inspection` |
| **4. Biotech Founders & Scientists** | «ارسال پروپوزال شتاب‌دهی و انکوباسیون» | «آشنایی با امکانات آزمایشگاهی پرسیس ژن» | `/contact#incubation` & `/subsidiaries/persis-gene/` |

---

### Question 8: What Are the Primary User Pathways and Conversion Funnels?

On `rahnab.com`, conversion represents an **institutional engagement contract**:

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

---

### 3.1 About Us Suite
*(Template: `page-about.php`, with sub-pages `page-governance.php`, `page-infrastructure.php`, `page-compliance.php`)*

The About section operates as a **Corporate Genesis & Industrial Narrative**:
1. **Zone 1: Hero Manifesto & Sovereign Mandate:** Large editorial statement: «معماری حاکمیت زیستی و تاب‌آوری دارویی در مقیاس ملی» paired with authentic cleanroom footage.
2. **Zone 2: Pinned Scrollytelling Timeline (1395 to 1405):**
   - 1395: Foundation of Persis Gene (bioprocess incubation) and Padra Serum Alborz (equine antivenoms).
   - 1396: KarayaKhteh establishment & cell therapy clinical trials.
   - 1400: Baya Zist Pharmed launch (downstream TFF & sterile fill-finish).
   - 1401: Commissioning of Nozhin Zist Pharmed 150,000L plasma fractionation refinery.
   - 1402: Tamin Plasma Nozhin apheresis donor center network expansion.
   - Strategic holding consolidation under Rahnab Pharmed & Arc Zist Azma biological QC release gateway.
3. **Zone 3: 4 Strategic Governance Pillars:**
   - نوآوری مرز دانش (Molecular & Genetic Innovation)
   - مقیاس صنعتی سنگین (Heavy Industrial Biomanufacturing)
   - امنیت سلامت ملی (National Healthcare Sovereignty)
   - انطباق بین‌المللی cGMP (Global Quality & Ethical Standards)
4. **Zone 4: Executive Leadership & Scientific Advisory Council:** Curated preview of senior leadership and distinguished researchers from NIGEB and TUMS.
5. **Zone 5: Geospatial Campus Footprint:** Visual map of the 4 key manufacturing sites (NIGEB Tehran, Sepehr Nazarabad, Safadasht, and TUMS Cellular Laboratories).
6. **Zone 6: Corporate Dossier Download Banner:** One-click PDF Fact Sheet download with cryptographic hash and direct secretariat CTA.

---

### 3.2 Subsidiaries Overview & Value-Chain Explorer
*(Template: `archive-company.php`)*

Replaces static directories with an **interactive portfolio explorer**:
1. **Zone 1: Ecosystem Rationale Hero:** Editorial positioning and 4 holding micro-stats.
2. **Zone 2: Value-Chain Filter Bar (Sticky Navigation):**
   - Horizontal pill bar: `همه (۷)`, `شتاب‌دهی و R&D (۱)`, `تأمین پلاسما (۱)`, `پالایشگاه صنعتی (۱)`, `سلول‌درمانی (۱)`, `پادزهر و سرم (۱)`, `پرکنی آسپتیک (۱)`, `کنترل کیفی و رهایش (۱)`.
3. **Zone 3: Portfolio Grid & Quick-Reveal Drawers:** Responsive grid (`grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6`) displaying brandmarks, legal names, national IDs, and dual action triggers (Quick Drawer vs Canonical Post).
4. **Zone 4: Upstream / Downstream Transformation Matrix:** Engineering table detailing input feed, technological process, output biologic, and internal receiving entity.
5. **Zone 5: Institutional CDMO Partnership Banner:** Direct pathway for external pharmaceutical companies seeking cleanroom manufacturing capacity.

---

### 3.3 Canonical Single Subsidiary Profile
*(Template: `single-company.php` — 8 Modular Zones)*

Every subsidiary has a dedicated canonical single post route (`/subsidiaries/{slug}/`):
```text
┌────────────────────────────────────────────────────────────────────────────────────────┐
│ ZONE ANATOMY: SINGLE SUBSIDIARY PROFILE (`single-company.php`)                        │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 1: HERO IDENTITY & OUTBOUND CITATION GATEWAY                                      │
│ • Official Vector Brandmark, Bilingual Legal Name, National ID, Foundation Year         │
│ • Outbound Verified Portal Link (rel="noopener" target="_blank"): e.g. nojinepharmed.com│
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 2: STRATEGIC HOLDING POSITIONING & INVESTMENT THESIS                              │
│ • Executive narrative detailing the entity's distinct mission in Rahnab's ecosystem    │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 3: QUANTITATIVE TECHNOLOGICAL METRICS & CAPACITIES (KPI ENGINE)                   │
│ • 4 High-contrast metric tiles (Annual Throughput, Cleanroom Area, Market Share, Stds) │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 4: THERAPEUTIC / ACTIVITY PORTFOLIO PIPELINE                                      │
│ • Tabulated pipeline: Brand Name, Active Entity, Monograph, Indications, Status        │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 5: ACCREDITATIONS, REGULATORY SEALS & TRUST ENGINE                                │
│ • Inspectable badge vault: National GMP, IFDA License, Knowledge-Based Seal, ISO Stds  │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 6: AUTHENTIC CLEANROOM & FACILITY PHOTO GALLERY                                   │
│ • Documentary cleanroom photography with lightbox inspection; strict ban on stock models│
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 7: INTER-COMPANY SYNERGIES & TAGGED MILESTONES                                    │
│ • Visual upstream feed & downstream handoff; latest 2-3 press releases tagged to entity │
├────────────────────────────────────────────────────────────────────────────────────────┤
│ ZONE 8: DIRECT INSTITUTIONAL CONTACT CARD & B2B INQUIRY ROUTER                         │
│ • Physical address, switchboard, and CTA button pre-populating contact form            │
└────────────────────────────────────────────────────────────────────────────────────────┘
```

---

### 3.4 News & Media Hub
*(Templates: `archive-news.php`, `archive-event.php`, `single-news.php`)*

1. **News Archive (`archive-news.php`):**
   - Category filter pills: All, Holding Corporate, Subsidiary Milestones, Science & Clinical, Regulatory Statements, Industry Events.
   - Entity filter dropdown: Filter press releases by any of the 7 subsidiaries.
   - Lead featured milestone card (60% width) + secondary editorial stack (40% width).
   - 3-column editorial grid with 16:9 photography, category chips, dual Solar/Gregorian dates, and reading time.
   - Downloadable media kit banner with high-res logos, facility assets, and executive bios.
2. **Single Article View (`single-news.php`):**
   - Reading progress bar pinned to top of viewport.
   - Editorial dek, author/office attribution, and pull-quotes.
   - Floating related subsidiary card linking directly to the featured company profile.
   - Native Web Share API trigger + copy link toast notification.
3. **Events Directory (`archive-event.php`):**
   - Upcoming symposia vs past congress archives.
   - Exhibition booth details, abstract links, and `.ics` calendar invitation downloads.

---

### 3.5 Contact & Institutional Relations
*(Template: `page-contact.php`)*

1. **Zone 1: Central Communications Directory:**
   - Email: `info@rahnab.com`
   - Switchboard: `021-49361200` (Direct click-to-call)
   - Address: تهران، بلوار پژوهش، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری، طبقه ۳، واحد ۳۰۲
   - LinkedIn: Rahnab Pharmed
2. **Zone 2: Interactive Campus Map:**
   - Geospatial visualizer centered on NIGEB headquarters (`35.7483° N, 51.1834° E`) with driving and security clearance directions.
3. **Zone 3: Multi-Departmental B2B Inquiry Form:**
   - Department dropdown routing:
     * همکاری‌های B2B و تولید قراردادی (CDMO & Biomanufacturing)
     * سرمایه‌گذاری و امور سهامداران (Investor Relations)
     * پذیرش طرح‌های شتاب‌دهی و انکوباسیون (Biotech Incubation)
     * امور رسانه‌ای و روابط عمومی (Media & Public Relations)
     * نظارت دارویی و رگولاتوری (Pharmacovigilance & Quality)
     * ارتباط عمومی با دبیرخانه هلدینگ (General Secretariat)
   - Anti-spam security: Headless honeypot field + CSRF nonce token (zero intrusive CAPTCHAs).
4. **Zone 4: Institutional Visiting Protocols:** Security clearance procedures for visiting NIGEB suites or the Sepehr plasma refinery.

---

## 4. Responsive UX Architecture & Ergonomics

```text
┌─────────────────────────────────────────────────────────────────────────────┐
│                       RESPONSIVE VIEWPORT SPECTRUM                          │
├───────────────────┬───────────────────┬───────────────────┬─────────────────┤
│ MOBILE NARROW     │ MOBILE REGULAR    │ TABLET PORTRAIT   │ DESKTOP MASTER  │
│ 360px – 390px     │ 393px – 430px     │ 768px – 1024px    │ 1280px – 1920px │
└───────────────────┴───────────────────┴───────────────────┴─────────────────┘
```

### 4.1 Mobile Viewports (360px – 430px)
- **Ergonomic Thumb-Zone Dock:** A persistent bottom conversion dock (`fixed bottom-0 inset-x-0 z-40 bg-surface-primary/95 backdrop-blur-md border-t border-border-subtle pt-3 pb-[max(0.75rem,env(safe-area-inset-bottom))] px-4 flex gap-3 shadow-lg`) providing:
  * Primary Action (`flex-[2] min-w-0`): `[ ✉️ ثبت درخواست B2B ]` (Triggers bottom sheet or smooth scroll to form).
  * Secondary Action (`flex-[1] min-w-0`): `[ 📞 تماس مستقیم ]` (`tel:02149361200`).
- **Touch Target Minimums:** Strict WCAG 2.2 AA enforcement: All interactive elements have minimum dimensions of **48px × 48px** with at least 8px separation.
- **Value-Chain Vertical Stepper:** On mobile (<768px), the horizontal desktop pipeline reflows into a **vertical chronological stepper** connected by a vertical line along the start margin.
- **Native Draggable Bottom Sheets:** Subsidiary dossiers and accreditation modals open as bottom sheets (`border-radius: 24px 24px 0 0`) with a visual drag handle and swipe-to-dismiss support.
- **iOS Zoom Prevention:** All form inputs set to minimum 16px font size to prevent iOS Safari auto-zoom on focus.

### 4.2 Tablet Viewports (768px – 1024px)
- **Adaptive Grid Reflow:** Hero transforms into a 2-column layout; proof strip renders as a 2x2 grid; subsidiaries directory renders as 2 columns (`grid-cols-2`).
- **Touch-Friendly Mega-Menu:** Desktop hover menus switch to tap-triggered overlays with 48px touch targets.
- **Landscape vs. Portrait:** Landscape (1024px) retains full floating navigation; portrait (768px) collapses to the mobile top bar with off-canvas drawer.

---

## 5. Bidirectional RTL (Persian) vs LTR (English) UX Architecture

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

### 5.1 CSS Logical Properties (Mandatory Implementation Standard)
No physical directional properties (`left`, `right`, `margin-left`, `padding-right`) are permitted in the codebase:
- `margin-inline-start` / `margin-inline-end`
- `padding-inline-start` / `padding-inline-end`
- `inset-inline-start` / `inset-inline-end`
- `text-align: start` / `text-align: end`
- `border-inline-start` / `border-inline-end`

### 5.2 Directional vs. Static Icon Mirroring Rules
- **Category 1: Directional Icons (MUST Mirror in RTL via `transform: scaleX(-1)`):**
  * Chevrons, arrows (`←` vs `→`), back/forward indicators, breadcrumb slashes, drawer slide vectors.
- **Category 2: Static Real-World Icons (DO NOT Mirror in RTL):**
  * Telephone receiver, smartphone, email envelope, paper plane, clock, calendar, search magnifier, microscope, chemical vial, checkmark, lock, shield.

### 5.3 Bidirectional Isolation (`<bdi>`) & Numeric Formatting
- **Inline Latin Strings in Persian:** Every Latin trade name, monograph, or acronym embedded in Persian sentences (e.g. `ImmunoJine`, `CARTIMED`, `ISO 17025`, `IVIG`, `CD19 CAR-T`) must be wrapped in `<bdi>` or styled with `unicode-bidi: isolate;` to prevent punctuation flipping.
- **Tabular Numerals:** All financial, capacity, and KPI metrics use `font-variant-numeric: tabular-nums;` to prevent layout jitter during number count-ups.
- **Dual Calendars:** Persian view displays Solar Hijri date primary (`۱۹ شهریور ۱۴۰۵`) with Gregorian secondary (`Sep 9, 2026`). English view displays Gregorian exclusively.

---

## 6. Architectural Decision Records (ADRs)
*(Formulated strictly per `.agents/rules/decision-making.md`)*

---

### ADR-UX-01: Subsidiary Presentation Architecture (Continuous Flow Matrix vs. Static Card Grid)

#### گزینه ۱: شبکه کارت‌های متداول (Static 3x3 Card Grid)
- **مزایا:** پیاده‌سازی بسیار سریع و ساده در قالب‌های آماده؛ ساختار جعبه‌ای آشنا برای توسعه‌دهندگان مبتدی بدون نیاز به محاسبات ریاضی یا SVG.
- **معایب:** از بین بردن هویت هلدینگ و تقلیل آن به یک دایرکتوری لینک معمولی؛ عدم نمایش ارزش‌افزوده و هم‌افزایی فنی بین ۷ شرکت؛ القای حس شرکت‌های منفصل و بی‌ارتباط با یکدیگر به مخاطبان B2B و سرمایه‌گذاران.

#### گزینه ۲: ماتریس جریان پیوسته زیست‌ساخت (Continuous Biomanufacturing Flow Matrix)
- **مزایا:** نمایش زنجیره ارزش عمودی و بسته هلدینگ از R&D (پرسیس ژن) تا پالایشگاه (نوژین زیست) و کنترل کیفی (آرک زیست آزما)؛ انتقال فوری جایگاه حاکمیتی و زیرساختی هلدینگ؛ ایجاد تمایز قاطع بصری نسبت به رقبا و رد کامل کلیشه‌های دارویی؛ امکان فیلتر پویا بر اساس مراحل تولید و دراورهای تعاملی بدون ترک صفحه.
- **معایب:** نیازمند طراحی دقیق‌تر، مدیریت تعاملی در دسکتاپ و بازآرایی ساختار به حالت Stepper عمودی در موبایل.

#### پیشنهاد نهایی: گزینه ۲ (ماتریس جریان پیوسته زیست‌ساخت)
- **دلیل انتخاب:** طبق اصل استراتژیک بریف، رهناب فارمد یک هلدینگ پیشگام با زنجیره ارزش کامل است نه یک وبلاگ یا فروشگاه. ماتریس پیوسته مستقیماً ارزش راهبردی هلدینگ را به شرکای دارویی و سرمایه‌گذاران اثبات می‌کند و ارزش نگهداری و اعتبار آن بسیار فراتر از هزینه پیاده‌سازی اولیه است.

---

### ADR-UX-02: Subsidiary In-Depth Disclosure (In-Context Quick Drawers vs. Direct Page Redirects)

#### گزینه ۱: هدایت مستقیم به صفحه تک‌شرکت با کلیک روی هر المان (Direct Navigation Only)
- **مزایا:** رفتار وب سنتی؛ عدم نیاز به برنامه‌نویسی جاوااسکریپت برای باز و بسته شدن لایه‌های درون‌صفحه‌ای.
- **معایب:** ایجاد اصطکاک ناوبری شدید؛ کاربر برای مقایسه یا ارزیابی قابلیت‌های ۷ شرکت مجبور به ۷ بار خروج از صفحه اصلی و بازگشت با دکمه Back مرورگر است که باعث خستگی شناختی و خروج زودهنگام مخاطب B2B می‌شود.

#### گزینه ۲: افشای تدریجی درون‌صفحه‌ای با دراور تعاملی + دکمه شناسنامه کامل (Progressive Disclosure via In-Context Drawer + Deep Link)
- **مزایا:** کاربر بدون ترک ماتریس ارزش صفحه اصلی یا دایرکتوری، ظرفیت‌های فنی، عکس‌های کلین‌روم و مشخصات شرکت را در یک دراور شناور مطالعه می‌کند و در صورت تمایل، با یک کلیک به URL دائمی `/subsidiaries/{slug}/` منتقل می‌شود؛ سرعت بالا و تجربه کاربری روان.
- **معایب:** نیازمند مدیریت وضعیت (State Management)، کنترل کلید `Escape` و حفظ دسترس‌پذیری کیبورد (A11y Focus Trapping).

#### پیشنهاد نهایی: گزینه ۲ (افشای تدریجی با دراور تعاملی + دکمه صفحه اختصاصی)
- **دلیل انتخاب:** بالاترین بازدهی ارگونومیک برای مدیران سازمانی و تصمیم‌گیرندگان؛ حفظ پیوستگی ذهنی کاربر در حین بررسی زیست‌بوم هلدینگ، همراه با پشتیبانی کامل از URLهای دائمی سئو.

---

### ADR-UX-03: Dual-Language Routing & Bilingual Fallback Protocol

#### گزینه ۱: ریدایرکت خودکار به صفحه اصلی یا نمایش خطای ۴۰۴ در صورت عدم ترجمه یک شرکت در نسخه انگلیسی
- **مزایا:** کدنویسی اندک؛ حذف نیاز به صفحات واسط.
- **معایب:** نابودی سئوی بین‌المللی؛ ارورهای ناگهانی ۴۰۴ برای شرکت‌های بین‌المللی؛ القای حس ناقص بودن و عدم بلوغ سازمانی به سرمایه‌گذاران خارجی.

#### گزینه ۲: معماری ساب‌پث (`/en/`) با پروتکل لایه اعلان ترجمه و برچسب `noindex, follow` (Graceful In-Page Resolution)
- **مزایا:** صفحات انگلیسی در همان مسیر ساب‌پث با پوسته کامل انگلیسی (`dir="ltr"`) باز می‌شوند؛ در صورت عدم بارگذاری ترجمه قطعی، یک بنر رسمی حقوقی اعلام می‌کند که متن مرجع فارسی در حال ترجمه رسمی است؛ برچسب خودکار `noindex, follow` از جریمه گوگل جلوگیری کرده و لینک‌های خروجی را حفظ می‌کند.
- **معایب:** نیازمند اینترسپت کوئری در لایه روتر و مدیریت هدایت canonical.

#### پیشنهاد نهایی: گزینه ۲ (معماری ساب‌پث با لایه اعلان رسمی و محافظت سئو)
- **دلیل انتخاب:** حفاظت ۱۰۰٪ از اعتبار برند سازمانی هلدینگ در مجامع بین‌المللی و تضمین اعتبار دامنه اصلی در موتورهای جستجو.

---

### ADR-UX-04: Mobile Biomanufacturing Flow Architecture (Vertical Stepper vs. Horizontal Snap Carousel)

#### گزینه ۱: کاروسل اسکرول افقی بدون شکست سطر (Horizontal Snap Carousel)
- **مزایا:** حفظ چینش خطی دسکتاپ به صورت افقی در موبایل.
- **معایب:** خطای اسکرول ناخواسته هنگام حرکت عمودی کاربر در صفحه؛ پنهان ماندن مراحل حیاتی ۴ و ۵ در بیرون کادر صفحه موبایل؛ نیاز به تلاش فیزیکی مضاعف شست.

#### گزینه ۲: گام‌شمار عمودی ارگونومیک همراه با بازشونده‌های آکاردئونی (Ergonomic Vertical Stepper)
- **مزایا:** تطابق ۱۰۰٪ با نحوه اسکرول طبیعی تک‌دست موبایل؛ نمایش شفاف شماره مراحل (۱ تا ۵) در امتداد یک خط عمودی پیوسته؛ عدم قطع اسکرول عمودی صفحه؛ باز شدن اطلاعات در قالب Bottom Sheet بومی.
- **معایب:** تغییر ساختار CSS از Grid افقی به Flex عمودی در بریک‌پوینت `< 768px`.

#### پیشنهاد نهایی: گزینه ۲ (گام‌شمار عمودی ارگونومیک در موبایل)
- **دلیل انتخاب:** رعایت اصول طراحی کاربرمحور و ارگونومی موبایل (WCAG 2.2 AA)، ایجاد خوانایی بی‌نقص در نمایشگرهای کوچک.

---

## 7. Verification & Implementation Checklist

- [x] All 8 strategic homepage questions answered in granular detail with copy and structure.
- [x] All 7 verified subsidiaries integrated into continuous biomanufacturing value chain.
- [x] Subpage UX anatomies codified across About (6 zones), Directory (5 zones), Single Company (8 zones), News Hub, Contact.
- [x] Responsive mobile (360px–430px) thumb zones, conversion dock, vertical stepper, bottom sheets specified.
- [x] Bidirectional RTL/LTR logic defined: CSS logical properties, reading vectors, icon mirroring, `<bdi>` tags.
- [x] 4 UX ADRs formatted strictly according to `.agents/rules/decision-making.md`.
- [x] Zero WordPress PHP/theme files and zero full HTML pages created.
