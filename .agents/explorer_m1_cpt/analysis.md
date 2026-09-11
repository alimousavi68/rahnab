# WordPress CPT Model & Data Architecture Specification
## Rahnab Pharmed Biopharmaceutical Holding Corporate Website

**Document ID:** `RAHNAB-ARCH-M1-CPT-001`  
**Classification:** Enterprise Life-Science WordPress Architectural Specification  
**Scope:** Milestone 1 — Data Modeling, Taxonomies, Metadata Schemas, Relationships, Template Hierarchy, and Admin UX  
**Author:** Explorer 3 (WordPress CPT Modeler / IA Strategist)  
**Target Milestone:** M1 (Architecture) -> M2 (Implementation Blueprint)  
**Constraint Level:** STRICTLY NO SOURCE CODE (Pure Architectural Specification)

---

## Executive Summary

This document establishes the comprehensive data and entity architecture for the Rahnab Pharmed Corporate Website (`rahnab.com`). The holding encompasses seven specialized biopharmaceutical enterprises operating across an integrated life-science value chain (R&D incubation, cell therapy, biomanufacturing, plasma fractionation, therapeutic sera, and biological quality control).

To reflect this industrial scale, establish sovereign scientific credibility, and preserve high performance on Classic WordPress, the content architecture separates presentational themes from underlying data entities, establishing robust Custom Post Types (CPTs), hierarchical taxonomies, strictly typed metadata schemas, and cached bidirectional relationships.

---

## 1. Custom Post Types (CPT) Architecture

### 1.1 Architectural Decision: Entity Isolation Strategy
In corporate life-science websites, conflating disparate business domains into native WordPress posts or generic pages leads to content entropy, security vulnerabilities, and brittle templating.

```
┌─────────────────────────────────────────────────────────────────────────┐
│                     RAHNAB HOLDING CONTENT UNIVERSE                     │
├───────────────────┬───────────────────┬────────────────┬────────────────┤
│    ENTERPRISES    │    PRESS & MEDIA  │     EVENTS     │  CREDENTIALS   │
│   (CPT: company)  │    (CPT: news)    │  (CPT: event)  │(CPT:achievement│
├───────────────────┼───────────────────┼────────────────┼────────────────┤
│ 7 Subsidiaries    │ Corporate PR      │ Symposia       │ GMP / IFDA     │
│ Future Ventures   │ Subsidiary News   │ Conferences    │ Patents        │
│ Scale Facilities  │ Media Kit Releases│ Exhibitions    │ Knowledge-Based│
└───────────────────┴───────────────────┴────────────────┴────────────────┘
```

#### Decision Matrix: Helper Entities (CPTs vs Post Meta)
*Evaluated per Project Decision Making Rules:*

##### A. Governance / Board Members (`executive_member`)
- **Option 1: Dedicated Public CPT (`executive_member`)**
  - *Pros:* Independent permalinks for each board member; reusable across holding and subsidiary pages.
  - *Cons:* Over-engineering. High-level executives at an Iranian holding do not require individual public URLs, and orphan profile pages create crawl debt.
- **Option 2: Private Helper CPT (`team_member` with `publicly_queryable => false`)**
  - *Pros:* Structured admin editing, native drag-and-drop menu reordering (`menu_order`), Polylang bilingual pairing, and zero public URL footprint.
  - *Cons:* Requires registering a post type.
- **Option 3: Hardcoded Page Meta or Gutenberg Block Pattern**
  - *Pros:* Zero post types.
  - *Cons:* Extremely fragile; difficult to synchronize across Persian and English locales without manual re-entry.
- **Final Recommendation:** **Option 2 (Private Helper CPT `team_member`)**. It delivers structured, queryable governance records for the About page without polluting the public URL space.

##### B. Industrial Facilities & Laboratories (`facility`)
- **Option 1: Dedicated CPT (`facility`)**
  - *Pros:* Standalone pages for cleanrooms and fractionation towers.
  - *Cons:* Dilutes brand focus; users and B2B partners evaluate the operating *company*, not detached rooms.
- **Option 2: Structured Metadata Repeater Schema embedded within `company`**
  - *Pros:* Tightly binds physical infrastructure (cleanroom classification, bioreactor capacity, location) to the responsible legal entity. Intuitive for editors.
  - *Cons:* Cannot be directly queried as independent top-level posts.
- **Final Recommendation:** **Option 2 (Structured Metadata Schema embedded in `company`)**. Cleanrooms, labs, and plants are core enterprise assets that should be showcased directly on the subsidiary profile.

---

### 1.2 Exhaustive CPT Specifications

#### 1.2.1 `company` (Operating Subsidiary / Venture)
The primary business entity representing the 7 operating ventures and future additions.

