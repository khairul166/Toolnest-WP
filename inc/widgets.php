<?php

if (!defined('ABSPATH')) {
    exit;
}

function toolnest_register_widget_areas()
{
    register_sidebar([
        'name' => __('Header Leaderboard Ad Slot', 'toolnest'),
        'id' => 'header-leaderboard-ad',
        'description' => __('Displays directly below the site header.', 'toolnest'),
        'before_widget' => '',
        'after_widget' => '',
    ]);

    register_sidebar([
        'name' => __('Tool Page Sidebar', 'toolnest'),
        'id' => 'tool-page-sidebar',
        'description' => __('Displays beside individual tool pages.', 'toolnest'),
        'before_widget' => '',
        'after_widget' => '',
    ]);

    register_sidebar([
        'name' => __('Tool In-Content Ad Slot', 'toolnest'),
        'id' => 'tool-incontent-ad',
        'description' => __('Displays after the tool workspace in tool shortcodes.', 'toolnest'),
        'before_widget' => '',
        'after_widget' => '',
    ]);

    register_sidebar([
        'name' => __('Above Footer Ad Slot', 'toolnest'),
        'id' => 'above-footer-ad',
        'description' => __('Displays above the site footer.', 'toolnest'),
        'before_widget' => '',
        'after_widget' => '',
    ]);

    register_sidebar([
        'name' => __('Footer Widget 1', 'toolnest'),
        'id' => 'footer-widget',
        'description' => __('Displays the first widget column in the site footer.', 'toolnest'),
        'before_widget' => '',
        'after_widget' => '',
    ]);

    // register_sidebar([
    //     'name' => __('Footer Tool Links', 'toolnest'),
    //     'id' => 'footer-tool-links',
    //     'description' => __('Displays selected Tool posts in the footer tools column.', 'toolnest'),
    //     'before_widget' => '',
    //     'after_widget' => '',
    // ]);

    register_widget('ToolNest_Leaderboard_Ad_Widget');
    register_widget('ToolNest_Sidebar_Ad_Widget');
    register_widget('ToolNest_Quick_Tool_Navigation_Widget');
    register_widget('ToolNest_Incontent_Ad_Widget');
    register_widget('ToolNest_Footer_Ad_Widget');
    register_widget('ToolNest_Footer_About_Widget');
    register_widget('ToolNest_Popular_Tools_Widget');
    register_widget('ToolNest_Important_Pages_Widget');
    register_widget('ToolNest_Footer_Tool_Links_Widget');
}
add_action('widgets_init', 'toolnest_register_widget_areas');

class ToolNest_Footer_Tool_Links_Widget extends WP_Widget
{
    private $default_tool_slugs = [
        'image-compressor',
        'background-remover',
        'image-upscaler',
        'image-resizer',
        'bulk-image-resizer',
        'image-format-converter',
        'color-picker',
        'pdf-merge-split',
        'pdf-to-word',
        'pdf-to-excel',
        'word-to-pdf',
        'excel-to-pdf',
        'image-to-pdf',
        'pdf-to-jpg',
        'qr-code-generator',
        'text-tools',
    ];

    public function __construct()
    {
        parent::__construct(
            'toolnest_footer_tool_links',
            __('ToolNest Footer Tool Links', 'toolnest'),
            ['description' => __('Displays selected Tool posts as links in the footer.', 'toolnest')]
        );
    }

    private function get_tools()
    {
        return get_posts([
            'post_type' => 'tool',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'no_found_rows' => true,
        ]);
    }

    private function get_default_tool_ids($tools)
    {
        $tool_ids = [];

        foreach ($tools as $tool) {
            if (in_array($tool->post_name, $this->default_tool_slugs, true)) {
                $tool_ids[] = (int) $tool->ID;
            }
        }

        return $tool_ids;
    }

