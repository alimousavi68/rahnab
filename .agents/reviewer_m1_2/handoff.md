# Handoff Report: WordPress CPT Architecture Review
## Milestone 1 — Information Architecture & WordPress CPT Model

**Agent Role:** Reviewer 2 (WordPress CPT Architect Reviewer & Adversarial Critic)  
**Working Directory:** `/Users/user/Sites/localhost/rahnab/.agents/reviewer_m1_2`  
**Deliverable Reviewed:** `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`  
**Review Report:** `/Users/user/Sites/localhost/rahnab/.agents/reviewer_m1_2/review.md`  
**Handoff Type:** Hard (Complete Milestone Review Assessment)  
**Date:** 2026-09-09T20:59:00+03:30 (UTC: 2026-09-09T17:29:00Z)  

---

### 1. Observation

1. **Zero-Code Compliance Verification:**
   - Tool Command: `find_by_name(Pattern="*.php", SearchDirectory="/Users/user/Sites/localhost/rahnab")`
   - Result: `Found 0 results`.
   - Tool Command: `find_by_name(Pattern="*style.css", SearchDirectory="/Users/user/Sites/localhost/rahnab")`
   - Result: `Found 0 results`.
   - Observation: No PHP code, themes, or templates have been created in Milestone 1. The workspace contains only markdown specifications and project metadata.

2. **Template Hierarchy Naming & Missing Event Templates:**
   - File: `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`
   - Lines 264–265:
     ```text
     | archive-news_event.php | Custom Post Archive | is_post_type_archive('news') |
     | single-news_event.php  | Single Custom Post  | is_singular('news')          |
     ```
   - Lines 98–101:
     ```text
     | Has Archive     | true (has_archive => 'events')                 |
     | Rewrite Rules   | slug => 'events', with_front => false          |
     | Permalinks      | Persian: /events/{slug}/ | English: /en/events/{slug}/ |
     ```
   - Observation: Section 6.1 defines non-standard filenames `archive-news_event.php` and `single-news_event.php` for CPT `news` instead of standard `archive-news.php` and `single-news.php`. Table 6.1 completely omits template specifications for `archive-event.php` and `single-event.php` despite CPT `event` having an archive and permalinks defined in Section 2.3.

3. **Metadata Schema Omissions (Facility Specifications & Gallery):**
   - File: `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`
   - Lines 160–182: Table 4.1 contains 18 fields, ending with `_rahnab_company_products_pipeline`.
   - Line 316: `- **Tab 3: Facilities & Technical Specs:** Cleanroom grades, bioreactor capacities, analytical testing scopes.`
   - Line 287: `gallery-cleanroom.php -> Lightbox photo gallery for genuine laboratory assets`
   - Observation: Fields for cleanroom specifications (`_rahnab_company_facility_specs`), facility locations, and facility gallery (`_rahnab_company_facility_gallery`) exist in `explorer_m1_cpt/analysis.md` (lines 264–266) and are referenced in Section 7.2 Tab 3, but are omitted from Table 4.1 in Deliverable 04.

4. **Missing Architectural Justification for Facility Modeling:**
   - File: `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`
   - Sections 1 & 2: Search for `justification` or trade-off evaluation between standalone CPT `facility` vs. embedded metadata returns no dedicated rationale or ADR in Deliverable 04 or Deliverable 06.
   - Observation: While `explorer_m1_cpt/analysis.md` evaluated Option 1 vs Option 2 in Section 1.1.B, the author failed to incorporate this explicit architectural justification into Deliverable 04 as mandated by the User Request.

5. **Transient Invalidation & Locale Collision:**
   - File: `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`
   - Lines 241–246:
     ```text
     - Cache Key: rahnab_company_{$company_id}_news (TTL: 12 Hours)
     - Cache Key: rahnab_company_{$company_id}_achievements (TTL: 24 Hours)
     ...
     - Invalidates rahnab_company_{$related_id}_news
     - Invalidates global holding transient rahnab_homepage_featured_news
     ```
   - Observation: Line 245 does not invalidate `rahnab_company_{$related_id}_achievements`. Line 246 specifies `rahnab_homepage_featured_news` without a locale suffix (`_fa` vs `_en`).

6. **Internal Taxonomy Hierarchy Contradiction:**
   - Line 34: `│ value_chain_stage │ (Taxonomy: Flat) │`
   - Line 148: `| value_chain_stage | company | Hierarchical | subsidiaries/cluster | Yes |`
   - Observation: Section 1 diagram erroneously states that `value_chain_stage` is a flat taxonomy, directly contradicting the Section 3 table and Deliverable 01.

