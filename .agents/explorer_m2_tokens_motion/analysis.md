# TECHNICAL EXPLORATION & SPECIFICATION REPORT: DESIGN TOKENS, TAILWIND BLUEPRINT & GSAP MOTION LANGUAGE
**Document Identifier:** `RAHNAB-M2-TOKENS-MOTION-ANALYSIS`  
**Explorer:** `explorer_m2_tokens_motion`  
**Working Directory:** `/Users/user/Sites/localhost/rahnab/.agents/explorer_m2_tokens_motion/`  
**Target Milestone:** Milestone 2 (UX Blueprint, Art Direction & Design System)  
**Parent Context:** `orchestrator_m2`  
**Classification:** Deep Technical Specification & Blueprint Foundation  
**Status:** Complete Architectural Synthesis  

---

## EXECUTIVE SUMMARY & ARCHITECTURAL STANCE

Rahnab Pharmed is not a generic pharmaceutical company nor a consumer drug store; it is an elite, state-of-the-art **biopharmaceutical investment holding group** operating seven high-tech subsidiary ventures spanning genetics R&D, plasma fractionation, recombinant protein biomanufacturing, hyperimmune antivenoms, cellular immunotherapy (CAR-T), and national biological QC release.

To embody this institutional stature, the technical foundation of the design system must satisfy four non-negotiable architectural mandates:
1. **Bilingual Precision (RTL/LTR Equivalence):** The Persian typographic rhythm (using Yekan Bakh / Peyda) and English rhythm (using Plus Jakarta Sans / Euclid Circular A) must share an exact modular scale, identical baseline grid, matched x-heights, and optical line-height adjustments, driven by pure CSS logical properties (`margin-inline`, `padding-inline`, `inset-inline`) to ensure zero-cost bidirectional layout switching.
2. **Deterministic Semantic Token Layer:** Color, spacing, radius, and elevation must be decoupled from visual primitives. Every component consumes semantic intent (`surface-elevated`, `text-muted`, `border-subtle`, `accent-glow`), allowing seamless hot-swapping between **Direction A (Bio-Kinetic Obsidian `#030914` + Kinetic Amber `#FD7702`)** and **Direction B (Clinical Sovereign Slate `#0A0F1D` + Clinical Emerald `#00A896`)** without touching component templates.
3. **Sharp, High-End Architectural Micro-Radius:** Rejecting the pervasive cliché of bloated 24px-32px toy-like corner curves and murky drop-shadows, Rahnab Pharmed adopts an architectural **2px-6px micro-radius system** paired with tinted multi-stop ambient occlusion shadows, projecting clinical authority, precision engineering, and institutional permanence.
4. **Cinematic, Purposeful GSAP Motion with Strict A11y Guardrails:** Animation is not decoration; it is narrative infrastructure. Using Lenis smooth scroll synchronized to GSAP ScrollTrigger, the interface orchestrates narrative pinned sections (such as the 4-tier biomanufacturing value chain), kinetic line-masked typography reveals, magnetic CTA pull states, and live KPI counter twills. Crucially, all motion is strictly gated by `@media (prefers-reduced-motion: reduce)` via `gsap.matchMedia()`, delivering an immediate, zero-vestibular-stress fallback without breaking layouts.

---

# 1. TYPOGRAPHY SYSTEMS ARCHITECTURE

## 1.1 Persian Typography: Yekan Bakh & Peyda Technical Specification

Persian script exhibits fundamentally different vertical metrics and glyph dynamics compared to Latin alphabets:
- **Vertical Metrics:** Persian glyphs feature distinct baseline ascenders (e.g. الف, ک, ل) and deep sweeping descenders (e.g. ی, ع, ر), along with diacritical marks (اعراب/تنوین) and floating dots. This demands an optical line-height increase of **+0.10 to +0.15** relative to Latin typefaces to eliminate descender clipping and claustrophobic text blocks.
- **Micro-Typography & Joining Rules:** Persian text depends upon continuous cursive ligation. The implementation must strictly preserve the Zero-Width Non-Joiner (ZWNJ / `\u200c` / `&zwnj;`) for compound words (e.g., «زیست‌فناوری», «دانش‌بنیان», «سرمایه‌گذاری») and prevent artificial letter-spacing (tracking) from fracturing ligatures.

### Comparative Font Evaluation
- **Primary Selection: Yekan Bakh (یکان بخ):** Designed by Reza Bakhtiarifard. A geometric neo-grotesque Persian typeface with tall x-height, open counters, crisp terminals, and institutional neutrality. It provides exceptional legibility at small B2B body sizes (14px-16px) and commanding executive authority at display sizes (48px-88px).
- **Secondary / Editorial Alternative: Peyda (پیدا):** A contemporary, high-contrast geometric typeface characterized by distinctive modern curves and scientific elegance. Ideal for editorial accents, narrative quotes, and feature headlines.

### OpenType Font Feature Settings (`font-feature-settings`)
To ensure institutional financial and scientific credibility, Persian numbers must be rendered accurately:
```css
/* Persian Typography Feature Stack */
.font-persian {
  font-family: 'Yekan Bakh', 'Peyda', system-ui, -apple-system, 'Segoe UI', Roboto, Tahoma, 'Vazirmatn', sans-serif;
  font-feature-settings: 
    "ss01" on,  /* Persian standard rounded numerals (۰۱۲۳۴۵۶۷۸۹) */
    "ss02" on,  /* Stylistic Set 2: Curated alternative glyph terminations */
    "cv01" on,  /* Contextual Alternates for harmonious word connections */
    "locl" on;  /* Localized forms for Persian language */
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

/* Tabular Numerics for Financial & Scientific KPI Tables */
.font-tabular-nums {
  font-feature-settings: "tnum" on, "ss01" on;
  font-variant-numeric: tabular-nums;
}
```

---

## 1.2 English Typography Pairing: Plus Jakarta Sans & Euclid Circular A

To ensure harmonious bilingual aesthetics, the Latin typeface must match the optical weight, counter openness, and x-height proportion of Yekan Bakh.

- **Primary Pairing: Plus Jakarta Sans (Open-Source / Variable Font):** Designed by Tokotype. A modern geometric sans-serif inspired by clean grotesque architecture with wide apertures, clean geometry, and a high x-height that aligns within 1.5% of Yekan Bakh's median height. Its variable axes (`wght` 200–800) permit micro-weight calibration.
- **Alternative Pairing: Euclid Circular A (Swiss Typefaces):** A quintessential luxury corporate neo-grotesque with circular geometry, razor-sharp terminals, and neutral Swiss precision, projecting ultra-premium corporate prestige.

### Optical Height & Weight Balance Table
| Dimension | Persian (Yekan Bakh) | English (Plus Jakarta Sans) | Optical Harmonization Strategy |
|:---|:---|:---|:---|
| **Capital / Ascender Height** | 760 units | 745 units | Latin ascenders visually match Persian `Alef` (`ا`). |
| **X-Height / Core Body** | 520 units | 528 units | Perfectly balanced across bilingual inline labels. |
| **Descender Depth** | -240 units | -210 units | Container paddings set to accommodate Persian descender reach. |
| **Regular Weight (`400`)** | Optical Stem: 84px | Optical Stem: 82px | Identical apparent ink weight in body paragraphs. |
| **Bold Weight (`700`)** | Optical Stem: 154px | Optical Stem: 152px | Identical visual punch in section titles. |

---

## 1.3 Exact Modular Type Scale

The type scale adopts a **hybrid mathematical model**:
- **Display / Hero Tier:** Fluid clamp scaling based on an Augmented Fourth ratio (1.414) for dramatic corporate impact across viewports.
- **Headings / Body Tier:** Disciplined Minor Third ratio (1.200) based on a 16px (1.0rem) root, ensuring dense, readable scientific and governance specifications.

