<?php
add_action("wp_ajax_nopriv_thb_infinite_ajax", "thb_infinite_ajax");
add_action("wp_ajax_thb_infinite_ajax", "thb_infinite_ajax");
function thb_infinite_ajax() {
	global $post;
	$id = isset($_POST['post_id']) ? $_POST['post_id'] : false;
	
  $post = get_post( $id );
	$previous_post = get_previous_post();
	$excluded_categories = array(get_cat_ID('service'));
	if ($id) {
		$args = array(
		    'p' => $previous_post->ID,
		    'no_found_rows' => true,
		    'posts_per_page' => 1,
		    'category_not_in' => $excluded_categories
		);
		$query = new WP_Query($args);
		if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
			$style = get_post_meta($post->ID, 'hp-post-style', true) ? get_post_meta($post->ID, 'hp-post-style', true) : 'story';
			$ajax = 1; include(locate_template( 'inc/loop/homepolish/single-'.$style.'.php' ) );
		endwhile; else : endif;
	}
	die();
}
 ?>