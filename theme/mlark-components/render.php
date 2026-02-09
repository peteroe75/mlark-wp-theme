<?php
defined('ABSPATH') || exit;

/**
 * Trusted component renderer
 *
 * - Admins (unfiltered_html) get raw output (inline JS allowed)
 * - Everyone else gets sanitized HTML
 * - No global filters touched
 */
function meadowlark_render_component_post(WP_Post $post): string {

    if (current_user_can('unfiltered_html')) {
        return $post->post_content;
    }

    return wp_kses_post($post->post_content);
}

/**
 * Render component by role (header, footer, section)
 */
function meadowlark_component_by_role(string $role): string {

    $posts = get_posts([
        'post_type'      => 'component',
        'posts_per_page' => 1,
        'meta_key'       => 'component_role',
        'meta_value'     => $role,
        'post_status'    => 'publish',
    ]);

    if (!$posts) {
        return '';
    }

    return meadowlark_render_component_post($posts[0]);
}

/**
 * Render component by slug
 */
function meadowlark_component_by_slug(string $slug): string {

    $post = get_page_by_path($slug, OBJECT, 'component');

    if (!$post) {
        return '';
    }

    return meadowlark_render_component_post($post);
}

/**
 * Shortcode: [component slug="example"]
 */
add_shortcode('component', function ($atts) {

    $atts = shortcode_atts([
        'slug' => '',
    ], $atts);

    if (!$atts['slug']) {
        return '';
    }

    return meadowlark_component_by_slug($atts['slug']);
});


?>

