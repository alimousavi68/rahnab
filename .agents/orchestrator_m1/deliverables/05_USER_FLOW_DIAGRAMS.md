# DELIVERABLE 05: Enterprise B2B User Flow Diagrams
## Rahnab Pharmed Corporate Life-Science Holding Website (`rahnab.com`)

**Document Code:** `RAHNAB-IA-M1-05`  
**Classification:** Enterprise User Experience, Behavioral Journeys & Conversion Architecture  
**Author:** Milestone 1 Architecture Author (`worker_m1_author`)  
**Status:** Approved Architectural Blueprint  
**Target Audiences:** Pharmaceutical Corporate Clients, Institutional Investors, Science Journalists, Academic Research Partners  
**Constraint Level:** Architectural Specification (Zero PHP Implementation Code)  

---

## 1. Executive Summary & Flow Topology

The user flow architecture is designed around high-value B2B stakeholders rather than casual retail consumers. Each journey maps an intentional path from initial landing to institutional conversion, eliminating dead ends, establishing scientific proof early, and providing frictionless access to decision-makers.

```text
MASTER USER FLOW TOPOLOGY
┌─────────────────────────┐     ┌─────────────────────────┐
│   JOURNEY 1: B2B CLIENT │     │   JOURNEY 2: INVESTOR   │
│   Discovery & Contract  │     │  Governance & Assets    │
│      Manufacturing      │     │       Evaluation        │
└────────────┬────────────┘     └────────────┬────────────┘
             │                               │
             ▼                               ▼
┌─────────────────────────────────────────────────────────┐
│              RAHNAB PHARMED CORPORATE PORTAL            │
│   (Sovereign Mandate, 7-Subsidiary Value-Chain Matrix)  │
└────────────────────────────┬────────────────────────────┘
                             │
             ┌───────────────┴───────────────┐
             ▼                               ▼
┌─────────────────────────┐     ┌─────────────────────────┐
│   JOURNEY 3: PRESS/MEDIA│     │  JOURNEY 4: ACADEMIC    │
│   Official Statements   │     │  Biotech Incubation &   │
│     & Media Assets      │     │  Clinical Collaboration │
└─────────────────────────┘     └─────────────────────────┘
```

---

## 2. Journey 1: B2B Pharma Client Discovery & Contract Manufacturing

- **Persona:** Dr. Kianoush Moradi, Vice President of Business Development at an Iranian biopharmaceutical enterprise seeking contract biological quality control testing (bioassays, peptide mapping) and plasma fractionation capacity.
- **Entry Point:** Organic Search (`"آزمایشگاه همکار غذا و دارو کنترل کیفی بیولوژیک"` or `"پالایشگاه پلاسمای انسانی ایران"`) or Direct Referral.
- **Core Intent:** Evaluate technical compliance, cleanroom capabilities, and IFDA accreditation before initiating an enterprise manufacturing/testing contract.

### 2.1 Behavioral Flow Diagram

```text
[Step 1: Arrives at Homepage (rahnab.com)]
   │
   ▼
[Step 2: Inspects Hero Vision & Quantitative Proof Strip]
   ├── Verifies 150,000L Fractionation Capacity
   └── Verifies First Biological QC Lab in Iran (Arc Zist Azma)
   │
   ▼
[Decision Gate 1: How to explore the subsidiary portfolio?]
   ├── Option A: Expands "شرکت‌های زیرمجموعه" Floating Header Mega-Menu
   │     └── Selects "آرک زیست آزما (کنترل کیفی بیولوژیک)" or "نوژین زیست فارمد (پلاسما)"
   │
   └── Option B: Scrolls to Zone 3 "ماتریس زنجیره ارزش بیودارویی"
         ├── Clicks Filter Tab: «کنترل کیفی و استانداردها»
         └── Clicks "مشاهده شناسنامه تخصصی شرکت" on Arc Zist Azma Card
   │
   ▼
[Step 3: Lands on Single Subsidiary Profile: /subsidiaries/arc-zist-azma/]
   │
   ▼
[Step 4: Evaluates Technological Capabilities & Trust Seals]
   ├── Zone 1: Confirms National ID `14003984672` & Reg `452779`
   ├── Zone 3: Checks Bioassay Potency, LC-MS Peptide Mapping & Sterility Testing Specs
   ├── Zone 5: Inspects IFDA Collaborator Laboratory Plaque & ISO 17025 Accreditations
   └── Zone 6: Reviews High-Resolution Laboratory Cleanroom Photo Gallery
   │
   ▼
[Decision Gate 2: Ready to initiate formal inquiry?]
   │
   ▼
[Step 5: Conversion Trigger — Clicks «ثبت درخواست همکاری B2B با این مجموعه»]
   │
   ▼
[Step 6: Redirected to /contact#b2b-form with Department & Entity Pre-Populated]
   ├── Form pre-selects: "همکاری B2B / کنترل کیفی و آزمایشگاهی (آرک زیست آزما)"
   ├── User inputs: Full Name, Corporate Email, Pharma Company Name, Project Scope
   └── CSRF Nonce Verification & Field Sanitization executed on submission
   │
   ▼
[Step 7: Instant Confirmation Modal + Reference Tracking ID + Auto-Email Receipt]
```

