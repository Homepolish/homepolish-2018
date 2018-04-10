<?php get_header(); ?>

<!-- Fix this ID-->

<div id="frequently-asked-questions">

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