| Specification Parameter | Formal Definition / Value |
|:---|:---|
| **Internal Post Type Key** | `company` (Registered via Companion Plugin: `rahnab_core`) |
| **Singular Label (FA)** | شرکت زیرمجموعه |
| **Plural Label (FA)** | شرکت‌های زیرمجموعه |
| **Singular Label (EN)** | Subsidiary Company |
| **Plural Label (EN)** | Subsidiary Companies |
| **Menu Icon** | `dashicons-networking` (or `dashicons-building`) |
| **Menu Position** | 20 (Directly beneath Pages) |
| **Public / Queryable** | `public => true`, `publicly_queryable => true` |
| **Show in REST (Block/API)**| `true` (Enables modern block editor & REST API) |
| **Hierarchical** | `false` (Flat architecture; ordering via `menu_order`) |
| **Supports** | `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `page-attributes` (`menu_order`) |
| **Has Archive** | `true` (`has_archive => 'companies'`) |
| **Rewrite Rules** | `slug => 'companies'`, `with_front => false` |
| **Archive URL (FA / EN)** | `/companies/` (FA default) \| `/en/companies/` (EN) |
| **Single URL (FA / EN)** | `/companies/{post-name}/` \| `/en/companies/{post-name}/` |
| **Capability Type** | `post` (Mapped to administrator and editor roles) |

#### 1.2.2 `news` (Corporate & Subsidiary Press)
Formal corporate communications, press releases, scientific breakthroughs, and industrial announcements.

| Specification Parameter | Formal Definition / Value |
|:---|:---|
| **Internal Post Type Key** | `news` (or `rahnab_news`) |
| **Singular Label (FA)** | خبر و اطلاعیه |
| **Plural Label (FA)** | اخبار و رویدادها |
| **Singular Label (EN)** | Press Release / News |
| **Plural Label (EN)** | News & Press Releases |
| **Menu Icon** | `dashicons-megaphone` |
| **Menu Position** | 21 |
| **Public / Queryable** | `public => true`, `publicly_queryable => true` |
| **Show in REST** | `true` |
| **Hierarchical** | `false` |
| **Supports** | `title`, `editor`, `thumbnail`, `excerpt`, `revisions`, `author` |
| **Has Archive** | `true` (`has_archive => 'news'`) |
| **Rewrite Rules** | `slug => 'news'`, `with_front => false` |
| **Archive URL (FA / EN)** | `/news/` \| `/en/news/` |
| **Single URL (FA / EN)** | `/news/{post-name}/` \| `/en/news/{post-name}/` |
| **Capability Type** | `post` |

#### 1.2.3 `event` (Symposia, Conferences, Exhibitions)
Time-sensitive corporate and scientific events (e.g. IranPharma, Arab Health, CPHI, scientific roundtables).

| Specification Parameter | Formal Definition / Value |
|:---|:---|
| **Internal Post Type Key** | `event` (or `rahnab_event`) |
| **Singular Label (FA)** | رویداد و همایش |
| **Plural Label (FA)** | رویدادها و نمایشگاه‌ها |
| **Singular Label (EN)** | Event / Symposium |
| **Plural Label (EN)** | Events & Exhibitions |
| **Menu Icon** | `dashicons-calendar-alt` |
| **Menu Position** | 22 |
| **Public / Queryable** | `public => true`, `publicly_queryable => true` |
| **Show in REST** | `true` |
| **Hierarchical** | `false` |
| **Supports** | `title`, `editor`, `thumbnail`, `excerpt`, `revisions` |
| **Has Archive** | `true` (`has_archive => 'events'`) |
| **Rewrite Rules** | `slug => 'events'`, `with_front => false` |
| **Archive URL (FA / EN)** | `/events/` \| `/en/events/` |
| **Single URL (FA / EN)** | `/events/{post-name}/` \| `/en/events/{post-name}/` |
| **Capability Type** | `post` |

#### 1.2.4 `achievement` (Certificates, Patents, Accreditations)
Institutional proof elements establishing regulatory and technological leadership (GMP, IFDA, ISO, Patents).

| Specification Parameter | Formal Definition / Value |
|:---|:---|
| **Internal Post Type Key** | `achievement` (or `rahnab_achievement`) |
| **Singular Label (FA)** | دستاورد و گواهینامه |
| **Plural Label (FA)** | دستاوردها و افتخارات |
| **Singular Label (EN)** | Achievement & Certification |
| **Plural Label (EN)** | Achievements & Accreditations |
| **Menu Icon** | `dashicons-awards` |
| **Menu Position** | 23 |
| **Public / Queryable** | `public => true`, `publicly_queryable => false` (Rendered via modal / embedded cards) |
| **Show in REST** | `true` |
| **Hierarchical** | `false` |
| **Supports** | `title`, `editor`, `thumbnail`, `revisions`, `page-attributes` (`menu_order`) |
| **Has Archive** | `false` (Curated directly on Home, About, and Company pages) |
| **Rewrite Rules** | `slug => 'achievements'`, `with_front => false` |
| **Capability Type** | `post` |

#### 1.2.5 Helper CPT: `team_member` (Governance & Leadership)
Executive Committee, Board of Directors, and Scientific Advisory Board.

| Specification Parameter | Formal Definition / Value |
|:---|:---|
| **Internal Post Type Key** | `team_member` |
| **Singular Label (FA)** | عضو هیئت‌مدیره / مدیر ارشد |
| **Plural Label (FA)** | ارکان راهبری و مدیران |
| **Singular Label (EN)** | Governance & Executive Member |
| **Plural Label (EN)** | Board & Leadership Team |
| **Menu Icon** | `dashicons-businessman` |
| **Menu Position** | 24 |
| **Public / Queryable** | `public => false`, `show_ui => true` (Internal CMS management only) |
| **Show in REST** | `true` |
| **Supports** | `title`, `thumbnail`, `page-attributes` (`menu_order`) |
| **Has Archive** | `false` |

---

## 2. Taxonomies Architecture

Taxonomies categorize entities into scientific, regulatory, and industrial dimensions.

```
TAXONOMIES ECOSYSTEM
│
├── value_chain_stage ───────► Associated with: 'company'
│   (Hierarchical)            ├── R&D & Biotech Acceleration
│                             ├── Cell Therapy & Regenerative Medicine
│                             ├── Biomanufacturing & Recombinant Proteins
│                             ├── Plasma Fractionation & Collection
│                             ├── Therapeutic Sera & Immunoglobulins
│                             └── Biological Quality Control & Analytics
│
├── news_category ────────────► Associated with: 'news'
│   (Hierarchical)            ├── Holding Press Releases (اخبار هلدینگ)
│                             ├── Subsidiary Updates (اخبار شرکت‌ها)
│                             ├── Scientific & Clinical Breakthroughs (نوآوری و پژوهش)
│                             └── Corporate Governance & CSR (مسئولیت اجتماعی و راهبری)
│
├── news_tag ────────────────► Associated with: 'news'
│   (Non-hierarchical)        └── Free-form keywords (GMP, Cleanroom, IFDA, Clinical Trial)
│
├── event_type ──────────────► Associated with: 'event'
│   (Hierarchical)            ├── International Exhibition (نمایشگاه بین‌المللی)
│                             ├── Scientific Symposium (سمپوزیوم علمی)
│                             ├── Industry Conference (کنفرانس صنعتی)
│                             └── Product Launch (رونمایی از محصول)
│
└── achievement_type ────────► Associated with: 'achievement'
    (Hierarchical)            ├── National Accreditation (دانش‌بنیان / گواهی معاونت علمی)
                              ├── Regulatory Approval (تأییدیه سازمان غذا و دارو / IFDA)
                              ├── Manufacturing Standard (GMP / ISO 13485 / ISO 17025)
                              └── Patent & Innovation (ثبت اختراع و پتنت)
