# MASTER DELIVERABLES CATALOG & EXECUTIVE BLUEPRINT
## Rahnab Pharmed Corporate Website (`rahnab.com`)
### Milestone 2: Design System, Tokens & Art Direction

**Document Code:** `RAHNAB-M2-INDEX`  
**Classification:** Milestone 2 Master Deliverables Catalog & Executive Summary  
**Milestone Status:** 100% Complete — Ready for Review & Independent Audit  
**Authoring Unit:** `worker_m2_author`  
**Parent Orchestrator:** `orchestrator_m2` (`088adcbc-4866-4916-bf9b-d2aa22ad7c7f`)  
**Target Milestone:** Milestone 2 (Design System, UX Blueprint, Creative Direction, Tailwind Tokens, Motion Language, ADRs)  
**Downstream Milestone:** Milestone 3 (Interactive HTML/CSS/JS Prototype Engine)

---

## 1. Executive Summary

Milestone 2 delivers the complete UX Architecture, Creative Art Direction, Design System & Tokens, Tailwind CSS Blueprint, Motion & Interaction Specification, and Design ADRs for **Rahnab Pharmed (هلدینگ سرمایه‌گذاری دارویی و زیست‌فناوری رهناب فارمد)**.

This milestone translates the strategic research from Milestone 0 and the Information Architecture and WordPress CPT foundations from Milestone 1 into a deterministic, production-ready design blueprint that directly powers the interactive prototype development in Milestone 3.

### 1.1 Strict Boundary Enforcement (100% Compliant)
- **ZERO WordPress PHP / Theme Files Created:** All deliverables are pure architectural specifications, design systems, design tokens, blueprints, motion languages, and ADRs.
- **ZERO Full HTML Prototype Pages Coded:** Prototyping code begins in Milestone 3.
- **All 7 Confirmed Subsidiaries Integrated:**
  1. Persis Gene (پرسیس ژن)
  2. Nozhin Zist Pharmed (نوژین زیست فارمد)
  3. Padra Serum Alborz (پادرا سرم البرز)
  4. KarayaKhteh / CARTIMED (کارایاخته تجهیز آزما)
  5. Tamin Plasma Nozhin (تأمین پلاسما نوژین)
  6. Baya Zist Pharmed (بایا زیست فارمد)
  7. Arc Zist Azma (آرک زیست آزما)

---

## 2. Master Deliverables Inventory

