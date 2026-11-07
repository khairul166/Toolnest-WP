<?php
function tools_enqueue_scripts() {

    if (is_singular('tool') && 'cv-maker' === get_post_field('post_name', get_queried_object_id())) {
        $style_path = get_theme_file_path('/assets/css/cv-style.css');
        wp_enqueue_style(
            'tools-cv-style',
            get_theme_file_uri('/assets/css/cv-style.css'),
            ['toolnest-main'],
            filemtime($style_path)
        );
    }

    $script_path = get_theme_file_path('/assets/js/tools/age-calculator.js');

    wp_enqueue_script(
        'tools-age-calculator',
        get_theme_file_uri('/assets/js/tools/age-calculator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/amount-to-words.js');
    wp_enqueue_script(
        'tools-amount-to-words',
        get_theme_file_uri('/assets/js/tools/amount-to-words.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/background-remover.js');
    wp_enqueue_script(
        'tools-background-remover',
        get_theme_file_uri('/assets/js/tools/background-remover.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/bangla-typing-test.js');
    wp_enqueue_script(
        'tools-bangla-typing-test',
        get_theme_file_uri('/assets/js/tools/bangla-typing-test.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/bijoy-to-unicode.js');
    wp_enqueue_script(
        'tools-bijoy-to-unicode',
        get_theme_file_uri('/assets/js/tools/bijoy-to-unicode.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/bold-text-generator.js');
    wp_enqueue_script(
        'tools-bold-text-generator',
        get_theme_file_uri('/assets/js/tools/bold-text-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/bulk-image-resizer.js');
    wp_enqueue_script(
        'tools-bulk-image-resizer',
        get_theme_file_uri('/assets/js/tools/bulk-image-resizer.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/color-picker.js');
    wp_enqueue_script(
        'tools-color-picker',
        get_theme_file_uri('/assets/js/tools/color-picker.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/create-pdf.js');
    wp_enqueue_script(
        'tools-create-pdf',
        get_theme_file_uri('/assets/js/tools/create-pdf.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/currency-converter.js');
    wp_enqueue_script(
        'tools-currency-converter',
        get_theme_file_uri('/assets/js/tools/currency-converter.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/cv-maker.js');
    wp_enqueue_script(
        'tools-cv-maker',
        get_theme_file_uri('/assets/js/tools/cv-maker.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/developer-webmaster-tools.js');
    wp_enqueue_script(
        'tools-developer-webmaster-tools',
        get_theme_file_uri('/assets/js/tools/developer-webmaster-tools.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/discount-vat-profit-calculator.js');
    wp_enqueue_script(
        'tools-discount-vat-profit-calculator',
        get_theme_file_uri('/assets/js/tools/discount-vat-profit-calculator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/document-scanner.js');
    wp_enqueue_script(
        'tools-document-scanner',
        get_theme_file_uri('/assets/js/tools/document-scanner.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/excel-to-pdf.js');
    wp_enqueue_script(
        'tools-excel-to-pdf',
        get_theme_file_uri('/assets/js/tools/excel-to-pdf.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/image-alt-text-generator.js');
    wp_enqueue_script(
        'tools-image-alt-text-generator',
        get_theme_file_uri('/assets/js/tools/image-alt-text-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/image-compressor.js');
    wp_enqueue_script(
        'tools-image-compressor',
        get_theme_file_uri('/assets/js/tools/image-compressor.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/image-format-converter.js');
    wp_enqueue_script(
        'tools-image-format-converter',
        get_theme_file_uri('/assets/js/tools/image-format-converter.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/image-resizer.js');
    wp_enqueue_script(
        'tools-image-resizer',
        get_theme_file_uri('/assets/js/tools/image-resizer.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/image-to-pdf.js');
    wp_enqueue_script(
        'tools-image-to-pdf',
        get_theme_file_uri('/assets/js/tools/image-to-pdf.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/image-upscaler.js');
    wp_enqueue_script(
        'tools-image-upscaler',
        get_theme_file_uri('/assets/js/tools/image-upscaler.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/invoice-generator.js');
    wp_enqueue_script(
        'tools-invoice-generator',
        get_theme_file_uri('/assets/js/tools/invoice-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/json-formatter.js');
    wp_enqueue_script(
        'tools-json-formatter',
        get_theme_file_uri('/assets/js/tools/json-formatter.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/land-area-converter.js');
    wp_enqueue_script(
        'tools-land-area-converter',
        get_theme_file_uri('/assets/js/tools/land-area-converter.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/loan-emi-fdr-dps-calculator.js');
    wp_enqueue_script(
        'tools-loan-emi-fdr-dps-calculator',
        get_theme_file_uri('/assets/js/tools/loan-emi-fdr-dps-calculator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/lorem-ipsum-generator.js');
    wp_enqueue_script(
        'tools-lorem-ipsum-generator',
        get_theme_file_uri('/assets/js/tools/lorem-ipsum-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/meta-tag-generator.js');
    wp_enqueue_script(
        'tools-meta-tag-generator',
        get_theme_file_uri('/assets/js/tools/meta-tag-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/passport-photo-maker.js');
    wp_enqueue_script(
        'tools-passport-photo-maker',
        get_theme_file_uri('/assets/js/tools/passport-photo-maker.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/password-generator.js');
    wp_enqueue_script(
        'tools-password-generator',
        get_theme_file_uri('/assets/js/tools/password-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/pdf-merge-split.js');
    wp_enqueue_script(
        'tools-pdf-merge-split',
        get_theme_file_uri('/assets/js/tools/pdf-merge-split.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/pdf-to-excel.js');
    wp_enqueue_script(
        'tools-pdf-to-excel',
        get_theme_file_uri('/assets/js/tools/pdf-to-excel.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/pdf-to-jpg.js');
    wp_enqueue_script(
        'tools-pdf-to-jpg',
        get_theme_file_uri('/assets/js/tools/pdf-to-jpg.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/pdf-to-word.js');
    wp_enqueue_script(
        'tools-pdf-to-word',
        get_theme_file_uri('/assets/js/tools/pdf-to-word.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/protect-pdf.js');
    wp_enqueue_script(
        'tools-protect-pdf',
        get_theme_file_uri('/assets/js/tools/protect-pdf.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/qr-code-generator.js');
    wp_enqueue_script(
        'tools-qr-code-generator',
        get_theme_file_uri('/assets/js/tools/qr-code-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/robots-txt-generator.js');
    wp_enqueue_script(
        'tools-robots-txt-generator',
        get_theme_file_uri('/assets/js/tools/robots-txt-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/signature-maker.js');
    wp_enqueue_script(
        'tools-signature-maker',
        get_theme_file_uri('/assets/js/tools/signature-maker.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/text-tools.js');
    wp_enqueue_script(
        'tools-text-tools',
        get_theme_file_uri('/assets/js/tools/text-tools.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/utm-link-builder.js');
    wp_enqueue_script(
        'tools-utm-link-builder',
        get_theme_file_uri('/assets/js/tools/utm-link-builder.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/whatsapp-link-generator.js');
    wp_enqueue_script(
        'tools-whatsapp-link-generator',
        get_theme_file_uri('/assets/js/tools/whatsapp-link-generator.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );

    $script_path = get_theme_file_path('/assets/js/tools/word-to-pdf.js');
    wp_enqueue_script(
        'tools-word-to-pdf',
        get_theme_file_uri('/assets/js/tools/word-to-pdf.js'),
        ['toolnest-bootstrap'],
        filemtime($script_path),
        true
    );
}
add_action('wp_enqueue_scripts', 'tools_enqueue_scripts');