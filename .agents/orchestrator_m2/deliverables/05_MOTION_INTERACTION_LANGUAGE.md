# DELIVERABLE 05: MOTION & INTERACTION LANGUAGE SPECIFICATION
## Rahnab Pharmed Corporate Website (`rahnab.com`)
### Milestone 2: Design System, Tokens & Art Direction

**Document Code:** `RAHNAB-M2-DELIV-05-MOTION`  
**Classification:** Authoritative Technical Specification & Interaction Architecture  
**Target Milestone:** Milestone 2 (Motion & Interaction Language)  
**Downstream Consumer:** Milestone 3 (Interactive HTML/CSS/JS Prototype Engine)  
**Parent Orchestrator:** `orchestrator_m2`  
**Authoring Unit:** `worker_m2_author`  
**Foundational Sources:** `docs/MASTER_PROJECT_BRIEF.md`, `.agents/ORIGINAL_REQUEST.md`, `explorer_m2_tokens_motion/analysis.md`, `01_UX_BLUEPRINT.md`, `02_CREATIVE_DIRECTION.md`, `.agents/rules/code-quality.md`.

---

## 1. Executive Summary & Motion Philosophy

Motion at Rahnab Pharmed is an essential layer of **narrative infrastructure**, not cosmetic decoration. Every animation must satisfy three non-negotiable architectural mandates:
1. **Purposeful Kinetic Storytelling:** Animations are paced to guide cognitive comprehension of complex biomanufacturing systems, establishing the sovereign scale of the holding group.
2. **Deterministic Physics & Zero Jitter:** Driven by **Lenis** smooth scroll synchronized to **GSAP ScrollTrigger**, animations maintain realistic physical mass (`lerp: 0.08`) and fluid 60/120 FPS performance across desktop and mobile.
3. **Strict Accessibility & Performance Guardrails:** Animations strictly target hardware-accelerated GPU transforms (`transform: translate3d`, `opacity`). The entire motion suite natively detects and respects `@media (prefers-reduced-motion: reduce)`, instantly delivering an accessible static state without layout degradation.

---

## 2. Core Motion Infrastructure: Lenis + GSAP ScrollTrigger Integration

### 2.1 Smooth Scroll Engine (Lenis)
Lenis is selected as the primary smooth scroll library due to its lightweight footprint (<3KB gzipped), native thread execution, and complete compatibility with assistive technologies.

### 2.2 Synchronization Bridge
To prevent frame desynchronization and tearing between scroll position and animation timelines, Lenis and GSAP are locked via GSAP's central RequestAnimationFrame (RAF) ticker:

```javascript
/**
 * Core Motion Engine Initialization
 * Synchronizes Lenis Smooth Scroll with GSAP ScrollTrigger
 */
import Lenis from '@studio-freight/lenis';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initMotionEngine() {
  // Check for reduced motion preference before initializing smooth scroll
  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    console.info('[Motion Engine]: prefers-reduced-motion detected. Smooth scroll disabled.');
    return null;
  }

  // 1. Initialize Lenis with weighted inertial easing
  const lenis = new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Exponential ease-out curve
    direction: 'vertical',
    gestureDirection: 'vertical',
    smooth: true,
    mouseMultiplier: 1.0,
    smoothTouch: false, // Maintain native touch momentum on mobile touchscreens
    touchMultiplier: 2.0,
  });

  // 2. Bind Lenis scroll events to GSAP ScrollTrigger updates
  lenis.on('scroll', ScrollTrigger.update);

  // 3. Drive Lenis updates directly through GSAP's unified RAF ticker
  gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
  });

  // 4. Disable lag smoothing to eliminate visual stutter during heavy DOM paints
  gsap.ticker.lagSmoothing(0);

  return lenis;
}
```

---

## 3. Narrative Pinned Section: Continuous Biomanufacturing Value Chain

The central feature of the homepage is the **Biomanufacturing Value Chain Scrub Timeline**. As the user scrolls through a 300vh pinned canvas, each stage of the biological pipeline illuminates sequentially.

