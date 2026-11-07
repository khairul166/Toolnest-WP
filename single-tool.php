<?php get_header(); ?>

  <main id="main-content" class="py-4">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-8">
          <?php toolnest_tool_breadcrumb(); ?>

          <h1 class="tn-page-title"><?php echo esc_html(get_the_title()); ?></h1>
          <div class="text-muted mb-3">
            <?php the_excerpt(); ?>
          </div>

          <?php
            if (have_posts()) {
              while (have_posts()) {
                the_post();
                the_content();
              }
            }?>

          <?php
          $current_tool_id = get_the_ID();
          $current_tool_categories = get_the_terms($current_tool_id, 'tool_category');
          $related_tools = null;

          if (!is_wp_error($current_tool_categories) && !empty($current_tool_categories)) {
              $related_tools = new WP_Query([
                  'post_type' => 'tool',
                  'post_status' => 'publish',
                  'posts_per_page' => 3,
                  'post__not_in' => [$current_tool_id],
                  'tax_query' => [
                      [
                          'taxonomy' => 'tool_category',
                          'field' => 'term_id',
                          'terms' => wp_list_pluck($current_tool_categories, 'term_id'),
                      ],
                  ],
                  'orderby' => 'title',
                  'order' => 'ASC',
                  'no_found_rows' => true,
              ]);
          }
          ?>
          <?php if ($related_tools && $related_tools->have_posts()) : ?>
            <section aria-labelledby="related-heading">
              <h2 id="related-heading" class="tn-section-title"><?php esc_html_e('Related Tools You May Need', 'toolnest'); ?></h2>
              <div class="row g-3">
                <?php while ($related_tools->have_posts()) : $related_tools->the_post(); ?>
                  <div class="col-md-4">
                    <article class="tn-tool-card p-3">
                      <h3 class="h6 fw-bold mb-1">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="stretched-link text-reset"><?php the_title(); ?></a>
                      </h3>
                      <p class="small text-muted mb-0"><?php echo esc_html(get_the_excerpt()); ?></p>
                    </article>
                  </div>
                <?php endwhile; ?>
              </div>
            </section>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>

        <!-- Desktop Sticky Sidebar -->
        <div class="col-lg-4">
          <div class="tn-sidebar-sticky">
            <?php if (is_active_sidebar('tool-page-sidebar')) : ?>
              <?php dynamic_sidebar('tool-page-sidebar'); ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </main>

<?php get_footer(); ?>
