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
<p> <3 2026 - Meadowlark IT - Peter Roe</p>
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
            'post_name'   => 'section',
            'post_status' => 'publish',
            'post_content' => <<<HTML
<section class="section">
  <h2>Demo Component</h2>

<style>
  .ml-proof {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    margin: 4rem auto;
    max-width: 720px;
    padding: 2rem;
    border-radius: 12px;
    background: linear-gradient(135deg, #0f172a, #020617);
    color: #e5e7eb;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
  }
</style>

<div class="ml-proof">
  <h2>No Builder. No Block. No Lies.</h2>
  <button id="ml-proof-btn">Run JavaScript</button>
  <div class="status" id="ml-proof-status">JS status: waiting…</div>
</div>

<script>
(function () {
  const btn = document.getElementById('ml-proof-btn');
  const status = document.getElementById('ml-proof-status');

  if (!btn || !status) return;

  btn.addEventListener('click', () => {
    const now = new Date().toLocaleTimeString();
    status.textContent = 'JS status: executed at ' + now;
    console.log('[Meadowlark] Inline JS executed at', now);
  });
})();
</script>
</section>
HTML
    
        ]);
    }

  /*
 * -------------------------
 * Homepage
 * -------------------------
 */
$existing = get_posts([
    'post_type'   => 'page',
    'post_status' => 'any',
    'title'       => 'Welcome',
    'numberposts' => 1,
    'fields'      => 'ids',
]);

if (!$existing) {


    $page_id = wp_insert_post([
        'post_type'   => 'page',
        'post_title'  => 'Welcome',
        'post_status' => 'publish',
        'post_content'=> '
<section class="section hero">
  <h1>Welcome</h1>
  <p>This site uses a document-first theme.</p>
</section>

[component slug="demo-component"]

',
    ]);

    if ($page_id && !is_wp_error($page_id)) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $page_id);
    }
}

    });