```

### 2.1 Exhaustive Taxonomy Specifications

| Taxonomy Slug | Target CPT | Type | Public Rewrite Slug | Hierarchical | Labels (FA / EN) |
|:---|:---|:---|:---|:---|:---|
| `value_chain_stage` | `company` | Hierarchical | `sector` | `true` | حلقه زنجیره ارزش / Value Chain Stage |
| `news_category` | `news` | Hierarchical | `news-category` | `true` | دسته‌بندی اخبار / News Category |
| `news_tag` | `news` | Flat | `news-tag` | `false` | برچسب‌های خبر / News Tags |
| `event_type` | `event` | Hierarchical | `event-type` | `true` | نوع رویداد / Event Type |
| `achievement_type` | `achievement` | Hierarchical | `achievement-type` | `true` | نوع دستاورد / Credential Type |

---

## 3. Exhaustive Metadata Schema Architecture

All meta fields follow strict naming conventions (`_rahnab_{cpt}_{field}`) with leading underscores to hide raw keys from the standard custom fields box. All fields are strongly typed, strictly sanitized on write, and context-escaped on read.

### 3.1 Metadata Schema for `company`

```
┌────────────────────────────────────────────────────────────────────────┐
│                        METABOX: COMPANY PROFILE                        │
├────────────────────┬────────────────────┬──────────────────────────────┤
│ 1. Legal & Gov     │ 2. Value Chain     │ 3. Infrastructure & Specs    │
│ • National ID      │ • Ecosystem Role   │ • Cleanroom Grade            │
│ • Registration No. │ • Key Capabilities │ • Bioreactor Capacity        │
│ • Est. Year        │ • Product Pipeline │ • Laboratory Sqm             │
├────────────────────┼────────────────────┼──────────────────────────────┤
│ 4. Contact & Geo   │ 5. Digital Assets  │ 6. Outbound & Social         │
│ • Address (FA/EN)  │ • Vector Brandmark │ • Official Website           │
│ • Coordinates      │ • Fact Sheet PDF   │ • LinkedIn Profile           │
│ • Phone & Email    │ • Facility Gallery │ • External Portal            │
└────────────────────┴────────────────────┴──────────────────────────────┘
```

| Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Req? | Description & Storage Structure |
|:---|:---|:---|:---|:---|:---|:---|
| `_rahnab_company_legal_name_en` | نام رسمی انگلیسی / Legal Name EN | `string` | Text input | `sanitize_text_field`, max 150 chars | **Yes** | Official international legal registration name (e.g. *Nozhin Zist Pharmed Co.*) |
| `_rahnab_company_national_id` | شناسه ملی / National ID | `string` | Number input (11 digits) | Regex: `/^[0-9]{11}$/`, `sanitize_text_field` | **Yes** | 11-digit verified Iranian corporate national ID (e.g. `14012987472`) |
| `_rahnab_company_reg_number` | شماره ثبت / Registration No. | `string` | Text input | `sanitize_text_field`, max 20 chars | **Yes** | Official corporate registration certificate number |
| `_rahnab_company_est_year_shamsi` | سال تأسیس (شمسی) / Est. Year (SH) | `integer` | Number input | Min: 1350, Max: 1420, `absint` | **Yes** | Solar Hijri foundation year (e.g. `1393`) |
| `_rahnab_company_est_year_gregorian` | سال تأسیس (میلادی) / Est. Year (AD) | `integer` | Number input | Min: 1970, Max: 2040, `absint` | **Yes** | Gregorian foundation year (e.g. `2014`) |
| `_rahnab_company_website_url` | وب‌سایت رسمی / Website URL | `url` | URL input | `esc_url_raw`, protocol check (`https://`) | **Yes** | Outbound official domain URL (e.g. `https://padraserum.com`) |
| `_rahnab_company_ceo_name_fa` | نام مدیرعامل (فارسی) / CEO Name FA | `string` | Text input | `sanitize_text_field`, max 100 chars | No | Full name of Chief Executive Officer in Persian |
| `_rahnab_company_ceo_name_en` | نام مدیرعامل (انگلیسی) / CEO Name EN | `string` | Text input | `sanitize_text_field`, max 100 chars | No | Full name of Chief Executive Officer in English |
| `_rahnab_company_ecosystem_role_fa`| جایگاه در زنجیره ارزش / Ecosystem Role FA | `string` | Text input | `sanitize_text_field`, max 150 chars | **Yes** | One-line role synopsis (e.g. *تأمین فرآورده‌های پلاسمایی و استراتژیک کشور*) |
| `_rahnab_company_ecosystem_role_en`| جایگاه در زنجیره ارزش / Ecosystem Role EN | `string` | Text input | `sanitize_text_field`, max 150 chars | **Yes** | English role synopsis (e.g. *Plasma collection and plasma-derived medicinal products*) |
| `_rahnab_company_hq_address_fa` | نشانی دفتر مرکزی (فارسی) / HQ Address FA | `text` | Textarea | `sanitize_textarea_field`, max 300 chars | **Yes** | Official physical corporate headquarters address in Persian |
| `_rahnab_company_hq_address_en` | نشانی دفتر مرکزی (انگلیسی) / HQ Address EN | `text` | Textarea | `sanitize_textarea_field`, max 300 chars | **Yes** | Official headquarters address in English |
| `_rahnab_company_geo_lat` | عرض جغرافیایی / Latitude | `float` | Number input (step 0.000001) | `floatval`, range: -90.0 to 90.0 | **Yes** | Coordinates for interactive Leaflet / Mapbox map pin |
| `_rahnab_company_geo_lng` | طول جغرافیایی / Longitude | `float` | Number input (step 0.000001) | `floatval`, range: -180.0 to 180.0 | **Yes** | Coordinates for interactive Leaflet / Mapbox map pin |
| `_rahnab_company_contact_phone` | تلفن ثابت / Telephone | `string` | Tel input | Regex: `/^0[0-9]{2,3}[0-9]{7,8}$/`, `sanitize_text_field` | **Yes** | Landline telephone number (e.g. `02149361200`) |
| `_rahnab_company_contact_email` | ایمیل رسمی / Official Email | `email` | Email input | `sanitize_email`, `is_email` check | **Yes** | Direct corporate inquiry email address |
| `_rahnab_company_linkedin_url` | لینک لینکدین / LinkedIn URL | `url` | URL input | `esc_url_raw`, domain check `linkedin.com` | No | LinkedIn corporate profile page URL |
| `_rahnab_company_brandmark_svg` | لوگوی برداری / Vector Logo | `attachment_id` | Media uploader (SVG/PNG) | `absint`, mime check: `image/svg+xml`, `image/png` | **Yes** | Transparent vector brandmark for high-DPI headers and matrices |
| `_rahnab_company_factsheet_pdf` | کاتالوگ / Fact Sheet PDF | `attachment_id` | Media uploader (PDF) | `absint`, mime check: `application/pdf` | No | Downloadable institutional corporate dossier |
| `_rahnab_company_facility_specs` | مشخصات سایت و آزمایشگاه‌ها / Facility Specs | `serialized_json` | Structured repeater table | Schema validation (Cleanroom grade, Area sqm, Bioreactors) | No | JSON array: `[{"title":"Cleanroom Suites","grade":"Grade B/C","area_sqm":1200,"bioreactors":"2x 500L Single-Use"}]` |
| `_rahnab_company_products_pipeline`| سبد محصولات و داروها / Products Pipeline | `serialized_json` | Structured repeater table | Schema validation (Trade name, Generic, Indication, Stage) | No | JSON array: `[{"trade_name":"ImmunoJine","generic":"IVIG 5%","indication":"Primary Immunodeficiency","stage":"Commercial"}]` |
| `_rahnab_company_facility_gallery` | گالری تصاویر تأسیسات / Facility Gallery | `comma_separated_ids` | Multi-image selector | Array of `absint` IDs, sanitize via integer casting | No | High-resolution photography of cleanrooms and laboratories |

