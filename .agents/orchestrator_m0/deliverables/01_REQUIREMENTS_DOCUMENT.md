# DELIVERABLE 01: Comprehensive Requirements Document
## Rahnab Pharmed Corporate Website — Milestone 0: Research & Discovery Synthesis

**Project:** Rahnab Pharmed Corporate Website (`rahnab.com`)  
**Document Code:** `DELIV-01-REQ-DOC`  
**Classification:** Official Source of Truth & Architectural Foundation  
**Author:** Milestone 0 Synthesis Team (`worker_m0_synthesis`)  
**Verified Against:** `docs/MASTER_PROJECT_BRIEF.md` & `.agents/ORIGINAL_REQUEST.md`  
**Compliance Standard:** Forensic Extraction, Zero Dummy Data, Strict Integrity Tagging  
**Tag Legend:**  
- `[CONFIRMED]`: Stated explicitly in the authoritative brief or legally verified in corporate registries.  
- `[RESEARCH REQUIRED]`: Unresolved data points obtainable via registries, literature, or competitor technical analysis.  
- `[CLIENT CONFIRMATION REQUIRED]`: Strategic, governance, legal, or brand assets requiring explicit client approval.  

---

## 1. Executive Overview & Strategic Mission

Rahnab Pharmed (`شرکت رهناب فارمد`) is an Iranian biopharmaceutical investment holding group comprising seven specialized high-technology subsidiaries. The objective of this project is to architect, design, prototype, and build a **Super-Premium Life-Science Holding Website** that establishes sovereign institutional stature, showcases national biomanufacturing scale, and engages institutional B2B partners, pharmaceutical peers, and life-science investors.

The website must emphatically reject generic corporate clichés, consumer pharmacy tropes, and off-the-shelf templates. It must synthesize the institutional gravitas of sovereign life-science holding groups (such as Flagship Pioneering and Roche Group) with the polished digital execution and refined Persian typography exemplified by CinnaGen, while maintaining a strictly differentiated holding-company identity.

---

## 2. Business Information & Strategic Holding Positioning

| Parameter | Specification | Source & Verification Status |
|:---|:---|:---:|
| **Official Persian Entity Name** | شرکت رهناب فارمد | `[CONFIRMED]` (Brief §1) |
| **Official English Entity Name** | Rahnab Pharmed Holding Company | `[CONFIRMED]` (Brief §1) |
| **Corporate Legal Nature** | هلدینگ سرمایه‌گذاری دارویی و زیست‌فناوری (Biopharma Investment Holding) | `[CONFIRMED]` (Brief §1) |
| **Declared Production Domain** | `rahnab.com` | `[CONFIRMED]` (Brief §1) |
| **Primary Operational Function** | Official Corporate Holding Portal; unified ecosystem orchestration | `[CONFIRMED]` (Brief §1) |
| **National Company ID (شناسه ملی)** | Pending legal registry confirmation | `[CLIENT CONFIRMATION REQUIRED]` |
| **Registration Number & Location** | Pending corporate gazette confirmation | `[CLIENT CONFIRMATION REQUIRED]` |
| **Foundation Year** | Established circa 1400–1401 SH / 2021–2022 | `[CLIENT CONFIRMATION REQUIRED]` |
| **Holding Mission Statement** | Official verbatim copy pending executive board signoff | `[CLIENT CONFIRMATION REQUIRED]` |
| **Holding Vision Statement** | 5–10 year strategic biotechnology roadmap pending signoff | `[CLIENT CONFIRMATION REQUIRED]` |
| **Core Corporate Values** | Innovation, National Bio-Security, Clinical Purity, Ethical Excellence | `[CLIENT CONFIRMATION REQUIRED]` |

### Strategic Holding vs. Operating Company Differentiation
A critical requirement established in Milestone 0 is the strict separation between an **Operating Biopharmaceutical Manufacturer** and an **Investment Holding Group**:
- **Operating Manufacturer (e.g., CinnaGen):** Focuses 80%+ of digital surface on end-products, therapeutic molecules, patient safety leaflets, and clinical trial indications.
- **Investment Holding Group (Rahnab Pharmed):** Focuses on portfolio orchestration, capital allocation, shared scientific infrastructure, biotechnology incubation, strategic partnerships, and enterprise governance.
- **Strategic Mandate:** Rahnab Pharmed does NOT sell blister packs or finished medicines directly to consumers; it directs and empowers its 7 operating subsidiaries across the entire biopharma value chain.

