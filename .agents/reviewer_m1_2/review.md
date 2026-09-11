# ARCHITECTURAL REVIEW REPORT: WordPress CPT & Data Architecture
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `REV-M1-02-CPT-ARCH`  
**Reviewer:** Reviewer 2 (WordPress CPT Architect Reviewer & Adversarial Critic)  
**Target Document:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md` (`RAHNAB-ARCH-M1-04`)  
**Cross-Referenced Deliverables:**
- `.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md`
- `.agents/orchestrator_m1/deliverables/03_CONTENT_HIERARCHY.md`
- `.agents/orchestrator_m1/deliverables/06_IA_DECISION_LOG.md`
- `.agents/orchestrator_m1/deliverables/INDEX.md`
- `.agents/orchestrator_m0/deliverables/02_SUBSIDIARY_RESEARCH.md`
- `docs/MASTER_PROJECT_BRIEF.md`
- `.agents/ORIGINAL_REQUEST.md`
**Standard Compliance:** `.agents/rules/wordpress-development.md`, `.agents/rules/code-quality.md`, `.agents/rules/decision-making.md`  
**Review Date:** 2026-09-09T20:58:00+03:30 (UTC: 2026-09-09T17:28:00Z)  

---

## 1. Review Summary

**Verdict: REQUEST_CHANGES**

### Executive Verdict Rationale
The WordPress Custom Post Type Architecture document (`04_WORDPRESS_CPT_ARCHITECTURE.md`) demonstrates commendable rigor in its entity modeling, scalar foreign key database strategy, and bilingual synchronization design. It successfully enforces the **STRICT ZERO PHP CODE** mandate for Milestone 1 with zero implementation files in the repository.

However, an exhaustive architectural review and adversarial stress-test have uncovered **four Major architectural discrepancies and three Minor technical defects** that directly compromise the implementation readiness of Milestone 2:
1. **WordPress Classic Template Hierarchy Violation & Missing Event Templates:** Section 6.1 invents non-standard template names (`archive-news_event.php` and `single-news_event.php`) for CPT `news`, which WordPress core template loader will fail to recognize without custom PHP filters. Furthermore, templates for CPT `event` (`archive-event.php` and `single-event.php`) are completely omitted despite CPT `event` possessing a public archive (`events`).
2. **Missing Facility Metadata Fields in Schema Table 4.1:** Table 4.1 omits critical facility specification fields (`facility_specs`, `facility_gallery`, `facility_locations`), creating an internal contradiction with Section 7.2 (Metabox Tab 3), Section 6.2 (`gallery-cleanroom.php`), and explicit user requirements.
3. **Absence of Architectural Justification for Facility Modeling:** Deliverable 04 lacks an explicit trade-off evaluation justifying why facilities are structured metadata on `company` rather than a detached CPT (a trade-off analyzed in explorer research but omitted from the final architectural specification).
4. **Transient Cache Invalidation Flaws & Locale Collision Risk:** The `save_post` listener purges news transients but fails to purge achievement transients (`rahnab_company_{$company_id}_achievements`), fails to handle relational target reassignment, and uses a non-locale-aware global transient key (`rahnab_homepage_featured_news`) that risks bilingual cache poisoning.

These defects must be resolved by the Milestone 1 Architecture Author before final sign-off.

---

## 2. Findings

### [Major] Finding 1: Classic WordPress Template Hierarchy Naming Violation & Missing CPT `event` Templates
- **What:** Section 6.1 (lines 264–265) defines `archive-news_event.php` and `single-news_event.php` for CPT `news`, and completely omits `archive-event.php` and `single-event.php`.
- **Where:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 6.1, Table 6.1, Lines 264–265; and Section 2.3, Lines 84–103.
- **Why:** 
  1. In standard WordPress Classic Theme Hierarchy, when post type `news` is queried, WordPress automatically looks for `archive-news.php` and `single-news.php`. WordPress core will **never** automatically load `archive-news_event.php` or `single-news_event.php`. Relying on custom `template_include` filter intercepts to load non-standard filenames violates WordPress Theme Standards (`.agents/rules/wordpress-development.md`).
  2. In Section 2.3, CPT `event` is registered with `has_archive => 'events'`, `slug => 'events'`, and `publicly_queryable => true`. Yet Table 6.1 provides zero template files for handling `/events/` or `/events/{slug}/`. If a visitor navigates to an event, WordPress will fall back to generic `archive.php` or `index.php`.
- **Suggestion:**
  1. Rename templates in Table 6.1 to conform to WordPress core hierarchy: `archive-news.php` and `single-news.php`.
  2. Add explicit template specifications for CPT `event`: `archive-event.php` (`is_post_type_archive('event')`) and `single-event.php` (`is_singular('event')`).
  3. If `/news-events/` is intended as a consolidated hub for both CPTs, explicitly document the architectural mechanism: either via `pre_get_posts` altering the main query on `archive-news.php` (`$query->set('post_type', ['news', 'event'])`), or a custom rewrite endpoint with dedicated template routing.

---

### [Major] Finding 2: Omission of Facility Specifications & Gallery in Metadata Schema (Table 4.1)
- **What:** Table 4.1 (`company` metadata schema) terminates at 18 fields (`_rahnab_company_products_pipeline`) and completely omits facility specifications, facility locations, and laboratory photography gallery.
- **Where:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 4.1, Lines 160–183.
- **Why:**
  1. The User Request explicitly instructed: *"Check fields for company (national_id, registration_number, establishment_year, website_url, ceo_name, hq_address, facility_locations, value_chain_position, key_products/services, certifications, etc.)."*
  2. Section 7.2 (line 316) of Deliverable 04 defines: *"Tab 3: Facilities & Technical Specs: Cleanroom grades, bioreactor capacities, analytical testing scopes."* Yet the fields supporting Tab 3 do not exist in Table 4.1.
  3. Section 6.2 (line 287) specifies template part `gallery-cleanroom.php`, and Deliverable 03 (Zone 5) requires a Cleanroom Photo Gallery. Without metadata fields `_rahnab_company_facility_specs` and `_rahnab_company_facility_gallery` (which were properly formulated in `explorer_m1_cpt/analysis.md`), the theme developer in Milestone 2 has no schema to implement.
- **Suggestion:**
  Add the missing fields to Table 4.1:
  - Field 19: `_rahnab_company_facility_specs` (Data Type: `serialized_json`, UI: Structured repeater table, Validation: Schema check for `title`, `cleanroom_grade`, `area_sqm`, `bioreactors`, `testing_scope`).
  - Field 20: `_rahnab_company_facility_locations` (Data Type: `string` / `text`, UI: Textarea, Validation: `sanitize_textarea_field`, physical plants separate from NIGEB HQ, e.g., Sepehr Industrial Complex, Safadasht).
  - Field 21: `_rahnab_company_facility_gallery` (Data Type: `comma_separated_ids` / `array`, UI: Media Gallery selector, Validation: Array of `absint` attachment IDs, MIME: `image/*`).

---

### [Major] Finding 3: Missing Architectural Trade-Off Justification for Modeling Facilities as Metadata
- **What:** Deliverable 04 contains no explicit architectural justification section explaining why facilities, cleanrooms, and laboratories are modeled as structured metadata on `company` rather than as a standalone CPT (`facility`).
- **Where:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 1 and Section 2.
- **Why:**
  1. The User Request explicitly mandated: *"Check architectural justification for modeling facilities as structured metadata on `company` rather than a detached CPT."*
  2. While this trade-off was evaluated in `explorer_m1_cpt/analysis.md` (Section 1.1.B), it was omitted from Deliverable 04 and from `06_IA_DECISION_LOG.md`.
  3. In enterprise biopharma architecture, deciding whether physical assets (such as the 150,000L Sepehr Fractionation Complex or NIGEB Cleanroom Suites) have standalone URLs or live within the operating company profile is a major information architecture decision that must be formally recorded per `.agents/rules/decision-making.md`.
- **Suggestion:**
  Add a dedicated subsection to Section 1 or Section 2.1 of Deliverable 04 (and append as ADR 9 in Deliverable 06) formalizing Option 1 (Dedicated CPT `facility`) vs. Option 2 (Embedded Structured Metadata on `company`), detailing the pros, cons, and final justification (preserving corporate unity, avoiding thin-content orphan URLs, and anchoring physical infrastructure to legal corporate entities).

---

### [Major] Finding 4: Transient Cache Invalidation Gaps & Cross-Language Cache Collision Risk
- **What:** Section 5.2 (lines 238–248) specifies transient caching and `save_post` invalidation, but contains three critical performance/freshness defects:
  1. Invalidation omits `rahnab_company_{$company_id}_achievements`.
  2. Global transient `rahnab_homepage_featured_news` is not locale-aware.
  3. Reassignment of parent company does not purge the previously linked company's transient.
- **Where:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 5.2, Lines 238–248.
- **Why:**
  1. Line 242 establishes `rahnab_company_{$company_id}_achievements` with a 24-hour TTL. However, line 245 only specifies invalidation for `_news`. When a new regulatory certificate or IFDA lab approval is published, the subsidiary profile will display stale compliance data for up to 24 hours.
  2. Line 246 specifies `rahnab_homepage_featured_news` without language differentiation. If a Persian visitor triggers this cache, the transient stores Persian posts; an English visitor loading `/en/` would receive cached Persian headlines!
  3. If an editor edits a news item and changes `_rahnab_news_related_company_id` from Company 42 to Company 43, invalidating `rahnab_company_{$related_id}_news` only invalidates Company 43. Company 42's profile retains the stale reference until TTL expiry.
- **Suggestion:**
  1. Update Section 5.2 invalidation rules to explicitly purge `rahnab_company_{$related_id}_achievements` when CPT `achievement` is saved/updated/trashed.
  2. Enforce locale-specific global transient keys: `rahnab_homepage_featured_news_{$locale}` (e.g. `_fa` and `_en`).
  3. Specify that the cache invalidation hook must inspect `get_post_meta($post_id, '_rahnab_news_related_company_id', true)` prior to updating, purging both `$old_company_id` and `$new_company_id`.

---

### [Minor] Finding 5: Internal Contradiction in `value_chain_stage` Taxonomy Hierarchy
- **What:** The Entity Topology diagram in Section 1 (line 34) labels `value_chain_stage` as `(Taxonomy: Flat)`. Conversely, Section 3 (line 148) and Deliverable 01 (line 140) define `value_chain_stage` as `Hierarchical => true` (`Yes`).
- **Where:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 1, Line 34 vs. Section 3, Line 148.
- **Why:** In WordPress, a hierarchical taxonomy behaves like categories (with parent/child relations and checkbox UI), while a flat taxonomy behaves like tags (freeform text UI). Calling it "Flat" in the topology diagram creates confusion for developers.
- **Suggestion:** Correct line 34 in Section 1 diagram to `(Taxonomy: Hierarchical)`.

---

### [Minor] Finding 6: Undefined Fallback in Polylang Cross-Language Relationship Mapping
- **What:** Section 7.3.1 (lines 340–346) describes how `pll_get_post($company_id, 'en')` automatically maps the English subsidiary ID when translating a news post. However, it fails to specify what occurs if the English translation of the subsidiary does not exist yet.
- **Where:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 7.3.1, Lines 340–346.
- **Why:** If `pll_get_post(42, 'en')` returns `false` / `null`, leaving the field unhandled could either set it to `0` (Holding), retain the Persian ID `42` (causing cross-language link contamination on the English site), or break the database query.
- **Suggestion:** Explicitly define the fallback behavior: *"If `pll_get_post($related_company_id, $target_lang)` returns false (subsidiary not yet translated), set `_rahnab_news_related_company_id` to `0` (Holding Umbrella) and log an editorial admin notice in the post edit screen prompting the user to translate the subsidiary."*

---

### [Minor] Finding 7: Omission of Admin Column Specifications for `event` and `achievement`
- **What:** Section 7.1 specifies custom admin list table columns and filters for `company` and `news`, but omits specifications for `event` and `achievement`.
- **Where:** `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 7.1, Lines 303–311.
- **Why:** Communications officers managing events and regulatory compliance officers managing certifications need quick visibility into event dates, venues, issuing bodies, and certificate expiry/status without opening each post.
- **Suggestion:** Add admin table column specifications for `event` (Title, Date & Time, Venue, Participating Subsidiary, Related Company, Bilingual Flags) and `achievement` (Title, Issuing Body, Award Date, Credential ID, Certificate File Indicator, Linked Subsidiary, Trust Counter Status).

---

## 3. Verified Claims

| # | Architectural Claim in Deliverable 04 | Verification Method | Result | Verification Notes |
|:---:|:---|:---|:---:|:---|
| 1 | STRICT ZERO PHP CODE constraint adhered to in M1 | Scanned workspace via `find_by_name` for `*.php` and `*style.css` | **PASS** | Confirmed 0 PHP files and 0 CSS files in workspace. Clean pure specification. |
| 2 | Core CPTs registered (`company`, `news`, `event`, `achievement`, `team_member`) | Inspected Section 2.1 through 2.5 of Deliverable 04 | **PASS** | All 5 CPTs defined with complete registration arguments, labels, REST support, and icons. |
| 3 | Helper CPT `team_member` has zero public orphan URLs | Inspected Section 2.5 parameters (`public => false`, `show_ui => true`, `has_archive => false`) | **PASS** | Completely private internal CMS post type; queried exclusively on `/about/governance/`. |
| 4 | Scalar Integer Foreign Key relational architecture | Inspected Section 5.1 and metadata field definitions (Fields 21, 33, 39) | **PASS** | Uses `post_id` scalar integers (`absint`) rather than unindexed serialized arrays. |
| 5 | Metadata schema exceeds 30+ typed fields | Counted and validated fields in Section 4.1 to 4.4 | **PASS** | 40 typed fields specified with labels, UI inputs, validation rules, and required flags. |
| 6 | 7 Confirmed Subsidiaries accurately represented | Cross-referenced against `02_SUBSIDIARY_RESEARCH.md` and `INDEX.md` | **PASS** | Al Salam successfully replaced by Arc Zist Azma; National IDs verified (`14012098694` & `14012987472`). |
| 7 | Modular Template Parts Architecture (`template-parts/`) | Inspected Section 6.2 structure | **PASS** | 14 granular template parts defined across 6 logical subdirectories. |
| 8 | Strict Bilingual Metadata Synchronization Rules | Inspected Section 7.3 table | **PASS** | Clear bifurcation between locked/auto-synced scalar fields and independently translated editorial fields. |

---

## 4. Adversarial Stress-Testing & Attack Surface Analysis

### 4.1 Challenge 1: The High-Volume Reverse Relationship N+1 Query Bottleneck
- **Assumption Challenged:** Storing foreign keys on child entities (`_rahnab_news_related_company_id = 42`) is inherently performant for all archive queries.
- **Attack Scenario:** On `/subsidiaries/` (archive page), 7 (or scaled to 20+) company cards are rendered. If each card runs an individual query to fetch its latest news and achievements without pre-fetching or caching:
  - 1 main query for companies + 20 queries for news + 20 queries for achievements = **41 separate database queries** on a single page load.
  - On standard shared or high-traffic hosting, this triggers significant TTFB degradation.
- **Blast Radius:** Severe latency (>1.5s TTFB) on portfolio directory pages during traffic spikes.
- **Mitigation:** Deliverable 04 specifies single-page transient caching (`rahnab_company_{$id}_news`), but MUST specify an archive-level batch pre-fetch strategy using `get_posts` with `post__in` or a unified transient for the archive directory view (`rahnab_subsidiaries_archive_summary_{$locale}`).

### 4.2 Challenge 2: In-Memory / Transient Cache Stampede on Cache Expiry
- **Assumption Challenged:** A 12-hour / 24-hour transient TTL prevents query spikes.
- **Attack Scenario:** When `rahnab_company_42_news` expires during a high-traffic press release announcement, 50 concurrent requests simultaneously miss the cache and simultaneously execute the reverse `meta_query` against MySQL.
- **Blast Radius:** MySQL thread exhaustion, 504 Gateway Timeouts on corporate holding site.
- **Mitigation:** In Milestone 2 theme development, implement early-renewal or lock-based transient generation (e.g. `wp_cache_add` lock pattern) in `rahnab_core`.

### 4.3 Challenge 3: Bilingual URL Desynchronization and Broken Language Switching
- **Assumption Challenged:** Standard Polylang language switcher automatically handles custom CPT archives and flat Latin slugs.
- **Attack Scenario:** An international visitor on `/subsidiaries/arc-zist-azma/` clicks the English switcher. If the English translation of Arc Zist Azma uses a different slug (e.g. `/en/subsidiaries/arc-bioassay/`) or does not exist yet:
  - User is either dumped onto a 404 page or redirected to `/en/`.
- **Blast Radius:** Frustration for international pharmaceutical partners and loss of institutional credibility.
- **Mitigation:** Deliverable 01 and 06 established ADR 8 (Graceful In-Page Bilingual Fallback). Deliverable 04 must ensure that `pll_get_post()` lookups in template files gracefully invoke this fallback layout rather than throwing 404s.

---

## 5. Coverage Gaps & Unexplored Areas

| Area | Risk Level | Finding & Recommendation |
|:---|:---:|:---|
| **Database Indexing for `wp_postmeta`** | **Medium** | Standard WordPress `wp_postmeta` only indexes `meta_key(191)`, not `meta_value`. Storing scalar integers in `meta_value` is vastly superior to serialized arrays, but MySQL still scans all rows matching `meta_key`. **Recommendation:** In Milestone 2 companion plugin (`rahnab_core`), specify adding a custom composite database index on `(meta_key(50), meta_value(20))` for relationship keys. |
| **User Role Capabilities** | **Low** | All CPTs currently map to default `capability_type => 'post'`. **Recommendation:** Acceptable for Milestone 1. For Milestone 2, evaluate whether `company` CPT requires a dedicated capability (`edit_companies`) to restrict subsidiary profile modifications to Holding Administrators. |
| **REST API Expose Controls** | **Low** | All CPTs have `show_in_rest => true`. Ensure that sensitive corporate metadata (such as internal direct phone numbers or draft pipeline notes) are filtered via `register_rest_field` authorization checks. |

---

## 6. Actionable Rectification Checklist for Author

To transition this deliverable to **APPROVED** status, the Milestone 1 Architecture Author must apply the following revisions to `04_WORDPRESS_CPT_ARCHITECTURE.md`:

- [ ] **1. Rectify Core Template Hierarchy in Table 6.1:**
  - Rename `archive-news_event.php` to `archive-news.php`.
  - Rename `single-news_event.php` to `single-news.php`.
  - Add `archive-event.php` (`is_post_type_archive('event')`).
  - Add `single-event.php` (`is_singular('event')`).
  - Document the query integration pattern if `/news-events/` unifies both post types.
- [ ] **2. Append Missing Facility Metadata Fields to Table 4.1:**
  - Add `_rahnab_company_facility_specs` (JSON repeater).
  - Add `_rahnab_company_facility_locations` (Textarea / location summary).
  - Add `_rahnab_company_facility_gallery` (Media gallery IDs).
- [ ] **3. Incorporate Explicit Architectural Justification for Facility Modeling:**
  - Add subsection in Section 2.1 detailing the Option 1 (Standalone CPT) vs Option 2 (Structured Metadata) trade-off and rationale.
- [ ] **4. Harden Transient Caching & Invalidation Protocol in Section 5.2:**
  - Add `rahnab_company_{$related_id}_achievements` to the `save_post` invalidation listener.
  - Enforce locale-aware keys for global transients (`rahnab_homepage_featured_news_{$locale}`).
  - Specify old/new related ID invalidation upon relationship updates.
- [ ] **5. Harmonize Taxonomy Hierarchy in Section 1 Diagram:**
  - Update line 34 from `(Taxonomy: Flat)` to `(Taxonomy: Hierarchical)`.
- [ ] **6. Specify Polylang Relationship Fallback in Section 7.3.1:**
  - Define explicit fallback behavior when `pll_get_post()` returns false.
- [ ] **7. Add Admin Table Columns for `event` and `achievement` in Section 7.1.**

---

*Report prepared by Reviewer 2 (WordPress CPT Architect Reviewer & Adversarial Critic).*