---

### 3.2 Metadata Schema for `news`

| Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Req? | Description & Storage Structure |
|:---|:---|:---|:---|:---|:---|:---|
| `_rahnab_news_subtitle_fa` | زیرعنوان خبر (فارسی) / News Subtitle FA | `string` | Text input | `sanitize_text_field`, max 200 chars | No | Editorial secondary lead sentence |
| `_rahnab_news_subtitle_en` | زیرعنوان خبر (انگلیسی) / News Subtitle EN | `string` | Text input | `sanitize_text_field`, max 200 chars | No | English secondary lead sentence |
| `_rahnab_news_related_company_id` | شرکت مرتبط / Related Subsidiary | `post_id` | Dropdown (`post_type=company`) | `absint`, verify post exists & is `company` (or `0`) | **Yes** | Foreign key linking news to a subsidiary (`0` = Rahnab Holding) |
| `_rahnab_news_press_release_pdf` | بیانیه رسمی (PDF) / Press Statement PDF | `attachment_id` | Media uploader (PDF) | `absint`, mime check: `application/pdf` | No | Downloadable official press release statement |
| `_rahnab_news_source_attribution` | منبع خبر / News Source Attribution | `string` | Text input | `sanitize_text_field`, max 100 chars | No | Source citation (e.g. *روابط عمومی هلدینگ رهناب*, *سازمان غذا و دارو*) |
| `_rahnab_news_is_featured` | خبر برگزیده صفحه اصلی / Featured Hero | `boolean` | Checkbox / Toggle (`0` or `1`) | `rest_sanitize_boolean` (stores `0` or `1`) | **Yes** | Flag for homepage carousel and archive hero banner |
| `_rahnab_news_reading_time` | زمان تخمینی مطالعه / Reading Time (min) | `integer` | Calculated / Readonly input | `absint`, auto-calculated on save via word count | No | Integer minutes calculated at 200 wpm rate |

