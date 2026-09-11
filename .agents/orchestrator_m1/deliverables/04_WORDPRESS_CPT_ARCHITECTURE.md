# DELIVERABLE 04: WordPress CPT Model & Data Architecture Specification
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-ARCH-M1-04`  
**Classification:** Enterprise Life-Science WordPress Architectural Specification  
**Author:** Milestone 1 Architecture Author (`worker_m1_author`)  
**Status:** Approved Architectural Blueprint  
**Target Platform:** Classic WordPress (Custom Theme + Companion Plugin `rahnab_core`)  
**Constraint Level:** STRICTLY ZERO PHP CODE (Pure Architectural Specification)  

---

## 1. Executive Summary & Content Entity Strategy

To reflect the industrial stature of Rahnab Pharmed and its seven specialized subsidiaries, the content architecture strictly decouples data entities from presentation. Operating ventures, press releases, scientific events, regulatory credentials, and governance leadership are modeled as dedicated Custom Post Types (CPTs) with typed metadata schemas, avoiding content fragmentation and brittle page builders.

```text
RAHNAB PHARMED ENTITY TOPOLOGY
┌─────────────────────────────────────────────────────────────────────────────┐
│                      RAHNAB HOLDING CONTENT UNIVERSE                        │
├───────────────────┬───────────────────┬────────────────┬────────────────────┤
│    ENTERPRISES    │    PRESS & MEDIA  │     EVENTS     │    CREDENTIALS     │
│   (CPT: company)  │    (CPT: news)    │  (CPT: event)  │ (CPT: achievement) │
├───────────────────┼───────────────────┼────────────────┼────────────────────┤
│ 7 Core Ventures   │ Corporate Press   │ Symposia       │ National GMP Seals │
│ Future Spin-Outs  │ Subsidiary News   │ Conferences    │ IFDA Lab Approvals │
│ Facility Specs    │ Scientific Papers │ Exhibitions    │ ISO Accreditations │
│ Product Lines     │ Media Kit Dossiers│ Trade Shows    │ Patent Filings     │
└───────────────────┴───────────────────┴────────────────┴────────────────────┘
          │                   │                 │                  │
          ▼                   ▼                 ▼                  ▼
