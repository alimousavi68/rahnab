# DELIVERABLE 03: MASTER DESIGN SYSTEM & DESIGN TOKENS
## Rahnab Pharmed Corporate Website (`rahnab.com`)
### Milestone 2: Design System, Tokens & Art Direction

**Document Code:** `RAHNAB-M2-DELIV-03-DS`  
**Classification:** Authoritative Technical Specification & Engineering System  
**Target Milestone:** Milestone 2 (Design System Architecture)  
**Downstream Consumer:** Milestone 3 (Interactive HTML/CSS/JS Prototype Engine)  
**Parent Orchestrator:** `orchestrator_m2`  
**Authoring Unit:** `worker_m2_author`  
**Foundational Sources:** `docs/MASTER_PROJECT_BRIEF.md`, `.agents/ORIGINAL_REQUEST.md`, `explorer_m2_tokens_motion/analysis.md`, `explorer_m2_art/analysis.md`, `explorer_m2_ux/analysis.md`, `.agents/rules/`.

---

## 1. Executive Summary & Design System Principles

The Rahnab Pharmed Master Design System is engineered as a deterministic, mathematically rigorous framework for high-stature life-science holding presentation. It enforces:
1. **True Bilingual Parity (RTL/LTR Equivalence):** Persian typography (Yekan Bakh / Peyda) and Latin typography (Plus Jakarta Sans / Euclid Circular A) share identical spatial metrics, optical weights, and baseline intervals through CSS Logical Properties.
2. **Three-Tier Token Architecture:** Primitive values are completely decoupled from UI components through a strict semantic layer (`surface`, `text`, `border`, `accent`, `status`), enabling dynamic theming.
3. **Sharp Architectural Micro-Radius:** Rejecting rounded consumer "bubble" curves in favor of crisp `2px` to `6px` micro-radii paired with chromatic ambient shadows.
4. **Resilient Component Engineering:** Every component is designed to accommodate variable content lengths, dynamic data, and bidirectional switching without layout reflow bugs.

```text
┌────────────────────────────────────────────────────────┐
│ 1. GLOBAL PRIMITIVES (Raw Hex / HSL / OKLCH)           │
│    obsidian-950, amber-500, slate-950, emerald-500...  │
└──────────────────────────┬─────────────────────────────┘
                           ▼
┌────────────────────────────────────────────────────────┐
│ 2. SEMANTIC TOKENS (Context & Role Driven)             │
│    surface-primary, text-muted, border-subtle, accent  │
└──────────────────────────┬─────────────────────────────┘
                           ▼
┌────────────────────────────────────────────────────────┐
│ 3. COMPONENT TOKENS (Scoped Implementations)           │
│    btn-primary-bg, card-subsidiary-border, kpi-glow... │
└────────────────────────────────────────────────────────┘
```

---

## 2. Bilingual Typography Architecture

### 2.1 Persian & English Font Pairing & Optical Harmonization
- **Persian Primary:** **Yekan Bakh (یکان بخ)** by Reza Bakhtiarifard. A contemporary geometric neo-grotesque with tall x-height, open counters, crisp terminals, and institutional neutrality.
- **Persian Display Accent:** **Peyda (پیدا)** for high-impact editorial statements and pull-quotes.
- **English Primary:** **Plus Jakarta Sans** by Tokotype. A modern geometric sans-serif whose x-height aligns within 1.5% of Yekan Bakh. Full variable font support (`wght` 200–800) and SIL Open Font license.
- **English Alternative:** **Euclid Circular A** (Swiss Typefaces) as the luxury neo-grotesque enterprise benchmark.

#### Optical Height & Weight Balance Table
| Dimension | Persian (Yekan Bakh) | English (Plus Jakarta Sans) | Optical Harmonization Strategy |
|:---|:---|:---|:---|
| **Capital / Ascender Height** | 760 units | 745 units | Latin ascenders visually match Persian `Alef` (`ا`). |
| **X-Height / Core Body** | 520 units | 528 units | Perfectly balanced across bilingual inline labels. |
| **Descender Depth** | -240 units | -210 units | Container paddings set to accommodate Persian descender reach. |
| **Regular Weight (`400`)** | Optical Stem: 84px | Optical Stem: 82px | Identical apparent ink weight in body paragraphs. |
| **Bold Weight (`700`)** | Optical Stem: 154px | Optical Stem: 152px | Identical visual punch in section titles. |

