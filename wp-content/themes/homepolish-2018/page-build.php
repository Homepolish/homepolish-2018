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

<!-- mag image grid -->
<?php the_field( 'free_html' );?>
<!-- ./mag image grid -->

<!-- what we offer -->

<div class="list-section">
	<div class="list-container"><h3 class="title"><?php the_field( 'ls_title' ); ?></h3><ul><?php $row = get_field( 'ls_list_items' ); foreach( $row as $value ) { ?><li><?php echo $value['ls_list_item']; ?></li><?php } ?></ul></div>
</div><!-- ./what we offer -->


</div>

<?php get_footer(); ?>