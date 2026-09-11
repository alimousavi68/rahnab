## 2026-09-09T19:04:58Z

You are explorer_m2_tokens_motion, the Design Tokens & Motion Explorer for Milestone 2 of the Rahnab Pharmed Corporate Website project.
Working Directory: /Users/user/Sites/localhost/rahnab/.agents/explorer_m2_tokens_motion

MANDATORY FIRST STEP:
Read the following authoritative sources in full:
1. /Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md (MANDATORY: read this first, especially the 2026-09-09T18:59:39Z entry).
2. /Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md
3. /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/ (CPT architecture, navigation architecture)
4. /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m2/SCOPE.md
5. Available skill: /Users/user/.gemini/config/plugins/modern-web-guidance-plugin/skills/modern-web-guidance/SKILL.md (consult for modern web best practices, container queries, CSS logical properties, motion a11y)
6. All rules in /Users/user/Sites/localhost/rahnab/.agents/rules/

YOUR MISSION:
Perform deep technical exploration and author a comprehensive specification report that serves as the definitive foundation for `03_DESIGN_SYSTEM.md`, `04_TAILWIND_TOKENS_BLUEPRINT.md`, and `05_MOTION_INTERACTION_LANGUAGE.md`.

CORE TOPICS TO ANALYZE & SPECIFY:
1. Typography Systems:
   - Persian typography: Yekan Bakh / Peyda with exact modular scale (major second or minor third), line-heights, letter-spacing, font-feature-settings (ss01, ss02 for Persian numerals).
   - English typography: Euclid Circular A / Plus Jakarta Sans paired with matching x-height and optical weight balance.
   - Exact type scales (display, h1-h6, body-lg, body-md, body-sm, caption, code) with rem/px values and line-heights.
2. Master Token Architecture:
   - Complete semantic token schema: Surface (`surface-primary`, `surface-secondary`, `surface-elevated`, etc.), Text (`text-primary`, `text-secondary`, `text-muted`, `text-accent`), Border (`border-subtle`, `border-prominent`, `border-active`), Accent & Status (success, warning, error, info), and Alpha channels.
   - Spatial system: 4px/8px baseline grid, containers (max-w 1600px with responsive container queries and logical paddings).
   - Elevation & Micro-radius (sharp, premium 2px-6px radii, layered subtle ambient shadows without muddy blur).
   - Key Component Specifications: Primary/secondary/tertiary buttons, Subsidiary Value Chain Cards, Institutional KPI Counters, Data tables, Mega-menu, Footer, Modal/drawer dialogs.
3. Tailwind CSS Architecture:
   - Complete `tailwind.config.js` design token mapping, custom utilities, CSS variable mappings, and CSS logical properties (`margin-inline-start`, `padding-inline-end`, etc.) for seamless RTL/LTR switching.
4. GSAP Motion & Interaction Language:
   - ScrollTrigger timeline architecture, smooth scroll considerations (Lenis or native), narrative pinned sections, value-chain scroll animation.
   - Kinetic typography reveals (character/line masks), magnetic interactive elements, animated KPI count-ups.
   - Performance optimization (GPU transforms, will-change discipline), and strict accessibility compliance (`@media (prefers-reduced-motion: reduce)` fallbacks).

DELIVERABLE OUTPUT:
- Write your complete findings to `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_tokens_motion/analysis.md`
- Write your structured handoff report to `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_tokens_motion/handoff.md` (Observation, Logic Chain, Caveats, Conclusion, Verification Method)
- Update `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_tokens_motion/progress.md` with timestamps.
- Send a completion message to parent when finished. Do not write any code outside of your `.agents/explorer_m2_tokens_motion/` directory.
