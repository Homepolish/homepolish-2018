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

<!-- hp-header-container -->

<div class="hp-header-container">
<header id="header" class="hp-header <?php echo hp_page_meta()['transparency']; ?>">
<div class="hp-header__main">
<button class="mobile-nav-menu-toggle" data-mobile-nav-menu-toggle="true">
<span class="toggle-bar"></span>
<span class="toggle-bar"></span>
<span class="toggle-bar"></span>
<span class="toggle-bar"></span>
</button>
<a href="/" class="hp-header__logo-link hp-header__logo-link--mobile-tablet">
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="https://www.homepolish.com/assets/homepolish-wordmark-white-0f8caeca1b03d49cb61da10d0550d68138e1505ba2375ecd033cd2516b5c8efc.png" />
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="https://www.homepolish.com/assets/homepolish-wordmark-f09400f624be850d548380bfb33f6de9292ca7ef1f1f0524e1c979ecab0f5ff7.png" />
</a>
<div class="hp-header__auth">
<a class="auth__link" href="/log_in">Log In</a>
</div>
</div>
<nav class="hp-header__nav">
<a class="tertiary nav__link " href="/about-us">About Us</a>
<a class="tertiary nav__link " href="https://homepolish.com/portfolio">Portfolio</a>
<a class="tertiary nav__link " href="https://homepolish.com/commercial">Commercial</a>
<a href="/" class="hp-header__logo-link hp-header__logo-link--desktop">
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="https://www.homepolish.com/assets/homepolish-wordmark-white-0f8caeca1b03d49cb61da10d0550d68138e1505ba2375ecd033cd2516b5c8efc.png" />
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="https://www.homepolish.com/assets/homepolish-wordmark-f09400f624be850d548380bfb33f6de9292ca7ef1f1f0524e1c979ecab0f5ff7.png" /></a>
<a class="tertiary nav__link " href="/concierge">Concierge</a>
<a class="tertiary nav__link" href="/build">Build</a>
<a class="tertiary nav__link" href="/mag">The Magazine</a>
</nav>
</header>
</div>

<!-- /hp-header-container -->

<!-- mobile-nav -->

<div class="mobile-nav-menu" id="mobile-nav-menu">
<div class="menu-content">
<div class="nav-links">
<h5 class="nav-link">
<a class="tertiary" href="/about-us">About Us</a>
</h5>
<h5 class="nav-link">
<a class="tertiary" href="https://homepolish.com/portfolio">Portfolio</a>
</h5>
<h5 class="nav-link">
<a class="tertiary" href="https://homepolish.com/commercial">Commercial</a>
</h5>
<h5 class="nav-link">
<a class="tertiary" href="/concierge">Concierge</a>
</h5>
<h5 class="nav-link">
<a class="tertiary" href="/build">Build Services</a>
</h5>
<h5 class="nav-link">
<a class="tertiary" href="/mag">The Magazine</a>
</h5>
</div>
<div class="other-links">
<h5 class="other-link login-link">
<a class="tertiary" href="https://homepolish.com/log_in">Log In</a>
</h5>
</div>
</div>
</div>
<div class="mobile-nav-buttons" id="mobile-nav-buttons">
<div class="scroll-shadow"></div>
</div>

<!-- /mobile-nav -->



		

		<?php get_template_part( 'mobile-nav-menu' ); ?>

		<div role="main" class="cf">
			<div class="mobile-fade-overlay"></div>
