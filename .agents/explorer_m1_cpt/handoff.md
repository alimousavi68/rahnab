# Handoff Report: WordPress Custom Post Type (CPT) Model & Data Architecture
## Rahnab Pharmed Corporate Website — Milestone 1 (Pure Architectural Specification)

**Document ID:** `HANDOFF-M1-CPT-001`  
**Author:** Explorer 3 (WordPress CPT Modeler / IA Strategist)  
**Recipient:** Orchestrator M1 (`6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1`)  
**Working Directory:** `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt`  
**Handoff Type:** Hard Handoff (Investigation & Specification Fully Completed)  
**Primary Deliverable:** `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/analysis.md`

---

## 1. Observation

Direct observations from examining project instructions, briefs, rules, and initial proposals:

1. **Strict Zero-Code Constraint for Milestone 1:**
   - In `/Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md` (lines 174–179):
     > "⚠️ هشدار مهم: در این Milestone هیچ کد WordPress، هیچ theme، هیچ template PHP نوشته نمی‌شود. فقط Architecture Document تحویل داده می‌شود."
   - In `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/SCOPE.md` (line 11):
     > "Zero-Code Strict Constraint: Pure architecture and specification documents only. No PHP code, no theme templates."

2. **Updated Subsidiary Portfolio (The 7 Confirmed Entities):**
   - In `/Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md` (lines 157–167):
     > "السلام حذف شد. جایگزین: آرک زیست آزما (Arc Zist Azma)"  
     > "لیست نهایی و قطعی ۷ شرکت: 1. Persis Gene ... 2. Nozhin Zist Pharmed ... 3. Padra Serum Alborz ... 4. KarayaKhteh / CARTIMED ... 5. Tamin Plasma Nozhin ... 6. Baya Zist Pharmed ... 7. Arc Zist Azma"
   - Confirmed in `orchestrator_m1/SCOPE.md` (lines 24–31).

3. **Required Custom Post Types & IA Entities:**
   - In `/Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md` (lines 498–523):
     > "Content Model پیشنهادی: Rahnab, Companies, News, Events, Achievements, Certifications, Management / Team, Media, Contact"
   - In `/Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md` (lines 120):
     > "Custom Post Types needed (minimum): Company · News · Event · Achievement"
   - In `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/06_INITIAL_IA_PROPOSAL.md` (lines 287–294):
     > Proposed entities: `company`, `post` (or `news_event`), `team_member`, `accreditation`.

4. **Classic WordPress Standards & Plugin Boundaries:**
   - In `/Users/user/Sites/localhost/rahnab/.agents/skills/html-to-classic-wp/SKILL.md` (lines 16–18):
     > "Classic Theme Simplicity (KISS): Strictly build Classic PHP Themes. Never force Full Site Editing (FSE) block templates... Separation of Presentation & Data: The theme controls aesthetics. Business entities (CPTs, taxonomies, shortcodes) belong in the companion plugin."
   - In `/Users/user/Sites/localhost/rahnab/.agents/rules/wordpress-development.md` (lines 13–18 & 51–66):
     > Requirements for Template Hierarchy, standard functions, output late-escaping (`esc_html`, `esc_attr`, `wp_kses`), and input sanitization (`sanitize_*`).

5. **Decision Making Protocol:**
   - In `/Users/user/Sites/localhost/rahnab/.agents/rules/decision-making.md` (lines 7–27):
     > "هنگامی که چند راه حل وجود دارد: فقط یکی را انتخاب نکن. ابتدا ارائه بده: گزینه ۱ (مزایا، معایب) | گزینه ۲ (مزایا، معایب) | پیشنهاد نهایی: دلیل انتخاب... Maintainability باید مهم‌تر از سرعت اجرای اولیه باشد."

---

## 2. Logic Chain

