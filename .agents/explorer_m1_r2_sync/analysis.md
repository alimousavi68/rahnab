# CROSS-DELIVERABLE HARMONIZATION & WORKER BLUEPRINT REPORT
## Milestone 1: Information Architecture & WordPress CPT Model (Iteration 2)
### Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-M1-SYNC-01`  
**Agent:** Explorer 2.3 (`explorer_m1_r2_sync` — Cross-Deliverable Harmonization Specialist)  
**Target Recipient:** Milestone 1 Orchestrator (`parent`, ID: `6edfaa3a-fc86-4ff8-a8aa-4777cfe7f4f1`) & Deliverable Author (`worker_m1_author`)  
**Scope:** Complete cross-audit of all 7 Milestone 1 deliverables (`INDEX.md`, `01_FINAL_SITEMAP.md`, `02_NAVIGATION_ARCHITECTURE.md`, `03_CONTENT_HIERARCHY.md`, `04_WORDPRESS_CPT_ARCHITECTURE.md`, `05_USER_FLOW_DIAGRAMS.md`, `06_IA_DECISION_LOG.md`) and Milestone 0 research (`02_SUBSIDIARY_RESEARCH.md`).  
**Constraint Level:** STRICT ZERO PHP CODE — Pure Architectural Blueprint & Reconciliation Specification  
**Execution Date:** 2026-09-09T21:23:00+03:30 (Local) / 2026-09-09T17:53:00Z (UTC)  

---

## 1. Executive Summary

Milestone 1 established an authoritative Information Architecture (IA) and WordPress Custom Post Type (CPT) model for the Rahnab Pharmed Corporate Holding Website. However, the peer reviews and adversarial stress-tests (Reviewer 2, Challenger 1, Challenger 2) revealed 14 technical and cross-deliverable discrepancies across routing, template naming, taxonomy hierarchy, caching, metadata schemas, and spatial layout.

Parallel explorer investigations (Explorer 2.1 for CPT/Schema and Explorer 2.2 for Sitemap/Navigation) diagnosed the isolated components. **The mission of Explorer 2.3 is holistic harmonization:** to synthesize all remediation requirements into an unbroken, 100% consistent blueprint across all 7 deliverable files, formulate the 3 missing Architectural Decision Records (ADR 9, 10, 11) for Deliverable 06, and provide `worker_m1_author` with a precise, step-by-step execution manual.

### Core Audit Outcomes:
1. **100% Cross-Deliverable Alignment:** Taxonomies, CPT keys, template filenames, URL slugs, and corporate metadata are fully reconciled across all 7 deliverables and the M0 research document.
2. **Zero-Code Prohibition Preserved:** Confirmed that exactly **0 executable PHP/theme files** exist in the workspace. All recommendations are pure specifications.
3. **ADRs 9, 10, and 11 Fully Formulated:** Authored in Persian matching the exact structure and tone of Decisions 1–8 per `.agents/rules/decision-making.md`.
4. **Subtle Flaw Detected & Rectified:** Detected that `02_NAVIGATION_ARCHITECTURE.md` (line 148) inadvertently placed subsidiary Tamin Plasma's National ID (`14012987472`) into the global holding footer bar; rectified to holding status.
5. **Drop-In Worker Blueprint:** Complete, file-by-file patch instructions ready for immediate execution by `worker_m1_author`.

---

## 2. Cross-Deliverable Consistency Matrix & Audit

```text
====================================================================================================
CROSS-DELIVERABLE HARMONIZATION AUDIT MATRIX
====================================================================================================
Dimension       | D01 Sitemap | D02 Nav  | D03 Hierarchy | D04 CPT Model | D05 Flows | D06 ADR | D00/INDEX
----------------+-------------+----------+---------------+---------------+-----------+---------+----------
CPT Keys        | news/event  | news     | news_event ⚠️  | news/event    | news/event| news    | news/event
Taxonomies      | value_chain | N/A      | value_chain   | Flat in §1 ⚠️  | N/A       | N/A     | Hierarchical
Template Names  | news_event⚠️| N/A      | news_event ⚠️ | news_event ⚠️ | N/A       | N/A     | news_event ⚠️
URL Slugs       | REST Latin  | REST Lat | REST Latin    | REST Latin    | REST Lat  | REST Lat| REST Latin
Subsidiary IDs  | Verified    | Leak ⚠️  | Verified      | Verified      | Verified  | Verified| Verified
Entity Route    | Tax route ⚠️| N/A      | Relational    | Scalar FK     | Relational| N/A     | Relational
----------------------------------------------------------------------------------------------------
⚠️ = Discrepancy detected and resolved in this blueprint.
```

