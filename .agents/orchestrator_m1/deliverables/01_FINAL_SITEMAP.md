# DELIVERABLE 01: Final Sitemap & Hierarchical Routing Architecture
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-IA-M1-01`  
**Classification:** Enterprise Information Architecture & Routing Specification  
**Author:** Milestone 1 Architecture Author (`worker_m1_author`)  
**Status:** Approved Architectural Blueprint  
**Target Locale:** Dual Language (Persian `fa-IR` RTL Default | English `en-US` LTR Secondary)  
**Constraint Level:** Architectural Specification (Zero PHP Implementation Code)  

---

## 1. Complete Website Hierarchy Tree

The information architecture of Rahnab Pharmed (`rahnab.com`) is organized to present an institutional, sovereign life-science holding group. It structures the 7 core subsidiaries into an integrated vertical biomanufacturing ecosystem while providing dedicated corporate governance, media, and institutional partnership touchpoints.

```text
RAHNAB PHARMED GLOBAL HIERARCHICAL SITEMAP
│
├── 1.0 Home (صفحه اصلی) ────────────────────────────────────────── [ / ] & [ /en/ ]
│   ├── 1.1 Hero Vision & Molecular Dynamic Stage
│   ├── 1.2 Holding Strategic Narrative & Sovereign Mission
│   ├── 1.3 Integrated Biomanufacturing Flow Matrix (7 Subsidiaries)
│   ├── 1.4 National Scale, Infrastructure & Quantitative Proof Engine
│   ├── 1.5 Strategic Milestones, Scientific Achievements & Press
│   └── 1.6 Institutional B2B Engagement Gateway
│
├── 2.0 About Rahnab (درباره رهناب) ───────────────────────────────── [ /about/ ] & [ /en/about/ ]
│   ├── 2.1 Corporate Genesis & Interactive Historical Timeline
│   ├── 2.2 Strategic Pillars, Mission & 10-Year Biotech Horizon
│   ├── 2.3 Governance & Executive Leadership ───────────────────── [ /about/governance/ ] & [ /en/about/governance/ ]
│   │   ├── Board of Directors (هیئت‌مدیره)
│   │   ├── Executive Management Committee (کمیته اجرایی)
│   │   └── Scientific & Advisory Council (شورای عالی علمی و راهبردی)
│   ├── 2.4 Industrial & Research Infrastructure ────────────────── [ /about/infrastructure/ ] & [ /en/about/infrastructure/ ]
│   │   ├── NIGEB Headquarters & Specialized Incubation Suites
│   │   ├── Sepehr Industrial Plasma Fractionation Complex (150kL)
│   │   ├── Safadasht Downstream Purification & Fill-Finish Plant
│   │   └── Specialized Biological QC Laboratories
│   ├── 2.5 Institutional Facility Video Tour & Cleanroom Presentation
│   └── 2.6 Corporate Dossier & Fact Sheet Downloads ────────────── [ /compliance/ ] & [ /en/compliance/ ]
│
├── 3.0 Subsidiary Companies (شرکت‌های زیرمجموعه) ─────────────────── [ /subsidiaries/ ] & [ /en/subsidiaries/ ]
│   ├── 3.1 Value-Chain Cluster Taxonomy Navigation:
│   │   ├── Cluster 1: R&D, Acceleration & Incubation ───────────── [ /subsidiaries/cluster/rd-incubation/ ]
│   │   ├── Cluster 2: Biological Sourcing & Plasma Collection ──── [ /subsidiaries/cluster/source-plasma/ ]
│   │   ├── Cluster 3: Industrial Plasma Fractionation ──────────── [ /subsidiaries/cluster/plasma-fractionation/ ]
│   │   ├── Cluster 4: Advanced ATMP Cell & Gene Immunotherapy ──── [ /subsidiaries/cluster/cell-therapy/ ]
│   │   ├── Cluster 5: Hyperimmune Sera & Critical Biologicals ──── [ /subsidiaries/cluster/hyperimmune-sera/ ]
│   │   ├── Cluster 6: Downstream Chromatography & Fill-Finish ──── [ /subsidiaries/cluster/fill-finish/ ]
│   │   └── Cluster 7: Biological Quality Control & Bioassays ───── [ /subsidiaries/cluster/quality-control/ ]
│   │
│   ├── 3.2 Canonical Single Subsidiary Profile Pages:
│   │   ├── 3.2.1 Persis Gene ───────────────────────────────────── [ /subsidiaries/persis-gene/ ] & [ /en/subsidiaries/persis-gene/ ]
│   │   ├── 3.2.2 Nozhin Zist Pharmed ───────────────────────────── [ /subsidiaries/nozhin-zist-pharmed/ ] & [ /en/subsidiaries/nozhin-zist-pharmed/ ]
│   │   ├── 3.2.3 Padra Serum Alborz ────────────────────────────── [ /subsidiaries/padra-serum/ ] & [ /en/subsidiaries/padra-serum/ ]
│   │   ├── 3.2.4 KarayaKhteh / CARTIMED ────────────────────────── [ /subsidiaries/karayakhteh/ ] & [ /en/subsidiaries/karayakhteh/ ]
│   │   ├── 3.2.5 Tamin Plasma Nozhin ───────────────────────────── [ /subsidiaries/tamin-plasma/ ] & [ /en/subsidiaries/tamin-plasma/ ]
│   │   ├── 3.2.6 Baya Zist Pharmed ─────────────────────────────── [ /subsidiaries/baya-zist-pharmed/ ] & [ /en/subsidiaries/baya-zist-pharmed/ ]
│   │   └── 3.2.7 Arc Zist Azma ─────────────────────────────────── [ /subsidiaries/arc-zist-azma/ ] & [ /en/subsidiaries/arc-zist-azma/ ]
│   │
│   └── 3.3 Inter-Company Upstream/Downstream Synergies Engine
│
├── 4.0 News & Events Hub (اخبار و رویدادها) ─────────────────────── [ /news-events/ ] & [ /en/news-events/ ]
│   ├── 4.1 Filterable Category Taxonomies:
│   │   ├── Holding Corporate News ──────────────────────────────── [ /news-events/category/holding-news/ ]
│   │   ├── Subsidiary Milestones ───────────────────────────────── [ /news-events/category/subsidiary-milestones/ ]
│   │   ├── Scientific & Clinical Breakthroughs ─────────────────── [ /news-events/category/scientific-breakthroughs/ ]
│   │   ├── Regulatory Approvals & Quality Statements ───────────── [ /news-events/category/regulatory-statements/ ]
│   │   └── Industry Events, Exhibitions & Congresses ───────────── [ /news-events/category/events-exhibitions/ ]
│   ├── 4.2 Cross-Entity Relationship Archives:
│   │   └── Articles Tagged by Subsidiary Entity ────────────────── [ /news-events/entity/{subsidiary-slug}/ ]
│   ├── 4.3 Featured Milestone Releases & Paginated Archive Grid
│   └── 4.4 Canonical Single Article & Event Page ───────────────── [ /news-events/{slug}/ ] & [ /en/news-events/{slug}/ ]
│
├── 5.0 Contact & Institutional Relations (تماس با ما) ───────────── [ /contact/ ] & [ /en/contact/ ]
│   ├── 5.1 Central Communications (Email, Phone Switchboard, LinkedIn)
│   ├── 5.2 Headquarters Campus Geospatial Map (NIGEB Floor 3, Unit 302)
│   ├── 5.3 Departmental Routing (Partnerships, Investor Relations, Regulatory, Careers)
│   ├── 5.4 Secure Enterprise Inquiry Form (CSRF Guarded & Field Sanitized)
│   └── 5.5 Institutional Visiting Protocols ────────────────────── [ /contact/visiting-protocols/ ]
│
└── 6.0 Governance, Legal & Utility Endpoints
    ├── 6.1 Regulatory Compliance & Accreditations Vault ─────────── [ /compliance/ ] & [ /en/compliance/ ]
    ├── 6.2 Privacy Policy & Corporate Data Governance ───────────── [ /privacy-policy/ ] & [ /en/privacy-policy/ ]
    ├── 6.3 Terms of Corporate Engagement ────────────────────────── [ /terms/ ] & [ /en/terms/ ]
    ├── 6.4 XML Sitemap Index & Search Directives ────────────────── [ /sitemap.xml ] & [ /robots.txt ]
    └── 6.5 Branded Editorial 404 Experience ─────────────────────── [ /404 ] & [ /en/404 ]
