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
                data-i18n="about_stat_invest">+<?php echo esc_html(rahnab_get_option('rahnab_invest_val', '۲,۰۰۰')); ?></span>
              <span class="text-xs font-bold text-white" data-i18n="about_stat_invest_unit"><?php echo esc_html(rahnab_get_option('rahnab_invest_unit', 'میلیارد تومان')); ?></span>
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
        <?php
        $services_query = new WP_Query([
            'post_type'      => 'service',
            'posts_per_page' => 6,
            'orderby'        => 'menu_order date',
            'order'          => 'ASC',
        ]);

        $default_services = [
            1 => [
                'title'    => 'ارائه انواع واکسن‌های دامی و طیور',
                'en'       => 'Veterinary Recombinant Vaccines & National Biosecurity',
                'desc'     => 'تأمین امنیت زیستی و زنجیره سلامت غذایی از طریق تولید، توسعه و ارتقای فرمولاسیون واکسن‌های نوترکیب حیوانی و طیور با استانداردهای نوین بین‌المللی.',
                'badge_1'  => 'دام و طیور',
                'badge_2'  => 'واکسن‌های نوترکیب',
            ],
            2 => [
                'title'    => 'ارائه انواع داروهای کودکان و اطفال',
                'en'       => 'Pediatric Specialty Formulations & Metabolic Care',
                'desc'     => 'تولید فرمولاسیون‌های حیاتی و داروهای ویژه نوزادان و کودکان در حوزه‌های انکولوژی، متابولیک و درمان‌های دارویی اختصاصی اطفال.',
                'badge_1'  => 'انکولوژی اطفال',
                'badge_2'  => 'فرمولاسیون اختصاصی',
            ],
            3 => [
                'title'    => 'ارائه انواع مکمل‌های غذایی و درمانی',
                'en'       => 'Therapeutic Supplements & Bioactive Nutraceuticals',
                'desc'     => 'توسعه فرآورده‌های طبیعی پیشرفته، پروبیوتیک‌های زیستی و مکمل‌های متابولیک و درمانی با هدف ارتقای پایدار شاخص‌های سلامت عمومی جامعه.',
                'badge_1'  => 'مکمل‌های زیستی',
                'badge_2'  => 'پروبیوتیک درمانی',
            ],
            4 => [
                'title'    => 'ارائه انواع پانسمان‌های زیستی و سوختگی',
                'en'       => 'Regenerative Dermal Matrices & Burn Bio-Dressings',
                'desc'     => 'ارائه راهکارهای ماتریکس بیولوژیک و سلول‌های بازساختی جهت تسریع فرآیند ترمیم بافت در سوختگی‌های حاد پوستی، جراحی‌های باز و زخم‌های مزمن.',
                'badge_1'  => 'ترمیم بافت و سوختگی',
                'badge_2'  => 'ماتریکس آمنیوتیک',
            ],
            5 => [
                'title'    => 'ارائه انواع داروهای مشتق از پلاسما و نوترکیب',
                'en'       => 'Plasma-Derived Protein Replacement & Immunoglobulins',
                'desc'     => 'تأمین فرآورده‌های مشتق از پلاسما شامل IVIG، آلبومین انسانی و فاکتورهای انعقادی حیاتی برای بیماران دچار کمبود یا نقص ایمنی اولیه و اکتسابی.',
                'badge_1'  => 'مشتقات پلاسما',
                'badge_2'  => 'IVIG و آلبومین',
            ],
            6 => [
                'title'    => 'ارائه انواع یاورها و فرمولاسیون‌های اختصاصی واکسن',
                'en'       => 'Next-Generation Vaccine Adjuvants & Nanocarriers',
                'desc'     => 'فرمولاسیون و تولید ادجوانت‌های پیشرفته زیستی جهت افزایش اثربخشی و ایمنی‌زایی واکسن‌ها و به حداقل رساندن دوز مصرفی و عوارض ناخواسته جانبی.',
                'badge_1'  => 'ادجوانت‌های زیستی',
                'badge_2'  => 'افزایش ایمنی‌زایی',
            ],
        ];

        if ($services_query->have_posts()) :
            $tier = 0;
            while ($services_query->have_posts()) :
                $services_query->the_post();
                $tier++;
                $post_id = get_the_ID();
                $fallback = $default_services[$tier] ?? $default_services[1];

                $title = get_the_title();
                $title_en = rahnab_get_meta($post_id, '_service_title_en', $fallback['en']);
                $desc = get_the_excerpt();
                if (empty($desc)) {
                    $desc = get_the_content();
                }
                if (empty($desc)) {
                    $desc = $fallback['desc'];
                }
                $desc = wp_strip_all_tags($desc);

                $badge_1 = rahnab_get_meta($post_id, '_service_badge', $fallback['badge_1']);
                $badge_2 = rahnab_get_meta($post_id, '_service_badge_secondary', $fallback['badge_2']);
                $icon_url = rahnab_get_service_icon($post_id, $tier);
                ?>
                <!-- <?php printf('%02d', $tier); ?>: <?php echo esc_html($title); ?> -->
                <div class="value-chain-tier-card group" data-tier="<?php echo esc_attr($tier); ?>">
                  <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-start gap-6">
                      <div
                        class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($title); ?>"
                          class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
                      </div>
                      <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                          data-i18n="svc_<?php echo esc_attr($tier); ?>_title"><?php echo esc_html($title); ?></h3>
                        <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                          data-i18n="svc_<?php echo esc_attr($tier); ?>_en"><?php echo esc_html($title_en); ?></p>
                        <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_<?php echo esc_attr($tier); ?>_desc"><?php echo esc_html($desc); ?></p>
                      </div>
                    </div>
                    <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
                      <span
                        class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                        data-i18n="svc_<?php echo esc_attr($tier); ?>_badge_1"><?php echo esc_html($badge_1); ?></span>
                      <span
                        class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                        data-i18n="svc_<?php echo esc_attr($tier); ?>_badge_2"><?php echo esc_html($badge_2); ?></span>
                    </div>
                  </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            // Direct fallback to default 6 services
            foreach ($default_services as $tier => $svc) :
                $icon_url = rahnab_get_service_icon(0, $tier);
                ?>
                <div class="value-chain-tier-card group" data-tier="<?php echo esc_attr($tier); ?>">
                  <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-start gap-6">
                      <div
                        class="shrink-0 w-20 h-20 md:w-24 md:h-24 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                        <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($svc['title']); ?>"
                          class="w-14 h-14 md:w-16 md:h-16 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
                      </div>
                      <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-1 group-hover:text-gold-300 transition-colors"
                          data-i18n="svc_<?php echo esc_attr($tier); ?>_title"><?php echo esc_html($svc['title']); ?></h3>
                        <p class="caption text-gold-400 font-en-mono tracking-wider font-semibold text-xs md:text-sm mb-1.5"
                          data-i18n="svc_<?php echo esc_attr($tier); ?>_en"><?php echo esc_html($svc['en']); ?></p>
                        <p class="body-sm text-slate-300/85 text-xs md:text-sm leading-relaxed" data-i18n="svc_<?php echo esc_attr($tier); ?>_desc"><?php echo esc_html($svc['desc']); ?></p>
                      </div>
                    </div>
                    <div class="flex flex-col items-start md:items-end gap-1.5 shrink-0">
                      <span
                        class="service-badge text-[11px] px-3 py-1 bg-white/10 rounded-full text-slate-300 border border-white/10"
                        data-i18n="svc_<?php echo esc_attr($tier); ?>_badge_1"><?php echo esc_html($svc['badge_1']); ?></span>
                      <span
                        class="service-badge text-[11px] px-3 py-1 bg-gold-400/15 rounded-full text-gold-400 border border-gold-400/20"
                        data-i18n="svc_<?php echo esc_attr($tier); ?>_badge_2"><?php echo esc_html($svc['badge_2']); ?></span>
                    </div>
                  </div>
                </div>
                <?php
            endforeach;
        endif;
        ?>
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
      <!-- 6 Subsidiaries Grid (Dual-Action Cards, Centered Optimized Logos, Clutter-Free) -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        <?php
        $default_companies = [
            1 => [
                'name'    => 'نوژین زیست فارمد',
                'en'      => 'Nozhin Zist Pharmed',
                'role'    => 'پالایشگاه صنعتی پلاسما — تولید فاکتورهای خونی، آلبومین و ایمونوگلوبولین‌ها با ظرفیت سالانه ۱۵۰,۰۰۰ لیتر.',
                'anchor'  => 'company-nojin',
                'website' => 'https://nojinepharmed.com/',
                'logo'    => 'assets/images/subsidiaries/nojin_logo.webp',
            ],
            2 => [
                'name'    => 'تأمین پلاسما نوژین',
                'en'      => 'Tamin Plasma Nozhin',
                'role'    => 'شبکه سراسری مراکز آفرزیس خودکار و تأمین پلاسمای استاندارد انسانی با انطباق کامل بر استانداردهای بین‌المللی GMP.',
                'anchor'  => 'company-tamin-plasma',
                'website' => 'https://tpnojine.com/',
                'logo'    => 'assets/images/subsidiaries/logo-tamin-plasma.svg',
            ],
            3 => [
                'name'    => 'پرسیس‌ژن',
                'en'      => 'Persis Gene',
                'role'    => 'شتابدهنده و انکوباتور ملی فرآیندهای زیستی، بانک سلولی و تحقیق و توسعه محصولات نوین بیوتکنولوژی و بیوسیمیلارها.',
                'anchor'  => 'company-persis',
                'website' => 'https://demo-branding.com/persis/',
                'logo'    => 'assets/images/subsidiaries/logo-persisgen.png',
            ],
            4 => [
                'name'    => 'آرک زیست آزما',
                'en'      => 'Arc Zist Azma',
                'role'    => 'آزمایشگاه همکار سازمان غذا و دارو (IFDA)، مرجع ملی کنترل کیفیت فرآورده‌های بیولوژیک و صدور گواهی Batch Release.',
                'anchor'  => 'company-arc',
                'website' => 'http://arcbioassay.com/',
                'logo'    => 'assets/images/subsidiaries/logo-arc.png',
            ],
            5 => [
                'name'    => 'پادرا سرم البرز',
                'en'      => 'Padra Serum Alborz',
                'role'    => 'تولیدکننده پیشرو پادزهرهای هایپرایمیون مارگزیدگی، عقرب‌گزیدگی و سرم‌های درمانی اورژانسی با پوشش بیش از ۷۰٪ نیاز ملی.',
                'anchor'  => 'company-padra',
                'website' => 'https://padraserum.com/',
                'logo'    => 'assets/images/subsidiaries/padra-serum-logo-who-Final-PNG-1.png',
            ],
            6 => [
                'name'    => 'کارا یاخته تجهیز آزما',
                'en'      => 'KarayaKhteh / CARTIMED',
                'role'    => 'پیشگام ایمونوتراپی سلولی اتولوگ، فاز کارآزمایی بالینی درمان سرطان با فناوری CAR-T و تولید فرآورده‌های دارویی پیشرفته ATMP.',
                'anchor'  => 'company-karayakhteh',
                'website' => 'http://karayakhteh.ir/',
                'logo'    => 'assets/images/subsidiaries/logo-karayakhte.webp',
            ],
        ];

        $companies_query = new WP_Query([
            'post_type'      => 'company',
            'posts_per_page' => 6,
            'orderby'        => ['menu_order' => 'ASC', 'ID' => 'ASC'],
            'post_status'    => 'publish',
        ]);

        $comp_idx = 0;
        if ($companies_query->have_posts()) :
            while ($companies_query->have_posts()) :
                $companies_query->the_post();
                $comp_idx++;
                $post_id  = get_the_ID();
                $fallback = $default_companies[$comp_idx] ?? $default_companies[1];

                $comp_name = get_the_title();
                $comp_en   = rahnab_get_meta($post_id, '_company_name_en', $fallback['en']);
                $comp_role = get_the_excerpt();
                if (empty($comp_role)) {
                    $comp_role = get_the_content();
                }
                if (empty($comp_role)) {
                    $comp_role = $fallback['role'];
                }
                $comp_role = wp_strip_all_tags($comp_role);

                $anchor_id   = rahnab_get_meta($post_id, '_company_anchor_id', $fallback['anchor']);
                $website     = rahnab_get_meta($post_id, '_company_website', $fallback['website']);
                $logo_url    = rahnab_get_company_logo($post_id, $comp_idx);
                $detail_link = home_url('/companies/#' . ltrim($anchor_id, '#'));
                ?>
                <!-- Comp <?php printf('%02d', $comp_idx); ?>: <?php echo esc_html($comp_name); ?> -->
                <div class="subsidiary-card group">
                  <div class="subsidiary-spotlight"></div>
                  <!-- Centered Prominent Logo Frame -->
                  <div class="subsidiary-logo-frame">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($comp_name); ?>" class="subsidiary-logo-img">
                  </div>
                  <div class="flex-grow text-start">
                    <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
                      data-i18n="comp_<?php echo esc_attr($comp_idx); ?>_name"><?php echo esc_html($comp_name); ?></h3>
                    <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
                      data-i18n="comp_<?php echo esc_attr($comp_idx); ?>_en"><?php echo esc_html($comp_en); ?></p>
                    <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_<?php echo esc_attr($comp_idx); ?>_role">
                      <?php echo esc_html($comp_role); ?>
                    </p>
                  </div>
                  <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
                    <a href="<?php echo esc_url($detail_link); ?>" class="company-learn-more-btn">
                      <span data-i18n="company_learn_more"><?php esc_html_e('آشنایی بیشتر', 'rahnab'); ?></span>
                      <span class="text-xs">↗</span>
                    </a>
                    <?php if (!empty($website)) : ?>
                    <a href="<?php echo esc_url($website); ?>" target="_blank" rel="noopener noreferrer"
                      class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
                      title="<?php esc_attr_e('مشاهده وب‌سایت رسمی شرکت', 'rahnab'); ?>" aria-label="<?php esc_attr_e('مشاهده وب‌سایت رسمی شرکت', 'rahnab'); ?>">
                      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                      </svg>
                    </a>
                    <?php endif; ?>
                  </div>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            // Resilient fallback if no company posts
            foreach ($default_companies as $comp_idx => $comp) :
                $logo_url    = RAHNAB_URI . '/' . $comp['logo'];
                $detail_link = home_url('/companies/#' . $comp['anchor']);
                ?>
                <div class="subsidiary-card group">
                  <div class="subsidiary-spotlight"></div>
                  <!-- Centered Prominent Logo Frame -->
                  <div class="subsidiary-logo-frame">
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($comp['name']); ?>" class="subsidiary-logo-img">
                  </div>
                  <div class="flex-grow text-start">
                    <h3 class="text-xl font-bold text-white group-hover:text-gold-300 transition-colors mb-1 text-start"
                      data-i18n="comp_<?php echo esc_attr($comp_idx); ?>_name"><?php echo esc_html($comp['name']); ?></h3>
                    <p class="text-xs font-en-mono font-semibold tracking-wider text-slate-400 uppercase mb-3 text-start"
                      data-i18n="comp_<?php echo esc_attr($comp_idx); ?>_en"><?php echo esc_html($comp['en']); ?></p>
                    <p class="text-slate-300/80 text-xs md:text-sm leading-relaxed text-justify" data-i18n="comp_<?php echo esc_attr($comp_idx); ?>_role">
                      <?php echo esc_html($comp['role']); ?>
                    </p>
                  </div>
                  <div class="mt-6 pt-5 border-t border-white/5 flex items-center justify-between">
                    <a href="<?php echo esc_url($detail_link); ?>" class="company-learn-more-btn">
                      <span data-i18n="company_learn_more"><?php esc_html_e('آشنایی بیشتر', 'rahnab'); ?></span>
                      <span class="text-xs">↗</span>
                    </a>
                    <a href="<?php echo esc_url($comp['website']); ?>" target="_blank" rel="noopener noreferrer"
                      class="w-9 h-9 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-300 hover:bg-gold-400/20 hover:border-gold-400/40 transition-all transform hover:scale-105"
                      title="<?php esc_attr_e('مشاهده وب‌سایت رسمی شرکت', 'rahnab'); ?>" aria-label="<?php esc_attr_e('مشاهده وب‌سایت رسمی شرکت', 'rahnab'); ?>">
                      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                      </svg>
                    </a>
                  </div>
                </div>
                <?php
            endforeach;
        endif;
        ?>

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
            <span class="kpi-num">۱۰۰</span><span class="text-2xl font-normal text-gold-400 mr-1">%</span>
          </div>
          <p class="text-slate-200 font-bold text-base md:text-lg mb-1" data-i18n="impact_kpi_1">پوشش یکپارچه زنجیره</p>
          <span class="caption text-slate-400 text-xs" data-i18n="impact_sub_1">پوشش ۱۰۰ درصدی زنجیره لایف‌ساینس</span>
        </div>

        <div
          class="metric-card bg-white/[0.02] border border-white/5 hover:border-gold-400/20 transition-all rounded-2xl p-6">
          <div class="kpi-counter-val stat-number text-4xl md:text-5xl font-bold text-gold-400 mb-3"
            data-target="150000">
            <span class="kpi-num">۱۵۰,۰۰۰</span><span class="text-2xl font-normal text-gold-400 mr-1">+</span>
          </div>
          <p class="text-slate-200 font-bold text-base md:text-lg mb-1" data-i18n="impact_kpi_2">لیتر ظرفیت پالایش
            پلاسما</p>
          <span class="caption text-slate-400 text-xs" data-i18n="impact_sub_2">ظرفیت سالانه پالایشگاه اختصاصی</span>
        </div>

        <div
          class="metric-card bg-white/[0.02] border border-white/5 hover:border-gold-400/20 transition-all rounded-2xl p-6">
          <div class="kpi-counter-val stat-number text-4xl md:text-5xl font-bold text-gold-400 mb-3" data-target="70">
            <span class="kpi-num">۷۰</span><span class="text-2xl font-normal text-gold-400 mr-1">%+</span>
          </div>
          <p class="text-slate-200 font-bold text-base md:text-lg mb-1" data-i18n="impact_kpi_3">تأمین پادزهر اورژانسی
          </p>
          <span class="caption text-slate-400 text-xs" data-i18n="impact_sub_3">سهم ملی در مهار گزش‌های کشنده</span>
        </div>

        <div
          class="metric-card bg-white/[0.02] border border-white/5 hover:border-gold-400/20 transition-all rounded-2xl p-6">
          <div class="kpi-counter-val stat-number text-4xl md:text-5xl font-bold text-gold-400 mb-3" data-target="1400">
            <span class="kpi-num">۱,۴۰۰</span><span class="text-2xl font-normal text-gold-400 mr-1">+</span>
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
        <?php
        $default_news = [
            1 => [
                'title' => 'بهره‌برداری از فاز تکمیلی پالایشگاه صنعتی پلاسمای نوژین زیست فارمد با ظرفیت ۱۵۰ هزار لیتر',
                'desc'  => 'این گام استراتژیک، وابستگی کشور به ارسال پلاسما به خارج از مرزها را خاتمه داده و تولید داروهای حیاتی مشتق از پلاسما را درون مرزهای کشور تثبیت می‌کند.',
                'date'  => 'OCT 2024',
                'cat'   => 'توسعه زیرساخت ملی',
                'image' => 'assets/images/news-plasma-refinery.jpg',
            ],
            2 => [
                'title' => 'موفقیت کارا یاخته در فاز نخست کارآزمایی بالینی ایمونوتراپی سلولی CAR-T',
                'desc'  => 'ورود رسمی به باشگاه تولیدکنندگان فناوری‌های درمان پیشرفته سرطان در غرب آسیا.',
                'date'  => 'SEP 2024',
                'cat'   => 'فناوری و درمان‌های پیشرفته',
                'image' => 'assets/images/news-cart-celltherapy.jpg',
            ],
            3 => [
                'title' => 'تأمین بیش از ۷۰ درصد پادزهرهای اورژانسی کشور توسط پادرا سرم البرز',
                'desc'  => 'پوشش سراسری مراکز درمان گزش‌های خطرناک و نجات جان هزاران بیمار در مناطق مرزی.',
                'date'  => 'AUG 2024',
                'cat'   => 'ارتقای سلامت و خدمات ملی',
                'image' => 'assets/images/news-antivenom-lab.jpg',
            ],
        ];

        $news_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'post_status'    => 'publish',
        ]);

        $news_posts = $news_query->posts;
        $has_news   = !empty($news_posts);

        // Featured Story (1st item)
        if ($has_news && isset($news_posts[0])) :
            $post_1    = $news_posts[0];
            $post_id_1 = $post_1->ID;
            $title_1   = get_the_title($post_1);
            $desc_1    = get_the_excerpt($post_1);
            if (empty($desc_1)) {
                $desc_1 = $default_news[1]['desc'];
            }
            $desc_1    = wp_strip_all_tags($desc_1);
            $date_1    = strtoupper(get_the_date('M Y', $post_1));
            $cats_1    = get_the_category($post_id_1);
            $cat_1     = (!empty($cats_1) && $cats_1[0]->slug !== 'uncategorized') ? $cats_1[0]->name : $default_news[1]['cat'];
            $img_1     = rahnab_get_news_image($post_id_1, 1);
            $link_1    = get_permalink($post_1);
            ?>
            <!-- Featured Story (Local Refinery Image) -->
            <div class="lg:col-span-8 news-card group cursor-pointer relative overflow-hidden h-[360px] sm:h-[460px]" onclick="window.location.href='<?php echo esc_url($link_1); ?>'">
              <img src="<?php echo esc_url($img_1); ?>" alt="<?php echo esc_attr($title_1); ?>"
                class="news-card-img absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
              <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
                <div class="flex items-center gap-4 mb-3">
                  <span class="text-gold-400 text-xs font-bold font-en-display"><?php echo esc_html($date_1); ?></span>
                  <span class="bg-white/10 text-slate-200 px-3 py-1 rounded-full text-xs font-medium"
                    data-i18n="news_cat_1"><?php echo esc_html($cat_1); ?></span>
                </div>
                <h3
                  class="text-xl md:text-3xl font-bold text-white mb-3 group-hover:text-gold-400 transition-colors leading-snug"
                  data-i18n="news_item_1_title">
                  <a href="<?php echo esc_url($link_1); ?>" class="hover:text-gold-400 transition-colors">
                    <?php echo esc_html($title_1); ?>
                  </a>
                </h3>
                <p class="text-slate-300 text-xs md:text-sm line-clamp-2 leading-relaxed" data-i18n="news_item_1_desc">
                  <?php echo esc_html($desc_1); ?>
                </p>
              </div>
            </div>
        <?php else : ?>
            <!-- Fallback Featured Story -->
            <div class="lg:col-span-8 news-card group cursor-pointer relative overflow-hidden h-[360px] sm:h-[460px]">
              <img src="<?php echo esc_url(RAHNAB_URI . '/' . $default_news[1]['image']); ?>" alt="News Feature"
                class="news-card-img absolute inset-0 w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
              <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
                <div class="flex items-center gap-4 mb-3">
                  <span class="text-gold-400 text-xs font-bold font-en-display"><?php echo esc_html($default_news[1]['date']); ?></span>
                  <span class="bg-white/10 text-slate-200 px-3 py-1 rounded-full text-xs font-medium"
                    data-i18n="news_cat_1"><?php echo esc_html($default_news[1]['cat']); ?></span>
                </div>
                <h3
                  class="text-xl md:text-3xl font-bold text-white mb-3 group-hover:text-gold-400 transition-colors leading-snug"
                  data-i18n="news_item_1_title">
                  <?php echo esc_html($default_news[1]['title']); ?>
                </h3>
                <p class="text-slate-300 text-xs md:text-sm line-clamp-2 leading-relaxed" data-i18n="news_item_1_desc">
                  <?php echo esc_html($default_news[1]['desc']); ?>
                </p>
              </div>
            </div>
        <?php endif; ?>

        <!-- Secondary Stories (Local Lab & Antivenom Images) -->
        <div class="lg:col-span-4 flex flex-col gap-6">
          <?php
          if ($has_news && count($news_posts) > 1) :
              for ($i = 1; $i <= 2; $i++) :
                  $sec_idx = $i + 1;
                  $fallback = $default_news[$sec_idx];
                  if (isset($news_posts[$i])) {
                      $sec_post  = $news_posts[$i];
                      $sec_id    = $sec_post->ID;
                      $sec_title = get_the_title($sec_post);
                      $sec_desc  = get_the_excerpt($sec_post);
                      if (empty($sec_desc)) {
                          $sec_desc = $fallback['desc'];
                      }
                      $sec_desc  = wp_strip_all_tags($sec_desc);
                      $sec_date  = strtoupper(get_the_date('M Y', $sec_post));
                      $sec_img   = rahnab_get_news_image($sec_id, $sec_idx);
                      $sec_link  = get_permalink($sec_post);
                  } else {
                      $sec_title = $fallback['title'];
                      $sec_desc  = $fallback['desc'];
                      $sec_date  = $fallback['date'];
                      $sec_img   = RAHNAB_URI . '/' . $fallback['image'];
                      $sec_link  = home_url('/news/');
                  }
                  ?>
                  <div
                    class="news-card group cursor-pointer flex flex-col justify-between h-[218px] relative overflow-hidden p-6" onclick="window.location.href='<?php echo esc_url($sec_link); ?>'">
                    <img src="<?php echo esc_url($sec_img); ?>" alt="<?php echo esc_attr($sec_title); ?>"
                      class="news-card-img absolute inset-0 w-full h-full object-cover opacity-20 group-hover:opacity-30 transition-opacity">
                    <div class="relative z-10">
                      <span class="text-gold-400 text-xs font-bold font-en-display block mb-2"><?php echo esc_html($sec_date); ?></span>
                      <h4
                        class="text-base font-bold text-white group-hover:text-gold-400 transition-colors line-clamp-2 leading-snug"
                        data-i18n="news_item_<?php echo esc_attr($sec_idx); ?>_title">
                        <a href="<?php echo esc_url($sec_link); ?>" class="hover:text-gold-400 transition-colors">
                          <?php echo esc_html($sec_title); ?>
                        </a>
                      </h4>
                    </div>
                    <p class="text-slate-400 text-xs line-clamp-2 relative z-10" data-i18n="news_item_<?php echo esc_attr($sec_idx); ?>_desc"><?php echo esc_html($sec_desc); ?></p>
                  </div>
                  <?php
              endfor;
          else :
              // Fallback for Secondary Stories
              foreach ([2, 3] as $sec_idx) :
                  $fallback = $default_news[$sec_idx];
                  $sec_img  = RAHNAB_URI . '/' . $fallback['image'];
                  ?>
                  <div
                    class="news-card group cursor-pointer flex flex-col justify-between h-[218px] relative overflow-hidden p-6">
                    <img src="<?php echo esc_url($sec_img); ?>" alt="<?php echo esc_attr($fallback['title']); ?>"
                      class="news-card-img absolute inset-0 w-full h-full object-cover opacity-20 group-hover:opacity-30 transition-opacity">
                    <div class="relative z-10">
                      <span class="text-gold-400 text-xs font-bold font-en-display block mb-2"><?php echo esc_html($fallback['date']); ?></span>
                      <h4
                        class="text-base font-bold text-white group-hover:text-gold-400 transition-colors line-clamp-2 leading-snug"
                        data-i18n="news_item_<?php echo esc_attr($sec_idx); ?>_title">
                        <?php echo esc_html($fallback['title']); ?>
                      </h4>
                    </div>
                    <p class="text-slate-400 text-xs line-clamp-2 relative z-10" data-i18n="news_item_<?php echo esc_attr($sec_idx); ?>_desc"><?php echo esc_html($fallback['desc']); ?></p>
                  </div>
                  <?php
              endforeach;
          endif;
          wp_reset_postdata();
          ?>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