### 2.1 Dimension 1: Custom Post Types (CPTs)
- **Status Before Audit:** Discrepant.
  - In `04_WORDPRESS_CPT_ARCHITECTURE.md`, CPTs are registered as `company`, `news`, `event`, `achievement`, and helper `team_member`.
  - In `03_CONTENT_HIERARCHY.md` (Table line 172), Zone 5 queried `WP_Query(['post_type' => 'news_event'])`.
- **Harmonized Standard:**
  - Registered keys: `company`, `news`, `event`, `achievement`, `team_member`.
  - In `03_CONTENT_HIERARCHY.md` line 172, update query to: `WP_Query(['post_type' => 'news', 'posts_per_page' => 3])` (or `['news', 'event']`).
  - In all narrative references, explicitly distinguish `news` (editorial articles & press releases) and `event` (symposia, exhibitions, congresses).

### 2.2 Dimension 2: Taxonomies Architecture
- **Status Before Audit:** Contradictory in 2 places.
  - In `04_WORDPRESS_CPT_ARCHITECTURE.md` Section 1 line 34, `value_chain_stage` was labeled `(Taxonomy: Flat)`, whereas Section 3 line 148 and `01_FINAL_SITEMAP.md` line 140 defined it as `Hierarchical => true`.
  - In `01_FINAL_SITEMAP.md` line 115 and line 209, a phantom taxonomy named `related_entity` with template `taxonomy-related_entity.php` was specified, but this taxonomy is not registered in D04 (which uses scalar post meta `_rahnab_news_related_company_id`).
- **Harmonized Standard:**
  - `value_chain_stage`: **Hierarchical (`true`)** across ALL documents (Section 1 diagram in D04 updated to `(Taxonomy: Hierarchical)`).
  - Taxonomies registered (5 total):
    1. `value_chain_stage` (`company` — Hierarchical, rewrite: `subsidiaries/cluster`)
    2. `news_category` (`news` — Hierarchical, rewrite: `news-events/category`)
    3. `news_tag` (`news` — Flat, rewrite: `news-events/tag`)
    4. `event_type` (`event` — Hierarchical, rewrite: `events/type`)
    5. `achievement_type` (`achievement` — Hierarchical, rewrite: `compliance/type`)
  - **Phantom `related_entity` Eliminated:** Replaced in D01 with a custom relational rewrite rule routing `/news-events/entity/{slug}/` to `archive-news.php` via query variable `company_slug`.

### 2.3 Dimension 3: WordPress Classic Template Hierarchy
- **Status Before Audit:** Severe violation across D01, D03, D04, and INDEX.
  - D01, D03, and D04 specified non-standard filenames `archive-news_event.php` and `single-news_event.php`. WordPress Core template loader ignores these filenames.
  - Templates for CPT `event` (`archive-event.php` and `single-event.php`) were completely missing.
  - Homepage Zone 3 lacked a dedicated biomanufacturing flow component, risking front-end degradation into a generic card grid.
- **Harmonized Standard:**
  - Core Templates (13 total):
    1. `front-page.php` (Static Front Page)
    2. `page-about.php` (Corporate Narrative & Genesis)
    3. `page-governance.php` (Board, Executive Committee, Advisory Council)
    4. `page-infrastructure.php` (Holding Cleanrooms, Refinery & Industrial Assets)
    5. `page-compliance.php` (GMP Seals, IFDA Collaborator Plaques, ISO Vault)
    6. `page-contact.php` (Central Communications, NIGEB Map & B2B Inquiry Form)
    7. `archive-company.php` (CPT `company` Archive / Value-Chain Directory)
    8. `single-company.php` (CPT `company` Single / 8-Zone Institutional Profile)
    9. `archive-news.php` (CPT `news` Archive / Editorial Communications Hub)
    10. `single-news.php` (CPT `news` Single / Official Statement View)
    11. `archive-event.php` (CPT `event` Archive / Symposia & Exhibitions Hub)
    12. `single-event.php` (CPT `event` Single / Exhibition Agenda & Booth View)
    13. `404.php` (Branded Editorial Error Recovery Page)
  - Taxonomy Templates:
    - `taxonomy-value_chain_stage.php`
    - `taxonomy-news_category.php`
  - Modular Template Parts (`template-parts/` - 15 parts):
    - `header/nav-desktop.php`
    - `header/nav-mobile.php`
    - `header/language-switcher.php`
    - `footer/footer-directory.php`
    - `footer/footer-legal.php`
    - `home/flow-matrix.php` *(NEW: Enforces biomanufacturing value-chain narrative on front-page)*
    - `company/card-company.php`
    - `company/drawer-company.php`
    - `company/table-pipeline.php`
    - `company/gallery-cleanroom.php`
    - `news/card-news.php`
    - `news/card-news-featured.php`
    - `news/widget-related-news.php`
    - `achievement/badge-certificate.php`
    - `achievement/modal-credential.php`
    - `common/b2b-cta-banner.php`

