<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post style-masonry'); ?> id="post-<?php the_ID(); ?>" role="article">
	<?php if ( has_post_thumbnail() ) { ?>
	<figure class="post-gallery <?php do_action('thb_is_gallery'); ?>">
	
		<?php
		    $image_id = get_post_thumbnail_id();
		    $image_link = wp_get_attachment_image_src($image_id,'full');
		    $image_title = esc_attr( get_the_title($post->ID) );
			
				$image = aq_resize( $image_link[0], 600, null, true, false, true);
	
		?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
	</figure>
	<?php } ?>
		<?php if(has_category()) { ?>
		<aside class="post-meta cf"><?php the_category(', '); ?></aside>
		<?php } ?>
		<aside class="post-author cf">
			 - 
			<time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time>
		</aside>
		<header class="post-title">
			<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<div class="post-content">
			<?php echo thb_excerpt(140, '&hellip;'); ?>
			<?php get_template_part( 'inc/postformats/post-links' ); ?>
		</div>
</article>