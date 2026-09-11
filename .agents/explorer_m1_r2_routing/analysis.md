# TECHNICAL ANALYSIS & REMEDIATION SPECIFICATIONS
## Deliverables 01 (Sitemap) and 02 (Navigation Architecture) — Milestone 1 Remediation (R2)
### Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Author:** Explorer 2.2 (Sitemap & Navigation Remediation Specialist)  
**Assigned Deliverables:** `01_FINAL_SITEMAP.md` and `02_NAVIGATION_ARCHITECTURE.md`  
**Reference Gate Reports:** `challenger_m1_1/challenge.md` (CH-01, CH-02, CH-03, CH-04) & `reviewer_m1_1/review.md` (F-02, F-03, F-04)  
**Status:** Drop-in Remediation Blueprints Ready for Author Integration  
**Constraint Level:** Strict Pure Architecture (Zero PHP Code written in workspace)  

---

## 1. Executive Summary & Failure Remediation Matrix

During Milestone 1 Iteration 1, Challenger 1 and Reviewer 1 conducted rigorous stress-testing on the Information Architecture deliverables. While the overarching conceptual structure and Latin slug discipline were commended, four concrete architectural vulnerabilities were identified across Deliverables 01 and 02:

```text
ITERATION 1 FAILURE POINTS & REMEDIATION BLUEPRINT
┌───────┬───────────────────────────────────┬──────────────┬────────────────────────────────────────────────────────┐
│ ID    │ Failure Description               │ Target File  │ Remediation Specification Summary                     │
├───────┼───────────────────────────────────┼──────────────┼────────────────────────────────────────────────────────┤
│ FP-01 │ Rewrite Precedence & Collisions   │ Deliverable  │ Explicit registration priority ('top') for taxonomy    │
│       │ (/subsidiaries/cluster/{slug}/)   │ 01, Sec 2, 3 │ rewrites; reserved slug blacklist; 301 base redirect.  │
├───────┼───────────────────────────────────┼──────────────┼────────────────────────────────────────────────────────┤
│ FP-02 │ News by Subsidiary Route Mismatch │ Deliverable  │ Replace phantom taxonomy-related_entity.php with       │
│       │ (/news-events/entity/{slug}/)     │ 01, Sec 2, 5 │ archive-news.php via query var company_slug rewrite.   │
├───────┼───────────────────────────────────┼──────────────┼────────────────────────────────────────────────────────┤
│ FP-03 │ Untranslated English Fallback SEO │ Deliverable  │ Specify <meta name="robots" content="noindex, follow">│
│       │ Crawler Penalties on /en/ Routes  │ 01, Sec 4.4  │ canonical to Persian source; hreflang suppression.    │
├───────┼───────────────────────────────────┼──────────────┼────────────────────────────────────────────────────────┤
│ FP-04 │ Mega-Menu Viewport Overflow on    │ Deliverable  │ Specify 2-Pane Master-Detail layout for >8 ventures;   │
│       │ Portfolio Scaling (768p Laptops)  │ 02, Sec 2, 4 │ height clamping (min 560px, 85vh); mobile drawer opt.  │
└───────┴───────────────────────────────────┴──────────────┴────────────────────────────────────────────────────────┘
```

---

## 2. Granular Technical Root-Cause Analyses

### 2.1 Failure Point 1 (FP-01): WordPress Rewrite Rule Precedence & Regex Isolation

#### The Vulnerability
In WordPress Core, incoming requests are resolved against an ordered array of regular expressions (`$wp_rewrite->rules`). The matching process stops at the first rule that satisfies the pattern.
- CPT `company` registers: `^subsidiaries/([^/]+)/?$` -> `index.php?company=$matches[1]`
- Taxonomy `value_chain_stage` registers: `^subsidiaries/cluster/([^/]+)/?$` -> `index.php?value_chain_stage=$matches[1]`

When a user or search bot accesses `/subsidiaries/cluster/` (e.g. clicking a breadcrumb or entering a truncated URL):
1. The regex segment `([^/]+)` in the CPT rule matches the string `'cluster'`.
2. WordPress executes: `WP_Query(['post_type' => 'company', 'name' => 'cluster'])`.
3. Because no subsidiary exists with the slug `cluster`, WordPress returns a hard **HTTP 404 Not Found**.
4. Furthermore, if the taxonomy rewrite rules are registered after the CPT rules without explicit array positioning, or if a custom rewrite rule is appended via `'bottom'`, any sub-route under `/subsidiaries/cluster/` risks being intercepted or degraded.
5. If an administrative user publishes a company titled "Cluster" (slug `cluster`), the taxonomy routing tree is permanently hijacked.