    public function widget($args, $instance)
    {
        $tools = $this->get_tools();
        $selected_tool_ids = isset($instance['selected_tools'])
            ? array_map('absint', (array) $instance['selected_tools'])
            : $this->get_default_tool_ids($tools);
        $selected_tools = array_values(array_filter($tools, static function ($tool) use ($selected_tool_ids) {
            return in_array((int) $tool->ID, $selected_tool_ids, true);
        }));

        if (empty($selected_tools)) {
            return;
        }

        $title = isset($instance['title'])
            ? trim($instance['title'])
            : __('Image, PDF & Text Utilities', 'toolnest');
        ?>
        <div class="col-6 col-md-4 col-lg-4">
          <?php if ('' !== $title) : ?>
            <h2 class="tn-footer__title"><?php echo esc_html($title); ?></h2>
          <?php endif; ?>
          <ul class="tn-footer__list">
            <?php foreach ($selected_tools as $tool) : ?>
              <li><a href="<?php echo esc_url(get_permalink($tool)); ?>" class="tn-footer__link"><?php echo esc_html(get_the_title($tool)); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : __('Image, PDF & Text Utilities', 'toolnest');
        $tools = $this->get_tools();
        $selected_tool_ids = isset($instance['selected_tools'])
            ? array_map('absint', (array) $instance['selected_tools'])
            : $this->get_default_tool_ids($tools);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_html_e('Heading:', 'toolnest'); ?>
            </label>
            <input
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>
        <p><?php esc_html_e('Select Tool posts to display:', 'toolnest'); ?></p>
        <?php if (empty($tools)) : ?>
            <p><?php esc_html_e('No published Tool posts are available.', 'toolnest'); ?></p>
        <?php else : ?>
            <?php foreach ($tools as $tool) : ?>
                <p>
                    <label>
                        <input
                            type="checkbox"
                            name="<?php echo esc_attr($this->get_field_name('selected_tools')); ?>[]"
                            value="<?php echo esc_attr((string) $tool->ID); ?>"
                            <?php checked(in_array((int) $tool->ID, $selected_tool_ids, true)); ?>>
                        <?php echo esc_html(get_the_title($tool)); ?>
                    </label>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $selected_tool_ids = isset($new_instance['selected_tools']) && is_array($new_instance['selected_tools'])
            ? array_map('absint', $new_instance['selected_tools'])
            : [];

        return [
            'title' => isset($new_instance['title']) ? sanitize_text_field($new_instance['title']) : '',
            'selected_tools' => array_values(array_unique(array_filter($selected_tool_ids))),
        ];
    }
}

class ToolNest_Popular_Tools_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_popular_tools',
            __('Popular Tools', 'toolnest'),
            ['description' => __('Displays the 10 most viewed published tools.', 'toolnest')]
        );
    }

    public function widget($args, $instance)
    {
        $tools = get_posts([
            'post_type' => 'tool',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
            'no_found_rows' => true,
        ]);

        usort($tools, static function ($first, $second) {
            $view_difference = (int) get_post_meta($second->ID, '_toolnest_view_count', true)
                - (int) get_post_meta($first->ID, '_toolnest_view_count', true);

            return 0 !== $view_difference
                ? $view_difference
                : strcasecmp($first->post_title, $second->post_title);
        });
        $tools = array_slice($tools, 0, 10);

        if (empty($tools)) {
            return;
        }
        ?>
        <div class="col-6 col-md-4 col-lg-3">
          <h2 class="tn-footer__title"><?php esc_html_e('Popular Tools', 'toolnest'); ?></h2>
          <ul class="tn-footer__list">
            <?php foreach ($tools as $tool) : ?>
              <li><a href="<?php echo esc_url(get_permalink($tool)); ?>" class="tn-footer__link"><?php echo esc_html(get_the_title($tool)); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php
    }
}

