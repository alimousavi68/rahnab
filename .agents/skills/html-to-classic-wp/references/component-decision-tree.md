# Component Decision Tree: Static Section to WordPress Architecture

## Purpose
This document guides the agent in classifying any static HTML/PHP template section into the appropriate WordPress architecture using a deterministic 5-way decision engine and confidence scoring.

## Scope & Decision Framework
Every static section must be evaluated against these sequential criteria:

1. **Global Structural Chrome?**
   - Multi-column footer or blog sidebar? → **1. Widget Area (`register_sidebar`)**
   - Fixed structural header frame, top-bar, or 404 graphic? → **2. Static Template Part (`template-parts/`)**
2. **Repeatable Business Entity?**
   - Possesses multiple items with individual detail URLs (Portfolio, Services, Team)? → **3. CPT + Post Meta (Companion Plugin)**
3. **Interactive Form / Calculator?**
   - Needs email dispatch, CAPTCHA, or backend AJAX? → **4. Plugin Feature / Shortcode (Companion Plugin)**
4. **Editable Marketing Section on a Page?**
   - Modular section (Hero, Features, Pricing, Testimonials)? → **5. Gutenberg Block Pattern (`patterns/*.php`)**
5. **Default Fallback:**
   - Static, non-editable section? → **2. Static Template Part**

## 3. The Permalink Test (آزمون پیوند یکتای اختصاصی برای جلوگیری از CPT بی‌مورد)
To prevent the common anti-pattern of over-engineering static cards into Custom Post Types (CPTs), the agent must apply **The Permalink Test**:

- **MANDATORY RULE:** A repeated section (e.g. Stats, Feature Boxes, Team Grid, FAQ, Testimonials) is **PROHIBITED** from being converted into a Custom Post Type unless it satisfies at least one condition:
  1. **Individual Detail Page Exists:** The prototype contains or explicitly requires a dedicated single detail page (e.g. `single-service.php`, `single-portfolio.php`) with its own unique URL.
  2. **High-Frequency CRUD Collection:** The collection contains $>10$ items that need frequent, independent addition, editing, or sorting by an editor.
- **Action on Test Failure:** If the section does not pass the Permalink Test (e.g. 4 static stats numbers or 3 marketing blurbs):
  - Classify strictly as **5. Gutenberg Block Pattern (`patterns/*.php`)**.
  - Under no circumstances create a CPT for static marketing cards.

## 4. Confidence Scoring Requirement
For every assignment, record:
- **Decision:** [Assigned Architecture]
- **Confidence:** HIGH | MEDIUM | LOW | UNCERTAIN
- **Reason:** [Technical justification]
- **Alternative:** [Alternative architecture considered]
- **Why Rejected:** [Reason alternative was declined]
