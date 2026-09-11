# DELIVERABLE 06: Initial Information Architecture & Content Model Proposal
## Rahnab Pharmed Corporate Website — Milestone 0: Research & Discovery Synthesis

**Project:** Rahnab Pharmed Corporate Website (`rahnab.com`)  
**Document Code:** `DELIV-06-IA-PROPOSAL`  
**Classification:** Information Architecture Blueprint & WordPress Content Model  
**Author:** Milestone 0 Synthesis Team (`worker_m0_synthesis`)  
**Status:** Preliminary Architecture for Stakeholder Review (Pre-Wireframing)  
**Foundation:** `MASTER_PROJECT_BRIEF.md` (§2, §3, §4, §5, §6, §17) & Benchmark Matrix Insights  

---

## 1. Executive Summary & Strategic IA Rationale

The Information Architecture (IA) for Rahnab Pharmed must resolve the core challenge identified in our benchmark study: **How to present a diversified, multi-venture biopharmaceutical investment holding with clarity, prestige, and effortless navigation.**

Unlike a single operating drug company whose architecture is organized by disease indications or retail products, Rahnab Pharmed’s architecture is organized around:
1. **The Sovereign Umbrella Mandate:** Establishing the holding’s national scale, scientific leadership, and capital synergy.
2. **The Integrated Ecosystem Portfolio:** Presenting the seven specialized operating companies as an interconnected biomanufacturing value chain.
3. **Institutional Trust & Transparency:** Showcasing executive leadership, cleanroom infrastructure, GMP/ISO accreditations, and verifiable research impact.
4. **Future Portfolio Extensibility:** Ensuring the architecture gracefully accommodates future acquisitions, spin-offs, and ventures (>7 subsidiaries) without structural redesign.

---

## 2. Complete Sitemap & Tree Hierarchy

The sitemap is architected as a native bidirectional structure, perfectly mirrored across Persian (`fa-IR`, default) and English (`en-US`):

```text
RAHNAB PHARMED SITEMAP ARCHITECTURE (BILINGUAL)
│
├── 1.0 Home (صفحه اصلی) ────────────────────────── [ / ] & [ /en/ ]
│   ├── 1.1 Hero Section (Sovereign Positioning & Dynamic Bio-Visual)
│   ├── 1.2 Holding Strategic Narrative Hook (Vision & Mission)
│   ├── 1.3 Ecosystem Showcase (Interactive 7-Subsidiary Value Chain Matrix)
│   ├── 1.4 Infrastructure & Quantitative Scale Counters (Proof Engine)
│   ├── 1.5 Highlights & Strategic Press (Curated Milestones)
│   └── 1.6 B2B Engagement Banner & Corporate Inquiry Trigger
│
├── 2.0 About Rahnab (درباره ما) ──────────────────── [ /about/ ] & [ /en/about/ ]
│   ├── 2.1 Corporate Brand Story (Scrollytelling Genesis & Expansion)
│   ├── 2.2 Strategic Pillars & Mission/Vision
│   ├── 2.3 Governance & Leadership (Board of Directors & Executive Committee)
│   ├── 2.4 Scientific & Industrial Infrastructure (Bioreactors & Cleanrooms)
│   ├── 2.5 Institutional Video Presentation & Facility Walkthrough
│   └── 2.6 Accreditations, Regulatory Seals & Downloadable Corporate Kit
│
├── 3.0 Subsidiary Companies (شرکت‌های زیرمجموعه) ── [ /companies/ ] & [ /en/companies/ ]
│   ├── 3.1 Value Chain Taxonomy Filter (All, R&D, Plasma, Cell Therapy, Sera, Fill-Finish, Export)
│   ├── 3.2 Portfolio Grid Showcase (7 High-Tech Operating Subsidiaries)
│   └── 3.3 Individual Subsidiary Profiles (Dedicated Permalinks & In-Page Drawers):
│       ├── 3.3.1 Persis Gene ────────────────── [ /companies/persis-gene/ ]
│       ├── 3.3.2 Nozhin Zist Pharmed ────────── [ /companies/nozhin-zist-pharmed/ ]
│       ├── 3.3.3 Padra Serum Alborz ─────────── [ /companies/padra-serum/ ]
│       ├── 3.3.4 KarayaKhteh ────────────────── [ /companies/karayakhteh/ ]
│       ├── 3.3.5 Tamin Plasma Nozhin ────────── [ /companies/tamin-plasma/ ]
│       ├── 3.3.6 Al Salam ───────────────────── [ /companies/al-salam/ ]
│       └── 3.3.7 Baya Zist Pharmed ──────────── [ /companies/baya-zist-pharmed/ ]
│
├── 4.0 News & Events (اخبار و رویدادها) ─────────── [ /news/ ] & [ /en/news/ ]
│   ├── 4.1 Filterable Category Navigation (All, Rahnab News, Subsidiary News, Events, Exhibitions, Achievements)
│   ├── 4.2 Featured Press Release & Editorial Highlights
│   ├── 4.3 Paginated News Archive Grid (Searchable, Filterable by Category & Date)
│   └── 4.4 Single Article Editorial View ─────── [ /news/{slug}/ ] & [ /en/news/{slug}/ ]
│       ├── Headline, Subtitle, Author, Publication Timestamp
│       ├── Long-form Typographic Body & Inline Quote Styling
│       ├── Media Gallery & Document Attachments
│       └── Related Press Releases & Subsidiary Cross-Links
│
├── 5.0 Contact Us (تماس با ما) ──────────────────── [ /contact/ ] & [ /en/contact/ ]
│   ├── 5.1 Central Institutional Channels (Email, Switchboard Phone, LinkedIn)
│   ├── 5.2 Headquarters Location Visualizer (Interactive Leaflet Map: NIGEB Floor 3, Unit 302)
│   ├── 5.3 Departmental Directory & Operating Hours
│   └── 5.4 Secure B2B Partnership Inquiry Form (Validated, CSRF Nonce Protected)
│
└── 6.0 Utility & Legal Endpoints
    ├── 6.1 Privacy & Legal Governance ───────── [ /privacy-policy/ ] & [ /en/privacy-policy/ ]
    ├── 6.2 Terms of Corporate Use ───────────── [ /terms/ ] & [ /en/terms/ ]
    └── 6.3 404 Error Page (Editorial Branded) ── [ /404 ] & [ /en/404 ]
```