┌─────────────────────────┐ ┌───────────────┐ ┌───────────────┐ ┌──────────────────┐
│    value_chain_stage    │ │ news_category │ │  event_type   │ │ achievement_type │
│ (Taxonomy: Hierarchical)│ │  (Taxonomy)   │ │  (Taxonomy)   │ │   (Taxonomy)     │
└─────────────────────────┘ └───────────────┘ └───────────────┘ └──────────────────┘
```

---

## 2. Custom Post Types (CPT) Specifications

### 2.1 Primary CPT: `company` (Operating Subsidiary Venture)
Represents the 7 core subsidiaries and all future biotech ventures.

| Parameter | Architectural Value / Specification |
|:---|:---|
| **Post Type Key** | `company` (Registered in companion plugin `rahnab_core`) |
| **Labels (FA)** | Singular: `شرکت زیرمجموعه` \| Plural: `شرکت‌های زیرمجموعه` |
| **Labels (EN)** | Singular: `Subsidiary Company` \| Plural: `Subsidiary Companies` |
| **Menu Icon** | `dashicons-networking` |
| **Menu Position** | 20 (Directly below Pages) |
| **Public & Queryable** | `public => true`, `publicly_queryable => true` |
| **Show in REST** | `true` (Enables Block Editor & Headless/REST API compatibility) |
| **Hierarchical** | `false` (Flat architecture; ordered via `menu_order`) |
| **Supports** | `title`, `editor` (Rich corporate overview), `thumbnail` (Cover image), `excerpt`, `revisions`, `page-attributes` (`menu_order`) |
| **Has Archive** | `true` (`has_archive => 'subsidiaries'`) |
| **Rewrite Rules** | `slug => 'subsidiaries'`, `with_front => false` |
| **Permalinks** | Persian: `/subsidiaries/{slug}/` \| English: `/en/subsidiaries/{slug}/` |
| **Capability Type** | `post` (Controlled via standard editor/administrator permissions) |

### 2.1.1 Architectural Decision Record (ADR): Physical Facilities & Cleanrooms Data Modeling

#### Context & Problem Statement
Rahnab Pharmed subsidiaries own and operate premier national life-science physical assets:
- **Tamin Plasma Nozhin:** 150,000-liter automated plasma fractionation complex (Sepehr Industrial Complex).
- **Persis Gene:** 1,500 m² cleanroom accelerator suite with 500L/2,000L microbial and mammalian bioreactor trains.
- **Nozhin Zist Pharmed:** Finished biopharmaceutical fill-and-finish plant.
- **Arc Zist Azma:** Comprehensive GLP-compliant analytical testing laboratories (physicochemical, cell bioassay, endotoxin testing).
A structural architectural decision is required: Should physical facilities, cleanrooms, and laboratories be modeled as a dedicated top-level Custom Post Type (`facility`) or as structured metadata repeater schemas embedded within the parent `company` CPT?

#### Option 1: Dedicated Custom Post Type (`facility`)
- **Advantages (مزایا):**
  - Independent permalinks for each physical building (`/facilities/sepehr-fractionation-plant/`).
  - Granular taxonomy tagging by cleanroom class (ISO 5 / Grade A, ISO 7 / Grade B).
  - Ability to associate a single shared facility with multiple subsidiaries in a M:N relationship.
- **Disadvantages (معایب):**
  - **Thin-Content SEO Penalties:** Individual cleanroom suites do not possess sufficient long-form narrative content to justify standalone URLs, creating crawl debt and thin-content search penalties.
  - **Fragmentation of Corporate Authority:** B2B pharmaceutical partners, overseas licensors, and institutional investors audit the legal, operating *company* (e.g. Nozhin Zist), not a detached physical room. Decoupling facilities from the corporate profile dilutes corporate stature.
  - **Editorial Overhead & Sync Complexity:** Requires content managers to maintain two distinct post types with bidirectional foreign keys for only 7 operating companies.

#### Option 2: Structured Metadata Schemas Embedded in `company` CPT (Selected)
- **Advantages (مزایا):**
  - **Institutional Unity:** Anchors physical infrastructure, cleanroom grades, and bioreactor capacities directly to the legal corporate entity holding the GMP licenses.
  - **Pristine B2B User Experience:** A single visit to `/subsidiaries/nozhin-zist-pharmed/` presents the complete enterprise profile: legal credentials, pipeline products, cleanroom specs, photo gallery, and leadership.
  - **Zero Orphan URLs:** Prevents indexation of hollow sub-pages while exposing full facility specs via REST API (`/wp-json/wp/v2/company/{id}`) as a structured JSON object.
  - **Editorial Efficiency:** Content editors manage all company data within a single screen under "Tab 3: Facilities & Technical Specs".
- **Disadvantages (معایب):**
  - Facilities cannot have individual standalone URLs (evaluated and determined to be an asset rather than a drawback for a corporate holding site).

#### Final Decision & Recommendation (پیشنهاد نهایی)
**Adopt Option 2 (Structured Metadata Schemas on `company` CPT).** Physical facilities, technical specifications, and cleanroom photograph galleries are strictly modeled via metadata fields `_rahnab_company_facility_specs`, `_rahnab_company_facility_locations`, and `_rahnab_company_facility_gallery`. If the holding commissions a multi-tenant shared research park in future milestones, a dedicated landing page (`page-infrastructure.php`) aggregates facility data directly from all 7 company profiles without data redundancy.

---

### 2.2 Primary CPT: `news` (Corporate & Subsidiary Press)
Formal corporate announcements, scientific breakthroughs, and industrial press releases.

| Parameter | Architectural Value / Specification |
|:---|:---|
| **Post Type Key** | `news` (or `rahnab_news`) |
| **Labels (FA)** | Singular: `خبر و اطلاعیه` \| Plural: `اخبار و اطلاعیه‌ها` |
| **Labels (EN)** | Singular: `News Article` \| Plural: `News & Press Releases` |
| **Menu Icon** | `dashicons-megaphone` |
| **Menu Position** | 21 |
| **Public & Queryable** | `public => true`, `publicly_queryable => true` |
| **Show in REST** | `true` |
| **Hierarchical** | `false` |
| **Supports** | `title`, `editor` (Full editorial body), `thumbnail` (Lead media), `excerpt`, `revisions`, `author` |
| **Has Archive** | `true` (`has_archive => 'news-events'`) |
| **Rewrite Rules** | `slug => 'news-events'`, `with_front => false` |
| **Permalinks** | Persian: `/news-events/{slug}/` \| English: `/en/news-events/{slug}/` |
| **Capability Type** | `post` |

---

### 2.3 Primary CPT: `event` (Symposia, Exhibitions & Congresses)
Time-sensitive industry and academic events (e.g., IranPharma, Arab Health, CPHI, scientific symposia).

| Parameter | Architectural Value / Specification |
|:---|:---|
| **Post Type Key** | `event` (or `rahnab_event`) |
| **Labels (FA)** | Singular: `رویداد و نمایشگاه` \| Plural: `رویدادها و همایش‌ها` |
| **Labels (EN)** | Singular: `Event & Symposium` \| Plural: `Events & Exhibitions` |
| **Menu Icon** | `dashicons-calendar-alt` |
| **Menu Position** | 22 |
| **Public & Queryable** | `public => true`, `publicly_queryable => true` |
| **Show in REST** | `true` |
| **Hierarchical** | `false` |
| **Supports** | `title`, `editor` (Event agenda & scope), `thumbnail`, `excerpt`, `revisions` |
| **Has Archive** | `true` (`has_archive => 'events'`) |
| **Rewrite Rules** | `slug => 'events'`, `with_front => false` |
| **Permalinks** | Persian: `/events/{slug}/` \| English: `/en/events/{slug}/` |
| **Capability Type** | `post` |

---

### 2.4 Primary CPT: `achievement` (Certificates, Patents & Accreditations)
Institutional proof elements establishing regulatory and scientific leadership (GMP, IFDA, ISO, Patents).

| Parameter | Architectural Value / Specification |
|:---|:---|
| **Post Type Key** | `achievement` (or `rahnab_achievement`) |
| **Labels (FA)** | Singular: `دستاورد و گواهینامه` \| Plural: `دستاوردها و مجوزها` |
| **Labels (EN)** | Singular: `Credential & Achievement` \| Plural: `Achievements & Accreditations` |
| **Menu Icon** | `dashicons-awards` |
| **Menu Position** | 23 |
| **Public & Queryable** | `public => true`, `publicly_queryable => false` (Rendered via modals and embedded trust components) |
| **Show in REST** | `true` |
| **Hierarchical** | `false` |
| **Supports** | `title`, `editor` (Scope of accreditation), `thumbnail`, `revisions`, `page-attributes` (`menu_order`) |
| **Has Archive** | `false` (Curated directly on Home, About, and Company pages) |
| **Rewrite Rules** | `slug => 'achievements'`, `with_front => false` |
| **Capability Type** | `post` |

---

### 2.5 Helper CPT: `team_member` (Governance & Leadership)
Executive Committee, Board of Directors, and Scientific Advisory Council members.

| Parameter | Architectural Value / Specification |
|:---|:---|
| **Post Type Key** | `team_member` |
| **Labels (FA)** | Singular: `عضو هیئت‌مدیره / مدیر ارشد` \| Plural: `ارکان راهبری و مدیران` |
| **Labels (EN)** | Singular: `Executive / Board Member` \| Plural: `Governance & Leadership Team` |
| **Menu Icon** | `dashicons-businessman` |
| **Menu Position** | 24 |
| **Public & Queryable** | `public => false`, `show_ui => true` (Internal CMS management only, zero orphan URLs) |
| **Show in REST** | `true` |
| **Supports** | `title`, `thumbnail` (Official portrait), `page-attributes` (`menu_order`) |
| **Has Archive** | `false` |

---

## 3. Taxonomies Architecture

Taxonomies categorize entities across scientific, regulatory, and industrial dimensions.

| Taxonomy Slug | Target CPT | Taxonomy Type | Public Rewrite Slug | Hierarchical | Labels (FA / EN) |
|:---|:---|:---|:---|:---:|:---|
| `value_chain_stage` | `company` | Hierarchical | `subsidiaries/cluster` | **Yes** | حلقه زنجیره ارزش / Value Chain Cluster |
| `news_category` | `news` | Hierarchical | `news-events/category` | **Yes** | دسته‌بندی اخبار / News Category |
| `news_tag` | `news` | Flat | `news-events/tag` | **No** | برچسب‌های خبر / News Tags |
| `event_type` | `event` | Hierarchical | `events/type` | **Yes** | نوع رویداد / Event Type |
| `achievement_type` | `achievement` | Hierarchical | `compliance/type` | **Yes** | رده گواهینامه / Credential Type |

---

## 4. Comprehensive Metadata Schema Specifications (51 Fields Across 5 Tables)

All custom fields follow strict prefixing (`_rahnab_{cpt}_{field}`) with leading underscores to hide raw keys from the default custom fields box. All fields are strongly typed, sanitized on save, and context-escaped on output in accordance with `.agents/rules/wordpress-development.md` and `.agents/rules/code-quality.md`.

### 4.1 Metadata Schema for `company` CPT (21 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 1 | `_rahnab_company_legal_name_en` | نام رسمی انگلیسی / Legal Name EN | `string` | Text input | `sanitize_text_field`, max 150 chars | `esc_html()`, `esc_attr()` | **Yes** | Official international legal registration title (e.g. *Nozhin Zist Pharmed Co.*) |
| 2 | `_rahnab_company_national_id` | شناسه ملی / National ID | `string` | Number input (11 digits) | Regex: `/^[0-9]{11}$/`, `sanitize_text_field` | `esc_html()`, `esc_attr()` | **Yes** | 11-digit verified Iranian corporate national ID (e.g. `14012098694`) |
| 3 | `_rahnab_company_reg_number` | شماره ثبت / Registration No. | `string` | Text input | `sanitize_text_field`, max 25 chars | `esc_html()`, `esc_attr()` | **Yes** | Corporate registration filing number (e.g. `83` or `452779`) |
| 4 | `_rahnab_company_est_year_shamsi` | سال تأسیس (شمسی) / Est. Year (SH) | `integer` | Number input | Min: 1350, Max: 1420, `absint` | `absint()`, `number_format_i18n()` | **Yes** | Solar Hijri foundation year (e.g. `1393`) |
| 5 | `_rahnab_company_est_year_gregorian` | سال تأسیس (میلادی) / Est. Year (AD) | `integer` | Number input | Min: 1970, Max: 2040, `absint` | `absint()`, `number_format_i18n()` | **Yes** | Gregorian foundation year (e.g. `2014`) |
| 6 | `_rahnab_company_website_url` | وب‌سایت رسمی / Official Website | `url` | URL input | `esc_url_raw`, protocol check (`https://`) | `esc_url()` | **Yes** | Outbound official domain (e.g. `https://arcbioassay.com`) |
| 7 | `_rahnab_company_ceo_name_fa` | نام مدیرعامل (فارسی) / CEO Name FA | `string` | Text input | `sanitize_text_field`, max 100 chars | `esc_html()` | No | Managing Director's name in Persian |
| 8 | `_rahnab_company_ceo_name_en` | نام مدیرعامل (انگلیسی) / CEO Name EN | `string` | Text input | `sanitize_text_field`, max 100 chars | `esc_html()`, `esc_attr()` | No | Managing Director's name in English |
| 9 | `_rahnab_company_ecosystem_role_fa` | جایگاه در زنجیره ارزش / Ecosystem Role FA | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()` | **Yes** | Persian value-chain summary (e.g. *اولین آزمایشگاه کنترل کیفی بیولوژیک کشور*) |
| 10 | `_rahnab_company_ecosystem_role_en` | جایگاه در زنجیره ارزش / Ecosystem Role EN | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()`, `esc_attr()` | **Yes** | English value-chain summary |
| 11 | `_rahnab_company_hq_address_fa` | نشانی دفتر / HQ Address FA | `text` | Textarea | `sanitize_textarea_field`, max 350 chars | `nl2br( esc_html( ... ) )` | **Yes** | Official physical corporate headquarters address in Persian |
| 12 | `_rahnab_company_hq_address_en` | نشانی دفتر / HQ Address EN | `text` | Textarea | `sanitize_textarea_field`, max 350 chars | `nl2br( esc_html( ... ) )` | **Yes** | Official headquarters address in English |
| 13 | `_rahnab_company_geo_lat` | عرض جغرافیایی / Latitude | `float` | Number input (step 0.000001) | `floatval`, range: -90.0 to 90.0 | `esc_attr( floatval( ... ) )` | **Yes** | GPS coordinate for Leaflet map pin |
| 14 | `_rahnab_company_geo_lng` | طول جغرافیایی / Longitude | `float` | Number input (step 0.000001) | `floatval`, range: -180.0 to 180.0 | `esc_attr( floatval( ... ) )` | **Yes** | GPS coordinate for Leaflet map pin |
| 15 | `_rahnab_company_contact_phone` | تلفن مستقیم / Phone Number | `string` | Tel input | Regex: `/^(?:\+98|0)?(?:[0-9]{2,3})[- ]?[0-9]{7,8}$/` | `esc_attr( 'tel:' . ... )` / `esc_html( ... )` | **Yes** | Direct facility landline telephone (supports `021-XXXXXXXX` & `+98`) |
| 16 | `_rahnab_company_contact_email` | ایمیل سازمانی / Official Email | `email` | Email input | `sanitize_email`, `is_email` check | `esc_attr( 'mailto:' . antispambot( ... ) )` / `esc_html( antispambot( ... ) )` | **Yes** | Inbound B2B inquiry email protected via antispambot |
| 17 | `_rahnab_company_brandmark_svg` | لوگوی برداری / Vector Logo | `attachment_id` | Media uploader (SVG/PNG) | `absint`, MIME: `image/svg+xml`, `image/png`, XML sanitized via Safe_SVG / DOMDocument parser | `wp_get_attachment_image()` or sanitized `wp_kses()` | **Yes** | High-DPI transparent vector emblem |
| 18 | `_rahnab_company_products_pipeline` | سبد محصولات و داروها / Products Pipeline | `serialized_json` | Structured repeater table | Schema check: `trade_name`, `generic`, `indication`, `stage`; recursive `array_map` with `sanitize_text_field()` | Decoded array elements passed to `esc_html()` / `esc_attr()` | No | Serialized JSON array of commercial and pipeline therapeutics |
| 19 | `_rahnab_company_facility_specs` | مشخصات فنی و تأسیسات / Facility & Technical Specs | `serialized_json` | Structured repeater table | Schema check (`title`, `cleanroom_grade`, `area_sqm`, `bioreactors`, `testing_scope`); recursive `array_map` with `sanitize_text_field()` before `wp_json_encode()` | Decoded JSON array; each element escaped via `esc_html()` and `esc_attr()` | No | Serialized JSON array of cleanrooms and physical plant capacities (e.g. `[{"title":"Bioprocess Suite","cleanroom_grade":"Grade B/C","area_sqm":1200,"bioreactors":"2x 500L Single-Use","testing_scope":"Upstream & Downstream scaling"}]`). |
| 20 | `_rahnab_company_facility_locations` | موقعیت کارخانه‌ها و سایت‌ها / Production Sites & Facility Locations | `text` | Textarea | `sanitize_textarea_field`, max 500 chars | `nl2br( esc_html( ... ) )` or `wp_kses_post( ... )` | **Yes** | Physical industrial facilities and plants distinct from central NIGEB headquarters (e.g. *سایت شماره ۲: شهرک صنعتی سپهر نظرآباد، مجتمع تفکیک پلاسما* / *Sepehr Industrial Complex, Safadasht*). |
| 21 | `_rahnab_company_facility_gallery` | گالری تصاویر تأسیسات و آزمایشگاه‌ها / Cleanroom & Laboratory Photo Gallery | `array` / `comma_separated_ids` | Media Gallery selector (multi-image uploader) | Array of `absint` attachment IDs; MIME validation (`image/jpeg`, `image/png`, `image/webp`) | `wp_get_attachment_image( $id, 'large' )`; `esc_url( wp_get_attachment_image_url( $id, 'full' ) )` for lightbox link | No | Comma-delimited list or array of media attachment IDs displaying certified cleanrooms, analytical HPLC systems, and bioreactor banks for `gallery-cleanroom.php`. |

