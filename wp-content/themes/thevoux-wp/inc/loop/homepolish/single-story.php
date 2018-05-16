<!-- single-story -->
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
<div class="post-detail-row single-story">
  <div class="row"<?php if ($fixed == 'on') { ?> data-equal=">.columns"<?php } ?>>
    <!-- <div class="small-12 medium-12 <?php echo ($fullwidth == 'on' ? 'large-12' : 'large-8'); ?> columns"> -->
    <div class="small-12 columns">
      <article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post post-detail single-story'); ?> id="post-<?php the_ID(); ?>" role="article" data-id="<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>">
        <?php do_action( 'thb_fb_information' ); ?>
        <header class="post-title entry-header show-for-medium-up row">
          <div class="small-12 medium-10 large-10 columns">
            <?php hmpl_get_category_aside(); ?>

            <?php hmpl_header_title($ajax); ?>

            <?php hmpl_header_date_author(); ?>
          </div>

          <div class="medium-2 large-2 columns">
            <?php do_action('thb_social_article_detail', $post->ID, $social_description, false, 'hide-for-small'); ?>
          </div>
        </header>

        <div class="post-content-container">
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

          <header class="post-title entry-header hide-for-medium-up row">
            <div class="small-12 columns">
              <?php hmpl_get_category_aside(); ?>

              <?php hmpl_header_title($ajax); ?>

              <?php hmpl_header_date_author(); ?>
            </div>
          </header>

          <div class="post-content entry-content cf single-story">
            <div class="small-12 medium-12 large-12 columns" data-equal=">.columns">
              <div class="row data-grid">
                  <?php
                    if(get_field('client')) { ?>
                      <div class="small-12 medium-3 large-3 columns data-grid-item">
                        <div class="data-grid-item-key">
                          <h6>Who</h6>
                        </div>
                        <div class="data-grid-item-value">
                          <p class="small"><?php echo get_field('client'); ?></p>
                        </div>
                      </div>
                    <?php }

                    $designer_hash = wp_get_post_terms($post->ID, 'designer'); // Grab just the first designer
                    $designer_name = $designer_hash ? $designer_hash[0]->name : null;
                    $designer_slug = $designer_hash ? $designer_hash[0]->slug : null;

                    if($designer_name && $designer_slug) { ?>
                      <div class="small-12 medium-3 large-3 columns data-grid-item">
                        <div class="data-grid-item-key">
                          <h6>Designer</h6>
                        </div>
                        <div class="data-grid-item-value">
                          <p class="small"><a href="<?php echo get_term_link($designer_slug, 'designer') ?>" class="secondary"><?php echo $designer_name; ?></a></p>
                        </div>
                      </div>
                    <?php }

                    $location_hash = wp_get_post_terms($post->ID, 'location'); // Grab just the first location
                    $location_name = $location_hash ? $location_hash[0]->name : null;
                    $location_slug = $location_hash ? $location_hash[0]->slug : null;

                    if($location_name && $location_slug) { ?>
                      <div class="small-12 medium-3 large-3 columns data-grid-item">
                        <div class="data-grid-item-key">
                          <h6>Where</h6>
                        </div>
                        <div class="data-grid-item-value">
                          <p class="small"><a href="<?php echo get_term_link($location_slug, 'location') ?>" class="secondary"><?php echo $location_name; ?></a></p>
                        </div>
                      </div>
                    <?php }

                    if(get_field('time')) { ?>
                      <div class="small-12 medium-3 large-3 columns data-grid-item">
                        <div class="data-grid-item-key">
                          <h6>Time</h6>
                        </div>
                        <div class="data-grid-item-value">
                          <p class="small"><a href="/how" class="secondary"><?php echo get_field('time'); ?></a></p>
                        </div>
                      </div>
                    <?php }
                  ?>
              </div>

              <?php
                // $excerpt = get_the_excerpt();
                $talking_points = get_field('talking_points');
                $attribution = get_field('attribution');
                if($talking_points) { ?>
                  <div class="row excerpt">
                    <p class="italic">
                      <?php  echo $talking_points; ?>
                    </p>

                    <?php if($attribution) { ?>
                      <p class="italic de-emphasize attribution">
                        <?php echo html_entity_decode($attribution); ?>
                      </p>
                    <?php } ?>
                  </div>
                <?php }
              ?>

              <div class="row post-content-body">
                <?php echo the_content(); ?>
              </div>

              <?php if (! empty($list_terms)) { ?>
                <div class="row">
                  <div class="small-12 medium-9 columns list-terms-container">
                    <span class="extra-small italic">In this tour:</span>

                    <?php foreach ($list_terms as $key => $term): ?>
                      <span class="post-term"><a class="tertiary" href="<?php echo $term->url; ?>"><h6><?php echo $term->name; ?></h6></a><?php echo ($key + 1 != count($list_terms) ? '<span class="extra-small">,</span>' : ''); ?></span>
                    <?php endforeach ?>
                  </div>
                </div>
              <?php } ?>

              <?php if ($post_gallery_photos) { ?>
                <div class="row">
                  <?php hmpl_gallery_button($id); ?>
                </div>
              <?php } ?>
            </div>

            <?php if (ot_get_option('article_author', 'on') == 'on') { ?>
              <div class="category_container author-information">
                <div class="inner">
                  <section id="authorpage" class="authorpage">
                    <?php do_action('thb_author'); ?>
                  </section>
                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </article>

      <?php if ( $ajax == '0' ) { ?>
        <!-- Start #comments -->
        <section id="comments" class="cf full">
          <?php comments_template('', true ); ?>
        </section>
        <!-- End #comments -->
      <?php } ?>

    </div>

    <?php if ($fullwidth == 'off') { ?>
      <?php
        if ( $ajax == '0' ) {
          get_sidebar('single');
        } else {
          get_sidebar('single-ajax');
        }
       ?>
    <?php } ?>
  </div>

  <?php get_template_part( 'inc/postformats/post-related' ); ?>

  <?php
    /*
    if ( $ajax == '0' && $adv_postend) {
      echo '<aside class="ad_container_bottom">'.do_shortcode(wp_kses_post($adv_postend)).'</aside>';
    } else if ( $ajax == '1' && $adv_postend_ajax) {
      echo '<aside class="ad_container_bottom">'.do_shortcode(wp_kses_post($adv_postend_ajax)).'</aside>';
    }
    */
  ?>
</div>