```

---

## 2. RESTful Latin URL Slug Specifications

To eliminate encoding artifacts across Persian social platforms, enterprise email servers, and search engine indexers, **all URL paths and query slugs use Latin characters exclusively** in both Persian and English locales.

| Logical Page Route | Persian URL (RTL Default) | English URL (LTR Secondary) | Template Mapping | Canonical Rule & SEO Metadata |
|:---|:---|:---|:---|:---|
| **Holding Homepage** | `https://rahnab.com/` | `https://rahnab.com/en/` | `front-page.php` | Root canonical; `hreflang="fa-IR"` and `hreflang="en-US"` |
| **About Holding** | `https://rahnab.com/about/` | `https://rahnab.com/en/about/` | `page-about.php` | Bi-directional `hreflang` link to paired post |
| **Corporate Governance** | `https://rahnab.com/about/governance/` | `https://rahnab.com/en/about/governance/` | `page-governance.php` | Hierarchical child of `/about/` |
| **Industrial Infrastructure** | `https://rahnab.com/about/infrastructure/` | `https://rahnab.com/en/about/infrastructure/` | `page-infrastructure.php` | Hierarchical child of `/about/` |
| **Regulatory & Compliance** | `https://rahnab.com/compliance/` | `https://rahnab.com/en/compliance/` | `page-compliance.php` | Direct root path for institutional credibility |
| **Subsidiaries Directory** | `https://rahnab.com/subsidiaries/` | `https://rahnab.com/en/subsidiaries/` | `archive-company.php` | CPT archive root |
| **Cluster Taxonomy Filter** | `https://rahnab.com/subsidiaries/cluster/{slug}/` | `https://rahnab.com/en/subsidiaries/cluster/{slug}/` | `taxonomy-value_chain_stage.php` | Dynamic taxonomy archive; registered with `'top'` rewrite priority; bare `/cluster/` 301-redirects to `/subsidiaries/` |
| **Persis Gene Profile** | `https://rahnab.com/subsidiaries/persis-gene/` | `https://rahnab.com/en/subsidiaries/persis-gene/` | `single-company.php` | Permanent flat RESTful canonical single post |
| **Nozhin Zist Profile** | `https://rahnab.com/subsidiaries/nozhin-zist-pharmed/` | `https://rahnab.com/en/subsidiaries/nozhin-zist-pharmed/` | `single-company.php` | Permanent flat RESTful canonical single post |
| **Padra Serum Profile** | `https://rahnab.com/subsidiaries/padra-serum/` | `https://rahnab.com/en/subsidiaries/padra-serum/` | `single-company.php` | Permanent flat RESTful canonical single post |
| **KarayaKhteh Profile** | `https://rahnab.com/subsidiaries/karayakhteh/` | `https://rahnab.com/en/subsidiaries/karayakhteh/` | `single-company.php` | Permanent flat RESTful canonical single post |
| **Tamin Plasma Profile** | `https://rahnab.com/subsidiaries/tamin-plasma/` | `https://rahnab.com/en/subsidiaries/tamin-plasma/` | `single-company.php` | Permanent flat RESTful canonical single post |
| **Baya Zist Profile** | `https://rahnab.com/subsidiaries/baya-zist-pharmed/` | `https://rahnab.com/en/subsidiaries/baya-zist-pharmed/` | `single-company.php` | Permanent flat RESTful canonical single post |
| **Arc Zist Azma Profile** | `https://rahnab.com/subsidiaries/arc-zist-azma/` | `https://rahnab.com/en/subsidiaries/arc-zist-azma/` | `single-company.php` | Permanent flat RESTful canonical single post |
| **News & Events Media Hub** | `https://rahnab.com/news-events/` | `https://rahnab.com/en/news-events/` | `archive-news.php` | Consolidated media & communications hub |
| **News Category Taxonomy** | `https://rahnab.com/news-events/category/{slug}/` | `https://rahnab.com/en/news-events/category/{slug}/` | `taxonomy-news_category.php` | Filtered editorial category feed |
| **Subsidiary-Tagged News** | `https://rahnab.com/news-events/entity/{slug}/` | `https://rahnab.com/en/news-events/entity/{slug}/` | `archive-news.php` (`company_slug={slug}`) | Custom rewrite to `archive-news.php?company_slug=$matches[1]` filtering by scalar meta `_rahnab_news_related_company_id` |
| **Single News View** | `https://rahnab.com/news-events/{slug}/` | `https://rahnab.com/en/news-events/{slug}/` | `single-news.php` | Canonical single article view |
| **Events Directory** | `https://rahnab.com/events/` | `https://rahnab.com/en/events/` | `archive-event.php` | Directory of industrial symposia and exhibitions |
| **Single Event View** | `https://rahnab.com/events/{slug}/` | `https://rahnab.com/en/events/{slug}/` | `single-event.php` | Canonical single event and symposium view |
| **Contact & Head Office** | `https://rahnab.com/contact/` | `https://rahnab.com/en/contact/` | `page-contact.php` | Institutional directory & inquiry forms |
| **Visiting Protocols** | `https://rahnab.com/contact/visiting-protocols/` | `https://rahnab.com/en/contact/visiting-protocols/` | `page-visiting-protocols.php` | Cleanroom & security protocols for site visits |
| **Legal: Privacy Policy** | `https://rahnab.com/privacy-policy/` | `https://rahnab.com/en/privacy-policy/` | `page-legal.php` | Corporate data protection policy |
| **Legal: Terms of Service** | `https://rahnab.com/terms/` | `https://rahnab.com/en/terms/` | `page-legal.php` | Official institutional usage disclaimer |
| **Error Screen 404** | `https://rahnab.com/404/` | `https://rahnab.com/en/404/` | `404.php` | Custom branded error resolution screen |

