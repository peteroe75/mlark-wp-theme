<?php
/**
 * Plugin Name: Meadowlark Components
 * Description: Visual component system for headers, footers, and reusable sections.
 * Author: Meadowlark IT
 * Version: 0.1
 */

defined('ABSPATH') || exit;

require_once __DIR__ . '/cpt.php';
require_once __DIR__ . '/render.php';


register_activation_hook(__FILE__, 'meadowlark_components_activate');

function meadowlark_components_activate() {

    // Ensure CPT is registered before inserting posts
    do_action('init');

    // ---------------------------
    // Header component
    // ---------------------------
    if (!get_page_by_path('site-header', OBJECT, 'component')) {

        wp_insert_post([
            'post_type'    => 'component',
            'post_title'   => 'Site Header',
            'post_name'    => 'site-header',
            'post_status'  => 'publish',
            'post_content' => <<<HTML
<nav class="site-nav">
  <a href="/">Home</a>
  <a href="/about">About</a>
</nav>
HTML,
            'meta_input'   => [
                'component_role' => 'header',
            ],
        ]);
    }

    // ---------------------------
    // Footer component
    // ---------------------------
    if (!get_page_by_path('site-footer', OBJECT, 'component')) {

        wp_insert_post([
            'post_type'    => 'component',
            'post_title'   => 'Site Footer',
            'post_name'    => 'site-footer',
            'post_status'  => 'publish',
            'post_content' => <<<HTML
<p>&copy; {{year}} Meadowlark IT</p>
HTML,
            'meta_input'   => [
                'component_role' => 'footer',
            ],
        ]);
    }

    // ---------------------------
    // Sample Meadowlark post
    // ---------------------------
    if (!get_page_by_title('Hello Meadowlark')) {

        wp_insert_post([
            'post_type'    => 'post',
            'post_title'   => 'Hello Meadowlark',
            'post_status'  => 'publish',
            'post_content' => <<<HTML
<!-- HERO -->
<section class="section hero">
  <h1>Welcome to Meadowlark</h1>
  <p>This site is running on a minimal, document-first WordPress stack.</p>
</section>

<!-- CONTENT -->
<section class="section">
  <p>All layout is handled by CSS. All content lives in the database.</p>
</section>
HTML,
        ]);
    }
}