### 2.2 Friction Prevention Mechanisms:
- **No Blind Forms:** The contact form automatically pre-selects the subsidiary and service category the user was viewing, removing redundant selections.
- **Immediate Proof:** Regulatory badges and genuine cleanroom photos are visible above the fold on the single subsidiary template.

---

## 3. Journey 2: Institutional Investor Governance & Capital Assets Overview

- **Persona:** Sarah Jenkins, Senior Investment Analyst at an international life-sciences fund evaluating Iranian biopharmaceutical infrastructure and holding governance.
- **Entry Point:** Direct access to English portal `https://rahnab.com/en/` via financial dossier citation or LinkedIn.
- **Core Intent:** Assess corporate governance transparency, executive leadership credentials, physical capital assets (refineries, cleanrooms), and regulatory standing.

### 3.1 Behavioral Flow Diagram

```text
[Step 1: Arrives at English Homepage (rahnab.com/en/)]
   │
   ▼
[Step 2: Scans Institutional Narrative & Sovereign Stature]
   ├── Notes 7-subsidiary closed-loop integration
   └── Identifies national health security mandate
   │
   ▼
[Step 3: Navigates to Governance Suite (/en/about/governance/)]
   ├── Reviews Board of Directors profiles & fiduciary oversight
   ├── Evaluates Executive Management Committee operational experience
   └── Examines Academic credentials of Scientific Advisory Council (NIGEB, TUMS)
   │
   ▼
[Step 4: Navigates to Physical Infrastructure Dossier (/en/about/infrastructure/)]
   ├── Inspects Sepehr Plasma Fractionation Refinery specifications (150,000L capacity)
   ├── Evaluates Safadasht downstream chromatography & sterile fill-finish lines
   └── Verifies NIGEB research suites and cleanroom square footage
   │
   ▼
[Step 5: Navigates to Compliance & Accreditations (/en/compliance/)]
   ├── Reviews National GMP certificates and WHO guideline conformity
   └── Inspects ISO 9001, ISO 13485, and ISO/IEC 17025 verification keys
   │
   ▼
[Step 6: Conversion Trigger — Clicks «Download Corporate Fact Sheet (PDF)»]
   │
   ▼
[Step 7: Secondary Conversion — Clicks «Connect with Investor Relations»]
   └── Transits to /en/contact/ with "Investor Relations" pre-selected
```

### 3.2 Friction Prevention Mechanisms:
- **Consolidated Authority:** Governance, physical assets, and compliance are presented across dedicated subpages rather than buried in generic blog posts.
- **One-Click Fact Sheet:** The PDF fact sheet is available directly in the header and governance footer with clear file size and SHA integrity indications.

---

## 4. Journey 3: Press & Media Official Statements & Media Kit Assets

- **Persona:** Reza Daneshvar, Senior Healthcare & Biotechnology Correspondent for national and regional medical news agencies.
- **Entry Point:** Social media press link, Telegram/Bale broadcast, or News Hub landing.
- **Core Intent:** Verify official statements regarding national antivenom production and export milestones, download high-resolution media assets, and obtain official quotes.

### 4.1 Behavioral Flow Diagram

```text
[Step 1: Arrives at News & Events Hub (/news-events/)]
   │
   ▼
[Step 2: Filters News Archive]
   ├── Clicks Category Pill: «دستاوردهای علمی و خودکفایی» (Scientific Breakthroughs)
   │   OR
   ├── Filters by Entity: «پادرا سرم البرز» (Padra Serum Alborz)
   │
   ▼
[Step 3: Selects Lead Press Release]
   └── Headline: «تأمین بیش از ۷۰ درصد پادزهرهای مار و عقرب کشور توسط پادرا سرم البرز»
   │
   ▼
[Step 4: Enters Single Article View (/news-events/padra-serum-national-antivenom-supply/)]
   ├── Reads verified statistical report with dual Solar Hijri / Gregorian dates
   ├── Notes official citation from Iran Food and Drug Administration (IFDA)
   ├── Inspects high-resolution photography of equine hyperimmune serum production
   └── Clicks linked entity badge: verifies Padra Serum Alborz corporate standing
   │
   ▼
[Step 5: Conversion Trigger A — Clicks «دانلود بیانیه رسمی و کیت رسانه‌ای (ZIP)»]
   └── Resolves `_rahnab_news_media_kit_zip` attachment ID: Downloads pre-packaged ZIP archive
       containing official statement PDF, vector brandmarks, and high-res 300-DPI authorized photographs
   │
   ▼
[Step 6: Conversion Trigger B — Clicks «ارتباط با روابط عمومی و دبیرخانه رسانه‌ای»]
   └── Direct click-to-call or direct email to holding communications secretariat
```