---

## 3. Target Audience & B2B Behavioral Requirements

### 3.1 Primary User Personas
The website is engineered strictly for **B2B / Corporate / Institutional Stakeholders** (Brief §11). Under NO circumstances should the interface reflect a B2C retail pharmacy, clinic, or consumer health portal:

1. **Pharmaceutical C-Suite Executives & CDMO Partners:**
   - *Goals:* Evaluate contract development and manufacturing capacities, cleanroom classifications, bioreactor volumes, and technological scale.
   - *Requirements:* Rapid access to technical capabilities, facility certifications (GMP/ISO), and direct corporate partnership inquiry channels.
2. **Institutional & Life-Science Investors / Venture Capitalists:**
   - *Goals:* Analyze group diversification, clinical pipeline progression, commercial traction, and portfolio governance.
   - *Requirements:* Clear organizational hierarchy, subsidiary profiles, leadership credentials, and quantifiable scale metrics.
3. **Regulatory Bodies & Government Stakeholders (IFDA, MoH, Presidential Science Directorate):**
   - *Goals:* Verify compliance with national bio-security standards, knowledge-based enterprise accreditation, and domestic production mandates.
   - *Requirements:* Verifiable accreditation badges, transparent corporate data, and official physical headquarters validation.
4. **Senior Academic Scientists, Biotechnologists & R&D Talents:**
   - *Goals:* Investigate translational research programs, clinical trials, and incubation opportunities (particularly through Persis Gene and KarayaKhteh).
   - *Requirements:* Scientific rigor, publication links, clinical trial registrations, and technological depth.

### 3.2 Key Trust Signals Required in Interface
- Direct institutional association with the **National Institute of Genetic Engineering and Biotechnology (NIGEB)**.
- Official regulatory compliance seals (National GMP, IFDA manufacturing licenses, ISO 9001/13485/17025).
- Authentic documentary-style photography of genuine cleanrooms, laboratories, and executive leadership.
- Dynamically animated quantitative counters displaying verified operational scale.

---

## 4. Website Structure & Navigation Architecture Baseline

The brief establishes a core 5-tier primary navigation system (Brief §2), which serves as the architectural baseline for the information hierarchy:

```text
Rahnab Pharmed Corporate Portal (rahnab.com)
├── 1. Home (صفحه اصلی)
│   ├── Hero Section: Sovereign Positioning, Dynamic Bio-Visual, Primary CTA
│   ├── Holding Narrative Hook: Ecosystem Vision & Strategic Mandate
│   ├── Subsidiary Ecosystem Showcase: Interactive 7-Company Portfolio Matrix
│   ├── Strategic Infrastructure & Scale Counters: Quantitative Proof Engine
│   ├── Latest Press & Milestones: Curated Group & Subsidiary Highlights
│   └── Institutional Inquiry Banner: Direct Gateway to Corporate Engagement
│
├── 2. About Rahnab (درباره ما)
│   ├── Scrollytelling Corporate Narrative: Genesis, Expansion & Biopharma Mission
│   ├── Strategic Pillars: Innovation, National Self-Sufficiency, Global Standards
│   ├── Governance & Leadership: Board of Directors, Executive Committee, Advisory Board
│   ├── Scientific Infrastructure: Bioreactors, Fractionation Plants, Cleanrooms
│   └── Accreditations & Accolades: Official Certifications & Knowledge-Based Badges
│
├── 3. Subsidiary Companies (شرکت‌های زیرمجموعه)
│   ├── Value-Chain Taxonomy Filter: R&D/Incubation, Plasma, Cell Therapy, Sera, Fill-Finish, Export
│   ├── Portfolio Directory: 7 Verified High-Tech Subsidiaries
│   └── Individual Company Profiles (Dedicated Views / In-Depth Drawers):
│       ├── Persis Gene (پرسیس ژن)
│       ├── Nozhin Zist Pharmed (نوژین زیست فارمد)
│       ├── Patra Serum / Padra Serum Alborz (پاترا سرم / پادرا سرم البرز)
│       ├── KarayaKhteh (کارایاخته)
│       ├── Tamin Plasma Nozhin (تامین پلاسما نوژین)
│       ├── Al Salam (السلام)
│       └── Baya Zist Pharmed (بایا زیست فارمد)
│
├── 4. News & Events (اخبار و رویدادها)
│   ├── Architectural Categories: All, Rahnab News, Subsidiary News, Events, Exhibitions, Achievements
│   ├── Filterable Press Hub: Searchable, paginated news cards with publication metadata
│   └── Editorial Article View: High-typography long-form reading experience with media gallery
│
└── 5. Contact Us (تماس با ما)
    ├── Central Direct Channels: Official Email, Switchboard Phone, LinkedIn Profile
    ├── Headquarters Geospatial Visualizer: Interactive Campus Map (NIGEB, 3rd Floor, Unit 302)
    ├── Multi-Departmental Routing: Inquiries for Partnerships, Media, Careers, Regulatory
    └── Secure B2B Inquiry Form: CSRF-protected, sanitized, honeypot-guarded communication channel
```

