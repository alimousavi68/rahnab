# Scope: Milestone 1 — Information Architecture + WordPress CPT Model

## Overview
Milestone 1 defines the complete Information Architecture (IA) and WordPress Custom Post Type (CPT) Model for the Rahnab Pharmed Corporate Website. It establishes the structural, relational, navigation, and content blueprints required before any code or theme implementation begins in Milestone 2.

## Architectural Objectives
1. **Vertical Biomanufacturing Value Chain Representation**: Reflect the interconnected ecosystem of the 7 subsidiaries (R&D, Cell Therapy, Plasma, Biological QC, Manufacturing).
2. **Corporate Holding Narrative**: The website must tell an institutional holding story rather than presenting a generic card grid.
3. **Dual-Language Routing Strategy**: Persian as primary (RTL default), English as secondary (LTR) with clean, RESTful Latin URL slugs.
4. **Portfolio Extensibility**: Dynamic architecture capable of scaling beyond 7 subsidiaries seamlessly without restructuring.
5. **Zero-Code Strict Constraint**: Pure architecture and specification documents only. No PHP code, no theme templates.

## Feature Inventory
| # | Feature / Scope Item | Description | Milestone | Source |
|---|----------------------|-------------|-----------|--------|
| 1 | M0 Subsidiary Research Update | Replace Al Salam with Arc Zist Azma (آرک زیست آزما) in `02_SUBSIDIARY_RESEARCH.md` | M1 | User Request |
| 2 | Deliverable 1: Final Sitemap | Full site structure, Latin RESTful slugs, RTL/LTR routing, taxonomy, portfolio extensibility | M1 | User Request |
| 3 | Deliverable 2: Navigation Architecture | Header, footer, mobile nav, language switcher placement, state behaviors | M1 | User Request |
| 4 | Deliverable 3: Content Hierarchy | Page-by-page prioritization, content zones, data source mappings | M1 | User Request |
| 5 | Deliverable 4: WordPress CPT Architecture | Pure specification: CPTs (Company, News, Event, Achievement), Taxonomies, Meta fields, Relationships, Template Hierarchy, Admin UX | M1 | User Request |
| 6 | Deliverable 5: User Flow Diagrams | 4 core user journeys: B2B discovery, Investor overview, Press/Media news, Partner contact | M1 | User Request |
| 7 | Deliverable 6: IA Decision Log | Comprehensive record of all IA decisions with options evaluated and explicit rationale | M1 | User Request |

## The 7 Confirmed Subsidiaries
1. **Persis Gene (پرسیس ژن)** — Biotech Accelerator & Incubator (R&D, bioprocess development)
2. **Nozhin Zist Pharmed (نوژین زیست فارمد)** — Biomanufacturing & Finished biologics (National ID: 14012987472)
3. **Padra Serum Alborz (پادرا سرم البرز)** — Antivenoms, equine immunoglobulins, therapeutic sera (National ID: 14006664540, site: padraserum.com)
4. **KarayaKhteh / CARTIMED (کارا یاخته تجهیز آزما)** — Regenerative medicine, cell therapy, cartilage scaffolds (National ID: 14007103978)
5. **Tamin Plasma Nozhin (تأمین پلاسما نوژین)** — Plasma collection centers, human plasma fraction source (National ID: 14012987472, site: tpnojine.com)
6. **Baya Zist Pharmed (بایا زیست فارمد)** — Recombinant proteins, industrial biopharmaceuticals (National ID: 14010425772)
7. **Arc Zist Azma (آرک زیست آزما)** — First biological products QC laboratory in Iran, دانش‌بنیان, founded 1393, active since 1395, collaborator lab of Food & Drug Admin (سازمان غذا و دارو)

## Quality & Verification Requirements
- All 6 architectural deliverables published in `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/`.
- Updated `02_SUBSIDIARY_RESEARCH.md` in `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/`.
- Review by 2 independent Reviewers (APPROVE required).
- Challenge by 2 independent Challengers (Correctness & robustness confirmed).
- Forensic Integrity Audit by `teamwork_preview_auditor` (CLEAN required, ZERO code verification).
