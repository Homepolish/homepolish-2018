<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/PAGETYPE?" lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<!-- header.php values -->
<link href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="<?php echo get_template_directory_uri(); ?>/assets/homepolish_logo.png" rel="apple-touch-icon">
<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="CSRF-TOKEN?" />
<meta content="Homepolish" itemprop="name">
<meta content="127512634049491" property="fb:app_id">
<!-- /header.php values -->

<!-- wp_head -->
<?php wp_head(); ?>
<!-- /wp_head -->

</head>

<body class="svelte landing-pages landing-pages--<?php echo page_body_vals()['body_class']; ?>"
 data-action="<?php echo page_body_vals()['data_action']; ?>" 
 data-controller="<?php echo page_body_vals()['data_controller']; ?>">
<div class="fixed-banner"></div>
<div class="main-container">
	<div class="hp-header-container">

<!-- transparency -->

<?php if( page_body_vals()['body_class'] == 'homepage' ) {

	$transparency = 'hp-header--transparent';
}
?>
<header id="header" class="hp-header <?php echo $transparency; ?>">

<!-- ./transparency -->

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
<a class="tertiary nav__link" href="https://homepolish.com/mag">The Magazine</a>
</nav>
</header>

</div>
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
<a class="tertiary" href="https://homepolish.com/mag">The Magazine</a>
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

<?php //get_template_part('templates/header', post_slug() ); ?>