| Token Name | Font Size (rem / px) | Viewport Responsive Clamp Formula | Line-Height (Latin) | Line-Height (Persian) | Weight | Letter Spacing (EN) | Intended Use Case |
|:---|:---|:---|:---|:---|:---|:---|:---|
| `display-2xl` | `5.5rem` / 88px | `clamp(3.25rem, 5vw + 1rem, 5.5rem)` | `1.08` | `1.18` | 800 (Black) | `-0.025em` | Hero main statements, holding brand promise |
| `display-xl` | `4.25rem` / 68px | `clamp(2.75rem, 4vw + 0.75rem, 4.25rem)` | `1.12` | `1.22` | 700 (Bold) | `-0.02em` | Section hero headings, value-chain intro |
| `display-lg` | `3.25rem` / 52px | `clamp(2.25rem, 3vw + 0.5rem, 3.25rem)` | `1.15` | `1.25` | 700 (Bold) | `-0.015em` | Secondary showcase titles, milestone banners |
| `h1` | `2.625rem` / 42px | `clamp(2.0rem, 2.5vw + 0.5rem, 2.625rem)` | `1.22` | `1.32` | 700 (Bold) | `-0.015em` | Subpage hero titles (About, Subsidiaries) |
| `h2` | `2.125rem` / 34px | `clamp(1.625rem, 2vw + 0.25rem, 2.125rem)` | `1.28` | `1.38` | 700 (Bold) | `-0.01em` | Major content section headers |
| `h3` | `1.75rem` / 28px | `clamp(1.375rem, 1.5vw + 0.25rem, 1.75rem)` | `1.32` | `1.42` | 600 (SemiBold) | `-0.005em` | Subsidiary cards, news card headlines |
| `h4` | `1.375rem` / 22px | `1.375rem` (fixed) | `1.38` | `1.48` | 600 (SemiBold) | `0em` | Widget headers, modal dialog titles |
| `h5` | `1.1875rem` / 19px | `1.1875rem` (fixed) | `1.42` | `1.52` | 600 (SemiBold) | `0em` | Feature titles, table section heads |
| `h6` | `1.0625rem` / 17px | `1.0625rem` (fixed) | `1.45` | `1.55` | 600 (SemiBold) | `0em` | Sub-labels, metadata headers |
| `body-lg` | `1.125rem` / 18px | `1.125rem` (fixed) | `1.65` | `1.75` | 400 (Regular) | `0em` | Introductory lead paragraphs, executive bios |
| `body-md` | `1.0rem` / 16px | `1.0rem` (Base root) | `1.60` | `1.70` | 400 (Regular) | `0em` | Primary narrative body, press release articles |
| `body-sm` | `0.875rem` / 14px | `0.875rem` (fixed) | `1.55` | `1.65` | 400 / 500 | `0.01em` | Subsidiary metadata, card specs, form labels |
| `caption` | `0.75rem` / 12px | `0.75rem` (fixed) | `1.45` | `1.55` | 500 (Medium) | `0.02em` | Timestamps, badge tags, copyright lines |
| `code / mono` | `0.8125rem` / 13px| `0.8125rem` (fixed) | `1.50` | `1.50` | 500 (Medium) | `0em` | Batch numbers, National IDs, patent codes |

---

## 1.4 Font Loading, Subsetting & Variable Strategy

1. **Format:** Self-hosted WOFF2 variable fonts (`YekanBakhFaNum-Variable.woff2` and `PlusJakartaSans-Variable.woff2`).
2. **Preloading:** Preload Persian regular and bold weights in `<head>` via `<link rel="preload" as="font" type="font/woff2" crossorigin>`.
3. **`font-display: swap`:** Prevent FOIT (Flash of Invisible Text); use fallback font with matched vertical metrics to avoid Layout Shift (CLS score < 0.01).
4. **Fallback Stack:**
   - RTL (Persian): `'Yekan Bakh', 'Peyda', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Tahoma, 'Vazirmatn', sans-serif`
   - LTR (English): `'Plus Jakarta Sans', 'Euclid Circular A', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif`
   - Monospace: `'JetBrains Mono', 'Fira Code', 'SFMono-Regular', Menlo, Monaco, Consolas, monospace`

---

# 2. MASTER TOKEN ARCHITECTURE

The token architecture is organized into three distinct tiers:
1. **Global / Primitive Tier:** Static color hex codes, raw numbers, and absolute units.
2. **Semantic Tier:** Role-driven design tokens defining functional intent (`surface`, `text`, `border`, `accent`, `status`).
3. **Component Tier:** Component-scoped tokens referencing the semantic layer.

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

## 2.1 Complete Semantic Color System (Direction A vs Direction B)

Rahnab Pharmed establishes two strategic corporate color directions. The semantic token system maps both directions dynamically via CSS Custom Properties.

### Palette Matrix: Primitive Values
| Token Identifier | Direction A: Bio-Kinetic Obsidian & Amber | Direction B: Clinical Sovereign Slate & Emerald |
|:---|:---|:---|
| **Base Canvas / Dark Ground** | `#030914` (Deep Bio-Kinetic Obsidian) | `#0A0F1D` (Clinical Sovereign Slate) |
| **Card / Surface Dark** | `#081326` (Subsea Deep Navy) | `#10192D` (Sterile Cleanroom Slate) |
| **Elevated Surface Dark** | `#0E1D3A` (Mid-Ocean Navy) | `#18243E` (High-Precision Slate) |
| **Light Canvas / Editorial** | `#F8FAFC` (Pure Clinical Zinc) | `#F4F7F6` (Sterile Bio-White) |
| **Light Card Surface** | `#FFFFFF` (Pure Crystalline White) | `#FFFFFF` (Pure Crystalline White) |
| **Hero Brand Accent** | `#FD7702` (Kinetic Biopharma Amber) | `#00A896` (Clinical Emerald / Bioclean Green)|
| **Accent Glow / Hover** | `#FF9333` (Luminescent Solar Amber) | `#00C4AE` (Luminescent Bioclean Aqua) |
| **Subtle Accent Wash** | `rgba(253, 119, 2, 0.10)` | `rgba(0, 168, 150, 0.10)` |

### Semantic Token Mapping Table
| Semantic Token Name | Role / Function | Direction A CSS Value | Direction B CSS Value | Light Canvas Fallback |
|:---|:---|:---|:---|:---|
| `--surface-primary` | Root page canvas | `#030914` | `#0A0F1D` | `#F8FAFC` |
| `--surface-secondary` | Section containers, alternating zones | `#060E1E` | `#0D1425` | `#F1F5F9` |
| `--surface-tertiary` | Neutral cards, input background | `#081326` | `#10192D` | `#E2E8F0` |
| `--surface-elevated` | Floating pills, mega-menus, modals | `#0E1D3A` | `#18243E` | `#FFFFFF` |
| `--surface-glass` | Translucent glassmorphic panels | `rgba(8, 19, 38, 0.75)` | `rgba(16, 25, 45, 0.75)` | `rgba(255, 255, 255, 0.85)` |
| `--surface-glass-heavy`| Deep glassmorphic dialogs & navbars | `rgba(3, 9, 20, 0.88)` | `rgba(10, 15, 29, 0.88)` | `rgba(255, 255, 255, 0.94)` |
| `--surface-inverse` | Inverted surface for contrast elements | `#F8FAFC` | `#F8FAFC` | `#030914` |
| `--text-primary` | High-contrast main headings & titles | `#F8FAFC` | `#F8FAFC` | `#0F172A` |
| `--text-secondary` | Body text, readable articles | `#CBD5E1` | `#CBD5E1` | `#334155` |
| `--text-tertiary` | Supporting text, metadata, labels | `#94A3B8` | `#94A3B8` | `#64748B` |
| `--text-muted` | Inactive items, placeholder text | `#64748B` | `#64748B` | `#94A3B8` |
| `--text-accent` | Brand highlighted key figures & links | `#FD7702` | `#00A896` | `#C25700` / `#007A6D` |
| `--text-inverse` | Text on inverted surfaces | `#030914` | `#0A0F1D` | `#F8FAFC` |
| `--border-subtle` | Fine architectural lines between blocks | `rgba(255, 255, 255, 0.08)`| `rgba(255, 255, 255, 0.08)`| `rgba(15, 23, 42, 0.08)` |
| `--border-muted` | Standard card and container strokes | `rgba(255, 255, 255, 0.14)`| `rgba(255, 255, 255, 0.14)`| `rgba(15, 23, 42, 0.14)` |
| `--border-prominent` | Active card borders, inputs on focus | `rgba(255, 255, 255, 0.28)`| `rgba(255, 255, 255, 0.28)`| `rgba(15, 23, 42, 0.28)` |
| `--border-accent` | Accent brand borders | `#FD7702` | `#00A896` | `#FD7702` / `#00A896` |
| `--border-glass` | Hairline specular highlight on glass | `rgba(255, 255, 255, 0.20)`| `rgba(255, 255, 255, 0.20)`| `rgba(255, 255, 255, 0.60)` |
| `--accent-primary` | Primary action button, brand indicator | `#FD7702` | `#00A896` | `#FD7702` / `#00A896` |
| `--accent-hover` | Hover state for interactive brand elements| `#FF9333` | `#00C4AE` | `#E06500` / `#008C7D` |
| `--accent-active` | Active/pressed state for brand buttons | `#D86200` | `#008C7D` | `#B85200` / `#007366` |
| `--accent-subtle` | Subtle tinted background chip / pill | `rgba(253, 119, 2, 0.12)` | `rgba(0, 168, 150, 0.12)` | `rgba(253, 119, 2, 0.08)` |
| `--accent-glow` | Volumetric glow for hero cards & buttons | `0 0 24px rgba(253, 119, 2, 0.35)` | `0 0 24px rgba(0, 168, 150, 0.35)` | `0 0 16px rgba(253, 119, 2, 0.20)` |

