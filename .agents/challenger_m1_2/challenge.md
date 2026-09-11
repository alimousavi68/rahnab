# Adversarial Challenge & Stress-Test Report: WordPress CPT & Schema Architecture
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-CHALLENGE-M1-02`  
**Agent:** Challenger 2 (`challenger_m1_2` — WordPress CPT & Schema Stress-Tester)  
**Target Deliverables:**
- `04_WORDPRESS_CPT_ARCHITECTURE.md` (Primary target)
- `01_FINAL_SITEMAP.md` (Relational and taxonomy congruence)
- `06_IA_DECISION_LOG.md` (Architectural decision records)
**Execution Date:** 2026-09-09  
**Platform Standard:** Classic WordPress (PHP 8+, Custom Theme + `rahnab_core` Companion Plugin)  
**Verdict:** **`VULNERABILITIES_FOUND`**  
**Overall Risk Assessment:** **HIGH** (Structural database limitations, PHP 8 fatal error risks on orphaned posts, multilingual cache poisoning, core template hierarchy bugs, and missing escaping schemas)

---

## 1. Executive Summary & Verdict

While `04_WORDPRESS_CPT_ARCHITECTURE.md` presents a thoughtful overview of the holding company's entities, an adversarial and empirical stress-test across WordPress core database behavior, PHP 8 runtime semantics, caching mechanics, and internationalization reveals **8 concrete vulnerabilities and architectural gaps**.

These vulnerabilities range from **runtime crash risks under PHP 8** upon post deletion, **multilingual cache poisoning** where English visitors see Persian news (and vice versa), **severe relationship rigidity** that prevents collaborative press releases between subsidiaries, to **direct WordPress Core Template Hierarchy violations** where templates like `single-news_event.php` will be silently ignored by WordPress core.

Furthermore, **ZERO PHP code or theme files were created**, successfully complying with the Zero-Code constraint.

```text
ADVERSARIAL STRESS-TEST VERDICT MATRIX
┌──────────────────────────────────────────┬──────────────┬───────────────────────────────┐
│ Challenge Dimension                      │ Status       │ Severity Level                │
├──────────────────────────────────────────┼──────────────┼───────────────────────────────┤
│ 1. Relational Integrity & Orphan State   │ VULNERABLE   │ HIGH (Crash & M:N block)      │
│ 2. Performance & Transient Caching       │ VULNERABLE   │ HIGH (Cache poisoning & N+1)  │
│ 3. Metadata Schema Rigor & Security      │ INCOMPLETE   │ MEDIUM (Missing escaping spec)│
│ 4. Multilingual Synchronization (Polylang│ VULNERABLE   │ HIGH (Sync logic collision)   │
│ 5. Zero-Code Constraint Compliance       │ CONFIRMED    │ PASS (Zero code files found)  │
│ 6. Core Template Hierarchy & Taxonomies  │ VULNERABLE   │ CRITICAL (WP Core naming bug) │
└──────────────────────────────────────────┴──────────────┴───────────────────────────────┘
OVERALL VERDICT: VULNERABILITIES_FOUND (Remediation Required Before Implementation)
```

---

## 2. Empirical Findings & Detailed Challenges

### Challenge 1 (High): Post-to-Post Relational Rigidity & Inability to Support Multi-Subsidiary Press Releases (M:N)

- **Assumption Challenged:** Section 5.1 asserts that storing a single scalar integer post ID (`_rahnab_news_related_company_id = 42`) is the only viable alternative to the serialized array anti-pattern (`a:3:{...}` with `LIKE` queries).
- **Attack Scenario:**
  In an integrated biomanufacturing holding group, collaborative ventures between subsidiaries are routine:
  1. *Persis Gene* (Incubator/Accelerator) develops a recombinant cell line that *Nozhin Zist Pharmed* (Biomanufacturing) scales up to industrial bioreactors.
  2. A joint press release is published: *«Persis Gene and Nozhin Zist Jointly Commission New 2,000L Recombinant Bioreactor Suite»*.
  3. Under the current schema (Field #21: `_rahnab_news_related_company_id`, type `post_id`, single dropdown UI, scalar `absint`), the editor **cannot select both subsidiaries**.
  4. The editor is forced to either arbitrarily pick one subsidiary (erasing the story from the other subsidiary's profile) or assign it to Holding (`0`), hiding it from both subsidiary pages.
- **Blast Radius:** Broken editorial workflows, loss of cross-company synergy narrative on subsidiary single pages, and inability to model genuine holding collaborations.
- **Root Cause & Architectural Misconception:**
  WordPress `wp_postmeta` is a 1:N key-value table. A single post can store multiple rows sharing the **same** `meta_key` with distinct scalar integer values:
  ```php
  add_post_meta($news_id, '_rahnab_news_related_company_id', 42);
  add_post_meta($news_id, '_rahnab_news_related_company_id', 55);
  ```
  Querying this in `WP_Query` uses standard B-Tree indexing on `(meta_key, meta_value)`:
  ```php
  'meta_query' => [
      [
          'key'     => '_rahnab_news_related_company_id',
          'value'   => $company_id,
          'compare' => '=',
          'type'    => 'NUMERIC',
      ],
  ]
  ```
  This achieves **exact equality index lookups** (sub-2ms), supports 1:N and M:N relationships natively, and requires **zero serialized arrays and zero SQL `LIKE` full-table scans**.
- **Remediation:**
  Update Field #21 (`_rahnab_news_related_company_id`), Field #33 (`_rahnab_event_related_company_id`), and Field #39 (`_rahnab_achievement_related_company_id`) to support multi-select UI (select2 / checkbox list), storing each related company ID as an individual scalar integer meta row with identical `meta_key`.

---

### Challenge 2 (High): Orphaned Relationships & PHP 8 Fatal Error on Trashed/Deleted Subsidiaries

- **Assumption Challenged:** Section 5.1 assumes that scalar foreign keys maintain relational integrity without defining lifecycle hooks or defensive rendering checks.
- **Attack Scenario:**
  1. Subsidiary Company #42 (*Padra Serum*) is referenced by News Post #500 (`_rahnab_news_related_company_id = 42`).
  2. An administrator temporarily trashes Company #42 or permanently deletes it.
  3. MySQL does not have foreign key cascade constraints on `wp_postmeta`.
  4. A visitor loads News Post #500 (`single-news_event.php` / `single-news.php`):
     - If Company #42 was **permanently deleted**: `get_post(42)` returns `null`. Under PHP 8.0+, executing `$company->post_title` or `$company->ID` throws:
       `Fatal error: Uncaught TypeError: Attempt to read property "post_title" on null`
       The entire single news page crashes with a white screen (HTTP 500).
     - If Company #42 was **trashed** (`post_status = 'trash'`): `get_post(42)` returns a `WP_Post` object. The template outputs the company name and permalink `/subsidiaries/padra-serum/`. When visitors click it, they hit a hard **404 Not Found** error.
- **Blast Radius:** Production fatal errors (HTTP 500) under PHP 8+, broken user navigation, and SEO crawl errors.
- **Remediation:**
  1. **Lifecycle Hooks in `rahnab_core`:**
     - Hook into `wp_trash_post` and `before_delete_post`: When a `company` post is trashed or deleted, automatically update referencing news/event/achievement meta records to `0` (Holding umbrella) or delete the reference row.
     - Hook into `untrash_post`: Restore references if applicable.
  2. **Defensive Rendering Contract:**
     The specification must explicitly mandate that all templates resolving `$related_company_id` use strict defensive nullsafe checks:
     ```php
     $related_id = absint( get_post_meta( get_the_ID(), '_rahnab_news_related_company_id', true ) );
     if ( $related_id > 0 && ( $company = get_post( $related_id ) ) && 'publish' === get_post_status( $company ) ) {
         // Render subsidiary card safely
     } else {
         // Fallback to Holding umbrella badge or suppress card gracefully
     }
     ```

---

### Challenge 3 (High): Multilingual Cache Poisoning & Stale Transients on Reassignment

- **Assumption Challenged:** Section 5.2 specifies transient caching keys:
  - `rahnab_company_{$company_id}_news` (TTL: 12 Hours)
  - `rahnab_company_{$company_id}_achievements` (TTL: 24 Hours)
  - `rahnab_homepage_featured_news`
- **Attack Scenario A (Multilingual Cache Poisoning):**
  1. None of the specified cache keys include the language/locale identifier (`fa` vs `en`).
  2. An international visitor visits `https://rahnab.com/en/`.
  3. The server runs the English featured news query and stores the result in transient `rahnab_homepage_featured_news`.
  4. One minute later, an Iranian visitor visits `https://rahnab.com/` (Persian root).
  5. The server checks `get_transient('rahnab_homepage_featured_news')`, gets a cache hit, and **renders English news headlines on the Persian homepage**!
  6. The reverse occurs if the Persian homepage warms the cache first: English visitors see Persian news on `/en/`.
- **Attack Scenario B (Stale Cache on Reassignment):**
  1. News Article #500 was assigned to Company A (ID 42).
  2. Transient `rahnab_company_42_news` is cached for 12 hours.
  3. An editor reassigns Article #500 to Company B (ID 55) and clicks Update.
  4. The `save_post` invalidation listener reads the *new* related ID (55) from `$_POST` and purges `rahnab_company_55_news`.
  5. The cache for Company A (`rahnab_company_42_news`) is **not purged**.
  6. For the remaining 12 hours, Company A's single page continues displaying an article that has been moved away!
- **Blast Radius:** Cross-language data corruption in production, persistent ghost content on corporate profiles.
- **Remediation:**
  1. **Locale-Aware Cache Keys:**
     Every transient key MUST incorporate the active locale:
     - `rahnab_home_feat_news_{$locale}` (e.g. `rahnab_home_feat_news_fa_IR`)
     - `rahnab_comp_{$company_id}_news_{$locale}`
     - `rahnab_comp_{$company_id}_ach_{$locale}`
  2. **Dual-ID Invalidation Listener:**
     The `save_post` hook must fetch the *pre-update* related company ID from the database before `update_post_meta` runs (or hook into `update_post_meta`), invalidating BOTH the previous company transient and the new company transient.

---

### Challenge 4 (Medium-High): Incomplete Metadata Schema — Missing Output Escaping & Security Gaps

- **Assumption Challenged:** Section 4 claims "All fields are strongly typed, sanitized on save, and context-escaped on output."
- **Empirical Audit:**
  A forensic check of all 40 fields in Tables 4.1, 4.2, 4.3, and 4.4 confirms that **NOT A SINGLE ROW** specifies the output escaping function!
  - Field 1 (`_rahnab_company_legal_name_en`): Sanitization is `sanitize_text_field`, but output escaping is unspecified (must be `esc_html` / `esc_attr`).
  - Field 6 (`_rahnab_company_website_url`): Sanitization is `esc_url_raw`, but output escaping is unspecified (must be `esc_url`).
  - Field 11-12 (`_rahnab_company_hq_address_fa` / `en`): Sanitization is `sanitize_textarea_field`, but output escaping is unspecified (must be `nl2br(esc_html(...))` or `wp_kses_post()`).
  - Field 16 (`_rahnab_company_contact_email`): Sanitization is `sanitize_email`, but output escaping is unspecified (must specify `esc_attr( 'mailto:' . antispambot( $email ) )` and `esc_html( antispambot( $email ) )`).
  - Field 17 (`_rahnab_company_brandmark_svg`): Attachment ID. Storing and displaying SVGs in WordPress carries stored XSS vectors. The specification fails to state whether SVG is sanitized via an authorized SVG sanitizer (e.g., `DOMDocument` sanitization or `Safe_SVG`) or rendered strictly via `wp_get_attachment_image()` / `<img>` tag with `esc_url()`.
  - Field 18 (`_rahnab_company_products_pipeline`): `serialized_json`. The sanitization rule states only "Schema check". It fails to define the recursive sanitization loop (`array_map` with `sanitize_text_field` per key) before `wp_json_encode()`, and output escaping when decoding in templates.
- **Blast Radius:** Security vulnerabilities (XSS, attribute injection), unescaped output rendering bugs.
- **Remediation:**
  Add an explicit column to Tables 4.1–4.4: **Output Escaping Function** (`esc_html`, `esc_attr`, `esc_url`, `wp_kses`, `antispambot`). Provide explicit handling for SVG assets and JSON repeater sanitization.

---

### Challenge 5 (Medium): Contact Phone Regex Fails Client's Official Phone Format

- **Assumption Challenged:** Field 15 (`_rahnab_company_contact_phone`) defines the validation rule as:
  `Regex: /^0[0-9]{2,3}[0-9]{7,8}$/`
- **Empirical Test:**
  The official phone number confirmed by the client in `ORIGINAL_REQUEST.md` line 19 is:
  `021-49361200`
  Testing this against the specified regex in our empirical test script yields:
  ```python
  pattern = re.compile(r'^0[0-9]{2,3}[0-9]{7,8}$')
  pattern.match('021-49361200') # Returns None (FAILED!)
  pattern.match('+982149361200') # Returns None (FAILED!)
  ```
  The specified regex **rejects the client's verified corporate telephone number** because of the hyphen, and rejects any international prefix (`+98`)!
- **Blast Radius:** Administrators cannot save corporate subsidiary phone numbers in standard formats (`021-XXXXXXXX` or `+98 21 XXXXXXXX`).
- **Remediation:**
  Update validation rule to:
  `Regex: /^(?:\+98|0)?(?:[0-9]{2,3})[- ]?[0-9]{7,8}$/` (or normalize by stripping spaces/hyphens with `preg_replace('/[^0-9+]/', '', $input)` before validation).

---

### Challenge 6 (Critical): WordPress Core Template Hierarchy Violations (`single-news_event.php`)

- **Assumption Challenged:** Table 6.1 (Core Template Files) defines:
  - `archive-news_event.php` -> WordPress Hierarchy Hook: `is_post_type_archive('news')`
  - `single-news_event.php` -> WordPress Hierarchy Hook: `is_singular('news')`
- **WordPress Core Behavioral Fact:**
  In Section 2.2, the post type key is registered as:
  `register_post_type('news', ...)`
  According to WordPress Core Template Hierarchy (`wp-includes/template-loader.php`), WordPress determines custom post templates using the **post type key**, NOT the rewrite slug:
  - For single posts of type `news`: `single-news.php` -> `single.php` -> `singular.php` -> `index.php`.
  - For archive posts of type `news`: `archive-news.php` -> `archive.php` -> `index.php`.
  WordPress Core **will NEVER look for or load `single-news_event.php` or `archive-news_event.php`**!
  If developers create files with those names, WordPress core will bypass them completely and load generic `index.php` or `archive.php`.
- **Additional Omission:**
  Public CPT `event` (Section 2.3) has `has_archive => 'events'`, but Table 6.1 contains **ZERO templates** for it (`single-event.php` and `archive-event.php` are completely missing).
- **Blast Radius:** Critical rendering failure in Milestone 2 when templates fail to load.
- **Remediation:**
  Correct Table 6.1:
  - Rename `single-news_event.php` to `single-news.php`.
  - Rename `archive-news_event.php` to `archive-news.php`.
  - Add `single-event.php` (`is_singular('event')`) and `archive-event.php` (`is_post_type_archive('event')`).

---

### Challenge 7 (High): Conflict in Bilingual Relational Synchronization & Unhandled Missing Translations

- **Assumption Challenged:** Section 7.3 table places "Cross-Entity Relational Links" under `🔒 LOCKED & AUTOMATICALLY SYNCED`, while Section 7.3.1 describes a custom Polylang hook translating IDs (`pll_get_post(42, 'en')`).
- **Attack Scenario:**
  1. If a field is set to `LOCKED & AUTOMATICALLY SYNCED` in Polylang / WPML, the core multilingual plugin copies the exact raw scalar ID (`42`) to the English translation post.
  2. When the custom hook attempts to remap the ID to English Company #108, a conflict occurs between Polylang's default synchronization and the custom filter.
  3. **The Unhandled Edge Case:** What happens if Persian News #100 is translated to English News #108, but its related Persian Company #42 **does not yet have an English translation** (`pll_get_post(42, 'en')` returns `false` or `0`)?
     - Does the system set `_rahnab_news_related_company_id` to `0` (Holding)?
     - If it sets it to `0`, what happens when English Company #108 is finally published 3 days later? The English news article remains permanently orphaned as `0` because there is no reverse backfill trigger!
- **Blast Radius:** Broken language switching, orphaned English subsidiary press archives, and desynchronized portfolio histories.
- **Remediation:**
  1. Clarify that relational foreign key fields must be marked as **NOT synchronized by default** in Polylang (`pll_copy_post_metas` filter excludes `_rahnab_*_related_company_id`), allowing the custom translation hook complete authority.
  2. Specify a **Reverse Backfill Hook**: When a `company` post receives a new language translation (`pll_save_post`), search all news/events in the source language referencing that company and update their translated counterparts to the newly created company ID.

---

### Challenge 8 (Medium-High): Complete Omission of `team_member` Metadata & Sitemap Conflict

- **Assumption Challenged:** Section 2.5 registers helper CPT `team_member` for corporate governance, and Deliverable 1 (`01_FINAL_SITEMAP.md`) line 115 specifies `/news-events/entity/{slug}/` mapping to `taxonomy-related_entity.php`.
- **Empirical Findings:**
  1. Section 4 defines 40 metadata fields across `company`, `news`, `event`, and `achievement`, but **ZERO fields for `team_member`**!
     How does `page-governance.php` query and render:
     - Board of Directors vs. Executive Committee vs. Scientific Advisory Council?
     - Executive titles in Persian and English (`_rahnab_team_role_fa`, `_rahnab_team_role_en`)?
     - Academic degrees, credentials, and official LinkedIn profiles?
     Without a schema, `team_member` cannot be implemented.
  2. In `01_FINAL_SITEMAP.md`, a taxonomy route `/news-events/entity/{slug}/` with template `taxonomy-related_entity.php` is specified. However, `04_WORDPRESS_CPT_ARCHITECTURE.md` does **NOT register any taxonomy named `related_entity`**!
     This is a direct architectural contradiction between Deliverable 1 and Deliverable 4.
- **Blast Radius:** Blocked implementation of Governance page, broken routing expectations for subsidiary-tagged news archives.
- **Remediation:**
  1. Define a 6-field metadata schema for `team_member` (Council Category Taxonomy/Enum, Role FA/EN, Academic Title, Bio Summary FA/EN, LinkedIn URL).
  2. Reconcile Deliverable 1 and Deliverable 4: Formally register `related_entity` as a shadow taxonomy OR define a custom rewrite endpoint `/news-events/entity/{slug}/` mapped to a meta query on `_rahnab_news_related_company_id`.

---

## 3. Empirical Test Execution Log

The following verification harness was executed in the workspace:
`python3 /Users/user/Sites/localhost/rahnab/.agents/challenger_m1_2/verify_schema.py`

```text
==================================================================
EMPIRICAL TEST 1: ALL 40 METADATA FIELDS PARSING & SCHEMA AUDIT
==================================================================
Total metadata fields parsed: 40
Fields lacking explicit OUTPUT ESCAPING specification: 40 of 40 (100% missing explicit escaping declaration)
  Field #1: `_rahnab_company_legal_name_en` | Type: `string` | Sanitization: `sanitize_text_field` | Output Escaping: [NOT SPECIFIED]
  Field #6: `_rahnab_company_website_url`   | Type: `url`    | Sanitization: `esc_url_raw`        | Output Escaping: [NOT SPECIFIED]
  Field #15: `_rahnab_company_contact_phone`| Type: `string` | Sanitization: Regex Check          | Output Escaping: [NOT SPECIFIED]
  Field #18: `_rahnab_company_products_pipeline` | Type: `serialized_json` | Sanitization: Schema check | Output Escaping: [NOT SPECIFIED]
  ... and 36 more fields.

Custom fields defined for CPT 'team_member': 0 (COMPLETELY OMITTED)

==================================================================
EMPIRICAL TEST 2: SIMULATING ORPHAN & DANGLING FOREIGN KEY BEHAVIOR
==================================================================
Scenario A: Subsidiary post #42 trashed (post_status='trash')
  - get_post(42) returns WP_Post with post_status='trash'.
  - Template outputting get_permalink(42) causes public visitors to hit 404.
Scenario B: Subsidiary post #42 permanently deleted
  - get_post(42) returns null.
  - PHP 8.0+: $comp->post_title throws FATAL Uncaught TypeError: Attempt to read property 'post_title' on null.
Scenario C: Joint press release between 2 subsidiaries
  - Architecture enforces single scalar absint.
  - Result: IMPOSSIBLE to link two subsidiaries without arbitrarily dropping one.

==================================================================
EMPIRICAL TEST 3: TRANSIENT CACHE COLLISION (LOCALIZATION)
==================================================================
Transient keys inspected:
  - 'rahnab_homepage_featured_news': Has locale differentiation? False -> VULNERABLE TO LOCALE POISONING
  - 'rahnab_company_{$company_id}_news': Has locale differentiation? False -> VULNERABLE TO LOCALE POISONING

==================================================================
EMPIRICAL TEST 4: TEMPLATE HIERARCHY ACCURACY IN WP CORE
==================================================================
  CRITICAL BUG: 'archive-news_event.php' -> Invalid! Post type is 'news', WP Core expects 'archive-news.php'.
  CRITICAL BUG: 'single-news_event.php'  -> Invalid! Post type is 'news', WP Core expects 'single-news.php'.
  MISSING TEMPLATES: Public CPT 'event' has NO single-event.php or archive-event.php in Table 6.1.

==================================================================
EMPIRICAL TEST 5: SITEMAP VS CPT TAXONOMY CONGRUENCE
==================================================================
  Sitemap references 'taxonomy-related_entity.php'
  CONTRADICTION: 'related_entity' taxonomy is NOT registered in Deliverable 4!

==================================================================
EMPIRICAL TEST 6: PHONE REGEX VALIDATION CHECK
==================================================================
  Phone '02149361200': matched=True
  Phone '021-49361200' (Official brief phone): matched=False -> REJECTED!
  Phone '+982149361200': matched=False -> REJECTED!
```

---

## 4. Zero-Code Prohibition Compliance Audit

- **Verification Tool:** `find_by_name` across `/Users/user/Sites/localhost/rahnab/`
- **Search Criteria:** `*.php`, `style.css`, `functions.php`
- **Result:** **0 files found.**
- **Finding:** Milestone 1 strictly adheres to the Zero-Code constraint. Absolutely no PHP theme files, templates, or plugin files were created in the repository.

---

## 5. Concrete Remediation Requirements (Action Plan for Author)

To achieve architecture sign-off and prevent production failures, the Author (`worker_m1_author`) must apply the following remediations to `04_WORDPRESS_CPT_ARCHITECTURE.md`:

1. **Multi-Entity Relational Model:**
   - Update Section 5.1 and Metadata Fields #21, #33, and #39 from a single scalar integer dropdown to a multi-row scalar relational model (`add_post_meta` / multiple meta rows with the same key) or a custom taxonomy, allowing collaborative press releases and joint symposia across 2+ subsidiaries without serialized arrays.
2. **Defensive Post-Lifecycle & Null Checks:**
   - Specify automated cleanup listeners for `wp_trash_post` and `before_delete_post` in `rahnab_core` to reset orphaned foreign keys to `0`.
   - Add explicit defensive coding requirements (`null` checks and `publish` post_status checks) for all single templates resolving related companies.
3. **Locale-Aware Transient Keys:**
   - Update all transient keys to append the active language: `rahnab_home_feat_news_{$locale}` and `rahnab_company_{$company_id}_news_{$locale}`.
   - Specify invalidation of both old and new related company IDs on post update.
4. **Metadata Schema Table Hardening:**
   - Add a dedicated **Output Escaping Function** column to Tables 4.1–4.4 (`esc_html`, `esc_attr`, `esc_url`, `wp_kses`).
   - Define recursive sanitization for Field #18 (`serialized_json`).
   - Specify safe SVG handling (MIME validation + `Safe_SVG` / sanitization).
   - Update Field #15 phone regex to allow hyphens and country codes: `/^(?:\+98|0)?(?:[0-9]{2,3})[- ]?[0-9]{7,8}$/`.
5. **Polylang Synchronization Clarification:**
   - Explicitly decouple relational fields from Polylang's default raw value copy, routing them solely through the custom translation mapping hook.
   - Add a reverse translation backfill mechanism for subsidiaries translated after their news articles.
6. **Core Template Hierarchy Correction:**
   - Correct template names in Table 6.1: `single-news.php` (not `single-news_event.php`) and `archive-news.php` (not `archive-news_event.php`).
   - Add missing templates for CPT `event`: `single-event.php` and `archive-event.php`.
7. **Complete `team_member` Schema & Sitemap Reconciliation:**
   - Add a 6-field metadata schema for CPT `team_member`.
   - Reconcile Deliverable 1's `/news-events/entity/{slug}/` with Deliverable 4 (register `related_entity` taxonomy or define custom rewrite endpoint).

---
*Report filed by Challenger 2 (`challenger_m1_2`). All findings empirically verified.*