### 4.2 Metadata Schema for `news` CPT (7 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 22 | `_rahnab_news_subtitle_fa` | زیرعنوان خبر (فارسی) / Subtitle FA | `string` | Text input | `sanitize_text_field`, max 250 chars | `esc_html()` | No | Secondary editorial lead sentence |
| 23 | `_rahnab_news_subtitle_en` | زیرعنوان خبر (انگلیسی) / Subtitle EN | `string` | Text input | `sanitize_text_field`, max 250 chars | `esc_html()` | No | English secondary editorial lead sentence |
| 24 | `_rahnab_news_related_company_id` | شرکت‌های مرتبط / Related Subsidiaries | `array_of_post_ids` | Select2 Multi-select / Checkbox list | Repeating scalar integer rows in DB; `absint` per row; verifies `company` post exists or `0` | `esc_html()`, `esc_url( get_permalink() )` | **Yes** | Repeating scalar foreign keys linking article to 1+ subsidiaries (`0` = Holding) |
| 25 | `_rahnab_news_press_release_pdf` | بیانیه رسمی (PDF) / Press Statement PDF | `attachment_id` | Media uploader (PDF) | `absint`, MIME: `application/pdf` | `esc_url( wp_get_attachment_url( ... ) )` | No | Downloadable official press release PDF (or Media Kit ZIP package) |
| 26 | `_rahnab_news_source_attribution` | منبع خبر / Source Attribution | `string` | Text input | `sanitize_text_field`, max 120 chars | `esc_html()` | No | Citation source (e.g. *روابط عمومی هلدینگ رهناب*) |
| 27 | `_rahnab_news_is_featured` | خبر برگزیده / Featured Hero Article | `boolean` | Checkbox / Toggle (`0`/`1`) | `rest_sanitize_boolean` | `(bool) $val ? 'checked' : ''` | **Yes** | Highlights article on homepage and archive hero banner |
| 28 | `_rahnab_news_reading_time` | مدت مطالعه (دقیقه) / Reading Time | `integer` | Readonly / Calculated | `absint`, auto-calculated on save (200 wpm) | `absint()`, `number_format_i18n()` | No | Integer minutes estimated reading time |

