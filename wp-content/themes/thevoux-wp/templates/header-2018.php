<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/<?php echo hp_page_meta()['page_type']; ?>" lang="en" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">

<!-- hard coded header.php values -->
<link href="<?php echo get_template_directory_uri(); ?>/assets/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="<?php echo get_template_directory_uri(); ?>/assets/homepolish_logo.png" rel="apple-touch-icon">
<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="CSRF-TOKEN?" />
<meta content="<?php echo get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ); ?>" itemprop="description">
<meta content="<?php the_permalink(); ?>" itemprop="url">
<meta content="127512634049491" property="fb:app_id">
<meta content="width=device-width,initial-scale=1" name="viewport">
<!-- /hard coded header.php values -->

<!-- wp_head -->
<?php wp_head(); ?>
<!-- /wp_head -->

</head>

<body class="svelte landing-pages landing-pages--<?php echo hp_page_meta()['body_class']; ?>"
 data-action="<?php echo hp_page_meta()['data_action']; ?>" 
 data-controller="<?php echo hp_page_meta()['data_controller']; ?>">
<div class="fixed-banner"></div>
<div class="main-container">

<?php //get_template_part( 'header', 'nav' ); ?>

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
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="<?php echo get_template_directory_uri(); ?>/assets/img/homepolish-wordmark-white.png" />
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="<?php echo get_template_directory_uri(); ?>/assets/img/homepolish-wordmark
.png" />
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
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--white" src="<?php echo get_template_directory_uri(); ?>/assets/img/homepolish-wordmark-white.png" />
<img alt="Homepolish Interior Design NYC LA SF BOS CHI DC" class="hp-header__logo hp-header__logo--black" src="<?php echo get_template_directory_uri(); ?>/assets/img/homepolish-wordmark.png" /></a>
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



