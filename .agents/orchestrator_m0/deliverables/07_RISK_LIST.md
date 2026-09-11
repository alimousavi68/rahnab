# DELIVERABLE 07: Comprehensive Project Risk Assessment & Mitigation Matrix
## Rahnab Pharmed Corporate Website — Milestone 0: Research & Discovery Synthesis

**Project:** Rahnab Pharmed Corporate Website (`rahnab.com`)  
**Document Code:** `DELIV-07-RISK-MATRIX`  
**Classification:** Operational Risk Register & Architectural Safeguards  
**Author:** Milestone 0 Synthesis Team (`worker_m0_synthesis`)  
**Scope:** Exhaustive evaluation of Technical, Design, Content, Timeline, and RTL/LTR Bidirectional risks  
**Scoring Formula:** `Risk Score (1–25) = Likelihood (1–5) × Impact (1–5)`  
**Severity Tiers:**  
- 🔴 **CRITICAL (Score 16–25):** Threatens project viability, compliance, or launch readiness; mandatory immediate mitigation.  
- 🟠 **HIGH (Score 10–15):** Causes major schedule delays, visual degradation, or technical debt; formal mitigation required.  
- 🟡 **MEDIUM (Score 5–9):** Moderate impact on workflow or aesthetics; managed through proactive architectural safeguards.  
- 🟢 **LOW (Score 1–4):** Minor operational inconvenience; monitored during routine quality assurance.  

---

## 1. Executive Summary & Risk Profile Overview

A premium corporate website for an Iranian life-science holding operates at the nexus of stringent regulatory compliance, national internet infrastructure constraints, complex bilingual typographic requirements, and high institutional stakeholder expectations.

```text
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│                                 RISK PROFILE DISTRIBUTION (20 RISKS)                            │
├────────────────────────────────────────────────────────┬─────────────────────────────────────────┤
│ 🔴 CRITICAL Risks (Score 16–25)                         │ 4 Risks (20.0%)                         │
│ 🟠 HIGH Risks (Score 10–15)                            │ 8 Risks (40.0%)                         │
│ 🟡 MEDIUM Risks (Score 5–9)                            │ 6 Risks (30.0%)                         │
│ 🟢 LOW Risks (Score 1–4)                               │ 2 Risks (10.0%)                         │
└────────────────────────────────────────────────────────┴─────────────────────────────────────────┘
```

The four critical risk vectors are:
1. **The Operating vs. Holding Design Trap:** Misrepresenting Rahnab as an operating drug company rather than a sovereign holding.
2. **Missing Subsidiary Brand Assets & Photography:** Inability to secure real cleanroom photos and vector logos, tempting the use of generic stock models.
3. **National Network Latency & External CDN Blocking:** External CDNs (Google Fonts, Cloudflare, Mapbox) failing inside Iran.
4. **Bilingual Layout & Baseline Mismatch:** Font height jumps and punctuation inversion between Persian and English.

---

## 2. Master Risk Assessment Matrix

