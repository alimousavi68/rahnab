<?php
/**
 * The template for displaying the front page
 *
 * Architecture Rule:
 * This template handles ONLY structural layout orchestration and layer stitching.
 * ZERO business logic, ZERO direct database queries, and ZERO data-processing algorithms belong here.
 * Dynamic feeds must be handled via Block Patterns, Shortcodes, or dedicated Template Parts.
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;

get_header();
?>

<main id="primary" class="site-main front-page-main">
    <?php
    /**
     * Hook: {{THEME_SLUG}}_before_front_page_content
     */
    do_action('{{THEME_SLUG}}_before_front_page_content');
    ?>

    <?php
    // Primary Layout Canvas: Renders editable page content (Gutenberg Block Patterns)
    while (have_posts()) :
        the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('front-page-article'); ?>>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </article>
        <?php
    endwhile;
    ?>

    <?php
    /**
     * Optional Modular Template Parts (if layout requires fixed structural sections)
     * e.g., get_template_part('template-parts/home/hero');
     */
    {{FRONT_PAGE_MODULAR_PARTS}}
    ?>

    <?php
    /**
     * Hook: {{THEME_SLUG}}_after_front_page_content
     */
    do_action('{{THEME_SLUG}}_after_front_page_content');
    ?>
</main><!-- #primary -->

<?php
get_footer();
