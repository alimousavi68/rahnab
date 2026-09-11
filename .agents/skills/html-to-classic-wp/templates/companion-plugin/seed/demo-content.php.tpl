<?php
/**
 * Modular Seed Architecture - Demo Content Worker
 *
 * Populates sample blog posts and CPT items with metadata idempotently.
 *
 * @package {{PLUGIN_SLUG}}
 */

defined('ABSPATH') || exit;

class {{UPPER_PLUGIN_SLUG}}_Seed_Demo_Content {

    public static function seed() {
        $cpt_key = '{{CPT_KEY}}';
        $created_items = [];

        // Check if CPT items already exist
        $existing = get_posts([
            'post_type'      => $cpt_key,
            'posts_per_page' => 1,
            'post_status'    => 'any',
        ]);

        if (empty($existing) && post_type_exists($cpt_key)) {
            $sample_items = [
                [
                    'title'   => 'Sample Project Alpha',
                    'content' => 'Comprehensive case study demonstrating client objectives and successful delivery.',
                    'meta'    => ['client_name' => 'Acme Corp', 'project_year' => '2026'],
                ],
                [
                    'title'   => 'Sample Project Beta',
                    'content' => 'High-performance web architecture built with WordPress Classic Theme and modern tooling.',
                    'meta'    => ['client_name' => 'Globex Intl', 'project_year' => '2026'],
                ],
                [
                    'title'   => 'Sample Project Gamma',
                    'content' => 'Scalable enterprise digital transformation and UI/UX modernization project.',
                    'meta'    => ['client_name' => 'Stark Industries', 'project_year' => '2026'],
                ],
            ];

            foreach ($sample_items as $item) {
                $post_id = wp_insert_post([
                    'post_title'   => $item['title'],
                    'post_content' => $item['content'],
                    'post_status'  => 'publish',
                    'post_type'    => $cpt_key,
                ]);

                if (!is_wp_error($post_id)) {
                    foreach ($item['meta'] as $m_key => $m_val) {
                        update_post_meta($post_id, '_' . $cpt_key . '_' . $m_key, sanitize_text_field($m_val));
                    }
                    $created_items[] = $post_id;
                }
            }
        }

        return [
            'status'        => 'complete',
            'created_count' => count($created_items),
            'item_ids'      => $created_items,
        ];
    }
}
