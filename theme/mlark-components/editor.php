<?php
defined('ABSPATH') || exit;

/**
 * Register Meadowlark Component Patterns
 * - Copy (static HTML)
 * - Pull (live shortcode)
 */

add_action('init', function () {

    $components = get_posts([
        'post_type'      => 'component',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => [
            [
                'key'     => 'component_role',
                'compare' => 'NOT EXISTS', // exclude header/footer
            ]
        ]
    ]);

    if (!$components) {
        return;
    }

    foreach ($components as $component) {

        $slug  = sanitize_title($component->post_name);
        $title = esc_html($component->post_title);

        /*
         * -------------------------
         * COPY (static content)
         * -------------------------
         */
        register_block_pattern(
            "meadowlark/component-copy-{$slug}",
            [
                'title'       => "Component: {$title}",
                'description' => 'Insert a copy of this component',
        'categories' => ['meadowlark'],
        'postTypes'  => ['post', 'page'],
                'content'     => <<<HTML
<!-- wp:group {"className":"is-style-section"} -->
<div class="wp-block-group is-style-section">
{$component->post_content}
</div>
<!-- /wp:group -->
HTML
            ]
        );

        /*
         * -------------------------
         * PULL (live reference)
         * -------------------------
         */
        register_block_pattern(
            "meadowlark/component-live-{$slug}",
            [
                'title'       => "Component (Live): {$title}",
                'description' => 'Insert a live reference to this component',
        'categories' => ['meadowlark'],
        'postTypes'  => ['post', 'page'],
                'content'     => <<<HTML
<!-- wp:group {"className":"is-style-section"} -->
<div class="wp-block-group is-style-section">
[component slug="{$slug}"]
</div>
<!-- /wp:group -->
HTML
            ]
        );
    }
});


add_action('init', function () {

    register_block_pattern_category(
        'meadowlark',
        [
            'label' => 'Meadowlark Components',
        ]
    );

});
