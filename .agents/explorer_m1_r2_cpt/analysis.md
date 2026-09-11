# CPT & Schema Remediation Analysis & Drop-In Specification
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-REMED-M1-04-CPT`  
**Agent:** Explorer 2.1 (`explorer_m1_r2_cpt` — CPT & Schema Remediation Specialist)  
**Target Deliverable:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md` (`RAHNAB-ARCH-M1-04`)  
**Input Defect Reports:**
- Reviewer 2 Report: `.agents/reviewer_m1_2/review.md` (`REV-M1-02-CPT-ARCH` — Verdict: `REQUEST_CHANGES`)
- Challenger 2 Report: `.agents/challenger_m1_2/challenge.md` (`RAHNAB-CHALLENGE-M1-02` — Verdict: `VULNERABILITIES_FOUND`)
- Gate Status: `.agents/orchestrator_m1/GATE_STATUS.md`  
**Execution Constraint:** STRICTLY ZERO PHP IMPLEMENTATION CODE IN THE REPOSITORY (Pure Architectural Specification)  
**Date:** 2026-09-09  

---

## 1. Executive Summary & Remediation Strategy

In Milestone 1 Iteration 1, Deliverable 04 successfully demonstrated high-level entity modeling and complied with the Zero-PHP-Code constraint. However, independent adversarial review by Reviewer 2 and Challenger 2 revealed **9 critical architectural deficiencies and vulnerabilities**:
1. **Core Template Naming Bug & Missing Templates:** Non-standard names `single-news_event.php` and `archive-news_event.php` break the native WordPress template hierarchy; public CPT `event` completely lacks archive and single templates.
2. **Missing Facility Metadata Fields:** Table 4.1 omits critical cleanroom, bioreactor, plant location, and photography gallery fields required by Section 7.2 (Tab 3) and template part `gallery-cleanroom.php`.
3. **Missing Architectural Decision Record (ADR):** Absence of formal trade-off documentation justifying why facilities are structured metadata on `company` rather than a standalone CPT (`facility`).
4. **Transient Cache Poisoning & Stale Transients:** Cache keys lack `$locale` scoping (causing English visitors to see Persian headlines and vice versa); failure to purge achievement transients; failure to invalidate previously linked companies when relationships are reassigned.
5. **Taxonomy Hierarchy Contradiction:** Diagram in Section 1 labels `value_chain_stage` as "Flat", while Section 3 table and Deliverable 01 define it as "Hierarchical".
6. **Multi-Subsidiary Press Release Bottleneck:** Single scalar integer dropdown locks press releases to one entity, preventing collaborative cross-subsidiary press releases.
7. **PHP 8 Fatal Errors on Orphaned / Trashed Posts:** Lack of deletion lifecycle hooks and defensive rendering specifications risks fatal white screens (`Uncaught TypeError: Attempt to read property "post_title" on null`) and broken 404 links.
8. **Missing Output Escaping & Security Gaps:** 100% of fields in Tables 4.1–4.4 lack explicit output escaping declarations; contact phone regex rejects the client's official telephone format; SVG uploads lack sanitization rules.
9. **Missing Admin Table Column Specifications:** Omission of custom admin list table columns, filters, and sortable keys for CPTs `event` and `achievement`.
*(Bonus: Omission of metadata schema for helper CPT `team_member` and undefined Polylang fallback behaviors).*

This analysis provides the **exact, exhaustive, drop-in remediation specifications** to allow the author agent (`worker_m1_author`) to update Deliverable 04 seamlessly and achieve immediate gate approval.

---

## 2. Detailed Root Cause Analysis & Drop-In Remediation Specifications

### Failure Point 1: Classic WordPress Template Hierarchy Naming & Missing Event Templates

#### 1.1 Root Cause & WordPress Core Behavioral Fact
- In Section 2.2 of Deliverable 04, the post type is registered as `news` (`register_post_type('news', ...)`).
- According to WordPress Core (`wp-includes/template-loader.php`), template resolution for custom post types strictly relies on the **post type key**, never the rewrite slug:
  - Archive: `archive-{$post_type}.php` -> `archive.php` -> `index.php`
  - Single: `single-{$post_type}.php` -> `single.php` -> `singular.php` -> `index.php`
- Therefore, WordPress will search for `archive-news.php` and `single-news.php`. It will **never** automatically load `archive-news_event.php` or `single-news_event.php`. Without non-standard PHP filter intercepts, WordPress falls back to generic `archive.php` or `index.php`, breaking the bespoke design.
- Furthermore, Section 2.3 defines CPT `event` with `has_archive => 'events'`, `slug => 'events'`, and `publicly_queryable => true`. Yet Table 6.1 contains zero templates for `/events/` or `/events/{slug}/`.

#### 1.2 Exact Drop-In Remediation for Table 6.1
Replace rows 264–265 and add the missing CPT `event` templates as follows:

| Template Filename | Template Type | WordPress Hierarchy Hook | Core Content & Data Blocks |
|:---|:---|:---|:---|
| `archive-news.php` | Custom Post Archive | `is_post_type_archive('news')` | Editorial category filter pills (`news_category`), lead milestone hero card (`card-news-featured.php`), paginated 3-column news grid (`card-news.php`), dual-date badges (Solar Hijri & Gregorian), entity filter bar. Handles the `/news-events/` archive rewrite route. |
| `single-news.php` | Single Custom Post | `is_singular('news')` | Lead article headline, dual-date badges, calculated reading time, editorial typography, downloadable official press release PDF (`_rahnab_news_press_release_pdf`), related corporate entity badge card (`widget-related-news.php`), previous/next pagination. |
| `archive-event.php` | Custom Post Archive | `is_post_type_archive('event')` | Industrial congress and symposium directory (`/events/`), taxonomy filter pills (`event_type`), tabbed view (Upcoming vs. Concluded), interactive calendar card grid (`card-event.php`), venue & booth badges, registration gateways. |
| `single-event.php` | Single Custom Post | `is_singular('event')` | Event header & visual cover, start/end date-time badge, venue name & physical address (`_rahnab_event_venue_fa/en`), booth/hall coordinates (`_rahnab_event_booth_number`), participating subsidiary badge(s), event countdown timer (`widget-countdown.php`), direct registration CTA link (`_rahnab_event_registration_url`). |

