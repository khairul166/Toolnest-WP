<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Use 10+ fast, free browser-based tools for Bangladesh and global users: Bijoy to Unicode, Amount to Words, Image Resizer, PDF Merge, QR & Invoice Generator.">
  <link rel="canonical" href="https://[DOMAIN]/">
  <link rel="icon" type="image/svg+xml" href="<?php echo esc_url(get_theme_file_uri('/assets/img/favicon.svg')); ?>">

  <!-- Open Graph & Twitter Meta -->
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="ToolNest">
  <meta property="og:title" content="ToolNest — Free Online Tools That Just Work (100% Private)">
  <meta property="og:description"
    content="Use 10+ fast, free browser-based tools for Bangladesh and global users: Bijoy to Unicode, Amount to Words, Image Resizer, PDF Merge, QR & Invoice Generator.">
  <meta property="og:url" content="https://[DOMAIN]/">
  <meta property="og:image" content="https://[DOMAIN]/assets/img/logo.svg">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="ToolNest — Free Online Tools That Just Work (100% Private)">
  <meta name="twitter:description"
    content="Use 10+ fast, free browser-based tools for Bangladesh and global users: Bijoy to Unicode, Amount to Words, Image Resizer, PDF Merge, QR & Invoice Generator.">

  <!-- Google Fonts: Inter & Hind Siliguri -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <style>
  </style>

  <!-- JSON-LD Structured Data: WebSite & FAQPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@graph": [
      {
        "@type": "WebSite",
        "@id": "https://[DOMAIN]/#website",
        "url": "https://[DOMAIN]/",
        "name": "ToolNest",
        "description": "Free online tools that just work. 100% client-side utilities for global users and Bangladesh professionals.",
        "potentialAction": {
          "@type": "SearchAction",
          "target": "https://[DOMAIN]/tools/?q={search_term_string}",
          "query-input": "required name=search_term_string"
        }
      },
      {
        "@type": "FAQPage",
        "@id": "https://[DOMAIN]/#faq",
        "mainEntity": [
          {
            "@type": "Question",
            "name": "Are all tools on ToolNest completely free to use?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes. Every tool on ToolNest is 100% free with no account registration, no daily usage caps, and no watermarks on downloaded files."
            }
          },
          {
            "@type": "Question",
            "name": "Do my uploaded photos, PDFs, or invoices leave my device?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Never. All tools run 100% inside your web browser using client-side JavaScript and HTML5 Canvas. Your personal files, passport photos, and financial documents never get uploaded to any remote server."
            }
          },
          {
            "@type": "Question",
            "name": "Does ToolNest support Bengali (Bangla) fonts and Bangladesh formats?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Yes. ToolNest is built for global English users with specialized support for Bangladesh, including Bijoy ANSI to Unicode conversion, BDT Taka/Paisa Lakh-Crore amount to words, BD passport sizes, and COD courier slips."
            }
          },
          {
            "@type": "Question",
            "name": "Do the generated QR codes expire?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "No. ToolNest generates static, direct-encoded QR codes for URLs, plain text, and WiFi networks. They never expire and do not rely on third-party redirect links."
            }
          },
          {
            "@type": "Question",
            "name": "Can I use ToolNest on my mobile phone or tablet?",
            "acceptedAnswer": {
              "@type": "Answer",
              "text": "Absolutely. Every tool on ToolNest is designed mobile-first with touch-friendly controls, responsive layouts down to 360px screens, and instant client-side processing."
            }
          }
        ]
      }
    ]
  }
  </script>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part('template-parts/site-header'); ?>