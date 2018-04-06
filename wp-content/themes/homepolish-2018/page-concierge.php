<?php get_header(); ?>

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

<div class="hiw-step pop-the-champagne">
<div class="hiw-step-head">
<h6 class="step-number">
what our clients say
</h6>
<h3 class="step-title">
Concierge Shoutouts
</h3>
<p class="step-description">
You don’t have to take our word for it–read what our clients have to say about the Concierge experience.
</p>
</div>
<div class="client-reviews">
<div class="client-review-content-container">
<div class="client-review-card-content" data-slide-index="1">
<p class="client-review-body">
The Concierge is super organized, and their ability to place the orders for us made all the difference. They saved us time and money.
</p>
<div class="client-review-attribution"><h6 class="client-name">Joshua K</h6></div>
</div>

<div class="client-review-card-content" data-slide-index="2">
<p class="client-review-body">
The Concierge team is so great! Organized, diligent, and simply awesome to work with.
</p>
<div class="client-review-attribution"><h6 class="client-name">Candace D</h6></div>
</div>

<div class="client-review-card-content" data-slide-index="3">
<p class="client-review-body">
I really enjoyed my experience with Homepolish and my designer Jessica. Having the sales team take care of multiple orders helped save time.
</p>
<div class="client-review-attribution"><h6 class="client-name">Frank L</h6></div>
</div>

<div class="client-review-card-content" data-slide-index="4">
<p class="client-review-body">
Before Concierge, shopping was a nightmare. This is much more streamlined.
</p>
<div class="client-review-attribution"><h6 class="client-name">Ashley J</h6></div>
</div>

</div>
<div class="owl-carousel" data-owl-carousel>
<div class="client-review-image client-review-image-1" data-slide-index="1"></div>
<div class="client-review-image client-review-image-2" data-slide-index="2"></div>
<div class="client-review-image client-review-image-3" data-slide-index="3"></div>
<div class="client-review-image client-review-image-4" data-slide-index="4"></div>
</div>
</div>
</div>

<div class="concierge-mobile">
<div class="client-logos partners">
<div class="partners-header">
<h2>
Participating Brands
</h2>
<p class="description formatted-copy--mobile">
From favorites to unique<br />
discoverable brands, there’s<br />
something in our Concierge<br />
experience for everyone.
</p>
<h5 class="intro">
To name a few:
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
Participating Brands
</h2>
<p class="description formatted-copy--tablet-desktop">
From favorites to unique, discoverable brands,<br />
there’s something in our Concierge experience for everyone.
</p>
<h5 class="intro">
To name a few:
</h5>
</div>
<div class="logos-desktop">
<img class="logos-desktop-img" src="https://www.homepolish.com/cdn/concierge/partners/desktop.png">
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