#### 1.3 Routing Architecture for Consolidated `/news-events/` Hub
- **Archive Route:** The CPT registration for `news` sets `'has_archive' => 'news-events'` and `'rewrite' => ['slug' => 'news-events', 'with_front' => false]`. Visiting `https://rahnab.com/news-events/` triggers `is_post_type_archive('news')` and automatically loads `archive-news.php`.
- **Cross-Post Type Integration:** To allow `/news-events/` to serve as a unified holding communications hub, `archive-news.php` uses a secondary tabbed query or `pre_get_posts` filter in `rahnab_core`:
  ```php
  // Architectural Specification for Milestone 2 implementation:
  // When is_post_type_archive('news') and query var 'content_type' == 'all' or 'events'
  // $query->set('post_type', ['news', 'event']);
  ```
- **Entity Filter Rewrite Endpoint:** Deliverable 01 specifies `/news-events/entity/{slug}/`. In `rahnab_core`, register a custom rewrite rule:
  - Regex: `^news-events/entity/([^/]+)/?$`
  - Target: `index.php?post_type=news&company_slug=$matches[1]`
  - Template Loader: Resolved natively by `archive-news.php` which detects `get_query_var('company_slug')` and applies the relational `meta_query`.

---

### Failure Point 2: Missing Facility & Technical Spec Metadata Fields in Table 4.1

#### 2.1 Root Cause
Table 4.1 currently terminates at Field 18 (`_rahnab_company_products_pipeline`). However, Deliverable 04 Section 7.2 explicitly requires "Tab 3: Facilities & Technical Specs: Cleanroom grades, bioreactor capacities, analytical testing scopes", Section 6.2 defines template part `gallery-cleanroom.php`, and Deliverable 03 Zone 5 mandates a cleanroom photo gallery.

#### 2.2 Exact Drop-In Remediation for Table 4.1
Append Fields 19, 20, and 21 to Table 4.1 with full typed schema, sanitization, and output escaping:

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 19 | `_rahnab_company_facility_specs` | مشخصات فنی و تأسیسات / Facility & Technical Specs | `serialized_json` | Structured repeater table | Schema check (`title`, `cleanroom_grade`, `area_sqm`, `bioreactors`, `testing_scope`); recursive `array_map` with `sanitize_text_field()` before `wp_json_encode()` | Decoded JSON array; each element escaped via `esc_html()` and `esc_attr()` | No | Serialized JSON array of cleanrooms and physical plant capacities (e.g. `[{"title":"Bioprocess Suite","cleanroom_grade":"Grade B/C","area_sqm":1200,"bioreactors":"2x 500L Single-Use","testing_scope":"Upstream & Downstream scaling"}]`). |
| 20 | `_rahnab_company_facility_locations` | موقعیت کارخانه‌ها و سایت‌ها / Production Sites & Facility Locations | `text` | Textarea | `sanitize_textarea_field`, max 500 chars | `nl2br( esc_html( ... ) )` or `wp_kses_post( ... )` | **Yes** | Physical industrial facilities and plants distinct from central NIGEB headquarters (e.g. *سایت شماره ۲: شهرک صنعتی سپهر نظرآباد، مجتمع تفکیک پلاسما* / *Sepehr Industrial Complex, Safadasht*). |
| 21 | `_rahnab_company_facility_gallery` | گالری تصاویر تأسیسات و آزمایشگاه‌ها / Cleanroom & Laboratory Photo Gallery | `array` / `comma_separated_ids` | Media Gallery selector (multi-image uploader) | Array of `absint` attachment IDs; MIME validation (`image/jpeg`, `image/png`, `image/webp`) | `wp_get_attachment_image( $id, 'large' )`; `esc_url( wp_get_attachment_image_url( $id, 'full' ) )` for lightbox link | No | Comma-delimited list or array of media attachment IDs displaying certified cleanrooms, analytical HPLC systems, and bioreactor banks for `gallery-cleanroom.php`. |

---

### Failure Point 3: Architectural Decision Record (ADR) for Modeling Facilities as Metadata

#### 3.1 Architectural Justification
In accordance with `.agents/rules/decision-making.md`, an explicit architectural trade-off evaluation must be incorporated into Deliverable 04 Section 2.1 (and registered in `06_IA_DECISION_LOG.md`).

#### 3.2 Exact Drop-In Text for Section 2.1.1 (ADR: Physical Facility & Cleanroom Data Modeling)

```markdown
### 2.1.1 Architectural Decision Record (ADR): Physical Facilities & Cleanrooms Data Modeling

#### Context & Problem Statement
Rahnab Pharmed subsidiaries own and operate premier national life-science physical assets:
- **Tamin Plasma Nozhin:** 150,000-liter automated plasma fractionation complex (Sepehr Industrial Complex).
- **Persis Gene:** 1,500 m² cleanroom accelerator suite with 500L/2,000L microbial and mammalian bioreactor trains.
- **Nozhin Zist Pharmed:** Finished biopharmaceutical fill-and-finish plant.
- **Arc Zist Azma:** Comprehensive GLP-compliant analytical testing laboratories (physicochemical, cell bioassay, endotoxin testing).
A structural architectural decision is required: Should physical facilities, cleanrooms, and laboratories be modeled as a dedicated top-level Custom Post Type (`facility`) or as structured metadata repeater schemas embedded within the parent `company` CPT?

#### Option 1: Dedicated Custom Post Type (`facility`)
- **Advantages (مزایا):**
  - Independent permalinks for each physical building (`/facilities/sepehr-fractionation-plant/`).
  - Granular taxonomy tagging by cleanroom class (ISO 5 / Grade A, ISO 7 / Grade B).
  - Ability to associate a single shared facility with multiple subsidiaries in a M:N relationship.
- **Disadvantages (معایب):**
  - **Thin-Content SEO Penalties:** Individual cleanroom suites do not possess sufficient long-form narrative content to justify standalone URLs, creating crawl debt and thin-content search penalties.
  - **Fragmentation of Corporate Authority:** B2B pharmaceutical partners, overseas licensors, and institutional investors audit the legal, operating *company* (e.g. Nozhin Zist), not a detached physical room. Decoupling facilities from the corporate profile dilutes corporate stature.
  - **Editorial Overhead & Sync Complexity:** Requires content managers to maintain two distinct post types with bidirectional foreign keys for only 7 operating companies.

#### Option 2: Structured Metadata Schemas Embedded in `company` CPT (Selected)
- **Advantages (مزایا):**
  - **Institutional Unity:** Anchors physical infrastructure, cleanroom grades, and bioreactor capacities directly to the legal corporate entity holding the GMP licenses.
  - **Pristine B2B User Experience:** A single visit to `/subsidiaries/nozhin-zist-pharmed/` presents the complete enterprise profile: legal credentials, pipeline products, cleanroom specs, photo gallery, and leadership.
  - **Zero Orphan URLs:** Prevents indexation of hollow sub-pages while exposing full facility specs via REST API (`/wp-json/wp/v2/company/{id}`) as a structured JSON object.
  - **Editorial Efficiency:** Content editors manage all company data within a single screen under "Tab 3: Facilities & Technical Specs".
- **Disadvantages (معایب):**
  - Facilities cannot have individual standalone URLs (evaluated and determined to be an asset rather than a drawback for a corporate holding site).

#### Final Decision & Recommendation (پیشنهاد نهایی)
**Adopt Option 2 (Structured Metadata Schemas on `company` CPT).** Physical facilities, technical specifications, and cleanroom photograph galleries are strictly modeled via metadata fields `_rahnab_company_facility_specs`, `_rahnab_company_facility_locations`, and `_rahnab_company_facility_gallery`. If the holding commissions a multi-tenant shared research park in future milestones, a dedicated landing page (`page-infrastructure.php`) aggregates facility data directly from all 7 company profiles without data redundancy.
```

