# Dispatch Log — orchestrator_m1

## 2026-09-09T16:59:43Z

You are the Project Orchestrator for Rahnab Pharmed Corporate Website project — Milestone 1 (Information Architecture + WordPress CPT Model).

Working directory: /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1
Workspace root: /Users/user/Sites/localhost/rahnab
Source of Truth: /Users/user/Sites/localhost/rahnab/docs/MASTER_PROJECT_BRIEF.md
Original User Request: /Users/user/Sites/localhost/rahnab/.agents/ORIGINAL_REQUEST.md (see 2026-09-09T16:58:06Z entry)
Milestone 0 Deliverables: /Users/user/Sites/localhost/rahnab/.agents/orchestrator_m0/deliverables/
Rules & Skills: /Users/user/Sites/localhost/rahnab/.agents/rules/ and /Users/user/Sites/localhost/rahnab/.agents/skills/

CRITICAL INSTRUCTIONS & CONSTRAINTS:
1. SUBSIDIARY LIST CORRECTION:
   Al Salam is removed. Replaced by: Arc Zist Azma (آرک زیست آزما) — first quality control laboratory for biological products in Iran, دانشبنیان, founded 1393, active since 1395, collaborator lab of Food & Drug Admin (سازمان غذا و دارو), listed on rahnab.com.
   Apply this correction to `02_SUBSIDIARY_RESEARCH.md` in `.agents/orchestrator_m0/deliverables/`.
   The final 7 confirmed subsidiaries are:
   1. Persis Gene (پرسیس ژن)
   2. Nozhin Zist Pharmed (نوژین زیست فارمد) — National ID: 14012987472
   3. Padra Serum Alborz (پادرا سرم البرز) — National ID: 14006664540, site: padraserum.com
   4. KarayaKhteh / CARTIMED (کارا یاخته تجهیز آزما) — National ID: 14007103978
   5. Tamin Plasma Nozhin (تأمین پلاسما نوژین) — National ID: 14012987472, site: tpnojine.com
   6. Baya Zist Pharmed (بایا زیست فارمد) — National ID: 14010425772
   7. Arc Zist Azma (آرک زیست آزما)

2. ⚠️ ABSOLUTE PROHIBITION:
   In Milestone 1, write ZERO WordPress PHP code, ZERO theme files, ZERO templates.
   Deliver ONLY Architecture Documents!

3. DELIVERABLES REQUIRED FOR MILESTONE 1:
   Deliverables must be authored, reviewed, and published in `.agents/orchestrator_m1/deliverables/`:
   1. Final Sitemap — Complete website structure with RESTful Latin URL structure, taking into account:
      - Future portfolio extensibility (>7 subsidiaries without restructuring)
      - RTL/LTR routing strategy (Persian default RTL, English secondary LTR)
      - News & Events taxonomy
      - Company detail pages
   2. Navigation Architecture — Header nav, footer nav, mobile nav, language switcher placement
   3. Content Hierarchy — For each page: content prioritization, content zones, data sources
   4. WordPress CPT Architecture Document (Pure specification/document — NO code):
      - Required Custom Post Types (Company, News, Event, Achievement, etc.)
      - Taxonomies
      - Meta field structures for each CPT
      - Relationships between CPTs
      - Proposed template hierarchy
      - Admin UX considerations
   5. User Flow Diagrams — Core user journeys:
      - B2B visitor -> Company discovery
      - Investor -> Group overview
      - Press/Media -> News
      - Partner -> Contact
   6. IA Decision Log — Every architectural decision documented with explicit rationale

Strategic Context:
- Primary audience: B2B (pharma companies, institutional partners, investors)
- Reflect the vertical biomanufacturing value chain of the 7 subsidiaries
- Homepage must tell a Corporate Holding Story, NOT a grid of generic cards
- Persian default (RTL), English secondary (LTR)

Maintain BRIEFING.md and progress.md in your working directory. Conduct internal review/audit gate, and notify parent upon completion.
