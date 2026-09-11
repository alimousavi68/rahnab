# Original User Request

## 2026-09-09T15:23:50Z

Design and implement a **Premium Corporate Website for Rahnab Pharmed** — an Iranian biopharma investment holding group with 7 subsidiary companies — following a strict research-first, prototype-then-WordPress pipeline. The site must feel like a **Super Premium Life-Science Holding**, not a generic pharmaceutical website.

**Working directory:** `/Users/user/Sites/localhost/rahnab`

---

## Context

- **Source of Truth:** `docs/MASTER_PROJECT_BRIEF.md` — read this file completely before any other action
- **Project rules & agent skills:** `.agents/` folder — contains WordPress development standards, code quality rules, IA rules, decision-making rules, and a specialized `html-to-classic-wp` skill
- **Client reference site:** https://www.cinnagen.com/ (analyze deeply — do NOT clone)
- **Domain:** rahnab.com
- **Primary language:** Persian (RTL, default) — English (LTR) as secondary
- **Primary audience:** B2B — pharmaceutical companies, institutional partners, potential investors
- **Confirmed contact info:** info@rahnab.com · 021-49361200 · Tehran, National Institute of Genetic Engineering and Biotechnology, Floor 3, Unit 302 · LinkedIn: Rahnab Pharmed

---

## Process (Non-Negotiable)

The team MUST follow this sequence. No phase begins before the prior phase delivers its artifacts:

```
Research → Strategy → Information Architecture → UX → Art Direction
→ Design System → HTML/CSS/JS Prototype → Review/Iteration → WordPress Architecture → Custom WordPress Theme → QA
```

Each milestone report must include: **Completed · Findings · Decisions · Open Questions · Risks · Next Milestone**

---

## This Run: Milestone 0 Only

**In this first run, complete Milestone 0 only. Do NOT design any pages.**

Milestone 0 deliverables:

1. **Requirements Document** — extracted from `docs/MASTER_PROJECT_BRIEF.md`:
   - Business information
   - Website structure
   - Audience
   - Content requirements
   - Corporate requirements
   - Subsidiary companies (all 7)
   - Contact information
   - Language requirements
   - Visual preferences
   - Business gaps
   - Unanswered questions
   - Potential UX requirements
   - Mark unknowns: `RESEARCH REQUIRED` or `CLIENT CONFIRMATION REQUIRED`

2. **Subsidiary Research** — for each of the 7 companies below, find and verify:
   - Persis Gene (پرسیس ژن)
   - Nozhin Zist Pharmed (نوژین زیست فارمد)
   - Patra Serum (پاترا سرم)
   - KarayaKhteh (کارایاخته)
   - Tamin Plasma (تامین پلاسما)
   - Al Salam (السلام)
   - Baya (بایا)
   
   For each: official Persian name · official English name · website URL · logo availability · activity area · therapeutic area · relationship to Rahnab · any available visual assets · source citation. If unverifiable, flag as `CLIENT CONFIRMATION REQUIRED`.

3. **Benchmark Matrix** — competitive analysis:
   - Deep analysis of https://www.cinnagen.com/ — identify what works visually and why, what patterns are applicable to Rahnab, what must be different, how to achieve the same credibility with a distinct Rahnab identity
   - 4–6 international premium biopharma/life-science/healthcare holding corporate websites
   - Matrix dimensions: Brand impression · Navigation · Typography · Color · Hero · Motion · Storytelling · Company presentation · Scientific credibility · Mobile UX · Footer · Content density · Interaction · Premium perception
   - For each benchmark: **WHY IT WORKS** explanation — not just visual description

4. **Content Gap Analysis** — list every piece of content the design will need that is not yet confirmed by the client

5. **Research Questions** — all questions that must be answered by research or client before design begins

6. **Initial IA Proposal** — a preliminary sitemap suggestion based on the brief (for discussion, not final)

7. **Risk List** — technical, design, content, and timeline risks

8. **Full Milestone Plan** — roadmap of all subsequent milestones with inputs, outputs, and decision gates

---

## Requirements

