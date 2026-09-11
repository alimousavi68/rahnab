# Comprehensive Information Architecture & Navigation Blueprint
## Rahnab Pharmed Corporate Holding Website (`rahnab.com`)
**Milestone 1 Deliverable — Explorer 2 (IA & Navigation Architect)**

---

## Executive Architectural Summary

Rahnab Pharmed (`شرکت رهناب فارمد`) is a premier Iranian biopharmaceutical investment holding group orchestrating an integrated, sovereign biomanufacturing ecosystem across seven high-technology subsidiaries. This document formulates the definitive Information Architecture (IA), Navigation Systems, Content Hierarchy, User Flow Diagrams, and IA Decision Log for the corporate portal.

### The 7 Confirmed Subsidiaries & Ecosystem Roles
Following the Milestone 1 subsidiary list correction (replacing Al Salam with Arc Zist Azma), the definitive portfolio consists of:
1. **Persis Gene (پرسیس ژن)** — Biotech Accelerator & Incubator (R&D, recombinant proteins, mAbs, bioprocess development).
2. **Nozhin Zist Pharmed (نوژین زیست فارمد)** — Biomanufacturing & Industrial Human Plasma Fractionation (150,000 L/year capacity; IVIG, Albumin).
3. **Padra Serum Alborz (پادرا سرم البرز)** — Specialized Hyperimmune Sera & Emergency Antidotes (>70% of national snake/scorpion antivenom supply).
4. **KarayaKhteh / CARTIMED (کارا یاخته تجهیز آزما)** — Regenerative Medicine, Advanced Cell Therapy, and Cartilage Scaffolds.
5. **Tamin Plasma Nozhin (تأمین پلاسما نوژین)** — Upstream Human Plasma Collection Centers & Fraction Source.
6. **Baya Zist Pharmed (بایا زیست فارمد)** — Recombinant Proteins & Industrial Biopharmaceutical Production.
7. **Arc Zist Azma (آرک زیست آزما)** — First Certified Biological Products Quality Control Laboratory in Iran, Knowledge-Based (دانش‌بنیان), FDA/IFDA Collaborator Laboratory (آزمایشگاه همکار سازمان غذا و دارو).

---

# Deliverable 1: Final Sitemap & Hierarchical Architecture

```text
RAHNAB PHARMED HIERARCHICAL SITEMAP ARCHITECTURE (BILINGUAL)
│
├── 1.0 Home (صفحه اصلی) ────────────────────────────────────────── [ / ] & [ /en/ ]
│   ├── 1.1 Hero Vision & Dynamic Bio-Visual Matrix
│   ├── 1.2 Holding Strategic Narrative & Sovereign Thesis
│   ├── 1.3 Integrated Biomanufacturing Value Chain Ecosystem (7 Subsidiaries)
│   ├── 1.4 National Scale, Infrastructure & Quantitative Proof Engine
│   ├── 1.5 Strategic Milestones, Scientific Achievements & Press
│   └── 1.6 Institutional B2B Inquiry & Engagement Gateway
│
├── 2.0 About Rahnab (درباره رهناب) ───────────────────────────────── [ /about/ ] & [ /en/about/ ]
│   ├── 2.1 Corporate Genesis & Scrollytelling Narrative Timeline
│   ├── 2.2 Strategic Pillars, Mission & 10-Year Biotech Vision
│   ├── 2.3 Governance & Executive Leadership ───────────────────── [ /about/governance/ ]
│   │   ├── Board of Directors (هیئت مدیره)
│   │   ├── Executive Management Committee (کمیته اجرایی)
│   │   └── Scientific & Advisory Council (شورای علمی و راهبردی)
│   ├── 2.4 Scientific & Industrial Infrastructure ──────────────── [ /about/infrastructure/ ]
│   │   ├── NIGEB Innovation & Headquarters Suite
│   │   ├── Sepehr Plasma Fractionation Refinery (150kL)
│   │   └── Advanced Cleanrooms & Bioreactor Parks
│   ├── 2.5 Institutional Video Presentation & Facility Walkthrough
│   └── 2.6 Accreditations, Regulatory Seals & Corporate Dossier ── [ /compliance/ ]
│
├── 3.0 Subsidiary Companies Ecosystem (شرکت‌های زیرمجموعه) ───────── [ /subsidiaries/ ] & [ /en/subsidiaries/ ]
│   ├── 3.1 Value Chain Cluster Navigation & Filtering:
│   │   ├── Cluster 1: R&D, Acceleration & Incubation ───────────── [ /subsidiaries/cluster/rd-incubation/ ]
│   │   ├── Cluster 2: Source Materials & Plasma Supply ─────────── [ /subsidiaries/cluster/source-plasma/ ]
│   │   ├── Cluster 3: Industrial Biomanufacturing & Biologics ───── [ /subsidiaries/cluster/biomanufacturing/ ]
│   │   ├── Cluster 4: Regenerative Medicine & Cell Therapy ─────── [ /subsidiaries/cluster/cell-therapy/ ]
│   │   ├── Cluster 5: Hyperimmune Sera & Emergency Antidotes ───── [ /subsidiaries/cluster/hyperimmune-sera/ ]
│   │   └── Cluster 6: Biological Quality Control & Analytics ──── [ /subsidiaries/cluster/quality-control/ ]
│   │
│   ├── 3.2 Canonical Subsidiary Profile Pages:
│   │   ├── 3.2.1 Persis Gene ───────────────────────────────────── [ /subsidiaries/persis-gene/ ]
│   │   ├── 3.2.2 Nozhin Zist Pharmed ───────────────────────────── [ /subsidiaries/nozhin-zist-pharmed/ ]
│   │   ├── 3.2.3 Padra Serum Alborz ────────────────────────────── [ /subsidiaries/padra-serum/ ]
│   │   ├── 3.2.4 KarayaKhteh / CARTIMED ────────────────────────── [ /subsidiaries/karayakhteh/ ]
│   │   ├── 3.2.5 Tamin Plasma Nozhin ───────────────────────────── [ /subsidiaries/tamin-plasma/ ]
│   │   ├── 3.2.6 Baya Zist Pharmed ─────────────────────────────── [ /subsidiaries/baya-zist-pharmed/ ]
│   │   └── 3.2.7 Arc Zist Azma ─────────────────────────────────── [ /subsidiaries/arc-zist-azma/ ]
│   │
│   └── 3.3 Upstream & Downstream Inter-Company Synergy Engine
│
├── 4.0 News & Events Hub (اخبار و رویدادها) ─────────────────────── [ /news-events/ ] & [ /en/news-events/ ]
│   ├── 4.1 Filterable Category Taxonomies:
│   │   ├── Holding Corporate News ──────────────────────────────── [ /news-events/category/holding-news/ ]
│   │   ├── Subsidiary Milestones ───────────────────────────────── [ /news-events/category/subsidiary-milestones/ ]
│   │   ├── Scientific & Clinical Achievements ──────────────────── [ /news-events/category/scientific-achievements/ ]
│   │   ├── Regulatory & Quality Statements ─────────────────────── [ /news-events/category/regulatory-statements/ ]
│   │   └── Events, Exhibitions & Congresses ────────────────────── [ /news-events/category/events-exhibitions/ ]
│   ├── 4.2 Cross-Entity Relationship Archives:
│   │   └── Articles Tagged by Subsidiary Entity ────────────────── [ /news-events/entity/{subsidiary-slug}/ ]
│   ├── 4.3 Featured Press Releases & Editorial Archive Grid
│   └── 4.4 Canonical Single News & Event View ───────────────────── [ /news-events/{slug}/ ]
│
├── 5.0 Contact & Institutional Relations (تماس با ما) ───────────── [ /contact/ ] & [ /en/contact/ ]
│   ├── 5.1 Central Institutional Communications (Email, Phone, Switchboard)
│   ├── 5.2 Headquarters Geospatial Map (NIGEB Campus, 3rd Floor, Unit 302)
│   ├── 5.3 Departmental Routing (B2B Partnerships, Investor Relations, Press, Careers)
│   ├── 5.4 Secure Enterprise Inquiry Form (CSRF-Guarded & Sanitized)
│   └── 5.5 Institutional Visiting & Compliance Protocols ───────── [ /contact/visiting-protocols/ ]
│
└── 6.0 Governance, Compliance & Utility Endpoints
    ├── 6.1 Regulatory Compliance & Accreditations Vault ─────────── [ /compliance/ ] & [ /en/compliance/ ]
    ├── 6.2 Privacy Policy & Corporate Data Governance ───────────── [ /privacy-policy/ ] & [ /en/privacy-policy/ ]
    ├── 6.3 Terms of Corporate Service ───────────────────────────── [ /terms/ ] & [ /en/terms/ ]
    ├── 6.4 XML Sitemap & Machine Directives ─────────────────────── [ /sitemap.xml ] & [ /robots.txt ]
    └── 6.5 Branded Editorial 404 Error Experience ───────────────── [ /404 ] & [ /en/404 ]
```

