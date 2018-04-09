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

			<div class="button-cta"><a target="_blank" class="btn cta-btn" data-click="tags-cta" data-location="hero form" href="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a></div>
		</div>
	</div>
	<div class="seo-text">
		<p class="seo-text-body">
			<?php the_field( 'ctr_copy' );?>
		</p>
	</div>

<!-- testamonials how it works/concierge SAME AS CONSIERGE  -->

	<div class="hiw-step pop-the-champagne">
		<div class="hiw-step-head">
			<h6 class="step-number">
			<?php the_field( 'tr_title' ); ?>
			</h6>
			<h3 class="step-title">
			<?php the_field( 'tr_subtitle' ); ?>
			</h3>
			<p class="step-description">
			<?php the_field( 'tr_copy' ); ?>
			</p>
		</div>
		<div class="client-reviews">
			<div class="client-review-content-container">

			<?php 
				$i=1;
				$testimonials = get_field( 'tr_testimonials' );
				foreach( $testimonials as $t ) { ?>

				    <?php
				        $testimonial        = $t['tr_testimonial'];
				        $testimonial_avatar = get_field( 'avatar', $testimonial->ID );
				        $testimonial_link   = get_field( 'link', $testimonial->ID );
				    ?>

					<div class="client-review-card-content" data-slide-index="<?php echo $i++; ?>">
						<p class="client-review-body">
						“<?php the_field( 'quote', $testimonial->ID ); ?>
						</p>
						<div class="client-review-attribution">
							<h6 class="client-name"><?php echo get_the_title( $testimonial->ID ); ?></h6>
						</div>
					</div>

				<?php 
				}
			?>

			</div>
			<div class="owl-carousel" data-owl-carousel>

				<?php 
					$count = 1;
					while( $count <= $i ) {
						echo '<div class="client-review-image client-review-image-' . $count . '" data-slide-index="' . $count++ . '"></div>';
					}
				?>
			</div>
		</div>
	</div><!-- ./hiw testimonials -->









	<!-- extraneous tag? very different markup -->

	<div class="testimonials">


	<div class="hiw-step pop-the-champagne">
	<div class="hiw-step-head">
	<h3 class="step-title">
	What our Clients Say
	</h3>
	<p class="step-description">
	We’re not ones to talk about ourselves—so here’s what our clients have to say about their renovation experiences with Homepolish.
	</p>
	<p class="step-cta">
	<a class="btn cta-btn" target="_blank" data-click="tags-cta" data-location="testimonial" href="http://www.homepolish.com/start?targeted_page%5Bslug%5D=build&amp;targeted_page%5Btitle%5D=Homepolish+Build+Services">Get Started
	</a></p>
	</div>
	<div class="client-reviews">
	<div class="client-review-content-container">
	<div class="client-review-card-content" data-slide-index="1">
	<p class="client-review-body">
	The Homepolish team of professionals provides essential support in the critical, upfront stages of GC scoping and matching and through the bidding process

	</p>
	<div class="client-review-attribution"><h6 class="client-name">Ed D.</h6><h6 class="client-location">
	, Build Client
	</h6>
	</div>
	</div>

	<div class="client-review-card-content" data-slide-index="2">
	<p class="client-review-body">
	We couldn’t be happier to have Homepolish leading our new hospitality development. They captured our vision and brought in an excellent team to execute.
	</p>
	<div class="client-review-attribution"><h6 class="client-name">Sarah D.</h6><h6 class="client-location">
	, Build Client
	</h6>
	</div>
	</div>

	</div>
	<div class="owl-carousel" data-owl-carousel>
	<div class="client-review-image" data-slide-index="1">
	<div class="image-container">
	<div class="hidpi">
	<div class="client-review-image desktop-only" style="background-image: url(https://res-3.cloudinary.com/homepolish/image/upload/c_scale,dpr_2,w_800/v1509728950/xcbdp8ykw3ktq0nn3fpz.jpg);"></div>
	<div class="client-review-image mobile-only" style="background-image: url(https://res-3.cloudinary.com/homepolish/image/upload/c_scale,dpr_2,w_414/v1509728950/xcbdp8ykw3ktq0nn3fpz.jpg);"></div>
	</div>
	<div class="lodpi">
	<div class="client-review-image desktop-only" style="background-image: url(https://res-3.cloudinary.com/homepolish/image/upload/c_scale,dpr_1,w_800/v1509728950/xcbdp8ykw3ktq0nn3fpz.jpg)"></div>
	<div class="client-review-image mobile-only" style="background-image: url(https://res-3.cloudinary.com/homepolish/image/upload/c_scale,dpr_1,w_414/v1509728950/xcbdp8ykw3ktq0nn3fpz.jpg);"></div>
	</div>
	</div>

	</div>
	<div class="client-review-image" data-slide-index="2">
	<div class="image-container">
	<div class="hidpi">
	<div class="client-review-image desktop-only" style="background-image: url(https://res-2.cloudinary.com/homepolish/image/upload/c_scale,dpr_2,w_800/v1510605193/wkgdhygzth8aloowghns.jpg);"></div>
	<div class="client-review-image mobile-only" style="background-image: url(https://res-2.cloudinary.com/homepolish/image/upload/c_scale,dpr_2,w_414/v1510605193/wkgdhygzth8aloowghns.jpg);"></div>
	</div>
	<div class="lodpi">
	<div class="client-review-image desktop-only" style="background-image: url(https://res-2.cloudinary.com/homepolish/image/upload/c_scale,dpr_1,w_800/v1510605193/wkgdhygzth8aloowghns.jpg)"></div>
	<div class="client-review-image mobile-only" style="background-image: url(https://res-2.cloudinary.com/homepolish/image/upload/c_scale,dpr_1,w_414/v1510605193/wkgdhygzth8aloowghns.jpg);"></div>
	</div>
	</div>

	</div>
	</div>
	</div>
	</div>
	</div>


	<!-- mag image grid -->
	<?php the_field( 'free_html' );?>
	<!-- ./mag image grid -->


	<!-- mag image grid -->
	<?php the_field( 'free2_html' );?>
	<!-- ./mag image grid -->


</div>

<?php get_footer(); ?>