### R1. Research & Requirements Document
Study `docs/MASTER_PROJECT_BRIEF.md` as the Source of Truth. Extract all requirements. Mark unknowns. Research all 7 subsidiary companies with source citations. Produce a structured Requirements Document.

### R2. Competitive Analysis
Analyze Cinnagen and ≥4 international benchmarks. Produce a Benchmark Matrix with WHY IT WORKS analysis for each. Distinguish what Rahnab should adopt vs. differentiate.

### R3. Architecture Planning
Propose an initial sitemap. Company section must be designed for future extensibility (adding more subsidiaries without restructuring). Identify all Entity types for future WordPress Content Model.

### R4. Risk & Gap Identification
Document all content gaps, open questions, client confirmations needed, and project risks before any design work begins.

---

## Prototype Phase Requirements (for future milestones)

When the team reaches the prototype phase:
- Use **GSAP** for all animations and scroll-based interactions
- Use **Tailwind CSS** for styling
- Any other library, icon pack, or snippet is permitted if it produces better results
- Pages required: Homepage · About · Companies Overview · Company Detail · News Listing · News Detail · Contact
- Must support RTL (Persian) and LTR (English) from ground up — not as afterthought
- Avoid: generic corporate templates · Bootstrap aesthetics · pharmaceutical blue clichés · stock photo overload · excessive glassmorphism · random animations · visual clutter

---

## WordPress Phase Requirements (for future milestones)

When the team reaches the WordPress phase:
- Read `.agents/skills/html-to-classic-wp/SKILL.md` before starting
- Custom WordPress Theme only — no page builders
- Reference all rules in `.agents/rules/` folder
- Custom Post Types needed (minimum): Company · News · Event · Achievement
- Full RTL/LTR support in theme

---

## Acceptance Criteria

### Milestone 0 — Research
- [ ] Requirements document is complete and structured, covering all sections from `MASTER_PROJECT_BRIEF.md`
- [ ] All 7 subsidiary companies have a verified entry with source URL, or are flagged `CLIENT CONFIRMATION REQUIRED` with explanation
- [ ] Content gaps clearly enumerated
- [ ] Benchmark matrix includes Cinnagen (deep analysis) + ≥4 international references
- [ ] Each benchmark entry includes a WHY IT WORKS explanation beyond visual description
- [ ] Initial sitemap proposed with extensibility rationale
- [ ] Risk list covers at minimum: content risks, design risks, technical risks, RTL/LTR risks
- [ ] Full milestone roadmap delivered

### Prototype Phase (future)
- [ ] All 7 pages implemented and navigable
- [ ] RTL Persian layout works correctly; LTR English toggle switches layout direction properly
- [ ] ≥5 meaningful motion/interaction patterns implemented (purposeful, not decorative)
- [ ] Responsive at 375px · 768px · 1440px
- [ ] No anti-patterns from brief Section 15 present in the design

### QA Phase (future)
- [ ] All CRITICAL issues resolved before WordPress phase
- [ ] QA report with severity matrix delivered
- [ ] WordPress architecture document delivered as structured artifact before implementation begins

## 2026-09-09T16:58:06Z

## Milestone 1 — شروع کن

### تصحیح مهم Subsidiary List

قبل از شروع Milestone 1، لیست شرکت‌های زیرمجموعه به‌روز شد:

**السلام حذف شد. جایگزین: آرک زیست آزما (Arc Zist Azma)**

لیست نهایی و قطعی ۷ شرکت:
1. Persis Gene (پرسیس ژن)
2. Nozhin Zist Pharmed (نوژین زیست فارمد) — National ID: 14012987472
3. Padra Serum Alborz (پادرا سرم البرز) — National ID: 14006664540, site: padraserum.com
4. KarayaKhteh / CARTIMED (کارا یاخته تجهیز آزما) — National ID: 14007103978
5. Tamin Plasma Nozhin (تأمین پلاسما نوژین) — National ID: 14012987472, site: tpnojine.com
6. Baya Zist Pharmed (بایا زیست فارمد) — National ID: 14010425772
7. **Arc Zist Azma (آرک زیست آزما)** — اولین آزمایشگاه کنترل کیفی فرآورده‌های بیولوژیک در ایران، دانش‌بنیان، تأسیس ۱۳۹۳، فعالیت از ۱۳۹۵، آزمایشگاه همکار سازمان غذا و دارو. ذکر شده در rahnab.com.

