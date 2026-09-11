# HANDOFF REPORT: SITEMAP & NAVIGATION ARCHITECTURE REMEDIATION
## Milestone 1 Remediation (Iteration 2) — Deliverables 01 & 02
### Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Agent:** Explorer 2.2 (Sitemap & Navigation Remediation Specialist)  
**Working Directory:** `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_routing`  
**Target Recipient:** Milestone 1 Orchestrator (`parent`, ID: `6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1`) & Deliverables Author (`worker_m1_author`)  
**Primary Deliverables Covered:** `01_FINAL_SITEMAP.md` and `02_NAVIGATION_ARCHITECTURE.md`  
**Date:** 2026-09-09T21:14:00+03:30 (Local) / 2026-09-09T17:44:00Z (UTC)  
**Handoff Type:** Hard Handoff (Investigation & Remediation Specification Complete)  

---

## 1. Observation

Direct empirical observations from inspecting workspace files:

1. **Failure 1 — Rewrite Rule Precedence (`01_FINAL_SITEMAP.md`):**
   - Line 105 of `01_FINAL_SITEMAP.md` defines:
     `| Cluster Taxonomy Filter | https://rahnab.com/subsidiaries/cluster/{slug}/ | taxonomy-value_chain_stage.php | Dynamic taxonomy archive for portfolio clusters |`
   - Lines 106–112 define single subsidiary canonical URLs as: `https://rahnab.com/subsidiaries/{slug}/`.
   - In WordPress core rewrite generation, standard CPT rewrite rule is `^subsidiaries/([^/]+)/?$`.
   - A request to `/subsidiaries/cluster/` matches `([^/]+)` with `$matches[1] = 'cluster'`, querying `post_type=company&name=cluster` and returning an unhandled **HTTP 404**.
   - No explicit rewrite rule array order, priority (`'top'`), or reserved post slug validator was specified in Deliverable 01.

2. **Failure 2 — News by Subsidiary Route Desynchronization (`01_FINAL_SITEMAP.md` vs `04_WORDPRESS_CPT_ARCHITECTURE.md`):**
   - Line 72 and line 115 of `01_FINAL_SITEMAP.md` specify:
     `| Subsidiary-Tagged News | https://rahnab.com/news-events/entity/{slug}/ | taxonomy-related_entity.php | Cross-entity archive linking news to company |`
   - In `04_WORDPRESS_CPT_ARCHITECTURE.md` (Section 3), only 5 taxonomies are registered (`value_chain_stage`, `news_category`, `news_tag`, `event_type`, `achievement_type`). Taxonomy `related_entity` does not exist.
   - In `04_WORDPRESS_CPT_ARCHITECTURE.md` (Section 5.1), relationships are strictly scalar post meta (`_rahnab_news_related_company_id = 42`).
   - In `04_WORDPRESS_CPT_ARCHITECTURE.md` (Section 6.1), template `taxonomy-related_entity.php` is non-existent.
   - Any request to `/news-events/entity/{slug}/` produces an unhandled **HTTP 404** because WordPress core has no registered rewrite rule or taxonomy for `entity`.

3. **Failure 3 — Bilingual Fallback SEO Vulnerabilities (`01_FINAL_SITEMAP.md` Section 4.4):**
   - Section 4.4 specifies that if an English page is requested for an untranslated entity, it renders the English shell with an editorial banner and Persian source content.
   - Section 4.4 completely omits `<meta name="robots" content="noindex, follow">`.
   - Section 4.3 declares bidirectional `<link rel="alternate" hreflang="en-US" ...>` unconditionally.
   - Search crawlers crawling `/en/` fallback pages will flag language mismatch (`<html lang="en-US">` with Persian body), index duplicate Persian content under the English URL, and trigger Google Search Console hreflang violations.

4. **Failure 4 — Desktop Mega-Menu Viewport Overflow on Portfolio Scaling (`02_NAVIGATION_ARCHITECTURE.md` Section 2):**
   - Section 2 specifies a fixed 3-column layout (25% / 50% / 25%) with a fixed width of `1080px`.
   - The adaptive 2-pane threshold mentioned in Deliverable 01 Section 3 (>8 subsidiaries) was completely missing from Deliverable 02.
   - Spatial math: On standard 1366x768 and 1440x900 laptop displays, usable viewport height below the 96px header is ~524px–534px.
   - Scaling to 15 subsidiaries results in a column height of **1,076px**; 20 subsidiaries reaches **1,356px**.
   - With no `max-height` or internal scrollbar specified, between 40% and 60% of the menu renders below the physical screen fold, completely inaccessible.

---

## 2. Logic Chain

1. **From Observation 1 to Remediation 1:**
   Because WordPress evaluates `$wp_rewrite->rules` sequentially and terminates on first match:
   - The taxonomy rule `^subsidiaries/cluster/([^/]+)/?$` MUST be explicitly registered with `$priority = 'top'` to guarantee it precedes the single post rule `^subsidiaries/([^/]+)/?$`.
   - The base path `/subsidiaries/cluster/` must be explicitly captured and 301-redirected to `/subsidiaries/` to prevent single company lookup failures on `cluster`.
   - A `wp_insert_post_data` filter must blacklist `cluster` and other routing tokens from being assigned as `company` post slugs.

