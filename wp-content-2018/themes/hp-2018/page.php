<?php get_header(); ?>

<div id="page-template">

	<?php 

		the_title( '<h2 class="page-title">', '</h2>' );
		if ( have_posts()) : 
			while ( have_posts()) : the_post();
				the_content();
			endwhile; 
		endif;
	?>
			
</div>

<?php get_footer(); ?>