---

## 3. Portfolio Extensibility Architecture (>7, 15, 20+ Subsidiaries)

As a biopharmaceutical venture holding, Rahnab Pharmed's portfolio will expand as new spin-outs and acquisitions mature. The architecture supports scaling from 7 to 20+ subsidiaries without URL breaking, navigation degradation, or template rework.

```text
PORTFOLIO EXTENSIBILITY SCHEMA
┌─────────────────────────────────────────────────────────────────────────────┐
│ TIER 1: PERMANENT FLAT RESTFUL PERMALINKS                                   │
│ Pattern: /subsidiaries/{slug}/                                              │
│ Rationale: By keeping URLs flat rather than nested under clusters           │
│ (e.g., NOT /subsidiaries/plasma/nozhin-zist/), a company's URL is permanent.│
│ If a subsidiary pivots or holding clusters re-align, zero 301 redirects are│
│ needed and zero external citation links break.                              │
├─────────────────────────────────────────────────────────────────────────────┤
│ TIER 2: TAXONOMY-DRIVEN VALUE-CHAIN CLUSTERING                              │
│ Taxonomy: 'value_chain_stage' (Hierarchical)                                │
│ Behavior: Subsidiaries belong to 1 primary value-chain cluster. Adding an   │
│ 8th or 20th company is an admin CMS action (publishing a post and tagging a │
│ taxonomy term). The frontend automatically groups entities into clusters.   │
├─────────────────────────────────────────────────────────────────────────────┤
│ TIER 3: ADAPTIVE NAVIGATION THRESHOLD                                       │
│ Threshold <= 8 Subsidiaries: Flat 3-column value-chain Mega-Menu            │
│ Threshold > 8 Subsidiaries: Dynamic 2-pane Mega-Menu (Left pane: Clusters, │
│ Right pane: Subsidiaries inside active cluster) + Search filter bar.        │
├─────────────────────────────────────────────────────────────────────────────┤
│ TIER 4: DIRECTORY UI PROGRESSIVE ENHANCEMENT                                │
│ Count <= 8: Rich visual cards with interactive quick-reveal drawers.        │
│ Count > 8: Segmented accordion or tabbed cluster interface with live search │
│ and instant client-side taxonomy filtering without page reloads.            │
└─────────────────────────────────────────────────────────────────────────────┘
```