### 4.3 Metadata Schema for `event` CPT (8 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 29 | `_rahnab_event_start_datetime` | تاریخ و ساعت شروع / Start Date & Time | `datetime` | Date-time picker | ISO 8601 string: `Y-m-d H:i:s` | `esc_html()`, `esc_attr()` | **Yes** | Calendar ordering and lifecycle calculation |
| 30 | `_rahnab_event_end_datetime` | تاریخ و ساعت پایان / End Date & Time | `datetime` | Date-time picker | ISO 8601 string: `Y-m-d H:i:s`, >= Start | `esc_html()`, `esc_attr()` | **Yes** | Concluding timestamp |
| 31 | `_rahnab_event_venue_fa` | مکان برگزاری (فارسی) / Venue FA | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()` | **Yes** | Exhibition center or conference hall description |
| 32 | `_rahnab_event_venue_en` | مکان برگزاری (انگلیسی) / Venue EN | `string` | Text input | `sanitize_text_field`, max 200 chars | `esc_html()` | **Yes** | English venue description |
| 33 | `_rahnab_event_city_country` | شهر و کشور / City, Country | `string` | Text input | `sanitize_text_field`, max 100 chars | `esc_html()` | **Yes** | E.g. *Tehran, Iran* or *Dubai, UAE* |
| 34 | `_rahnab_event_booth_number` | شماره غرفه و سالن / Booth & Stand No. | `string` | Text input | `sanitize_text_field`, max 60 chars | `esc_html()`, `esc_attr()` | No | E.g. *Hall 5, Stand B-14* |
| 35 | `_rahnab_event_registration_url` | لینک ثبت‌نام / Registration URL | `url` | URL input | `esc_url_raw` | `esc_url()` | No | Outbound link to official event portal |
| 36 | `_rahnab_event_related_company_id` | شرکت‌های حاضر / Participating Entities | `array_of_post_ids` | Select2 Multi-select | Repeating scalar integer rows; `absint`, `0` = Holding | `esc_html()`, `esc_url( get_permalink() )` | **Yes** | Repeating scalar foreign keys linking event to 1+ participating subsidiaries |

### 4.4 Metadata Schema for `achievement` CPT (7 Fields)

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 37 | `_rahnab_achievement_award_date` | تاریخ اعطا یا ثبت / Award Date | `string` | Date picker (SH/AD) | String `YYYY-MM-DD` or year `139X` | `esc_html()` | **Yes** | Date certificate or license was issued |
| 38 | `_rahnab_achievement_issuing_body_fa` | مرجع صادرکننده (فارسی) / Issuing Body FA | `string` | Text input | `sanitize_text_field`, max 150 chars | `esc_html()` | **Yes** | E.g. *سازمان غذا و داروی وزارت بهداشت* |
| 39 | `_rahnab_achievement_issuing_body_en` | مرجع صادرکننده (انگلیسی) / Issuing Body EN | `string` | Text input | `sanitize_text_field`, max 150 chars | `esc_html()` | **Yes** | E.g. *Iran Food and Drug Administration (IFDA)* |
| 40 | `_rahnab_achievement_credential_id` | شماره مجوز یا پروانه / License / Reg ID | `string` | Text input | `sanitize_text_field`, max 80 chars | `esc_html()`, `esc_attr()` | No | Official license or patent registration code |
| 41 | `_rahnab_achievement_certificate_file` | تصویر گواهینامه / Certificate Document | `attachment_id` | Media uploader (PDF/Image) | `absint`, MIME: `image/*`, `application/pdf` | `esc_url( wp_get_attachment_url() )` | **Yes** | Scanned official certificate for modal inspection |
| 42 | `_rahnab_achievement_related_company_id` | نهاد صاحب دستاورد / Recipient Entity | `post_id` | Dropdown (`post_type=company`) | `absint`, `0` = Holding Umbrella | `esc_html()` | **Yes** | Scalar foreign key linking achievement to entity |
| 43 | `_rahnab_achievement_is_highlighted` | نمایش در شمارنده اعتبار / Trust Counter | `boolean` | Checkbox (`0`/`1`) | `rest_sanitize_boolean` | `(bool) $val ? 'checked' : ''` | **Yes** | Surfaces certificate in homepage credibility counters |

### 4.5 Metadata Schema for Helper CPT `team_member` (Governance & Leadership) — 8 Fields

| # | Field Key | Field Label (FA / EN) | Data Type | UI Input Component | Validation / Sanitization Rule | Output Escaping Function | Req? | Description & Storage Structure |
|:---:|:---|:---|:---:|:---|:---|:---|:---:|:---|
| 44 | `_rahnab_team_role_fa` | سمت و جایگاه سازمانی (فارسی) / Title FA | `string` | Text input | `sanitize_text_field`, max 120 chars | `esc_html()` | **Yes** | E.g. *رئیس هیئت‌مدیره* / *عضو شورای عالی علمی* |
| 45 | `_rahnab_team_role_en` | سمت و جایگاه سازمانی (انگلیسی) / Title EN | `string` | Text input | `sanitize_text_field`, max 120 chars | `esc_html()`, `esc_attr()` | **Yes** | E.g. *Chairman of the Board* / *Scientific Advisor* |
| 46 | `_rahnab_team_academic_title_fa` | رتبه علمی (فارسی) / Academic Degree FA | `string` | Text input | `sanitize_text_field`, max 80 chars | `esc_html()` | No | E.g. *دکترای تخصصی بیوتکنولوژی دارویی، استاد تمام* |
| 47 | `_rahnab_team_academic_title_en` | رتبه علمی (انگلیسی) / Academic Degree EN | `string` | Text input | `sanitize_text_field`, max 80 chars | `esc_html()` | No | E.g. *Pharm.D., Ph.D., Professor of Biopharmaceutics* |
| 48 | `_rahnab_team_council_category` | رکن راهبری / Governance Pillar | `select` | Dropdown select | In array: `['board', 'executive', 'scientific']` | `esc_attr()` | **Yes** | Categorizes leader on `/about/governance/` |
| 49 | `_rahnab_team_bio_summary_fa` | سوابق اجرایی و علمی (فارسی) / Biography FA | `text` | Textarea | `sanitize_textarea_field`, max 500 chars | `nl2br( esc_html( ... ) )` | No | Executive background summary in Persian |
| 50 | `_rahnab_team_bio_summary_en` | سوابق اجرایی و علمی (انگلیسی) / Biography EN | `text` | Textarea | `sanitize_textarea_field`, max 500 chars | `nl2br( esc_html( ... ) )` | No | Executive background summary in English |
| 51 | `_rahnab_team_linkedin_url` | پروفایل لینکدین / LinkedIn Profile | `url` | URL input | `esc_url_raw`, domain check `linkedin.com` | `esc_url()` | No | Official professional LinkedIn profile |

---

## 5. Entity Relational Architecture & Database Performance

### 5.1 Native Repeating Scalar Postmeta Model for Multi-Subsidiary Relations (M:N)
- **The Anti-Pattern:** Many WordPress themes store relationships as serialized arrays in `wp_postmeta` (e.g. `a:3:{i:0;s:2:"42";...}`). Querying this requires a SQL `LIKE '%"42"%'` wildcard search, triggering full table scans across hundreds of thousands of meta rows and causing severe server latency (>500ms).
- **The Rahnab Solution:** Joint ventures and collaborative announcements between subsidiaries are standard in biopharma holdings. All relationships are modeled via **native repeating scalar integer rows** in `wp_postmeta`:
  ```text
  post_id | meta_key                         | meta_value
  500     | _rahnab_news_related_company_id  | 42
  500     | _rahnab_news_related_company_id  | 55
  ```
- **Indexing & Performance Advantage:** Equality lookups via `WP_Query` with `meta_query` (`key = '_rahnab_news_related_company_id'`, `value = 42`, `compare = '='`, `type = 'NUMERIC'`) execute an exact equality B-Tree index lookup in MySQL (sub-2ms), completely eliminating serialized strings and table scans.
- **Save Contract (`rahnab_core`):**
  ```php
  delete_post_meta( $post_id, '_rahnab_news_related_company_id' );
  foreach ( $selected_company_ids as $company_id ) {
      add_post_meta( $post_id, '_rahnab_news_related_company_id', absint( $company_id ), false );
  }
  ```
- **Read Contract in Templates:**
  ```php
  // Returns array of integer IDs: [42, 55]
  $related_company_ids = get_post_meta( $post_id, '_rahnab_news_related_company_id', false );
  ```

### 5.2 Transient-Layer Caching & Lifecycle Invalidation Architecture

To deliver sub-50ms Time-To-First-Byte (TTFB) on high-traffic corporate holding pages while preventing N+1 database queries, reverse relational queries are cached in the WordPress Transient API.

#### 5.2.1 Deterministic, Locale-Scoped Transient Key Standard
All transient keys are strictly scoped by language/locale (using `fa_IR` or `en_US` derived from Polylang's `pll_current_language('locale')` or `get_locale()`) and stay well within WordPress's 172-character transient key limit:

| Cache Scope | Transient Key Pattern | TTL | Data Cached |
|:---|:---|:---:|:---|
| **Global Featured News** | `rahnab_home_feat_news_{$locale}` | 6 Hours | Array of latest 3 featured news objects with thumbnails and formatted dual dates for the homepage hero. |
| **Subsidiary News Feed** | `rahnab_comp_{$company_id}_news_{$locale}` | 12 Hours | Array of latest 3 published news articles linked to the specified subsidiary ID. |
| **Subsidiary Achievements** | `rahnab_comp_{$company_id}_ach_{$locale}` | 24 Hours | Array of verified credentials, GMP seals, and patent IDs linked to the specified subsidiary ID. |
| **Subsidiaries Archive Summary** | `rahnab_subsidiaries_summary_{$locale}` | 24 Hours | Batch pre-fetched array of all 7 subsidiaries with metadata, pipeline counts, and primary cluster pills, eliminating N+1 queries on `/subsidiaries/`. |

#### 5.2.2 Dual-ID Cache Invalidation & Post-Save Lifecycle Hooks
Cache invalidation in `rahnab_core` executes on `save_post`, `wp_trash_post`, `before_delete_post`, and `untrash_post`.

##### Multi-ID & Reassignment Invalidation Algorithm:
1. **Pre-Save Interception:** On `save_post_news`, `save_post_event`, and `save_post_achievement`:
   - Inspect existing database values before meta update:
     `$old_company_ids = get_post_meta( $post_id, '_rahnab_..._related_company_id', false );`
   - Read incoming company IDs from `$_POST`: `$new_company_ids`.
   - Merge both sets: `$impacted_ids = array_unique( array_filter( array_merge( (array)$old_company_ids, (array)$new_company_ids ) ) );`
2. **Purge Affected Entities Across All Locales:**
   - For every ID in `$impacted_ids`:
     - Delete `rahnab_comp_{$id}_news_fa_IR` and `rahnab_comp_{$id}_news_en_US`
     - Delete `rahnab_comp_{$id}_ach_fa_IR` and `rahnab_comp_{$id}_ach_en_US`
3. **Purge Global Holding Aggregates:**
   - Delete `rahnab_home_feat_news_fa_IR` and `rahnab_home_feat_news_en_US`
   - Delete `rahnab_subsidiaries_summary_fa_IR` and `rahnab_subsidiaries_summary_en_US`
4. **Company Profile Updates:**
   - When a post of type `company` is saved or trashed:
     - Delete `rahnab_comp_{$post_id}_news_{$locale}` and `rahnab_comp_{$post_id}_ach_{$locale}` for all active locales.
     - Delete `rahnab_subsidiaries_summary_{$locale}` for all active locales.

### 5.3 Post Lifecycle Hooks & Strict Defensive Rendering Contract

#### 5.3.1 Automated Lifecycle Cleanup Hooks (`rahnab_core`)
To prevent dangling foreign keys and maintain relational database integrity without native MySQL CASCADE constraints:

1. **`before_delete_post` Hook:**
   When a post of type `company` is permanently deleted:
   - Execute targeted SQL cleanup via `$wpdb` in `rahnab_core`:
     Delete all rows from `wp_postmeta` where `meta_key` IN (`_rahnab_news_related_company_id`, `_rahnab_event_related_company_id`, `_rahnab_achievement_related_company_id`) AND `meta_value = $deleted_post_id`.
   - For any child post that now possesses zero related companies, insert a fallback record with `meta_value = 0` (Holding Umbrella).
2. **`wp_trash_post` Hook:**
   When a `company` post is moved to Trash:
   - Purge all transient caches associated with this company ID.
   - Retain database records intact so that restoring the post via `untrash_post` immediately restores relationships without data loss.
3. **`untrash_post` Hook:**
   - Invalidate transients to immediately restore published relationships across all locales.

#### 5.3.2 Strict Defensive Rendering Contract in Templates
All Classic WordPress template files and template parts resolving company relationships MUST execute through a defensive helper function (`rahnab_get_related_companies()`) and enforce PHP 8 nullsafe checks:

```php
/**
 * Safely resolves related company objects for a given post.
 *
 * @param int $post_id Post ID (news, event, achievement).
 * @param string $meta_key Relational meta key.
 * @return WP_Post[] Array of valid, published WP_Post objects. Empty array if Holding or none.
 */
