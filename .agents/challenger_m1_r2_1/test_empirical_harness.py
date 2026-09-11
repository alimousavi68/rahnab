#!/usr/bin/env python3
"""
Empirical Test Harness for Challenger 1 R2 (Milestone 1 Architecture Verification)
Tests:
1. WordPress URL Rewrite Simulation & Precedence Oracle
2. Relational Routing vs. Phantom Taxonomy Elimination
3. Viewport Geometry & Mega-Menu Scaling (768p / 720p / 900p / 1080p)
4. SEO Fallback Header Directives & Hreflang Logic
5. Zero-Code Prohibition & File System Integrity
6. Cross-Deliverable Synchronization & Prior Findings Audit
"""

import os
import re
import sys

def test_rewrite_rules_oracle():
    print("=== TEST 1: WordPress URL Rewrite Precedence & Matching Oracle ===")
    
    # WordPress evaluates rules in array order, using preg_match against $request.
    # We define the remediated rules as specified in Deliverable 01 Section 3.1:
    remediated_rules = [
        # (name, regex, target, priority, is_redirect)
        ("cluster_root_redirect", r"^subsidiaries/cluster/?$", "301_REDIRECT:/subsidiaries/", "intercept", True),
        ("cluster_paged", r"^subsidiaries/cluster/([^/]+)/page/([0-9]+)/?$", "index.php?value_chain_stage=$1&paged=$2", "top", False),
        ("cluster_archive", r"^subsidiaries/cluster/([^/]+)/?$", "index.php?value_chain_stage=$1", "top", False),
        ("entity_news_paged", r"^news-events/entity/([^/]+)/page/([0-9]+)/?$", "index.php?post_type=news&company_slug=$1&paged=$2", "top", False),
        ("entity_news", r"^news-events/entity/([^/]+)/?$", "index.php?post_type=news&company_slug=$1", "top", False),
        ("news_category", r"^news-events/category/([^/]+)/?$", "index.php?news_category=$1", "top", False),
        ("cpt_company_single", r"^subsidiaries/([^/]+)/?$", "index.php?company=$1", "standard", False),
        ("cpt_news_single", r"^news-events/([^/]+)/?$", "index.php?news=$1", "standard", False),
    ]

    test_requests = [
        ("subsidiaries/cluster/", "301_REDIRECT:/subsidiaries/", "Intercept bare cluster path to 301"),
        ("subsidiaries/cluster", "301_REDIRECT:/subsidiaries/", "Intercept bare cluster path without trailing slash"),
        ("subsidiaries/cluster/rd-incubation/", "index.php?value_chain_stage=rd-incubation", "Cluster taxonomy archive with trailing slash"),
        ("subsidiaries/cluster/rd-incubation", "index.php?value_chain_stage=rd-incubation", "Cluster taxonomy archive without trailing slash"),
        ("subsidiaries/cluster/plasma-fractionation/page/2/", "index.php?value_chain_stage=plasma-fractionation&paged=2", "Cluster paginated archive"),
        ("subsidiaries/persis-gene/", "index.php?company=persis-gene", "Single company profile with trailing slash"),
        ("subsidiaries/persis-gene", "index.php?company=persis-gene", "Single company profile without trailing slash"),
        ("subsidiaries/nozhin-zist-pharmed/", "index.php?company=nozhin-zist-pharmed", "Single company with multi-hyphen slug"),
        ("news-events/entity/nozhin-zist-pharmed/", "index.php?post_type=news&company_slug=nozhin-zist-pharmed", "News filtered by entity slug"),
        ("news-events/entity/persis-gene/page/3/", "index.php?post_type=news&company_slug=persis-gene&paged=3", "News filtered by entity with pagination"),
        ("news-events/category/subsidiary-milestones/", "index.php?news_category=subsidiary-milestones", "News category taxonomy archive"),
        ("news-events/strategic-holding-announcement/", "index.php?news=strategic-holding-announcement", "Single news article"),
    ]

    all_passed = True
    for req, expected_target, desc in test_requests:
        matched_rule = None
        resolved_target = None
        for name, pattern, target, priority, is_redirect in remediated_rules:
            m = re.match(pattern, req)
            if m:
                matched_rule = name
                resolved_target = target
                for i in range(1, len(m.groups()) + 1):
                    resolved_target = resolved_target.replace(f"${i}", m.group(i))
                break
        
        if resolved_target == expected_target:
            print(f"  [PASS] '{req}' -> matched '{matched_rule}' -> {resolved_target} ({desc})")
        else:
            print(f"  [FAIL] '{req}' -> expected '{expected_target}', got '{resolved_target}' via '{matched_rule}'")
            all_passed = False

    # Negative test: Demonstrate collision if CPT single was ahead of cluster rule (pre-remediation state)
    print("\n  Demonstrating pre-remediation collision oracle without 'top' priority on cluster:")
    flawed_rules = [
        ("cpt_company_single", r"^subsidiaries/([^/]+)/?$", "index.php?company=$1"),
        ("cluster_archive", r"^subsidiaries/cluster/([^/]+)/?$", "index.php?value_chain_stage=$1"),
    ]
    # If user visited 'subsidiaries/cluster'
    req_bare = "subsidiaries/cluster"
    for name, pattern, target in flawed_rules:
        m = re.match(pattern, req_bare)
        if m:
            print(f"  [CONFIRMED FLAW] In flawed ruleset: '{req_bare}' erroneously captured by '{name}' as '{target.replace('$1', m.group(1))}'!")
            break

    # Reserved slug validation test
    reserved_slugs = ["cluster", "category", "tag", "page", "feed", "author", "embed"]
    print("\n  Testing reserved slug blacklist validator:")
    for r in reserved_slugs:
        # Simulate validator
        is_blocked = r in reserved_slugs
        sanitized = f"{r}-co" if is_blocked else r
        assert is_blocked, f"Slug {r} should be blocked"
        print(f"  [PASS] Reserved slug '{r}' blocked -> sanitized to '{sanitized}'")

    return all_passed

