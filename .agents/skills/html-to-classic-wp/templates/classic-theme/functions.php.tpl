<?php
/**
 * {{THEME_NAME}} functions and definitions
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;

define('{{UPPER_SLUG}}_VERSION', '1.0.0');
define('{{UPPER_SLUG}}_DIR', get_template_directory());
define('{{UPPER_SLUG}}_URI', get_template_directory_uri());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function {{THEME_SLUG}}_setup() {
    // Make theme available for translation.
    load_theme_textdomain('{{TEXT_DOMAIN}}', {{UPPER_SLUG}}_DIR . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title.
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');

    // Register navigation menus.
    register_nav_menus([
        'primary-menu' => esc_html__('Primary Navigation', '{{TEXT_DOMAIN}}'),
        'footer-menu'  => esc_html__('Footer Navigation', '{{TEXT_DOMAIN}}'),
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
    ]);

    // Align wide support for Gutenberg.
    add_theme_support('align-wide');

    // Responsive embedded content.
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', '{{THEME_SLUG}}_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function {{THEME_SLUG}}_content_width() {
    $GLOBALS['content_width'] = apply_filters('{{THEME_SLUG}}_content_width', 1200);
}
add_action('after_setup_theme', '{{THEME_SLUG}}_content_width', 0);

/**
 * Register widget area.
 */
function {{THEME_SLUG}}_widgets_init() {
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', '{{TEXT_DOMAIN}}'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here to appear in your blog sidebar.', '{{TEXT_DOMAIN}}'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);

    register_sidebar([
        'name'          => esc_html__('Footer Column 1', '{{TEXT_DOMAIN}}'),
        'id'            => 'footer-1',
        'description'   => esc_html__('First column in footer.', '{{TEXT_DOMAIN}}'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', '{{THEME_SLUG}}_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function {{THEME_SLUG}}_scripts() {
    // Theme stylesheet.
    wp_enqueue_style('{{THEME_SLUG}}-style', get_stylesheet_uri(), [], {{UPPER_SLUG}}_VERSION);

    // Vendor and custom scripts
    {{ENQUEUE_SCRIPTS_BLOCK}}

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', '{{THEME_SLUG}}_scripts');

/**
 * Modular includes
 */
$theme_includes = [
    '/inc/customizer.php',
    '/inc/template-tags.php',
    '/inc/patterns.php',
];

foreach ($theme_includes as $file) {
    if (file_exists({{UPPER_SLUG}}_DIR . $file)) {
        require_once {{UPPER_SLUG}}_DIR . $file;
    }
}