---

## 3. Navigation Hierarchy & User Experience Mechanics

### 3.1 Primary Desktop Navigation: The Floating Glassmorphic Pill
Inspired by modern architectural benchmarks (CinnaGen, Roivant, Flagship), the primary desktop navigation floats over the visual canvas, maintaining a minimal vertical profile:

```text
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│ [LOGO: RAHNAB PHARMED]  │  صفحه اصلی   درباره ما   شرکت‌های زیرمجموعه   اخبار و رویدادها   تماس با ما  │  [FA / EN]  [تماس با هلدینگ] │
└──────────────────────────────────────────────────────────────────────────────────────────────────┘
```
- **RTL Arrangement:** Corporate Logo on the far right; 5 primary menu items centered; Language switcher and persistent "Corporate Inquiries" CTA button on the far left.
- **LTR Arrangement:** Perfectly mirrored: Logo on the far left; 5 menu items centered; Language switcher and CTA on the far right.
- **Glassmorphic Substrate:** `backdrop-blur-md bg-white/70 dark:bg-black/40 border border-black/10 dark:border-white/15 rounded-2xl`. On scroll down, the container gracefully compresses by 10px and increases backdrop opacity to maintain contrast over dynamic page imagery.

### 3.2 Subsidiary Mega-Dropdown / Portfolio Drawer
Hovering or clicking on "شرکت‌های زیرمجموعه / Subsidiary Companies" triggers an elegant, multi-column flyout preview:
- **Left Column (Context):** One-sentence group summary: «اکوسیستم یکپارچه زیست‌دارویی متشکل از ۷ شرکت تخصصی» with a direct link to the full `/companies/` overview.
- **Center & Right Columns (Portfolio Links):** Two columns listing all seven subsidiaries with their official brandmarks, display titles, and value-chain badges (e.g., «پرسیس ژن — شتاب‌دهنده تخصصی زیست‌فناوری»).

### 3.3 Mobile Navigation Drawer
- Triggered via a thumb-accessible hamburger button (min 48x48px touch target).
- Opens a full-screen vertical navigation sheet with smooth GSAP staggered link reveals.
- Prominent language toggle at the bottom alongside direct phone and email tap-to-call links.

---

## 4. URL Structure & Slug Conventions

All URLs follow strict SEO-friendly, RESTful, and semantic standards:

