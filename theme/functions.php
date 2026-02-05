<?php


// Enqueue styles
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mlark-base', get_stylesheet_uri(), [], '0.1');
    wp_enqueue_style('mlark-site', get_theme_file_uri('assets/site.css'), ['mlark-base'], '0.1');
    wp_enqueue_style('mlark-headfoot', get_theme_file_uri('assets/headfoot.css'), ['mlark-site'], '0.1');
});

// Editor styles (orientation only)
add_theme_support('editor-styles');
add_editor_style('style.css');

// Title tag support
add_theme_support('title-tag');


// Register Demo Header/Foot
require_once get_template_directory() . '/mlark-components/seed.php';

// Load Blocks with Components
require_once get_template_directory() . '/mlark-components/editor.php';

// Load component system
require_once get_template_directory() . '/mlark-components/cpt.php';
require_once get_template_directory() . '/mlark-components/render.php';


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

add_action('init', function () {

    register_block_style('core/group', [
        'name'  => 'section',
        'label' => 'Section',
    ]);

    register_block_style('core/group', [
        'name'  => 'section-tight',
        'label' => 'Section (Tight)',
    ]);

    register_block_style('core/group', [
        'name'  => 'section-dark',
        'label' => 'Section (Dark)',
    ]);
});

add_action('init', function () {

    register_block_pattern(
        'meadowlark/hero',
        [
            'title'   => 'Hero Section',
            'content' => '
<!-- HERO -->
<div class="wp-block-group is-style-section">
  <h1>Hero headline</h1>
  <p>Supporting copy goes here.</p>
</div>
'
        ]
    );

});



add_action('after_setup_theme', function () {
    add_editor_style('style.css');
});

add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style(
        'mlark-editor',
        get_theme_file_uri('/assets/admin-editor.css'),
        [],
        '1.0'
    );
});

add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
});
