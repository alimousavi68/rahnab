<?php
/**
 * The template for displaying all single pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="container single-page-container">
    <div class="content-area-grid">
        <main id="primary" class="site-main">

            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('entry-page'); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header><!-- .entry-header -->

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large', ['class' => 'img-fluid']); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages([
                            'before' => '<div class="page-links">' . esc_html__('Pages:', '{{TEXT_DOMAIN}}'),
                            'after'  => '</div>',
                        ]);
                        ?>
                    </div><!-- .entry-content -->

                    <?php if (comments_open() || get_comments_number()) : ?>
                        <footer class="entry-footer">
                            <?php comments_template(); ?>
                        </footer>
                    <?php endif; ?>
                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
            endwhile;
            ?>

        </main><!-- #primary -->

        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <aside id="secondary" class="widget-area">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </aside>
        <?php endif; ?>
    </div><!-- .content-area-grid -->
</div><!-- .container -->

<?php
get_footer();