---

### Failure Point 4: Transient Cache Invalidation Gaps & Cross-Language Cache Poisoning

#### 4.1 Root Causes
1. **Multilingual Cache Poisoning:** Global keys like `rahnab_homepage_featured_news` do not include language scoping. If a Persian visitor triggers cache generation, English visitors loading `/en/` receive cached Persian headlines!
2. **Missing Achievement Invalidation:** `save_post` invalidates news transients but neglects `rahnab_company_{$id}_achievements`, leaving stale certifications for up to 24 hours.
3. **Relationship Reassignment Orphan Cache:** When an article's `_rahnab_news_related_company_id` is changed from Company 42 to Company 55, invalidating Company 55 leaves Company 42's transient caching the old article for up to 12 hours.

#### 4.2 Exact Drop-In Specification for Section 5.2 (Transient Caching & Invalidation Architecture)

```markdown
### 5.2 Transient-Layer Caching & Lifecycle Invalidation Architecture

To deliver sub-50ms Time-To-First-Byte (TTFB) on high-traffic corporate holding pages while preventing N+1 database queries, reverse relational queries are cached in the WordPress Transient API.

#### 5.2.1 Deterministic, Locale-Scoped Transient Key Standard
All transient keys are strictly scoped by language/locale (using `fa_IR` or `en_US` derived from Polylang's `pll_current_language('locale')` or `get_locale()`) and stay well within WordPress's 172-character transient key limit:

| Cache Scope | Transient Key Pattern | TTL | Data Cached |
|:---|:---|:---:|:---|
| **Global Featured News** | `rahnab_home_feat_news_{$locale}` | 6 Hours | Array of latest 3 featured news objects with thumbnails and formatted dual dates for the homepage hero. |
| **Subsidiary News Feed** | `rahnab_comp_{$company_id}_news_{$locale}` | 12 Hours | Array of latest 3 published news articles linked to the specified subsidiary ID. |
| **Subsidiary Achievements** | `rahnab_comp_{$company_id}_ach_{$locale}` | 24 Hours | Array of verified credentials, GMP seals, and patent IDs linked to the specified subsidiary ID. |
| **Subsidiaries Archive Summary** | `rahnab_subsidiaries_summary_{$locale}` | 24 Hours | Batch pre-fetched array of all 7 subsidiaries with metadata, pipeline counts, and primary cluster pills, eliminating N+1 queries on `/subsidiaries/`. |

#### 5.2.2 Dual-ID Cache Invalidation & Post-Save Lifecycle Hooks
Cache invalidation in `rahnab_core` executes on `save_post`, `wp_trash_post`, `before_delete_post`, and `untrash_post`.

##### Multi-ID & Reassignment Invalidation Algorithm:
1. **Pre-Save Interception:** On `save_post_news`, `save_post_event`, and `save_post_achievement`:
   - Inspect existing database values before meta update:
     `$old_company_ids = get_post_meta( $post_id, '_rahnab_..._related_company_id' );`
   - Read incoming company IDs from `$_POST`: `$new_company_ids`.
   - Merge both sets: `$impacted_ids = array_unique( array_filter( array_merge( (array)$old_company_ids, (array)$new_company_ids ) ) );`
2. **Purge Affected Entities Across All Locales:**
   - For every ID in `$impacted_ids`:
     - Delete `rahnab_comp_{$id}_news_fa_IR` and `rahnab_comp_{$id}_news_en_US`
     - Delete `rahnab_comp_{$id}_ach_fa_IR` and `rahnab_comp_{$id}_ach_en_US`
3. **Purge Global Holding Aggregates:**
   - Delete `rahnab_home_feat_news_fa_IR` and `rahnab_home_feat_news_en_US`
   - Delete `rahnab_subsidiaries_summary_fa_IR` and `rahnab_subsidiaries_summary_en_US`
4. **Company Profile Updates:**
   - When a post of type `company` is saved or trashed:
     - Delete `rahnab_comp_{$post_id}_news_{$locale}` and `rahnab_comp_{$post_id}_ach_{$locale}` for all active locales.
     - Delete `rahnab_subsidiaries_summary_{$locale}` for all active locales.
```

---

### Failure Point 5: Contradiction in Taxonomy Hierarchy (`value_chain_stage`)

#### 5.1 Root Cause
In Section 1 (line 34), the Entity Topology diagram shows:
`value_chain_stage │ (Taxonomy: Flat)`
However, Section 3 (line 148) and Deliverable 01 define:
`value_chain_stage | Hierarchical: Yes`

#### 5.2 Architectural Resolution & Exact Drop-In Correction
1. **Correct Section 1 Diagram (Line 34):**
   Change `(Taxonomy: Flat)` to `(Taxonomy: Hierarchical)`.
2. **Architectural Justification:**
   - Biopharmaceutical value chains are inherently hierarchical:
     - Cluster 1: *R&D & Biotechnology Incubation* (Persis Gene)
     - Cluster 2: *Cell Therapy & Advanced Regenerative Medicine* (KarayaKhteh / CARTIMED)
     - Cluster 3: *Biomanufacturing & Recombinant Therapeutics* (Nozhin Zist Pharmed, Baya Zist Pharmed)
     - Cluster 4: *Plasma Collection & Industrial Fractionation* (Tamin Plasma Nozhin)
     - Cluster 5: *Therapeutic Sera & Immunoglobulins* (Padra Serum Alborz)
     - Cluster 6: *Biological Quality Control & GLP Analytics* (Arc Zist Azma)
   - In WordPress admin, a hierarchical taxonomy generates structured checkbox controls, preventing editors from creating misspelled or duplicate freeform tags.
   - It supports structured rewrite slugs: `/subsidiaries/cluster/{cluster-slug}/`.

