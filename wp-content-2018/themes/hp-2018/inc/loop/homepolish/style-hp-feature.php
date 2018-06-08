<article itemscope <?php post_class('post style-hp-feature'); ?> id="post-<?php the_ID(); ?>" role="article">
	<?php if ( has_post_thumbnail() ) { ?>
	<figure class="post-gallery <?php do_action('thb_is_gallery'); ?>">
		<?php
			$image_id = hmpl_get_post_featured_thumbnail_id();
			$image_link = wp_get_attachment_image_src($image_id, 'full');
			$image_title = esc_attr( get_the_title($image_id) );

			$image_full = aq_resize( $image_link[0], 1024, 345, true, false, true);
			$image_mobile = aq_resize( $image_link[0], 375, 287, true, false, true);
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
	<div class="style-hp-feature-container">
		<?php hmpl_get_category_aside(); ?>
		<aside class="post-author cf">
		</aside>
		<header class="post-title entry-header">
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="tertiary"><?php the_title(); ?></a></h2>
		</header>
	</div>
</article>