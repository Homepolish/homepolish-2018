<!-- single-test -->
<?php
  $fixed = ot_get_option('article_fixed_sidebar', 'on');
  $fullwidth = ot_get_option('article_fullwidth', 'off');
  $dropcap = ot_get_option('article_dropcap', 'on');
  $adv_postend = ot_get_option('adv_postend');
  $adv_postend_ajax = ot_get_option('adv_postend_ajax');

  $talking_points = get_field('talking_points');
  $social_description = $talking_points ? $talking_points : get_the_excerpt();
  $terms = hmpl_get_post_display_terms();
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


<!-- 2x -->
    
<div class="row two-x">
  <div class="large-centered large-10 columns">
    <div class="row">
      <div class="large-6 columns">
        <div class="row collapse">
          <div class="large-11 columns">
            <img src="http://via.placeholder.com/600x400">
          </div>
          <div class="large-centered large-10 columns">
            <h3>Happy Little Post Title Goes Here: 10 Tips for Stuff</h3>
            <p><a href="">Tours</a> | <a href="">New York</a></p>
          </div>
        </div>
      </div>
      <div class="large-6 columns">
        <div class="row collapse">
          <div class="large-offset-1 large-11 columns">
            <img src="http://via.placeholder.com/600x400">
          </div>
          <div class="large-offset-2 large-centered large-9 columns">
            <h3>Happy Little Post Title Goes Here: 10 Tips for Stuff</h3>
            <p><a href="">Tours</a> | <a href="">New York</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
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

<!-- block quote styling -->

<div class="row blockquote-row">
  <div class="large-offset-3 large-6 large-centered columns">
    <p>The collapse class lets you remove column gutters (padding).</p>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.The collapse class lets you remove column gutters (padding).</p>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.</p>
    <blockquote>
      The collapse class lets you remove column gutters (padding).
    </blockquote>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.</p>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.</p>
    <blockquote>
      The collapse class lets you remove column gutters (padding).
    </blockquote>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.</p>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.</p>
  </div>
</div>

<!-- lg-img-caption -->

<div class="row lg-img-caption collapse">
  <div class="small-12 columns">
    <img src="http://via.placeholder.com/1600x600">
  </div>
  <div class="small-12 columns">
    <p>Caption</p>
  </div>
</div>

<!-- split-image-quote -->

<div class="row collapse" data-equalizer>
  <div class="large-6 columns" data-equalizer-watch>
    <img src="http://via.placeholder.com/650x1400">
  </div>
  <div class="large-offset-1 large-5 columns" data-equalizer-watch>
    <div class="table">
      <div class="table-cell">
        <p>Happy Little Post Title Goes Here: 10 Tips for Stuff</p>
        <p>- Name</p>
      </div>
    </div>
  </div>
</div>

<!-- single-column-text -->

<div class="row collapse">
  <div class="large-centered large-6 columns">
    <p>The collapse class lets you remove column gutters (padding).</p>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.The collapse class lets you remove column gutters (padding).</p>
    <p>There are times when you won't want each media query to be collapsed or uncollapsed. In this case, use the media query size you want and collapse or uncollapse and add that to your row element. Example removes the gutter at the large breakpoint and then adds the gutter to columns at medium and small.</p>
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

<!-- lg-img-overlap-quote -->

<div class="row lg-img-overlap-quote collapse">
  <div class="small-12 columns">
    <div class="row collapse">
      <div class="large-centered large-10 columns">
        <img src="http://via.placeholder.com/1400x1000">
      </div>
      <div class="large-3 columns quote">
      This is an overlapping quote that you need to read.
    </div>
  </div>
</div>

</div><!-- row container -->