function rahnab_get_related_companies( int $post_id, string $meta_key = '_rahnab_news_related_company_id' ): array {
    $raw_ids = get_post_meta( $post_id, $meta_key, false );
    if ( empty( $raw_ids ) ) {
        return [];
    }

    $valid_companies = [];
    foreach ( (array) $raw_ids as $cid ) {
        $cid = absint( $cid );
        if ( $cid > 0 ) {
            $company = get_post( $cid );
            // Verify object exists and is publicly published (not trashed, draft, or private)
            if ( $company instanceof WP_Post && 'publish' === get_post_status( $company ) ) {
                $valid_companies[] = $company;
            }
        }
    }
    return $valid_companies;
}
```

Templates render subsidiary badges if `!empty($valid_companies)`. If empty (or containing only `0`), templates safely output the Holding Umbrella badge (*روابط عمومی هلدینگ رهناب*) with zero fatal errors and zero 404 links.

---

## 6. Classic WordPress Template Hierarchy Specifications

### 6.1 Core Template Files (13 Core Templates + Taxonomy Templates)

| Template Filename | Template Type | WordPress Hierarchy Hook | Core Content & Data Blocks |
|:---|:---|:---|:---|
| `front-page.php` | Static Front Page | `is_front_page()` | Hero vision, 7-subsidiary value-chain matrix (`flow-matrix.php`), proof engine counters, latest 3 press items, B2B gateway. |
| `page-about.php` | Page Template | `is_page('about')` | Genesis timeline, 4 strategic pillars, leadership preview, infrastructure video, PDF dossier. |
| `page-governance.php` | Page Template | `is_page('governance')` | Board of Directors, Executive Committee, Scientific Advisory Council (`team_member` query). |
| `page-infrastructure.php`| Page Template | `is_page('infrastructure')` | Cleanrooms, 150kL fractionation refinery, analytical laboratories, pure utilities. Aggregates facility metadata across all 7 subsidiaries. |
| `page-compliance.php` | Page Template | `is_page('compliance')` | GMP seals, IFDA collaborator plaques, ISO certifications, ethics charters. |
| `archive-company.php` | Custom Post Archive | `is_post_type_archive('company')` | Biomanufacturing value-chain overview, interactive cluster filter bar, 7-subsidiary responsive cards. |
| `single-company.php` | Single Custom Post | `is_singular('company')` | 8-zone canonical subsidiary profile (Specs, Pipeline, Cleanroom Gallery, Related News, Contact Card). |
| `archive-news.php` | Custom Post Archive | `is_post_type_archive('news')` | Editorial category filter pills (`news_category`), lead milestone hero card (`card-news-featured.php`), paginated 3-column news grid (`card-news.php`), dual-date badges (Solar Hijri & Gregorian), entity filter bar. Handles the `/news-events/` archive rewrite route and `/news-events/entity/{slug}/` filter via custom query var `company_slug`. |
| `single-news.php` | Single Custom Post | `is_singular('news')` | Lead article headline, dual-date badges, calculated reading time, editorial typography, downloadable official press release PDF (`_rahnab_news_press_release_pdf`), related corporate entity badge card (`widget-related-news.php`), previous/next pagination. |
| `archive-event.php` | Custom Post Archive | `is_post_type_archive('event')` | Industrial congress and symposium directory (`/events/`), taxonomy filter pills (`event_type`), tabbed view (Upcoming vs. Concluded), interactive calendar card grid (`card-event.php`), venue & booth badges, registration gateways. |
| `single-event.php` | Single Custom Post | `is_singular('event')` | Event header & visual cover, start/end date-time badge, venue name & physical address (`_rahnab_event_venue_fa/en`), booth/hall coordinates (`_rahnab_event_booth_number`), participating subsidiary badge(s), event countdown timer, direct registration CTA link (`_rahnab_event_registration_url`). |
| `taxonomy-value_chain_stage.php`| Taxonomy Archive | `is_tax('value_chain_stage')` | Filtered archive showing only companies in a specific value-chain cluster. Registered with `'top'` rewrite priority. |
| `taxonomy-news_category.php` | Taxonomy Archive | `is_tax('news_category')` | Filtered editorial category feed for news releases. |
| `page-contact.php` | Page Template | `is_page('contact')` | Central directory, interactive NIGEB campus map, CSRF nonce-protected B2B inquiry form. |
| `404.php` | Error Handler | `is_404()` | Editorial branded 404 screen with search and direct routing to ecosystem directory. |

#### 6.1.1 Routing Architecture for Consolidated `/news-events/` Hub & Entity Filters
- **Archive Route:** The CPT registration for `news` sets `'has_archive' => 'news-events'` and `'rewrite' => ['slug' => 'news-events', 'with_front' => false]`. Visiting `https://rahnab.com/news-events/` triggers `is_post_type_archive('news')` and automatically loads `archive-news.php`.
- **Entity Filter Rewrite Endpoint:** Deliverable 01 specifies `/news-events/entity/{slug}/`. In `rahnab_core`, register a custom rewrite rule:
  - Regex: `^news-events/entity/([^/]+)/?$`
  - Target: `index.php?post_type=news&company_slug=$matches[1]`
  - Template Loader: Resolved natively by `archive-news.php` which detects `get_query_var('company_slug')` and applies the relational `meta_query` (`_rahnab_news_related_company_id = $company_id`).

