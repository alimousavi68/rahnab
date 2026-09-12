<?php
/**
 * The template for displaying all single pages
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main min-h-screen pt-36 pb-24 px-6 sm:px-12 lg:px-16 container mx-auto text-white font-fa-display">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header mb-8">
                <?php rahnab_breadcrumbs(); ?>
                <h1 class="entry-title text-3xl sm:text-5xl font-black text-white tracking-tight">
                    <?php the_title(); ?>
                </h1>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="entry-thumbnail mb-10 rounded-3xl overflow-hidden border border-white/10 shadow-2xl">
                    <?php the_post_thumbnail('rahnab-featured', ['class' => 'w-full h-auto object-cover']); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content prose prose-invert prose-gold max-w-none text-slate-300 leading-relaxed text-base sm:text-lg">
                <?php
                the_content();

                wp_link_pages([
                    'before' => '<div class="page-links mt-8">' . esc_html__('صفحات:', 'rahnab'),
                    'after'  => '</div>',
                ]);
                ?>
            </div>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