---

### Failure Point 6: Multi-Subsidiary Relational Architecture (M:N via Repeating Scalar Meta Rows)

#### 6.1 Root Cause & Empirical Challenge
In integrated life-science holdings, joint ventures and collaborative announcements between subsidiaries are standard (e.g. *Persis Gene* scales up a recombinant cell line that *Nozhin Zist Pharmed* manufactures in industrial bioreactors). Storing a single scalar dropdown locks an article to only one subsidiary, forcing editors to arbitrarily omit partner companies or assign to Holding (`0`), erasing the news from subsidiary profiles.

#### 6.2 Architectural Solution: Repeating Scalar Meta Rows in Native `wp_postmeta`
WordPress `wp_postmeta` is inherently a 1:N table. Storing multiple rows with the exact same `meta_key` and distinct scalar integer values:
```text
post_id | meta_key                         | meta_value
500     | _rahnab_news_related_company_id  | 42
500     | _rahnab_news_related_company_id  | 55
```
- **Indexing & Performance:** Querying via `WP_Query` with `meta_query` (`key = '_rahnab_news_related_company_id'`, `value = 42`, `compare = '='`, `type = 'NUMERIC'`) executes an **exact equality B-Tree index lookup** in MySQL (sub-2ms).
- **Zero Serialized Arrays:** Eliminates serialized strings (`a:2:{...}`) and catastrophic `LIKE '%"42"%'` full-table scans.
- **Admin UI:** Select2 multi-select dropdown or checkbox list displaying all 7 subsidiaries + option `0` (هلدینگ رهناب / Holding Umbrella).
- **Save Contract in `rahnab_core`:**
  ```php
  delete_post_meta( $post_id, '_rahnab_news_related_company_id' );
  foreach ( $selected_company_ids as $company_id ) {
      add_post_meta( $post_id, '_rahnab_news_related_company_id', absint( $company_id ) );
  }
  ```
- **Read Contract in Templates:**
  ```php
  // Returns array of integer IDs: [42, 55]
  $related_company_ids = get_post_meta( $post_id, '_rahnab_news_related_company_id', false );
  ```

#### 6.3 Exact Drop-In Update for Schema Fields
Update Field 21 (News), Field 33 (Event), and Field 39 (Achievement) across Section 4 and Section 5.1 to specify **repeating scalar integer rows** with multi-select UI.

---

### Failure Point 7: Post Lifecycle Hooks & Defensive Rendering (Orphan Protection)

#### 7.1 Root Cause & PHP 8 Vulnerability
If a subsidiary company (e.g. ID 42) is trashed or permanently deleted:
- **Deletion:** `get_post(42)` returns `null`. On PHP 8.0+, `$company->post_title` triggers a fatal `Uncaught TypeError: Attempt to read property "post_title" on null`, causing a complete HTTP 500 white screen crash on news, event, and achievement pages.
- **Trashing:** `get_post(42)` returns a `WP_Post` object with `post_status = 'trash'`. Outputting `get_permalink(42)` causes public visitors to click into a 404 error page.

#### 7.2 Exact Drop-In Specification for Section 5.3 (Lifecycle Hooks & Defensive Rendering Contract)

```markdown
### 5.3 Post Lifecycle Hooks & Strict Defensive Rendering Contract

#### 5.3.1 Automated Lifecycle Cleanup Hooks (`rahnab_core`)
To prevent dangling foreign keys and maintain relational database integrity without native MySQL CASCADE constraints:

1. **`before_delete_post` Hook:**
   When a post of type `company` is permanently deleted:
   - Execute targeted SQL cleanup via `$wpdb` in `rahnab_core`:
     Delete all rows from `wp_postmeta` where `meta_key` IN (`_rahnab_news_related_company_id`, `_rahnab_event_related_company_id`, `_rahnab_achievement_related_company_id`) AND `meta_value = $deleted_post_id`.
   - For any child post that now possesses zero related companies, insert a fallback record with `meta_value = 0` (Holding Umbrella).
2. **`wp_trash_post` Hook:**
   When a `company` post is moved to Trash:
   - Purge all transient caches associated with this company ID.
   - Retain database records intact so that restoring the post via `untrash_post` immediately restores relationships without data loss.
3. **`untrash_post` Hook:**
   - Invalidate transients to immediately restore published relationships.

#### 5.3.2 Strict Defensive Rendering Contract in Templates
All Classic WordPress template files and template parts resolving company relationships MUST execute through a defensive helper function (`rahnab_get_related_companies()`) and enforce PHP 8 nullsafe checks:

```php
/**
 * Safely resolves related company objects for a given post.
 *
 * @param int $post_id Post ID (news, event, achievement).
 * @param string $meta_key Relational meta key.
 * @return WP_Post[] Array of valid, published WP_Post objects. Empty array if Holding or none.
 */
function rahnab_get_related_companies( int $post_id, string $meta_key = '_rahnab_news_related_company_id' ): array {
    $raw_ids = get_post_meta( $post_id, $meta_key, false );
    if ( empty( $raw_ids ) ) {
        return [];
    }

    $valid_companies = [];
    foreach ( (array) $raw_ids as $cid ) {
        $cid = absint( $cid );
        if ( $cid > 0 ) {
            $company = get_post( $cid );
            // Verify object exists and is publicly published (not trashed, draft, or private)
            if ( $company instanceof WP_Post && 'publish' === get_post_status( $company ) ) {
                $valid_companies[] = $company;
            }
        }
    }
    return $valid_companies;
}
```

Templates render subsidiary badges if `!empty($valid_companies)`. If empty (or containing only `0`), templates safely output the Holding Umbrella badge (*روابط عمومی هلدینگ رهناب*) with zero fatal errors and zero 404 links.
```

---

### Failure Point 8: Exhaustive Metadata Schema Hardening & Output Escaping

#### 8.1 Root Cause & Security Gaps
- Tables 4.1–4.4 lacked an explicit **Output Escaping Function** column. In Classic WordPress theme development, every single dynamic output must be escaped per `.agents/rules/wordpress-development.md`.
- Field 15 phone regex (`/^0[0-9]{2,3}[0-9]{7,8}$/`) strictly rejects hyphenated numbers (`021-49361200`) and international prefixes (`+982149361200`).
- SVG upload (`_rahnab_company_brandmark_svg`) lacks security sanitization specifications.
- JSON repeaters lack recursive sanitization rules.

