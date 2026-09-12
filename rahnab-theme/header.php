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
    
    <!-- Left: Holding Logo with Glass Reflection Effect -->
    <div class="header__logo-wrapper pointer-events-auto">
        <?php rahnab_the_custom_logo(); ?>
    </div>

    <!-- Right: Actions (Locale Switcher FA|EN + Animated Menu Toggle Box) -->
    <div class="navbar__actions flex items-center gap-4 sm:gap-6 pointer-events-auto">
      <!-- Minimalist Locale Switcher (davidecattaneo.it text toggle) -->
      <div class="locale-switcher flex items-center gap-1 text-xs font-mono font-bold tracking-wider">
        <button id="langFaBtn"
          class="lang-btn px-2.5 py-1 rounded-md transition-all text-gold-400 bg-gold-400/10 border border-gold-400/30"
          data-lang="fa" aria-label="زبان فارسی">FA</button>
        <span class="text-white/20 select-none">/</span>
        <button id="langEnBtn" class="lang-btn px-2.5 py-1 rounded-md transition-all text-slate-400 hover:text-white"
          data-lang="en" aria-label="English Language">EN</button>
      </div>

      <!-- Animated Hamburger Menu Button (Editorial Framed Style) -->
      <button id="navbarMenuToggle"
        class="menu-toggle-editorial group flex items-center gap-3 px-3 sm:px-4 py-2 rounded-xl border border-white/10 hover:border-gold-400/40 bg-white/[0.02] hover:bg-gold-400/10 transition-all duration-300"
        aria-label="<?php esc_attr_e('منوی سایت', 'rahnab'); ?>" aria-expanded="false" aria-controls="fullNavMenu">
        <span id="menuToggleLabel"
          class="text-xs font-bold tracking-wider text-slate-300 group-hover:text-gold-300 transition-colors"
          data-i18n="nav_menu_label"><?php esc_html_e('منو', 'rahnab'); ?></span>
        <div class="hamburger-box w-5 h-4 relative flex flex-col justify-between">
          <span class="hamburger-line w-full h-[1.5px] bg-white group-hover:bg-gold-400 transition-all duration-300"></span>
          <span class="hamburger-line w-3/4 ms-auto h-[1.5px] bg-white group-hover:bg-gold-400 transition-all duration-300"></span>
          <span class="hamburger-line w-full h-[1.5px] bg-white group-hover:bg-gold-400 transition-all duration-300"></span>
        </div>
      </button>
    </div>
  </header>

  <?php get_template_part('template-parts/navigation/fullscreen-menu'); ?>
