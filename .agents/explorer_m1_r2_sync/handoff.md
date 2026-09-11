# HANDOFF REPORT: Cross-Deliverable Harmonization & Worker Blueprint
## Milestone 1 Remediation (Iteration 2)
### Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `HND-M1-R2-SYNC-01`  
**Author Agent:** Explorer 2.3 (`explorer_m1_r2_sync` — Cross-Deliverable Harmonization Specialist)  
**Recipient Agent:** Milestone 1 Orchestrator (`parent`, ID: `6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1`) & Deliverables Author (`worker_m1_author`)  
**Parent Conversation ID:** `6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1`  
**Handoff Type:** Hard Handoff (Task complete, fully self-contained)  
**Date:** 2026-09-09T21:24:00+03:30 (Local) / 2026-09-09T17:54:00Z (UTC)  

---

## 1. Observation

Direct empirical observations from auditing the entire Milestone 1 deliverable suite and background research:

1. **CPT & Template Naming Desynchronization:**
   - Files:
     - `.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md` (lines 113, 116)
     - `.agents/orchestrator_m1/deliverables/03_CONTENT_HIERARCHY.md` (lines 150, 172, 182, 183)
     - `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md` (lines 264, 265)
     - `.agents/orchestrator_m1/deliverables/INDEX.md` (line 35)
   - Verbatim Code:
     - D01 line 113: `| archive-news_event.php |` and line 116: `| single-news_event.php |`
     - D03 line 150: `### 3.7 News & Events Hub (archive-news_event.php)`
     - D03 line 172: `WP_Query(['post_type' => 'news_event', 'posts_per_page' => 3])`
     - D03 lines 182–183: `single-news_event.php`
     - D04 lines 264–265: `archive-news_event.php` and `single-news_event.php`
   - Observation: In WordPress core (`template-loader.php`), custom post types look for `archive-{$post_type}.php` and `single-{$post_type}.php`. Because post types are registered as `news` and `event`, `news_event.php` will be silently ignored. In addition, templates for public CPT `event` (`archive-event.php` and `single-event.php`) were completely missing.

2. **Phantom Taxonomy vs Relational Route Contradiction:**
   - File: `.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md` (line 115, line 209) vs `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md` (Section 3, Section 5.1).
   - Verbatim Code:
     - D01 line 115: `| Subsidiary-Tagged News | https://rahnab.com/news-events/entity/{slug}/ | taxonomy-related_entity.php |`
     - D01 line 209: `2. Entity Association (related_entity / related_company_id):`
   - Observation: Deliverable 04 registers zero taxonomies named `related_entity`. Relationships are stored strictly via scalar post meta `_rahnab_news_related_company_id`. Calling it a taxonomy with template `taxonomy-related_entity.php` triggers an unhandled HTTP 404 in WordPress.

