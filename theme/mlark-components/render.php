<?php
defined('ABSPATH') || exit;

/**
 * Render component by role (header/footer)
 */
function meadowlark_component_by_role(string $role): string {
    $posts = get_posts([
        'post_type' => 'component',
        'post_status' => 'publish',
        'meta_key' => 'component_role',
        'meta_value' => $role,
        'numberposts' => 1,
    ]);

    if (!$posts) return '';

    return apply_filters('the_content', $posts[0]->post_content);
}

/**
 * Render component by slug (reusable sections)
 */
function meadowlark_component(string $slug): string {
    $post = get_page_by_path($slug, OBJECT, 'component');
    if (!$post) return '';
    return apply_filters('the_content', $post->post_content);
}

add_action('updated_post_meta', function (
    $meta_id,
    $post_id,
    $meta_key,
    $meta_value
) {

    // Only care about our CPT
    if (get_post_type($post_id) !== 'component') {
        return;
    }

    // Only care about role changes
    if ($meta_key !== 'component_role') {
        return;
    }

    /**
     * FRONTEND HOOK
     *
     * Fires when a component role changes.
     * Use this to clear caches, rebuild state, etc.
     */
    do_action('meadowlark_component_role_changed', $post_id, $meta_value);

}, 10, 4);



add_shortcode('component', function ($atts) {

    $atts = shortcode_atts([
        'slug' => '',
    ], $atts);

    if (!$atts['slug']) {
        return '';
    }

    $component = get_page_by_path(
        sanitize_title($atts['slug']),
        OBJECT,
        'component'
    );

    if (!$component || $component->post_status !== 'publish') {
        return '';
    }

    // IMPORTANT:
    // Use the_content so blocks render correctly
    return apply_filters('the_content', $component->post_content);
});