### Status Tokens (Operational & Regulatory Feedback)
- **Status Success (GMP Approvals, Cleanroom Status, Batch Pass):**
  - `--status-success-fg`: `#10B981` (Emerald 500)
  - `--status-success-bg`: `rgba(16, 185, 129, 0.12)`
  - `--status-success-border`: `rgba(16, 185, 129, 0.30)`
- **Status Warning (Regulatory Review, Scheduled Maintenance):**
  - `--status-warning-fg`: `#F59E0B` (Amber 500)
  - `--status-warning-bg`: `rgba(245, 158, 11, 0.12)`
  - `--status-warning-border`: `rgba(245, 158, 11, 0.30)`
- **Status Error (Form Validation, Network Alert, Compliance Flag):**
  - `--status-error-fg`: `#EF4444` (Red 500)
  - `--status-error-bg`: `rgba(239, 68, 68, 0.12)`
  - `--status-error-border`: `rgba(239, 68, 68, 0.30)`
- **Status Info (Technical Specifications, Pipeline Phase Data):**
  - `--status-info-fg`: `#0EA5E9` (Sky 500)
  - `--status-info-bg`: `rgba(14, 165, 233, 0.12)`
  - `--status-info-border`: `rgba(14, 165, 233, 0.30)`

---

## 2.2 Spatial Baseline & Layout Grid Architecture

To guarantee mathematical cohesion across all viewports, Rahnab Pharmed implements an **8px layout grid with a 4px micro-baseline**.

### Spatial Scale Tokens
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

### Container Architecture & Container Query Specifications
- **Maximum Canvas Envelope:** `max-w-[1600px]` with auto margins (`mx-auto`).
- **Reading Envelope (Editorial & Narratives):** `max-w-[840px]`.
- **Standard Enterprise Container:** `max-w-[1280px]`.
- **Fluid Logical Viewport Paddings:**
  - Viewport `< 640px` (Mobile): `padding-inline: clamp(1.0rem, 4vw, 1.5rem)`
  - Viewport `640px - 1024px` (Tablet): `padding-inline: clamp(1.5rem, 5vw, 2.5rem)`
  - Viewport `1024px - 1440px` (Desktop): `padding-inline: clamp(2.0rem, 5vw, 3.5rem)`
  - Viewport `> 1440px` (Ultra-wide): `padding-inline: 4.0rem` (64px)

#### CSS Container Queries for Resilient Holding Components
Components must adapt dynamically to their immediate container width, independent of the overall viewport:
```css
/* Card Container Query Declaration */
.subsidiary-card-wrapper {
  container-type: inline-size;
  container-name: subsidiary-card;
}

/* Vertical Stack on narrow column */
@container subsidiary-card (max-width: 420px) {
  .subsidiary-card-inner {
    flex-direction: column;
    padding: var(--space-4);
  }
  .subsidiary-card-metrics {
    display: none; /* Hide secondary metrics in compressed multi-column */
  }
}

/* Horizontal Executive Layout on wide column */
@container subsidiary-card (min-width: 421px) {
  .subsidiary-card-inner {
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    padding: var(--space-6);
  }
  .subsidiary-card-metrics {
    display: flex;
  }
}
```

---

## 2.3 Micro-Radius & Layered Ambient Shadow System

To achieve an ultra-premium life-science aesthetic, we eliminate sloppy, oversized rounded corners (e.g. 24px-32px "SaaS bubble" aesthetics) and replace them with **architectural micro-radii**.

### Micro-Radius Scale
- `--radius-none`: `0px` — Data tables, full-bleed images, split section dividers.
- `--radius-xs`: `2px` — Micro tags, status chips, tabular badges, subtle indicator lines.
- `--radius-sm`: `4px` — Form inputs, select dropdowns, code badges, tooltips.
- `--radius-md`: `6px` — Standard buttons, subsidiary cards, news preview cards, callouts.
- `--radius-lg`: `8px` — Modal dialogs, elevated mega-menus, pinned showcase containers.
- `--radius-xl`: `12px` — Standalone hero imagery frames, floating notification toasts.
- `--radius-full`: `9999px` — Navigation pills, round icon action buttons, live status dots.

### Layered Ambient Shadows (Tinted Multi-Stop Formula)
Muddy, gray CSS drop-shadows degrade corporate elegance. Rahnab Pharmed utilizes **chromatic ambient shadows** tinted with the background canvas tone (`rgb(3 9 20)` for Direction A; `rgb(10 15 29)` for Direction B):

```css
/* Direction A: Obsidian Tinted Elevation */
:root {
  --shadow-subtle: 
    0 1px 2px 0 rgba(3, 9, 20, 0.12),
    0 2px 4px -1px rgba(3, 9, 20, 0.08);

  --shadow-card: 
    0 2px 6px -1px rgba(3, 9, 20, 0.18),
    0 8px 18px -3px rgba(3, 9, 20, 0.22),
    0 0 0 1px rgba(255, 255, 255, 0.07); /* Specular hairline boundary */

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

## 2.4 Detailed Component Specifications

### 2.4.1 Buttons Architecture
Buttons must convey purpose and weight. They utilize CSS logical spacing, ensuring icons positioned with `margin-inline-end` or `margin-inline-start` switch sides automatically in RTL/LTR.

```text
BUTTON ANATOMY (CSS LOGICAL SYSTEM)
┌────────────────────────────────────────────────────────────┐
│ [Leading Icon]  [Label: text-sm font-semibold]  [Trailing] │
│ <span class="me-2">...</span>                   <span class="ms-2">...</span> │
└────────────────────────────────────────────────────────────┘
```

1. **Primary Holding Action Button (`.btn-primary`):**
   - **Background:** `--accent-primary` (`#FD7702` or `#00A896`).
   - **Text:** `#FFFFFF` (High contrast, semi-bold 600).
   - **Radius:** `--radius-md` (6px).
   - **Padding:** `padding-block: var(--space-3); padding-inline: var(--space-6);` (12px by 24px).
   - **Hover State:** Transform `translateY(-1px)`, Background `--accent-hover`, Shadow `--shadow-glow-accent`.
   - **Active State:** Transform `translateY(0px) scale(0.98)`, Background `--accent-active`.
   - **Focus-Visible:** Outline `2px solid var(--accent-primary)`, outline-offset `2px`.
   - **Disabled State:** Opacity `0.45`, cursor `not-allowed`, filter `grayscale(40%)`.

2. **Secondary Outline Action Button (`.btn-secondary`):**
   - **Background:** `transparent` (or `var(--surface-tertiary)` at 40% opacity).
   - **Border:** `1px solid var(--border-prominent)`.
   - **Text:** `var(--text-primary)`.
   - **Hover State:** Border `1px solid var(--text-primary)`, background `rgba(255, 255, 255, 0.05)`.

