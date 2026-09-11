# Hard Handoff Report: UX Architecture Exploration
## Milestone 2: Design System & UX/UI Architecture — Rahnab Pharmed Corporate Website

**Agent:** `explorer_m2_ux`  
**Working Directory:** `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_ux`  
**Recipient Agent:** `orchestrator_m2` (`088adcbc-4866-4916-bf9b-d2aa22ad7c7f`)  
**Timestamp:** 2026-09-09T19:15:00Z  
**Deliverable Generated:** `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_ux/analysis.md`

---

### 1. Observation
1. **Source of Truth & Strategic Mandate:**
   - In `/Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md`, lines 347–356 specify that the website must be *"Super Premium / Sophisticated / High-End / Scientific / Corporate / Dynamic"* and distinctly *"an editorial life-science holding digital experience"*, rejecting generic pharma clichés (lines 415–427).
   - In `/Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md`, lines 155–167 explicitly established the definitive 7 subsidiaries: Persis Gene, Nozhin Zist Pharmed (National ID `14012098694`), Padra Serum Alborz (National ID `14006664540`), KarayaKhteh / CARTIMED (National ID `14007103978`), Tamin Plasma Nozhin (National ID `14012987472`), Baya Zist Pharmed (National ID `14010425772`), and Arc Zist Azma (National ID `14003984672`), permanently replacing "Al Salam".
2. **Prior Architecture Deliverables Inspected:**
   - In `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md` (lines 280–326), an 8-zone canonical anatomy for the single subsidiary profile (`single-company.php`) was established.
   - In `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/02_NAVIGATION_ARCHITECTURE.md` (lines 13–78), the primary desktop floating glassmorphic pill (`max-w-[1280px]`, `h-[72px]`, `rounded-2xl`) and the adaptive dual-mode mega-menu were defined.
   - In `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/03_CONTENT_HIERARCHY.md` (lines 34–101), the 6 sovereign homepage narrative zones and the mandatory flow matrix template part (`template-parts/home/flow-matrix.php`) were established.
   - In `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/05_USER_FLOW_DIAGRAMS.md` (lines 42–160), 4 enterprise B2B user journeys were modeled with targeted conversion funnels.
3. **Milestone 2 Scope Directives:**
   - In `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m2/SCOPE.md` (lines 8–13), strict boundaries were set: zero WordPress PHP / theme files created, zero full HTML prototype pages in this phase, and full architectural specification of the 8 Strategic Homepage questions, subpage UX anatomies, responsive UX, and bidirectional RTL/LTR logic.

---

### 2. Logic Chain
- **Step 1 (Observation 1.1 -> Brand Promise & Scale):** Because Rahnab Pharmed is an investment holding and not an operating consumer pharmacy, the UX must communicate sovereign national biomanufacturing scale (150,000L plasma refinery, 70% antivenom supply, first biological QC laboratory in Iran) rather than end-consumer drug sales leaflets.
- **Step 2 (Observation 1.1, 1.2 -> Continuous Value Chain over Card Grids):** A standard 3x3 card grid falsely portrays the 7 subsidiaries as disjointed businesses. In reality, they form an unbroken biological progression (R&D -> Harvesting -> Fractionation -> ATMP Cell Therapy -> Fill-Finish -> Release Testing). Therefore, the homepage centerpiece must be architected as the **Continuous Flow Matrix (`flow-matrix.php`)** with directional flow conduits, real-time cluster filters, and in-context quick-reveal drawers.
- **Step 3 (Observation 1.2 -> Subpage UX Modularity):** By anchoring each subpage around structured zones (such as the 8 zones of `single-company.php` and the 6 zones of `page-about.php`), the worker author can produce a completely unified, content-resilient design system in subsequent tasks.
- **Step 4 (Observation 2.2, 3.1 -> Responsive Ergonomics):** On mobile viewports (360px–430px), horizontal desktop flows fail ergonomics. Transforming the flow matrix into a vertical step-flow with circular numbered nodes, sticky bottom conversion docks (with 65/35 split between B2B inquiry and click-to-call), and draggable native bottom sheets ensures WCAG 2.2 AA compliance and thumb-zone accessibility.
- **Step 5 (Observation 1.1 -> Bidirectional RTL/LTR Integrity):** Because Persian (`dir="rtl"`) is default and English (`dir="ltr"`) is secondary, all spatial rules must use CSS Logical Properties (`margin-inline-start`, etc.). Directional action icons must mirror across the Y-axis, while static icons remain unmirrored, and embedded Latin trade strings (`CARTIMED`, `ImmunoJine`) must be wrapped in `<bdi>` tags to prevent punctuation inversion.

---

### 3. Caveats
- Detailed visual color swatch hexes and photographic mood boards are under the purview of peer agent `explorer_m2_art`.
- Exact Tailwind CSS utility class maps and GSAP easing curves are under the purview of peer agent `explorer_m2_tokens_motion`.
- Official legal registration numbers for Nozhin Zist and Padra Serum are verified, but corporate bylaws and final legal gazette texts for holding-level board members remain subject to final client submission during content population.

---

### 4. Conclusion
The UX Architecture exploration is fully synthesized and documented in `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_ux/analysis.md`. It provides complete, verified, and unambiguous answers to all 8 Strategic Homepage Questions, delivers granular zone anatomies for all subpages, defines mobile (360px–430px) and tablet (768px–1024px) ergonomics with minimum 48px touch targets, and specifies strict bidirectional RTL/LTR logic. It forms the solid foundation for `worker_m2_author` to write `01_UX_BLUEPRINT.md`.

---

### 5. Verification Method
To independently verify this handoff:
1. **Inspect Analysis File:**
   ```bash
   test -f /Users/user/Sites/localhost/rahnab/.agents/explorer_m2_ux/analysis.md && wc -l /Users/user/Sites/localhost/rahnab/.agents/explorer_m2_ux/analysis.md
   ```
   *Expected Output:* File exists and contains > 400 lines of structured analysis.
2. **Verify Coverage of 8 Strategic Homepage Questions:**
   Search for `Question 1` through `Question 8` inside `analysis.md` to confirm all 8 questions are answered with granular technical specifications.
3. **Verify Compliance with 7 Confirmed Subsidiaries:**
   Verify presence of Persis Gene, Nozhin Zist Pharmed, Padra Serum Alborz, KarayaKhteh / CARTIMED, Tamin Plasma Nozhin, Baya Zist Pharmed, and Arc Zist Azma, with zero references to the excised entity "Al Salam".
4. **Verify ADR Formats:**
   Inspect Section 6 of `analysis.md` to ensure all 4 ADRs adhere strictly to `.agents/rules/decision-making.md` (Option 1, Option 2, Final Recommendation, Rationale).
