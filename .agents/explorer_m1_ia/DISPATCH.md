## 2026-09-09T17:02:28Z
You are Explorer 2 (IA & Navigation Architect).
Your working directory is: /Users/user/Sites/localhost/rahnab/.agents/explorer_m1_ia
You MUST read:
- /Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md
- /Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/SCOPE.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/06_INITIAL_IA_PROPOSAL.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/03_BENCHMARK_MATRIX.md
- /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/01_REQUIREMENTS_DOCUMENT.md

YOUR MISSION:
Analyze and formulate concrete architectural blueprints for the following 5 deliverables:
1. Final Sitemap:
   - Complete website hierarchical tree with RESTful Latin URL slug conventions (e.g., `/`, `/about`, `/about/governance`, `/subsidiaries`, `/subsidiaries/{slug}`, `/news-events`, `/news-events/{slug}`, `/contact`, `/compliance`, etc.)
   - Future portfolio extensibility: Architectural strategy allowing seamless expansion to >7, 15, or 20 subsidiaries without restructuring the navigation or URL hierarchy (e.g., cluster/domain taxonomy).
   - Dual-language routing strategy: Persian default (`/` with RTL layout) and English secondary (`/en/...` with LTR layout), prefix vs domain strategy, hreflang and canonical setup.
   - News & Events taxonomy and cross-entity relationship with subsidiaries.
   - Company detail page architectural structure.
2. Navigation Architecture:
   - Primary Header Navigation (Desktop): items, hierarchy, mega-menu vs dropdown for subsidiaries value chain, language switcher placement.
   - Footer Navigation: structured columns (Ecosystem, Corporate, Regulatory & Standards, Contact & Locations), legal/disclaimers.
   - Mobile Navigation: drawer / off-canvas structure, touch ergonomics, responsive accessibility.
   - Language Switcher: placement, persistence, fallback behavior when English translation is unavailable.
3. Content Hierarchy:
   - Per page: content prioritization, content zones, data sources, narrative arc.
   - Special focus on Homepage: must tell a Corporate Holding Story (Hero vision -> Value chain biomanufacturing ecosystem -> Subsidiary highlights -> National impact & scale -> News & Events -> Institutional contact), NOT a generic card grid.
4. User Flow Diagrams:
   - 4 core B2B user journeys mapped step-by-step:
     a. B2B Visitor / Pharma Client -> Subsidiary & Service Discovery
     b. Investor / Financial Institution -> Group Strength & Governance Overview
     c. Press / Media -> News, Official Statements, Media Assets
     d. Partner / Research Institute -> Scientific & Business Collaboration Contact
5. IA Decision Log:
   - Comprehensive documentation of all key IA decisions, alternative options considered, and explicit technical & business rationale.

Write your findings to `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_ia/analysis.md` and write a complete, self-contained `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_ia/handoff.md`.
Communicate your completion via send_message to caller. STRICTLY NO SOURCE CODE.