#### Technical Resolution Mechanism
1. **Explicit Priority Registration:** Mandate that rewrite rules for `/subsidiaries/cluster/([^/]+)/?$` and `/en/subsidiaries/cluster/([^/]+)/?$` are registered via `add_rewrite_rule()` with `$priority = 'top'` in the companion plugin (`rahnab_core`).
2. **Pagination Pattern Precedence:** Register `^subsidiaries/cluster/([^/]+)/page/([0-9]{1,})/?$` at `'top'` before the standard taxonomy rule.
3. **Bare Base Path 301 Redirection:** Intercept requests matching `^subsidiaries/cluster/?$` and `^en/subsidiaries/cluster/?$` and issue a `301 Moved Permanently` redirect to `/subsidiaries/` and `/en/subsidiaries/`.
4. **Reserved Post Slug Blacklist Guard:** In the WordPress `wp_insert_post_data` filter, validate the slug of all `company` posts. Forbid reserved routing keywords: `cluster`, `category`, `tag`, `page`, `feed`, `author`, `embed`. If an editor inputs a reserved slug, sanitize it automatically to `{slug}-co` and alert the editor.

---

### 2.2 Failure Point 2 (FP-02): News by Subsidiary Route & CPT Relational Alignment

#### The Vulnerability
In Deliverable 01 (Table 2, row 115), the route for news filtered by subsidiary was specified as:
`https://rahnab.com/news-events/entity/{slug}/` -> `taxonomy-related_entity.php`
However, Deliverable 04 explicitly rejected a taxonomy for entity relationships, establishing the **Scalar Foreign Key Model** (`_rahnab_news_related_company_id = 42`) in `wp_postmeta` to prevent database serialization anti-patterns and enable 2ms B-tree index queries.
Because `related_entity` is NOT a registered WordPress taxonomy:
1. WordPress core has no native rewrite rule for `^news-events/entity/([^/]+)/?$`.
2. Any request to `https://rahnab.com/news-events/entity/nozhin-zist-pharmed/` triggers an unhandled **HTTP 404 Not Found**.
3. Template `taxonomy-related_entity.php` does not exist in the template hierarchy.
4. Reviewer 2 in Gate Iteration 1 also noted that news archive templates must use standard Classic WordPress naming: `archive-news.php` and `single-news.php` (replacing non-standard `archive-news_event.php` and `single-news_event.php`).

#### Technical Resolution Mechanism
1. **Rewrite Rule Binding:** Map `/news-events/entity/{slug}/` directly to `archive-news.php` via a custom query variable `company_slug`:
   - Pattern: `^news-events/entity/([^/]+)/?$` -> `index.php?post_type=news&company_slug=$matches[1]`
   - English Pattern: `^en/news-events/entity/([^/]+)/?$` -> `index.php?post_type=news&company_slug=$matches[1]&lang=en`
   - Register `company_slug` in the public query variables whitelist via `query_vars` filter.
2. **Query Interception (`pre_get_posts`):**
   When `is_post_type_archive('news')` and `get_query_var('company_slug')` are detected:
   - Query `company` post type by slug (`post_name`).
   - If not found: trigger `$wp_query->set_404(); status_header(404); return;`.
   - If found: retrieve `$company_id` and set `meta_query`:
     ```php
     $query->set('meta_query', [[
         'key'     => '_rahnab_news_related_company_id',
         'value'   => $company_id,
         'compare' => '=',
         'type'    => 'NUMERIC'
     ]]);
     ```
3. **Template Contextual Rendering:** In `archive-news.php`, detect `get_query_var('company_slug')`. If present, render a contextual header:
   - Company brandmark SVG & name badge.
   - Title: *«اخبار و اطلاعیه‌های رسمی [نام شرکت]»* / *«Official News & Announcements: [Company Name]»*.
   - Filter reset button: *«مشاهده همه اخبار هلدینگ رهناب»* (`/news-events/`).

---

### 2.3 Failure Point 3 (FP-03): Dual-Language Fallback SEO Crawler Protection

