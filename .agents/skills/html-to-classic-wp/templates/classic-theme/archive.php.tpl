<?php
/**
 * The template for displaying archive pages
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="container archive-container">
    <div class="content-area-grid">
        <main id="primary" class="site-main">

            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header><!-- .page-header -->

                <div class="archive-posts-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('archive-post-card'); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium_large', ['class' => 'img-fluid']); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="entry-body">
                                <header class="entry-header">
                                    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
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
                </div><!-- .archive-posts-grid -->

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
