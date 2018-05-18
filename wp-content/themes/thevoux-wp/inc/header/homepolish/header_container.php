<?php
  $id = get_queried_object_id();
  # if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = THB_THEME_ROOT. '/assets/img/logo.png'; }
  $logo = THB_THEME_ROOT. '/assets/img/homepolish-logo.png';
?>

<!-- Start Header -->
<div class="header_container">
  <header id="header" class="header hp-header style1" role="banner">
    <div class="hp-header__main">
      <div class="mobile-nav-menu-toggle-container">
        <button class="mobile-nav-menu-toggle" data-mobile-nav-menu-toggle="true">
          <span class="toggle-bar"></span>
          <span class="toggle-bar"></span>
          <span class="toggle-bar"></span>
          <span class="toggle-bar"></span>
        </button>
      </div>

      <div class="hp-header__logo">
        <a href="/">
          <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="hp-header__logo__image"/>
        </a>
      </div>

      <span class="v1-icon-search"></span>
    </div>

    <div class="hp-header__auth">
      <span class="logged-in" data-logged-in="true">
        <a class="tertiary dashboard-link" href="<?php echo HMPL_SERVICE_URI ?>/dashboard" data-dashboard-link="true">
          My Dashboard
        </a>
      </span>

      <span class="logged-in" data-logged-in="true">
        <?php do_action( 'hmpl_logout_link' ); ?>
      </span>

      <span class="logged-out" data-logged-out="true">
        <?php do_action( 'hmpl_login_link' ); ?>
      </span>
    </div>

    <div class="row full-width-row no-padding header-separator">
      <div class="small-12 columns">
        <aside class="styled_dividers style-full-width-header no-margin"></aside>
      </div>
    </div>

    <nav id="full-menu" role="navigation">
      <div id="full-menu-links">
        <a href="/" class="secondary circle-logolink">
          <span class="v1-icon-logo"></span>
        </a>

        <?php get_template_part( 'inc/header/homepolish/header_menu' ); ?>

        <div id="full-menu-links-auth">
          <span class="logged-in" data-logged-in="true">
            <span class="small"><?php do_action( 'hmpl_logout_link' ); ?></span>
          </span>

          <span class="logged-out" data-logged-out="true">
            <span class="small"><?php do_action( 'hmpl_login_link' ); ?></span>

            <span>
              <a href="<?php echo HMPL_SERVICE_URI ?>/start" class="btn">Book Your Designer</a>
            </span>
          </span>
        </div>
      </div>

      <div class="row">
        <div id="full-menu-search" class="medium-4 columns">
          <?php do_action( 'thb_quick_search' ); ?>
        </div>
      </div>
    </nav>

    <div id="mobile-quick-search-container" class="row full-width-row no-padding">
      <div id="mobile-quick-search" class="small-12">
        <form method="get" class="searchform" role="search" action="<?php echo home_url(); ?>/wp-search">
          <fieldset>
            <input name="s" type="text" class="s" placeholder="<?php _e( 'Search things like Manrepeller or Kitchens...', THB_THEME_NAME ); ?>">
          </fieldset>
        </form>
        <span class="v1-icon-close"></span>
      </div>
    </div>

    <div class="row full-width-row no-padding header-separator">
      <div class="medium-12 small-12 columns">
        <aside class="styled_dividers style-full-width-header no-margin"></aside>
      </div>
    </div>

  </header>
</div>
<!-- End Header -->
