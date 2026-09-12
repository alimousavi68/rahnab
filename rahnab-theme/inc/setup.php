<?php
/**
 * Theme Setup & Feature Registrations
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

if (!function_exists('rahnab_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     */
    function rahnab_setup() {
        // Make theme available for translation.
        load_theme_textdomain('rahnab', RAHNAB_DIR . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Let WordPress manage the document title.
        add_theme_support('title-tag');

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Image sizes
        set_post_thumbnail_size(1200, 675, true);
        add_image_size('rahnab-card', 600, 400, true);
        add_image_size('rahnab-featured', 1200, 630, true);

        // Register navigation menus.
        register_nav_menus([
            'primary-menu' => esc_html__('منوی اصلی هلدینگ (Primary Navigation)', 'rahnab'),
            'footer-menu'  => esc_html__('منوی فوتر (Footer Navigation)', 'rahnab'),
        ]);

        // Switch default core markup to output valid HTML5.
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        ]);

        // Custom logo support.
        add_theme_support('custom-logo', [
            'height'      => 80,
            'width'       => 240,
            'flex-width'  => true,
            'flex-height' => true,
            'unlink-homepage-logo' => false,
        ]);

        // Gutenberg Align Wide support.
        add_theme_support('align-wide');

        // Responsive embedded content.
        add_theme_support('responsive-embeds');
    }
}
add_action('after_setup_theme', 'rahnab_setup');

/**
 * Filter language attributes to ensure lang="fa" dir="rtl" for exact prototype parity.
 */
add_filter('language_attributes', function ($output) {
    if (is_rtl()) {
        return 'lang="fa" dir="rtl"';
    }
    return $output;
});

if (!function_exists('rahnab_content_width')) {
    /**
     * Set the content width in pixels, based on the theme design and layout.
     */
    function rahnab_content_width() {
        $GLOBALS['content_width'] = apply_filters('rahnab_content_width', 1280);
    }
}
add_action('after_setup_theme', 'rahnab_content_width', 0);
