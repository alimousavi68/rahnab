<?php
/**
 * Fullscreen Cinematic Nav Menu Template Part
 * منوی تمام‌صفحه سینمایی با ناوبری ۶گانه و زیرمنوی تعاملی ۶ شرکت
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

$is_home_page = is_front_page() || is_home();

$nav_links = [
    'home' => [
        'num'   => '01',
        'title' => __('صفحه اصلی', 'rahnab'),
        'i18n'  => 'nav_home',
        'url'   => $is_home_page ? '#hero' : home_url('/'),
    ],
    'about' => [
        'num'   => '02',
        'title' => __('درباره رهناب', 'rahnab'),
        'i18n'  => 'nav_about',
        'url'   => home_url('/about/'),
    ],
    'services' => [
        'num'   => '03',
        'title' => __('خدمات و توانمندی‌ها', 'rahnab'),
        'i18n'  => 'nav_services',
        'url'   => home_url('/services/'),
    ],
    'companies' => [
        'num'   => '04',
        'title' => __('شرکت‌های زیرمجموعه', 'rahnab'),
        'i18n'  => 'nav_companies',
        'url'   => home_url('/companies/'),
        'has_sub' => true,
    ],
    'news' => [
        'num'   => '05',
        'title' => __('اخبار و رویدادها', 'rahnab'),
        'i18n'  => 'nav_news',
        'url'   => home_url('/news/'),
    ],
    'contact' => [
        'num'   => '06',
        'title' => __('تماس با ما', 'rahnab'),
        'i18n'  => 'nav_contact',
        'url'   => home_url('/contact/'),
    ],
];
?>
<!-- =========================================
     FULL-SCREEN CINEMATIC NAV MENU
     ========================================= -->
<nav id="fullNavMenu" aria-label="<?php esc_attr_e('منوی اصلی هلدینگ', 'rahnab'); ?>"
  class="navmenu fixed inset-0 z-[60] bg-[#05070B]/98 backdrop-blur-2xl hidden opacity-0 transition-opacity duration-300 flex flex-col justify-between pt-24 sm:pt-28 lg:pt-32 pb-8 px-6 sm:px-12 lg:px-16 overflow-y-auto">
  <!-- Menu Content (2-Column Asymmetric Grid) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center my-auto py-6">
    <!-- Main Links (01 to 06) -->
    <div class="lg:col-span-8 flex flex-col">
      <!-- Holding category tag -->
      <div class="mb-4 sm:mb-6">
        <span class="text-xs uppercase tracking-widest text-gold-400 font-mono font-bold"
          data-i18n="nav_holding_tag"><?php esc_html_e('هلدینگ سرمایه‌گذاری رهناب فارمد', 'rahnab'); ?></span>
      </div>
      <ul class="navmenu-list flex flex-col gap-1.5 sm:gap-2">
        <?php foreach ($nav_links as $key => $link): 
            $is_current = (is_front_page() && $key === 'home') || (is_page($key));
            $link_class = $is_current 
                ? 'text-gold-400 font-black' 
                : 'text-white hover:text-gold-400';
        ?>
        <li class="navmenu-item group <?php echo $is_current ? 'is-active-item' : ''; ?>">
          <?php if (!empty($link['has_sub'])): ?>
            <div class="flex items-center justify-between w-full">
              <a href="<?php echo esc_url($link['url']); ?>"
                class="navmenu-link flex-1 flex items-center gap-4 sm:gap-6 py-1 <?php echo esc_attr($link_class); ?> transition-all">
                <span class="navmenu-num font-en-mono text-xs sm:text-sm text-gold-400/70 tracking-wider"><?php echo esc_html($link['num']); ?></span>
                <span class="navmenu-title text-xl sm:text-3xl lg:text-4xl font-black tracking-tight"
                  data-i18n="<?php echo esc_attr($link['i18n']); ?>"><?php echo esc_html($link['title']); ?></span>
                <?php if ($is_current): ?>
                  <span class="ms-3 text-[10px] font-mono px-2 py-0.5 rounded-full bg-gold-400/15 text-gold-300 border border-gold-400/30" data-i18n="nav_current_page"><?php esc_html_e('صفحه کنونی', 'rahnab'); ?></span>
                <?php endif; ?>
                <svg class="navmenu-arrow w-5 h-5 text-gold-400 opacity-0 hidden sm:inline-block ms-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </a>
              <!-- Interactive Submenu Toggle -->
              <button type="button" id="submenuToggleBtn" class="submenu-toggle-btn px-2.5 sm:px-3 py-1.5 rounded-xl border border-white/10 hover:border-gold-400/40 hover:bg-gold-400/10 text-gold-400 transition-all flex items-center gap-1.5 sm:gap-2 shrink-0 ms-2"
                aria-expanded="false" aria-label="<?php esc_attr_e('نمایش شرکت‌های زیرمجموعه', 'rahnab'); ?>">
                <span id="submenuToggleText" class="text-[11px] font-mono font-bold text-gold-400/80 transition-colors" data-i18n="nav_sub_toggle_label"><?php esc_html_e('مشاهده ۶ شرکت', 'rahnab'); ?></span>
                <svg class="w-3.5 h-3.5 transform transition-transform duration-300 submenu-chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
              </button>
            </div>
            <!-- Submenu Accordion (Subsidiaries) -->
            <div id="navmenuSubmenu" class="navmenu-submenu hidden max-h-0 overflow-hidden transition-all duration-300 ps-6 sm:ps-12 pe-2">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2.5 pb-1 border-t border-white/10 mt-1">
                <a href="<?php echo esc_url(home_url('/companies/#company-nojin')); ?>" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_rasta"><?php esc_html_e('نوژین زیست فارمد', 'rahnab'); ?></span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_rasta_desc"><?php esc_html_e('واکسن‌های دامی و طیور', 'rahnab'); ?></span>
                  </div>
                </a>
                <a href="<?php echo esc_url(home_url('/companies/#company-tamin-plasma')); ?>" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_sinagene"><?php esc_html_e('تأمین پلاسما نوژین', 'rahnab'); ?></span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_sinagene_desc"><?php esc_html_e('فرآورده‌های مشتق از پلاسما', 'rahnab'); ?></span>
                  </div>
                </a>
                <a href="<?php echo esc_url(home_url('/companies/#company-persis')); ?>" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_pishgaman"><?php esc_html_e('پرسیس ژن', 'rahnab'); ?></span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_pishgaman_desc"><?php esc_html_e('شتاب‌دهنده زیست‌دارویی', 'rahnab'); ?></span>
                  </div>
                </a>
                <a href="<?php echo esc_url(home_url('/companies/#company-arc')); ?>" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_plasma"><?php esc_html_e('آرک زیست آزما', 'rahnab'); ?></span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_plasma_desc"><?php esc_html_e('آزمایشگاه کنترل کیفی بیولوژیک', 'rahnab'); ?></span>
                  </div>
                </a>
                <a href="<?php echo esc_url(home_url('/companies/#company-padra')); ?>" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_partgene"><?php esc_html_e('پادرا سرم البرز', 'rahnab'); ?></span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_partgene_desc"><?php esc_html_e('سرم‌های ایمنی و پادزهرها', 'rahnab'); ?></span>
                  </div>
                </a>
                <a href="<?php echo esc_url(home_url('/companies/#company-karayakhte')); ?>" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_pharmazist"><?php esc_html_e('کارا یاخته تجهیز آزما', 'rahnab'); ?></span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_pharmazist_desc"><?php esc_html_e('بیوراکتورها و تجهیزات صنعتی', 'rahnab'); ?></span>
                  </div>
                </a>
              </div>
            </div>
          <?php else: ?>
            <a href="<?php echo esc_url($link['url']); ?>"
              class="navmenu-link flex items-center gap-4 sm:gap-6 py-1 <?php echo esc_attr($link_class); ?> transition-all">
              <span class="navmenu-num font-en-mono text-xs sm:text-sm text-gold-400/70 tracking-wider"><?php echo esc_html($link['num']); ?></span>
              <span class="navmenu-title text-xl sm:text-3xl lg:text-4xl font-black tracking-tight"
                data-i18n="<?php echo esc_attr($link['i18n']); ?>"><?php echo esc_html($link['title']); ?></span>
              <?php if ($is_current): ?>
                <span class="ms-3 text-[10px] font-medium px-2 py-0.5 rounded-full bg-gold-400/15 text-gold-300 border border-gold-400/30" data-i18n="nav_current_page"><?php esc_html_e('صفحه کنونی', 'rahnab'); ?></span>
              <?php endif; ?>
              <svg class="navmenu-arrow w-5 h-5 text-gold-400 opacity-0 hidden sm:inline-block ms-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
              </svg>
            </a>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <!-- Side Info / Holding Passport -->
    <div class="lg:col-span-4 flex flex-col gap-6 lg:border-s border-white/10 lg:ps-10">
      <div>
        <p class="nav-info-label text-xs uppercase text-slate-500 mb-1" data-i18n="nav_info_hq"><?php esc_html_e('دفتر مرکزی', 'rahnab'); ?></p>
        <p class="text-sm text-slate-300 leading-relaxed" data-i18n="nav_info_address"><?php esc_html_e('تهران، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری (NIGEB)', 'rahnab'); ?></p>
      </div>
      <div>
        <p class="nav-info-label text-xs uppercase text-slate-500 mb-1" data-i18n="nav_info_direct"><?php esc_html_e('ارتباط مستقیم', 'rahnab'); ?></p>
        <a href="tel:+982144787260"
          class="text-base font-bold text-gold-400 hover:text-gold-300 transition-colors inline-block dir-ltr text-start" dir="ltr">
          <span data-i18n="nav_info_phone">۰۲۱۴۴۷۸۷۲۶۰</span>
        </a>
        <a href="mailto:info@rahnab.com"
          class="text-sm font-en-mono text-slate-400 hover:text-white transition-colors block mt-0.5 dir-ltr text-start" dir="ltr">info@rahnab.com</a>
      </div>
      <div class="pt-2">
        <a href="<?php echo esc_url(home_url('/contact/')); ?>"
          class="text-xs font-bold px-4 py-2 rounded-full border border-gold-400/40 text-gold-400 hover:bg-gold-400/10 transition-all inline-flex items-center gap-2">
          <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-ping"></span>
          <span data-i18n="nav_cta_cooperation"><?php esc_html_e('ارتباط و همکاری با هلدینگ', 'rahnab'); ?></span>
        </a>
      </div>
    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="border-t border-white/10 pt-4 flex items-center justify-between text-[11px] font-mono text-slate-500">
    <span>© 2026 RAHNAB PHARMED HOLDING</span>
    <span class="hidden sm:inline text-gold-400/80 font-bold tracking-wider" data-i18n="nav_menu_close_hint"><?php esc_html_e('کلید ESC برای بستن', 'rahnab'); ?></span>
  </div>
</nav>