| # | Deliverable File | Title & Core Scope | Key Architectural Highlights |
|:---|:---|:---|:---|
| **01** | [`01_UX_BLUEPRINT.md`](./01_UX_BLUEPRINT.md) | **UX Blueprint & Corporate Narrative** | Granular answers to all 8 strategic homepage questions; unbroken 5-stage continuous biomanufacturing value chain; zone-by-zone UX anatomies for About (6 zones), Directory (5 zones), Single Subsidiary (8 zones), News Hub, Contact; mobile/tablet ergonomics (thumb docks, bottom sheets, vertical steppers); native RTL/LTR bidirectional logic. |
| **02** | [`02_CREATIVE_DIRECTION.md`](./02_CREATIVE_DIRECTION.md) | **Creative Direction & Art Direction** | Super Premium Life-Science Holding identity anchored in 4 Brand Pillars (Confidence, Authority, Elegance, Precision); absolute rejection of 5 industry clichés; complete hex palettes and brand psychology for Direction A (Obsidian/Amber `#030914` / `#FD7702`) and Direction B (Sovereign Slate/Emerald `#0A0F1D` / `#00A896`); detailed ADR decision comparison; photography guidelines for ISO 5 cleanrooms, apheresis, confocal microscopy, and executive portraiture with 3-stage LUT and mathematical scrims. |
| **03** | [`03_DESIGN_SYSTEM.md`](./03_DESIGN_SYSTEM.md) | **Master Design System & Design Tokens** | Bilingual typography pairings: Persian (Yekan Bakh / Peyda) and English (Plus Jakarta Sans / Euclid Circular A) with modular scale, x-height balance, +0.10 to +0.15 Persian line-height offset, and OpenType features (`ss01`, `ss02`, `cv01`, `locl`, tabular nums); semantic color tokens with synchronized text hierarchy (Primary `#F8FAFC`, Secondary `#CBD5E1`, Muted `#78889E` WCAG AA); 8px/4px spatial grid; micro-radius (`2px` to `6px`); layered ambient shadows; component specifications for Buttons, Holding Cards, Forms, KPI Counters, Mega-Menu, Native Dialogs, Footer. |
| **04** | [`04_TAILWIND_TOKENS_BLUEPRINT.md`](./04_TAILWIND_TOKENS_BLUEPRINT.md) | **Tailwind CSS Tokens & Assets Blueprint** | Complete, valid `tailwind.config.js` configuration; CSS custom variables root stylesheet (`tokens.css`) supporting dynamic theme switching and alpha modifiers; custom utility plugins for glassmorphism, typography features, and text balancing; comprehensive CSS Logical Properties mapping table for bidirectional parity. |
| **05** | [`05_MOTION_INTERACTION_LANGUAGE.md`](./05_MOTION_INTERACTION_LANGUAGE.md) | **Motion & Interaction Language** | Purposeful GSAP motion system: Lenis smooth scroll bridge synchronized to GSAP RAF ticker; 300vh pinned value chain scrub timeline with mobile stepper fallback; kinetic typography line reveals; magnetic CTA micro-interactions; animated KPI counters localized with Persian formatting; GPU transform performance rules (`will-change` lifecycle); complete `@media (prefers-reduced-motion: reduce)` accessibility bypass. |
| **06** | [`06_DESIGN_DECISION_LOG.md`](./06_DESIGN_DECISION_LOG.md) | **Design Decision Log & ADRs** | Formatted strictly per `.agents/rules/decision-making.md` with Option 1 (مزایا / معایب), Option 2 (مزایا / معایب), and Final Recommendation prioritizing Maintainability. Covers all 7 major M2 architectural decisions: Value Chain Presentation (ADR-M2-01), Color Strategy (ADR-M2-02), Typography Pairing (ADR-M2-03), Corner Micro-Radius (ADR-M2-04), Bidirectional Logic (ADR-M2-05), Motion Engine (ADR-M2-06), and Native Dialogs (ADR-M2-07). |
| **07** | [`INDEX.md`](./INDEX.md) | **Master Catalog & Executive Blueprint** | Master catalog, executive summary, end-to-end traceability matrix, quality metrics, and operational transition roadmap to Milestone 3. |

---

## 3. End-to-End Traceability Matrix

