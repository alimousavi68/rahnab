<?php
/**
 * Fullscreen Cinematic Nav Menu Template Part
 * منوی تمام‌صفحه با معماری ۲ستونه، مسیریابی هوشمند صفحات و نشانگر وضعیت فعال
 *
 * @var bool   $is_home
 * @var string $active_page
 */

$is_home     = isset($is_home) ? (bool)$is_home : true;
$active_page = $active_page ?? ($is_home ? 'home' : '');

$nav_links = [
    'home' => [
        'num'   => '01',
        'title' => 'صفحه اصلی',
        'i18n'  => 'nav_home',
        'url'   => $is_home ? '#hero' : 'index.php',
    ],
    'about' => [
        'num'   => '02',
        'title' => 'درباره رهناب',
        'i18n'  => 'nav_about',
        'url'   => 'about.php',
    ],
    'services' => [
        'num'   => '03',
        'title' => 'خدمات و توانمندی‌ها',
        'i18n'  => 'nav_services',
        'url'   => 'services.php',
    ],

    'companies' => [
        'num'   => '04',
        'title' => 'شرکت‌های زیرمجموعه',
        'i18n'  => 'nav_companies',
        'url'   => 'companies.php',
        'has_sub' => true,
    ],
    'news' => [
        'num'   => '05',
        'title' => 'اخبار و رویدادها',
        'i18n'  => 'nav_news',
        'url'   => 'news.php',
    ],
    'contact' => [
        'num'   => '06',
        'title' => 'تماس با ما',
        'i18n'  => 'nav_contact',
        'url'   => 'contact.php',
    ],
];
?>
<!-- =========================================
     FULL-SCREEN CINEMATIC NAV MENU
     ========================================= -->