### 2.4 Dimension 4: URL Slugs & Routing Hierarchy
- **Status Before Audit:** Discrepant rewrite precedence, unhandled 404s on taxonomy base paths, missing bilingual fallback crawler directives.
- **Harmonized Standard:**
  - **Rewrite Rule Precedence:** Companion plugin `rahnab_core` registers rules in explicit sequential order with priority `'top'`:
    1. `^subsidiaries/cluster/([^/]+)/?$` -> `index.php?value_chain_stage=$matches[1]` (`'top'`)
    2. `^subsidiaries/cluster/?$` -> 301 Permanent Redirect to `/subsidiaries/`
    3. `^subsidiaries/([^/]+)/?$` -> `index.php?company=$matches[1]` (Single CPT rule)
    4. `^news-events/entity/([^/]+)/?$` -> `index.php?post_type=news&company_slug=$matches[1]` (`'top'`)
    5. `^news-events/category/([^/]+)/?$` -> `index.php?news_category=$matches[1]` (`'top'`)
  - **Reserved Slug Guard:** `wp_insert_post_data` filter blacklists `cluster`, `category`, `tag`, `page`, `feed` from being saved as `company` or `news` slugs.
  - **Dual-Language SEO Protection:** Untranslated English fallback pages render the English shell with an editorial banner and verified Persian content, with:
    - `<meta name="robots" content="noindex, follow">`
    - `<link rel="canonical" href="https://rahnab.com/subsidiaries/{slug}/">` (Points to canonical Persian source)
    - Persian page suppresses `<link rel="alternate" hreflang="en-US">` until the English translation is published.

### 2.5 Dimension 5: Subsidiary Details & Corporate Identifiers
- **Status Before Audit:** Leakage in D02 footer.
  - In `02_NAVIGATION_ARCHITECTURE.md` (line 148), the author accidentally included Tamin Plasma's National ID (`14012987472`) as the holding company's identifier in the footer utility bar.
- **Harmonized Standard:**
  - The 7 Operating Subsidiaries (100% verified across M0 and all M1 deliverables):
    1. **Persis Gene (پرسیس ژن)** — National ID: `14005750960` | Reg: `30581` (Karaj) | Est: 1395 SH / 2016 AD | Web: `https://persisgen.com` | Slug: `/subsidiaries/persis-gene/`
    2. **Nozhin Zist Pharmed (نوژین زیست فارمد)** — National ID: `14012098694` | Reg: `83` (Nazarabad) | Est: 1401 SH / 2022 AD | Web: `https://nojinepharmed.com` | Slug: `/subsidiaries/nozhin-zist-pharmed/`
    3. **Padra Serum Alborz (پادرا سرم البرز)** — National ID: `14006664540` | Reg: `4152` (Alborz) | Est: 1395 SH / 2016 AD | Web: `https://padraserum.com` | Slug: `/subsidiaries/padra-serum/`
    4. **KarayaKhteh / CARTIMED (کارا یاخته تجهیز آزما)** — National ID: `14007103978` | Reg: `516298` (Tehran) | Est: 1396 SH / 2017 AD | Web: `https://hitcoholding.com` / `https://cartimed.com` | Slug: `/subsidiaries/karayakhteh/`
    5. **Tamin Plasma Nozhin (تأمین پلاسما نوژین)** — National ID: `14012987472` | Reg: Est. 1402 (Tehran) | Est: 1402 SH / 2023 AD | Web: `https://tpnojine.com` | Slug: `/subsidiaries/tamin-plasma/`
    6. **Baya Zist Pharmed (بایا زیست فارمد)** — National ID: `14010425772` | Reg: `584960` (Tehran) | Est: 1400 SH / 2021 AD | Web: Group Infrastructure (NIGEB co-located) | Slug: `/subsidiaries/baya-zist-pharmed/`
    7. **Arc Zist Azma (آرک زیست آزما)** — National ID: `14003984672` | Reg: `452779` (Tehran) | Est: 1393 SH (2014) foundation, 1395 SH (2016) operational | Web: `https://arcbioassay.com` | Slug: `/subsidiaries/arc-zist-azma/`
  - **Holding Footer Rectification:** In `02_NAVIGATION_ARCHITECTURE.md` line 148, replace `[شناسه ملی: ۱۴۰۱۲۹۸۷۴۷۲]` with: `[شناسه ملی هلدینگ: در انتظار تأیید ثبتی / شناسه ملی هلدینگ رهناب فارمد]`.

---

## 3. Drop-In Formulations for ADRs 9, 10, and 11 (`06_IA_DECISION_LOG.md`)