```text
┌────────────────────────────────────────────────────────────────────────────────────────────────────────┐
│                                       TRACEABILITY FLOWCHART                                           │
├────────────────────┬────────────────────┬─────────────────────────────┬────────────────────────────────┤
│ MILESTONE 0        │ MILESTONE 1        │ MILESTONE 2                 │ MILESTONE 3                    │
│ RESEARCH & BRIEF   │ IA & CPT MODEL     │ UX, SYSTEM & TOKENS         │ INTERACTIVE PROTOTYPE          │
├────────────────────┼────────────────────┼─────────────────────────────┼────────────────────────────────┤
│ • Master Brief     │ • 01_FINAL_SITEMAP │ • 01_UX_BLUEPRINT           │ • HTML/Tailwind Prototype      │
│   (B2B Focus,      │   (Latin URLs,     │   (8 Strategic Qs,          │   (7 Interactive Pages,        │
│   Cinnagen Ref,    │   Extensibility)   │   5-Stage Value Chain,      │   RTL/LTR Toggle,              │
│   Anti-patterns)   │                    │   Subpage Anatomies)        │   Responsive Breakpoints)      │
│                    │                    │                             │                                │
│ • 02_SUBSIDIARY_   │ • 04_WORDPRESS_CPT │ • 02_CREATIVE_DIRECTION     │ • GSAP / Lenis Motion Engine   │
│   RESEARCH         │   (Company CPT,    │   (Direction A vs B,        │   (Pinned Value Chain Scrub,   │
│   (7 Companies,    │   News CPT,        │   Cleanroom Photo Rules,    │   Kinetic Typography Reveals,  │
│   Capacities)      │   Taxonomies)      │   3-Stage LUT Scrims)       │   Magnetic Buttons)            │
│                    │                    │                             │                                │
│ • 03_BENCHMARK_    │ • 02_NAVIGATION    │ • 03_DESIGN_SYSTEM &        │ • Component Architecture       │
│   MATRIX           │   (Suspended Pill, │ • 04_TAILWIND_TOKENS        │   (Holding Cards, Drawers,     │
│   (International   │   Footer,          │   (Yekan Bakh / PJS,        │   KPI Counters, Native         │
│   Holdings)        │   Mega-menu)       │   Micro-Radius, CSS Vars)   │   <dialog> Modals)             │
│                    │                    │                             │                                │
│ • Anti-Cliché Rule │ • 05_USER_FLOWS    │ • 05_MOTION_LANGUAGE &      │ • Accessibility & Testing      │
│   (Sec 15 Brief)   │   (4 B2B Funnels)  │ • 06_DESIGN_DECISION_LOG    │   (prefers-reduced-motion,     │
│                    │                    │   (ADRs formatted per rules)│   WCAG 2.1 AA/AAA Verified)    │
└────────────────────┴────────────────────┴─────────────────────────────┴────────────────────────────────┘
```

---

## 4. Quality Audit & Compliance Checklist

### 4.1 Strict Architectural Boundaries
- [x] Zero WordPress PHP theme files created.
- [x] Zero full HTML prototype pages created in Milestone 2.
- [x] Pure architectural specifications, design systems, design tokens, blueprints, motion languages, and ADRs delivered.
- [x] All 7 confirmed subsidiaries form the foundational infrastructure.

### 4.2 Code & Rule Quality Standards
- [x] Formatted strictly according to `.agents/rules/decision-making.md` (all 7 ADRs include Option 1 pros/cons, Option 2 pros/cons, and final recommendation with maintainability rationale).
- [x] Fully compliant with `.agents/rules/code-quality.md` and `.agents/rules/project-workflow.md`.
- [x] All CSS properties follow the Logical Properties standard for flawless bidirectional (RTL/LTR) mirroring.
- [x] All contrast ratios verified with mathematical formulas exceeding WCAG 2.1/2.2 AA and AAA standards (including 6.41:1 AA normal / AAA large for Emerald on Slate, and 5.60:1 AA for Muted text `#78889E`).
- [x] Motion system includes complete `@media (prefers-reduced-motion: reduce)` accessibility fail-safe.

---

## 5. Transition to Milestone 3: Interactive Prototype Phase

With Milestone 2 successfully authored and validated, the project is primed for **Milestone 3: Interactive HTML/CSS/JS Prototype**:
1. **Repository Setup:** Initialize clean modern build pipeline (Vite + Tailwind CSS v3.4+ + PostCSS).
2. **Configuration Ingestion:** Deploy `tailwind.config.js` and `tokens.css` directly from Deliverable 04.
3. **Motion Engine Deployment:** Initialize `initMotionEngine()`, `initValueChainTimeline()`, and `initAccessibleMotion()` from Deliverable 05 using GSAP and Lenis.
4. **Page Assembly (7 Prototype Views):**
   - Homepage (`index.html`) featuring the 8-question narrative and pinned 5-stage value chain.
   - About Us Suite (`about.html`).
   - Subsidiaries Overview & Directory (`subsidiaries.html`).
   - Canonical Single Subsidiary Profile (`subsidiary-detail.html`).
   - News & Media Hub (`news.html`).
   - Single News Article View (`news-detail.html`).
   - Institutional Contact & CDMO Router (`contact.html`).
5. **Bidirectional Toggle:** Top floating pill language switcher dynamically toggling `<html dir="rtl" lang="fa">` and `<html dir="ltr" lang="en">` with instant layout mirroring.
