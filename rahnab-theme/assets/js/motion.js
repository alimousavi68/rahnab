/**
 * Rahnab Pharmed — Premium Motion Engine
 * Native 120Hz Hardware Scroll + GSAP ScrollTrigger + Real Scripted Counters
 * + Exact TextHoverEffect Footer (from prompt_hover-footer.md)
 */
(function(global) {
  'use strict';

  function initMotionEngine() {
    var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (prefersReducedMotion) {
      document.documentElement.classList.add('reduced-motion');
      initLogoShimmerCanvas();
      initFooterTextHoverEffect();
      return function() {};
    }

    if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') {
      console.warn('[MotionEngine] GSAP or ScrollTrigger missing');
      initLogoShimmerCanvas();
      initFooterTextHoverEffect();
      return function() {};
    }

    gsap.registerPlugin(ScrollTrigger);

    var ctx = gsap.context(function() {

      /* ── 2. Kinetic Typography Reveals ── */
      document.querySelectorAll('.kinetic-title').forEach(function(title) {
        var inners = title.querySelectorAll('.line-wrapper-inner');
        if (inners.length) {
          gsap.fromTo(inners,
            { yPercent: 105, opacity: 0 },
            {
              yPercent: 0,
              opacity: 1,
              duration: 1.0,
              stagger: 0.12,
              ease: 'power3.out',
              scrollTrigger: {
                trigger: title,
                start: 'top 88%',
                toggleActions: 'play none none reverse'
              }
            }
          );
        }
      });

      /* ── 3. Fade-Up Elements ── */
      document.querySelectorAll('.fade-up-element').forEach(function(el) {
        gsap.fromTo(el,
          { opacity: 0, y: 30 },
          {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'power2.out',
            scrollTrigger: {
              trigger: el,
              start: 'top 88%',
              toggleActions: 'play none none reverse'
            }
          }
        );
      });

      /* ── 4. Magnetic Micro-Interactions ── */
      var isFineDevice = window.matchMedia('(pointer: fine)').matches;
      if (isFineDevice) {
        document.querySelectorAll('.magnetic-target').forEach(function(el) {
          el.addEventListener('mousemove', function(e) {
            var rect = el.getBoundingClientRect();
            var x = e.clientX - rect.left - rect.width / 2;
            var y = e.clientY - rect.top - rect.height / 2;
            var moveX = (x / (rect.width / 2)) * 14;
            var moveY = (y / (rect.height / 2)) * 14;
            gsap.to(el, { x: moveX, y: moveY, duration: 0.2, overwrite: 'auto' });
          });
          el.addEventListener('mouseleave', function() {
            gsap.to(el, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1, 0.4)', overwrite: 'auto' });
          });
        });
      }

      /* ── 5. REAL SCRIPTED KPI COUNTERS ── */
      document.querySelectorAll('.kpi-counter-val').forEach(function(counter) {
        var targetVal = parseFloat(counter.getAttribute('data-target') || '0');
        var kpiNum = counter.querySelector('.kpi-num') || counter;
        
        // Always reset to 0 initially
        kpiNum.textContent = '0';

        var counterObj = { count: 0 };

        ScrollTrigger.create({
          trigger: counter,
          start: 'top 88%',
          once: true,
          onEnter: function() {
            var lang = document.documentElement.lang || 'fa';
            var locale = (lang === 'fa') ? 'fa-IR' : 'en-US';
            var formatter = new Intl.NumberFormat(locale);

            gsap.to(counterObj, {
              count: targetVal,
              duration: 2.2,
              ease: 'power2.out',
              onUpdate: function() {
                var lang = document.documentElement.lang || 'fa';
                var val = Math.floor(counterObj.count);
                if (lang === 'fa') {
                  var faFormatted = new Intl.NumberFormat('fa-IR').format(val);
                  kpiNum.textContent = String(faFormatted).replace(/[0-9]/g, function(d) {
                    return '۰۱۲۳۴۵۶۷۸۹'[d];
                  });
                } else {
                  kpiNum.textContent = new Intl.NumberFormat('en-US').format(val);
                }
              },
              onComplete: function() {
                var lang = document.documentElement.lang || 'fa';
                if (lang === 'fa') {
                  var faFormatted = new Intl.NumberFormat('fa-IR').format(targetVal);
                  kpiNum.textContent = String(faFormatted).replace(/[0-9]/g, function(d) {
                    return '۰۱۲۳۴۵۶۷۸۹'[d];
                  });
                } else {
                  kpiNum.textContent = new Intl.NumberFormat('en-US').format(targetVal);
                }
              }
            });
          }
        });
      });

      /* ── 6. Services Value Chain Progression ── */
      var serviceItems = document.querySelectorAll('.services-chain-item, .value-chain-tier-card');
      if (serviceItems.length) {
        serviceItems.forEach(function(item) {
          ScrollTrigger.create({
            trigger: item,
            start: 'top 65%',
            end: 'bottom 35%',
            onEnter: function() { item.classList.add('is-active'); },
            onLeave: function() { item.classList.remove('is-active'); },
            onEnterBack: function() { item.classList.add('is-active'); },
            onLeaveBack: function() { item.classList.remove('is-active'); }
          });
        });
      }

      /* ── 6b. Subsidiary Cards Presentation Entrance ── */
      var compSection = document.getElementById('companies');
      if (compSection) {
        var compGrid = compSection.querySelector('.grid');
        var compCards = compSection.querySelectorAll('.subsidiary-card');
        if (compCards.length) {
          gsap.fromTo(compCards,
            { opacity: 0, y: 55, scale: 0.95 },
            {
              opacity: 1,
              y: 0,
              scale: 1,
              duration: 0.9,
              stagger: 0.15,
              ease: 'power3.out',
              scrollTrigger: {
                trigger: compGrid || compSection,
                start: 'top 82%',
                toggleActions: 'play none none reverse'
              }
            }
          );
        }
      }

      /* ── 6c. About Section Cinematic Entrance ── */
      var aboutSection = document.getElementById('about');
      if (aboutSection) {
        var aboutImg = aboutSection.querySelector('.about-img-col');
        var aboutStats = aboutSection.querySelectorAll('.about-stat-card');
        if (aboutImg) {
          gsap.fromTo(aboutImg,
            { opacity: 0, x: -30, scale: 0.97 },
            {
              opacity: 1,
              x: 0,
              scale: 1,
              duration: 1.0,
              ease: 'power3.out',
              scrollTrigger: {
                trigger: aboutSection,
                start: 'top 75%',
                toggleActions: 'play none none reverse'
              }
            }
          );
        }
        if (aboutStats.length) {
          gsap.fromTo(aboutStats,
            { opacity: 0, y: 20, scale: 0.94 },
            {
              opacity: 1,
              y: 0,
              scale: 1,
              duration: 0.7,
              stagger: 0.15,
              ease: 'power2.out',
              scrollTrigger: {
                trigger: aboutStats[0],
                start: 'top 85%',
                toggleActions: 'play none none reverse'
              }
            }
          );
        }
      }

      /* ── 7. Image Reveals ── */
      document.querySelectorAll('.image-reveal').forEach(function(img) {
        gsap.fromTo(img,
          { clipPath: 'inset(100% 0 0 0)' },
          {
            clipPath: 'inset(0 0 0 0)',
            duration: 1.2,
            ease: 'power3.inOut',
            scrollTrigger: {
              trigger: img,
              start: 'top 80%'
            }
          }
        );
      });

      /* ── 8. Navigation Scroll Behavior ── */
      // Handled centrally in app.js without redundant triggers

    }); // end gsap.context

    /* ── 9. Logo Specular Shimmer ── */
    initLogoShimmerCanvas();

    /* ── 10. Footer TextHoverEffect ── */
    initFooterTextHoverEffect();

    return function cleanup() {
      ctx.revert();
    };
  }

  /**
   * Ultra-Luxury Specular Reflection Sheen for Logo
   * Uses HTML5 Canvas + ctx.globalCompositeOperation = 'source-in'
   * Guarantees 100% pixel-perfect adherence to the logo silhouette (zero bleed)
   */
  function initLogoShimmerCanvas() {
    var canvas = document.getElementById('logoShimmerCanvas');
    var img = document.getElementById('mainLogoImg');
    if (!canvas || !img) return;

    var ctx = canvas.getContext('2d');
    var autoStartTime = performance.now();
    var autoSweepDuration = 3200; // 3.2s slow graceful sweep in auto mode
    var pauseDuration = 5300;     // 5.3s calm pause
    var totalCycle = autoSweepDuration + pauseDuration; // 8.5s loop

    var hoverSweepActive = false;
    var hoverStartTime = 0;
    var hoverDuration = 2000;    // 2.0s responsive, silky hover sweep

    function syncDimensions() {
      var dpr = window.devicePixelRatio || 1;
      var rect = img.getBoundingClientRect();
      if (rect.width === 0 || rect.height === 0) return;
      var newW = Math.round(rect.width * dpr);
      var newH = Math.round(rect.height * dpr);
      if (canvas.width !== newW || canvas.height !== newH) {
        canvas.width = newW;
        canvas.height = newH;
      }
      canvas.style.width = rect.width + 'px';
      canvas.style.height = rect.height + 'px';
    }

    function triggerSweep() {
      hoverSweepActive = true;
      hoverStartTime = performance.now();
      syncDimensions();
    }

    // Expose trigger globally
    global.triggerLogoShimmer = triggerSweep;

    function render(timestamp) {
      var w = canvas.width;
      var h = canvas.height;

      var shouldDraw = false;
      var progress = 0;

      if (hoverSweepActive) {
        var hoverElapsed = Math.max(0, timestamp - hoverStartTime);
        if (hoverElapsed <= hoverDuration) {
          shouldDraw = true;
          var ht = hoverElapsed / hoverDuration;
          // Smooth quintic ease
          progress = ht < 0.5 ? 16 * Math.pow(ht, 5) : 1 - Math.pow(-2 * ht + 2, 5) / 2;
        } else {
          hoverSweepActive = false;
          autoStartTime = timestamp;
        }
      } else {
        var autoElapsed = Math.max(0, (timestamp - autoStartTime) % totalCycle);
        if (autoElapsed <= autoSweepDuration) {
          shouldDraw = true;
          var at = autoElapsed / autoSweepDuration;
          progress = at < 0.5 ? 16 * Math.pow(at, 5) : 1 - Math.pow(-2 * at + 2, 5) / 2;
        }
      }

      ctx.clearRect(0, 0, w, h);

      if (shouldDraw && w > 0 && h > 0 && img.complete && img.naturalWidth > 0) {
        // Step 1: Draw base logo
        ctx.globalCompositeOperation = 'source-over';
        ctx.drawImage(img, 0, 0, w, h);

        // Step 2: Constrain all subsequent rendering strictly inside non-transparent logo pixels
        ctx.globalCompositeOperation = 'source-in';

        // Step 3: Draw rotating specular light band
        var bandWidth = w * 0.48;
        var totalDist = w + bandWidth * 2;
        var currentX = -bandWidth + (progress * totalDist);

        ctx.save();
        ctx.translate(currentX, h / 2);
        ctx.rotate(24 * Math.PI / 180);

        var grad = ctx.createLinearGradient(-bandWidth / 2, 0, bandWidth / 2, 0);
        grad.addColorStop(0, 'rgba(255, 255, 255, 0)');
        grad.addColorStop(0.2, 'rgba(229, 184, 135, 0.25)');
        grad.addColorStop(0.48, 'rgba(255, 255, 255, 0.95)');
        grad.addColorStop(0.52, 'rgba(255, 255, 255, 1)');
        grad.addColorStop(0.78, 'rgba(229, 184, 135, 0.25)');
        grad.addColorStop(1, 'rgba(255, 255, 255, 0)');

        ctx.fillStyle = grad;
        ctx.fillRect(-bandWidth / 2, -h * 3, bandWidth, h * 6);
        ctx.restore();

        // Step 4: Reset composite operation
        ctx.globalCompositeOperation = 'source-over';
      }

      requestAnimationFrame(render);
    }

    if (img.complete) {
      syncDimensions();
    } else {
      img.addEventListener('load', syncDimensions);
    }

    window.addEventListener('resize', syncDimensions, { passive: true });
    requestAnimationFrame(render);

    // Interactive sweep trigger on hover & pointer
    var wrapper = canvas.closest('.logo-shimmer-wrapper') || canvas.parentElement;
    if (wrapper) {
      wrapper.addEventListener('mouseenter', triggerSweep);
      wrapper.addEventListener('pointerenter', triggerSweep);
    }
    img.addEventListener('mouseenter', triggerSweep);
    img.addEventListener('pointerenter', triggerSweep);
  }

  /**
   * Exact TextHoverEffect for Footer
   * Fully Faithful to prompt_hover-footer.md specification
   */
  function initFooterTextHoverEffect() {
    var container = document.getElementById('footerHoverText');
    if (!container) return;

    var text = container.getAttribute('data-hover-text') || 'RAHNAB';
    container.innerHTML = '';

    var svgNS = 'http://www.w3.org/2000/svg';
    var svg = document.createElementNS(svgNS, 'svg');
    svg.setAttribute('width', '100%');
    svg.setAttribute('height', '100%');
    svg.setAttribute('viewBox', '0 0 300 100');
    svg.setAttribute('xmlns', svgNS);
    svg.setAttribute('class', 'select-none uppercase cursor-pointer block w-full h-full');
    svg.style.overflow = 'visible';

    // Defs
    var defs = document.createElementNS(svgNS, 'defs');

    // 1. Exact linearGradient with colors from prompt_hover-footer.md
    var linGrad = document.createElementNS(svgNS, 'linearGradient');
    linGrad.id = 'textGradient';
    linGrad.setAttribute('gradientUnits', 'userSpaceOnUse');
    linGrad.setAttribute('cx', '50%');
    linGrad.setAttribute('cy', '50%');
    linGrad.setAttribute('r', '25%');

    var stops = [
      { offset: '0%', color: '#E5B887' },
      { offset: '25%', color: '#F3D3A2' },
      { offset: '50%', color: '#6EE7B7' },
      { offset: '75%', color: '#38BDF8' },
      { offset: '100%', color: '#E879F9' }
    ];

    stops.forEach(function(s) {
      var stopEl = document.createElementNS(svgNS, 'stop');
      stopEl.setAttribute('offset', s.offset);
      stopEl.setAttribute('stop-color', s.color);
      linGrad.appendChild(stopEl);
    });
    defs.appendChild(linGrad);

    // 2. radialGradient for the revealMask (expanded radius and soft falloff)
    var radGrad = document.createElementNS(svgNS, 'radialGradient');
    radGrad.id = 'revealMask';
    radGrad.setAttribute('gradientUnits', 'userSpaceOnUse');
    radGrad.setAttribute('r', '28%');
    radGrad.setAttribute('cx', '50%');
    radGrad.setAttribute('cy', '50%');

    var rStop1 = document.createElementNS(svgNS, 'stop');
    rStop1.setAttribute('offset', '0%');
    rStop1.setAttribute('stop-color', 'white');
    radGrad.appendChild(rStop1);

    var rStop2 = document.createElementNS(svgNS, 'stop');
    rStop2.setAttribute('offset', '65%');
    rStop2.setAttribute('stop-color', 'white');
    rStop2.setAttribute('stop-opacity', '0.7');
    radGrad.appendChild(rStop2);

    var rStop3 = document.createElementNS(svgNS, 'stop');
    rStop3.setAttribute('offset', '100%');
    rStop3.setAttribute('stop-color', 'black');
    radGrad.appendChild(rStop3);
    defs.appendChild(radGrad);

    // 3. Mask referencing the radialGradient
    var mask = document.createElementNS(svgNS, 'mask');
    mask.id = 'textMask';
    var maskRect = document.createElementNS(svgNS, 'rect');
    maskRect.setAttribute('x', '0');
    maskRect.setAttribute('y', '0');
    maskRect.setAttribute('width', '100%');
    maskRect.setAttribute('height', '100%');
    maskRect.setAttribute('fill', 'url(#revealMask)');
    mask.appendChild(maskRect);
    defs.appendChild(mask);

    svg.appendChild(defs);

    // Shared typography styling — using Peyda font with heavy weight
    var textStyles = {
      x: '50%',
      y: '50%',
      'text-anchor': 'middle',
      'dominant-baseline': 'middle',
      'stroke-width': '0.35',
      'font-family': "'Peyda', sans-serif",
      'font-size': '70px',
      'font-weight': '900',
      'letter-spacing': '0.03em'
    };

    // Layer 1: Base stroke (subtle dark gold-tinted outline)
    var baseText = document.createElementNS(svgNS, 'text');
    Object.keys(textStyles).forEach(function(k) { baseText.setAttribute(k, textStyles[k]); });
    baseText.setAttribute('fill', 'transparent');
    baseText.setAttribute('stroke', 'rgba(255, 255, 255, 0.12)');
    baseText.style.opacity = '0.8';
    baseText.textContent = text;
    svg.appendChild(baseText);

    // Layer 2: Animated stroke (#E5B887 Champagne Gold, draw-on over 4s)
    var animText = document.createElementNS(svgNS, 'text');
    Object.keys(textStyles).forEach(function(k) { animText.setAttribute(k, textStyles[k]); });
    animText.setAttribute('fill', 'transparent');
    animText.setAttribute('stroke', 'rgba(229, 184, 135, 0.65)');
    animText.setAttribute('stroke-dasharray', '1000');
    animText.setAttribute('stroke-dashoffset', '1000');
    animText.style.transition = 'stroke-dashoffset 4s cubic-bezier(0.4, 0, 0.2, 1)';
    animText.id = 'footerAnimStroke';
    animText.textContent = text;
    svg.appendChild(animText);

    // Layer 3: Vibrant hover gradient stroke revealed through mask
    var revealText = document.createElementNS(svgNS, 'text');
    Object.keys(textStyles).forEach(function(k) { revealText.setAttribute(k, textStyles[k]); });
    revealText.setAttribute('fill', 'transparent');
    revealText.setAttribute('stroke', 'url(#textGradient)');
    revealText.setAttribute('stroke-width', '0.65');
    revealText.setAttribute('mask', 'url(#textMask)');
    revealText.style.opacity = '0';
    revealText.style.transition = 'opacity 0.3s ease';
    revealText.textContent = text;
    svg.appendChild(revealText);

    container.appendChild(svg);

    function handleMove(clientX, clientY) {
      var rect = svg.getBoundingClientRect();
      var cx = ((clientX - rect.left) / rect.width) * 100;
      var cy = ((clientY - rect.top) / rect.height) * 100;
      radGrad.setAttribute('cx', cx + '%');
      radGrad.setAttribute('cy', cy + '%');
    }

    // Dynamic mouse tracking on SVG
    svg.addEventListener('mousemove', function(e) {
      handleMove(e.clientX, e.clientY);
    });

    svg.addEventListener('mouseenter', function() {
      animText.style.strokeDashoffset = '0';
      revealText.style.opacity = '1';
    });

    svg.addEventListener('mouseleave', function() {
      revealText.style.opacity = '0';
      radGrad.setAttribute('cx', '50%');
      radGrad.setAttribute('cy', '50%');
    });

    // Touch support for mobile devices
    svg.addEventListener('touchstart', function(e) {
      if (e.touches && e.touches[0]) {
        animText.style.strokeDashoffset = '0';
        revealText.style.opacity = '1';
        handleMove(e.touches[0].clientX, e.touches[0].clientY);
      }
    }, { passive: true });

    svg.addEventListener('touchmove', function(e) {
      if (e.touches && e.touches[0]) {
        handleMove(e.touches[0].clientX, e.touches[0].clientY);
      }
    }, { passive: true });

    svg.addEventListener('touchend', function() {
      revealText.style.opacity = '0';
      radGrad.setAttribute('cx', '50%');
      radGrad.setAttribute('cy', '50%');
    });

    // Auto-animate stroke on scroll entrance
    if (typeof gsap !== 'undefined' && typeof ScrollTrigger !== 'undefined') {
      ScrollTrigger.create({
        trigger: container,
        start: 'top 85%',
        once: true,
        onEnter: function() {
          animText.style.strokeDashoffset = '0';
        }
      });
    } else {
      setTimeout(function() {
        animText.style.strokeDashoffset = '0';
      }, 500);
    }
  }

  global.initMotionEngine = initMotionEngine;
})(window);
