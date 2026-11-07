<?php
/*
Template Name: Blog
*/

get_header();

$blog_page = max(1, (int) get_query_var('paged'), (int) get_query_var('page'));
$blog_query = new WP_Query([
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged' => $blog_page,
    'posts_per_page' => (int) get_option('posts_per_page'),
]);
?>

<main id="main-content" class="py-4 py-lg-5">
  <div class="container">
    <div class="row justify-content-center mb-4">
      <div class="col-lg-9">
        <?php toolnest_page_breadcrumb(); ?>
        <h1 class="tn-page-title"><?php esc_html_e('Helpful Guides & Tips', 'toolnest'); ?></h1>
        <p class="lead text-secondary"><?php esc_html_e('Guides, practical tips, and updates from ToolNest.', 'toolnest'); ?></p>
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      </div>
    </div>

    <?php if ($blog_query->have_posts()) : ?>
      <div class="row g-4">
        <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
          <div class="col-md-6 col-lg-4">
            <article <?php post_class('tn-card h-100 overflow-hidden'); ?>>
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>" class="d-block">
                  <?php the_post_thumbnail('large', ['class' => 'img-fluid w-100', 'loading' => 'lazy']); ?>
                </a>
              <?php endif; ?>
              <div class="p-4">
                <p class="small text-muted mb-2">
                  <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                  <?php
                  $categories = get_the_category();
                  if (!empty($categories)) :
                  ?>
                    <span aria-hidden="true">&middot;</span>
                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>"><?php echo esc_html($categories[0]->name); ?></a>
                  <?php endif; ?>
                </p>
                <h2 class="h5 fw-bold mt-1"><a class="text-decoration-none" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="small text-muted mb-3"><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>" class="small fw-bold"><?php esc_html_e('Read more', 'toolnest'); ?> &rarr;</a>
              </div>
            </article>
          </div>
        <?php endwhile; ?>
      </div>

      <?php
      $pagination = paginate_links([
          'total' => $blog_query->max_num_pages,
          'current' => $blog_page,
          'type' => 'list',
          'prev_text' => __('&larr; Previous', 'toolnest'),
          'next_text' => __('Next &rarr;', 'toolnest'),
      ]);
      if ($pagination) :
      ?>
        <nav class="mt-4" aria-label="<?php esc_attr_e('Blog pages', 'toolnest'); ?>">
          <?php echo wp_kses_post($pagination); ?>
        </nav>
      <?php endif; ?>
    <?php else : ?>
      <div class="row justify-content-center">
        <div class="col-lg-9">
          <p class="tn-card p-4 text-muted"><?php esc_html_e('No blog posts have been published yet. Please check back soon.', 'toolnest'); ?></p>
        </div>
      </div>
    <?php endif; ?>
  </div>
</main>

<?php
wp_reset_postdata();
get_footer();