| Page / Template | Persian Route (Default) | English Route | Content Type |
|:---|:---|:---|:---|
| **Home** | `/` (or `/fa/`) | `/en/` | Static Front Page (`front-page.php`) |
| **About Us** | `/about/` | `/en/about/` | Custom Template (`page-about.php`) |
| **Subsidiaries Directory** | `/companies/` | `/en/companies/` | CPT Archive (`archive-company.php`) |
| **Persis Gene Profile** | `/companies/persis-gene/` | `/en/companies/persis-gene/` | Single CPT (`single-company.php`) |
| **Nozhin Zist Profile** | `/companies/nozhin-zist-pharmed/` | `/en/companies/nozhin-zist-pharmed/` | Single CPT (`single-company.php`) |
| **Padra Serum Profile** | `/companies/padra-serum/` | `/en/companies/padra-serum/` | Single CPT (`single-company.php`) |
| **KarayaKhteh Profile** | `/companies/karayakhteh/` | `/en/companies/karayakhteh/` | Single CPT (`single-company.php`) |
| **Tamin Plasma Profile** | `/companies/tamin-plasma/` | `/en/companies/tamin-plasma/` | Single CPT (`single-company.php`) |
| **Al Salam Profile** | `/companies/al-salam/` | `/en/companies/al-salam/` | Single CPT (`single-company.php`) |
| **Baya Zist Profile** | `/companies/baya-zist-pharmed/` | `/en/companies/baya-zist-pharmed/` | Single CPT (`single-company.php`) |
| **News & Events Archive** | `/news/` | `/en/news/` | Standard Archive (`archive.php`) |
| **Single News Article** | `/news/{sanitized-slug}/` | `/en/news/{sanitized-slug}/` | Single Post (`single.php`) |
| **Contact Us** | `/contact/` | `/en/contact/` | Custom Template (`page-contact.php`) |

*URL Slug Rule:* All slugs remain strictly in English Latin characters (`/companies/persis-gene/`) across both Persian and English locales. This prevents ugly URL percent-encoding in sharing, protects SEO canonical links, and guarantees consistent permalinks.

---

## 5. Page-by-Page Content & Functional Architecture

### 5.1 Page 1: Home (`front-page.php`)
- **Block 1: Hero Section:**
  - Full-viewport height (`min-h-screen`).
  - Background: Subtle kinetic biomolecular node network (WebGL or high-performance video loop).
  - Editorial Typography: Monumental headline asserting Rahnab’s holding leadership.
  - Interactive Action: Primary CTA button «کشف شرکت‌های زیرمجموعه» (smooth-scrolls to portfolio) + Secondary «ارتباط با هلدینگ» (routes to contact).
  - Quantitative Proof Strip: 4 animated metric counters (7 High-Tech Ventures, 150,000L Fractionation, >70% Antivenom Supply, National Biosecurity).
- **Block 2: The Holding Narrative Hook:**
  - Asymmetric 2-column layout: Left column sticky corporate mission; right column 3 concise narrative pillars (Capital, Scientific Infrastructure, Self-Sufficiency).
- **Block 3: The 7-Subsidiary Ecosystem Portfolio:**
  - The centerpiece of the homepage.
  - Interactive filter tabs by Value Chain role (All, Incubation, Plasma, Cell Therapy, Sera, Fill-Finish, Regional Trade).
  - 7 interactive cards featuring logo, company title, therapeutic focus, and quick-reveal drawer trigger.
- **Block 4: Strategic Infrastructure & Scientific Proof:**
  - Visual showcase of pilot cleanrooms, heavy fractionation tanks, and TUMS cell therapy labs.
  - Official GMP and IFDA accreditation seals.
- **Block 5: Strategic Highlights & Editorial News:**
  - 3 curated cards linking to major holding milestones and press releases.
- **Block 6: Institutional Inquiry CTA Banner:**
  - High-contrast banner inviting B2B partners, investors, and scientists to engage with Rahnab Group.

---

### 5.2 Page 2: About Rahnab (`page-about.php`)
- **Block 1: Editorial Vision Manifesto:**
  - Opening manifesto declaring Rahnab's role in advancing national biotechnology.
- **Block 2: Scrollytelling Corporate History (The Narrative Timeline):**
  - Pin-scrolled chronological timeline (Foundation -> Venture Investments -> Infrastructure Construction -> National Milestones).
- **Block 3: Strategic Pillars & Core Values:**
  - 4 foundational pillars: Innovation, Scaled Biomanufacturing, Human Capital, Global Regulatory Standards.