3. **Tertiary Ghost / Editorial Text Action (`.btn-ghost`):**
   - **Background:** `transparent`.
   - **Text:** `var(--text-accent)`.
   - **Trailing Arrow:** Dynamic SVG arrow translating `translateX(-4px)` in RTL or `translateX(4px)` in LTR on hover.

---

### 2.4.2 Subsidiary Value-Chain Cards (`.subsidiary-card`)
The card introduces the 7 companies not as standalone marketing ads, but as interlocking elements of an integrated biopharma value chain:
- **Container Structure:**
  - Background: `var(--surface-secondary)`.
  - Border: `1px solid var(--border-subtle)`.
  - Border Radius: `--radius-md` (6px).
  - Internal Padding: `var(--space-6)` (24px).
  - Transition: `border-color 250ms ease, transform 250ms ease, box-shadow 250ms ease`.
- **Visual Hierarchy:**
  1. *Header Tier Badge:* Micro-tag indicating value-chain tier (`R&D & Acceleration`, `Plasma Fractionation`, `QC & Release`) in `caption` font with `--accent-subtle` background.
  2. *Entity Identity Block:* Subsidiary Monochrome Logo (SVG) with height fixed at 32px + Legal Persian & English Title (`h4` font).
  3. *Core Industrial Capability:* 2-line condensed operational description (`body-sm` font in `var(--text-secondary)`).
  4. *Hard Metrics / Infrastructure Footprint:* e.g. «ظرفیت ۱۵۰,۰۰۰ لیتر» / «۱۵۰۰ مترمربع کلین‌روم ISO 5».
  5. *Direct Dossier Link:* Text link with directional arrow indicator (`var(--text-accent)`).
- **Hover Micro-Interaction:**
  - Border transitions to `var(--border-prominent)`.
  - Subtle top-edge accent highlight line illuminates via CSS `::before` pseudo-element with `var(--accent-primary)`.
  - Subtle lift `translateY(-2px)`.

---

### 2.4.3 Institutional KPI Counter Widgets (`.kpi-counter`)
- **Typography:** Display size (`h1` or `display-lg`), Tabular Numbers (`font-tabular-nums`), Weight 800.
- **Prefix / Suffix Alignment:** Suffix units (e.g. «لیتر», «m²», «+», «٪») rendered at 50% font size in `var(--text-accent)`, vertically aligned to baseline.
- **Label:** `body-sm` uppercase (EN) or medium (FA) in `var(--text-tertiary)`.
- **Underline Sheen:** 1px hairline border beneath widget with animated gradient sweep triggered on viewport entry.

---

### 2.4.4 Scientific Data Tables & Facility Specifications (`.table-scientific`)
- **Header:** Sticky `top-0`, Background `var(--surface-elevated)`, Text `caption` font weight 600, uppercase, Border-bottom `2px solid var(--border-prominent)`.
- **Row Styling:** Alternating zebra striping using `rgba(255, 255, 255, 0.02)`.
- **Cell Padding:** `padding-block: var(--space-3); padding-inline: var(--space-4);`.
- **Alignment Rules:** Text columns aligned to `text-start`; Numerical/Metric columns aligned to `text-end` with `font-tabular-nums`.

---

### 2.4.5 Mega-Menu Architecture (`.mega-menu-panel`)
- **Positioning:** Suspended floating container directly below primary navbar pill (`top: calc(100% + 12px)`).
- **Surface:** `var(--surface-glass-heavy)` with `backdrop-filter: blur(24px)`.
- **Border:** `1px solid var(--border-glass)`.
- **Internal 3-Column Topology:**
  - *Column 1 (25%):* Ecosystem Mandate & Direct Link to Full Directory (`/subsidiaries/`).
  - *Column 2 (50%):* 4 Structured Tiers of the 7 Subsidiaries with direct single-click access.
  - *Column 3 (25%):* Featured Milestone / B2B Partnership Inquiry Portal.
- **Accessibility & Focus Trap:**
  - `role="menu"`, `aria-expanded="true/false"`.
  - Keyboard focus navigates via Arrow keys (`ArrowUp`, `ArrowDown`, `ArrowLeft`, `ArrowRight`); `Escape` dismisses the panel and returns focus to the triggering navbar item.

---

### 2.4.6 Modal & Drawer Dialogs (`dialog.modal-dialog`)
In strict accordance with modern web platform standards, all modals utilize the native HTML `<dialog>` element:
- **Backdrop:** `::backdrop` styled with `background: rgba(3, 9, 20, 0.75); backdrop-filter: blur(8px);`.
- **Smooth Entry / Exit via `@starting-style`:**
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
  ```
- **Inert Attribute:** Automatically applied by browser when calling `showModal()`, trapping keyboard focus and preventing background DOM interaction.
- **Hardware ESC Key:** Natively closes dialog and restores scroll context.

---

# 3. TAILWIND CSS ARCHITECTURE & BLUEPRINT

## 3.1 Complete `tailwind.config.js` Specification

The following configuration fully codifies all typography, modular scales, semantic colors mapped to CSS custom variables with alpha channel support, micro-radii, layered shadows, and RTL-first utilities:

```javascript
/** @type {import('tailwindcss').Config} */
const plugin = require('tailwindcss/plugin');