### 6.2 Modular Template Parts Architecture (`template-parts/` - 15 Parts)

```text
template-parts/
├── header/
│   ├── nav-desktop.php         -> Floating glassmorphic desktop navigation pill
│   ├── nav-mobile.php          -> Off-canvas mobile drawer with thumb-zone ergonomics
│   └── language-switcher.php   -> Bilingual toggle with 30-day cookie persistence
├── footer/
│   ├── footer-directory.php    -> 4-column corporate directory with 7 subsidiary links
│   └── footer-legal.php        -> Copyright, national biosecurity statements, legal links
├── home/
│   └── flow-matrix.php         -> Interactive biomanufacturing value-chain narrative matrix
├── company/
│   ├── card-company.php        -> Responsive portfolio card (logo, name, tier, metrics)
│   ├── drawer-company.php      -> Quick-reveal slide-over summary drawer
│   ├── table-pipeline.php      -> Commercial therapeutics & pipeline catalog table
│   └── gallery-cleanroom.php   -> Lightbox photo gallery for genuine laboratory assets
├── news/
│   ├── card-news.php           -> 3-column editorial card with dual-date badges
│   ├── card-news-featured.php  -> Full-width horizontal hero milestone card
│   └── widget-related-news.php -> Cross-linked subsidiary press releases
├── achievement/
│   ├── badge-certificate.php   -> Interactive GMP/ISO accreditation seal badge
│   └── modal-credential.php    -> High-res scanned certificate preview lightbox
└── common/
    └── b2b-cta-banner.php      -> High-contrast institutional collaboration banner
```