این تصحیح را در `02_SUBSIDIARY_RESEARCH.md` هم اعمال کن.

---

### Milestone 1: Information Architecture + WordPress CPT Model

**⚠️ هشدار مهم:** در این Milestone هیچ کد WordPress، هیچ theme، هیچ template PHP نوشته نمی‌شود. فقط Architecture Document تحویل داده می‌شود.

**Workflow اجباری پروژه:**
```
Research ✅ → Strategy → IA → UX → Art Direction → Design System → HTML/CSS/JS Prototype → Review → WP Architecture → Custom WP Theme → QA
```

**Milestone 1 deliverables:**

1. **Final Sitemap** — ساختار کامل سایت با URL structure لاتین، با در نظر گرفتن:
   - قابلیت افزودن شرکت‌های بیشتر در آینده بدون تغییر معماری
   - RTL/LTR routing strategy
   - News & Events taxonomy
   - Company detail pages

2. **Navigation Architecture** — header nav، footer nav، mobile nav، language switcher placement

3. **Content Hierarchy** — برای هر صفحه: اولویت‌بندی محتوا، content zones، data sources

4. **WordPress CPT Architecture Document** (فقط Document — بدون کد):
   - Custom Post Types مورد نیاز (Company، News، Event، Achievement، ...)
   - Taxonomies
   - Meta field structures برای هر CPT
   - Relationships بین CPTها
   - Template hierarchy پیشنهادی
   - Admin UX considerations

5. **User Flow Diagrams** — مسیرهای اصلی کاربر:
   - B2B visitor → Company discovery
   - Investor → Group overview
   - Press/Media → News
   - Partner → Contact

6. **IA Decision Log** — هر تصمیم معماری با دلیل ثبت شود

**Strategic context برای تیم:**
- مخاطب اصلی B2B (شرکت‌های دارویی، سرمایه‌گذاران، شرکای بالقوه)
- زنجیره ارزش عمودی ۷ شرکت باید در IA منعکس شود
- Homepage باید Corporate Story روایت کند نه grid کارت‌ها
- فارسی default (RTL)، انگلیسی secondary (LTR)

فایل‌های مرجع:
- `docs/MASTER_PROJECT_BRIEF.md`
- `.agents/orchestrator_m0/deliverables/` (همه deliverableهای Milestone 0)
- `.agents/rules/` (project rules)

## 2026-09-09T18:59:39Z

## دستور شروع فاز Milestone 2: UX Blueprint, Art Direction & Design System

کاربر درخواست داده است: «از جایی که متوقف شدی ادامه بده. به workflow اولیه پایبند باش».
طبق نقشه راه و فرآیند اجباری:
```
Research (M0) ✅ ──► Information Architecture (M1) ✅ ──► UX Blueprint, Art Direction & Design System (M2) ──► HTML/CSS/JS Prototype (M3) ──► ...
```

اکنون **Milestone 2** را با ساختار چندعاملی استاندارد آغاز کن.

---

### مرزها و محدودیت‌های قطعی Milestone 2 (Strict Boundaries)
1. **هیچ فایل قالب وردپرس (PHP/Theme) ایجاد نشود.**
2. **هیچ صفحه کامل HTML در این مرحله کدنویسی نشود** (کدنویسی Prototype کامل پس از تثبیت و تأیید دیزاین‌سیستم در Milestone 3 انجام خواهد شد). خروجی‌های این فاز مشخصات معماری، دیزاین‌سیستم، توکن‌ها و مستندات تعاملی هستند.
3. تمام شرکت‌های زیرمجموعه ۷ گانه تثبیت‌شده (با حضور قطعی شرکت «آرک زیست آزما» به جای السلام) مبنای طراحی قرار گیرند.

---

### خروجی‌های الزامی Milestone 2 (Deliverables Package):
پوشه خروجی‌ها: `.agents/orchestrator_m2/deliverables/`