module.exports = {
  content: [
    './src/**/*.{html,js,ts,jsx,tsx,php}',
    './templates/**/*.{html,php}',
    './*.html'
  ],
  darkMode: 'class', // Controlled class-based switching
  theme: {
    screens: {
      'sm': '640px',
      'md': '768px',
      'lg': '1024px',
      'xl': '1280px',
      '2xl': '1440px',
      '3xl': '1600px', // Custom ultra-wide canvas breakpoint
    },
    extend: {
      fontFamily: {
        // Persian Primary with graceful fallback stack
        persian: [
          'Yekan Bakh',
          'Peyda',
          'system-ui',
          '-apple-system',
          'BlinkMacSystemFont',
          'Segoe UI',
          'Tahoma',
          'Vazirmatn',
          'sans-serif'
        ],
        // English Primary with matching x-height
        english: [
          'Plus Jakarta Sans',
          'Euclid Circular A',
          'system-ui',
          '-apple-system',
          'BlinkMacSystemFont',
          'Segoe UI',
          'Roboto',
          'sans-serif'
        ],
        // Scientific & Technical Tabular Numbers
        mono: [
          'JetBrains Mono',
          'Fira Code',
          'SFMono-Regular',
          'Menlo',
          'Monaco',
          'Consolas',
          'monospace'
        ]
      },
      fontSize: {
        // Modular Typography Scale Tokens
        'display-2xl': ['clamp(3.25rem, 5vw + 1rem, 5.5rem)', { lineHeight: '1.1', letterSpacing: '-0.025em' }],
        'display-xl': ['clamp(2.75rem, 4vw + 0.75rem, 4.25rem)', { lineHeight: '1.15', letterSpacing: '-0.02em' }],
        'display-lg': ['clamp(2.25rem, 3vw + 0.5rem, 3.25rem)', { lineHeight: '1.2', letterSpacing: '-0.015em' }],
        'h1': ['clamp(2.0rem, 2.5vw + 0.5rem, 2.625rem)', { lineHeight: '1.25', letterSpacing: '-0.015em' }],
        'h2': ['clamp(1.625rem, 2vw + 0.25rem, 2.125rem)', { lineHeight: '1.3', letterSpacing: '-0.01em' }],
        'h3': ['clamp(1.375rem, 1.5vw + 0.25rem, 1.75rem)', { lineHeight: '1.35', letterSpacing: '-0.005em' }],
        'h4': ['1.375rem', { lineHeight: '1.4', letterSpacing: '0' }],
        'h5': ['1.1875rem', { lineHeight: '1.45', letterSpacing: '0' }],
        'h6': ['1.0625rem', { lineHeight: '1.5', letterSpacing: '0' }],
        'body-lg': ['1.125rem', { lineHeight: '1.7', letterSpacing: '0' }],
        'body-md': ['1.0rem', { lineHeight: '1.65', letterSpacing: '0' }],
        'body-sm': ['0.875rem', { lineHeight: '1.6', letterSpacing: '0.01em' }],
        'caption': ['0.75rem', { lineHeight: '1.5', letterSpacing: '0.02em' }],
        'code': ['0.8125rem', { lineHeight: '1.5', letterSpacing: '0' }],
      },
      colors: {
        // Semantic Theme Tokens mapped to CSS variables with Alpha channel support
        surface: {
          primary: 'rgb(var(--color-surface-primary) / <alpha-value>)',
          secondary: 'rgb(var(--color-surface-secondary) / <alpha-value>)',
          tertiary: 'rgb(var(--color-surface-tertiary) / <alpha-value>)',
          elevated: 'rgb(var(--color-surface-elevated) / <alpha-value>)',
          inverse: 'rgb(var(--color-surface-inverse) / <alpha-value>)',
        },
        text: {
          primary: 'rgb(var(--color-text-primary) / <alpha-value>)',
          secondary: 'rgb(var(--color-text-secondary) / <alpha-value>)',
          tertiary: 'rgb(var(--color-text-tertiary) / <alpha-value>)',
          muted: 'rgb(var(--color-text-muted) / <alpha-value>)',
          accent: 'rgb(var(--color-text-accent) / <alpha-value>)',
          inverse: 'rgb(var(--color-text-inverse) / <alpha-value>)',
        },
        border: {
          subtle: 'rgb(var(--color-border-subtle) / <alpha-value>)',
          muted: 'rgb(var(--color-border-muted) / <alpha-value>)',
          prominent: 'rgb(var(--color-border-prominent) / <alpha-value>)',
          accent: 'rgb(var(--color-border-accent) / <alpha-value>)',
        },
        accent: {
          DEFAULT: 'rgb(var(--color-accent-primary) / <alpha-value>)',
          hover: 'rgb(var(--color-accent-hover) / <alpha-value>)',
          active: 'rgb(var(--color-accent-active) / <alpha-value>)',
          subtle: 'rgb(var(--color-accent-subtle) / <alpha-value>)',
        },
        status: {
          success: 'rgb(var(--color-status-success) / <alpha-value>)',
          warning: 'rgb(var(--color-status-warning) / <alpha-value>)',
          error: 'rgb(var(--color-status-error) / <alpha-value>)',
          info: 'rgb(var(--color-status-info) / <alpha-value>)',
        },
      },
      spacing: {
        '4.5': '1.125rem',
        '18': '4.5rem',
        '22': '5.5rem',
        '26': '6.5rem',
        '30': '7.5rem',
        '34': '8.5rem',
        '38': '9.5rem',
      },
      borderRadius: {
        'none': '0px',
        'xs': '2px',
        'sm': '4px',
        'md': '6px',
        'lg': '8px',
        'xl': '12px',
        '2xl': '16px',
        'full': '9999px',
      },
      boxShadow: {
        'subtle': 'var(--shadow-subtle)',
        'card': 'var(--shadow-card)',
        'elevated': 'var(--shadow-elevated)',
        'modal': 'var(--shadow-modal)',
        'glow-accent': 'var(--shadow-glow-accent)',
      }
    }
  },
  plugins: [
    // Custom Utility Plugin for High-End Life-Science Experience
    plugin(function({ addUtilities, theme }) {
      addUtilities({
        // Glassmorphic Backdrop Utilities
        '.glass-panel': {
          'background-color': 'var(--surface-glass)',
          'backdrop-filter': 'blur(16px)',
          '-webkit-backdrop-filter': 'blur(16px)',
          'border': '1px solid var(--border-glass)',
        },
        '.glass-panel-heavy': {
          'background-color': 'var(--surface-glass-heavy)',
          'backdrop-filter': 'blur(28px)',
          '-webkit-backdrop-filter': 'blur(28px)',
          'border': '1px solid var(--border-glass)',
        },
        // Typography Feature Utilities
        '.font-feature-persian': {
          'font-feature-settings': '"ss01" on, "ss02" on, "cv01" on, "locl" on',
        },
        '.font-feature-tabular': {
          'font-feature-settings': '"tnum" on, "ss01" on',
          'font-variant-numeric': 'tabular-nums',
        },
        // Modern CSS Text Wrap Balancing
        '.text-balance': {
          'text-wrap': 'balance',
        },
        '.text-pretty': {
          'text-wrap': 'pretty',
        },
        // Content Visibility for Performance on Heavy Subpages
        '.content-auto': {
          'content-visibility': 'auto',
          'contain-intrinsic-size': '0 500px',
        }
      });
    })
  ]
};
```

---

## 3.2 CSS Custom Variables Root Stylesheet (`tokens.css`)

```css
/* ==========================================================================
   RAHNAB PHARMED MASTER CSS VARIABLES CONFIGURATION
   ========================================================================== */

/* Direction A: Bio-Kinetic Deep Obsidian & Kinetic Amber (Default Brand Direction) */
:root,
[data-theme="direction-a"] {
  /* Surface Channels (R G B) */
  --color-surface-primary: 3 9 20;           /* #030914 */
  --color-surface-secondary: 6 14 30;        /* #060E1E */
  --color-surface-tertiary: 8 19 38;         /* #081326 */
  --color-surface-elevated: 14 29 58;        /* #0E1D3A */
  --color-surface-inverse: 248 250 252;      /* #F8FAFC */

  /* Surface Pre-mixed Composites */
  --surface-glass: rgba(8, 19, 38, 0.78);
  --surface-glass-heavy: rgba(3, 9, 20, 0.90);

  /* Text Channels (R G B) */
  --color-text-primary: 248 250 252;         /* #F8FAFC */
  --color-text-secondary: 203 213 225;       /* #CBD5E1 */
  --color-text-tertiary: 148 163 184;        /* #94A3B8 */
  --color-text-muted: 100 116 139;           /* #64748B */
  --color-text-accent: 253 119 2;            /* #FD7702 */
  --color-text-inverse: 3 9 20;              /* #030914 */

  /* Border Channels (R G B) */
  --color-border-subtle: 255 255 255 / 0.08;
  --color-border-muted: 255 255 255 / 0.14;
  --color-border-prominent: 255 255 255 / 0.28;
  --color-border-accent: 253 119 2;
  --border-glass: rgba(255, 255, 255, 0.18);

  /* Accent Channels (R G B) */
  --color-accent-primary: 253 119 2;         /* #FD7702 */
  --color-accent-hover: 255 147 51;          /* #FF9333 */
  --color-accent-active: 216 98 0;           /* #D86200 */
  --color-accent-subtle: 253 119 2 / 0.12;

  /* Status Channels (R G B) */
  --color-status-success: 16 185 129;
  --color-status-warning: 245 158 11;
  --color-status-error: 239 68 68;
  --color-status-info: 14 165 233;

  /* Layered Chromatic Shadows */
  --shadow-subtle: 0 1px 2px 0 rgba(3, 9, 20, 0.24);
  --shadow-card: 0 2px 6px -1px rgba(3, 9, 20, 0.20), 0 8px 18px -3px rgba(3, 9, 20, 0.28), 0 0 0 1px rgba(255, 255, 255, 0.07);
  --shadow-elevated: 0 4px 12px -2px rgba(3, 9, 20, 0.28), 0 16px 36px -4px rgba(3, 9, 20, 0.38), 0 0 0 1px rgba(255, 255, 255, 0.12);
  --shadow-modal: 0 12px 32px -4px rgba(0, 0, 0, 0.60), 0 32px 80px -12px rgba(0, 0, 0, 0.80), 0 0 0 1px rgba(255, 255, 255, 0.16);
  --shadow-glow-accent: 0 0 24px -2px rgba(253, 119, 2, 0.35);
}

