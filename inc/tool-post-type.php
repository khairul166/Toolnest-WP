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
        'taxonomies' => ['tool_category', 'tool_tag'],
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

    register_taxonomy('tool_tag', ['tool'], [
        'labels' => [
            'name' => __('Tool Tags', 'toolnest'),
            'singular_name' => __('Tool Tag', 'toolnest'),
            'all_items' => __('All Tool Tags', 'toolnest'),
            'edit_item' => __('Edit Tool Tag', 'toolnest'),
            'add_new_item' => __('Add New Tool Tag', 'toolnest'),
        ],
        'public' => false,
        'show_ui' => true,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'show_in_rest' => true,
        'hierarchical' => false,
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

/**
 * Resolve stored tool icon meta value into a full CSS class string.
 * Supports Font Awesome 6 classes (e.g. "fa-solid fa-calculator") as well as legacy Bootstrap Icons ("bi-...").
 */
function toolnest_get_tool_icon_class($icon = '')
{
    $icon = trim((string) $icon);

    if ('' === $icon) {
        return 'fa-solid fa-screwdriver-wrench';
    }

    if (0 === strpos($icon, 'bi ') || 0 === strpos($icon, 'bi-')) {
        return 0 === strpos($icon, 'bi ') ? $icon : 'bi ' . $icon;
    }

    if (preg_match('/\b(fa-solid|fa-regular|fa-brands|fas|far|fab)\b/', $icon)) {
        return $icon;
    }

    if (0 === strpos($icon, 'fa-')) {
        return 'fa-solid ' . $icon;
    }

    return $icon;
}

/**
 * Return curated list of Font Awesome 6 Free icons for the Tool Icon visual picker.
 */
function toolnest_get_fontawesome_icons()
{
    return [
        // Calculators, Numbers & Converters
        ['class' => 'fa-solid fa-calculator', 'label' => 'Calculator', 'style' => 'solid', 'keywords' => 'math age emi vat discount finance'],
        ['class' => 'fa-solid fa-arrows-rotate', 'label' => 'Convert / Sync', 'style' => 'solid', 'keywords' => 'converter refresh format bijoy unicode'],
        ['class' => 'fa-solid fa-right-left', 'label' => 'Exchange / Swap', 'style' => 'solid', 'keywords' => 'converter currency unit swap'],
        ['class' => 'fa-solid fa-language', 'label' => 'Language / Translate', 'style' => 'solid', 'keywords' => 'bangla bijoy unicode translate text'],
        ['class' => 'fa-solid fa-coins', 'label' => 'Coins / Currency', 'style' => 'solid', 'keywords' => 'money taka bdt amount words finance'],
        ['class' => 'fa-solid fa-money-bill-wave', 'label' => 'Money Bill', 'style' => 'solid', 'keywords' => 'currency taka cash amount cheque'],
        ['class' => 'fa-solid fa-sack-dollar', 'label' => 'Money Sack', 'style' => 'solid', 'keywords' => 'loan fdr dps profit finance'],
        ['class' => 'fa-solid fa-percent', 'label' => 'Percentage', 'style' => 'solid', 'keywords' => 'discount vat tax interest rate'],
        ['class' => 'fa-solid fa-scale-balanced', 'label' => 'Scale / Unit', 'style' => 'solid', 'keywords' => 'unit measure weight compare'],
        ['class' => 'fa-solid fa-ruler-combined', 'label' => 'Ruler / Area', 'style' => 'solid', 'keywords' => 'land area katha decimal bigha size'],
        ['class' => 'fa-solid fa-ruler-horizontal', 'label' => 'Ruler Horizontal', 'style' => 'solid', 'keywords' => 'measure length dimension'],
        ['class' => 'fa-solid fa-calendar-check', 'label' => 'Calendar Check', 'style' => 'solid', 'keywords' => 'age calculator date birth schedule'],
        ['class' => 'fa-solid fa-calendar-days', 'label' => 'Calendar Days', 'style' => 'solid', 'keywords' => 'date age month year'],
        ['class' => 'fa-regular fa-calendar-check', 'label' => 'Calendar (Regular)', 'style' => 'regular', 'keywords' => 'date age schedule'],
        ['class' => 'fa-solid fa-clock', 'label' => 'Clock / Time', 'style' => 'solid', 'keywords' => 'timer countdown hours'],
        ['class' => 'fa-regular fa-clock', 'label' => 'Clock (Regular)', 'style' => 'regular', 'keywords' => 'timer time'],
        ['class' => 'fa-solid fa-hourglass-half', 'label' => 'Hourglass', 'style' => 'solid', 'keywords' => 'timer speed test'],

        // Image, Camera & Design Tools
        ['class' => 'fa-solid fa-image', 'label' => 'Image', 'style' => 'solid', 'keywords' => 'photo picture resizer compressor'],
        ['class' => 'fa-regular fa-image', 'label' => 'Image (Regular)', 'style' => 'regular', 'keywords' => 'photo picture'],
        ['class' => 'fa-solid fa-images', 'label' => 'Multiple Images', 'style' => 'solid', 'keywords' => 'bulk image gallery batch photos'],
        ['class' => 'fa-regular fa-images', 'label' => 'Images (Regular)', 'style' => 'regular', 'keywords' => 'gallery batch photos'],
        ['class' => 'fa-solid fa-crop-simple', 'label' => 'Crop / Resize', 'style' => 'solid', 'keywords' => 'image resizer aspect ratio crop'],
        ['class' => 'fa-solid fa-compress', 'label' => 'Compress', 'style' => 'solid', 'keywords' => 'image compressor shrink size'],
        ['class' => 'fa-solid fa-expand', 'label' => 'Expand / Upscale', 'style' => 'solid', 'keywords' => 'image upscaler enlarge fullscreen'],
        ['class' => 'fa-solid fa-magnifying-glass-plus', 'label' => 'Zoom In / Upscale', 'style' => 'solid', 'keywords' => 'upscaler 2x super resolution'],
        ['class' => 'fa-solid fa-wand-magic-sparkles', 'label' => 'AI Magic Wand', 'style' => 'solid', 'keywords' => 'ai background remover enhancer auto'],
        ['class' => 'fa-solid fa-eraser', 'label' => 'Eraser / BG Remove', 'style' => 'solid', 'keywords' => 'background remover clear clean'],
        ['class' => 'fa-solid fa-eye-dropper', 'label' => 'Eyedropper / Color', 'style' => 'solid', 'keywords' => 'color picker hex rgb palette'],
        ['class' => 'fa-solid fa-palette', 'label' => 'Color Palette', 'style' => 'solid', 'keywords' => 'color picker design theme'],
        ['class' => 'fa-solid fa-id-card', 'label' => 'ID / Passport Card', 'style' => 'solid', 'keywords' => 'passport photo visa id maker'],
        ['class' => 'fa-regular fa-id-card', 'label' => 'ID Card (Regular)', 'style' => 'regular', 'keywords' => 'passport photo profile'],
        ['class' => 'fa-solid fa-camera', 'label' => 'Camera', 'style' => 'solid', 'keywords' => 'photo capture snapshot'],
        ['class' => 'fa-solid fa-user-tie', 'label' => 'Passport Portrait', 'style' => 'solid', 'keywords' => 'passport photo cv resume formal'],
        ['class' => 'fa-solid fa-eye', 'label' => 'Vision / Alt Text', 'style' => 'solid', 'keywords' => 'image alt text caption preview accessibility'],
        ['class' => 'fa-regular fa-eye', 'label' => 'Eye (Regular)', 'style' => 'regular', 'keywords' => 'view preview vision'],
        ['class' => 'fa-solid fa-vector-square', 'label' => 'Bounding Box / Scan', 'style' => 'solid', 'keywords' => 'document scanner perspective crop'],
        ['class' => 'fa-solid fa-signature', 'label' => 'Signature', 'style' => 'solid', 'keywords' => 'signature maker draw sign'],
        ['class' => 'fa-solid fa-pen-nib', 'label' => 'Pen Nib', 'style' => 'solid', 'keywords' => 'signature design vector draw'],

        // PDF & Document Tools
        ['class' => 'fa-solid fa-file-pdf', 'label' => 'PDF File', 'style' => 'solid', 'keywords' => 'pdf merge split convert document'],
        ['class' => 'fa-regular fa-file-pdf', 'label' => 'PDF File (Regular)', 'style' => 'regular', 'keywords' => 'pdf document'],
        ['class' => 'fa-solid fa-file-word', 'label' => 'Word File', 'style' => 'solid', 'keywords' => 'word to pdf docx doc'],
        ['class' => 'fa-regular fa-file-word', 'label' => 'Word File (Regular)', 'style' => 'regular', 'keywords' => 'word docx'],
        ['class' => 'fa-solid fa-file-excel', 'label' => 'Excel File', 'style' => 'solid', 'keywords' => 'excel to pdf xlsx csv spreadsheet'],
        ['class' => 'fa-regular fa-file-excel', 'label' => 'Excel File (Regular)', 'style' => 'regular', 'keywords' => 'excel spreadsheet'],
        ['class' => 'fa-solid fa-file-image', 'label' => 'Image File', 'style' => 'solid', 'keywords' => 'image to pdf pdf to jpg'],
        ['class' => 'fa-regular fa-file-image', 'label' => 'Image File (Regular)', 'style' => 'regular', 'keywords' => 'image to pdf jpg'],
        ['class' => 'fa-solid fa-file-zipper', 'label' => 'ZIP / Archive File', 'style' => 'solid', 'keywords' => 'compress zip batch archive'],
        ['class' => 'fa-regular fa-file-zipper', 'label' => 'ZIP File (Regular)', 'style' => 'regular', 'keywords' => 'zip archive'],
        ['class' => 'fa-solid fa-file-shield', 'label' => 'Protect File / PDF', 'style' => 'solid', 'keywords' => 'protect pdf encrypt password lock'],
        ['class' => 'fa-solid fa-file-Lines', 'label' => 'Text Document', 'style' => 'solid', 'keywords' => 'file text document'],
        ['class' => 'fa-solid fa-file-lines', 'label' => 'Document Lines', 'style' => 'solid', 'keywords' => 'text file robots doc'],
        ['class' => 'fa-regular fa-file-lines', 'label' => 'Document (Regular)', 'style' => 'regular', 'keywords' => 'text file doc'],
        ['class' => 'fa-solid fa-file-invoice', 'label' => 'Invoice File', 'style' => 'solid', 'keywords' => 'invoice bill receipt'],
        ['class' => 'fa-solid fa-file-invoice-dollar', 'label' => 'Invoice Dollar', 'style' => 'solid', 'keywords' => 'invoice generator billing courier'],
        ['class' => 'fa-solid fa-file-signature', 'label' => 'File Signature / CV', 'style' => 'solid', 'keywords' => 'contract cv resume sign'],
        ['class' => 'fa-solid fa-file-export', 'label' => 'File Export', 'style' => 'solid', 'keywords' => 'convert export output'],
        ['class' => 'fa-solid fa-file-import', 'label' => 'File Import', 'style' => 'solid', 'keywords' => 'upload import input'],
        ['class' => 'fa-solid fa-copy', 'label' => 'Combine / Copy Files', 'style' => 'solid', 'keywords' => 'merge pdf duplicate copy'],
        ['class' => 'fa-regular fa-copy', 'label' => 'Copy (Regular)', 'style' => 'regular', 'keywords' => 'duplicate copy files'],
        ['class' => 'fa-solid fa-scissors', 'label' => 'Split / Cut', 'style' => 'solid', 'keywords' => 'pdf split extract cut'],
        ['class' => 'fa-solid fa-layer-group', 'label' => 'Organize Pages', 'style' => 'solid', 'keywords' => 'create pdf organize merge stack'],
        ['class' => 'fa-solid fa-print', 'label' => 'Print', 'style' => 'solid', 'keywords' => 'print sheet a4 slip'],

        // Text, Fonts & Typing Tools
        ['class' => 'fa-solid fa-font', 'label' => 'Font / Typography', 'style' => 'solid', 'keywords' => 'text font case converter'],
        ['class' => 'fa-solid fa-bold', 'label' => 'Bold Text', 'style' => 'solid', 'keywords' => 'bold text generator unicode fancy'],
        ['class' => 'fa-solid fa-italic', 'label' => 'Italic Text', 'style' => 'solid', 'keywords' => 'italic style text'],
        ['class' => 'fa-solid fa-text-height', 'label' => 'Text Size / Counter', 'style' => 'solid', 'keywords' => 'word counter text tools'],
        ['class' => 'fa-solid fa-spell-check', 'label' => 'Spell Check / Words', 'style' => 'solid', 'keywords' => 'text grammar word count'],
        ['class' => 'fa-solid fa-paragraph', 'label' => 'Paragraph / Lorem', 'style' => 'solid', 'keywords' => 'lorem ipsum generator dummy text'],
        ['class' => 'fa-solid fa-align-left', 'label' => 'Align Text', 'style' => 'solid', 'keywords' => 'text tools format lines'],
        ['class' => 'fa-solid fa-list-ol', 'label' => 'Numbered List', 'style' => 'solid', 'keywords' => 'sort lines counter'],
        ['class' => 'fa-solid fa-keyboard', 'label' => 'Keyboard / Typing', 'style' => 'solid', 'keywords' => 'bangla typing test wpm speed'],
        ['class' => 'fa-regular fa-keyboard', 'label' => 'Keyboard (Regular)', 'style' => 'regular', 'keywords' => 'typing test input'],
        ['class' => 'fa-solid fa-quote-left', 'label' => 'Quotes / Caption', 'style' => 'solid', 'keywords' => 'caption quote text'],

        // Business, E-Commerce & Marketing Tools
        ['class' => 'fa-solid fa-qrcode', 'label' => 'QR Code', 'style' => 'solid', 'keywords' => 'qr code generator scanner barcode'],
        ['class' => 'fa-solid fa-barcode', 'label' => 'Barcode', 'style' => 'solid', 'keywords' => 'sku product scanner'],
        ['class' => 'fa-solid fa-receipt', 'label' => 'Receipt / Slip', 'style' => 'solid', 'keywords' => 'invoice generator courier slip cod'],
        ['class' => 'fa-solid fa-briefcase', 'label' => 'Business Briefcase', 'style' => 'solid', 'keywords' => 'business work cv job'],
        ['class' => 'fa-solid fa-building-columns', 'label' => 'Bank / Finance', 'style' => 'solid', 'keywords' => 'bank loan emi fdr dps cheque'],
        ['class' => 'fa-solid fa-chart-line', 'label' => 'Profit Chart', 'style' => 'solid', 'keywords' => 'profit margin analytics growth'],
        ['class' => 'fa-solid fa-chart-pie', 'label' => 'Pie Chart', 'style' => 'solid', 'keywords' => 'statistics breakdown'],
        ['class' => 'fa-solid fa-bullhorn', 'label' => 'Marketing / Campaign', 'style' => 'solid', 'keywords' => 'utm link ads promotion'],
        ['class' => 'fa-solid fa-link', 'label' => 'Link / URL', 'style' => 'solid', 'keywords' => 'utm link builder url shortener'],
        ['class' => 'fa-solid fa-truck-fast', 'label' => 'Courier / Delivery', 'style' => 'solid', 'keywords' => 'courier slip cod shipping'],
        ['class' => 'fa-solid fa-user-graduate', 'label' => 'CV / Education', 'style' => 'solid', 'keywords' => 'cv maker resume student'],
        ['class' => 'fa-solid fa-address-card', 'label' => 'Resume / Profile', 'style' => 'solid', 'keywords' => 'cv maker bio contact'],
        ['class' => 'fa-regular fa-address-card', 'label' => 'Profile (Regular)', 'style' => 'regular', 'keywords' => 'cv resume card'],

        // Developer, SEO & Security Tools
        ['class' => 'fa-solid fa-code', 'label' => 'Code / HTML', 'style' => 'solid', 'keywords' => 'developer meta tag html json'],
        ['class' => 'fa-solid fa-file-code', 'label' => 'File Code', 'style' => 'solid', 'keywords' => 'json formatter meta tag script'],
        ['class' => 'fa-regular fa-file-code', 'label' => 'File Code (Regular)', 'style' => 'regular', 'keywords' => 'code json xml'],
        ['class' => 'fa-solid fa-terminal', 'label' => 'Terminal / Dev', 'style' => 'solid', 'keywords' => 'developer webmaster console'],
        ['class' => 'fa-solid fa-laptop-code', 'label' => 'Laptop Code', 'style' => 'solid', 'keywords' => 'developer tool webmaster'],
        ['class' => 'fa-solid fa-robot', 'label' => 'Robot / AI / Bot', 'style' => 'solid', 'keywords' => 'robots.txt generator ai crawler'],
        ['class' => 'fa-solid fa-spider', 'label' => 'Crawler / Spider', 'style' => 'solid', 'keywords' => 'robots.txt seo search engine'],
        ['class' => 'fa-solid fa-magnifying-glass-chart', 'label' => 'SEO Analytics', 'style' => 'solid', 'keywords' => 'meta tag seo search ranking'],
        ['class' => 'fa-solid fa-tags', 'label' => 'Meta Tags', 'style' => 'solid', 'keywords' => 'meta tag generator seo keywords'],
        ['class' => 'fa-solid fa-key', 'label' => 'Key / Password', 'style' => 'solid', 'keywords' => 'password generator security token'],
        ['class' => 'fa-solid fa-lock', 'label' => 'Lock / Encrypt', 'style' => 'solid', 'keywords' => 'protect pdf password security'],
        ['class' => 'fa-solid fa-shield-halved', 'label' => 'Security Shield', 'style' => 'solid', 'keywords' => 'privacy security password protect'],
        ['class' => 'fa-solid fa-fingerprint', 'label' => 'Fingerprint / Auth', 'style' => 'solid', 'keywords' => 'security identity unique'],
        ['class' => 'fa-solid fa-globe', 'label' => 'Globe / Web', 'style' => 'solid', 'keywords' => 'website domain url'],
        ['class' => 'fa-solid fa-screwdriver-wrench', 'label' => 'Wrench & Screwdriver', 'style' => 'solid', 'keywords' => 'tool utility settings general'],
        ['class' => 'fa-solid fa-gears', 'label' => 'Gears / Generator', 'style' => 'solid', 'keywords' => 'generator automation config'],
        ['class' => 'fa-solid fa-bolt', 'label' => 'Bolt / Fast Tool', 'style' => 'solid', 'keywords' => 'instant speed quick'],
        ['class' => 'fa-solid fa-sliders', 'label' => 'Sliders / Controls', 'style' => 'solid', 'keywords' => 'settings customize filter'],

        // Brands & Social Platforms
        ['class' => 'fa-brands fa-whatsapp', 'label' => 'WhatsApp', 'style' => 'brands', 'keywords' => 'whatsapp link generator chat social'],
        ['class' => 'fa-brands fa-facebook', 'label' => 'Facebook', 'style' => 'brands', 'keywords' => 'facebook social post ad'],
        ['class' => 'fa-brands fa-instagram', 'label' => 'Instagram', 'style' => 'brands', 'keywords' => 'instagram photo social'],
        ['class' => 'fa-brands fa-youtube', 'label' => 'YouTube', 'style' => 'brands', 'keywords' => 'youtube video thumbnail'],
        ['class' => 'fa-brands fa-linkedin', 'label' => 'LinkedIn', 'style' => 'brands', 'keywords' => 'linkedin cv job social'],
        ['class' => 'fa-brands fa-x-twitter', 'label' => 'X / Twitter', 'style' => 'brands', 'keywords' => 'twitter card social'],
        ['class' => 'fa-brands fa-google', 'label' => 'Google', 'style' => 'brands', 'keywords' => 'google seo ga4 analytics'],
        ['class' => 'fa-brands fa-wordpress', 'label' => 'WordPress', 'style' => 'brands', 'keywords' => 'wordpress cms blog'],
        ['class' => 'fa-brands fa-github', 'label' => 'GitHub', 'style' => 'brands', 'keywords' => 'github code developer'],
    ];
}

/**
 * Enqueue Font Awesome 6 in WP Admin for the `tool` post type editor and list screen.
 */
function toolnest_admin_enqueue_tool_icon_assets($hook)
{
    if (!in_array($hook, ['post.php', 'post-new.php', 'edit.php'], true)) {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || 'tool' !== $screen->post_type) {
        return;
    }

    wp_enqueue_style(
        'toolnest-admin-fontawesome',
        'https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.2/css/all.min.css',
        [],
        '6.5.2'
    );
    wp_enqueue_style(
        'toolnest-admin-bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css',
        [],
        '1.11.3'
    );
}
add_action('admin_enqueue_scripts', 'toolnest_admin_enqueue_tool_icon_assets');

/**
 * Register the Tool Icon meta box on the `tool` post type.
 */
function toolnest_register_tool_icon_meta_box()
{
    add_meta_box(
        'toolnest_tool_icon_metabox',
        __('Tool Icon (Font Awesome)', 'toolnest'),
        'toolnest_render_tool_icon_meta_box',
        'tool',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'toolnest_register_tool_icon_meta_box');

/**
 * Render the Tool Icon selector box and visual icon picker panel.
 */
function toolnest_render_tool_icon_meta_box($post)
{
    wp_nonce_field('toolnest_save_tool_icon', 'toolnest_tool_icon_nonce');

    $saved_icon = get_post_meta($post->ID, '_toolnest_tool_icon', true);
    $resolved_icon = $saved_icon ? toolnest_get_tool_icon_class($saved_icon) : '';
    $icons = toolnest_get_fontawesome_icons();
    ?>
    <style>
      .tn-icon-box-wrap {
        padding-top: 4px;
      }
      .tn-icon-selected-card {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 10px 12px;
        background: #f8fafc;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        margin-bottom: 10px;
      }
      .tn-icon-selected-preview {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #eff6ff;
        color: #2563eb;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
        border: 1px solid #bfdbfe;
      }
      .tn-icon-selected-meta {
        min-width: 0;
        flex: 1;
      }
      .tn-icon-selected-label {
        font-weight: 600;
        font-size: 13px;
        color: #1e293b;
        display: block;
        margin-bottom: 2px;
      }
      .tn-icon-selected-code {
        font-family: Consolas, Monaco, monospace;
        font-size: 11px;
        color: #64748b;
        word-break: break-all;
      }
      .tn-icon-actions {
        display: flex;
        gap: 8px;
        align-items: center;
      }
      .tn-icon-actions .button-primary {
        display: inline-flex;
        align-items: center;
        gap: 6px;
      }
      /* Visual Icon Picker Modal Panel */
      .tn-icon-modal-backdrop {
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.55);
        z-index: 100000;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
      }
      .tn-icon-modal-backdrop.is-open {
        display: flex;
      }
      .tn-icon-modal {
        background: #ffffff;
        width: 100%;
        max-width: 720px;
        max-height: 82vh;
        border-radius: 12px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        border: 1px solid #e2e8f0;
      }
      .tn-icon-modal__header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
        background: #f8fafc;
      }
      .tn-icon-modal__title {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
        color: #0f172a;
        display: flex;
        align-items: center;
        gap: 8px;
      }
      .tn-icon-modal__close {
        background: transparent;
        border: none;
        font-size: 20px;
        line-height: 1;
        color: #64748b;
        cursor: pointer;
        padding: 4px 8px;
        border-radius: 6px;
      }
      .tn-icon-modal__close:hover {
        background: #e2e8f0;
        color: #0f172a;
      }
      .tn-icon-modal__toolbar {
        padding: 12px 20px;
        border-bottom: 1px solid #e2e8f0;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: center;
        background: #ffffff;
      }
      .tn-icon-modal__search {
        flex: 1 1 240px;
        padding: 7px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 6px;
        font-size: 13px;
      }
      .tn-icon-modal__tabs {
        display: flex;
        gap: 4px;
      }
      .tn-icon-modal__tab {
        padding: 6px 12px;
        border: 1px solid #cbd5e1;
        background: #f8fafc;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        color: #475569;
        cursor: pointer;
      }
      .tn-icon-modal__tab.is-active {
        background: #2563eb;
        border-color: #2563eb;
        color: #ffffff;
      }
      .tn-icon-modal__body {
        padding: 16px 20px;
        overflow-y: auto;
        flex: 1;
      }
      .tn-icon-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(105px, 1fr));
        gap: 10px;
      }
      .tn-icon-grid__item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 12px 8px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: #ffffff;
        cursor: pointer;
        text-align: center;
        transition: all 0.15s ease;
      }
      .tn-icon-grid__item:hover {
        border-color: #2563eb;
        background: #eff6ff;
        transform: translateY(-1px);
      }
      .tn-icon-grid__item.is-selected {
        border-color: #2563eb;
        background: #dbeafe;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.25);
      }
      .tn-icon-grid__item i {
        font-size: 22px;
        color: #1e293b;
      }
      .tn-icon-grid__item:hover i,
      .tn-icon-grid__item.is-selected i {
        color: #2563eb;
      }
      .tn-icon-grid__name {
        font-size: 11px;
        color: #475569;
        line-height: 1.25;
        word-break: break-word;
      }
      .tn-icon-modal__empty {
        text-align: center;
        padding: 32px 16px;
        color: #64748b;
        display: none;
      }
      .tn-icon-modal__footer {
        padding: 12px 20px;
        border-top: 1px solid #e2e8f0;
        background: #f8fafc;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        font-size: 12px;
        color: #64748b;
      }
    </style>

    <div class="tn-icon-box-wrap" id="tn-tool-icon-metabox">
      <div class="tn-icon-selected-card">
        <div class="tn-icon-selected-preview" id="tn-tool-icon-preview">
          <?php if ($resolved_icon) : ?>
            <i class="<?php echo esc_attr($resolved_icon); ?>" aria-hidden="true"></i>
          <?php else : ?>
            <i class="fa-solid fa-screwdriver-wrench" style="opacity: 0.35;" aria-hidden="true"></i>
          <?php endif; ?>
        </div>
        <div class="tn-icon-selected-meta">
          <span class="tn-icon-selected-label" id="tn-tool-icon-status">
            <?php echo $saved_icon ? esc_html__('Selected Icon', 'toolnest') : esc_html__('No Icon Selected', 'toolnest'); ?>
          </span>
          <code class="tn-icon-selected-code" id="tn-tool-icon-code">
            <?php echo $saved_icon ? esc_html($saved_icon) : esc_html__('Default icon will be used', 'toolnest'); ?>
          </code>
        </div>
      </div>

      <p style="margin: 0 0 10px;">
        <label for="tn-tool-icon-input" class="screen-reader-text"><?php esc_html_e('Font Awesome Icon Class', 'toolnest'); ?></label>
        <input
          type="text"
          id="tn-tool-icon-input"
          name="toolnest_tool_icon"
          value="<?php echo esc_attr($saved_icon); ?>"
          class="widefat"
          placeholder="e.g. fa-solid fa-calculator">
      </p>

      <div class="tn-icon-actions">
        <button type="button" class="button button-primary" id="tn-open-icon-panel-btn">
          <i class="fa-solid fa-icons" aria-hidden="true"></i>
          <?php esc_html_e('Select Icon', 'toolnest'); ?>
        </button>
        <button
          type="button"
          class="button"
          id="tn-clear-icon-btn"
          <?php echo $saved_icon ? '' : 'style="display:none;"'; ?>>
          <?php esc_html_e('Remove', 'toolnest'); ?>
        </button>
      </div>

      <!-- Visual Font Awesome Icon Picker Panel -->
      <div class="tn-icon-modal-backdrop" id="tn-icon-modal-backdrop" role="dialog" aria-modal="true" aria-labelledby="tn-icon-modal-title">
        <div class="tn-icon-modal">
          <div class="tn-icon-modal__header">
            <h2 class="tn-icon-modal__title" id="tn-icon-modal-title">
              <i class="fa-solid fa-icons" style="color:#2563eb;" aria-hidden="true"></i>
              <?php esc_html_e('Select Tool Icon (Font Awesome)', 'toolnest'); ?>
            </h2>
            <button type="button" class="tn-icon-modal__close" id="tn-close-icon-panel-btn" aria-label="<?php esc_attr_e('Close icon panel', 'toolnest'); ?>">&times;</button>
          </div>

          <div class="tn-icon-modal__toolbar">
            <input
              type="search"
              id="tn-icon-search-input"
              class="tn-icon-modal__search"
              placeholder="<?php esc_attr_e('Search icons (e.g. pdf, image, calculator, bangla, code, qr)...', 'toolnest'); ?>"
              autocomplete="off">
            <div class="tn-icon-modal__tabs" role="tablist">
              <button type="button" class="tn-icon-modal__tab is-active" data-tn-icon-style="all"><?php esc_html_e('All', 'toolnest'); ?></button>
              <button type="button" class="tn-icon-modal__tab" data-tn-icon-style="solid"><?php esc_html_e('Solid', 'toolnest'); ?></button>
              <button type="button" class="tn-icon-modal__tab" data-tn-icon-style="regular"><?php esc_html_e('Regular', 'toolnest'); ?></button>
              <button type="button" class="tn-icon-modal__tab" data-tn-icon-style="brands"><?php esc_html_e('Brands', 'toolnest'); ?></button>
            </div>
          </div>

          <div class="tn-icon-modal__body">
            <div class="tn-icon-grid" id="tn-icon-grid">
              <?php foreach ($icons as $icon_item) : ?>
                <?php
                $is_selected = ($saved_icon === $icon_item['class']);
                $search_blob = strtolower($icon_item['label'] . ' ' . $icon_item['class'] . ' ' . $icon_item['keywords']);
                ?>
                <button
                  type="button"
                  class="tn-icon-grid__item<?php echo $is_selected ? ' is-selected' : ''; ?>"
                  data-icon-class="<?php echo esc_attr($icon_item['class']); ?>"
                  data-icon-label="<?php echo esc_attr($icon_item['label']); ?>"
                  data-icon-style="<?php echo esc_attr($icon_item['style']); ?>"
                  data-icon-search="<?php echo esc_attr($search_blob); ?>"
                  title="<?php echo esc_attr($icon_item['label'] . ' (' . $icon_item['class'] . ')'); ?>">
                  <i class="<?php echo esc_attr($icon_item['class']); ?>" aria-hidden="true"></i>
                  <span class="tn-icon-grid__name"><?php echo esc_html($icon_item['label']); ?></span>
                </button>
              <?php endforeach; ?>
            </div>
            <div class="tn-icon-modal__empty" id="tn-icon-modal-empty">
              <?php esc_html_e('No matching Font Awesome icons found. Try another keyword or paste any Font Awesome class into the input box.', 'toolnest'); ?>
            </div>
          </div>

          <div class="tn-icon-modal__footer">
            <span><?php esc_html_e('Click any icon to select it, or enter a custom Font Awesome class directly.', 'toolnest'); ?></span>
            <button type="button" class="button" id="tn-cancel-icon-panel-btn"><?php esc_html_e('Close', 'toolnest'); ?></button>
          </div>
        </div>
      </div>
    </div>

    <script>
      (function () {
        const openBtn = document.getElementById('tn-open-icon-panel-btn');
        const closeBtn = document.getElementById('tn-close-icon-panel-btn');
        const cancelBtn = document.getElementById('tn-cancel-icon-panel-btn');
        const clearBtn = document.getElementById('tn-clear-icon-btn');
        const backdrop = document.getElementById('tn-icon-modal-backdrop');
        const searchInput = document.getElementById('tn-icon-search-input');
        const iconInput = document.getElementById('tn-tool-icon-input');
        const previewBox = document.getElementById('tn-tool-icon-preview');
        const statusText = document.getElementById('tn-tool-icon-status');
        const codeText = document.getElementById('tn-tool-icon-code');
        const emptyState = document.getElementById('tn-icon-modal-empty');
        const gridItems = Array.prototype.slice.call(document.querySelectorAll('#tn-icon-grid .tn-icon-grid__item'));
        const styleTabs = Array.prototype.slice.call(document.querySelectorAll('[data-tn-icon-style]'));

        if (!openBtn || !backdrop || !iconInput) {
          return;
        }

        // Move modal backdrop to document.body so it isn't clipped by WP sidebar containers
        if (backdrop.parentNode !== document.body) {
          document.body.appendChild(backdrop);
        }

        let activeStyle = 'all';

        function resolvePreviewClass(raw) {
          const val = (raw || '').trim();
          if (!val) return '';
          if (val.indexOf('bi ') === 0 || val.indexOf('bi-') === 0) {
            return val.indexOf('bi ') === 0 ? val : 'bi ' + val;
          }
          if (/\b(fa-solid|fa-regular|fa-brands|fas|far|fab)\b/.test(val)) {
            return val;
          }
          if (val.indexOf('fa-') === 0) {
            return 'fa-solid ' + val;
          }
          return val;
        }

        function updateSelectedUI(iconValue) {
          const clean = (iconValue || '').trim();
          iconInput.value = clean;

          const resolved = resolvePreviewClass(clean);
          if (resolved) {
            previewBox.innerHTML = '<i class="' + resolved.replace(/"/g, '') + '" aria-hidden="true"></i>';
            statusText.textContent = 'Selected Icon';
            codeText.textContent = clean;
            if (clearBtn) clearBtn.style.display = '';
          } else {
            previewBox.innerHTML = '<i class="fa-solid fa-screwdriver-wrench" style="opacity:0.35;" aria-hidden="true"></i>';
            statusText.textContent = 'No Icon Selected';
            codeText.textContent = 'Default icon will be used';
            if (clearBtn) clearBtn.style.display = 'none';
          }

          gridItems.forEach(function (btn) {
            btn.classList.toggle('is-selected', btn.getAttribute('data-icon-class') === clean);
          });
        }

        function filterIcons() {
          const query = (searchInput ? searchInput.value : '').trim().toLowerCase();
          let visibleCount = 0;

          gridItems.forEach(function (btn) {
            const itemStyle = btn.getAttribute('data-icon-style') || 'solid';
            const searchBlob = btn.getAttribute('data-icon-search') || '';
            const matchesStyle = activeStyle === 'all' || itemStyle === activeStyle;
            const matchesQuery = !query || searchBlob.indexOf(query) !== -1;
            const show = matchesStyle && matchesQuery;

            btn.style.display = show ? '' : 'none';
            if (show) visibleCount++;
          });

          if (emptyState) {
            emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
          }
        }

        function openPanel() {
          backdrop.classList.add('is-open');
          if (searchInput) {
            searchInput.value = '';
            filterIcons();
            setTimeout(function () {
              searchInput.focus();
            }, 50);
          }
        }

        function closePanel() {
          backdrop.classList.remove('is-open');
        }

        openBtn.addEventListener('click', openPanel);
        if (closeBtn) closeBtn.addEventListener('click', closePanel);
        if (cancelBtn) cancelBtn.addEventListener('click', closePanel);

        backdrop.addEventListener('click', function (e) {
          if (e.target === backdrop) {
            closePanel();
          }
        });

        document.addEventListener('keydown', function (e) {
          if (e.key === 'Escape' && backdrop.classList.contains('is-open')) {
            closePanel();
          }
        });

        gridItems.forEach(function (btn) {
          btn.addEventListener('click', function () {
            const chosen = btn.getAttribute('data-icon-class') || '';
            updateSelectedUI(chosen);
            closePanel();
          });
        });

        styleTabs.forEach(function (tab) {
          tab.addEventListener('click', function () {
            activeStyle = tab.getAttribute('data-tn-icon-style') || 'all';
            styleTabs.forEach(function (t) {
              t.classList.toggle('is-active', t === tab);
            });
            filterIcons();
          });
        });

        if (searchInput) {
          searchInput.addEventListener('input', filterIcons);
        }

        iconInput.addEventListener('input', function () {
          updateSelectedUI(iconInput.value);
        });

        if (clearBtn) {
          clearBtn.addEventListener('click', function () {
            updateSelectedUI('');
          });
        }
      })();
    </script>
    <?php
}

/**
 * Save the selected Font Awesome icon class when a `tool` post is saved.
 */
function toolnest_save_tool_icon_meta($post_id)
{
    if (!isset($_POST['toolnest_tool_icon_nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['toolnest_tool_icon_nonce'])), 'toolnest_save_tool_icon')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (wp_is_post_revision($post_id) || 'tool' !== get_post_type($post_id)) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $icon = isset($_POST['toolnest_tool_icon'])
        ? sanitize_text_field(wp_unslash($_POST['toolnest_tool_icon']))
        : '';

    if ('' !== $icon) {
        update_post_meta($post_id, '_toolnest_tool_icon', $icon);
    } else {
        delete_post_meta($post_id, '_toolnest_tool_icon');
    }
}
add_action('save_post_tool', 'toolnest_save_tool_icon_meta');