1. **Premise 1:** The user request and project scope mandate a life-science corporate architecture that handles 7 operating companies, extensible to future subsidiaries, with dedicated press, events, and verifiable credentials.
2. **Premise 2:** Standard native WordPress `post` is inadequate for corporate biopharma press releases because life-science press releases require legally binding metadata (official press release PDF statements, source attributions, subsidiary foreign-key linkages, and embargo timestamps) which would pollute or conflict with standard editorial posts.
3. **Premise 3:** Modeling Board of Directors / Governance (`team_member`) as a private helper CPT (`publicly_queryable => false`) provides structured CMS ordering via `menu_order` and Polylang bilingual pairing without cluttering the public URL namespace with thin profile pages.
4. **Premise 4:** Modeling cleanrooms and biological production lines (`facility`) as structured metadata repeater fields embedded directly within the `company` profile keeps physical assets tied to the operating legal entity rather than dispersing them across orphan URLs.
5. **Premise 5:** In MySQL and WordPress `wp_postmeta`, bidirectional relationships using serialized arrays (e.g. `LIKE '%"company":42%'`) create unindexed full-table scans. Storing a scalar integer foreign key (`_rahnab_{cpt}_related_company_id`) on child posts (`news`, `event`, `achievement`) enables index-based exact lookups. Wrapping reverse queries on `single-company.php` in transient caches invalidated on `save_post` ensures 0-millisecond database lookups for cached views.
6. **Premise 6:** Corporate bilingual requirements (`fa-IR` primary RTL, `en-US` secondary LTR) dictate that technical attributes (National ID, registration number, GPS coordinates, phone numbers, foreign key post IDs) must remain strictly synchronized/locked across languages, while narrative titles, excerpts, and biographies are localized independently.
7. **Deduction:** The comprehensive specification formulated in `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/analysis.md` completely fulfills all requirements of Milestone 1 without writing a single line of PHP implementation code.

---

## 3. Caveats

1. **Companion Plugin Implementation Deferred to Milestone 2:** All CPT registrations, taxonomies, and meta field hooks are specified for inclusion in a dedicated companion plugin (`rahnab-core`) per the separation-of-concerns rule, but no code has been implemented in Milestone 1.
2. **Polylang vs WPML Choice:** The specification is designed to be compatible with both Polylang Pro and WPML by defining standardized field-copying flags and post-relationship mapping hooks (`pll_get_post` / `wpml_object_id`). The final choice of multilingual plugin will be finalized in Milestone 2.
3. **Product Pipeline Granularity:** The pipeline schema is defined as a structured JSON repeater. If the holding expands its portfolio to hundreds of drug molecules in the future, the pipeline could eventually be promoted to a standalone CPT (`drug_candidate`); however, for the current 7 subsidiaries, an embedded repeater is more maintainable and editor-friendly.

---

## 4. Conclusion

The WordPress Custom Post Type (CPT) and Data Model specification is complete, robust, and documented in detail in `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/analysis.md`. It provides:
1. **4 Core CPTs + 1 Helper CPT:** `company`, `news`, `event`, `achievement`, and `team_member` (private helper).
2. **5 Taxonomies:** `value_chain_stage` (hierarchical), `news_category` (hierarchical), `news_tag` (flat), `event_type` (hierarchical), `achievement_type` (hierarchical).
3. **Exhaustive Metadata Schemas:** Complete parameter tables for 30+ custom fields with validation rules, sanitization routines, input types, and required flags.
4. **Indexed Entity Relationships:** High-performance scalar foreign keys with automated transient caching and invalidation hooks.
5. **Classic Template Hierarchy:** Direct mapping to 11 template files and 14 reusable template parts (`template-parts/`).
6. **Admin UX Specifications:** Custom admin list columns, quick taxonomy/company filters, tabbed metaboxes, and bilingual synchronization rules.

---

## 5. Verification Method

To independently verify the deliverable:

1. **Inspect Analysis Specification:**
   - Path: `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/analysis.md`
   - Check that all 6 required sections are thoroughly populated.
2. **Verify Zero-Code Strict Compliance:**
   - Execute grep across the working directory:
     `grep -rn "<?php" /Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/`
   - Expected Result: 0 matches (CLEAN, no PHP implementation code).
3. **Verify Compliance with 7 Confirmed Subsidiaries:**
   - Verify that `Arc Zist Azma` is included and `Al Salam` is excluded.
4. **Verify Decision Making Rules Compliance:**
   - Inspect Section 1.1 and Section 4.2 of `analysis.md` to confirm Option 1 (Pros/Cons), Option 2 (Pros/Cons), and Final Recommendation rationale.

---
*Report submitted to Parent Orchestrator (`6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1`) by Explorer 3.*