---

## 1.1 RESTful Latin URL Slug Conventions

To ensure zero percent-encoding corruption across Persian messaging platforms (Telegram, WhatsApp, Bale, Eitaa), bulletproof international SEO, and frictionless social previews, **all URL slugs are strictly standardized in Latin characters across both Persian and English locales**.

| Page / Route Type | Persian URL (Default, RTL) | English URL (Secondary, LTR) | Template Association | Purpose & Notes |
|:---|:---|:---|:---|:---|
| **Front Page** | `https://rahnab.com/` | `https://rahnab.com/en/` | `front-page.php` | Root corporate holding storytelling portal. |
| **About Us** | `/about/` | `/en/about/` | `page-about.php` | Strategic narrative, history, values, and vision. |
| **Governance Subpage** | `/about/governance/` | `/en/about/governance/` | `page-governance.php` | Board of Directors, Executive Committee, Advisory Board. |
| **Infrastructure Subpage** | `/about/infrastructure/` | `/en/about/infrastructure/` | `page-infrastructure.php` | Cleanrooms, fractionation refinery, NIGEB labs. |
| **Compliance & Accreditations** | `/compliance/` | `/en/compliance/` | `page-compliance.php` | GMP licenses, IFDA partner status, ISO seals, Knowledge-Based certs. |
| **Subsidiaries Hub** | `/subsidiaries/` | `/en/subsidiaries/` | `archive-company.php` | Full ecosystem directory and value-chain taxonomy filter. |
| **Subsidiary Cluster Taxonomy** | `/subsidiaries/cluster/{cluster-slug}/` | `/en/subsidiaries/cluster/{cluster-slug}/` | `taxonomy-company_cluster.php` | Filtered portfolio view by value-chain segment. |
| **Persis Gene Profile** | `/subsidiaries/persis-gene/` | `/en/subsidiaries/persis-gene/` | `single-company.php` | Single CPT profile for Biotech Incubator. |
| **Nozhin Zist Profile** | `/subsidiaries/nozhin-zist-pharmed/` | `/en/subsidiaries/nozhin-zist-pharmed/` | `single-company.php` | Single CPT profile for Plasma Fractionation. |
| **Padra Serum Profile** | `/subsidiaries/padra-serum/` | `/en/subsidiaries/padra-serum/` | `single-company.php` | Single CPT profile for Antivenom & Hyperimmune Sera. |
| **KarayaKhteh Profile** | `/subsidiaries/karayakhteh/` | `/en/subsidiaries/karayakhteh/` | `single-company.php` | Single CPT profile for Cell Therapy & CARTIMED. |
| **Tamin Plasma Profile** | `/subsidiaries/tamin-plasma/` | `/en/subsidiaries/tamin-plasma/` | `single-company.php` | Single CPT profile for Plasma Collection Centers. |
| **Baya Zist Profile** | `/subsidiaries/baya-zist-pharmed/` | `/en/subsidiaries/baya-zist-pharmed/` | `single-company.php` | Single CPT profile for Recombinant Proteins. |
| **Arc Zist Azma Profile** | `/subsidiaries/arc-zist-azma/` | `/en/subsidiaries/arc-zist-azma/` | `single-company.php` | Single CPT profile for Biological QC Laboratory. |
| **News & Events Hub** | `/news-events/` | `/en/news-events/` | `archive-news_event.php` | Comprehensive press, achievement, and event archive. |
| **News Category Taxonomy** | `/news-events/category/{category-slug}/` | `/en/news-events/category/{category-slug}/` | `taxonomy-news_category.php` | Category archive (e.g. `holding-news`, `regulatory-statements`). |
| **News Entity Taxonomy** | `/news-events/entity/{subsidiary-slug}/` | `/en/news-events/entity/{subsidiary-slug}/` | `taxonomy-related_entity.php` | Articles filtered by specific subsidiary relationship. |
| **Single Article View** | `/news-events/{slug}/` | `/en/news-events/{slug}/` | `single-news_event.php` | Editorial single post view with rich media and cross-links. |
| **Contact Us** | `/contact/` | `/en/contact/` | `page-contact.php` | Interactive campus map, directory, and B2B inquiry form. |
| **Visiting Protocols** | `/contact/visiting-protocols/` | `/en/contact/visiting-protocols/` | `page-visiting-protocols.php` | Institutional security and cleanroom visitation standards. |
| **Privacy Policy** | `/privacy-policy/` | `/en/privacy-policy/` | `page-legal.php` | Corporate data protection and legal disclaimers. |
| **Terms of Service** | `/terms/` | `/en/terms/` | `page-legal.php` | Terms of website use and intellectual property notices. |
| **404 Not Found** | `/404/` | `/en/404/` | `404.php` | Editorial error layout guiding users back to ecosystem hubs. |

---

## 1.2 Future Portfolio Extensibility Strategy (>7, 15, or 20+ Subsidiaries)

An essential enterprise requirement is the capacity to scale from the current 7 subsidiaries to 15 or 20+ companies without redesigning the navigation, breaking existing permalinks, or refactoring the database schema.

### Architectural Pillars of Extensibility:
1. **Flat Canonical Permalinks (`/subsidiaries/{slug}/`):**
   - By avoiding deep hierarchy in the URL (such as `/subsidiaries/cluster-name/company-slug/`), a company's URL is permanent. If a subsidiary expands its scope or moves between holding divisions, its canonical URL never breaks, eliminating 301 redirect overhead.
2. **Domain/Cluster Taxonomy Layer (`company_cluster`):**
   - Subsidiaries are tagged into extensible biomanufacturing value-chain clusters.
   - When the portfolio grows to 15+ entities, the UI automatically transitions from an unsegmented flat grid into a **Cluster-Segmented Accordion / Tabbed Interface**:
     - Cluster 1: *R&D, Incubation & Genetic Technologies*
     - Cluster 2: *Upstream Plasma Collection & Biological Raw Materials*
     - Cluster 3: *Industrial Fractionation & Large-Scale Biomanufacturing*
     - Cluster 4: *Cell Therapy, Tissue Engineering & Regenerative Medicine*
     - Cluster 5: *Hyperimmune Sera, Toxoids & Emergency Antidotes*
     - Cluster 6: *Analytical Testing, Quality Control & Bioequivalence*
     - Cluster 7: *International Distribution & Regional Trade (Future Expansion)*
3. **Decoupled Database Model:**
   - Companies exist as autonomous Custom Post Types (`company`). Adding an 8th or 20th company requires only publishing a new post in the CMS. No template files or navigation configurations are altered.
4. **Adaptive Navigation Clustering:**
   - In the Desktop Mega-Menu, when count $\le 8$, all subsidiaries appear with micro-badges.
   - When count $> 8$, the Mega-Menu dynamically switches into a two-level taxonomy view: users select a **Cluster** on the left panel, and the right panel dynamically renders the corresponding subsidiaries, preventing UI overflow.

---

## 1.3 Dual-Language Routing Strategy (FA Primary RTL / EN Secondary LTR)

### 1. Architecture: Sub-Path Prefix (`/` vs `/en/`)
- **Persian (`fa-IR`):** Served at root `https://rahnab.com/`. Default HTML attributes: `<html lang="fa-IR" dir="rtl">`.
- **English (`en-US`):** Served at sub-path `https://rahnab.com/en/`. HTML attributes: `<html lang="en-US" dir="ltr">`.