### 2.2 OpenType Features & Tabular Figures
Persian typography requires an optical line-height increase of **+0.10 to +0.15** relative to Latin typefaces to avoid descender clipping and provide comfortable B2B reading comfort:

```css
/* Persian Typography Feature Stack */
.font-persian {
  font-family: 'Yekan Bakh', 'Peyda', system-ui, -apple-system, 'Segoe UI', Tahoma, 'Vazirmatn', sans-serif;
  font-feature-settings: 
    "ss01" on,  /* Persian standard rounded numerals (۰۱۲۳۴۵۶۷۸۹) */
    "ss02" on,  /* Stylistic Set 2: Curated alternative glyph terminations */
    "cv01" on,  /* Contextual Alternates for harmonious word connections */
    "locl" on;  /* Localized forms for Persian language */
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
}

/* Tabular Numerics for Financial & Scientific KPI Tables */
.font-tabular-nums {
  font-feature-settings: "tnum" on, "ss01" on;
  font-variant-numeric: tabular-nums;
}
```

### 2.3 Exact Modular Type Scale
Combines an Augmented Fourth ratio (1.414) for display hero tiers with a Minor Third ratio (1.200) for body/metadata:

| Token Name | Font Size (rem / px) | Viewport Responsive Clamp Formula | Line-Height (Latin) | Line-Height (Persian) | Weight | Letter Spacing (EN) | Intended Use Case |
|:---|:---|:---|:---|:---|:---|:---|:---|
| `display-2xl` | `5.5rem` / 88px | `clamp(2rem, 4vw + 1rem, 5.5rem)` | `1.08` | `1.18` | 800 (Black) | `-0.025em` | Hero main statements, holding brand promise (32px mobile floor prevents 360px overflow) |
| `display-xl` | `4.25rem` / 68px | `clamp(2.75rem, 4vw + 0.75rem, 4.25rem)` | `1.12` | `1.22` | 700 (Bold) | `-0.02em` | Section hero headings, value-chain intro |
| `display-lg` | `3.25rem` / 52px | `clamp(2.25rem, 3vw + 0.5rem, 3.25rem)` | `1.15` | `1.25` | 700 (Bold) | `-0.015em` | Secondary showcase titles, milestone banners |
| `h1` | `2.625rem` / 42px | `clamp(2.0rem, 2.5vw + 0.5rem, 2.625rem)` | `1.22` | `1.32` | 700 (Bold) | `-0.015em` | Subpage hero titles (About, Subsidiaries) |
| `h2` | `2.125rem` / 34px | `clamp(1.625rem, 2vw + 0.25rem, 2.125rem)` | `1.28` | `1.38` | 700 (Bold) | `-0.01em` | Major content section headers |
| `h3` | `1.75rem` / 28px | `clamp(1.375rem, 1.5vw + 0.25rem, 1.75rem)` | `1.32` | `1.42` | 600 (SemiBold) | `-0.005em` | Subsidiary cards, news card headlines |
| `h4` | `1.375rem` / 22px | `1.375rem` (fixed) | `1.42` | `1.48` | 600 (SemiBold) | `0em` | Widget headers, modal dialog titles |
| `h5` | `1.1875rem` / 19px | `1.1875rem` (fixed) | `1.42` | `1.52` | 600 (SemiBold) | `0em` | Feature titles, table section heads |
| `h6` | `1.0625rem` / 17px | `1.0625rem` (fixed) | `1.45` | `1.55` | 600 (SemiBold) | `0em` | Sub-labels, metadata headers |
| `body-lg` | `1.125rem` / 18px | `1.125rem` (fixed) | `1.65` | `1.75` | 400 (Regular) | `0em` | Introductory lead paragraphs, executive bios |
| `body-md` | `1.0rem` / 16px | `1.0rem` (Base root) | `1.60` | `1.70` | 400 (Regular) | `0em` | Primary narrative body, press release articles |
| `body-sm` | `0.875rem` / 14px | `0.875rem` (fixed) | `1.55` | `1.65` | 400 / 500 | `0.01em` | Subsidiary metadata, card specs, form labels |
| `caption` | `0.75rem` / 12px | `0.75rem` (fixed) | `1.45` | `1.55` | 500 (Medium) | `0.02em` | Timestamps, badge tags, copyright lines |
| `code / mono` | `0.8125rem` / 13px| `0.8125rem` (fixed) | `1.50` | `1.50` | 500 (Medium) | `0em` | Batch numbers, National IDs, patent codes |

---

## 3. Master Color Token Specifications

