<a href="#main-content" class="tn-skip-link">Skip to main content</a>

<!-- HEADER START -->
<header class="tn-header" role="banner">
  <nav class="navbar navbar-expand-lg py-2" aria-label="Main Navigation">
    <div class="container">
      <a class="navbar-brand tn-header__brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="ToolNest Home">
        <img src="<?php echo esc_url(get_theme_file_uri('/assets/img/logo.svg')); ?>" alt="ToolNest - Free Online Tools" class="tn-header__logo" width="180"
          height="38">
      </a>

      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
        data-bs-target="#tnMainNav" aria-controls="tnMainNav" aria-expanded="false"
        aria-label="Toggle navigation menu">
        <i class="bi bi-list fs-2 text-dark" aria-hidden="true"></i>
      </button>

      <div class="collapse navbar-collapse" id="tnMainNav">
        <?php
        wp_nav_menu([
            'theme_location' => 'primary',
            'container' => false,
            'menu_class' => 'navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-1',
            'fallback_cb' => 'toolnest_primary_menu_fallback',
        ]);
        ?>

        <div class="tn-header__search-wrap mt-2 mt-lg-0">
          <label for="tn-header-search" class="visually-hidden">Search tools</label>
          <i class="bi bi-search tn-header__search-icon" aria-hidden="true"></i>
          <input type="search" id="tn-header-search" class="form-control tn-header__search-input"
            placeholder="Search tools (e.g. PDF, Bijoy, QR)..." autocomplete="off">
          <div id="tn-header-search-results" class="tn-search-results" role="region" aria-label="Search suggestions">
          </div>
        </div>
        <button type="button" class="tn-theme-toggle ms-lg-2 mt-2 mt-lg-0" data-tn-theme-toggle
          aria-label="Switch to dark mode" title="Switch to dark mode"><i class="bi bi-moon-stars"
            aria-hidden="true"></i></button>
      </div>
    </div>
  </nav>
</header>
<!-- HEADER END -->

<!-- Top Leaderboard Ad Widget Area -->
<?php if (is_active_sidebar('header-leaderboard-ad')) : ?>
  <?php dynamic_sidebar('header-leaderboard-ad'); ?>
<?php else : ?>
  <div class="container">
    <aside class="tn-ad-slot tn-ad-slot--leaderboard" aria-label="Advertisement">
      <span class="tn-ad-slot__label">Advertisement</span>
      <div class="tn-ad-slot__placeholder">Responsive Leaderboard Ad Slot (728 &times; 90 / 320 &times; 50)</div>
    </aside>
  </div>
<?php endif; ?>