/* Direction B: Clinical Sovereign Slate & Clinical Emerald */
[data-theme="direction-b"] {
  /* Surface Channels (R G B) */
  --color-surface-primary: 10 15 29;         /* #0A0F1D */
  --color-surface-secondary: 13 20 37;       /* #0D1425 */
  --color-surface-tertiary: 16 25 45;        /* #10192D */
  --color-surface-elevated: 24 36 62;        /* #18243E */
  --color-surface-inverse: 248 250 252;      /* #F8FAFC */

  --surface-glass: rgba(16, 25, 45, 0.78);
  --surface-glass-heavy: rgba(10, 15, 29, 0.90);

  /* Text Channels (R G B) */
  --color-text-primary: 248 250 252;         /* #F8FAFC */
  --color-text-secondary: 203 213 225;       /* #CBD5E1 */
  --color-text-tertiary: 148 163 184;        /* #94A3B8 */
  --color-text-muted: 100 116 139;           /* #64748B */
  --color-text-accent: 0 168 150;            /* #00A896 */
  --color-text-inverse: 10 15 29;            /* #0A0F1D */

  /* Border Channels (R G B) */
  --color-border-subtle: 255 255 255 / 0.08;
  --color-border-muted: 255 255 255 / 0.14;
  --color-border-prominent: 255 255 255 / 0.28;
  --color-border-accent: 0 168 150;
  --border-glass: rgba(255, 255, 255, 0.18);

  /* Accent Channels (R G B) */
  --color-accent-primary: 0 168 150;         /* #00A896 */
  --color-accent-hover: 0 196 174;           /* #00C4AE */
  --color-accent-active: 0 140 125;          /* #008C7D */
  --color-accent-subtle: 0 168 150 / 0.12;

  /* Layered Shadows */
  --shadow-subtle: 0 1px 2px 0 rgba(10, 15, 29, 0.24);
  --shadow-card: 0 2px 6px -1px rgba(10, 15, 29, 0.20), 0 8px 18px -3px rgba(10, 15, 29, 0.28), 0 0 0 1px rgba(255, 255, 255, 0.07);
  --shadow-elevated: 0 4px 12px -2px rgba(10, 15, 29, 0.28), 0 16px 36px -4px rgba(10, 15, 29, 0.38), 0 0 0 1px rgba(255, 255, 255, 0.12);
  --shadow-modal: 0 12px 32px -4px rgba(0, 0, 0, 0.60), 0 32px 80px -12px rgba(0, 0, 0, 0.80), 0 0 0 1px rgba(255, 255, 255, 0.16);
  --shadow-glow-accent: 0 0 24px -2px rgba(0, 168, 150, 0.35);
}
```

---

## 3.3 CSS Logical Properties Mapping for RTL/LTR Equivalence

To guarantee that the codebase never relies on brittle directional overrides (e.g. `.rtl .mr-4 { margin-right: 0; margin-left: 1rem; }`), all spatial layout rules must strictly adopt **CSS Logical Properties**:

| Physical Utility (FORBIDDEN) | Logical Utility (MANDATORY) | Underlying CSS Property | RTL Result (`dir="rtl"`) | LTR Result (`dir="ltr"`) |
|:---|:---|:---|:---|:---|
| `ml-4` / `mr-4` | `ms-4` | `margin-inline-start` | Sets right margin (16px) | Sets left margin (16px) |
| `mr-4` / `ml-4` | `me-4` | `margin-inline-end` | Sets left margin (16px) | Sets right margin (16px) |
| `pl-6` / `pr-6` | `ps-6` | `padding-inline-start` | Sets right padding (24px) | Sets left padding (24px) |
| `pr-6` / `pl-6` | `pe-6` | `padding-inline-end` | Sets left padding (24px) | Sets right padding (24px) |
| `left-0` | `start-0` | `inset-inline-start` | Snaps to right edge (0px) | Snaps to left edge (0px) |
| `right-0` | `end-0` | `inset-inline-end` | Snaps to left edge (0px) | Snaps to right edge (0px) |
| `text-left` / `text-right` | `text-start` | `text-align: start` | Text aligns to right | Text aligns to left |
| `text-right` / `text-left` | `text-end` | `text-align: end` | Text aligns to left | Text aligns to right |
| `border-l` | `border-s` | `border-inline-start-width` | Border on right edge | Border on left edge |
| `border-r` | `border-e` | `border-inline-end-width` | Border on left edge | Border on right edge |
| `rounded-l-md` | `rounded-s-md` | `border-start-start-radius`, `border-end-start-radius` | Rounds top-right & bottom-right | Rounds top-left & bottom-left |

Switching the site between Persian and English requires nothing more than modifying the root attribute `<html dir="rtl" lang="fa">` to `<html dir="ltr" lang="en">`. The entire layout mirrors symmetrically with zero layout drift or CSS bugs.

---

# 4. GSAP MOTION & INTERACTION LANGUAGE SPECIFICATION

## 4.1 Smooth Scroll & GSAP ScrollTrigger Integration Core

### Smooth Scroll Selection: Lenis
Smooth scrolling prevents abrupt scroll jumping and provides a cinematic, weighted momentum essential for narrative life-science storytelling. **Lenis (by Studio Freight / Darkroom)** is selected as the smooth scroll engine due to its tiny footprint (< 3KB gzipped), native thread performance, and zero hijacking of browser accessibility APIs.

### Synchronization Bridge
ScrollTrigger must stay synchronized with Lenis on every animation frame:
```javascript
import Lenis from '@studio-freight/lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// 1. Initialize Lenis Smooth Scroll
const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Exponential ease-out
  direction: 'vertical',
  gestureDirection: 'vertical',
  smooth: true,
  mouseMultiplier: 1.0,
  smoothTouch: false, // Maintain native touch momentum on iOS/Android
  touchMultiplier: 2.0,
});

// 2. Synchronize Lenis scroll with GSAP ScrollTrigger
lenis.on('scroll', ScrollTrigger.update);

// 3. Drive Lenis through GSAP's central RAF ticker for unified rendering
gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

