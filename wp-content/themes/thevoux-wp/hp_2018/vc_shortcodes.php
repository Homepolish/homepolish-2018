<?php 

//hp_2018_copy

function hp_2018_copy( $atts, $content = null ) {
    
    $output = '';
    $output .= '
    <!-- hp_2018_copy -->
    <div class="row collapse hp_2018_copy">
    	<div class="large-centered large-6 columns">
        	<div class="row post-content-body">';
    $output .= do_shortcode($content);
    $output .= '
	    	</div>
	    </div>
	</div>';

 	return $output;
}
add_shortcode('hp_2018_copy', 'hp_2018_copy');

//hp_2018_2x_image

function hp_2018_2x_image( $atts, $content = null ) {

	extract(shortcode_atts(array(
       	'hp_2018_2x_image_left' => '',
		'hp_2018_2x_image_left_title'      => '',
		'hp_2018_2x_image_left_category'      => '',
		'hp_2018_2x_image_left_city'      => '',
		'hp_2018_2x_image_right' => '',
		'hp_2018_2x_image_right_title'      => '',
		'hp_2018_2x_image_right_category'      => '',
		'hp_2018_2x_image_right_city'      => '',

    ), $atts));
    
    $output = '';
	$output .= '<div class="row two-x collapse">
	  <div class="large-centered large-10 columns">
	    <div class="row">
	      <div class="large-6 columns">
	        <div class="row collapse">
	          <div class="large-11 columns">';
	$output .= '<img src="' . $hp_2018_2x_image_left . '">';
	
	$output .= '</div>
	          <div class="large-centered large-10 columns">';         
	
	$output .= '<h3>' . $hp_2018_2x_image_left_title . '</h3>';
	
	$output .= '<p><a href="' . $hp_2018_2x_image_left_category . '">' . $hp_2018_2x_image_left_category . '</a> | <a href="' . $hp_2018_2x_image_left_city . '">' . $hp_2018_2x_image_left_city . '</a></p>';
	
	$output .= '</div>
	        </div>
	      </div>
	      <div class="large-6 columns">
	        <div class="row collapse">
	          <div class="large-offset-1 large-11 columns">';
	$output .= '<img src="' . $hp_2018_2x_image_right . '">';
	$output .= '</div>
	          <div class="large-centered large-10 columns">' ;          
	$output .= '<h3>' . $hp_2018_2x_image_right_title . '</h3>';
	
	$output .= '<p><a href="' . $hp_2018_2x_image_right_category . '">' . $hp_2018_2x_image_right_category . '</a> | <a href="' . $hp_2018_2x_image_right_city . '">' . $hp_2018_2x_image_right_city . '</a></p>';
	$output .= '</div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>';

 	return $output;
}
add_shortcode('hp_2018_2x_image', 'hp_2018_2x_image');