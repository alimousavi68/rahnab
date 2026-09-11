# DELIVERABLE 03: Content Hierarchy & Corporate Storytelling Narrative
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-IA-M1-03`  
**Classification:** Information Architecture, Content Prioritization & Data Source Specifications  
**Author:** Milestone 1 Architecture Author (`worker_m1_author`)  
**Status:** Approved Architectural Blueprint  
**Target Audience:** B2B Pharmaceutical Executives, Healthcare Regulators, Institutional Investors, Academic Researchers  
**Constraint Level:** Architectural Specification (Zero PHP Implementation Code)  

---

## 1. Executive Content Strategy: The Sovereign Holding Story

The content architecture for Rahnab Pharmed decisively rejects the generic, fragmented "card grid" characteristic of consumer pharmaceutical sites and template themes. Instead, the portal deploys an **editorial narrative architecture** that establishes national biopharmaceutical sovereignty, demonstrating how 7 specialized subsidiaries form an unbroken, high-technology value chain.

```text
THE CORPORATE HOLDING NARRATIVE ARC
┌─────────────────────────────────────────────────────────────────────────────┐
│ 1. SOVEREIGN MANDATE       -> Monumental vision: Biotech self-reliance      │
│ 2. STRATEGIC THESIS        -> Why holding structure overcomes biotech risks │
│ 3. 7-TIER VALUE CHAIN      -> Interactive flow from R&D to batch release    │
│ 4. PROOF ENGINE            -> Hard metrics: 150kL refinery, cleanrooms, GMP │
│ 5. EDITORIAL PULSE         -> Curated breakthroughs, trials, and press      │
│ 6. INSTITUTIONAL GATEWAY   -> Direct enterprise B2B collaboration funnel    │
└─────────────────────────────────────────────────────────────────────────────┘
```

---

## 2. Homepage Content Architecture: The 6 Sovereign Narrative Zones

```text
HOMEPAGE STRUCTURAL ANATOMY (FRONT-PAGE)
┌─────────────────────────────────────────────────────────────────────────────┐
│ ZONE 1: HERO VISION & SOVEREIGN MANDATE                                     │
│ • Visual: Dynamic cinematic biomolecular canvas with depth field            │
│ • Headline: «پیشگام حاکمیت زیست‌فناوری و استقلال دارویی کشور»                │
│ • Subtitle: هلدینگ سرمایه‌گذاری رهناب فارمد؛ هم‌افزایی سرمایه، دانش و صنعت  │
│   در تکمیل زنجیره ارزش فرآورده‌های زیستی راهبردی                            │
│ • CTAs: [کشف زیست‌بوم رهناب ↓]  |  [ارتباط با دبیرخانه هلدینگ →]             │
│ • Quantitative Proof Strip (4 High-Contrast Counters):                      │
│   - ۷ شرکت تخصصی و دانش‌بنیان (7 High-Tech Operating Ventures)             │
│   - ۱۵۰,۰۰۰ لیتر ظرفیت سالانه پالایش پلاسما (Annual Fractionation Capacity)  │
│   - ۷۰٪+ سهم تأمین پادزهرها و سرم‌های حیاتی کشور (>70% National Antivenom)   │
│   - ۱۰۰٪ زنجیره ارزش بیودارویی بومی و مستقل (Sovereign Closed Loop)          │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 2: STRATEGIC HOLDING THESIS & ORCHESTRATION                            │
│ • Editorial 2-Column Split:                                                 │
│   - Left: The Institutional Challenge (High capital barrier, regulatory     │
│     hurdles, long clinical trial horizons in biopharma).                    │
│   - Right: The Rahnab Solution (Centralized capital allocation, centralized │
│     GMP infrastructure, regulatory acceleration, and collective synergy).   │
│ • 4 Core Strategic Pillars:                                                 │
│   1. نوآوری مولکولی و شتاب‌دهی (Persis Gene)                                │
│   2. تأمین بیولوژیک و مراکز اهدا (Tamin Plasma)                             │
│   3. تولید سنگین صنعتی و پالایشگاه (Nozhin Zist & Padra Serum)              │
│   4. ایمنی زیستی و کنترل کیفی مرجع (Arc Zist Azma)                          │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 3: THE 7-SUBSIDIARY BIOMANUFACTURING FLOW MATRIX                       │
│ • Architectural Template Part: `template-parts/home/flow-matrix.php`        │
│   (MANDATORY: Prevents collapsing into a generic card grid by implementing  │
│    an unbroken, step-by-step biomanufacturing supply chain workflow).       │
│ • Centerpiece interactive ecosystem representation:                         │
│   - Unbroken horizontal/vertical flow showing material transformation:      │
│     Incubation (Persis) -> Harvesting (Tamin) -> Fractionation (Nozhin) ->  │
│     Cell Therapy (KarayaKhteh) -> Antitoxins (Padra) -> Fill-Finish (Baya)  │
│     -> Certified Batch Release (Arc Zist Azma).                             │
│ • Real-time cluster filter tabs (R&D, Plasma, Cell Therapy, Antidotes, QC). │
│ • 7 Interactive Subsidiary Dossier Nodes (Flow-connected):                  │
│   - Vector Brandmark & Legal Name                                           │
│   - Value-chain tier badge & active stage sequence number                   │
│   - Key capacity metric (e.g. 150kL / 70% supply / First QC lab in IR)      │
│   - Quick-reveal drawer trigger + Full profile deep link                    │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 4: NATIONAL SCALE & SCIENTIFIC INFRASTRUCTURE                          │
│ • Authentic Photographic Proof Engine:                                      │
│   - Sepehr Industrial Plasma Refinery (Nazarabad, Alborz)                   │
│   - Class A/B Cleanrooms & Pilot Bioreactors (Persis Gene & Safadasht)      │
│   - Bioassay & LC-MS Mass Spectrometry Suites (Arc Zist Azma at NIGEB)      │
│ • Official Regulatory Accreditation Grid:                                   │
│   - Iran Food and Drug Administration (IFDA) Collaborator Laboratory Plaque │
│   - Ministry of Health National GMP Conformity Certificates                 │
│   - Presidential Vice Presidency Knowledge-Based Enterprise Seals           │
│   - ISO 9001, ISO 13485, and ISO/IEC 17025 Accreditations                   │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 5: EDITORIAL MILESTONES & SCIENTIFIC PULSE                             │
│ • 3 Featured High-Impact Press Items:                                       │
│   - 1 Lead Milestone Hero Card (Image, Title, Excerpt, Read Time, Category) │
│   - 2 Secondary Editorial Cards with Solar Hijri & Gregorian dual dates     │
│ • Cross-entity attribution tag linking to participating subsidiary          │
│ • Outbound link: «مشاهده آرشیو کامل اخبار و اطلاعیه‌ها ←»                   │
├─────────────────────────────────────────────────────────────────────────────┤
│ ZONE 6: INSTITUTIONAL B2B ENGAGEMENT GATEWAY                                │
│ • High-contrast full-width corporate conversion banner                      │
│ • Direct departmental routing:                                              │
│   - B2B Pharma Contract Inquiries & Bioprocess Scale-Up                     │
│   - Investment & Financial Institutional Relations                          │
│   - Scientific Research & Academic Incubation Proposals                     │
│ • Primary Action: [ارسال پیام به دبیرخانه راهبردی هلدینگ]                    │
└─────────────────────────────────────────────────────────────────────────────┘
```

---

## 3. Page-by-Page Content Hierarchy & Prioritization

### 3.1 About Rahnab (`page-about.php`)
- **Zone 1: Corporate Genesis Scrollytelling:** Interactive timeline narrating the evolution from biotech venture capital to sovereign biomanufacturing holding.
- **Zone 2: Strategic Pillars:** 4 cards detailing Research Acceleration, Scale Biomanufacturing, Healthcare Security, and Ethical Governance.
- **Zone 3: Governance & Leadership Preview:** Highlighting the Board of Directors, Executive Committee, and Scientific Advisory Council (deep links to `/about/governance/`).
- **Zone 4: Industrial Footprint Overview:** Highlighting the physical campus network (NIGEB, Sepehr, Safadasht, Karaj).
- **Zone 5: Institutional Video Walkthrough:** 4K video showcase of operating cleanrooms and industrial facilities.
- **Zone 6: Downloadable Corporate Dossier:** PDF Fact Sheet with file size and SHA verification.

### 3.2 Corporate Governance (`page-governance.php`)
- **Zone 1: Governance Philosophy & Framework:** Holding stewardship model and fiduciary responsibilities.
- **Zone 2: Board of Directors (هیئت‌مدیره):** Professional photo, legal position, background, and academic credentials.
- **Zone 3: Executive Leadership Committee (کمیته اجرایی):** Operational leaders managing holding finances, legal, supply chain, and regulatory affairs.
- **Zone 4: Scientific & Medical Advisory Council (شورای علمی و راهبردی):** Distinguished professors, biotechnologists, and clinical trialists from NIGEB and TUMS.
- **Zone 5: Organizational Hierarchy Infographic:** Vector chart detailing reporting lines between holding and subsidiary management.

### 3.3 Industrial & Laboratory Infrastructure (`page-infrastructure.php`)
- **Zone 1: Physical Asset Summary:** Total cleanroom square meters, bioreactor liters, cold-storage volume.
- **Zone 2: Sepehr Plasma Fractionation Refinery:** Deep-dive into the 150,000L facility, cold ethanol fractionation, CIP systems.
- **Zone 3: NIGEB Innovation Hub:** Pilot laboratories, incubator cleanrooms, and molecular engineering suites.
- **Zone 4: Safadasht Bioprocess & Fill-Finish Plant:** Chromatography, tangential flow filtration, sterile vial packaging.
- **Zone 5: Arc Zist Azma Analytical Testing Suites:** Bioassay cell culture rooms, LC-MS instrumentation, Class A sterility isolators.
- **Zone 6: Environmental & Quality Systems:** Pure steam, WFI generation, HVAC Class A-D zoning, biosafety standards.

### 3.4 Regulatory Compliance & Accreditations (`page-compliance.php`)
- **Zone 1: Institutional Compliance Statement:** Adherence to WHO-GMP, European Pharmacopoeia (EP), and IFDA statutes.
- **Zone 2: Accreditation Certificate Vault:** Filterable grid of official licenses (GMP, ISO 17025, IFDA Collaborator, Knowledge-Based).
- **Zone 3: High-Resolution Scanned Plaque Modals:** Lightbox viewer displaying official seals with certificate registration numbers.
- **Zone 4: Quality & Ethics Charters:** Corporate social responsibility, research ethics, and environmental stewardship charters.

### 3.5 Subsidiaries Directory (`archive-company.php`)
- **Zone 1: Value-Chain Introduction:** Macro overview explaining why vertical integration is critical to biopharmaceutical self-sufficiency.
- **Zone 2: Cluster Taxonomy Filter Bar:** Interactive filter tabs (`all`, `rd-incubation`, `source-plasma`, `plasma-fractionation`, `cell-therapy`, `hyperimmune-sera`, `fill-finish`, `quality-control`).
- **Zone 3: 7-Subsidiary Portfolio Grid:** Full cards with brandmarks, legal titles, national IDs, key capacity metrics, and action buttons.
- **Zone 4: Upstream / Downstream Synergy Matrix:** Infographic showing how each subsidiary feeds the next in the holding supply chain.

### 3.6 Single Subsidiary Profile (`single-company.php`)
- **Zone 1: Hero Identity & Brandmark:** Bilingual titles, national ID badge, website button.
- **Zone 2: Executive Role in Holding:** Detailed narrative explaining the subsidiary's role in Rahnab's mission.
- **Zone 3: Quantitative Capacity & Metrics:** 3-4 high-contrast numbers (e.g. 150,000L capacity, >70% market share).
- **Zone 4: Commercial & Pipeline Products:** Tabulated medicines or technical services.
- **Zone 5: Facility & Cleanroom Photo Gallery:** High-resolution documentary photography.
- **Zone 6: Regulatory Seals & Accreditations:** Applicable GMP/ISO/IFDA certifications.
- **Zone 7: Ecosystem Synergies & Related Press:** Recent news tagged to this entity.
- **Zone 8: Direct Contact & Facility Card:** Phone, email, address, and dedicated inquiry button.

### 3.7 News Hub (`archive-news.php`) & Events Hub (`archive-event.php`)
- **News Hub (`archive-news.php`):**
  - **Zone 1: Editorial Taxonomy Filter Pills:** Filter by Holding Milestones, Subsidiary Releases, Scientific Breakthroughs, Regulatory Approvals.
  - **Zone 2: Featured Lead Article:** Full-width hero card for the most critical strategic announcement (`_rahnab_news_featured`).
  - **Zone 3: Paginated Editorial Grid:** 3-column card grid with dual Solar Hijri & Gregorian date badges, read-time calculation, and subsidiary attribution tags.
  - **Zone 4: Official Press Kit Download:** Media Kit ZIP archive (`_rahnab_news_media_kit_zip`) containing high-res 300-DPI imagery and official holding backgrounder PDF.
- **Events Hub (`archive-event.php`):**
  - **Zone 1: Temporal Filter Tabs:** Upcoming Conferences / Symposia vs Historical Archives.
  - **Zone 2: Featured Event Banner:** Hero showcase for upcoming international congresses or holding summit.
  - **Zone 3: Event Dossier Grid:** Cards featuring location/venue, dates, booth/hall numbers, and calendar download link (.ics).
  - **Zone 4: Event Participation & Registration CTAs:** Deep-link to symposium RSVP or abstract submission portals.

### 3.8 Contact & Institutional Relations (`page-contact.php`)
- **Zone 1: Central Communications Directory:** Direct phone lines, official emails, executive secretariat details.
- **Zone 2: Interactive Campus Map:** Leaflet map centered on NIGEB headquarters (`35.7483° N, 51.1834° E`) with custom pin.
- **Zone 3: Enterprise B2B Inquiry Form:** Departmental routing dropdown (Partnership, Investment, Regulatory, Careers), CSRF nonce protection.
- **Zone 4: Visiting Protocols:** Access instructions for the NIGEB campus and industrial production sites.

---

## 4. Master Data Source Mapping Table

| Template File | Content Zone | Primary Data Source | Fallback / Query Logic | Sanitization & Security Rule |
|:---|:---|:---|:---|:---|
| `front-page.php` | Zone 1: Hero & Metrics | ACF Options (`rahnab_hero_metrics`) | Hardcoded holding metrics fallback | `absint`, `esc_html` |
| `front-page.php` | Zone 2: Strategic Thesis | Theme Options (Editorial RichText) | Default Persian holding vision copy | `wp_kses_post` |
| `front-page.php` | Zone 3: 7-Subsidiary Matrix (`flow-matrix.php`) | `WP_Query(['post_type' => 'company'])` | Ordered by `menu_order` ASC | Post title, sanitized custom meta |
| `front-page.php` | Zone 4: Infrastructure Gallery | ACF Gallery (`holding_facility_photos`) | Static NIGEB/Sepehr verified asset array | `esc_url` on media URLs |
| `front-page.php` | Zone 5: Curated News & Events | `WP_Query(['post_type' => ['news', 'event'], 'posts_per_page' => 3])` | Latest published press items & events | `esc_html`, Solar Hijri date formatting |
| `front-page.php` | Zone 6: B2B Gateway Banner | Theme Options (Headline + Target URL) | Routes to `#b2b-inquiry` anchor | `esc_url`, `esc_html` |
| `page-about.php` | Zone 1: Timeline Steps | ACF Repeater (`history_timeline_steps`) | Static corporate milestone data | Sanitized JSON schema |
| `page-about.php` | Zone 3: Governance Preview | `WP_Query(['post_type' => 'team_member'])` | Filtered by `role_tier = 'board'` | Post title, `_rahnab_member_title` |
| `page-about.php` | Zone 6: Factsheet Download | ACF File (`corporate_dossier_pdf`) | Media attachment ID verification | `absint`, `wp_get_attachment_url` |
| `page-infrastructure.php` | Zones 1-6: Facility Specifications | Theme Options / Post Meta (`_rahnab_facility_*`) | NIGEB, Sepehr, Safadasht, Arc Zist Azma assets | `esc_html`, `wp_kses_post`, `esc_url` |
| `page-compliance.php` | Zones 1-4: Certificates Grid | Post Meta / Option Vault (`rahnab_certifications`) | IFDA, GMP, ISO plaques with registration numbers | `esc_html`, `esc_attr`, `esc_url` |
| `archive-company.php`| Zone 2: Cluster Filters | `get_terms(['taxonomy' => 'value_chain_stage'])` | Standard taxonomy term list | `esc_html`, slug sanitization |
| `archive-company.php`| Zone 3: Company Cards | Main Loop (`post_type => 'company'`) | Paginated 12 per page | Post thumbnail, metadata keys |
| `single-company.php` | Zone 1: Legal IDs & URL | Post Meta (`_rahnab_company_*`) | Custom meta table values | `esc_url`, regex on National ID |
| `single-company.php` | Zone 4: Products Pipeline | Post Meta JSON (`_rahnab_company_products_pipeline`) | Serialized product objects | `json_decode`, field-by-field escaping |
| `single-company.php` | Zone 5: Facilities & Cleanrooms | Post Meta (`_rahnab_company_facility_specs`, `_gallery`) | Structured facility JSON & gallery attachments | `json_decode`, `esc_html`, `wp_get_attachment_image` |
| `single-company.php` | Zone 7: Related News Feed | Transient `rahnab_company_{$id}_news` | Fallback: `WP_Query` with repeating scalar FK | Transient cached query results |
| `archive-news.php` | Zones 1-4: News Hub Grid | Main Loop (`post_type => 'news'`) | Standard paginated query with category filter | `esc_html`, Solar Hijri date formatting |
| `single-news.php` | Zone 1: Headline & Subtitle | Native Post Title + `_rahnab_news_subtitle` | Standard post object fields | `esc_html` |
| `single-news.php` | Zone 3: Related Company Card | Post Meta (`_rahnab_news_related_company_id`) | Post title & logo of linked company | `absint`, `get_permalink` |
| `archive-event.php` | Zones 1-4: Events Hub Grid | Main Loop (`post_type => 'event'`) | Meta query: orderby `_rahnab_event_start_date` | `esc_html`, `esc_attr` |
| `single-event.php` | Zones 1-3: Event Details | Post Meta (`_rahnab_event_*`) | Dates, venue, booth number, external URL | `esc_html`, `esc_url`, `esc_attr` |
| `page-contact.php` | Zone 2: Campus Map Pin | Theme Options (`nigeb_geo_lat`, `nigeb_geo_lng`) | Lat: `35.7483`, Lng: `51.1834` | `floatval` coordinates |
| `page-contact.php` | Zone 3: Inquiry Form | POST Request via `admin-post.php` handler | CSRF Nonce check (`check_admin_referer`)| `sanitize_text_field`, `sanitize_email` |

---
*Authored and verified by Milestone 1 Architecture Team (`worker_m1_author`).*
