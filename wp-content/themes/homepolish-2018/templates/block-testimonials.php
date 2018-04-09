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
</div>