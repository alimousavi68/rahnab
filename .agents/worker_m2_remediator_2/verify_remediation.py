import re
import sys
from pathlib import Path

DELIV_DIR = Path("/Users/user/Sites/localhost/rahnab/.agents/orchestrator_m2/deliverables")

def test_fix_1():
    print("Testing Fix 1: Mathematical contrast clarification...")
    f02 = (DELIV_DIR / "02_CREATIVE_DIRECTION.md").read_text(encoding="utf-8")
    f03 = (DELIV_DIR / "03_DESIGN_SYSTEM.md").read_text(encoding="utf-8")
    
    # 1. Check Emerald text contrast
    assert "7.00:1 (AAA)" not in f02 and "7.00:1 (AAA)" not in f03, "Failed: Still claims 7.00:1 (AAA)"
    assert "6.41:1" in f02, "Failed: 6.41:1 missing from 02_CREATIVE_DIRECTION.md"
    assert "PASSES WCAG AA for normal body text" in f02, "Failed: Missing AA normal body text in f02"
    assert "PASSES WCAG AAA for large text only" in f02, "Failed: Missing AAA large text only in f02"
    assert "6.41:1" in f03, "Failed: 6.41:1 missing from 03_DESIGN_SYSTEM.md"
    assert "PASSES WCAG AA for normal body text" in f03, "Failed: Missing AA normal body text in f03"
    assert "PASSES WCAG AAA for large text only" in f03, "Failed: Missing AAA large text only in f03"

    # 2. Check border-subtle contrast clarification
    assert "1.36:1" in f02 and "purely decorative" in f02, "Failed: border-subtle decorative note in f02"
    assert "SC 1.4.11" in f02, "Failed: SC 1.4.11 reference missing in f02"
    assert "1.36:1" in f03 and "purely decorative" in f03, "Failed: border-subtle decorative note in f03"
    assert "SC 1.4.11" in f03, "Failed: SC 1.4.11 reference missing in f03"

    # 3. Check --text-muted is #78889E (5.60:1 AA)
    assert "#78889E" in f02, "Failed: #78889E missing from f02"
    assert "5.60:1" in f02, "Failed: 5.60:1 contrast missing from f02"
    assert "#78889E" in f03, "Failed: #78889E missing from f03"
    assert "5.60:1" in f03, "Failed: 5.60:1 contrast missing from f03"
    print("  -> Fix 1 PASSED.")

def test_fix_2():
    print("Testing Fix 2: Mobile clamp floor for display-2xl...")
    f03 = (DELIV_DIR / "03_DESIGN_SYSTEM.md").read_text(encoding="utf-8")
    f04 = (DELIV_DIR / "04_TAILWIND_TOKENS_BLUEPRINT.md").read_text(encoding="utf-8")

    assert "clamp(3.25rem, 5vw + 1rem, 5.5rem)" not in f03, "Failed: old clamp in f03"
    assert "clamp(3.25rem, 5vw + 1rem, 5.5rem)" not in f04, "Failed: old clamp in f04"
    assert "clamp(2rem, 4vw + 1rem, 5.5rem)" in f03, "Failed: new clamp missing in f03"
    assert "clamp(2rem, 4vw + 1rem, 5.5rem)" in f04, "Failed: new clamp missing in f04"
    print("  -> Fix 2 PASSED.")

def test_fix_3():
    print("Testing Fix 3: Tailwind CSS double-slash syntax fix...")
    f04 = (DELIV_DIR / "04_TAILWIND_TOKENS_BLUEPRINT.md").read_text(encoding="utf-8")

    # In tokens.css
    assert "--color-border-subtle: 255 255 255;" in f04, "Failed: pure RGB border subtle missing"
    assert "--color-border-subtle-alpha: 0.08;" in f04, "Failed: border subtle alpha missing"
    assert "--color-border-muted: 255 255 255;" in f04, "Failed: pure RGB border muted missing"
    assert "--color-border-muted-alpha: 0.14;" in f04, "Failed: border muted alpha missing"
    assert "--color-border-prominent: 255 255 255;" in f04, "Failed: pure RGB border prominent missing"
    assert "--color-border-prominent-alpha: 0.28;" in f04, "Failed: border prominent alpha missing"
    assert "--color-accent-subtle: 253 119 2;" in f04, "Failed: pure RGB accent subtle missing in Dir A"
    assert "--color-accent-subtle-alpha: 0.12;" in f04, "Failed: accent subtle alpha missing in Dir A"

    # In tailwind.config.js
    assert "rgba(var(--color-border-subtle), var(--color-border-subtle-alpha, 0.08))" in f04, "Failed: config mapping for subtle"
    assert "rgba(var(--color-border-muted), var(--color-border-muted-alpha, 0.14))" in f04, "Failed: config mapping for muted"
    assert "rgba(var(--color-border-prominent), var(--color-border-prominent-alpha, 0.28))" in f04, "Failed: config mapping for prominent"
    assert "rgba(var(--color-accent-subtle), var(--color-accent-subtle-alpha, 0.12))" in f04, "Failed: config mapping for accent subtle"

    # No double-slash pattern
    assert "/ 0.08 /" not in f04 and "/ 0.12 /" not in f04, "Failed: double slash pattern found"
    print("  -> Fix 3 PASSED.")

