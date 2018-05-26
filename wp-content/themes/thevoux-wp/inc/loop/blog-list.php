<div class="small-12 medium-6 columns">
	<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post blog-list'); ?> id="post-<?php the_ID(); ?>" role="article">
		<?php if ( has_post_thumbnail() ) { ?>
		<figure class="post-gallery">
		
			<?php
			    $image_id = get_post_thumbnail_id();
			    $image_link = wp_get_attachment_image_src($image_id,'full');
			    $image_title = esc_attr( get_the_title($post->ID) );
		
				$image = aq_resize( $image_link[0], 370, 190, true, false, true);  // Blog
		
			?>
			<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
		</figure>
		<?php } ?>
		<?php if(has_category()) { ?>
		<aside class="post-meta cf"><?php the_category(', '); ?></aside>
		<?php } ?>
		<header class="post-title entry-header">
			<h4 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
		</header>
		<aside class="post-author">
			<time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time> <em><?php _e('by', THB_THEME_NAME); ?></em> <?php the_author_posts_link(); ?>
		</aside>
		<div class="post-content">
			<?php echo thb_excerpt(200, '...'); ?>
		</div>
	</article>
</div>