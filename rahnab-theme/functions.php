<?php
/**
 * Rahnab Pharmed functions and definitions
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

// Define theme core constants
define('RAHNAB_VERSION', '1.0.0');
define('RAHNAB_DIR', get_template_directory());
define('RAHNAB_URI', get_template_directory_uri());

/**
 * Modular architectural includes
 */
$rahnab_includes = [
    '/inc/setup.php',
    '/inc/enqueue.php',
    '/inc/template-tags.php',
    '/inc/customizer.php',
];

foreach ($rahnab_includes as $file) {
    $filepath = RAHNAB_DIR . $file;
    if (file_exists($filepath)) {
        require_once $filepath;
    }
}