- **Block 4: Governance & Leadership Directory:**
  - Structured roster of the Board of Directors and Executive Committee (Portrait, Name, Title, Bio, LinkedIn).
- **Block 5: Scientific & Manufacturing Infrastructure Showcase:**
  - High-res photo gallery of Sepehr fractionation plant, NIGEB facilities, and Safadasht bioprocessing lines.
- **Block 6: Corporate Film / Video Presentation:**
  - Embedded high-definition corporate film with custom micro-interaction playback controls.
- **Block 7: Downloadable Fact Sheet & Accreditations:**
  - High-resolution regulatory badge vault + direct PDF download button for the official Holding Fact Sheet.

---

### 5.3 Page 3: Subsidiary Companies Overview (`archive-company.php`)
- **Block 1: Ecosystem Overview Header:**
  - Clear narrative explaining how Rahnab’s seven subsidiaries operate as an integrated life-science value chain.
- **Block 2: Interactive Value Chain Taxonomy Filter:**
  - Live filtering without page reload (`all`, `incubation`, `plasma`, `cell-therapy`, `antivenom`, `bioprocessing`, `regional-export`).
- **Block 3: Dynamic 7-Entity Grid:**
  - Auto-fit responsive grid (`repeat(auto-fit, minmax(340px, 1fr))`).
  - Cards provide complete summary data, verified brandmark, and "مشاهده پروفایل کامل" action.
- **Block 4: Downstream & Upstream Synergies Diagram:**
  - Visual infographics showing plasma flowing from Tamin Plasma to Nozhin Zist, and molecules flowing from Persis Gene to Baya Zist.

---

### 5.4 Page 4: Single Subsidiary Profile (`single-company.php`)
- **Header Section:**
  - High-resolution facility hero cover photo.
  - Official brandmark, official Persian & English legal names, foundation year, and location badge.
  - Direct outbound button to external website (with secure external link icon).
- **Core Corporate Narrative:**
  - Full overview of the company’s mission, legal nature, and role within Rahnab Group.
- **Key Capabilities & Technological Specifications:**
  - 3–4 structured metric cards (e.g., annual capacity, cleanroom square meters, bioreactor types).
- **Therapeutic Areas & Active Product Portfolio:**
  - Grid of commercialized or in-pipeline therapies (e.g., *ImmunoJine*, *AlbuJine*, *SnaFab*, *CARTIMED*).
- **Facility & Cleanroom Photography Gallery:**
  - High-res lightbox photo gallery of authentic manufacturing and laboratory spaces.
- **Regulatory Accreditations & Quality Badges:**
  - Scans and badges of GMP, ISO, and Knowledge-Based enterprise certifications.
- **Direct Subsidiary Contact:**
  - Office address, central phone, corporate email, and map location.

---

### 5.5 Page 5: News & Events Archive (`archive.php`)
- **Header & Category Filter Bar:**
  - Categories: All, Rahnab News, Subsidiary News, Events, Exhibitions, Achievements.
- **Featured Article Hero:**
  - Large horizontal card highlighting the latest high-impact corporate announcement.
- **Editorial Post Grid:**
  - 3-column responsive card layout with publication timestamp, category pill, featured thumbnail, title, and excerpt.
- **Pagination Controls:**
  - Accessible, numerical AJAX pagination / "بارگذاری موارد بیشتر" (Load More).

---

### 5.6 Page 6: Single News Article (`single.php`)
- **Article Header:**
  - Category pill, publication date (Solar Hijri & Gregorian), reading time estimate, and social share triggers.
  - High-contrast editorial display headline.
- **Featured Visual:**
  - Full-width high-resolution photo with caption.
- **Long-Form Body Typography:**
  - Calibrated line length (65–75 characters per line) for optimal reading comfort.
  - Rich text formatting: blockquotes, inline images, subheadings, and data tables.
- **Related Press & Subsidiary Links:**
  - Cross-promotional cards linking back to the relevant subsidiary profile and 2 related news articles.

---

### 5.7 Page 7: Contact Us (`page-contact.php`)
- **Block 1: Central Contact Directory:**
  - Phone: `021-49361200` (click-to-call).
  - Email: `info@rahnab.com` (click-to-mail).
  - LinkedIn: Official corporate profile link.
  - Physical Address: NIGEB, 3rd Floor, Unit 302, Pajoohesh Blvd, Tehran.
- **Block 2: Interactive Campus Map:**
  - Leaflet.js interactive map centered on NIGEB coordinates (`35.7483° N, 51.1834° E`) with custom corporate pin styling.
