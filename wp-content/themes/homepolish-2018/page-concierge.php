<?php get_header(); ?>

<!-- to do brands code mobile and desktop, with repeater and brand post type -->

<!-- no pages have this? -->
<div class="concierge-page">


<!-- concierge-hero -->

<div class="concierge-hero hero-container">
	<div class="hero-image"></div>
	<div class="hero-content">
		<div class="inner-hero-content">
			<h6 class="uber-title"><?php the_field( 'header' ); ?></h6>
			<h2 class="title"><?php the_field( 'title' ); ?></h2>
			<div class="description">
				<?php the_field( 'copy' ); ?>
			</div>
		</div>
	</div>
</div><!-- ./concierge-hero -->


<!-- hiw -->

<!-- To do - on live site this is HTML -->

<?php the_field( 'free_html' ); ?>

<!-- ./hiw -->

<!-- make-ordering-breeze -->

<!-- to do make this four-by a 1 by floated left -->

<div class="about-us why">
	<h2 class="about-header formatted-copy--mobile">
		<?php the_field( 'mob_title' ); ?>
	</h2>
	<h2 class="about-header formatted-copy--tablet-desktop">
		<?php the_field( 'mob_title' ); ?>
	</h2>
	<div class="about-list-items">
		
		<?php 
			$row = get_field( 'mob_row' );
			foreach( $row as $value ) {
			?>

			<div class="list-item">
				<h6 class="item-header">
					<?php echo $value['2xl_title']; ?>
				</h6>
				<p class="item-body">
					<?php echo $value['2xl_copy']; ?>
				</p>
			</div>

			<?php }
		?>
	</div>
</div><!-- ./make-ordering-breeze -->

<!-- testamonials how it works/concierge -->

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



<div class="concierge-mobile">
<div class="client-logos partners">
<div class="partners-header">
<h2>
<?php the_field( 'pb_title' ); ?>
</h2>
<p class="description formatted-copy--mobile">
<?php the_field( 'pb_copy' ); ?>
</p>
<h5 class="intro">
<?php the_field( 'pb_subtitle' ); ?>
</h5>
</div>
<div class="owl-carousel" data-owl-carousel>
<div class="logos-card">
<div class="logo-img-container">
<img alt="The logo of Homepolish partner West Elm" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/west_elm.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Pottery Barn" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/pottery_barn.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Anthropologie" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/anthropologie.png">
</div>
</div>
<div class="logos-card">
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Blu Dot" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/blu_dot.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Serena &amp; Lily" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/serena_lily.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner CB2" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/cb2.png">
</div>
</div>
<div class="logos-card">
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Schoolhouse" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/schoolhouse.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Design Within Reach" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/design_within_reach.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Arteriors" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/arteriors.png">
</div>
</div>
<div class="logos-card">
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Surya" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/surya.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Lulu &amp; Georgia" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/lulu_georgia.png">
</div>
<div class="logo-img-container">
<img alt="The logo of Homepolish partner Joybird" class="logo-img" src="https://www.homepolish.com/cdn/concierge/partners/joy_bird.png">
</div>
</div>
</div>
</div>

</div>
<div class="concierge-desktop">
<div class="client-logos partners">
<div class="partners-header">
<h2 class="title">
<?php the_field( 'pb_title' ); ?>
</h2>
<p class="description formatted-copy--tablet-desktop">
<?php the_field( 'pb_copy' ); ?>
</p>
<h5 class="intro">
<?php the_field( 'pb_subtitle' ); ?>
</h5>
</div>
<div class="logos-desktop">

<?php $image = get_field( 'pb_image' ); ?>

<img class="logos-desktop-img" src="<?php echo $image['url']; ?>">
</div>
</div>

</div>


<?php get_template_part('templates/block', 'signup'); ?>

<!-- 
<div class="concierge-book-now-cta">
<div class="book-now-cta">
<h5 class="cta-header">
Get started with a complimentary consultation
</h5>
<h3 class="cta-content">
Let us select the perfect design team for you.
</h3>
<a class="cta-button" data-track-book-now="true" data-button-id="inline_cta" href="/start">Sign Up</a>
</div>
-->


</div>




<?php get_footer(); ?>