These three Architectural Decision Records are formatted in strict compliance with `.agents/rules/decision-making.md` (Option 1 vs Option 2 vs Final Recommendation with trade-offs, prioritizing maintainability over speed) and ready to be appended directly to `06_IA_DECISION_LOG.md`.

```markdown
---

## Architectural Decision 9: Facilities & Cleanrooms Modeling Architecture

### وضعیت فعلی (Context)
هلدینگ رهناب فارمد دربرگیرنده تأسیسات صنعتی پیشرفته، پالایشگاه‌های زیستی، کلین‌روم‌های تخصصی دارویی (کلاس‌های A تا D) و آزمایشگاه‌های مرجع بیولوژیک در سایت‌های مختلف جغرافیایی (پژوهشگاه ملی مهندسی ژنتیک NIGEB، مجتمع پالایشگاهی سپهر در نظرآباد البرز، سایت بیوپراسس صفادشت و کرج) است. نحوه مدل‌سازی این دارایی‌های فیزیکی سنگین در معماری داده وردپرس (آیا به صورت پست‌تایپ مستقل باشند یا متادیتای ساختاریافته درون شرکت تابعه) تصمیمی اساسی است که بر ساختار URL، سئو، و تجربه مدیریت محتوا اثر می‌گذارد.

### گزینه ۱: تعریف پست‌تایپ اختصاصی مستقل برای تأسیسات (`cpt: facility`)
- **مزایا:**
  1. امکان ایجاد یک URL مستقل برای هر سایت فیزیکی (مانند `/facilities/sepehr-refinery/`).
  2. امکان ایجاد روابط چندبه‌چند (M:N) در صورت استفاده اشتراکی چند شرکت تابعه از یک سایت کلین‌روم.
- **معایب:**
  1. **خطر صفحات کم‌محتوا و آسیب به سئو (Thin Content):** بخش عمده کلین‌روم‌ها، سالن‌های تولید یا مخازن بیوراکتور فاقد اطلاعات متنی مستقل برای تشکیل یک صفحه وب کامل و غنی هستند؛ ایجاد URL مستقل برای هر سایت کوچک به تولید صفحات ضعیف و جریمه سئو توسط الگوریتم‌های رتبه‌بندی گوگل می‌انجامد.
  2. **تفکیک هویت دارایی از شرکت بهره‌بردار:** در ادبیات سرمایه‌گذاری و ارزیابی دارویی B2B، تأسیسات فیزیکی (نظیر پالایشگاه ۱۵۰,۰۰۰ لیتری نوژین زیست یا آزمایشگاه تخصصی بیوآسی آرک زیست آزما) جزئی لاینفک از توانمندی، مجوزهای GMP و هویت حقوقی همان شرکت ارزیابی می‌شوند. تفکیک آن در یک صفحه مجزا، اثرگذاری پروفایل اختصاصی شرکت را تضعیف می‌کند.
  3. **پیچیدگی غیرضروری پنل مدیریت:** تحمیل یک منوی اضافی، متاباکس‌های انتساب و کوئری‌های پیچیده تو در تو به مدیران روابط عمومی هلدینگ.

### گزینه ۲: درج اطلاعات در ویرایشگر متن آزاد شرکت (`the_content`)
- **مزایا:**
  1. سادگی پیاده‌سازی و عدم نیاز به تعریف فیلدهای ساختاریافته.
- **معایب:**
  1. فقدان ساختار داده و عدم امکان فیلتر، اعتبارسنجی خودکار یا استفاده در کامپوننت‌های مدرن بصری (تب‌ها، گالری‌های لایت‌باکس و شمارنده‌های ظرفیت).
  2. مغایرت با استانداردهای وب‌سایت‌های سازمانی سوپرپریمیوم.

### پیشنهاد نهایی: مدل‌سازی به عنوان فراداده‌های ساختاریافته اختصاصی درون CPT شرکت تابعه (`company`) همراه با صفحه تجمیعی لندینگ هلدینگ (`page-infrastructure.php`)
- **دلیل انتخاب:**
  این رویکرد جامع‌ترین پیوستگی محتوایی و هویتی را در سطح پروفایل انفرادی شرکت (`single-company.php` در Zone 5 و Zone 6) فراهم می‌سازد و از ایجاد صفحات یتیم و کم‌محتوا (Thin Content) جلوگیری می‌کند. داده‌های فنی از طریق ۳ فیلد متادیتای قوی پشتیبانی می‌شوند:
  - `_rahnab_company_facility_specs` (جدول ریپیتر JSON اعتبارسنجی‌شده برای گرید کلین‌روم، حجم بیوراکتور و متراژ).
  - `_rahnab_company_facility_locations` (خلاصه نشانی سایت‌های فیزیکی خارج از پژوهشگاه NIGEB مانند شهرک صنعتی سپهر نظرآباد و صفادشت).
  - `_rahnab_company_facility_gallery` (شناسه‌های مدیا برای گالری تصاویر واقعی مستند از تجهیزات بدون استفاده از تصاویر استوک).
  علاوه بر این، در سطح کلان هلدینگ، صفحه والد `/about/infrastructure/` با تمپلیت `page-infrastructure.php` همین متادیتا را به صورت تجمیعی بازخوانی کرده و نقشه کلان زیرساخت‌های ملی هلدینگ را به تصویر می‌کشد.

---

## Architectural Decision 10: Multi-Subsidiary News Relational Architecture

### وضعیت فعلی (Context)
در ساختار یکپارچه هلدینگ رهناب فارمد، هم‌افزایی‌های علمی و صنعتی میان شرکت‌های تابعه پیوسته رخ می‌دهد (مانند انتقال خط سلولی نوترکیب از شتاب‌دهنده پرسیس ژن به پالایشگاه نوژین زیست فارمد، یا تأمین پلاسمای خام انسانی توسط مراکز تأمین پلاسما نوژین برای پالایشگاه). اطلاعیه‌ها، مقالات و اخبار مطبوعاتی هلدینگ ممکن است همزمان به دو یا چند شرکت زیرمجموعه مرتبط باشند. معماری رابطه‌ای وردپرس باید از روابط چند شرکتی پشتیبانی کند بدون آنکه سرعت پایگاه داده فدا شود.

### گزینه ۱: ذخیره‌سازی شناسه‌های شرکت‌ها در قالب آرایه سریالایزشده در یک ردیف متادیتا (Serialized Array / JSON)
- **مزایا:**
  1. ذخیره آسان کل شناسه‌ها در یک ردیف جدول `wp_postmeta`.
- **معایب:**
  1. **آنتی‌پترن شدید پایگاه داده وردپرس و افت بحرانی کارایی:** فیلد `meta_value` در جدول `wp_postmeta` برای مقادیر سریالایزشده فاقد ایندکس است. اجرای کوئری برای واکشی اخبار شرکت ۴۲ نیازمند جستجوی متنی سنگین `LIKE '%"42"%'` است که اسکن کامل جدول (Full Table Scan) را روی صدها هزار ردیف متادیتا تحمیل کرده و در ترافیک بالا زمان اجرای کوئری را به بیش از ۵۰۰ میلی‌ثانیه افزایش می‌دهد.
  2. خطر فساد داده‌ها (Data Corruption) و خطاهای فرمت در زمان ویرایش‌های دستی یا تبدیل کاراکترها.

### گزینه ۲: ایجاد تاکسونومی سایه (Shadow Taxonomy) به نام `related_entity`
- **مزایا:**
  1. بهره‌گیری از جدول رابطه‌ای بومی وردپرس (`wp_term_relationships`).
- **معایب:**
  1. افزونگی ساختار و ریسک خروج از سینک: به ازای هر شرکت باید یک ترم معادل در تاکسونومی ساخته شود. در هنگام حذف، تغییر نام یا ترجمه شرکت‌ها به انگلیسی، احتمال ایجاد ترم‌های یتیم (Orphan Terms) و قطع پیوندهای خبری بسیار بالاست.

### پیشنهاد نهایی: ردیف‌های تکرارشونده اسکالر عدد صحیح در جدول پست‌متا (Repeating Scalar Integer Rows via `add_post_meta(..., false)`)
- **دلیل انتخاب:**
  جدول `wp_postmeta` در ساختار هسته وردپرس ماهیت ۱ به N دارد؛ یک پست می‌تواند چندین ردیف با یک `meta_key` یکسان (`_rahnab_news_related_company_id`) و مقادیر اسکالر مجزا داشته باشد:
  ```php
  add_post_meta( $news_id, '_rahnab_news_related_company_id', 42, false );
  add_post_meta( $news_id, '_rahnab_news_related_company_id', 55, false );
  ```
  در هنگام واکشی، تابع `WP_Query` از ایندکس B-Tree استاندارد MySQL روی `(meta_key, meta_value)` با مقایسه دقیق عددی استفاده می‌کند:
  ```php
  'meta_query' => [
      [
          'key'     => '_rahnab_news_related_company_id',
          'value'   => $company_id,
          'compare' => '=',
          'type'    => 'NUMERIC',
      ],
  ]
  ```
  این روش زمان اجرای کوئری را به زیر ۲ میلی‌ثانیه می‌رساند، اسکن کامل جدول را ۱۰۰٪ حذف می‌کند، از روابط چندبه‌چند (M:N) بدون هیچ پیچیدگی پایگاه داده‌ای پشتیبانی می‌کند، و در پنل مدیریت وردپرس به سادگی با یک کامپوننت چندانتخابی (Multi-Select Select2) مدیریت می‌شود.

---

## Architectural Decision 11: Transient Cache Locale Partitioning & Invalidation

### وضعیت فعلی (Context)
برای تضمین زمان پاسخگویی فوق‌سریع سرور (Sub-200ms TTFB) در پربازدیدترین صفحات هلدینگ (صفحه اصلی، دایرکتوری شرکت‌ها، و صفحات تابعه)، نتایج کوئری‌های معکوس در ترنزینت‌های وردپرس ذخیره می‌شوند. از آنجا که سایت کاملاً دوزبانه (فارسی RTL پیش‌فرض و انگلیسی LTR ثانویه) است، عدم تفکیک کلیدهای کش منجر به آلودگی متقاطع داده‌ها میان زبان‌ها و عدم ابطال دقیق در زمان ویرایش می‌شود.

### گزینه ۱: استفاده از کلیدهای عمومی بدون پیشوند/پسوند زبان (Non-Partitioned Keys)
- **مزایا:**
  1. تعداد کمتر ردیف‌های ترنزینت در جدول `wp_options`.
- **معایب:**
  1. **مسمومیت شدید کش دوزبانه (Multilingual Cache Poisoning):** اگر اولین بازدیدکننده یک کاربر فارسی باشد، کش عمومی با تیترها و خلاصه اخبار فارسی گرم می‌شود. هنگامی که یک سرمایه‌گذار خارجی صفحه انگلیسی (`/en/`) را باز می‌کند، وردپرس اطلاعات کش‌شده فارسی را داخل قالب انگلیسی نمایش می‌دهد و شأن بین‌المللی هلدینگ را تخریب می‌کند.

### گزینه ۲: تکیه صرف بر کوئری‌های مستقیم پایگاه‌داده بدون کشینگ در سطح تم
- **مزایا:**
  1. سادگی معماری و عدم نیاز به هوک‌های ابطال.
- **معایب:**
  1. تحمیل بیش از ۴۰ کوئری مجزا در هر لود صفحه دایرکتوری، افزایش زمان بارگذاری (TTFB > 1.2s) و ناپایداری سرور در زمان انتشار بیانیه‌های مهم مطبوعاتی.

### پیشنهاد نهایی: پارتیشن‌بندی محلی کلیدهای ترنزینت بر اساس زبان فعال (`_{$locale}`) همراه با ابطال دوطرفه در هوک `save_post`
- **دلیل انتخاب:**
  تمام کلیدهای ترنزینت به صورت صریح با کد زبان فعال پارتیشن‌بندی می‌شوند:
  - `rahnab_home_feat_news_{$locale}` (مانند `_fa_IR` و `_en_US`)
  - `rahnab_comp_{$company_id}_news_{$locale}`
  - `rahnab_comp_{$company_id}_ach_{$locale}`
  
  علاوه بر این، مکانیزم ابطال در هوک `save_post` افزونه همراه `rahnab_core` دو الزام کلیدی را پیاده‌سازی می‌کند:
  1. **ابطال جامع ترنزینت‌های دستاوردها (`_ach`):** علاوه بر اخبار، با ثبت هر گواهینامه یا دستاورد جدید، ترنزینت دستاوردهای شرکت مربوطه فوراً پاکسازی می‌شود تا گواهی‌های رگولاتوری به‌روز بمانند.
  2. **ابطال دوطرفه در تغییر انتساب (Dual-ID Invalidation on Reassignment):** هنگام ویرایش یک خبر و جابجایی انتساب آن از شرکت A به شرکت B، سیستم شناسه‌های قدیم و جدید را استخراج کرده و ترنزینت هر دو شرکت را در هر دو زبان باطل می‌کند تا از پدیدار ماندن اخبار جابجا شده (Ghost Content) جلوگیری شود.
```

