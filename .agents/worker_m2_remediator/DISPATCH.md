## 2026-09-09T19:51:12Z

TASK: Apply 8 precision fixes across the deliverables in `/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m2/deliverables/`:
1. Mathematical contrast clarification (02_CREATIVE_DIRECTION.md, 03_DESIGN_SYSTEM.md):
   - Dark Sovereign Slate text (#0A0F1D) on Clinical Emerald (#00A896) empirical contrast ratio 6.41:1. Correct doc: PASSES WCAG AA for normal text (>=4.5:1), PASSES WCAG AAA for large text (>=3.0:1), but does NOT achieve 7.00:1 AAA for normal text (<18pt).
   - Clarify that border-subtle (#1E293B / #1C2A3E) has contrast ratio of 1.36:1 vs Obsidian, purely decorative and does NOT meet 3:1 non-text UI contrast (SC 1.4.11). Form input boundaries must use --border-prominent or high-contrast surfaces.
   - Update --text-muted to #78889E (contrast ratio 5.60:1 vs Obsidian #030914, passing WCAG AA).
2. Mobile clamp floor for display-2xl (03_DESIGN_SYSTEM.md, 04_TAILWIND_TOKENS_BLUEPRINT.md):
   - Change 'display-2xl' clamp from clamp(3.25rem, 5vw + 1rem, 5.5rem) to mobile clamp floor of 2rem (32px): e.g. clamp(2rem, 4vw + 1rem, 5.5rem) or clamp(2rem, 4.5vw + 1rem, 5.5rem).
3. Tailwind CSS double-slash syntax fix (04_TAILWIND_TOKENS_BLUEPRINT.md):
   - Resolve double slash syntax issue where `--color-border-subtle: 255 255 255 / 0.08` combined with `rgb(var(--color-border-subtle) / <alpha-value>)` produces invalid `rgb(255 255 255 / 0.08 / 1)`.
   - Decouple RGB channels from alpha cleanly in tokens.css and tailwind.config.js for both Direction A and Direction B.
4. GSAP cleanup fix (05_MOTION_INTERACTION_LANGUAGE.md):
   - Replace destructive `ScrollTrigger.getAll().forEach(t => t.kill());` with `gsap.context()` cleanup (`ctx = gsap.context(...)` and `ctx.revert()`) or specific trigger cleanup (`tl.scrollTrigger?.kill(); tl.kill()`).
   - Verify Lenis smooth scroll handles prefers-reduced-motion cleanly.
5. Mobile sticky dock geometry (01_UX_BLUEPRINT.md):
   - Replace hardcoded `w-[65%]` and `w-[35%]` + `gap-3` with flexbox ratio: `flex-[2] min-w-0` and `flex-[1] min-w-0`.
   - Add iOS safe area padding: `pt-3 pb-[max(0.75rem,env(safe-area-inset-bottom))] px-4`.
6. KPI Counter localization (05_MOTION_INTERACTION_LANGUAGE.md):
   - Fix `const isPersian = document.documentElement.lang === 'fa';` to `const isPersian = document.documentElement.lang.startsWith('fa') || document.documentElement.dir === 'rtl';`
   - Preserve metric suffixes by animating dedicated numeric inner element (`<span class="kpi-num">`).
7. Remove 18px baseline grid violation (04_TAILWIND_TOKENS_BLUEPRINT.md, 03_DESIGN_SYSTEM.md):
   - Remove `'4.5': '1.125rem', // 18px` from Tailwind spacing extensions. Ensure all spacing tokens align to 4px/8px multiples.
8. Align text secondary/muted hex codes:
   - Synchronize across 02_CREATIVE_DIRECTION.md, 03_DESIGN_SYSTEM.md, 04_TAILWIND_TOKENS_BLUEPRINT.md, and INDEX.md:
     Primary text: #F8FAFC
     Secondary text: #CBD5E1
     Muted text: #78889E (WCAG AA compliant)

## 2026-09-09T20:11:32Z
**Sender**: parent (`7ec7dc45-979c-4993-bb65-08793d9e9153`)
**Content**: Status check on the 8 precision fixes across `.agents/orchestrator_m2/deliverables/`. Please report your current progress and ETA.
**Action**: Reply with current status and update progress.md.
