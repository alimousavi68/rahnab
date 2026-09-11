# DELIVERABLE 08: Master Milestone Execution Plan & Project Roadmap
## Rahnab Pharmed Corporate Website — Milestone 0: Research & Discovery Synthesis

**Project:** Rahnab Pharmed Corporate Website (`rahnab.com`)  
**Document Code:** `DELIV-08-MILESTONE-PLAN`  
**Classification:** Official Full-Lifecycle Operational Roadmap  
**Author:** Milestone 0 Synthesis Team (`worker_m0_synthesis`)  
**Scope:** Complete Milestone Blueprint (Milestone 0 through Milestone 8)  
**Methodology:** Research-First, Prototype-Then-WordPress Pipeline  
**Compliance Standard:** Strict Sequential Integrity, Decision Gates, and Deliverable Verification  

---

## 1. Master Pipeline Lifecycle Overview

In accordance with `ORIGINAL_REQUEST.md` and `MASTER_PROJECT_BRIEF.md`, the Rahnab Pharmed Corporate Website follows an uncompromising sequential development pipeline:

```text
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│                                   THE NON-NEGOTIABLE WORKFLOW PIPELINE                           │
└────────────────────────────────────────────────┬─────────────────────────────────────────────────┘
                                                 │
       ┌─────────────────────────────────────────┼─────────────────────────────────────────┐
       ▼                                         ▼                                         ▼
┌──────────────┐                         ┌──────────────┐                          ┌──────────────┐
│  MILESTONE 0 │                         │  MILESTONE 1 │                          │  MILESTONE 2 │
│  Discovery & │ ──[ Gate G0 Passed ]──► │ Brand Strategy│ ───[ Gate G1 Passed ]──►│ Information  │
│  Benchmarks  │                         │ & Art Direct.│                          │ Architecture │
└──────────────┘                         └──────────────┘                          └──────────────┘
                                                                                          │
                                                                                          ▼
┌──────────────┐                         ┌──────────────┐                          ┌──────────────┐
│  MILESTONE 5 │                         │  MILESTONE 4 │                          │  MILESTONE 3 │
│  Review, User│ ◄──[ Gate G4 Passed ]── │ HTML/Tailwind│ ◄───[ Gate G3 Passed ]── │ High-Fidelity│
│  Testing & QA│                         │ GSAP Proto.  │                          │ UI Design    │
└──────────────┘                         └──────────────┘                          └──────────────┘
       │
       ▼ [ Validation Gate: Human Approval (CP-01 to CP-06) ]
┌──────────────┐                         ┌──────────────┐                          ┌──────────────┐
│  MILESTONE 6 │                         │  MILESTONE 7 │                          │  MILESTONE 8 │
│  WordPress   │ ──[ Gate G6 Passed ]──► │ Custom Theme │ ───[ Gate G7 Passed ]──► │ Forensic QA, │
│  Architecture│                         │ & CMS Engine │                          │ CWV & Deploy │
└──────────────┘                         └──────────────┘                          └──────────────┘
```

Each milestone must produce its verified deliverables and satisfy its explicit **Decision Gate** before the subsequent milestone is authorized to begin.

---

## 2. Granular Milestone Blueprints

### Milestone 0: Research, Benchmarks & Discovery Synthesis (Current)
- **Status:** **COMPLETE**
- **Objective:** Establish the empirical, factual, and strategic bedrock of the project through exhaustive research, subsidiary verification, benchmark analysis, and content gap analysis.
- **Key Tasks Completed:**
  - Forensic extraction of all requirements from `MASTER_PROJECT_BRIEF.md`.
  - Corporate registry verification of all 7 subsidiaries, national IDs, and registered titles.
  - Deep benchmark analysis of CinnaGen and 6 international life-science holding leaders.
  - Identification of content gaps, open research questions, initial IA, and project risks.
