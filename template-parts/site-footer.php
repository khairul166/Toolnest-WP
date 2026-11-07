<?php
$toolnest_footer_pages = [];
foreach (['all-tools', 'about', 'contact', 'privacy-policy', 'terms', 'disclaimer'] as $page_slug) {
    $toolnest_footer_pages[$page_slug] = get_page_by_path($page_slug);
}
?>

<!-- Above Footer Ad Slot -->
<div class="container">
<?php toolnest_render_footer_ad_slot(); ?>
</div>

  <!-- FOOTER START -->
  <footer class="tn-footer" role="contentinfo">
    <div class="container">
      <div class="row g-4 pb-4 border-bottom border-secondary border-opacity-25">
        <?php if (is_active_sidebar('footer-widget')) : ?>
          <?php dynamic_sidebar('footer-widget'); ?>
        <?php else : ?>
          <?php echo 'Add Widget to this area'; ?>
        <?php endif; ?>

      </div>

      <div
        class="pt-4 d-flex flex-column flex-sm-row justify-content-between align-items-center small text-secondary gap-2">
        <p class="mb-0">&copy; 2026 ToolNest. All rights reserved. Built for Global &amp; Bangladesh users.</p>
        <p class="mb-0">Fast, accessible, zero-upload browser tools.</p>
      </div>
    </div>
  </footer>
  <!-- FOOTER END -->
