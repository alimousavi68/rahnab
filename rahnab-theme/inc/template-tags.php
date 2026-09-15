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

if (!function_exists('rahnab_get_meta')) {
    /**
     * Safe post meta retriever with fallback default.
     */
    function rahnab_get_meta($post_id, $key, $default = '') {
        $val = get_post_meta($post_id, $key, true);
        return (!empty($val) || $val === '0') ? $val : $default;
    }
}

if (!function_exists('rahnab_get_company_logo')) {
    /**
     * Resolves company logo URL with smart fallback.
     */
    function rahnab_get_company_logo($post_id, $index = 1) {
        $custom_logo = get_post_meta($post_id, '_company_logo_custom', true);
        if (!empty($custom_logo)) {
            if (filter_var($custom_logo, FILTER_VALIDATE_URL)) {
                return $custom_logo;
            }
            return RAHNAB_URI . '/' . ltrim($custom_logo, '/');
        }

        $thumb = get_the_post_thumbnail_url($post_id, 'full');
        if (!empty($thumb)) {
            return $thumb;
        }

        $post_name = get_post_field('post_name', $post_id);
        $logos_by_slug = [
            'company-nojin'        => 'assets/images/subsidiaries/nojin_logo.webp',
            'company-tamin-plasma' => 'assets/images/subsidiaries/logo-tamin-plasma.svg',
            'company-persis'       => 'assets/images/subsidiaries/logo-persisgen.png',
            'company-arc'          => 'assets/images/subsidiaries/logo-arc.png',
            'company-padra'        => 'assets/images/subsidiaries/padra-serum-logo-who-Final-PNG-1.png',
            'company-karayakhte'   => 'assets/images/subsidiaries/logo-karayakhte.webp',
        ];

        if (isset($logos_by_slug[$post_name])) {
            return RAHNAB_URI . '/' . $logos_by_slug[$post_name];
        }

        $fallback_logos = [
            1 => 'assets/images/subsidiaries/nojin_logo.webp',
            2 => 'assets/images/subsidiaries/logo-tamin-plasma.svg',
            3 => 'assets/images/subsidiaries/logo-persisgen.png',
            4 => 'assets/images/subsidiaries/logo-arc.png',
            5 => 'assets/images/subsidiaries/padra-serum-logo-who-Final-PNG-1.png',
            6 => 'assets/images/subsidiaries/logo-karayakhte.webp',
        ];

        $logo_file = isset($fallback_logos[$index]) ? $fallback_logos[$index] : 'assets/images/logo_rahnab.png';
        return RAHNAB_URI . '/' . $logo_file;
    }
}

if (!function_exists('rahnab_get_service_icon')) {
    /**
     * Resolves service icon SVG URL with fallback.
     */
    function rahnab_get_service_icon($post_id, $index = 1) {
        $custom_icon = get_post_meta($post_id, '_service_icon', true);
        if (!empty($custom_icon)) {
            if (filter_var($custom_icon, FILTER_VALIDATE_URL)) {
                return $custom_icon;
            }
            if (strpos($custom_icon, 'assets/') !== false) {
                return RAHNAB_URI . '/' . ltrim($custom_icon, '/');
            }
            return RAHNAB_URI . '/assets/icons/services/' . ltrim($custom_icon, '/');
        }

        $fallback_icons = [
            1 => 'service-veterinary-vaccines.svg',
            2 => 'service-pediatric-pharma.svg',
            3 => 'service-nutraceuticals.svg',
            4 => 'service-biological-dressings.svg',
            5 => 'service-plasma-therapy.svg',
            6 => 'service-vaccine-adjuvants.svg',
        ];

        $icon_file = isset($fallback_icons[$index]) ? $fallback_icons[$index] : 'service-plasma-therapy.svg';
        return RAHNAB_URI . '/assets/icons/services/' . $icon_file;
    }
}

if (!function_exists('rahnab_get_news_image')) {
    /**
     * Resolves news image URL with fallback.
     */
    function rahnab_get_news_image($post_id, $index = 1) {
        $thumb = get_the_post_thumbnail_url($post_id, 'full');
        if (!empty($thumb)) {
            return $thumb;
        }

        $post_name = get_post_field('post_name', $post_id);
        $images_by_slug = [
            'nozhin-plasma-refinery-expansion'      => 'assets/images/news-plasma-refinery.jpg',
            'car-t-clinical-trial-success'          => 'assets/images/news-cart-celltherapy.jpg',
            'padra-serum-national-antivenom-supply' => 'assets/images/news-antivenom-lab.jpg',
            'arc-zist-iso-17025-accreditation'      => 'assets/images/about-cleanroom.jpg',
            'persis-gene-new-cohort-acceleration'   => 'assets/images/news-cart.jpg',
            'tamin-plasma-alborz-center-opening'    => 'assets/images/news-refinery.jpg',
            'nozhin-nano-adjuvants-breakthrough'    => 'assets/images/news-antivenom.jpg',
        ];

        if (isset($images_by_slug[$post_name])) {
            return RAHNAB_URI . '/' . $images_by_slug[$post_name];
        }

        $fallback_images = [
            1 => 'assets/images/news-plasma-refinery.jpg',
            2 => 'assets/images/news-cart-celltherapy.jpg',
            3 => 'assets/images/news-antivenom-lab.jpg',
            4 => 'assets/images/about-cleanroom.jpg',
            5 => 'assets/images/news-cart.jpg',
            6 => 'assets/images/news-refinery.jpg',
            7 => 'assets/images/news-antivenom.jpg',
        ];

        $img_file = isset($fallback_images[$index]) ? $fallback_images[$index] : 'assets/images/news-plasma-refinery.jpg';
        return RAHNAB_URI . '/' . $img_file;
    }
}