- **Deliverables Produced:**
  - `01_REQUIREMENTS_DOCUMENT.md`
  - `02_SUBSIDIARY_RESEARCH.md`
  - `03_BENCHMARK_MATRIX.md`
  - `04_CONTENT_GAP_ANALYSIS.md`
  - `05_RESEARCH_QUESTIONS.md`
  - `06_INITIAL_IA_PROPOSAL.md`
  - `07_RISK_LIST.md`
  - `08_FULL_MILESTONE_PLAN.md`
  - `INDEX.md`
- **Decision Gate G0:** Parent Orchestrator and Stakeholder review and sign-off on Milestone 0 package.

---

### Milestone 1: Brand Strategy, Art Direction & Design System
- **Pre-requisite Inputs:** Approved Milestone 0 package (`01_REQUIREMENTS_DOCUMENT.md`, `03_BENCHMARK_MATRIX.md`, client decision on Signature Accent palette Q2.4).
- **Objective:** Define the visual identity, moodboards, typographic scale, and design tokens that establish Rahnab Pharmed as a **Super-Premium Life-Science Holding**.
- **Key Tasks & Activities:**
  1. **Art Direction Concepts:** Develop 2 distinct moodboard directions:
     - *Direction A (Bio-Kinetic Authority):* Deep Obsidian/Navy substrates (`#030914`) + Kinetic Amber accent (`#FD7702`), evoking vitality and modern Iranian biopharma leadership.
     - *Direction B (Clinical Sovereign Emerald):* Deep Bio-Slate (`#0A0F1D`) + Clinical Emerald accent (`#00A896`), evoking biological regeneration and institutional science.
  2. **Typographic Calibration & Pairing:**
     - Persian typography: **Yekan Bakh** or **Peyda Web** across 8 weights.
     - English typography: **Euclid Circular A** or **Plus Jakarta Sans**.
     - Optical x-height matching to guarantee identical line footprints in RTL and LTR.
  3. **Tailwind Design System Architecture:**
     - Define complete `tailwind.config.js` with custom color scales, typography scales, container max-widths (1600px), and logical spacing utilities.
  4. **Component Design Tokens:** Define button styles, glassmorphic pill navigation tokens, card substrates, hairline borders, and focus rings.
- **Deliverable Outputs:**
  - `brand_strategy_and_art_direction.md`
  - `design_system_specification.md`
  - Tokenized `tailwind.config.js` design asset file
  - Vector asset package for Rahnab and typographic monograms for pending subsidiaries.
- **Decision Gate G1:** Client approval of Art Direction direction (A vs B) and typographic pairing.

---

### Milestone 2: Information Architecture, Content Wireframes & Low-Fi UX
- **Pre-requisite Inputs:** Approved Art Direction and Design Tokens (Milestone 1), `06_INITIAL_IA_PROPOSAL.md`.
- **Objective:** Finalize the complete sitemap, user journeys, responsive layout wireframes, and content-resilient structural containers for all 7 primary pages.
- **Key Tasks & Activities:**
  1. **Formal Sitemap Finalization:** Incorporate client decisions on subsidiary naming (Padra vs. Patra, Nozhin Zist, Al Salam).
  2. **Responsive Low-Fidelity Wireframes:**
     - Desktop (1440px), Tablet (768px), and Mobile (375px) wireframes for:
       - Home (`/`)
       - About Rahnab (`/about/`)
       - Subsidiary Overview (`/companies/`)
       - Single Subsidiary Profile (`/companies/{slug}/`)
       - News & Events Listing (`/news/`)
       - Single News Article (`/news/{slug}/`)
       - Contact Us (`/contact/`)
  3. **Interactive Drawer & Quick-Reveal Wireframing:** Wireframe the in-page subsidiary profile expansion drawer for fast B2B evaluation.
  4. **Content-Resilient Wireframing:** Validate that containers accommodate variable headline lengths (3 to 15 words) and localized text expansion (Persian text averages 15–25% wider than English).
- **Deliverable Outputs:**
  - `final_information_architecture.md`
  - Complete responsive wireframe deck (all 7 pages across 3 breakpoints)
  - Interactive low-fi UX flow documentation.
- **Decision Gate G2:** Stakeholder sign-off on structural wireframes and content containers before high-fidelity visual rendering begins.

