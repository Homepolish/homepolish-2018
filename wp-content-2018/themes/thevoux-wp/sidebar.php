<?php
	$fixed = ot_get_option('article_fixed_sidebar', 'on') == 'on' ? 'fixed-me' : '';
?>
<aside class="sidebar small-12 medium-12 columns" role="complementary">
	<div class="sidebar_inner <?php echo $fixed; ?>">
		<?php 
		
			##############################################################################
			# Display the asigned sidebar
			##############################################################################
	
		?>
		<?php dynamic_sidebar('blog'); ?>
   	</div>
</aside>