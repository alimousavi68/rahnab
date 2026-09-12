<?php
/**
 * The header for Rahnab Pharmed theme
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

$is_home_page = is_front_page() || is_home();
$navbar_extra_classes = $is_home_page 
    ? 'navbar--home' 
    : 'navbar--interior bg-[#05070B]/85 backdrop-blur-xl border-b border-white/10 shadow-[0_4px_30px_rgba(0,0,0,0.5)]';
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <?php wp_head(); ?>
</head>

<body <?php body_class('bg-[#05070B] text-[#FDF8F0] selection:bg-gold-400 selection:text-black font-fa-display antialiased'); ?>>
<?php wp_body_open(); ?>

  <!-- Accessibility Skip Link -->
  <a class="skip-link screen-reader-text" href="#primary">
    <?php esc_html_e('پرش به محتوای اصلی (Skip to content)', 'rahnab'); ?>
  </a>

  <!-- =========================================
       NAVBAR — Edge-to-Edge Luxury Minimalist
       ========================================= -->
  <header id="mainNavbar"
    class="navbar fixed top-0 left-0 w-full z-50 px-6 sm:px-10 lg:px-16 py-6 sm:py-8 flex items-center justify-between pointer-events-none transition-all duration-300 <?php echo esc_attr($navbar_extra_classes); ?>">
    
    <!-- Left: Free-Standing Holding Logo with Glass Reflection Effect -->
    <?php rahnab_the_custom_logo(); ?>

    <!-- Right: Actions (Locale Switcher FA|EN + Animated Menu Toggle Box) -->
    <div class="navbar__actions flex items-center gap-4 sm:gap-6 pointer-events-auto">
      <!-- Minimalist Locale Switcher (davidecattaneo.it text toggle) -->
      <div class="locale-switcher flex items-center gap-1 text-xs font-mono font-bold tracking-wider">
        <button id="langFaBtn"
          class="locale-switcher__item is-active px-2 py-1 rounded transition-all text-white border border-white/40 bg-white/10"
          aria-label="<?php esc_attr_e('فارسی', 'rahnab'); ?>">
          <span>FA</span>
        </button>
        <span class="text-white/20 select-none text-[10px]">/</span>
        <button id="langEnBtn"
          class="locale-switcher__item px-2 py-1 rounded transition-all text-slate-400 hover:text-white border border-transparent"
          aria-label="<?php esc_attr_e('English', 'rahnab'); ?>">
          <span>EN</span>
        </button>
      </div>

      <!-- Dashed Box Menu Toggle Button -->
      <button id="navbarMenuToggle" aria-label="<?php esc_attr_e('منوی سایت', 'rahnab'); ?>" aria-expanded="false"
        class="navbar__toggle group flex items-center gap-2.5 sm:gap-3 cursor-pointer select-none focus:outline-none">
        <span id="menuToggleLabel"
          class="navbar__toggle-label text-[11px] sm:text-xs uppercase tracking-widest font-bold text-gold-400 group-hover:text-gold-300 transition-colors"
          data-i18n="nav_menu_label"><?php esc_html_e('منو', 'rahnab'); ?></span>
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

  <?php get_template_part('template-parts/navigation/fullscreen-menu'); ?>