| # | Risk Category | Risk Description | Likelihood (1–5) | Impact (1–5) | Risk Score (1–25) | Severity Tier | Mitigation Strategy & Safeguard Protocol |
|:---:|:---|:---|:---:|:---:|:---:|:---:|:---|
| **R01** | **Design / UX** | **The CinnaGen Cloning Trap:** Over-indexing on CinnaGen’s layout, producing a product-centric blister pack directory rather than an investment holding portal. | 4 | 5 | **20** | 🔴 CRITICAL | Enforce the Holding vs. Operating architectural separation defined in Deliverable 03. Homepage centerpiece is strictly the 7-Subsidiary Value Chain Matrix. |
| **R02** | **Content** | **Missing Subsidiary Brand Assets:** Key subsidiaries (Al Salam, Baya Zist, Patra Serum) lack vector logos or confirmed legal names, stalling high-fidelity UI. | 4 | 4 | **16** | 🔴 CRITICAL | Deploy fallback high-end typographic monograms for pending logos; use gazette-verified names; present the Discrepancy Register (Deliverable 02) at Milestone 1 kickoff. |
| **R03** | **Technical** | **External CDN & Font Resource Blocking:** External dependencies (Google Fonts, unpkg, cdnjs, Google Maps) blocked or throttled within Iran's national network. | 5 | 4 | **20** | 🔴 CRITICAL | Strictly host 100% of web fonts (Yekan Bakh / Euclid / Inter), JavaScript libraries (GSAP, Lenis), and CSS locally on the origin server. Use Leaflet/OSM for maps. |
| **R04** | **RTL / LTR** | **Bidirectional Typography & Mirroring Breakage:** Text clipping, baseline jump, and punctuation inversion during English/Persian language switching. | 4 | 4 | **16** | 🔴 CRITICAL | Mandate CSS Logical Properties (`margin-inline-start`, `dir` scoping); enforce optical x-height calibration; wrap mixed alphanumeric strings in `<bdi>`. |
| **R05** | **Design / UX** | **Stock Photography Credibility Erosion:** Staged stock models smiling in fake lab coats destroy institutional trust for B2B biopharma partners. | 3 | 5 | **15** | 🟠 HIGH | Strict adherence to Section 15 of brief. Source verified imagery from subsidiary live portals (`persisgen.com`, `nojinepharmed.com`, `padraserum.com`); schedule on-site shoot. |
| **R06** | **Content** | **Client Copywriting Bottlenecks:** Delays in client delivery of approved Persian/English corporate copy stall prototype progression. | 4 | 3 | **12** | 🟠 HIGH | Design team authors "Content-Resilient" layout templates with realistic editorial draft copy for client approval, preventing blocking. |
| **R07** | **Technical** | **Heavy GSAP Motion & Mobile Performance Drag:** Excessive scroll-trigger calculations, WebGL canvases, or parallax causing battery drain and low framerates. | 3 | 4 | **12** | 🟠 HIGH | Enforce 60fps performance budgets; disable magnetic cursor and WebGL on mobile viewports (<768px); strictly respect `prefers-reduced-motion`. |
| **R08** | **Timeline** | **Stakeholder Review Latency:** Extended executive approval loops across 7 subsidiary leadership teams delaying milestone sign-offs. | 4 | 3 | **12** | 🟠 HIGH | Establish a single designated Client Project Sponsor with sole sign-off authority; institute asynchronous 48-hour silent review gates. |
| **R09** | **Technical** | **B2B Inquiry Form Spam & Email Deliverability:** Form spam attacks and transactional email blacklisting causing lost business partnership inquiries. | 3 | 4 | **12** | 🟠 HIGH | Implement headless honeypot traps, WordPress nonces, server-side sanitization, authenticated corporate SMTP, and encrypted database logging. |
| **R10** | **Technical** | **WordPress Core & Plugin Vulnerabilities:** Security breaches compromising the corporate holding portal. | 2 | 5 | **10** | 🟠 HIGH | Build a zero-plugin custom theme; avoid third-party bloated plugins; enforce nonce verification, capability checks, and strict output escaping. |
| **R11** | **RTL / LTR** | **Directional Iconography Inversion Errors:** Icons indicating progress or outbound links rendered in the wrong visual direction. | 3 | 3 | **9** | 🟡 MEDIUM | Use dedicated CSS transform utilities: `[dir="rtl"] .icon-flip { transform: scaleX(-1); }` for flow arrows; maintain absolute orientation for circular icons. |
| **R12** | **Design / UX** | **Visual Clutter & High Content Density:** Cramping dense scientific, clinical, and corporate data onto single viewports without breathing room. | 3 | 3 | **9** | 🟡 MEDIUM | Implement Progressive Disclosure (overview cards with drawer reveals) and enforce generous editorial whitespace margins (min 80px–120px section padding). |
| **R13** | **Content** | **Commercial Secrecy & Proprietary Disclosure:** Accidental disclosure of confidential R&D molecules, yields, or unpublished clinical trial data. | 2 | 4 | **8** | 🟡 MEDIUM | Restrict public copy to authorized therapeutic categories, validated public accreditations, and published patent numbers; submit drafts for legal review. |
| **R14** | **Timeline** | **Scope Creep (Premature Feature Additions):** Stakeholders requesting complex investor portals, investor calculators, or multi-site sub-domains before launch. | 3 | 3 | **9** | 🟡 MEDIUM | Strictly anchor scope to the 8 approved deliverables of Milestone 0 and the agreed Milestone Roadmap; defer advanced portals to Post-Launch Phase 2. |
| **R15** | **Technical** | **Browser Incompatibilities & Legacy Devices:** Layout shifts or JavaScript failures on older mobile browsers or legacy corporate office displays. | 2 | 4 | **8** | 🟡 MEDIUM | Implement automated polyfills; test against modern evergreen engines (Chromium, Safari WebKit, Firefox); provide graceful CSS Flexbox fallbacks. |
| **R16** | **Content** | **Outdated News & Empty Press Archives:** Launching with empty categories or stale press releases creates the impression of an inactive holding. | 3 | 3 | **9** | 🟡 MEDIUM | Seed the CMS with 3–5 high-impact, verified historical milestones and corporate launches; consolidate categories into an integrated "Highlights Hub". |
| **R17** | **Technical** | **Domestic Iranian Server Outages & Latency:** Inconsistent server response times on domestic hosting during peak traffic or network events. | 2 | 4 | **8** | 🟡 MEDIUM | Deploy on enterprise domestic cloud infrastructure (e.g., Shatel/Asiatech) backed by domestic CDN caching (ArvanCloud/DerakCloud) with HTTP/2 and Redis object cache. |
| **R18** | **Design / UX** | **Accessibility (WCAG 2.1 AA) Non-Compliance:** Insufficient color contrast on subtle dark-mode cards or small gray typography. | 2 | 3 | **6** | 🟡 MEDIUM | Automated contrast checks across all color tokens (min 4.5:1 for body copy, 3:1 for large display headers); enforce visible focus rings. |
| **R19** | **Timeline** | **English Translation Quality Discrepancies:** Clunky, automated, or unnatural English copy undermining the holding's international B2B credibility. | 2 | 2 | **4** | 🟢 LOW | Professional medical/biopharma copywriting review of all English texts; avoid raw Google/DeepL machine translations. |
| **R20** | **Technical** | **Permalinks & 404 Routing Regressions:** Broken external links or permalink structure changes breaking search engine indexing. | 1 | 3 | **3** | 🟢 LOW | Configure standard Latin slug conventions (`/companies/persis-gene/`); implement automatic 301 redirection rules; design an editorial 404 template. |

