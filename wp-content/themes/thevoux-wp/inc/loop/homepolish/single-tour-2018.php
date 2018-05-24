<!-- single-tour-2018 -->
<?php
  $fixed = ot_get_option('article_fixed_sidebar', 'on');
  $fullwidth = ot_get_option('article_fullwidth', 'off');
  $dropcap = ot_get_option('article_dropcap', 'on');
  $adv_postend = ot_get_option('adv_postend');
  $adv_postend_ajax = ot_get_option('adv_postend_ajax');

  $talking_points = get_field('talking_points');
  $social_description = $talking_points ? $talking_points : get_the_excerpt();
  //$terms = hmpl_get_post_display_terms();
  $list_terms = $terms['list_terms'];
  $featured_term = $terms['featured_term'];
  // Gallery information
  $post_gallery_photos = get_post_meta($id, 'post-gallery-photos', true);
?>

<div class="row-container">

<!-- hero -->

<div class="row">
  <div class="large-centered large-10 columns">
    <div class="row hero" data-equalizer>
      <div class="large-5 columns content" data-equalizer-watch>
        <div class="table">
          <div class="table-cell">
            <h2><?php hmpl_header_title($ajax); ?></h2>
            <p><a href="">Tours</a> | <a href="">New York</a></p>
          </div>
        </div>
      </div>
      <div class="large-offset-3 large-9 columns img-container" data-equalizer-watch>
        <!-- <img src="http://via.placeholder.com/600x400"> -->
        <figure class="post-gallery">
            <?php
                $image_id = get_post_thumbnail_id();
                $image_link = wp_get_attachment_image_src($image_id,'full');
                $image = aq_resize( $image_link[0], 800, 500, true, false, true);  // Blog
                $permalink = get_permalink($id);
            ?>

            <aside class="hp-share-icon">
              <a href="<?php echo 'http://pinterest.com/pin/create/link/?url=' . esc_url( $permalink ) . '&amp;media=' . ( ! empty( $image_link[0] ) ? $image_link[0] : '' ) . '&amp;description=' . urlencode($social_description) . ''; ?>" class="circle-icon pinterest social" nopin="nopin" data-pin-no-hover="true"><span class="v1-icon-pinterest"></span></a>
            </aside>

            <img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php the_title_attribute(); ?>" />

            <?php get_template_part( 'inc/postformats/post-gallery' ); ?>
          </figure>
      </div>
    </div>
  </div>
</div>

<div class="the-content single-article-2018">
  <?php echo the_content(); ?>
</div>


<!-- featured hero -->

<div class="row">
  <div class="small-12 columns">
    <div class="row hero" data-equalizer>
      <div class="large-5 columns content" data-equalizer-watch>
        <div class="table">
          <div class="table-cell">
            <h3><?php hmpl_get_category_aside(); ?>get_category_aside</h3>
            <h2><?php hmpl_header_title($ajax); ?></h2>
            <p>Designer: <a href="">Bob Ross</a></p>
            <p>City: <a href="">New York</a></p>
          </div>
        </div>
      </div>
      <div class="large-offset-2 large-10 columns img-container" data-equalizer-watch>
        <img src="http://via.placeholder.com/600x400">
      </div>
    </div>
  </div>
</div>

<!-- swipe-image -->

<div class="row swipe-image collapse">
  <div class="large-centered large-10 columns">
    <img src="http://via.placeholder.com/1400x800">
  </div>
  <div class="large-centered large-10 columns">
    Caption
  </div>
</div>


</div><!-- row container -->
