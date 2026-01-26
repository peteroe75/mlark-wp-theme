<?php
defined('ABSPATH') || exit;

add_action('init', function () {

    register_post_type('component', [
        'label' => 'Components',
        'public' => false,
        'show_ui' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor'],
        'exclude_from_search' => true,
        'publicly_queryable' => false,
        'has_archive' => false,
        'rewrite' => false,
        'menu_icon' => 'dashicons-screenoptions',
    ]);

});

add_action('save_post_component', function ($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    $role = get_post_meta($post_id, 'component_role', true);
    if (!$role || !in_array($role, ['header', 'footer'], true)) return;

    $existing = get_posts([
        'post_type' => 'component',
        'post_status' => 'publish',
        'meta_key' => 'component_role',
        'meta_value' => $role,
        'post__not_in' => [$post_id],
        'numberposts' => 1,
    ]);

    if ($existing) {
        wp_die(
            ucfirst($role) . ' already exists. Only one ' . $role . ' component is allowed.'
        );
    }

});