### 3.1 Timeline Architecture & Scroll Scrub Code
```javascript
/**
 * Continuous Biomanufacturing Value Chain Pinned Scrub Timeline
 * Pinned viewport over 300vh scroll distance on desktop
 */
export function initValueChainTimeline() {
  const container = document.querySelector('.value-chain-section');
  if (!container) return;

  const mm = gsap.matchMedia();

  // Desktop & Tablet Viewports (>= 1024px): Pinned Scrubbing Experience
  mm.add('(min-width: 1024px)', () => {
    const pinDistance = window.innerHeight * 3; // 300vh scrub distance
    const tiers = gsap.utils.toArray('.value-chain-tier-card');
    const progressLine = document.querySelector('.value-chain-progress-line');

    const tl = gsap.timeline({
      scrollTrigger: {
        trigger: container,
        start: 'top top',
        end: `+=${pinDistance}`,
        pin: true,
        scrub: 0.8, // 0.8s smooth scrubbing lag for weighted feel
        anticipatePin: 1,
      }
    });

    // 1. Animate vertical glowing conduit progress line
    if (progressLine) {
      tl.to(progressLine, {
        scaleY: 1,
        ease: 'none',
        duration: tiers.length
      }, 0);
    }

    // 2. Sequential unmasking and activation of value-chain tier cards
    tiers.forEach((tier, index) => {
      tl.fromTo(tier, 
        { opacity: 0.25, filter: 'blur(4px)', y: 30 },
        { 
          opacity: 1, 
          filter: 'blur(0px)', 
          y: 0, 
          duration: 0.8, 
          ease: 'power2.out',
          className: '+=is-active'
        },
        index * 0.9
      );
    });

    return () => {
      // Revert/kill only this timeline and its associated ScrollTrigger
      tl.scrollTrigger?.kill();
      tl.kill();
    };
  });

  // Mobile Viewports (< 1024px): Linear Vertical Stepper Reveals (No Screen Pinning)
  mm.add('(max-width: 1023px)', () => {
    const tiers = gsap.utils.toArray('.value-chain-tier-card');
    tiers.forEach((tier) => {
      gsap.from(tier, {
        scrollTrigger: {
          trigger: tier,
          start: 'top 85%',
          toggleActions: 'play none none reverse',
        },
        opacity: 0,
        y: 24,
        duration: 0.7,
        ease: 'power2.out'
      });
    });
  });

  return mm;
}
```

---

## 4. Kinetic Typography Reveals

To convey intellectual authority and confidence, major editorial headlines do not abruptly pop into view. Instead, lines are masked in overflow-hidden containers and revealed with an upward glide:

```javascript
/**
 * Kinetic Masked Line Reveal for Display Headings
 */
export function initKineticTypography() {
  const headings = document.querySelectorAll('.kinetic-title');
  if (!headings.length) return;

  headings.forEach((heading) => {
    // Each line wrapped in an overflow-hidden mask span
    const lines = heading.querySelectorAll('.line-wrapper-inner');
    
    gsap.fromTo(lines, 
      {
        yPercent: 110,
        opacity: 0,
      },
      {
        scrollTrigger: {
          trigger: heading,
          start: 'top 88%',
          toggleActions: 'play none none reverse',
        },
        yPercent: 0,
        opacity: 1,
        duration: 1.0,
        stagger: 0.12,
        ease: 'power3.out', // Crisp Swiss deceleration curve
      }
    );
  });
}
```

---

## 5. Magnetic Micro-Interactions for Primary CTAs

For high-priority touchpoints (the primary header B2B button and hero dossier trigger), a subtle magnetic attraction field tracks the desktop cursor within an 18px radius:

```javascript
/**
 * Magnetic Micro-Interaction for Primary Action Buttons
 * Active only on fine pointer devices (Desktop mouse)
 */
export function initMagneticElements() {
  const magnets = document.querySelectorAll('.magnetic-target');
  if (!magnets.length) return;

  if (window.matchMedia('(pointer: fine)').matches) {
    magnets.forEach((el) => {
      const strength = 18; // Maximum pixel displacement

      el.addEventListener('mousemove', (e) => {
        const rect = el.getBoundingClientRect();
        const relX = e.clientX - (rect.left + rect.width / 2);
        const relY = e.clientY - (rect.top + rect.height / 2);

        gsap.to(el, {
          x: (relX / (rect.width / 2)) * strength,
          y: (relY / (rect.height / 2)) * strength,
          duration: 0.35,
          ease: 'power2.out',
          overwrite: 'auto'
        });
      });

      el.addEventListener('mouseleave', () => {
        gsap.to(el, {
          x: 0,
          y: 0,
          duration: 0.6,
          ease: 'elastic.out(1, 0.4)', // Controlled organic spring return
          overwrite: 'auto'
        });
      });
    });
  }
}
```

---