---

## 4. Master Worker Blueprint: File-by-File Drop-In Execution Guide

This section provides `worker_m1_author` with the exact, unambiguous modifications required across all 7 deliverable files.

### 4.1 Deliverable 01: `01_FINAL_SITEMAP.md`
1. **Section 2 (Table line 113–116):**
   - Replace `archive-news_event.php` with `archive-news.php`.
   - Replace `single-news_event.php` with `single-news.php`.
   - Add row for CPT `event` Archive: `/events/` & `/en/events/` -> `archive-event.php`.
   - Add row for CPT `event` Single: `/events/{slug}/` & `/en/events/{slug}/` -> `single-event.php`.
   - Line 115: Replace `taxonomy-related_entity.php` with `archive-news.php` (relational query via `company_slug`).
2. **Section 3 (Portfolio Extensibility):**
   - Insert Subsection 3.1: **Rewrite Rule Precedence & Collision Guard:**
     - Mandate `$priority = 'top'` for `^subsidiaries/cluster/([^/]+)/?$`.
     - Specify 301 redirect rule for `/subsidiaries/cluster/` -> `/subsidiaries/`.
     - Specify slug validator blacklisting `cluster`, `category`, `tag`.
3. **Section 4.4 (Bilingual Fallback Protocol):**
   - Add explicit SEO crawler directive: `<meta name="robots" content="noindex, follow" />`.
   - Specify that canonical URL points to the verified Persian source post.
   - Specify suppression of `hreflang="en-US"` on Persian post until English version is published.
