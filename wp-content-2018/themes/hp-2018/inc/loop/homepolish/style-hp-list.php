<article itemscope <?php post_class('post style-hp-list'); ?> id="post-<?php the_ID(); ?>" role="article">
  <div class="row" data-equal=">.columns">
    <div class="small-12 medium-7 large-7 columns">
      <?php if ( has_post_thumbnail() ) { ?>
      <figure class="post-gallery <?php do_action('thb_is_gallery'); ?>">

        <?php
            $image_id = get_post_thumbnail_id();
            $image_link = wp_get_attachment_image_src($image_id,'full');
            $image_title = esc_attr( get_the_title($image_id) );
      
            $image_full = aq_resize( $image_link[0], 600, 460, true, false, true);
            $image_mobile = aq_resize( $image_link[0], 345, 264, true, false, true);  
        ?>

        <?php
          if(HMPL_MOBILE == "YES") {
        ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_mobile[0]); ?>" width="<?php echo esc_attr($image_mobile[1]); ?>" height="<?php echo esc_attr($image_mobile[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
        <?php } else { ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image_full[0]); ?>" width="<?php echo esc_attr($image_full[1]); ?>" height="<?php echo esc_attr($image_full[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
        <?php } ?>

      </figure>
      <?php } ?>
    </div>
    <div class="small-12 medium-5 large-5 columns table">
      <div class="summary">
        <?php hmpl_get_category_aside(); ?>
        <?php
          /*
            <aside class="post-author cf">
               - 
              /<time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time>
            </aside>
          */
        ?>
        <header class="post-title entry-header">
          <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="tertiary"><?php the_title(); ?></a></h3>
        </header>
        <div class="post-content">
          <p>
            <?php echo hmpl_get_talking_points(array('cutoff' => 220)); ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</article>