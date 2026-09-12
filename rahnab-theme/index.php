<?php
/**
 * The main template file (fallback)
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main min-h-screen pt-32 pb-24 px-6 sm:px-12 lg:px-16 container mx-auto text-white">
    <?php if (have_posts()) : ?>
        <header class="page-header mb-12">
            <h1 class="page-title text-3xl sm:text-4xl font-black text-gold-400 font-fa-display">
                <?php single_post_title(); ?>
            </h1>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('p-6 rounded-2xl bg-white/[0.03] border border-white/10 hover:border-gold-400/40 transition-all'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="mb-4 rounded-xl overflow-hidden aspect-video">
                            <?php the_post_thumbnail('rahnab-card', ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php endif; ?>

                    <h2 class="entry-title text-xl font-bold mb-3">
                        <a href="<?php the_permalink(); ?>" class="text-white hover:text-gold-400 transition-colors">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="entry-summary text-sm text-slate-400 leading-relaxed line-clamp-3 mb-4">
                        <?php the_excerpt(); ?>
                    </div>

                    <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-xs font-bold text-gold-400 hover:text-gold-300">
                        <span><?php esc_html_e('ادامه مطلب', 'rahnab'); ?></span>
                        <svg class="w-4 h-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </article>
                <?php
            endwhile;
            ?>
        </div>

        <div class="mt-12">
            <?php the_posts_pagination([
                'prev_text' => esc_html__('قبلی', 'rahnab'),
                'next_text' => esc_html__('بعدی', 'rahnab'),
            ]); ?>
        </div>

    <?php else : ?>
        <section class="no-results not-found py-16 text-center">
            <h2 class="text-2xl font-bold mb-4"><?php esc_html_e('محتوایی یافت نشد', 'rahnab'); ?></h2>
            <p class="text-slate-400"><?php esc_html_e('متأسفانه هیچ مطلبی برای نمایش وجود ندارد.', 'rahnab'); ?></p>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
