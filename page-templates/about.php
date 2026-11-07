<?php
/*
Template Name: About
*/

get_header();
?>

  <main id="main-content" class="py-4 py-lg-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <?php toolnest_page_breadcrumb(); ?>

          <article class="tn-card p-4 p-lg-5">
            <h1 class="tn-page-title">About ToolNest</h1>
            <p class="lead text-secondary">
              <strong>ToolNest</strong> was created with a single, uncompromising philosophy: <em>"Free online tools that just work."</em>
            </p>
            <p class="text-muted">
              Every day, millions of students, government job candidates, journalists, designers, and small business owners search the web for simple tasks—converting a Bijoy Bangla paragraph into Unicode, spelling out a bank cheque amount in Lakh and Crore, formatting a 300 DPI passport photo, merging PDF certificates, or generating a Cash-on-Delivery (COD) courier slip. Too often, they are met with slow websites that demand account registrations, upload confidential documents to unknown servers, or lock downloads behind paywalls.
            </p>

            <h2 class="h4 fw-bold mt-4 mb-2">Why We Built a 100% Browser-Based Platform</h2>
            <p class="text-muted">
              Modern web browsers are extraordinarily capable. By harnessing native HTML5 Canvas, Web Crypto, Blob streams, and client-side JavaScript engines, ToolNest performs every single conversion and file manipulation directly on your own phone, tablet, or computer.
            </p>
            <ul class="text-muted">
              <li class="mb-2"><strong>Zero File Uploads:</strong> When you select a portrait photo, a confidential PDF contract, or a customer invoice on ToolNest, your file stays inside your device's local memory. It is never uploaded to our servers.</li>
              <li class="mb-2"><strong>Tailored for Global &amp; Bangladesh Workflows:</strong> Alongside universal utilities, we build tools specifically for Bangladesh professionals—supporting SutonnyMJ Bijoy ANSI, Bangla Academy number spellings, BDT Taka/Paisa Lakh-Crore notation, Teletalk photo dimensions, and F-commerce courier labels.</li>
              <li class="mb-2"><strong>Accessible &amp; Mobile-First:</strong> Over 75% of users in South Asia browse primarily on smartphones. Every ToolNest page is tested down to 360px screens with large 44px touch targets and minimal bandwidth overhead.</li>
            </ul>

            <h2 class="h4 fw-bold mt-4 mb-2">Our Commitment to Quality</h2>
            <p class="text-muted mb-4">
              We continuously refine our tools based on real user feedback. Whether you need a quick calculation or a daily business workflow helper, ToolNest is here to save you time without compromising your privacy.
            </p>

            <div class="d-flex flex-wrap gap-2">
              <a href="<?php echo esc_url(get_permalink(get_page_by_path('all-tools'))); ?>" class="btn tn-btn--primary">Explore All Tools</a>
              <a href="<?php echo esc_url(get_permalink(get_page_by_path('contact'))); ?>" class="btn tn-btn--outline">Contact Our Team</a>
            </div>
          </article>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
