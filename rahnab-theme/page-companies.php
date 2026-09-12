<?php
/**
 * Template Name: شرکت‌های زیرمجموعه (Companies)
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>
<!-- =========================================
       ZONE 1: COMPANIES HERO & BREADCRUMB
       ========================================= -->
  <section class="companies-hero relative pt-32 sm:pt-40 pb-12 sm:pb-16 overflow-hidden border-b border-white/10">
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
        <span class="text-gold-400 font-bold" data-i18n="nav_companies">شرکت‌های زیرمجموعه</span>
      </nav>

      <!-- Eyebrow Tag -->
      <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-gold-400/10 border border-gold-400/25 mb-5 sm:mb-6 backdrop-blur-sm">
        <span class="w-2 h-2 rounded-full bg-gold-400 animate-pulse"></span>
        <span class="text-xs uppercase tracking-wider text-gold-300 font-semibold" data-i18n="companies_hero_tag">اکوسیستم سرمایه‌گذاری و توسعه هم‌افزا</span>
      </div>

      <!-- Main Headline: 100% Solid White (No Gradients) -->
      <h1 class="text-2xl sm:text-4xl lg:text-6xl font-black text-white leading-snug sm:leading-tight lg:leading-[1.18] max-w-5xl tracking-tight mb-5 sm:mb-6" data-i18n="companies_hero_title">
        اکوسیستم شرکت‌های تخصصی و دانش‌بنیان هلدینگ رهناب فارمد
      </h1>

      <!-- Subtitle -->
      <p class="text-sm sm:text-base lg:text-lg text-slate-300 max-w-3xl leading-relaxed text-justify" data-i18n="companies_hero_subtitle">
        هم‌افزایی هدفمند ۶ بازوی صنعتی و فناورانه از تولید واکسن‌های استراتژیک و پالایش صنعتی پلاسما تا ایمونوتراپی سلولی و کنترل کیفی مرجع کشور.
      </p>
    </div>
  </section>

  <!-- =========================================
       ZONE 2: SUBSIDIARIES PORTFOLIO SHOWCASE
       ========================================= -->
  <section class="py-12 sm:py-20 lg:py-24 relative">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div id="companyGrid" class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-10">

        <!-- Company 1: Nozhin Zist Pharmed -->
        <article id="company-nojin" class="company-showcase-card group">
          <div class="company-card-spotlight"></div>
          <div>
            <!-- Monochrome Logo Frame -->
            <div class="subsidiary-logo-frame mb-6 p-4 sm:p-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex items-center justify-center min-h-[95px] sm:min-h-[110px]">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/nojin_logo.webp" alt="نوژین زیست فارمد" class="subsidiary-mono-logo h-11 sm:h-14 w-auto object-contain">
            </div>

            <!-- Heading & En Name -->
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight mb-1" data-i18n="comp_1_name">
              نوژین زیست فارمد
            </h2>
            <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="comp_1_en">
              Nozhin Zist Pharmed
            </span>

            <!-- Mission / Role -->
            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="comp_1_role">
              پالایشگاه صنعتی پلاسما — تولید فاکتورهای خونی، آلبومین و ایمونوگلوبولین‌ها با ظرفیت سالانه ۱۵۰,۰۰۰ لیتر.
            </p>

            <!-- Technical Breakdown -->
            <div class="space-y-3.5 mb-6">
              <!-- Infrastructure -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  <span data-i18n="comp_details_infra">زیرساخت و ظرفیت تولید:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_1_cap">
                  پالایشگاه ۳۰۰,۰۰۰ لیتری پلاسما، خطوط فیل و فینیش آسپتیک ویال و سرنگ آماده تزریق (PFS) در کلین‌روم‌های کلاس A و B
                </p>
              </div>

              <!-- Focus & Products -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
                  <span data-i18n="comp_details_focus">فرآورده‌ها و تمرکز محوری:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_1_focus">
                  فاکتورهای انعقادی VIII و IX، آلبومین انسانی، ایمونوگلوبولین (IVIG)، واکسن‌های نوترکیب دامی و طیور
                </p>
              </div>
            </div>
          </div>

          <!-- Single Official Website CTA -->
          <div class="mt-auto pt-5 sm:pt-6 border-t border-white/10">
            <a href="https://nojinepharmed.com/" target="_blank" rel="noopener noreferrer" class="w-full py-3 sm:py-3.5 px-4 rounded-xl bg-white/5 hover:bg-gold-400 hover:text-black text-slate-200 border border-white/15 hover:border-gold-400 text-xs sm:text-sm font-bold text-center transition-all flex items-center justify-center gap-2 group/btn">
              <span data-i18n="comp_btn_official">مشاهده وب‌سایت رسمی شرکت</span>
              <svg class="w-4 h-4 text-gold-400 group-hover/btn:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </div>
        </article>

        <!-- Company 2: Tamin Plasma Nozhin -->
        <article id="company-tamin-plasma" class="company-showcase-card group">
          <div class="company-card-spotlight"></div>
          <div>
            <!-- Monochrome Logo Frame -->
            <div class="subsidiary-logo-frame mb-6 p-4 sm:p-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex items-center justify-center min-h-[95px] sm:min-h-[110px]">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-tamin-plasma.svg" alt="تأمین پلاسما نوژین" class="subsidiary-mono-logo h-11 sm:h-14 w-auto object-contain">
            </div>

            <!-- Heading & En Name -->
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight mb-1" data-i18n="comp_2_name">
              تأمین پلاسما نوژین
            </h2>
            <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="comp_2_en">
              Tamin Plasma Nozhin
            </span>

            <!-- Mission / Role -->
            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="comp_2_role">
              شبکه سراسری مراکز آفرزیس خودکار و تأمین پلاسمای استاندارد انسانی با انطباق کامل بر استانداردهای بین‌المللی GMP.
            </p>

            <!-- Technical Breakdown -->
            <div class="space-y-3.5 mb-6">
              <!-- Infrastructure -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  <span data-i18n="comp_details_infra">زیرساخت و ظرفیت تولید:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_2_cap">
                  شبکه زنجیره سرد منهای ۳۰ درجه، سیستم‌های تمام‌اتوماتیک آفرزیس با پایش آنلاین بیومتریک اهداکنندگان
                </p>
              </div>

              <!-- Focus & Products -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
                  <span data-i18n="comp_details_focus">فرآورده‌ها و تمرکز محوری:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_2_focus">
                  پلاسمای استاندارد انسانی با گرید دارویی، پلاسمای هایپرایمیون جهت استحصال داروهای بیولوژیک
                </p>
              </div>
            </div>
          </div>

          <!-- Single Official Website CTA -->
          <div class="mt-auto pt-5 sm:pt-6 border-t border-white/10">
            <a href="https://tpnojine.com/" target="_blank" rel="noopener noreferrer" class="w-full py-3 sm:py-3.5 px-4 rounded-xl bg-white/5 hover:bg-gold-400 hover:text-black text-slate-200 border border-white/15 hover:border-gold-400 text-xs sm:text-sm font-bold text-center transition-all flex items-center justify-center gap-2 group/btn">
              <span data-i18n="comp_btn_official">مشاهده وب‌سایت رسمی شرکت</span>
              <svg class="w-4 h-4 text-gold-400 group-hover/btn:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </div>
        </article>

        <!-- Company 3: Persis Gene -->
        <article id="company-persis" class="company-showcase-card group">
          <div class="company-card-spotlight"></div>
          <div>
            <!-- Monochrome Logo Frame -->
            <div class="subsidiary-logo-frame mb-6 p-4 sm:p-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex items-center justify-center min-h-[95px] sm:min-h-[110px]">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-persisgen.png" alt="پرسیس‌ژن" class="subsidiary-mono-logo h-11 sm:h-14 w-auto object-contain">
            </div>

            <!-- Heading & En Name -->
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight mb-1" data-i18n="comp_3_name">
              پرسیس‌ژن
            </h2>
            <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="comp_3_en">
              Persis Gene
            </span>

            <!-- Mission / Role -->
            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="comp_3_role">
              شتابدهنده و انکوباتور ملی فرآیندهای زیستی، بانک سلولی و تحقیق و توسعه محصولات نوین بیوتکنولوژی و بیوسیمیلارها.
            </p>

            <!-- Technical Breakdown -->
            <div class="space-y-3.5 mb-6">
              <!-- Infrastructure -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  <span data-i18n="comp_details_infra">زیرساخت و ظرفیت تولید:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_3_cap">
                  فب‌لب‌های بیوتکنولوژی، کلین‌روم‌های مقیاس پایلوت، بانک سلولی ملی و سوئیت‌های تحقیق و توسعه فرآیندهای زیستی
                </p>
              </div>

              <!-- Focus & Products -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
                  <span data-i18n="comp_details_focus">فرآورده‌ها و تمرکز محوری:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_3_focus">
                  آنتی‌بادی‌های مونوکلونال، پروتئین‌های نوترکیب درمانی، آنزیم‌های صنعتی و فرآورده‌های پیشرفته بیوسیمیلار
                </p>
              </div>
            </div>
          </div>

          <!-- Single Official Website CTA -->
          <div class="mt-auto pt-5 sm:pt-6 border-t border-white/10">
            <a href="https://demo-branding.com/persis/" target="_blank" rel="noopener noreferrer" class="w-full py-3 sm:py-3.5 px-4 rounded-xl bg-white/5 hover:bg-gold-400 hover:text-black text-slate-200 border border-white/15 hover:border-gold-400 text-xs sm:text-sm font-bold text-center transition-all flex items-center justify-center gap-2 group/btn">
              <span data-i18n="comp_btn_official">مشاهده وب‌سایت رسمی شرکت</span>
              <svg class="w-4 h-4 text-gold-400 group-hover/btn:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </div>
        </article>

        <!-- Company 4: Arc Zist Azma -->
        <article id="company-arc" class="company-showcase-card group">
          <div class="company-card-spotlight"></div>
          <div>
            <!-- Monochrome Logo Frame -->
            <div class="subsidiary-logo-frame mb-6 p-4 sm:p-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex items-center justify-center min-h-[95px] sm:min-h-[110px]">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-arc.png" alt="آرک زیست آزما" class="subsidiary-mono-logo h-11 sm:h-14 w-auto object-contain">
            </div>

            <!-- Heading & En Name -->
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight mb-1" data-i18n="comp_4_name">
              آرک زیست آزما
            </h2>
            <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="comp_4_en">
              Arc Zist Azma
            </span>

            <!-- Mission / Role -->
            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="comp_4_role">
              آزمایشگاه همکار سازمان غذا و دارو (IFDA)، مرجع ملی کنترل کیفیت فرآورده‌های بیولوژیک و صدور گواهی Batch Release.
            </p>

            <!-- Technical Breakdown -->
            <div class="space-y-3.5 mb-6">
              <!-- Infrastructure -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  <span data-i18n="comp_details_infra">زیرساخت و ظرفیت تولید:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_4_cap">
                  گواهینامه ISO/IEC 17025، همکار رسمی سازمان غذا و دارو (IFDA) و مرکز رفرنس آزمون‌های بین‌المللی WHO
                </p>
              </div>

              <!-- Focus & Products -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
                  <span data-i18n="comp_details_focus">فرآورده‌ها و تمرکز محوری:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_4_focus">
                  آنالیز طیف‌سنجی جرمی ساختار پروتئین، تست استریلیتی، بیواسی سلولی و پایش پایداری مطابق استاندارد ICH
                </p>
              </div>
            </div>
          </div>

          <!-- Single Official Website CTA -->
          <div class="mt-auto pt-5 sm:pt-6 border-t border-white/10">
            <a href="http://arcbioassay.com/" target="_blank" rel="noopener noreferrer" class="w-full py-3 sm:py-3.5 px-4 rounded-xl bg-white/5 hover:bg-gold-400 hover:text-black text-slate-200 border border-white/15 hover:border-gold-400 text-xs sm:text-sm font-bold text-center transition-all flex items-center justify-center gap-2 group/btn">
              <span data-i18n="comp_btn_official">مشاهده وب‌سایت رسمی شرکت</span>
              <svg class="w-4 h-4 text-gold-400 group-hover/btn:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </div>
        </article>

        <!-- Company 5: Padra Serum Alborz -->
        <article id="company-padra" class="company-showcase-card group">
          <div class="company-card-spotlight"></div>
          <div>
            <!-- Monochrome Logo Frame -->
            <div class="subsidiary-logo-frame mb-6 p-4 sm:p-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex items-center justify-center min-h-[95px] sm:min-h-[110px]">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/padra-serum-logo-who-Final-PNG-1.png" alt="پادرا سرم البرز" class="subsidiary-mono-logo h-11 sm:h-14 w-auto object-contain">
            </div>

            <!-- Heading & En Name -->
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight mb-1" data-i18n="comp_5_name">
              پادرا سرم البرز
            </h2>
            <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="comp_5_en">
              Padra Serum Alborz
            </span>

            <!-- Mission / Role -->
            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="comp_5_role">
              تولیدکننده پیشرو پادزهرهای هایپرایمیون مارگزیدگی، عقرب‌گزیدگی و سرم‌های درمانی اورژانسی با پوشش بیش از ۷۰٪ نیاز ملی.
            </p>

            <!-- Technical Breakdown -->
            <div class="space-y-3.5 mb-6">
              <!-- Infrastructure -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  <span data-i18n="comp_details_infra">زیرساخت و ظرفیت تولید:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_5_cap">
                  مزارع اختصاصی تولید ایمونوگلوبولین، خطوط تصفیه آنزیمی و فرمولاسیون پادزهرهای چندظرفیتی با توزیع ملی
                </p>
              </div>

              <!-- Focus & Products -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
                  <span data-i18n="comp_details_focus">فرآورده‌ها و تمرکز محوری:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_5_focus">
                  پادزهر پلی‌والان مار و عقرب، سرم ضد هاری، پادزهر دیفتری و کزاز، ایمونوگلوبولین‌های اختصاصی
                </p>
              </div>
            </div>
          </div>

          <!-- Single Official Website CTA -->
          <div class="mt-auto pt-5 sm:pt-6 border-t border-white/10">
            <a href="https://padraserum.com/" target="_blank" rel="noopener noreferrer" class="w-full py-3 sm:py-3.5 px-4 rounded-xl bg-white/5 hover:bg-gold-400 hover:text-black text-slate-200 border border-white/15 hover:border-gold-400 text-xs sm:text-sm font-bold text-center transition-all flex items-center justify-center gap-2 group/btn">
              <span data-i18n="comp_btn_official">مشاهده وب‌سایت رسمی شرکت</span>
              <svg class="w-4 h-4 text-gold-400 group-hover/btn:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </div>
        </article>

        <!-- Company 6: KarayaKhteh Tajhiz Azma -->
        <article id="company-karayakhte" class="company-showcase-card group">
          <div class="company-card-spotlight"></div>
          <div>
            <!-- Monochrome Logo Frame -->
            <div class="subsidiary-logo-frame mb-6 p-4 sm:p-6 rounded-2xl bg-white/[0.02] border border-white/[0.06] flex items-center justify-center min-h-[95px] sm:min-h-[110px]">
              <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/subsidiaries/logo-karayakhte.webp" alt="کارا یاخته تجهیز آزما" class="subsidiary-mono-logo h-11 sm:h-14 w-auto object-contain">
            </div>

            <!-- Heading & En Name -->
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-black text-white tracking-tight mb-1" data-i18n="comp_6_name">
              کارا یاخته تجهیز آزما
            </h2>
            <span class="text-xs font-mono uppercase text-gold-400/80 tracking-wider mb-4 block" data-i18n="comp_6_en">
              KarayaKhteh / CARTIMED
            </span>

            <!-- Mission / Role -->
            <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify mb-5 pb-4 border-b border-white/10" data-i18n="comp_6_role">
              پیشگام ایمونوتراپی سلولی اتولوگ، فاز کارآزمایی بالینی درمان سرطان با فناوری CAR-T و تولید فرآورده‌های دارویی پیشرفته ATMP.
            </p>

            <!-- Technical Breakdown -->
            <div class="space-y-3.5 mb-6">
              <!-- Infrastructure -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-gold-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  <span data-i18n="comp_details_infra">زیرساخت و ظرفیت تولید:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_6_cap">
                  اتاق‌های تمیز فوق‌ایزوله کشت سلول، بیوراکتورهای ویو و همزن‌دار تولید داخل، اتاقک‌های پیشرفته فرآوری ژنی
                </p>
              </div>

              <!-- Focus & Products -->
              <div class="p-3 sm:p-3.5 rounded-xl bg-white/[0.02] border border-white/[0.05]">
                <div class="flex items-center gap-2 mb-1.5 text-amber-400 text-xs font-bold">
                  <svg class="w-4 h-4 text-amber-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>
                  </svg>
                  <span data-i18n="comp_details_focus">فرآورده‌ها و تمرکز محوری:</span>
                </div>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="comp_6_focus">
                  کارآزمایی‌های بالینی CAR-T در لوسمی و لنفوم، طراحی و ساخت بیوراکتورهای صنعتی زیست‌دارویی
                </p>
              </div>
            </div>
          </div>

          <!-- Single Official Website CTA -->
          <div class="mt-auto pt-5 sm:pt-6 border-t border-white/10">
            <a href="http://karayakhteh.ir/" target="_blank" rel="noopener noreferrer" class="w-full py-3 sm:py-3.5 px-4 rounded-xl bg-white/5 hover:bg-gold-400 hover:text-black text-slate-200 border border-white/15 hover:border-gold-400 text-xs sm:text-sm font-bold text-center transition-all flex items-center justify-center gap-2 group/btn">
              <span data-i18n="comp_btn_official">مشاهده وب‌سایت رسمی شرکت</span>
              <svg class="w-4 h-4 text-gold-400 group-hover/btn:text-black transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
              </svg>
            </a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 3: B2B PARTNERSHIP BANNER
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
          <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn-primary w-full sm:w-auto text-xs sm:text-sm px-7 py-3.5 rounded-full font-bold inline-flex items-center justify-center gap-2 cursor-pointer">
            <span class="w-2 h-2 rounded-full bg-black animate-ping"></span>
            <span data-i18n="about_b2b_btn">ثبت درخواست رسمی B2B</span>
          </a>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
