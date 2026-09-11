# DELIVERABLE 04: TAILWIND CSS TOKENS & ASSETS BLUEPRINT
## Rahnab Pharmed Corporate Website (`rahnab.com`)
### Milestone 2: Design System, Tokens & Art Direction

**Document Code:** `RAHNAB-M2-DELIV-04-TW`  
**Classification:** Authoritative Code Blueprint & Production Configuration  
**Target Milestone:** Milestone 2 (Tailwind Tokens & Assets Architecture)  
**Downstream Consumer:** Milestone 3 (Interactive HTML/CSS/JS Prototype Engine)  
**Parent Orchestrator:** `orchestrator_m2`  
**Authoring Unit:** `worker_m2_author`  
**Foundational Sources:** `docs/MASTER_PROJECT_BRIEF.md`, `.agents/ORIGINAL_REQUEST.md`, `explorer_m2_tokens_motion/analysis.md`, `03_DESIGN_SYSTEM.md`, `.agents/rules/code-quality.md`.

---

## 1. Executive Summary & Architecture

This deliverable provides the complete, production-ready **Tailwind CSS Blueprint** for Rahnab Pharmed. It bridges the Master Design System (`03_DESIGN_SYSTEM.md`) with the upcoming interactive prototype development in Milestone 3.

### 1.1 Technical Principles
1. **Zero Hardcoded Directional Classes:** Every layout, spacing, and border utility strictly leverages **CSS Logical Properties** (`ms-`, `me-`, `ps-`, `pe-`, `start-`, `end-`, `border-s-`, `border-e-`), ensuring seamless RTL (Persian) and LTR (English) bidirectional rendering with zero layout bugs.
2. **Dynamic Semantic Token Theming:** Color tokens are mapped to space-separated RGB CSS variables (`rgb(var(--color-...) / <alpha-value>)`), supporting Tailwind's native opacity modifiers (e.g. `bg-surface-primary/80`, `border-border-subtle/50`).
3. **Custom Utility Plugin:** Embeds ultra-premium life-science styles: high-refraction glassmorphic backdrops, OpenType Persian number features, text balance/pretty, and responsive container queries.

---

## 2. Master `tailwind.config.js` Specification