#### 8.2 Security Policies for Specialized Data Types
1. **Corporate Telephone Validation & Normalization:**
   - Update Regex: `/^(?:\+98|0)?(?:[0-9]{2,3})[- ]?[0-9]{7,8}$/`
   - Normalization on save: Store raw stripped numbers or normalized format.
   - Output Escaping: `href="<?php echo esc_attr( 'tel:' . preg_replace( '/[^0-9+]/', '', $phone ) ); ?>"` and `<?php echo esc_html( $phone ); ?>`.
2. **SVG Security & Vector Brandmarks:**
   - File uploads must enforce `image/svg+xml` MIME check and be sanitized via an XML-safe parser (e.g. `DOMDocument` parser stripping `<script>`, `<foreignObject>`, and `on*` attributes) via `rahnab_core` or `Safe_SVG`.
   - Template Output: Rendered via `wp_get_attachment_image( $id, 'full' )` or inline SVG passed through `wp_kses( $svg_content, rahnab_allowed_svg_tags() )`.
3. **JSON Repeater Schemas (`pipeline` and `facility_specs`):**
   - Save Sanitization: Recursive `array_map` with `sanitize_text_field()` per key, validated against defined schema before `wp_json_encode()`.
   - Template Output: Decoded via `json_decode( $meta, true )`, each string passed through `esc_html()` / `esc_attr()`.

#### 8.3 Exact Drop-In Tables with Complete Output Escaping Specifications

##### Table 4.1: Metadata Schema for `company` CPT (21 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 1 | `_rahnab_company_legal_name_en` | نام رسمی انگلیسی / Legal Name EN | `string` | Text input | `sanitize_text_field`, max 150 chars | `esc_html()`, `esc_attr()` | **Yes** | Official international legal registration title (e.g. *Nozhin Zist Pharmed Co.*) |
| 2 | `_rahnab_company_national_id` | شناسه ملی / National ID | `string` | Number input (11 digits) | Regex: `/^[0-9]{11}$/`, `sanitize_text_field` | `esc_html()`, `esc_attr()` | **Yes** | 11-digit verified Iranian corporate national ID (e.g. `14012098694`) |
| 3 | `_rahnab_company_reg_number` | شماره ثبت / Registration No. | `string` | Text input | `sanitize_text_field`, max 25 chars | `esc_html()`, `esc_attr()` | **Yes** | Corporate registration filing number (e.g. `83` or `452779`) |
| 4 | `_rahnab_company_est_year_shamsi` | سال تأسیس (شمسی) / Est. Year (SH) | `integer` | Number input | Min: 1350, Max: 1420, `absint` | `absint()`, `number_format_i18n()` | **Yes** | Solar Hijri foundation year (e.g. `1393`) |
| 5 | `_rahnab_company_est_year_gregorian` | سال تأسیس (میلادی) / Est. Year (AD) | `integer` | Number input | Min: 1970, Max: 2040, `absint` | `absint()`, `number_format_i18n()` | **Yes** | Gregorian foundation year (e.g. `2014`) |
| 6 | `_rahnab_company_website_url` | وب‌سایت رسمی / Official Website | `url` | URL input | `esc_url_raw`, protocol check (`https://`) | `esc_url()` | **Yes** | Outbound official domain (e.g. `https://arcbioassay.com`) |
| 7 | `_rahnab_company_ceo_name_fa` | نام مدیرعامل (فارسی) / CEO Name FA | `string` | Text input | `sanitize_text_field`, max 100 chars | `esc_html()` | No | Managing Director's name in Persian |
| 8 | `_rahnab_company_ceo_name_en` | نام مدیرعامل (انگلیسی) / CEO Name EN | `string` | Text input | `sanitize_text_field`, max 100 chars | `esc_html()`, `esc_attr()` | No | Managing Director's name in English |
| 9 | `_rahnab_company_ecosystem_role_fa` | جایگاه در زنجیره ارزش / Ecosystem Role FA | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()` | **Yes** | Persian value-chain summary (e.g. *اولین آزمایشگاه کنترل کیفی بیولوژیک کشور*) |
| 10 | `_rahnab_company_ecosystem_role_en` | جایگاه در زنجیره ارزش / Ecosystem Role EN | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()`, `esc_attr()` | **Yes** | English value-chain summary |
| 11 | `_rahnab_company_hq_address_fa` | نشانی دفتر / HQ Address FA | `text` | Textarea | `sanitize_textarea_field`, max 350 chars | `nl2br( esc_html( ... ) )` | **Yes** | Official physical corporate headquarters address in Persian |
| 12 | `_rahnab_company_hq_address_en` | نشانی دفتر / HQ Address EN | `text` | Textarea | `sanitize_textarea_field`, max 350 chars | `nl2br( esc_html( ... ) )` | **Yes** | Official headquarters address in English |
| 13 | `_rahnab_company_geo_lat` | عرض جغرافیایی / Latitude | `float` | Number input (step 0.000001) | `floatval`, range: -90.0 to 90.0 | `esc_attr( floatval( ... ) )` | **Yes** | GPS coordinate for Leaflet map pin |
| 14 | `_rahnab_company_geo_lng` | طول جغرافیایی / Longitude | `float` | Number input (step 0.000001) | `floatval`, range: -180.0 to 180.0 | `esc_attr( floatval( ... ) )` | **Yes** | GPS coordinate for Leaflet map pin |
| 15 | `_rahnab_company_contact_phone` | تلفن مستقیم / Phone Number | `string` | Tel input | Regex: `/^(?:\+98\|0)?(?:[0-9]{2,3})[- ]?[0-9]{7,8}$/` | `esc_attr( 'tel:' . ... )` / `esc_html( ... )` | **Yes** | Direct facility landline telephone (supports `021-XXXXXXXX` & `+98`) |
| 16 | `_rahnab_company_contact_email` | ایمیل سازمانی / Official Email | `email` | Email input | `sanitize_email`, `is_email` check | `esc_attr( 'mailto:' . antispambot( ... ) )` / `esc_html( antispambot( ... ) )` | **Yes** | Inbound B2B inquiry email protected via antispambot |
| 17 | `_rahnab_company_brandmark_svg` | لوگوی برداری / Vector Logo | `attachment_id` | Media uploader (SVG/PNG) | `absint`, MIME: `image/svg+xml`, `image/png`, XML sanitized | `wp_get_attachment_image()` or sanitized `wp_kses()` | **Yes** | High-DPI transparent vector emblem |
| 18 | `_rahnab_company_products_pipeline` | سبد محصولات و داروها / Products Pipeline | `serialized_json` | Structured repeater table | Schema check: `trade_name`, `generic`, `indication`, `stage`; recursive `sanitize_text_field()` | Decoded array elements passed to `esc_html()` / `esc_attr()` | No | Serialized JSON array of commercial and pipeline therapeutics |
| 19 | `_rahnab_company_facility_specs` | مشخصات فنی و تأسیسات / Facility Specs | `serialized_json` | Structured repeater table | Schema check: `title`, `cleanroom_grade`, `area_sqm`, `bioreactors`, `testing_scope`; recursive sanitization | Decoded array elements passed to `esc_html()` / `esc_attr()` | No | Serialized JSON array of cleanrooms and physical capacities |
| 20 | `_rahnab_company_facility_locations` | موقعیت کارخانه‌ها / Plant Locations | `text` | Textarea | `sanitize_textarea_field`, max 500 chars | `nl2br( esc_html( ... ) )` | **Yes** | Industrial plant locations separate from NIGEB HQ |
| 21 | `_rahnab_company_facility_gallery` | گالری تصاویر تأسیسات / Facility Gallery | `array` | Media Gallery selector | Array of `absint` IDs, MIME: `image/*` | `wp_get_attachment_image( $id, 'large' )`, `esc_url()` | No | Attachment IDs for `gallery-cleanroom.php` lightbox |