The design system fully encodes both strategic directions (Direction A: Bio-Kinetic Obsidian & Amber; Direction B: Clinical Sovereign Slate & Emerald) via CSS Custom Properties:

### 3.1 Semantic Color Token Schema
| Semantic Token Name | Role / Function | Direction A Value | Direction B Value | Light Canvas Fallback |
|:---|:---|:---|:---|:---|
| `--surface-primary` | Root page canvas | `#030914` | `#0A0F1D` | `#F8FAFC` |
| `--surface-secondary` | Section containers, alternating zones | `#060E1E` | `#0D1425` | `#F1F5F9` |
| `--surface-tertiary` | Neutral cards, input background | `#081326` | `#10192D` | `#E2E8F0` |
| `--surface-elevated` | Floating pills, mega-menus, modals | `#0E1D3A` | `#18243E` | `#FFFFFF` |
| `--surface-glass` | Translucent glassmorphic panels | `rgba(8, 19, 38, 0.78)` | `rgba(16, 25, 45, 0.78)` | `rgba(255, 255, 255, 0.85)` |
| `--surface-glass-heavy`| Deep glassmorphic dialogs & navbars | `rgba(3, 9, 20, 0.90)` | `rgba(10, 15, 29, 0.90)` | `rgba(255, 255, 255, 0.94)` |
| `--surface-inverse` | Inverted surface for contrast elements | `#F8FAFC` | `#F8FAFC` | `#030914` |
| `--text-primary` | High-contrast main headings & titles | `#F8FAFC` | `#F8FAFC` | `#0F172A` |
| `--text-secondary` | Body text, readable articles | `#CBD5E1` | `#CBD5E1` | `#334155` |
| `--text-tertiary` | Supporting text, metadata, labels | `#94A3B8` | `#94A3B8` | `#64748B` |
| `--text-muted` | Inactive items, placeholder text (5.60:1 AA vs `#030914`) | `#78889E` | `#78889E` | `#64748B` |
| `--text-accent` | Brand highlighted key figures & links | `#FD7702` | `#00A896` | `#C25700` / `#007A6D` |
| `--text-inverse` | Text on inverted surfaces | `#030914` | `#0A0F1D` | `#F8FAFC` |
| `--border-subtle` | Purely decorative hairline dividers (1.36:1 vs `#030914`; purely decorative, does NOT meet SC 1.4.11 3:1 non-text UI contrast; interactive form inputs must use `--border-prominent`) | `rgba(255, 255, 255, 0.08)`| `rgba(255, 255, 255, 0.08)`| `rgba(15, 23, 42, 0.08)` |
| `--border-muted` | Standard card and container strokes | `rgba(255, 255, 255, 0.14)`| `rgba(255, 255, 255, 0.14)`| `rgba(15, 23, 42, 0.14)` |
| `--border-prominent` | Active card borders, inputs on focus (meets SC 1.4.11) | `rgba(255, 255, 255, 0.28)`| `rgba(255, 255, 255, 0.28)`| `rgba(15, 23, 42, 0.28)` |
| `--border-accent` | Accent brand borders | `#FD7702` | `#00A896` | `#FD7702` / `#00A896` |
| `--border-glass` | Hairline specular highlight on glass | `rgba(255, 255, 255, 0.18)`| `rgba(255, 255, 255, 0.18)`| `rgba(255, 255, 255, 0.60)` |
| `--accent-primary` | Primary action button, brand indicator | `#FD7702` | `#00A896` | `#FD7702` / `#00A896` |
| `--accent-hover` | Hover state for interactive brand elements| `#FF9333` | `#00C4AE` | `#E06500` / `#008C7D` |
| `--accent-active` | Active/pressed state for brand buttons | `#D86200` | `#008C7D` | `#B85200` / `#007366` |
| `--accent-subtle` | Subtle tinted background chip / pill | `rgba(253, 119, 2, 0.12)` | `rgba(0, 168, 150, 0.12)` | `rgba(253, 119, 2, 0.08)` |
| `--accent-glow` | Volumetric glow for hero cards & buttons | `0 0 24px rgba(253, 119, 2, 0.35)` | `0 0 24px rgba(0, 168, 150, 0.35)` | `0 0 16px rgba(253, 119, 2, 0.20)` |

