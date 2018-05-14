<?php

show_admin_bar( 0 );

/**
@ Set Page Type; Mag||2018
*/

function hp_page_type() {

	$page_type 	= '2018';
	$path 		= explode( '/', $_SERVER['REQUEST_URI'] );

	if ( $path[1] == 'mag' || $path[1] == 'designer' || $path[1] == 'wp-search' ) {

		$page_type = 'mag';
	}
	return $page_type;
}

/**
@ Page Meta Values
*/

function hp_page_meta() {

	global $post; 
	$post_id = $post_ID;
	$post_slug = $post->post_name;	

	// Default Meta Values
	$hp_page_meta['body_class']		= $post_slug;
	$hp_page_meta['data_action']		= $post_slug;
	$hp_page_meta['data_controller']	= 'landing_pages';
	$hp_page_meta['page_type']			= 'WebSite';

	// Transparency
	if ( get_field( 'pmv_transparent_header', $post_id )[0] == 'Yes' ) {

		$hp_page_meta['transparency'] = 'hp-header--transparent';
	}

	// Page Type
	if ( get_field( 'pmv_page_type', $post_id ) ) {

		$hp_page_meta['page_type'] = get_field( 'pmv_page_type', $post_id );
	}

	// Body Class
	if ( get_field( 'pmv_body_action', $post_id ) ) {

		$hp_page_meta['body_class'] = get_field( 'pmv_body_class', $post_id );
	}

	// Data Action
	if ( get_field( 'pmv_data_action', $post_id ) ) {

		$hp_page_meta['data_action'] = get_field( 'pmv_data_action', $post_id );
	}

	// Data Controller
	if ( get_field( 'pmv_data_controller', $post_id ) ) {

		$hp_page_meta['data_controller'] = get_field( 'pmv_data_controller', $post_id );
	}

	if ( is_404() ) {

		$hp_page_meta['body_class'] = 'about-us';
	}

	return $hp_page_meta;
}

/** 
@ Itemprop Meta Tags
*/

function hp_page_meta_tags() {

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
add_action('wp_head', 'hp_page_meta_tags');

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
					' . $desktop . '
				);
			}
			@media screen and (min-width: 768px) {
				' . $selector . ' {
					background-image: url(
						' . $desktop . '
					);
				}
			}

		</style>';

	return $styles;	
}

function hp_image_styles_deprecated( $mobile_desktop_array ) {

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

/**
@ Mag Functions
*/

/*-----------------------------------------------------------------------------------

	MAG FUNCTIONS

	Here we have all the custom functions for the theme
	Please be extremely cautious editing this file.
	You have been warned!

-------------------------------------------------------------------------------------*/

require_once('hmpl-keys.php'); // Make sure we don't store the keyes in the codebase

// Define Theme Name for localization
if (!defined('THB_THEME_NAME')) {
	define('THB_THEME_NAME', 'thevoux');
	define('THB_THEME_ROOT', get_template_directory_uri());
	define('THB_THEME_ROOT_ABS', get_template_directory());
}

// Translation
add_action('after_setup_theme', 'lang_setup');
function lang_setup(){
	load_theme_textdomain(THB_THEME_NAME, THB_THEME_ROOT_ABS . '/inc/languages');
}

// Option-Tree Theme Mode
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
add_filter( 'ot_override_forced_textarea_simple', '__return_true' );
include_once( 'inc/ot-fonts.php' );
include_once( 'inc/ot-radioimages.php' );
include_once( 'inc/ot-metaboxes.php' );
include_once( 'inc/ot-themeoptions.php' );
include_once( 'inc/ot-functions.php' );
if ( ! class_exists( 'OT_Loader' ) ) {
	include_once( 'admin/ot-loader.php' );
}

// Script Calls
require_once('inc/script-calls.php');

// Excerpts
require_once('inc/excerpts.php');

// Ajax
require_once('inc/ajax.php');

// TGM Plugin Activation Class
if ( is_admin() ) {
	require_once('inc/class-tgm-plugin-activation.php');
	require_once('inc/plugins.php');
}

// Enable Featured Images
require_once('inc/postthumbs.php');

// Post Formats
add_theme_support('post-formats', array('image', 'gallery'));

// Add Menu Support
require_once('inc/wp3menu.php');

// Enable Sidebars
require_once('inc/sidebar.php');

// Custom Comments
// require_once('inc/comments.php');

// Widgets
require_once('inc/widgets.php');

// Misc 
require_once('inc/misc.php');

// Breadcrumbs 
require_once('inc/related.php');

// Breadcrumbs 
require_once('inc/breadcrumbs.php');

// AQ Resizer
require_once('inc/aq_resizer.php');

// Twitter oAuth
require_once('inc/TwitterAPIExchange.php');

// Share Counts
require_once('inc/posts-social-shares-count/posts-share-count.php');

// Visual Composer Integration
require_once('inc/visualcomposer.php');

// HTML5 Galleries
add_theme_support( 'html5', array( 'caption', 'comment-list' ) );
add_filter( 'use_default_gallery_style', '__return_false' );

// Shortcode Generator & Shortcodes (+)
require_once('inc/tinymce/tinymce-class.php');	
require_once('inc/tinymce/shortcode-processing.php');

// Theme Info
if ( is_admin() ) {
	include_once( trailingslashit(THB_THEME_ROOT_ABS) . '/inc/theme_info.php' );
}

// WordPress Importer
if ( is_admin() ) {
	if(!class_exists('WP_Import'))
		require_once( trailingslashit(THB_THEME_ROOT_ABS) . 'inc/wordpress-importer/wordpress-importer.php');
	require_once( trailingslashit(THB_THEME_ROOT_ABS) . 'inc/import.php');
}

/* HOMEPOLISH */
// Custom Taxonomy
require_once('inc/homepolish/hmpl-custom-taxonomy.php');

// Misc methods
require_once('inc/homepolish/hmpl-misc.php');

// Import functions * can be removed once imported
require_once('inc/homepolish/hmpl-post-prep.php');