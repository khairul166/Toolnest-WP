
<?php
/*
Template Name: Homepage
*/

get_header(); ?>

  <!-- Main Content -->
  <main id="main-content">
    <!-- Hero & SEO Intro Section -->
    <section class="py-4 py-lg-5">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-9">
            <span class="tn-privacy-banner">
              <i class="bi bi-shield-lock-fill" aria-hidden="true"></i>
              100% Browser-Based &bull; Files Never Leave Your Device
            </span>
            <h1 class="tn-page-title">Free Online Tools That Just Work</h1>
            <p class="lead text-secondary mb-3">
              Welcome to <strong>ToolNest</strong>, your all-in-one collection of fast, privacy-first web utilities
              built for everyday productivity. Whether you are converting <strong>Bijoy ANSI to Unicode Bangla</strong>,
              spelling out <strong>BDT Taka &amp; Lakh/Crore amounts in words</strong> for bank cheques, preparing
              official <strong>passport and visa photos</strong>, merging multi-page PDF documents, resizing social
              media graphics, or printing cash-on-delivery courier slips, every tool runs directly inside your browser.
            </p>
            <p class="text-muted mb-4">
              Unlike traditional cloud converters that queue your files on remote servers, ToolNest processes your
              images, PDFs, and text locally on your phone or computer. That means zero upload wait times, zero
              watermarks, no sign-up walls, and complete privacy for freelancers, students, government job applicants,
              and small business owners in Bangladesh and around the world.
            </p>

            <!-- Quick Filter Search Box -->
            <div class="mx-auto mb-3" style="max-width: 580px;">
              <label for="tn-grid-search" class="visually-hidden">Filter tools on this page</label>
              <div class="input-group input-group-lg shadow-sm">
                <span class="input-group-text bg-white border-end-0 text-primary ps-3">
                  <i class="bi bi-search" aria-hidden="true"></i>
                </span>
                <input type="search" id="tn-grid-search" class="form-control border-start-0"
                  placeholder="Find a tool instantly (e.g. Bijoy, Taka in words, Passport, PDF, QR)...">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tool Categories Section -->
    <section id="categories" class="pb-4" aria-labelledby="categories-heading">
      <div class="container">
        <div class="tn-category-toolbar d-flex flex-nowrap align-items-center gap-3 mb-3">
          <h2 id="categories-heading" class="h4 fw-bold mb-0">Browse by Category</h2>
          <div class="tn-category-filters d-flex flex-nowrap gap-2" role="group" aria-label="Filter tools by category">
            <?php
            $tool_filter_terms = get_terms([
                'taxonomy' => 'tool_category',
                'hide_empty' => true,
                'orderby' => 'name',
                'order' => 'ASC',
            ]);
            $published_tools = wp_count_posts('tool');
            $published_tool_count = $published_tools && isset($published_tools->publish)
                ? (int) $published_tools->publish
                : 0;
            ?>
            <button type="button" class="btn btn-primary active" data-tn-filter="all" aria-pressed="true">
              All (<span data-tn-filter-count><?php echo esc_html((string) $published_tool_count); ?></span>)
            </button>
            <?php
            if (!is_wp_error($tool_filter_terms)) :
                foreach ($tool_filter_terms as $tool_filter_term) :
                    $tool_filter_label = in_array($tool_filter_term->slug, ['image', 'pdf', 'text'], true)
                        ? $tool_filter_term->name . ' Tools'
                        : $tool_filter_term->name;
            ?>
              <button type="button" class="btn tn-btn--outline" data-tn-filter="<?php echo esc_attr($tool_filter_term->slug); ?>"
                aria-pressed="false"><?php echo esc_html($tool_filter_label); ?> (<span data-tn-filter-count><?php echo esc_html((string) $tool_filter_term->count); ?></span>)</button>
            <?php
                endforeach;
            endif;
            ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Tools Grid -->
    <section class="pb-5" aria-labelledby="popular-tools-heading">
      <div class="container">
        <h2 id="popular-tools-heading" class="visually-hidden">Popular Online Tools</h2>
        <div class="row g-4">
          <?php
          $tool_cards_query = new WP_Query([
              'post_type' => 'tool',
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'orderby' => 'title',
              'order' => 'ASC',
              'no_found_rows' => true,
          ]);
          if ($tool_cards_query->have_posts()) :
              while ($tool_cards_query->have_posts()) :
                  $tool_cards_query->the_post();
                  $tool_categories = get_the_terms(get_the_ID(), 'tool_category');
                  $tool_category = !is_wp_error($tool_categories) && !empty($tool_categories) ? $tool_categories[0] : null;
                  $tool_category_slug = $tool_category ? $tool_category->slug : '';
                  $tool_category_name = $tool_category ? $tool_category->name : '';
                  $tool_path = get_post_meta(get_the_ID(), '_toolnest_tool_path', true);
                  $tool_icon = get_post_meta(get_the_ID(), '_toolnest_tool_icon', true);
                  $tool_keywords = get_post_meta(get_the_ID(), '_toolnest_tool_keywords', true);
                  $tool_tags = get_the_terms(get_the_ID(), 'tool_tag');
                  if (!is_wp_error($tool_tags) && !empty($tool_tags)) {
                      $tag_names = implode(', ', wp_list_pluck($tool_tags, 'name'));
                      $tool_keywords = $tool_keywords ? $tool_keywords . ', ' . $tag_names : $tag_names;
                  }
                  ?>
                    <div class="col-12 col-md-6 col-lg-4" data-tn-tool-card
                      data-tn-category="<?php echo esc_attr($tool_category_slug); ?>"
                      data-tn-keywords="<?php echo esc_attr($tool_keywords); ?>">
                      <article class="tn-tool-card">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="tn-tool-card__icon"><i class="bi <?php echo esc_attr($tool_icon); ?>" aria-hidden="true"></i></div>
                          <?php if ($tool_category_name) : ?>
                            <span class="tn-tool-card__badge"><?php echo esc_html($tool_category_name); ?></span>
                          <?php endif; ?>
                        </div>
                        <h3 class="tn-tool-card__title">
                          <a href="<?php echo esc_url(get_permalink()); ?>"
                            class="stretched-link text-reset"><?php the_title(); ?></a>
                        </h3>
                        <p class="tn-tool-card__desc"><?php echo esc_html(get_the_excerpt()); ?></p>
                        <span class="tn-tool-card__cta">Open Tool <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
                      </article>
                    </div>
                  <?php
              endwhile;
              wp_reset_postdata();
          else : ?>
            <div class="col-12">
              <div class="tn-card text-center py-5">
                <h3 class="h5 mb-0">No Tools found</h3>
              </div>
            </div>
          <?php endif; ?>
        </div>

        <div id="tn-grid-empty" class="tn-card text-center py-5 d-none mt-4">
          <i class="bi bi-search fs-1 text-muted mb-2 d-block" aria-hidden="true"></i>
          <h3 class="h5">No matching tools found</h3>
          <p class="text-muted mb-0">Try searching with a broader keyword such as "PDF", "Image", "Bangla", or
            "Invoice".</p>
        </div>
      </div>
    </section>

    <!-- In-Content Ad Slot -->
    <div class="container">
      <aside class="tn-ad-slot tn-ad-slot--incontent" aria-label="Advertisement">
        <span class="tn-ad-slot__label">Advertisement</span>
        <div class="tn-ad-slot__placeholder">In-Content Banner Ad Slot (Responsive)</div>
      </aside>
    </div>

    <!-- Category Overview Cards -->
    <section class="py-4" aria-labelledby="cat-cards-heading">
      <div class="container">
        <h2 id="cat-cards-heading" class="tn-section-title text-center mb-4">Explore Tool Categories</h2>
        <div class="row g-3">
          <div class="col-6 col-md-4 col-lg">
            <a href="<?php echo esc_url(add_query_arg('category', 'converters', get_permalink(get_page_by_path('all-tools')))); ?>"
              class="tn-card d-block text-center h-100 text-decoration-none">
              <i class="bi bi-arrow-left-right fs-2 text-primary d-block mb-2" aria-hidden="true"></i>
              <h3 class="h6 fw-bold mb-1">Converters</h3>
              <span class="small text-muted">Bijoy, Taka Words, Age</span>
            </a>
          </div>
          <div class="col-6 col-md-4 col-lg">
            <a href="<?php echo esc_url(add_query_arg('category', 'image', get_permalink(get_page_by_path('all-tools')))); ?>" class="tn-card d-block text-center h-100 text-decoration-none">
              <i class="bi bi-images fs-2 text-primary d-block mb-2" aria-hidden="true"></i>
              <h3 class="h6 fw-bold mb-1">Image Tools</h3>
              <span class="small text-muted">Compress, Resize, Passport</span>
            </a>
          </div>
          <div class="col-6 col-md-4 col-lg">
            <a href="<?php echo esc_url(add_query_arg('category', 'pdf', get_permalink(get_page_by_path('all-tools')))); ?>" class="tn-card d-block text-center h-100 text-decoration-none">
              <i class="bi bi-file-earmark-pdf fs-2 text-primary d-block mb-2" aria-hidden="true"></i>
              <h3 class="h6 fw-bold mb-1">PDF Tools</h3>
              <span class="small text-muted">Merge, Split &amp; Extract</span>
            </a>
          </div>
          <div class="col-6 col-md-6 col-lg">
            <a href="<?php echo esc_url(add_query_arg('category', 'text', get_permalink(get_page_by_path('all-tools')))); ?>" class="tn-card d-block text-center h-100 text-decoration-none">
              <i class="bi bi-fonts fs-2 text-primary d-block mb-2" aria-hidden="true"></i>
              <h3 class="h6 fw-bold mb-1">Text Tools</h3>
              <span class="small text-muted">Word Count, Case, Sort</span>
            </a>
          </div>
          <div class="col-12 col-md-6 col-lg">
            <a href="<?php echo esc_url(add_query_arg('category', 'business', get_permalink(get_page_by_path('all-tools')))); ?>"
              class="tn-card d-block text-center h-100 text-decoration-none">
              <i class="bi bi-briefcase fs-2 text-primary d-block mb-2" aria-hidden="true"></i>
              <h3 class="h6 fw-bold mb-1">Business</h3>
              <span class="small text-muted">QR Codes &amp; Invoices</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Why ToolNest Section -->
    <section class="py-5" aria-labelledby="why-toolnest-heading">
      <div class="container">
        <div class="tn-card p-4 p-lg-5">
          <div class="row align-items-center g-4">
            <div class="col-lg-5">
              <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2 rounded-pill mb-2">Built for Speed
                &amp; Trust</span>
              <h2 id="why-toolnest-heading" class="tn-section-title">Why Thousands Choose ToolNest</h2>
              <p class="text-muted mb-0">
                We engineered ToolNest around a simple promise: every tool works in 3 effortless steps—input, action,
                and result—without forcing you to create an account or risk your confidential files on unknown cloud
                servers.
              </p>
            </div>
            <div class="col-lg-7">
              <div class="row g-3">
                <div class="col-sm-6">
                  <div class="p-3 rounded-3 bg-light h-100 border">
                    <i class="bi bi-shield-check fs-3 text-success mb-2 d-block" aria-hidden="true"></i>
                    <h3 class="h6 fw-bold">100% Local Browser Privacy</h3>
                    <p class="small text-muted mb-0">Your PDFs, passport photos, and invoices are processed inside your
                      browser memory and never uploaded anywhere.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="p-3 rounded-3 bg-light h-100 border">
                    <i class="bi bi-lightning-charge fs-3 text-warning mb-2 d-block" aria-hidden="true"></i>
                    <h3 class="h6 fw-bold">Instant Zero-Queue Speed</h3>
                    <p class="small text-muted mb-0">No waiting in server queues or downloading compressed files over
                      slow connections. Results appear in milliseconds.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="p-3 rounded-3 bg-light h-100 border">
                    <i class="bi bi-globe-central-south-asia fs-3 text-primary mb-2 d-block" aria-hidden="true"></i>
                    <h3 class="h6 fw-bold">Tailored for Bangladesh &amp; Beyond</h3>
                    <p class="small text-muted mb-0">Full support for Bangla Unicode, Bijoy ANSI, BDT Lakh/Crore cheque
                      wording, BD passport sizes, and F-commerce slips.</p>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="p-3 rounded-3 bg-light h-100 border">
                    <i class="bi bi-phone fs-3 text-primary mb-2 d-block" aria-hidden="true"></i>
                    <h3 class="h6 fw-bold">Mobile-First &amp; Forever Free</h3>
                    <p class="small text-muted mb-0">Works smoothly on 360px smartphones, tablets, and desktops with
                      large tap targets and zero watermarks.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="blog" class="py-4" aria-labelledby="blog-heading">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h2 id="blog-heading" class="tn-section-title mb-0">Helpful Guides &amp; Tips</h2>
          <a href="<?php echo esc_url(get_permalink(get_page_by_path('blog'))); ?>" class="small fw-bold">All guides &amp; tutorials &rarr;</a>
        </div>
        <div class="row g-4">
          <div class="col-md-4">
            <article class="tn-card h-100">
              <span class="small text-primary fw-semibold">Bangla Typography</span>
              <h3 class="h5 fw-bold mt-1">When to Use Bijoy ANSI vs. Bangla Unicode</h3>
              <p class="small text-muted mb-3">Learn why government circulars and print houses still use SutonnyMJ while
                websites and social media require UTF-8 Unicode.</p>
              <a href="<?php echo esc_url(get_permalink(get_page_by_path('bijoy-to-unicode', OBJECT, 'tool'))); ?>" class="small fw-bold">Try Bijoy to Unicode Converter
                &rarr;</a>
            </article>
          </div>
          <div class="col-md-4">
            <article class="tn-card h-100">
              <span class="small text-primary fw-semibold">Application Prep</span>
              <h3 class="h5 fw-bold mt-1">Official Passport &amp; Visa Photo Dimensions Guide</h3>
              <p class="small text-muted mb-3">Compare Bangladesh 45&times;35mm e-Passport requirements with US
                2&times;2 inch visa photos and print 8 copies on one 4R sheet.</p>
              <a href="<?php echo esc_url(get_permalink(get_page_by_path('passport-photo-maker', OBJECT, 'tool'))); ?>" class="small fw-bold">Open Passport Photo Maker
                &rarr;</a>
            </article>
          </div>
          <div class="col-md-4">
            <article class="tn-card h-100">
              <span class="small text-primary fw-semibold">E-Commerce &amp; Finance</span>
              <h3 class="h5 fw-bold mt-1">Writing Error-Free Bank Cheques in Lakh &amp; Crore</h3>
              <p class="small text-muted mb-3">Avoid bounced cheques and billing mistakes by converting numerical BDT
                figures into exact English and Bangla words.</p>
              <a href="<?php echo esc_url(get_permalink(get_page_by_path('amount-to-words', OBJECT, 'tool'))); ?>" class="small fw-bold">Convert Amount to Words &rarr;</a>
            </article>
          </div>
        </div>
      </div>
    </section>

    <!-- 5-Question FAQ Section -->
    <section class="py-5" aria-labelledby="home-faq-heading">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-9">
            <h2 id="home-faq-heading" class="tn-section-title text-center mb-4">Frequently Asked Questions</h2>
            <div class="accordion tn-faq" id="homeFaqAccordion">
              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                    1. Are all tools on ToolNest completely free to use?
                  </button>
                </h3>
                <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne"
                  data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Every single utility on ToolNest is 100% free. There are no hidden subscriptions, no daily
                    conversion limits, no watermarks added to your images or PDFs, and no sign-up required.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                    2. Do my uploaded photos, PDFs, or invoices leave my device?
                  </button>
                </h3>
                <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo"
                  data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Never. All 10 tools run 100% client-side inside your web browser using modern JavaScript and HTML5
                    Canvas APIs. Your personal photos, passport scans, PDF contracts, and customer invoices never leave
                    your phone or computer.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                    3. Does ToolNest support Bengali (Bangla) fonts and Bangladesh formats?
                  </button>
                </h3>
                <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree"
                  data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes! While ToolNest serves global English users, we provide dedicated support for Bangladesh
                    workflows—including two-way Bijoy ANSI to Unicode conversion, BDT Taka/Paisa Lakh and Crore wording,
                    Bangladesh passport photo presets, and F-commerce COD courier slips.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingFour">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                    4. Do the QR codes generated on ToolNest ever expire?
                  </button>
                </h3>
                <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour"
                  data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    No. Our QR Code Generator encodes your URL, plain text, or WiFi credentials directly into the QR
                    matrix. Because there is no third-party redirect middleman, your downloaded PNG and SVG QR codes
                    work forever with no scan limits.
                  </div>
                </div>
              </div>

              <div class="accordion-item">
                <h3 class="accordion-header" id="faqHeadingFive">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#faqCollapseFive" aria-expanded="false" aria-controls="faqCollapseFive">
                    5. Can I use ToolNest on my smartphone or low-bandwidth connection?
                  </button>
                </h3>
                <div id="faqCollapseFive" class="accordion-collapse collapse" aria-labelledby="faqHeadingFive"
                  data-bs-parent="#homeFaqAccordion">
                  <div class="accordion-body text-muted">
                    Yes. Every page is lightweight, mobile-first, and tested down to 360px screen widths. Once a tool
                    page loads in your browser, you can even compress photos, convert text, or calculate ages without
                    re-uploading data over mobile networks.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