1. **Deliverable 01: UX Blueprint & Corporate Narrative (`01_UX_BLUEPRINT.md`)**
   - پاسخ شفاف به ۸ پرسش استراتژیک صفحه اصلی:
     1. User sees what first?
     2. Brand promise چیست؟
     3. Corporate scale چگونه نمایش داده شود؟
     4. Companies چگونه معرفی شوند؟ (معرفی زنجیره ارزش زیستی پیوسته، نه کارتهای تکراری)
     5. Credibility و دستاوردها چگونه منتقل شوند؟
     6. News & Events چگونه به عنوان یک روایت پویا وارد Story شوند؟
     7. CTAهای اصلی و ثانویه چیستند؟
     8. User Pathways (مسیرهای هدایت کاربر پس از ورود)
   - آناتومی UX برای صفحات داخلی (About, Subsidiaries Overview, Company Profile, News, Contact).
   - تجربه کاربری اختصاصی برای Mobile و تبلت.
   - منطق تعاملی RTL و LTR.

2. **Deliverable 02: Creative Direction & Art Direction (`02_CREATIVE_DIRECTION.md`)**
   - هویت بصری Super Premium Life-Science Holding:
     - Confidence, Scientific Authority, Editorial Elegance, Dynamic Precision.
   - اجتناب مطلق از کلیشه‌های دارویی (Blue pharma cliché, Stock photo overload, excessive glassmorphism, random motion).
   - دو رویکرد رنگی پیشنهادی با پالت‌های دقیق و توجیه روانشناسی برند:
     - Direction A: Bio-Kinetic Deep Navy/Obsidian (`#030914`) + Kinetic Amber Accent (`#FD7702`)
     - Direction B: Clinical Sovereign Slate (`#0A0F1D`) + Clinical Emerald Accent (`#00A896`)
   - راهنمای عکاسی صنعتی، میکروسکوپی و Editorial Imagery.

3. **Deliverable 03: Master Design System & Design Tokens (`03_DESIGN_SYSTEM.md`)**
   - سیستم کامل Design Tokens برای RTL (فارسی) و LTR (انگلیسی):
     - **Typography:** جفت تایپ‌فیس فارسی (یکان‌بخ / پیدا) و انگلیسی (Euclid Circular A / Plus Jakarta Sans) با مقیاس Modular، x-height یکسان و وزن‌ها.
     - **Color Tokens:** Semantic, Surface, Text, Border, Accent, Status, Alpha channels.
     - **Spatial System:** 4px/8px Baseline grid, Containers (max-w 1600px), Logical Paddings/Margins.
     - **Elevation & Radius:** Micro-radius (sharp, high-end feel, نه لبه‌های گرد بیش‌ازحد).
     - **Component Specifications:** دکمه‌ها، کارت‌های اختصاصی هلدینگ، فرم‌های سازمانی، ماژول‌های آماری و اعتبارسنجی، فوتر و مگامنو.

4. **Deliverable 04: Tailwind CSS Tokens & Assets Blueprint (`04_TAILWIND_TOKENS_BLUEPRINT.md`)**
   - پیکربندی کامل و مستند `tailwind.config.js` با کلاس‌های utility سفارشی، متغیرهای CSS و RTL logical properties برای استفاده در Prototype فاز بعد.

5. **Deliverable 05: Motion & Interaction Language (`05_MOTION_INTERACTION_LANGUAGE.md`)**
   - سیستم انیمیشن و تعامل هدفمند (Purposeful Motion با GSAP):
     - Scroll-driven storytelling و timeline triggers.
     - Magnetic interactions، Typography reveals، Animated counters، و Micro-interactions.
     - قوانین Performance و Accessibility (prefers-reduced-motion).

6. **Deliverable 06: Design Decision Log & ADRs (`06_DESIGN_DECISION_LOG.md`)**
   - ثبت تصمیمات طبق فرمت `.agents/rules/decision-making.md` (گزینه ۱، گزینه ۲، مزایا، معایب، دلیل انتخاب).

7. **Index & Roadmap: (`INDEX.md`)**


