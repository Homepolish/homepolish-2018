<?php get_header(); ?>
<?php 
	$id = $wp_query->get_queried_object_id();
	$style = get_post_meta($id, 'hp-post-style', true) ? get_post_meta($id, 'hp-post-style', true) : 'story';
	$infinite = ot_get_option('infinite_load', 'on');
	$excluded_categories = array_filter(array(get_cat_ID('service')));  // Removes any "0" (nonexistent category)
	$post_categories = wp_get_post_categories($id);
	if (count(array_intersect($excluded_categories, $post_categories)) > 0) {
		$infinite = false;
	}
?>

<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
	
<div id="article-wrapper">

<div class="static_link previous_post"><?php previous_post_link( '%link', 'Previous' ); ?></div>
<div class="static_link next_post"><?php next_post_link( '%link', 'Next', 1, 0 ); ?></div>
<!-- <div id="infinite-article" data-infinite="<?#php echo $infinite; ?>"> -->
	<?php $ajax = 0; include(locate_template( 'inc/loop/homepolish/single-'.$style.'.php' ) ); ?><!-- single-inc /loop/homepolish/single-'<?php echo $style; ?>.php' -->
</div>

<?php endwhile; else : endif; ?>
<?php get_footer(); ?>