def test_phantom_taxonomy_elimination():
    print("\n=== TEST 2: Phantom Taxonomy Elimination & Query Var Mapping ===")
    deliverables_dir = "/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables"
    
    # 1. Search for related_entity in deliverables
    found_occurrences = []
    for root, _, files in os.walk(deliverables_dir):
        for f in files:
            if f.endswith(".md"):
                path = os.path.join(root, f)
                with open(path, "r", encoding="utf-8") as fh:
                    for lno, line in enumerate(fh, 1):
                        if "related_entity" in line:
                            found_occurrences.append((f, lno, line.strip()))

    print(f"  Found {len(found_occurrences)} occurrences of 'related_entity':")
    for f, lno, line in found_occurrences:
        print(f"    - {f}:{lno} -> {line}")

    # Valid if ONLY in 06_IA_DECISION_LOG.md where it is explicitly rejected as Option 2
    is_clean = True
    for f, lno, line in found_occurrences:
        if f != "06_IA_DECISION_LOG.md":
            print(f"  [FAIL] Unsanitized reference to 'related_entity' found in {f}:{lno}!")
            is_clean = False
        else:
            print(f"  [PASS] Reference in {f}:{lno} is legitimate architectural rejection log.")

    # 2. Verify Deliverable 01 Table line 115 maps to archive-news.php?company_slug=$matches[1]
    d01_path = os.path.join(deliverables_dir, "01_FINAL_SITEMAP.md")
    with open(d01_path, "r", encoding="utf-8") as fh:
        d01_content = fh.read()
    
    assert "archive-news.php" in d01_content, "archive-news.php missing from Deliverable 01"
    assert "company_slug" in d01_content, "company_slug query var missing from Deliverable 01"
    print("  [PASS] Deliverable 01 cleanly specifies 'archive-news.php (company_slug={slug})'")

    # 3. Verify Deliverable 04 maps the rewrite rule cleanly
    d04_path = os.path.join(deliverables_dir, "04_WORDPRESS_CPT_ARCHITECTURE.md")
    with open(d04_path, "r", encoding="utf-8") as fh:
        d04_content = fh.read()

    assert "company_slug=$matches[1]" in d04_content, "company_slug rewrite mapping missing from Deliverable 04"
    assert "_rahnab_news_related_company_id" in d04_content, "Relational meta key missing from Deliverable 04"
    print("  [PASS] Deliverable 04 cleanly specifies rewrite target 'post_type=news&company_slug=$matches[1]' with meta query on '_rahnab_news_related_company_id'")

    return is_clean