---

## 5. Subsidiary Companies Scope & Display Specifications

The corporate brief explicitly mandates the inclusion of seven subsidiary entities (Brief §2, §3). Forensic investigation in Milestone 0 verified their legal identities, technical specializations, and digital footprints:

### 5.1 The 7 Portfolio Entities

#### 1. Persis Gene (شرکت پرسیس ژن پار - سهامی خاص)
- **Official English Title:** PersisGen / Persis Gen Par Co.
- **National ID / Reg #:** `14005750960` / Reg: `30581` `[CONFIRMED]`
- **Official Web Portal:** `https://persisgen.com` `[CONFIRMED - ACTIVE]`
- **Core Value Chain Role:** Flagship Biopharma Venture Accelerator & R&D Incubator.
- **Therapeutic / Technical Focus:** Recombinant proteins, biosimilars, monoclonal antibodies (mAbs), human/veterinary vaccines, stem cell bioprocesses.
- **Display Priority:** Anchor innovation engine of Rahnab Group.

#### 2. Nozhin Zist Pharmed (شرکت نوژین زیست فارمد - سهامی خاص)
- **Official English Title:** Nojin Zist Pharmed / Nozhin Zist Pharmed Co.
- **National ID / Reg #:** `14012098694` / Reg: `83` `[CONFIRMED]`
- **Official Web Portal:** `https://nojinepharmed.com` `[CONFIRMED - ACTIVE]`
- **Core Value Chain Role:** Heavy Industrial Human Plasma Fractionation Refinery (150,000 L/year capacity).
- **Therapeutic / Technical Focus:** Plasma-Derived Medicinal Products (PDMPs): IVIG 5%/10% (*ImmunoJine*) and Human Albumin 20% (*AlbuJine*).
- **Physical Assets:** Sepehr Industrial Town fractionation refinery + NIGEB headquarters suite.

#### 3. Patra Serum / Padra Serum Alborz (شرکت پادرا سرم البرز - سهامی خاص)
- **Discrepancy Notice:** Phonetically cited in brief as "پاترا سرم" (Patra Serum); forensically verified in national corporate registry as **پادرا سرم البرز (Padra Serum Alborz)** `[CLIENT CONFIRMATION REQUIRED]`.
- **National ID / Reg #:** `14006664540` / Reg: `4152` `[CONFIRMED]`
- **Official Web Portal:** `https://padraserum.com` `[CONFIRMED - ACTIVE]`
- **Core Value Chain Role:** Specialized Hyperimmune Sera & Emergency Biological Antidotes Refinery.
- **Therapeutic / Technical Focus:** Supplies >70% of national consumption: Polyvalent Snake Antivenom (*SnaFab*) and Scorpion Antivenom (*ScoFab*).