#### The Vulnerability
Deliverable 01 Section 4.4 and Deliverable 06 Decision 8 specify that if an English page is requested for an untranslated subsidiary or news article, the site renders an English layout shell with an editorial notice and verified Persian source text, avoiding 404 errors for human visitors.
However, search engine crawlers (Googlebot, Bingbot) process this differently:
1. **Language Mismatch & Index Contamination:** Googlebot crawls `https://rahnab.com/en/subsidiaries/arc-zist-azma/`. The document declares `<html lang="en-US">`, but the body is 80%+ Persian text. Google flags this as a language mismatch.
2. **Duplicate Content & Cannibalization:** The Persian content on the `/en/` URL is an untranslated duplicate of `https://rahnab.com/subsidiaries/arc-zist-azma/`. Google will either de-index the English URL, penalize the Persian canonical URL, or pick an arbitrary canonical.
3. **Hreflang Specification Violation:** Google's Internationalization Guidelines strictly forbid `hreflang` tags pointing to untranslated fallback pages. Hreflang alternates must point to fully translated localizations.
4. **Native Polylang 404 Collision:** If an English translation post does not exist in the database, Polylang queries `post_type=company&lang=en` and natively returns a 404 before template execution.

#### Technical Resolution Mechanism
1. **Robots Meta Tag Injection:** On any `/en/` URL rendering in fallback mode, dynamically output:
   `<meta name="robots" content="noindex, follow" />`
   - `noindex`: Completely instructs search bots NOT to index the untranslated page under the English URL, preventing SERP pollution, language mismatch penalties, and duplicate content flags.
   - `follow`: Directs search bots to crawl all internal links on the page (header, footer, related holding news, contact channels), maintaining unbroken PageRank flow.
2. **Canonical Link Attribution:** The fallback page must emit its canonical tag pointing to the authoritative Persian source URL:
   `<link rel="canonical" href="https://rahnab.com/subsidiaries/{slug}/" />`
   This definitively establishes the Persian document as the primary source of truth.
3. **Conditional Hreflang Suppression:** In the `<head>` of the primary Persian page, omit `<link rel="alternate" hreflang="en-US" ...>` until the English translation post is officially created and published (`status = 'publish'`). Once published, the English URL emits `index, follow` and the bidirectional `hreflang` relationship is activated.
4. **WordPress Query Interception Specification:** In companion plugin `rahnab_core`, hook into `template_redirect`:
   - If `is_404()` and `pll_current_language() == 'en'`:
   - Extract requested post slug.
   - If a published Persian counterpart exists: intercept the 404, set HTTP status 200, bind the Persian post object to a global flag `$GLOBALS['rahnab_is_bilingual_fallback'] = true`, add `noindex, follow` via `wp_robots` filter, and load `single-company.php` inside the English layout shell.

---

### 2.4 Failure Point 4 (FP-04): Desktop Mega-Menu Spatial Scaling on 768p Laptop Displays

#### The Vulnerability
Deliverable 02 Section 2 specified a 3-column Mega-Menu (Col 1: 25%, Col 2: 50%, Col 3: 25%) with a fixed width of `1080px`. While this accommodates 7 subsidiaries, an empirical spatial calculation reveals severe failure when the portfolio expands:
- **Spatial Calculation on Laptop Displays:**
  - Standard enterprise laptop resolutions in Iran and international institutions: 1366x768 and 1440x900 (>45% market share).
  - 1080p monitors with Windows OS 125% scaling produce an effective CSS viewport height of `864px`; 150% scaling produces `720px`.
  - Available browser viewport height on 768p (excluding OS taskbar and browser chrome): **~620px to 630px**.
  - Floating header height + margins: 72px + 24px = **96px**.
  - Maximum usable vertical space below header: **524px to 534px**.
- **Portfolio Scaling Stress:**
  - With 7 subsidiaries: Column 2 height is ~544px (borderline fit).
  - With 15 subsidiaries: Column 2 height reaches **1,076px**.
  - With 20 subsidiaries: Column 2 height reaches **1,356px**.
  - Because Deliverable 02 lacked `max-height` clamping and overflow containment, 40% to 60% of the Mega-Menu will render below the physical screen fold, rendering lower subsidiaries completely invisible and unclickable.
- **Mobile Drawer Vertical Congestion (Reviewer 1 F-03):**
  - Three stacked 48px buttons at the bottom of the mobile drawer consume ~160px–180px, leaving under 320px for navigation accordion items on compact mobile screens (375x667px).