### 2. Technical Rationale for Sub-Path Prefix over Subdomains:
- **Domain Authority Consolidation:** Sub-paths aggregate all backlink equity, domain rating, and indexing signals into a single sovereign root domain (`rahnab.com`), whereas subdomains (`en.rahnab.com`) fragment domain authority in Google's indexing pipeline.
- **SSL and Cookie Synchronization:** Single SSL wildcard and unified session cookies allow seamless persistence of user preferences, language state, and analytics across languages.
- **Compliance with Iranian CDN & National Intranet (IXP):** Sub-path routing simplifies CDN edge caching and routing rules on local networks.

### 3. Bi-Directional Canonical & `hreflang` Implementation
Every indexed page must emit strictly validated `link rel="alternate"` tags in its `<head>` to prevent duplicate content penalties:

```html
<!-- Example on Persian Home: https://rahnab.com/ -->
<link rel="canonical" href="https://rahnab.com/" />
<link rel="alternate" hreflang="fa-IR" href="https://rahnab.com/" />
<link rel="alternate" hreflang="en-US" href="https://rahnab.com/en/" />
<link rel="alternate" hreflang="x-default" href="https://rahnab.com/" />

<!-- Example on English Persis Gene Profile: https://rahnab.com/en/subsidiaries/persis-gene/ -->
<link rel="canonical" href="https://rahnab.com/en/subsidiaries/persis-gene/" />
<link rel="alternate" hreflang="fa-IR" href="https://rahnab.com/subsidiaries/persis-gene/" />
<link rel="alternate" hreflang="en-US" href="https://rahnab.com/en/subsidiaries/persis-gene/" />
<link rel="alternate" hreflang="x-default" href="https://rahnab.com/subsidiaries/persis-gene/" />
```

### 4. Layout & Directional Mirroring Rules
- **CSS Logical Properties:** Use `margin-inline-start`, `padding-inline-end`, `inset-inline-start` instead of physical `left`/`right`.
- **Typography Pairing:**
  - Persian: **Yekan Bakh** (or **Vazirmatn** / **Peyda Web**) with calibrated tabular numerals for scientific data.
  - English: **Plus Jakarta Sans** / **Euclid Circular A** paired with **JetBrains Mono** for technical cleanroom specifications.

---

## 1.4 News & Events Taxonomy and Cross-Entity Model

The News & Events architecture acts as a corporate communications engine connecting holding announcements with subsidiary milestones.

### 1. Dual Taxonomy Structure:
1. **Editorial Type (`news_category`):**
   - `holding-news` (اخبار هلدینگ): Corporate governance, executive appointments, holding-level strategy.
   - `subsidiary-milestones` (دستاوردهای شرکت‌ها): Product launches, bioreactor commissionings, facility expansions.
   - `scientific-achievements` (دستاوردهای علمی و پژوهشی): Peer-reviewed publications, clinical trial phases, patents.
   - `regulatory-statements` (بیانیه‌ها و مجوزهای نظارتی): IFDA approvals, GMP certifications, national standards.
   - `events-exhibitions` (رویدادها و نمایشگاه‌ها): IranPharma, Arab Health, CPHI, international biotech symposiums.
2. **Entity Association (`related_subsidiary`):**
   - Bi-directional post relationship between `news_event` and `company`.

### 2. Cross-Entity Synergy Behavior:
- When a press release is published concerning Nozhin Zist Pharmed (e.g., *"Inauguration of 150,000L Plasma Fractionation Line"*):
  - It appears on the main News Hub `/news-events/`.
  - It appears on `/news-events/entity/nozhin-zist-pharmed/`.
  - It dynamically renders a rich entity preview card linking to `/subsidiaries/nozhin-zist-pharmed/`.
  - Reciprocally, the single subsidiary page `/subsidiaries/nozhin-zist-pharmed/` automatically pulls this article into its **Latest Milestones & Press** section.

---

## 1.5 Company Detail Page Architectural Structure (`single-company.php`)

Each of the 7 subsidiaries receives an institutional profile structured into 8 modular content zones:

```text
CANONICAL SINGLE SUBSIDIARY PAGE STRUCTURE
┌─────────────────────────────────────────────────────────────────────────────┐
│ 1. HERO IDENTITY ZONE                                                       │
│    - Official Brandmark & Bilingual Legal Name                              │
│    - Value-Chain Cluster Pill & Foundation Year                             │
│    - Verified National Registry ID & License Badges                         │
│    - Direct External Link to Official Company Website (rel="noopener")       │
├─────────────────────────────────────────────────────────────────────────────┤
│ 2. STRATEGIC POSITIONING & HOLDING ROLE                                     │
│    - Executive Summary & Corporate Purpose                                  │
│    - Specific role within Rahnab Group’s sovereign biomanufacturing chain   │
├─────────────────────────────────────────────────────────────────────────────┤
│ 3. KEY TECHNOLOGICAL CAPABILITIES & METRICS                                 │
│    - 3-4 High-contrast scientific metric cards:                             │
│      (e.g., Annual Fractionation: 150,000L | Cleanroom Footprint: 2,500 m²   │
│       Bioreactor Capacity: 2,000L | National Market Share: >70%)            │
├─────────────────────────────────────────────────────────────────────────────┤
│ 4. THERAPEUTIC / ACTIVITY PORTFOLIO                                         │
│    - Commercialized biological therapies (e.g., ImmunoJine, AlbuJine,       │
│      SnaFab, ScoFab, CARTIMED, Recombinant Proteins, Analytical QC Services)│
│    - Clinical pipeline stage or service capabilities grid                   │
├─────────────────────────────────────────────────────────────────────────────┤
│ 5. ACCREDITATIONS & REGULATORY SEALS                                        │
│    - National GMP Certificates, IFDA Collaborator Laboratory Badges,        │
│      ISO 9001/13485/17025 Seals, Knowledge-Based (دانش‌بنیان) Verification   │
├─────────────────────────────────────────────────────────────────────────────┤
│ 6. AUTHENTIC CLEANROOM & FACILITY SHOWCASE                                   │
│    - Documentary photo/video gallery of genuine laboratories, bioreactors,  │
│      and fractionation infrastructure (strictly no generic stock photos)    │
├─────────────────────────────────────────────────────────────────────────────┤
│ 7. ECOSYSTEM SYNERGIES & RELATED PRESS                                      │
│    - Visual upstream/downstream connection to other Rahnab subsidiaries     │
│    - Latest 2-3 press releases and scientific milestones tagged to entity   │
├─────────────────────────────────────────────────────────────────────────────┤
│ 8. DIRECT INSTITUTIONAL CONTACT & INQUIRY CARD                              │
│    - Facility address & campus location                                     │
│    - Direct business development contact email and phone                    │
│    - Dedicated "Initiate B2B Inquiry" action button                         │
└─────────────────────────────────────────────────────────────────────────────┘
```

---

# Deliverable 2: Navigation Architecture

## 2.1 Primary Desktop Navigation (The Floating Glassmorphic Pill)

### 1. Spatial Layout & Mechanics:
- **Container Positioning:** `fixed top-0 inset-x-0 z-50 flex justify-center px-4 py-4 md:py-6 transition-all duration-300 pointer-events-none`.
- **Inner Interactive Pill:** `pointer-events-auto flex items-center justify-between w-full max-w-7xl h-18 px-6 rounded-2xl bg-white/75 dark:bg-[#001428]/80 backdrop-blur-xl border border-white/20 dark:border-white/10 shadow-[0_8px_32px_rgba(0,0,0,0.12)]`.
- **Dynamic Scroll States:**
  - *At Top (`scrollY == 0`):* Expansive vertical padding (24px), glass opacity 75%, natural breathing room.
  - *On Scroll Down (`scrollY > 50`):* Compact padding (12px), background opacity rises to 90%, subtle elevation shadow increase (`shadow-[0_12px_40px_rgba(0,0,0,0.2)]`), keeping viewport focus on content.

### 2. RTL vs LTR Spatial Mapping:

```text
DESKTOP HEADER IN PERSIAN (RTL) — READING FROM RIGHT TO LEFT:
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ [ارتباط با هلدینگ]  [FA / EN] │ [تماس با ما] [اخبار و رویدادها] [شرکت‌های زیرمجموعه ▾] [درباره ما] [صفحه اصلی] │ [LOGO: RAHNAB] │
└────────────────────────────────────────────────────────────────────────────────────────────────────────┘

DESKTOP HEADER IN ENGLISH (LTR) — READING FROM LEFT TO RIGHT:
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ [LOGO: RAHNAB] │ [Home] [About Rahnab] [Subsidiaries ▾] [News & Events] [Contact] │ [FA / EN]  [Corporate Inquiry] │
└────────────────────────────────────────────────────────────────────────────────────────────────────────┘
```

### 3. Main Menu Items Hierarchy:
1. **صفحه اصلی (Home):** `/` | `/en/` — Direct link.
2. **درباره رهناب (About Rahnab):** `/about/` | `/en/about/` — Hover trigger for compact dropdown:
   - *داستان برند و مأموریت (Our Narrative & Mission)*
   - *ارکان حاکمیت شرکتی و مدیران (Governance & Leadership)* — `/about/governance/`
   - *زیرساخت‌های صنعتی و آزمایشگاهی (Industrial Infrastructure)* — `/about/infrastructure/`
   - *مجوزها و استانداردهای کیفی (Accreditations & Compliance)* — `/compliance/`
3. **شرکت‌های زیرمجموعه (Subsidiary Companies):** `/subsidiaries/` | `/en/subsidiaries/` — Triggers the **Ecosystem Mega-Menu**.
4. **اخبار و رویدادها (News & Events):** `/news-events/` | `/en/news-events/` — Direct link with badge for latest milestone.
5. **تماس با ما (Contact Us):** `/contact/` | `/en/contact/` — Direct link.

---

## 2.2 Subsidiaries Mega-Menu Architecture

The Subsidiaries menu requires a structured Mega-Menu rather than a simple dropdown list to properly communicate holding stature and value-chain synergy:

