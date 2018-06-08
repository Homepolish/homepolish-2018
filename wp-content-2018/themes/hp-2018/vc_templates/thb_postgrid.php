<?php

function thb_postgrid( $atts, $content = null ) {
  extract(shortcode_atts(array(
		'style' => 'Story List',
		'item_count' => '3',
		'source' => 'by-category',
		'cat' => '',
		'post_ids' => '',
		'tag_slugs' => '',
		'author_ids' => '',
		'featured_index' => '',
		'columns' => '3',
		'excluded_tag_ids' => '',
		'excluded_cat_ids' => '',
		'posts_to_skip' => '',
		'header_title' => ''
  ), $atts));
  
  $manual_id_order = null;
  $featured_index = empty($featured_index) ? array() : explode(',',$featured_index);
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
				'category__not_in' => $excluded_cat_ids,
				'offset' => $posts_to_skip
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
		$manual_id_order = $post_id_array;
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

	// Sort by order of ID(s) as entered on page builder
	if (isset($manual_id_order)) {
		$ordered_posts = array();
		$unordered_posts = $posts->posts;
		$unordered_post_ids = array_map(function($p) { return $p->ID; }, $unordered_posts);
		foreach($manual_id_order as $index => $id) {
			$ordered_posts[] = $unordered_posts[array_search($id, $unordered_post_ids)];
		}
		$posts->posts = $ordered_posts;
	}

 	ob_start();
 	
	if ( $posts->have_posts() ) { ?>
		<?php switch($columns) {
			case 2:
				$col = 'medium-6 large-6';
				break;
			case 3:
				$col = 'medium-4 large-4';
				break;
			case 4:
				$col = 'medium-6 large-3';
				break;
		} ?>
		<?php if ($style == 'style-hp-list') { ?>
			<div class="posts border">
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<?php get_template_part( 'inc/loop/homepolish/style-hp-list' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		<?php } else if ($style == 'style-hp-feature') { ?>
			<div class="posts">
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<?php get_template_part( 'inc/loop/homepolish/style-hp-feature' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		<?php } else if ($style == 'style-hp-multi-cat-sq') { ?>
			<div class="posts border">
				<h5><?php echo $header_title; ?></h5>
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<?php get_template_part( 'inc/loop/homepolish/style-hp-multi-cat-sq' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		<?php } else if ($style == 'style-hp-single-cat-sq') { ?>
			<div class="posts border">
				<h5><?php echo $header_title; ?></h5>
				<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
					<?php get_template_part( 'inc/loop/homepolish/style-hp-single-cat-sq' ); ?>
				<?php endwhile; // end of the loop. ?>
			</div>
		<?php } ?>
	<?php }

   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   
   wp_reset_query();
   wp_reset_postdata();
     
  return $out;
}
add_shortcode('thb_postgrid', 'thb_postgrid');
