<?php
/**
 * Title: {{PATTERN_TITLE}}
 * Slug: {{THEME_SLUG}}/{{PATTERN_SLUG}}
 * Categories: {{PATTERN_CATEGORIES}}
 * Keywords: {{PATTERN_KEYWORDS}}
 * Block Types: core/post-content
 * Inserter: true
 *
 * @package {{THEME_SLUG}}
 */

defined('ABSPATH') || exit;
?>
<!-- wp:group {"align":"full","className":"{{PATTERN_CUSTOM_CLASSES}}","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull {{PATTERN_CUSTOM_CLASSES}}">
    {{PATTERN_MARKUP}}
</div>
<!-- /wp:group -->