3. **Taxonomy Hierarchy Internal Contradiction:**
   - File: `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Section 1 line 34 vs Section 3 line 148 vs `.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md` line 140.
   - Observation: Line 34 diagram specifies `value_chain_stage │ (Taxonomy: Flat)`. Conversely, Section 3 line 148 and D01 line 140 define it as `Hierarchical => true`.

4. **Accidental Holding Identifier Leakage:**
   - File: `.agents/orchestrator_m1/deliverables/02_NAVIGATION_ARCHITECTURE.md`, line 148.
   - Verbatim Code:
     `[حریم خصوصی کاربران] • [شرایط استفاده سازمانی] • [نقشه تفصیلی سایت] • [شناسه ملی: ۱۴۰۱۲۹۸۷۴۷۲]`
   - Observation: In `02_SUBSIDIARY_RESEARCH.md` and `INDEX.md`, National ID `14012987472` belongs specifically to subsidiary venture **Tamin Plasma Nozhin (شرکت تأمین پلاسما نوژین)**. Placing it in the global holding footer bar of Rahnab Pharmed is an accidental metadata leak.

5. **Missing Architectural Decision Records (ADRs):**
   - File: `.agents/orchestrator_m1/deliverables/06_IA_DECISION_LOG.md`.
   - Observation: The file terminates at Architectural Decision 8. It lacks formal records for:
     - Decision 9: Facilities & Cleanrooms Modeling Architecture
     - Decision 10: Multi-Subsidiary News Relational Architecture
     - Decision 11: Transient Cache Locale Partitioning & Invalidation

6. **Missing Schema Fields & Output Escaping:**
   - File: `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md`, Tables 4.1–4.4.
   - Observation: Table 4.1 terminates at field 18, omitting cleanroom specs, facility locations, and gallery. None of the 40 fields specify output escaping functions. Helper CPT `team_member` has zero fields specified.

7. **Strict Zero-Code Compliance:**
   - Command: `find /Users/user/Sites/localhost/rahnab -name "*.php" -o -name "*style.css"`
   - Output: Exactly **0 files found**.

---

## 2. Logic Chain

1. **From Observation 1 to Template Synchronization:**
   - Because WordPress Core evaluates templates based on the registered post type key (`news` and `event`), harmonizing all references across D01, D03, D04, and INDEX to `archive-news.php`, `single-news.php`, `archive-event.php`, and `single-event.php` ensures native WordPress Classic loading without fragile PHP filter overrides.
   - Because D03 line 172 queries `'post_type' => 'news_event'`, correcting it to `'post_type' => 'news'` aligns the query with registered post types.

2. **From Observation 2 to Relational Route Harmonization:**
   - Because `_rahnab_news_related_company_id` is an indexed scalar foreign key post meta, updating D01 to map `/news-events/entity/{slug}/` to `archive-news.php` via custom query variable `company_slug` and rewrite rule `^news-events/entity/([^/]+)/?$` registered at `'top'` resolves the route cleanly without inventing phantom taxonomies.

3. **From Observation 3 to Taxonomy Hierarchy Harmonization:**
   - Updating D04 Section 1 line 34 from `(Taxonomy: Flat)` to `(Taxonomy: Hierarchical)` reconciles the entity topology diagram with Section 3 and D01, preserving category-style checkboxes in the WordPress admin panel.

4. **From Observation 4 to Legal Metadata Rectification:**
   - Replacing `[شناسه ملی: ۱۴۰۱۲۹۸۷۴۷۲]` in D02 line 148 with `[شناسه ملی هلدینگ: در انتظار تأیید ثبتی / شناسه ملی هلدینگ رهناب فارمد]` rectifies the accidental subsidiary ID leakage while maintaining legal accuracy per `01_REQUIREMENTS_DOCUMENT.md`.

5. **From Observation 5 to Complete ADR Formulation:**
   - Drafting ADRs 9, 10, and 11 in Persian matching the exact structure of Decisions 1–8 per `.agents/rules/decision-making.md` (Context, Option 1, Option 2, Final Recommendation with explicit trade-offs prioritizing maintainability) completes the architectural record and provides clear technical justification.

6. **From Observation 6 to Full Schema & Security Completeness:**
   - Expanding Table 4.1 to 22 fields (adding facility specs JSON repeater, facility locations, photo gallery, primary cluster), adding Table 4.5 (8 fields for `team_member`), adding Media Kit ZIP to Table 4.2, converting single scalar IDs to repeating scalar rows for collaborative press releases, and appending an explicit `Output Escaping Function` column across 100% of fields completely eliminates the security and schema gaps.

---

## 3. Caveats

1. **Zero-Code Phase Boundary:** This harmonization report and the Worker blueprint are purely architectural. No PHP implementation code or theme files have been created, strictly honoring the Milestone 1 constraint.
2. **Third-Party Multilingual Plugin:** The bilingual specifications assume Polylang Pro or WPML. Custom translation hooks specified in Section 7.3 must be registered in the companion plugin `rahnab_core` during Milestone 2.
3. **No other caveats.**

---

## 4. Conclusion

All 7 deliverables in `orchestrator_m1/deliverables/`, along with M0 `02_SUBSIDIARY_RESEARCH.md`, have been systematically cross-audited and harmonized. The comprehensive analysis and drop-in Worker blueprint have been authored and published to:
`/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_sync/analysis.md`

### Summary of Completed Deliverables in this Investigation:
1. **Consistency Matrix:** 14 synchronization points identified and resolved across CPTs, taxonomies, templates, URL slugs, and subsidiary metadata.
2. **Architectural Decisions 9, 10, 11 Formulated:** Full drop-in Persian ADRs for Facilities Modeling, Repeating Scalar Relational Architecture, and Locale-Partitioned Transient Caching ready to append to `06_IA_DECISION_LOG.md`.
3. **Worker Execution Blueprint:** Clear, unambiguous, file-by-file patch instructions prepared for `worker_m1_author`.

Milestone 1 is now fully primed for final authoring updates by `worker_m1_author` to achieve 100% unanimous gate pass in Iteration 2.

---

## 5. Verification Method

Independent verification of this handoff and its accompanying analysis can be performed via the following steps:

1. **Inspect Analysis Artifact:**
   - View `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_sync/analysis.md`.
   - Confirm Sections 2, 3, and 4 contain complete comparison matrices, drop-in ADR text, and file-by-file execution guides.
2. **Template Naming Verification:**
   - Confirm Table 6.1 in Section 4.4 lists `archive-news.php`, `single-news.php`, `archive-event.php`, `single-event.php`, and zero occurrences of `news_event.php`.
3. **Decision Log Verification:**
   - Confirm Section 3 contains ADRs 9, 10, and 11 formatted strictly per `.agents/rules/decision-making.md`.
4. **Zero-Code Compliance:**
   - Run command: `find /Users/user/Sites/localhost/rahnab -name "*.php" -o -name "*style.css"` -> Output must be empty (0 files).
5. **Invalidation Conditions:**
   - This handoff is invalidated if WordPress Core natively loads `archive-news_event.php` for registered post type `news` without custom filters.
   - This handoff is invalidated if storing foreign keys as serialized arrays outperforms indexed scalar integer equality queries in MySQL.

---
*Handoff report submitted by Explorer 2.3 (Cross-Deliverable Harmonization Specialist).*
