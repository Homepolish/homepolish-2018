<!-- style2.php -->
<article itemscope <?php post_class('post style2'); ?> id="post-<?php the_ID(); ?>" role="article">
	<div class="row" data-equal=">.columns">
		<div class="small-12 medium-5 large-6 columns">
			<?php if ( has_post_thumbnail() ) { ?>
			<figure class="post-gallery <?php do_action('thb_is_gallery'); ?>">
			
				<?php
				    $image_id = get_post_thumbnail_id();
				    $image_link = wp_get_attachment_image_src($image_id,'full');
				    $image_title = esc_attr( get_the_title($image_id) );
					
					if ($featuredImage) {
						$image = aq_resize( $image_link[0], $featuredImage[0], $featuredImage[1], true, false, true); 	
					} else {
						$image = aq_resize( $image_link[0], 600, 440, true, false, true);
					}
			
				?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
			</figure>
			<?php } ?>
		</div>
		<div class="small-12 medium-5 large-6 columns table">
			<div>
				<?php if(has_category()) { ?>
				<aside class="post-meta cf"><?php the_category(', '); ?></aside>
				<?php } ?>
				<aside class="post-author cf">
					 - 
					<time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time>
				</aside>
				<header class="post-title">
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				</header>
				<aside class="post-author">
					<em><?php _e('by', THB_THEME_NAME); ?></em> <?php the_author_posts_link(); ?>
				</aside>
				<div class="post-content small">
					<?php get_template_part( 'inc/postformats/post-links' ); ?>
				</div>
			</div>
		</div>
	</div>
</article>