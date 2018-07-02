<?php if ( has_post_thumbnail() ) { ?>
	<figure class="post-gallery">
		<?php
		    $image_id = get_post_thumbnail_id();
		    $image_link = wp_get_attachment_image_src($image_id,'full');
				$image = aq_resize( $image_link[0], 800, 500, true, false, true);  // Blog
		?>
		<img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php the_title_attribute(); ?>" />
	</figure>
<?php } else { ?>
	<p class="text-center"><strong><?php _e('Please select a featured image for your post', THB_THEME_NAME); ?></strong></p>
<?php } ?>