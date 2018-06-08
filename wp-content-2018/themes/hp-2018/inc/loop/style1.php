<!-- style1.php -->
<article itemscope <?php post_class('post style1'); ?> id="post-<?php the_ID(); ?>" role="article">
	<div class="row" data-equal=">.columns">
		<div class="small-12 medium-5 large-6 columns">
			<?php if ( has_post_thumbnail() ) { ?>
			<figure class="post-gallery <?php do_action('thb_is_gallery'); ?>">
			
				<?php
				    $image_id = get_post_thumbnail_id();
				    $image_link = wp_get_attachment_image_src($image_id,'full');
				    $image_title = esc_attr( get_the_title($image_id) );
			
					$image = aq_resize( $image_link[0], 600, 460, true, false, true);  // Blog
			
				?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
			</figure>
			<?php } ?>
		</div>
		<div class="small-12 medium-5 large-6 columns table">
			<div class="summary">
				<?php if(has_category()) { ?>
				<aside class="post-meta cf"><h6><?php the_category(' | '); ?></h6></aside>
				<?php } ?>
				<?php
					/*
						<aside class="post-author cf">
							 - 
							/<time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time>
						</aside>
					*/
				?>
				<header class="post-title entry-header">
					<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="tertiary"><?php the_title(); ?></a></h3>
				</header>
				<div class="post-content small">
					<?php echo thb_excerpt(275, '&hellip;'); ?>
					<?php # get_template_part( 'inc/postformats/post-links' ); ?>
				</div>
			</div>
		</div>
	</div>
</article>