---

### Milestone 3: High-Fidelity UI Design & Interactive Mockups
- **Pre-requisite Inputs:** Approved Wireframes (Milestone 2), Design System Tokens (Milestone 1), verified client photo assets.
- **Objective:** Craft pixel-perfect, high-fidelity UI designs in Persian (RTL) and English (LTR) for all 7 primary pages, achieving world-class visual stature.
- **Key Tasks & Activities:**
  1. **Full-Bleed High-Fidelity Design Execution:** Render all 7 pages with authentic photography, calibrated typography, and glassmorphic micro-details.
  2. **Bidirectional Twin Layouts:** Produce 100% paired designs for every page in both RTL Persian and LTR English.
  3. **Motion Design Choreography:** Define exact GSAP motion specifications (scroll pinning, text mask uncurtaining, counter roll-ups, magnetic buttons).
  4. **Micro-Interaction States:** Complete hover, active, focus, loading, error, and empty states for every interactive component.
- **Deliverable Outputs:**
  - Complete high-fidelity UI design specification and visual assets.
  - Interactive clickable prototype links.
  - Motion Choreography & Kinetic Transition Specification.
- **Decision Gate G3:** Executive client approval of High-Fidelity visual designs and RTL/LTR fidelity.

---

### Milestone 4: HTML5 / Tailwind CSS / GSAP Interactive Prototype
- **Pre-requisite Inputs:** Approved High-Fidelity UI Designs & Motion Specs (Milestone 3).
- **Objective:** Code an independent, fully functioning static web prototype in clean HTML5, Tailwind CSS, and GSAP that serves as the definitive visual and behavioral reference.
- **Key Tasks & Activities:**
  1. **Semantic HTML5 Markup:** Construct clean, accessible, semantic markup for all 7 pages.
  2. **Tailwind CSS Implementation:** Build modular components using CSS Logical Properties (`margin-inline-start`, etc.) to guarantee seamless RTL/LTR flipping.
  3. **GSAP & Lenis Motion Engine:**
     - Integrate Lenis inertial momentum scrolling.
     - Implement GSAP ScrollTrigger for pinned scrollytelling on the About page.
     - Build magnetic cursor interactions and text reveal animations.
     - Enforce `prefers-reduced-motion` complete fallback.
  4. **Interactive 7-Subsidiary Matrix & Filter:** Code client-side filtering and in-page detail drawers using pure JavaScript (ES Modules).
  5. **Bilingual Toggle System:** Implement client-side `dir="rtl"` and `dir="ltr"` switching that swaps text, mirrors iconography, and adjusts typography instantly.
  6. **Responsive Testing:** Verify flawless rendering across 375px, 768px, 1024px, 1440px, and 4K displays.
- **Deliverable Outputs:**
  - Standalone prototype codebase in `/prototype/` (HTML, CSS, JS, local assets).
  - 7 fully navigable pages in both RTL and LTR.
  - Zero external CDN dependencies (100% bundled fonts and scripts).
- **Decision Gate G4:** Technical and visual review confirming 100% fidelity to the approved designs before any CMS code is touched.

---

### Milestone 5: Prototype Review, User Testing & Client Approval Gate
- **Pre-requisite Inputs:** Complete Interactive Prototype (Milestone 4).
- **Objective:** Subject the prototype to rigorous usability testing, cross-browser validation, performance auditing, and formal client sign-off.
- **Key Tasks & Activities:**
  1. **Cross-Browser & Device Testing:** Validate on mobile Safari (iOS), Chrome (Android/Desktop), Firefox, and Edge.
  2. **Core Web Vitals Pre-Audit:** Test LCP (<1.8s), INP (<150ms), and CLS (<0.05) on throttled network profiles.
  3. **Accessibility (a11y) Audit:** Run automated WCAG 2.1 AA audits; verify keyboard navigation, focus indicators, and screen reader labels.
  4. **Interactive Human Checkpoints (CP-01 to CP-06):** In accordance with `.agents/skills/html-to-classic-wp/SKILL.md`, formally resolve:
     - *CP-01:* Packaging CPTs in Companion Plugin (`rahnab-core-entities.php`) vs. Theme.
     - *CP-02:* Hero Section CMS editing strategy (Gutenberg Block Pattern vs. Customizer).
     - *CP-03:* Testimonials / Accreditations storage architecture.
     - *CP-04:* Navigation walker class injection vs. static fallback.
     - *CP-05:* Contact form backend handling.
     - *CP-06:* Local font hosting confirmation (Strictly Local).