### 3.1 WordPress Rewrite Rule Precedence & Regex Isolation Specifications

To prevent WordPress permalink collisions between CPT single post routes and taxonomy or relational filter endpoints, rewrite rules must be registered in an exact sequence with explicit priority:

```text
WORDPRESS REWRITE EVALUATION ORDER (STRICT PRECEDENCE)
┌───────┬──────────────────────────────────────────┬──────────────────────────────────────────────────────┬──────────┐
│ Order │ Incoming URI Regex Pattern               │ Internal WordPress Query Target                      │ Priority │
├───────┼──────────────────────────────────────────┼──────────────────────────────────────────────────────┼──────────┤
│ 1     │ ^subsidiaries/cluster/?$                 │ 301 Redirect -> https://rahnab.com/subsidiaries/     │ Intercept│
│ 2     │ ^subsidiaries/cluster/([^/]+)/page/([0-9]+)/?$ │ index.php?value_chain_stage=$matches[1]&paged=$matches[2] │ top      │
│ 3     │ ^subsidiaries/cluster/([^/]+)/?$         │ index.php?value_chain_stage=$matches[1]              │ top      │
│ 4     │ ^news-events/entity/([^/]+)/page/([0-9]+)/?$ │ index.php?post_type=news&company_slug=$matches[1]&paged=$matches[2] │ top │
│ 5     │ ^news-events/entity/([^/]+)/?$           │ index.php?post_type=news&company_slug=$matches[1]    │ top      │
│ 6     │ ^news-events/category/([^/]+)/?$         │ index.php?news_category=$matches[1]                  │ top      │
│ 7     │ ^subsidiaries/([^/]+)/?$                 │ index.php?company=$matches[1]                        │ standard │
│ 8     │ ^news-events/([^/]+)/?$                  │ index.php?news=$matches[1]                           │ standard │
└───────┴──────────────────────────────────────────┴──────────────────────────────────────────────────────┴──────────┘
```