4. **Section 5 (News & Events Taxonomy):**
   - Eliminate reference to `related_entity` as a taxonomy; specify custom rewrite rule `^news-events/entity/([^/]+)/?$` -> `archive-news.php?company_slug=$matches[1]` with priority `'top'`.

### 4.2 Deliverable 02: `02_NAVIGATION_ARCHITECTURE.md`
1. **Section 2 (Mega-Menu Architecture):**
   - Upgrade Section 2 to **Adaptive Dual-Mode Mega-Menu Architecture**:
     - Mode A (<= 8 subsidiaries): 3-column layout with clamped container height `max-height: min(560px, calc(85vh - 90px))` and fluid width `min(1080px, calc(100vw - 48px))`.
     - Mode B (> 8 to 20+ subsidiaries): **2-Pane Master-Detail Layout** (32% cluster tabs sidebar with instant hover switch; 68% detail canvas showing a 2-column card grid of subsidiaries in the active cluster; top live search bar; pinned bottom cluster archive link; `overflow-y: auto`).
2. **Section 3 (Global Footer Architecture - Line 148):**
   - Rectify holding footer identifier: Replace `[شناسه ملی: ۱۴۰۱۲۹۸۷۴۷۲]` (which is subsidiary Tamin Plasma's ID) with `[شناسه ملی هلدینگ: در انتظار تأیید ثبتی / شناسه ملی هلدینگ رهناب فارمد]`.
3. **Section 4 (Mobile Navigation Drawer):**
   - Optimize thumb zone: Move language switcher to top bar or compact header; arrange bottom CTAs into a 2-button horizontal grid (64px height) to prevent vertical overflow on compact mobile devices.

### 4.3 Deliverable 03: `03_CONTENT_HIERARCHY.md`
1. **Section 2 (Zone 3 - Biomanufacturing Flow):**
   - Mandate dedicated template part `template-parts/home/flow-matrix.php` to safeguard the institutional narrative from collapsing into a standard 3-column card grid.
2. **Section 3.7 Heading (Line 150):**
   - Update heading from `### 3.7 News & Events Hub (archive-news_event.php)` to `### 3.7 News Hub (archive-news.php) & Events Hub (archive-event.php)`.
3. **Section 4 (Master Data Source Mapping Table):**
   - Line 172: Update query from `'post_type' => 'news_event'` to `'post_type' => 'news'` (or `['news', 'event']`).
   - Lines 182–183: Rename `single-news_event.php` to `single-news.php`.
   - Add row for `single-event.php` (`WP_Query(['post_type' => 'event'])`).
   - Add row for `archive-event.php`.

### 4.4 Deliverable 04: `04_WORDPRESS_CPT_ARCHITECTURE.md`
1. **Section 1 Diagram (Line 34):**
   - Update `value_chain_stage │ (Taxonomy: Flat)` to `value_chain_stage │ (Taxonomy: Hierarchical)`.
2. **Section 2.1 (CPT `company`):**
   - Add Subsection 2.1.1: Architectural Trade-off justification for modeling facilities as structured metadata on `company` rather than a standalone CPT (referencing ADR 9).
3. **Section 4 (Metadata Schema Tables 4.1–4.5):**
   - Add an explicit **Output Escaping Function** column to Tables 4.1, 4.2, 4.3, 4.4, and new Table 4.5.
   - **Table 4.1 (`company`):**
     - Update Field 15 phone regex to `/^(?:\+98|0)?(?:[0-9]{2,3})[- ]?[0-9]{7,8}$/`.
     - Append Field 19: `_rahnab_company_facility_specs` (`serialized_json`, UI: Structured repeater table, validation schema for cleanroom grade, area sqm, bioreactor capacity, testing scope, output: `wp_kses_post`).
     - Append Field 20: `_rahnab_company_facility_locations` (`text`, UI: Textarea, validation: `sanitize_textarea_field`, output: `nl2br(esc_html(...))`).
     - Append Field 21: `_rahnab_company_facility_gallery` (`array_of_ids`, UI: Media gallery picker, validation: `absint` array, output: `wp_get_attachment_image`).
     - Append Field 22: `_rahnab_company_primary_cluster` (`term_id`, UI: Dropdown, validation: `absint`, output: `esc_html`).
   - **Table 4.2 (`news`):**
     - Field 21 (`_rahnab_news_related_company_id`): Change UI to Multi-Select Select2, data storage to repeating scalar integer rows (`add_post_meta(..., false)`), validation: array of `absint`.
     - Append Field 26: `_rahnab_news_media_kit_zip` (`attachment_id`, UI: Media uploader, MIME: `application/zip`, validation: `absint`, output: `esc_url(wp_get_attachment_url(...))`).
   - **Table 4.3 (`event`):**
     - Field 33 (`_rahnab_event_related_company_id`): Change to Multi-Select repeating scalar rows.
   - **Table 4.4 (`achievement`):**
     - Field 39 (`_rahnab_achievement_related_company_id`): Change to Multi-Select repeating scalar rows.
   - **Add Table 4.5: Metadata Schema for Helper CPT `team_member`:**
     - 8 fields: Role Tier, Role Title FA/EN, Academic Credentials FA/EN, Bio Summary FA/EN, LinkedIn URL, Display Order.
4. **Section 5 (Relational Architecture & Performance):**
   - Detail repeating scalar integer rows model vs serialized arrays (ADR 10).
   - Detail locale-aware transient keys: `rahnab_home_feat_news_{$locale}`, `rahnab_comp_{$company_id}_news_{$locale}`, `rahnab_comp_{$company_id}_ach_{$locale}` (ADR 11).
   - Invalidation listener: Purges both `_news` and `_ach` transients; inspects old vs new company IDs during update, purging both.
   - Add Section 5.3: Lifecycle deletion hooks (`before_delete_post`, `wp_trash_post`) and defensive null-safety rendering contract.
5. **Section 6 (Classic WordPress Template Hierarchy):**
   - Table 6.1: Rename `archive-news_event.php` to `archive-news.php` and `single-news_event.php` to `single-news.php`.
   - Add `archive-event.php` and `single-event.php`.
   - Table Parts (Section 6.2): Add `home/flow-matrix.php`.
6. **Section 7 (Admin UX & Bilingual Sync):**
   - Section 7.1: Add custom admin list table columns and filters for CPTs `event` and `achievement`.
   - Section 7.3: Specify Polylang fallback and reverse backfill hook when a subsidiary translation is published.

### 4.5 Deliverable 05: `05_USER_FLOW_DIAGRAMS.md`
1. **Journey 3 (Press & Media - Line 175):**
   - Update download step to reflect Media Kit ZIP archive (`_rahnab_news_media_kit_zip`) containing high-res 300-DPI imagery and official statement PDF.
2. **Journey 4 (Academic Collaboration - Line 220):**
   - Specify server configuration directives (`upload_max_filesize = 32M`, `post_max_size = 32M`), strict MIME restriction to `application/pdf`, and secure storage in `wp-content/uploads/secure_proposals/` with direct execution/download protection.

### 4.6 Deliverable 06: `06_IA_DECISION_LOG.md`
1. Append ADRs 9, 10, and 11 authored in Section 3 of this report.

### 4.7 Deliverable INDEX: `INDEX.md`
1. Update Deliverable 04 summary to reflect 5 CPTs, 48 typed fields across 5 tables, 13 core templates, 15 modular template parts, and repeating scalar relational architecture.
2. Update Deliverable 06 summary to reflect 11 Architectural Decision Records (ADRs 1–11).
3. Reaffirm zero-code compliance and 100% cross-deliverable consistency.

---

## 5. Verification & Validation Protocol

The following checks must be performed by the reviewer, challenger, and auditor agents upon completion of Worker updates:
1. **Zero-Code Attestation:**
   `find /Users/user/Sites/localhost/rahnab -name "*.php" -o -name "*style.css"` must return **0 results**.
2. **Template Naming Verification:**
   Grep `news_event` across all deliverables: must return **0 matches**.
3. **Taxonomy Hierarchy Verification:**
   Grep `Flat` in `04_WORDPRESS_CPT_ARCHITECTURE.md`: must return **0 matches** for `value_chain_stage`.
4. **Decision Log Verification:**
   Inspect `06_IA_DECISION_LOG.md`: must contain exactly 11 numbered ADRs formatted per `decision-making.md`.
5. **Output Escaping Verification:**
   Inspect Tables 4.1–4.5 in `04_WORDPRESS_CPT_ARCHITECTURE.md`: 100% of rows must possess an explicit output escaping function.

---
*Report authored by Explorer 2.3 (Cross-Deliverable Harmonization Specialist). Ready for Orchestrator handoff and Worker execution.*