```text
SUBSIDIARIES VALUE-CHAIN MEGA-MENU ARCHITECTURE (RTL LAYOUT)
┌──────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│  ZONE 1: ECOSYSTEM CONTEXT (25%)  │  ZONE 2: THE 7 HIGH-TECH SUBSIDIARIES (50%) │ ZONE 3: HIGHLIGHT (25%)│
├───────────────────────────────────┼─────────────────────────────────────────────┼────────────────────────┤
│  اکوسیستم زیست‌دارویی رهناب فارمد │  [R&D & INCUBATION]                         │  [FEATURED MILESTONE]  │
│                                   │  • پرسیس ژن (Persis Gene)                   │  «راه‌اندازی خط تولید  │
│  هم‌افزایی تخصصی ۷ شرکت دانش‌بنیان│    شتاب‌دهنده زیست‌فناوری و بیوپراسس        │   پلاسمای نوژین زیست»   │
│  در زنجیره ارزش کامل: از تحقیق و   │                                             │                        │
│  توسعه مولکولی تا پالایش صنعتی پلاسما│  [PLASMA & BIOMANUFACTURING]               │  ظرفیت پالایش سالانه   │
│  و ایمونوگلوبولین‌های حیاتی.      │  • نوژین زیست فارمد (Nozhin Zist)           │  ۱۵۰,۰۰۰ لیتر پلاسما   │
│                                   │    پالایشگاه صنعتی پلاسما و مشتقات خونی      │                        │
│  [دکمه: مشاهده همه شرکت‌ها ←]     │  • تأمین پلاسما نوژین (Tamin Plasma)        │  [مشاهده دستاورد ←]    │
│  (/subsidiaries/)                 │    مراکز جمع‌آوری و تأمین پلاسمای انسانی    │                        │
│                                   │  • بایا زیست فارمد (Baya Zist)              │                        │
│                                   │    تولید پروتئین‌های نوترکیب صنعتی          │                        │
│                                   │                                             │                        │
│                                   │  [CELL THERAPY & ANTIDOTES]                 │                        │
│                                   │  • پادرا سرم البرز (Padra Serum)            │                        │
│                                   │    سرم‌های هایپرایمیون و پادزهر مار و عقرب   │                        │
│                                   │  • کارایاخته / کارتیمد (KarayaKhteh)        │                        │
│                                   │    پزشکی بازساختی و تمایز سلول‌های بنیادی   │                        │
│                                   │                                             │                        │
│                                   │  [QUALITY CONTROL & REGULATORY]             │                        │
│                                   │  • آرک زیست آزما (Arc Zist Azma)            │                        │
│                                   │    آزمایشگاه مرجع کنترل کیفی بیولوژیک       │                        │
└──────────────────────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 2.3 Footer Navigation Architecture

The footer reinforces institutional authority and complete transparency across four structured directory columns, followed by legal disclaimers:

```text
GLOBAL INSTITUTIONAL FOOTER ARCHITECTURE
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│ [RAHNAB LOGO & BRAND STATEMENT]                                                                        │
│ هلدینگ سرمایه‌گذاری زیست‌دارویی رهناب فارمد — پیشگام حاکمیت سلامت و تولید فرآورده‌های زیستی راهبردی.     │
├───────────────────┬───────────────────┬────────────────────────────┬───────────────────────────────────┤
│ 1. اکوسیستم و     │ 2. هلدینگ و       │ 3. استانداردها و مجوزها    │ 4. ارتباط با هلدینگ و دفاتر       │
│    شرکت‌های تابعه │    حاکمیت شرکتی   │                            │                                   │
├───────────────────┼───────────────────┼────────────────────────────┼───────────────────────────────────┤
│ • پرسیس ژن        │ • درباره هلدینگ   │ • استانداردهای GMP ملی     │ • پژوهشگاه ملی مهندسی ژنتیک       │
│ • نوژین زیست فارمد│ • پیام مدیرعامل   │ • آزمایشگاه همکار غذاودارو │   و زیست‌فناوری، ط ۳، واحد ۳۰۲    │
│ • پادرا سرم البرز │ • هیئت مدیره      │ • گواهینامه‌های ISO       │ • تلفن مرکزی: ۰۲۱-۴۹۳۶۱۲۰۰        │
│ • کارایاخته       │ • زیرساخت صنعتی   │ • شرکت‌های دانش‌بنیان     │ • ایمیل رسمی: info@rahnab.com     │
│ • تأمین پلاسما    │ • تاریخچه و افتخار│ • شفافیت و پاسخگویی       │ • لینکدین: Rahnab Pharmed         │
│ • بایا زیست فارمد │ • چشم‌انداز ۱۰ساله│ • پروتکل‌های ایمنی زیستی   │ • پالایشگاه سپهر (نوژین زیست)     │
│ • آرک زیست آزما   │ • فرصت‌های همکاری │ • منشور اخلاق پژوهشی       │ • درخواست جلسه حضوری              │
├───────────────────┴───────────────────┴────────────────────────────┴───────────────────────────────────┤
│ [LEGAL & UTILITY BAR]                                                                                  │
│ © ۲۰۲۶ شرکت رهناب فارمد (سهامی خاص). تمامی حقوق مادی و معنوی محفوظ است.                                 │
│ [حریم خصوصی]  •  [شرایط استفاده]  •  [نقشه سایت]  •  [مجوزهای نماد و ساماندهی]                         │
└────────────────────────────────────────────────────────────────────────────────────────────────────────┘
```

---

## 2.4 Mobile Navigation Architecture (Drawer & Touch Ergonomics)

1. **Trigger & Mechanics:**
   - Persistent hamburger button (minimum touch target `48x48px`) in top bar.
   - Smooth slide-out off-canvas drawer (sliding from **Right** in RTL, from **Left** in LTR).
   - Backdrop overlay: `bg-black/60 backdrop-blur-md` preventing background scrolling via `body-scroll-lock`.
2. **Hierarchy Inside Mobile Drawer:**
   - **Header:** Corporate Brandmark + Accessible Close (`X`) button (`aria-label="بستن منو"`).
   - **Primary Accordion Links:**
     - *صفحه اصلی* (Home)
     - *درباره رهناب* (About) ▾ [Expandable: داستان برند، مدیران، زیرساخت، مجوزها]
     - *شرکت‌های زیرمجموعه* (Subsidiaries) ▾ [Expandable: 7 شرکت با لوگو و عنوان کوتاه]
     - *اخبار و رویدادها* (News & Events)
     - *تماس با ما* (Contact)
   - **Sticky Bottom Action Zone (Thumb Reach Zone):**
     - Language Toggle button (`فارسی` | `English`).
     - Click-to-Call button (`۰۲۱-۴۹۳۶۱۲۰۰`) with phone vector icon.
     - Direct "ارتباط با هلدینگ" Primary CTA pill button.
3. **Accessibility (a11y) Compliance:**
   - Full keyboard focus trap inside the drawer while open.
   - `Escape` key closes the drawer and restores focus to the hamburger trigger.
   - Proper WAI-ARIA states: `aria-expanded="true/false"`, `aria-controls="mobile-nav-menu"`.

---

## 2.5 Language Switcher Architecture & Fallback Behavior

### 1. Placement & Interaction:
- **Desktop:** Integrated into the floating header pill next to the primary CTA (`[FA / EN]`).
- **Mobile:** Fixed in the thumb-accessible bottom bar of the mobile drawer.
- **Footer:** Secondary text link in the utility footer.

### 2. State Persistence:
- When a user toggles language, the preference is saved in:
  - `localStorage.setItem('rahnab_lang', 'fa' | 'en')`
  - Cookie: `Set-Cookie: rahnab_pref_lang=en; Path=/; Max-Age=2592000; SameSite=Lax` (30-day persistence).
- On subsequent visits to root `/`, if `rahnab_pref_lang == 'en'` and user has not explicitly navigated to Persian, client is gracefully offered or redirected to `/en/`.

### 3. Missing Translation Fallback Behavior:
If a user is browsing `/en/` and navigates to a news article or subsidiary whose English translation has not yet been published:
- **Never trigger a 404 error** (preserves crawl budget and user trust).
- **Graceful In-Page Bilingual Fallback:**
  - Render the page layout in English (headers, footer, metadata).
  - Display an elegant editorial notice banner:  
    *«This document is currently available in Persian only. Our translation team is finalizing the official English dossier.»*
  - Display the Persian body text formatted cleanly, accompanied by an instant link back to the English Hub (`/en/subsidiaries/` or `/en/news-events/`).

---

# Deliverable 3: Content Hierarchy & Page Narratives

## 3.1 Homepage: The Corporate Holding Story Narrative Arc

The Homepage must tell a **Sovereign Holding Story**, definitively rejecting the generic card-grid layout of consumer pharmaceutical websites.

```text
HOMEPAGE STRATEGIC NARRATIVE ARC
┌─────────────────────────────────────────────────────────────────────────────┐
│ 1. HERO VISION & SOVEREIGN MANDATE (Hero Zone)                              │
│    - Monumental headline establishing national life-science sovereignty     │
│    - Subtle kinetic molecular background loop (high-performance WebGL/video)│
│    - Primary CTA: «کشف زیست‌بوم رهناب» (Scroll to ecosystem)                 │
│    - Secondary CTA: «ارتباط سازمانی» (Route to B2B contact)                 │
│    - Quantitative Impact Proof Strip (4 counters: 7 High-Tech Ventures,     │
│      150,000L Fractionation, >70% Antivenoms, National Bio-Security)        │
├─────────────────────────────────────────────────────────────────────────────┤
│ 2. THE HOLDING STRATEGIC THESIS (Orchestration Zone)                        │
│    - Editorial 2-column layout: The Holding Mandate (Capital, Infrastructure,│
│      Regulatory Acceleration, Global Standards)                             │
│    - "چرا رهناب؟" (Why Rahnab? — Overcoming biotech commercialization gaps) │
├─────────────────────────────────────────────────────────────────────────────┤
│ 3. THE 7-SUBSIDIARY VALUE CHAIN ECOSYSTEM (Centerpiece Matrix)              │
│    - Interactive Value-Chain Flow Diagram:                                  │
│      (R&D / Incubation -> Plasma Collection -> Industrial Fractionation ->  │
│       Cell Therapy -> Hyperimmune Sera -> Biological Quality Control)       │
│    - Filterable tabs by Cluster role                                        │
│    - 7 Interactive Subsidiary Dossier Cards with quick-reveal drawers       │
├─────────────────────────────────────────────────────────────────────────────┤
│ 4. NATIONAL SCALE & SCIENTIFIC INFRASTRUCTURE (Proof Engine)                │
│    - Authentic photography of Sepehr fractionation refinery, cleanrooms,     │
│      and NIGEB research suites                                              │
│    - Verified GMP, IFDA Collaborator Laboratory, and ISO regulatory seals   │
├─────────────────────────────────────────────────────────────────────────────┤
│ 5. STRATEGIC MILESTONES & RECENT PRESS (Editorial Pulse)                    │
│    - 3 Curated editorial announcements: major clinical milestones,          │
│      holding investments, and exhibition appearances                        │
├─────────────────────────────────────────────────────────────────────────────┤
│ 6. INSTITUTIONAL B2B ENGAGEMENT GATEWAY (Conversion Zone)                   │
│    - High-contrast editorial banner inviting pharma peers, investors,       │
│      and academic researchers to initiate strategic collaboration           │
└─────────────────────────────────────────────────────────────────────────────┘
```

---

## 3.2 Page-by-Page Content Hierarchy & Data Sources

| Page Template | Content Zone | Visual Weight | Primary Data Source | Fallback / Dynamic Mechanism |
|:---|:---|:---:|:---|:---|
| **Home** (`front-page.php`) | **Zone 1: Hero Vision & Metrics** | High (100vh) | ACF Options / Theme Customizer | Hardcoded holding metrics if options empty. |
| | **Zone 2: Strategic Holding Thesis** | Medium | Theme Options (Editorial RichText) | Default Persian holding vision copy. |
| | **Zone 3: 7-Subsidiary Ecosystem** | Very High | `WP_Query(['post_type' => 'company'])` | Sorted by value-chain hierarchy order. |
| | **Zone 4: Infrastructure & GMP Seals** | High | ACF Gallery & Custom Fields | Static NIGEB & Sepehr verified photo assets. |
| | **Zone 5: Curated Press & Milestones** | Medium | `WP_Query(['post_type' => 'news_event', 'posts_per_page' => 3])` | Latest published press items. |
| | **Zone 6: B2B Inquiry Banner** | High | Static Component + Anchor Link | Routes directly to `#contact-inquiry`. |
| **About Us** (`page-about.php`) | **Zone 1: Genesis Scrollytelling** | High | Post Content / ACF Flexible Content | Pin-scrolled chronological timeline steps. |
| | **Zone 2: Strategic Pillars** | Medium | ACF Repeater (4 Pillars) | Innovation, Scale, Human Capital, Ethics. |
| | **Zone 3: Governance & Leadership** | High | `WP_Query(['post_type' => 'team_member'])` | Filtered by Board vs Executive Committee. |
| | **Zone 4: Industrial Footprint** | Medium | ACF Media & Video Embed | Embedded high-res institutional facility video. |
| | **Zone 5: Downloadable Fact Sheet** | Medium | ACF File Upload (`pdf_dossier`) | Download button with file-size badge. |
| **Subsidiaries Archive** (`archive-company.php`) | **Zone 1: Ecosystem Header & Synergies** | Medium | Archive Description / Static Header | Visual infographic of inter-company flows. |
| | **Zone 2: Cluster Taxonomy Filter Bar** | High | `get_terms(['taxonomy' => 'company_cluster'])` | Real-time JS filter without page reload. |
| | **Zone 3: Subsidiary Cards Grid** | Very High | `WP_Query(['post_type' => 'company'])` | Responsive auto-fit grid (`minmax(340px, 1fr)`). |
| **Single Subsidiary** (`single-company.php`) | **Zone 1: Hero Identity & Web Link** | High | CPT Meta (Logo, External URL, Reg ID) | Verified corporate registry metadata. |
| | **Zone 2: Strategic Ecosystem Role** | High | Post Content (WYSIWYG) | In-depth company narrative. |
| | **Zone 3: Technical Specs & Metrics** | High | ACF Repeater (Key Metrics) | Cleanroom m², annual production liters. |
| | **Zone 4: Products / Activities Grid** | Medium | ACF Repeater (Products / Services) | Product brandmarks, therapeutic indications. |
| | **Zone 5: Cleanroom Photo Gallery** | Medium | ACF Gallery (`facility_photos`) | Lightbox modal viewer. |
| | **Zone 6: Related Press & News** | Medium | `WP_Query` cross-referencing company ID | 2-3 latest articles mentioning this entity. |
| | **Zone 7: Direct Contact Card** | High | CPT Meta (Address, Phone, Email) | Dedicated facility contact box. |
| **News & Events Archive** (`archive-news_event.php`) | **Zone 1: Category Filter Pills** | Medium | `get_terms(['taxonomy' => 'news_category'])` | Active state highlight with post count badge. |
| | **Zone 2: Featured Lead Milestone** | High | `WP_Query(['meta_key' => 'is_featured', 'value' => true])` | Full-width editorial card with reading time. |
| | **Zone 3: News Post Cards Grid** | Medium | Standard Paginated Query (9 posts/page) | AJAX "Load More" pagination. |
| **Single News Article** (`single-news_event.php`) | **Zone 1: Editorial Header & Metadata** | High | Post Title, Subtitle, Date, Category | Solar Hijri & Gregorian dual dates. |
| | **Zone 2: Long-Form Body Typography** | High | Post Content (WYSIWYG formatted) | Calibrated 65-75 ch line-length typography. |
| | **Zone 3: Related Company Card** | Medium | CPT Relationship Field (`related_company`) | Renders linked subsidiary profile badge. |
| **Contact Page** (`page-contact.php`) | **Zone 1: Official Directory & Phone** | High | Theme Options (Phone, Email, LinkedIn) | Click-to-call & click-to-email links. |
| | **Zone 2: Interactive Campus Map** | High | Leaflet.js / OpenStreetMap coordinates | Custom styled marker at NIGEB (`35.7483° N, 51.1834° E`). |
| | **Zone 3: Enterprise B2B Inquiry Form** | Very High | Custom Sanitized Form Handler | Nonce protection, department routing dropdown. |