### 3.2 Status Feedback Tokens (Operational & Regulatory)
- **Status Success (GMP Approvals, Batch Pass):** Foreground `#10B981`, Background `rgba(16, 185, 129, 0.12)`, Border `rgba(16, 185, 129, 0.30)`.
- **Status Warning (Regulatory Pending, Clinical Trial Phase):** Foreground `#F59E0B`, Background `rgba(245, 158, 11, 0.12)`, Border `rgba(245, 158, 11, 0.30)`.
- **Status Error (Form Validation, Compliance Alert):** Foreground `#EF4444`, Background `rgba(239, 68, 68, 0.12)`, Border `rgba(239, 68, 68, 0.30)`.
- **Status Info (Technical Specs, Cleanroom Class):** Foreground `#0EA5E9`, Background `rgba(14, 165, 233, 0.12)`, Border `rgba(14, 165, 233, 0.30)`.

---

## 4. Spatial System & Layout Grid

### 4.1 8px Baseline Grid with 4px Micro-Steps
| Token Name | Computed Px | Rem Equivalent | Purpose in UI Hierarchy |
|:---|:---|:---|:---|
| `--space-0` | 0px | `0rem` | Reset |
| `--space-0-5` | 2px | `0.125rem` | Micro border offset, badge dot margin |
| `--space-1` | 4px | `0.25rem` | Baseline unit, icon-to-text gap |
| `--space-1-5` | 6px | `0.375rem` | Tight tag padding, table cell vertical micro-gap |
| `--space-2` | 8px | `0.5rem` | Standard input inner vertical padding, chip spacing |
| `--space-3` | 12px | `0.75rem` | Button vertical padding (sm), card micro-gap |
| `--space-4` | 16px | `1.0rem` | Standard button vertical padding, form field gap |
| `--space-5` | 20px | `1.25rem` | Large button vertical padding, dense card padding |
| `--space-6` | 24px | `1.5rem` | Standard card internal padding, grid column gap |
| `--space-8` | 32px | `2.0rem` | Relaxed card padding, section sub-block spacing |
| `--space-10` | 40px | `2.5rem` | Component cluster spacing, modal inner padding |
| `--space-12` | 48px | `3.0rem` | Section header to content grid spacing |
| `--space-16` | 64px | `4.0rem` | Major section vertical rhythm (mobile/tablet) |
| `--space-20` | 80px | `5.0rem` | Section vertical rhythm (desktop default) |
| `--space-24` | 96px | `6.0rem` | Hero to narrative section vertical separation |
| `--space-32` | 128px | `8.0rem` | Major chapter breaks, holding narrative transition |
| `--space-40` | 160px | `10.0rem` | Monumental transition intervals |

> **Baseline Grid Integrity Rule:** All spatial layout, margin, padding, and gap tokens strictly adhere to 4px micro-steps and 8px baseline increments. Fractional, off-grid spacing values (specifically 18px / `1.125rem`) are strictly prohibited across all spacing definitions to guarantee unbroken vertical and horizontal rhythms.

### 4.2 Containers & Viewport Envelopes
- **Canvas Container (`.container-canvas`):** `max-w-[1600px]` with auto margins (`mx-auto`).
- **Standard Enterprise Container (`.container-standard`):** `max-w-[1280px]`.
- **Editorial Reading Envelope (`.container-reading`):** `max-w-[840px]`.
- **Fluid Viewport Horizontal Padding:**
  * Mobile (<640px): `padding-inline: clamp(1.0rem, 4vw, 1.5rem)`
  * Tablet (640px–1024px): `padding-inline: clamp(1.5rem, 5vw, 2.5rem)`
  * Desktop (1024px–1440px): `padding-inline: clamp(2.0rem, 5vw, 3.5rem)`
  * Ultra-wide (>1440px): `padding-inline: 4.0rem` (64px)

---

## 5. Elevation & Architectural Micro-Radius System

### 5.1 Micro-Radius Scale
- `--radius-none`: `0px` — Data tables, full-bleed images, split section dividers.
- `--radius-xs`: `2px` — Micro tags, status chips, tabular badges.
- `--radius-sm`: `4px` — Form inputs, select dropdowns, code badges, tooltips.
- `--radius-md`: `6px` — Standard buttons, subsidiary cards, news preview cards.
- `--radius-lg`: `8px` — Modal dialogs, elevated mega-menus, pinned showcase containers.
- `--radius-xl`: `12px` — Standalone hero imagery frames, floating notification toasts.
- `--radius-full`: `9999px` — Navigation pills, round icon action buttons, live status dots.

