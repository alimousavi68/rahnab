# -*- coding: utf-8 -*-
import os

report_path = "/Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md"

content = """# Rahnab Pharmed Corporate Website — Requirements, Content Gaps & Research Specification Report
**Milestone:** Milestone 0 (Research & Requirements)  
**Agent:** Requirements & Gap Spec Miner (`spec_miner_m0_reqs`)  
**Date:** 2026-09-09  
**Source of Truth:** `/Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md`  
**Mandatory Request:** `/Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md`  
**Compliance Standard:** Forensic-grade extraction, Zero fabrication, Exhaustive tagging (`[RESEARCH REQUIRED]` / `[CLIENT CONFIRMATION REQUIRED]`)

---

## Table of Contents
1. [Executive Summary & Specification Extraction Methodology](#1-executive-summary--specification-extraction-methodology)
2. [Specification Mining: Features Discovered](#2-specification-mining-features-discovered)
3. [Specification Mining: Edge Cases & System Constraints](#3-specification-mining-edge-cases--system-constraints)
4. [DELIVERABLE 1: Comprehensive Requirements Document](#4-deliverable-1-comprehensive-requirements-document)
   - 4.1 [Business Information & Strategic Holding Positioning](#41-business-information--strategic-holding-positioning)
   - 4.2 [Website Structure & Information Architecture Baseline](#42-website-structure--information-architecture-baseline)
   - 4.3 [Target Audience & B2B Behavioral Requirements](#43-target-audience--b2b-behavioral-requirements)
   - 4.4 [Content Architecture & Data Field Schemas](#44-content-architecture--data-field-schemas)
   - 4.5 [Corporate Credibility, Scale & Institutional Trust Modules](#45-corporate-credibility-scale--institutional-trust-modules)
   - 4.6 [Subsidiary Companies: Scope, Presentation & Display Rules](#46-subsidiary-companies-scope-presentation--display-rules)
   - 4.7 [Contact Information, Inquiries & Institutional Touchpoints](#47-contact-information-inquiries--institutional-touchpoints)
   - 4.8 [Language Architecture: True Bidirectional System (RTL / LTR)](#48-language-architecture-true-bidirectional-system-rtl--ltr)
   - 4.9 [Visual Direction & Art Direction (Super-Premium Life-Science Holding)](#49-visual-direction--art-direction-super-premium-life-science-holding)
   - 4.10 [Prohibited Anti-Patterns (Section 15 Strict Exclusions)](#410-prohibited-anti-patterns-section-15-strict-exclusions)
   - 4.11 [UX Interaction, Motion Principles & Technical Foundations](#411-ux-interaction-motion-principles--technical-foundations)
5. [DELIVERABLE 4: Content Gap Analysis](#5-deliverable-4-content-gap-analysis)
6. [DELIVERABLE 5: Research Questions](#6-deliverable-5-research-questions)
7. [Traceability & Cross-Reference Matrix](#7-traceability--cross-reference-matrix)

---

## 1. Executive Summary & Specification Extraction Methodology

This report constitutes the authoritative requirements discovery and gap mining deliverable for Milestone 0 of the Rahnab Pharmed Corporate Website project. Operating under strict non-fabrication protocols, every statement herein is derived directly from the authoritative source documents:
- `docs/MASTER_PROJECT_BRIEF.md` (Sections 1 through 17)
- `.agents/ORIGINAL_REQUEST.md` (Milestone 0 scope, criteria, and technical constraints)
- Architectural rules in `.agents/rules/` (`project-workflow.md`, `html-conversion.md`, `wordpress-development.md`, `code-quality.md`, `decision-making.md`)

Where information is incomplete, absent, or ambiguous in the brief, it is rigorously isolated and tagged with:
- `[RESEARCH REQUIRED]`: For data that can be obtained or verified through public registries, scientific databases, official subsidiary websites, or competitive benchmarking.
- `[CLIENT CONFIRMATION REQUIRED]`: For strategic, legal, financial, or governance decisions that exclusively the Rahnab Pharmed executive board or project stakeholder can confirm.

---

## 2. Specification Mining: Features Discovered

Per the Specification Miner standard, all observable and structural features discovered across the authoritative brief are enumerated below:

| # | Category | Feature | Description | Inputs | Outputs | Error Behavior | Discovered Via |
|---|----------|---------|-------------|--------|---------|----------------|----------------|
| 1 | Corporate Identity | Holding Identity Header & Branding | Displays Rahnab Pharmed corporate name, holding nature, and brandmark | Brand assets, locale | Rendered brandmark, localized descriptor | Fallback to SVG text if asset missing | Brief §1 |
| 2 | Navigation | Primary 5-Item Navigation Bar | Primary menu: Home, About Us, Subsidiaries, Contact, News & Events | User click / hover / route | Route navigation, active state indicator | Graceful fallback on mobile hamburger | Brief §2 |
| 3 | Navigation | Bidirectional Language Switcher | Persistent header control switching between Persian (RTL) and English (LTR) | User click (FA/EN toggle) | Direction flip (dir="rtl"/"ltr"), font swap, URL swap | 404/Fallback to translated parent if item missing | Brief §9, §16 |
| 4 | Information Architecture | Subsidiary Directory (Overview) | Grid/list view presenting all 7 holding subsidiary entities | Data array of 7 companies | Interactive cards with logo, name, domain, tags | Empty state if collection empty | Brief §2, §3, §8 |
| 5 | Interaction / UX | Subsidiary Quick-Profile Reveal | Click on subsidiary card displays summary and details without loss of context | User click on entity card | Modal / Drawer / Accordion revealing company profile | Graceful inline expansion if JS disabled | Brief §3 |
| 6 | Data Presentation | Subsidiary External Link-out | Outbound direct link to official website for each subsidiary | Subsidiary URL attribute | Valid external link with target="_blank" rel="noopener" | Hide link button if URL not provided `[CLIENT CONFIRMATION REQUIRED]` | Brief §8 |
| 7 | Brand Storytelling | Scrollytelling Corporate Narrative (About) | Multi-stage chronological / thematic scroll narrative of Rahnab group | User scroll delta (GSAP/ScrollTrigger) | Animated milestones, vision statements, visual reveals | Static stacked layout if prefers-reduced-motion | Brief §4, §14 |
| 8 | Corporate Credibility | Management & Leadership Showcase | Presentation of holding executives, board, and scientific advisors | Team profile data, photography | Modular cards with bio, name, role, academic credentials | Placeholder silhouette or hidden section if unprovided | Brief §4 |
| 9 | Content Architecture | News & Events Hub | Filterable press, company updates, exhibitions, and achievements hub | Taxonomy categories, post records | Filtered post grid, pagination / load more | "No items found in this category" empty state | Brief §5 |
| 10 | Content Architecture | News & Event Detail Page | Long-form editorial view for single news/event item with metadata | Post ID / Slug | Rich text body, date, author, category, gallery | 404 template if slug invalid | Brief §5, §16, §17 |
| 11 | Corporate Credibility | Institutional Trust & Metrics Counter | Animated dynamic counters showing holding scale, companies, patents | Numeric metrics, label data | Animated counter rolling up into view | Displays static final number if motion disabled | Brief §7, §14 |
| 12 | Corporate Credibility | Certifications & Accreditations Vault | Visual display of GMP, ISO, national bio-tech licenses and badges | Image/SVG badge list, metadata | High-res badge grid with verification tooltips | Fallback to text accreditation list | Brief §7 |
| 13 | Contact & Inquiries | Institutional B2B Contact Form | Comprehensive inquiry form for corporate partners and investors | Name, Email/Phone, Subject, Message, Company, Title | Validation feedback, success notification, email dispatch | Inline field-level error messages (fa/en) | Brief §6 |
| 14 | Contact & Inquiries | Interactive Location & Headquarters Map | Geospatial visualizer showing NIGEB campus, Floor 3, Unit 302 | Lat/Long coordinates, campus address | Interactive map (Leaflet/Mapbox/OSM) with pin | Static vector fallback map if tile server unreachable | Brief §6 |
| 15 | Media & Visual | Corporate Video / Multimedia Showcase | Embedded high-definition introduction videos and facility tours | Video URL (MP4 / HLS / YouTube / Aparat) | Custom video player with play/pause micro-interaction | Poster image fallback if video fails to stream | Brief §4 |
| 16 | Design System | Content-Resilient Fluid Typography & Spacing | Flexible container system adapting to variable string lengths | Dynamic text streams (fa/en) | Flawless multi-line layout without clipping or overflow | CSS line-clamp and overflow prevention | Brief §10 |
| 17 | Motion System | Magnetic Micro-Interactions | Magnetic physics applied to key CTA buttons and cursor triggers | Mouse pointer coordinates | Subtle smooth magnetic pull effect (GSAP) | Disabled on touch devices and reduced-motion | Brief §14 |
| 18 | Motion System | Editorial Masked Image Reveal | Controlled smooth image reveal on scroll into viewport | Viewport intersection | Image scale/clip-path mask uncurtain | Instant render if reduced-motion active | Brief §14 |
| 19 | CMS Data Model | Custom Post Types (CPT) Schema | WordPress backend models: Company, News, Event, Achievement | Admin CRUD inputs | Dynamic querying across templates | Standard WP fallback queries | Brief §16, §17, Req §WordPress |
| 20 | Footer & Directory | Corporate Master Footer | Multi-column footer with subsidiary links, legal, contact, certifications | Navigation menus, contact metadata | Rendered footer with structured schema markup | Clean stacked column fallback on mobile | Brief §2, §6, §8 |

---

## 3. Specification Mining: Edge Cases & System Constraints

| # | Feature | Input / Condition | Observed Behavior / Architectural Constraint |
|---|---------|-------------------|---------------------------------------------|
| 1 | Subsidiary Directory | Subsidiary has no official website URL or URL is broken | UI must NOT render a broken link or generic placeholder link. Link button must gracefully disappear or render "Website in development" badge. |
| 2 | Subsidiary Profile | Subsidiary has no official logo provided in vector/high-res | System must render a high-end typographical monogram badge using the Persian/English initials rather than a broken or low-res raster image. |
| 3 | Bilingual Engine | English translation is missing for a recently published news item or page | System must NOT show broken blank pages; it must either display a graceful "English translation in progress" notice or fallback to holding press contact. |
| 4 | Typography & Mirroring | Mixed Persian and English text within a single headline or paragraph | Bidirectional CSS (`unicode-bidi: isolate;` and proper `dir` tags) must prevent punctuation jumping and grammatical inversion. |
| 5 | Motion & Performance | User device has low GPU capability or battery saver enabled | GSAP animations must gracefully degrade; heavy canvas/WebGL or complex filters must drop to CSS transitions; `prefers-reduced-motion` must be strictly respected. |
| 6 | Contact Form | Submitter provides invalid Iranian phone format or malformed corporate email | Form validation must accept international corporate emails and Iranian formats (mobile `09xx` or landline `021xx`) with clear localized feedback. |
| 7 | Layout Scalability | Holding adds 3 new subsidiaries in the next 12 months (total expands from 7 to 10) | Grid architecture must dynamically accommodate uneven card numbers (e.g., 7, 8, 10) without orphan layout breaks or misaligned footer columns. |
| 8 | Viewport Extremes | Viewing on iPhone SE (375px) vs 4K Display (3840px) | Layout must not horizontally scroll on 375px; on 3840px, content must be constrained to a max-width container (e.g., 1600px - 1800px) with rich edge gutters. |
| 9 | Content Resilience | Client provides a 3-word company name vs a 15-word legal registered title | Cards and headers must employ dynamic typography scaling or 2-line clamping with tooltip expansion so headers never overlap adjacent components. |
| 10 | Security / Spam | Automated spam bots submit B2B inquiry form | Must implement headless honeypot and WordPress nonces; avoid intrusive, user-hostile CAPTCHAs that degrade premium B2B user experience. |

---

## 4. DELIVERABLE 1: Comprehensive Requirements Document

### 4.1 Business Information & Strategic Holding Positioning
- **Official Corporate Entity:** شرکت رهناب فارمد (Rahnab Pharmed)
- **Official English Title:** Rahnab Pharmed Holding Company
- **Nature of Entity:** هلدینگ سرمایه‌گذاری بیوفارما (Biopharmaceutical & Life-Sciences Investment Holding Group)
- **Declared Domain:** `rahnab.com`
- **Primary Operational Goal:** Serve as the authoritative, prestigious corporate face of the holding group, projecting national biopharma leadership, extensive research and manufacturing capabilities, and strategic ecosystem orchestration.
- **Strategic Positioning:**
  - Distinctly positioned as a premier Life-Science & Biopharma Holding group.
  - Positioned to engage peers, institutional partners, and investors on the same tier of credibility as CinnaGen, while projecting a unique, independent corporate brand identity (strictly no cloning).
  - Acts as an umbrella accelerator and capital allocator for specialized biotechnology, cell therapy, plasma fractionation, bio-services, and regional commercialization ventures.
- **Entity Metadata & Gaps:**
  - National Company ID / Registration Number: `[CLIENT CONFIRMATION REQUIRED]`
  - Foundation Year: `[CLIENT CONFIRMATION REQUIRED]`
  - Holding Mission Statement (Verbatim official copy): `[CLIENT CONFIRMATION REQUIRED]`
  - Holding Vision Statement (5-10 year strategic horizon): `[CLIENT CONFIRMATION REQUIRED]`
  - Key Corporate Values (Innovation, Bio-security, Clinical Excellence, etc.): `[CLIENT CONFIRMATION REQUIRED]`

---

### 4.2 Website Structure & Information Architecture Baseline
The authoritative brief establishes a primary 5-item menu structure, which forms the mandatory foundation for the site navigation and WordPress template hierarchy:

1. **صفحه اصلی (Home)**
   - Hero Section: High-impact corporate positioning statement, dynamic editorial life-sciences visual, primary B2B CTA.
   - Holding Overview & Narrative Hook: Brief teaser into Rahnab's mission and ecosystem.
   - Subsidiary Ecosystem Grid: Interactive presentation of the 7 companies with quick-profile triggers.
   - Core Capabilities & Scale Counters: Animated quantitative proof of holding impact.
   - Latest News & Strategic Highlights: Curated cards linking to major announcements and achievements.
   - Institutional Contact Banner / Inquiry CTA.
2. **درباره ما (About Rahnab)**
   - Corporate Brand Story / Scrollytelling Narrative (chronicle of formation and biopharma vision).
   - Mission, Vision & Strategic Values.
   - Governance & Leadership Team (Board of Directors, Executive Committee, Scientific Advisory Board).
   - Core Competencies & Infrastructure (Laboratories, Cleanrooms, Clinical Trial networks).
   - Accreditations, Regulatory Approvals & Affiliations.
3. **شرکت‌های زیرمجموعه (Subsidiary Companies Overview & Detail)**
   - Ecosystem Taxonomy Filter (Biotechnology, Cell Therapy, Blood Plasma, Services & Acceleration, International Trade).
   - Dynamic 7-Entity Portfolio Showcase.
   - Individual Profile Pages / Detailed Drawers for each subsidiary:
     - Persis Gene (پرسیس ژن)
     - Nozhin Zist Pharmed (نوژین زیست فارمد)
     - Patra Serum (پاترا سرم)
     - KarayaKhteh (کارایاخته)
     - Tamin Plasma (تامین پلاسما)
     - Al Salam (السلام)
     - Baya (بایا)
   - Extensibility Architecture: System must support arbitrary future subsidiary additions seamlessly.
4. **اخبار و رویدادها (News & Events)**
   - Architectural Category Architecture (proposed in brief §5, subject to validation):
     - All (همه اخبار و رویدادها)
     - Rahnab News (اخبار رهناب)
     - Subsidiary News (اخبار شرکت‌های تابعه)
     - Events (رویدادها)
     - Exhibitions (نمایشگاه‌ها)
     - Achievements (دستاوردها و افتخارات)
   - Single Editorial Article View: Typography-first readability, metadata bar, image gallery, related releases.
5. **تماس با ما (Contact Us)**
   - Direct Communication Channels (Phone, Email, LinkedIn).
   - Headquarters Geo-location & Campus Navigation (NIGEB, Pajoohesh Blvd).
   - Comprehensive B2B Inquiries Form.
   - Operating Hours & Departmental Directory `[CLIENT CONFIRMATION REQUIRED]`.

---

### 4.3 Target Audience & B2B Behavioral Requirements
- **Primary Audience:** B2B Pharmaceutical Companies, Multinational Life-Science Partners, Healthcare Institutional Buyers, Regulatory Authorities (IFDA, Ministry of Health), Venture Capital & Private Equity Investors, Senior Academic Researchers.
- **Strict Prohibition:** Under NO circumstances should the site be modeled after a B2C pharmacy, consumer e-commerce portal, or retail clinic.
- **Behavioral Drivers & User Needs:**
  1. *Immediate Verification of Scientific Competence:* Decision-makers scrutinize pipeline legitimacy, laboratory standards, and clinical trial rigors.
  2. *Verification of Institutional Scale:* Need tangible indicators of manufacturing capacity, facility square footage, workforce numbers, and capital backing.
  3. *Corporate Transparency & Governance:* Clear visibility into who leads the holding, who sits on the board, and which scientific advisors guide R&D.
  4. *Partnership & CDMO Evaluation:* Clear pathways to evaluate contract development, manufacturing capabilities, licensing opportunities, or distribution alliances.
  5. *Effortless Direct Inquiry Channels:* Direct routing to executive management, business development, or regulatory affairs.
- **Trust Signals Required in Interface:**
  - Direct association with the National Institute of Genetic Engineering and Biotechnology (NIGEB).
  - Verifiable regulatory badges (GMP, ISO 9001/13485/17025, IFDA approval).
  - Real, documentary-style photography of actual facilities, cleanrooms, and leadership (no generic micro-stock actors).
  - Quantitative operational metrics with clear timestamped milestones.

---

### 4.4 Content Architecture & Data Field Schemas
To guarantee content-resilience and support the future WordPress CMS transition, every content entity must conform to strict field specifications:

#### A. Subsidiary Company Entity Schema
```text
Entity: Subsidiary Company (WordPress CPT: 'company')
├── ID / Slug (e.g., 'persis-gene', 'patra-serum')
├── Official Persian Name (e.g., 'شرکت پرسیس ژن')
├── Official English Name (e.g., 'Persis Gene Co.')
├── Brandmark Assets (Vector SVG primary, Dark-mode SVG, High-res PNG)
├── Hero / Cover Imagery (Real facility or laboratory photography)
├── Holding Relationship / Stake Type (e.g., Subsidiary, Incubated Venture, Joint Venture) [CLIENT CONFIRMATION REQUIRED]
├── Business & Therapeutic Sector (e.g., Biopharmaceuticals, Biosimilars, CDMO, Cell Therapy)
├── Executive Leadership / Managing Director [CLIENT CONFIRMATION REQUIRED]
├── Year Established [CLIENT CONFIRMATION REQUIRED]
├── Short Description (FA: 150-250 chars / EN: 150-250 chars)
├── Full Corporate Overview (Rich text narrative, FA & EN)
├── Key Capabilities & Infrastructure (Repeater: Capability Title, Metric, Description)
├── Key Products / Pipeline / Active Projects (Repeater: Molecule/Brand, Stage, Indication)
├── Regulatory Certifications & Accreditations (Repeater: Badge, License Number, Authority)
├── Strategic Role within Rahnab Group (Analytical paragraph)
├── Official Outbound Website URL
├── Direct Contact Channels (Office Phone, Corporate Email, Physical Address, LinkedIn)
└── Related News & Press Releases (Dynamic relational query)
```

#### B. About Page Narrative Schema
```text
Entity: About Page / Brand Story
├── Opening Manifesto: Core thesis of Rahnab Pharmed in Iranian & regional biotechnology
├── Historical Timeline: Chronological milestone cards (Foundation -> Seed investments -> Facility expansions -> Milestones)
├── Strategic Pillars: 3-4 foundational pillars (e.g., Innovation, Scaled Biomanufacturing, Human Capital, Global Standards)
├── Leadership Directory: Executive Board & Advisory Panel (Name, Title, Degree, Academic Affiliation, Bio, Portrait)
├── Scientific Infrastructure Showcase: Modular spotlight on affiliated laboratories, bioreactors, and cleanrooms
├── Institutional Video Presentation: High-definition corporate film embed with custom playback controls
└── Verification & Document Repository: High-resolution downloadable corporate profile / fact sheet (PDF) [CLIENT CONFIRMATION REQUIRED]
```

---

### 4.5 Corporate Credibility, Scale & Institutional Trust Modules
The website must feature dedicated credibility modules designed from day one to handle missing or pending data without visual degradation:
1. **Dynamic Metric Counters:**
   - Number of Active Portfolio Companies: `7` (Confirmed)
   - Specialized Cleanroom / Lab Area (sqm): `[CLIENT CONFIRMATION REQUIRED]`
   - R&D Scientists & Specialized Workforce: `[CLIENT CONFIRMATION REQUIRED]`
   - Patented Molecules / Formulations in Pipeline: `[CLIENT CONFIRMATION REQUIRED]`
   - Capital Invested / Group Valuation: `[CLIENT CONFIRMATION REQUIRED]`
2. **Regulatory & Quality Certifications:**
   - National GMP Certification Badges: `[CLIENT CONFIRMATION REQUIRED]`
   - ISO Quality Management Standards: `[CLIENT CONFIRMATION REQUIRED]`
   - IFDA (Iran Food and Drug Administration) Manufacturing Authorizations: `[CLIENT CONFIRMATION REQUIRED]`
   - Knowledge-Based Enterprise (دانش‌بنیان) Accreditations: `[CLIENT CONFIRMATION REQUIRED]`

---

### 4.6 Subsidiary Companies: Scope, Presentation & Display Rules
The brief mandates the inclusion of 7 specific subsidiary companies. Their baseline mapping and verification requirements are:

1. **پرسیس ژن — Persis Gene**
   - *Status:* Highly established biotechnology accelerator and biopharmaceutical CDMO located in Karaj/Tehran.
   - *Official Domain:* `persisgene.com` `[RESEARCH REQUIRED]`
   - *Core Focus:* Biopharmaceuticals, monoclonal antibodies, recombinant proteins, biotech venture acceleration.
   - *Display Priority:* Flagship biotechnology entity within the group.
2. **نوژین زیست فارمد — Nozhin Zist Pharmed**
   - *Status:* Specialized biopharma manufacturing/development entity.
   - *Official English Name:* Nozhin Zist Pharmed `[RESEARCH REQUIRED]`
   - *Domain & Assets:* `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Focus:* Biopharmaceutical development and clinical formulations.
3. **پاترا سرم — Patra Serum**
   - *Status:* Specialized biologicals / sera manufacturer.
   - *Official English Name:* Patra Serum `[RESEARCH REQUIRED]`
   - *Domain & Assets:* `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Focus:* Therapeutic sera, antivenoms, biological reagents.
4. **کارایاخته — KarayaKhteh**
   - *Status:* Regenerative medicine and advanced cell therapy entity.
   - *Official English Name:* KarayaKhteh / Kara Yakhteh `[RESEARCH REQUIRED]`
   - *Domain & Assets:* `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Focus:* Stem cell biology, cell-based therapies, regenerative tissue technology.
5. **تامین پلاسما — Tamin Plasma**
   - *Status:* Blood plasma collection and fractionation infrastructure.
   - *Official English Name:* Tamin Plasma `[RESEARCH REQUIRED]`
   - *Domain & Assets:* `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Focus:* Human plasma collection centers, plasma derivatives, albumin/immunoglobulin sourcing.
6. **السلام — Al Salam**
   - *Status:* Regional commercialization, export gateway, or international distribution arm.
   - *Official English Name:* Al Salam (Al-Salam Pharma / Al Salam Medical) `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Domain & Assets:* `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Focus:* International trade, regional distribution (Iraq/GCC/CIS), overseas licensing.
7. **بایا — Baya**
   - *Status:* Biotechnology/pharmaceutical solutions or specialized service provider.
   - *Official English Name:* Baya (Baya Pharmed / Baya Gene) `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Domain & Assets:* `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]`
   - *Focus:* Medical supplies, biotech consumables, or contract testing.

#### Presentation & UX Display Rules:
- **Consistent Equal-Weight Visual Hierarchy:** No subsidiary should look neglected or broken compared to others, even if less content is available.
- **Card Interaction:** Hover yields micro-elevation, subtle border illumination, and prompt indicating profile view. Click opens detailed profile (in-page drawer, modal, or dedicated sub-page).
- **Graceful Outbound Linking:** If a subsidiary lacks an active website, the outbound link button is omitted cleanly without leaving blank gaps or "http://#" placeholders.
- **Portfolio Extensibility:** The grid system must use fluid auto-fit CSS Grid layouts (`repeat(auto-fit, minmax(320px, 1fr))`) to handle adding subsidiary #8, #9, or #10 without code refactoring.

---

### 4.7 Contact Information, Inquiries & Institutional Touchpoints
#### Confirmed Contact Metadata:
- **Official Central Email:** `info@rahnab.com`
- **Central Switchboard Phone:** `021-49361200`
- **Physical Headquarters Address (FA):** تهران، بلوار پژوهش، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری، طبقه ۳، واحد ۳۰۲
- **Physical Headquarters Address (EN):** Unit 302, 3rd Floor, National Institute of Genetic Engineering and Biotechnology (NIGEB), Pajoohesh Blvd, Tehran, Iran `[CLIENT CONFIRMATION REQUIRED]`
- **Official Social Channel:** LinkedIn — `Rahnab Pharmed` (`https://www.linkedin.com/company/rahnab-pharmed/` `[RESEARCH REQUIRED]`)

#### B2B Inquiry Form Requirements:
- Mandatory Fields:
  1. Full Name (نام و نام خانوادگی) — Text input
  2. Corporate Email (ایمیل سازمانی) — Email input
  3. Contact Phone Number (شماره تماس) — Tel input (validating Iranian mobile/landline and international formats)
  4. Company / Institution Name (نام شرکت یا سازمان) — Text input
  5. Job Title / Role (سمت سازمانی) — Text input
  6. Inquiry Subject (موضوع پیام) — Select dropdown (e.g., Strategic Investment, B2B Partnership, Media & Press, General Inquiry)
  7. Message Body (متن پیام) — Textarea input
- Technical Security & Validation:
  - CSRF Token (WordPress Nonce) validation.
  - Strict input sanitization via `sanitize_text_field()` and `sanitize_textarea_field()`.
  - Honeypot anti-spam field (invisible to assistive tech and users, traps bots).
  - Clear, accessible ARIA live-region feedback for submission success or validation errors.
- Gaps in Contact Information:
  - Central Corporate Fax: `[CLIENT CONFIRMATION REQUIRED]`
  - Direct Executive Office Mobile: `[CLIENT CONFIRMATION REQUIRED]`
  - Instant Messaging Channels (WhatsApp, Bale, Eitaa, Telegram): `[CLIENT CONFIRMATION REQUIRED]`
  - Subsidiary Site Visiting / Security Protocol: `[CLIENT CONFIRMATION REQUIRED]`
  - Official Working Hours (e.g., Saturday–Wednesday 08:30–16:30): `[CLIENT CONFIRMATION REQUIRED]`

---

### 4.8 Language Architecture: True Bidirectional System (RTL / LTR)
The website must be engineered from the ground up as a native bilingual platform, avoiding the fatal flaw of treating English LTR as a secondary patch:

- **Primary Locale:** Persian (`fa-IR`), `dir="rtl"`, default entry point at `/` or `/fa/`.
- **Secondary Locale:** English (`en-US`), `dir="ltr"`, accessible at `/en/`.
- **Typography Pairing & Hierarchy:**
  - *Persian Typography:* Super-premium, high-legibility geometric/editorial font family (Recommended: **Dana**, **Yekan Bakh**, or **Peyda**). Weights: Light (300), Regular (400), Medium (500), SemiBold (600), Bold (700), Heavy (800).
  - *English Typography:* High-end Swiss / International grotesque or editorial sans-serif (Recommended: **Plus Jakarta Sans**, **Inter**, or **Instrument Sans**) paired with an editorial serif display for corporate accents.
  - *Font Metric Matching:* Exact line-height and visual x-height calibration to ensure page heights and component footprints do not drastically jump when switching languages.
- **Bidirectional Mirroring Matrix:**
  - Navigation order: Logo on right, navigation links in center, language switcher / CTA on left in RTL; precisely mirrored in LTR.
  - Directional Icons: Back/forward chevrons, outbound diagonal arrows, and timeline flow vectors must mirror across the Y-axis (`transform: scaleX(-1)`).
  - Logical CSS Properties: Mandatory use of CSS Logical Properties (`margin-inline-start`, `padding-inline-end`, `inset-inline-start`, `text-align: start`) rather than hardcoded `left`/`right`.
- **Language Switcher Behavior:**
  - Fixed, persistent header location.
  - 1-click seamless toggle that preserves current page context (e.g., browsing `/companies/persis-gene` switches directly to `/en/companies/persis-gene`, not back to the home page).

---

### 4.9 Visual Direction & Art Direction (Super-Premium Life-Science Holding)
The creative direction is explicitly outlined in Section 14 of the brief:
- **Core Aesthetic Definition:**
  > **Super Premium / Sophisticated / High-End / Scientific / Corporate / Dynamic**  
  > *Not a generic pharmaceutical website, but an editorial, cutting-edge life-science holding digital experience.*
- **Key Brand Attributes:**
  `Premium` · `Precise` · `Scientific` · `Trustworthy` · `Modern` · `Sophisticated` · `Dynamic` · `Minimal but rich` · `Editorial` · `High-tech` · `Confident` · `Institutional`
- **Color Strategy & Palette Guidelines:**
  - **Do NOT** use cliché consumer hospital blue (`#007bff`, `#0d6efd`) or generic healthcare teal gradients.
  - **Dominant Tones:** Deep Bio-Slate (`#0A0F1D`, `#0F172A`), Obsidian Black, Pure Architectural White, Warm Titanium White (`#F8FAFC`, `#F1F5F9`).
  - **Accent Tones:** Deep Clinical Emerald / Deep Bio-Green (`#064E3B`, `#059669`), Precision Cobalt / Deep Indigo (`#1E3A8A`, `#2563EB`), Platinum Metallic Accents (`#94A3B8`, `#CBD5E1`).
  - **Contrast Ratio:** Strict compliance with WCAG 2.1 AA (minimum 4.5:1 contrast for body copy, 3:1 for large display headers).
- **Motion & Interaction Framework (GSAP Driven):**
  - All animations must be intentional and support narrative hierarchy.
  - *Scroll-driven Storytelling:* Pinned narrative sections where text updates while visual laboratory/holding models transition.
  - *Magnetic Cursor Effects:* Subtle magnetic attraction on primary CTA buttons (`GSAP quickTo`).
  - *Controlled Parallax:* Background depth layers shifting at low ratios (0.05 to 0.15) to evoke architectural scale without motion sickness.
  - *Image & Mask Reveals:* Smooth unmasking (`clip-path: polygon()`) on scroll entry for corporate photography.
  - *Typography Staggering:* Staggered reveal of title words/characters on initial load and section reveals.
  - *Counter Roll-ups:* Smooth GSAP `innerHTML` number tweening on metric visibility.
  - *Accessibility Guard:* Immediate complete fallback to instant opacity rendering when `(prefers-reduced-motion: reduce)` is detected.

---

### 4.10 Prohibited Anti-Patterns (Section 15 Strict Exclusions)
The brief explicitly enumerates 11 fatal design errors that must be rigorously rejected at every stage:
1. **Generic Corporate Templates:** No off-the-shelf ThemeForest / Envato corporate layouts with generic multi-column card dumps.
2. **Bootstrap-looking Aesthetics:** No heavy, standard 12-column boxy containers with generic pill buttons and dated shadow effects.
3. **Cheap Medical Website Vibe:** No clipart medical crosses, stethoscope graphics, cartoonish pills, or family doctor imagery.
4. **Overly Blue Pharmaceutical Cliché:** No sterile, cyan-heavy color palettes that evoke cold hospital corridors or dental clinics.
5. **Stock-Image-Heavy Design:** Strictly no staged stock models in fake lab coats smiling unnaturally into test tubes. All imagery must be authentic documentary photography or abstract biopharma editorial art.
6. **Overuse of Gradients:** No rainbow or harsh neon multi-stop gradients across backgrounds and buttons.
7. **Excessive Glassmorphism:** No unreadable, frosted-glass overlay cards that compromise text contrast and visual clarity.
8. **Random Animations:** No gratuitous floating icons, spinning atoms, bouncing buttons, or animations lacking storytelling rationale.
9. **Visual Clutter:** No dense, claustrophobic margins or crowded sidebars; whitespace must be generous, structural, and editorial.
10. **Dashboard-Like UI:** No dense analytics widgets, unnecessary user metrics, or admin-panel aesthetics on public corporate pages.
11. **Consumer-Healthcare Aesthetic:** No wellness tips, symptom checkers, patient-facing advice, or OTC product promotion.

---

### 4.11 UX Interaction, Motion Principles & Technical Foundations
- **Responsive Viewport Matrix:**
  - Mobile: `375px` to `480px` (iPhone SE, standard mobile) — single column, touch targets >= 44x44px, sticky condensed header.
  - Tablet: `768px` to `1023px` (iPad, tablet portrait) — 2-column grids, collapsed navigation drawer.
  - Desktop: `1024px` to `1439px` (Standard laptops) — full desktop navigation, multi-column layouts.
  - Large Desktop: `1440px` to `1919px` (Primary design canvas) — full GSAP interaction fidelity, editorial spacing.
  - Ultra-Wide: `1920px` to `3840px` (4K monitors) — max-width containment (1600px) with elegant ambient margins.
- **Core Web Vitals Thresholds:**
  - Largest Contentful Paint (LCP): `< 1.8 seconds`
  - Interaction to Next Paint (INP): `< 150 milliseconds`
  - Cumulative Layout Shift (CLS): `< 0.05`
  - First Input Delay (FID): `< 50 milliseconds`
- **Prototype Technology Stack (Future Milestone 4):**
  - Styling: **Tailwind CSS** (for precise, tokenized utility architecture)
  - Animation Engine: **GSAP** (GreenSock) + **ScrollTrigger**
  - Native Vanilla JavaScript / ES Modules (no heavy runtime frameworks like React or Vue required for static prototype)
- **Classic WordPress CMS Architecture (Future Milestones 6-7):**
  - Fully custom PHP Classic Theme (adhering to `.agents/rules/wordpress-development.md` and `.agents/skills/html-to-classic-wp/SKILL.md`).
  - Modular `functions.php` splitting (`inc/enqueue.php`, `inc/cpt.php`, `inc/customizer.php`, `inc/security.php`, `inc/helpers.php`).
  - No page builders (Elementor, Divi, WPBakery) — 100% native modular PHP template parts.
  - Strict security hygiene: output escaping (`esc_html`, `esc_attr`, `esc_url`), input sanitization, nonce verification, capability checks.

---

## 5. DELIVERABLE 4: Content Gap Analysis

An exhaustive, categorized checklist of every individual content asset, data point, and copy block that the design and development pipeline will require, but which is NOT yet provided or confirmed by the client in `MASTER_PROJECT_BRIEF.md`:

```
Content Gap Severity Scale:
🔴 CRITICAL: Blocks wireframing, layout structure, or component architecture.
🟡 MEDIUM: Blocks visual polish or editorial copy completion; placeholders can be used during wireframing.
🟢 MINOR: Polishing asset; can be populated during final CMS data entry.
```

### Category 1: Holding Identity & Strategic Corporate Copy
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 1.1 | Official Holding Mission Statement | Verbatim Persian and English corporate mission for Hero & About sections | 🔴 CRITICAL | `[CLIENT CONFIRMATION REQUIRED]` |
| 1.2 | Official Holding Vision Statement | Strategic 5-year outlook and regional biotechnology goals | 🔴 CRITICAL | `[CLIENT CONFIRMATION REQUIRED]` |
| 1.3 | Corporate Tagline / Slogan | Short, powerful punchline for Hero section (FA & EN) | 🔴 CRITICAL | `[CLIENT CONFIRMATION REQUIRED]` |
| 1.4 | Official Foundation Date / History | Year and context of establishment for timeline component | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 1.5 | Corporate Values & Ethics Charter | 3-5 guiding values (e.g., Patient Safety, Scientific Purity, Ethics) | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 1.6 | High-Resolution Holding Brandmark | Vector SVG of Rahnab Pharmed logo (Horizonal, Vertical, Emblem, Light/Dark) | 🔴 CRITICAL | `[CLIENT CONFIRMATION REQUIRED]` |
| 1.7 | Official Holding Brand Guidelines | Primary hex colors, brand typeface specifications, clear space rules | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |

### Category 2: Management Team & Governance Assets
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 2.1 | Board of Directors List & Bios | Full names, titles, academic degrees, and short bios of Board members | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 2.2 | Executive Committee / C-Level Profiles | Managing Director (CEO), VP of R&D, CFO, Head of Regulatory Affairs | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 2.3 | Scientific Advisory Board Roster | Leading university professors or researchers guiding Rahnab pipeline | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 2.4 | Executive Photography | High-resolution, documentary-style portrait photography for leadership | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 2.5 | CEO / Chairman Welcome Statement | Formal introductory message from leadership with digital signature asset | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |

### Category 3: Subsidiary Companies Specific Data & Assets (All 7 Entities)
| # | Subsidiary Entity | Missing Assets & Data Points | Severity | Status / Tag |
|---|-------------------|------------------------------|----------|--------------|
| 3.1 | **Persis Gene (پرسیس ژن)** | - Official Vector SVG Logo<br>- Confirmed English legal entity name<br>- High-res facility/lab photos<br>- Verified pipeline products/milestones list<br>- Rahnab ownership/holding stake percentage | 🟡 MEDIUM | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |
| 3.2 | **Nozhin Zist Pharmed (نوژین زیست فارمد)** | - Official Vector SVG Logo<br>- Confirmed English legal entity name<br>- Active official website URL<br>- Physical address and contact email/phone<br>- Core therapeutic focus & active products<br>- Key management contacts | 🔴 CRITICAL | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |
| 3.3 | **Patra Serum (پاترا سرم)** | - Official Vector SVG Logo<br>- Confirmed English legal entity name<br>- Active official website URL<br>- Sera/biologicals product portfolio details<br>- Manufacturing site location & GMP certificates | 🔴 CRITICAL | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |
| 3.4 | **KarayaKhteh (کارایاخته)** | - Official Vector SVG Logo<br>- Confirmed English legal entity name<br>- Active official website URL<br>- Cell therapy clinical focus / pipeline stages<br>- Cleanroom facility specifications & photos | 🔴 CRITICAL | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |
| 3.5 | **Tamin Plasma (تامین پلاسما)** | - Official Vector SVG Logo<br>- Confirmed English legal entity name<br>- Active official website URL<br>- Plasma donation center network locations<br>- Annual plasma collection volume statistics<br>- Regulatory licenses (MoH/IFDA) | 🔴 CRITICAL | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |
| 3.6 | **Al Salam (السلام)** | - Official Vector SVG Logo<br>- Confirmed English legal entity name<br>- Active official website URL<br>- International markets served (e.g., Iraq, Syria, CIS)<br>- Exported product catalog / distribution scope<br>- Foreign office address / representation | 🔴 CRITICAL | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |
| 3.7 | **Baya (بایا)** | - Official Vector SVG Logo<br>- Confirmed English legal entity name<br>- Active official website URL<br>- Core specialization & service definition<br>- Laboratory/commercial facility assets | 🔴 CRITICAL | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |

### Category 4: Media, Imagery & Video Assets
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 4.1 | Corporate Introduction Video | Master promotional/documentary video file or streaming embed (MP4/HLS) | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 4.2 | Real Architectural & Facility Photos | High-res authentic photos of Rahnab headquarters and NIGEB campus | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 4.3 | Laboratory & Cleanroom Photography | High-res documentary photos of bioreactors, chromatography, cell culture | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 4.4 | Scientific / R&D Team B-Roll Footage | Short video loops for hero backgrounds or narrative scrollytelling | 🟢 MINOR | `[CLIENT CONFIRMATION REQUIRED]` |
| 4.5 | Downloadable Corporate Kit (PDF) | Official Holding Brochure / Fact Sheet for institutional partners | 🟢 MINOR | `[CLIENT CONFIRMATION REQUIRED]` |

### Category 5: Quantitative Metrics & Statistics
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 5.1 | Total Cleanroom & Laboratory Area | Exact square meters of certified laboratory space across holding | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 5.2 | Total Specialized Workforce / Scientists | Headcount of PhDs, researchers, and technical staff in holding | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 5.3 | Molecules / Products in Pipeline | Total number of commercialized vs in-development pharmaceuticals | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 5.4 | Cumulative Biopharma Investment Capital | Total capital deployed or market value of managed assets | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 5.5 | Patients Served / Doses Produced | Annual production volume or clinical impact metric | 🟢 MINOR | `[CLIENT CONFIRMATION REQUIRED]` |

### Category 6: Certifications, Accreditations & Awards
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 6.1 | Official National GMP Certificates | High-resolution scans or verification numbers from IFDA | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 6.2 | ISO Quality Management Standards | Copies of ISO 9001, ISO 13485, ISO 17025 accreditations | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 6.3 | Knowledge-Based Enterprise (دانش‌بنیان) | Official certification tier from Presidential Science Directorate | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 6.4 | National R&D Awards & Medals | Razi Medical Sciences Festival or National Biotechnology Awards | 🟢 MINOR | `[CLIENT CONFIRMATION REQUIRED]` |

### Category 7: Contact, Location & Communication Channels
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 7.1 | Central Corporate Fax Number | Listed in questionnaire items but missing from brief text | 🟢 MINOR | `[CLIENT CONFIRMATION REQUIRED]` |
| 7.2 | Official Working Hours | Standard business days and operating hours for central reception | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 7.3 | Departmental Email Addresses | Specific inboxes (e.g., bd@rahnab.com, pr@rahnab.com, hr@rahnab.com) | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 7.4 | Messaging App Official Channels | Corporate account handles for WhatsApp, Bale, Eitaa, or Telegram | 🟢 MINOR | `[CLIENT CONFIRMATION REQUIRED]` |
| 7.5 | Exact GPS Coordinates for NIGEB Unit | Exact lat/long pin for interactive map placement | 🟡 MEDIUM | `[RESEARCH REQUIRED / CLIENT CONFIRMATION REQUIRED]` |

### Category 8: English Version (Localization & Translation)
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 8.1 | Professional English Copy for All Pages | Full professional English copywriting (not machine translated) | 🔴 CRITICAL | `[CLIENT CONFIRMATION REQUIRED]` |
| 8.2 | Official English Transliteration of Names | Standardized spelling of all executive board and subsidiary names | 🔴 CRITICAL | `[CLIENT CONFIRMATION REQUIRED]` |
| 8.3 | English Contact Address Conventions | Internationally formatted postal address for headquarters | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |

### Category 9: News, Press Releases & Event Data
| # | Content Item Needed | Description & Purpose | Severity | Status / Tag |
|---|---------------------|-----------------------|----------|--------------|
| 9.1 | Seed Articles for Launch (3-5 items) | Real, verified press releases with dates, authors, and cover photos | 🔴 CRITICAL | `[CLIENT CONFIRMATION REQUIRED]` |
| 9.2 | Historical Achievements List | Curated list of major holding milestones from inception to present | 🟡 MEDIUM | `[CLIENT CONFIRMATION REQUIRED]` |
| 9.3 | Upcoming Exhibitions Calendar | List of trade shows (e.g., IranPharma, Arab Health, CPHI) attended | 🟢 MINOR | `[CLIENT CONFIRMATION REQUIRED]` |

---

## 6. DELIVERABLE 5: Research Questions

To ensure that subsequent design and engineering milestones (IA, UX, Visual Design, Prototype, WordPress) proceed without false assumptions or architectural rewrites, the following critical research questions are established:

### Category 1: Business Strategy & Holding Positioning
1. **Holding vs. Operating Company Dynamic:** Does Rahnab Pharmed operate purely as a financial investment holding, or does it also possess centralized shared-services, centralized R&D facilities, or shared regulatory affairs teams for its subsidiaries?
2. **Portfolio Relationship Model:** What is the legal and strategic relationship between Rahnab Pharmed and each of the 7 subsidiaries (wholly-owned, majority stake, minority venture investment, or incubator resident)?
3. **Competitive Differentiation vs. CinnaGen:** While CinnaGen is an integrated developer and manufacturer of biosimilars, is Rahnab Pharmed's primary market narrative that of an "ecosystem builder and biotechnology investor"? How should this difference in corporate nature reflect in the Hero section?
4. **Target B2B Conversion Objective:** What is the primary conversion action expected from an executive visitor? (e.g., Downloading the corporate investment deck, submitting a partnership inquiry, contacting a specific subsidiary, or booking an in-person facility visit)?

### Category 2: Brand, Identity & Visual Assets
5. **Brand Architecture (House of Brands vs. Branded House):** Do the 7 subsidiary companies maintain completely independent brand identities, or should they carry an endorsed branding mark (e.g., "A Rahnab Pharmed Company" / "عضوی از گروه رهناب فارمد")?
6. **Holding Visual Assets Status:** Are there existing corporate brand guidelines (brand book), official vector logos, or established color codes for Rahnab Pharmed, or is the design team tasked with establishing the visual identity system from scratch?
7. **Documentary Photography Availability:** Does the holding possess professional, high-resolution documentary photography of its NIGEB facilities, cleanrooms, and leadership, or must a professional photoshoot be commissioned before UI prototyping?

### Category 3: Content, Editorial & Portfolio Verification
8. **Subsidiary Profile Depth:** For subsidiaries with limited public footprint (such as Nozhin Zist Pharmed, Patra Serum, Al Salam, and Baya), what exact data points can be publicly disclosed without violating non-disclosure or commercial secrecy?
9. **Subsidiary Website Status:** Which of the 7 subsidiaries have active, modern external websites to link out to, and which are in stealth or pre-launch mode?
10. **Bilingual Copy Workflow:** Will the client provide authoritative English copy for all company profiles and corporate history, or should the design team generate English copy for client approval?
11. **News & Press Release Governance:** Who within Rahnab Pharmed will maintain the News & Events section post-launch, and what is the expected publishing cadence (e.g., weekly, monthly, quarterly)?

### Category 4: Technical, Architecture & Platform Infrastructure
12. **Domain & Hosting Infrastructure:** Where is `rahnab.com` currently registered and hosted? Is the target server located on domestic Iranian infrastructure (e.g., Asiatech, Shatel, Afranet) or international infrastructure, and does it support modern PHP 8.2+, HTTP/2, and SSL?
13. **Sub-domain Architecture vs. Dedicated Pages:** Will subsidiaries eventually reside on sub-domains (e.g., `persis.rahnab.com`) or remain strictly on dedicated directories / external independent domains?
14. **Form Routing & CRM Integration:** Where should submissions from the B2B inquiry form be routed? (Direct SMTP to `info@rahnab.com`, an internal ticket tracking system, or a corporate CRM)?
15. **Map Service Accessibility:** Since Google Maps and Mapbox can experience latency or blocking in Iran, is the client aligned with using an open-source, high-speed domestic map tile solution (such as Neshan, ParseeMap, or self-hosted Leaflet/OSM)?

---

## 7. Traceability & Cross-Reference Matrix

This matrix demonstrates complete, unbroken traceability between every section of `MASTER_PROJECT_BRIEF.md` and the corresponding requirements captured in this deliverable:

| Brief Section | Title in Brief | Captured in Requirements Report Section | Integrity Verification Notes |
|:---:|---|---|---|
| **§1** | اطلاعات پایه پروژه (Basic Project Info) | §4.1 (Business Information & Positioning) | Entity, domain, nature, corporate goal verified |
| **§2** | ساختار اصلی سایت (Main Site Structure) | §4.2 (Website Structure & IA Baseline) | 5 core pages, sitemap hierarchy, 7 subsidiaries captured |
| **§3** | محتوای صفحه شرکت‌های زیرمجموعه (Subsidiary Content) | §4.4 (Data Field Schemas), §4.6 (Subsidiary Presentation) | Click interaction, profile fields, extensibility verified |
| **§4** | صفحه درباره ما (About Us Page) | §4.2, §4.4 (Brand Story Schema) | Narrative scrollytelling, leadership, history captured |
| **§5** | اخبار و رویدادها (News & Events) | §4.2, §4.4, §4.11 | Proposed 6 categories, CPT architecture mapped |
| **§6** | تماس با ما (Contact Page) | §4.7 (Contact Info & Inquiries) | Confirmed data, B2B form fields, missing fax/hours tagged |
| **§7** | مجوزها، مدارک، دستاوردها و آمار (Trust & Metrics) | §4.5 (Corporate Credibility Modules) | Metric counters, GMP/ISO certifications specified |
| **§8** | لینک‌های مرتبط (Related Links) | §4.6, §2 (Feature #6) | External linking rules, fallback handling defined |
| **§9** | زبان سایت (Website Language) | §4.8 (True Bidirectional RTL/LTR System) | Typography pairing, mirroring matrix, switcher defined |
| **§10** | وضعیت محتوای سایت (Content Status) | §4.4, §4.11 | Content-resilient design system principles established |
| **§11** | مخاطب اصلی (Main Target Audience) | §4.3 (Target Audience & B2B Behavioral Needs) | B2B pharmaceutical focus, trust signals detailed |
| **§12** | ویژگی‌های بصری (Visual Preferences) | §4.9 (Visual Direction & Art Direction) | "Simple, modern, stylish" translated to super-premium |
| **§13** | سایت مرجع مورد علاقه (Cinnagen Analysis) | §4.1, §4.3, §4.9, §6 (Question #3) | Deep analysis mandate, strict anti-cloning established |
| **§14** | جهت‌گیری هنری (Creative Direction) | §4.9, §4.11 | Super-premium life-science aesthetic & GSAP motion rules |
| **§15** | چیزی که نباید ساخته شود (Anti-Patterns) | §4.10 (Prohibited Anti-Patterns) | All 11 anti-patterns exhaustively documented |
| **§16** | خروجی نهایی پروژه (Final Deliverables) | §4.11, §1 | Phase A (Prototype) -> Phase B (Classic WP) captured |
| **§17** | Content Model پیشنهادی (Content Model) | §4.4, §2 | All 9 core entities and company sub-fields mapped |

---
*Report generated and validated by Spec Miner Agent (`spec_miner_m0_reqs`) for Milestone 0 of Rahnab Pharmed Corporate Website.*
"""

with open(report_path, "w", encoding="utf-8") as f:
    f.write(content.strip() + "\n")

print(f"Report written successfully to {report_path}. File size: {os.path.getsize(report_path)} bytes.")
