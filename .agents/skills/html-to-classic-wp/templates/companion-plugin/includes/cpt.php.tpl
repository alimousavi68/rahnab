<?php
/**
 * Custom Post Types Registration
 *
 * @package {{PLUGIN_SLUG}}
 */

defined('ABSPATH') || exit;

function {{PLUGIN_SLUG}}_register_cpts() {
    $labels = [
        'name'                  => _x('{{CPT_PLURAL_LABEL}}', 'Post type general name', '{{PLUGIN_SLUG}}'),
        'singular_name'         => _x('{{CPT_SINGULAR_LABEL}}', 'Post type singular name', '{{PLUGIN_SLUG}}'),
        'menu_name'             => _x('{{CPT_PLURAL_LABEL}}', 'Admin Menu text', '{{PLUGIN_SLUG}}'),
        'name_admin_bar'        => _x('{{CPT_SINGULAR_LABEL}}', 'Add New on Toolbar', '{{PLUGIN_SLUG}}'),
        'add_new'               => __('Add New', '{{PLUGIN_SLUG}}'),
        'add_new_item'          => __('Add New {{CPT_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'new_item'              => __('New {{CPT_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'edit_item'             => __('Edit {{CPT_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'view_item'             => __('View {{CPT_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'all_items'             => __('All {{CPT_PLURAL_LABEL}}', '{{PLUGIN_SLUG}}'),
        'search_items'          => __('Search {{CPT_PLURAL_LABEL}}', '{{PLUGIN_SLUG}}'),
        'parent_item_colon'     => __('Parent {{CPT_PLURAL_LABEL}}:', '{{PLUGIN_SLUG}}'),
        'not_found'             => __('No {{CPT_PLURAL_LABEL_LOWER}} found.', '{{PLUGIN_SLUG}}'),
        'not_found_in_trash'    => __('No {{CPT_PLURAL_LABEL_LOWER}} found in Trash.', '{{PLUGIN_SLUG}}'),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => '{{CPT_REWRITE_SLUG}}', 'with_front' => false],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => '{{CPT_MENU_ICON}}',
        'show_in_rest'       => true, // Enables Gutenberg and REST API
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
    ];

    register_post_type('{{CPT_KEY}}', $args);
}
add_action('init', '{{PLUGIN_SLUG}}_register_cpts');