#### Technical Safeguards:
1. **Explicit 'top' Registration:** The companion plugin `rahnab_core` registers taxonomy and entity rewrite rules using `add_rewrite_rule(..., ..., 'top')`. This ensures that `/subsidiaries/cluster/{cluster-slug}/` is placed ahead of the standard CPT rule `^subsidiaries/([^/]+)/?$`, eliminating any possibility of `{slug}` capturing the token `cluster`.
2. **Reserved Term Collision Guard:** In `wp_insert_post_data`, an automated validator rejects `cluster`, `category`, `tag`, `page`, `feed`, `author`, or `embed` as valid slugs for `company` or `news` CPT posts, automatically appending `-co` or `-article` to preserve routing integrity.
3. **Bare Base Path Canonical Redirect:** A `template_redirect` handler intercepts requests to `/subsidiaries/cluster/` or `/en/subsidiaries/cluster/` and issues an immediate `301 Moved Permanently` to `/subsidiaries/` or `/en/subsidiaries/`.

---

## 4. Dual-Language Routing Strategy (FA Primary RTL / EN Secondary LTR)

### 4.1 Sub-Path Prefix Routing Architecture
- **Persian (`fa-IR`):** Served at root `https://rahnab.com/`. Default HTML attributes: `<html lang="fa-IR" dir="rtl">`.
- **English (`en-US`):** Served at sub-path prefix `https://rahnab.com/en/`. HTML attributes: `<html lang="en-US" dir="ltr">`.

### 4.2 Technical Rationale for Sub-Path over Subdomains
1. **Domain Authority Consolidation:** Sub-paths concentrate 100% of backlink equity, PageRank, and trust signals in the root domain (`rahnab.com`). Subdomains (`en.rahnab.com`) fragment search authority into distinct entities in search index algorithms.
2. **Unified Edge Caching & SSL:** A single SSL certificate and standard CDN edge caching rules handle both languages without cross-origin configuration or secondary origin setups.
3. **National Network Optimization:** Sub-path routing ensures low-latency resolution across Iranian internet exchanges (IXP) without secondary DNS lookups.

### 4.3 Bi-Directional Canonical & `hreflang` Implementation
Every document emits complete alternate language headers in the `<head>` block:

```html
<!-- Canonical & Alternate Links on Persian Page (https://rahnab.com/subsidiaries/padra-serum/) -->
<link rel="canonical" href="https://rahnab.com/subsidiaries/padra-serum/" />
<link rel="alternate" hreflang="fa-IR" href="https://rahnab.com/subsidiaries/padra-serum/" />
<link rel="alternate" hreflang="en-US" href="https://rahnab.com/en/subsidiaries/padra-serum/" />
<link rel="alternate" hreflang="x-default" href="https://rahnab.com/subsidiaries/padra-serum/" />

<!-- Canonical & Alternate Links on English Page (https://rahnab.com/en/subsidiaries/padra-serum/) -->
<link rel="canonical" href="https://rahnab.com/en/subsidiaries/padra-serum/" />
<link rel="alternate" hreflang="fa-IR" href="https://rahnab.com/subsidiaries/padra-serum/" />
<link rel="alternate" hreflang="en-US" href="https://rahnab.com/en/subsidiaries/padra-serum/" />
<link rel="alternate" hreflang="x-default" href="https://rahnab.com/subsidiaries/padra-serum/" />
```

