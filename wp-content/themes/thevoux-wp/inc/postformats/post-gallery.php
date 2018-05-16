<?php
	if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = THB_THEME_ROOT. '/assets/img/homepolish-logo.png'; }
	$post_gallery_photos = get_post_meta($id, 'post-gallery-photos', true);
	$adv_gallery_header = ot_get_option('adv_gallery_header');
    if ($post_gallery_photos) {
			$post_gallery_photos_arr = explode(',', $post_gallery_photos);
			$count = sizeof($post_gallery_photos_arr);
    }
	$i = 1;

  // If set, load gallery immediately + start at this image
  $gallery_id = isset($_GET['gallery_id']) ? $_GET['gallery_id'] : null;
?>
<div id="post-gallery-<?php the_ID(); ?>" class="mfp-hide">

	<?php if ($post_gallery_photos) { foreach ($post_gallery_photos_arr as $photo_id) { ?>
		<?php $permalink = get_permalink($photo_id); ?>
		<div class="post-gallery-content" data-gallery-permalink="<?php echo $permalink; ?>" data-gallery-id="<?php echo $photo_id; ?>" <?php echo $gallery_id == $photo_id ? "data-show-on-load=\"true\"" : ""; ?>>
			<div class="row lightbox-header">
				<div class="small-12 medium-6 medium-offset-3 columns text-center logo">
				  <div class="logolink">
						<a href="<?php echo home_url(); ?>"title="<?php bloginfo('name'); ?>">
							<img src="<?php echo esc_url($logo); ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/>
						</a>
					</div>
				</div>

				<div class="medium-3 columns">
					<span title="<?php _e('Close (Esc)', THB_THEME_NAME); ?>" class="v1-icon-close lightbox-close"></span>
				</div>
			</div>

			<div class="row full-width-row no-padding header-separator">
				<div class="medium-12 small-12 columns">
					<aside class="styled_dividers style-full-width-header no-margin"></aside>
				</div>
			</div>

			<div class="row no-padding lightbox-body">
				<div class="small-12 columns gallery-nav-mobile">
					<span class="gallery-nav">
						<a href="#" class="arrow prev"><span class="v1-icon-caret-right"></i></a>

						<p class="small"><?php echo ''.esc_attr($i) .' '. __('/', THB_THEME_NAME) .' '. esc_attr($count); ?></p>

						<a href="#" class="arrow next"><span class="v1-icon-caret-right"></i></a>

						<span class="v1-icon-close lightbox-close"></span>
					</span>
				</div>
				<div class="small-12 medium-8 columns text-center gallery-left">
					<?php
					  $title = the_title_attribute(array('echo' => 0, 'post' => $photo_id) );
					  $size = "full";
					  $full_image = wp_get_attachment_image_src($photo_id, $size);
					  $image_dimensions = hmpl_get_image_dim($full_image);
					  $desktop_img = aq_resize( $full_image[0], $image_dimensions['desktop_dim'][0], $image_dimensions['desktop_dim'][1], true, false, true ); // make sure we create the image if we don't have it already

					  if(HMPL_MOBILE == "YES") {
							$mobile_img = aq_resize( $full_image[0], $image_dimensions['mobile_dim'][0], $image_dimensions['mobile_dim'][1], true, false, true ); // grab a mobile version
							$image = $mobile_img;
					  } else {
							$image = $desktop_img;
					  }

					  $share_image = $desktop_img; // even if mobile, share the desktop size
					  $photo_caption = get_post($photo_id)->post_excerpt;
					  $talking_points = get_field('talking_points');
					  $social_description = $photo_caption ? $photo_caption : ($talking_points ? $talking_points : get_the_excerpt());
					?>
					<div class="image-container <?php echo $image_dimensions['orientation'] ?>">
					  <?php echo hmpl_get_attachment_image( $image, $social_description, true ) ?>
					</div>
				</div>
				<div class="small-12 medium-4 columns gallery-right">
					<div class="image-info">
						<aside class="meta gallery-nav-desktop">
							<span class="gallery-back-to-article">
								<span>←</span>

								<h6>Back to Article</h6>
							</span>

							<span class="gallery-nav">
								<a href="#" class="arrow prev"><span class="v1-icon-caret-right"></span></a>

								<p class="small"><?php echo ''.esc_attr($i) .' '. __('/', THB_THEME_NAME) .' '. esc_attr($count); ?></p>

								<a href="#" class="arrow next"><span class="v1-icon-caret-right"></span></a>
							</span>
						</aside>

						<?php hmpl_get_category_aside(); ?>

						<header class="post-title entry-header">
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="tertiary"><?php echo the_title(); ?></a></h3>
						</header>

						<p class="excerpt">
							<?php echo get_post($photo_id)->post_excerpt; ?>
						</p>

		        <?php
		          $attribution = get_field('attribution');
		          if($attribution) { ?>
		            <p class="italic attribution">
			            <?php echo html_entity_decode($attribution); ?>
		            </p>
		          <?php }
		        ?>

		        <div class="gallery-image-share">
							<?php
								do_action('thb_social_article_detail', $post->ID, $social_description, false, 'hide-for-small', $share_image);
							 ?>
		        </div>
		      </div>
				</div>
				<div id="mobile-tab-bars" class="hp-mobile-tab-bars">
					<?php if (is_single()) { ?>
					<div id="mobile-tab-social-icons" class="hp-mobile-tab-social-icons">
						<a class="pinterest btn" href="<?php echo pinterest_share_link($permalink, $share_image); ?>">
							<span class="v1-icon-pinterest"></span>
						</a>
						<a class="facebook btn" href="<?php echo facebook_share_link($permalink); ?>">
							<span class="v1-icon-facebook"></span>
						</a>
						<a class="twitter btn" href="<?php echo twitter_share_link($permalink, $title); ?>">
							<span class="v1-icon-twitter"></span>
						</a>
						<a class="email btn" href="mailto:?subject=Check out this Homepolish project!&body=I thought you'd like <?php echo $title; ?>: <?php echo $permalink; ?>">
							<span class="v1-icon-email"></span>
						</a>
					</div>
					<?php } ?>
				</div>
			</div>

	</div>
	<?php $i++; } }?>
</div>