2. **From Observation 2 to Remediation 2:**
   Because `related_entity` is an intentional scalar post meta relationship (`_rahnab_news_related_company_id`) and NOT a taxonomy:
   - Deliverable 01 Table 2 and Section 5 must replace `taxonomy-related_entity.php` with `archive-news.php` utilizing a custom query variable `company_slug`.
   - Deliverable 01 must specify the custom rewrite rule:
     `^news-events/entity/([^/]+)/?$` -> `index.php?post_type=news&company_slug=$matches[1]` (registered at `'top'`).
   - In `pre_get_posts`, `company_slug` resolves the company post ID and sets an indexed `meta_query` on `_rahnab_news_related_company_id`.
   - Templates for news are aligned to standard Classic WordPress naming: `archive-news.php` and `single-news.php`.

3. **From Observation 3 to Remediation 3:**
   Because international search engines strictly enforce language consistency and duplicate content penalties:
   - Any `/en/` page rendering untranslated Persian source content must inject `<meta name="robots" content="noindex, follow">`.
   - `noindex` blocks indexing of untranslated content, while `follow` preserves internal link graph crawl equity.
   - The canonical URL on the fallback page must point to the Persian canonical post (`https://rahnab.com/subsidiaries/{slug}/`).
   - In the Persian post `<head>`, the `hreflang="en-US"` tag must be suppressed until the English post is published.
   - WordPress `template_redirect` hook intercepts 404s on `/en/` and binds the Persian fallback content.

4. **From Observation 4 to Remediation 4:**
   Because laptop screens (768p) have a maximum usable vertical space of ~530px below the header:
   - The Mega-Menu must implement an **Adaptive Dual-Mode Architecture**:
     - Mode A (<= 8 subsidiaries): 3-column layout clamped to `max-height: min(560px, calc(85vh - 90px))` and fluid width `min(1080px, calc(100vw - 48px))`.
     - Mode B (> 8 to 20+ subsidiaries): Switches to a **2-Pane Master-Detail Layout** (32% cluster tabs sidebar with instant hover switch; 68% detail canvas showing a 2-column card grid of subsidiaries in the active cluster; top live search bar; pinned bottom cluster archive link).
     - Both panes have independent internal scrolling (`overflow-y: auto`), guaranteeing zero menu overflow beyond the browser viewport fold.
   - In the mobile drawer: Language switcher is relocated to the top bar; bottom CTAs are reorganized into a 2-button horizontal grid (64px height), reclaiming ~100px of vertical space for compact screens.

---

## 3. Caveats

1. **Zero-Code Phase Boundary:** This investigation and its remediation specifications are strictly architectural. No PHP implementation code or WordPress theme files were created in the repository. The companion plugin `rahnab_core` will implement these hooks in Milestone 2/3.
2. **Polylang Query Hook Variance:** The query interception mechanism in `template_redirect` assumes Polylang Pro or standard Polylang URL structure (`/en/...`). If WPML is selected during Milestone 3, the hook filter names adapt (`icl_object_id` instead of `pll_get_post`), but the architectural routing and SEO contracts remain identical.
3. **Primary Cluster Attribution:** For subsidiaries tagged with secondary capabilities, single-post breadcrumbs and mega-menu placement rely on field `_rahnab_company_primary_cluster` specified in Deliverable 04 remediation.

---

## 4. Conclusion

The 4 failure points identified by Challenger 1 and Reviewer 1 have been completely diagnosed and solved. Complete, exact drop-in Markdown remediation blocks have been formulated and written to:
`/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_routing/analysis.md`

### Actionable Roadmap for Author (`worker_m1_author`):
1. **In Deliverable 01 (`01_FINAL_SITEMAP.md`):**
   - Replace Section 2 (Table 2) with Section 3.1 from `analysis.md`.
   - Insert Section 3.1 (Rewrite Rule Precedence & Collision Guard) from Section 3.2 of `analysis.md`.
   - Replace Section 4.4 with Section 3.3 (Dual-Language SEO Protection) from `analysis.md`.
   - Replace Section 5 with Section 3.4 (News & Events Relational Routing) from `analysis.md`.
2. **In Deliverable 02 (`02_NAVIGATION_ARCHITECTURE.md`):**
   - Replace Section 2 with Section 4.1 (Dual-Mode Mega-Menu & 2-Pane Master-Detail Layout) from `analysis.md`.
   - Replace Section 4 with Section 4.2 (Mobile Navigation Drawer & Thumb-Zone Optimization) from `analysis.md`.

Applying these drop-in blocks will immediately resolve CH-01, CH-02, CH-03, CH-04, F-02, and F-03, paving the way for 100% gate pass in Iteration 2.

---

## 5. Verification Method

To independently verify this analysis and ensure correct downstream execution:

1. **Deliverable Content Inspection:**
   - Inspect `/Users/user/Sites/localhost/rahnab/.agents/explorer_m1_r2_routing/analysis.md` (Sections 3 and 4) to verify that drop-in text contains:
     - Explicit rewrite precedence regex table with priority `'top'`.
     - News entity route mapped to `archive-news.php` via `company_slug`.
     - `<meta name="robots" content="noindex, follow">` and `canonical` attribution for fallback pages.
     - Mode B 2-Pane Master-Detail ASCII layout diagram and spatial clamping CSS (`max-height: min(560px, calc(85vh - 90px))`).
2. **Zero-Code Compliance Verification:**
   - Command: `find /Users/user/Sites/localhost/rahnab -name "*.php" -o -name "*style.css"`
   - Expected Output: **0 files found.**
3. **Invalidation Conditions:**
   - This analysis is invalidated if WordPress Core routing natively matches taxonomy sub-paths without `'top'` priority when post type rewrite base matches the parent slug.
   - This analysis is invalidated if Googlebot allows hreflang alternates pointing to untranslated pages without duplicate-content penalties.
