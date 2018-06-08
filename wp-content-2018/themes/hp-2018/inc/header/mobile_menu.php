<?php 
	$logo = THB_THEME_ROOT. '/assets-2018/img/homepolish-logo.png';
	$menu_footer = ot_get_option('menu_footer');
?>
<!-- Start Mobile Menu -->
<nav id="mobile-menu">
	<div class="custom_scroll" id="menu-scroll">
		<div>
			<a href="#" class="close">×</a>
			<img src="<?php echo esc_url($logo); ?>" class="logoimg" alt="<?php bloginfo('name'); ?>"/>
			<?php if(has_nav_menu('mobile-menu')) { ?>
			  <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu', 'depth' => 2, 'container' => false, 'menu_class' => 'thb-mobile-menu', 'walker' => new thb_mobileDropdown ) ); ?>
			<?php } else { ?>
				<ul class="thb-mobile-menu">
					<li><a href="<?php echo get_admin_url().'nav-menus.php'; ?>">Please assign a menu from Appearance -> Menus</a></li>
				</ul>
			<?php } ?>
		
			<div class="menu-footer">
				<?php echo do_shortcode($menu_footer); ?>
			</div>
		</div>
	</div>
</nav>
<!-- End Mobile Menu -->