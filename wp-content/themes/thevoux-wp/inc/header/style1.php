<?php 
	$id = get_queried_object_id();
	if (ot_get_option('logo')) { $logo = ot_get_option('logo'); } else { $logo = THB_THEME_ROOT. '/assets/img/logo.png'; }
?>

<!-- Start Header -->
<div class="header_container">
	<header class="header style1" role="banner">
		<div class="header_top">
			<div class="row full-width-row">
				<div class="small-2 medium-4 columns toggle-holder">
					<div>
						<a href="#" class="mobile-toggle">
							<div>
								<span></span><span></span><span></span>
							</div>
						</a>
						<a href="<?php echo home_url(); ?>" class="logolink" title="<?php bloginfo('name'); ?>"><img src="<?php echo esc_url($logo); ?>" class="logofixed" alt="<?php bloginfo('name'); ?>"/></a>
					</div>
				</div>
				<div class="small-8 medium-4 columns logo text-center">
					<?php if (is_single()) { ?><h6 id="page-title"><?php echo thb_ShortenTitle(get_the_title(), 40); ?></h6><?php } ?>
					<a href="<?php echo home_url(); ?>" class="logolink" title="<?php bloginfo('name'); ?>">
						<img src="<?php echo esc_url($logo); ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/>
					</a>
				</div>
				<div class="small-2 medium-4 columns social-holder <?php echo $social_style = ot_get_option('header_socialstyle', 'style1'); ?>">
					<div>
						<?php do_action( 'thb_social_header' ); ?>
						<?php do_action( 'thb_quick_search' ); ?>
						
					</div>
				</div>
			</div>
			<?php #<span class="progress"></span> ?>
		</div>
		<nav id="full-menu" role="navigation">
			<?php if(has_nav_menu('nav-menu')) { ?>
			  <?php wp_nav_menu( array( 'menu' => 'header', 'theme_location' => 'nav-menu', 'depth' => 3, 'container' => false, 'menu_class' => 'full-menu nav', 'walker' => new thb_MegaMenu_tagandcat_Walker ) ); ?>
			<?php } else { ?>
				<ul class="full-menu">
					<li><a href="<?php echo get_admin_url().'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
				</ul>
			<?php } ?>
		</nav>
	</header>
</div>
<!-- End Header -->