---

# Deliverable 4: User Flow Diagrams

## Flow 1: B2B Visitor / Pharma Client -> Subsidiary & Service Discovery
*Persona: VP of Business Development at a regional pharmaceutical enterprise seeking contract biological quality control and plasma fractionation services.*

```text
[B2B Visitor arrives at Homepage (rahnab.com)]
         │
         ▼
[Examines Hero Vision & Sovereign Metrics: 7 Ventures | 150kL Fractionation | Bio-QC]
         │
         ├─── Action A: Clicks "شرکت‌های زیرمجموعه" in Floating Header Mega-Menu
         │         │
         │         ▼
         │    [Scans Mega-Menu: Selects "آرک زیست آزما (QC Lab)" or "نوژین زیست فارمد (پلاسما)"]
         │
         └─── Action B: Scrolls down Homepage to "اکوسیستم زیست‌دارویی" Interactive Matrix
                   │
                   ▼
              [Clicks Category Filter: "کنترل کیفی و استانداردها" or "پالایش پلاسما"]
                   │
                   ▼
              [Opens Quick-Reveal Drawer -> Clicks "مشاهده پروفایل کامل شرکت"]
         │
         ▼
[Lands on Single Subsidiary Page: /subsidiaries/arc-zist-azma/]
         │
         ▼
[Evaluates Technical Capabilities & Trust Signals]
 ├── Checks IFDA Collaborator Laboratory Status & ISO 17025 Accreditation
 ├── Inspects Cleanroom & Equipment Gallery (HPLC, Mass Spectrometry, Endotoxin Labs)
 └── Reviews Verified Regulatory Testing Capacity
         │
         ▼
[Conversion Trigger: Clicks "درخواست همکاری B2B با این شرکت"]
         │
         ▼
[Redirected to /contact#b2b-form with "آرک زیست آزما" automatically pre-selected in Department dropdown]
         │
         ▼
[Fills Form: Name, Corporate Email, Pharma Company Name, Project Scope]
         │
         ▼
[Form Validation & CSRF Nonce Verification Passes]
         │
         ▼
[Receives Confirmation Dialog + Tracking Reference ID + Email Receipt]
```

---

## Flow 2: Investor / Financial Institution -> Group Strength & Governance Overview
*Persona: Senior Life-Science Investment Analyst evaluating Rahnab's capital structure, technological assets, and corporate governance.*

```text
[Investor lands on Homepage (rahnab.com or /en/)]
         │
         ▼
[Notes Sovereign Institutional Stature & Capital Synergy Proof Strip]
         │
         ▼
[Clicks "درباره رهناب" -> Selects "حاکمیت شرکتی و مدیران" (/about/governance/)]
         │
         ▼
[Evaluates Governance Architecture]
 ├── Reviews Board of Directors Credentials & Executive Committee Profiles
 ├── Analyzes Scientific & Advisory Council Academic Pedigree (NIGEB, TUMS)
 └── Inspects Corporate Organizational Hierarchy
         │
         ▼
[Navigates to /about/infrastructure/ to Verify Physical Capital Assets]
 ├── Sepehr Industrial Plasma Refinery (150,000L annual throughput)
 ├── Specialized Cleanroom Parks (Safadasht & NIGEB campuses)
 └── High-Value Bioreactor & Lyophilization Equipment
         │
         ▼
[Navigates to /compliance/ -> Reviews GMP, IFDA, and Knowledge-Based Certifications]
         │
         ▼
[Clicks "دانلود شناسنامه رسمی هلدینگ (Corporate Fact Sheet PDF)"]
         │
         ▼
[Clicks "ارتباط با امور سرمایه‌گذاران" -> Routes to dedicated Investor Relations Contact Form]
```

---

## Flow 3: Press / Media -> News, Official Statements, Media Assets
*Persona: Medical science journalist reporting on Iranian self-sufficiency in snake/scorpion antivenoms and recombinant proteins.*

```text
[Journalist arrives at Homepage or /news-events/]
         │
         ▼
[Filters News Archive by Category: "دستاوردهای علمی" or Entity: "پادرا سرم البرز"]
         │
         ▼
[Selects Press Release: «تأمین بیش از ۷۰ درصد پادزهرهای مار و عقرب کشور توسط پادرا سرم»]
         │
         ▼
[Enters Single News View: /news-events/padra-serum-national-antivenom-supply/]
         │
         ▼
[Reviews Press Assets & Editorial Content]
 ├── Reads Verified Statistical Report with Gregorian & Solar Hijri Dates
 ├── Verifies Cross-Link to Padra Serum Official Subsidiary Profile
 └── Expands High-Resolution Photographic Assets of Equine Immunoglobulin Refinery
         │
         ▼
[Action: Clicks "دانلود کیت رسانه‌ای و تصاویر باکیفیت (Download Media Kit ZIP)"]
         │
         ▼
[Action: Clicks "تماس با روابط عمومی هلدینگ" -> Direct access to press officer email & phone]
```

---

## Flow 4: Partner / Research Institute -> Scientific & Business Collaboration Contact
*Persona: Academic Principal Investigator or Biotech Startup Founder seeking incubation, scale-up bioreactors, and clinical trial support.*

```text
[Scientist lands on Homepage -> Searches for Incubator / Accelerator]
         │
         ▼
[Selects "پرسیس ژن (Persis Gene)" from Ecosystem Hub or Mega-Menu]
         │
         ▼
[Enters /subsidiaries/persis-gene/]
         │
         ▼
[Examines Incubation Capabilities & Bioprocess Infrastructure]
 ├── Recombinant protein expression systems (mammalian & microbial)
 ├── Pilot-scale bioreactors and fill-finish capabilities
 └── Proven spin-off track record
         │
         ▼
[Clicks "ارسال طرح پژوهشی و درخواست انکوباسیون" (Submit Research Proposal)]
         │
         ▼
[Routes to B2B Form with "همکاری‌های علمی و شتاب‌دهی (Persis Gene)" selected]
         │
         ▼
[Uploads Project Abstract / Non-Confidential Executive Summary PDF]
         │
         ▼
[Submission Complete -> Dispatches secure notification to Scientific Evaluation Committee]
```