### 4.4 Graceful In-Page Bilingual Fallback & SEO Protection Protocol

When an international user requests an English URL (`/en/subsidiaries/{slug}/` or `/en/news-events/{slug}/`) for an entity whose verified English translation has not yet been published:

1. **Human Visitor Experience (Graceful In-Page Resolution):**
   - Never emit a jarring 404 error or silent 302 redirect to the homepage.
   - Render the complete layout in English (`dir="ltr"`, English header, English navigation, English footer).
   - Display an institutional editorial notice banner at the top of the content zone:
     *«Official English documentation for this entity is currently undergoing regulatory translation. The Persian source document is presented below for official reference.»*
   - Render the verified Persian source content styled with clean typography within the LTR layout shell, accompanied by a quick-action link to return to the English Subsidiaries Hub (`/en/subsidiaries/`).

2. **Search Engine Crawler & SEO Directives:**
   To strictly protect the domain against Googlebot language mismatch penalties, duplicate content flags, and international indexing degradation:
   - **Robots Meta Directive:** The `<head>` of any fallback page dynamically emits:
     ```html
     <meta name="robots" content="noindex, follow" />
     ```
     - `noindex`: Prevents search crawlers from indexing the untranslated Persian text under an English URL, completely protecting search equity and eliminating duplicate content flags.
     - `follow`: Instructs crawlers to follow all outbound and internal links on the page, preserving PageRank link equity flow throughout the site.
   - **Canonical Tag Attribution:** The fallback page sets its canonical link to the primary Persian document:
     ```html
     <link rel="canonical" href="https://rahnab.com/subsidiaries/{slug}/" />
     ```
   - **Conditional Hreflang Suppression:** In the `<head>` of the Persian page (`https://rahnab.com/subsidiaries/{slug}/`), the `<link rel="alternate" hreflang="en-US" ...>` tag is **strictly omitted** until the English post is published in WordPress. Once published, the English URL emits `index, follow` and the bidirectional `hreflang` relationship is activated.

3. **WordPress Query Interception Architecture:**
   In companion plugin `rahnab_core`, a `template_redirect` hook intercepts 404 queries on `/en/` routes:
   - Verifies whether a published Persian equivalent post exists.
   - Overrides the 404 status (`status_header(200)` and `$wp_query->is_404 = false`).
   - Sets internal runtime flag `$GLOBALS['rahnab_is_bilingual_fallback'] = true`.
   - Filters `wp_robots` to output `noindex => true, follow => true`.
   - Loads the target template (`single-company.php` or `single-news.php`) within the English shell.

---

## 5. News & Events Taxonomy & Relational Routing Architecture

### 5.1 Orthogonal Categorization & Relational Model
The media and communications hub organizes articles across two complementary systems:

1. **Editorial Taxonomy (`news_category` — Hierarchical):**
   - `holding-news`: Corporate holding strategy, capital investments, executive appointments.
   - `subsidiary-milestones`: Biomanufacturing facility launches, cleanroom commissionings, production milestones.
   - `scientific-breakthroughs`: Peer-reviewed research, clinical trial progress, patents.
   - `regulatory-statements`: IFDA approvals, GMP certifications, national standard awards.
   - `events-exhibitions`: IranPharma, Arab Health, CPHI, scientific congresses.

2. **Entity Relationship Architecture (Scalar Foreign Key via Query Var):**
   - Entity links are NOT modeled as a taxonomy. They are stored as **scalar integer post IDs** in custom post meta:
     `_rahnab_news_related_company_id = {company_id}` (where `0` represents the parent holding).
   - The route `https://rahnab.com/news-events/entity/{slug}/` is resolved via a custom WordPress rewrite rule:
     `^news-events/entity/([^/]+)/?$` -> `archive-news.php?company_slug=$matches[1]`
   - In `pre_get_posts`, the `company_slug` query var resolves the company ID and executes a high-speed indexed meta query (`_rahnab_news_related_company_id = $company_id`).

