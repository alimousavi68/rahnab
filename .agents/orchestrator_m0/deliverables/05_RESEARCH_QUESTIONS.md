# DELIVERABLE 05: Research Questions & Decision Inquiry Catalog
## Rahnab Pharmed Corporate Website — Milestone 0: Research & Discovery Synthesis

**Project:** Rahnab Pharmed Corporate Website (`rahnab.com`)  
**Document Code:** `DELIV-05-RESEARCH-Q`  
**Classification:** Official Stakeholder & Technical Inquiry Register  
**Author:** Milestone 0 Synthesis Team (`worker_m0_synthesis`)  
**Purpose:** Eliminate architectural ambiguity, prevent mid-project scope revisions, and formalize client sign-offs before UI design begins  
**Priority Legend:**  
- **P0 (Immediate Blocker):** Requires resolution before Information Architecture (Milestone 2) and Wireframing.  
- **P1 (Design Phase):** Requires resolution before High-Fidelity UI Design (Milestone 3) and Prototype styling.  
- **P2 (Development & Launch):** Requires resolution during Prototype review (Milestone 5) and WordPress theme configuration.  

---

## 1. Executive Summary

To adhere to the core project workflow (`project-workflow.md` and `decision-making.md`), no engineering or visual design assumption may be made unilaterally. This catalog isolates every critical business, visual, editorial, and technical decision, presenting clear context, the architectural impact of delay, structured options with tradeoffs, and a recommended resolution for stakeholder approval.

```text
┌──────────────────────────────────────────────────────────────────────────────────────────────────┐
│                                INQUIRY DISTRIBUTION BY DOMAIN                                    │
├────────────────────────────────────────────────────────┬─────────────────────────────────────────┤
│ Category 1: Business Strategy & Holding Positioning    │ 4 Critical Questions                    │
│ Category 2: Brand Identity & Visual Asset Architecture │ 4 Critical Questions                    │
│ Category 3: Content, Editorial & Subsidiary Disclosure │ 4 Critical Questions                    │
│ Category 4: Technical Infrastructure & Hosting Systems │ 4 Critical Questions                    │
├────────────────────────────────────────────────────────┼─────────────────────────────────────────┤
│ Total Structured Inquiries                             │ 16 Comprehensive Decision Checkpoints   │
└────────────────────────────────────────────────────────┴─────────────────────────────────────────┘
```

---

## 2. Categorized Inquiry Catalog

### Category 1: Business Strategy & Holding Positioning

#### Question 1.1: Holding Governance Model & Shared Services Dynamic
- **Priority:** **P0**
- **Target Decision Maker:** Executive Board / Managing Director
- **Context:** `MASTER_PROJECT_BRIEF.md` describes Rahnab Pharmed as an "investment holding" (هلدینگ سرمایه‌گذاری). In life sciences, holdings vary from passive financial asset managers to centralized operating ecosystems that provide shared cleanrooms, centralized regulatory affairs, joint clinical trials, and pooled business development teams.
- **Architectural Impact:** Determines whether the "About Us" and "Capabilities" sections present shared corporate infrastructure (e.g., centralized analytical laboratories, regulatory filing divisions) or strictly profile autonomous investments.
- **Structured Options:**
  - *Option A (Shared Platform Ecosystem — Recommended):* Present Rahnab as a strategic platform providing shared technological, financial, and regulatory backing to its 7 ventures.
  - *Option B (Pure Financial Holding):* Present Rahnab strictly as an investment fund, minimizing operational narrative and emphasizing portfolio ROI.
- **Recommendation:** **Option A**. This aligns with the group's co-location at the National Institute of Genetic Engineering (NIGEB) and elevates institutional credibility.

---

#### Question 1.2: Legal Relationship & Ownership Architecture for the 7 Subsidiaries
- **Priority:** **P0**
- **Target Decision Maker:** Corporate Legal Counsel / Executive Board
- **Context:** The relationship to Rahnab differs across the portfolio (e.g., Nozhin Zist and Baya Zist share Rahnab’s NIGEB registered address; Persis Gene is a major national accelerator; Padra Serum is an established market leader; Al Salam is an overseas asset).
- **Architectural Impact:** Directly affects the taxonomy and metadata tags displayed on company cards (e.g., "شرکت تابعه / Wholly Owned", "سرمایه‌گذاری راهبردی / Strategic Holding", "شرکت مشترک / Joint Venture", "شتاب‌دهنده همکار / Incubation Partner").
- **Structured Options:**
  - *Option A (Standardized Group Endorsement):* Uniformly label all seven as "شرکت‌های گروه دارویی رهناب" (Members of Rahnab Pharmed Group) without publishing sensitive equity percentages.
  - *Option B (Granular Equity Categorization):* Disclose exact legal categories (Wholly Owned, Majority Stake, Joint Venture).
