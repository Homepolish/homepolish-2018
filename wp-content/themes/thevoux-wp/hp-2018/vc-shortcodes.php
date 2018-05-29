<?php 

//hp_2018_copy

function hp_2018_copy( $atts, $content = null ) {
    
    $output = '';
    $output .= '
    <!-- hp_2018_copy -->
    <div class="row collapse hp_2018_copy">
    	<div class="large-centered large-6 columns">
        	<div class="post-content-body">';
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
		'hp_2018_2x_image_left_caption'      => '',
		'hp_2018_2x_image_left_att'      => '',
		'hp_2018_2x_image_right' => '',
		'hp_2018_2x_image_right_caption'      => '',
		'hp_2018_2x_image_right_att'      => '',

    ), $atts));
    
    $output = '';
	$output .= '<div class="row hp_2018_2x_image collapse">
	  <div class="large-centered large-10 columns">
	    <div class="row">
	      <div class="large-6 columns">
	        <div class="row collapse">
	          <div class="large-11 columns">';
	$output .= '<img src="' . wp_get_attachment_url( $hp_2018_2x_image_left ) . '">';
	
	$output .= '</div>
	          <div class="large-centered large-10 columns">';         
	
	$output .= '<h3>' . $hp_2018_2x_image_left_caption . '</h3>';
	
	$output .= do_shortcode($content);;
	
	$output .= '</div>
	        </div>
	      </div>
	      <div class="large-6 columns">
	        <div class="row collapse">
	          <div class="large-offset-1 large-11 columns">';
	$output .= '<img src="' . wp_get_attachment_url( $hp_2018_2x_image_right ) . '">';
	$output .= '</div>
	          <div class="large-centered large-10 columns">' ;          
	$output .= '<h3>' . $hp_2018_2x_image_right_caption . '</h3>';
	
	$output .= $hp_2018_2x_image_right_att;
	$output .= '</div>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>';

 	return $output;
}
add_shortcode('hp_2018_2x_image', 'hp_2018_2x_image');

// hp_2018_lg_img_caption

function hp_2018_lg_img_caption( $atts, $content = null ) {

	extract(shortcode_atts(array(
       	'hp_2018_lg_img' => '',
		'hp_2018_lg_img_caption'      => '',
    ), $atts));
    
    $output = '';
    $output .= '
    <!-- hp_2018_lg_img_caption -->
    <div class="row collapse hp_2018_lg_img_caption">
    	<div class="small-12 columns">';
    $output.= '<img src="' . wp_get_attachment_url( $hp_2018_lg_img ) . '">';
	$output.= '
		</div>
		<div class="small-12 columns">';
    $output.= '<p>' . $hp_2018_lg_img_caption . '</p>';
    $output .= '
	    </div>
	</div>';

 	return $output;
}
add_shortcode('hp_2018_lg_img_caption', 'hp_2018_lg_img_caption');

// hp_2018_split_img_quote 

function hp_2018_split_img_quote( $atts, $content = null ) {

	extract(shortcode_atts(array(
       	'hp_2018_split_img' => '',
		'hp_2018_split_img_quote' => '',
		'hp_2018_split_img_name' => '',
    ), $atts));
    
    $output = '';
    $output .= '
    <!-- hp_2018_split_img_quote -->
    <div class="row collapse hp_2018_split_img_quote" data-equalizer>
    	<div class="large-6 columns" data-equalizer-watch>';
    $output.= '<img src="' . wp_get_attachment_url( $hp_2018_split_img ) . '">';
	$output.= '
		</div>
		<div class="large-offset-1 large-5 columns" data-equalizer-watch>
			<div class="table">
				<div class="table-cell">';
    $output.= '<p>' . $hp_2018_split_img_quote . '</p>';
    $output.= '<p>- ' . $hp_2018_split_img_name . '</p>';
    $output .= '
    			</div>
    		</div>
	    </div>
	</div>';
 	return $output;
}
add_shortcode('hp_2018_split_img_quote', 'hp_2018_split_img_quote');



function hp_2018_lg_overlap_quote( $atts, $content = null ) {

	extract(shortcode_atts(array(
       	'hp_2018_lg_overlap_img' => '',
		'hp_2018_lg_overlap_quote' => '',
    ), $atts));
    
    $output = '';
    $output .= '
    <!-- hp_2018_lg_overlap_quote -->
    <div class="row collapse hp_2018_lg_overlap_quote">
  		<div class="small-12 columns">
    		<div class="row collapse">
      			<div class="large-centered large-10 columns">';
    $output.= '<img src="' . wp_get_attachment_url( $hp_2018_lg_overlap_img ) . '">';
	$output.= '
				</div>
      			<div class="large-5 columns quote">';
    $output.= '<p>' . $hp_2018_lg_overlap_quote. '</p>';
    $output .= '
    			</div>
	    	</div>
		</div>
	</div>';
 	return $output;
}
add_shortcode('hp_2018_lg_overlap_quote', 'hp_2018_lg_overlap_quote');




function hp_2018_parallax( $atts, $content = null ) {

	extract(shortcode_atts(array(
       	'hp_2018_img' => '',
    ), $atts));
    
    $output = '<style></style>';
    $output .= '
    <!-- hp_2018_parallax -->
    <div class="full-width hp_2018_parallax">

    	<div class="ParallaxContainer" style="background: url(' . wp_get_attachment_url( $hp_2018_img ) . ');">
		<p>
      		&nbsp;
    	</p>
  		</div>
  		<div class="row collapse ContentContainer">
  		<div class="small-12 large-6 large-centered columns Content">';
  	$output .= do_shortcode($content);
    $output .= '</div>
	</div>';
 	return $output;
}
add_shortcode('hp_2018_parallax', 'hp_2018_parallax');



