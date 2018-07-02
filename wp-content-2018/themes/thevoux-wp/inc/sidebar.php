<?php
if ( function_exists('register_sidebar') ){
	register_sidebar(array('name' => 'Blog Sidebar', 'id' => 'blog', 'description' => 'The sidebar that shows up in your blog', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3 class="title">', 'after_title' => '</h3>'));

	register_sidebar(array('name' => 'Article Sidebar', 'id' => 'single', 'description' => 'The sidebar next to articles', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3 class="title">', 'after_title' => '</h3>'));

	register_sidebar(array('name' => 'Article Ajax Sidebar', 'id' => 'single-ajax', 'description' => 'The sidebar next to articles loaded via Ajax', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3 class="title">', 'after_title' => '</h3>'));

	register_sidebar(array('name' => 'Author Sidebar', 'id' => 'author', 'description' => 'The sidebar on author pages', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<h3 class="title">', 'after_title' => '</h3>'));

	register_sidebar(array('name' => 'Archive Sidebar', 'id' => 'archive', 'description' => 'The sidebar on archive pages', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));

	register_sidebar(array('name' => 'Category Sidebar', 'id' => 'category', 'description' => 'The sidebar on category pages', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));

	register_sidebar(array('name' => 'Footer Column 1', 'id' => 'footer1', 'description' => 'Footer - first column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));

	register_sidebar(array('name' => 'Footer Column 2', 'id' => 'footer2', 'description' => 'Footer - second column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));

	register_sidebar(array('name' => 'Footer Column 3', 'id' => 'footer3', 'description' => 'Footer - third column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));

	register_sidebar(array('name' => 'Footer Column 4', 'id' => 'footer4', 'description' => 'Footer - forth column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));

	register_sidebar(array('name' => 'Footer Column 5', 'id' => 'footer5', 'description' => 'Footer - fifth column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));

	register_sidebar(array('name' => 'Footer Column 6', 'id' => 'footer6', 'description' => 'Footer - sixth column', 'before_widget' => '<div id="%1$s" class="widget cf %2$s">', 'after_widget' => '</div>', 'before_title' => '<strong><span>', 'after_title' => '</span></strong>'));
}

function thb_sidebar_setup() {
	$sidebars = ot_get_option('sidebars');
	if(!empty($sidebars)) {
		foreach($sidebars as $sidebar) {
			register_sidebar( array(
				'name' => $sidebar['title'],
				'id' => $sidebar['id'],
				'description' => '',
				'before_widget' => '<div id="%1$s" class="widget cf %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<strong><h6>',
				'after_title' => '</h6></strong>',
			));
		}
	}
	if ( class_exists('WCML_WC_MultiCurrency')) {
		global $WCML_WC_MultiCurrency;
		remove_action('woocommerce_product_meta_start', array($WCML_WC_MultiCurrency, 'currency_switcher'));
	}
}
add_action( 'after_setup_theme', 'thb_sidebar_setup' );
?>