---

### 3.3 Metadata Schema for `event`

| Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Req? | Description & Storage Structure |
|:---|:---|:---|:---|:---|:---|:---|
| `_rahnab_event_start_datetime` | تاریخ و ساعت شروع / Start Date & Time | `datetime` | Date-time picker | ISO 8601 string: `Y-m-d H:i:s` | **Yes** | Timestamp for calendar ordering and status determination |
| `_rahnab_event_end_datetime` | تاریخ و ساعت پایان / End Date & Time | `datetime` | Date-time picker | ISO 8601 string: `Y-m-d H:i:s`, must be >= Start | **Yes** | Concluding timestamp |
| `_rahnab_event_venue_fa` | مکان و سالن برگزاری / Venue FA | `string` | Text input | `sanitize_text_field`, max 200 chars | **Yes** | Location description in Persian (e.g. *مرکز همایش‌های رازی، سالن شماره ۲*) |
| `_rahnab_event_venue_en` | مکان و سالن برگزاری / Venue EN | `string` | Text input | `sanitize_text_field`, max 200 chars | **Yes** | Venue description in English |
| `_rahnab_event_city_country` | شهر و کشور / City, Country | `string` | Text input | `sanitize_text_field`, max 100 chars | **Yes** | E.g. *Tehran, Iran* or *Dubai, UAE* |
| `_rahnab_event_booth_number` | شماره غرفه / Stand & Booth No. | `string` | Text input | `sanitize_text_field`, max 50 chars | No | Exhibition stand / booth identifier (e.g. *Hall 5, Stand B-14*) |
| `_rahnab_event_registration_url` | لینک ثبت‌نام یا وب‌سایت رویداد / Registration URL | `url` | URL input | `esc_url_raw` | No | Direct outbound URL to register or event portal |
| `_rahnab_event_status` | وضعیت رویداد / Event Status | `select` | Dropdown select | In array: `['upcoming', 'ongoing', 'concluded', 'postponed']` | **Yes** | Current lifecycle status of the event |
| `_rahnab_event_related_company_id` | شرکت شرکت‌کننده / Participating Entity | `post_id` | Dropdown (`post_type=company`) | `absint`, `0` = Entire Holding | **Yes** | Foreign key linking event to subsidiary or holding |

---

### 3.4 Metadata Schema for `achievement`

| Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Req? | Description & Storage Structure |
|:---|:---|:---|:---|:---|:---|:---|
| `_rahnab_achievement_award_date` | تاریخ اعطا یا ثبت / Award Date | `string` | Date picker (SH/AD) | String `YYYY-MM-DD` or `139X` year | **Yes** | Date certification or award was granted |
| `_rahnab_achievement_issuing_body_fa` | مرجع صادرکننده (فارسی) / Issuing Authority FA | `string` | Text input | `sanitize_text_field`, max 150 chars | **Yes** | E.g. *سازمان غذا و داروی وزارت بهداشت*, *معاونت علمی و فناوری ریاست‌جمهوری* |
| `_rahnab_achievement_issuing_body_en` | مرجع صادرکننده (انگلیسی) / Issuing Authority EN | `string` | Text input | `sanitize_text_field`, max 150 chars | **Yes** | E.g. *Iran Food and Drug Administration (IFDA)* |
| `_rahnab_achievement_credential_id` | شماره مجوز یا ثبت / Credential / Reg ID | `string` | Text input | `sanitize_text_field`, max 80 chars | No | Official certificate, license, or patent registration number |
| `_rahnab_achievement_verification_url` | پیوند استعلام رسمی / Verification URL | `url` | URL input | `esc_url_raw` | No | National registry portal verification link |
| `_rahnab_achievement_certificate_file` | تصویر یا سند گواهینامه / Certificate Document | `attachment_id` | Media uploader (PDF/Image) | `absint`, mime: `image/*`, `application/pdf` | **Yes** | High-resolution scanned document for modal preview |
| `_rahnab_achievement_related_company_id`| شرکت صاحب دستاورد / Recipient Entity | `post_id` | Dropdown (`post_type=company`) | `absint`, `0` = Holding Umbrella | **Yes** | Foreign key linking achievement to entity |
| `_rahnab_achievement_is_highlighted` | نمایش در شمارنده‌های اعتبار هلدینگ / Trust Engine | `boolean` | Checkbox (`0` or `1`) | `rest_sanitize_boolean` | **Yes** | Highlights certificate in corporate trust metrics |