- **Deliverable Outputs:**
  - Comprehensive Prototype QA & Usability Report.
  - Accessibility & Core Web Vitals Benchmark Report.
  - Formal Client Prototype Sign-Off Certificate.
- **Decision Gate G5 (MANDATORY VALIDATION GATE):** Formal client sign-off locking UX, visual design, and content containers. **No WordPress code begins without this sign-off.**

---

### Milestone 6: WordPress Architecture, Companion Plugin & CPT Data Modeling
- **Pre-requisite Inputs:** Approved Prototype (Milestone 4/5) and Checkpoint CP-01 sign-off.
- **Objective:** Architect the WordPress back-end data models, companion plugin, custom post types, custom taxonomies, and meta fields before touching theme presentation.
- **Key Tasks & Activities:**
  1. **Companion Plugin Engineering (`rahnab-core-entities`):**
     - Register `company` CPT with complete meta schema (Milestone 0 Deliverable 02).
     - Register `news_event` CPT and associated taxonomies (`therapeutic_area`, `activity_model`, `news_category`).
     - Register `team_member` CPT for leadership directory.
     - Register `accreditation` CPT for GMP/ISO badges.
  2. **Custom Meta Fields Configuration:** Configure ACF Pro or native meta boxes with context-aware sanitization.
  3. **Data Seeding & Migration:** Ingest all verified data for the 7 subsidiaries, leadership bios, and launch press releases.
  4. **REST API & Security Hardening:** Register secure read-only REST endpoints for dynamic filtering; configure nonces and capability checks.
- **Deliverable Outputs:**
  - Fully functional, tested companion plugin: `wp-content/plugins/rahnab-core-entities/`.
  - Exported ACF/JSON field group definitions.
  - Seed database containing complete verified portfolio data.
- **Decision Gate G6:** Verification that all CPTs, taxonomies, and custom fields are properly registered, sanitized, and queryable in the WordPress admin.

---

