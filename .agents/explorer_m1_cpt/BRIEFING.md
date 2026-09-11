# BRIEFING — 2026-09-09T17:05:00Z

## Mission
Investigate and formulate the comprehensive architectural specification for the WordPress CPT Model, Taxonomies, Meta Schema, Relationships, Template Hierarchy, and Admin UX for Rahnab Pharmed Corporate Website without writing implementation code.

## 🔒 My Identity
- Archetype: explorer
- Roles: WordPress CPT Modeler, Information Architecture Strategist, Schema Designer
- Working directory: /Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt
- Original parent: 6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1
- Milestone: M1 (Architecture & Specifications)

## 🔒 Key Constraints
- Read-only investigation — do NOT implement source code
- STRICTLY NO PHP CODE — PURE ARCHITECTURAL SPECIFICATION
- 5-Component Handoff Protocol (Observation, Logic Chain, Caveats, Conclusion, Verification Method)
- Multi-perspective decision-making: Option 1 (Pros/Cons), Option 2 (Pros/Cons), Final Recommendation with rationale
- Respect Classic WordPress standards, bilingual (Fa/En), performance optimization

## Current Parent
- Conversation ID: 6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1
- Updated: not yet

## Investigation State
- **Explored paths**:
  - `/Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md` (lines 1-220, noting Arc Zist Azma replacement)
  - `/Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md` (lines 1-527)
  - `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/SCOPE.md` (lines 1-39)
  - `/Users/user/Sites/localhost/rahnab/.agents/rules/wordpress-development.md` (lines 1-74)
  - `/Users/user/Sites/localhost/rahnab/.agents/rules/code-quality.md` (lines 1-44)
  - `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/06_INITIAL_IA_PROPOSAL.md` (lines 1-318)
  - `/Users/user/Sites/localhost/rahnab/.agents/skills/html-to-classic-wp/SKILL.md` (lines 1-82)
  - `/Users/user/Sites/localhost/rahnab/.agents/skills/html-to-classic-wp/references/theme-vs-plugin.md` (lines 1-22)
  - `/Users/user/Sites/localhost/rahnab/.agents/skills/html-to-classic-wp/references/content-model.md` (lines 1-23)
- **Key findings**:
  - 4 primary CPTs required: `company`, `news`, `event`, `achievement`.
  - Helper CPT `team_member` (`publicly_queryable => false`) selected for board governance over page meta.
  - Facility profiles modeled as structured metadata schema on `company` rather than a standalone CPT to prevent URL dilution.
  - 5 taxonomies defined: `value_chain_stage` (hierarchical), `news_category` (hierarchical), `news_tag` (flat), `event_type` (hierarchical), `achievement_type` (hierarchical).
  - 30+ metadata fields fully specified with exact types, validation rules, sanitization, and bilingual sync behavior.
  - Entity relationships modeled via scalar indexed foreign keys (`_rahnab_{cpt}_related_company_id`) and transient caching with invalidation hooks on `save_post` to avoid unindexed `wp_postmeta` array bottlenecks.
  - Complete Classic WP Template Hierarchy and modular `template-parts/` mapped.
  - Custom Admin UX designed with list columns, quick taxonomy/company filters, and tabbed metaboxes.
- **Unexplored areas**: None. Architectural specification is complete.

## Key Decisions Made
- CPT slugs: `company` (rewrite `companies`), `news` (rewrite `news`), `event` (rewrite `events`), `achievement` (no public archive; embedded), `team_member` (CMS helper only).
- Relationship model: 1-to-many scalar foreign keys with transient caching.
- Zero PHP code generated in accordance with Milestone 1 scope constraint.

## Artifact Index
- `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/DISPATCH.md` — Dispatch log
- `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/BRIEFING.md` — Persistent context & identity
- `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/progress.md` — Liveness & task execution tracker
- `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/analysis.md` — Full CPT & Schema architectural specification
- `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_cpt/handoff.md` — 5-component handoff report
