<?php
/**
 * The template for displaying archive pages
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main min-h-screen bg-[#05070B] pt-36 pb-28 px-6 sm:px-12 lg:px-16 container mx-auto text-white font-fa-display">
  
  <header class="page-header mb-12 pb-8 border-b border-white/10">
    <?php rahnab_breadcrumbs(get_the_archive_title()); ?>
    
    <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight mb-4">
      <?php the_archive_title(); ?>
    </h1>

    <?php the_archive_description('<div class="archive-description text-sm text-slate-400 max-w-2xl leading-relaxed">', '</div>'); ?>
  </header>

  <?php if (have_posts()) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('p-6 rounded-2xl bg-white/[0.02] border border-white/10 hover:border-gold-400/40 hover:bg-gold-400/[0.02] transition-all flex flex-col justify-between'); ?>>
          <div>
            <?php if (has_post_thumbnail()) : ?>
              <div class="mb-4 rounded-xl overflow-hidden aspect-video">
                <?php the_post_thumbnail('rahnab-card', ['class' => 'w-full h-full object-cover']); ?>
              </div>
            <?php endif; ?>

            <div class="flex items-center gap-2 mb-3 text-xs text-slate-500 font-mono">
              <span class="text-gold-400 font-bold"><?php echo esc_html(get_the_date('j F Y')); ?></span>
            </div>

            <h2 class="text-lg font-bold text-white mb-3 hover:text-gold-400 transition-colors leading-snug">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>

            <div class="text-xs text-slate-400 leading-relaxed line-clamp-3 mb-6">
              <?php the_excerpt(); ?>
            </div>
          </div>

          <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-2 text-xs font-bold text-gold-400 hover:text-gold-300 transition-colors">
            <span><?php esc_html_e('مشاهده اطلاعات کامل', 'rahnab'); ?></span>
            <svg class="w-3.5 h-3.5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </article>
      <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-12">
      <?php the_posts_pagination([
        'prev_text' => esc_html__('قبلی', 'rahnab'),
        'next_text' => esc_html__('بعدی', 'rahnab'),
      ]); ?>
    </div>

  <?php else : ?>
    <div class="py-16 text-center border border-white/5 rounded-3xl bg-white/[0.01] max-w-xl mx-auto">
      <p class="text-lg font-bold text-slate-300 mb-2"><?php esc_html_e('هیچ مطلبی در این آرشیو یافت نشد.', 'rahnab'); ?></p>
    </div>
  <?php endif; ?>

</main>

<?php
get_footer();
