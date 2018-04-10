<?php get_header(); ?>

<!-- Fix this ID-->

<div id="frequently-asked-questions">

	<?php

		the_title( '<h2 class="page-title">', '</h2>' );
		while ( the_post() ) {
			the_content();
		}
	?>
			
</div>

<?php get_footer(); ?>