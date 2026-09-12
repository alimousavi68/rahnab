<?php
/**
 * The template for displaying search results pages
 *
 * @package Rahnab
 * @since 1.0.0
 */

defined('ABSPATH') || exit;

get_header();
$search_query = get_search_query();
?>

<main id="primary" class="site-main min-h-screen bg-[#05070B] pt-36 pb-28 px-6 sm:px-12 lg:px-16 container mx-auto text-white font-fa-display">
  
  <!-- Breadcrumbs & Search Header -->
  <header class="page-header mb-12">
    <?php rahnab_breadcrumbs(__('نتایج جستجو', 'rahnab')); ?>
    
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 pb-8 border-b border-white/10">
      <div>
        <span class="text-xs font-mono uppercase tracking-widest text-gold-400 font-bold mb-2 block" data-i18n="search_crumb">
          <?php esc_html_e('جستجو در تارنما', 'rahnab'); ?>
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white tracking-tight">
          <?php if (!empty($search_query)) : ?>
            <span><?php esc_html_e('نتایج برای:', 'rahnab'); ?></span>
            <span class="text-gold-400">«<?php echo esc_html($search_query); ?>»</span>
          <?php else : ?>
            <span><?php esc_html_e('جستجو در تارنمای هلدینگ', 'rahnab'); ?></span>
          <?php endif; ?>
        </h1>
      </div>
      
      <?php if (!empty($search_query)) : global $wp_query; ?>
        <span class="text-xs font-mono text-slate-400 px-3.5 py-1.5 rounded-full bg-white/[0.04] border border-white/10 self-start sm:self-end">
          <?php printf(esc_html__('%d مورد یافت شد', 'rahnab'), (int)$wp_query->found_posts); ?>
        </span>
      <?php endif; ?>
    </div>

    <!-- Search Form -->
    <div class="max-w-2xl mt-8">
      <form action="<?php echo esc_url(home_url('/')); ?>" method="GET" class="relative flex items-center">
        <input type="text" name="s" value="<?php echo esc_attr($search_query); ?>" required
               class="w-full px-5 py-4 pe-28 rounded-2xl bg-white/[0.03] border border-white/10 focus:border-gold-400 focus:bg-white/[0.06] text-white text-sm transition-all placeholder:text-slate-500 outline-none"
               placeholder="<?php esc_attr_e('عبارت دیگری را جستجو کنید...', 'rahnab'); ?>">
        <button type="submit"
                class="absolute right-2 rtl:right-auto rtl:left-2 px-5 py-2.5 rounded-xl bg-gold-400 text-black text-xs font-bold hover:bg-gold-300 transition-colors">
          <?php esc_html_e('جستجو', 'rahnab'); ?>
        </button>
      </form>
    </div>
  </header>

  <!-- Search Results Loop -->
  <?php if (have_posts()) : ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php
      while (have_posts()) :
        the_post();
        $post_type_obj = get_post_type_object(get_post_type());
        $type_label = $post_type_obj ? $post_type_obj->labels->singular_name : __('مطلب', 'rahnab');
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('p-6 rounded-2xl bg-white/[0.02] border border-white/10 hover:border-gold-400/40 hover:bg-gold-400/[0.02] transition-all flex flex-col justify-between'); ?>>
          <div>
            <div class="flex items-center justify-between gap-2 mb-3">
              <span class="text-[10px] font-mono uppercase px-2.5 py-1 rounded-full bg-gold-400/10 text-gold-400 border border-gold-400/20">
                <?php echo esc_html($type_label); ?>
              </span>
              <span class="text-xs text-slate-500 font-mono">
                <?php echo esc_html(get_the_date('j F Y')); ?>
              </span>
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
      <p class="text-lg font-bold text-slate-300 mb-2"><?php esc_html_e('هیچ نتیجه‌ای متناسب با عبارت جستجو شده یافت نشد.', 'rahnab'); ?></p>
      <p class="text-xs text-slate-500"><?php esc_html_e('لطفاً املای کلمات را بررسی کنید یا عبارت دیگری را جستجو فرمایید.', 'rahnab'); ?></p>
    </div>
  <?php endif; ?>

</main>

<?php
get_footer();
