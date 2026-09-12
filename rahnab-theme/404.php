<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="min-h-screen bg-[#05070B] pt-32 sm:pt-40 pb-24 relative overflow-hidden flex items-center font-fa-display">
  
  <!-- Subtle Ambient Glows -->
  <div class="pointer-events-none absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[550px] h-[550px] bg-gold-400/[0.04] rounded-full blur-[140px]"></div>

  <div class="container mx-auto px-6 sm:px-10 lg:px-16 relative z-10 text-center">
    
    <!-- 404 Numeral with Specular Gold Gradient -->
    <div class="mb-4 select-none">
      <span class="text-7xl sm:text-9xl lg:text-[180px] font-black font-mono tracking-tighter text-transparent bg-clip-text bg-gradient-to-b from-white via-gold-300 to-gold-600/30 filter drop-shadow-[0_0_35px_rgba(229,184,135,0.2)]">
        404
      </span>
    </div>

    <!-- Eyebrow Tag -->
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-gold-400/10 border border-gold-400/25 mb-5">
      <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-pulse"></span>
      <span class="text-xs font-bold text-gold-400 uppercase tracking-widest" data-i18n="error_404_tag"><?php esc_html_e('خطای ۴۰۴', 'rahnab'); ?></span>
    </div>

    <!-- Solid White Headline -->
    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight mb-5" data-i18n="error_404_title">
      <?php esc_html_e('صفحه مورد نظر یافت نشد', 'rahnab'); ?>
    </h1>

    <!-- Description -->
    <p class="text-xs sm:text-sm md:text-base text-slate-300 max-w-xl mx-auto leading-relaxed text-center mb-8" data-i18n="error_404_desc">
      <?php esc_html_e('متأسفانه صفحه‌ای که به دنبال آن بودید تغییر مکان داده، حذف شده یا آدرس آن به اشتباه وارد شده است.', 'rahnab'); ?>
    </p>

    <!-- Search Box -->
    <div class="max-w-md mx-auto mb-10">
      <form action="<?php echo esc_url(home_url('/')); ?>" method="GET" class="relative flex items-center">
        <input type="text" name="s" required
               class="w-full px-5 py-3.5 pe-28 rounded-full bg-white/[0.04] border border-white/10 focus:border-gold-400 focus:bg-white/[0.08] text-white text-xs sm:text-sm transition-all placeholder:text-slate-500 outline-none"
               placeholder="<?php esc_attr_e('جستجو در تارنمای هلدینگ...', 'rahnab'); ?>" data-i18n-placeholder="error_404_search_ph">
        <button type="submit"
                class="absolute right-1.5 rtl:right-auto rtl:left-1.5 px-4 sm:px-5 py-2 rounded-full bg-gold-400 text-black text-xs font-bold hover:bg-gold-300 transition-colors">
          <span data-i18n="search_btn"><?php esc_html_e('جستجو', 'rahnab'); ?></span>
        </button>
      </form>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-center gap-4 flex-wrap">
      <a href="<?php echo esc_url(home_url('/')); ?>"
         class="btn-primary px-7 py-3.5 rounded-full font-bold text-xs sm:text-sm inline-flex items-center justify-center gap-2">
        <span class="transform rtl:rotate-180">←</span>
        <span data-i18n="error_404_btn_home"><?php esc_html_e('بازگشت به صفحه اصلی', 'rahnab'); ?></span>
      </a>

      <a href="<?php echo esc_url(home_url('/contact/')); ?>"
         class="px-7 py-3.5 rounded-full font-bold text-xs sm:text-sm text-slate-300 hover:text-white bg-white/5 hover:bg-white/10 border border-white/10 hover:border-gold-400/40 transition-all inline-flex items-center justify-center gap-2">
        <span data-i18n="error_404_btn_contact"><?php esc_html_e('ارتباط با ما', 'rahnab'); ?></span>
      </a>
    </div>

  </div>
</main>

<?php
get_footer();
