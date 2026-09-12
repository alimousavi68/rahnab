<?php
/**
 * Enqueue scripts and styles
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

if (!function_exists('rahnab_scripts')) {
    /**
     * Enqueue stylesheets and scripts cleanly.
     */
    function rahnab_scripts() {
        // 1. Google Fonts
        wp_enqueue_style(
            'rahnab-google-fonts',
            'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=JetBrains+Mono:wght@300;400;500;600&family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap',
            [],
            null
        );

        // 2. Design Tokens & Core Typography
        wp_enqueue_style(
            'rahnab-tokens',
            RAHNAB_URI . '/assets/css/tokens.css',
            ['rahnab-google-fonts'],
            RAHNAB_VERSION
        );

        // 3. Main Prototype Stylesheet (Obsidian Gold & Component Library)
        wp_enqueue_style(
            'rahnab-styles',
            RAHNAB_URI . '/assets/css/styles.css',
            ['rahnab-tokens'],
            RAHNAB_VERSION
        );

        // 4. WordPress Standard Stylesheet (style.css)
        wp_enqueue_style(
            'rahnab-theme-style',
            get_stylesheet_uri(),
            ['rahnab-styles'],
            RAHNAB_VERSION
        );

        // 5. Tailwind CSS Play CDN
        wp_enqueue_script(
            'tailwindcss',
            'https://cdn.tailwindcss.com',
            [],
            '3.4.0',
            false
        );

        // Inline Tailwind configuration
        $tailwind_config = "
        tailwind.config = {
          darkMode: 'class',
          theme: {
            extend: {
              colors: {
                obsidian: '#05070B',
                bionavy: '#0A0E17',
                substrate: '#101522',
                elevated: '#161D2E',
                gold: {
                  300: '#F3D3A2',
                  400: '#E5B887',
                  500: '#D4AF37',
                  600: '#B89028',
                  700: '#8C6D18'
                },
                amber: {
                  300: '#FDE68A',
                  400: '#FBBF24',
                  500: '#F59E0B'
                },
                azure: {
                  300: '#F3D3A2',
                  400: '#E5B887',
                  500: '#D4AF37',
                  600: '#B89028'
                }
              },
              fontFamily: {
                'fa-display': ['Peyda', 'Abar', 'IRANYekanX', 'system-ui', 'sans-serif'],
                'fa-body': ['Peyda', 'IRANYekanX', 'Abar', 'system-ui', 'sans-serif'],
                'en-sans': ['Inter', 'system-ui', 'sans-serif'],
                'en-serif': ['Cormorant Garamond', 'Georgia', 'serif'],
                'en-mono': ['JetBrains Mono', 'monospace'],
                'outfit': ['Outfit', 'sans-serif'],
                'inter': ['Inter', 'sans-serif'],
                'en-display': ['Outfit', 'Inter', 'system-ui', 'sans-serif'],
                'en-body': ['Inter', 'system-ui', 'sans-serif'],
                'serif-stat': ['Cormorant Garamond', 'Georgia', 'serif']
              }
            }
          }
        };
        ";
        wp_add_inline_script('tailwindcss', $tailwind_config);

        // 6. Animation Libraries (GSAP & ScrollTrigger - in Head like prototype)
        wp_enqueue_script(
            'gsap',
            'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js',
            [],
            '3.12.5',
            false
        );

        wp_enqueue_script(
            'gsap-scrolltrigger',
            'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js',
            ['gsap'],
            '3.12.5',
            false
        );

        // 7. Motion Orchestrator
        wp_enqueue_script(
            'rahnab-motion',
            RAHNAB_URI . '/assets/js/motion.js',
            ['gsap', 'gsap-scrolltrigger'],
            RAHNAB_VERSION,
            true
        );

        // 8. Front-page Video / Three Scene (if on front page)
        if (is_front_page() || is_home()) {
            wp_enqueue_script(
                'rahnab-three-scene',
                RAHNAB_URI . '/assets/js/three-scene.js',
                ['gsap'],
                RAHNAB_VERSION,
                true
            );
        }

        // 9. Core Application Script (i18n, drawer, modals, forms)
        wp_enqueue_script(
            'rahnab-app',
            RAHNAB_URI . '/assets/js/app.js',
            ['rahnab-motion'],
            RAHNAB_VERSION,
            true
        );

        // 10. Localize data for JavaScript
        $current_lang = is_rtl() ? 'fa' : 'en';
        if (function_exists('pll_current_language')) {
            $current_lang = pll_current_language();
        }

        wp_localize_script('rahnab-app', 'rahnabData', [
            'ajaxUrl'     => admin_url('admin-ajax.php'),
            'themeUri'    => RAHNAB_URI,
            'siteUrl'     => home_url('/'),
            'isRTL'       => is_rtl(),
            'currentLang' => $current_lang,
            'nonce'       => wp_create_nonce('rahnab_public_nonce'),
        ]);

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'rahnab_scripts');