#### Technical Resolution Mechanism
1. **Dual-Mode Adaptive Mega-Menu Architecture:**
   - **Mode A (Current: <= 8 Subsidiaries):** Baseline 3-Column Ecosystem Panorama with fluid width clamping `width: min(1080px, calc(100vw - 48px))` and `max-height: min(560px, calc(85vh - 90px))` with internal scroll.
   - **Mode B (Scaled Venture Portfolio: > 8 to 20+ Subsidiaries):** The Mega-Menu automatically shifts to a **2-Pane Master-Detail (Tabbed) Architecture**:
     - **Top Utility Bar:** Instant search input (`filter subsidiaries by name or therapy`) + total entity count badge.
     - **Pane 1 (Master Cluster Sidebar — Width: 32%, ~340px):** Vertical cluster tab list strictly aligned with `value_chain_stage` taxonomy. Each tab displays cluster icon, Persian title, English subtitle, and subsidiary count badge. Tab switching activates on hover (`100ms` intentional debounce) or keyboard focus.
     - **Pane 2 (Detail Canvas — Width: 68%, ~700px):** Responsive 2-column card grid rendering ONLY the 2–5 subsidiaries belonging to the active cluster. Each card contains company SVG brandmark, legal name, core capacity badge, and direct profile link.
     - **Pinned Bottom Context Bar:** Direct link to full cluster archive `/subsidiaries/cluster/{slug}/`.
     - **Strict Vertical Containment:** Container `max-height: min(560px, calc(85vh - 90px))`, `overflow: hidden`. Pane 1 and Pane 2 contain independent subtle scrollbars (`overflow-y: auto`), strictly preventing viewport overflow on 768p screens.
2. **Mobile Drawer Optimization:**
   - When portfolio > 8, accordion groups companies under nested cluster headers with a top live search filter.
   - Language switcher moved to drawer top bar next to Close (X) button.
   - Bottom thumb-zone buttons rearranged into a compact 2-button horizontal grid (Height: 64px instead of 160px), reclaiming ~100px of vertical space for compact screens.

---

## 3. Drop-in Remediation Text for Deliverable 01 (`01_FINAL_SITEMAP.md`)

The following sections are complete, exact drop-in replacements ready to be inserted directly into `.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md`.

### 3.1 Drop-in Replacement for Section 2: RESTful Latin URL Slug Specifications (Table 2)

```markdown
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
| **Single News/Event View** | `https://rahnab.com/news-events/{slug}/` | `https://rahnab.com/en/news-events/{slug}/` | `single-news.php` | Canonical single article view |
| **Contact & Head Office** | `https://rahnab.com/contact/` | `https://rahnab.com/en/contact/` | `page-contact.php` | Institutional directory & inquiry forms |
| **Visiting Protocols** | `https://rahnab.com/contact/visiting-protocols/` | `https://rahnab.com/en/contact/visiting-protocols/` | `page-visiting-protocols.php` | Cleanroom & security protocols for site visits |
| **Legal: Privacy Policy** | `https://rahnab.com/privacy-policy/` | `https://rahnab.com/en/privacy-policy/` | `page-legal.php` | Corporate data protection policy |
| **Legal: Terms of Service** | `https://rahnab.com/terms/` | `https://rahnab.com/en/terms/` | `page-legal.php` | Official institutional usage disclaimer |
| **Error Screen 404** | `https://rahnab.com/404/` | `https://rahnab.com/en/404/` | `404.php` | Custom branded error resolution screen |
```

---

### 3.2 Drop-in Addition for Section 3: Rewrite Rule Precedence & Collision Guard

```markdown
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
```

---

### 3.3 Drop-in Replacement for Section 4.4: Dual-Language SEO & In-Page Fallback Protocol

```markdown
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
```

---

### 3.4 Drop-in Replacement for Section 5: News & Events Taxonomy & Relational Routing

```markdown
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
```

---

## 4. Drop-in Remediation Text for Deliverable 02 (`02_NAVIGATION_ARCHITECTURE.md`)

The following sections are complete, exact drop-in replacements ready to be inserted directly into `.agents/orchestrator_m1/deliverables/02_NAVIGATION_ARCHITECTURE.md`.

### 4.1 Drop-in Replacement for Section 2: Subsidiaries Value-Chain Mega-Menu Architecture

```markdown
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
```

---

### 4.2 Drop-in Replacement for Section 4: Mobile Navigation Architecture

```markdown
## 4. Mobile Navigation Architecture (Ergonomics & Touch Zone)

