<?php
/**
 * Template Name: توانمندی‌ها و خدمات (Services)
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>
<!-- =========================================
       ZONE 1: SERVICES HERO & BREADCRUMB
       ========================================= -->
  <section class="services-hero relative pt-32 sm:pt-40 pb-12 sm:pb-16 overflow-hidden border-b border-white/10">
    <!-- Ambient Radial Glows -->
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-gold-400/10 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-0 left-10 w-80 h-80 bg-amber-500/5 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="container mx-auto px-6 sm:px-10 lg:px-16 relative z-10">
      <!-- Breadcrumb Navigation (Standard Peyda font in Persian) -->
      <nav aria-label="Breadcrumb" class="flex items-center gap-2 text-xs text-slate-400 mb-6 sm:mb-8 flex-wrap">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gold-400 transition-colors flex items-center gap-1.5 group">
          <svg class="w-3.5 h-3.5 text-gold-400 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
          </svg>
          <span data-i18n="nav_home">صفحه اصلی</span>
        </a>
        <span class="text-white/20 select-none">/</span>
        <span class="text-gold-400 font-bold" data-i18n="nav_services">خدمات و توانمندی‌ها</span>
      </nav>

      <!-- Eyebrow Tag -->
      <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/25 mb-5 sm:mb-6 backdrop-blur-sm">
        <span class="w-2 h-2 rounded-full bg-gold-400 animate-pulse"></span>
        <span class="text-xs uppercase tracking-wider text-gold-300 font-semibold" data-i18n="services_hero_tag">زیرساخت‌های کلان صنعتی و دانش‌بنیان</span>
      </div>

      <!-- Main Headline: 100% Solid White (No Gradients) -->
      <h1 class="text-2xl sm:text-4xl lg:text-6xl font-black text-white leading-snug sm:leading-tight lg:leading-[1.18] max-w-5xl tracking-tight mb-5 sm:mb-6" data-i18n="services_hero_title">
        خدمات و توانمندی‌های راهبردی زیست‌دارویی
      </h1>

      <!-- Subtitle -->
      <p class="text-sm sm:text-base lg:text-lg text-slate-300 max-w-3xl leading-relaxed text-justify" data-i18n="services_hero_subtitle">
        زنجیره یکپارچه از فرمولاسیون واکسن‌های نوترکیب و فرآورده‌های مشتق از پلاسما تا درمان‌های پیشرفته سلولی و رفرنس کنترل کیفی کشور.
      </p>
    </div>
  </section>

  <!-- =========================================
       ZONE 2: 6 CAPABILITIES SHOWCASE GRID
       ========================================= -->
  <section class="py-12 sm:py-20 lg:py-24 relative">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div id="servicesGrid" class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-10">
        <?php
        $default_services_showcase = [
            1 => [
                'num'      => '۰۱',
                'title'    => 'ارائه انواع واکسن‌های دامی و طیور',
                'en'       => 'Veterinary Recombinant Vaccines & National Biosecurity',
                'badge_1'  => 'دام و طیور',
                'badge_2'  => 'واکسن‌های نوترکیب',
                'desc'     => 'تأمین امنیت زیستی و زنجیره سلامت غذایی از طریق تولید، توسعه و ارتقای فرمولاسیون واکسن‌های نوترکیب حیوانی و طیور با استانداردهای نوین بین‌المللی.',
                'specs'    => 'خطوط فرمولاسیون آسپتیک، بیوراکتورهای صنعتی پایلوت تا کلان، استانداردهای سازمان دامپزشکی و GMP بین‌المللی',
                'entities' => 'نوژین زیست فارمد | پرسیس‌ژن',
                'icon'     => 'service-veterinary-vaccines.svg',
            ],
            2 => [
                'num'      => '۰۲',
                'title'    => 'ارائه انواع داروهای کودکان و اطفال',
                'en'       => 'Pediatric Specialty Formulations & Metabolic Care',
                'badge_1'  => 'انکولوژی اطفال',
                'badge_2'  => 'فرمولاسیون اختصاصی',
                'desc'     => 'تولید فرمولاسیون‌های حیاتی و داروهای ویژه نوزادان و کودکان در حوزه‌های انکولوژی، متابولیک و درمان‌های دارویی اختصاصی اطفال.',
                'specs'    => 'کلین‌روم‌های رده A/B، سامانه‌های لیوفیلیزاسیون صنعتی، کنترل کیفی دقیق فارماکوپه‌ای',
                'entities' => 'پرسیس‌ژن | نوژین زیست فارمد',
                'icon'     => 'service-pediatric-pharma.svg',
            ],
            3 => [
                'num'      => '۰۳',
                'title'    => 'ارائه انواع مکمل‌های غذایی و درمانی',
                'en'       => 'Therapeutic Supplements & Bioactive Nutraceuticals',
                'badge_1'  => 'مکمل‌های زیستی',
                'badge_2'  => 'پروبیوتیک درمانی',
                'desc'     => 'توسعه فرآورده‌های طبیعی پیشرفته، پروبیوتیک‌های زیستی و مکمل‌های متابولیک و درمانی با هدف ارتقای پایدار شاخص‌های سلامت عمومی جامعه.',
                'specs'    => 'فرآوری عصاره‌های بیواکتیو، تخمیر باکتریایی تحت شرایط ایزوله، پایش پایداری میکروبی مطابق ICH',
                'entities' => 'نوژین زیست فارمد',
                'icon'     => 'service-nutraceuticals.svg',
            ],
            4 => [
                'num'      => '۰۴',
                'title'    => 'ارائه انواع پانسمان‌های زیستی و سوختگی',
                'en'       => 'Regenerative Dermal Matrices & Burn Bio-Dressings',
                'badge_1'  => 'ترمیم بافت و سوختگی',
                'badge_2'  => 'ماتریکس آمنیوتیک',
                'desc'     => 'ارائه راهکارهای ماتریکس بیولوژیک و سلول‌های بازساختی جهت تسریع فرآیند ترمیم بافت در سوختگی‌های حاد پوستی، جراحی‌های باز و زخم‌های مزمن.',
                'specs'    => 'فناوری مهندسی بافت، ایزوله‌سازی داربست‌های آمنیوتیک، بسته‌بندی استریل پرتودهی گاما',
                'entities' => 'پادرا سرم البرز | کارا یاخته تجهیز آزما',
                'icon'     => 'service-biological-dressings.svg',
            ],
            5 => [
                'num'      => '۰۵',
                'title'    => 'ارائه انواع داروهای مشتق از پلاسما و نوترکیب',
                'en'       => 'Plasma-Derived Protein Replacement & Immunoglobulins',
                'badge_1'  => 'مشتقات پلاسما',
                'badge_2'  => 'IVIG و آلبومین',
                'desc'     => 'تأمین فرآورده‌های مشتق از پلاسما شامل IVIG، آلبومین انسانی و فاکتورهای انعقادی حیاتی برای بیماران دچار کمبود یا نقص ایمنی اولیه و اکتسابی.',
                'specs'    => 'پالایشگاه ۳۰۰,۰۰۰ لیتری کسر پلاسما، جداسازی کوهن پیشرفته، سامانه‌های دومرحله‌ای نانوفیلتراسیون ویروسی',
                'entities' => 'نوژین زیست فارمد | تأمین پلاسما نوژین',
                'icon'     => 'service-plasma-therapy.svg',
            ],
            6 => [
                'num'      => '۰۶',
                'title'    => 'ارائه انواع یاورها و فرمولاسیون‌های اختصاصی واکسن',
                'en'       => 'Advanced Biological Adjuvants & Immune Enhancers',
                'badge_1'  => 'ادجوانت‌های زیستی',
                'badge_2'  => 'افزایش ایمنی‌زایی',
                'desc'     => 'فرمولاسیون و تولید ادجوانت‌های پیشرفته زیستی جهت افزایش اثربخشی و ایمنی‌زایی واکسن‌ها و به حداقل رساندن دوز مصرفی و عوارض ناخواسته جانبی.',
                'specs'    => 'امولسیون‌های نانوذره‌ای، ادجوانت‌های آلومینیومی و لیپیدی، تست‌های ایمنی‌زایی برون‌تنی و درون‌تنی',
                'entities' => 'پرسیس‌ژن | نوژین زیست فارمد',
                'icon'     => 'service-vaccine-adjuvants.svg',
            ],
        ];

        $services_query = new WP_Query([
            'post_type'      => 'service',
            'posts_per_page' => 6,
            'orderby'        => ['menu_order' => 'ASC', 'ID' => 'ASC'],
            'post_status'    => 'publish',
        ]);

        $svc_idx = 0;
        if ($services_query->have_posts()) :
            while ($services_query->have_posts()) :
                $services_query->the_post();
                $svc_idx++;
                $post_id  = get_the_ID();
                $fallback = $default_services_showcase[$svc_idx] ?? $default_services_showcase[1];

                $title = get_the_title();
                $en    = rahnab_get_meta($post_id, '_service_title_en', $fallback['en']);
                $num   = rahnab_get_meta($post_id, '_service_num', $fallback['num']);
                if (empty($num)) {
                    $persian_nums = [1 => '۰۱', 2 => '۰۲', 3 => '۰۳', 4 => '۰۴', 5 => '۰۵', 6 => '۰۶'];
                    $num = $persian_nums[$svc_idx] ?? sprintf('%02d', $svc_idx);
                }

                $badge_1 = rahnab_get_meta($post_id, '_service_badge', $fallback['badge_1']);
                $badge_2 = rahnab_get_meta($post_id, '_service_badge_secondary', $fallback['badge_2']);

                $desc = get_the_excerpt();
                if (empty($desc)) {
                    $desc = get_the_content();
                }
                if (empty($desc)) {
                    $desc = $fallback['desc'];
                }
                $desc = wp_strip_all_tags($desc);

                $specs    = rahnab_get_meta($post_id, '_service_specs', $fallback['specs']);
                $entities = rahnab_get_meta($post_id, '_service_entities', $fallback['entities']);
                $icon_url = rahnab_get_service_icon($post_id, $svc_idx);
                ?>
                <!-- Pillar <?php echo esc_attr($svc_idx); ?>: <?php echo esc_html($title); ?> -->
                <article class="service-showcase-card group">
                  <div class="service-card-spotlight"></div>
                  <div>
                    <!-- Top Index & Badges -->
                    <div class="flex items-center justify-between gap-3 mb-6">
                      <span class="text-2xl sm:text-3xl font-mono font-bold text-gold-400/40 group-hover:text-gold-400 transition-colors" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_num">
                        <?php echo esc_html($num); ?>
                      </span>
                      <div class="flex items-center gap-2 flex-wrap">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-white/5 text-slate-300 border border-white/10" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_badge_1">
                          <?php echo esc_html($badge_1); ?>
                        </span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gold-400/10 text-gold-300 border border-gold-400/20" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_badge_2">
                          <?php echo esc_html($badge_2); ?>
                        </span>
                      </div>
                    </div>

                    <!-- Icon Frame -->
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                      <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($title); ?>" class="w-10 h-10 sm:w-12 sm:h-12 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
                    </div>

                    <!-- Titles -->
                    <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_title">
                      <?php echo esc_html($title); ?>
                    </h2>
                    <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_en">
                      <?php echo esc_html($en); ?>
                    </span>

                    <!-- Description -->
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_desc">
                      <?php echo esc_html($desc); ?>
                    </p>

                    <!-- Technical Specifications -->
                    <div class="space-y-3">
                      <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                        <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                          <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                          </svg>
                          <span data-i18n="svc_specs_label"><?php esc_html_e('مشخصات فنی و مقیاس زیرساخت:', 'rahnab'); ?></span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_specs">
                          <?php echo esc_html($specs); ?>
                        </p>
                      </div>

                      <!-- Executing Entities -->
                      <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                        <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                          <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                          </svg>
                          <span data-i18n="svc_entities_label"><?php esc_html_e('شرکت‌های مجری و پشتیبان:', 'rahnab'); ?></span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 font-semibold" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_entities">
                          <?php echo esc_html($entities); ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
        else :
            foreach ($default_services_showcase as $svc_idx => $svc) :
                $icon_url = RAHNAB_URI . '/assets/icons/services/' . $svc['icon'];
                ?>
                <article class="service-showcase-card group">
                  <div class="service-card-spotlight"></div>
                  <div>
                    <div class="flex items-center justify-between gap-3 mb-6">
                      <span class="text-2xl sm:text-3xl font-mono font-bold text-gold-400/40 group-hover:text-gold-400 transition-colors" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_num">
                        <?php echo esc_html($svc['num']); ?>
                      </span>
                      <div class="flex items-center gap-2 flex-wrap">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-white/5 text-slate-300 border border-white/10" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_badge_1">
                          <?php echo esc_html($svc['badge_1']); ?>
                        </span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gold-400/10 text-gold-300 border border-gold-400/20" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_badge_2">
                          <?php echo esc_html($svc['badge_2']); ?>
                        </span>
                      </div>
                    </div>
                    <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gold-400/[0.04] border border-gold-400/20 flex items-center justify-center p-3 mb-6 group-hover:border-gold-400/50 group-hover:bg-gold-400/10 group-hover:shadow-[0_0_25px_rgba(229,184,135,0.18)] transition-all duration-300">
                      <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($svc['title']); ?>" class="w-10 h-10 sm:w-12 sm:h-12 object-contain filter drop-shadow-[0_0_8px_rgba(229,184,135,0.25)] transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight mb-1 group-hover:text-gold-300 transition-colors" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_title">
                      <?php echo esc_html($svc['title']); ?>
                    </h2>
                    <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_en">
                      <?php echo esc_html($svc['en']); ?>
                    </span>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_desc">
                      <?php echo esc_html($svc['desc']); ?>
                    </p>
                    <div class="space-y-3">
                      <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                        <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                          <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                          </svg>
                          <span data-i18n="svc_specs_label"><?php esc_html_e('مشخصات فنی و مقیاس زیرساخت:', 'rahnab'); ?></span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_specs">
                          <?php echo esc_html($svc['specs']); ?>
                        </p>
                      </div>
                      <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                        <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                          <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                          </svg>
                          <span data-i18n="svc_entities_label"><?php esc_html_e('شرکت‌های مجری و پشتیبان:', 'rahnab'); ?></span>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-300 font-semibold" data-i18n="svc_<?php echo esc_attr($svc_idx); ?>_entities">
                          <?php echo esc_html($svc['entities']); ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </article>
                <?php
            endforeach;
        endif;
        ?>

      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 3: ACCREDITATIONS & QUALITY PROTOCOLS
       ========================================= -->
  <section class="py-16 sm:py-24 relative border-t border-white/10 bg-[#0A0E17]/60">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <!-- Section Header -->
      <div class="max-w-3xl mb-12 sm:mb-16">
        <span class="text-xs uppercase tracking-wider text-gold-400 font-bold mb-3 block" data-i18n="standards_tag">
          استانداردها و اعتبارنامه‌های بین‌المللی
        </span>
        <h2 class="text-2xl sm:text-4xl font-black text-white leading-tight mb-4" data-i18n="standards_title">
          انطباق کامل با مراجع و پروتکل‌های دارویی جهان
        </h2>
        <p class="text-slate-400 text-sm sm:text-base leading-relaxed text-justify" data-i18n="standards_subtitle">
          تمامی فرآیندهای تولید، کنترل کیفی و ترخیص محصولات در اکوسیستم رهناب فارمد تحت سخت‌گیرانه‌ترین استانداردهای بین‌المللی انجام می‌پذیرد.
        </p>
      </div>

      <!-- 4 Standard Cards Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 sm:gap-6">
        <!-- Standard 1: cGMP -->
        <div class="p-6 rounded-2xl bg-[#101522]/90 border border-white/10 hover:border-gold-400/40 transition-all flex flex-col justify-between group">
          <div>
            <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/25 flex items-center justify-center text-gold-400 mb-5 group-hover:scale-110 transition-transform">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
              </svg>
            </div>
            <h3 class="text-base font-bold text-white mb-2" data-i18n="std_gmp_title">
              استانداردهای بین‌المللی cGMP
            </h3>
            <p class="text-xs text-slate-400 leading-relaxed text-justify" data-i18n="std_gmp_desc">
              تولید آسپتیک در کلین‌روم‌های رده A و B با پایش مداوم ذرات و آلودگی‌های میکروبی مطابق اصول WHO.
            </p>
          </div>
        </div>

        <!-- Standard 2: ISO 17025 -->
        <div class="p-6 rounded-2xl bg-[#101522]/90 border border-white/10 hover:border-gold-400/40 transition-all flex flex-col justify-between group">
          <div>
            <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/25 flex items-center justify-center text-gold-400 mb-5 group-hover:scale-110 transition-transform">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
              </svg>
            </div>
            <h3 class="text-base font-bold text-white mb-2" data-i18n="std_iso_title">
              گواهینامه ISO/IEC 17025
            </h3>
            <p class="text-xs text-slate-400 leading-relaxed text-justify" data-i18n="std_iso_desc">
              آزمایشگاه کنترل کیفی مرجع و همکار رسمی سازمان غذا و دارو (IFDA) جهت صدور Batch Release رسمی.
            </p>
          </div>
        </div>

        <!-- Standard 3: WHO TRS -->
        <div class="p-6 rounded-2xl bg-[#101522]/90 border border-white/10 hover:border-gold-400/40 transition-all flex flex-col justify-between group">
          <div>
            <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/25 flex items-center justify-center text-gold-400 mb-5 group-hover:scale-110 transition-transform">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <h3 class="text-base font-bold text-white mb-2" data-i18n="std_who_title">
              پروتکل‌های سازمان بهداشت جهانی (WHO)
            </h3>
            <p class="text-xs text-slate-400 leading-relaxed text-justify" data-i18n="std_who_desc">
              فرمولاسیون پادزهرها، سرم‌ها و مشتقات پلاسما منطبق با سری گزارش‌های فنی WHO TRS.
            </p>
          </div>
        </div>

        <!-- Standard 4: ICH Quality -->
        <div class="p-6 rounded-2xl bg-[#101522]/90 border border-white/10 hover:border-gold-400/40 transition-all flex flex-col justify-between group">
          <div>
            <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/25 flex items-center justify-center text-gold-400 mb-5 group-hover:scale-110 transition-transform">
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
              </svg>
            </div>
            <h3 class="text-base font-bold text-white mb-2" data-i18n="std_ich_title">
              استانداردهای پایداری ICH
            </h3>
            <p class="text-xs text-slate-400 leading-relaxed text-justify" data-i18n="std_ich_desc">
              آزمون‌های پایداری در شرایط تسریع‌شده و واقعی مطابق با دستورالعمل‌های ICH Q1A تا Q10.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 4: B2B PARTNERSHIP BANNER
       ========================================= -->
  <section class="py-14 sm:py-20 relative">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div class="rounded-2xl sm:rounded-3xl p-6 sm:p-10 lg:p-12 bg-gradient-to-r from-[#101522] via-[#0A0E17] to-[#05070B] border border-gold-400/30 flex flex-col lg:flex-row items-center justify-between gap-6 sm:gap-8 shadow-2xl text-center lg:text-start">
        <div>
          <span class="text-xs uppercase tracking-wider text-gold-400 font-bold mb-2 block" data-i18n="about_b2b_tag">شراکت و اتحاد استراتژیک</span>
          <h3 class="text-lg sm:text-2xl lg:text-3xl font-black text-white leading-snug" data-i18n="about_b2b_title">آماده همکاری و سرمایه‌گذاری مشترک در پروژه‌های پیشرفته بیوتک هستید؟</h3>
          <p class="text-slate-400 text-xs sm:text-sm mt-2 max-w-2xl text-justify sm:text-start" data-i18n="about_b2b_desc">پورتال ارتباط مستقیم هلدینگ رهناب فارمد آماده دریافت پیشنهادات تجاری، انتقال تکنولوژی و طرح‌های نخبگانی است.</p>
        </div>
        <div class="shrink-0 w-full sm:w-auto flex justify-center">
          <a href="mailto:info@rahnab.com" class="btn-primary w-full sm:w-auto text-xs sm:text-sm px-7 py-3.5 rounded-full font-bold inline-flex items-center justify-center gap-2">
            <span class="w-2 h-2 rounded-full bg-black animate-ping"></span>
            <span data-i18n="about_b2b_btn">ثبت درخواست رسمی B2B</span>
          </a>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
