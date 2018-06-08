<?php function thb_border( $atts, $content = null) {
	$output = $out ='';
	
	$output .= '<div class="category_container"><div class="inner">';
	$output .= do_shortcode($content);
	$output .= '</div></div>';
	
	return $output;

}
add_shortcode('thb_border', 'thb_border');