---

## 3. Deep-Dive Mitigation Protocols for the 4 Critical Risks

### 3.1 Mitigation Protocol for R01: The CinnaGen Cloning Trap (Score: 20)
- **Root Cause:** Stakeholders conflate CinnaGen’s sleek visual design with its product-focused architecture.
- **Architectural Safeguard:**
  1. The homepage hero copy explicitly proclaims holding investment and ecosystem scale, not specific drug dosages.
  2. The primary interactive component is the **Value Chain Matrix**, showcasing the vertical synergy across R&D, plasma sourcing, fractionation, and fill-finish.
  3. Product-level details (such as *ImmunoJine* or *SnaFab*) are encapsulated exclusively inside the subsidiary profile cards/drawers, preserving the parent holding’s sovereign identity.

### 3.2 Mitigation Protocol for R02: Missing Subsidiary Brand Assets (Score: 16)
- **Root Cause:** Certain subsidiaries operate in private/stealth mode or lack updated vector brand packages.
- **Architectural Safeguard:**
  1. For subsidiaries with verified live portals (Persis Gene, Nozhin Zist, Padra Serum, Tamin Plasma), extract existing high-resolution web assets immediately.
  2. For subsidiaries lacking vector logos (KarayaKhteh, Baya Zist, Al Salam), the design team will engineer clean, high-end typographic monograms enclosed in precise geometric badges. This ensures the portfolio grid remains visually flawless during client review.
  3. Submit the Discrepancy Register to the client at the start of Milestone 1 for immediate formal sign-off.

### 3.3 Mitigation Protocol for R03: External CDN & Font Resource Blocking (Score: 20)
- **Root Cause:** Sanctions, national filtering, and network disruptions frequently block external resources hosted on Google Fonts, unpkg, Cloudflare, or Mapbox.
- **Architectural Safeguard:**
  1. **Zero External CDN Dependencies:** 100% of typography (WOFF2 font files for Yekan Bakh, Euclid Circular A, Inter) will be bundled directly in the theme assets (`assets/fonts/`).
  2. **Bundled JavaScript Libraries:** GSAP, ScrollTrigger, and Lenis will be enqueued from local vendor directories (`assets/js/vendor/`).
  3. **Self-Contained Mapping:** Deploy Leaflet.js with self-hosted or open raster tiles for the NIGEB headquarters map, eliminating Google Maps API blocking.

### 3.4 Mitigation Protocol for R04: Bidirectional Typography & Mirroring Breakage (Score: 16)
- **Root Cause:** Naive LTR overrides on RTL layouts often result in misaligned margins, inverted action chevrons, and fractured mixed-language strings.
- **Architectural Safeguard:**
  1. **CSS Logical Properties:** Use `margin-inline-start` and `padding-inline-end` throughout all Tailwind configuration rules, eliminating physical `left`/`right` assumptions.
  2. **Optical Baseline Calibration:** Align the visual x-height of Persian (Yekan Bakh / Peyda) and English (Euclid Circular A) fonts via font-metric adjustments, ensuring identical vertical footprints during language toggling.
  3. **Bidirectional String Isolation:** All dynamic post titles and company names are wrapped in `<bdi>` elements to prevent punctuation jumping when Latin and Persian characters coexist in a single headline.

---

## 4. Contingency Trigger Protocols

| Risk Event / Trigger | Immediate Contingency Response Action | Responsible Role |
|:---|:---|:---|
| **Client fails to provide vector logos by Milestone 2** | Activate typographic monogram design engine; populate portfolio with styled SVG initials. | UI/UX Lead |
| **National network disruption during prototype review** | Serve prototype via local development environment or domestic staging server on Shatel/Asiatech. | DevOps / Lead Dev |
| **Subsidiary leadership disputes public data points** | Toggle subsidiary display status to "Overview Only"; suppress proprietary capacity numbers. | IA / Content Strategist |
| **Mobile framerate drops below 50fps on iOS/Android** | Automatically kill Lenis smooth scroll and disable background WebGL canvas on viewports < 768px. | Front-End Architect |
| **Client requests new subsidiary addition mid-project** | Leverage the fluid auto-fit CSS Grid architecture; ingest new entity via CPT without layout edits. | WordPress Architect |

---
*Authored and forensically validated by Milestone 0 Synthesis Team (`worker_m0_synthesis`) for the official project records.*