- **Recommendation:** **Option A**. Standardized endorsement protects corporate confidentiality while projecting massive group scale and unity.

---

#### Question 1.3: Strategic Positioning vs. CinnaGen (Divergence Mandate)
- **Priority:** **P0**
- **Target Decision Maker:** Chief Marketing Officer / Strategic Director
- **Context:** While the client favors CinnaGen's digital elegance, CinnaGen is an operating biosimilar manufacturer whose homepage is 80% finished medicine boxes. Rahnab is an investment holding orchestrating an entire biomanufacturing lifecycle.
- **Architectural Impact:** Dictates the primary conversion focus of the Hero section: Does the site showcase high-level biotechnology infrastructure, or does it attempt to feature therapeutic categories?
- **Structured Options:**
  - *Option A (Sovereign Life-Science Holding — Recommended):* Hero section headline proclaims national biopharma infrastructure, capital synergy, and life-saving technologies, leading directly to the 7-Subsidiary Portfolio.
  - *Option B (Product/Therapeutic Facade):* Create synthetic product categories grouping the subsidiaries' drugs together on the homepage.
- **Recommendation:** **Option A**. Option B violates our non-fabrication integrity mandate and confuses B2B investors and regulators.

---

#### Question 1.4: Primary B2B Executive Conversion Call-to-Action (KPI)
- **Priority:** **P1**
- **Target Decision Maker:** Head of Business Development / Commercial Director
- **Context:** An institutional visitor (pharma CEO, overseas distributor, investor) needs an explicit primary conversion action on the homepage and subsidiary profiles.
- **Architectural Impact:** Determines the styling, label, and target destination of the persistent floating CTA button.
- **Structured Options:**
  - *Option A:* "ارتباط با هلدینگ / Corporate Inquiries" (Routes directly to the B2B contact form).
  - *Option B:* "کشف شرکت‌های زیرمجموعه / Explore Ecosystem" (Smooth scrolls to the interactive portfolio matrix).
  - *Option C:* "دریافت کاتالوگ معرفی هلدینگ / Download Corporate Fact Sheet" (Triggers instant PDF download).
- **Recommendation:** Dual-action strategy: Primary CTA triggers "Explore Ecosystem" (Option B); secondary floating button triggers "Corporate Inquiries" (Option A).

---

### Category 2: Brand Identity & Visual Asset Architecture

#### Question 2.1: Brand Endorsement Model (House of Brands vs. Branded House)
- **Priority:** **P1**
- **Target Decision Maker:** Brand Strategist / Executive Board
- **Context:** Persis Gene, Nozhin Zist, and Padra Serum possess established standalone logos and market reputations.
- **Architectural Impact:** Affects subsidiary card headers and detail drawers: Should subsidiary logos stand alone, or should they carry an endorsement lockup (e.g., "A Rahnab Pharmed Company" / «عضوی از گروه رهناب فارمد»)?
- **Structured Options:**
  - *Option A (Endorsed Identity Architecture — Recommended):* Each company displays its distinct official brandmark, accompanied by a subtle, elegant holding endorsement badge.
  - *Option B (Autonomous Silos):* Complete brand independence with no holding endorsement mark on subsidiary assets.
- **Recommendation:** **Option A**. Emulates the world-class Danaher model ("Cytiva, a Danaher company"), strengthening both parent and child brand equity.

---

#### Question 2.2: Rahnab Pharmed Corporate Brand Guidelines & Vector Package
- **Priority:** **P0**
- **Target Decision Maker:** Client Design Lead / Brand Custodian
- **Context:** The project requires vector SVG logos and authoritative color codes for Rahnab Pharmed.
- **Architectural Impact:** Directly drives the Tailwind CSS design token configuration (colors, font weights, container widths) in Milestone 1.
- **Structured Options:**
  - *Option A:* Client supplies an existing corporate Brand Book (.ai / .pdf) and vector logo package.
  - *Option B:* The agency design team proposes a complete Brand Identity System (palette, typographic hierarchy, vector logomark refinements) for client executive approval.
