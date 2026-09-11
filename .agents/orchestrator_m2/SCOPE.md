# Scope: Milestone 2 — UX Blueprint, Art Direction & Design System

## Architecture & Overview
Milestone 2 delivers the complete UX Architecture, Visual Art Direction, Design System & Tokens, Tailwind Blueprint, Motion & Interaction Specification, and Design ADRs for Rahnab Pharmed.
It builds upon Milestone 0 (Research & Feasibility) and Milestone 1 (Information Architecture, Taxonomy & CPT Architecture).
It serves as the immutable architectural blueprint for Milestone 3 (Interactive HTML/CSS/JS Prototype).

Strict Boundaries:
- ZERO WordPress PHP / theme files created.
- ZERO full HTML prototype pages coded in this milestone (Full interactive HTML prototype will be coded in Milestone 3).
- Pure architectural specifications, design systems, design tokens, blueprints, motion languages, and ADRs.
- All 7 confirmed subsidiaries (Persis Gene, Nozhin Zist, Padra Serum, KarayaKhteh/CARTIMED, Tamin Plasma Nozhin, Baya Zist, Arc Zist Azma) must form the foundation.

## Deliverables Inventory
| # | Deliverable File | Scope & Key Requirements |
|---|------------------|---------------------------|
| 1 | `01_UX_BLUEPRINT.md` | Answers to 8 strategic homepage questions, subpage UX anatomies (About, Subsidiaries Overview, Single Company Profile, News Hub, Contact), dedicated mobile & tablet UX, RTL/LTR bidirectional interaction logic. |
| 2 | `02_CREATIVE_DIRECTION.md` | Super Premium Life-Science Holding identity (Confidence, Authority, Elegance, Precision), strict anti-cliché rules, Two complete color directions with hex codes and brand psychology (A: Bio-Kinetic Deep Navy/Obsidian `#030914` + Kinetic Amber `#FD7702`; B: Clinical Sovereign Slate `#0A0F1D` + Clinical Emerald `#00A896`), photography art direction (industrial cleanrooms, apheresis centers, microscopy, editorial portraits). |
| 3 | `03_DESIGN_SYSTEM.md` | Master Design System & Tokens: RTL/LTR typography pairings (Yekan Bakh/Peyda for FA, Euclid Circular A/Plus Jakarta Sans for EN) with modular scales & matched x-heights, complete Semantic/Surface/Text/Border/Accent/Status/Alpha color tokens, 4px/8px baseline grid, max-w 1600px containers, micro-radius elevation system, component specs (Buttons, Holding Cards, Institutional Forms, KPI Counters, Footer, Mega-menu). |
| 4 | `04_TAILWIND_TOKENS_BLUEPRINT.md` | Documented `tailwind.config.js` configuration with custom utility classes, CSS variables, and RTL logical properties. |
| 5 | `05_MOTION_INTERACTION_LANGUAGE.md` | Purposeful motion system using GSAP: scroll-driven storytelling, timeline triggers, magnetic interactions, typography reveals, animated counters, micro-interactions, performance & accessibility (`prefers-reduced-motion`). |
| 6 | `06_DESIGN_DECISION_LOG.md` | Design Decision Log & ADRs formatted strictly per `.agents/rules/decision-making.md`. |
| 7 | `INDEX.md` | Master Deliverable Catalog & Executive Blueprint summarizing all M2 outputs. |

## Workflow Phases
1. **Phase 1: Deep Exploration & Requirements Mapping (3 Parallel Explorers)**
   - `explorer_m2_ux`: Detailed analysis of UX Blueprint requirements, 8 strategic homepage questions, continuous biomanufacturing value chain presentation, subpage anatomies, responsive mobile/tablet flows, RTL/LTR logic.
   - `explorer_m2_art`: Deep creative direction analysis, anti-cliché guidelines, Color Directions A & B color theory & hex palettes, photography art direction across pharmaceutical industrial cleanrooms, apheresis, and science.
   - `explorer_m2_tokens_motion`: Typography pairings (FA/EN), modular scales, token architectures (Tailwind / CSS vars / logical properties), GSAP motion timelines, interactive micro-behaviors, a11y.
2. **Phase 2: Deliverable Synthesis & Authoring (Worker)**
   - `worker_m2_author`: Authoring all 7 master deliverables in `.agents/orchestrator_m2/deliverables/` adhering strictly to all requirements and rules.
3. **Phase 3: Multi-Agent Verification Gate**
   - 2 Independent Reviewers (`reviewer_m2_1`, `reviewer_m2_2`)
   - 2 Adversarial Challengers (`challenger_m2_1`, `challenger_m2_2`)
   - 1 Forensic Auditor (`auditor_m2`)
4. **Phase 4: Gate Evaluation & Handoff**
   - Verification against strict AND gate criteria, updating `GATE_STATUS.md`, and reporting handoff to Parent.