def test_fix_4():
    print("Testing Fix 4: GSAP cleanup fix & Lenis prefers-reduced-motion...")
    f05 = (DELIV_DIR / "05_MOTION_INTERACTION_LANGUAGE.md").read_text(encoding="utf-8")

    assert "ScrollTrigger.getAll().forEach" not in f05, "Failed: destructive ScrollTrigger.getAll() present"
    assert "tl.scrollTrigger?.kill();" in f05, "Failed: scoped trigger kill missing"
    assert "prefers-reduced-motion" in f05, "Failed: prefers-reduced-motion missing"
    assert "lenis.destroy()" in f05, "Failed: lenis.destroy() missing in accessible motion"
    print("  -> Fix 4 PASSED.")

def test_fix_5():
    print("Testing Fix 5: Mobile sticky dock geometry...")
    f01 = (DELIV_DIR / "01_UX_BLUEPRINT.md").read_text(encoding="utf-8")

    assert "w-[65%]" not in f01 and "w-[35%]" not in f01, "Failed: hardcoded widths present"
    assert "flex-[2] min-w-0" in f01, "Failed: flex-[2] min-w-0 missing"
    assert "flex-[1] min-w-0" in f01, "Failed: flex-[1] min-w-0 missing"
    assert "pb-[max(0.75rem,env(safe-area-inset-bottom))]" in f01, "Failed: safe area inset padding missing"
    print("  -> Fix 5 PASSED.")

def test_fix_6():
    print("Testing Fix 6: KPI Counter localization...")
    f05 = (DELIV_DIR / "05_MOTION_INTERACTION_LANGUAGE.md").read_text(encoding="utf-8")

    assert "lang === 'fa'" not in f05, "Failed: naive lang check present"
    assert "document.documentElement.lang.startsWith('fa') || document.documentElement.dir === 'rtl'" in f05, "Failed: startsWith('fa') check missing"
    assert ".kpi-num" in f05, "Failed: .kpi-num inner target missing"
    print("  -> Fix 6 PASSED.")

def test_fix_7():
    print("Testing Fix 7: Remove 18px baseline grid violation...")
    f04 = (DELIV_DIR / "04_TAILWIND_TOKENS_BLUEPRINT.md").read_text(encoding="utf-8")

    assert "'4.5': '1.125rem'" not in f04, "Failed: 18px / 4.5 spacing present in tailwind spacing"
    print("  -> Fix 7 PASSED.")

def test_fix_8():
    print("Testing Fix 8: Align text secondary/muted hex codes...")
    files = {
        "02": (DELIV_DIR / "02_CREATIVE_DIRECTION.md").read_text(encoding="utf-8"),
        "03": (DELIV_DIR / "03_DESIGN_SYSTEM.md").read_text(encoding="utf-8"),
        "04": (DELIV_DIR / "04_TAILWIND_TOKENS_BLUEPRINT.md").read_text(encoding="utf-8"),
        "INDEX": (DELIV_DIR / "INDEX.md").read_text(encoding="utf-8"),
    }

    for name, content in files.items():
        assert "#F8FAFC" in content, f"Failed: #F8FAFC missing in {name}"
        assert "#CBD5E1" in content, f"Failed: #CBD5E1 missing in {name}"
        assert "#78889E" in content, f"Failed: #78889E missing in {name}"

    print("  -> Fix 8 PASSED.")

def main():
    test_fix_1()
    test_fix_2()
    test_fix_3()
    test_fix_4()
    test_fix_5()
    test_fix_6()
    test_fix_7()
    test_fix_8()
    print("\nALL 8 PRECISION REMEDIATION FIXES SUCCESSFULLY VERIFIED!")

if __name__ == "__main__":
    main()
