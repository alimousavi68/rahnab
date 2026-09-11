# Handoff Report: Milestone 0 Requirements Discovery & Gap Specification

**Agent:** Requirements & Gap Spec Miner (`spec_miner_m0_reqs`)  
**Parent Orchestrator ID:** `e94d1606-4030-40be-9956-d0ddcc68d422`  
**Handoff Type:** Hard Handoff (Task Complete)  
**Date:** 2026-09-09T19:04:00+03:30  
**Primary Deliverable File:** `/Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md`

---

## 1. Observation
1. **Primary Brief Scope (`docs/MASTER_PROJECT_BRIEF.md`, Lines 1–527):**
   - Line 6: Corporate Name: "شرکت رهناب فارمد" / "Rahnab Pharmed".
   - Line 8: Entity Nature: "هلدینگ سرمایه‌گذاری رهناب فارمد".
   - Line 12: Declared Domain: `rahnab.com`.
   - Lines 22–34: Primary 5 menu items: "صفحه اصلی", "درباره ما", "شرکت‌های زیرمجموعه", "تماس با ما", "اخبار و رویدادها".
   - Lines 54–70: Exactly 7 subsidiaries declared: "پرسیس ژن", "نوژین زیست فارمد", "پاترا سرم", "کارایاخته", "تامین پلاسما", "السلام", "بایا".
   - Lines 77–92: Subsidiary click interaction revealing summary and data (Name, Logo, Description, Therapeutic Area, Role, Capabilities, Products, Achievements, Website, Contact/Location).
   - Lines 135–144: News & Events proposed 6 categories: All, Rahnab News, Subsidiary News, Events, Exhibitions, Achievements.
   - Lines 153–164: Confirmed Contact Data: Email: `info@rahnab.com`, Phone: `021-49361200`, Address: "تهران، بلوار پژوهش، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری، طبقه ۳، واحد ۳۰۲", Social: LinkedIn "Rahnab Pharmed".
   - Lines 167–181: Form Fields: Name, Email/Phone, Subject, Message, Company Name, Job Title.
   - Lines 184–207: Additional contact components listed as unprovided: Fax, Mobile, Messengers, Offices, Geolocation Map, Working Hours, FAQ.
   - Lines 211–228: Trust / Credibility modules: Statistics, Achievements, Awards, Certifications.
   - Lines 240–257: Bilingual requirement: Persian RTL (default) and English LTR, true bidirectional layout from prototype phase.
   - Lines 270–293: Target Audience: B2B pharmaceutical companies, corporate/institutional, zero B2C/consumer retail elements.
   - Lines 340–405: Visual and Art Direction: "Super Premium / Sophisticated / High-End / Scientific / Corporate / Dynamic", GSAP scroll storytelling, micro-interactions, magnetic CTAs.
   - Lines 411–435: Prohibited Anti-Patterns: Generic corporate templates, Bootstrap aesthetics, cheap medical website, cliché pharma blue, stock photo overload, excessive gradients, glassmorphism, random animations, visual clutter, dashboard-like UI, consumer-healthcare aesthetic.
   - Lines 441–492: Dual-phase delivery: Phase A Prototype (HTML/CSS/JS, GSAP, Tailwind) -> Phase B WordPress (Classic Custom Theme, modular, no page builders).
   - Lines 497–523: Content Model: Rahnab, Companies, News, Events, Achievements, Certifications, Management/Team, Media, Contact.
2. **Project Rules (`.agents/rules/`):**
   - `code-quality.md`: Modularity, avoid hardcoding, prioritize readability.
   - `decision-making.md`: Present multiple options with pros/cons, prioritize maintainability.
   - `html-conversion.md`: Maintain exact layout, visual hierarchy, typography, responsive behavior; distinguish template parts from dynamic content.
   - `wordpress-development.md`: Classic Theme standards, escaping (`esc_html`, `esc_attr`), sanitization, nonces.
   - `project-workflow.md`: Analysis -> Plan -> Implementation -> Review. No arbitrary deletions or unapproved architectural changes.

---

