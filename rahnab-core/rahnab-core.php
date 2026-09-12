<?php
/**
 * Plugin Name:       Rahnab Pharmed Core
 * Plugin URI:        https://rahnab.com
 * Description:       Companion Core Plugin for Rahnab Pharmed Holding (Custom Post Types: Companies & Services, Taxonomies, and Business Logic).
 * Version:           1.0.0
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Rahnab Holding Engineering Team
 * Author URI:        https://rahnab.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       rahnab-core
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

define('RAHNAB_CORE_VERSION', '1.0.0');
define('RAHNAB_CORE_DIR', plugin_dir_path(__FILE__));
define('RAHNAB_CORE_URI', plugin_dir_url(__FILE__));

/**
 * Register Custom Post Types: Companies and Services.
 */
function rahnab_core_register_cpts() {
    // 1. CPT: Companies (شرکت‌های زیرمجموعه)
    $company_labels = [
        'name'                  => _x('شرکت‌های زیرمجموعه', 'Post type general name', 'rahnab-core'),
        'singular_name'         => _x('شرکت', 'Post type singular name', 'rahnab-core'),
        'menu_name'             => _x('شرکت‌های هلدینگ', 'Admin Menu text', 'rahnab-core'),
        'add_new'               => __('افزودن شرکت جدید', 'rahnab-core'),
        'add_new_item'          => __('افزودن شرکت جدید', 'rahnab-core'),
        'edit_item'             => __('ویرایش شرکت', 'rahnab-core'),
        'new_item'              => __('شرکت جدید', 'rahnab-core'),
        'view_item'             => __('مشاهده شرکت', 'rahnab-core'),
        'search_items'          => __('جستجوی شرکت‌ها', 'rahnab-core'),
        'not_found'             => __('هیچ شرکتی یافت نشد.', 'rahnab-core'),
        'not_found_in_trash'    => __('هیچ شرکتی در سطل زباله یافت نشد.', 'rahnab-core'),
        'all_items'             => __('همه شرکت‌ها', 'rahnab-core'),
    ];

    $company_args = [
        'labels'             => $company_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'holding-company'],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-building',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'show_in_rest'       => true,
    ];

    register_post_type('company', $company_args);

    // 2. CPT: Capabilities & Services (توانمندی‌ها و خدمات راهبردی)
    $service_labels = [
        'name'                  => _x('توانمندی‌ها و خدمات', 'Post type general name', 'rahnab-core'),
        'singular_name'         => _x('توانمندی', 'Post type singular name', 'rahnab-core'),
        'menu_name'             => _x('زنجیره توانمندی‌ها', 'Admin Menu text', 'rahnab-core'),
        'add_new'               => __('افزودن توانمندی جدید', 'rahnab-core'),
        'add_new_item'          => __('افزودن توانمندی جدید', 'rahnab-core'),
        'edit_item'             => __('ویرایش توانمندی', 'rahnab-core'),
        'new_item'              => __('توانمندی جدید', 'rahnab-core'),
        'view_item'             => __('مشاهده توانمندی', 'rahnab-core'),
        'search_items'          => __('جستجوی توانمندی‌ها', 'rahnab-core'),
        'not_found'             => __('هیچ موردی یافت نشد.', 'rahnab-core'),
        'not_found_in_trash'    => __('در سطل زباله یافت نشد.', 'rahnab-core'),
        'all_items'             => __('همه توانمندی‌ها', 'rahnab-core'),
    ];

    $service_args = [
        'labels'             => $service_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'capability'],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-networking',
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'show_in_rest'       => true,
    ];

    register_post_type('service', $service_args);
}
add_action('init', 'rahnab_core_register_cpts');

/**
 * Register Taxonomies
 */
function rahnab_core_register_taxonomies() {
    // Taxonomy: Company Sector
    register_taxonomy('company_sector', ['company'], [
        'labels' => [
            'name'          => __('حوزه تخصصی شرکت', 'rahnab-core'),
            'singular_name' => __('حوزه تخصصی', 'rahnab-core'),
        ],
        'public'            => true,
        'hierarchical'      => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'sector'],
    ]);
}
add_action('init', 'rahnab_core_register_taxonomies');

/**
 * Flush rewrite rules on activation and deactivation
 */
function rahnab_core_activate() {
    rahnab_core_register_cpts();
    rahnab_core_register_taxonomies();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'rahnab_core_activate');

function rahnab_core_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, 'rahnab_core_deactivate');
