<?php

if (!defined('ABSPATH')) {
    exit;
}

function toolnest_register_tool_content()
{
    register_post_type('tool', [
        'labels' => [
            'name' => __('Tools', 'toolnest'),
            'menu_name' => __('Tool Library', 'toolnest'),
            'singular_name' => __('Tool', 'toolnest'),
            'add_new_item' => __('Add New Tool', 'toolnest'),
            'edit_item' => __('Edit Tool', 'toolnest'),
            'all_items' => __('All Tools', 'toolnest'),
        ],
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'excerpt'],
        'has_archive' => false,
    ]);

    register_taxonomy('tool_category', ['tool'], [
        'labels' => [
            'name' => __('Tool Categories', 'toolnest'),
            'singular_name' => __('Tool Category', 'toolnest'),
            'all_items' => __('All Tool Categories', 'toolnest'),
            'edit_item' => __('Edit Tool Category', 'toolnest'),
            'add_new_item' => __('Add New Tool Category', 'toolnest'),
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'hierarchical' => true,
        'query_var' => false,
    ]);
}
add_action('init', 'toolnest_register_tool_content');

function toolnest_track_tool_view()
{
    if (!is_singular('tool') || is_preview()) {
        return;
    }

    $tool_id = get_queried_object_id();
    if (!$tool_id || 'publish' !== get_post_status($tool_id)) {
        return;
    }

    $view_count = (int) get_post_meta($tool_id, '_toolnest_view_count', true);
    update_post_meta($tool_id, '_toolnest_view_count', $view_count + 1);
}
add_action('template_redirect', 'toolnest_track_tool_view');

function toolnest_tool_breadcrumb()
{
    $all_tools_page = get_page_by_path('all-tools');
    $all_tools_url = $all_tools_page ? get_permalink($all_tools_page) : home_url('/all-tools/');
    ?>
    <nav aria-label="<?php esc_attr_e('Breadcrumb', 'toolnest'); ?>" class="tn-breadcrumb">
      <ol class="breadcrumb mb-2">
        <li class="breadcrumb-item">
          <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'toolnest'); ?></a>
        </li>
        <li class="breadcrumb-item">
          <a href="<?php echo esc_url($all_tools_url); ?>"><?php esc_html_e('All Tools', 'toolnest'); ?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html(get_the_title()); ?></li>
      </ol>
    </nav>
    <?php
}
