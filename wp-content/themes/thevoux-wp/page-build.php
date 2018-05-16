<?php get_header(); ?>

<div class="targeted-page-show">
	<div class="hero-container">
		<div class="image-container">
			<div class="hidpi">
				<div class="desktop-only hero-image" style="background-image: url(https://res-4.cloudinary.com/homepolish/image/upload/c_scale,dpr_2,h_750/v1510346686/rlzuyradt9qu00bopluc.jpg);"></div>
				<div class="hero-image mobile-only" style="background-image: url(https://res-4.cloudinary.com/homepolish/image/upload/c_scale,dpr_2,w_414/v1510346686/rlzuyradt9qu00bopluc.jpg);"></div>
			</div>
			<div class="lodpi">
				<div class="desktop-only hero-image" style="background-image: url(https://res-4.cloudinary.com/homepolish/image/upload/c_scale,dpr_1,h_750/v1510346686/rlzuyradt9qu00bopluc.jpg)"></div>
				<div class="hero-image mobile-only" style="background-image: url(https://res-4.cloudinary.com/homepolish/image/upload/c_scale,dpr_1,w_414/v1510346686/rlzuyradt9qu00bopluc.jpg);"></div>
			</div>
		</div>
		<div class="hero-content">
			<div class="inner-hero-content">
				<h2 class="title"><?php the_field( 'title' ); ?></h2>
				<h6 class="subtitle"><?php the_field( 'subtitle' ); ?></h6>
				<div class="description">
					<?php the_field( 'copy' ); ?>
				</div>
			</div>

			<?php $link = get_field( 'link' ); ?>

			<div class="button-cta"><a target="_blank" class="btn cta-btn" data-click="tags-cta" data-location="hero form" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></div>
		</div>
	</div>
	<div class="seo-text">
		<p class="seo-text-body">
			<?php the_field( 'ctr_copy' );?>
		</p>
	</div>

<!-- testamonials how it works/concierge SAME AS CONSIERGE  -->

<!-- <div class="testimonials"> -->

<?php get_template_part('templates/block', 'testimonials'); ?>

<!-- </div> --><!-- ./hiw testimonials -->

<!-- build-services-portfolio -->

<div class="image-grid ">
	<div class="commercial-case-studies">
		<h3 class="title"><?php the_field( 'bsp_title' ); ?></h3>
		<div class="case-studies-grid" data-lightbox-gallery>

			<?php 
			    $i=1;
			    $rows = array();
			    $rows = get_field( 'bsp_portfolio_items' );
			    foreach( $rows as $key => $value ) {

			    	$row = $value['bsp_portfolio_item'];
					$row->ID;

					echo get_the_category( $row->ID );

					//var_dump( $row );

			    	$image_url = get_the_post_thumbnail_url( $row->ID, 'full' );
			    	$image_386 = aq_resize( $image_url ,'386');
			    	$image_414 = aq_resize( $image_url ,'414');

					?>

					<div class="case-study">
						<a target="_blank" href="https://www.homepolish.com/mag/a-calming-family-home-in-the-boston-suburbs">
							<div class="image-container">
								<div class="hidpi">
									<div class="case-study-image desktop-only" style="background-image: url(<?php echo $image_386; ?>);"></div>
									<div class="case-study-image mobile-only" style="background-image: url(<?php echo $image_414; ?>);"></div>
								</div>
								<div class="lodpi">
									<div class="case-study-image desktop-only" style="background-image: url(<?php echo $image_386; ?>);"></div>
									<div class="case-study-image mobile-only" style="background-image: url(<?php echo $image_414; ?>);"></div>
								</div>
							</div>
							<div class="case-study-overlay">
								<h5 class="overlay-neighborhood">
								Residential
								</h5>
								<h4 class="overlay-title">
								<?php echo $row->post_title; ?>
								</h4>
								<h6 class="overlay-expand">
									<a href="/mag/<?php echo $row->post_name; ?>">See More</a>
								<span class="v1-icon-caret-right"></span>
								</h6>
							</div>
						</a>
					</div>

			<?php } ?>
			<!-- case study -->
		</div>
	</div>
</div><!-- build-services-portfolio -->

<!-- what we offer -->

<div class="list-section">
	<div class="list-container"><h3 class="title"><?php the_field( 'ls_title' ); ?></h3><ul><?php $row = get_field( 'ls_list_items' ); foreach( $row as $value ) { ?><li><?php echo $value['ls_list_item']; ?></li><?php } ?></ul></div>
</div><!-- ./what we offer -->


</div>

<?php get_footer(); ?>