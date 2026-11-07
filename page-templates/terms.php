<?php
/*
Template Name: Terms of Service
*/

get_header();
?>

<main id="main-content" class="py-4 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <?php toolnest_page_breadcrumb(); ?>

          <article class="tn-card p-4 p-lg-5">
            <h1 class="tn-page-title">Terms of Service</h1>
            <p class="small text-muted mb-4">Effective Date: October 26, 2026</p>

            <p class="text-muted">
              Welcome to <strong>ToolNest</strong>. By accessing or using our website at <code>https://[DOMAIN]/</code> and any of its online tools, you agree to comply with and be bound by the following Terms of Service. If you do not agree with any part of these terms, please discontinue use of our website.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">1. License to Use Our Free Tools</h2>
            <p class="text-muted">
              ToolNest grants you a personal, non-exclusive, non-transferable, revocable license to use our web utilities for personal, academic, and commercial productivity. All outputs you generate using your own content—such as converted Bangla text, compressed or resized images, passport photo sheets, merged PDFs, QR codes, and invoices—belong 100% to you, free of royalties or watermarks.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">2. Acceptable Use &amp; User Responsibility</h2>
            <p class="text-muted">
              Because all tools process files locally in your browser, you are solely responsible for the legality, accuracy, and copyright ownership of the documents, images, and URLs you process. You agree not to:
            </p>
            <ul class="text-muted">
              <li class="mb-2">Use our QR Code Generator or Invoice Generator to create fraudulent payment links, phishing URLs, or deceptive invoices.</li>
              <li class="mb-2">Attempt to scrape, mirror, or redistribute the ToolNest source code, brand assets, or original documentation as a competing website without written authorization.</li>
              <li class="mb-2">Interfere with or disrupt the security or availability of our static hosting infrastructure.</li>
            </ul>

            <h2 class="h4 fw-bold mt-4 mb-2">3. Verification of Official Documents</h2>
            <p class="text-muted">
              While we take great care to keep our calculators, currency word converters, and passport photo presets accurate, embassy visa specifications, bank cheque rules, and government job circular requirements may change at any time. Users must always verify their final converted text, financial wording, and photo dimensions against the official instructions of the receiving institution before submission.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">4. "As-Is" Warranty &amp; Limitation of Liability</h2>
            <p class="text-muted">
              All tools and informational guides on ToolNest are provided on an "AS IS" and "AS AVAILABLE" basis without warranties of any kind, either express or implied. In no event shall ToolNest or its creators be liable for any direct, indirect, incidental, or consequential damages arising out of the use or inability to use our tools.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">5. Modifications to Terms</h2>
            <p class="text-muted mb-0">
              We reserve the right to update or modify these Terms of Service at any time without prior notice. Continued use of the website after changes are posted constitutes acceptance of the revised terms. For questions, please visit our <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Page</a>.
            </p>
          </article>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
