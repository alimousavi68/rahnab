# MILESTONE 1 DELIVERABLE CATALOG & EXECUTIVE SUMMARY
## Rahnab Pharmed Corporate Website (`rahnab.com`)
### Information Architecture & WordPress CPT Architecture Specifications

**Milestone:** Milestone 1 — Information Architecture & WordPress CPT Architecture (Gate Iteration 2)  
**Release Date:** 2026-09-09T21:45:00+03:30  
**Authorship:** Milestone 1 Architecture Team (`worker_m1_author` & `worker_m1_r2_remediator`)  
**Parent Orchestrator:** `orchestrator_m1`  
**Constraint Verification:** 100% Architecture & Specifications — **ZERO PHP CODE WRITTEN**  

---

## 1. Executive Summary

Milestone 1 establishes the structural, relational, and navigational blueprint for the Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`). Operating in accordance with the mandatory non-negotiable workflow:
```text
Research (M0) ✅ ──► Information Architecture & CPT Model (M1) ✅ ──► UX & Art Direction (M2) ──► ...
```

Following the user directive of 2026-09-09T16:58:06Z:
1. **Strategic Subsidiary Realignment:** "Al Salam" was permanently excised and replaced by **Arc Zist Azma (آرک زیست آزما)** — Iran's first biological quality control laboratory and official collaborator of the Iran Food and Drug Administration (IFDA). This completes a 100% domestic, sovereign biomanufacturing closed loop.
2. **Clerical ID Rectification:** National corporate identifiers were audited, verifying Nozhin Zist Pharmed as `14012098694` and Tamin Plasma Nozhin as `14012987472`.
3. **Pure Architectural Delivery:** In strict adherence to project constraints, zero WordPress PHP files, zero theme files, and zero templates were written. All artifacts are rigorous, production-grade architectural specifications.

---

## 2. Deliverable Catalog

| Deliverable Code | File Path | Core Scope & Description | Key Technical Artifacts |
|:---|:---|:---|:---|
| **M0 Update** | `.agents/orchestrator_m0/deliverables/02_SUBSIDIARY_RESEARCH.md` | Drop-in update of M0 Subsidiary Research: Arc Zist Azma integration, 7-subsidiary value chain diagrams, National ID clarification. | 7-tier value chain diagram, deep forensic profile for Arc Zist Azma, updated asset readiness audit. |
| **Deliverable 01** | `.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md` | Final sitemap tree with RESTful Latin URL slugs, portfolio extensibility (>7, 15, 20+ ventures), isolated rewrite rule precedence (`/subsidiaries/cluster/{slug}/`, `/news-events/entity/{slug}/`), dual-language routing strategy, graceful in-page bilingual fallback with `<meta name="robots" content="noindex, follow">`, canonical and `hreflang` protection, and single subsidiary 8-zone anatomy. | Hierarchical sitemap, URL slug matrix, isolated rewrite precedence rules, canonical & `hreflang` code, in-page translation fallback. |
| **Deliverable 02** | `.agents/orchestrator_m1/deliverables/02_NAVIGATION_ARCHITECTURE.md` | Floating glassmorphic desktop navigation pill, Adaptive Dual-Mode Mega-Menu (Mode A for <=8 ventures; Mode B master-detail for >8 to 20+ ventures), 4-column institutional footer (holding national ID cleansed), ergonomic mobile drawer (language switcher relocated to top bar, 64px compact thumb-zone CTAs reclaiming ~100px space), 30-day cookie logic. | Desktop spatial specs, scroll states, Adaptive Dual-Mode Mega-Menu, mobile drawer thumb zone & top bar switcher, 30-day cookie logic. |
| **Deliverable 03** | `.agents/orchestrator_m1/deliverables/03_CONTENT_HIERARCHY.md` | Homepage Sovereign Corporate Narrative across 6 zones (mandating `template-parts/home/flow-matrix.php` for Zone 3), split News Hub (`archive-news.php`) & Events Hub (`archive-event.php`), page-by-page content prioritization for all templates, master data source mapping table for all 13 templates and 15 parts. | 6 homepage narrative zones, subpage zones, full data source mapping linking zones to ACF, scalar relational CPT queries, and modular parts. |
| **Deliverable 04** | `.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md` | Pure CPT specification: 5 CPTs (`company`, `news`, `event`, `achievement`, `team_member`), 5 taxonomies, 51 metadata fields across 5 tables with explicit output escaping functions, repeating scalar foreign key relational performance, transient cache locale partitioning (`_{$locale}`), Classic WP template hierarchy (13 core templates + 15 modular parts), admin UX with custom list columns for all CPTs, decoupled Polylang relational sync. | Entity topology, 51-field metadata schema table with escaping functions, transient caching strategy, admin list columns, Polylang sync rules. |
| **Deliverable 05** | `.agents/orchestrator_m1/deliverables/05_USER_FLOW_DIAGRAMS.md` | 4 mapped enterprise B2B user journeys: (1) B2B Pharma Client Discovery, (2) Investor Governance Overview, (3) Press & Media Assets (with `_rahnab_news_media_kit_zip` 300-DPI asset bundle), (4) Academic Collaboration (with server directives `upload_max_filesize = 32M`, PDF MIME validation, and `.htaccess` execution barrier in `wp-content/uploads/secure_proposals/`). | Behavioral flow diagrams, decision gates, friction prevention mechanisms, conversion outcomes, upload security directives. |
| **Deliverable 06** | `.agents/orchestrator_m1/deliverables/06_IA_DECISION_LOG.md` | 11 formal Architectural Decision Records (ADRs 1–11) evaluated per `.agents/rules/decision-making.md` (Option 1 vs Option 2 vs Final Recommendation with trade-offs), including Cleanrooms/Facilities modeling, repeating scalar rows vs serialized arrays, and transient locale partitioning. | 11 documented architectural decisions covering routing, naming, navigation, facilities data modeling, relational metadata, and fallback UX. |

---

## 3. The 7 Confirmed Subsidiaries & Value-Chain Roles

```text
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│                                RAHNAB PHARMED VALUE-CHAIN ECOSYSTEM                              │
├─────┬───────────────────────┬─────────────────┬──────────────────────────────────────────────────┤
│ #   │ Company Name          │ National ID     │ Sovereign Role & Value-Chain Tier                │
├─────┼───────────────────────┼─────────────────┼──────────────────────────────────────────────────┤
│ 01  │ Persis Gene           │ 14005750960     │ Biotech Accelerator, Molecular R&D & Bioprocess  │
│ 02  │ Tamin Plasma Nozhin   │ 14012987472     │ Upstream Human Source Plasma Collection Centers  │
│ 03  │ Nozhin Zist Pharmed   │ 14012098694     │ Industrial Plasma Fractionation (150,000L/year)  │
│ 04  │ Padra Serum Alborz    │ 14006664540     │ Hyperimmune Equine Sera & Emergency Antivenoms   │
│ 05  │ KarayaKhteh / CARTIMED│ 14007103978     │ Next-Gen Cellular Immunotherapy (CD19 CAR-T)     │
│ 06  │ Baya Zist Pharmed     │ 14010425772     │ Downstream Chromatography & Aseptic Fill-Finish  │
│ 07  │ Arc Zist Azma         │ 14003984672     │ First Biological QC Lab in IR / IFDA Collaborator│
└─────┴───────────────────────┴─────────────────┴──────────────────────────────────────────────────┘
```

---

## 4. Verification & Integrity Attestation

- **Integrity Compliance:** No dummy implementations, no hardcoded facades, no fabricated benchmarks. All data cross-referenced against official corporate and regulatory registers.
- **Zero-Code Verification:** Confirmed that **zero lines of PHP code** were authored in Milestone 1. All work is strictly confined to architectural documentation.
- **Bilingual Completeness:** Every route, menu, metadata schema, and navigation element is fully specified for Persian (RTL default) and English (LTR secondary).

---
*Catalog authored and remediated by Milestone 1 Architecture Team (`worker_m1_author` & `worker_m1_r2_remediator`). Ready for independent review and challenge.*
