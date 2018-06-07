<?php 
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );
	require_once('../../inc/ot-functions.php');
	$id = (isset($_GET['id']) ? htmlspecialchars($_GET['id']) : '');
	
	Header("Content-type: text/css");
?>
<?php 
echo thb_google_webfont();
?>
/* Options set in the admin page */
body { 
	color: <?php echo ot_get_option('text_color'); ?>;
	<?php thb_typeecho(ot_get_option('body_type'), false, 'Lora'); ?>
}

/* Header Height */
<?php if ($hhm = ot_get_option('header_height_mobile')) { ?>
.header .header_top > .row > .columns,
.header.style2 .header_top > .row > .columns {
	height: <?php thb_measurementecho($hhm); ?>;
}
<?php } ?>
<?php if ($hh = ot_get_option('header_height')) { ?>
@media only screen and (min-width: 40.063em) {
	.header .header_top > .row > .columns {
		height: <?php thb_measurementecho($hh); ?>;
	}
	.header.style2 .header_top > .row > .columns {
		height: <?php thb_measurementecho($hh); ?>;
	}
}
@media only screen and (min-width: 64.063em) {
	.header.style2 .logo #full-menu .full-menu > li,
	.header.style2 .logo #full-menu .full-menu {
		height: <?php thb_measurementecho($hh); ?>;
	}
	.header.style2 .logo #full-menu .full-menu > li > a {
	  line-height: <?php thb_measurementecho($hh); ?>;
	}
}
<?php } ?>
<?php if ($hhf = ot_get_option('header_height_fixed')) { ?>
@media only screen and (min-width: 40.063em) {
	.header.fixed .header_top > .row > .columns {
		height: <?php thb_measurementecho($hhf); ?>;
	}
	.header .logo #page-title {
		line-height: <?php thb_measurementecho($hhf); ?>;
	}
}
@media only screen and (min-width: 64.063em) {
	.header.style2.fixed .logo #full-menu .full-menu > li,
	.header.style2.fixed .logo #full-menu .full-menu {
		height: <?php thb_measurementecho($hhf); ?>;
	}
	.header.style2.fixed .logo #full-menu .full-menu > li > a {
	  line-height: <?php thb_measurementecho($hhf); ?>;
	}
}
<?php } ?>

/* Logo Height */
.header .logo .logoimg {
	max-height: <?php thb_measurementecho(ot_get_option('logo_height_mobile')); ?>;
}
@media only screen and (min-width: 40.063em) {
	.header .logo .logoimg {
		max-height: <?php thb_measurementecho(ot_get_option('logo_height')); ?>;
	}
}
/* Title Type */
<?php if(ot_get_option('title_type')) { ?>
h1, h2, h3, h4, h5, h6, .post .post-author em, .wpcf7-response-output, label, .select-wrapper select, .wp-caption .wp-caption-text, .smalltitle, .toggle .title, q, blockquote p, cite, .marker-info-win h1, table tr th, table tr td {
	<?php thb_typeecho(ot_get_option('title_type')); ?>
}
<?php } ?>

/* Colors */
<?php if ($accent_color = ot_get_option('accent_color')) { ?>
a, #full-menu .full-menu > li.active > a, #full-menu .full-menu > li.sfHover > a, #full-menu .full-menu > li > a:hover, #full-menu .full-menu > li > a:hover, #full-menu .full-menu > li.menu-item-has-children.menu-item-mega-parent .thb_mega_menu_holder .thb_mega_menu li.active a, #full-menu .full-menu > li.menu-item-has-children.menu-item-mega-parent .thb_mega_menu_holder .thb_mega_menu li.active a .fa, .post .article-tags a, .post .post-title a:hover, #archive-title h1 span, .widget > strong, .widget.widget_recent_entries ul li .url, .widget.widget_recent_comments ul li .url, .widget.widget_sharedimages .post-links.just-shares, .widget.widget_sharedimages .post-links.just-shares span, .slick.dark-pagination .slick-dots li.slick-active button, .slick-nav:hover, .thb-mobile-menu li a.active, .post .post-content .wpb_accordion .wpb_accordion_section .wpb_accordion_header.ui-accordion-header-active a, .tabs .active a, .tabs .active a:hover, .tabs dd a:hover, .tabs li a:hover, .toggle .title.wpb_toggle_title_active, .toggle .title.wpb_toggle_title_active:hover, q, blockquote p, cite, .notification-box a, .thb-selectionSharer a.email:hover {
  color: <?php echo $accent_color; ?>;
}

