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




















































/**
 * Show one-time activation notice
 */
add_action('after_switch_theme', function () {
    update_option('mlark_show_activation_notice', true);
});

/**
 * Render activation notice
 */
add_action('admin_notices', function () {

    if (!get_option('mlark_show_activation_notice')) {
        return;
    }

    // Only show in admin, not during AJAX
    if (!is_admin() || wp_doing_ajax()) {
        return;
    }

    ?>
    <div class="notice notice-success is-dismissible">
        <p><strong>Welcome to Meadowlark Skeleton Theme</strong></p>

        <p>
            This theme is designed for building sites with native HTML, CSS, and JavaScript —
            without page builders.
        </p>

        <p>
            <strong>Important note:</strong><br>
            When content is copied into pages or posts, WordPress removes JavaScript and CSS tags
            as part of standard content handling.
        </p>

        <p>
            Sections that include JavaScript or CSS should be saved as
            <strong>Components</strong> and inserted using the
            <strong>Live Component</strong> pattern or the
            <code>[component]</code> shortcode.
        </p>

        <p>
            JavaScript and CSS saved to the <strong>Component</strong> post type will render
            correctly on the frontend and within the Component editor.
        </p>

        <p>
            Other than that — copy, paste, experiment, and build.<br>
            <em>Return to primitives. Have fun.</em>
        </p>
    </div>
    <?php

    // Ensure it only shows once
    delete_option('mlark_show_activation_notice');
});

