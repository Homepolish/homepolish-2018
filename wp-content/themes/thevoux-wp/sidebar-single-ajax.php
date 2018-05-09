<?php 
	$fixed = ot_get_option('article_fixed_sidebar', 'on') == 'on' ? 'fixed-me' : '';
	$style = get_post_meta($id, 'hp-post-style', true) ? get_post_meta($id, 'hp-post-style', true) : 'story';
?>
<aside class="sidebar small-12 medium-12 large-4 columns">
	<div class="<?php echo $fixed; ?> <?php echo $style; ?>">
	<?php 
	
		##############################################################################
		# Single Ajax Sidebar
		##############################################################################
	
	 	?>
	<?php dynamic_sidebar('single-ajax'); ?>
	</div>
</aside>