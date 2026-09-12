<?php
/**
 * Header Template Part
 * هدر مشترک، استایل‌ها، متادیتا و نوار ناوبری متناسب‌شده با صفحات اصلی و داخلی
 *
 * @var string $page_title
 * @var string $page_desc
 * @var bool   $is_home
 * @var string $active_page
 */

$page_title  = $page_title ?? 'هلدینگ سرمایه‌گذاری رهناب فارمد | Rahnab Pharmed Investment Holding';
$page_desc   = $page_desc  ?? 'پیشگام حاکمیت زیست‌فناوری، پالایشگاه صنعتی پلاسما، ایمونوتراپی سلولی و داروهای با فناوری بالا در جمهوری اسلامی ایران.';
$is_home     = isset($is_home) ? (bool)$is_home : true;
$active_page = $active_page ?? ($is_home ? 'home' : '');

$logo_href   = $is_home ? '#hero' : 'index.php';
$navbar_extra_classes = $is_home 
    ? 'navbar--home' 
    : 'navbar--interior bg-[#05070B]/85 backdrop-blur-xl border-b border-white/10 shadow-[0_4px_30px_rgba(0,0,0,0.5)]';
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title><?php echo htmlspecialchars($page_title, ENT_QUOTES, 'UTF-8'); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($page_desc, ENT_QUOTES, 'UTF-8'); ?>">

  <!-- Google Fonts: Inter (Sans), Cormorant Garamond (Editorial & Stats Serif), JetBrains Mono (Tech), Outfit (Display) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=JetBrains+Mono:wght@300;400;500;600&family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Design Tokens & Styles -->
  <link rel="stylesheet" href="css/tokens.css">
  <link rel="stylesheet" href="css/styles.css">

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            obsidian: '#05070B',
            bionavy: '#0A0E17',
            substrate: '#101522',
            elevated: '#161D2E',
            gold: {
              300: '#F3D3A2',
              400: '#E5B887',
              500: '#D4AF37',
              600: '#B89028',
              700: '#8C6D18'
            },
            amber: {
              300: '#FDE68A',
              400: '#FBBF24',
              500: '#F59E0B'
            },
            azure: {
              300: '#F3D3A2',
              400: '#E5B887',
              500: '#D4AF37',
              600: '#B89028'
            }
          },
          fontFamily: {
            'fa-display': ['Peyda', 'Abar', 'IRANYekanX', 'system-ui', 'sans-serif'],
            'fa-body': ['Peyda', 'IRANYekanX', 'Abar', 'system-ui', 'sans-serif'],
            'en-sans': ['Inter', 'system-ui', 'sans-serif'],
            'en-serif': ['Cormorant Garamond', 'Georgia', 'serif'],
            'en-mono': ['JetBrains Mono', 'monospace'],
            'outfit': ['Outfit', 'sans-serif'],
            'inter': ['Inter', 'sans-serif'],
            'en-display': ['Outfit', 'Inter', 'system-ui', 'sans-serif'],
            'en-body': ['Inter', 'system-ui', 'sans-serif'],
            'serif-stat': ['Cormorant Garamond', 'Georgia', 'serif']
          }
        }
      }
    }
  </script>

  <!-- GSAP & ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
</head>

<body class="bg-[#05070B] text-[#FDF8F0] selection:bg-gold-400 selection:text-black font-fa-display antialiased">

  <!-- =========================================
       NAVBAR — Edge-to-Edge Luxury Minimalist
       ========================================= -->
  <header id="mainNavbar"
    class="navbar fixed top-0 left-0 w-full z-50 px-6 sm:px-10 lg:px-16 py-5 sm:py-6 flex items-center justify-between pointer-events-none transition-all duration-300 <?php echo $navbar_extra_classes; ?>">
    <!-- Left: Free-Standing Holding Logo with Glass Reflection Effect -->
    <a href="<?php echo $logo_href; ?>" class="logo-shimmer-wrapper relative flex items-center group pointer-events-auto shrink-0 transition-transform duration-300 hover:scale-105"
      aria-label="Rahnab Pharmed">
      <img id="mainLogoImg" src="assets/images/logo_rahnab.png" alt="Rahnab Pharmed"
        class="logo-entrance h-9 sm:h-11 md:h-14 lg:h-[54px] w-auto object-contain filter drop-shadow-[0_0_20px_rgba(229,184,135,0.4)]">
      <canvas id="logoShimmerCanvas" class="pointer-events-none absolute inset-0 w-full h-full"></canvas>
    </a>

    <!-- Right: Actions (Locale Switcher FA|EN + Animated Menu Toggle Box) -->
    <div class="navbar__actions flex items-center gap-4 sm:gap-6 pointer-events-auto">
      <!-- Minimalist Locale Switcher -->
      <div class="locale-switcher flex items-center gap-1 text-xs font-mono font-bold tracking-wider">
        <button id="langFaBtn"
          class="locale-switcher__item is-active px-2 py-1 rounded transition-all text-white border border-white/40 bg-white/10"
          aria-label="Farsi">
          <span>FA</span>
        </button>
        <span class="text-white/20 select-none text-[10px]">/</span>
        <button id="langEnBtn"
          class="locale-switcher__item px-2 py-1 rounded transition-all text-slate-400 hover:text-white border border-transparent"
          aria-label="English">
          <span>EN</span>
        </button>
      </div>

      <!-- Dashed Box Menu Toggle Button -->
      <button id="navbarMenuToggle" aria-label="Toggle Menu" aria-expanded="false"
        class="navbar__toggle group flex items-center gap-2.5 sm:gap-3 cursor-pointer select-none focus:outline-none">
        <span id="menuToggleLabel"
          class="navbar__toggle-label text-[11px] sm:text-xs uppercase tracking-widest font-bold text-gold-400 group-hover:text-gold-300 transition-colors"
          data-i18n="nav_menu_label">منو</span>
        <div
          class="navbar__toggle-box w-9 h-9 sm:w-10 sm:h-10 border border-dashed border-white/40 group-hover:border-gold-400/80 rounded-md relative flex items-center justify-center transition-all bg-black/40 backdrop-blur-md">
          <!-- Open icon (3 micro-bars: 2 white, 1 gold accent) -->
          <div
            class="toggle-icon-open flex flex-col justify-center items-end gap-1 w-4 sm:w-4.5 transition-all duration-300">
            <span class="w-full h-0.5 bg-white rounded-full transition-transform"></span>
            <span class="w-full h-0.5 bg-white rounded-full transition-transform"></span>
            <span class="w-2 h-0.5 bg-gold-400 rounded-full transition-all group-hover:w-full"></span>
          </div>
          <!-- Close icon (X) -->
          <div
            class="toggle-icon-close absolute inset-0 flex items-center justify-center opacity-0 scale-75 transition-all duration-300">
            <svg class="w-4 h-4 text-gold-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>
      </button>
    </div>
  </header>
