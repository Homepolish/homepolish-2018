<?php

//flush_rewrite_rules();

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
register_nav_menus(); 
show_admin_bar( 0 );



function page_body_vals() {

	global $post; 
	$post_slug = $post->post_name;
	$vals = array();

	$vals['body_class'] 	= $post_slug;
	$vals['data_action']	= $post_slug;
	$vals['data_controller'] = 'landing_pages';

	if( $post_slug == 'about-us' ) {
		$vals['data_action'] = 'about_us';
	}
	if( $post_slug == 'build' ) {
		$vals['body_class']	 	= 'show';
		$vals['data_action'] 	= 'show';
		$vals['data_controller']= 'tags';
	}
	if( $post_slug == 'terms' ) {
		$vals['data_controller'] = 'static_pages';
	}
	/*if( $post_slug == 'home' ) {
		$vals['body_class'] = 'homepage';
		$vals['data_action']= 'homepage';
	}
	*/
	if( $post_slug == 'page' ) {
		$vals['body_class'] = 'about-us';
	}
	if( $post_slug == 'privacy' ) {
		//check legal classes
		$vals['data_controller'] = 'legal_pages';
	}
	if( $post_slug == 'terms' ) {
		//check legal classes
		$vals['data_controller'] = 'legal_pages';
	}

	if( is_404() ) {
		$vals['body_class'] 	= 'about-us';
		$vals['data_action'] 	= 'not_found';
		$vals['data_controller']= 'static_pages';
	}

	return $vals;
}

/**
@ Enqueue Scripts and Styles
*/
function hp_enqueue_scripts() {

	global $post; 
	$post_slug = $post->post_name;
	
	// Header
	wp_enqueue_style( 'svelte', get_template_directory_uri() . '/assets/styles/svelte.css' );
	wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/styles/styles.css' );
	
	// Footer
	wp_enqueue_script( 'vwo_smart_code', get_template_directory_uri() . '/assets/js/vwo_smart_code.js', 0, 0, 0 );
	wp_enqueue_script( 'rollbar', get_template_directory_uri() . '/assets/js/rollbar.js', 0, 0, 0 );
	wp_enqueue_script( 'analytics', get_template_directory_uri() . '/assets/js/analytics.js', 0, 0, 0 );
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/assets/js/vendor.js', 0, 0, 1 );
	wp_enqueue_script( 'svelte', get_template_directory_uri() . '/assets/js/svelte.js', 0, 0, 1 );

	if ( file_exists( get_stylesheet_directory() . '/assets/js/' . $post_slug . '.js' ) ) {

		wp_enqueue_script( 'page-slug', get_template_directory_uri() . '/assets/js/' . $post_slug . '.js', 0, 0, 1 );
	}
}
add_action( 'wp_enqueue_scripts', 'hp_enqueue_scripts' );

/**
@ Print Mobile and Desktop Styles for Images 
*/

function hp_image_styles( $mobile_desktop_array ) {

	$mobile = $mobile_desktop_array[0];
	$desktop = $mobile_desktop_array[1];
	$selector = $mobile_desktop_array[2];

	$styles = '<style>
			' . $selector . ' {
				background-image: url(
					' . $mobile . '
				);
			}
			@media only screen and (-webkit-min-device-pixel-ratio: 1.3), 
			not all, only screen and (-webkit-min-device-pixel-ratio: 1.30208), 
			only screen and (min-resolution: 125dpi), 
			only screen and (min-resolution: 1.3dppx) {
				' . $selector . ' {
					background-image: url(
						' . $desktop . ');
				}
			}
		</style>';

	return $styles;	
}

/**
@ Remove WordPress Emoji Code
*/

remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
remove_action( 'admin_print_styles', 'print_emoji_styles' );