class ToolNest_Important_Pages_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_important_pages',
            __('Important Pages', 'toolnest'),
            ['description' => __('Displays selected pages as links.', 'toolnest')]
        );
    }

    private function get_pages()
    {
        return get_pages([
            'post_status' => 'publish',
            'sort_column' => 'post_title',
            'sort_order' => 'ASC',
        ]);
    }

    public function widget($args, $instance)
    {
        $selected_page_ids = isset($instance['selected_pages'])
            ? array_map('absint', (array) $instance['selected_pages'])
            : [];
        $selected_pages = array_values(array_filter($this->get_pages(), static function ($page) use ($selected_page_ids) {
            return in_array((int) $page->ID, $selected_page_ids, true);
        }));

        if (empty($selected_pages)) {
            return;
        }
        ?>
        <div class="col-6 col-md-4 col-lg-2">
          <h2 class="tn-footer__title"><?php esc_html_e('Important Pages', 'toolnest'); ?></h2>
          <ul class="tn-footer__list">
            <?php foreach ($selected_pages as $page) : ?>
              <li><a href="<?php echo esc_url(get_permalink($page)); ?>" class="tn-footer__link"><?php echo esc_html(get_the_title($page)); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <?php
    }

    public function form($instance)
    {
        $pages = $this->get_pages();
        $selected_page_ids = isset($instance['selected_pages'])
            ? array_map('absint', (array) $instance['selected_pages'])
            : [];
        ?>
        <p><?php esc_html_e('Select pages to display:', 'toolnest'); ?></p>
        <?php if (empty($pages)) : ?>
            <p><?php esc_html_e('No published pages are available.', 'toolnest'); ?></p>
        <?php else : ?>
            <?php foreach ($pages as $page) : ?>
                <p>
                    <label>
                        <input
                            type="checkbox"
                            name="<?php echo esc_attr($this->get_field_name('selected_pages')); ?>[]"
                            value="<?php echo esc_attr((string) $page->ID); ?>"
                            <?php checked(in_array((int) $page->ID, $selected_page_ids, true)); ?>>
                        <?php echo esc_html(get_the_title($page)); ?>
                    </label>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $selected_page_ids = isset($new_instance['selected_pages']) && is_array($new_instance['selected_pages'])
            ? array_map('absint', $new_instance['selected_pages'])
            : [];

        return [
            'selected_pages' => array_values(array_unique(array_filter($selected_page_ids))),
        ];
    }
}

class ToolNest_Footer_About_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_footer_about',
            __('ToolNest About', 'toolnest'),
            ['description' => __('Displays the ToolNest logo and about information in the footer.', 'toolnest')]
        );
    }

    public function widget($args, $instance)
    {
        ?>
        <div class="col-lg-3">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="d-inline-block mb-3" aria-label="<?php esc_attr_e('ToolNest Home', 'toolnest'); ?>">
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo.svg')); ?>" alt="<?php esc_attr_e('ToolNest Logo', 'toolnest'); ?>" width="170" height="36" loading="lazy"
                style="filter: brightness(0) invert(1);">
            </a>
            <p class="small mb-3">
            <strong>ToolNest</strong> — Free online tools that just work. All utilities run 100% in your browser so your
            files and data never leave your device.
            </p>
            <span class="badge bg-success bg-opacity-25 text-white border border-success border-opacity-50 px-3 py-2">
            <i class="bi bi-lock-fill me-1" aria-hidden="true"></i> 100% Client-Side Privacy
            </span>
        </div>
        <?php
    }
}

function toolnest_render_footer_ad_slot()
{
    if (is_active_sidebar('above-footer-ad')) {
        dynamic_sidebar('above-footer-ad');
        return;
    }

    echo '<aside class="tn-ad-slot tn-ad-slot--footer" aria-label="' . esc_attr__('Advertisement', 'toolnest') . '">';
    echo '<span class="tn-ad-slot__label">' . esc_html__('Advertisement', 'toolnest') . '</span>';
    echo '<div class="tn-ad-slot__placeholder">' . esc_html__('Above-Footer Banner Ad Slot (728 × 90 / Responsive)', 'toolnest') . '</div>';
    echo '</aside>';
}

class ToolNest_Footer_Ad_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_footer_ad',
            __('ToolNest Above Footer Ad Slot', 'toolnest'),
            ['description' => __('An ad widget matching the above-footer banner slot.', 'toolnest')]
        );
    }

    public function widget($args, $instance)
    {
        $content = isset($instance['content']) ? trim($instance['content']) : '';
        if ('' === $content) {
            $content = __('Above-Footer Banner Ad Slot (728 × 90 / Responsive)', 'toolnest');
        }

        echo '<div class="container">';
        echo '<aside class="tn-ad-slot tn-ad-slot--footer" aria-label="' . esc_attr__('Advertisement', 'toolnest') . '">';
        echo '<span class="tn-ad-slot__label">' . esc_html__('Advertisement', 'toolnest') . '</span>';
        echo '<div class="tn-ad-slot__placeholder">' . wp_kses_post(do_shortcode($content)) . '</div>';
        echo '</aside>';
        echo '</div>';
    }

    public function form($instance)
    {
        $content = isset($instance['content']) ? $instance['content'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>">
                <?php esc_html_e('Ad content or shortcode:', 'toolnest'); ?>
            </label>
            <textarea
                class="widefat"
                rows="5"
                id="<?php echo esc_attr($this->get_field_id('content')); ?>"
                name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_textarea($content); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return [
            'content' => isset($new_instance['content'])
                ? wp_kses_post($new_instance['content'])
                : '',
        ];
    }
}