### Milestone 7: Custom WordPress Theme Implementation (Classic Theme)
- **Pre-requisite Inputs:** Approved Prototype (Milestone 4) and Functional Companion Plugin (Milestone 6).
- **Objective:** Convert the static prototype into an enterprise-grade Classic WordPress Theme following `.agents/rules/wordpress-development.md` and `.agents/skills/html-to-classic-wp/SKILL.md`.
- **Key Tasks & Activities:**
  1. **Theme Foundation (`Pass 1 - Visual Reconstruction`):**
     - Slicing HTML into `header.php`, `footer.php`, `index.php`, and `front-page.php`.
     - Standard enqueuing of CSS, local fonts, and GSAP scripts via `inc/enqueue.php`.
     - Injecting core WordPress hooks: `wp_head()`, `wp_footer()`, `body_class()`.
     - Achieving 100% visual parity with the static prototype.
  2. **Dynamic CMS Decoupling (`Pass 2 - CMS Migration`):**
     - Decouple global header/footer settings into the WordPress Customizer (`inc/customizer.php`).
     - Dynamic query integration: replace static cards with `WP_Query` loops for `company`, `news_event`, and `team_member`.
     - Template Hierarchy construction: `archive-company.php`, `single-company.php`, `page-about.php`, `page-contact.php`, `single.php`, `404.php`.
  3. **Strict Security & Output Escaping:**
     - Enforce late output escaping across all dynamic echoes: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`.
     - Implement secure B2B contact form processing with nonce verification, honeypot validation, and corporate SMTP dispatch.
  4. **Bilingual Engine Integration:** Integrate Polylang or WPML compatibility for seamless URL switching (`/` to `/en/`).
- **Deliverable Outputs:**
  - Production-ready Custom Classic Theme: `wp-content/themes/rahnab-pharmed/`.
  - Modular theme structure (`inc/`, `template-parts/`, `assets/`).
  - Zero PHP notices, warnings, or deprecated functions under PHP 8.2+.
- **Decision Gate G7:** Theme passes code quality and WordPress coding standard audits (`lint-php.sh` and security scan).

---

### Milestone 8: Full QA, Forensic Audit, Core Web Vitals Optimization & Deployment
- **Pre-requisite Inputs:** Complete WordPress Theme & Companion Plugin (Milestone 7).
- **Objective:** Perform end-to-end quality assurance, security penetration testing, performance optimization, and production deployment on domestic Iranian infrastructure.
- **Key Tasks & Activities:**
  1. **Forensic Integrity & Verification Audit:** Conduct independent verification that zero placeholder strings, dummy data, or broken links remain.
  2. **Core Web Vitals Optimization:**
     - Implement WebP image compression, native responsive `srcset` generation, and lazy-loading.
     - Minify and bundle local CSS/JS assets.
     - Achieve Google Lighthouse score > 90 across Performance, Accessibility, Best Practices, and SEO.
  3. **Security Penetration Audit:** Audit form endpoints, CSRF tokens, SQL injection defenses, and HTTP security headers (`Content-Security-Policy`, `X-Frame-Options`, `HSTS`).
  4. **Server Deployment & CDN Synchronization:** Deploy theme on domestic NVMe server, configure Redis object cache, set up SSL certificates, and configure ArvanCloud CDN caching rules.
  5. **Client Handover & Documentation:** Deliver Administrator Training Manual and theme documentation.
- **Deliverable Outputs:**
  - Production live website: `https://rahnab.com`.
  - Comprehensive Final QA & Performance Audit Report.
  - Administrator CMS User Guide (Persian & English).
  - Complete Git repository archive and deployment release tag (`v1.0.0`).
- **Decision Gate G8:** Final Stakeholder Acceptance and formal production launch.

---

## 3. Timeline Sequencing & Milestone Interlock Schedule

```text
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│                                   MASTER TIMELINE & DEPENDENCY MATRIX                            │
├─────────────┬───────────────────────────────────────────┬──────────────┬─────────────────────────┤
│ Milestone   │ Milestone Title                           │ Duration     │ Pre-requisite Gate      │
├─────────────┼───────────────────────────────────────────┼──────────────┼─────────────────────────┤
│ Milestone 0 │ Research, Benchmarks & Discovery (Done)   │ Week 1       │ Project Dispatch        │
│ Milestone 1 │ Brand Strategy, Art Direction & Design    │ Week 2       │ Gate G0 (M0 Approval)   │
│ Milestone 2 │ Information Architecture & Wireframes     │ Week 3       │ Gate G1 (Brand Signoff) │
│ Milestone 3 │ High-Fidelity UI Design & Motion Specs    │ Weeks 4–5    │ Gate G2 (IA Signoff)    │
│ Milestone 4 │ HTML5 / Tailwind / GSAP Prototype        │ Weeks 6–7    │ Gate G3 (UI Signoff)    │
│ Milestone 5 │ Prototype Review, Usability QA & Gate     │ Week 8       │ Gate G4 (Proto Review)  │
│ Milestone 6 │ WordPress Architecture & Companion Plugin │ Week 9       │ Gate G5 (Human Gate)    │
│ Milestone 7 │ Custom WordPress Theme & Dynamic CMS      │ Weeks 10–11  │ Gate G6 (Data Model)    │
│ Milestone 8 │ QA Audit, CWV Optimization & Deployment   │ Week 12      │ Gate G7 (Theme Signoff) │
└─────────────┴───────────────────────────────────────────┴──────────────┴─────────────────────────┘
```

---
*Authored and forensically validated by Milestone 0 Synthesis Team (`worker_m0_synthesis`) for the official project records.*