---

# Deliverable 5: IA Decision Log

Strictly documented in accordance with the project's `decision-making.md` framework:

---

### Decision 1: Root Navigation Nomenclature for Subsidiary Portfolio (`/subsidiaries/` vs `/companies/` vs `/ecosystem/`)

#### گزینه ۱: استفاده از مسیر `/companies/` (شرکت‌ها)
- **مزایا:** واژه‌ای کوتاه، بسیار متداول در وب‌سایت‌های تجاری معمولی، برای عموم کاربران ساده و شناخته‌شده است.
- **معایب:** بار معنایی «هلدینگ سرمایه‌گذاری» را منتقل نمی‌کند. در ادبیات B2B و Life-Science Holdings بین‌المللی (Roche, Danaher, Roivant)، این واحدها صرفاً چند شرکت مستقل تجاری نیستند، بلکه شرکت‌های تابعه و زیرمجموعه یک شبکه یکپارچه هستند. واژه generic «companies» جایگاه ساختاری و حاکمیتی هلدینگ را تنزل می‌دهد.

#### گزینه ۲: استفاده از مسیر `/ecosystem/` (زیست‌بوم)
- **مزایا:** از نظر تماتیک بسیار مدرن و نشان‌دهنده هم‌افزایی و شبکه زیستی است.
- **معایب:** از نظر استانداردهای جستجو (SEO) و پیش‌بینی‌پذیری رفتار کاربر B2B مبهم است. بازدیدکننده دارویی یا سرمایه‌گذار خارجی دقیقاً به دنبال فهرست نهادهای حقوقی تابعه هلدینگ می‌گردد و ممکن است واژه «ecosystem» را با صفحات عمومی درباره محیط‌زیست یا ارزش‌های سازمانی اشتباه بگیرد.

#### پیشنهاد نهایی: استفاده از مسیر `/subsidiaries/` (شرکت‌های تابعه / زیرمجموعه)
- **دلیل انتخاب:** بالاترین تطابق با الزامات صریح بریف پروژه و هویت حقوقی هلدینگ سرمایه‌گذاری. این نام‌گذاری دقیقاً ماهیت رابطه حقوقی و زنجیره ارزش بین رهناب فارمد و ۷ شرکت را منعکس می‌کند، در مکاتبات B2B بین‌المللی کاملاً استاندارد است، و در ساختار URL کاملاً گویای محتوای صفحه است (`/subsidiaries/{slug}`).

---

### Decision 2: URL Slug Language Strategy (English Latin Slugs vs Localized Persian Slugs)

#### گزینه ۱: استفاده از اسلاگ‌های فارسی (مانند `/subsidiaries/پرسیس-ژن/`)
- **مزایا:** هماهنگی ظاهری با زبان فارسی در نوار آدرس مرورگر.
- **معایب:** 
  1. در هنگام کپی کردن یا اشتراک‌گذاری در پیام‌رسان‌ها (تلگرام، ایتا، بله، واتس‌اپ) و ایمیل‌های اداری، تبدیل به رشته‌های بسیار طولانی و غیرخوانای Percent-Encoded (مانند `%D9%BE%D8%B1%D8%B3%DB%8C%D8%B3...`) می‌شود که ظاهر سایت را نامعتبر و غیرحرفه‌ای جلوه می‌دهد.
  2. ریسک بالای خطاهای Routing در وب‌سرورهای Nginx/Apache و سیستم Caching وردپرس.
  3. تداخل با هدرهای HTTP و تگ‌های `hreflang` در سئوی چندزبانه بین‌المللی.

#### گزینه ۲: استفاده از شناسه‌های عددی (مانند `/subsidiaries/102/`)
- **مزایا:** ساده، بدون مشکل انکودینگ، کوتاه.
- **معایب:** برای انسان ناخوانا، ارزش معنایی صفر برای موتورهای جستجو (SEO)، مغایر با اصول معماری RESTful و تجربه کاربری درجه‌یک.

#### پیشنهاد نهایی: استفاده از اسلاگ‌های استاندارد لاتین انگلیسی در هر دو زبان (مانند `/subsidiaries/persis-gene/`)
- **دلیل انتخاب:** بر اساس قوانین مهندسی وب مدرن و استاندارد ارائه‌شده در Deliverable 06، تمام اسلاگ‌ها در هر دو نسخه فارسی و انگلیسی با حروف لاتین نام‌گذاری می‌شوند. این رویکرد لینک‌های پایدار، کوتاه، تمیز و قابل اشتراک‌گذاری تولید می‌کند، در تگ‌های canonical و hreflang به درستی ایندکس می‌شود، و نگهداری سایت را کاملاً تضمین می‌نماید.

---

### Decision 3: Dual-Language Routing Architecture (Path Prefix `/en/` vs Subdomain `en.rahnab.com`)

#### گزینه ۱: استفاده از ساب‌دامین اختصاصی (`en.rahnab.com`)
- **مزایا:** امکان تفکیک کامل هاست یا پایگاه داده نسخه انگلیسی در صورت نیاز به سرورهای خارج از کشور.
- **معایب:** 
  1. گوگل ساب‌دامین را به عنوان یک موجودیت تقریباً مجزا ارزیابی می‌کند، که باعث تکه‌تکه شدن اعتبار دامنه (Domain Authority / Backlink Equity) می‌شود.
  2. مدیریت کوکی‌ها، سشن‌های کاربر و تنظیمات امنیت بین‌دامنه‌ای (CORS) پیچیده‌تر می‌شود.
  3. در محیط شبکه ملی اطلاعات (CDNهای داخلی)، مدیریت دو دامنه هزینه‌های پیکربندی را افزایش می‌دهد.

#### گزینه ۲: استفاده از دامنه‌های کشوری مجزا (`rahnab.ir` و `rahnab.com`)
- **مزایا:** تفکیک محلی کامل.
- **معایب:** هزینه نگهداری بالا، عدم ارتباط مستقیم معماری، و خطر تحریم یا از دست رفتن دسترسی‌های بین‌المللی.

#### پیشنهاد نهایی: استفاده از ساختار دایرکتوری پیشوند مسیر (`https://rahnab.com/` برای فارسی و `https://rahnab.com/en/` برای انگلیسی)
- **دلیل انتخاب:** تمرکز تمام قدرت سئو بر روی دامنه اصلی `rahnab.com`. سادگی بی‌نظیر در مدیریت وردپرس (چندزبانه با Polylang یا WPML بدون نیاز به Multi-site سنگین)، هماهنگی بدون نقص با کش CDN و وب‌سرور، و حفظ یکپارچگی کوکی زبان کاربر.

---

### Decision 4: Desktop Subsidiaries Navigation UX (Full-Width Mega-Menu vs Simple Vertical Dropdown)

#### گزینه ۱: دراپ‌داون تک‌ستونه ساده عمودی (Simple Vertical Dropdown)
- **مزایا:** پیاده‌سازی سریع، حجم کد کمتر در منو.
- **معایب:** تنها می‌تواند اسامی ۷ شرکت را به صورت یک لیست عمودی متنی ساده نشان دهد. هیچ جایی برای نمایش لوگو، حوزه تخصصی در زنجیره ارزش (پلاسما، بیوپراسس، پادزهر)، یا تصویر برجسته وجود ندارد. حس یک شرکت کوچک را القا می‌کند نه یک هلدینگ بزرگ زیست‌دارویی.

#### گزینه ۲: هدایت مستقیم بدون زیرمنو به صفحه شاخص (`/subsidiaries/`)
- **مزایا:** منوی بسیار خلوت در هدر.
- **معایب:** تحمیل یک کلیک و بارگذاری کامل صفحه به مدیر ارشد دارویی یا سرمایه‌گذاری که صرفاً می‌خواهد به سرعت وارد پروفایل یک شرکت خاص (مثلاً آرک زیست آزما یا پادرا سرم) شود؛ اصطکاک ناوبری غیرضروری.

