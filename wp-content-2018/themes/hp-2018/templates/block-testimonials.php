<div class="testimonials">
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

				    	$args = array( 
				        	//get_field( 'testimonial_mobile_image', $testimonial->ID ),
				        	get_the_post_thumbnail_url( $testimonial->ID, 'full' ), 
				        	get_the_post_thumbnail_url( $testimonial->ID, 'full' ), 
							'.svelte .client-reviews .client-review-image.client-review-image-' . $i
							//
					    );
					    echo hp_image_styles( $args );
					?>

					<div class="client-review-card-content" data-slide-index="<?php echo $i; ?>">
						<p class="client-review-body">
						&ldquo;<?php the_field( 'quote', $testimonial->ID ); ?>&rdquo;
						</p>
						<div class="client-review-attribution">

							<?php $testimonial_type = wp_get_post_terms( $testimonial->ID, 'testimonial_type' ); ?>

						<h6 class="client-name"><?php the_field( 'testimonial_name', $testimonial->ID ); ?>, <?php echo $testimonial_type[0]->name; ?> Client</h6>
						</div>
					</div>

				<?php 
				$i++;
				}
			?>

		</div>
		<div class="owl-carousel" data-owl-carousel>

			<?php 
				$count = 1;
				while( $count < $i ) {
					echo '<div class="client-review-image client-review-image-' . $count . '" data-slide-index="' . $count++ . '"></div>';
				}
			?>
		</div>
	</div>
</div>
</div>