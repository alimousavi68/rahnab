<?php
/**
 * The header for our theme
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site-wrapper">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Skip to content', '{{TEXT_DOMAIN}}'); ?>
    </a>

    <header id="masthead" class="site-header {{HEADER_CUSTOM_CLASSES}}">
        <div class="container header-container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) :
                    the_custom_logo();
                else :
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) :
                        ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                    <?php endif;
                endif;
                ?>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu', '{{TEXT_DOMAIN}}'); ?>">
                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="screen-reader-text"><?php esc_html_e('Primary Menu', '{{TEXT_DOMAIN}}'); ?></span>
                    <span class="menu-toggle-icon"></span>
                </button>
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary-menu',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => function() {
                        echo '<ul id="primary-menu" class="nav-menu"><li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', '{{TEXT_DOMAIN}}') . '</a></li></ul>';
                    },
                ]);
                ?>
            </nav><!-- #site-navigation -->

            {{HEADER_ACTION_BUTTON}}
        </div><!-- .container -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