- **Recommendation:** Clarify immediately. If Option A is available, client sends assets within 3 business days; if Option B, Milestone 1 will formally include brand identity development.

---

#### Question 2.3: Physical Photography Shoot vs. Existing High-Resolution Archives
- **Priority:** **P1**
- **Target Decision Maker:** Public Relations / Facility Operations
- **Context:** Section 15 of the brief strictly prohibits generic stock photography. Authentic imagery of NIGEB headquarters, Sepehr industrial cleanrooms, and executive leadership is required.
- **Architectural Impact:** Determines whether Milestone 3 UI designs can use client photographic archives or if a professional architectural/industrial photo shoot must be scheduled.
- **Structured Options:**
  - *Option A:* Client provides existing uncompressed photo archives of the NIGEB headquarters, Sepehr fractionation plant, and leadership portraits.
  - *Option B:* Client commissions a targeted on-site photo shoot at NIGEB (Tehran) and Sepehr Industrial Town (Nazarabad).
- **Recommendation:** Conduct an initial asset audit of existing client archives. If gaps exist, schedule a 1-day professional shoot before Milestone 3 UI sign-off.

---

#### Question 2.4: Signature Accent Color Selection
- **Priority:** **P1**
- **Target Decision Maker:** Creative Director & Client Stakeholder
- **Context:** Section 15 strictly prohibits the "overly blue pharmaceutical cliché" (`#007bff`). Benchmark analysis revealed CinnaGen succeeds by pairing deep navy with high-energy amber (`#fd7702`), while Flagship Pioneering uses electric lime.
- **Architectural Impact:** Defines the visual personality and accent tokens in the Tailwind design system.
- **Structured Options:**
  - *Option A (Kinetic Bio-Amber — `#FD7702` / `#F59E0B`):* Highest energy contrast; mirrors CinnaGen’s proven warm-kinetic Iranian appeal.
  - *Option B (Clinical Emerald / Life-Teal — `#00A896` / `#059669`):* Deep scientific life-science association; evokes biology, cell renewal, and natural purity.
  - *Option C (Sovereign Platinum Gold — `#D4AF37`):* Ultra-luxury financial holding perception; evokes capital scale.
- **Recommendation:** **Option A or Option B**. Present both in the Milestone 1 Art Direction boards for client selection.

---

### Category 3: Content, Editorial & Subsidiary Disclosure

#### Question 3.1: Resolution of Legal vs. Informal Subsidiary Names
- **Priority:** **P0**
- **Target Decision Maker:** Legal Counsel / Project Sponsor
- **Context:** Forensic research revealed 4 corporate naming discrepancies between brief shorthand and official gazette filings:
  1. *Patra Serum (پاترا سرم)* vs. **پادرا سرم البرز (Padra Serum Alborz)**
  2. *Tamin Plasma (تامین پلاسما)* vs. **تأمین پلاسما نوژین (Tamin Plasma Nozhin)**
  3. *Baya (بایا)* vs. **بایا زیست فارمد (Baya Zist Pharmed)**
  4. *KarayaKhteh (کارایاخته)* vs. **کارا یاخته تجهیز آزما (CARTIMED)**
- **Architectural Impact:** Determines navigation labels, URL slugs, SEO title tags, and schema.org structured metadata.
- **Structured Options:**
  - *Option A (Full Legal Precision):* Use official registered legal titles across all primary headings, URLs, and schemas.
  - *Option B (Hybrid Dual-Naming — Recommended):* Display the crisp brand shorthand as primary display title (e.g., «نوژین زیست فارمد»), while including the full registered legal name in the profile metadata badge.
- **Recommendation:** **Option B**. Provides maximum visual elegance while preserving legal precision and search authority.

---

