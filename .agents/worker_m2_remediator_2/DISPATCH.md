## 2026-09-09T20:21:43Z
You are worker_m2_remediator_2 (Replacement Remediation Worker).
Working directory: /Users/user/Sites/localhost/rahnab/.agents/worker_m2_remediator_2
Target Deliverables Location: /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m2/deliverables/
Source of Truth: /Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md
Original User Request: /Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md
Challenger 1 Defect Report: /Users/user/Sites/localhost/rahnab/.agents/challenger_m2_1/challenge_report.md
Forensic Audit Report: /Users/user/Sites/localhost/rahnab/.agents/auditor_m2/audit_report.md

MANDATORY INTEGRITY WARNING:
DO NOT CHEAT. All implementations must be genuine. DO NOT hardcode test results, create dummy/facade implementations, or circumvent the intended task. A teamwork_preview_auditor will independently verify your work. Integrity violations WILL be detected and your work WILL be rejected.

STRICT BOUNDARY:
- ZERO WordPress PHP / theme files created.
- ZERO full HTML prototype pages coded.
- Pure architectural specifications, design systems, design tokens, blueprints, motion languages, and ADRs.

TASK:
You must directly edit the markdown files in `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m2/deliverables/` using `replace_file_content` to apply these 8 precision fixes:

1. Mathematical contrast clarification:
   - In `02_CREATIVE_DIRECTION.md` and `03_DESIGN_SYSTEM.md`:
     Correct the claim that Dark Sovereign Slate text (`#0A0F1D`) on Clinical Emerald (`#00A896`) achieves 7.00:1 (AAA). Change it to: 6.41:1 (PASSES WCAG AA for normal body text, PASSES WCAG AAA for large text only).
     Clarify that `border-subtle` (`#1E293B` / `#1C2A3E`) has a contrast ratio of ~1.36:1 vs Obsidian and is purely decorative (does not meet 3:1 non-text UI contrast SC 1.4.11; interactive form boundaries must use prominent borders or high-contrast surfaces).
     Update `--text-muted` to `#78889E` (achieving 5.60:1 AA contrast against Obsidian `#030914`).

2. Mobile clamp floor for `display-2xl`:
   - In `03_DESIGN_SYSTEM.md` and `04_TAILWIND_TOKENS_BLUEPRINT.md`:
     Change `'display-2xl'` clamp from `clamp(3.25rem, 5vw + 1rem, 5.5rem)` (52px floor) to a mobile floor of 2rem (32px): `clamp(2rem, 4vw + 1rem, 5.5rem)`.

3. Tailwind CSS double-slash syntax fix:
   - In `04_TAILWIND_TOKENS_BLUEPRINT.md`:
     In `tokens.css` (both Direction A and Direction B), decouple the alpha channel from the CSS variables so they don't produce double-slash syntax (`/ 0.08 / 1`):
     Define pure RGB channels:
     `--color-border-subtle: 255 255 255;`
     `--color-border-subtle-alpha: 0.08;`
     `--color-border-muted: 255 255 255;`
     `--color-border-muted-alpha: 0.14;`
     `--color-border-prominent: 255 255 255;`
     `--color-border-prominent-alpha: 0.28;`
     `--color-accent-subtle: 253 119 2;`
     `--color-accent-subtle-alpha: 0.12;`
     In `tailwind.config.js`:
     Use `rgba(var(--color-border-subtle), var(--color-border-subtle-alpha, 0.08))` or `'rgb(var(--color-border-subtle) / <alpha-value>)'` where `--color-border-subtle` contains only `255 255 255` without `/ 0.08`.

4. GSAP cleanup fix:
   - In `05_MOTION_INTERACTION_LANGUAGE.md`:
     In `initValueChainTimeline` and any `matchMedia` callbacks, replace `ScrollTrigger.getAll().forEach(t => t.kill());` with `gsap.context()` cleanup (e.g. `ctx = gsap.context(...)` and `return () => ctx.revert()`) or `tl.scrollTrigger?.kill(); tl.kill()`.
     Verify Lenis respects `prefers-reduced-motion`.

5. Mobile sticky dock geometry:
   - In `01_UX_BLUEPRINT.md`:
     Replace hardcoded `w-[65%]` and `w-[35%]` + `gap-3` with flex ratio: `flex-[2] min-w-0` and `flex-[1] min-w-0`.
     Add iOS safe area padding: `pt-3 pb-[max(0.75rem,env(safe-area-inset-bottom))] px-4`.

6. KPI Counter localization:
   - In `05_MOTION_INTERACTION_LANGUAGE.md`:
     Change `const isPersian = document.documentElement.lang === 'fa';` to:
     `const isPersian = document.documentElement.lang.startsWith('fa') || document.documentElement.dir === 'rtl';`
     Preserve metric suffixes by animating a dedicated numeric inner span `<span class="kpi-num">`.

7. Remove 18px baseline grid violation:
   - In `04_TAILWIND_TOKENS_BLUEPRINT.md`:
     Remove `'4.5': '1.125rem', // 18px` from Tailwind spacing extensions.

8. Align text secondary/muted hex codes:
   - Synchronize across `02_CREATIVE_DIRECTION.md`, `03_DESIGN_SYSTEM.md`, `04_TAILWIND_TOKENS_BLUEPRINT.md`, and `INDEX.md`:
     Text Primary: `#F8FAFC`
     Text Secondary: `#CBD5E1`
     Text Muted: `#78889E`

Write a summary handoff to `/Users/user/Sites/localhost/rahnab/.agents/worker_m2_remediator_2/handoff.md` and send a message back to parent orchestrator when complete.