function toolnest_render_incontent_ad_slot()
{
    if (is_active_sidebar('tool-incontent-ad')) {
        dynamic_sidebar('tool-incontent-ad');
        return;
    }

    echo '<aside class="tn-ad-slot tn-ad-slot--incontent" aria-label="' . esc_attr__('Advertisement', 'toolnest') . '">';
    echo '<span class="tn-ad-slot__label">' . esc_html__('Advertisement', 'toolnest') . '</span>';
    echo '<div class="tn-ad-slot__placeholder">' . esc_html__('In-Content Responsive Ad Slot', 'toolnest') . '</div>';
    echo '</aside>';
}

class ToolNest_Incontent_Ad_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_incontent_ad',
            __('ToolNest In-Content Ad Slot', 'toolnest'),
            ['description' => __('An ad widget for in-content tool ad slots.', 'toolnest')]
        );
    }

    public function widget($args, $instance)
    {
        $content = isset($instance['content']) ? trim($instance['content']) : '';
        if ('' === $content) {
            $content = __('In-Content Responsive Ad Slot', 'toolnest');
        }

        echo '<aside class="tn-ad-slot tn-ad-slot--incontent" aria-label="' . esc_attr__('Advertisement', 'toolnest') . '">';
        echo '<span class="tn-ad-slot__label">' . esc_html__('Advertisement', 'toolnest') . '</span>';
        echo '<div class="tn-ad-slot__placeholder">' . wp_kses_post(do_shortcode($content)) . '</div>';
        echo '</aside>';
    }

    public function form($instance)
    {
        $content = isset($instance['content']) ? $instance['content'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>">
                <?php esc_html_e('Ad content or shortcode:', 'toolnest'); ?>
            </label>
            <textarea
                class="widefat"
                rows="5"
                id="<?php echo esc_attr($this->get_field_id('content')); ?>"
                name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_textarea($content); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return [
            'content' => isset($new_instance['content'])
                ? wp_kses_post($new_instance['content'])
                : '',
        ];
    }
}

class ToolNest_Quick_Tool_Navigation_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_quick_tool_navigation',
            __('ToolNest Quick Tool Navigation', 'toolnest'),
            ['description' => __('Displays links to frequently used tools in the tool page sidebar.', 'toolnest')]
        );
    }

    private function get_tools()
    {
        return get_posts([
            'post_type' => 'tool',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);
    }

    private function get_default_selected_tool_ids($tools)
    {
        $default_slugs = [
            'bijoy-to-unicode',
            'invoice-generator',
            'age-calculator',
            'qr-code-generator',
            'pdf-merge-split',
            'passport-photo-maker',
        ];
        $selected_tool_ids = [];

        foreach ($tools as $tool) {
            if (in_array($tool->post_name, $default_slugs, true)) {
                $selected_tool_ids[] = (int) $tool->ID;
            }
        }

        return $selected_tool_ids;
    }

    public function widget($args, $instance)
    {
        $tools = $this->get_tools();
        $selected_tool_ids = isset($instance['selected_tools'])
            ? array_map('absint', (array) $instance['selected_tools'])
            : $this->get_default_selected_tool_ids($tools);
        $selected_tools = array_values(array_filter($tools, static function ($tool) use ($selected_tool_ids) {
            return in_array((int) $tool->ID, $selected_tool_ids, true);
        }));

        if (empty($selected_tools)) {
            return;
        }

        echo '<div class="tn-card">';
        echo '<h2 class="h6 fw-bold mb-3"><i class="bi bi-grid-fill text-primary me-1" aria-hidden="true"></i> ';
        echo esc_html__('Quick Tools', 'toolnest') . '</h2>';
        echo '<ul class="list-unstyled mb-0 small">';

        foreach ($selected_tools as $index => $tool) {
            $item_class = $index === count($selected_tools) - 1 ? 'mb-0' : 'mb-2';
            printf(
                '<li class="%1$s"><a href="%2$s" class="fw-medium">%3$s</a></li>',
                esc_attr($item_class),
                esc_url(get_permalink($tool)),
                esc_html(get_the_title($tool))
            );
        }

        echo '</ul>';
        echo '</div>';
    }

    public function form($instance)
    {
        $tools = $this->get_tools();
        $selected_tool_ids = isset($instance['selected_tools'])
            ? array_map('absint', (array) $instance['selected_tools'])
            : $this->get_default_selected_tool_ids($tools);

        if (empty($tools)) {
            esc_html_e('No published tools are available.', 'toolnest');
            return;
        }
        ?>
        <p><?php esc_html_e('Select tools to display:', 'toolnest'); ?></p>
        <?php foreach ($tools as $tool) : ?>
            <p>
                <label>
                    <input
                        type="checkbox"
                        name="<?php echo esc_attr($this->get_field_name('selected_tools')); ?>[]"
                        value="<?php echo esc_attr((string) $tool->ID); ?>"
                        <?php checked(in_array((int) $tool->ID, $selected_tool_ids, true)); ?>>
                    <?php echo esc_html(get_the_title($tool)); ?>
                </label>
            </p>
        <?php endforeach; ?>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $selected_tool_ids = isset($new_instance['selected_tools']) && is_array($new_instance['selected_tools'])
            ? array_map('absint', $new_instance['selected_tools'])
            : [];

        return [
            'selected_tools' => array_values(array_unique(array_filter($selected_tool_ids))),
        ];
    }
}

