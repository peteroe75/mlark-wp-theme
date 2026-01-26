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
