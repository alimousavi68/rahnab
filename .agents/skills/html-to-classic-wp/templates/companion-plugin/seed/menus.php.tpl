<?php
/**
 * Modular Seed Architecture - Menus Worker
 *
 * Creates prototype navigation menus and assigns them to theme locations idempotently.
 *
 * @package {{PLUGIN_SLUG}}
 */

defined('ABSPATH') || exit;

class {{UPPER_PLUGIN_SLUG}}_Seed_Menus {

    public static function seed() {
        $menu_name = 'Primary Navigation';
        $menu_exists = wp_get_nav_menu_object($menu_name);

        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_name);

            if (is_wp_error($menu_id)) {
                return ['status' => 'error', 'message' => $menu_id->get_error_message()];
            }

            // Link pages to menu
            $links = [
                'Home'    => home_url('/'),
                'About'   => home_url('/about/'),
                'Blog'    => home_url('/blog/'),
                'Contact' => home_url('/contact/'),
            ];

            $order = 1;
            foreach ($links as $title => $url) {
                wp_update_nav_menu_item($menu_id, 0, [
                    'menu-item-title'  => $title,
                    'menu-item-url'    => $url,
                    'menu-item-status' => 'publish',
                    'menu-item-type'   => 'custom',
                    'menu-item-order'  => $order++,
                ]);
            }

            // Assign menu to theme location
            $locations = get_theme_mod('nav_menu_locations');
            if (!is_array($locations)) {
                $locations = [];
            }
            $locations['primary-menu'] = $menu_id;
            set_theme_mod('nav_menu_locations', $locations);

            return ['status' => 'created', 'menu_id' => $menu_id];
        }

        return ['status' => 'skipped', 'message' => 'Primary Navigation menu already exists.'];
    }
}
