<?php
defined('ABSPATH') || exit;

/**
 * Seed initial components + homepage on theme activation
 */
add_action('after_switch_theme', function () {

    // Make sure CPT is available
    if (!post_type_exists('component')) {
        return;
    }

    /*
     * -------------------------
     * Header Component
     * -------------------------
     */
    if (!get_page_by_path('site-header', OBJECT, 'component')) {

        $id = wp_insert_post([
            'post_type'   => 'component',
            'post_title'  => 'Site Header',
            'post_name'   => 'site-header',
            'post_status' => 'publish',
            'post_content'=> '
<nav class="site-nav">
  <a href="/">Home</a>
  <a href="/about">About</a>
</nav>
',
        ]);

        if ($id && !is_wp_error($id)) {
            update_post_meta($id, 'component_role', 'header');
        }
    }

    /*
     * -------------------------
     * Footer Component
     * -------------------------
     */
    if (!get_page_by_path('site-footer', OBJECT, 'component')) {

        $id = wp_insert_post([
            'post_type'   => 'component',
            'post_title'  => 'Site Footer',
            'post_name'   => 'site-footer',
            'post_status' => 'publish',
            'post_content'=> '
<p>&copy; {{year}} Meadowlark IT</p>
',
        ]);

        if ($id && !is_wp_error($id)) {
            update_post_meta($id, 'component_role', 'footer');
        }
    }

    /*
     * -------------------------
     * Demo Component
     * -------------------------
     */
    if (!get_page_by_path('demo-component', OBJECT, 'component')) {

        wp_insert_post([
            'post_type'   => 'component',
            'post_title'  => 'Demo Component',
            'post_name'   => 'demo-component',
            'post_status' => 'publish',
            'post_content'=> '
<section class="section">
  <h2>Demo Component</h2>
  <p>This is a reusable visual component.</p>
</section>
',
        ]);
    }

  /*
 * -------------------------
 * Homepage
 * -------------------------
 */
if (!mlark_page_exists_by_title('Welcome', 'page')) {

    $page_id = wp_insert_post([
        'post_type'   => 'page',
        'post_title'  => 'Welcome',
        'post_status' => 'publish',
        'post_content'=> '
<section class="section hero">
  <h1>Welcome</h1>
  <p>This site uses a document-first theme.</p>
</section>

<!-- COMPONENT: demo-component -->
',
    ]);

    if ($page_id && !is_wp_error($page_id)) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_id);
    }
}
