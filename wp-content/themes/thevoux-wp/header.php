<!-- thevoux hpmag --><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-touch-fullscreen" content="yes">
	<meta name="HandheldFriendly" content="True">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php if( $favicon = ot_get_option('favicon')){ ?>
		<?php if (is_ssl()) {
		    $favicon_image_img = str_replace("http://", "https://", $favicon);
		} else {
		    $favicon_image_img = $favicon;
		}
	?>
	<link rel="shortcut icon" href="<?php echo esc_url($favicon_image_img); ?>">
	<?php } else {?>
	<link rel="shortcut icon" href="<?php echo THB_THEME_ROOT; ?>/assets/img/favicon.ico">
	<?php } ?>

	<?php hmpl_js_analytics(); ?>

	<?php do_action( 'thb_handhelded_devices' ); ?>
	<?php
		$id = get_queried_object_id();
		# $header_style = (isset($_GET['header_style']) ? htmlspecialchars($_GET['header_style']) : ot_get_option('header_style', 'style1'));
		$smooth_scroll = (ot_get_option('smooth_scroll') != 'off' ? 'smooth_scroll' : '');

		$class = array();
		array_push($class, $smooth_scroll);

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();

	?>
</head>
<body <?php body_class($class); ?> data-url="<?php echo esc_url(home_url()); ?>" data-themeurl="<?php echo THB_THEME_ROOT; ?>" data-spy="scroll">

<?php include_once("inc/homepolish/hmpl-google-scripts.php") ?>

<script type="text/javascript" src="https://www.homepolish.com/segment_forwarder.js?no_jquery=true"></script>

<div id="wrapper">
	<!-- Start Content Container -->
	<section id="content-container">
		<!-- Start Content Click Capture -->
		<div class="click-capture"></div>
		<!-- End Content Click Capture -->
		<?php
		  $currentTime = time();

		  // 3:30:00 AM PDT 04/21
		  $promotionStartTime = strtotime('2017-04-21 03:30:00 America/Los_Angeles');

		  // 11:59:59 PM PDT 04/23
		  $promotionEndTime = strtotime('2017-04-23 23:59:59 America/Los_Angeles');

		  if(($currentTime >= $promotionStartTime) && ($currentTime <= $promotionEndTime)) {
				get_template_part( 'inc/header/homepolish/promotion_banner' );
			}
		?>

		<?php get_template_part( 'inc/header/homepolish/header_container' ); ?>

		<?php get_template_part( 'mobile-nav-menu' ); ?>

		<div role="main" class="cf">
			<div class="mobile-fade-overlay"></div>
