<?php function thb_postcategory( $atts, $content = null ) {
    extract(shortcode_atts(array(
    	'style'	=> 'style1',
    	'cat'	=> ''
    ), $atts));
    
    
	$args = array(
		'cat' => $cat,
		'posts_per_page' => 5,
		'ignore_sticky_posts' => 1,
		'no_found_rows' => true
	);
	
	$posts = new WP_Query( $args );
 	$i = 0;
 	ob_start();
 	
	if ( $posts->have_posts() ) { ?>
		<div class="row endcolumn">
			<?php if ($style !== 'style4') { ?>
			<div class="small-12 columns">
				<div class="category_title catstyle-<?php echo $style; ?>">
					<h2><a href="<?php echo get_category_link($cat); ?>" title="<?php echo get_cat_name( $cat ); ?>"><?php echo get_cat_name( $cat ); ?></a></h2>
				</div>
			</div>
			<?php } ?>
	  		<?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
	  			<?php if ($style == 'style1') { ?>
		  			<?php if ($i == 0) { ?>
		  				<div class="small-12 medium-6 columns">
		  					<?php $featuredImage = array(570, 465); include(locate_template( 'inc/loop/style3.php' )); ?>
		  				</div>
		  			<?php } ?>
		  			<?php if ($i > 0) { ?>
			  			<?php if ($i == 1) { ?>
			  				<div class="small-12 medium-6 columns">
			  					<div class="row" data-equal=">.columns">
			  			<?php } ?>
			  			<?php if ($i > 0) { ?>
			  						<div class="small-12 medium-6 columns">
			  							<?php get_template_part( 'inc/loop/style3-small' ); ?>
			  						</div>
			  			<?php } ?>
			  			<?php if ($i + 1 == $posts->post_count) { ?>
			  					</div>
		  					</div>
		  				<?php } ?>	
	  				<?php } ?>
	  			<?php } else if ($style == 'style2') { ?>
	  				<?php if ($i == 0) { ?>
  						<div class="small-12 medium-6 columns">
  							<?php $featuredImage = array(570, 380); include(locate_template( 'inc/loop/style3.php' )); ?>
  						</div>
  					<?php } ?>
  					<?php if ($i > 0) { ?>
  						<?php if ($i == 1) { ?>
  							<div class="small-12 medium-6 columns">
  						<?php } ?>
  						<?php if ($i > 0) { ?>
  								<?php get_template_part( 'inc/loop/style4' ); ?>
  						<?php } ?>
  						<?php if ($i + 1 == $posts->post_count) { ?>
  							</div>
  						<?php } ?>	
  					<?php } ?>
	  			<?php } else if ($style == 'style3') { ?>
	  				
	  				<?php if ($i == 0) { ?>
	  					<div class="small-12 columns">
	  						<?php $featuredImage = array(570, 380); include(locate_template( 'inc/loop/style3.php' )); ?>
	  				<?php } ?>
	  					<?php if ($i > 0) { ?>
  							<?php get_template_part( 'inc/loop/style4' ); ?>
	  					<?php } ?>
	  				<?php if ($i + 1 == $posts->post_count) { ?>
  						</div>
  					<?php } ?>
	  			<?php } else if ($style == 'style4') { ?>
	  				<?php if ($i == 0) { ?>
	  					<div class="small-12 columns">
		  					<div class="category_container">
		  						<div class="inner">
		  							<div class="category_title catstyle-<?php echo $style; ?>">
		  								<h2><a href="<?php echo get_category_link($cat); ?>" title="<?php echo get_cat_name( $cat ); ?>"><?php echo get_cat_name( $cat ); ?></a></h2>
		  							</div>
		  							<div class="small-12 medium-3 columns">
		  								<?php $excerpt = false; include(locate_template( 'inc/loop/style5.php' )); ?>
  					<?php } ?>
	  					<?php if ($i == 1) { ?>
	  							<?php $excerpt = false; include(locate_template( 'inc/loop/style5.php' )); ?>
	  						</div>
	  					<?php } ?>
	  					<?php if ($i == 2) { ?>
	  						<div class="small-12 medium-6 columns">
								<?php $excerpt = true; include(locate_template( 'inc/loop/style5.php' )); ?>
							</div>
						<?php } ?>
						<?php if ($i == 3) { ?>
							<div class="small-12 medium-3 columns">
								<?php $excerpt = false; include(locate_template( 'inc/loop/style5.php' )); ?>
						<?php } ?>
						<?php if ($i == 4) { ?>
								<?php $excerpt = false; include(locate_template( 'inc/loop/style5.php' )); ?>
							</div>
						<?php } ?>
  					<?php if ($i + 1 == $posts->post_count) { ?>
								
								</div>
							</div>
						</div>
					<?php } ?>
	  			<?php } ?>
	  		<?php $i++; endwhile; // end of the loop. ?>
	  	</div>
	<?php }

   $out = ob_get_contents();
   if (ob_get_contents()) ob_end_clean();
   
   wp_reset_query();
   wp_reset_postdata();
     
  return $out;
}
add_shortcode('thb_postcategory', 'thb_postcategory');
