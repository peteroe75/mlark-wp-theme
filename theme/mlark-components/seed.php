<?php
defined('ABSPATH') || exit;

/**
 * Seed initial components and homepage when the theme is activated.
 *
 * Existing components and pages are preserved.
 */
add_action('after_switch_theme', function () {

    // The component post type must already be registered.
    if (!post_type_exists('component')) {
        return;
    }

    /*
     * -------------------------
     * Header Component
     * -------------------------
     */

    $header = get_page_by_path(
        'site-header',
        OBJECT,
        'component'
    );

    if (!$header) {

        $header_content = <<<'HTML'
<!-- wp:html -->
<div class="comp-head">

<style data-wp-block-html="css">
.site-header {
    padding: 0rem 0rem 0rem 0rem;
    background: lightgrey;
    color: black;
}

.site-header .site-nav {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    width: 100%;
    margin: 0 auto;
}

.site-header .site-nav a {
    color: inherit;
    text-decoration: none;
}

.site-header .site-nav a:hover,
.site-header .site-nav a:focus-visible {
    text-decoration: underline;
}
</style>

<script data-wp-block-html="js">
/* Header JavaScript */
</script>
<header class="mlark-const">
    <nav class="site-nav" aria-label="Main navigation">
        <a href="/">Home</a>
        <a href="/?page_id=2/">Sample Page</a>
    </nav>
</header>
</div>
<!-- /wp:html -->
HTML;

        $header_id = wp_insert_post([
            'post_type'    => 'component',
            'post_title'   => 'Site Header',
            'post_name'    => 'site-header',
            'post_status'  => 'publish',
            'post_content' => $header_content,
        ]);

        if ($header_id && !is_wp_error($header_id)) {
            update_post_meta(
                $header_id,
                'component_role',
                'header'
            );
        }
    }

    /*
     * -------------------------
     * Footer Component
     * -------------------------
     */

    $footer = get_page_by_path(
        'site-footer',
        OBJECT,
        'component'
    );

    if (!$footer) {

        $footer_content = <<<'HTML'
<!-- wp:html -->
<div class="comp-foot">

<style data-wp-block-html="css">
.site-footer {
    padding: 0rem 0rem 0rem 0rem;
    background: lightgrey;
    color: black;
min-width:100%;
    text-align: left;
}

.site-footer p {
    margin: 0;
}
</style>

<script data-wp-block-html="js">
/* Footer JavaScript */
</script>
<footer class="mlark-const">
    <p>❤️ 2026 — Meadowlark IT — Peter Roe</p>
</footer>
</div>
<!-- /wp:html -->
HTML;

        $footer_id = wp_insert_post([
            'post_type'    => 'component',
            'post_title'   => 'Site Footer',
            'post_name'    => 'site-footer',
            'post_status'  => 'publish',
            'post_content' => $footer_content,
        ]);

        if ($footer_id && !is_wp_error($footer_id)) {
            update_post_meta(
                $footer_id,
                'component_role',
                'footer'
            );
        }
    }

    /*
     * -------------------------
     * Demo Component
     * -------------------------
     */

    $demo = get_page_by_path(
        'demo-component',
        OBJECT,
        'component'
    );

    if (!$demo) {

        $demo_content = <<<'HTML'
<!-- wp:html -->
<div class="comp-proof">

<style data-wp-block-html="css">
.ml-proof {
    max-width: 720px;
    margin: 4rem auto;
    padding: 2rem;
    border-radius: 12px;
    background: linear-gradient(135deg, #0f172a, #020617);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    color: #e5e7eb;
    font-family: system-ui, sans-serif;
}

.ml-proof button {
    padding: 0.75rem 1rem 1rem 1rem;
    border: 0;
    border-radius: 6px;
    cursor: pointer;
}

.ml-proof .status {
    margin-top: 1rem;
    opacity: 0.8;
}
</style>

<script data-wp-block-html="js">
document.addEventListener('click', function (event) {
    const trigger = event.target.closest(
        '[data-ml-action="proof-run"]'
    );

    if (!trigger) {
        return;
    }

    const wrapper = trigger.closest('.ml-proof');

    if (!wrapper) {
        return;
    }

    const status = wrapper.querySelector('.status');

    if (!status) {
        return;
    }

    const now = new Date().toLocaleTimeString();

    status.textContent =
        'JS status: executed at ' + now;

    console.log(
        '[Meadowlark] delegated runtime fired',
        now
    );
});
</script>

<section class="mlark-const">
 <div class="ml-proof">

        <h2>No Builder. No Block. No Lies.</h2>

        <button
            type="button"
            data-ml-action="proof-run"
        >
            Run JavaScript
        </button>

        <div class="status">
            JS status: waiting…
        </div>

    </div>
</section>

</div>
<!-- /wp:html -->
HTML;

        $demo_id = wp_insert_post([
            'post_type'    => 'component',
            'post_title'   => 'Demo Component',
            'post_name'    => 'demo-component',
            'post_status'  => 'publish',
            'post_content' => $demo_content,
        ]);

        if ($demo_id && !is_wp_error($demo_id)) {
            update_post_meta(
                $demo_id,
                'component_role',
                'section'
            );
        }
    }

    /*
     * -------------------------
     * Homepage
     * -------------------------
     */

    $homepage = get_page_by_path(
        'welcome',
        OBJECT,
        'page'
    );

    if (!$homepage) {

        $homepage_content = <<<'HTML'
<!-- wp:html -->
<div class="comp-home">

<style data-wp-block-html="css">
.hero {
    padding: 0rem 0rem 0rem 0rem;
    text-align: left;
}

.hero h1 {
    margin-top: 0;
    font-size: clamp(2.5rem, 7vw, 5rem);
}

.hero p {
    font-size: 1.2rem;
}
</style>

<script data-wp-block-html="js">
/* Homepage JavaScript */
</script>

<section class="hero mlark-const">
    <h1>Welcome</h1>

    <p>
        This site uses a document-first theme.
    </p>
</section>

</div>
<!-- /wp:html -->

[component slug="demo-component"]
HTML;

        $page_id = wp_insert_post([
            'post_type'    => 'page',
            'post_title'   => 'Welcome',
            'post_name'    => 'welcome',
            'post_status'  => 'publish',
            'post_content' => $homepage_content,
        ]);

        if ($page_id && !is_wp_error($page_id)) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $page_id);
        }
    }
});
