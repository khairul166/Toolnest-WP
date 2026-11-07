<?php
/*
Template Name: Privacy Policy
*/

get_header();
?>

<main id="main-content" class="py-4 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <?php toolnest_page_breadcrumb(); ?>

          <article class="tn-card p-4 p-lg-5">
            <h1 class="tn-page-title">Privacy Policy</h1>
            <p class="small text-muted mb-4">Last Updated: October 26, 2026</p>

            <p class="text-muted">
              At <strong>ToolNest</strong> (accessible from <code>https://[DOMAIN]/</code>), protecting the privacy of our visitors is one of our highest priorities. This Privacy Policy document outlines the types of information that are collected and recorded by ToolNest and how we handle files and data processed through our web utilities.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">1. 100% Client-Side File &amp; Text Processing</h2>
            <p class="text-muted">
              Unlike cloud-based conversion portals, all utilities on ToolNest—including the Bijoy to Unicode Converter, Amount to Words Converter, Age Calculator, Image Compressor, Image Resizer, Passport Photo Maker, PDF Merge &amp; Split tool, QR Code Generator, Text Tools, and Invoice Generator—operate <strong>100% locally inside your web browser</strong>.
            </p>
            <p class="text-muted">
              Your uploaded photos, biometric portraits, PDF documents, WiFi passwords, and invoice customer records <strong>never leave your device</strong> and are never transmitted to, stored on, or viewed by our servers.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">2. Standard Server Log Files</h2>
            <p class="text-muted">
              ToolNest follows a standard procedure of using server log files. These files log visitors when they request static HTML, CSS, or JavaScript assets. The information collected by log files includes internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing traffic trends, administering the site, and ensuring technical security.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">3. Cookies, Web Beacons &amp; Google AdSense</h2>
            <p class="text-muted">
              ToolNest may use cookies to store visitor preferences (such as UI theme settings) and to display relevant advertisements through third-party ad networks such as <strong>Google AdSense</strong>.
            </p>
            <ul class="text-muted">
              <li class="mb-2">Google, as a third-party vendor, uses cookies (including DoubleClick DART cookies) to serve ads to visitors based upon their visit to <code>https://[DOMAIN]/</code> and other sites on the internet.</li>
              <li class="mb-2">Visitors may choose to decline the use of DART cookies by visiting the Google Ad and Content Network Privacy Policy at <a href="https://policies.google.com/technologies/ads" rel="noopener noreferrer" target="_blank">https://policies.google.com/technologies/ads</a>.</li>
            </ul>

            <h2 class="h4 fw-bold mt-4 mb-2">4. Third-Party Content Delivery Networks (CDNs)</h2>
            <p class="text-muted">
              To ensure fast page loads worldwide, ToolNest loads open-source stylesheets, fonts, and client-side libraries (such as Bootstrap, Google Fonts, <code>pdf-lib</code>, and <code>qrcode-generator</code>) from trusted public CDNs including jsDelivr and Google Fonts. When your browser fetches these static libraries, standard HTTP request headers are processed by those CDN providers under their respective privacy policies.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">5. GDPR &amp; CCPA Privacy Rights</h2>
            <p class="text-muted">
              Because ToolNest does not maintain user accounts or store personal files on our servers, we hold no personal database profiles of our users. You can clear any local browser data or cookies at any time through your web browser settings.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">6. Contact Us</h2>
            <p class="text-muted mb-0">
              If you have additional questions or require more information about our Privacy Policy, please contact us via our <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>">Contact Page</a> or email <a href="mailto:support@[DOMAIN]">support@[DOMAIN]</a>.
            </p>
          </article>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
