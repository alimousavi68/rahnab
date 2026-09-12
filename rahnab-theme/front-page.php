<?php
/**
 * The front page template file for Rahnab Pharmed
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>
<!-- =========================================
       ZONE 1: HERO SECTION (Awwwards Cattaneo Composition)
       ========================================= -->
  <section class="hero-section" id="hero">
    <!-- Full-Bleed Background Video with Ambient Vignette -->
    <div class="hero-scaled-canvas-wrapper absolute inset-0 z-0 overflow-hidden pointer-events-none">
      <video class="hero-scaled-video" id="heroVideo" autoplay loop muted playsinline preload="auto">
        <source src="<?php echo esc_url(RAHNAB_URI); ?>/assets/videos/hero-genome.mp4" type="video/mp4">
      </video>
    </div>
    <div class="hero-ambient-vignette"></div>

    <!-- Top/Mid Narrative Statement (Opposite side from Headline — Desktop Only) -->
    <div class="relative z-10 w-full px-6 sm:px-10 lg:px-16 pt-16 sm:pt-24 hidden md:flex justify-end">
      <div class="max-w-xl text-start">
        <p class="text-sm sm:text-base md:text-lg text-slate-200/90 leading-relaxed font-normal">
          <span class="text-white font-bold block sm:inline" data-i18n="hero_narrative_lead">از سنتز فرآیندهای زیستی تا
            پالایشگاه صنعتی پلاسما: </span>
          <span data-i18n="hero_subtitle">راهبری یکپارچه زیرساخت‌های کلان زیست‌داروسازی، از پالایشگاه صنعتی پلاسما تا
            درمان‌های پیشرفته سلولی.</span>
        </p>
      </div>
    </div>

    <!-- Bottom Row: Massive Headline (Left) + Minimalist Scroll Indicator (Right) -->
    <div
      class="relative z-10 w-full px-6 sm:px-10 lg:px-16 pb-8 pt-16 flex flex-col md:flex-row md:items-end md:justify-between gap-8">
      <!-- Massive Editorial Headline (Bottom-Left) -->
      <div class="max-w-4xl lg:max-w-5xl 2xl:max-w-6xl text-start">
        <div
          class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-gold-400/25 bg-gold-400/10 text-gold-400 text-xs font-semibold mb-4 backdrop-blur-md">
          <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
          <span data-i18n="hero_badge">هلدینگ تخصصی سلامت و زیست‌داروسازی</span>
        </div>
        <h1 class="hero-headline leading-[1.04] tracking-tight text-start">
          <span class="hero-title-main block font-black text-white" data-i18n="hero_title_1">پیشگام در توسعه<br>فناوری‌های زیستی</span>
          <span class="hero-title-sub block font-normal not-italic text-gold-400 mt-2 sm:mt-3 lg:mt-5"
            data-i18n="hero_title_2">توسعه‌بخش راهکارهای نوین سلامت</span>
        </h1>
        <!-- Mobile Narrative Statement (Directly below Headline for ideal mobile UX) -->
        <div class="block md:hidden mt-4 pt-3 border-t border-white/10 max-w-lg text-start">
          <p class="text-xs sm:text-sm text-slate-300/90 leading-relaxed font-normal">
            <span class="text-white font-bold inline" data-i18n="hero_narrative_lead">از سنتز فرآیندهای زیستی تا پالایشگاه صنعتی پلاسما: </span>
            <span data-i18n="hero_subtitle">راهبری یکپارچه زیرساخت‌های کلان زیست‌داروسازی، از پالایشگاه صنعتی پلاسما تا درمان‌های پیشرفته سلولی.</span>
          </p>
        </div>
      </div>

      <!-- Minimalist Scroll Cue (Bottom-Right) -->
      <div class="shrink-0 flex items-center md:pb-2">
        <a href="#about"
          class="group inline-flex items-center gap-2.5 text-xs font-en-mono font-bold tracking-widest text-slate-400 hover:text-gold-400 transition-colors uppercase">
          <span data-i18n="hero_scroll">SCROLL TO EXPLORE</span>
          <svg class="w-3.5 h-3.5 text-gold-400 scroll-indicator-arrow transition-transform" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
          </svg>
        </a>
      </div>
    </div>

    <!-- Subtle Ecosystem Ticker Docked at Bottom -->
    <div id="heroMarqueeDivider"
      class="relative z-10 w-full border-t border-white/10 py-3 bg-[#05070B]/70 backdrop-blur-md overflow-hidden mask-radial-edges">
      <div
        class="animate-marquee items-center gap-10 sm:gap-14 text-[11px] font-en-mono font-bold uppercase tracking-widest text-slate-400">
        <span class="hover:text-gold-400 transition-colors">PERSIS GENE</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">TAMIN PLASMA</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">NOZHIN ZIST</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">CARTIMED</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">PADRA SERUM</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">BAYA ZIST</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">ARC ZIST AZMA</span>
        <span class="text-white/20">•</span>
        <!-- Loop duplicate -->
        <span class="hover:text-gold-400 transition-colors">PERSIS GENE</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">TAMIN PLASMA</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">NOZHIN ZIST</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">CARTIMED</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">PADRA SERUM</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">BAYA ZIST</span>
        <span class="text-white/20">•</span>
        <span class="hover:text-gold-400 transition-colors">ARC ZIST AZMA</span>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 2: ABOUT (Editorial Asymmetric)
       ========================================= -->
  <section class="pt-44 lg:pt-52 pb-28 bg-[#080B10] relative border-t border-white/5" id="about">
    <div class="container mx-auto px-6">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        <!-- Visual Column -->
        <div
          class="lg:col-span-6 about-img-col relative rounded-3xl overflow-hidden border border-white/10 shadow-2xl h-[320px] sm:h-[420px] lg:h-[480px] group">
          <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/about-cleanroom.jpg" alt="زیرساخت صنعتی زیست‌دارویی"
            class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
          <div class="absolute inset-0 bg-gradient-to-t from-[#05070B] via-[#05070B]/30 to-transparent"></div>
          <div
            class="absolute bottom-6 right-6 left-6 p-5 rounded-2xl bg-black/55 backdrop-blur-md border border-white/10">
            <span
              class="text-[10px] uppercase font-bold text-gold-400 font-en-mono tracking-widest block mb-1.5">STRATEGIC
              INFRASTRUCTURE</span>
            <p class="text-white font-bold text-sm md:text-base leading-snug" data-i18n="about_image_tag">زیرساخت صنعتی
              زیست‌دارویی کشور</p>
          </div>
        </div>

        <!-- Narrative Column -->
        <div class="lg:col-span-6 about-text-col flex flex-col gap-6">
          <!-- Label -->
          <div class="flex items-center gap-3 fade-up-element">
            <div class="h-[2px] w-8 bg-gold-400 shrink-0"></div>
            <span class="text-gold-400 font-bold text-xs tracking-widest uppercase" data-i18n="about_label">درباره
              ره‌ناب فارمد</span>
          </div>

          <!-- Title (kinetic) -->
          <h2 class="display-lg kinetic-title font-extrabold text-white leading-tight">
            <span class="line-wrapper"><span class="line-wrapper-inner block" data-i18n="about_title_1">ریشه در
                دانش،</span></span>
            <span class="line-wrapper"><span class="line-wrapper-inner block text-gold-400"
                data-i18n="about_title_2">شاخه در سلامت ملی</span></span>
          </h2>

          <!-- Condensed text — justify, larger, relaxed -->
          <div class="fade-up-element">
            <p class="text-slate-300 text-base md:text-lg leading-[1.9] text-justify" data-i18n="about_p1">
              هلدینگ سرمایه‌گذاری ره‌ناب فارمد با اتکا به سرمایه‌های انسانی نخبه، مدیریت تخصصی و بهره‌گیری از فناوری‌های
              پیشرفته زیستی، مسیر کشف، توسعه و شتاب‌دهی ایده‌های دانش‌بنیان در حوزه بایوتکنولوژی را می‌پیماید تا ارزشی
              پایدار برای سلامت ملی و تمامی ذی‌نفعان خلق کند.
            </p>
          </div>

          <!-- Stat Cards (improved visual) -->
          <div class="grid grid-cols-2 gap-4 fade-up-element">
            <!-- Card 1: +2000 -->
            <div
              class="about-stat-card p-5 rounded-2xl bg-gradient-to-br from-gold-400/15 to-gold-400/5 border border-gold-400/25 flex flex-col gap-1.5">
              <span class="text-3xl lg:text-4xl font-black text-gold-400 font-fa-display tracking-tight"
                data-i18n="about_stat_invest">+۲,۰۰۰</span>
              <span class="text-xs font-bold text-white" data-i18n="about_stat_invest_unit">میلیارد تومان</span>
              <span class="text-[11px] text-slate-400 leading-snug" data-i18n="about_stat_invest_label">سرمایه‌گذاری در
                زیست‌بوم دانش‌بنیان</span>
            </div>
            <!-- Card 2: 7 companies (replacing 1405) -->
            <div
              class="about-stat-card p-5 rounded-2xl bg-white/[0.04] border border-white/10 flex flex-col gap-1.5 hover:border-gold-400/20 transition-colors">
              <span class="text-3xl lg:text-4xl font-black text-white font-fa-display tracking-tight"
                data-i18n="about_stat_horizon">۷</span>
              <span class="text-xs font-bold text-gold-400" data-i18n="about_stat_horizon_unit">شرکت دانش‌بنیان
                فعال</span>
              <span class="text-[11px] text-slate-400 leading-snug" data-i18n="about_stat_horizon_label">در اکوسیستم
                هلدینگ رهناب</span>
            </div>
          </div>

          <!-- CTA -->
          <a href="#services"
            class="inline-flex items-center gap-3 text-gold-400 font-bold hover:text-gold-300 transition-colors group self-start fade-up-element">
            <span data-i18n="about_cta">درباره مأموریت و ساختار رهناب</span>
            <span
              class="transform group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">←</span>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 3: STRATEGIC SERVICES & CAPABILITIES (Glass Architecture with Custom Linear Icons)
       ========================================= -->
  <section class="services-section py-28 bg-[#05070B] relative border-t border-white/5" id="services">
    <div class="container mx-auto px-6 max-w-5xl">
      <!-- Section Header -->
      <div class="text-center mb-20 fade-up-element">
        <span class="caption text-gold-400 uppercase tracking-widest text-xs font-bold block mb-2"
          data-i18n="services_label">خدمات و توانمندی‌های راهبردی</span>
        <h2 class="display-xl kinetic-title font-extrabold text-white">
          <span class="line-wrapper block"><span class="line-wrapper-inner block" data-i18n="services_title">اکوسیستم
              یکپارچه زیست‌داروسازی</span></span>
        </h2>
        <p class="text-slate-400 max-w-2xl mx-auto mt-4 text-sm md:text-base" data-i18n="services_subtitle">
          ارائه راهکارهای حیاتی، تخصصی و نوآورانه در ۶ محور کلان سلامت، داروسازی و امنیت زیستی کشور
        </p>
      </div>

      <!-- Services Cards Stack (Value Chain Glass Architecture with 64x64 Standalone SVG Icons) -->
      <div class="space-y-5">
        <!-- 01: Veterinary & Poultry Vaccines -->
        <div class="value-chain-tier-card group" data-tier="1">
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-6">
              <div
                class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-veterinary-vaccines.svg" alt="واکسن‌های دامی و طیور"
                  class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
              </div>
              <div>
                <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                  data-i18n="svc_1_title">ارائه انواع واکسن‌های دامی و طیور</h3>
                <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                  data-i18n="svc_1_en">Veterinary Recombinant Vaccines & National Biosecurity</p>
                <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_1_desc">تأمین
                  امنیت زیستی و زنجیره سلامت غذایی از طریق تولید، توسعه و ارتقای فرمولاسیون واکسن‌های نوترکیب حیوانی و
                  طیور با استانداردهای نوین بین‌المللی.</p>
              </div>
            </div>
            <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
              <span
                class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                data-i18n="svc_1_badge_1">دام و طیور</span>
              <span
                class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                data-i18n="svc_1_badge_2">واکسن‌های نوترکیب</span>
            </div>
          </div>
        </div>

        <!-- 02: Pediatric Pharmaceuticals -->
        <div class="value-chain-tier-card group" data-tier="2">
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-6">
              <div
                class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-pediatric-pharma.svg" alt="داروهای کودکان و اطفال"
                  class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
              </div>
              <div>
                <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                  data-i18n="svc_2_title">ارائه انواع داروهای کودکان و اطفال</h3>
                <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                  data-i18n="svc_2_en">Pediatric Specialty Formulations & Metabolic Care</p>
                <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_2_desc">تولید
                  فرمولاسیون‌های حیاتی و داروهای ویژه نوزادان و کودکان در حوزه‌های انکولوژی، متابولیک و درمان‌های دارویی
                  اختصاصی اطفال.</p>
              </div>
            </div>
            <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
              <span
                class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                data-i18n="svc_2_badge_1">انکولوژی اطفال</span>
              <span
                class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                data-i18n="svc_2_badge_2">فرمولاسیون اختصاصی</span>
            </div>
          </div>
        </div>

        <!-- 03: Therapeutic Supplements & Nutraceuticals -->
        <div class="value-chain-tier-card group" data-tier="3">
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-6">
              <div
                class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-nutraceuticals.svg" alt="مکمل‌های غذایی و درمانی"
                  class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
              </div>
              <div>
                <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                  data-i18n="svc_3_title">ارائه انواع مکمل‌های غذایی و درمانی</h3>
                <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                  data-i18n="svc_3_en">Therapeutic Supplements & Bioactive Nutraceuticals</p>
                <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_3_desc">توسعه
                  فرآورده‌های طبیعی پیشرفته، پروبیوتیک‌های زیستی و مکمل‌های متابولیک و درمانی با هدف ارتقای پایدار
                  شاخص‌های سلامت عمومی جامعه.</p>
              </div>
            </div>
            <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
              <span
                class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                data-i18n="svc_3_badge_1">مکمل‌های زیستی</span>
              <span
                class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                data-i18n="svc_3_badge_2">پروبیوتیک درمانی</span>
            </div>
          </div>
        </div>

        <!-- 04: Biological Dressings for Surgery & Burns -->
        <div class="value-chain-tier-card group" data-tier="4">
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-6">
              <div
                class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-biological-dressings.svg"
                  alt="ارائه انواع پانسمان‌های زیستی و سوختگی"
                  class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
              </div>
              <div>
                <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                  data-i18n="svc_4_title">ارائه انواع پانسمان‌های زیستی و سوختگی</h3>
                <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                  data-i18n="svc_4_en">Regenerative Dermal Matrices & Burn Bio-Dressings</p>
                <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_4_desc">ارائه
                  راهکارهای ماتریکس بیولوژیک و سلول‌های بازساختی جهت تسریع فرآیند ترمیم بافت در سوختگی‌های حاد پوستی،
                  جراحی‌های باز و زخم‌های مزمن.</p>
              </div>
            </div>
            <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
              <span
                class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                data-i18n="svc_4_badge_1">ترمیم بافت و سوختگی</span>
              <span
                class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                data-i18n="svc_4_badge_2">ماتریکس آمنیوتیک</span>
            </div>
          </div>
        </div>

        <!-- 05: Plasma Protein Replacement Therapy -->
        <div class="value-chain-tier-card group" data-tier="5">
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-6">
              <div
                class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-plasma-therapy.svg"
                  alt="ارائه انواع داروهای مشتق از پلاسما و نوترکیب"
                  class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
              </div>
              <div>
                <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                  data-i18n="svc_5_title">ارائه انواع داروهای مشتق از پلاسما و نوترکیب</h3>
                <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                  data-i18n="svc_5_en">Plasma-Derived Protein Replacement & Immunoglobulins</p>
                <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_5_desc">تأمین
                  فرآورده‌های مشتق از پلاسما شامل IVIG، آلبومین انسانی و فاکتورهای انعقادی حیاتی برای بیماران دچار کمبود
                  یا نقص ایمنی اولیه و اکتسابی.</p>
              </div>
            </div>
            <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
              <span
                class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                data-i18n="svc_5_badge_1">مشتقات پلاسما</span>
              <span
                class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                data-i18n="svc_5_badge_2">IVIG و آلبومین</span>
            </div>
          </div>
        </div>

        <!-- 06: Advanced Vaccine Adjuvants -->
        <div class="value-chain-tier-card group" data-tier="6">
          <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div class="flex items-start gap-6">
              <div
                class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-vaccine-adjuvants.svg"
                  alt="ارائه انواع یاورها و فرمولاسیون‌های اختصاصی واکسن"
                  class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
              </div>
              <div>
                <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                  data-i18n="svc_6_title">ارائه انواع یاورها و فرمولاسیون‌های اختصاصی واکسن</h3>
                <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                  data-i18n="svc_6_en">Advanced Biological Adjuvants & Immune Enhancers</p>
                <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_6_desc">
                  فرمولاسیون و تولید ادجوانت‌های پیشرفته زیستی جهت افزایش اثربخشی و ایمنی‌زایی واکسن‌ها و به حداقل
                  رساندن دوز مصرفی و عوارض ناخواسته جانبی.</p>
              </div>
            </div>
            <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
              <span
                class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                data-i18n="svc_6_badge_1">ادجوانت‌های زیستی</span>
              <span
                class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                data-i18n="svc_6_badge_2">افزایش ایمنی‌زایی</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- =========================================
       ZONE 4: SUBSIDIARY COMPANIES PORTFOLIO (High-End Awwwards Showcase)
       ========================================= -->
  <section class="companies-section py-28 bg-[#070A11] relative border-t border-white/5" id="companies">
    <div class="container mx-auto px-6 max-w-7xl">
      <!-- Section Header (Center-Aligned matching #services) -->
      <div class="text-center mb-20 fade-up-element">
        <span class="caption text-gold-400 uppercase tracking-widest text-xs font-bold font-en-mono block mb-2"
          data-i18n="companies_label">اکوسیستم سرمایه‌گذاری</span>
        <h2 class="display-xl kinetic-title font-extrabold text-white">
          <span class="line-wrapper block"><span class="line-wrapper-inner block" data-i18n="companies_title">شرکت‌های
              دانش‌بنیان رهناب</span></span>
        </h2>
        <p class="text-slate-400 max-w-2xl mx-auto mt-4 text-sm md:text-base leading-relaxed"
          data-i18n="companies_subtitle">
          بنگاه‌های تخصصی و هم‌افزا — از پالایش صنعتی پلاسما تا ایمونوتراپی سلولی پیشرفته
        </p>
      </div>

      <!-- 6 Subsidiaries Grid (Dual-Action Cards, Centered Optimized Logos, Clutter-Free) -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">

        <!-- Comp 01: Nozhin Zist Pharmed -->
        <div class="subsidiary-card group">
          <div class="subsidiary-spotlight"></div>
          <!-- Centered Prominent Logo Frame -->
          <div class="subsidiary-logo-frame">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/nojin_logo.webp" alt="نوژین زیست فارمد" class="subsidiary-logo-img">
          </div>
          <div class="flex-grow text-start">
            <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
              data-i18n="comp_1_name">نوژین زیست فارمد</h3>
            <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
              data-i18n="comp_1_en">Nozhin Zist Pharmed</p>
            <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_1_role">
              پالایشگاه صنعتی پلاسما — تولید فاکتورهای خونی، آلبومین و ایمونوگلوبولین‌ها با ظرفیت سالانه ۱۵۰,۰۰۰ لیتر.
            </p>
          </div>
          <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
            <a href="#company-nojine" class="company-learn-more-btn">
              <span data-i18n="company_learn_more">آشنایی بیشتر</span>
              <span class="text-xs">↗</span>
            </a>
            <a href="https://nojinepharmed.com/" target="_blank" rel="noopener noreferrer"
              class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
              title="مشاهده وب‌سایت رسمی شرکت" aria-label="مشاهده وب‌سایت رسمی شرکت">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Comp 02: Tamin Plasma Nozhin -->
        <div class="subsidiary-card group">
          <div class="subsidiary-spotlight"></div>
          <!-- Centered Prominent Logo Frame -->
          <div class="subsidiary-logo-frame">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-tamin-plasma.svg" alt="تأمین پلاسما نوژین"
              class="subsidiary-logo-img">
          </div>
          <div class="flex-grow text-start">
            <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
              data-i18n="comp_2_name">تأمین پلاسما نوژین</h3>
            <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
              data-i18n="comp_2_en">Tamin Plasma Nozhin</p>
            <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_2_role">
              شبکه سراسری مراکز آفرزیس خودکار و تأمین پلاسمای استاندارد انسانی با انطباق کامل بر استانداردهای بین‌المللی
              GMP.
            </p>
          </div>
          <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
            <a href="#company-tamin" class="company-learn-more-btn">
              <span data-i18n="company_learn_more">آشنایی بیشتر</span>
              <span class="text-xs">↗</span>
            </a>
            <a href="https://tpnojine.com/" target="_blank" rel="noopener noreferrer"
              class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
              title="مشاهده وب‌سایت رسمی شرکت" aria-label="مشاهده وب‌سایت رسمی شرکت">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Comp 03: Persis Gene -->
        <div class="subsidiary-card group">
          <div class="subsidiary-spotlight"></div>
          <!-- Centered Prominent Logo Frame -->
          <div class="subsidiary-logo-frame">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-persisgen.png" alt="پرسیس‌ژن" class="subsidiary-logo-img">
          </div>
          <div class="flex-grow text-start">
            <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
              data-i18n="comp_3_name">پرسیس‌ژن</h3>
            <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
              data-i18n="comp_3_en">Persis Gene</p>
            <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_3_role">
              شتابدهنده و انکوباتور ملی فرآیندهای زیستی، بانک سلولی و تحقیق و توسعه محصولات نوین بیوتکنولوژی و
              بیوسیمیلارها.
            </p>
          </div>
          <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
            <a href="#company-persis" class="company-learn-more-btn">
              <span data-i18n="company_learn_more">آشنایی بیشتر</span>
              <span class="text-xs">↗</span>
            </a>
            <a href="https://demo-branding.com/persis/" target="_blank" rel="noopener noreferrer"
              class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
              title="مشاهده وب‌سایت رسمی شرکت" aria-label="مشاهده وب‌سایت رسمی شرکت">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Comp 04: Arc Zist Azma -->
        <div class="subsidiary-card group">
          <div class="subsidiary-spotlight"></div>
          <!-- Centered Prominent Logo Frame -->
          <div class="subsidiary-logo-frame">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-arc.png" alt="آرک زیست آزما" class="subsidiary-logo-img">
          </div>
          <div class="flex-grow text-start">
            <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
              data-i18n="comp_4_name">آرک زیست آزما</h3>
            <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
              data-i18n="comp_4_en">Arc Zist Azma</p>
            <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_4_role">
              آزمایشگاه همکار سازمان غذا و دارو (IFDA)، مرجع ملی کنترل کیفیت فرآورده‌های بیولوژیک و صدور گواهی Batch
              Release.
            </p>
          </div>
          <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
            <a href="#company-arc" class="company-learn-more-btn">
              <span data-i18n="company_learn_more">آشنایی بیشتر</span>
              <span class="text-xs">↗</span>
            </a>
            <a href="http://arcbioassay.com/" target="_blank" rel="noopener noreferrer"
              class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
              title="مشاهده وب‌سایت رسمی شرکت" aria-label="مشاهده وب‌سایت رسمی شرکت">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Comp 05: Padra Serum Alborz -->
        <div class="subsidiary-card group">
          <div class="subsidiary-spotlight"></div>
          <!-- Centered Prominent Logo Frame -->
          <div class="subsidiary-logo-frame">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/padra-serum-logo-who-Final-PNG-1.png" alt="پادرا سرم البرز"
              class="subsidiary-logo-img">
          </div>
          <div class="flex-grow text-start">
            <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
              data-i18n="comp_5_name">پادرا سرم البرز</h3>
            <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
              data-i18n="comp_5_en">Padra Serum Alborz</p>
            <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_5_role">
              تولیدکننده پیشرو پادزهرهای هایپرایمیون مارگزیدگی، عقرب‌گزیدگی و سرم‌های درمانی اورژانسی با پوشش بیش از ۷۰٪
              نیاز ملی.
            </p>
          </div>
          <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
            <a href="#company-padra" class="company-learn-more-btn">
              <span data-i18n="company_learn_more">آشنایی بیشتر</span>
              <span class="text-xs">↗</span>
            </a>
            <a href="https://padraserum.com/" target="_blank" rel="noopener noreferrer"
              class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
              title="مشاهده وب‌سایت رسمی شرکت" aria-label="مشاهده وب‌سایت رسمی شرکت">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
            </a>
          </div>
        </div>

        <!-- Comp 06: KarayaKhteh Tajhiz Azma -->
        <div class="subsidiary-card group">
          <div class="subsidiary-spotlight"></div>
          <!-- Centered Prominent Logo Frame -->
          <div class="subsidiary-logo-frame">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-karayakhte.webp" alt="کارا یاخته تجهیز آزما"
              class="subsidiary-logo-img">
          </div>
          <div class="flex-grow text-start">
            <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
              data-i18n="comp_6_name">کارا یاخته تجهیز آزما</h3>
            <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
              data-i18n="comp_6_en">KarayaKhteh / CARTIMED</p>
            <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_6_role">
              پیشگام ایمونوتراپی سلولی اتولوگ، فاز کارآزمایی بالینی درمان سرطان با فناوری CAR-T و تولید فرآورده‌های
              دارویی پیشرفته ATMP.
            </p>
          </div>
          <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
            <a href="#company-karayakhteh" class="company-learn-more-btn">
              <span data-i18n="company_learn_more">آشنایی بیشتر</span>
              <span class="text-xs">↗</span>
            </a>
            <a href="http://karayakhteh.ir/" target="_blank" rel="noopener noreferrer"
              class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
              title="مشاهده وب‌سایت رسمی شرکت" aria-label="مشاهده وب‌سایت رسمی شرکت">
              <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
              </svg>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 4: IMPACT METRICS (Full-Width Cinematic)
       ========================================= -->
  <section class="py-28 bg-[#07090e] relative border-y border-gold-400/10" id="impact">
    <div class="container mx-auto px-6">
      <div class="text-center mb-16 fade-up-element">
        <span class="caption text-gold-400 uppercase tracking-widest text-xs font-bold block mb-2"
          data-i18n="impact_label">مقیاس و نفوذ ملی</span>
        <h2 class="display-lg kinetic-title font-extrabold text-white" data-i18n="impact_title">تأثیر ملی در شاخص‌های
          سلامت</h2>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div
          class="metric-card bg-white/[0.02] border border-white/5 hover:border-gold-400/20 transition-all rounded-2xl p-6">
          <div class="kpi-counter-val stat-number text-4xl md:text-5xl font-bold text-gold-400 mb-3" data-target="100">
            <span class="kpi-num">۰</span><span class="text-2xl font-normal text-gold-400 mr-1">%</span>
          </div>
          <p class="text-slate-200 font-bold text-base md:text-lg mb-1" data-i18n="impact_kpi_1">پوشش یکپارچه زنجیره</p>
          <span class="caption text-slate-400 text-xs" data-i18n="impact_sub_1">پوشش ۱۰۰ درصدی زنجیره لایف‌ساینس</span>
        </div>

        <div
          class="metric-card bg-white/[0.02] border border-white/5 hover:border-gold-400/20 transition-all rounded-2xl p-6">
          <div class="kpi-counter-val stat-number text-4xl md:text-5xl font-bold text-gold-400 mb-3"
            data-target="150000">
            <span class="kpi-num">۰</span><span class="text-2xl font-normal text-gold-400 mr-1">+</span>
          </div>
          <p class="text-slate-200 font-bold text-base md:text-lg mb-1" data-i18n="impact_kpi_2">لیتر ظرفیت پالایش
            پلاسما</p>
          <span class="caption text-slate-400 text-xs" data-i18n="impact_sub_2">ظرفیت سالانه پالایشگاه اختصاصی</span>
        </div>

        <div
          class="metric-card bg-white/[0.02] border border-white/5 hover:border-gold-400/20 transition-all rounded-2xl p-6">
          <div class="kpi-counter-val stat-number text-4xl md:text-5xl font-bold text-gold-400 mb-3" data-target="70">
            <span class="kpi-num">۰</span><span class="text-2xl font-normal text-gold-400 mr-1">%+</span>
          </div>
          <p class="text-slate-200 font-bold text-base md:text-lg mb-1" data-i18n="impact_kpi_3">تأمین پادزهر اورژانسی
          </p>
          <span class="caption text-slate-400 text-xs" data-i18n="impact_sub_3">سهم ملی در مهار گزش‌های کشنده</span>
        </div>

        <div
          class="metric-card bg-white/[0.02] border border-white/5 hover:border-gold-400/20 transition-all rounded-2xl p-6">
          <div class="kpi-counter-val stat-number text-4xl md:text-5xl font-bold text-gold-400 mb-3" data-target="1400">
            <span class="kpi-num">۰</span><span class="text-2xl font-normal text-gold-400 mr-1">+</span>
          </div>
          <p class="text-slate-200 font-bold text-base md:text-lg mb-1" data-i18n="impact_kpi_4">دانشمند و نخبه زیستی
          </p>
          <span class="caption text-slate-400 text-xs" data-i18n="impact_sub_4">نیروی انسانی متخصص در اکوسیستم</span>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 5: NEWS & MEDIA (Local High-Res Images)
       ========================================= -->
  <section class="py-28 bg-[#05070B]" id="news">
    <div class="container mx-auto px-6">
      <div class="flex justify-between items-end mb-14">
        <div>
          <span class="caption text-gold-400 uppercase tracking-widest text-xs font-bold block mb-2"
            data-i18n="news_label">اخبار و رویدادهای هلدینگ</span>
          <h2 class="display-lg kinetic-title font-extrabold text-white" data-i18n="news_title">اخبار و رویدادها</h2>
        </div>
        <a href="<?php echo esc_url(home_url('/news/')); ?>"
          class="hidden sm:inline-flex items-center gap-2 text-gold-400 font-bold hover:text-gold-300 transition-colors text-sm"
          data-i18n="news_all">
          <span>مشاهده آرشیو اخبار</span>
          <span class="transform rtl:rotate-180">→</span>
        </a>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        <!-- Featured Story (Local Refinery Image) -->
        <div class="lg:col-span-8 news-card group cursor-pointer relative overflow-hidden h-[360px] sm:h-[460px]">
          <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/news-plasma-refinery.jpg" alt="News Feature"
            class="news-card-img absolute inset-0 w-full h-full object-cover">
          <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
          <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
            <div class="flex items-center gap-4 mb-3">
              <span class="text-gold-400 text-xs font-bold font-en-display">OCT 2024</span>
              <span class="bg-white/10 text-slate-200 px-3 py-1 rounded-full text-xs font-medium"
                data-i18n="news_cat_1">توسعه زیرساخت ملی</span>
            </div>
            <h3
              class="text-xl md:text-3xl font-bold text-white mb-3 group-hover:text-gold-400 transition-colors leading-snug"
              data-i18n="news_item_1_title">
              بهره‌برداری از فاز تکمیلی پالایشگاه صنعتی پلاسمای نوژین زیست فارمد با ظرفیت ۱۵۰ هزار لیتر
            </h3>
            <p class="text-slate-300 text-xs md:text-sm line-clamp-2 leading-relaxed" data-i18n="news_item_1_desc">
              این گام استراتژیک، وابستگی کشور به ارسال پلاسما به خارج از مرزها را خاتمه داده و تولید داروهای حیاتی مشتق
              از پلاسما را درون مرزهای کشور تثبیت می‌کند.
            </p>
          </div>
        </div>

        <!-- Secondary Stories (Local Lab & Antivenom Images) -->
        <div class="lg:col-span-4 flex flex-col gap-6">
          <div
            class="news-card group cursor-pointer flex flex-col justify-between h-[218px] relative overflow-hidden p-6">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/news-cart-celltherapy.jpg" alt="CAR-T Lab"
              class="news-card-img absolute inset-0 w-full h-full object-cover opacity-20 group-hover:opacity-30 transition-opacity">
            <div class="relative z-10">
              <span class="text-gold-400 text-xs font-bold font-en-display block mb-2">SEP 2024</span>
              <h4
                class="text-base font-bold text-white group-hover:text-gold-400 transition-colors line-clamp-2 leading-snug"
                data-i18n="news_item_2_title">
                موفقیت کارا یاخته در فاز نخست کارآزمایی بالینی ایمونوتراپی سلولی CAR-T
              </h4>
            </div>
            <p class="text-slate-400 text-xs line-clamp-2 relative z-10" data-i18n="news_item_2_desc">ورود رسمی به
              باشگاه تولیدکنندگان فناوری‌های درمان پیشرفته سرطان در غرب آسیا.</p>
          </div>

          <div
            class="news-card group cursor-pointer flex flex-col justify-between h-[218px] relative overflow-hidden p-6">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/news-antivenom-lab.jpg" alt="Antivenom Lab"
              class="news-card-img absolute inset-0 w-full h-full object-cover opacity-20 group-hover:opacity-30 transition-opacity">
            <div class="relative z-10">
              <span class="text-gold-400 text-xs font-bold font-en-display block mb-2">AUG 2024</span>
              <h4
                class="text-base font-bold text-white group-hover:text-gold-400 transition-colors line-clamp-2 leading-snug"
                data-i18n="news_item_3_title">
                تأمین بیش از ۷۰ درصد پادزهرهای اورژانسی کشور توسط پادرا سرم البرز
              </h4>
            </div>
            <p class="text-slate-400 text-xs line-clamp-2 relative z-10" data-i18n="news_item_3_desc">پوشش سراسری مراکز
              درمان گزش‌های خطرناک و نجات جان هزاران بیمار در مناطق مرزی.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