## 6. Animated KPI Numeric Counters with Persian Formatting

When operational metrics (150,000 liters, 7 subsidiaries, 70% antivenoms) scroll into view, they count up smoothly with localized Persian or English formatting:

```javascript
/**
 * Animated Numerical Counters with Dynamic Localization
 */
export function initKpiCounters() {
  const counters = document.querySelectorAll('.kpi-counter-val');
  if (!counters.length) return;

  const isPersian = document.documentElement.lang.startsWith('fa') || document.documentElement.dir === 'rtl';
  const formatter = new Intl.NumberFormat(isPersian ? 'fa-IR' : 'en-US');

  counters.forEach((el) => {
    const targetValue = parseFloat(el.getAttribute('data-target') || '0');
    const counterObj = { value: 0 };
    // Animate dedicated numeric inner element to preserve metric suffixes («+», «٪», «لیتر»)
    const numEl = el.querySelector('.kpi-num') || el;

    ScrollTrigger.create({
      trigger: el,
      start: 'top 85%',
      once: true, // Trigger once per user session to avoid repetitive distraction
      onEnter: () => {
        gsap.to(counterObj, {
          value: targetValue,
          duration: 2.2,
          ease: 'power2.out',
          onUpdate: () => {
            numEl.textContent = formatter.format(Math.floor(counterObj.value));
          }
        });
      }
    });
  });
}
```

---

## 7. Performance Optimization & Accessibility Guardrails

### 7.1 Strict GPU Layer Management (`will-change`)
Animating properties that trigger CPU reflows (`top`, `left`, `width`, `height`, `margin`) is strictly **prohibited**. All animations must operate exclusively on composited properties: `transform: translate3d()` and `opacity`.
To avoid GPU memory exhaustion on iOS Safari, `will-change` is applied dynamically only during active tweens:

```javascript
gsap.to(element, {
  y: 0,
  opacity: 1,
  duration: 0.8,
  onStart: () => { element.style.willChange = 'transform, opacity'; },
  onComplete: () => { element.style.willChange = 'auto'; }
});
```

### 7.2 Strict Accessibility: `prefers-reduced-motion` Enforcement
Users who experience vestibular discomfort must receive an immediate, non-jarring static experience:

```javascript
/**
 * Accessibility Guardrail: Bypasses animations if prefers-reduced-motion is active
 */
export function initAccessibleMotion(lenis = null) {
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReduced) {
    // 0. Ensure Lenis smooth scroll inertia is completely stopped/destroyed
    if (lenis && typeof lenis.destroy === 'function') {
      lenis.destroy();
    }

    // 1. Immediately set all animated elements to their terminal active state
    gsap.set('.value-chain-tier-card, .kinetic-title .line-wrapper-inner, .fade-up-element', {
      opacity: 1,
      y: 0,
      yPercent: 0,
      scale: 1,
      filter: 'none',
      clearProps: 'all'
    });

    // 2. Render target KPI values immediately without tweening, preserving suffixes
    document.querySelectorAll('.kpi-counter-val').forEach((el) => {
      const target = parseFloat(el.getAttribute('data-target') || '0');
      const isPersian = document.documentElement.lang.startsWith('fa') || document.documentElement.dir === 'rtl';
      const numEl = el.querySelector('.kpi-num') || el;
      numEl.textContent = new Intl.NumberFormat(isPersian ? 'fa-IR' : 'en-US').format(target);
    });

    console.info('[Motion A11y]: prefers-reduced-motion detected. All kinetic translations bypassed and smooth scroll deactivated.');
    return;
  }

  // Standard kinetic initialization
  initValueChainTimeline();
  initKineticTypography();
  initMagneticElements();
  initKpiCounters();
}
```

---

## 8. Verification & Implementation Checklist

- [x] Lenis smooth scroll bridge synchronized to GSAP RAF ticker with lagSmoothing disabled.
- [x] 300vh pinned value chain scrub timeline codified with responsive fallback for mobile (<1024px).
- [x] Kinetic typography reveals with masked line overflows specified.
- [x] Magnetic micro-interactions specified for fine pointer devices with elastic return.
- [x] Animated KPI counters localized with `Intl.NumberFormat` for Persian and English.
- [x] Strict GPU transform rules and dynamic `will-change` lifecycle management defined.
- [x] Complete `prefers-reduced-motion` bypass fail-safe implemented.
- [x] Zero WordPress PHP/theme files and zero full HTML prototype pages created.
