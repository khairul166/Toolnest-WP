<?php

if (!defined('ABSPATH')) {
    exit;
}

function toolnest_enqueue_assets()
{
    wp_enqueue_style(
        'toolnest-google-fonts',
        'https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        null
    );
    wp_enqueue_style(
        'toolnest-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
        [],
        '5.3.3'
    );
    wp_enqueue_style(
        'toolnest-bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        [],
        '1.11.3'
    );

    $stylesheet_path = get_theme_file_path('/assets/css/main.css');
    wp_enqueue_style(
        'toolnest-main',
        get_theme_file_uri('/assets/css/main.css'),
        ['toolnest-google-fonts', 'toolnest-bootstrap', 'toolnest-bootstrap-icons'],
        filemtime($stylesheet_path)
    );

    wp_enqueue_script(
        'toolnest-bootstrap',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
        [],
        '5.3.3',
        true
    );

    $script_path = get_theme_file_path('/assets/js/main.js');
    wp_enqueue_script(
        'toolnest-main',
        get_theme_file_uri('/assets/js/main.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );



    // wp_add_inline_script(
    //     'toolnest-main',
    //     'window.toolnestToolsUrl = ' . wp_json_encode(get_permalink(get_page_by_path('all-tools'))) . ';',
    //     'before'
    // );

    // $tool_posts = get_posts([
    //     'post_type' => 'tool',
    //     'post_status' => 'publish',
    //     'posts_per_page' => -1,
    //     'orderby' => 'title',
    //     'order' => 'ASC',
    // ]);
    // $tools = [];
    // foreach ($tool_posts as $tool_post) {
    //     $categories = get_the_terms($tool_post->ID, 'tool_category');
    //     $category = !is_wp_error($categories) && !empty($categories) ? $categories[0]->name : '';
    //     $tools[] = [
    //         'id' => get_post_meta($tool_post->ID, '_toolnest_source_id', true) ?: $tool_post->post_name,
    //         'name' => get_the_title($tool_post),
    //         'url' => get_permalink($tool_post),
    //         'category' => $category,
    //         'icon' => get_post_meta($tool_post->ID, '_toolnest_tool_icon', true),
    //         'desc' => get_the_excerpt($tool_post),
    //         'keywords' => get_post_meta($tool_post->ID, '_toolnest_tool_keywords', true),
    //     ];
    // }
    // wp_localize_script('toolnest-main', 'toolnestTools', $tools);
}
add_action('wp_enqueue_scripts', 'toolnest_enqueue_assets');