<?php function thb_authorgrid( $atts, $content = null ) {
    extract(shortcode_atts(array(
   		'author_ids' => '',
      'columns' => '3'
    ), $atts));
	$author_array = explode(',', $author_ids);
	$author_list = empty($author_array) ? array() : $author_array;
	switch($columns) {
		case 2:
			$col = 'medium-6 large-6';
			break;
		case 3:
			$col = 'medium-4 large-4';
			break;
		case 4:
			$col = 'medium-6 large-3';
			break;
		case 6:
			$col = 'medium-6 large-2';
			break;
	}
	ob_start();
	
	if (sizeof($author_list) > 0) {
		$out = '<div class="row" data-equal=">.columns">';
	}
	foreach($author_list as $author) {
		?>
		
			<div class="small-12 <?php echo $col; ?> columns">
				<section class="authorpage author_grid">
					<?php do_action('thb_author', $author); ?>
				</section>
			</div>
		<?php
	}
	if (sizeof($author_list) > 0) {
		$out .= '</div>';
	}
	$out = ob_get_contents();
	if (ob_get_contents()) ob_end_clean();
	
	wp_reset_query();
	wp_reset_postdata();
     
  return $out;
}
add_shortcode('thb_authorgrid', 'thb_authorgrid');
