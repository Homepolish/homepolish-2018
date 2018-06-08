<?php

// Versioning
define("HMPL_ASSET_VERSION", "20171117_1"); // setting these will update the wp_enqueue_script to make sure we don't have caching issues
function version_id() {
  if ( HMPL_ENV == "dev" )
    return time();
  return HMPL_ASSET_VERSION;
}

// Main Styles
function thb_main_styles() {

	if ( hp_page_type() == 'mag' || hp_page_type() == 'mag-2018' ) {

		$id = get_queried_object_id();
		// Register

		wp_register_style("tooltipster", THB_THEME_ROOT . "/assets-2018/css/tooltipster.bundle.min.css", null, null);
		wp_register_style("tooltipster-sidetip", THB_THEME_ROOT . "/assets-2018/css/tooltipster-sideTip-light.min.css", null, null);
		wp_register_style("app", THB_THEME_ROOT . "/assets-2018/css/app.css", null, version_id() );
		// wp_register_style('selection', THB_THEME_ROOT . '/assets-2018/css/selection.php?id='.$id, null, null); // removed font selection from theme
		wp_register_style("mp", THB_THEME_ROOT . "/assets-2018/css/magnific-popup.css", null, null);

		// Enqueue

		// wp_enqueue_style('fa');
		wp_enqueue_style('tooltipster');
		wp_enqueue_style('tooltipster-sidetip');
		wp_enqueue_style('app');
		// wp_enqueue_style('selection');
		wp_enqueue_style('mp');
		wp_enqueue_style('v1-icons');
		wp_enqueue_style('style', get_stylesheet_uri(), null, null);
	}
}

add_action('wp_enqueue_scripts', 'thb_main_styles');

// Main Scripts
function thb_register_js() {



	if ( hp_page_type() == 'mag' || hp_page_type() == 'mag-2018' ) {
		$url_prefix = is_ssl() ? 'https:' : 'http:';
		// Register
		wp_register_script('modernizr', THB_THEME_ROOT . '/assets-2018/js/plugins/modernizr.custom.min.js', 'jquery', null);
		// wp_register_script('gmapdep', $url_prefix.'//maps.google.com/maps/api/js?sensor=false', false, null, TRUE);
		wp_register_script('tweenmax', $url_prefix.'//cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js', 'false', null, TRUE);
		wp_register_script('tweenmax-scrollto', $url_prefix.'//cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/plugins/ScrollToPlugin.min.js', 'false', null, TRUE);
		wp_register_script('tweenmax-css', $url_prefix.'//cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/plugins/CSSRulePlugin.min.js', 'false', null, TRUE);
		wp_register_script('vendor', THB_THEME_ROOT . '/assets-2018/js/vendor.min.js', 'jquery', version_id(), TRUE);
		wp_register_script('app', THB_THEME_ROOT . "/assets-2018/js/app.min.js", 'jquery', version_id(), TRUE);

		// Enqueue
		wp_enqueue_script('jquery');
		wp_enqueue_script('modernizr');
		// wp_enqueue_script('gmapdep');
		wp_enqueue_script('tweenmax');
		wp_enqueue_script('tweenmax-scrollto');
		wp_enqueue_script('vendor');
		wp_enqueue_script('app');
		wp_localize_script( 'app', 'themeajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );
	}
}
add_action('wp_enqueue_scripts', 'thb_register_js');

// Admin Scripts
function thb_admin_scripts() {
	wp_register_script('thb-admin-meta', THB_THEME_ROOT .'/assets-2018/js/admin-meta.min.js', array('jquery'));
	wp_enqueue_script('thb-admin-meta');

	wp_register_style("thb-admin-css", THB_THEME_ROOT . "/assets-2018/css/admin.css");
	wp_enqueue_style('thb-admin-css');
	if (class_exists('WPBakeryVisualComposerAbstract')) {
		wp_enqueue_style( 'vc_extra_css', THB_THEME_ROOT . '/assets-2018/css/vc_extra.css' );
	}
}
add_action('admin_enqueue_scripts', 'thb_admin_scripts');

/* De-register Contact Form 7 styles */
remove_action( 'wp_enqueue_scripts', 'wpcf7_enqueue_styles' );
?>