<?php
/**
 * The template for displaying all single posts
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;

get_header();
?>

<div class="container single-post-container">
    <div class="content-area-grid">
        <main id="primary" class="site-main">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('entry-single'); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>

                        <div class="entry-meta">
                            <span class="posted-on">
                                <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </span>
                            <span class="byline">
                                <?php esc_html_e('by', '{{TEXT_DOMAIN}}'); ?>
                                <span class="author vcard">
                                    <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php echo esc_html(get_the_author()); ?>
                                    </a>
                                </span>
                            </span>
                        </div><!-- .entry-meta -->
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

                    <footer class="entry-footer">
                        <?php
                        $categories_list = get_the_category_list(esc_html__(', ', '{{TEXT_DOMAIN}}'));
                        if ($categories_list) :
                            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', '{{TEXT_DOMAIN}}') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        endif;

                        $tags_list = get_the_tag_list('', esc_html__(', ', '{{TEXT_DOMAIN}}'));
                        if ($tags_list) :
                            printf('<span class="tags-links">' . esc_html__('Tagged %1$s', '{{TEXT_DOMAIN}}') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        endif;
                        ?>
                    </footer><!-- .entry-footer -->
                </article><!-- #post-<?php the_ID(); ?> -->

                <?php
                the_post_navigation([
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', '{{TEXT_DOMAIN}}') . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', '{{TEXT_DOMAIN}}') . '</span> <span class="nav-title">%title</span>',
                ]);

                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

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