.slick.dark-pagination .slick-dots li.slick-active button {
	border-color: <?php echo ot_get_option('accent_color'); ?>;
}
.post .post-gallery.has-gallery:after {
	background-color: <?php echo ot_get_option('accent_color'); ?>;	
}

@media only screen and (max-width: 40.063em) {
	.post.featured-style4 .featured-title {
		background: <?php echo ot_get_option('accent_color'); ?>;
	}
}
.header.fixed .header_top .progress, #full-menu .full-menu > li > a:after, .post .post-gallery .gallery-link, .post.featured-style4:hover .featured-title, .slick.dark-pagination .slick-dots li.slick-active button, [class^="tag-link"]:hover, .post-gallery-content .row .columns .arrow:hover,.mobile-toggle span, .btn, .btn:focus, .button, input[type=submit], .btn.black:hover, .btn:focus.black:hover, .button.black:hover, input[type=submit].black:hover, .post .post-content .vc_toggle.vc_toggle_active .vc_toggle_title .vc_toggle_icon:after, .highlight.accent  {
	background: <?php echo ot_get_option('accent_color'); ?>;	
}
.header .social-holder #social_header:hover #social_icon {
	fill: <?php echo $accent_color; ?>;
}
<?php } ?>
<?php if ($menu_link_color = ot_get_option('menu_link_color')) { ?>
	<?php thb_linkcolorecho($menu_link_color, '#full-menu .full-menu > li >'); ?>
<?php } ?>
<?php if ($mobileicon_color = ot_get_option('mobileicon_color')) { ?>
	.mobile-toggle span {
		background: <?php echo $mobileicon_color; ?>;
	}
<?php } ?>
<?php if ($headericon_color = ot_get_option('headericon_color')) { ?>
	.header .logo #page-title {
		color: <?php echo $headericon_color; ?>;
	}
	#quick_search #search_icon,
	.header .social-holder #social_header #social_icon {
		fill: <?php echo $headericon_color; ?>;
	}
<?php } ?>
/* Backgrounds */
<?php if ($header_bg = ot_get_option('header_bg')) { ?>
	.header_top {
		<?php thb_bgecho($header_bg); ?>
	}
<?php	} ?>
<?php if ($menu_bg = ot_get_option('menu_bg')) { ?>
	#full-menu {
		<?php thb_bgecho($menu_bg); ?>
	}
<?php	} ?>
<?php if ($megamenu_bg = ot_get_option('megamenu_bg')) { ?>
	#full-menu .full-menu > li.menu-item-has-children.menu-item-mega-parent .thb_mega_menu_holder,
	#full-menu .full-menu > li.menu-item-has-children > .sub-menu {
		<?php thb_bgecho($megamenu_bg); ?>
	}
<?php	} ?>
<?php if ($footer_bg = ot_get_option('footer_bg')) { ?>
	#footer {
		<?php thb_bgecho($footer_bg); ?>
	}
<?php	} ?>
<?php if ($subfooter_bg = ot_get_option('subfooter_bg')) { ?>
	#subfooter {
		<?php thb_bgecho($subfooter_bg); ?>
	}
<?php	} ?>
/* Typography */
<?php if ($menu_type= ot_get_option('menu_type')) { ?>
#full-menu .full-menu > li > a {
	<?php thb_typeecho($menu_type); ?>	
}
<?php } ?>
/* Category Colors */
<?php 
	if ($category_colors = ot_get_option('category_colors')) {
		thb_catcolorecho($category_colors);
	} 
?>
/* 404 Image */
<?php if ($bg_404 = ot_get_option('404_bg')) { ?>
@media only screen and (min-width: 40.063em) {
	.content404 > .row {
		<!-- background-image: url('<?php echo $bg_404; ?>'); -->
	}
}
<?php } ?>
/* Extra CSS */
<?php 
echo ot_get_option('extra_css');
?>
<?php exit; ?>