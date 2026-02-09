<?php

/**
 * Frontend styles
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('mlark-base', get_stylesheet_uri(), [], '0.1');
    wp_enqueue_style('mlark-site', get_theme_file_uri('assets/site.css'), ['mlark-base'], '0.1');
    wp_enqueue_style('mlark-headfoot', get_theme_file_uri('assets/headfoot.css'), ['mlark-site'], '0.1');
});

/**
 * Theme supports
 */
add_action('after_setup_theme', function () {

    // Let WordPress manage <title>
    add_theme_support('title-tag');

    // Block editor alignment
    add_theme_support('align-wide');

    // Featured images
    add_theme_support('post-thumbnails');
});

/**
 * Block editor styles (iframe-safe)
 */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style(
        'mlark-editor-css',
        get_theme_file_uri('/assets/admin-editor.css'),
        [],
        '1.0'
    );
});

/**
 * Component system
 */
require_once get_template_directory() . '/mlark-components/seed.php';
require_once get_template_directory() . '/mlark-components/editor.php';
require_once get_template_directory() . '/mlark-components/cpt.php';
require_once get_template_directory() . '/mlark-components/render.php';

/**
 * Block styles
 */
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

/**
 * Example pattern
 */
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
