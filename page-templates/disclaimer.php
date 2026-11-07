<?php
/*
Template Name: Disclaimer
*/

get_header();
?>

<main id="main-content" class="py-4 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <?php toolnest_page_breadcrumb(); ?>

          <article class="tn-card p-4 p-lg-5">
            <h1 class="tn-page-title">Disclaimer</h1>
            <p class="small text-muted mb-4">Last Updated: October 26, 2026</p>

            <p class="text-muted">
              The information, calculators, converters, and file utilities provided on <strong>ToolNest</strong> (<code>https://[DOMAIN]/</code>) are for general informational and everyday productivity purposes only. All tools on this site are provided in good faith; however, we make no representation or warranty of any kind, express or implied, regarding the completeness, reliability, or suitability of any output for official legal, banking, or government immigration submissions.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">1. No Professional Legal, Financial, or Immigration Advice</h2>
            <p class="text-muted">
              Our <em>Passport &amp; Visa Photo Maker</em>, <em>Amount to Words Converter</em>, <em>Age Calculator</em>, and <em>Invoice Generator</em> are general self-service utilities. Embassies, passport offices, banks, and public service recruitment boards enforce strict, periodically updated biometric and formatting rules. You are solely responsible for verifying that your final photo, cheque wording, or PDF document satisfies the latest official guidelines of the receiving organization.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">2. Trademark &amp; Non-Affiliation Notice</h2>
            <p class="text-muted">
              All product names, font names, social media platforms, and courier company names mentioned on ToolNest—including but not limited to <em>Bijoy</em>, <em>Avro</em>, <em>Facebook</em>, <em>Instagram</em>, <em>YouTube</em>, <em>LinkedIn</em>, <em>Teletalk</em>, <em>Steadfast</em>, <em>Pathao</em>, <em>RedX</em>, <em>Sundarban</em>, and <em>Paperfly</em>—are trademarks or registered trademarks of their respective owners. ToolNest is an independent utility platform and is not affiliated with, endorsed by, or sponsored by any of these organizations.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">3. External Links &amp; Advertisements</h2>
            <p class="text-muted">
              ToolNest may contain links to external websites or display third-party advertisements that are not provided or maintained by us. We do not guarantee the accuracy, relevance, or completeness of any information on these external websites.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">4. Consent &amp; Contact</h2>
            <p class="text-muted mb-0">
              By using our website, you hereby consent to our Disclaimer and agree to its terms. Should you have any questions regarding this Disclaimer, please contact us via our <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Page</a>.
            </p>
          </article>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
