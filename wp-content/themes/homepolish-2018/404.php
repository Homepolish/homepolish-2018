<?php get_header(); ?>

<?php
	$page = get_page_by_path( 'not-found' );
	$page_ID = $page->ID;
?>

<!-- our-mission -->

<?php
	$args = array( 
		get_the_post_thumbnail_url( $page_ID ), 
		get_the_post_thumbnail_url( $page_ID ), 
		'.our-mission'
	);
	echo hp_image_styles( $args );
?>

<div class="our-mission">
    <h1 class="our-mission__tagline"><?php echo get_post_field('post_title', $page_ID); ?></h1>
    <p class="our-mission__body"><?php echo get_post_field('post_content', $page_ID); ?></p>
</div><!-- ./our-mission -->

<?php get_footer(); ?>