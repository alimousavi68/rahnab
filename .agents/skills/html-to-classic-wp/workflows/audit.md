# Workflow: /audit

## 1. Goal (هدف)
Perform an automated, zero-token static audit of the raw HTML/CSS/JS prototype to extract a deterministic blueprint of pages, semantic landmarks, enqueued styles, scripts, typography, and potential dynamic components.

## 2. Inputs (ورودی)
- `--source <path>`: Absolute or relative path to the static prototype folder containing `.html`, `.css`, `.js`, and asset subdirectories.
- Optional `--out <path>`: Path to output JSON (Defaults to `<source>/source-inventory.json`).

## 3. Execution Steps (مراحل اجرا)

### Step 1: Run Deterministic Source Auditor Script
Run the zero-dependency Node.js auditor CLI tool using the skill root resolver:
```bash
# Resolve Skill root directory (where html-to-classic-wp is located)
SKILL_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"

# Run deterministic auditor
node "$SKILL_DIR/scripts/audit-source.mjs" --source "<path-to-source>" --out "<path-to-source>/source-inventory.json"
```

### Step 2: Inventory Analysis & Summary
Read the resulting `source-inventory.json` (small ~2KB file, avoiding context window pollution) to extract:
- Total HTML templates and corresponding WordPress template mappings (`index.html` → `front-page.php`, `about.html` → `page-about.php`, etc.).
- Global styles and scripts present across >60% of pages to register in `inc/enqueue.php`.
- CSS custom properties (variables) and font families to populate editor styles and `theme.json` color/typography palettes.

### Step 3: Classify Sections via Component Decision Tree
Consult `references/component-decision-tree.md` and match each detected section against the 5-Way Decision Tree:
1. Multi-column footer / sidebar → **Widget Area** (`decisions/blog-widget.md`)
2. Header frame / top bar / 404 → **Static Template Part**
3. Repeatable catalog with detail pages → **CPT in Companion Plugin** (`decisions/services-section.md`)
4. Contact forms / calculators → **Plugin Shortcode** (`decisions/contact-form.md`)
5. Marketing hero / features / testimonials → **Gutenberg Block Pattern** (`decisions/hero-section.md`, `decisions/generic-section.md`)

### Step 4: Present Interactive Decision Checkpoints (CP-01 to CP-06)
Review any ambiguous components with the user using concise options.

## 4. Expected Output (خروجی مورد انتظار)
1. Generated `source-inventory.json` in the project directory.
2. A concise, structured Markdown report presented to the user summarizing:
   - Source structure & asset counts.
   - Proposed WordPress template mapping.
   - Identified dynamic components and assigned architectures.
   - Any open questions requiring human sign-off before Pass 1 conversion.