### 5.2 Layered Ambient Shadows (Tinted Multi-Stop Formula)
```css
/* Direction A: Obsidian Tinted Elevation */
:root {
  --shadow-subtle: 
    0 1px 2px 0 rgba(3, 9, 20, 0.12),
    0 2px 4px -1px rgba(3, 9, 20, 0.08);

  --shadow-card: 
    0 2px 6px -1px rgba(3, 9, 20, 0.18),
    0 8px 18px -3px rgba(3, 9, 20, 0.22),
    0 0 0 1px rgba(255, 255, 255, 0.07);

  --shadow-elevated: 
    0 4px 12px -2px rgba(3, 9, 20, 0.24),
    0 16px 36px -4px rgba(3, 9, 20, 0.32),
    0 24px 60px -8px rgba(3, 9, 20, 0.40),
    0 0 0 1px rgba(255, 255, 255, 0.12);

  --shadow-modal: 
    0 12px 32px -4px rgba(0, 0, 0, 0.50),
    0 32px 80px -12px rgba(0, 0, 0, 0.70),
    0 0 0 1px rgba(255, 255, 255, 0.16);

  --shadow-glow-accent: 
    0 0 24px -2px rgba(253, 119, 2, 0.32),
    0 8px 20px -4px rgba(253, 119, 2, 0.20);
}
```

---

## 6. Detailed Component Specifications

### 6.1 Buttons Architecture (`.btn`)
```text
BUTTON ANATOMY (CSS LOGICAL SYSTEM)
┌────────────────────────────────────────────────────────────┐
│ [Leading Icon]  [Label: text-sm font-semibold]  [Trailing] │
│ <span class="me-2">...</span>                   <span class="ms-2">...</span> │
└────────────────────────────────────────────────────────────┘
```

1. **Primary Holding Action Button (`.btn-primary`):**
   - **Background:** `--accent-primary` (`#FD7702` or `#00A896`).
   - **Text:** `#030914` (for amber, 7.42:1 AAA) or `#0A0F1D` (for emerald: achieves 6.41:1 — PASSES WCAG AA for normal body text, PASSES WCAG AAA for large text only; does NOT achieve 7.00:1 AAA for normal text $<18\text{pt}$), or `#FFFFFF` for dark buttons.
   - **Radius:** `--radius-md` (6px).
   - **Padding:** `padding-block: var(--space-3); padding-inline: var(--space-6);` (12px × 24px).
   - **Hover:** Transform `translateY(-1px)`, Background `--accent-hover`, Shadow `--shadow-glow-accent`.
   - **Focus-Visible:** Outline `2px solid var(--accent-primary)`, offset `2px`.
2. **Secondary Outline Button (`.btn-secondary`):**
   - **Background:** `transparent`.
   - **Border:** `1px solid var(--border-prominent)`.
   - **Text:** `var(--text-primary)`.
   - **Hover:** Border `1px solid var(--text-primary)`, background `rgba(255, 255, 255, 0.05)`.
3. **Tertiary Ghost Button (`.btn-ghost`):**
   - **Background:** `transparent`.
   - **Text:** `var(--text-accent)`.
   - **Trailing Icon:** Directional arrow translating `translateX(-4px)` in RTL or `translateX(4px)` in LTR.

---

### 6.2 Holding Value Chain Cards (`.subsidiary-card`)
- **Structure:**
  * Background: `var(--surface-secondary)`
  * Border: `1px solid var(--border-subtle)`
  * Border Radius: `--radius-md` (6px)
  * Internal Padding: `var(--space-6)` (24px)
- **Hierarchy:**
  1. *Header Tier Badge:* Micro-tag in `caption` font with `--accent-subtle` background indicating value-chain stage.
  2. *Entity Identity Block:* Vector Brandmark (height 32px) + Bilingual Legal Name (`h4`).
  3. *Core Industrial Capability:* Condensed operational overview in `body-sm`.
  4. *Anchor Metrics:* Tabular numbers (e.g. «ظرفیت ۱۵۰,۰۰۰ لیتر پلاسما» / «۷۰٪ پادزهر کشور»).
  5. *Direct Dossier Link:* Primary action with directional arrow.
- **Hover:** Elevates `translateY(-2px)`, border illuminates to `var(--border-prominent)`, and top hairline accent illuminates.

---

### 6.3 Institutional KPI Counter Widgets (`.kpi-counter`)
- **Typography:** Display size (`h1` or `display-lg`), Tabular Numbers (`font-tabular-nums`), Weight 800.
- **Units:** Suffix units («لیتر», «m²», «+», «٪») rendered at 50% font size in `var(--text-accent)` aligned to baseline.
- **Label:** `body-sm` uppercase (EN) or medium (FA) in `var(--text-tertiary)`.
- **Underline Sheen:** 1px hairline border with animated gradient sweep triggered on viewport entry.

