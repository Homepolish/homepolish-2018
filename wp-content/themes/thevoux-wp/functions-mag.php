<?php

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