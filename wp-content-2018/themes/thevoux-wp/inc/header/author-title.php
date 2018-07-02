<!-- Start Author title -->
<div id="author-title" class="parallax_bg">
  <div class="row">
    <div class="small-12 medium-6 columns">
      <div clas="row no-padding">
        <div class="small-12 medium-9 columns author-info">
          <h1 class="author-name">
            <?php echo get_the_author(); ?>
          </h1>

          <h6 class="author-position">
            <?php echo get_the_author_meta('position'); ?>
          </h6>

          <p class="small author-link-desktop">
            <a href="<?php echo get_the_author_meta('user_url'); ?>" class="secondary" target="_blank">
              <?php echo get_the_author_meta('user_url'); ?>
            </a>
          </p>
        </div>

        <div class="small-12 medium-3 author-avatar">
          <?php echo get_wp_user_avatar(get_the_author_meta('ID'), 120); ?>
        </div>

        <div class="small-12 hide-for-medium-up">
          <p class="small author-link-mobile">
            <a href="<?php echo get_the_author_meta('user_url'); ?>" class="secondary" target="_blank">
              <?php echo get_the_author_meta('user_url'); ?>
            </a>
          </p>
        </div>
      </div>
    </div>

    <div class="small-12 medium-6 columns">
      <p class="author-description">
        <?php echo get_the_author_meta('description'); ?>
      </p>

      <?php echo hmpl_author_social_links(); ?>
    </div>
  </div>
</div>
<!-- End Author title -->