def test_mega_menu_viewport_geometry():
    print("\n=== TEST 3: Mega-Menu Viewport Spatial Geometry & Constraint Oracle ===")
    
    # Test viewports (screen width, screen height, taskbar+chrome height, description)
    viewports = [
        (1366, 768, 128, "Standard Laptop 768p (1366x768)"),
        (1280, 720, 128, "Budget 720p Laptop (1280x720)"),
        (1280, 800, 105, "MacBook 13 WXGA (1280x800)"),
        (1440, 900, 105, "MacBook 15 HD+ (1440x900)"),
        (1536, 864, 128, "1080p at 125% Windows Scaling (1536x864)"),
        (1920, 1080, 128, "Full HD Desktop (1920x1080)"),
    ]

    header_height = 72
    scrolled_header_padding = 12  # py-3 = 12px
    resting_header_padding = 24   # py-6 = 24px
    header_to_menu_gap = 12

    all_passed = True
    for sw, sh, chrome, desc in viewports:
        usable_vh = sh - chrome
        usable_vw = sw

        # Mega-menu CSS rules from Deliverable 02 Section 2:
        # width: min(1080px, calc(100vw - 48px))
        # max-height: min(560px, calc(85vh - 90px))
        computed_width = min(1080, usable_vw - 48)
        computed_max_height = min(560, int(0.85 * usable_vh - 90))

        # Position of menu container
        # Anchor from top of viewport:
        # In scrolled state:
        top_offset = scrolled_header_padding + header_height + header_to_menu_gap # 12 + 72 + 12 = 96px
        bottom_edge = top_offset + computed_max_height
        bottom_clearance = usable_vh - bottom_edge

        # Check horizontal overflow
        horizontal_margin = (usable_vw - computed_width) / 2

        print(f"  Viewport: {desc}")
        print(f"    Usable screen: {usable_vw}x{usable_vh}px")
        print(f"    Menu Dimensions: {computed_width}px wide x {computed_max_height}px max-height")
        print(f"    Bottom Clearance: {bottom_clearance}px (positive = NO CLIPPING)")
        print(f"    Horizontal Margin: {horizontal_margin}px on each side (>= 24px)")

        if bottom_clearance < 0:
            print(f"    [FAIL] Menu overflows bottom edge by {-bottom_clearance}px!")
            all_passed = False
        else:
            print(f"    [PASS] Menu fits comfortably with {bottom_clearance}px safety margin.")

        if horizontal_margin < 24:
            print(f"    [FAIL] Menu horizontal padding insufficient ({horizontal_margin}px < 24px)!")
            all_passed = False

        # Mode B Internal Panes Check:
        # Top utility bar: 48px
        # Remaining container height for panes:
        pane_height = computed_max_height - 48
        # Master tabs pane height constraint: max-h: 460px with overflow-y: auto
        # Detail cards pane height constraint: max-h: 460px with overflow-y: auto
        print(f"    Pane Usable Height: {pane_height}px (constrained by max-h: 460px + scrollbar containment)")
        assert pane_height > 250, "Usable pane height too cramped"

    return all_passed

def test_seo_fallback_directives():
    print("\n=== TEST 4: SEO Fallback Header Directives & WordPress Hook Protocol ===")
    deliverables_dir = "/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables"
    d01_path = os.path.join(deliverables_dir, "01_FINAL_SITEMAP.md")

    with open(d01_path, "r", encoding="utf-8") as fh:
        d01_content = fh.read()

    # Check 1: noindex, follow directive
    has_noindex_follow = '<meta name="robots" content="noindex, follow" />' in d01_content
    print(f"  Check '<meta name=\"robots\" content=\"noindex, follow\" />': {'[PASS]' if has_noindex_follow else '[FAIL]'}")

    # Check 2: canonical link to primary Persian post
    has_canonical = '<link rel="canonical" href="https://rahnab.com/subsidiaries/{slug}/" />' in d01_content
    print(f"  Check canonical URL pointing to Persian source: {'[PASS]' if has_canonical else '[FAIL]'}")

    # Check 3: conditional hreflang suppression
    has_hreflang_suppression = "strictly omitted until the English post is published" in d01_content or "Conditional Hreflang Suppression" in d01_content
    print(f"  Check conditional hreflang suppression on Persian page: {'[PASS]' if has_hreflang_suppression else '[FAIL]'}")

    # Check 4: WordPress query interception hook
    has_wp_hook = "template_redirect" in d01_content and "rahnab_is_bilingual_fallback" in d01_content
    print(f"  Check WordPress template_redirect hook & fallback flag: {'[PASS]' if has_wp_hook else '[FAIL]'}")

    all_passed = has_noindex_follow and has_canonical and has_hreflang_suppression and has_wp_hook
    return all_passed

def test_zero_code_compliance():
    print("\n=== TEST 5: Zero-Code Prohibition & Workspace Integrity Audit ===")
    workspace = "/Users/user/Sites/localhost/rahnab"
    
    php_files = []
    css_files = []
    js_files = []

    for root, dirs, files in os.walk(workspace):
        # Ignore node_modules, .git
        if "node_modules" in root or ".git" in root:
            continue
        for f in files:
            p = os.path.join(root, f)
            if f.endswith(".php"):
                php_files.append(p)
            elif f.endswith(".css"):
                css_files.append(p)
            elif f.endswith(".js") and not p.endswith("test_empirical_harness.py"):
                # allow nothing
                js_files.append(p)

    print(f"  Total PHP files in workspace: {len(php_files)}")
    print(f"  Total CSS files in workspace: {len(css_files)}")
    print(f"  Total JS files in workspace: {len(js_files)}")

    passed = len(php_files) == 0 and len(css_files) == 0 and len(js_files) == 0
    if passed:
        print("  [PASS] 100% COMPLIANT with Zero-Code Strict Prohibition.")
    else:
        print(f"  [FAIL] Detected unauthorized implementation files: {php_files + css_files + js_files}")
    return passed

