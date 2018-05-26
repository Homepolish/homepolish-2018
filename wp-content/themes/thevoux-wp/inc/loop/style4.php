<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post style4'); ?> id="post-<?php the_ID(); ?>" role="article">
	<?php if ( has_post_thumbnail() ) { ?>
	<figure class="post-gallery">
		<?php
		    $image_id = get_post_thumbnail_id();
		    $image_link = wp_get_attachment_image_src($image_id,'full');
		    $image_title = esc_attr( get_the_title($image_id) );
		
			$image = aq_resize( $image_link[0], 100, 90, true, false, true);  // Blog
		
		?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
	</figure>
	<?php } ?>
	<div class="style4-container">
		<aside class="post-author">
			<time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time>
		</aside>
		<header class="post-title entry-header">
			<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
		</header>
		<div class="post-content small">
			<?php echo thb_excerpt(70, '&hellip;'); ?>
		</div>
	</div>
</article>