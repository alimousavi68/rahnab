<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="container index-container">
    <div class="content-area-grid">
        <main id="primary" class="site-main">

            <?php if (have_posts()) : ?>

                <?php if (is_home() && !is_front_page()) : ?>
                    <header class="page-header">
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

                <div class="posts-stream">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('entry-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="entry-body">
                                <header class="entry-header">
                                    <?php
                                    the_title(
                                        sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())),
                                        '</a></h2>'
                                    );
                                    ?>
                                    <div class="entry-meta">
                                        <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                    </div>
                                </header>

                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>

                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                                        <?php esc_html_e('Read More', '{{TEXT_DOMAIN}}'); ?> &rarr;
                                    </a>
                                </footer>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div><!-- .posts-stream -->

                <?php
                the_posts_pagination([
                    'mid_size'  => 2,
                    'prev_text' => esc_html__('&laquo; Previous', '{{TEXT_DOMAIN}}'),
                    'next_text' => esc_html__('Next &raquo;', '{{TEXT_DOMAIN}}'),
                ]);
                ?>

            <?php else : ?>

                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php esc_html_e('Nothing Found', '{{TEXT_DOMAIN}}'); ?></h1>
                    </header>
                    <div class="page-content">
                        <p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', '{{TEXT_DOMAIN}}'); ?></p>
                        <?php get_search_form(); ?>
                    </div>
                </section>

            <?php endif; ?>

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