##### Table 4.2: Metadata Schema for `news` CPT (7 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 22 | `_rahnab_news_subtitle_fa` | زیرعنوان خبر (فارسی) / Subtitle FA | `string` | Text input | `sanitize_text_field`, max 250 chars | `esc_html()` | No | Secondary editorial lead sentence |
| 23 | `_rahnab_news_subtitle_en` | زیرعنوان خبر (انگلیسی) / Subtitle EN | `string` | Text input | `sanitize_text_field`, max 250 chars | `esc_html()` | No | English secondary editorial lead sentence |
| 24 | `_rahnab_news_related_company_id` | شرکت‌های مرتبط / Related Subsidiaries | `array_of_post_ids` | Select2 Multi-select / Checkbox list | Repeating scalar integer rows in DB; `absint` per row; verifies `company` post exists or `0` | `esc_html()`, `esc_url( get_permalink() )` | **Yes** | Repeating scalar foreign keys linking article to 1+ subsidiaries (`0` = Holding) |
| 25 | `_rahnab_news_press_release_pdf` | بیانیه رسمی (PDF) / Press Statement PDF | `attachment_id` | Media uploader (PDF) | `absint`, MIME: `application/pdf` | `esc_url( wp_get_attachment_url( ... ) )` | No | Downloadable official press release PDF |
| 26 | `_rahnab_news_source_attribution` | منبع خبر / Source Attribution | `string` | Text input | `sanitize_text_field`, max 120 chars | `esc_html()` | No | Citation source (e.g. *روابط عمومی هلدینگ رهناب*) |
| 27 | `_rahnab_news_is_featured` | خبر برگزیده / Featured Hero Article | `boolean` | Checkbox / Toggle (`0`/`1`) | `rest_sanitize_boolean` | `(bool) $val ? 'checked' : ''` | **Yes** | Highlights article on homepage and archive hero banner |
| 28 | `_rahnab_news_reading_time` | مدت مطالعه (دقیقه) / Reading Time | `integer` | Readonly / Calculated | `absint`, auto-calculated on save (200 wpm) | `absint()`, `number_format_i18n()` | No | Integer minutes estimated reading time |

##### Table 4.3: Metadata Schema for `event` CPT (8 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 29 | `_rahnab_event_start_datetime` | تاریخ و ساعت شروع / Start Date & Time | `datetime` | Date-time picker | ISO 8601 string: `Y-m-d H:i:s` | `esc_html()`, `esc_attr()` | **Yes** | Calendar ordering and lifecycle calculation |
| 30 | `_rahnab_event_end_datetime` | تاریخ و ساعت پایان / End Date & Time | `datetime` | Date-time picker | ISO 8601 string: `Y-m-d H:i:s`, >= Start | `esc_html()`, `esc_attr()` | **Yes** | Concluding timestamp |
| 31 | `_rahnab_event_venue_fa` | مکان برگزاری (فارسی) / Venue FA | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()` | **Yes** | Exhibition center or conference hall description |
| 32 | `_rahnab_event_venue_en` | مکان برگزاری (انگلیسی) / Venue EN | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()` | **Yes** | English venue description |
| 33 | `_rahnab_event_city_country` | شهر و کشور / City, Country | `string` | Text input | `sanitize_text_field`, max 100 chars | `esc_html()` | **Yes** | E.g. *Tehran, Iran* or *Dubai, UAE* |
| 34 | `_rahnab_event_booth_number` | شماره غرفه و سالن / Booth & Stand No. | `string` | Text input | `sanitize_text_field`, max 60 chars | `esc_html()`, `esc_attr()` | No | E.g. *Hall 5, Stand B-14* |
| 35 | `_rahnab_event_registration_url` | لینک ثبت‌نام / Registration URL | `url` | URL input | `esc_url_raw` | `esc_url()` | No | Outbound link to official event portal |
| 36 | `_rahnab_event_related_company_id` | شرکت‌های حاضر / Participating Entities | `array_of_post_ids` | Select2 Multi-select | Repeating scalar integer rows; `absint`, `0` = Holding | `esc_html()`, `esc_url( get_permalink() )` | **Yes** | Repeating scalar foreign keys linking event to 1+ participating subsidiaries |

##### Table 4.4: Metadata Schema for `achievement` CPT (7 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 37 | `_rahnab_achievement_award_date` | تاریخ اعطا یا ثبت / Award Date | `string` | Date picker (SH/AD) | String `YYYY-MM-DD` or year `139X` | `esc_html()` | **Yes** | Date certificate or license was issued |
| 38 | `_rahnab_achievement_issuing_body_fa` | مرجع صادرکننده (فارسی) / Issuing Body FA | `string` | Text input | `sanitize_text_field`, max 150 chars | `esc_html()` | **Yes** | E.g. *سازمان غذا و داروی وزارت بهداشت* |
| 39 | `_rahnab_achievement_issuing_body_en` | مرجع صادرکننده (انگلیسی) / Issuing Body EN | `string` | Text input | `sanitize_text_field`, max 150 chars | `esc_html()` | **Yes** | E.g. *Iran Food and Drug Administration (IFDA)* |
| 40 | `_rahnab_achievement_credential_id` | شماره مجوز یا پروانه / License / Reg ID | `string` | Text input | `sanitize_text_field`, max 80 chars | `esc_html()`, `esc_attr()` | No | Official license or patent registration code |
| 41 | `_rahnab_achievement_certificate_file` | تصویر گواهینامه / Certificate Document | `attachment_id` | Media uploader (PDF/Image) | `absint`, MIME: `image/*`, `application/pdf` | `esc_url( wp_get_attachment_url() )` | **Yes** | Scanned official certificate for modal inspection |
| 42 | `_rahnab_achievement_related_company_id` | نهاد صاحب دستاورد / Recipient Entity | `post_id` | Dropdown (`post_type=company`) | `absint`, `0` = Holding Umbrella | `esc_html()` | **Yes** | Scalar foreign key linking achievement to entity |
| 43 | `_rahnab_achievement_is_highlighted` | نمایش در شمارنده اعتبار / Trust Counter | `boolean` | Checkbox (`0`/`1`) | `rest_sanitize_boolean` | `(bool) $val ? 'checked' : ''` | **Yes** | Surfaces certificate in homepage credibility counters |