<nav id="fullNavMenu" aria-label="Main menu"
  class="navmenu fixed inset-0 z-[60] bg-[#05070B]/98 backdrop-blur-2xl hidden opacity-0 transition-opacity duration-300 flex flex-col justify-between pt-24 sm:pt-28 lg:pt-32 pb-8 px-6 sm:px-12 lg:px-16 overflow-y-auto">
  <!-- Menu Content (2-Column Asymmetric Grid) -->
  <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-16 items-center my-auto py-6">
    <!-- Main Links (01 to 06) -->
    <div class="lg:col-span-8 flex flex-col">
      <!-- Holding category tag -->
      <div class="mb-4 sm:mb-6">
        <span class="text-xs uppercase tracking-widest text-gold-400 font-mono font-bold"
          data-i18n="nav_holding_tag">هلدینگ سرمایه‌گذاری رهناب فارمد</span>
      </div>
      <ul class="navmenu-list flex flex-col gap-1.5 sm:gap-2">
        <?php foreach ($nav_links as $key => $link): 
            $is_current = ($active_page === $key);
            $link_class = $is_current 
                ? 'text-gold-400 font-black' 
                : 'text-white hover:text-gold-400';
        ?>
        <li class="navmenu-item group <?php echo $is_current ? 'is-active-item' : ''; ?>">
          <?php if (!empty($link['has_sub'])): ?>
            <div class="flex items-center justify-between w-full">
              <a href="<?php echo $link['url']; ?>"
                class="navmenu-link flex-1 flex items-center gap-4 sm:gap-6 py-1 <?php echo $link_class; ?> transition-all">
                <span class="navmenu-num font-en-mono text-xs sm:text-sm text-gold-400/70 tracking-wider"><?php echo $link['num']; ?></span>
                <span class="navmenu-title text-xl sm:text-3xl lg:text-4xl font-black tracking-tight"
                  data-i18n="<?php echo $link['i18n']; ?>"><?php echo $link['title']; ?></span>
                <?php if ($is_current): ?>
                  <span class="ms-3 text-[10px] font-mono px-2 py-0.5 rounded-full bg-gold-400/15 text-gold-300 border border-gold-400/30" data-i18n="nav_current_page">صفحه کنونی</span>
                <?php endif; ?>
                <svg class="navmenu-arrow w-5 h-5 text-gold-400 opacity-0 hidden sm:inline-block ms-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </a>
              <!-- Interactive Submenu Toggle -->
              <button type="button" id="submenuToggleBtn" class="submenu-toggle-btn px-2.5 sm:px-3 py-1.5 rounded-xl border border-white/10 hover:border-gold-400/40 hover:bg-gold-400/10 text-gold-400 transition-all flex items-center gap-1.5 sm:gap-2 shrink-0 ms-2"
                aria-expanded="false" aria-label="نمایش شرکت‌های زیرمجموعه">
                <span id="submenuToggleText" class="text-[11px] font-mono font-bold text-gold-400/80 transition-colors" data-i18n="nav_sub_toggle_label">مشاهده ۶ شرکت</span>
                <svg class="w-3.5 h-3.5 transform transition-transform duration-300 submenu-chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
              </button>
            </div>
            <!-- Submenu Accordion (Subsidiaries) -->
            <div id="navmenuSubmenu" class="navmenu-submenu hidden max-h-0 overflow-hidden transition-all duration-300 ps-6 sm:ps-12 pe-2">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 pt-2.5 pb-1 border-t border-white/10 mt-1">
                <a href="companies.php#company-nojin" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_rasta">نوژین زیست فارمد</span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_rasta_desc">واکسن‌های دامی و طیور</span>
                  </div>
                </a>
                <a href="companies.php#company-tamin-plasma" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_sinagene">تأمین پلاسما نوژین</span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_sinagene_desc">فرآورده‌های مشتق از پلاسما</span>
                  </div>
                </a>
                <a href="companies.php#company-persis" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_pishgaman">پرسیس ژن</span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_pishgaman_desc">شتاب‌دهنده زیست‌دارویی</span>
                  </div>
                </a>
                <a href="companies.php#company-arc" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_plasma">آرک زیست آزما</span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_plasma_desc">آزمایشگاه کنترل کیفی بیولوژیک</span>
                  </div>
                </a>
                <a href="companies.php#company-padra" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_partgene">پادرا سرم البرز</span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_partgene_desc">سرم‌های ایمنی و پادزهرها</span>
                  </div>
                </a>
                <a href="companies.php#company-karayakhte" class="submenu-link nav-item flex items-center gap-2.5 p-2 rounded-lg bg-white/[0.02] hover:bg-gold-400/10 border border-white/5 hover:border-gold-400/30 transition-all">
                  <span class="submenu-dot w-1.5 h-1.5 rounded-full bg-gold-400 shrink-0 transition-transform duration-300"></span>
                  <div class="flex flex-col">
                    <span class="text-xs sm:text-sm font-bold text-slate-200 hover:text-gold-300 transition-colors" data-i18n="sub_pharmazist">کارا یاخته تجهیز آزما</span>
                    <span class="text-[10px] text-slate-400" data-i18n="sub_pharmazist_desc">بیوراکتورها و تجهیزات صنعتی</span>
                  </div>
                </a>
              </div>
            </div>
          <?php else: ?>
            <a href="<?php echo $link['url']; ?>"
              class="navmenu-link flex items-center gap-4 sm:gap-6 py-1 <?php echo $link_class; ?> transition-all">
              <span class="navmenu-num font-en-mono text-xs sm:text-sm text-gold-400/70 tracking-wider"><?php echo $link['num']; ?></span>
              <span class="navmenu-title text-xl sm:text-3xl lg:text-4xl font-black tracking-tight"
                data-i18n="<?php echo $link['i18n']; ?>"><?php echo $link['title']; ?></span>
              <?php if ($is_current): ?>
                <span class="ms-3 text-[10px] font-medium px-2 py-0.5 rounded-full bg-gold-400/15 text-gold-300 border border-gold-400/30" data-i18n="nav_current_page">صفحه کنونی</span>
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
        <p class="nav-info-label text-xs uppercase text-slate-500 mb-1" data-i18n="nav_info_hq">دفتر مرکزی</p>
        <p class="text-sm text-slate-300 leading-relaxed" data-i18n="nav_info_address">تهران، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری (NIGEB)</p>
      </div>
      <div>
        <p class="nav-info-label text-xs uppercase text-slate-500 mb-1" data-i18n="nav_info_direct">ارتباط مستقیم</p>
        <a href="tel:+982144787260"
          class="text-base font-bold text-gold-400 hover:text-gold-300 transition-colors inline-block dir-ltr text-start" dir="ltr">
          <span data-i18n="nav_info_phone">۰۲۱۴۴۷۸۷۲۶۰</span>
        </a>
        <a href="mailto:info@rahnab.com"
          class="text-sm font-en-mono text-slate-400 hover:text-white transition-colors block mt-0.5 dir-ltr text-start" dir="ltr">info@rahnab.com</a>
      </div>
      <div class="pt-2">
        <a href="contact.php"
          class="text-xs font-bold px-4 py-2 rounded-full border border-gold-400/40 text-gold-400 hover:bg-gold-400/10 transition-all inline-flex items-center gap-2">
          <span class="w-1.5 h-1.5 rounded-full bg-gold-400 animate-ping"></span>
          <span data-i18n="nav_cta_cooperation">ارتباط و همکاری با هلدینگ</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="border-t border-white/10 pt-4 flex items-center justify-between text-[11px] font-mono text-slate-500">
    <span>© 2026 RAHNAB PHARMED HOLDING</span>
    <span class="hidden sm:inline text-gold-400/80 font-bold tracking-wider" data-i18n="nav_menu_close_hint">کلید ESC برای بستن</span>
  </div>
</nav>
