<?php
/**
 * Template Name: اخبار و رویدادها (News)
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>
<main id="main-content" class="min-h-screen bg-[#05070B] pt-28 sm:pt-32 lg:pt-36 pb-20 relative overflow-hidden">

  <!-- Subtle Ambient Glows -->
  <div class="pointer-events-none absolute top-1/4 -right-40 w-96 h-96 bg-gold-400/5 rounded-full blur-3xl"></div>
  <div class="pointer-events-none absolute top-2/3 -left-40 w-96 h-96 bg-blue-500/5 rounded-full blur-3xl"></div>

  <!-- =========================================
       ZONE 1: INTERIOR HERO
       ========================================= -->
  <section class="relative z-10 pb-10 sm:pb-14 border-b border-white/5">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <!-- Breadcrumbs -->
      <nav aria-label="Breadcrumb" class="mb-6">
        <ol class="flex items-center gap-2 text-xs text-slate-400">
          <li>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="nav_home">صفحه اصلی</a>
          </li>
          <li class="text-white/20 select-none">/</li>
          <li class="text-gold-400 font-semibold" aria-current="page" data-i18n="news_crumb">اخبار و رویدادها</li>
        </ol>
      </nav>

      <!-- Eyebrow Tag -->
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/25 mb-4">
        <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
        <span class="text-xs font-bold text-gold-400 uppercase tracking-widest" data-i18n="news_eyebrow">اخبار و رویدادها</span>
      </div>

      <!-- Main Headline (Solid White, No Gradient) -->
      <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight max-w-4xl mb-4" data-i18n="news_hero_title">
        اخبار و دستاوردهای هلدینگ رهناب فارمد
      </h1>

      <p class="text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed text-justify sm:text-start" data-i18n="news_hero_subtitle">
        انعکاس آخرین پیشرفت‌های علمی، توسعه زیرساخت‌های کلان دارویی و رویدادهای اکوسیستم سلامت رهناب.
      </p>
    </div>
  </section>

  <!-- =========================================
       ZONE 2: CATEGORY FILTER TABS
       ========================================= -->
  <section class="py-6 sm:py-8 relative z-10 border-b border-white/5 bg-[#0A0E17]/40">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div id="newsFilterTabs" class="flex items-center gap-2.5 overflow-x-auto pb-2 sm:pb-0 scrollbar-none">
        <button type="button" data-filter="all"
                class="news-filter-btn is-active px-4 sm:px-5 py-2 rounded-full text-xs font-bold transition-all shrink-0 bg-gold-400 text-black border border-gold-400 cursor-pointer"
                data-i18n="news_tab_all">
          همه رویدادها
        </button>
        <button type="button" data-filter="infra"
                class="news-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs font-bold transition-all shrink-0 bg-white/5 text-slate-300 border border-white/10 hover:border-gold-400/40 hover:text-white cursor-pointer"
                data-i18n="news_tab_infra">
          توسعه زیرساخت ملی
        </button>
        <button type="button" data-filter="science"
                class="news-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs font-bold transition-all shrink-0 bg-white/5 text-slate-300 border border-white/10 hover:border-gold-400/40 hover:text-white cursor-pointer"
                data-i18n="news_tab_science">
          فناوری و درمان‌های پیشرفته
        </button>
        <button type="button" data-filter="health"
                class="news-filter-btn px-4 sm:px-5 py-2 rounded-full text-xs font-bold transition-all shrink-0 bg-white/5 text-slate-300 border border-white/10 hover:border-gold-400/40 hover:text-white cursor-pointer"
                data-i18n="news_tab_health">
          ارتقای سلامت و خدمات ملی
        </button>
      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 3: FEATURED STORY (LANDMARK)
       ========================================= -->
  <section class="py-10 sm:py-14 relative z-10">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <?php
      $featured_query = new WP_Query([
          'post_type'      => 'post',
          'posts_per_page' => 1,
          'orderby'        => 'date',
          'order'          => 'DESC',
          'post_status'    => 'publish',
      ]);

      if ($featured_query->have_posts()) :
          while ($featured_query->have_posts()) :
              $featured_query->the_post();
              $feat_id    = get_the_ID();
              $feat_title = get_the_title();
              $feat_desc  = get_the_excerpt();
              if (empty($feat_desc)) {
                  $feat_desc = get_the_content();
              }
              $feat_desc = wp_strip_all_tags($feat_desc);
              $feat_cats = get_the_category();
              $feat_cat_name = (!empty($feat_cats) && $feat_cats[0]->slug !== 'uncategorized') ? $feat_cats[0]->name : __('توسعه زیرساخت ملی', 'rahnab');
              $feat_date = rahnab_get_meta($feat_id, '_news_date_fa', get_the_date('j F Y'));
              $feat_read = rahnab_get_meta($feat_id, '_news_read_time', __('۵ دقیقه مطالعه', 'rahnab'));
              $feat_img  = rahnab_get_news_image($feat_id, 1);
              $feat_link = get_permalink();
              ?>
              <article class="relative rounded-2xl sm:rounded-3xl overflow-hidden border border-white/10 bg-gradient-to-r from-[#101522] to-[#0A0E17] group hover:border-gold-400/40 transition-all duration-500 shadow-2xl" onclick="window.location.href='<?php echo esc_url($feat_link); ?>'">
                <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
                  <div class="lg:col-span-7 relative min-h-[260px] sm:min-h-[360px] lg:min-h-[440px] overflow-hidden">
                    <img src="<?php echo esc_url($feat_img); ?>" alt="<?php echo esc_attr($feat_title); ?>"
                         class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105 filter brightness-[0.95]">
                    <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-transparent via-[#101522]/40 to-[#101522] pointer-events-none"></div>
                  </div>
                  <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between relative z-10">
                    <div>
                      <div class="flex items-center gap-3 flex-wrap mb-4">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gold-400 text-black" data-i18n="news_featured_badge">
                          ★ <?php esc_html_e('دستاورد ملی', 'rahnab'); ?>
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white/10 text-slate-300 border border-white/10" data-i18n="news_cat_1">
                          <?php echo esc_html($feat_cat_name); ?>
                        </span>
                      </div>
                      <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-4">
                        <span data-i18n="news_featured_date"><?php echo esc_html($feat_date); ?></span>
                        <span class="text-white/20">•</span>
                        <span data-i18n="news_featured_read"><?php echo esc_html($feat_read); ?></span>
                      </div>
                      <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white leading-snug tracking-tight mb-4 group-hover:text-gold-300 transition-colors" data-i18n="news_item_1_title">
                        <a href="<?php echo esc_url($feat_link); ?>" class="hover:text-gold-300 transition-colors">
                          <?php echo esc_html($feat_title); ?>
                        </a>
                      </h2>
                      <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-6" data-i18n="news_item_1_desc">
                        <?php echo esc_html($feat_desc); ?>
                      </p>
                    </div>
                    <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                      <span class="text-xs sm:text-sm font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-2 transition-colors">
                        <span data-i18n="news_read_more"><?php esc_html_e('مطالعه خبر کامل', 'rahnab'); ?></span>
                        <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
                      </span>
                    </div>
                  </div>
                </div>
              </article>
              <?php
          endwhile;
          wp_reset_postdata();
      else :
          // Fallback static featured article
          ?>
          <article class="relative rounded-2xl sm:rounded-3xl overflow-hidden border border-white/10 bg-gradient-to-r from-[#101522] to-[#0A0E17] group hover:border-gold-400/40 transition-all duration-500 shadow-2xl">
            <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
              <div class="lg:col-span-7 relative min-h-[260px] sm:min-h-[360px] lg:min-h-[440px] overflow-hidden">
                <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/news-plasma-refinery.jpg" alt="Nozhin Plasma Refinery"
                     class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105 filter brightness-[0.95]">
                <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-transparent via-[#101522]/40 to-[#101522] pointer-events-none"></div>
              </div>
              <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between relative z-10">
                <div>
                  <div class="flex items-center gap-3 flex-wrap mb-4">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gold-400 text-black" data-i18n="news_featured_badge">
                      ★ دستاورد ملی
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white/10 text-slate-300 border border-white/10" data-i18n="news_cat_1">
                      توسعه زیرساخت ملی
                    </span>
                  </div>
                  <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-4">
                    <span data-i18n="news_featured_date">۱۸ مهر ۱۴۰۳</span>
                    <span class="text-white/20">•</span>
                    <span data-i18n="news_featured_read">۵ دقیقه مطالعه</span>
                  </div>
                  <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white leading-snug tracking-tight mb-4 group-hover:text-gold-300 transition-colors" data-i18n="news_item_1_title">
                    بهره‌برداری از فاز تکمیلی پالایشگاه صنعتی پلاسمای نوژین زیست فارمد با ظرفیت ۱۵۰ هزار لیتر
                  </h2>
                  <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-6" data-i18n="news_item_1_desc">
                    این گام استراتژیک، وابستگی کشور به ارسال پلاسما به خارج از مرزها را خاتمه داده و تولید داروهای حیاتی مشتق از پلاسما را درون مرزهای کشور تثبیت می‌کند.
                  </p>
                </div>
                <div class="pt-4 border-t border-white/10 flex items-center justify-between">
                  <span class="text-xs sm:text-sm font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-2 transition-colors">
                    <span data-i18n="news_read_more">مطالعه خبر کامل</span>
                    <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
                  </span>
                </div>
              </div>
            </div>
          </article>
      <?php endif; ?>
    </div>
  </section>

  <!-- =========================================
       ZONE 4: NEWS SHOWCASE GRID (6 CARDS)
       ========================================= -->
  <section class="py-10 sm:py-16 relative z-10">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div id="newsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">

        <?php
        $news_fallback_items = array(
            array(
                'category'   => 'science',
                'cat_i18n'   => 'news_tab_science',
                'cat_name'   => 'فناوری و درمان‌های پیشرفته',
                'img'        => RAHNAB_URI . '/assets/images/news-cart-celltherapy.jpg',
                'alt'        => 'CAR-T Cellular Therapy',
                'date'       => '۲۸ شهریور ۱۴۰۳',
                'date_i18n'  => 'news_1_date',
                'read'       => '۴ دقیقه مطالعه',
                'read_i18n'  => 'news_1_read',
                'title'      => 'موفقیت کارا یاخته در فاز نخست کارآزمایی بالینی ایمونوتراپی سلولی CAR-T',
                'title_i18n' => 'news_item_2_title',
                'desc'       => 'ورود رسمی به باشگاه تولیدکنندگان فناوری‌های درمان پیشرفته سرطان در غرب آسیا.',
                'desc_i18n'  => 'news_item_2_desc',
            ),
            array(
                'category'   => 'health',
                'cat_i18n'   => 'news_tab_health',
                'cat_name'   => 'ارتقای سلامت و خدمات ملی',
                'img'        => RAHNAB_URI . '/assets/images/news-antivenom-lab.jpg',
                'alt'        => 'Padra Serum Lab',
                'date'       => '۱۲ شهریور ۱۴۰۳',
                'date_i18n'  => 'news_2_date',
                'read'       => '۳ دقیقه مطالعه',
                'read_i18n'  => 'news_2_read',
                'title'      => 'تأمین بیش از ۷۰ درصد پادزهرهای اورژانسی کشور توسط پادرا سرم البرز',
                'title_i18n' => 'news_item_3_title',
                'desc'       => 'پوشش سراسری مراکز درمان گزش‌های خطرناک و نجات جان هزاران بیمار در مناطق مرزی.',
                'desc_i18n'  => 'news_item_3_desc',
            ),
            array(
                'category'   => 'infra',
                'cat_i18n'   => 'news_tab_infra',
                'cat_name'   => 'توسعه زیرساخت ملی',
                'img'        => RAHNAB_URI . '/assets/images/about-cleanroom.jpg',
                'alt'        => 'Arc Biological QC',
                'date'       => '۲۵ مرداد ۱۴۰۳',
                'date_i18n'  => 'news_3_date',
                'read'       => '۴ دقیقه مطالعه',
                'read_i18n'  => 'news_3_read',
                'title'      => 'اخذ گواهینامه رفرنس بین‌المللی ISO/IEC 17025 توسط آرک زیست آزما',
                'title_i18n' => 'news_3_title',
                'desc'       => 'ارتقای استانداردهای کنترل کیفی، آزمون‌های بیواسی و تأیید بچ‌ریلیز فرآورده‌های بیولوژیک در سطح آزمایشگاه‌های مرجع منطقه‌ای.',
                'desc_i18n'  => 'news_3_desc',
            ),
            array(
                'category'   => 'science',
                'cat_i18n'   => 'news_tab_science',
                'cat_name'   => 'فناوری و درمان‌های پیشرفته',
                'img'        => RAHNAB_URI . '/assets/images/news-cart.jpg',
                'alt'        => 'Persis Gene Accelerator',
                'date'       => '۰۴ مرداد ۱۴۰۳',
                'date_i18n'  => 'news_4_date',
                'read'       => '۵ دقیقه مطالعه',
                'read_i18n'  => 'news_4_read',
                'title'      => 'آغاز چرخه شتاب‌دهی دور جدید تیم‌های زیست‌دارویی در شتاب‌دهنده پرسیس ژن',
                'title_i18n' => 'news_4_title',
                'desc'       => 'ورود ۶ استارتاپ نخبگانی زیست‌فناوری سلامت به مرحله تحقیق، توسعه فرمولاسیون و جذب سرمایه‌گذاری ونچر در هلدینگ.',
                'desc_i18n'  => 'news_4_desc',
            ),
            array(
                'category'   => 'infra',
                'cat_i18n'   => 'news_tab_infra',
                'cat_name'   => 'توسعه زیرساخت ملی',
                'img'        => RAHNAB_URI . '/assets/images/news-refinery.jpg',
                'alt'        => 'Tamin Plasma Center',
                'date'       => '۱۶ تیر ۱۴۰۳',
                'date_i18n'  => 'news_5_date',
                'read'       => '۳ دقیقه مطالعه',
                'read_i18n'  => 'news_5_read',
                'title'      => 'افتتاح بزرگ‌ترین پایگاه جمع‌آوری پلاسمای استان البرز توسط تأمین پلاسما نوژین',
                'title_i18n' => 'news_5_title',
                'desc'       => 'گسترش شبکه ملی جمع‌آوری پلاسما به روش پلاسمانویسی تمام‌اتوماتیک و مطابق با استانداردهای بهداشت جهانی WHO.',
                'desc_i18n'  => 'news_5_desc',
            ),
            array(
                'category'   => 'health',
                'cat_i18n'   => 'news_tab_health',
                'cat_name'   => 'ارتقای سلامت و خدمات ملی',
                'img'        => RAHNAB_URI . '/assets/images/news-antivenom.jpg',
                'alt'        => 'Nozhin Nano Adjuvants',
                'date'       => '۲۲ خرداد ۱۴۰۳',
                'date_i18n'  => 'news_6_date',
                'read'       => '۴ دقیقه مطالعه',
                'read_i18n'  => 'news_6_read',
                'title'      => 'بومی‌سازی نانویاورهای اختصاصی واکسن‌های دامی و طیور در نوژین زیست فارمد',
                'title_i18n' => 'news_6_title',
                'desc'       => 'دستیابی به دانش فنی فرمولاسیون ادجوانت‌های روغنی پیشرفته جهت افزایش اثربخشی ایمنی‌زایی واکسن‌ها در صنعت دامپروری.',
                'desc_i18n'  => 'news_6_desc',
            ),
        );

        $news_grid_query = new WP_Query(array(
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'offset'         => 1,
            'post_status'    => 'publish',
        ));

        if ($news_grid_query->have_posts()) :
            $grid_idx = 0;
            while ($news_grid_query->have_posts()) : $news_grid_query->the_post();
                $fb = isset($news_fallback_items[$grid_idx]) ? $news_fallback_items[$grid_idx] : $news_fallback_items[0];

                // Category determination
                $cats = get_the_category();
                $cat_slug = !empty($cats) ? $cats[0]->slug : $fb['category'];
                $cat_name = !empty($cats) ? $cats[0]->name : $fb['cat_name'];
                $cat_i18n = $fb['cat_i18n'];
                if ($cat_slug === 'infra') {
                    $cat_i18n = 'news_tab_infra';
                } elseif ($cat_slug === 'science') {
                    $cat_i18n = 'news_tab_science';
                } elseif ($cat_slug === 'health') {
                    $cat_i18n = 'news_tab_health';
                }

                // Image resolution
                $img_url = rahnab_get_news_image(get_the_ID(), $grid_idx + 2);
                if (empty($img_url)) {
                    $img_url = $fb['img'];
                }

                // Meta resolution
                $date_fa   = get_post_meta(get_the_ID(), '_news_date_fa', true) ?: (get_the_date('j F Y') ?: $fb['date']);
                $read_time = get_post_meta(get_the_ID(), '_news_read_time', true) ?: $fb['read'];
                $excerpt   = get_the_excerpt() ?: $fb['desc'];
                $post_link = get_permalink();
                ?>
                <article class="news-showcase-card group cursor-pointer" data-category="<?php echo esc_attr($cat_slug); ?>" onclick="window.location.href='<?php echo esc_url($post_link); ?>'">
                  <div class="news-card-spotlight"></div>
                  <div>
                    <!-- Thumbnail Image -->
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                      <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>"
                           class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                      <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
                      <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="<?php echo esc_attr($cat_i18n); ?>">
                          <?php echo esc_html($cat_name); ?>
                        </span>
                      </div>
                    </div>

                    <!-- Content Area -->
                    <div class="p-6 sm:p-7">
                      <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                        <span data-i18n="<?php echo esc_attr($fb['date_i18n']); ?>"><?php echo esc_html($date_fa); ?></span>
                        <span class="text-white/20">•</span>
                        <span data-i18n="<?php echo esc_attr($fb['read_i18n']); ?>"><?php echo esc_html($read_time); ?></span>
                      </div>
                      <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="<?php echo esc_attr($fb['title_i18n']); ?>">
                        <a href="<?php echo esc_url($post_link); ?>" class="hover:text-gold-300 transition-colors"><?php the_title(); ?></a>
                      </h3>
                      <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="<?php echo esc_attr($fb['desc_i18n']); ?>">
                        <?php echo esc_html($excerpt); ?>
                      </p>
                    </div>
                  </div>

                  <!-- Card Footer -->
                  <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
                    <a href="<?php echo esc_url($post_link); ?>" class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
                      <span data-i18n="news_read_more">مطالعه خبر کامل</span>
                      <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
                    </a>
                  </div>
                </article>
                <?php
                $grid_idx++;
            endwhile;
            wp_reset_postdata();
        else :
            foreach ($news_fallback_items as $item) : ?>
                <article class="news-showcase-card group cursor-pointer" data-category="<?php echo esc_attr($item['category']); ?>">
                  <div class="news-card-spotlight"></div>
                  <div>
                    <div class="relative h-48 sm:h-52 overflow-hidden">
                      <img src="<?php echo esc_url($item['img']); ?>" alt="<?php echo esc_attr($item['alt']); ?>"
                           class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                      <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
                      <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                        <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="<?php echo esc_attr($item['cat_i18n']); ?>">
                          <?php echo esc_html($item['cat_name']); ?>
                        </span>
                      </div>
                    </div>

                    <div class="p-6 sm:p-7">
                      <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                        <span data-i18n="<?php echo esc_attr($item['date_i18n']); ?>"><?php echo esc_html($item['date']); ?></span>
                        <span class="text-white/20">•</span>
                        <span data-i18n="<?php echo esc_attr($item['read_i18n']); ?>"><?php echo esc_html($item['read']); ?></span>
                      </div>
                      <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="<?php echo esc_attr($item['title_i18n']); ?>">
                        <?php echo esc_html($item['title']); ?>
                      </h3>
                      <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="<?php echo esc_attr($item['desc_i18n']); ?>">
                        <?php echo esc_html($item['desc']); ?>
                      </p>
                    </div>
                  </div>

                  <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
                    <span class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
                      <span data-i18n="news_read_more">مطالعه خبر کامل</span>
                      <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
                    </span>
                  </div>
                </article>
            <?php endforeach;
        endif; ?>

      </div>
    </div>
  </section>

</main>

<?php
get_footer();
