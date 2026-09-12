<?php
/**
 * The template for displaying all single posts
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
        <article id="post-<?php the_ID(); ?>" <?php post_class('max-w-4xl mx-auto'); ?>>
            <header class="entry-header mb-8">
                <?php rahnab_breadcrumbs(__('اخبار و رویدادها', 'rahnab')); ?>
                
                <div class="flex items-center gap-3 text-xs font-mono text-slate-400 mb-4">
                    <span class="text-gold-400 font-bold"><?php echo esc_html(get_the_date('j F Y')); ?></span>
                </div>

                <h1 class="entry-title text-2xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-snug">
                    <?php the_title(); ?>
                </h1>
            </header>

            <?php if (has_post_thumbnail()) : ?>
                <div class="entry-thumbnail mb-10 rounded-3xl overflow-hidden border border-white/10 shadow-2xl aspect-video">
                    <?php the_post_thumbnail('rahnab-featured', ['class' => 'w-full h-full object-cover']); ?>
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

            <!-- Post Navigation -->
            <footer class="entry-footer mt-12 pt-6 border-t border-white/10 flex flex-wrap items-center justify-between gap-4 text-xs text-slate-400">
                <div class="entry-tags flex items-center gap-2">
                    <?php the_tags('<span class="text-gold-400">' . esc_html__('برچسب‌ها:', 'rahnab') . '</span> ', '، ', ''); ?>
                </div>
                <div class="post-nav flex items-center gap-4 text-gold-400 hover:text-gold-300">
                    <?php previous_post_link('%link', '← ' . esc_html__('مطلب قبلی', 'rahnab')); ?>
                    <?php next_post_link('%link', esc_html__('مطلب بعدی', 'rahnab') . ' →'); ?>
                </div>
            </footer>
        </article>
        <?php
    endwhile;
    ?>
</main>

<?php
get_footer();