##### Table 4.5: Metadata Schema for Helper CPT `team_member` (Governance & Leadership) — 8 Fields

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 44 | `_rahnab_team_role_fa` | سمت و جایگاه سازمانی (فارسی) / Title FA | `string` | Text input | `sanitize_text_field`, max 120 chars | `esc_html()` | **Yes** | E.g. *رئیس هیئت‌مدیره* / *عضو شورای عالی علمی* |
| 45 | `_rahnab_team_role_en` | سمت و جایگاه سازمانی (انگلیسی) / Title EN | `string` | Text input | `sanitize_text_field`, max 120 chars | `esc_html()` | **Yes** | E.g. *Chairman of the Board* / *Scientific Advisor* |
| 46 | `_rahnab_team_academic_title_fa` | رتبه علمی (فارسی) / Academic Degree FA | `string` | Text input | `sanitize_text_field`, max 80 chars | `esc_html()` | No | E.g. *دکترای تخصصی بیوتکنولوژی دارویی، استاد تمام* |
| 47 | `_rahnab_team_academic_title_en` | رتبه علمی (انگلیسی) / Academic Degree EN | `string` | Text input | `sanitize_text_field`, max 80 chars | `esc_html()` | No | E.g. *Pharm.D., Ph.D., Professor of Biopharmaceutics* |
| 48 | `_rahnab_team_council_category` | رکن راهبری / Governance Pillar | `select` | Dropdown select | In array: `['board', 'executive', 'scientific']` | `esc_attr()` | **Yes** | Categorizes leader on `/about/governance/` |
| 49 | `_rahnab_team_bio_summary_fa` | سوابق اجرایی و علمی (فارسی) / Biography FA | `text` | Textarea | `sanitize_textarea_field`, max 500 chars | `nl2br( esc_html( ... ) )` | No | Executive background summary in Persian |
| 50 | `_rahnab_team_bio_summary_en` | سوابق اجرایی و علمی (انگلیسی) / Biography EN | `text` | Textarea | `sanitize_textarea_field`, max 500 chars | `nl2br( esc_html( ... ) )` | No | Executive background summary in English |
| 51 | `_rahnab_team_linkedin_url` | پروفایل لینکدین / LinkedIn Profile | `url` | URL input | `esc_url_raw`, domain check `linkedin.com` | `esc_url()` | No | Official professional LinkedIn profile |

---

### Failure Point 9: Admin Table Custom Column Specs for `event` and `achievement`

#### 9.1 Root Cause
Section 7.1 only detailed columns for `company` and `news`. Regulatory compliance officers and communications directors need rapid oversight into event schedules, venues, certificate statuses, and trust counter toggles directly from `edit.php`.

#### 9.2 Exact Drop-In Specification for Subsections 7.1.3 and 7.1.4

```markdown
### 7.1.3 `event` Admin List Screen (`edit.php?post_type=event`)
- **Columns (`manage_event_posts_columns`):**
  1. `cb`: Bulk checkbox.
  2. `thumbnail`: Featured cover preview (48x48px rounded).
  3. `title`: Event Title (Persian display name).
  4. `event_type`: Event Type Taxonomy Pill (*نمایشگاه / همایش علمی / کنگره بین‌المللی*).
  5. `event_dates`: Start & Concluding Date/Time with dual Solar Hijri and Gregorian badges.
  6. `venue`: Venue & City description (*مرکز همایش‌های رازی، تهران*).
  7. `participating_subsidiary`: Participating Subsidiary Badges (e.g. *نوژین زیست*, *پرسیس ژن*, or *هلدینگ رهناب*).
  8. `reg_status`: Registration link status indicator (Dashicon external link if active URL present).
  9. `languages`: Polylang translation flags & status.
  10. `date`: Publication timestamp.
- **Custom Quick Filters:**
  - Dropdown filter by `event_type` taxonomy.
  - Dropdown filter by `_rahnab_event_related_company_id`.
  - Date status filter: `[All Events | Upcoming | Concluded]`.
- **Sortable Columns:** `event_dates` (`_rahnab_event_start_datetime`), `title`.

### 7.1.4 `achievement` Admin List Screen (`edit.php?post_type=achievement`)
- **Columns (`manage_achievement_posts_columns`):**
  1. `cb`: Bulk checkbox.
  2. `file_preview`: Scanned certificate thumbnail / PDF preview icon with modal trigger.
  3. `title`: Credential Title (e.g. *گواهی انطباق با اصول GMP*).
  4. `recipient_entity`: Recipient Subsidiary Badge (e.g. *پادرا سرم البرز* or *هلدینگ رهناب*).
  5. `achievement_type`: Credential Type Taxonomy Pill (*GMP / IFDA / ISO / Patent*).
  6. `issuing_body`: Issuing Authority (*سازمان غذا و دارو*).
  7. `award_date`: Date Issued / Registered.
  8. `credential_id`: Official License / Patent Filing Code.
  9. `is_highlighted`: Trust Engine Status (Interactive AJAX star icon to toggle homepage prominence).
  10. `languages`: Polylang translation flags.
  11. `order`: Numeric `menu_order` for sorting display sequence.
- **Custom Quick Filters:**
  - Dropdown filter by `achievement_type` taxonomy.
  - Dropdown filter by `_rahnab_achievement_related_company_id`.
  - Toggle filter: `[All Credentials | Surfaced in Trust Engine]`.
- **Sortable Columns:** `award_date` (`_rahnab_achievement_award_date`), `order` (`menu_order`), `title`.
```

---

### Failure Point 10 (Bonus / Multilingual Integrity): Polylang Relational Synchronization & Reverse Backfill Hook

