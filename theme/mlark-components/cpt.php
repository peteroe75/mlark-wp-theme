<?php
defined('ABSPATH') || exit;

add_action('init', function () {

    register_post_type('component', [
        'label' => 'Components',
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor'],
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-screenoptions',
    ]);

});
