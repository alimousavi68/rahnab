<?php
/**
 * Rahnab Pharmed Holding — Contact Page
 * صفحه تماس با ما و درگاه ارتباطات هلدینگ
 *
 * Classic WordPress Theme Ready Architecture
 */

$page_title = 'تماس با ما | هلدینگ سرمایه‌گذاری رهناب فارمد';
$page_desc  = 'پل‌های ارتباطی، نشانی دفتر مرکزی هلدینگ در پژوهشگاه ملی مهندسی ژنتیک، شبکه‌های اجتماعی، فرم ارسال پیام و راه‌های مسیریابی.';
$active_page = 'contact';
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
  <section class="relative z-10 pb-12 sm:pb-16 border-b border-white/5">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <!-- Breadcrumbs -->
      <nav aria-label="Breadcrumb" class="mb-6">
        <ol class="flex items-center gap-2 text-xs text-slate-400">
          <li>
            <a href="index.php" class="hover:text-gold-400 transition-colors" data-i18n="nav_home">صفحه اصلی</a>
          </li>
          <li class="text-white/20 select-none">/</li>
          <li class="text-gold-400 font-semibold" aria-current="page" data-i18n="contact_crumb">تماس با ما</li>
        </ol>
      </nav>

      <!-- Eyebrow Tag -->
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/25 mb-4">
        <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
        <span class="text-xs font-bold text-gold-400 uppercase tracking-widest" data-i18n="contact_eyebrow">ارتباط با ما</span>
      </div>

      <!-- Main Headline (Solid White, No Gradient) -->
      <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white leading-tight tracking-tight max-w-4xl mb-4" data-i18n="contact_hero_title">
        تماس با رهناب فارمد
      </h1>

      <p class="text-sm sm:text-base text-slate-300 max-w-2xl leading-relaxed text-justify sm:text-start" data-i18n="contact_hero_subtitle">
        ما همواره آماده پاسخگویی به پرسش‌ها، نظرات و پیشنهادهای شما هستیم.
      </p>
    </div>
  </section>

  <!-- =========================================
       ZONE 2: CONTACT INFORMATION & FORM
       ========================================= -->
  <section class="py-12 sm:py-16 relative z-10">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
        
        <!-- Column 1: Contact Information & Channels (5 Cols) -->
        <div class="lg:col-span-5 space-y-6">
          <div class="contact-info-card">
            <div class="contact-card-spotlight"></div>
            
            <div class="relative z-10 space-y-6">
              <!-- Header -->
              <div class="border-b border-white/10 pb-5">
                <h2 class="text-xl sm:text-2xl font-black text-white mb-2" data-i18n="contact_info_title">
                  اطلاعات دفتر مرکزی
                </h2>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="contact_info_desc">
                  دفتر مرکزی هلدینگ سرمایه‌گذاری رهناب فارمد مستقر در پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری.
                </p>
              </div>

              <!-- Address -->
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-400 shrink-0 mt-0.5">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <span class="text-xs font-bold text-gold-400 block mb-1" data-i18n="contact_address_label">نشانی دفتر مرکزی:</span>
                  <p class="text-xs sm:text-sm text-slate-300 leading-relaxed text-justify" data-i18n="contact_address_val">
                    تهران، کیلومتر ۱۵ اتوبان تهران-کرج، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری (NIGEB)، طبقه ۳، واحد ۳۰۲
                  </p>
                </div>
              </div>

              <!-- Phone -->
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-400 shrink-0 mt-0.5">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                </div>
                <div>
                  <span class="text-xs font-bold text-gold-400 block mb-1" data-i18n="contact_phone_label">تلفن‌های تماس:</span>
                  <a href="tel:+982144787000" class="text-xs sm:text-sm text-slate-300 hover:text-gold-400 transition-colors block font-mono" dir="ltr" data-i18n="contact_phone_val">
                    +۹۸ (۲۱) ۴۴۷۸ ۷۰۰۰ - ۴۴۷۸ ۷۰۲۲
                  </a>
                </div>
              </div>

              <!-- Email -->
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-gold-400/10 border border-gold-400/20 flex items-center justify-center text-gold-400 shrink-0 mt-0.5">
                  <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <span class="text-xs font-bold text-gold-400 block mb-1" data-i18n="contact_email_label">پست الکترونیک رسمی:</span>
                  <a href="mailto:info@rahnab.com" class="text-xs sm:text-sm text-slate-300 hover:text-gold-400 transition-colors block font-mono" data-i18n="contact_email_val">
                    info@rahnab.com
                  </a>
                </div>
              </div>

              <!-- Social Networks & Messaging Section -->
              <div class="pt-6 border-t border-white/10">
                <span class="text-xs font-bold text-gold-400 block mb-2" data-i18n="contact_socials_title">
                  شبکه‌های اجتماعی و پیام‌رسان‌ها
                </span>
                <p class="text-xs text-slate-400 mb-4 leading-relaxed text-justify" data-i18n="contact_socials_desc">
                  جهت دریافت آخرین اخبار، ارتباط مستقیم یا ارسال پیام از طریق پیام‌رسان‌ها می‌توانید از درگاه‌های زیر استفاده نمایید:
                </p>

                <!-- 5 Social & Messaging Buttons -->
                <div class="flex items-center gap-3 flex-wrap">
                  <!-- LinkedIn -->
                  <a href="https://www.linkedin.com/company/rahnab-pharmed" target="_blank" rel="noopener noreferrer"
                     aria-label="LinkedIn"
                     title="LinkedIn"
                     class="w-11 h-11 rounded-xl bg-white/5 border border-white/10 hover:border-gold-400/60 hover:bg-gold-400/10 text-slate-300 hover:text-gold-400 flex items-center justify-center transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
                    </svg>
                  </a>

                  <!-- Instagram -->
                  <a href="https://instagram.com/rahnabpharmed" target="_blank" rel="noopener noreferrer"
                     aria-label="Instagram"
                     title="Instagram"
                     class="w-11 h-11 rounded-xl bg-white/5 border border-white/10 hover:border-gold-400/60 hover:bg-gold-400/10 text-slate-300 hover:text-gold-400 flex items-center justify-center transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                  </a>

                  <!-- Telegram -->
                  <a href="https://t.me/rahnabpharmed" target="_blank" rel="noopener noreferrer"
                     aria-label="Telegram"
                     title="Telegram"
                     class="w-11 h-11 rounded-xl bg-white/5 border border-white/10 hover:border-gold-400/60 hover:bg-gold-400/10 text-slate-300 hover:text-gold-400 flex items-center justify-center transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.945z"/>
                    </svg>
                  </a>

                  <!-- WhatsApp -->
                  <a href="https://wa.me/989123456789" target="_blank" rel="noopener noreferrer"
                     aria-label="WhatsApp"
                     title="WhatsApp"
                     class="w-11 h-11 rounded-xl bg-white/5 border border-white/10 hover:border-gold-400/60 hover:bg-gold-400/10 text-slate-300 hover:text-gold-400 flex items-center justify-center transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                    </svg>
                  </a>

                  <!-- Email Link -->
                  <a href="mailto:info@rahnab.com"
                     aria-label="Direct Email"
                     title="Email"
                     class="w-11 h-11 rounded-xl bg-white/5 border border-white/10 hover:border-gold-400/60 hover:bg-gold-400/10 text-slate-300 hover:text-gold-400 flex items-center justify-center transition-all duration-300 group">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>

        <!-- Column 2: Standard Contact Form (7 Cols) -->
        <div class="lg:col-span-7">
          <div class="contact-form-card">
            <div class="contact-card-spotlight"></div>

            <div class="relative z-10">
              <div class="border-b border-white/10 pb-5 mb-6">
                <h2 class="text-xl sm:text-2xl font-black text-white mb-2" data-i18n="contact_form_title">
                  ارسال پیام به هلدینگ
                </h2>
                <p class="text-xs sm:text-sm text-slate-400 leading-relaxed text-justify" data-i18n="contact_form_desc">
                  پیام، سوال یا نظر خود را در قالب فرم زیر ارسال فرمایید تا همکاران ما در سریع‌ترین زمان ممکن پاسخگوی شما باشند.
                </p>
              </div>

              <!-- Contact Form -->
              <form id="contactForm" class="space-y-5" novalidate>
                <!-- Row 1: Name & Phone -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <!-- Name Field -->
                  <div>
                    <label for="contactName" class="block text-xs font-bold text-slate-300 mb-2" data-i18n="contact_field_name">
                      نام و نام خانوادگی *
                    </label>
                    <input type="text" id="contactName" name="name" required
                           class="w-full px-4 py-3 rounded-xl bg-white/[0.03] border border-white/10 focus:border-gold-400 focus:bg-white/[0.06] text-white text-xs sm:text-sm transition-colors placeholder:text-slate-500 outline-none"
                           placeholder="مثال: علی رضایی" data-i18n-placeholder="contact_placeholder_name">
                  </div>

                  <!-- Phone Field -->
                  <div>
                    <label for="contactPhone" class="block text-xs font-bold text-slate-300 mb-2" data-i18n="contact_field_phone">
                      شماره تماس مستقیم *
                    </label>
                    <input type="tel" id="contactPhone" name="phone" required dir="ltr"
                           class="w-full px-4 py-3 rounded-xl bg-white/[0.03] border border-white/10 focus:border-gold-400 focus:bg-white/[0.06] text-white text-xs sm:text-sm transition-colors placeholder:text-slate-500 outline-none font-mono"
                           placeholder="۰۹۱۲۳۴۵۶۷۸۹" data-i18n-placeholder="contact_placeholder_phone">
                  </div>
                </div>

                <!-- Row 2: Email & Subject -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                  <!-- Email Field -->
                  <div>
                    <label for="contactEmail" class="block text-xs font-bold text-slate-300 mb-2" data-i18n="contact_field_email">
                      پست الکترونیک *
                    </label>
                    <input type="email" id="contactEmail" name="email" required dir="ltr"
                           class="w-full px-4 py-3 rounded-xl bg-white/[0.03] border border-white/10 focus:border-gold-400 focus:bg-white/[0.06] text-white text-xs sm:text-sm transition-colors placeholder:text-slate-500 outline-none font-mono"
                           placeholder="name@example.com" data-i18n-placeholder="contact_placeholder_email">
                  </div>

                  <!-- Subject Field -->
                  <div>
                    <label for="contactSubject" class="block text-xs font-bold text-slate-300 mb-2" data-i18n="contact_field_subject">
                      موضوع پیام *
                    </label>
                    <input type="text" id="contactSubject" name="subject" required
                           class="w-full px-4 py-3 rounded-xl bg-white/[0.03] border border-white/10 focus:border-gold-400 focus:bg-white/[0.06] text-white text-xs sm:text-sm transition-colors placeholder:text-slate-500 outline-none"
                           placeholder="موضوع پیام خود را بنویسید..." data-i18n-placeholder="contact_placeholder_subject">
                  </div>
                </div>

                <!-- Row 3: Message Textarea -->
                <div>
                  <label for="contactMessage" class="block text-xs font-bold text-slate-300 mb-2" data-i18n="contact_field_message">
                    متن پیام *
                  </label>
                  <textarea id="contactMessage" name="message" rows="5" required
                            class="w-full px-4 py-3 rounded-xl bg-white/[0.03] border border-white/10 focus:border-gold-400 focus:bg-white/[0.06] text-white text-xs sm:text-sm transition-colors placeholder:text-slate-500 outline-none resize-y"
                            placeholder="متن پیام، سوال یا نظر خود را وارد نمایید..." data-i18n-placeholder="contact_placeholder_message"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-2 flex justify-end">
                  <button type="submit"
                          class="btn-primary w-full sm:w-auto px-8 py-3.5 rounded-xl font-bold text-xs sm:text-sm inline-flex items-center justify-center gap-2 cursor-pointer shadow-lg hover:shadow-gold-400/20 transition-all">
                    <svg class="w-4 h-4 text-black transform rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                    <span data-i18n="contact_form_submit">ارسال پیام</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- =========================================
       ZONE 3: GEOGRAPHIC MAP & ROUTING ACCESS
       ========================================= -->
  <section class="py-12 sm:py-16 relative z-10 border-t border-white/5">
    <div class="container mx-auto px-6 sm:px-10 lg:px-16">
      
      <!-- Section Header -->
      <div class="max-w-2xl mb-8">
        <span class="text-xs font-bold text-gold-400 uppercase tracking-widest block mb-1" data-i18n="contact_map_subtitle">
          پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری (NIGEB)
        </span>
        <h2 class="text-xl sm:text-3xl font-black text-white" data-i18n="contact_map_title">
          موقعیت جغرافیایی و دسترسی به دفتر مرکزی
        </h2>
      </div>

      <!-- Map Container with Obsidian Styling -->
      <div class="rounded-2xl sm:rounded-3xl overflow-hidden border border-white/10 bg-[#101522] shadow-2xl relative">
        <!-- Interactive Map Frame (OpenStreetMap focused on NIGEB) -->
        <div class="relative w-full h-80 sm:h-96 filter contrast-[1.05] grayscale-[0.85] invert-[0.92] hue-rotate-180 transition-all duration-500 hover:grayscale-0 hover:invert-0 hover:hue-rotate-0">
          <iframe
            title="Location Map"
            src="https://www.openstreetmap.org/export/embed.html?bbox=51.1800%2C35.7420%2C51.1980%2C35.7550&amp;layer=mapnik&amp;marker=35.7486%2C51.1895"
            class="w-full h-full border-0 pointer-events-auto"
            loading="lazy">
          </iframe>
        </div>

        <!-- Action Bar: Routing Options (Neshan, Balad, Google Maps, Waze) -->
        <div class="p-4 sm:p-6 bg-[#0A0E17]/95 border-t border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4">
          <div class="flex items-center gap-2.5 text-xs text-slate-300">
            <svg class="w-4 h-4 text-gold-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
            </svg>
            <span class="font-semibold text-slate-200" data-i18n="contact_address_val">تهران، کیلومتر ۱۵ اتوبان تهران-کرج، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری</span>
          </div>

          <!-- Direct Navigation Links -->
          <div class="flex items-center gap-2 flex-wrap justify-center sm:justify-end w-full sm:w-auto">
            <!-- Neshan -->
            <a href="https://neshan.org/maps/@35.7486,51.1895,15z" target="_blank" rel="noopener noreferrer"
               class="px-3 py-1.5 rounded-lg bg-white/5 hover:bg-gold-400 hover:text-black border border-white/10 hover:border-gold-400 text-slate-300 text-xs font-bold transition-all flex items-center gap-1.5">
              <span>📍</span>
              <span data-i18n="contact_nav_neshan">نشان</span>
            </a>

            <!-- Balad -->
            <a href="https://balad.ir/location?latitude=35.7486&longitude=51.1895" target="_blank" rel="noopener noreferrer"
               class="px-3 py-1.5 rounded-lg bg-white/5 hover:bg-gold-400 hover:text-black border border-white/10 hover:border-gold-400 text-slate-300 text-xs font-bold transition-all flex items-center gap-1.5">
              <span>🧭</span>
              <span data-i18n="contact_nav_balad">بلد</span>
            </a>

            <!-- Google Maps -->
            <a href="https://maps.google.com/?q=35.7486,51.1895" target="_blank" rel="noopener noreferrer"
               class="px-3 py-1.5 rounded-lg bg-white/5 hover:bg-gold-400 hover:text-black border border-white/10 hover:border-gold-400 text-slate-300 text-xs font-bold transition-all flex items-center gap-1.5">
              <span>🗺️</span>
              <span data-i18n="contact_nav_google">گوگل مپ</span>
            </a>

            <!-- Waze -->
            <a href="https://waze.com/ul?ll=35.7486,51.1895&navigate=yes" target="_blank" rel="noopener noreferrer"
               class="px-3 py-1.5 rounded-lg bg-white/5 hover:bg-gold-400 hover:text-black border border-white/10 hover:border-gold-400 text-slate-300 text-xs font-bold transition-all flex items-center gap-1.5">
              <span>🚗</span>
              <span data-i18n="contact_nav_waze">ویز</span>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php
include_once __DIR__ . '/includes/footer.php';
?>
