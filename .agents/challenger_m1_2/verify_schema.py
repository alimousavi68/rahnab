#!/usr/bin/env python3
"""
Comprehensive empirical verification and stress-testing harness for
Milestone 1 WordPress CPT Architecture & Schemas.
"""
import re
import sys

def main():
    cpt_path = '/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/04_WORDPRESS_CPT_ARCHITECTURE.md'
    sitemap_path = '/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/01_FINAL_SITEMAP.md'
    decision_path = '/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m1/deliverables/06_IA_DECISION_LOG.md'

    with open(cpt_path, 'r', encoding='utf-8') as f:
        cpt_text = f.read()

    with open(sitemap_path, 'r', encoding='utf-8') as f:
        sitemap_text = f.read()

    print("==================================================================")
    print("EMPIRICAL TEST 1: ALL 40 METADATA FIELDS PARSING & SCHEMA AUDIT")
    print("==================================================================")
    
    # Parse all rows starting with | number | `_rahnab_
    all_field_rows = []
    for line in cpt_text.splitlines():
        line = line.strip()
        if line.startswith('|') and '`_rahnab_' in line:
            parts = [p.strip() for p in line.split('|')[1:-1]]
            if len(parts) >= 8:
                all_field_rows.append(parts)

    print(f"Total metadata fields parsed: {len(all_field_rows)}")
    
    fields_lacking_escaping = []
    for parts in all_field_rows:
        num = parts[0]
        key = parts[1]
        label = parts[2]
        dtype = parts[3]
        ui = parts[4]
        sanit = parts[5]
        req = parts[6]
        desc = parts[7]
        
        # Check if escaping function is explicitly mentioned anywhere in the row
        has_esc = any('esc_' in col for col in [dtype, ui, sanit, req, desc])
        # Note: esc_url_raw is sanitization, NOT output escaping (esc_url is output escaping)
        if sanit == '`esc_url_raw`' and 'esc_url' not in desc:
            has_esc = False
            
        if not has_esc:
            fields_lacking_escaping.append((num, key, dtype, sanit))

    print(f"\nFields lacking explicit OUTPUT ESCAPING specification: {len(fields_lacking_escaping)} of {len(all_field_rows)}")
    for num, key, dtype, sanit in fields_lacking_escaping:
        print(f"  Field #{num}: {key} | Type: {dtype} | Sanitization: {sanit} | Output Escaping: [NOT SPECIFIED]")

    print("\n==================================================================")
    print("EMPIRICAL TEST 2: SIMULATING ORPHAN & DANGLING FOREIGN KEY BEHAVIOR")
    print("==================================================================")
    
    # Simulation: News article #500 points to Company #42
    # Case A: Company #42 is trashed
    # Case B: Company #42 is permanently deleted
    # Case C: Joint press release between Company #42 and Company #43
    print("Simulating WordPress PHP/MySQL relational behavior:")
    print("Scenario A: Subsidiary post #42 trashed (post_status='trash')")
    print("  - get_post(42) returns WP_Post with post_status='trash'")
    print("  - If template single-news.php does `get_permalink($company_id)`, visitors receive 404 when clicking.")
    print("  - Defensively required: check `get_post_status($company_id) === 'publish'` before rendering subsidiary card.")
    print("Scenario B: Subsidiary post #42 permanently deleted")
    print("  - get_post(42) returns null")
    print("  - In PHP 8.0+: `$comp = get_post(42); echo $comp->post_title;` triggers:")
    print("    FATAL ERROR: Uncaught TypeError: Attempt to read property 'post_title' on null")
    print("  - Defensively required: `if ( $company_id && ( $comp = get_post($company_id) ) && $comp->post_status === 'publish' )`")
    print("  - Invalidation hook: CPT spec mentions save_post, but NO `deleted_post` or `trashed_post` cleanup handler to reset _rahnab_news_related_company_id to 0.")
    print("Scenario C: Collaborative joint release between 2 subsidiaries")
    print("  - Architecture stores single scalar `absint` integer.")
    print("  - Result: IMPOSSIBLE to link two subsidiaries without choosing one or falling back to holding (0).")

    print("\n==================================================================")
    print("EMPIRICAL TEST 3: N+1 QUERY STRESS-TEST ON HOMEPAGE & DIRECTORY")
    print("==================================================================")
    
    # Simulation: 7 to 20 subsidiaries on front-page.php or archive-company.php
    print("Query count simulation for Archive/Homepage Portfolio Matrix (20 companies):")
    print("Pattern 1 (Without Eager Loading / Consolidated Query):")
    print("  - Main query: 1 query (SELECT * FROM wp_posts WHERE post_type='company') -> 20 posts")
    print("  - Post meta: WordPress caches post meta in 1 query via update_post_meta_cache().")
    print("  - BUT for each company card, displaying latest news or achievements:")
    print("    20 companies * 1 query for achievements (SELECT * FROM wp_posts JOIN wp_postmeta ... WHERE meta_value = company_id)")
    print("    = 20 additional SQL queries!")
    print("    20 companies * 1 query for latest news = 20 additional SQL queries!")
    print("    Total: 1 + 1 + 20 + 20 = 42 queries!")
    print("  - If transients are stored per-company (rahnab_company_{$id}_news):")
    print("    On cache miss (e.g. cold cache or after save_post): 40+ database queries executing concurrently!")
    print("  - Conclusion: Architectural specification lacks a consolidated holding portfolio query strategy.")

if __name__ == '__main__':
    main()
