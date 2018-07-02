<?php
	$post_gallery_photos = get_post_meta($id, 'post-gallery-photos', true);
	if ($post_gallery_photos) {
		$post_gallery_photos_arr = explode(',', $post_gallery_photos);
		$count = sizeof($post_gallery_photos_arr);
	}
?>
<?php if ( has_post_thumbnail() ) { ?>
	<figure class="post-gallery">
		<?php
		    $image_id = get_post_thumbnail_id();
		    $image_link = wp_get_attachment_image_src($image_id,'full');
		    $image = aq_resize( $image_link[0], 800, 500, true, false, true);  // Blog
		?>
		<img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php the_title_attribute(); ?>" />
		<?php if ($post_gallery_photos) { ?>
		<a href="#post-gallery-<?php the_ID(); ?>" class="gallery-link" data-class="post-gallery-lightbox"><div class="rel"><?php _e('View Gallery', THB_THEME_NAME); ?><br>
		<em><?php echo $count; ?> <?php _e('Photos', THB_THEME_NAME); ?></em></div></a>
		<?php } else { ?>
		<a href="#" class="gallery-link empty" data-class="post-gallery-lightbox"><div class="rel"><?php _e('Please Add Photos <br> to your Gallery', THB_THEME_NAME); ?></div></a>
		<?php } ?>
	</figure>
<?php } else { ?>
	<p class="text-center"><strong><?php _e('Please select a featured image for your post', THB_THEME_NAME); ?></strong></p>
<?php } ?>
<?php get_template_part( 'inc/postformats/post-gallery' ); ?>