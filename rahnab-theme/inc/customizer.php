<?php
/**
 * WordPress Customizer Settings for Rahnab Pharmed Holding
 * مدیریت تنظیمات هلدینگ، اطلاعات تماس و شاخص‌های آماری
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

/**
 * Register Customizer Settings and Controls.
 */
function rahnab_customize_register($wp_customize) {
    // 1. Holding Settings Section
    $wp_customize->add_section('rahnab_holding_section', [
        'title'       => __('تنظیمات و اطلاعات هلدینگ رهناب', 'rahnab'),
        'description' => __('مدیریت اطلاعات رسمی، تماس‌ها و شاخص‌های آماری هلدینگ', 'rahnab'),
        'priority'    => 30,
    ]);

    // Setting: Direct Phone
    $wp_customize->add_setting('rahnab_phone', [
        'default'           => '۰۲۱۴۴۷۸۷۲۶۰',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('rahnab_phone', [
        'label'    => __('تلفن مستقیم هلدینگ', 'rahnab'),
        'section'  => 'rahnab_holding_section',
        'type'     => 'text',
    ]);

    // Setting: Official Email
    $wp_customize->add_setting('rahnab_email', [
        'default'           => 'info@rahnab.com',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('rahnab_email', [
        'label'    => __('ایمیل رسمی هلدینگ', 'rahnab'),
        'section'  => 'rahnab_holding_section',
        'type'     => 'email',
    ]);

    // Setting: Headquarters Address
    $wp_customize->add_setting('rahnab_address', [
        'default'           => 'تهران، پژوهشگاه ملی مهندسی ژنتیک و زیست‌فناوری (NIGEB)',
        'sanitize_callback' => 'sanitize_textarea_field',
    ]);
    $wp_customize->add_control('rahnab_address', [
        'label'    => __('نشانی دفتر مرکزی', 'rahnab'),
        'section'  => 'rahnab_holding_section',
        'type'     => 'textarea',
    ]);

    // Setting: Investment Stat Value
    $wp_customize->add_setting('rahnab_invest_val', [
        'default'           => '۲۰۰۰',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('rahnab_invest_val', [
        'label'    => __('ارزش سرمایه‌گذاری مصوب', 'rahnab'),
        'section'  => 'rahnab_holding_section',
        'type'     => 'text',
    ]);

    // Setting: Investment Stat Unit
    $wp_customize->add_setting('rahnab_invest_unit', [
        'default'           => 'میلیارد تومان',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('rahnab_invest_unit', [
        'label'    => __('واحد سرمایه‌گذاری (مثلاً میلیارد تومان)', 'rahnab'),
        'section'  => 'rahnab_holding_section',
        'type'     => 'text',
    ]);

    // Setting: LinkedIn URL
    $wp_customize->add_setting('rahnab_linkedin', [
        'default'           => 'https://www.linkedin.com/company/rahnab-pharmed',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('rahnab_linkedin', [
        'label'    => __('پیوند صفحه لینکدین هلدینگ', 'rahnab'),
        'section'  => 'rahnab_holding_section',
        'type'     => 'url',
    ]);
}
add_action('customize_register', 'rahnab_customize_register');

/**
 * Helper to fetch a theme setting with default fallback.
 */
function rahnab_get_option($key, $default = '') {
    return get_theme_mod($key, $default);
}