### 5.2 Dynamic Cross-Tagging & Template Behavior
- When an article tagged to Nozhin Zist Pharmed is published:
  - Surfaces in the main News Archive (`/news-events/`) rendered via `archive-news.php`.
  - Surfaces in category `/news-events/category/subsidiary-milestones/` via `taxonomy-news_category.php`.
  - Surfaces in cross-entity archive `/news-events/entity/nozhin-zist-pharmed/` via `archive-news.php` with a dedicated company headline banner.
  - Automatically surfaces inside Zone 7 (Related Milestones) on `/subsidiaries/nozhin-zist-pharmed/` via cached relationship query (`rahnab_company_{$company_id}_news_{$locale}`).
  - Emits an interactive brandmark badge on the single article page (`single-news.php`) linking directly to the company profile.

---

## 6. Single Subsidiary Profile Page Anatomy (8 Modular Zones)

The single subsidiary page (`single-company.php`) serves as the definitive institutional profile for each venture:

```text
CANONICAL SINGLE SUBSIDIARY PAGE STRUCTURE (8 ZONES)
┌─────────────────────────────────────────────────────────────────────────────┐
│ ZONE 1: HERO IDENTITY & OUTBOUND GATEWAY                                    │
│ - Official Brandmark (High-res SVG) & Bilingual Legal Registered Name       │
│ - Value-Chain Cluster Badge & Foundation Year (Solar Hijri & Gregorian)     │
│ - 11-digit Iranian National Company ID (شناسه ملی) & Corporate Reg Number   │
│ - Verified Link to Official Company Website (rel="noopener" target="_blank") │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 2: STRATEGIC HOLDING POSITIONING & MANDATE                             │
│ - Executive summary of corporate purpose and holding investment thesis      │
│ - Specific role within Rahnab's sovereign biomanufacturing lifecycle        │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 3: QUANTITATIVE TECHNOLOGICAL METRICS & CAPACITIES                     │
│ - High-contrast scientific metric badges:                                   │
│   (e.g., Annual Throughput: 150,000L | Cleanroom Footprint: 2,500 m² |       │
│    National Market Share: >70% | Regulatory Grade: WHO-GMP / ISO 17025)     │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 4: THERAPEUTIC / ACTIVITY PORTFOLIO                                    │
│ - Commercialized medicines, biologicals, or analytical testing catalog:     │
│   (ImmunoJine, AlbuJine, SnaFab, ScoFab, CARTIMED, Recombinant Clones,      │
│    Biological Potency Bioassays, Peptide Mapping LC-MS Services)            │
│ - Tabulated presentation with indication, generic name, and status          │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 5: ACCREDITATIONS, REGULATORY SEALS & TRUST ENGINE                     │
│ - Interactive accreditation badges:                                         │
│   • Iran Food and Drug Administration (IFDA) Collaborator Laboratory Plaque │
│   • National Knowledge-Based Enterprise (شرکت دانش‌بنیان) Certificate       │
│   • Cleanroom GMP Conformity & ISO 13485 / ISO 17025 Regulatory Badges      │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 6: AUTHENTIC CLEANROOM & FACILITY GALLERY                              │
│ - Documentary photo gallery of genuine industrial infrastructure:           │
│   Fractionation tanks, bioreactor parks, LC-MS instrumentation, isolators   │
│ - Strict prohibition against generic stock medical photography              │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 7: INTER-COMPANY SYNERGIES & RELATED MILESTONES                        │
│ - Visual upstream feed & downstream destination within Rahnab holding       │
│ - Latest 2-3 press releases and scientific milestones tagged to this entity │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 8: DIRECT INSTITUTIONAL CONTACT CARD                                   │
│ - Industrial site / campus physical address                                 │
│ - Direct corporate telephone, email, and LinkedIn channels                  │
│ - Primary CTA: «درخواست همکاری B2B با این مجموعه» (Routes to inquiry form)   │
└─────────────────────────────────────────────────────────────────────────────┘
```

---
*Authored and verified by Milestone 1 Architecture Team (`worker_m1_author`).*