---

## 4. Entity Relationships & Database Performance Architecture

### 4.1 Relationship Topology
The entity ecosystem consists of 1-to-Many and Cross-Referential relationships centered around `company`:

```
                    ┌────────────────────────┐
                    │        HOLDING         │
                    │    (Rahnab Pharmed)    │
                    └───────────┬────────────┘
                                │ 1:N
                                ▼
                    ┌────────────────────────┐
                    │        COMPANY         │
                    │   (7 Subsidiaries)     │
                    └───┬───────┬────────┬───┘
                        │       │        │
           1:N (Foreign)│       │1:N     │1:N
                        ▼       ▼        ▼
                   ┌────────┐┌────────┐┌─────────────┐
                   │  NEWS  ││ EVENT  ││ ACHIEVEMENT │
                   └────────┘└────────┘└─────────────┘
```

### 4.2 Performance & Indexing Strategy (WordPress Anti-Pattern Mitigation)
*Evaluated per Project Decision Making Rules:*

#### The Architectural Trap
In WordPress, querying post relationships via `meta_query` with serialized arrays (e.g. `LIKE '%"company_id":4%'`) triggers full table scans on `wp_postmeta`, which lacks composite index coverage for substring searches. Under heavy B2B traffic or catalog growth, this causes severe query latency (>500ms).

#### The High-Performance Classic WP Solution
1. **Single Source of Truth with Scalar Foreign Keys:**
   - Instead of storing arrays of post IDs on both parent and child, store a single scalar integer post meta on the child post:
     - In `news`: `_rahnab_news_related_company_id = 42`
     - In `event`: `_rahnab_event_related_company_id = 42`
     - In `achievement`: `_rahnab_achievement_related_company_id = 42`
   - Setting this to `0` represents a global holding-level entity.
2. **Deterministic Indexed Queries:**
   - Queries look up exact integer matches: `meta_key = '_rahnab_news_related_company_id' AND meta_value = '42'`.
   - In MySQL, exact equality searches on `meta_value` utilize standard index scans far more efficiently than wildcards.
3. **Transient-Layer Caching (Zero Database Overhead):**
   - Reverse queries (e.g. fetching the latest 3 news releases for Padra Serum Alborz on `single-company.php`) are wrapped in WordPress transients:
     - Transient Key: `rahnab_company_{$company_id}_news` (TTL: 12 hours).
     - Transient Key: `rahnab_company_{$company_id}_achievements` (TTL: 24 hours).
4. **Automated Cache Invalidation Hooks:**
   - Whenever any `news`, `event`, `achievement`, or `company` post is updated, deleted, or published, the `save_post` hook triggers targeted cache purging:
     - Purges `rahnab_company_{$related_company_id}_news`
     - Purges global holding transient `rahnab_holding_latest_news`
   - Guarantees 0-latency database hits on cached page loads while preserving immediate freshness upon publication.

---

## 5. Classic WordPress Template Hierarchy & Modular Structure

### 5.1 Template Mapping Table
Following strict Classic WordPress template hierarchy conventions (`.agents/rules/wordpress-development.md`):

| Page / Route | Template File | Query Type | Purpose & Core Content Blocks |
|:---|:---|:---|:---|
| `/` & `/en/` | `front-page.php` | Custom WP_Query feeds | Hero holding narrative, interactive 7-subsidiary value chain matrix, quantitative proof engine counters, featured press cards, institutional B2B contact trigger. |
| `/about/` & `/en/about/` | `page-about.php` | Page + Custom WP_Query | Scrollytelling corporate history timeline, strategic pillars, board of directors directory (`team_member`), scientific infrastructure photo showcase, video presentation, factsheet downloads. |
| `/companies/` & `/en/companies/` | `archive-company.php` | Main Archive Query | Vertical biomanufacturing value chain overview, interactive taxonomy filter tabs (`value_chain_stage`), responsive 7-entity grid, upstream/downstream synergy diagram. |
| `/companies/{slug}/` & `/en/companies/{slug}/` | `single-company.php` | Single Post Query | Facility hero cover, official legal brandmark, legal IDs, executive narrative, capability metric badges, commercial & pipeline product table, cleanroom photo gallery, GMP/IFDA certificates, direct contact info, related press feed. |
| `/news/` & `/en/news/` | `archive-news.php` (or `archive.php`) | Main Archive Query | Editorial filter bar (`news_category`), featured press release hero, 3-column paginated news card grid with Solar Hijri & Gregorian date badges, AJAX load more. |
| `/news/{slug}/` & `/en/news/{slug}/` | `single-news.php` (or `single.php`) | Single Post Query | Category pill, publication date, reading time, high-contrast headline, full-width featured media, long-form editorial typography, downloadable official press statement PDF, cross-links to related subsidiary. |
| `/events/` & `/en/events/` | `archive-event.php` | Main Archive Query | Filter tabs (Upcoming vs Concluded), calendar cards, event location badges, registration CTA triggers. |
| `/events/{slug}/` & `/en/events/{slug}/` | `single-event.php` | Single Post Query | Event agenda, booth/hall details, venue location map, countdown timer, external registration gateway. |
| `/sector/{term-slug}/` | `taxonomy-value_chain_stage.php` | Taxonomy Archive Query | Dedicated filtered view of companies operating in a specific value chain node (e.g. *Cell Therapy*, *Plasma*). |
| `/contact/` & `/en/contact/` | `page-contact.php` | Page Template | Central contact directory, interactive Leaflet map (NIGEB Floor 3, Unit 302), departmental contacts, CSRF nonce-protected B2B partnership inquiry form. |
| Global 404 Error | `404.php` | Standard Error View | Minimal editorial branded 404 screen with search form and direct routes back to holding portfolio and contact. |

