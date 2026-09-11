<?php
/**
 * The template for displaying the footer
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;
?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer {{FOOTER_CUSTOM_CLASSES}}">
        <?php if (is_active_sidebar('footer-1')) : ?>
            <div class="footer-widgets-area">
                <div class="container footer-widgets-grid">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="site-info">
            <div class="container footer-bottom-container">
                <div class="copyright-text">
                    <?php
                    $copyright = get_theme_mod('{{THEME_SLUG}}_copyright_text');
                    if ($copyright) :
                        echo wp_kses_post($copyright);
                    else :
                        printf(
                            /* translators: 1: Year, 2: Site Name */
                            esc_html__('© %1$s %2$s. All rights reserved.', '{{TEXT_DOMAIN}}'),
                            date_i18n('Y'),
                            get_bloginfo('name')
                        );
                    endif;
                    ?>
                </div><!-- .copyright-text -->

                <?php if (has_nav_menu('footer-menu')) : ?>
                    <nav class="footer-navigation" aria-label="<?php esc_attr_e('Footer Menu', '{{TEXT_DOMAIN}}'); ?>">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer-menu',
                            'depth'          => 1,
                            'container'      => false,
                            'menu_class'     => 'footer-menu',
                        ]);
                        ?>
                    </nav>
                <?php endif; ?>
            </div><!-- .container -->
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