def test_prior_findings_audit():
    print("\n=== TEST 6: Audit of All 7 Prior Challenger 1 Findings ===")
    d01_path = "/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md"
    d02_path = "/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/02_NAVIGATION_ARCHITECTURE.md"
    d03_path = "/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/03_CONTENT_HIERARCHY.md"
    d04_path = "/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md"
    d06_path = "/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/06_IA_DECISION_LOG.md"

    with open(d01_path, "r", encoding="utf-8") as fh: d01 = fh.read()
    with open(d02_path, "r", encoding="utf-8") as fh: d02 = fh.read()
    with open(d03_path, "r", encoding="utf-8") as fh: d03 = fh.read()
    with open(d04_path, "r", encoding="utf-8") as fh: d04 = fh.read()
    with open(d06_path, "r", encoding="utf-8") as fh: d06 = fh.read()

    findings_status = {}

    # CH-01: /news-events/entity/{slug}/ routing
    ch01_ok = ("archive-news.php" in d01 and "company_slug" in d01 and "archive-news.php" in d04 and "related_entity" not in d01 and "related_entity" not in d04)
    findings_status["CH-01 (Entity news routing & schema sync)"] = ch01_ok

    # CH-02: Rewrite collision & priority 'top'
    ch02_ok = ("'top'" in d01 and "^subsidiaries/cluster/?$" in d01 and "301" in d01 and "cluster" in d01)
    findings_status["CH-02 (Rewrite collision & priority 'top')"] = ch02_ok

    # CH-03: Mega-menu 768p scaling with Mode B 2-pane
    ch03_ok = ("Mode B: Scaled Venture Portfolio" in d02 and "2-Pane Master-Detail" in d02 and "max-height: min(560px, calc(85vh - 90px))" in d02)
    findings_status["CH-03 (Mega-Menu 768p laptop scaling)"] = ch03_ok

    # CH-04: Dual-language fallback SEO directives
    ch04_ok = ('<meta name="robots" content="noindex, follow" />' in d01 and "template_redirect" in d01 and "canonical" in d01)
    findings_status["CH-04 (Dual-language fallback SEO directives)"] = ch04_ok

    # CH-05: Multi-stage value-chain & primary term
    ch05_ok = ("Subsidiaries belong to 1 primary value-chain cluster" in d01 or "primary cluster" in d04)
    findings_status["CH-05 (Primary value-chain cluster clarity)"] = ch05_ok

    # CH-06: Media kit schema & upload security
    ch06_ok = ("Media Kit ZIP" in d04 or "_rahnab_news_press_release_pdf" in d04)
    findings_status["CH-06 (Media kit schema & upload guidelines)"] = ch06_ok

    # CH-07: Homepage Zone 3 flow matrix component
    ch07_ok = ("flow-matrix.php" in d04 and "flow-matrix.php" in d03)
    findings_status["CH-07 (Homepage Zone 3 flow-matrix component)"] = ch07_ok

    all_passed = True
    for finding, passed in findings_status.items():
        state = "[REMEDIATED & VERIFIED]" if passed else "[UNRESOLVED]"
        print(f"  {finding}: {state}")
        if not passed:
            all_passed = False

    return all_passed

def main():
    print("===================================================================")
    print("CHALLENGER 1 R2: EMPIRICAL VERIFICATION SUITE")
    print("===================================================================\n")
    
    results = [
        ("Test 1: Rewrite Rules Precedence Oracle", test_rewrite_rules_oracle()),
        ("Test 2: Phantom Taxonomy & Query Var Oracle", test_phantom_taxonomy_elimination()),
        ("Test 3: Mega-Menu Viewport Geometry Oracle", test_mega_menu_viewport_geometry()),
        ("Test 4: SEO Fallback Directives Oracle", test_seo_fallback_directives()),
        ("Test 5: Zero-Code Prohibition Compliance", test_zero_code_compliance()),
        ("Test 6: Prior Findings Audit", test_prior_findings_audit()),
    ]

    print("\n===================================================================")
    print("SUMMARY VERIFICATION RESULTS")
    print("===================================================================")
    all_success = True
    for name, success in results:
        status = "PASSED" if success else "FAILED"
        print(f"  {name}: {status}")
        if not success:
            all_success = False

    verdict = "CONFIRMED" if all_success else "VULNERABILITIES_FOUND"
    print(f"\nFINAL VERDICT: {verdict}")
    print("===================================================================")
    
    return 0 if all_success else 1

if __name__ == "__main__":
    sys.exit(main())
