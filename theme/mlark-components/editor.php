<?php
defined('ABSPATH') || exit;

/**
 * Register published section components as block patterns.
 */
add_action('init', function () {

    register_block_pattern_category(
        'meadowlark',
        [
            'label' => 'Meadowlark Components',
        ]
    );

    $components = get_posts([
        'post_type'      => 'component',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
        'meta_query'     => [
            [
                'key'     => 'component_role',
                'value'   => 'section',
                'compare' => '=',
            ],
        ],
    ]);

    if (!$components) {
        return;
    }

    foreach ($components as $component) {

        $slug    = sanitize_title($component->post_name);
        $title   = $component->post_title;
        $content = trim($component->post_content);

        if ($slug === '' || $content === '') {
            continue;
        }

        /*
         * Preserve components already using Gutenberg block syntax.
         *
         * Older components containing only raw HTML are converted into
         * a Custom HTML block when inserted from the pattern library.
         */
        if (has_blocks($content)) {
            $copy_content = $content;
        } else {
            $copy_content =
                "<!-- wp:html -->\n" .
                $content .
                "\n<!-- /wp:html -->";
        }

        /*
         * COPY PATTERN
         */
        register_block_pattern(
            "meadowlark/component-copy-{$slug}",
            [
                'title'       => "Component: {$title}",
                'categories'  => ['meadowlark'],
                'description' => 'Editable copy of this Component. Changes do not affect the original Component.',
                'postTypes'   => ['post', 'page'],
                'content'     => $copy_content,
            ]
        );

        /*
         * LIVE PATTERN
         *
         * Inserts the component shortcode as a real Shortcode block,
         * instead of inserting it as inline paragraph content.
         */
        $live_content =
            "<!-- wp:shortcode -->\n" .
            '[component slug="' . esc_attr($slug) . '"]' .
            "\n<!-- /wp:shortcode -->";

        register_block_pattern(
            "meadowlark/component-live-{$slug}",
            [
                'title'       => "Component (Live): {$title}",
                'categories'  => ['meadowlark'],
                'description' => 'Live reference to the original Component. Editing the Component updates every reference.',
                'postTypes'   => ['post', 'page'],
                'content'     => $live_content,
            ]
        );
    }
});

