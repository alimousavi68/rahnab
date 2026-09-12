<?php
/**
 * Rahnab Pharmed Holding — News & Insights Page
 * آرشیو اخبار، رویدادها و دستاوردهای هلدینگ
 *
 * Classic WordPress Theme Ready Architecture
 */

$page_title = 'اخبار و دستاوردها | هلدینگ سرمایه‌گذاری رهناب فارمد';
$page_desc  = 'انعکاس آخرین دستاوردهای علمی، توسعه زیرساخت‌های زیست‌دارویی و رویدادهای هلدینگ سرمایه‌گذاری رهناب فارمد.';
$active_page = 'news';
$is_home     = false;

include_once __DIR__ . '/includes/header.php';
include_once __DIR__ . '/includes/fullscreen-menu.php';
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
            <a href="index.php" class="hover:text-gold-400 transition-colors" data-i18n="nav_home">صفحه اصلی</a>
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
      <article class="relative rounded-2xl sm:rounded-3xl overflow-hidden border border-white/10 bg-gradient-to-r from-[#101522] to-[#0A0E17] group hover:border-gold-400/40 transition-all duration-500 shadow-2xl">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-stretch">
          
          <!-- Image Column (7 Cols) -->
          <div class="lg:col-span-7 relative min-h-[260px] sm:min-h-[360px] lg:min-h-[440px] overflow-hidden">
            <img src="assets/images/news-plasma-refinery.jpg" alt="Nozhin Plasma Refinery"
                 class="absolute inset-0 w-full h-full object-cover object-center transition-transform duration-700 group-hover:scale-105 filter brightness-[0.95]">
            <div class="absolute inset-0 bg-gradient-to-t lg:bg-gradient-to-r from-transparent via-[#101522]/40 to-[#101522] pointer-events-none"></div>
          </div>

          <!-- Content Column (5 Cols) -->
          <div class="lg:col-span-5 p-6 sm:p-8 lg:p-10 flex flex-col justify-between relative z-10">
            <div>
              <!-- Badges & Meta -->
              <div class="flex items-center gap-3 flex-wrap mb-4">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gold-400 text-black" data-i18n="news_featured_badge">
                  ★ دستاورد ملی
                </span>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white/10 text-slate-300 border border-white/10" data-i18n="news_cat_1">
                  توسعه زیرساخت ملی
                </span>
              </div>

              <!-- Date & Read Time -->
              <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-4">
                <span data-i18n="news_featured_date">۱۸ مهر ۱۴۰۳</span>
                <span class="text-white/20">•</span>
                <span data-i18n="news_featured_read">۵ دقیقه مطالعه</span>
              </div>

              <!-- Title -->
              <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white leading-snug tracking-tight mb-4 group-hover:text-gold-300 transition-colors" data-i18n="news_item_1_title">
                بهره‌برداری از فاز تکمیلی پالایشگاه صنعتی پلاسمای نوژین زیست فارمد با ظرفیت ۱۵۰ هزار لیتر
              </h2>

              <!-- Description -->
              <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-6" data-i18n="news_item_1_desc">
                این گام استراتژیک، وابستگی کشور به ارسال پلاسما به خارج از مرزها را خاتمه داده و تولید داروهای حیاتی مشتق از پلاسما را درون مرزهای کشور تثبیت می‌کند.
              </p>
            </div>

            <!-- Action Link -->
            <div class="pt-4 border-t border-white/10 flex items-center justify-between">
              <span class="text-xs sm:text-sm font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-2 transition-colors">
                <span data-i18n="news_read_more">مطالعه خبر کامل</span>
                <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
              </span>
            </div>
          </div>

        </div>
      </article>
    </div>
  </section>

  <!-- =========================================
       ZONE 4: NEWS SHOWCASE GRID (6 CARDS)
       ========================================= -->
  <section class="py-10 sm:py-16 relative z-10">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div id="newsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">

        <!-- Card 1: CAR-T Therapy (science) -->
        <article class="news-showcase-card group cursor-pointer" data-category="science">
          <div class="news-card-spotlight"></div>
          <div>
            <!-- Thumbnail Image -->
            <div class="relative h-48 sm:h-52 overflow-hidden">
              <img src="assets/images/news-cart-celltherapy.jpg" alt="CAR-T Cellular Therapy"
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
              <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="news_tab_science">
                  فناوری و درمان‌های پیشرفته
                </span>
              </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 sm:p-7">
              <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                <span data-i18n="news_1_date">۲۸ شهریور ۱۴۰۳</span>
                <span class="text-white/20">•</span>
                <span data-i18n="news_1_read">۴ دقیقه مطالعه</span>
              </div>
              <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="news_item_2_title">
                موفقیت کارا یاخته در فاز نخست کارآزمایی بالینی ایمونوتراپی سلولی CAR-T
              </h3>
              <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="news_item_2_desc">
                ورود رسمی به باشگاه تولیدکنندگان فناوری‌های درمان پیشرفته سرطان در غرب آسیا.
              </p>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
            <span class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
              <span data-i18n="news_read_more">مطالعه خبر کامل</span>
              <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
            </span>
          </div>
        </article>

        <!-- Card 2: Emergency Antivenom (health) -->
        <article class="news-showcase-card group cursor-pointer" data-category="health">
          <div class="news-card-spotlight"></div>
          <div>
            <!-- Thumbnail Image -->
            <div class="relative h-48 sm:h-52 overflow-hidden">
              <img src="assets/images/news-antivenom-lab.jpg" alt="Padra Serum Lab"
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
              <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="news_tab_health">
                  ارتقای سلامت و خدمات ملی
                </span>
              </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 sm:p-7">
              <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                <span data-i18n="news_2_date">۱۲ شهریور ۱۴۰۳</span>
                <span class="text-white/20">•</span>
                <span data-i18n="news_2_read">۳ دقیقه مطالعه</span>
              </div>
              <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="news_item_3_title">
                تأمین بیش از ۷۰ درصد پادزهرهای اورژانسی کشور توسط پادرا سرم البرز
              </h3>
              <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="news_item_3_desc">
                پوشش سراسری مراکز درمان گزش‌های خطرناک و نجات جان هزاران بیمار در مناطق مرزی.
              </p>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
            <span class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
              <span data-i18n="news_read_more">مطالعه خبر کامل</span>
              <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
            </span>
          </div>
        </article>

        <!-- Card 3: ISO 17025 Accreditation (infra) -->
        <article class="news-showcase-card group cursor-pointer" data-category="infra">
          <div class="news-card-spotlight"></div>
          <div>
            <!-- Thumbnail Image -->
            <div class="relative h-48 sm:h-52 overflow-hidden">
              <img src="assets/images/about-cleanroom.jpg" alt="Arc Biological QC"
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
              <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="news_tab_infra">
                  توسعه زیرساخت ملی
                </span>
              </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 sm:p-7">
              <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                <span data-i18n="news_3_date">۲۵ مرداد ۱۴۰۳</span>
                <span class="text-white/20">•</span>
                <span data-i18n="news_3_read">۴ دقیقه مطالعه</span>
              </div>
              <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="news_3_title">
                اخذ گواهینامه رفرنس بین‌المللی ISO/IEC 17025 توسط آرک زیست آزما
              </h3>
              <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="news_3_desc">
                ارتقای استانداردهای کنترل کیفی، آزمون‌های بیواسی و تأیید بچ‌ریلیز فرآورده‌های بیولوژیک در سطح آزمایشگاه‌های مرجع منطقه‌ای.
              </p>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
            <span class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
              <span data-i18n="news_read_more">مطالعه خبر کامل</span>
              <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
            </span>
          </div>
        </article>

        <!-- Card 4: Persis Gene Acceleration (science) -->
        <article class="news-showcase-card group cursor-pointer" data-category="science">
          <div class="news-card-spotlight"></div>
          <div>
            <!-- Thumbnail Image -->
            <div class="relative h-48 sm:h-52 overflow-hidden">
              <img src="assets/images/news-cart.jpg" alt="Persis Gene Accelerator"
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
              <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="news_tab_science">
                  فناوری و درمان‌های پیشرفته
                </span>
              </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 sm:p-7">
              <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                <span data-i18n="news_4_date">۰۴ مرداد ۱۴۰۳</span>
                <span class="text-white/20">•</span>
                <span data-i18n="news_4_read">۵ دقیقه مطالعه</span>
              </div>
              <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="news_4_title">
                آغاز چرخه شتاب‌دهی دور جدید تیم‌های زیست‌دارویی در شتاب‌دهنده پرسیس ژن
              </h3>
              <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="news_4_desc">
                ورود ۶ استارتاپ نخبگانی زیست‌فناوری سلامت به مرحله تحقیق، توسعه فرمولاسیون و جذب سرمایه‌گذاری ونچر در هلدینگ.
              </p>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
            <span class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
              <span data-i18n="news_read_more">مطالعه خبر کامل</span>
              <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
            </span>
          </div>
        </article>

        <!-- Card 5: Tamin Plasma Expansion (infra) -->
        <article class="news-showcase-card group cursor-pointer" data-category="infra">
          <div class="news-card-spotlight"></div>
          <div>
            <!-- Thumbnail Image -->
            <div class="relative h-48 sm:h-52 overflow-hidden">
              <img src="assets/images/news-refinery.jpg" alt="Tamin Plasma Center"
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
              <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="news_tab_infra">
                  توسعه زیرساخت ملی
                </span>
              </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 sm:p-7">
              <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                <span data-i18n="news_5_date">۱۶ تیر ۱۴۰۳</span>
                <span class="text-white/20">•</span>
                <span data-i18n="news_5_read">۳ دقیقه مطالعه</span>
              </div>
              <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="news_5_title">
                افتتاح بزرگ‌ترین پایگاه جمع‌آوری پلاسمای استان البرز توسط تأمین پلاسما نوژین
              </h3>
              <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="news_5_desc">
                گسترش شبکه ملی جمع‌آوری پلاسما به روش پلاسمانویسی تمام‌اتوماتیک و مطابق با استانداردهای بهداشت جهانی WHO.
              </p>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
            <span class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
              <span data-i18n="news_read_more">مطالعه خبر کامل</span>
              <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
            </span>
          </div>
        </article>

        <!-- Card 6: Nano-Adjuvants Breakthrough (health) -->
        <article class="news-showcase-card group cursor-pointer" data-category="health">
          <div class="news-card-spotlight"></div>
          <div>
            <!-- Thumbnail Image -->
            <div class="relative h-48 sm:h-52 overflow-hidden">
              <img src="assets/images/news-antivenom.jpg" alt="Nozhin Nano Adjuvants"
                   class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
              <div class="absolute inset-0 bg-gradient-to-t from-[#101522] via-transparent to-transparent"></div>
              <div class="absolute top-4 right-4 rtl:right-4 rtl:left-auto ltr:left-4 ltr:right-auto">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-black/60 backdrop-blur-md border border-white/15 text-gold-400" data-i18n="news_tab_health">
                  ارتقای سلامت و خدمات ملی
                </span>
              </div>
            </div>

            <!-- Content Area -->
            <div class="p-6 sm:p-7">
              <div class="flex items-center gap-3 text-xs text-slate-400 font-mono mb-3">
                <span data-i18n="news_6_date">۲۲ خرداد ۱۴۰۳</span>
                <span class="text-white/20">•</span>
                <span data-i18n="news_6_read">۴ دقیقه مطالعه</span>
              </div>
              <h3 class="text-base sm:text-lg font-black text-white leading-snug mb-3 group-hover:text-gold-300 transition-colors" data-i18n="news_6_title">
                بومی‌سازی نانویاورهای اختصاصی واکسن‌های دامی و طیور در نوژین زیست فارمد
              </h3>
              <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify line-clamp-3" data-i18n="news_6_desc">
                دستیابی به دانش فنی فرمولاسیون ادجوانت‌های روغنی پیشرفته جهت افزایش اثربخشی ایمنی‌زایی واکسن‌ها در صنعت دامپروری.
              </p>
            </div>
          </div>

          <!-- Card Footer -->
          <div class="px-6 pb-6 pt-2 border-t border-white/5 flex items-center justify-between">
            <span class="text-xs font-bold text-gold-400 group-hover:text-gold-300 inline-flex items-center gap-1.5 transition-colors">
              <span data-i18n="news_read_more">مطالعه خبر کامل</span>
              <span class="transform rtl:rotate-180 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform">→</span>
            </span>
          </div>
        </article>

      </div>
    </div>
  </section>

</main>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