---

## 7. Admin UX & Editorial Workflow Specifications

### 7.1 Custom Admin Columns & Quick Filters
To streamline editorial workflows for holding communications officers:

#### 7.1.1 `company` Admin List (`edit.php?post_type=company`)
- **Columns (`manage_company_posts_columns`):**
  - Brandmark Thumbnail (48px), Persian Title, English Legal Name, 11-digit National ID, Value-Chain Stage Pill, Live Website Outbound Link, Display Order (`menu_order`), Bilingual Polylang Flags, Date.
- **Filters:**
  - Quick dropdown filter by `value_chain_stage` taxonomy.

#### 7.1.2 `news` Admin List (`edit.php?post_type=news`)
- **Columns (`manage_news_posts_columns`):**
  - Media Thumbnail, Headline, Related Subsidiary Badges (or *هلدینگ رهناب*), Category Pill, Featured Toggle (AJAX star icon), Attached PDF Indicator, Bilingual Flags, Date.
- **Filters:**
  - Dropdown by `news_category` AND Dropdown by `_rahnab_news_related_company_id`.

#### 7.1.3 `event` Admin List Screen (`edit.php?post_type=event`)
- **Columns (`manage_event_posts_columns`):**
  1. `cb`: Bulk checkbox.
  2. `thumbnail`: Featured cover preview (48x48px rounded).
  3. `title`: Event Title (Persian display name).
  4. `event_type`: Event Type Taxonomy Pill (*نمایشگاه / همایش علمی / کنگره بین‌المللی*).
  5. `event_dates`: Start & Concluding Date/Time with dual Solar Hijri and Gregorian badges.
  6. `venue`: Venue & City description (*مرکز همایش‌های رازی، تهران*).
  7. `participating_subsidiary`: Participating Subsidiary Badges (e.g. *نوژین زیست*, *پرسیس ژن*, or *هلدینگ رهناب*).
  8. `reg_status`: Registration link status indicator (Dashicon external link if active URL present).
  9. `languages`: Polylang translation flags & status.
  10. `date`: Publication timestamp.
