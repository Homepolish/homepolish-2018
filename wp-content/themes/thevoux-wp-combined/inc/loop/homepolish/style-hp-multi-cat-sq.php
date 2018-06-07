<article itemscope <?php post_class('post style-hp-multi-cat-sq'); ?> id="post-<?php the_ID(); ?>" role="article">
	<div class="row" data-equal=">.columns">
		<div class="small-6 medium-3 large-3 columns">
			<?php if ( has_post_thumbnail() ) { ?>
			<figure class="post-gallery <?php do_action('thb_is_gallery'); ?>">
			
				<?php
				    $image_id = get_post_thumbnail_id();
				    $image_link = wp_get_attachment_image_src($image_id,'full');
				    $image_title = esc_attr( get_the_title($image_id) );
			
					$image = aq_resize( $image_link[0], 150, 150, true, false, true);  // Blog
			
				?>
				<a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
			</figure>
			<?php } ?>
		</div>
		<div class="small-6 medium-9 large-9 columns">
			<div class="summary">
				<?php hmpl_get_category_aside(); ?>
				<header class="post-title entry-header">
					<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="tertiary"><?php echo thb_ShortenTitle(get_the_title(), 70); ?></a></h4>
				</header>
				<div class="post-content">
					<?php echo thb_excerpt(100, '&hellip;'); ?>
				</div>
			</div>
		</div>
	</div>
</article>