<?php
/*
Template Name: All Tools
*/

get_header();

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
$tool_cards_query = new WP_Query([
    'post_type' => 'tool',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'title',
    'order' => 'ASC',
    'no_found_rows' => true,
]);
?>

<main id="main-content" class="py-4">
  <div class="container">
    <?php toolnest_page_breadcrumb(); ?>

    <h1 class="tn-page-title"><?php esc_html_e('All Free Online Tools', 'toolnest'); ?></h1>
    <p class="text-muted mb-4" style="max-width: 780px;">
      <?php
      printf(
          /* translators: %d: number of published tools */
          esc_html__('Explore our complete directory of %d fast, browser-based tools. Your files stay on your device; AI image tools download their models on first use, then process your photos locally. Use the search bar or category buttons below to filter tools immediately.', 'toolnest'),
          (int) $published_tool_count
      );
      ?>
    </p>
    <?php while (have_posts()) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; ?>

    <div class="tn-card mb-4">
      <div class="row g-3 align-items-center">
        <div class="col-12">
          <label for="tn-grid-search" class="visually-hidden"><?php esc_html_e('Filter tools by keyword', 'toolnest'); ?></label>
          <div class="input-group">
            <span class="input-group-text bg-white border-end-0 text-primary">
              <i class="bi bi-search" aria-hidden="true"></i>
            </span>
            <input type="search" id="tn-grid-search" class="form-control border-start-0" placeholder="<?php esc_attr_e('Search tools (e.g. Bijoy, Taka, PDF)...', 'toolnest'); ?>">
          </div>
        </div>
        <div class="col-12">
          <div class="d-flex flex-wrap gap-2" role="group" aria-label="<?php esc_attr_e('Filter tools by category', 'toolnest'); ?>">
            <button type="button" class="btn btn-primary active" data-tn-filter="all" aria-pressed="true">
              <?php esc_html_e('All Tools', 'toolnest'); ?> (<span data-tn-filter-count><?php echo esc_html((string) $published_tool_count); ?></span>)
            </button>
            <?php if (!is_wp_error($tool_filter_terms)) : ?>
              <?php foreach ($tool_filter_terms as $tool_filter_term) : ?>
                <?php
                $tool_filter_label = in_array($tool_filter_term->slug, ['image', 'pdf', 'text'], true)
                    ? $tool_filter_term->name . ' Tools'
                    : $tool_filter_term->name;
                ?>
                <button type="button" class="btn tn-btn--outline" data-tn-filter="<?php echo esc_attr($tool_filter_term->slug); ?>" aria-pressed="false">
                  <?php echo esc_html($tool_filter_label); ?> (<span data-tn-filter-count><?php echo esc_html((string) $tool_filter_term->count); ?></span>)
                </button>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4">
      <?php if ($tool_cards_query->have_posts()) : ?>
        <?php while ($tool_cards_query->have_posts()) : $tool_cards_query->the_post(); ?>
          <?php
          $tool_categories = get_the_terms(get_the_ID(), 'tool_category');
          $tool_category = !is_wp_error($tool_categories) && !empty($tool_categories) ? $tool_categories[0] : null;
          $tool_category_slug = $tool_category ? $tool_category->slug : '';
          $tool_category_name = $tool_category ? $tool_category->name : '';
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
                <div class="tn-tool-card__icon"><i class="<?php echo esc_attr(toolnest_get_tool_icon_class($tool_icon)); ?>" aria-hidden="true"></i></div>
                <?php if ($tool_category_name) : ?>
                  <span class="tn-tool-card__badge"><?php echo esc_html($tool_category_name); ?></span>
                <?php endif; ?>
              </div>
              <h2 class="tn-tool-card__title">
                <a href="<?php echo esc_url(get_permalink()); ?>" class="stretched-link text-reset"><?php the_title(); ?></a>
              </h2>
              <p class="tn-tool-card__desc"><?php echo esc_html(get_the_excerpt()); ?></p>
              <span class="tn-tool-card__cta"><?php esc_html_e('Open Tool', 'toolnest'); ?> <i class="bi bi-arrow-right" aria-hidden="true"></i></span>
            </article>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
        <div class="col-12">
          <div class="tn-card text-center py-5">
            <h2 class="h5 mb-0"><?php esc_html_e('No Tools found', 'toolnest'); ?></h2>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <?php wp_reset_postdata(); ?>

    <div id="tn-grid-empty" class="tn-card text-center py-5 d-none mt-4">
      <i class="bi bi-search fs-1 text-muted mb-2 d-block" aria-hidden="true"></i>
      <h2 class="h5"><?php esc_html_e('No matching tools found', 'toolnest'); ?></h2>
      <p class="text-muted mb-0"><?php esc_html_e('Try clearing your search or selecting "All Tools" above.', 'toolnest'); ?></p>
    </div>

    <section class="tn-card mt-5">
      <h2 class="h4 fw-bold mb-3"><?php esc_html_e('How ToolNest Keeps Your Workflow Fast and Private', 'toolnest'); ?></h2>
      <p class="text-muted">
        <?php esc_html_e('Whether you are preparing an official government job application in Bangladesh, running a Facebook commerce (F-commerce) store, or managing remote freelance projects globally, switching between slow, ad-cluttered websites wastes valuable time. ToolNest brings practical daily utilities together under one clean, consistent interface.', 'toolnest'); ?>
      </p>
      <p class="text-muted mb-0">
        <?php esc_html_e('Every tool follows a predictable three-step layout: enter your input or drop your file, adjust your preferences, and copy or download your result immediately. Because all calculations and file transformations happen inside your device’s RAM via modern browser APIs, you never have to worry about data breaches or document leaks.', 'toolnest'); ?>
      </p>
    </section>
  </div>
</main>

<?php get_footer(); ?>
