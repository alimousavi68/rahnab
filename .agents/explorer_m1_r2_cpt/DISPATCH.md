## 2026-09-09T17:38:46Z
You are Explorer 2.1 (CPT & Schema Remediation Specialist).
Your working directory is: /Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_cpt

You MUST read:
- /Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md
- /Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/SCOPE.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/GATE_STATUS.md
- /Users/user/Sites/localhost/rahnab/.agents/reviewer_m1_2/review.md
- /Users/user/Sites/localhost/rahnab/.agents/challenger_m1_2/challenge.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md

PREVIOUS ITERATION GATE FAILURE:
Reviewer 2 gave REQUEST_CHANGES and Challenger 2 gave VULNERABILITIES_FOUND on Deliverable 04:
1. Non-standard template naming: `single-news_event.php` and `archive-news_event.php` violate WP core naming (`single-news.php` and `archive-news.php` required); CPT `event` lacks `archive-event.php` and `single-event.php`.
2. Missing facility & technical spec metadata fields in Table 4.1 (`_rahnab_company_facility_specs`, `_rahnab_company_facility_locations`, `_rahnab_company_facility_gallery`).
3. Missing Architectural Justification (ADR) explaining why facilities are modeled as structured metadata on `company` rather than a separate CPT.
4. Transient caching gaps: keys lack `$locale` (`_fa` vs `_en`); failure to purge achievement transients (`rahnab_company_{$company_id}_achievements_{$locale}`) in `save_post`; failure to invalidate old linked company transient on relationship change.
5. Contradiction in taxonomy hierarchy: `value_chain_stage` is labeled "Flat" in diagram but "Hierarchical" in table.
6. Multi-subsidiary press releases: currently single scalar dropdown blocks multi-entity press releases; specify repeating scalar meta rows or array of IDs.
7. Orphan handling & deletion hooks: specify `trash_post` and `before_delete_post` hooks.
8. Output escaping: specify explicit escaping (`esc_html`, `esc_attr`, `esc_url`) for all fields in Table 4.1.
9. Admin table custom column specs for `event` and `achievement`.

YOUR MISSION:
Analyze each failure point and formulate the exact, complete drop-in remediation specifications for Deliverable 04. Recommend a comprehensive fix strategy. Do NOT write source code.
Write analysis to: `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_cpt/analysis.md` and complete `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_cpt/handoff.md`.
Notify caller via send_message.
