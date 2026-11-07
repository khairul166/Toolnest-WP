<?php
/*
Template Name: Contact
*/

get_header();
?>

<main id="main-content" class="py-4 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <?php toolnest_page_breadcrumb(); ?>

          <article class="tn-card p-4 p-lg-5">
            <h1 class="tn-page-title">Contact Us</h1>
            <p class="lead text-secondary">
              Have a feature request, spotted a Bangla font edge case, or want to suggest a new free tool for ToolNest? We would love to hear from you.
            </p>
            <p class="text-muted">
              Because ToolNest is a privacy-first static platform that does not collect personal user accounts or store uploaded files, the fastest and most direct way to reach our team is via email. We review every message personally and typically respond within 24 to 48 business hours.
            </p>

            <!-- CONTACT EMAIL CONFIGURATION: Replace support@[DOMAIN] below with your real domain email address, or replace this block with a PHP/WordPress form shortcode when migrating to WordPress. -->
            <div class="p-4 rounded-3 bg-light border my-4">
              <div class="row align-items-center g-3">
                <div class="col-md-8">
                  <h2 class="h5 fw-bold mb-1">
                    <i class="bi bi-envelope-paper-fill text-primary me-2" aria-hidden="true"></i>Direct Email Support
                  </h2>
                  <p class="text-muted small mb-2">
                    Click the button or email address below to open your default mail client:
                  </p>
                  <p class="fs-5 fw-bold mb-0">
                    <a href="mailto:support@[DOMAIN]?subject=ToolNest%20Inquiry">support@[DOMAIN]</a>
                  </p>
                </div>
                <div class="col-md-4 text-md-end">
                  <a href="mailto:support@[DOMAIN]?subject=ToolNest%20Support%20or%20Feedback" class="btn tn-btn--primary">
                    <i class="bi bi-send-fill" aria-hidden="true"></i> Send Us an Email
                  </a>
                </div>
              </div>
            </div>

            <h2 class="h4 fw-bold mt-4 mb-3">What to Include When Reporting an Issue</h2>
            <p class="text-muted">
              To help us resolve technical questions as quickly as possible, please include:
            </p>
            <ul class="text-muted">
              <li class="mb-2"><strong>Tool Name:</strong> Let us know which of the 10 tools you were using (for example, <em>Bijoy to Unicode Converter</em> or <em>Passport Photo Maker</em>).</li>
              <li class="mb-2"><strong>Device &amp; Browser:</strong> Mention whether you are on Android Chrome, iPhone Safari, Windows Edge/Chrome, or macOS.</li>
              <li class="mb-2"><strong>Sample Input:</strong> If a specific Bangla word or number did not convert as expected, paste the sample text in your email so we can test and update our dictionary immediately.</li>
            </ul>

            <h2 class="h4 fw-bold mt-4 mb-2">Business &amp; Advertising Inquiries</h2>
            <p class="text-muted mb-0">
              For direct sponsorship, banner placement, or custom tool licensing inquiries, please include <strong>"Business Inquiry"</strong> in your email subject line when writing to <a href="mailto:support@[DOMAIN]?subject=Business%20Inquiry%20-%20ToolNest">support@[DOMAIN]</a>.
            </p>
          </article>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
