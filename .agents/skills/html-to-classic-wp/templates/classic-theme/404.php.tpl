<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="container error-404-container">
    <main id="primary" class="site-main">
        <section class="error-404 not-found text-center py-5">
            <header class="page-header">
                <h1 class="page-title error-code">404</h1>
                <h2 class="error-subtitle"><?php esc_html_e('Oops! That page can&rsquo;t be found.', '{{TEXT_DOMAIN}}'); ?></h2>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try a search or return to the homepage?', '{{TEXT_DOMAIN}}'); ?></p>

                <div class="error-search-wrap my-4">
                    <?php get_search_form(); ?>
                </div>

                <div class="error-home-action mt-4">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                        <?php esc_html_e('&larr; Back to Homepage', '{{TEXT_DOMAIN}}'); ?>
                    </a>
                </div>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </main><!-- #primary -->
</div><!-- .container -->

<?php
get_footer();