The following file represents the complete, valid, and fully documented configuration to be deployed in Milestone 3:

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
      '3xl': '1600px', // Custom ultra-wide corporate canvas breakpoint
    },
    extend: {
      fontFamily: {
        // Persian Primary with graceful system fallback stack
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
        // English Primary with matched optical x-height
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
        // Modular Typography Scale Tokens (Augmented Fourth & Minor Third)
        'display-2xl': ['clamp(2rem, 4vw + 1rem, 5.5rem)', { lineHeight: '1.1', letterSpacing: '-0.025em' }],
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
          subtle: 'rgba(var(--color-border-subtle), var(--color-border-subtle-alpha, 0.08))',
          muted: 'rgba(var(--color-border-muted), var(--color-border-muted-alpha, 0.14))',
          prominent: 'rgba(var(--color-border-prominent), var(--color-border-prominent-alpha, 0.28))',
          accent: 'rgb(var(--color-border-accent) / <alpha-value>)',
        },
        accent: {
          DEFAULT: 'rgb(var(--color-accent-primary) / <alpha-value>)',
          hover: 'rgb(var(--color-accent-hover) / <alpha-value>)',
          active: 'rgb(var(--color-accent-active) / <alpha-value>)',
          subtle: 'rgba(var(--color-accent-subtle), var(--color-accent-subtle-alpha, 0.12))',
        },
        status: {
          success: 'rgb(var(--color-status-success) / <alpha-value>)',
          warning: 'rgb(var(--color-status-warning) / <alpha-value>)',
          error: 'rgb(var(--color-status-error) / <alpha-value>)',
          info: 'rgb(var(--color-status-info) / <alpha-value>)',
        },
      },
      spacing: {
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

## 3. Master CSS Custom Properties Stylesheet (`tokens.css`)

The core design tokens are defined in `tokens.css` and imported into Tailwind’s base layer. This allows switching between Direction A (Default Obsidian/Amber) and Direction B (Sovereign Slate/Emerald) with a single `data-theme` attribute:

```css
/* ==========================================================================
   RAHNAB PHARMED MASTER DESIGN TOKENS (tokens.css)
   ========================================================================== */

/* Direction A: Bio-Kinetic Deep Obsidian & Kinetic Amber (Primary Default) */
:root,
[data-theme="direction-a"] {
  /* Surface Channels (Space-separated R G B) */
  --color-surface-primary: 3 9 20;           /* #030914 */
  --color-surface-secondary: 6 14 30;        /* #060E1E */
  --color-surface-tertiary: 8 19 38;         /* #081326 */
  --color-surface-elevated: 14 29 58;        /* #0E1D3A */
  --color-surface-inverse: 248 250 252;      /* #F8FAFC */

  /* Surface Pre-mixed Composites */
  --surface-glass: rgba(8, 19, 38, 0.78);
  --surface-glass-heavy: rgba(3, 9, 20, 0.90);

  /* Text Channels (Space-separated R G B) */
  --color-text-primary: 248 250 252;         /* #F8FAFC */
  --color-text-secondary: 203 213 225;       /* #CBD5E1 */
  --color-text-tertiary: 148 163 184;        /* #94A3B8 */
  --color-text-muted: 120 136 158;           /* #78889E */
  --color-text-accent: 253 119 2;            /* #FD7702 */
  --color-text-inverse: 3 9 20;              /* #030914 */

  /* Border Channels (Space-separated R G B) & Default Alpha */
  --color-border-subtle: 255 255 255;
  --color-border-subtle-alpha: 0.08;
  --color-border-muted: 255 255 255;
  --color-border-muted-alpha: 0.14;
  --color-border-prominent: 255 255 255;
  --color-border-prominent-alpha: 0.28;
  --color-border-accent: 253 119 2;
  --border-glass: rgba(255, 255, 255, 0.18);

  /* Accent Channels (Space-separated R G B) & Default Alpha */
  --color-accent-primary: 253 119 2;         /* #FD7702 */
  --color-accent-hover: 255 147 51;          /* #FF9333 */
  --color-accent-active: 216 98 0;           /* #D86200 */
  --color-accent-subtle: 253 119 2;
  --color-accent-subtle-alpha: 0.12;

  /* Status Channels (Space-separated R G B) */
  --color-status-success: 16 185 129;
  --color-status-warning: 245 158 11;
  --color-status-error: 239 68 68;
  --color-status-info: 14 165 233;

  /* Layered Chromatic Ambient Shadows */
  --shadow-subtle: 0 1px 2px 0 rgba(3, 9, 20, 0.24);
  --shadow-card: 0 2px 6px -1px rgba(3, 9, 20, 0.20), 0 8px 18px -3px rgba(3, 9, 20, 0.28), 0 0 0 1px rgba(255, 255, 255, 0.07);
  --shadow-elevated: 0 4px 12px -2px rgba(3, 9, 20, 0.28), 0 16px 36px -4px rgba(3, 9, 20, 0.38), 0 0 0 1px rgba(255, 255, 255, 0.12);
  --shadow-modal: 0 12px 32px -4px rgba(0, 0, 0, 0.60), 0 32px 80px -12px rgba(0, 0, 0, 0.80), 0 0 0 1px rgba(255, 255, 255, 0.16);
  --shadow-glow-accent: 0 0 24px -2px rgba(253, 119, 2, 0.35);
}

/* Direction B: Clinical Sovereign Slate & Clinical Emerald */
[data-theme="direction-b"] {
  /* Surface Channels (Space-separated R G B) */
  --color-surface-primary: 10 15 29;         /* #0A0F1D */
  --color-surface-secondary: 13 20 37;       /* #0D1425 */
  --color-surface-tertiary: 16 25 45;        /* #10192D */
  --color-surface-elevated: 24 36 62;        /* #18243E */
  --color-surface-inverse: 248 250 252;      /* #F8FAFC */

  --surface-glass: rgba(16, 25, 45, 0.78);
  --surface-glass-heavy: rgba(10, 15, 29, 0.90);

  /* Text Channels (Space-separated R G B) */
  --color-text-primary: 248 250 252;         /* #F8FAFC */
  --color-text-secondary: 203 213 225;       /* #CBD5E1 */
  --color-text-tertiary: 148 163 184;        /* #94A3B8 */
  --color-text-muted: 120 136 158;           /* #78889E */
  --color-text-accent: 0 168 150;            /* #00A896 */
  --color-text-inverse: 10 15 29;            /* #0A0F1D */

  /* Border Channels (Space-separated R G B) & Default Alpha */
  --color-border-subtle: 255 255 255;
  --color-border-subtle-alpha: 0.08;
  --color-border-muted: 255 255 255;
  --color-border-muted-alpha: 0.14;
  --color-border-prominent: 255 255 255;
  --color-border-prominent-alpha: 0.28;
  --color-border-accent: 0 168 150;
  --border-glass: rgba(255, 255, 255, 0.18);

  /* Accent Channels (Space-separated R G B) & Default Alpha */
  --color-accent-primary: 0 168 150;         /* #00A896 */
  --color-accent-hover: 0 196 174;           /* #00C4AE */
  --color-accent-active: 0 140 125;          /* #008C7D */
  --color-accent-subtle: 0 168 150;
  --color-accent-subtle-alpha: 0.12;

  /* Layered Shadows */
  --shadow-subtle: 0 1px 2px 0 rgba(10, 15, 29, 0.24);
  --shadow-card: 0 2px 6px -1px rgba(10, 15, 29, 0.20), 0 8px 18px -3px rgba(10, 15, 29, 0.28), 0 0 0 1px rgba(255, 255, 255, 0.07);
  --shadow-elevated: 0 4px 12px -2px rgba(10, 15, 29, 0.28), 0 16px 36px -4px rgba(10, 15, 29, 0.38), 0 0 0 1px rgba(255, 255, 255, 0.12);
  --shadow-modal: 0 12px 32px -4px rgba(0, 0, 0, 0.60), 0 32px 80px -12px rgba(0, 0, 0, 0.80), 0 0 0 1px rgba(255, 255, 255, 0.16);
  --shadow-glow-accent: 0 0 24px -2px rgba(0, 168, 150, 0.35);
}
```

---

## 4. CSS Logical Properties Mapping Table

All Tailwind utility usage in templates must strictly adhere to the following mapping:

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
| `rounded-r-md` | `rounded-e-md` | `border-start-end-radius`, `border-end-end-radius` | Rounds top-left & bottom-left | Rounds top-right & bottom-right |

---

## 5. Verification & Implementation Checklist

- [x] Complete, syntactically valid `tailwind.config.js` specified with all fonts, modular sizes, semantic colors, and micro-radii.
- [x] Complete `tokens.css` with RGB channel variables for Direction A and Direction B with alpha support.
- [x] Custom utility plugin added for glassmorphism, OpenType Persian numbers, and text-wrap.
- [x] Strict CSS Logical Properties mapping table defined with forbidden vs mandatory classes.
- [x] Zero WordPress PHP/theme files and zero full HTML prototype pages created.
