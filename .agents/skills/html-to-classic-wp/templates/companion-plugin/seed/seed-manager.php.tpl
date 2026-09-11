<?php
/**
 * Modular Seed Architecture - Orchestrator / Manager
 *
 * Provides idempotent, repeatable, and non-destructive initialization of prototype demo data.
 *
 * @package {{PLUGIN_SLUG}}
 */

defined('ABSPATH') || exit;

class {{UPPER_PLUGIN_SLUG}}_Seed_Manager {

    const OPTION_KEY = '{{PLUGIN_SLUG}}_seed_installed_version';
    const SEED_VERSION = '1.0.0';

    /**
     * Run the full seeding pipeline if not already executed.
     *
     * @param bool $force Force re-run regardless of previous installation.
     * @return array Results summary
     */
    public static function run($force = false) {
        $installed_version = get_option(self::OPTION_KEY, false);

        if ($installed_version === self::SEED_VERSION && !$force) {
            return [
                'status'  => 'skipped',
                'message' => 'Seed data already initialized. Use force to re-run.',
            ];
        }

        $results = [
            'pages'      => self::load_and_run('pages.php', '{{UPPER_PLUGIN_SLUG}}_Seed_Pages'),
            'menus'      => self::load_and_run('menus.php', '{{UPPER_PLUGIN_SLUG}}_Seed_Menus'),
            'customizer' => self::load_and_run('customizer.php', '{{UPPER_PLUGIN_SLUG}}_Seed_Customizer'),
            'demo'       => self::load_and_run('demo-content.php', '{{UPPER_PLUGIN_SLUG}}_Seed_Demo_Content'),
        ];

        update_option(self::OPTION_KEY, self::SEED_VERSION);

        return [
            'status'  => 'success',
            'results' => $results,
        ];
    }

    /**
     * Helper to load modular seed worker class.
     */
    protected static function load_and_run($filename, $class_name) {
        $file_path = __DIR__ . '/' . $filename;
        if (file_exists($file_path)) {
            require_once $file_path;
            if (class_exists($class_name) && method_exists($class_name, 'seed')) {
                return call_user_func([$class_name, 'seed']);
            }
        }
        return ['status' => 'missing_module', 'file' => $filename];
    }
}
