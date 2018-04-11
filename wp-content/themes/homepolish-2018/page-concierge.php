<?php get_header(); ?>

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

<?php the_field( 'free_html' ); ?>

<!-- ./hiw -->

<!-- make-ordering-breeze -->

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

<!-- testimonials block -->

<?php get_template_part('templates/block', 'testimonials'); ?>

<!-- testimonials block -->

<!-- brands -->

<div class="concierge-mobile">
	<div class="client-logos partners">
		<div class="partners-header">
			<h2><?php the_field( 'pb_title' ); ?></h2>
			<p class="description formatted-copy--mobile"><?php the_field( 'pb_copy' ); ?></p>
			<h5 class="intro"><?php the_field( 'pb_subtitle' ); ?></h5>
		</div>
		<div class="owl-carousel" data-owl-carousel>
			<div class="logos-card">
				<?php 

					$i = 1;
					$brands = get_field( 'pb_brand_images' );
					foreach( $brands as $value ) { ?>

						<?php $brand = $value['pb_brand_image']; ?>

						<div class="logo-img-container">
							<img alt="The logo of Homepolish partner <?php echo get_the_title( $brand->ID ); ?>" class="logo-img" src="<?php echo get_the_post_thumbnail_url( $brand->ID ); ?>">
						</div>

						<?php if ( $i % 3 == 0 ) { ?>
							</div>
							<div class="logos-card">
						<?php } 

						$i++;
					} 
				?>
			</div>
		</div>
	</div>
</div>
<div class="concierge-desktop">
	<div class="client-logos partners">
		<div class="partners-header">
			<h2 class="title"><?php the_field( 'pb_title' ); ?></h2>
			<p class="description formatted-copy--tablet-desktop"><?php the_field( 'pb_copy' ); ?></p>
			<h5 class="intro"><?php the_field( 'pb_subtitle' ); ?></h5>
		</div>
		<div class="logos-desktop">
			<?php $image = get_field( 'pb_image' ); ?>
			<img class="logos-desktop-img" src="<?php echo $image['url']; ?>">
		</div>
	</div>
</div><!-- ./brands -->

<?php get_template_part('templates/block', 'signup'); ?>

</div>

<?php get_footer(); ?>