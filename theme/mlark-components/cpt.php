<?php
defined('ABSPATH') || exit;

add_action('init', function () {

    register_post_type('component', [
        'labels' => [
            'name'          => 'Components',
            'singular_name' => 'Component',
        ],

        // ADMIN UI
        'show_ui'      => true,
        'show_in_menu' => true,
        'menu_icon'    => 'dashicons-screenoptions',

        // EDITOR
        'supports'     => ['title', 'editor'],
        'show_in_rest' => true,

        // FRONTEND (locked)
        'public'              => false,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'has_archive'         => false,
        'rewrite'             => false,
    ]);
});

add_action('init', function () {

    register_post_meta('component', 'component_role', [
        'type'              => 'string',
        'single'            => true,
        'show_in_rest'      => true,
        'sanitize_callback' => 'sanitize_text_field',
        'auth_callback'     => function () {
            return current_user_can('edit_posts');
        },
    ]);

});

add_filter('manage_component_posts_columns', function ($columns) {
    $columns['component_role'] = 'Role';
    return $columns;
});

add_action('manage_component_posts_custom_column', function ($column, $post_id) {
    if ($column === 'component_role') {
        echo esc_html(get_post_meta($post_id, 'component_role', true));
    }
}, 10, 2);


add_action('quick_edit_custom_box', function ($column, $post_type) {

    if ($post_type !== 'component' || $column !== 'component_role') {
        return;
    }
    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label>
                <span class="title">Component Role</span>
                <select name="component_role">
                    <option value="">—</option>
                    <option value="header">Header</option>
                    <option value="footer">Footer</option>
                    <option value="section">Section</option>
                </select>
            </label>
        </div>
    </fieldset>
    <?php
}, 10, 2);

add_action('admin_footer-edit.php', function () {
    global $post_type;
    if ($post_type !== 'component') return;
    ?>
    <script>
    jQuery(function($) {
        const $edit = inlineEditPost.edit;
        inlineEditPost.edit = function(id) {
            $edit.apply(this, arguments);

            let postId = 0;
            if (typeof(id) === 'object') {
                postId = parseInt(this.getId(id));
            } else {
                postId = id;
            }

            if (!postId) return;

            const role = $('#post-' + postId + ' td.column-component_role').text().trim();
            $('.inline-edit-row select[name="component_role"]').val(role);
        };
    });
    </script>
    <?php
});


add_action('save_post_component', function ($post_id) {

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (!isset($_POST['component_role'])) return;

    $role = sanitize_text_field($_POST['component_role']);

    if (!in_array($role, ['header', 'footer', 'section'], true)) {
        delete_post_meta($post_id, 'component_role');
        return;
    }

    update_post_meta($post_id, 'component_role', $role);

});
