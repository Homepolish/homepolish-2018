<?php function thb_postcarousel( $atts, $content = null ) {
    extract(shortcode_atts(array(
    	'style'	=> 'style1',
    	'columns' => '4',
    	'item_count' => '4',
     	'source' => 'by-category',
     	'cat' => '',
     	'post_ids' => '',
     	'tag_slugs' => '',
     	'author_ids' => '',
     	'pagination' => '',
     	'navigation' => '',
     	'excluded_tag_ids' => '',
     	'excluded_cat_ids' => '',
  	), $atts));
  
	
	ob_start();
	switch($style) {
		case 'style1':
			$style_class = 'featured-style4';
			break;
		case 'style2':
			$style_class = 'featured-style5';
			break;
		case 'style3':
			$style_class = 'featured-style6';
			break;
	}
	$pagi = ($pagination == 'true' ? 'true' : 'false');
	$nav = ($navigation == 'true' ? 'true' : 'false');
	
	$args = array(
		'nopaging' => 0, 
		'post_type'=>'post', 
		'post_status' => 'publish', 
		'ignore_sticky_posts' => 1,
		'no_found_rows' => true,
		'suppress_filters' => 0
	);
	if ($source == 'most-recent') {
		$excluded_tag_ids = explode(',',$excluded_tag_ids);
		$excluded_cat_ids = explode(',',$excluded_cat_ids);
		$args = wp_parse_args( 
			array(
				'showposts' => $item_count,
				'tag__not_in' => $excluded_tag_ids,
				'category__not_in' => $excluded_cat_ids
			)
		, $args );
	} else if ($source == 'by-category') {
	 	if (!empty($cat)) {
	 		$cats = explode(',',$cat);
	 		$args = wp_parse_args( 
	 			array(
	 				'showposts' => $item_count,
	 				'category__in' => $cats
	 			)
	 		, $args );	
	 	}
	} else if ($source == 'by-id') {
		$post_id_array = explode(',', $post_ids);
		
		$args = wp_parse_args( 
			array(
				'post__in' => $post_id_array,
				'showposts' => 99
			)
		, $args );	
	} else if ($source == 'by-tag') {
		$post_tag_array = explode(',', $tag_slugs);
		
		$args = wp_parse_args( 
			array(
				'showposts' => $item_count,
				'tag_slug__in' => $post_tag_array
			)
		, $args );	
	} else if ($source == 'by-share') {
		
		$args = wp_parse_args( 
			array(
				'showposts' => $item_count,
				'meta_key' => 'thb_pssc_counts',  
				'orderby' => 'meta_value_num'
			)
		, $args );	
	} else if ($source == 'by-author') {
		$post_author_array = explode(',', $author_ids);
		
		$args = wp_parse_args( 
			array(
				'showposts' => $item_count,
				'author__in' => $post_author_array
			)
		, $args );	
	}
	$posts = new WP_Query( $args );
	if ( $posts->have_posts() ) { ?>
		<?php switch($columns) {
			case 1:
				$imagesize=array("800","400");
				break;
			case 2:
				$imagesize=array("800","500");
				break;
			case 3:
				$imagesize=array("800","600");
				break;
			case 4:
				$imagesize=array("800","600");
				break;
			case 5:
				$imagesize=array("800","600");
				break;
			case 6:
				$imagesize=array("800","600");
				break;
		} ?>
		<div class="slick <?php echo $style_class; ?><?php if($pagi == 'true') { ?> dark-pagination bottom-margin<?php } ?> <?php echo ($style == 'style3' && $nav == 'true') ? 'outset-nav' : ''; ?> <?php echo ($style == 'style3') ? 'mini-columns' : ''; ?>" data-center="<?php echo ($style == 'style3') ? 'false' : 'true'; ?>" data-columns="<?php echo $columns; ?>" data-pagination="<?php echo $pagi; ?>" data-navigation="<?php echo $nav; ?>">
			<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
				<?php
				    $image_id = get_post_thumbnail_id();
				    $image_link = wp_get_attachment_image_src($image_id,'full');
				    $image = aq_resize( $image_link[0], $imagesize[0], $imagesize[1], true, false, true);
				?>
				<?php if ($style == 'style1') {?>
					<article class="post featured-style4">
						<img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" />
						<div class="featured-title">
							<aside class="post-meta cf"><?php the_category(', '); ?></aside>
							<div class="post-title">
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							</div>
							<div class="post-excerpt">
								<?php echo thb_excerpt(100); ?>
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="more"><?php _e('Read More &rarr;', THB_THEME_NAME ); ?></a>
							</div>
							
						</div>
					</article>
				<?php } else if ($style == 'style2') {?>
					<div class="columns">
						<article class="post featured-style5">
							<figure class="post-gallery">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" /></a>
							</figure>
							<div class="post-title">
								<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
							</div>
							<div class="post-excerpt">
								<?php get_template_part( 'inc/postformats/post-just-shares' ); ?>
							</div>
						</article>
					</div>
				<?php } else if ($style == 'style3') {?>
					<div class="columns">
						<article class="post featured-style5">
							<figure class="post-gallery">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" /></a>
							</figure>
							<div class="post-title text-center">
								<h5><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
							</div>
						</article>
					</div>
				<?php } ?>
			<?php endwhile; ?>
		</div>
	<?php }
 $out = ob_get_contents();
 if (ob_get_contents()) ob_end_clean();
return $out;
}
add_shortcode('thb_postcarousel', 'thb_postcarousel');