### 4.2 Friction Prevention Mechanisms:
- **Direct Media Kit Asset Pipeline:** Media assets are pre-compiled and served directly via `_rahnab_news_media_kit_zip`, eliminating broken third-party links, watermarked previews, or manual image extraction.
- **Dual Dating:** Both Solar Hijri and Gregorian dates are clearly displayed to support domestic and international publication deadlines.
- **Verified Entity Attribution:** Every release explicitly links to the respective subsidiary entity profile, ensuring journalists have immediate access to registered corporate IDs and verified technical credentials.

---

## 5. Journey 4: Academic & Startup Biotechnology Incubation Collaboration

- **Persona:** Dr. Maryam Sadeghi, University Professor and Principal Investigator at an academic medical center with an engineered recombinant monoclonal antibody clone seeking incubation and clinical scale-up.
- **Entry Point:** University research portal citation, biotech conference link, or direct navigation.
- **Core Intent:** Discover accelerator infrastructure, pilot cleanrooms, and venture scale-up mechanisms within Rahnab's Persis Gene.

### 5.1 Behavioral Flow Diagram

```text
[Step 1: Lands on Homepage -> Searches for Accelerator / Incubation Engine]
   │
   ▼
[Step 2: Identifies Persis Gene within Zone 3 Biomanufacturing Flow Matrix]
   └── Clicks "پرسیس ژن (شتاب‌دهنده زیست‌فناوری)"
   │
   ▼
[Step 3: Enters Single Profile Page: /subsidiaries/persis-gene/]
   ├── Evaluates Incubation Phases (Pre-incubation 2-4 months -> Acceleration 15-24 months)
   ├── Inspects Pilot Cleanrooms (Class C and Class B suites for mammalian/microbial cultures)
   ├── Verifies Analytical Capabilities (HPLC, Mass Spectrometry, In-Vitro Bioassays)
   └── Reviews Proven Track Record: Commercial spin-outs and recombinant biosimilars
   │
   ▼
[Step 4: Decision Gate — Proposal Submission Readiness]
   │
   ▼
[Step 5: Conversion Trigger — Clicks «ارسال طرح پژوهشی و درخواست انکوباسیون»]
   │
   ▼
[Step 6: Routes to Dedicated B2B Proposal Gateway (/contact#research-proposal)]
   ├── Form pre-selects: "شتاب‌دهی و طرح‌های پژوهشی (Persis Gene)"
   ├── Enforces strict file validation: PDF only (`application/pdf`), max 20MB (within server limit 32MB)
   ├── Enforces strict NDA and intellectual property disclosure statements
   └── CSRF Nonce (`wp_verify_nonce`) + Rate-limiting protection (max 3 submissions/IP/24h)
   │
   ▼
[Step 7: Automated Receipt Dispatch & Secure Document Ingestion]
   ├── Securely stores proposal in protected directory: `wp-content/uploads/secure_proposals/`
   ├── Enforces server execution barrier: `.htaccess` restricts direct HTTP access (`Deny from all`)
   ├── Dispatches automated receipt with encrypted tracking token to applicant
   └── Notifies Scientific Evaluation Committee via encrypted internal holding notification
```

### 5.2 Friction Prevention & Technical Security Specifications:
- **IP Protection Assurance:** A clear intellectual property non-disclosure notice is displayed directly on the submission form, removing academic hesitation.
- **Structured Criteria:** The page clearly articulates technology readiness level (TRL) requirements before proposal upload.
- **Server Upload Directives:** Ingestion architecture mandates explicit PHP environment configuration:
  - `upload_max_filesize = 32M`
  - `post_max_size = 32M`
  - `memory_limit = 256M`
- **Strict Server-Side MIME Validation:** Client-side file extensions are disregarded; the server verifies true MIME type using `finfo_file(FILEINFO_MIME_TYPE)` strictly requiring `application/pdf`. Executable payloads, archives, or polyglot scripts are immediately rejected.
- **Protected Storage Architecture:** Uploaded dossiers are placed in `wp-content/uploads/secure_proposals/` with generated non-guessable cryptographic filenames (UUIDv4). The directory is hardened with an Apache `.htaccess` rule:
  ```apache
  # Prevent direct script execution and unauthorized HTTP access
  Deny from all
  ```
  Files are only retrievable by authorized holding committee members via authenticated administrative proxy streams.

---
*Authored and verified by Milestone 1 Architecture Team (`worker_m1_author`).*