#### 10.1 Root Cause
1. In Section 7.3 table, "Cross-Entity Relational Links" were listed under `🔒 LOCKED & AUTOMATICALLY SYNCED`. If Polylang copies raw meta values, it copies Persian Company ID `42` directly to English News post #108.
2. If Persian Company #42 does not yet have an English translation, `pll_get_post(42, 'en')` returns `false`.
3. If set to `0` (Holding), what happens when English Company #108 is translated 3 days later? Without a backfill hook, English articles remain permanently disconnected from the subsidiary.

#### 10.2 Drop-In Specification for Section 7.3.1 (Polylang Mapping & Reverse Backfill Hook)
1. **Decouple from Default Raw Copy:**
   In `rahnab_core`, register the `pll_copy_post_metas` filter to **exclude** relational keys (`_rahnab_*_related_company_id`), ensuring raw foreign IDs are never blindly copied across languages.
2. **Translation Fallback Rule:**
   When translating an article, if `pll_get_post( $source_company_id, $target_lang )` returns `false` (subsidiary not yet translated):
   - Set `_rahnab_news_related_company_id` to `0` (Holding Umbrella).
   - Display a non-blocking administrative notice in the post editor: *"توجه: شرکت وابسته به این خبر هنوز ترجمه انگلیسی ندارد. انتساب خبر به طور موقت روی هلدینگ رهناب قرار گرفت."*
3. **Automated Reverse Backfill Hook (`pll_save_post` on `company`):**
   When a new language translation for a `company` post is published:
   - Identify the source company ID.
   - Query all posts in the target language whose source-language counterparts referenced the source company.
   - Automatically update their `_rahnab_news_related_company_id` to the newly published company translation ID.
   - Invalidate transients.

---

## 3. Structural Modification Blueprint for `04_WORDPRESS_CPT_ARCHITECTURE.md`

To execute these changes cleanly, `worker_m1_author` should apply the following targeted modifications to `04_WORDPRESS_CPT_ARCHITECTURE.md`:

1. **Line 34 (Section 1 Diagram):**
   Change `(Taxonomy: Flat)` to `(Taxonomy: Hierarchical)`.
2. **Section 2.1:**
   Insert Subsection `2.1.1 Architectural Decision Record (ADR): Physical Facilities & Cleanrooms Data Modeling` (from Section 2.3 above).
3. **Section 4 (Metadata Schemas):**
   - Replace Table 4.1 with the expanded 21-field table including Fields 19 (`_rahnab_company_facility_specs`), 20 (`_rahnab_company_facility_locations`), and 21 (`_rahnab_company_facility_gallery`), plus the **Output Escaping Function** column and updated phone regex.
   - Replace Tables 4.2, 4.3, 4.4 with hardened schemas featuring the **Output Escaping Function** column and multi-entity scalar relational postmeta specifications.
   - Append Table 4.5 specifying the 8 metadata fields for helper CPT `team_member`.
4. **Section 5 (Relational Architecture & Performance):**
   - Update Section 5.1 to formalize the **Native Repeating Scalar Postmeta Model** for M:N press releases.
   - Replace Section 5.2 with the **Deterministic, Locale-Scoped Transient Key Standard** (`_{$locale}`) and dual-ID cache purge logic.
   - Add Section 5.3 detailing **Post Lifecycle Hooks (`before_delete_post`, `wp_trash_post`) & Strict Defensive Rendering Contract**.
5. **Section 6.1 (Core Template Files):**
   - Correct template names: `archive-news.php` and `single-news.php`.
   - Add `archive-event.php` and `single-event.php`.
   - Document routing integration for `/news-events/` and `/news-events/entity/{slug}/`.
6. **Section 7.1 (Admin UX):**
   - Append Subsection 7.1.3 (`event` Admin List) and Subsection 7.1.4 (`achievement` Admin List).
7. **Section 7.3 (Bilingual Synchronization):**
   - Decouple relational foreign keys from raw Polylang sync.
   - Document the missing translation fallback and automated reverse backfill hook.

---

## 4. Verification & Testing Criteria for Iteration 2 Gate

The following criteria must be satisfied to guarantee 100% APPROVE / CLEAN verdicts from Reviewer 2, Challenger 2, and the Auditor:

| Verification Criterion | Expected Result in Updated Deliverable 04 | Validation Method |
|:---|:---|:---|
| **Core Template Hierarchy** | Table 6.1 contains `archive-news.php`, `single-news.php`, `archive-event.php`, `single-event.php`. Zero instances of `news_event.php`. | RegEx scan across Deliverable 04 |
| **Facility Metadata Completeness** | Table 4.1 contains Fields 19 (`facility_specs`), 20 (`facility_locations`), and 21 (`facility_gallery`). | Field key count check (21 fields) |
| **Architectural Decision Record** | Dedicated ADR in Section 2.1.1 comparing Option 1 (Standalone CPT) vs Option 2 (Structured Metadata) with explicit rationale. | String search for ADR 2.1.1 |
| **Transient Cache Locale Scoping** | All transient keys end with `_{$locale}` (e.g. `rahnab_home_feat_news_{$locale}`). Dual-ID purge and achievement purge explicitly detailed. | Search for `_{$locale}` and `rahnab_comp_{$id}_ach` |
| **Taxonomy Hierarchy Alignment** | Section 1 line 34 reads `(Taxonomy: Hierarchical)`. Section 3 affirms `Hierarchical: Yes`. | Line 34 text verification |
| **Multi-Subsidiary Relations** | Fields 21, 33, and 39 documented as repeating scalar integer rows in `wp_postmeta` supporting multiple subsidiary associations without serialized arrays. | Inspect schema storage structure column |
| **Post Lifecycle & Orphan Protection** | `before_delete_post` and `wp_trash_post` hooks specified; defensive nullsafe rendering contract (`rahnab_get_related_companies`) defined. | Inspect Section 5.3 specifications |
| **100% Explicit Output Escaping** | Every field in Tables 4.1–4.5 has an explicit escaping function (`esc_html`, `esc_attr`, `esc_url`, `nl2br`, `wp_kses`). Phone regex handles `021-49361200`. | Table column audit across all 51 fields |
| **Admin Table Columns** | Detailed custom column, filter, and sortable specifications for `event` and `achievement` in Section 7.1. | Inspect Subsections 7.1.3 & 7.1.4 |
| **Zero Implementation Code** | ZERO `.php`, `.css`, or `.js` theme/plugin implementation files created in the workspace. | `find_by_name` scan for implementation files |

---
*Report prepared by Explorer 2.1 (`explorer_m1_r2_cpt`). All specifications ready for immediate author integration.*
