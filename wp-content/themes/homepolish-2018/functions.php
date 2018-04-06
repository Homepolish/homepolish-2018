<?php

//flush_rewrite_rules();

add_theme_support( 'post-thumbnails' );
register_nav_menus(); 
show_admin_bar( 0 );

function post_slug() {

	global $post; 
	$post_slug = $post->post_name;

	if( $post_slug == 'home' ) {
		$post_slug = 'homepage';
	}
	if( is_404() ) {
		$post_slug = 'about-us';
	}

	return $post_slug;
}

/**
@ Enqueue Scripts and Styles
*/
function hp_enqueue_scripts() {
	
	// Header
	wp_enqueue_style( 'svelte', get_template_directory_uri() . '/assets/styles/svelte.css' );
	//wp_enqueue_style( 'litycss', get_template_directory_uri() . '/stylesheets/lity.css' );
	//wp_enqueue_style( 'css', get_template_directory_uri() . '/stylesheets/app.css' );
	//wp_enqueue_style( 'css', get_template_directory_uri() . '/stylesheets/app.css?v='.time(), array(), false, 'all' );
	//wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', 0, 0, 0 );
	//wp_enqueue_script( 'dropdownjs', get_template_directory_uri() . '/js/easydropdown.js', 0, 0, 0 );
	
	// Footer
	wp_enqueue_script( 'vwo_smart_code', get_template_directory_uri() . '/assets/js/vwo_smart_code.js', 0, 0, 0 );
	wp_enqueue_script( 'rollbar', get_template_directory_uri() . '/assets/js/rollbar.js', 0, 0, 0 );
	wp_enqueue_script( 'analytics', get_template_directory_uri() . '/assets/js/analytics.js', 0, 0, 0 );
	wp_enqueue_script( 'vendor', get_template_directory_uri() . '/assets/js/vendor.js', 0, 0, 1 );
	wp_enqueue_script( 'svelte', get_template_directory_uri() . '/assets/js/svelte.js', 0, 0, 1 );
	
	
	//wp_enqueue_script( 'foundation', get_template_directory_uri() . '/bower_components/foundation/js/foundation.js', 0, 0, 1 );
	//wp_enqueue_script( 'lityjs', get_template_directory_uri() . '/js/lity.js', 0, 0, 1 );
	//wp_enqueue_script( 'app', get_template_directory_uri() . '/js/app.js', 0, 0, 1 );
	//wp_enqueue_script( 'jquery311', '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', 0, 0, 1 );
	//wp_enqueue_script( 'isotope', get_template_directory_uri() . '/js/isotope.js', 0, 0, 1 );
}
add_action( 'wp_enqueue_scripts', 'hp_enqueue_scripts' );

https://www.homepolish.com/assets/vwo_smart_code-fdabe6a062e597207f10e071d82ac81f82386566f9095f2508561cfb43e6e25c.js

