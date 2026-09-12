<?php
/**
 * Custom template tags and rendering helpers for Rahnab Pharmed
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

if (!function_exists('rahnab_the_custom_logo')) {
    /**
     * Displays the custom logo or fallback to default holding logo.
     */
    function rahnab_the_custom_logo() {
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_url = '';
        if ($custom_logo_id) {
            $logo_data = wp_get_attachment_image_src($custom_logo_id, 'full');
            if (!empty($logo_data[0])) {
                $logo_url = $logo_data[0];
            }
        }
        if (!$logo_url) {
            $logo_url = RAHNAB_URI . '/assets/images/logo_rahnab.png';
        }
        ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-shimmer-wrapper relative flex items-center group pointer-events-auto shrink-0 transition-transform duration-300 hover:scale-105" aria-label="<?php bloginfo('name'); ?>">
            <img id="mainLogoImg" src="<?php echo esc_url($logo_url); ?>" alt="<?php bloginfo('name'); ?>"
                class="logo-entrance h-9 sm:h-11 md:h-14 lg:h-[58px] w-auto object-contain filter drop-shadow-[0_0_20px_rgba(229,184,135,0.4)]">
            <canvas id="logoShimmerCanvas" class="pointer-events-none absolute inset-0 w-full h-full"></canvas>
        </a>
        <?php
    }
}

if (!function_exists('rahnab_breadcrumbs')) {
    /**
     * Renders accessible breadcrumbs.
     *
     * @param string $current_title Title of current interior page.
     */
    function rahnab_breadcrumbs($current_title = '') {
        ?>
        <nav aria-label="<?php esc_attr_e('مسیریابی (Breadcrumbs)', 'rahnab'); ?>" class="mb-4">
            <ol class="flex items-center gap-2 text-xs font-fa-display text-slate-400">
                <li>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-gold-400 transition-colors">
                        <?php esc_html_e('صفحه اصلی', 'rahnab'); ?>
                    </a>
                </li>
                <li class="text-white/20 select-none">/</li>
                <li class="text-gold-400 font-bold" aria-current="page">
                    <?php echo esc_html($current_title ? $current_title : get_the_title()); ?>
                </li>
            </ol>
        </nav>
        <?php
    }
}
