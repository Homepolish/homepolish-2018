<?php

//flush_rewrite_rules();

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
register_nav_menus(); 
show_admin_bar( 0 );

/**
@ Page Meta Values
*/

function page_meta() {

	global $post; 
	$post_id = $post_ID;
	$post_slug = $post->post_name;

	// Page Type
	$page_meta['page_type'] = get_field( 'pmv_page_type', $post_id );

	// Transparency
	if ( get_field( 'pmv_transparent_header', $post_id )[0] == 'Yes' ) {

		$page_meta['transparency'] = 'hp-header--transparent';
	}

	// Default Meta Values
	$page_meta['body_class']		= $post_slug;
	$page_meta['data_action']		= $post_slug;
	$page_meta['data_controller']	= 'landing_pages';

	// Body Class
	if ( get_field( 'pmv_body_action', $post_id ) ) {

		$page_meta['body_class'] = get_field( 'pmv_body_class', $post_id );
	}

	// Data Action
	if ( get_field( 'pmv_data_action', $post_id ) ) {

		$page_meta['data_action'] = get_field( 'pmv_data_action', $post_id );
	}

	// Data Controller
	if ( get_field( 'pmv_data_controller', $post_id ) ) {

		$page_meta['data_controller'] = get_field( 'pmv_data_controller', $post_id );
	}

	if ( is_404() ) {

		$page_meta['body_class'] = 'about-us';
	}

	return $page_meta;
}

/** 
@ Itemprop Meta Tags
*/

function page_meta_tags() {

	global $post; 
	$post_id = $post_ID;

	// Itemprop Image

	echo '<meta itemprop="image" content="' . get_the_post_thumbnail_url( $post_ID ) . '">';

	// Item Props
	$row = get_field( 'pmv_item_properties', $post_id ); 
	foreach( $row as $key => $value ) {

		echo '<meta itemprop="' . $value['pmv_ip_name'] . '" content="' . $value['pmv_ip_value']. '">';
	}
}
add_action('wp_head', 'page_meta_tags');

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

/** 
@Remove Yoast SEO JSON schema
*/

function hp_remove_yoast_json( $data ) {
    
    $data = array();
    return $data;
  }
  add_filter( 'wpseo_json_ld_output', 'hp_remove_yoast_json', 10, 1 );