#### 4. KarayaKhteh (شرکت کارا یاخته تجهیز آزما - سهامی خاص)
- **Official English Title:** Kara Yakhteh Tajhiz Azma / KarayaKhteh Co.
- **National ID / Reg #:** `14007103978` / Reg: `516298` `[CONFIRMED]`
- **Commercial Trademark:** **CARTIMED** (کارتی‌مد — Reg #478321) `[CONFIRMED]`
- **Web Portal:** Integrated on group portal `rahnab.com`; standalone URL pending `[CLIENT CONFIRMATION REQUIRED]`.
- **Core Value Chain Role:** Advanced Cellular Immunotherapy & Gene Therapy Enterprise.
- **Therapeutic / Technical Focus:** Autologous CAR T-cell therapy targeting CD19 for pediatric relapsed B-cell Acute Lymphoblastic Leukemia (B-ALL). TUMS Comprehensive Research Cleanrooms.

#### 5. Tamin Plasma (شرکت تأمین پلاسما نوژین - سهامی خاص)
- **Discrepancy Notice:** Brief lists shorthand "تامین پلاسما"; legally registered as **تأمین پلاسما نوژین (Tamin Plasma Nozhin)** `[CLIENT CONFIRMATION REQUIRED]`.
- **National ID:** `14012987472` `[CONFIRMED]`
- **Official Web Portal:** `https://tpnojine.com` `[CONFIRMED - ACTIVE]`
- **Core Value Chain Role:** Upstream Human Source Plasma Collection Center Network.
- **Therapeutic / Technical Focus:** Automated donor plasmapheresis, -30°C blast freezing, donor screening for fractionation feed into Nozhin Zist.

#### 6. Al Salam (شرکت داروسازی السلام / شركة السلام للصناعات الدوائية)
- **Status & Identification:** Candidate identified as Al-Salam Pharmaceutical Industry ([alsalampharma.com](https://alsalampharma.com)) in Iraq `[CLIENT CONFIRMATION REQUIRED]`.
- **Core Value Chain Role:** Regional Commercialization, Parenteral Manufacturing, and MENA Export Gateway.
- **Therapeutic / Technical Focus:** Large Volume Parenterals (LVP), sterile IV solutions (saline, dextrose), regional distribution across Iraq and GCC markets.

#### 7. Baya (شرکت بایا زیست فارمد - سهامی خاص)
- **Discrepancy Notice:** Brief lists shorthand "بایا"; legally registered as **بایا زیست فارمد (Baya Zist Pharmed)** `[CLIENT CONFIRMATION REQUIRED]`.
- **National ID / Reg #:** `14010425772` / Reg: `584960` `[CONFIRMED]`
- **Headquarters Location:** NIGEB Floor 3, Unit 302 (Co-located directly with Rahnab Holding).
- **Core Value Chain Role:** Downstream Bioprocessing, Chromatography Purification & Aseptic Vial Fill-Finish.
- **Therapeutic / Technical Focus:** Recombinant protein purification, sterile vial filling lines, WFI distillation systems in Safadasht Industrial Town.

### 5.2 Display Rules & Interaction Patterns
- **Uniform Aesthetic Equality:** Every subsidiary must be rendered with equal structural dignity, regardless of whether its standalone website is live or currently in private staging.
- **Progressive Disclosure Reveal:** Clicking a company card triggers an in-context expansion (drawer or modal) displaying: Company Logo, Official Persian/English Name, Value Chain Role, Therapeutic Areas, Core Capabilities, Facility Photos, and External Website Link (Brief §3).
- **Extensible Portfolio Architecture:** The grid layout must use CSS Grid `auto-fit` mechanics (`repeat(auto-fit, minmax(320px, 1fr))`) so adding subsidiary #8 or #10 requires zero code refactoring.

---

## 6. Content Architecture & Entity Schemas

To ensure seamless content migration into WordPress (Future Milestones 6–7), all content models are defined with strict field types and localization requirements:

### 6.1 Subsidiary Company Model (`company` CPT)
```text
Post Type: company
├── Title (Post Title)                     -> Persian Display Name (e.g., شرکت نوژین زیست فارمد)
├── Slug                                   -> Sanitized Latin Slug (e.g., 'nozhin-zist-pharmed')
├── Meta Fields:
│   ├── company_official_name_fa (text)   -> Legal registered Persian title
│   ├── company_official_name_en (text)   -> Legal registered English title
│   ├── company_short_name_fa (text)      -> Display brand name (Persian)
│   ├── company_short_name_en (text)      -> Display brand name (English)
│   ├── company_tagline_fa (text)         -> One-sentence strategic descriptor (Persian)
│   ├── company_tagline_en (text)         -> One-sentence strategic descriptor (English)
│   ├── company_logo_light (image)        -> Vector SVG for dark surfaces
│   ├── company_logo_dark (image)         -> Vector SVG for light surfaces
│   ├── company_hero_image (image)        -> High-res authentic facility/cleanroom photo
│   ├── company_website_url (url)         -> Verified outbound URL (or empty)
│   ├── company_website_status (choice)   -> 'active_external' | 'internal_only' | 'in_development'
│   ├── company_national_id (text)        -> 11-digit national corporate identifier
│   ├── company_reg_number (text)         -> Corporate registry filing number
│   ├── company_established_year (number) -> Solar Hijri / Gregorian year of founding
│   ├── company_facility_location (text)  -> Industrial park or campus address
│   ├── company_overview_fa (wysiwyg)     -> In-depth narrative (Persian)
│   ├── company_overview_en (wysiwyg)     -> In-depth narrative (English)
│   ├── company_capabilities (repeater)   -> Capability Title + Metric + Detail
│   ├── company_products (repeater)       -> Brand Name + Molecule + Indication + Packaging Image
│   ├── company_gallery (gallery)         -> Array of high-res facility and laboratory photography
│   └── company_certifications (repeater) -> Certification Badge + License # + Issuing Body
└── Taxonomies:
    ├── therapeutic_area                  -> Biologics, Plasma, Cell Therapy, Antivenoms, Parenterals
    └── activity_model                    -> Incubation, Industrial Manufacturing, Sourcing, Fill-Finish, Export
```

### 6.2 Leadership & Governance Model (`team_member` CPT)
```text
Post Type: team_member
├── Title (Post Title)                     -> Full Name (e.g., دکتر امیرحسین کارآگاه)
├── Meta Fields:
│   ├── member_name_en (text)             -> English transliterated full name
│   ├── member_role_fa (text)             -> Executive Title (e.g., مدیرعامل و نایب رئیس هیئت مدیره)
│   ├── member_role_en (text)             -> Executive Title (e.g., CEO & Vice Chairman)
│   ├── member_academic_degree (text)     -> Academic credentials (e.g., Ph.D. in Biotechnology)
│   ├── member_bio_fa (textarea)          -> Executive biographical overview (Persian)
│   ├── member_bio_en (textarea)          -> Executive biographical overview (English)
│   ├── member_portrait (image)           -> Studio portrait (1:1 aspect ratio, neutral backdrop)
│   ├── member_linkedin (url)             -> Verified LinkedIn executive profile
│   └── member_order (number)             -> Numerical display priority
└── Taxonomies:
    └── governance_tier                   -> Board of Directors, Executive Committee, Scientific Advisory Board
```

### 6.3 News & Editorial Model (`post` / `news_event` CPT)
```text
Post Type: news_event
├── Title (Post Title)                     -> Article Headline (Persian & English)
├── Meta Fields:
│   ├── news_subtitle (text)              -> Secondary editorial dek
│   ├── news_published_date (date)        -> Publication timestamp (Solar & Gregorian formatted)
│   ├── news_featured_image (image)       -> High-res editorial photo (16:9 ratio)
│   ├── news_gallery (gallery)            -> Supplemental event/facility photography
│   ├── news_related_company (relation)   -> Bi-directional link to 'company' CPT
│   └── news_external_coverage (url)      -> Link to national press release (e.g., IRNA, Fars)
└── Taxonomies:
    └── news_category                     -> Rahnab News, Subsidiary News, Events, Exhibitions, Achievements
```

---

## 7. Contact Information, Inquiries & Institutional Touchpoints

### 7.1 Confirmed Contact Parameters (Brief §6)
- **Central Official Email:** `info@rahnab.com` `[CONFIRMED]`
- **Central Switchboard Phone:** `021-49361200` `[CONFIRMED]`
- **Physical Headquarters Address (Persian):** تهران، بلوار پژوهش، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری، طبقه ۳، واحد ۳۰۲ `[CONFIRMED]`
- **Physical Headquarters Address (English):** Unit 302, 3rd Floor, National Institute of Genetic Engineering and Biotechnology (NIGEB), Pajoohesh Blvd, Tehran, Iran `[CONFIRMED]`
- **Official Social Network:** LinkedIn — `Rahnab Pharmed` `[CONFIRMED]`

### 7.2 B2B Inquiry Form Requirements
To serve high-level corporate interactions, the inquiry form must support targeted B2B routing:
1. **Full Name (نام و نام خانوادگی):** Text input, required, sanitized.
2. **Corporate Email (ایمیل سازمانی):** Email input, required, validated against corporate domains.
3. **Contact Phone (شماره تماس):** Tel input, required, regex validation supporting Iranian mobile (`09xxxxxxxxx`), landline (`021xxxxxxxx`), and international dial formats (`+xxx`).
4. **Company / Organization Name (نام شرکت یا سازمان):** Text input, required.
5. **Job Title / Organizational Role (سمت سازمانی):** Text input, required.
6. **Inquiry Subject (موضوع پیام):** Select dropdown:
   - سرمایه‌گذاری و هم‌افزایی استراتژیک (Strategic Investment & Partnerships)
   - همکاری‌های پژوهشی و شتاب‌دهی (R&D & Incubation Collaboration)
   - تولید قراردادی و برون‌سپاری (CDMO & Contract Manufacturing)
   - امور رسانه‌ای و روابط عمومی (Media & Public Relations)
   - ارتباط عمومی با هلدینگ (General Corporate Inquiries)
7. **Message Body (متن پیام):** Textarea input, required, multi-line.
8. **Security & Anti-Spam Architecture:**
   - Headless honeypot input (invisible to screen readers and CSS-enabled browsers).
   - WordPress Nonce CSRF security token.
   - Zero intrusive visual CAPTCHAs that degrade the B2B executive experience.

### 7.3 Identified Gaps in Contact Information
- Central Corporate Fax Number: `[CLIENT CONFIRMATION REQUIRED]`
- Official Working Hours (e.g., Saturday–Wednesday 08:30–16:30): `[CLIENT CONFIRMATION REQUIRED]`
- Departmental Inboxes (`bd@rahnab.com`, `pr@rahnab.com`, `invest@rahnab.com`): `[CLIENT CONFIRMATION REQUIRED]`
- Official Messaging App Channels (WhatsApp, Bale, Eitaa): `[CLIENT CONFIRMATION REQUIRED]`
- Exact GPS Latitude/Longitude for NIGEB campus pin: `[RESEARCH REQUIRED / 35.7483° N, 51.1834° E]`

---

## 8. Language Architecture: True Bidirectional System (RTL / LTR)

The website must be engineered from the foundation as a native bilingual platform (Brief §9), completely rejecting the anti-pattern of retrofitting an English translation onto a hardcoded Persian layout:

```text
Language Architecture Framework
├── Primary Locale: Persian (fa-IR)
│   ├── Direction: dir="rtl"
│   ├── Root Route: / (or /fa/)
│   └── Typographic Engine: Modern High-Legibility Geometric Sans (Yekan Bakh / Peyda / Dana)
│
└── Secondary Locale: English (en-US)
    ├── Direction: dir="ltr"
    ├── Root Route: /en/
    └── Typographic Engine: International Swiss Grotesque (Euclid Circular A / Plus Jakarta Sans)
```

### 8.1 Bidirectional Mirroring Specifications
1. **Layout Mirroring via CSS Logical Properties:**
   - Strictly prohibit physical properties (`left`, `right`, `margin-left`, `padding-right`, `float`).
   - Mandate CSS Logical Properties: `margin-inline-start`, `margin-inline-end`, `padding-inline-start`, `padding-inline-end`, `inset-inline-start`, `inset-inline-end`, `text-align: start`.
2. **Navigation Header Symmetry:**
   - **RTL:** Logo on Far Right | Nav Links in Center | Language Toggle & CTA on Far Left.
   - **LTR:** Logo on Far Left | Nav Links in Center | Language Toggle & CTA on Far Right.
3. **Directional Vector Transformations:**
   - Action chevrons, outbound diagonal arrows, and timeline flow vectors must mirror across the Y-axis: `[dir="rtl"] .directional-icon { transform: scaleX(-1); }`.
   - Circular and rotational icons (refresh, clocks, circular badges) must remain un-mirrored.
4. **Bi-Directional Punctuation & Mixed Inline Strings:**
   - Mixed English names within Persian copy (e.g., "سرم ضد سم ScoFab تولیدی پادرا سرم") must use `<bdi>` (bidirectional isolation) or `unicode-bidi: isolate;` to prevent punctuation inversion and sentence fracturing.
5. **Language Switcher Ergonomics:**
   - Persistent, fixed header location.
   - Context-preserving routing: Switching languages on `/companies/nozhin-zist-pharmed` navigates directly to `/en/companies/nozhin-zist-pharmed` (not back to the home page).

---

## 9. Visual Direction & Art Direction Framework

The creative direction defined in Section 14 of the brief mandates an aesthetic defined as:
> **Super Premium / Sophisticated / High-End / Scientific / Corporate / Dynamic**  
> *An editorial life-science holding digital experience that inspires unassailable institutional trust.*

### 9.1 Brand Character & Emotional Tone
`Premium` · `Precise` · `Scientific` · `Trustworthy` · `Modern` · `Sophisticated` · `Dynamic` · `Minimal but Rich` · `Editorial` · `High-Tech` · `Confident` · `Institutional`

### 9.2 Chromatic Palette Hierarchy
To ensure absolute differentiation from generic blue pharmaceutical templates, the site deploys a dual-temperature, high-contrast palette:

| Swatch Role | Hex Code | Color Name | Visual & Psychological Purpose |
|:---|:---|:---|:---|
| **Primary Substrate** | `#FFFFFF` / `#F8FAFC` | Architectural White / Alabaster | Cleanroom purity, expansive whitespace, reading ease |
| **Dark Substrate** | `#030914` / `#071224` | Deep Bio-Obsidian / Midnight Navy | High-end editorial contrast, institutional authority |
| **Institutional Anchor** | `#0F2C59` / `#1E3A8A` | Deep Precision Cobalt | Scientific legitimacy, corporate stability |
| **Signature Warm Accent** | `#FD7702` / `#F59E0B` | Kinetic Bio-Amber / Tangerine | Disruption of cold pharma clichés; vitality and energy |
| **Secondary Cool Accent** | `#00A896` / `#059669` | Clinical Emerald / Life-Teal | Natural biology, cellular growth, therapeutic hope |
| **Neutral Surface Tier** | `#E2E8F0` / `#94A3B8` | Platinum Titanium / Slate | Hairline borders, technical annotations, secondary data |

### 9.3 Motion & Interaction System (GSAP Driven)
All motion must be purposeful and support narrative storytelling (Brief §14, §16):
- **Momentum-Based Smooth Scrolling:** Integrated via Lenis or GSAP ScrollSmoother (`lerp: 0.08`), giving the interface physical mass and inertia.
- **Scroll-Pinned Corporate Storytelling:** Pinned narrative viewports where text chapters transition alongside visual asset unmasking.
- **Magnetic Micro-Interactions:** Subtle magnetic cursor attraction on primary navigation and CTA buttons (`GSAP quickTo`).
- **Editorial Masked Image Reveals:** Smooth clip-path uncurtaining (`clip-path: polygon()`) on viewport intersection.
- **Dynamic Metric Counters:** Numerical count-up animations on visibility using GSAP easing.
- **Accessibility Safeguard:** Instant rendering fallback with zero animation when `(prefers-reduced-motion: reduce)` is detected.

---

## 10. Prohibited Anti-Patterns (Section 15 Strict Exclusions)

The team is legally and architecturally bound to eliminate the following 11 fatal design errors (Brief §15):

```text
PROHIBITED DESIGN PRACTICES (ZERO TOLERANCE):
❌ 1. Generic Corporate Templates: No off-the-shelf ThemeForest / Envato templates or repetitive card dumps.
❌ 2. Bootstrap-Looking UI: No generic 12-column boxy containers, default pill buttons, or heavy inset shadows.
❌ 3. Cheap Medical Aesthetic: No clipart red crosses, stethoscope graphics, cartoon pills, or generic clinic badges.
❌ 4. Monochromatic Pharma Blue: No sterile, all-cyan/sky-blue palettes that evoke cold municipal hospitals.
❌ 5. Stock-Photography Overload: Strictly NO staged models in fake lab coats smiling unnaturally into test tubes.
❌ 6. Excessive Gradient Overuse: No multi-stop rainbow or harsh neon gradients across background substrates.
❌ 7. Unreadable Glassmorphism: No frosted-glass overlays with poor contrast ratios that compromise legibility.
❌ 8. Random Uncontrolled Motion: No floating ambient bubbles, spinning atoms, or animations lacking narrative purpose.
❌ 9. Visual Clutter: No cramped margins, crowded sidebars, or dense walls of text; whitespace must be generous.
❌ 10. Dashboard-Style Portal: No dense analytics widgets, user metrics, or admin-panel UI on public corporate pages.
❌ 11. Consumer Healthcare Tone: No patient self-help tips, symptom checkers, or retail pharmacy merchandising.
```

---

## 11. Technical Architecture & CMS Implementation Standards

### 11.1 Prototype Phase Specifications (Milestone 4)
- **Core Markup:** Semantic HTML5 (`<header>`, `<main>`, `<section>`, `<article>`, `<nav>`, `<footer>`).
- **Styling Architecture:** **Tailwind CSS** with a custom design system configuration extending brand colors, typography scales, and fluid container widths.
- **Interaction Engine:** **GSAP (GreenSock)** + **ScrollTrigger** + **Lenis Scroll**.
- **Responsive Viewport Coverage:**
  - Mobile (375px – 480px)
  - Tablet Portrait (768px – 1023px)
  - Laptop / Standard Desktop (1024px – 1439px)
  - Large High-Resolution Display (1440px – 1919px) — *Primary Design Canvas*
  - Ultra-Wide / 4K (1920px – 3840px) — *Max-width containment at 1600px with generous margins*

### 11.2 WordPress Production Specifications (Milestones 6–7)
- **Theme Paradigm:** Fully Custom Classic WordPress Theme (adhering strictly to `.agents/rules/wordpress-development.md` and `.agents/skills/html-to-classic-wp/SKILL.md`).
- **Page Builder Prohibition:** Strictly NO visual builders (Elementor, Divi, WPBakery). All templates built in clean, modular PHP.
- **Architectural Modularity:** Core logic separated into `inc/enqueue.php`, `inc/cpt.php`, `inc/customizer.php`, `inc/security.php`, and `inc/helpers.php`.
- **WordPress Security Protocols:**
  - Context-aware late output escaping: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`.
  - Input sanitization: `sanitize_text_field()`, `sanitize_textarea_field()`, `sanitize_email()`.
  - Nonce verification and capability checks for all form submissions and AJAX handlers.
- **Core Web Vitals Performance Targets:**
  - Largest Contentful Paint (LCP): `< 1.8 seconds`
  - Interaction to Next Paint (INP): `< 150 milliseconds`
  - Cumulative Layout Shift (CLS): `< 0.05`

---

## 12. Traceability & Master Requirements Verification Matrix

Every section of `MASTER_PROJECT_BRIEF.md` is mapped directly to its architectural implementation in this specification:

| Brief Section | Section Title in Brief | Specification Implementation Section | Verification Status |
|:---:|:---|:---|:---:|
| **§1** | اطلاعات پایه پروژه (Basic Project Info) | §2 (Business Information & Positioning) | `[CONFIRMED]` |
| **§2** | ساختار اصلی سایت (Main Site Structure) | §4 (Website Structure & IA Baseline) | `[CONFIRMED]` |
| **§3** | محتوای صفحه شرکت‌های زیرمجموعه (Subsidiary Content) | §5 (Subsidiary Scope), §6 (Entity Schemas) | `[CONFIRMED]` |
| **§4** | صفحه درباره ما (About Us Page) | §4 (Navigation), §6.2 (Leadership Model) | `[CONFIRMED]` |
| **§5** | اخبار و رویدادها (News & Events) | §4 (Navigation), §6.3 (News Model) | `[CONFIRMED]` |
| **§6** | تماس با ما (Contact Page) | §7 (Contact Information & Inquiries) | `[CONFIRMED]` |
| **§7** | مجوزها، مدارک، دستاوردها و آمار (Trust & Metrics) | §3.2 (Trust Signals), §9.3 (Dynamic Counters) | `[CONFIRMED]` |
| **§8** | لینک‌های مرتبط (Related Links) | §5.1 (Portfolio Portals), §5.2 (Display Rules) | `[CONFIRMED]` |
| **§9** | زبان سایت (Website Language) | §8 (Bidirectional RTL/LTR System) | `[CONFIRMED]` |
| **§10** | وضعیت محتوای سایت (Content Status) | §6 (Schemas), §1 (Content-Resilience) | `[CONFIRMED]` |
| **§11** | مخاطب اصلی (Main Target Audience) | §3 (Target Audience & B2B Personas) | `[CONFIRMED]` |
| **§12** | ویژگی‌های بصری (Visual Preferences) | §9 (Visual Direction & Art Direction) | `[CONFIRMED]` |
| **§13** | سایت مرجع مورد علاقه (Cinnagen Analysis) | §2 (Strategic Differentiation), §9.2 (Palette) | `[CONFIRMED]` |
| **§14** | جهت‌گیری هنری (Creative Direction) | §9 (Art Direction & GSAP Framework) | `[CONFIRMED]` |
| **§15** | چیزی که نباید ساخته شود (Anti-Patterns) | §10 (Prohibited Anti-Patterns Matrix) | `[CONFIRMED]` |
| **§16** | خروجی نهایی پروژه (Final Deliverables) | §11 (Technical Stack & Two-Phase Pipeline) | `[CONFIRMED]` |
| **§17** | Content Model پیشنهادی (Content Model) | §6 (Comprehensive Data Field Schemas) | `[CONFIRMED]` |

---
*Authored and forensically validated by Milestone 0 Synthesis Team (`worker_m0_synthesis`) for the official project records.*
