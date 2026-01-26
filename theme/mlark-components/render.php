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