class ToolNest_Sidebar_Ad_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_sidebar_ad',
            __('ToolNest Sidebar Ad Slot', 'toolnest'),
            ['description' => __('An ad widget matching the tool page sidebar slot.', 'toolnest')]
        );
    }

    public function widget($args, $instance)
    {
        $content = isset($instance['content']) ? trim($instance['content']) : '';
        if ('' === $content) {
            $content = __('Sticky Sidebar Ad Slot (300 &times; 250)', 'toolnest');
        }

        echo '<aside class="tn-ad-slot tn-ad-slot--sidebar" aria-label="' . esc_attr__('Advertisement', 'toolnest') . '">';
        echo '<span class="tn-ad-slot__label">' . esc_html__('Advertisement', 'toolnest') . '</span>';
        echo '<div class="tn-ad-slot__placeholder">' . wp_kses_post(do_shortcode($content)) . '</div>';
        echo '</aside>';
    }

    public function form($instance)
    {
        $content = isset($instance['content']) ? $instance['content'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>">
                <?php esc_html_e('Ad content or shortcode:', 'toolnest'); ?>
            </label>
            <textarea
                class="widefat"
                rows="5"
                id="<?php echo esc_attr($this->get_field_id('content')); ?>"
                name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_textarea($content); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return [
            'content' => isset($new_instance['content'])
                ? wp_kses_post($new_instance['content'])
                : '',
        ];
    }
}

class ToolNest_Leaderboard_Ad_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'toolnest_leaderboard_ad',
            __('ToolNest Leaderboard Ad Slot', 'toolnest'),
            ['description' => __('An ad widget matching the theme header leaderboard slot.', 'toolnest')]
        );
    }

    public function widget($args, $instance)
    {
        $content = isset($instance['content']) ? trim($instance['content']) : '';

        echo '<div class="container">';
        echo '<aside class="tn-ad-slot tn-ad-slot--leaderboard" aria-label="' . esc_attr__('Advertisement', 'toolnest') . '">';
        if ('' === $content) {
            echo '<span class="tn-ad-slot__label">' . esc_html__('Advertisement', 'toolnest') . '</span>';
            $content = __('Responsive Leaderboard Ad Slot (728 &times; 90 / 320 &times; 50)', 'toolnest');
        }
        echo '<div class="tn-ad-slot__placeholder">' . wp_kses_post(do_shortcode($content)) . '</div>';
        echo '</aside>';
        echo '</div>';
    }

    public function form($instance)
    {
        $content = isset($instance['content']) ? $instance['content'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>">
                <?php esc_html_e('Ad content or shortcode:', 'toolnest'); ?>
            </label>
            <textarea
                class="widefat"
                rows="5"
                id="<?php echo esc_attr($this->get_field_id('content')); ?>"
                name="<?php echo esc_attr($this->get_field_name('content')); ?>"><?php echo esc_textarea($content); ?></textarea>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        return [
            'content' => isset($new_instance['content'])
                ? wp_kses_post($new_instance['content'])
                : '',
        ];
    }
}