---

### 2. Logic Chain

1. **Premise 1 (WordPress Core Conventions):** WordPress Classic Theme Hierarchy determines template loading via specific file naming conventions (`archive-{$post_type}.php` and `single-{$post_type}.php`). (Supported by `.agents/rules/wordpress-development.md`).
2. **Inference 1:** Because CPT `news` is registered with key `news`, WordPress core will search for `archive-news.php` and `single-news.php`. It will never automatically load `archive-news_event.php` or `single-news_event.php`. Therefore, Table 6.1 violates WordPress theme standards and will cause template resolution failures unless custom filter hacks are implemented. (Supported by Observation 2).
3. **Premise 2 (Completeness of CPT Architecture):** If a post type is defined with `public => true`, `has_archive => true`, and public permalinks (`/events/{slug}/`), its archive and single views must have corresponding templates in the theme architecture.
4. **Inference 2:** Because CPT `event` has `has_archive => 'events'` and public URLs, omitting `archive-event.php` and `single-event.php` from Section 6.1 leaves CPT `event` without designated templates. (Supported by Observation 2).
5. **Premise 3 (Schema-UI Consistency):** The metadata schema in Section 4.1 must provide the underlying fields required by the UI metaboxes in Section 7.2 and the template parts in Section 6.2.
6. **Inference 3:** Section 7.2 defines Tab 3 for Facilities & Technical Specs, and Section 6.2 defines `gallery-cleanroom.php`. However, Table 4.1 omits facility specs and gallery fields. A developer in Milestone 2 cannot implement Tab 3 or `gallery-cleanroom.php` without these fields. (Supported by Observation 3).
7. **Premise 4 (Cache Invalidation Integrity):** All cached reverse queries must be invalidated upon post update, and cached data on bilingual sites must be segmented by locale.
8. **Inference 4:** Omitting `_achievements` cache invalidation results in stale compliance data for 24 hours. Omitting locale keys on `rahnab_homepage_featured_news` creates bilingual cache contamination on the homepage. (Supported by Observation 5).
9. **Conclusion from Inferences 1–4:** The deliverable is structurally sound in its foundation, but contains material discrepancies in template hierarchy, schema completeness, architectural justification, and cache invalidation that prevent unconditional approval. Therefore, the verdict must be **REQUEST_CHANGES**.

---

### 3. Caveats

- **No Caveats.** All deliverables, explorer analyses, project rules, and briefs were thoroughly inspected and cross-referenced.
- The scalar foreign key architecture and bilingual Polylang synchronization concept are confirmed to be robust in design, requiring only the specific rectifications detailed in `review.md`.

---

### 4. Conclusion

The WordPress Custom Post Type Architecture (`04_WORDPRESS_CPT_ARCHITECTURE.md`) is **provisionally strong but technically incomplete**. The verdict is **REQUEST_CHANGES**.

The author (`worker_m1_author`) must execute the 7 actionable items listed in Section 6 of `/Users/user/Sites/localhost/rahnab/.agents/reviewer_m1_2/review.md`, specifically:
1. Standardize template names to `archive-news.php` and `single-news.php`, and add `archive-event.php` and `single-event.php`.
2. Add `_rahnab_company_facility_specs`, `_rahnab_company_facility_locations`, and `_rahnab_company_facility_gallery` to Table 4.1.
3. Add explicit architectural justification for modeling facilities as structured metadata on `company` (Option 1 vs Option 2).
4. Update transient cache invalidation to include achievements, locale suffixes (`_fa`/`_en`), and previous relationship purging.
5. Harmonize `value_chain_stage` taxonomy hierarchy in Section 1 diagram (`Hierarchical`).
6. Specify fallback behavior in Polylang synchronization when English subsidiary translation is absent.
7. Provide admin table column specifications for `event` and `achievement` CPTs.

---

### 5. Verification Method

To verify the findings and the resulting corrections:
1. **Template Hierarchy Inspection:** Check Table 6.1 in `04_WORDPRESS_CPT_ARCHITECTURE.md` for standard filenames (`archive-news.php`, `single-news.php`, `archive-event.php`, `single-event.php`).
2. **Metadata Schema Inspection:** Verify Table 4.1 has 21+ fields including facility specs, locations, and gallery IDs.
3. **Cache Invalidation Check:** View Section 5.2 and verify `rahnab_company_{$related_id}_achievements` and `rahnab_homepage_featured_news_{$locale}` are present.
4. **Zero-Code Invalidation Check:** Run `find . -name "*.php" -o -name "*.css"` from the workspace root to confirm that no code files were prematurely introduced.
