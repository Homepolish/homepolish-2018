<article itemscope <?php post_class('post mega-menu-post'); ?> id="post-<?php the_ID(); ?>" role="article">
	<figure class="post-gallery">
	
		<?php
		    $image_id = get_post_thumbnail_id();
		    $image_link = wp_get_attachment_image_src($image_id,'full');
		    $image_title = esc_attr( get_the_title($post->ID) );
	
				$image = aq_resize( $image_link[0], 210, 135, true, false, true);  // Blog
	
		?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
	</figure>
	<?php hmpl_get_category_aside(); ?>
	<header class="post-title entry-header">
		<p class="small"><a href="<?php the_permalink(); ?>" class="tertiary" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
	</header>
</article>