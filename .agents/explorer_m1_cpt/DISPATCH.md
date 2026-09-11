## 2026-09-09T17:02:40Z

User Request:
You are Explorer 3 (WordPress CPT Modeler).
Your working directory is: /Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt
You MUST read:
- /Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md
- /Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/SCOPE.md
- /Users/user/Sites/localhost/rahnab/.agents/rules/wordpress-development.md
- /Users/user/Sites/localhost/rahnab/.agents/rules/code-quality.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/06_INITIAL_IA_PROPOSAL.md

YOUR MISSION:
Investigate and formulate the comprehensive specification for the WordPress CPT Model (STRICTLY NO PHP CODE — PURE ARCHITECTURAL SPECIFICATION):
1. Required Custom Post Types (CPTs):
   - `company` (or `subsidiary`): post type slug, labels (Fa/En), capabilities, supports (title, editor, thumbnail, excerpt, revisions), archive slug, rewrite rules.
   - `news`: corporate holding and subsidiary news.
   - `event`: symposiums, conferences, exhibitions, product launches.
   - `achievement` (or `milestone`): certifications, patents, دانشبنیان recognitions, FDA approvals.
   - Analysis of helper CPTs vs meta: e.g. `executive_member` / `board_member` or `facility` — decide whether separate CPTs or meta arrays are more maintainable.
2. Taxonomies:
   - `subsidiary_sector` / `value_chain_stage` (Hierarchical: R&D, Cell Therapy, Biomanufacturing, Plasma Derivatives, Biological Quality Control)
   - `news_category` / `news_tag`
   - `event_type`
3. Meta Field Architecture (Exhaustive schemas with field key, type, description, validation, required flag):
   - For `company`: national_id, registration_number, establishment_year, website_url, ceo_name, hq_address, facility_locations, value_chain_position, key_products/services, certifications, contact_phone, contact_email, social_links.
   - For `news`: related_subsidiary (relationship), press_release_pdf, source_attribution, is_featured.
   - For `event`: event_start_date, event_end_date, event_location, registration_url, event_status.
   - For `achievement`: award_date, issuing_body, credential_id, verification_url.
4. Entity Relationships:
   - Bidirectional and one-to-many relationship modeling in WordPress (Company <-> News, Company <-> Events, Company <-> Achievements). Best practice architecture for Classic WordPress without performance degradation.
5. Proposed Template Hierarchy:
   - Standard Classic WordPress template mappings: `front-page.php`, `archive-company.php`, `single-company.php`, `archive-news.php`, `single-news.php`, `archive-event.php`, `single-event.php`, `page-about.php`, `page-contact.php`, `taxonomy-value_chain_stage.php`, template-parts modular structure.
6. Admin UX Considerations:
   - Post list table customizations (custom admin columns, quick filters by sector, status).
   - Metabox organization (logical grouping / tabbed layout).
   - Polylang / WPML dual-language post synchronization considerations.

Write your findings to `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/analysis.md` and write a complete, self-contained `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/handoff.md`.
Communicate your completion via send_message to caller. STRICTLY NO SOURCE CODE.