---

### 5.2 Modular Template Parts Architecture (`template-parts/`)
Reusable PHP presentation partials ensuring zero code duplication (DRY):

```
template-parts/
├── header/
│   ├── nav-desktop.php         -> Floating glassmorphic desktop navigation bar
│   ├── nav-mobile.php          -> Fullscreen mobile drawer with staggered reveals
│   └── language-switcher.php   -> Bilingual toggle (FA/EN) with URL translation mapping
├── footer/
│   ├── footer-directory.php    -> 4-column corporate directory with 7 subsidiary links
│   └── footer-legal.php        -> Copyright, national biosecurity notice, legal links
├── company/
│   ├── card-company.php        -> Reusable portfolio card (logo, name, sector badge, CTA)
│   ├── drawer-company.php      -> Interactive quick-reveal slide-over drawer
│   ├── table-pipeline.php      -> Products & clinical pipeline table
│   └── gallery-cleanroom.php   -> Lightbox photo gallery for labs & facilities
├── news/
│   ├── card-news.php           -> 3-column editorial news card with category badge
│   ├── card-news-featured.php  -> Full-width horizontal hero news card
│   └── widget-related-news.php -> Cross-linked subsidiary press releases
├── event/
│   ├── card-event.php          -> Event calendar card with date badge & venue
│   └── widget-countdown.php    -> Dynamic event timer
├── achievement/
│   ├── badge-certificate.php   -> Interactive GMP/ISO accreditation badge
│   └── modal-credential.php    -> High-res certificate scan preview modal
└── common/
    ├── section-trust.php       -> Quantitative proof engine (counters & metrics)
    ├── b2b-cta-banner.php      -> High-contrast institutional partnership banner
    └── map-leaflet.php         -> Interactive coordinate map container
```

---

## 6. Admin UX & Editorial Workflow Considerations

Content managers for biopharmaceutical holdings are corporate communications specialists, regulatory officers, and executive assistants. The WordPress admin interface must be structured, foolproof, and prevent data corruption.

### 6.1 Custom Admin Columns & List Table Enhancements
Customizing the WordPress post list screens (`manage_{$post_type}_posts_columns`) provides instant oversight:

#### A. Company Admin List Screen (`edit.php?post_type=company`)
- **Columns:**
  1. `cb`: Checkbox for bulk actions
  2. `brandmark`: 48x48px thumbnail preview of the company brandmark
  3. `title`: Persian Display Title (e.g. *پادرا سرم البرز*)
  4. `legal_name_en`: English Legal Name (*Padra Serum Alborz Co.*)
  5. `national_id`: 11-digit National ID badge (*14006664540*)
  6. `taxonomy-value_chain_stage`: Value chain stage pill (*Therapeutic Sera*)
  7. `website`: External link icon to live website
  8. `order`: Numeric `menu_order` for sorting display sequence
  9. `languages`: Polylang translation flags (FA / EN synchronization status)
  10. `date`: Publication timestamp
- **Quick Filters:** Dropdown filter by `value_chain_stage` taxonomy.

#### B. News Admin List Screen (`edit.php?post_type=news`)
- **Columns:**
  1. `cb`: Checkbox
  2. `thumbnail`: 60x40px article lead image
  3. `title`: Headline
  4. `related_company`: Associated subsidiary badge (or *هلدینگ رهناب*)
  5. `taxonomy-news_category`: News category pill
  6. `is_featured`: Star toggle icon (click to toggle featured status via AJAX)
  7. `pdf_attached`: Icon indicator if official press statement PDF is uploaded
  8. `languages`: Polylang sync flags
  9. `date`: Published date
- **Quick Filters:** Dropdown filter by `news_category` AND Dropdown filter by `related_company`.

#### C. Event Admin List Screen (`edit.php?post_type=event`)
- **Columns:**
  1. `cb`: Checkbox
  2. `title`: Event Name
  3. `event_type`: Conference / Exhibition / Symposium
  4. `start_date`: Start Date & Time
  5. `venue`: Venue & City
  6. `status`: Color-coded status badge (*Upcoming [Green]*, *Ongoing [Blue]*, *Concluded [Gray]*)
  7. `related_company`: Participating subsidiary
  8. `languages`: Polylang sync flags