- **Custom Quick Filters:**
  - Dropdown filter by `event_type` taxonomy.
  - Dropdown filter by `_rahnab_event_related_company_id`.
  - Date status filter: `[All Events | Upcoming | Concluded]`.
- **Sortable Columns:** `event_dates` (`_rahnab_event_start_datetime`), `title`.

#### 7.1.4 `achievement` Admin List Screen (`edit.php?post_type=achievement`)
- **Columns (`manage_achievement_posts_columns`):**
  1. `cb`: Bulk checkbox.
  2. `file_preview`: Scanned certificate thumbnail / PDF preview icon with modal trigger.
  3. `title`: Credential Title (e.g. *گواهی انطباق با اصول GMP*).
  4. `recipient_entity`: Recipient Subsidiary Badge (e.g. *پادرا سرم البرز* or *هلدینگ رهناب*).
  5. `achievement_type`: Credential Type Taxonomy Pill (*GMP / IFDA / ISO / Patent*).
  6. `issuing_body`: Issuing Authority (*سازمان غذا و دارو*).
  7. `award_date`: Date Issued / Registered.
  8. `credential_id`: Official License / Patent Filing Code.
  9. `is_highlighted`: Trust Engine Status (Interactive AJAX star icon to toggle homepage prominence).
  10. `languages`: Polylang translation flags.
  11. `order`: Numeric `menu_order` for sorting display sequence.
- **Custom Quick Filters:**
  - Dropdown filter by `achievement_type` taxonomy.
  - Dropdown filter by `_rahnab_achievement_related_company_id`.
  - Toggle filter: `[All Credentials | Surfaced in Trust Engine]`.
- **Sortable Columns:** `award_date` (`_rahnab_achievement_award_date`), `order` (`menu_order`), `title`.

### 7.2 Tabbed Metabox Organization
Custom fields in the post editor are organized into structured, horizontal tabs to prevent endless scrolling:
- **Tab 1: Identifiers & Legal:** Legal names (FA/EN), National ID, Registration Number, Foundation Years.
- **Tab 2: Value Chain & Stature:** Value-chain summary, CEO names, strategic mandate.
- **Tab 3: Facilities & Technical Specs:** Cleanroom grades, bioreactor capacities, analytical testing scopes, plant locations (`_rahnab_company_facility_specs`, `_rahnab_company_facility_locations`, `_rahnab_company_facility_gallery`).
- **Tab 4: Contact & Coordinates:** Address, GPS coordinates, direct phone, official email.
- **Tab 5: Digital Assets:** Vector SVG logo, PDF fact sheet, high-res cleanroom photo gallery.

### 7.3 Bilingual Synchronization Architecture (Polylang / WPML)
Strict rules govern field synchronization between Persian (`fa-IR`) and English (`en-US`):

```text
BILINGUAL METADATA SYNCHRONIZATION RULES
┌───────────────────────────────────┬────────────────────────────────────┐
│ 🔒 LOCKED & AUTOMATICALLY SYNCED  │ 🌐 INDEPENDENTLY TRANSLATED        │
├───────────────────────────────────┼────────────────────────────────────┤
│ • National Company ID (شناسه ملی) │ • Display Title & Corporate Name   │
│ • Registration Filing Number      │ • Executive Biography & Overview   │
│ • Foundation Years (SH & AD)      │ • Value-Chain Role Narrative       │
│ • GPS Coordinates (Lat / Lng)     │ • Physical Street Address          │
│ • Central Telephone & Email       │ • CEO / Executive Title            │
│ • Official Outbound Website URL   │ • News Headline, Subtitle & Body   │
│ • Event Start & End Timestamps    │ • Event Venue & City Description   │
│ • Vector SVG Logo Media ID        │ • Achievement Issuing Body Name    │
│                                   │ • Relational Post Links (Explicit) │
│                                   │ • SEO Meta Titles & Descriptions   │
└───────────────────────────────────┴────────────────────────────────────┘
```

#### 7.3.1 Polylang Relational Mapping & Automated Reverse Backfill Hook
To prevent cross-language relational corruption and maintain unbroken bidirectional links:

1. **Decouple from Default Raw Copy:**
   In `rahnab_core`, register the `pll_copy_post_metas` filter to **exclude** relational keys (`_rahnab_*_related_company_id`), ensuring raw Persian post IDs are never blindly copied into English posts.
2. **Translation Fallback Rule:**
   When translating an article, if `pll_get_post( $source_company_id, $target_lang )` returns `false` (subsidiary translation does not exist yet):
   - Set `_rahnab_news_related_company_id` to `0` (Holding Umbrella).
   - Display a non-blocking administrative notice in the post editor: *"توجه: شرکت وابسته به این خبر هنوز ترجمه انگلیسی ندارد. انتساب خبر به طور موقت روی هلدینگ رهناب قرار گرفت."*
3. **Automated Reverse Backfill Hook (`pll_save_post` on `company`):**
   When a new English translation for a `company` post is published:
   - Identify the source Persian company ID (`$fa_company_id`).
   - Query all English posts whose Persian counterparts referenced `$fa_company_id`.
   - Automatically update their `_rahnab_news_related_company_id` to the newly published English company ID.
   - Purge transients across both locales.

---
*Authored and verified by Milestone 1 Architecture Team (`worker_m1_author`).*