---

### 6.4 Institutional Forms (`.form-institutional`)
- **Inputs & Selects:**
  * Background: `var(--surface-tertiary)`.
  * Border: `1px solid var(--border-muted)`.
  * Radius: `--radius-sm` (4px).
  * Min Height: `50px`, Font Size: `16px` (prevents iOS auto-zoom).
  * Focus State: Border `var(--border-accent)`, ring `2px rgba(253, 119, 2, 0.20)`.
- **Labels:** `text-sm font-medium text-text-secondary mb-2 block`.
- **Validation:** Clear error text in `status-error-fg` with `aria-live="polite"`.

---

### 6.5 Mega-Menu Architecture (`.mega-menu-panel`)
- **Positioning:** Suspended below primary navbar capsule (`top: calc(100% + 12px)`).
- **Surface:** `var(--surface-glass-heavy)` with `backdrop-filter: blur(28px)`.
- **Border:** `1px solid var(--border-glass)`.
- **3-Column Topology:**
  * Col 1 (25%): Ecosystem Mandate & Full Directory link.
  * Col 2 (50%): 4 Value-Chain Tiers of the 7 Subsidiaries with direct single-click access.
  * Col 3 (25%): Featured Milestone & B2B Inquiry Portal.
- **Keyboard Navigation:** Full arrow key navigation (`ArrowDown`, `ArrowUp`, `Escape` to close).

---

### 6.6 Native Dialog Modals & Bottom Sheets (`dialog.modal-dialog`)
In strict adherence to modern HTML standards, all dialogs use the native `<dialog>` element:
```css
dialog.modal-dialog {
  opacity: 0;
  transform: scale(0.96) translateY(8px);
  transition: opacity 300ms cubic-bezier(0.16, 1, 0.3, 1),
              transform 300ms cubic-bezier(0.16, 1, 0.3, 1),
              overlay 300ms allow-discrete,
              display 300ms allow-discrete;
}
dialog.modal-dialog[open] {
  opacity: 1;
  transform: scale(1) translateY(0);
}
@starting-style {
  dialog.modal-dialog[open] {
    opacity: 0;
    transform: scale(0.96) translateY(8px);
  }
}
dialog.modal-dialog::backdrop {
  background: rgba(3, 9, 20, 0.78);
  backdrop-filter: blur(8px);
}
```
- **Mobile Bottom Sheet Adaptation:** On `<768px`, `<dialog>` renders pinned to viewport bottom with `border-radius: 24px 24px 0 0` and swipe-to-dismiss gesture support.

---

### 6.7 Footer Architecture (`footer.holding-footer`)
- **Surface:** `var(--surface-primary)` with top border `1px solid var(--border-subtle)`.
- **Topology (4 Columns on Desktop, Stacked on Mobile):**
  * Col 1 (35%): Holding brandmark, legal corporate status, sovereign investment mandate, and verified contact credentials (021-49361200, NIGEB address, LinkedIn).
  * Col 2 (25%): The 7 Subsidiaries Directory organized by value-chain stage.
  * Col 3 (20%): Governance, Infrastructure, Regulatory Compliance, and News Archive links.
  * Col 4 (20%): Official accreditation seals (IFDA Collaborator, National GMP, Knowledge-Based Seal).
- **Sub-Footer Proof Bar:** Copyright notice, Solar Hijri and Gregorian calendar metadata, and bilingual language selector.

---

## 7. Verification & Implementation Checklist

- [x] Persian (Yekan Bakh / Peyda) and English (Plus Jakarta Sans / Euclid Circular A) pairings defined with modular scale and x-height harmonization.
- [x] OpenType features (`font-feature-settings: "ss01", "ss02", "cv01", "locl"`, tabular numerals) and line-height offsets (+0.10 to +0.15 for Persian) codified.
- [x] Semantic color tokens specified for Direction A and Direction B with Alpha channels.
- [x] 8px/4px spatial grid, container envelopes (max-w 1600px), and logical properties defined.
- [x] Micro-radius (`2px` to `6px`) and chromatic ambient shadows specified.
- [x] Component specifications complete: Buttons, Holding Cards, Forms, KPI Counters, Mega-Menu, Native Dialogs, Footer.
- [x] Zero WordPress PHP/theme files and zero full HTML prototype pages created.