// 4. Disable internal lag smoothing to prevent visual stutter during heavy paint
gsap.ticker.lagSmoothing(0);
```

---

## 4.2 Narrative Pinned Section: Continuous Biomanufacturing Value Chain

The central feature of the Rahnab Pharmed homepage is the **Biomanufacturing Value Chain**—demonstrating how Persis Gene (R&D), Nozhin Zist & Tamin Plasma & Baya (Source & Manufacturing), Padra & KarayaKhteh (Advanced Therapy), and Arc Zist Azma (QC) form an unbroken sovereign loop.

### Timeline Architecture & Scroll Scrub
```javascript
export function initValueChainTimeline() {
  const container = document.querySelector('.value-chain-section');
  if (!container) return;

  const mm = gsap.matchMedia();

  // Desktop & Tablet Viewport: Pinned Scrub Animation
  mm.add('(min-width: 1024px)', () => {
    const pinDistance = window.innerHeight * 3; // 300vh scrub distance
    const tiers = gsap.utils.toArray('.value-chain-tier-card');
    const progressLine = document.querySelector('.value-chain-progress-line');

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: container,
        start: 'top top',
        end: `+=${pinDistance}`,
        pin: true,
        scrub: 0.8, // 0.8s smooth scrubbing lag
        anticipatePin: 1,
      }
    });

    // Animate the vertical progress indicator
    tl.to(progressLine, {
      scaleY: 1,
      ease: 'none',
      duration: tiers.length
    }, 0);

    // Stagger tier reveals and highlight activations
    tiers.forEach((tier, index) => {
      tl.fromTo(tier, 
        { opacity: 0.25, filter: 'blur(4px)', y: 30 },
        { 
          opacity: 1, 
          filter: 'blur(0px)', 
          y: 0, 
          duration: 0.8, 
          ease: 'power2.out',
          className: '+=is-active'
        },
        index * 0.9
      );
    });

    return () => {
      // Automatic cleanup on viewport change
      ScrollTrigger.getAll().forEach(t => t.kill());
    };
  });

  // Mobile Viewport (< 1024px): Gentle Enter Reveals (No Heavy Pinned Scrub)
  mm.add('(max-width: 1023px)', () => {
    const tiers = gsap.utils.toArray('.value-chain-tier-card');
    tiers.forEach((tier) => {
      gsap.from(tier, {
        scrollTrigger: {
          trigger: tier,
          start: 'top 85%',
          toggleActions: 'play none none reverse',
        },
        opacity: 0,
        y: 24,
        duration: 0.7,
        ease: 'power2.out'
      });
    });
  });
}
```

---

## 4.3 Kinetic Typography Reveals

To establish confidence and scientific authority, headlines do not abruptly pop into view. Instead, lines are masked and revealed with an upward glide:

```javascript
export function initKineticTypography() {
  const headings = document.querySelectorAll('.kinetic-title');
  if (!headings.length) return;

  headings.forEach((heading) => {
    // In actual prototype, SplitType splits text into lines
    // Wrapped in overflow-hidden spans for masking
    const lines = heading.querySelectorAll('.line-wrapper-inner');
    
    gsap.fromTo(lines, 
      {
        yPercent: 110,
        opacity: 0,
      },
      {
        scrollTrigger: {
          trigger: heading,
          start: 'top 88%',
          toggleActions: 'play none none reverse',
        },
        yPercent: 0,
        opacity: 1,
        duration: 1.0,
        stagger: 0.12,
        ease: 'power3.out', // Crisp deceleration curve
      }
    );
  });
}
```

---

## 4.4 Magnetic Micro-Interactions for Primary CTAs

For high-priority interactive touchpoints (such as the primary header contact button or main hero dossier CTA), a subtle magnetic pull tracks the cursor within a 60px proximity field:

```javascript
export function initMagneticElements() {
  const magnets = document.querySelectorAll('.magnetic-target');
  if (!magnets.length) return;

  // Only enable on desktop pointer devices
  if (window.matchMedia('(pointer: fine)').matches) {
    magnets.forEach((el) => {
      const strength = 18; // Maximum pixel displacement

      el.addEventListener('mousemove', (e) => {
        const rect = el.getBoundingClientRect();
        const relX = e.clientX - (rect.left + rect.width / 2);
        const relY = e.clientY - (rect.top + rect.height / 2);

        gsap.to(el, {
          x: (relX / (rect.width / 2)) * strength,
          y: (relY / (rect.height / 2)) * strength,
          duration: 0.35,
          ease: 'power2.out',
          overwrite: 'auto'
        });
      });

      el.addEventListener('mouseleave', () => {
        gsap.to(el, {
          x: 0,
          y: 0,
          duration: 0.6,
          ease: 'elastic.out(1, 0.4)', // Controlled organic spring return
          overwrite: 'auto'
        });
      });
    });
  }
}
```

---

## 4.5 Animated KPI Numeric Counters with Persian Formatting

When statistics (e.g. 150,000 liters, 7 subsidiaries, 1,500 m² cleanroom) scroll into view, they count up smoothly using an easing curve and are dynamically formatted with Persian numerals:

```javascript
export function initKpiCounters() {
  const counters = document.querySelectorAll('.kpi-counter-val');
  if (!counters.length) return;

  const isPersian = document.documentElement.lang === 'fa';
  const formatter = new Intl.NumberFormat(isPersian ? 'fa-IR' : 'en-US');

  counters.forEach((el) => {
    const targetValue = parseFloat(el.getAttribute('data-target') || '0');
    const counterObj = { value: 0 };

    ScrollTrigger.create({
      trigger: el,
      start: 'top 85%',
      once: true, // Run counter once per session
      onEnter: () => {
        gsap.to(counterObj, {
          value: targetValue,
          duration: 2.2,
          ease: 'power2.out',
          onUpdate: () => {
            el.textContent = formatter.format(Math.floor(counterObj.value));
          }
        });
      }
    });
  });
}
```

---

## 4.6 Performance Optimization & Strict Accessibility (`prefers-reduced-motion`)

### GPU Layer Promotion Discipline
- **Promoted Properties Only:** GSAP animations strictly target `x`, `y`, `scale`, and `opacity`. Animating layout-triggering properties (`top`, `left`, `width`, `height`, `margin`) is **prohibited** as it triggers expensive CPU reflows.
- **`will-change` Lifecycle Management:** The `will-change: transform, opacity` property must never be applied globally in static CSS, as keeping entire pages in GPU memory triggers OOM crashes on iOS Safari. Instead, `will-change` is injected on tween start and cleared on tween complete:
  ```javascript
  gsap.to(element, {
    y: 0,
    opacity: 1,
    duration: 0.8,
    onStart: () => { element.style.willChange = 'transform, opacity'; },
    onComplete: () => { element.style.willChange = 'auto'; }
  });
  ```

### Strict Accessibility Implementation: Respecting `prefers-reduced-motion`
Users who experience vestibular motion sickness must receive an immediate, non-jarring static experience:
```javascript
export function initAccessibleMotion() {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReduced) {
    // 1. Disable Lenis Smooth Scroll immediately
    // 2. Kill all scroll scrubbing timelines
    // 3. Immediately set all animated elements to their terminal state
    gsap.set('.value-chain-tier-card, .kinetic-title .line-wrapper-inner, .fade-up-element', {
      opacity: 1,
      y: 0,
      yPercent: 0,
      scale: 1,
      filter: 'none',
      clearProps: 'all'
    });

    // Populate KPI numbers immediately without tweening
    document.querySelectorAll('.kpi-counter-val').forEach((el) => {
      const target = parseFloat(el.getAttribute('data-target') || '0');
      const isPersian = document.documentElement.lang === 'fa';
      el.textContent = new Intl.NumberFormat(isPersian ? 'fa-IR' : 'en-US').format(target);
    });

    console.info('[Motion A11y]: prefers-reduced-motion active. All kinetic translations bypassed.');
    return;
  }

  // Normal kinetic initialization
  initValueChainTimeline();
  initKineticTypography();
  initMagneticElements();
  initKpiCounters();
}
```

---

# 5. ARCHITECTURAL DECISION RECORDS (ADRs)

In accordance with `.agents/rules/decision-making.md`, major architectural decisions are formulated with explicit alternatives, structured trade-offs, and maintainability-first rationales.

---

## ADR-M2-01: Persian Primary Typography Selection

### Context & Problem Statement
Rahnab Pharmed is an institutional life-science holding website communicating complex B2B information: clinical drug pipeline data, facility specifications, and sovereign investment mandates. The Persian typeface must convey scientific authority, maintain crisp legibility in small tabular datasets, and scale to commanding display headers.

### Option 1: Yekan Bakh (یکان بخ)
- **Advantages (مزایا):**
  - Designed specifically for UI and corporate identity by Reza Bakhtiarifard.
  - Highly geometric neo-grotesque structure with open counters and upright stems, projecting clinical precision and corporate stability.
  - Excellent legibility at body sizes (14px–16px) with zero visual fatigue.
  - Mature OpenType support for Persian numerals (`ss01`, `ss02`), tabular figures (`tnum`), and ZWNJ handling.
- **Disadvantages (معایب):**
  - Ubiquitous in Iranian tech and banking sectors; requires careful art direction, bespoke tracking, and weight pairing to stand out as super-premium.

### Option 2: Peyda (پیدا)
- **Advantages (مزایا):**
  - Ultra-contemporary aesthetic with organic, high-end curved terminals, creating an immediate editorial and distinctive design impression.
  - Exceptional elegance in large display titles and marketing slogans.
- **Disadvantages (معایب):**
  - Distinct curved flourishes can cause visual noise and reduced reading speed in dense, multi-column scientific tables and regulatory text blocks.
  - Less neutral than Yekan Bakh for institutional governance documents and technical facility specifications.

### Final Decision & Recommendation (پیشنهاد نهایی)
**Adopt Yekan Bakh as the Primary Corporate & System Typeface, with Peyda as an Optional Editorial Display Accent.**  
*Rationale:* Corporate life-science holding credibility relies on unwavering visual stability and clarity. Yekan Bakh provides superior tabular clarity, robust numeral feature sets, and unmatched reading comfort for B2B investors and regulators. Peyda may be used sparingly for high-impact brand statements or editorial pull-quotes.

---

## ADR-M2-02: English Latin Typography Pairing

### Context & Problem Statement
The English version (`/en/`) must match the institutional prestige of the Persian site without visual jarring when bilingual labels appear inline.

### Option 1: Plus Jakarta Sans
- **Advantages (مزایا):**
  - Modern geometric sans-serif with tall x-height that naturally matches Yekan Bakh (only 1.5% height variance).
  - Open-source license (SIL Open Font License) allows seamless self-hosting in WOFF2 format without commercial licensing bottlenecks.
  - Complete variable font support (`wght` 200–800), enabling precise micro-weight tuning.
- **Disadvantages (معایب):**
  - Common in modern web startups; requires high-contrast typography scaling to maintain holding group gravitas.

### Option 2: Euclid Circular A
- **Advantages (مزایا):**
  - Quintessential Swiss Typefaces corporate luxury aesthetic; razor-sharp geometric terminals and timeless authority.
  - Projects high-end European pharmaceutical holding prestige.
- **Disadvantages (معایب):**
  - Commercial proprietary licensing restrictions make client asset distribution and automated CI/CD builds more complex.
  - Slightly lower x-height requires manual optical scaling (+0.05rem) when paired inline with Persian text.

### Final Decision & Recommendation (پیشنهاد نهایی)
**Adopt Plus Jakarta Sans as the Primary Web Engine Pair, with Euclid Circular A as the Permitted Enterprise Alternative.**  
*Rationale:* Plus Jakarta Sans provides identical geometric proportions, zero licensing friction for self-hosting, full variable font support, and near-perfect baseline alignment with Yekan Bakh.

---

## ADR-M2-03: Motion Engine & Smooth Scroll Architecture

### Context & Problem Statement
The project brief mandates rich, purposeful scroll-driven storytelling (such as pinning the continuous value chain and orchestrating kinetic reveals) while avoiding chaotic animations and maintaining strict web performance and accessibility.

### Option 1: Lenis + GSAP (GreenSock) & ScrollTrigger
- **Advantages (مزایا):**
  - Industry gold-standard for complex timeline choreography, pinned scrub sequences, and directional awareness.
  - Lenis provides synchronized smooth scrolling without breaking browser accessibility or native touch momentum.
  - Robust `matchMedia()` API enables effortless, foolproof disabling of motion when `prefers-reduced-motion` is detected.
  - Cross-browser consistency across Safari, Chrome, Firefox, and Edge.
- **Disadvantages (معایب):**
  - Introduces ~65KB (minified/gzipped) of external JavaScript libraries.

### Option 2: Native CSS Scroll-Driven Animations (`animation-timeline: scroll()`)
- **Advantages (مزایا):**
  - Pure browser native implementation with zero JavaScript payload.
  - Executed off the main thread on the compositor.
- **Disadvantages (معایب):**
  - **Incomplete Browser Support:** As of current baseline, CSS scroll-driven animations lack stable, consistent support in Safari (macOS & iOS Safari), which accounts for a massive portion of executive B2B corporate browsing.
  - Pinning multi-tier elements and coordinating bidirectional scrubbing is brittle and lacks programmatic callbacks for dynamic data (e.g. formatting Persian KPI numbers on the fly).

### Final Decision & Recommendation (پیشنهاد نهایی)
**Adopt Option 1: Lenis + GSAP ScrollTrigger.**  
*Rationale:* Production stability across all executive devices (especially Safari on macOS and iPadOS) is paramount. GSAP's battle-tested reliability, pinning precision, and complete integration with Persian numeric formatting make it the only enterprise-ready choice for Milestone 3 prototyping.

---

## ADR-M2-04: CSS Color Token Storage & Theming Architecture

### Context & Problem Statement
The design system must support two strategic color directions (Direction A: Obsidian & Amber; Direction B: Sovereign Slate & Emerald) as well as light/dark contextual surfaces, while allowing dynamic opacity adjustments for glassmorphism and subtle tinted borders.

### Option 1: RGB Channels Space-Separated CSS Variables (`rgb(var(--color-...) / <alpha-value>)`)
- **Advantages (مزایا):**
  - Supported natively across 100% of browsers for over 5 years.
  - Flawlessly integrates with Tailwind CSS's native opacity modifier syntax (e.g. `bg-surface-primary/80`, `border-border-subtle/50`).
  - Switching themes simply requires overriding the RGB channel values on the root or container scope.
- **Disadvantages (معایب):**
  - Values are stored as triple numbers (`3 9 20`) rather than standard hex codes in CSS files.

### Option 2: Pure OKLCH CSS Variables (`oklch(0.15 0.04 250)`)
- **Advantages (مزایا):**
  - Perceptually uniform color space; predictable chroma and lightness manipulation across color shades.
- **Disadvantages (معایب):**
  - Legacy browser support edge cases in older enterprise environments.
  - More complex integration with older build tools and third-party inspection utilities.

### Final Decision & Recommendation (پیشنهاد نهایی)
**Adopt Option 1: RGB Channels Space-Separated CSS Variables.**  
*Rationale:* Maximum cross-browser compatibility, bulletproof Tailwind CSS alpha-modifier support, and zero runtime overhead make RGB channel custom properties the most maintainable enterprise solution.

---

## ADR-M2-05: Corner Micro-Radius Geometry Philosophy

### Context & Problem Statement
Corporate visual identity must reinforce the brand positioning of an authoritative, high-tech life-science holding company.

### Option 1: Sharp Micro-Radius Architecture (2px–6px)
- **Advantages (مزایا):**
  - Projects architectural rigor, engineering precision, and institutional seriousness.
  - Differentiates Rahnab Pharmed from consumer SaaS and toy-like healthcare apps.
  - Maximizes content density and clean alignment in scientific tables and multi-card grids.
- **Disadvantages (معایب):**
  - Requires strict discipline to prevent mixed border radii across nested cards.

### Option 2: Modernist Medium-to-Large Radius (12px–24px)
- **Advantages (مزایا):**
  - Friendly, soft, approachable aesthetic common in consumer health and modern mobile apps.
- **Disadvantages (معایب):**
  - Strongly associated with consumer products and casual tech startups; dilutes the sovereign industrial authority of a multi-million-liter biomanufacturing holding group.
  - Wastes corner real estate in dense technical specification tables.

### Final Decision & Recommendation (پیشنهاد نهایی)
**Adopt Option 1: Sharp Micro-Radius Architecture (2px–6px).**  
*Rationale:* Super-premium life-science holding identity requires architectural discipline and clinical precision. Micro-radii (`rounded-sm: 4px`, `rounded-md: 6px`) paired with pill buttons (`rounded-full`) establish a sophisticated, authoritative visual language.

---

# 6. SUMMARY OF DELIVERABLE BLUEPRINTS & HANDOFF MATRIX

| Deliverable Target | Key Sections / Blueprint Artifacts Provided Here | Direct Action for Milestone 2 Author (`worker_m2_author`) |
|:---|:---|:---|
| `03_DESIGN_SYSTEM.md` | Typography scales (Section 1), Semantic token schema (Section 2.1), Spatial baseline & layout grid (Section 2.2), Micro-radius & shadow system (Section 2.3), Key component specs (Section 2.4). | Incorporate all tables, mathematical scales, component token specifications, and accessibility contrast ratios directly into Deliverable 03. |
| `04_TAILWIND_TOKENS_BLUEPRINT.md` | Complete `tailwind.config.js` code (Section 3.1), CSS variables root stylesheet `tokens.css` (Section 3.2), CSS logical properties architecture (Section 3.3). | Adopt the complete configuration, custom utility plugins, and bidirectional mirroring rules directly into Deliverable 04. |
| `05_MOTION_INTERACTION_LANGUAGE.md` | Lenis smooth scroll bridge (Section 4.1), Value-chain pinned scrub timeline (Section 4.2), Kinetic typography reveal (Section 4.3), Magnetic micro-interactions (Section 4.4), Animated KPI counters (Section 4.5), Performance & `prefers-reduced-motion` a11y (Section 4.6). | Codify these interaction architectures, timeline snippets, and accessibility fallbacks directly into Deliverable 05. |
| `06_DESIGN_DECISION_LOG.md` | 5 complete ADRs (ADR-M2-01 through ADR-M2-05) in Section 5 with options, pros/cons, and maintainability-first rationales. | Migrate these ADRs directly into Deliverable 06 in compliance with `.agents/rules/decision-making.md`. |