- **Block 3: Comprehensive B2B Inquiries Form:**
  - Name, Corporate Email, Phone Number, Company Name, Job Title, Subject Dropdown, Message Body.
  - CSRF protection, honeypot anti-spam, and accessible validation feedback.
- **Block 4: Departmental Inquiries & Visiting Protocols:**
  - Guidelines for scheduling institutional visits to NIGEB headquarters and Sepehr refinery.

---

## 6. Portfolio Extensibility Architecture

A key architectural mandate (Req R3) is ensuring the system can scale effortlessly beyond the initial 7 subsidiaries:

```text
EXTENSIBILITY MECHANICS:
1. Fluid CSS Grid System:
   The UI uses `grid-template-columns: repeat(auto-fit, minmax(320px, 1fr))` rather than
   rigid 3-column fixed frameworks. Adding an 8th, 9th, or 12th company flows into the layout
   naturally without orphan spaces or layout breakage.

2. Dynamic WordPress Custom Post Type ('company'):
   Portfolio items are driven entirely by database queries (`WP_Query(['post_type' => 'company'])`).
   Content managers can publish a new subsidiary in the WordPress dashboard without touching
   a single line of PHP, CSS, or template code.

3. Dynamic Taxonomy Faceting:
   The filter tabs on `/companies/` query active taxonomy terms dynamically. If a new business
   vertical is introduced (e.g., "Medical Devices" or "Nanotechnology"), assigning it to a new
   subsidiary automatically renders the new filter tab.

4. Decoupled Navigation Architecture:
   The main header mega-menu automatically fetches active companies via a cached Walker/transient,
   ensuring navigation remains synchronized with the portfolio database.
```

---

## 7. WordPress CMS Content Model & Template Hierarchy

In accordance with `.agents/skills/html-to-classic-wp/SKILL.md` and `.agents/rules/wordpress-development.md`, presentation is strictly separated from data:
- **Presentation:** Controlled entirely by the Custom Classic WordPress Theme.
- **Data Entities:** Registered via a dedicated companion plugin (`rahnab-core-entities.php`) ensuring zero data loss upon theme switching.

### 7.1 Entity & Post Type Schema Summary

| Entity | WordPress Post Type | Primary Purpose | Taxonomy Associations | Key Custom Meta Fields |
|:---|:---|:---|:---|:---|
| **Subsidiary Company** | `company` | Profiles for the 7 ventures + future additions | `therapeutic_area`, `activity_model` | Legal Name, Logos, Website URL, Capacity Metrics, Products Repeater, Gallery |
| **News & Milestone** | `post` (or `news_event`) | Press releases, exhibitions, and achievements | `category` (or `news_category`) | Subtitle, External Press URL, Related Company Relationship |
| **Leadership Member** | `team_member` | Executive Board and management profiles | `governance_tier` | English Name, Academic Degree, Executive Role, Bio, Portrait, LinkedIn |
| **Accreditation / Badge** | `accreditation` | GMP, ISO, and Knowledge-Based certificates | `certification_body` | Certificate Scans, License Number, Expiry Date |

### 7.2 WordPress Template Hierarchy Mapping

```text
WordPress Template Hierarchy for Rahnab Theme
├── front-page.php           -> Renders Homepage (Section 5.1)
├── page-about.php           -> Custom Page Template for 'about' slug (Section 5.2)
├── archive-company.php      -> Custom Post Type Archive for 'company' (Section 5.3)
├── single-company.php       -> Single Post Template for individual subsidiary (Section 5.4)
├── archive.php / category.php-> News & Events listing (Section 5.5)
├── single.php               -> Single News & Event article view (Section 5.6)
├── page-contact.php         -> Custom Page Template for 'contact' slug (Section 5.7)
├── 404.php                  -> Branded, editorial 404 error page
├── header.php               -> Global HTML head, skip-links, floating glassmorphic nav
├── footer.php               -> Global 4-column directory footer, legal notices, schemas
└── template-parts/
    ├── card-company.php     -> Reusable company overview card component
    ├── card-news.php        -> Reusable editorial news card component
    ├── drawer-company.php   -> In-page interactive subsidiary reveal drawer
    └── section-trust.php    -> Quantitative counters and accreditation badges
```

---
*Authored and forensically validated by Milestone 0 Synthesis Team (`worker_m0_synthesis`) for the official project records.*