- **Quick Filters:** Filter by `event_type` and `event_status`.

#### D. Achievement Admin List Screen (`edit.php?post_type=achievement`)
- **Columns:**
  1. `cb`: Checkbox
  2. `preview`: Thumbnail of scanned certificate
  3. `title`: Credential Title (e.g. *گواهی انطباق با اصول GMP*)
  4. `issuing_body`: Issuing authority (*سازمان غذا و دارو*)
  5. `related_company`: Subsidiary recipient
  6. `achievement_type`: Certification / Regulatory / Patent
  7. `credential_id`: Official license number
  8. `is_highlighted`: Checkmark for homepage trust counter
- **Quick Filters:** Filter by `achievement_type` and `issuing_body`.

---

### 6.2 Metabox Organization & Tabbed UX
To avoid the notorious "endless vertical scrolling" in WordPress Classic Editor/Metaboxes, custom fields are organized into structured, logical tabs:

```
┌────────────────────────────────────────────────────────────────────────┐
│ EDIT SUBSIDIARY: پادرا سرم البرز (Padra Serum Alborz)                 │
├───────────────┬────────────────┬───────────────┬───────────────────────┤
│ [IDENTIFIERS] │ [VALUE CHAIN]  │ [PIPELINE]    │ [INFRASTRUCTURE]      │
│ [CONTACT/GEO] │ [DIGITAL MEDIA]│ [RELATIONS]   │                       │
├───────────────┴────────────────┴───────────────┴───────────────────────┤
│ • Persian Legal Title:  [ پادرا سرم البرز                          ]   │
│ • English Legal Name:   [ Padra Serum Alborz Co.                   ]   │
│ • Iranian National ID:  [ 14006664540                              ]   │
│ • Registration Number:  [ 32185                                    ]   │
│ • Establishment Year:   [ 1395 ] Shamsi   |   [ 2016 ] Gregorian       │
│ • Official Website URL: [ https://padraserum.com                   ]   │
│                                                                        │
│ ℹ All National IDs are automatically validated against Iranian 11-digit │
│   checksum format prior to database commit.                            │
└────────────────────────────────────────────────────────────────────────┘
```

---

### 6.3 Bilingual Synchronization Architecture (Polylang / WPML)

The site must operate seamlessly in Persian (`fa-IR`, default RTL) and English (`en-US`, secondary LTR). The data synchronization protocol enforces strict rules on field copying versus field translation:

```
┌────────────────────────────────────────────────────────────────────────┐
│                  BILINGUAL METADATA SYNCHRONIZATION                    │
├───────────────────────────────────┬────────────────────────────────────┤
│ 🔒 AUTOMATICALLY SYNCED (LOCKED)  │ 🌐 TRANSLATED PER LOCALE           │
├───────────────────────────────────┼────────────────────────────────────┤
│ • National ID (شناسه ملی)         │ • Display Name / Post Title        │
│ • Registration Number             │ • Executive Biography & Overview   │
│ • Foundation Years (SH & AD)      │ • Ecosystem Role Narrative         │
│ • Geo Coordinates (Lat / Lng)     │ • Street Address                   │
│ • Central Telephone & Fax Numbers │ • CEO / Executive Title            │
│ • Official Website URL            │ • News Headline & Body Content     │
│ • Event Start & End Timestamps    │ • Event Venue Description          │
│ • Credential Registration Numbers │ • Achievement Issuing Body Title   │
│ • SVG Logo Media ID               │ • Press Release PDF (if localized) │
│ • Entity Relationships (Post IDs) │ • Meta SEO Description & Keywords  │
└───────────────────────────────────┴────────────────────────────────────┘
```

#### Bidirectional Cross-Language Relationship Resolution
When a Persian News article is linked to Persian Company #42 (Padra Serum):
1. In the database, `_rahnab_news_related_company_id` is set to `42`.
2. When the editor translates the article to English, a Polylang/WPML relationship hook detects the parent language link.
3. The hook queries `pll_get_post(42, 'en')` to retrieve English Company #108.
4. The English news article's `_rahnab_news_related_company_id` is automatically populated with `108`.
5. Frontend templates render cross-links to the native language version of the subsidiary profile without 404s or language-switching redirects.

---

## 7. Forensic Verification & Acceptance Criteria

This specification provides the foundational blueprint for Milestone 2. To ensure architectural integrity, the design adheres to the following verification gates:

1. **Zero-Code Enforcement:** No PHP implementation code, functions, or theme files have been generated in Milestone 1.
2. **Schema Exhaustiveness:** All 7 subsidiaries, 4 core CPTs, 5 taxonomies, and 30+ structured metadata fields have strict validation and escaping definitions.
3. **Performance Immunity:** No serialized array `meta_query` joins; all entity lookups are indexed scalar keys backed by transient caching.
4. **Bilingual Completeness:** Every field and label possesses explicit Persian (RTL) and English (LTR) definitions with automated synchronization rules.
5. **Classic WP Compliance:** 100% compliant with WordPress Template Hierarchy, Classic Theme separation of concerns, and Companion Plugin boundaries.

---
*Authored and forensically validated by Explorer 3 (WordPress CPT Modeler / IA Strategist) for Milestone 1.*
