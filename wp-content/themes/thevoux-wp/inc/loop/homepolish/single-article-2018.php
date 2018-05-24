<!-- single-article-2018 -->
<?php
  //$fixed = ot_get_option('article_fixed_sidebar', 'on');
  //$fullwidth = ot_get_option('article_fullwidth', 'off');
  //$dropcap = ot_get_option('article_dropcap', 'on');
  //$adv_postend = ot_get_option('adv_postend');
  //$adv_postend_ajax = ot_get_option('adv_postend_ajax');

  //$talking_points = get_field('talking_points');
  //$social_description = $talking_points ? $talking_points : get_the_excerpt();
  //$terms = hmpl_get_post_display_terms();
  //$list_terms = $terms['list_terms'];
  //$featured_term = $terms['featured_term'];
  // Gallery information
  //$post_gallery_photos = get_post_meta($id, 'post-gallery-photos', true);
?>

<div class="row-container">

<!-- hero -->

<div class="row hero hero-article">
    <div class="large-centered large-10 columns">
        <div class="row collapsed">
            <div class="small-12 text-center">
                <h4><?php hp_2018_get_category_aside(); ?></h4>
            </div>
            <div class="small-12 text-center">
                <h2><?php hmpl_header_title($ajax); ?></h2>
            </div>
            <div class="small-12">

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
            <div class="small-12 text-center post-meta">

                <?php 
                    //Posted
                    hp_2018_header_date_author(); 
                ?>

                <?php
                    // Designer
                    $designer_hash = wp_get_post_terms($post->ID, 'designer'); // Grab just the first designer
                    $designer_name = $designer_hash ? $designer_hash[0]->name : null;
                    $designer_slug = $designer_hash ? $designer_hash[0]->slug : null;

                    if($designer_name && $designer_slug) { ?>
                        <span ="meta-key">Designer: </span><a href="<?php echo get_term_link($designer_slug, 'designer') ?>" class="secondary"><?php echo $designer_name; ?></a>
                    <?php }
                ?>

                <?php 
                    //City
                    $location_hash = wp_get_post_terms($post->ID, 'location'); // Grab just the first location
                    $location_name = $location_hash ? $location_hash[0]->name : null;
                    $location_slug = $location_hash ? $location_hash[0]->slug : null;

                    if( $location_name && $location_slug ) { ?>
                        <span ="meta-key">City: </span><a href="<?php echo get_term_link($location_slug, 'location') ?>" class="secondary"><?php echo $location_name; ?></a>
                    <?php }   
                ?>
            </div>
        </div>
    </div>
</div>

<?php the_content(); ?>


</div><!-- row container -->