On viewports below 1024px, the header transitions to an ergonomic mobile pattern featuring an off-canvas drawer optimized for single-hand mobile operation, touch targets >= 48px, and compact vertical thumb zones.

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
```

---

## 5. Cross-Deliverable Cohesion Matrix

To guarantee 100% architectural alignment across the Milestone 1 deliverable repository, the remediations interface as follows:

```text
CROSS-DELIVERABLE COHESION & TRACEABILITY
┌──────────────────┬─────────────────────────────┬─────────────────────────────┬──────────────────────────────┐
│ Architectural    │ Deliverable 01 (Sitemap)    │ Deliverable 02 (Navigation) │ Deliverable 04 (CPT Model)   │
│ Component        │ Remediation Role            │ Remediation Role            │ Alignment Contract           │
├──────────────────┼─────────────────────────────┼─────────────────────────────┼──────────────────────────────┤
│ Cluster Rewrite  │ Table 2 & Sec 3.1: Priority │ Mode B Pane 1 links directly│ Table 3: value_chain_stage   │
│ Precedence       │ 'top' + reserved blacklist  │ to /subsidiaries/cluster/...│ registered with top rewrites │
├──────────────────┼─────────────────────────────┼─────────────────────────────┼──────────────────────────────┤
│ News by Entity   │ Table 2 & Sec 5.2: Rewrite  │ Global Nav links to Media   │ Sec 4.2 & Sec 5.1: Foreign   │
│ Route            │ to archive-news.php?company │ Hub; contextual entity badge│ key _rahnab_news_related_id  │
├──────────────────┼─────────────────────────────┼─────────────────────────────┼──────────────────────────────┤
│ Bilingual SEO    │ Sec 4.4: Injects noindex,   │ Language switcher triggers  │ Sec 7.3: template_redirect   │
│ Fallback Hook    │ follow & suppresses hreflang│ graceful fallback smoothly  │ query interceptor hook       │
├──────────────────┼─────────────────────────────┼─────────────────────────────┼──────────────────────────────┤
│ Mega-Menu 768p   │ Sec 3 Tier 3: Adaptive      │ Sec 2.2: Complete 2-Pane    │ CPT company and taxonomy     │
│ Scaling          │ navigation threshold rule   │ spatial blueprint & clamping│ structure feeds 2-pane query │
└──────────────────┴─────────────────────────────┴─────────────────────────────┴──────────────────────────────┘
```

---

## 6. Implementation Verification Guidelines for Milestone 2

Downstream prototype and WordPress engineers must verify the implementation of these specifications using the following automated checks:

1. **Rewrite Precedence Verification:**
   - Execute: `wp rewrite list --match=subsidiaries/cluster/rd-incubation/` -> Must resolve to `index.php?value_chain_stage=rd-incubation`.
   - Execute: `curl -I https://rahnab.local/subsidiaries/cluster/` -> Must return `HTTP/1.1 301 Moved Permanently` to `/subsidiaries/`.
   - Verify post slug validator: Attempting to save a post titled "Cluster" in `company` CPT must automatically alter slug to `cluster-co`.
2. **News Entity Route Verification:**
   - Execute: `curl -I https://rahnab.local/news-events/entity/nozhin-zist-pharmed/` -> Must return `HTTP/1.1 200 OK` rendering `archive-news.php`.
   - Verify query: Emits articles where `_rahnab_news_related_company_id` matches Nozhin Zist post ID.
3. **Bilingual Fallback SEO Verification:**
   - On an untranslated English subsidiary page:
     - Inspect HTML `<head>`: Must contain `<meta name="robots" content="noindex, follow">`.
     - Inspect Persian equivalent `<head>`: Must NOT contain `<link rel="alternate" hreflang="en-US" ...>`.
     - Inspect canonical: Must point to Persian URL `https://rahnab.com/subsidiaries/{slug}/`.
4. **Mega-Menu Viewport Verification:**
   - In Chrome DevTools, emulate display at `1366 x 768` (window height 620px).
   - Inject 20 mock subsidiaries across 5 clusters.
   - Trigger Mega-Menu: Confirm Mode B activates, total container height is clamped <= 560px, Master sidebar and Detail canvas scroll independently, and zero vertical scrollbar is introduced to the main browser viewport.

---

## 7. Zero-Code Prohibition Compliance Statement

This technical analysis contains exclusively architectural diagrams, specifications, regex maps, and schema contracts. **No PHP source code, theme template files, or CSS stylesheets have been created or modified in the workspace.** This document fully complies with Milestone 1 zero-code strict constraints.