## 2. Logic Chain
1. **Deduction from Brief §1, §11, §14:** Rahnab Pharmed is not a single drug manufacturer like CinnaGen, but an investment holding group. Therefore, the visual hierarchy and information architecture must elevate the *holding ecosystem* (governance, capital, acceleration, portfolio scale) rather than a single product catalog.
2. **Deduction from Brief §2, §3, §8:** The 7 subsidiaries vary widely in public maturity (from mature entities like Persis Gene to stealth entities like Al Salam and Baya). Consequently, the UI component system must be *content-resilient*; cards must maintain visual balance even when secondary data (e.g. external URL or product list) is absent, omitting empty buttons cleanly.
3. **Deduction from Brief §6, §7:** Several essential pieces of corporate data (fax, working hours, exact GMP license scans, board bios, quantitative counters) were mentioned as potential items in the questionnaire but are missing from the brief text. These cannot be invented or guessed; per the prompt's integrity warning and user rules, each item must be explicitly categorized as a Content Gap and tagged with `[CLIENT CONFIRMATION REQUIRED]`.
4. **Deduction from Brief §9, §14, §16:** True bidirectional RTL/LTR support requires architectural discipline from Milestone 0. This means pairing Persian typography (Dana/Yekan Bakh/Peyda) with English typography (Plus Jakarta Sans/Inter) with calibrated x-heights, utilizing CSS Logical Properties (`margin-inline-start`, etc.), and ensuring the language switcher preserves page context.
5. **Deduction from Brief §15:** To avoid the 11 prohibited anti-patterns, the visual palette must move away from standard `#0d6efd` hospital blue to high-contrast deep bio-slate, obsidian, titanium white, and clinical emerald accents, supported by authentic documentary imagery and GSAP-driven purposeful motion.

---

## 3. Caveats
1. **Subsidiary Verification in Progress by Peer Agent:** Deep web and registry verification of the 7 subsidiary entities is being executed in parallel by `explorer_m0_subsidiaries`. All subsidiary requirements identified in this report are aligned with the master brief baseline and include explicit tags for required client confirmation.
2. **Competitive Benchmark Insights Pending from Peer Agent:** Detailed technical analysis of `cinnagen.com` and international life-science benchmarks is being performed by `explorer_m0_benchmarks`. The findings in this report establish the baseline criteria (anti-cloning, premium holding positioning) that benchmark recommendations must adhere to.
3. **No Code Implementation in Milestone 0:** In strict compliance with Milestone 0 boundaries and the Specification Miner archetype, no HTML prototype or WordPress theme files have been created. All work is purely analytical and architectural.

---

## 4. Conclusion
Milestone 0 Deliverables 1, 4, and 5 have been exhaustively completed and compiled into `/Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md`. The document provides:
- **Deliverable 1 (Requirements Document):** 11 detailed sub-sections capturing business information, website structure, B2B audience behaviors, data field schemas, corporate credibility modules, subsidiary display rules, contact touchpoints, bidirectional language rules, art direction, anti-patterns, and technical UX foundations.
- **Deliverable 4 (Content Gap Analysis):** A 9-category checklist containing 38 granular content items rated by severity (Critical, Medium, Minor) with unambiguous status tags.
- **Deliverable 5 (Research Questions):** 15 mission-critical research questions categorized across Business Strategy, Brand & Identity, Content & Assets, and Technical & Architecture.
- **Specification Mining Tables:** 20 discovered features and 10 system edge cases documented with inputs, outputs, and constraints.
- **Traceability Matrix:** 100% verification across all 17 sections of `MASTER_PROJECT_BRIEF.md`.

This artifact provides the foundational blueprint for Milestone 1 (Information Architecture) and Milestone 2 (UX & Wireframing).

---

## 5. Verification Method
To independently verify the completeness and integrity of this handoff:
1. **File Existence & Integrity Inspection:**
   ```bash
   ls -la /Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md
   wc -l /Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md
   ```
   *Expected Output:* File exists, size > 50KB, line count = 540 lines.
2. **Tagging Discipline Audit:**
   ```bash
   grep -o "CLIENT CONFIRMATION REQUIRED" /Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md | wc -l
   grep -o "RESEARCH REQUIRED" /Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md | wc -l
   ```
   *Expected Output:* Dozens of occurrences verifying genuine isolation of unknowns without fabrication.
3. **Anti-Pattern Compliance Audit:**
   ```bash
   grep -A 15 "### 4.10 Prohibited Anti-Patterns" /Users/user/Sites/localhost/rahnab/.agents/spec_miner_m0_reqs/requirements_and_gaps_report.md
   ```
   *Expected Output:* All 11 prohibited items from Section 15 of `MASTER_PROJECT_BRIEF.md` verified.
4. **Traceability Verification:**
   Inspect Section 7 of the report to verify complete mapping of all 17 brief sections.

---
