<?php
defined('ABSPATH') || exit;

add_action('init', function () {

    // Register category first
    register_block_pattern_category(
        'meadowlark',
        ['label' => 'Meadowlark Components']
    );

    $components = get_posts([
        'post_type'      => 'component',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'meta_query'     => [
            [
                'key'   => 'component_role',
                'value' => 'section',
            ]
        ]
    ]);

    if (!$components) return;

    foreach ($components as $component) {

        $slug    = sanitize_title($component->post_name);
        $title   = esc_html($component->post_title);
        $content = trim($component->post_content);

        if ($content === '') continue;

        // COPY
      register_block_pattern(
    "meadowlark/component-copy-{$slug}",
    [
        'title'      => "Component: {$title}",
        'categories' => ['meadowlark'],
        'postTypes'  => ['post', 'page'],
        'content'    => $component->post_content,
    ]
);


        // LIVE
        register_block_pattern(
            "meadowlark/component-live-{$slug}",
           [
        'title'      => "Component (Live): {$title}",
        'categories' => ['meadowlark'],
        'postTypes'  => ['post', 'page'],
        'content'    => "[component slug=\"{$slug}\"]",
    ]
        );
    }
});