#### پیشنهاد نهایی: استفاده از مگامنوی سه‌بخشی هوشمند (Value-Chain Mega-Menu)
- **دلیل انتخاب:** امکان دسته‌بندی بصری ۷ شرکت بر اساس جایگاه آنها در زنجیره ارزش بیوتکنولوژی، نمایش لوگوی رسمی هر شرکت به همراه عنوان خلاصه تخصصی، و ارائه یک بنر رویداد/دستاورد شاخص در ستون کناری. این الگو مستقیماً استانداردهای برتر بین‌المللی بنچ‌مارک (Roivant و Danaher) را بدون نقض سادگی و ظرافت پیاده می‌کند.

---

### Decision 5: Portfolio Extensibility Architecture (Flat Slug `/subsidiaries/{slug}` vs Hierarchical Slug `/subsidiaries/{cluster}/{slug}`)

#### گزینه ۱: استفاده از اسلاگ سلسله‌مراتبی خوشه‌ای (`/subsidiaries/{cluster}/{slug}`)
- **مزایا:** نمایش ساختار دسته‌بندی در آدرس URL.
- **معایب:** شکنندگی شدید معماری. اگر در آینده یک شرکت از یک خوشه به خوشه دیگری منتقل شود (مثلاً گسترش حوزه فعالیت نوژین زیست از صرفاً پلاسما به بیوداروی نوترکیب)، URL آن شرکت تغییر می‌کند که نیازمند ریدایرکت‌های ۳۰۱ مکرر است و بک‌لینک‌های ایجادشده را به خطر می‌اندازد.

#### گزینه ۲: صفحه تک‌استاتیک بدون آرشیو انفرادی شرکت‌ها
- **مزایا:** حذف صفحات انفرادی و سادگی.
- **معایب:** ناتوانی در ارائه اطلاعات عمیق فنی (Cleanroom specs, GMP certifications, product line-up) برای هر شرکت و سئوی ضعیف نام تک‌تک شرکت‌ها در جستجوهای دارویی.

#### پیشنهاد نهایی: اسلاگ‌های مسطح استاندارد (`/subsidiaries/{slug}`) همراه با لایه تاکسونومی داینامیک (`company_cluster`)
- **دلیل انتخاب:** استقلال کامل URL پایدار از دسته‌بندی‌های متغیر تجاری. هر شرکت یک URL دائمی و مشخص دارد، در حالی که در فرانت‌اند می‌توان شرکت‌ها را بر اساس خوشه‌های پویا (قابل افزایش تا ۱۵ یا ۲۰ شرکت در پنل ادمین) بدون هیچ‌گونه شکست در ساختار سایت یا کد قالب فیلتر کرد.

---

### Decision 6: News & Events Route & Content Grouping (Unified `/news-events/` Hub vs Separate `/news/` and `/events/`)

#### گزینه ۱: تفکیک فیزیکی به دو بخش مجزا (`/news/` و `/events/`)
- **مزایا:** جداسازی دقیق اخبار متنی از رویدادها و نمایشگاه‌ها در سطح URL.
- **معایب:** در شرکت‌های هلدینگ، رویدادها (مانند حضور در نمایشگاه ایران‌فارما یا کنگره بین‌المللی بیوتکنولوژی) معمولاً به عنوان یک خبر رسمی با پوشش تصویری و بیانیه گزارش می‌شوند. تفکیک آنها باعث کم‌حجم شدن آرشیوها، سردرگمی خبرنگاران، و دوباره‌کاری در سیستم ناوبری می‌شود.

#### گزینه ۲: صرفاً یک بلاگ ساده وردپرسی (`/blog/`)
- **مزایا:** ساختار پیش‌فرض وردپرس.
- **معایب:** واژه «blog» برای یک هلدینگ دارویی فوق‌العاده غیررسمی و نامناسب است و به هویت حقوقی مجموعه لطمه جدی می‌زند.

#### پیشنهاد نهایی: هاب رسانه‌ای و خبری یکپارچه (`/news-events/`) با فیلتر تاکسونومی چندبُعدی
- **دلیل انتخاب:** ارائه یک مرکز جامع روابط عمومی و اطلاع‌رسانی که تمام اخبار هلدینگ، اخبار شرکت‌های تابعه، رویدادها، بیانیه‌ها و افتخارات علمی را زیر یک سقف گرد هم می‌آورد و از طریق فیلترهای تب‌بندی‌شده سریع، دسترسی بدون لود مجدد صفحه را برای رسانه‌ها و مدیران فراهم می‌سازد.

---

### Decision 7: Single Subsidiary Content Architecture (Single Scrollable Editorial Page vs Multi-tab Subpages)

#### گزینه ۱: استفاده از زیرصفحات متعدد برای هر شرکت (مانند `/subsidiaries/{slug}/products`, `/subsidiaries/{slug}/infrastructure`)
- **مزایا:** امکان قرار دادن حجم بسیار زیاد متن در صفحات جداگانه.
- **معایب:** باعث قطعه‌قطعه شدن اطلاعات و کاهش شدید عمق پیمایش کاربر در شرکت‌های تابعه می‌شود. بسیاری از شرکت‌های تابعه در فاز اول ممکن است اطلاعات کافی برای ۵ زیرصفحه مجزا نداشته باشند و صفحات خالی یا کم‌محتوا (Thin Content) ایجاد شود که به سئو آسیب می‌زند.

#### گزینه ۲: فقط باز شدن یک پنجره Modal / Drawer روی صفحه اصلی بدون لینک انفرادی
- **مزایا:** عدم خروج از صفحه کاتالوگ.
- **معایب:** عدم وجود صفحه اختصاصی قابل ایندکس در گوگل برای جستجوی نام شرکت‌های تابعه، عدم امکان اشتراک‌گذاری لینک مستقیم در مکاتبات B2B.

#### پیشنهاد نهایی: صفحه پروفایل انفرادی جامع با ساختار روایت طولی اسکرولی (Modular Long-Form Editorial Single Page)
- **دلیل انتخاب:** یک صفحه کامل و آبرومند برای هر شرکت تابعه با تمام مشخصات هویتی، فنی، محصولات، گالری تمیز آزمایشگاهی، اخبار مرتبط و فرم تماس اختصاصی. این فرمت در موبایل و دسکتاپ فوق‌العاده روان است، لینک مستقیم و سئوی قوی دارد، و در صورت کم بودن محتوای یک شرکت، ظاهر صفحه کامل و شیک باقی می‌ماند.

---

### Decision 8: Missing Translation Fallback Mechanism (In-Page Fallback with Bilingual Notice vs Hard 404 vs Automated Redirect)

#### گزینه ۱: خطای ۴۰۴ سخت (Hard 404 Error)
- **مزایا:** نمایش فنی عدم وجود محتوا.
- **معایب:** تجربه کاربری فاجعه‌بار برای بازدیدکننده بین‌المللی یا سرمایه‌گذار خارجی؛ ایجاد خطاهای Broken Links در گوگل سرچ کنسول و آسیب به رتبه سئو.

#### گزینه ۲: ریدایرکت خودکار به صفحه اصلی انگلیسی (`/en/`)
- **مزایا:** جلوگیری از نمایش خطای ۴۰۴.
- **معایب:** کاربر متوجه نمی‌شود چرا به صفحه اصلی پرتاب شد و گمان می‌کند سایت خراب است (Baffling UX).

#### پیشنهاد نهایی: نمایش قالب با اعلان محترمانه درون‌صفحه‌ای (Graceful In-Page Bilingual Notice) و حفظ محتوای مرجع
- **دلیل انتخاب:** صفحه با ساختار و هدر/فوتر استاندارد انگلیسی لود می‌شود؛ یک کادر ویراستاری بسیار شیک به زبان انگلیسی به کاربر توضیح می‌دهد که نسخه ترجمه‌شده این گزارش در حال نهایی‌سازی است و دکمه بازگشت به آرشیو انگلیسی به همراه متن مرجع فارسی در اختیار او قرار می‌گیرد. این رویکرد شفاف، حرفه‌ای و منطبق بر رفتار وب‌سایت‌های چندملیتی معتبر است.

---
*تهیه و تنظیم: مهندس ارشد معماری اطلاعات و استراتژی ناوبری (Explorer 2 — IA & Navigation Architect)*
