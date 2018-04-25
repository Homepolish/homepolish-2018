<?php get_header(); ?>

<?php
	$page = get_page_by_path( 'not-found' );
	echo '<!-- ' . get_the_title( $page ) . '-->';
?>

<!-- our-mission -->

<style>
	.landing-pages--about-us .our-mission {
		background-image: url(
			/wp-content/uploads/2018/04/desktopm.jpg
		);
	}
	@media only screen and (-webkit-min-device-pixel-ratio: 1.3), 
	not all, only screen and (-webkit-min-device-pixel-ratio: 1.30208), 
	only screen and (min-resolution: 125dpi), 
	only screen and (min-resolution: 1.3dppx) {
		.landing-pages--about-us .our-mission {
			background-image: url(
				/wp-content/uploads/2018/04/desktopd.jpg);
		}
	}
</style>
<div class="our-mission">
    <h1 class="our-mission__tagline formatted-copy--mobile">
        Making the world a better space.™    </h1>

    <h1 class="our-mission__tagline formatted-copy--tablet-desktop">
        Making the world a better space.™    </h1>

    <p class="our-mission__body formatted-copy--mobile">
        Homepolish was founded with a simple idea: interior design needed a redesign for the way we live now.    </p>

    <p class="our-mission__body formatted-copy--tablet-desktop">
        Homepolish was founded with a simple idea: interior design needed a redesign for the way we live now.    </p>
</div><!-- ./our-mission -->

<?php get_footer(); ?>