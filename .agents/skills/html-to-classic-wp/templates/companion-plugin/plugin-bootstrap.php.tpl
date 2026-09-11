<?php
/**
 * Plugin Name: {{PLUGIN_NAME}}
 * Plugin URI:  {{PLUGIN_URI}}
 * Description: Business logic, Custom Post Types, and seed data for the {{THEME_NAME}} theme.
 * Version:     1.0.0
 * Author:      {{AUTHOR}}
 * Author URI:  {{AUTHOR_URI}}
 * License:     GPL-2.0+
 * Text Domain: {{PLUGIN_SLUG}}
 * Domain Path: /languages
 *
 * @package {{PLUGIN_SLUG}}
 */

defined('ABSPATH') || exit;

define('{{UPPER_PLUGIN_SLUG}}_VERSION', '1.0.0');
define('{{UPPER_PLUGIN_SLUG}}_DIR', plugin_dir_path(__FILE__));
define('{{UPPER_PLUGIN_SLUG}}_URI', plugin_dir_url(__FILE__));

/**
 * Load Custom Post Types and Taxonomies
 */
require_once {{UPPER_PLUGIN_SLUG}}_DIR . 'includes/cpt.php';
require_once {{UPPER_PLUGIN_SLUG}}_DIR . 'includes/taxonomies.php';

/**
 * Load Modular Seed Architecture
 */
require_once {{UPPER_PLUGIN_SLUG}}_DIR . 'seed/seed-manager.php';

/**
 * Plugin Activation Hook
 */
function {{PLUGIN_SLUG}}_activate() {
    // Register CPTs and Taxonomies prior to flushing rewrite rules
    if (function_exists('{{PLUGIN_SLUG}}_register_cpts')) {
        {{PLUGIN_SLUG}}_register_cpts();
    }
    if (function_exists('{{PLUGIN_SLUG}}_register_taxonomies')) {
        {{PLUGIN_SLUG}}_register_taxonomies();
    }
    flush_rewrite_rules();

    // Trigger modular seed data initialization (Idempotent)
    if (class_exists('{{UPPER_PLUGIN_SLUG}}_Seed_Manager')) {
        {{UPPER_PLUGIN_SLUG}}_Seed_Manager::run();
    }
}
register_activation_hook(__FILE__, '{{PLUGIN_SLUG}}_activate');

/**
 * Plugin Deactivation Hook
 */
function {{PLUGIN_SLUG}}_deactivate() {
    flush_rewrite_rules();
}
register_deactivation_hook(__FILE__, '{{PLUGIN_SLUG}}_deactivate');