#### Question 3.2: Clarification of "Al Salam" Identity & Scope
- **Priority:** **P0**
- **Target Decision Maker:** Executive Board / International Business Director
- **Context:** No domestic Iranian biotech is registered as "السلام". Research identified **Al-Salam Pharmaceutical Industry in Iraq** ([alsalampharma.com](https://alsalampharma.com)) as the candidate entity.
- **Architectural Impact:** Affects company profile content, therapeutic classification (Parenterals/IV Fluids vs. Biologics), location flags (Iraq/MENA vs. Iran), and outbound URL.
- **Specific Confirmations Needed:**
  1. Is Al Salam the Iraqi IV fluid manufacturer, or an offshore commercial trading entity?
  2. What is the approved logo and description to display on `rahnab.com`?
- **Recommendation:** Client provides formal written guidance on the Al Salam entity profile within 5 business days.

---

#### Question 3.3: Commercial Secrecy & Disclosure Limits for Subsidiaries
- **Priority:** **P1**
- **Target Decision Maker:** Chief Technology Officer / Subsidiary Heads
- **Context:** Certain subsidiaries (such as KarayaKhteh's CAR-T clinical trials or Baya Zist's Safadasht fill-finish line) involve proprietary technologies or pending patent approvals.
- **Architectural Impact:** Governs the level of technical detail displayed in the "Key Capabilities" and "Products / Pipeline" repeater sections.
- **Structured Options:**
  - *Option A (High-Level Capabilities):* Focus on therapeutic domains, infrastructure capacity, and approved accreditations without disclosing proprietary yields or unpublished trial cohorts.
  - *Option B (Full Scientific Pipeline):* Display granular clinical stage matrices (Preclinical, Phase I, Phase II, Commercial).
- **Recommendation:** **Option A** for public launch, with modular architecture enabling Option B in future updates.

---

#### Question 3.4: Editorial Governance & Publishing Cadence for News & Events
- **Priority:** **P2**
- **Target Decision Maker:** Public Relations Director
- **Context:** An inactive or outdated "News" section severely damages corporate credibility. The brief proposes 6 categories: All, Rahnab News, Subsidiary News, Events, Exhibitions, Achievements.
- **Architectural Impact:** Determines taxonomy density and whether the homepage displays a dedicated dynamic news carousel or an integrated corporate highlights banner.
- **Structured Options:**
  - *Option A (Integrated Milestone Hub — Recommended):* Curate a "Highlights & Milestones" hub that combines major press releases with permanent corporate achievements, avoiding empty category pages.
  - *Option B (Full Daily Newsroom):* Deploy a traditional multi-category corporate pressroom requiring weekly updates.
- **Recommendation:** **Option A**. Ideal for holding groups that issue 1–3 high-impact strategic announcements per month.

---

### Category 4: Technical Infrastructure & Hosting Systems

#### Question 4.1: Production Domain & Server Hosting Infrastructure
- **Priority:** **P0**
- **Target Decision Maker:** Chief Information Officer / Lead SysAdmin
- **Context:** `rahnab.com` must serve Iranian domestic users as well as international B2B partners seamlessly. National intranet (NIN / شبکه ملی اطلاعات) routing and international DNS resolution must be harmonized.
- **Architectural Impact:** Affects CDN selection, SSL certificate procurement, and web font loading strategies.
- **Structured Options:**
  - *Option A (High-Performance Iranian Cloud / Hybrid CDN — Recommended):* Host on top-tier domestic NVMe infrastructure (e.g., Shatel, Asiatech, Afranet) paired with a domestic/global hybrid CDN (ArvanCloud or DerakCloud) to guarantee sub-1.5s load times inside Iran and worldwide.
  - *Option B (Overseas Hosting):* Host on European servers (Hetzner/AWS). Can cause latency or intermittent access issues during national network disruptions.
- **Recommendation:** **Option A**. Mandatory for compliance, high domestic speed, and unhindered SEO performance.

---

#### Question 4.2: Sub-domain vs. Directory Architecture for Subsidiaries
- **Priority:** **P1**
- **Target Decision Maker:** Digital Architect / SEO Lead
- **Context:** Question of whether subsidiaries will eventually reside on sub-domains (e.g., `persis.rahnab.com`) or remain strictly on dedicated directory paths (`rahnab.com/companies/persis-gene`) and external domains (`persisgen.com`).
- **Architectural Impact:** WordPress multi-site network configuration vs. single-site CPT architecture.
- **Structured Options:**
  - *Option A (Unified Directory & External Outbound — Recommended):* Single WordPress instance; subsidiaries live at `rahnab.com/companies/{slug}/` with clear outbound buttons to their independent portals.
  - *Option B (WordPress Multisite Sub-domain Network):* Configure `*.rahnab.com` where each subsidiary manages its own independent sub-portal.
- **Recommendation:** **Option A**. Dramatically reduces maintenance overhead, concentrates domain authority on `rahnab.com`, and preserves subsidiary brand autonomy.

---

#### Question 4.3: Interactive Headquarters Map Service in Iran
- **Priority:** **P2**
- **Target Decision Maker:** Lead Front-End Developer
- **Context:** Google Maps and Mapbox APIs experience frequent latency, blocking, or billing restrictions inside Iran.
- **Architectural Impact:** Selection of mapping library and tile provider for the Contact page headquarters visualizer.
- **Structured Options:**
  - *Option A (OpenStreetMap via Leaflet with Custom Vector Tiles — Recommended):* Self-hosted or open Leaflet.js map with customized monochrome styling matching the site’s palette. 100% reliable, zero API key blocking.
  - *Option B (Domestic Map API — Neshan / ParseeMap):* High accuracy within Tehran, but introduces third-party domestic API dependencies for international English visitors.
- **Recommendation:** **Option A**. Provides universal accessibility for both domestic and overseas executive visitors.

---

#### Question 4.4: B2B Form Inquiries Dispatch & CRM Routing
- **Priority:** **P2**
- **Target Decision Maker:** IT Operations / Executive Office
- **Context:** The B2B inquiry form must route sensitive partnership and investment requests reliably.
- **Architectural Impact:** Back-end email handling, SMTP relay configuration, database storage, and notification protocols.
- **Structured Options:**
  - *Option A (Authenticated SMTP + DB Archival — Recommended):* Form submissions are validated, securely stored in a custom encrypted WordPress database log, and dispatched via authenticated corporate SMTP (e.g., `smtp.rahnab.com`) to `info@rahnab.com`.
  - *Option B (External CRM / Webhook Integration):* Forward submissions directly to an internal CRM or ERP via REST webhook.
- **Recommendation:** Implement **Option A** as foundation, with webhook extensibility ready for Option B.

---

## 3. Master Decision Register & Timeline

| Inquiry ID | Domain & Focus | Priority | Target Resolution Gate | Status |
|:---:|:---|:---:|:---:|:---:|
| **Q1.1** | Holding Governance & Shared Services Model | **P0** | Milestone 1 Kickoff | Pending Client Input |
| **Q1.2** | Subsidiary Equity & Ownership Categorization | **P0** | Milestone 2 (IA) | Pending Client Input |
| **Q1.3** | Holding vs. Operating Positioning (CinnaGen Divergence) | **P0** | Milestone 1 (Design) | Recommended (Option A) |
| **Q1.4** | Primary B2B Executive Conversion Call-to-Action | **P1** | Milestone 2 (UX) | Proposed Dual Action |
| **Q2.1** | Subsidiary Brand Endorsement Model | **P1** | Milestone 1 (Design) | Recommended (Option A) |
| **Q2.2** | Rahnab Brand Guidelines & Vector Logo Package | **P0** | Milestone 1 Kickoff | Pending Client Delivery |
| **Q2.3** | Photo Archives vs. On-Site Professional Shoot | **P1** | Milestone 3 (Hi-Fi) | Audit in Progress |
| **Q2.4** | Signature Accent Palette Selection | **P1** | Milestone 1 (Design) | Board Review in M1 |
| **Q3.1** | Formal Resolution of Subsidiary Naming Discrepancies | **P0** | Milestone 2 (IA) | Recommended (Option B) |
| **Q3.2** | Formal Identification of Al Salam Entity & Scope | **P0** | Milestone 2 (IA) | Inquiry Submitted |
| **Q3.3** | Commercial Secrecy & Capabilities Disclosure Limits | **P1** | Milestone 2 (Content) | Recommended (Option A) |
| **Q3.4** | Editorial Governance & Newsroom Publishing Cadence | **P2** | Milestone 6 (CMS) | Recommended (Option A) |
| **Q4.1** | Server Infrastructure & Iranian Domestic CDN | **P0** | Milestone 6 (WP Core) | Technical Architecture Set |
| **Q4.2** | Sub-domain vs. Dedicated Directory Architecture | **P1** | Milestone 2 (IA) | Recommended (Option A) |
| **Q4.3** | Leaflet / OpenStreetMap Headquarters Visualizer | **P2** | Milestone 4 (Proto) | Technical Architecture Set |
| **Q4.4** | Authenticated SMTP & Form Data Governance | **P2** | Milestone 6 (CMS) | Technical Architecture Set |

---
*Authored and forensically validated by Milestone 0 Synthesis Team (`worker_m0_synthesis`) for the official project records.*
