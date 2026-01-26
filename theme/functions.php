<?php

// Enqueue styles
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'meadowlark-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
});

// Editor styles (orientation only)
add_theme_support('editor-styles');
add_editor_style('style.css');

// Title tag support
add_theme_support('title-tag');


// Enable block editor features we actually want
add_action('after_setup_theme', function () {

    // Let WP manage title tags
    add_theme_support('title-tag');

    // Editor styles (orientation only)
    add_theme_support('editor-styles');
    add_editor_style('style.css');

    // Wide/full alignment (optional but useful)
    add_theme_support('align-wide');
});
