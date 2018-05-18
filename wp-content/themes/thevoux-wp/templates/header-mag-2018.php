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

<?php include_once("../inc/homepolish/hmpl-google-scripts.php") ?>

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
				get_template_part( '../inc/header/homepolish/promotion_banner' );
			}
		?>

		<?php //get_template_part( 'inc/header/homepolish/header_container' ); ?>




<div class="row full-width">
	<div class="small-12 columns">
		<nav class="top-bar" data-topbar role="navigation">
			<ul class="title-area">
				<li class="name">
					<h1><a href="#"><img src="assets/img/homepolish-logo.png" alt="Homepolish"></a></h1>
				</li>
				<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
				<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
			</ul>

			<section class="top-bar-section">
				<!-- Right Nav Section -->
				<ul class="right">
					
					<li class="has-dropdown">
						<a href="#">Design</a>
						<ul class="dropdown">
							<li><a href="#">First link in dropdown</a></li>
							<li class="active"><a href="#">Active link in dropdown</a></li>
						</ul>
					</li>
					<li><a href="#">Build Services</a></li>
					<li><a href="#">Concierge</a></li>
					<li><a href="#">Portfolio</a></li>
					<li class="has-dropdown">
						<a href="#">The Magazine</a>
						<ul class="dropdown">
							<li><a href="#">First link in dropdown</a></li>
							<li class="active"><a href="#">Active link in dropdown</a></li>
						</ul>
					</li>
					<li class="active"><a href="#">Right Button Active</a></li>
				</ul>
			</section>
		</nav>
	</div>
</div>

		

		<?php //get_template_part( 'mobile-nav-menu' ); ?>

		<div role="main" class="cf">
			<div class="mobile-fade-overlay"></div>
