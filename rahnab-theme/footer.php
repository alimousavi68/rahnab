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
       ZONE 6: FOOTER (Faithfully Matching prompt_hover-footer.md)
       ========================================= -->
  <footer class="hover-footer-container" id="footer">
    <div class="container mx-auto px-6 pt-16 pb-2 relative z-10">
      <!-- Top 4 Columns -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 lg:gap-8 pb-14 border-b border-white/10">
        <!-- Brand Column (ONLY Logo - No duplicate text!) -->
        <div class="lg:col-span-4 flex flex-col space-y-4">
          <a href="<?php echo esc_url(home_url('/#hero')); ?>" aria-label="Rahnab Pharmed" class="block">
            <img src="<?php echo esc_url(RAHNAB_URI); ?>/assets/images/logo_rahnab.png" alt="Rahnab Pharmed" class="h-14 md:h-16 w-auto object-contain">
          </a>
          <p class="text-slate-400 text-sm leading-relaxed max-w-sm" data-i18n="footer_desc">
            <?php esc_html_e('معمار زنجیره ارزش زیست‌فناوری نوین ایران. سرمایه‌گذاری تخصصی در زیرساخت‌های کلان سلامت و استقلال دارویی.', 'rahnab'); ?>
          </p>
          <div class="pt-2 flex flex-col space-y-2.5 text-sm text-slate-300">
            <?php $footer_email = rahnab_get_option('rahnab_email', 'info@rahnab.com'); ?>
            <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="flex items-center gap-2.5 hover:text-gold-400 transition-colors group">
              <svg class="w-4 h-4 text-gold-400 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
              </svg>
              <span class="font-en-display" data-i18n="footer_email"><?php echo esc_html($footer_email); ?></span>
            </a>
            <?php 
              $footer_phone = rahnab_get_option('rahnab_phone', '۰۲۱۴۴۷۸۷۲۶۰');
              $footer_phone_clean = preg_replace('/[^0-9+]/', '', $footer_phone);
            ?>
            <a href="tel:<?php echo esc_attr($footer_phone_clean); ?>" class="flex items-center gap-2.5 hover:text-gold-400 transition-colors group">
              <svg class="w-4 h-4 text-gold-400 flex-shrink-0 transition-transform group-hover:scale-110" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.75">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
              </svg>
              <span dir="ltr" class="font-fa-display font-medium text-left" data-i18n="footer_phone"><?php echo esc_html($footer_phone); ?></span>
            </a>
          </div>
        </div>

        <!-- Quick Links Column -->
        <div class="lg:col-span-2">
          <h4 class="text-white font-bold text-base mb-5" data-i18n="footer_links_title"><?php esc_html_e('دسترسی سریع', 'rahnab'); ?></h4>
          <ul class="space-y-3 text-sm text-slate-400">
            <li><a href="<?php echo esc_url(home_url('/about/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="footer_link_1"><?php esc_html_e('درباره هلدینگ', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/services/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="footer_link_2"><?php esc_html_e('خدمات و توانمندی‌ها', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/companies/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="footer_link_companies"><?php esc_html_e('شرکت‌های زیرمجموعه', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/#impact')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="footer_link_3"><?php esc_html_e('تأثیر ملی', 'rahnab'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/news/')); ?>" class="hover:text-gold-400 transition-colors" data-i18n="footer_link_4"><?php esc_html_e('اخبار و دستاوردها', 'rahnab'); ?></a></li>
          </ul>
        </div>

        <!-- Subsidiaries Column -->
        <div class="lg:col-span-3">
          <h4 class="text-white font-bold text-base mb-5" data-i18n="footer_subs_title"><?php esc_html_e('شرکت‌های زیرمجموعه', 'rahnab'); ?></h4>
          <ul class="space-y-2 text-sm text-slate-400">
            <li><a href="<?php echo esc_url(home_url('/companies/#company-nojin')); ?>" class="hover:text-gold-400 transition-colors">نوژین زیست فارمد (Nozhin Zist) ↗</a></li>
            <li><a href="<?php echo esc_url(home_url('/companies/#company-tamin-plasma')); ?>" class="hover:text-gold-400 transition-colors">تأمین پلاسما نوژین (Tamin Plasma) ↗</a></li>
            <li><a href="<?php echo esc_url(home_url('/companies/#company-persis')); ?>" class="hover:text-gold-400 transition-colors">پرسیس ژن (Persis Gene) ↗</a></li>
            <li><a href="<?php echo esc_url(home_url('/companies/#company-arc')); ?>" class="hover:text-gold-400 transition-colors">آرک زیست آزما (Arc Zist Azma) ↗</a></li>
            <li><a href="<?php echo esc_url(home_url('/companies/#company-padra')); ?>" class="hover:text-gold-400 transition-colors">پادرا سرم البرز (Padra Serum) ↗</a></li>
            <li><a href="<?php echo esc_url(home_url('/companies/#company-karayakhte')); ?>" class="hover:text-gold-400 transition-colors">کارا یاخته تجهیز آزما (KarayaKhteh) ↗</a></li>
          </ul>
        </div>

        <!-- Central Office Column -->
        <div class="lg:col-span-3">
          <h4 class="text-white font-bold text-base mb-5" data-i18n="footer_address_title"><?php esc_html_e('دفتر مرکزی هلدینگ', 'rahnab'); ?></h4>
          <p class="text-slate-400 text-sm leading-relaxed mb-6" data-i18n="footer_address">
            <?php echo esc_html(rahnab_get_option('rahnab_address', 'تهران، کیلومتر ۱۵ اتوبان تهران-کرج، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری (NIGEB)، طبقه ۳، واحد ۳۰۲')); ?>
          </p>
          <div class="flex items-center gap-3">
            <a href="<?php echo esc_url(rahnab_get_option('rahnab_linkedin', 'https://www.linkedin.com/company/rahnab-pharmed')); ?>" target="_blank" rel="noopener noreferrer"
              aria-label="LinkedIn"
              class="w-10 h-10 rounded-full bg-white/5 border border-white/10 flex items-center justify-center text-slate-300 hover:bg-gold-400 hover:text-black hover:border-gold-400 transition-all">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- TextHoverEffect (Exact Dimensions & Visual from prompt_hover-footer.md) -->
    <div class="footer-text-hover-section">
      <div id="footerHoverText" data-hover-text="RAHNAB" class="w-full h-full flex items-center justify-center">
        <!-- SVG Injected dynamically by motion.js -->
      </div>
    </div>

    <!-- Footer Bottom Bar (Positioned Below RAHNAB) -->
    <div class="container mx-auto px-6 pb-10 relative z-10">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-6 border-t border-white/10 text-xs text-slate-500">
        <p data-i18n="footer_copyright">© <?php echo esc_html(date_i18n('Y')); ?> <?php esc_html_e('هلدینگ سرمایه‌گذاری سلامت و زیست‌دارویی رهناب فارمد. تمامی حقوق محفوظ است.', 'rahnab'); ?></p>
        <p class="text-slate-400 font-medium" data-i18n="footer_motto"><?php esc_html_e('طراحی و توسعه توسط', 'rahnab'); ?> <a href="https://ihasht.ir" target="_blank" rel="noopener noreferrer" class="text-gold-400 hover:text-gold-300 font-bold transition-colors underline decoration-gold-400/30 underline-offset-4"><?php esc_html_e('هشت‌بهشت (HashtBehesht)', 'rahnab'); ?></a></p>
      </div>
    </div>

    <!-- Background Radial Gradient Glow -->
    <div class="footer-radial-gradient"></div>
  </footer>

  <!-- B2B Inquiry Modal -->
  <div id="inquiryModal"
    class="fixed inset-0 bg-black/80 z-[100] hidden flex items-center justify-center opacity-0 transition-opacity duration-300 backdrop-blur-md p-4">
    <div class="bg-[#0A0E17] border border-gold-400/25 rounded-3xl w-full max-w-lg p-8 relative shadow-2xl">
      <button id="closeModalBtn" aria-label="Close"
        class="absolute top-5 left-5 text-slate-400 hover:text-white text-2xl leading-none">&times;</button>
      <div class="mb-6">
        <span class="text-xs uppercase tracking-widest text-gold-400 font-bold font-en-mono"
          data-i18n="modal_label">PORTAL PARTNERSHIP</span>
        <h3 class="text-2xl font-bold text-white mt-1" data-i18n="modal_title"><?php esc_html_e('درخواست همکاری تجاری B2B', 'rahnab'); ?></h3>
        <p class="text-slate-400 text-sm mt-1" data-i18n="modal_subtitle"><?php esc_html_e('ارتباط مستقیم با معاونت سرمایه‌گذاری و توسعه کسب‌وکار هلدینگ', 'rahnab'); ?></p>
      </div>
      <form class="flex flex-col gap-4" id="inquiryForm">
        <input type="text" placeholder="<?php esc_attr_e('نام و نام خانوادگی', 'rahnab'); ?>"
          class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
          data-i18n-placeholder="modal_name">
        <input type="text" placeholder="<?php esc_attr_e('نام شرکت / سازمان', 'rahnab'); ?>"
          class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
          data-i18n-placeholder="modal_company">
        <input type="email" placeholder="<?php esc_attr_e('ایمیل سازمانی (Corporate Email)', 'rahnab'); ?>"
          class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
          data-i18n-placeholder="modal_email">
        <textarea placeholder="<?php esc_attr_e('شرح درخواست همکاری یا سرمایه‌گذاری...', 'rahnab'); ?>" rows="4"
          class="bg-[#05070B] border border-white/10 rounded-xl p-3.5 text-white placeholder-slate-500 focus:border-gold-400 outline-none text-sm transition-colors"
          data-i18n-placeholder="modal_message"></textarea>
        <button type="submit" class="btn-primary w-full justify-center py-3.5 mt-2" data-i18n="modal_submit"><?php esc_html_e('ارسال درخواست رسمی', 'rahnab'); ?></button>
      </form>
    </div>
  </div>

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
<script>
  (function() {
    function runInit() {
      if (typeof initHeroScene === 'function') initHeroScene();
      if (typeof initMotionEngine === 'function') initMotionEngine();
      if (typeof initApp === 'function') initApp();
    }
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', runInit);
    } else {
      runInit();
    }
  })();
</script>
</body>
</html>
