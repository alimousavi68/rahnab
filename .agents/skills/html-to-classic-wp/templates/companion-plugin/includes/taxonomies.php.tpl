<?php
/**
 * Custom Taxonomy Registration
 *
 * @package {{PLUGIN_SLUG}}
 */

defined('ABSPATH') || exit;

function {{PLUGIN_SLUG}}_register_taxonomies() {
    $labels = [
        'name'              => _x('{{TAXONOMY_PLURAL_LABEL}}', 'taxonomy general name', '{{PLUGIN_SLUG}}'),
        'singular_name'     => _x('{{TAXONOMY_SINGULAR_LABEL}}', 'taxonomy singular name', '{{PLUGIN_SLUG}}'),
        'search_items'      => __('Search {{TAXONOMY_PLURAL_LABEL}}', '{{PLUGIN_SLUG}}'),
        'all_items'         => __('All {{TAXONOMY_PLURAL_LABEL}}', '{{PLUGIN_SLUG}}'),
        'parent_item'       => __('Parent {{TAXONOMY_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'parent_item_colon' => __('Parent {{TAXONOMY_SINGULAR_LABEL}}:', '{{PLUGIN_SLUG}}'),
        'edit_item'         => __('Edit {{TAXONOMY_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'update_item'       => __('Update {{TAXONOMY_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'add_new_item'      => __('Add New {{TAXONOMY_SINGULAR_LABEL}}', '{{PLUGIN_SLUG}}'),
        'new_item_name'     => __('New {{TAXONOMY_SINGULAR_LABEL}} Name', '{{PLUGIN_SLUG}}'),
        'menu_name'         => __('{{TAXONOMY_PLURAL_LABEL}}', '{{PLUGIN_SLUG}}'),
    ];

    $args = [
        'hierarchical'      => {{TAXONOMY_IS_HIERARCHICAL}}, // true for category-style, false for tag-style
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => '{{TAXONOMY_SLUG}}', 'with_front' => false],
    ];

    register_taxonomy('{{TAXONOMY_KEY}}', ['{{CPT_KEY}}'], $args);
}
add_action('init', '{{PLUGIN_SLUG}}_register_taxonomies');
