<?php
/**
 * Modular Seed Architecture - Customizer Worker
 *
 * Populates default theme_mods (copyright, contact info, visual branding) non-destructively.
 *
 * @package {{PLUGIN_SLUG}}
 */

defined('ABSPATH') || exit;

class {{UPPER_PLUGIN_SLUG}}_Seed_Customizer {

    public static function seed() {
        $theme_slug = '{{THEME_SLUG}}';

        $default_mods = [
            $theme_slug . '_copyright_text' => sprintf(
                '© %s %s. All rights reserved.',
                date_i18n('Y'),
                get_bloginfo('name')
            ),
            $theme_slug . '_header_phone'   => '+1 (555) 123-4567',
            $theme_slug . '_header_email'   => 'hello@example.com',
        ];

        $updated = [];

        foreach ($default_mods as $key => $default_val) {
            $existing_val = get_theme_mod($key);
            // Non-destructive: Only set default if user has not set a custom value
            if (empty($existing_val)) {
                set_theme_mod($key, $default_val);
                $updated[$key] = $default_val;
            }
        }

        return [
            'status'  => 'complete',
            'updated' => $updated,
        ];
    }
}
