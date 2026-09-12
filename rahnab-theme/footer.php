<?php
/**
 * The template for displaying the footer
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;
?>
  <!-- =========================================
       FOOTER — Editorial Obsidian (davidecattaneo.it Inspired)
       ========================================= -->
  <footer id="mainFooter"
    class="relative z-20 bg-[#05070B] border-t border-white/10 pt-20 overflow-hidden font-fa-display">
    <!-- Top Row: Editorial Holding Grid -->
    <div class="container mx-auto px-6 mb-16 relative z-30 pointer-events-auto">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 lg:gap-8">
        <!-- Col 1: Holding Brand & Mission Statement -->
        <div class="lg:col-span-4 flex flex-col items-start">
          <div class="mb-6">
            <?php rahnab_the_custom_logo(); ?>
          </div>
          <p class="text-sm text-slate-400 leading-relaxed max-w-sm mb-6 font-normal" data-i18n="footer_desc">
            <?php esc_html_e('هلدینگ سرمایه‌گذاری سلامت و زیست‌دارویی رهناب فارمد؛ راهبری یکپارچه زیرساخت‌های کلان فناوری‌های نوین سلامت، پالایشگاه‌های زیستی و ایمونوتراپی سلولی در مقیاس ملی و منطقه‌ای.', 'rahnab'); ?>
          </p>
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-gold-400/20 bg-gold-400/5 text-[11px] font-mono text-gold-400">
            <span class="w-1.5 h-1.5 rounded-full bg-gold-400"></span>
            <span><?php esc_html_e('ثبت رسمی در سازمان غذا و دارو و معاونت علمی', 'rahnab'); ?></span>
          </div>
        </div>

        <!-- Col 2: Quick Links Navigation -->
        <div class="lg:col-span-2 lg:ms-auto">
          <h3 class="text-xs font-mono uppercase tracking-widest text-gold-400 mb-6 font-bold"
            data-i18n="footer_col_nav"><?php esc_html_e('دسترسی سریع', 'rahnab'); ?></h3>
          <ul class="flex flex-col gap-3 text-sm text-slate-300">
            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="nav_home"><?php esc_html_e('صفحه اصلی', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="nav_about"><?php esc_html_e('درباره رهناب', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/services/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="nav_services"><?php esc_html_e('توانمندی‌ها و خدمات', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/companies/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="nav_companies"><?php esc_html_e('شرکت‌های زیرمجموعه', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/news/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="nav_news"><?php esc_html_e('اخبار و رویدادها', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="nav_contact"><?php esc_html_e('تماس با ما', 'rahnab'); ?></a></li>
          </ul>
        </div>

        <!-- Col 3: Direct Holding Contacts -->
        <div class="lg:col-span-3">
          <h3 class="text-xs font-mono uppercase tracking-widest text-gold-400 mb-6 font-bold"
            data-i18n="footer_col_contact"><?php esc_html_e('دفاتر و ارتباطات', 'rahnab'); ?></h3>
          <div class="flex flex-col gap-4 text-sm text-slate-300">
            <div>
              <p class="text-xs text-slate-500 font-mono mb-1" data-i18n="nav_info_hq"><?php esc_html_e('دفتر مرکزی', 'rahnab'); ?></p>
              <p class="leading-relaxed text-slate-300" data-i18n="nav_info_address"><?php esc_html_e('تهران، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری (NIGEB)', 'rahnab'); ?></p>
            </div>
            <div>
              <p class="text-xs text-slate-500 font-mono mb-1" data-i18n="nav_info_direct"><?php esc_html_e('ارتباط مستقیم', 'rahnab'); ?></p>
              <a href="tel:+982144787260"
                class="text-base font-bold text-gold-400 hover:text-gold-300 transition-colors inline-block dir-ltr text-start" dir="ltr">
                <span data-i18n="nav_info_phone">۰۲۱۴۴۷۸۷۲۶۰</span>
              </a>
              <a href="mailto:info@rahnab.com"
                class="block text-xs font-mono text-slate-400 hover:text-white transition-colors mt-0.5 dir-ltr text-start" dir="ltr">info@rahnab.com</a>
            </div>
            <div>
              <p class="text-xs text-slate-500 font-mono mb-0.5"><?php esc_html_e('ساعات پاسخگویی اداری', 'rahnab'); ?></p>
              <p class="text-xs text-slate-400"><?php esc_html_e('شنبه تا چهارشنبه: ۸:۳۰ الی ۱۶:۳۰', 'rahnab'); ?></p>
            </div>
          </div>
        </div>

        <!-- Col 4: Official B2B Partnership -->
        <div class="lg:col-span-3">
          <h3 class="text-xs font-mono uppercase tracking-widest text-gold-400 mb-6 font-bold"
            data-i18n="footer_col_portal"><?php esc_html_e('پورتال اختصاصی و سرمایه‌گذاری', 'rahnab'); ?></h3>
          <p class="text-sm text-slate-400 leading-relaxed mb-4" data-i18n="footer_portal_desc">
            <?php esc_html_e('ارتباط مستقیم شرکت‌های دانش‌بنیان، نهادهای مالی و پژوهشگران تراز اول با معاونت سرمایه‌گذاری و توسعه کسب‌وکار هلدینگ.', 'rahnab'); ?>
          </p>
          <a href="<?php echo esc_url(home_url('/contact/')); ?>"
            class="w-full justify-center text-xs py-3 rounded-xl border border-gold-400/40 text-gold-400 hover:bg-gold-400/10 font-bold transition-all flex items-center gap-2 mb-6">
            <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
            <span data-i18n="nav_cta_cooperation"><?php esc_html_e('ارتباط و همکاری با هلدینگ', 'rahnab'); ?></span>
          </a>
          <!-- Social Icons -->
          <div class="flex items-center gap-3">
            <a href="https://www.linkedin.com/company/rahnab-pharmed" target="_blank" rel="noopener noreferrer"
              class="w-9 h-9 rounded-lg border border-white/10 flex items-center justify-center text-slate-400 hover:text-gold-400 hover:border-gold-400/40 hover:bg-gold-400/5 transition-all"
              aria-label="LinkedIn">
              <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- TextHoverEffect (Exact SVG Hover Effect from motion.js) -->
    <div class="footer-text-hover-section relative z-10 pointer-events-none">
      <div id="footerHoverText" data-hover-text="RAHNAB" class="w-full h-full flex items-center justify-center">
        <!-- SVG Injected dynamically by motion.js -->
      </div>
    </div>

    <!-- Footer Bottom Bar -->
    <div class="container mx-auto px-6 pb-10 relative z-30 pointer-events-auto">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-white/10 text-xs text-slate-500">
        <p data-i18n="footer_copyright">© <?php echo esc_html(date_i18n('Y')); ?> <?php esc_html_e('هلدینگ سرمایه‌گذاری رهناب فارمد. تمامی حقوق محفوظ است.', 'rahnab'); ?></p>
        <p class="text-slate-400 font-medium" data-i18n="footer_motto"><?php esc_html_e('طراحی و توسعه توسط', 'rahnab'); ?> <a href="https://ihasht.ir" target="_blank" rel="noopener noreferrer" class="text-gold-400 hover:text-gold-300 font-bold transition-colors underline decoration-gold-400/30 underline-offset-4"><?php esc_html_e('هشت‌بهشت (HashtBehesht)', 'rahnab'); ?></a></p>
      </div>
    </div>

    <!-- Background Radial Gradient Glow -->
    <div class="footer-radial-gradient"></div>
  </footer>

  <!-- Floating Back to Top Button (Awwwards Trending Progress Ring) -->
  <button id="backToTopBtn" class="back-to-top-btn group" aria-label="<?php esc_attr_e('بازگشت به ابتدای صفحه', 'rahnab'); ?>" title="<?php esc_attr_e('بازگشت به ابتدای صفحه', 'rahnab'); ?>">
    <!-- Circular SVG Progress Ring Track -->
    <svg class="progress-ring absolute inset-0 w-full h-full -rotate-90 pointer-events-none" viewBox="0 0 48 48">
      <circle class="progress-ring-bg" cx="24" cy="24" r="21" fill="none" stroke="rgba(255, 255, 255, 0.08)" stroke-width="2.5" />
      <circle id="backToTopProgress" class="progress-ring-circle" cx="24" cy="24" r="21" fill="none" stroke="url(#goldGradBackToTop)" stroke-width="2.5" stroke-dasharray="132" stroke-dashoffset="132" stroke-linecap="round" />
      <defs>
        <linearGradient id="goldGradBackToTop" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" stop-color="#E5B887" />
          <stop offset="100%" stop-color="#F3D3A2" />
        </linearGradient>
      </defs>
    </svg>
    <!-- Center Obsidian Frosted Glass Core with Micro-Arrow -->
    <div class="back-to-top-core relative z-10 flex items-center justify-center">
      <svg class="w-4 h-4 text-gold-400 transform transition-transform duration-300 group-hover:-translate-y-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
      </svg>
    </div>
  </button>

<?php wp_footer(); ?>
</body>
</html>
