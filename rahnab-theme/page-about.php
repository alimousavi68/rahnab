<?php
/**
 * Template Name: درباره رهناب (About)
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>
<!-- =========================================
       ABOUT HERO & BREADCRUMB
       ========================================= -->
  <section class="about-hero relative pt-32 sm:pt-40 pb-16 lg:pb-20 overflow-hidden border-b border-white/10">
    <!-- Ambient Radial Glow -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-gold-400/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-10 w-80 h-80 bg-amber-500/5 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="container mx-auto px-6 sm:px-10 lg:px-16 relative z-10">
      <!-- Breadcrumb Navigation (Standard Peyda font in Persian) -->
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-400 mb-8">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gold-400 transition-colors flex items-center gap-1.5 group">
          <svg class="w-3.5 h-3.5 text-gold-400 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <span data-i18n="nav_home">صفحه اصلی</span>
        </a>
        <span class="text-white/20 select-none">/</span>
        <span class="text-gold-400 font-bold" data-i18n="nav_about">درباره رهناب فارمد</span>
      </nav>

      <!-- Eyebrow Tag -->
      <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/25 mb-6 backdrop-blur-sm">
        <span class="w-2 h-2 rounded-full bg-gold-400 animate-pulse"></span>
        <span class="text-xs uppercase tracking-wider text-gold-300 font-semibold" data-i18n="about_hero_tag">معماری استقلال زیست‌دارویی کشور</span>
      </div>

      <!-- Main Headline: 100% Solid White (No Gradients) -->
      <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black text-white leading-tight lg:leading-[1.18] max-w-5xl tracking-tight mb-8" data-i18n="about_hero_title">
        هم‌افزایی سرمایه استراتژیک، علم مرجع و حاکمیت زیست‌فناوری سلامت
      </h1>

      <!-- Subtitle Lead -->
      <p class="text-base sm:text-xl text-slate-300 font-light leading-relaxed max-w-4xl" data-i18n="about_hero_subtitle">
        هلدینگ سرمایه‌گذاری رهناب فارمد صرفاً یک نهاد مالی نیست؛ یک شتاب‌دهنده صنعتی است که فاصله پژوهشگاه‌های بنیادین تا خطوط تولید انبوه داروهای پیشرفته، پلاسما و بیوتکنولوژی را در جمهوری اسلامی ایران به صفر می‌رساند.
      </p>
    </div>
  </section>

  <!-- =========================================
       ZONE 1: CORPORATE NARRATIVE, CLEANROOM & STATS COUNTER
       ========================================= -->
  <section class="py-20 lg:py-24 relative overflow-hidden border-b border-white/10">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
        <!-- Visual Column (Cleanroom Imagery & Tech Badge) -->
        <div class="lg:col-span-6 relative">
          <div class="relative rounded-3xl overflow-hidden border border-gold-400/30 shadow-[0_20px_60px_rgba(0,0,0,0.8)] group">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/about-cleanroom.jpg" alt="Cleanroom Facility"
              class="w-full h-[300px] sm:h-[420px] lg:h-[500px] object-cover filter brightness-95 group-hover:scale-105 transition-transform duration-700">
            <!-- Ambient Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#05070B] via-transparent to-transparent opacity-80"></div>
            
            <!-- Floating Cleanroom Grade Badge with full i18n -->
            <div class="absolute bottom-6 right-6 left-6 p-4 rounded-2xl bg-[#0A0E17]/90 backdrop-blur-md border border-white/10 flex items-center justify-between">
              <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full bg-emerald-400 animate-pulse"></span>
                <div>
                  <div class="text-xs uppercase tracking-wider text-slate-400" data-i18n="about_cleanroom_infra">زیرساخت اتاق تمیز صنعتی</div>
                  <div class="text-sm font-bold text-white" data-i18n="about_cleanroom_grade">استاندارد GMP کلاس A / B بین‌المللی</div>
                </div>
              </div>
              <span class="text-xs font-mono text-gold-400 font-bold px-2.5 py-1 rounded bg-gold-400/10 border border-gold-400/20">ISO 14644</span>
            </div>
          </div>
        </div>

        <!-- Text & Narrative Column -->
        <div class="lg:col-span-6 flex flex-col justify-center">
          <div class="inline-flex items-center gap-2 mb-4">
            <span class="h-px w-6 bg-gold-400"></span>
            <span class="text-xs uppercase tracking-wider text-gold-400 font-bold" data-i18n="about_narrative_label">داستان ما و رسالت بنیادین</span>
          </div>
          <h2 class="text-2xl sm:text-4xl font-extrabold text-white leading-tight mb-6" data-i18n="about_narrative_title">
            از سنتز آزمایشگاهی تا زیرساخت‌های کلان صنعتی
          </h2>
          <p class="text-slate-300 text-sm sm:text-base leading-relaxed mb-6" data-i18n="about_narrative_p1">
            صنعت سلامت در جهان معاصر، عرصه نبرد دسترسی به فناوری‌های انحصاری است. هلدینگ رهناب فارمد با هدف رفع کامل وابستگی ایران به داروهای مشتق از پلاسما، پادزهرهای تخصصی و ایمونوتراپی سرطان شکل گرفت.
          </p>
          <p class="text-slate-400 text-sm sm:text-base leading-relaxed mb-8" data-i18n="about_narrative_p2">
            ما با تجمیع تخصص ۶ شرکت دانش‌بنیان پیشرو تحت یک مدیریت واحد، چرخه کاملی از طراحی مولکول، فرآیند تخمیر بیولوژیک، جمع‌آوری پلاسمای انسانی، خالص‌سازی فوق‌پیشرفته و آزمون‌های کنترل کیفی مرجع را بنا نهاده‌ایم.
          </p>

          <!-- 3 Pillars List -->
          <div class="space-y-4">
            <div class="flex items-start gap-4 p-3.5 rounded-xl bg-white/[0.02] border border-white/5 hover:border-gold-400/30 transition-colors">
              <div class="w-8 h-8 rounded-lg bg-gold-400/10 border border-gold-400/20 flex items-center justify-center shrink-0 mt-0.5">
                <span class="text-xs font-bold text-gold-400">۰۱</span>
              </div>
              <div>
                <h3 class="text-sm font-bold text-white mb-1" data-i18n="about_pillar_1_title">سرمایه‌گذاری خطرپذیر علمی (Scientific Venture)</h3>
                <p class="text-xs text-slate-400 leading-relaxed" data-i18n="about_pillar_1_desc">حمایت جامع از پروژه‌های لبه دانش بیوتک با هدف تبدیل پتنت‌های دانشگاهی به محصولات پرچمدار بازار.</p>
              </div>
            </div>

            <div class="flex items-start gap-4 p-3.5 rounded-xl bg-white/[0.02] border border-white/5 hover:border-gold-400/30 transition-colors">
              <div class="w-8 h-8 rounded-lg bg-gold-400/10 border border-gold-400/20 flex items-center justify-center shrink-0 mt-0.5">
                <span class="text-xs font-bold text-gold-400">۰۲</span>
              </div>
              <div>
                <h3 class="text-sm font-bold text-white mb-1" data-i18n="about_pillar_2_title">زنجیره خودکفا و تاب‌آور (Sovereign Supply Chain)</h3>
                <p class="text-xs text-slate-400 leading-relaxed" data-i18n="about_pillar_2_desc">حذف کامل آسیب‌پذیری دارویی کشور در مواجهه با تحریم‌های بین‌المللی و بحران‌های زیست‌پزشکی.</p>
              </div>
            </div>

            <div class="flex items-start gap-4 p-3.5 rounded-xl bg-white/[0.02] border border-white/5 hover:border-gold-400/30 transition-colors">
              <div class="w-8 h-8 rounded-lg bg-gold-400/10 border border-gold-400/20 flex items-center justify-center shrink-0 mt-0.5">
                <span class="text-xs font-bold text-gold-400">۰۳</span>
              </div>
              <div>
                <h3 class="text-sm font-bold text-white mb-1" data-i18n="about_pillar_3_title">مرجعیت کیفی و استاندارد بین‌المللی (GMP Compliance)</h3>
                <p class="text-xs text-slate-400 leading-relaxed" data-i18n="about_pillar_3_desc">رعایت استانداردهای جهانی فارماکوپه اروپا و سازمان بهداشت جهانی (WHO) در کلیه خطوط تولید.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Relocated Stats Section with Animated Counters -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-16 pt-12 border-t border-white/10">
        <!-- Stat 1 -->
        <div class="p-6 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-gold-400/30 transition-all group">
          <div class="kpi-counter-val text-3xl sm:text-4xl font-bold text-gold-400 tracking-tight flex items-baseline gap-1" data-target="2000">
            <span>+</span>
            <span class="kpi-num stat-number">۲,۰۰۰</span>
            <span class="text-lg text-gold-300 font-mono" data-i18n="about_page_invest_abbr"></span>
          </div>
          <div class="text-xs sm:text-sm text-slate-400 mt-2 font-medium" data-i18n="about_stat_invest_label">میلیارد تومان سرمایه‌گذاری متعهد</div>
        </div>

        <!-- Stat 2 -->
        <div class="p-6 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-gold-400/30 transition-all group">
          <div class="kpi-counter-val text-3xl sm:text-4xl font-bold text-gold-400 tracking-tight flex items-baseline gap-1" data-target="1400">
            <span class="kpi-num stat-number">۱,۴۰۰</span>
            <span>+</span>
          </div>
          <div class="text-xs sm:text-sm text-slate-400 mt-2 font-medium" data-i18n="about_stat_scientists_label">پژوهشگر، متخصص و نیروی نخبه</div>
        </div>

        <!-- Stat 3 -->
        <div class="p-6 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-gold-400/30 transition-all group">
          <div class="kpi-counter-val text-3xl sm:text-4xl font-bold text-gold-400 tracking-tight flex items-baseline gap-1" data-target="6">
            <span class="kpi-num stat-number">۶</span>
          </div>
          <div class="text-xs sm:text-sm text-slate-400 mt-2 font-medium" data-i18n="about_stat_companies_label">شرکت دانش‌بنیان تخصصی</div>
        </div>

        <!-- Stat 4 -->
        <div class="p-6 rounded-2xl bg-white/[0.02] border border-white/5 hover:border-gold-400/30 transition-all group">
          <div class="kpi-counter-val text-3xl sm:text-4xl font-bold text-gold-400 tracking-tight flex items-baseline gap-1" data-target="300000">
            <span class="kpi-num stat-number">۳۰۰,۰۰۰</span>
            <span class="text-lg text-gold-300 font-mono" data-i18n="about_stat_liters_unit">L</span>
          </div>
          <div class="text-xs sm:text-sm text-slate-400 mt-2 font-medium" data-i18n="about_stat_liters_label">لیتر ظرفیت پالایش پلاسما در سال</div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 2: CORE CAPABILITIES & HOLDING SERVICES (6 LUXURY CARDS)
       ========================================= -->
  <section class="py-20 lg:py-28 relative overflow-hidden">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/25 mb-4">
          <span class="text-xs uppercase tracking-wider text-gold-400 font-semibold" data-i18n="services_section_tag">خدمات و توانمندی‌های محوری هلدینگ</span>
        </div>
        <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight leading-tight" data-i18n="services_section_title">
          زنجیره جامع خدمات تخصصی و فناوری‌های زیست‌دارویی
        </h2>
        <p class="text-slate-400 text-sm sm:text-base mt-4 leading-relaxed" data-i18n="services_section_subtitle">
          تلفیق زیرساخت‌های کلان صنعتی، استانداردهای فارماکوپه بین‌المللی و زنجیره تأمین یکپارچه سلامت
        </p>
      </div>

      <!-- 6 Luxury Elevated Glass Cards (Synchronized with Homepage Value Chain) -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        <!-- Card 1: Veterinary & Poultry Vaccines -->
        <div class="p-8 rounded-3xl bg-[#0A0E17]/85 border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-xl hover:-translate-y-1.5">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="text-xs font-bold text-gold-400/80 tracking-widest font-fa" data-i18n="svc_1_num">۰۱</span>
              <div class="flex items-center gap-1.5 flex-wrap">
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 text-slate-300 border border-white/10 font-medium" data-i18n="svc_1_badge_1">دام و طیور</span>
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-gold-400/10 text-gold-300 border border-gold-400/20 font-medium" data-i18n="svc_1_badge_2">واکسن‌های نوترکیب</span>
              </div>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gold-400/[0.04] border border-gold-400/25 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/60 group-hover:bg-gold-400/15 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.2)] transition-all duration-300">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-veterinary-vaccines.svg" alt="واکسن‌های دامی و طیور" class="w-10 h-10 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
            </div>
            <h3 class="text-lg font-bold text-white mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_1_title">ارائه انواع واکسن‌های دامی و طیور</h3>
            <p class="text-xs text-gold-400/80 font-en-mono font-medium mb-3" data-i18n="svc_1_en">Veterinary Recombinant Vaccines & National Biosecurity</p>
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed" data-i18n="svc_1_desc">تأمین امنیت زیستی و زنجیره سلامت غذایی از طریق تولید، توسعه و ارتقای فرمولاسیون واکسن‌های نوترکیب حیوانی و طیور با استانداردهای نوین بین‌المللی.</p>
          </div>
        </div>

        <!-- Card 2: Pediatric Pharmaceuticals -->
        <div class="p-8 rounded-3xl bg-[#0A0E17]/85 border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-xl hover:-translate-y-1.5">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="text-xs font-bold text-gold-400/80 tracking-widest font-fa" data-i18n="svc_2_num">۰۲</span>
              <div class="flex items-center gap-1.5 flex-wrap">
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 text-slate-300 border border-white/10 font-medium" data-i18n="svc_2_badge_1">انکولوژی اطفال</span>
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-gold-400/10 text-gold-300 border border-gold-400/20 font-medium" data-i18n="svc_2_badge_2">فرمولاسیون اختصاصی</span>
              </div>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gold-400/[0.04] border border-gold-400/25 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/60 group-hover:bg-gold-400/15 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.2)] transition-all duration-300">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-pediatric-pharma.svg" alt="داروهای کودکان و اطفال" class="w-10 h-10 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
            </div>
            <h3 class="text-lg font-bold text-white mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_2_title">ارائه انواع داروهای کودکان و اطفال</h3>
            <p class="text-xs text-gold-400/80 font-en-mono font-medium mb-3" data-i18n="svc_2_en">Pediatric Specialty Formulations & Metabolic Care</p>
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed" data-i18n="svc_2_desc">تولید فرمولاسیون‌های حیاتی و داروهای ویژه نوزادان و کودکان در حوزه‌های انکولوژی، متابولیک و درمان‌های دارویی اختصاصی اطفال.</p>
          </div>
        </div>

        <!-- Card 3: Therapeutic Supplements & Nutraceuticals -->
        <div class="p-8 rounded-3xl bg-[#0A0E17]/85 border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-xl hover:-translate-y-1.5">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="text-xs font-bold text-gold-400/80 tracking-widest font-fa" data-i18n="svc_3_num">۰۳</span>
              <div class="flex items-center gap-1.5 flex-wrap">
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 text-slate-300 border border-white/10 font-medium" data-i18n="svc_3_badge_1">مکمل‌های زیستی</span>
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-gold-400/10 text-gold-300 border border-gold-400/20 font-medium" data-i18n="svc_3_badge_2">پروبیوتیک درمانی</span>
              </div>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gold-400/[0.04] border border-gold-400/25 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/60 group-hover:bg-gold-400/15 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.2)] transition-all duration-300">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-nutraceuticals.svg" alt="مکمل‌های غذایی و درمانی" class="w-10 h-10 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
            </div>
            <h3 class="text-lg font-bold text-white mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_3_title">ارائه انواع مکمل‌های غذایی و درمانی</h3>
            <p class="text-xs text-gold-400/80 font-en-mono font-medium mb-3" data-i18n="svc_3_en">Therapeutic Supplements & Bioactive Nutraceuticals</p>
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed" data-i18n="svc_3_desc">توسعه فرآورده‌های طبیعی پیشرفته، پروبیوتیک‌های زیستی و مکمل‌های متابولیک و درمانی با هدف ارتقای پایدار شاخص‌های سلامت عمومی جامعه.</p>
          </div>
        </div>

        <!-- Card 4: Biological Dressings for Surgery & Burns -->
        <div class="p-8 rounded-3xl bg-[#0A0E17]/85 border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-xl hover:-translate-y-1.5">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="text-xs font-bold text-gold-400/80 tracking-widest font-fa" data-i18n="svc_4_num">۰۴</span>
              <div class="flex items-center gap-1.5 flex-wrap">
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 text-slate-300 border border-white/10 font-medium" data-i18n="svc_4_badge_1">ترمیم بافت و سوختگی</span>
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-gold-400/10 text-gold-300 border border-gold-400/20 font-medium" data-i18n="svc_4_badge_2">ماتریکس آمنیوتیک</span>
              </div>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gold-400/[0.04] border border-gold-400/25 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/60 group-hover:bg-gold-400/15 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.2)] transition-all duration-300">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-biological-dressings.svg" alt="ارائه انواع پانسمان‌های زیستی و سوختگی" class="w-10 h-10 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
            </div>
            <h3 class="text-lg font-bold text-white mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_4_title">ارائه انواع پانسمان‌های زیستی و سوختگی</h3>
            <p class="text-xs text-gold-400/80 font-en-mono font-medium mb-3" data-i18n="svc_4_en">Regenerative Dermal Matrices & Burn Bio-Dressings</p>
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed" data-i18n="svc_4_desc">ارائه راهکارهای ماتریکس بیولوژیک و سلول‌های بازساختی جهت تسریع فرآیند ترمیم بافت در سوختگی‌های حاد پوستی، جراحی‌های باز و زخم‌های مزمن.</p>
          </div>
        </div>

        <!-- Card 5: Plasma Protein Replacement Therapy -->
        <div class="p-8 rounded-3xl bg-[#0A0E17]/85 border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-xl hover:-translate-y-1.5">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="text-xs font-bold text-gold-400/80 tracking-widest font-fa" data-i18n="svc_5_num">۰۵</span>
              <div class="flex items-center gap-1.5 flex-wrap">
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 text-slate-300 border border-white/10 font-medium" data-i18n="svc_5_badge_1">مشتقات پلاسما</span>
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-gold-400/10 text-gold-300 border border-gold-400/20 font-medium" data-i18n="svc_5_badge_2">IVIG و آلبومین</span>
              </div>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gold-400/[0.04] border border-gold-400/25 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/60 group-hover:bg-gold-400/15 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.2)] transition-all duration-300">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-plasma-therapy.svg" alt="ارائه انواع داروهای مشتق از پلاسما و نوترکیب" class="w-10 h-10 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
            </div>
            <h3 class="text-lg font-bold text-white mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_5_title">ارائه انواع داروهای مشتق از پلاسما و نوترکیب</h3>
            <p class="text-xs text-gold-400/80 font-en-mono font-medium mb-3" data-i18n="svc_5_en">Plasma-Derived Protein Replacement & Immunoglobulins</p>
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed" data-i18n="svc_5_desc">تأمین فرآورده‌های مشتق از پلاسما شامل IVIG، آلبومین انسانی و فاکتورهای انعقادی حیاتی برای بیماران دچار کمبود یا نقص ایمنی اولیه و اکتسابی.</p>
          </div>
        </div>

        <!-- Card 6: Advanced Vaccine Adjuvants -->
        <div class="p-8 rounded-3xl bg-[#0A0E17]/85 border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-xl hover:-translate-y-1.5">
          <div>
            <div class="flex items-center justify-between mb-6">
              <span class="text-xs font-bold text-gold-400/80 tracking-widest font-fa" data-i18n="svc_6_num">۰۶</span>
              <div class="flex items-center gap-1.5 flex-wrap">
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-white/5 text-slate-300 border border-white/10 font-medium" data-i18n="svc_6_badge_1">ادجوانت‌های زیستی</span>
                <span class="text-[11px] px-2.5 py-0.5 rounded-full bg-gold-400/10 text-gold-300 border border-gold-400/20 font-medium" data-i18n="svc_6_badge_2">افزایش ایمنی‌زایی</span>
              </div>
            </div>
            <div class="w-16 h-16 rounded-2xl bg-gold-400/[0.04] border border-gold-400/25 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/60 group-hover:bg-gold-400/15 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.2)] transition-all duration-300">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/icons/services/service-vaccine-adjuvants.svg" alt="ارائه انواع یاورها و فرمولاسیون‌های اختصاصی واکسن" class="w-10 h-10 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
            </div>
            <h3 class="text-lg font-bold text-white mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_6_title">ارائه انواع یاورها و فرمولاسیون‌های اختصاصی واکسن</h3>
            <p class="text-xs text-gold-400/80 font-en-mono font-medium mb-3" data-i18n="svc_6_en">Advanced Biological Adjuvants & Immune Enhancers</p>
            <p class="text-xs sm:text-sm text-slate-400 leading-relaxed" data-i18n="svc_6_desc">فرمولاسیون و تولید ادجوانت‌های پیشرفته زیستی جهت افزایش اثربخشی و ایمنی‌زایی واکسن‌ها و به حداقل رساندن دوز مصرفی و عوارض ناخواسته جانبی.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 3: ORGANIZATIONAL STRUCTURE (INTERACTIVE GOVERNANCE TREE)
       Matching media_1789190816840.png with luxury glassmorphism
       ========================================= -->
  <section class="py-20 lg:py-28 bg-[#070A10] border-y border-white/10 relative overflow-hidden">
    <!-- Watermark Background Typography (Structure) -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none opacity-[0.03] select-none">
      <span class="text-[120px] sm:text-[200px] lg:text-[280px] font-black font-en-display tracking-widest text-white">STRUCTURE</span>
    </div>

    <div class="container mx-auto px-6 sm:px-10 lg:px-16 relative z-10">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/25 mb-4">
          <span class="text-xs uppercase tracking-wider text-gold-400 font-semibold" data-i18n="org_section_tag">حاکمیت و ساختار مدیریتی</span>
        </div>
        <h2 class="text-2xl sm:text-4xl font-black text-white tracking-tight" data-i18n="org_section_title">ساختار سازمانی هلدینگ رهناب فارمد</h2>
        <p class="text-slate-400 text-sm sm:text-base mt-3 leading-relaxed" data-i18n="org_section_subtitle">معماری حاکمیت شرکتی منسجم، شفاف و شایسته‌محور در مسیر تحقق اهداف راهبردی سلامت کشور</p>
      </div>

      <!-- Tree Diagram Container -->
      <div class="max-w-5xl mx-auto flex flex-col items-center">
        
        <!-- LEVEL 1: Board of Directors + Audit Committee Side Branch -->
        <div class="w-full relative flex flex-col items-center">
          <div class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-12 relative z-10 w-full max-w-2xl">
            <!-- Node: Board of Directors -->
            <div class="org-node flex-1 w-full p-5 sm:p-6 rounded-2xl bg-[#0A0E17] border-2 border-gold-400/50 shadow-[0_12px_35px_rgba(229,184,135,0.15)] text-center group cursor-pointer">
              <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-gold-400/15 text-gold-300 text-[10px] font-bold mb-2">
                <span>رکن عالی حاکمیت</span>
              </div>
              <h3 class="text-lg sm:text-xl font-black text-white group-hover:text-gold-300 transition-colors" data-i18n="org_board_title">هیأت مدیره</h3>
              <p class="text-xs text-slate-400 mt-1.5 leading-relaxed" data-i18n="org_board_role">عالی‌ترین رکن سیاست‌گذاری و تدوین استراتژی‌های کلان</p>
            </div>

            <!-- Side Horizontal Line for Desktop -->
            <div class="hidden md:block w-8 h-0.5 bg-gradient-to-r from-gold-400/60 to-white/30 shrink-0"></div>

            <!-- Node: Audit Committee (Independent Side Node) -->
            <div class="org-node flex-1 w-full p-4 sm:p-5 rounded-2xl bg-[#0A0E17]/80 border border-white/20 shadow-lg text-center group cursor-pointer">
              <div class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-full bg-white/10 text-slate-300 text-[10px] font-bold mb-1.5">
                <span>نظارت مستقل</span>
              </div>
              <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="org_audit_title">کمیته حسابرسی</h4>
              <p class="text-[11px] text-slate-400 mt-1 leading-relaxed" data-i18n="org_audit_role">نظارت مستقل مالی، ارزیابی کنترل‌های داخلی و ریسک</p>
            </div>
          </div>

          <!-- Vertical Connector Line from Board to CEO -->
          <div class="w-0.5 h-10 sm:h-12 bg-gradient-to-b from-gold-400 to-white/30 my-1"></div>

          <!-- LEVEL 2: Chief Executive Officer (CEO) -->
          <div class="org-node w-full max-w-md p-5 sm:p-6 rounded-2xl bg-[#0A0E17] border border-gold-400/40 shadow-xl text-center group cursor-pointer z-10">
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-gold-400/10 text-gold-300 text-[10px] font-bold mb-2">
              <span>فرماندهی اجرایی</span>
            </div>
            <h3 class="text-lg sm:text-xl font-black text-white group-hover:text-gold-300 transition-colors" data-i18n="org_ceo_title">مدیرعامل</h3>
            <p class="text-xs text-slate-400 mt-1.5 leading-relaxed" data-i18n="org_ceo_role">فرماندهی اجرایی و راهبری عملیاتی هلدینگ و شرکت‌های تابعه</p>
          </div>

          <!-- Vertical Connector Line from CEO to Distribution Spine -->
          <div class="w-0.5 h-10 sm:h-12 bg-gradient-to-b from-white/30 to-gold-400 my-1"></div>

          <!-- Horizontal Distribution Spine (Desktop) -->
          <div class="hidden lg:block w-[88%] h-0.5 bg-gradient-to-r from-transparent via-gold-400/60 to-transparent relative">
            <div class="absolute top-0 left-0 w-full h-full flex justify-around">
              <span class="w-0.5 h-6 bg-gold-400/60 block"></span>
              <span class="w-0.5 h-6 bg-gold-400/60 block"></span>
              <span class="w-0.5 h-6 bg-gold-400/60 block"></span>
              <span class="w-0.5 h-6 bg-gold-400/60 block"></span>
            </div>
          </div>

          <!-- LEVEL 3: 4 Executive Management Divisions -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 w-full pt-6 lg:pt-8">
            <!-- Division 1 -->
            <div class="org-node p-5 rounded-2xl bg-[#0A0E17]/90 border border-white/10 hover:border-gold-400/50 transition-all flex flex-col justify-between group shadow-md">
              <div>
                <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-400 mb-4 group-hover:scale-110 transition-transform">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
                  </svg>
                </div>
                <h4 class="text-sm sm:text-base font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="org_div_1_title">مدیریت سرمایه‌گذاری</h4>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed" data-i18n="org_div_1_role">سرمایه‌گذاری خطرپذیر و راهبری پورتفولیو</p>
              </div>
            </div>

            <!-- Division 2 -->
            <div class="org-node p-5 rounded-2xl bg-[#0A0E17]/90 border border-white/10 hover:border-gold-400/50 transition-all flex flex-col justify-between group shadow-md">
              <div>
                <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-400 mb-4 group-hover:scale-110 transition-transform">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6"/>
                  </svg>
                </div>
                <h4 class="text-sm sm:text-base font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="org_div_2_title">مدیریت طرح و برنامه‌ریزی</h4>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed" data-i18n="org_div_2_role">تدوین استراتژی‌ها و کنترل پروژه‌های صنعتی</p>
              </div>
            </div>

            <!-- Division 3 -->
            <div class="org-node p-5 rounded-2xl bg-[#0A0E17]/90 border border-white/10 hover:border-gold-400/50 transition-all flex flex-col justify-between group shadow-md">
              <div>
                <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-400 mb-4 group-hover:scale-110 transition-transform">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                  </svg>
                </div>
                <h4 class="text-sm sm:text-base font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="org_div_3_title">مدیریت مالی-اداری</h4>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed" data-i18n="org_div_3_role">انضباط مالی، حسابداری و منابع انسانی</p>
              </div>
            </div>

            <!-- Division 4 -->
            <div class="org-node p-5 rounded-2xl bg-[#0A0E17]/90 border border-white/10 hover:border-gold-400/50 transition-all flex flex-col justify-between group shadow-md">
              <div>
                <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-400 mb-4 group-hover:scale-110 transition-transform">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                  </svg>
                </div>
                <h4 class="text-sm sm:text-base font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="org_div_4_title">مدیریت حقوقی-ثبتی</h4>
                <p class="text-xs text-slate-400 mt-2 leading-relaxed" data-i18n="org_div_4_role">حفاظت از پتنت‌ها، قراردادها و امور ثبتی</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 4: HUMAN CAPITAL & MONOCHROME SUBSIDIARIES CAROUSEL
       ========================================= -->
  <section class="py-20 lg:py-28 relative overflow-hidden">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <!-- Top Narrative Header -->
      <div class="max-w-3xl mb-12">
        <div class="inline-flex items-center gap-2 mb-4">
          <span class="h-px w-6 bg-gold-400"></span>
          <span class="text-xs uppercase tracking-wider text-gold-400 font-bold" data-i18n="human_capital_label">سرمایه انسانی و نخبگان علمی</span>
        </div>
        <h2 class="text-2xl sm:text-4xl font-extrabold text-white leading-tight mb-4" data-i18n="about_scientists_title">
          قدرت ما در مغزافزار دانشمندان و متخصصان نهفته است
        </h2>
        <p class="text-slate-300 text-sm sm:text-base leading-relaxed" data-i18n="about_scientists_desc">
          ما در رهناب فارمد بر این باوریم که پیچیده‌ترین تجهیزات پالایشگاهی بدون ذهن‌های خلاق و متعهد بی‌ثمرند. اکوسیستم هلدینگ میزبان شبکه‌ای پویا از بیش از ۱۴۰۰ پژوهشگر و نخبگان بیوتکنولوژی است.
        </p>

        <!-- 2 Stat Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-6">
          <div class="p-4 rounded-xl bg-white/[0.02] border border-white/5 flex items-center gap-4">
            <div class="text-3xl font-black text-gold-400 font-serif-stat shrink-0" data-i18n="about_scientists_kpi1_val">۶۸٪</div>
            <div>
              <div class="text-xs text-slate-200 font-bold" data-i18n="about_scientists_kpi1_title">مدارک ارشد و دکتری (PhD)</div>
              <div class="text-[11px] text-slate-400 mt-0.5" data-i18n="about_scientists_kpi1_desc">در تخصص‌های ژنتیک، بیوتکنولوژی و داروسازی</div>
            </div>
          </div>
          <div class="p-4 rounded-xl bg-white/[0.02] border border-white/5 flex items-center gap-4">
            <div class="text-3xl font-black text-gold-400 font-serif-stat shrink-0" data-i18n="about_scientists_kpi2_val">۲۴+</div>
            <div>
              <div class="text-xs text-slate-200 font-bold" data-i18n="about_scientists_kpi2_title">پتنت و نوآوری صنعتی</div>
              <div class="text-[11px] text-slate-400 mt-0.5" data-i18n="about_scientists_kpi2_desc">ثبت فرمولاسیون و متدهای تولید انحصاری</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Holding Specialized Subsidiaries (2-Row Grid matching Homepage) -->
      <div class="pt-12 border-t border-white/10">
        <div class="mb-8">
          <span class="text-xs font-mono text-gold-400 uppercase tracking-wider block mb-1" data-i18n="about_subs_tag">ECOSYSTEM SYNERGY</span>
          <h3 class="text-xl sm:text-2xl font-bold text-white" data-i18n="about_subs_title">اکوسیستم شرکت‌های تخصصی هلدینگ</h3>
          <p class="text-slate-400 text-xs sm:text-sm mt-1.5 leading-relaxed" data-i18n="about_subs_desc">بنگاه‌های تخصصی و هم‌افزا در زنجیره یکپارچه سلامت و فناوری‌های زیست‌دارویی</p>
        </div>

        <!-- 6 Subsidiaries Grid in 2 Rows (3 Columns x 2 Rows) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Venture 1: Nozhin Zist -->
          <a href="https://nojinepharmed.com/" target="_blank" rel="noopener noreferrer"
            class="subsidiary-card p-6 rounded-2xl bg-[#0A0E17] border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-lg hover:-translate-y-1.5">
            <div>
              <div class="h-16 flex items-center justify-center p-2 rounded-xl bg-white/[0.02] border border-white/5 mb-5">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/nojin_logo.webp" alt="Nozhin Zist"
                  class="subsidiary-mono-logo h-10 w-auto object-contain">
              </div>
              <div class="text-xs font-mono text-gold-400/80 mb-1">01 / BIOPHARMACEUTICALS</div>
              <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="sub_rasta">نوژین زیست فارمد</h4>
              <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed" data-i18n="sub_rasta_desc">واکسن‌های دامی و طیور و فرآورده‌های زیستی پیشرفته</p>
            </div>
            <div class="pt-4 mt-5 border-t border-white/5 flex items-center justify-between text-xs text-slate-500 group-hover:text-gold-400 transition-colors">
              <span>nojinepharmed.com</span>
              <span class="text-sm">↗</span>
            </div>
          </a>

          <!-- Venture 2: Tamin Plasma -->
          <a href="https://tpnojine.com/" target="_blank" rel="noopener noreferrer"
            class="subsidiary-card p-6 rounded-2xl bg-[#0A0E17] border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-lg hover:-translate-y-1.5">
            <div>
              <div class="h-16 flex items-center justify-center p-2 rounded-xl bg-white/[0.02] border border-white/5 mb-5">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-tamin-plasma.svg" alt="Tamin Plasma"
                  class="subsidiary-mono-logo h-10 w-auto object-contain">
              </div>
              <div class="text-xs font-mono text-gold-400/80 mb-1">02 / PLASMA REFINERY</div>
              <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="sub_sinagene">تأمین پلاسما نوژین</h4>
              <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed" data-i18n="sub_sinagene_desc">فرآورده‌های مشتق از پلاسما و پالایشگاه صنعتی</p>
            </div>
            <div class="pt-4 mt-5 border-t border-white/5 flex items-center justify-between text-xs text-slate-500 group-hover:text-gold-400 transition-colors">
              <span>tpnojine.com</span>
              <span class="text-sm">↗</span>
            </div>
          </a>

          <!-- Venture 3: Persis Gene -->
          <a href="https://demo-branding.com/persis/" target="_blank" rel="noopener noreferrer"
            class="subsidiary-card p-6 rounded-2xl bg-[#0A0E17] border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-lg hover:-translate-y-1.5">
            <div>
              <div class="h-16 flex items-center justify-center p-2 rounded-xl bg-white/[0.02] border border-white/5 mb-5">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-persisgen.png" alt="Persis Gene"
                  class="subsidiary-mono-logo h-10 w-auto object-contain">
              </div>
              <div class="text-xs font-mono text-gold-400/80 mb-1">03 / ACCELERATOR & INCUBATION</div>
              <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="sub_pishgaman">پرسیس ژن</h4>
              <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed" data-i18n="sub_pishgaman_desc">شتاب‌دهنده زیست‌دارویی و تجاری‌سازی فناوری</p>
            </div>
            <div class="pt-4 mt-5 border-t border-white/5 flex items-center justify-between text-xs text-slate-500 group-hover:text-gold-400 transition-colors">
              <span>persisgene.com</span>
              <span class="text-sm">↗</span>
            </div>
          </a>

          <!-- Venture 4: Arc Zist Azma -->
          <a href="http://arcbioassay.com/" target="_blank" rel="noopener noreferrer"
            class="subsidiary-card p-6 rounded-2xl bg-[#0A0E17] border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-lg hover:-translate-y-1.5">
            <div>
              <div class="h-16 flex items-center justify-center p-2 rounded-xl bg-white/[0.02] border border-white/5 mb-5">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-arc.png" alt="Arc Zist Azma"
                  class="subsidiary-mono-logo h-10 w-auto object-contain">
              </div>
              <div class="text-xs font-mono text-gold-400/80 mb-1">04 / REFERENCE QC LAB</div>
              <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="sub_plasma">آرک زیست آزما</h4>
              <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed" data-i18n="sub_plasma_desc">آزمایشگاه کنترل کیفی بیولوژیک و رفرنس ملی</p>
            </div>
            <div class="pt-4 mt-5 border-t border-white/5 flex items-center justify-between text-xs text-slate-500 group-hover:text-gold-400 transition-colors">
              <span>arcbioassay.com</span>
              <span class="text-sm">↗</span>
            </div>
          </a>

          <!-- Venture 5: Padra Serum Alborz -->
          <a href="https://padraserum.com/" target="_blank" rel="noopener noreferrer"
            class="subsidiary-card p-6 rounded-2xl bg-[#0A0E17] border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-lg hover:-translate-y-1.5">
            <div>
              <div class="h-16 flex items-center justify-center p-2 rounded-xl bg-white/[0.02] border border-white/5 mb-5">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/padra-serum-logo-who-Final-PNG-1.png" alt="Padra Serum"
                  class="subsidiary-mono-logo h-10 w-auto object-contain">
              </div>
              <div class="text-xs font-mono text-gold-400/80 mb-1">05 / HYPERIMMUNE & ANTIVENOM</div>
              <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="sub_partgene">پادرا سرم البرز</h4>
              <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed" data-i18n="sub_partgene_desc">سرم‌های ایمنی، پادزهرهای مار و عقرب</p>
            </div>
            <div class="pt-4 mt-5 border-t border-white/5 flex items-center justify-between text-xs text-slate-500 group-hover:text-gold-400 transition-colors">
              <span>padraserum.com</span>
              <span class="text-sm">↗</span>
            </div>
          </a>

          <!-- Venture 6: KarayaKhteh / CARTIMED -->
          <a href="http://karayakhteh.ir/" target="_blank" rel="noopener noreferrer"
            class="subsidiary-card p-6 rounded-2xl bg-[#0A0E17] border border-white/10 hover:border-gold-400/50 hover:bg-[#101522] transition-all duration-300 flex flex-col justify-between group shadow-lg hover:-translate-y-1.5">
            <div>
              <div class="h-16 flex items-center justify-center p-2 rounded-xl bg-white/[0.02] border border-white/5 mb-5">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-karayakhte.webp" alt="KarayaKhteh"
                  class="subsidiary-mono-logo h-10 w-auto object-contain">
              </div>
              <div class="text-xs font-mono text-gold-400/80 mb-1">06 / CELL THERAPY & BIOREACTORS</div>
              <h4 class="text-base sm:text-lg font-bold text-white group-hover:text-gold-300 transition-colors" data-i18n="sub_pharmazist">کارا یاخته تجهیز آزما</h4>
              <p class="text-xs sm:text-sm text-slate-400 mt-2 leading-relaxed" data-i18n="sub_pharmazist_desc">ایمونوتراپی سلولی CAR-T و بیوراکتورهای پیشرفته</p>
            </div>
            <div class="pt-4 mt-5 border-t border-white/5 flex items-center justify-between text-xs text-slate-500 group-hover:text-gold-400 transition-colors">
              <span>karayakhteh.ir</span>
              <span class="text-sm">↗</span>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 5: B2B PARTNERSHIP BANNER
       ========================================= -->
  <section class="py-16 sm:py-20 relative">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div class="rounded-3xl p-8 sm:p-12 bg-gradient-to-r from-[#101522] via-[#0A0E17] to-[#05070B] border border-gold-400/30 flex flex-col lg:flex-row items-center justify-between gap-8 shadow-2xl">
        <div>
          <span class="text-xs uppercase tracking-wider text-gold-400 font-bold mb-2 block" data-i18n="about_b2b_tag">شراکت و اتحاد استراتژیک</span>
          <h3 class="text-xl sm:text-3xl font-black text-white leading-tight" data-i18n="about_b2b_title">آماده همکاری و سرمایه‌گذاری مشترک در پروژه‌های پیشرفته بیوتک هستید؟</h3>
          <p class="text-slate-400 text-sm mt-2 max-w-2xl" data-i18n="about_b2b_desc">پورتال ارتباط مستقیم هلدینگ رهناب فارمد آماده دریافت پیشنهادات تجاری، انتقال تکنولوژی و طرح‌های نخبگانی است.</p>
        </div>
        <div class="shrink-0 flex items-center gap-4">
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary text-sm px-7 py-3.5 rounded-full font-bold inline-flex items-center gap-2 cursor-pointer">
            <span class="w-2 h-2 rounded-full bg-black animate-ping"></span>
            <span data-i18n="about_b2b_btn">ثبت درخواست رسمی B2B</span>
          </a>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
