/**
 * Rahnab Pharmed — Hero Ambient Engine
 * Subtle glowing particle field overlay for cinematic depth
 */
(function(global) {
  'use strict';

  function initHeroScene() {
    var heroSection = document.querySelector('.hero-section');
    if (!heroSection) return function() {};

    var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return function() {};

    var video = document.getElementById('heroVideo');
    if (video) {
      video.play().catch(function(err) {
        console.warn('Hero video autoplay prevented:', err);
      });
    }

    /* ── Full-Height Video: Spans full vertical height of hero from top to bottom ── */
    function alignHeroVideoToDivider() {
      var videoWrapper = document.querySelector('.hero-scaled-canvas-wrapper');
      if (!videoWrapper) return;
      videoWrapper.style.top = '0px';
      videoWrapper.style.bottom = '0px';
      videoWrapper.style.height = '100%';
    }

    alignHeroVideoToDivider();

    // Optional 2D ambient particle canvas
    var canvas = document.createElement('canvas');
    canvas.className = 'hero-particles-canvas';
    canvas.style.cssText = 'position:absolute;inset:0;width:100%;height:100%;z-index:2;pointer-events:none;opacity:0.6;';
    heroSection.appendChild(canvas);

    var ctx = canvas.getContext('2d');
    if (!ctx) return function() {};

    var width, height;
    var particles = [];
    var particleCount = window.innerWidth < 768 ? 25 : 45;

    function resize() {
      width = canvas.width = heroSection.clientWidth;
      height = canvas.height = heroSection.clientHeight;
      alignHeroVideoToDivider();
    }
    resize();
    window.addEventListener('resize', resize);

    for (var i = 0; i < particleCount; i++) {
      particles.push({
        x: Math.random() * width,
        y: Math.random() * height,
        r: Math.random() * 1.8 + 0.5,
        dx: (Math.random() - 0.5) * 0.3,
        dy: (Math.random() - 0.5) * 0.3,
        alpha: Math.random() * 0.5 + 0.2,
        color: Math.random() > 0.4 ? '253, 119, 2' : '203, 213, 225'
      });
    }

    var animId;
    function render() {
      ctx.clearRect(0, 0, width, height);
      for (var i = 0; i < particles.length; i++) {
        var p = particles[i];
        p.x += p.dx;
        p.y += p.dy;

        if (p.x < 0) p.x = width;
        if (p.x > width) p.x = 0;
        if (p.y < 0) p.y = height;
        if (p.y > height) p.y = 0;

        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fillStyle = 'rgba(' + p.color + ',' + p.alpha + ')';
        ctx.shadowBlur = 8;
        ctx.shadowColor = 'rgba(' + p.color + ', 0.6)';
        ctx.fill();
      }
      animId = requestAnimationFrame(render);
    }
    render();

    return function cleanup() {
      cancelAnimationFrame(animId);
      window.removeEventListener('resize', resize);
      if (canvas.parentNode) canvas.parentNode.removeChild(canvas);
    };
  }

  global.initHeroScene = initHeroScene;
})(window);
