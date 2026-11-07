<?php

require_once get_theme_file_path('/inc/enqueue.php');
require_once get_theme_file_path('/inc/tools-enqueue.php');
require_once get_theme_file_path('/inc/tool-post-type.php');
require_once get_theme_file_path('/inc/shortcodes.php');
require_once get_theme_file_path('/inc/widgets.php');

function toolnest_page_breadcrumb()
{
    if (!is_page()) {
        return;
    }

    $page_id = get_queried_object_id();
    if (!$page_id) {
        return;
    }

    $ancestor_ids = array_reverse(get_post_ancestors($page_id));
    ?>
    <nav aria-label="<?php esc_attr_e('Breadcrumb', 'toolnest'); ?>" class="tn-breadcrumb">
      <ol class="breadcrumb mb-2">
        <li class="breadcrumb-item">
          <a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'toolnest'); ?></a>
        </li>
        <?php foreach ($ancestor_ids as $ancestor_id) : ?>
          <li class="breadcrumb-item">
            <a href="<?php echo esc_url(get_permalink($ancestor_id)); ?>"><?php echo esc_html(get_the_title($ancestor_id)); ?></a>
          </li>
        <?php endforeach; ?>
        <li class="breadcrumb-item active" aria-current="page"><?php echo esc_html(get_the_title($page_id)); ?></li>
      </ol>
    </nav>
    <?php
}

function toolnest_register_nav_menus()
{
    add_theme_support('title-tag');
    register_nav_menus([
        'primary' => __('Primary Menu', 'toolnest'),
    ]);
}
add_action('after_setup_theme', 'toolnest_register_nav_menus');

function toolnest_menu_item_mega_menu_field($item_id, $menu_item, $depth)
{
    if (0 !== (int) $depth) {
        return;
    }

    $enabled = '1' === get_post_meta($item_id, '_toolnest_mega_menu', true);
    ?>
    <p class="description description-wide">
        <label for="edit-menu-item-toolnest-mega-<?php echo esc_attr($item_id); ?>">
            <input
                type="checkbox"
                id="edit-menu-item-toolnest-mega-<?php echo esc_attr($item_id); ?>"
                name="toolnest_mega_menu[<?php echo esc_attr($item_id); ?>]"
                value="1"
                <?php checked($enabled); ?>>
            <?php esc_html_e('Display this item as a mega menu', 'toolnest'); ?>
        </label>
    </p>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'toolnest_menu_item_mega_menu_field', 10, 3);

function toolnest_save_menu_item_mega_menu($menu_id, $menu_item_db_id)
{
    if (!current_user_can('edit_theme_options')) {
        return;
    }

    $enabled_items = isset($_POST['toolnest_mega_menu']) && is_array($_POST['toolnest_mega_menu'])
        ? wp_unslash($_POST['toolnest_mega_menu'])
        : [];
    $enabled = isset($enabled_items[$menu_item_db_id])
        && is_scalar($enabled_items[$menu_item_db_id])
        && '1' === sanitize_text_field((string) $enabled_items[$menu_item_db_id]);

    if ($enabled) {
        update_post_meta($menu_item_db_id, '_toolnest_mega_menu', '1');
    } else {
        delete_post_meta($menu_item_db_id, '_toolnest_mega_menu');
    }
}
add_action('wp_update_nav_menu_item', 'toolnest_save_menu_item_mega_menu', 10, 2);

function toolnest_primary_menu_item_classes($classes, $item, $args)
{
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        $classes[] = 'nav-item';

        if (empty($item->menu_item_parent) && '1' === get_post_meta($item->ID, '_toolnest_mega_menu', true)) {
            $classes[] = 'tn-mega-menu-enabled';
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'toolnest_primary_menu_item_classes', 10, 3);

function toolnest_primary_menu_link_classes($atts, $item, $args)
{
    if (isset($args->theme_location) && 'primary' === $args->theme_location) {
        $atts['class'] = isset($atts['class'])
            ? $atts['class'] . ' nav-link tn-header__nav-link'
            : 'nav-link tn-header__nav-link';
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'toolnest_primary_menu_link_classes', 10, 3);

function toolnest_primary_menu_fallback($args)
{
    $items = [
        ['Home', home_url('/')],
        ['All Tools', get_permalink(get_page_by_path('all-tools'))],
        ['Categories', home_url('/#categories')],
        ['Blog', get_permalink(get_page_by_path('blog'))],
        ['Contact', get_permalink(get_page_by_path('contact'))],
    ];
    $output = '<ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-1">';

    foreach ($items as $item) {
        $output .= sprintf(
            '<li class="nav-item"><a class="nav-link tn-header__nav-link" href="%s">%s</a></li>',
            esc_url($item[1]),
            esc_html($item[0])
        );
    }

    return $output . '</ul>';
}