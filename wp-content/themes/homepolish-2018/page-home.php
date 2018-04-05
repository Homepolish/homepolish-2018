<?php get_header(); ?>


<div class="hero">
    <div class="hero__slideshow" data-slideshow>

        <!-- will need to create php style sheet for background images check for mobile? background images based on breakpoints?-->

        <?php 
            $i = 1;
            $slideshow = get_field( 'slideshow' );
            foreach( $slideshow[0] as $key => $value ) {
                echo '<div class="hero__slide hero__slide--' . $i . '" data-slideshow-index="' . $i . '">';
                //echo $value['url'];
                echo '</div>';
                $i++;
            }
        ?>
    </div>
    <h1 class="hero__tagline formatted-copy--mobile-tablet">
        <?php the_field( 'heading' ); ?>
    </h1>

    <h1 class="hero__tagline formatted-copy--desktop">
        <?php the_field( 'heading' ); ?>
    </h1>

    <div class="hero__signup" data-hero-content>
        <div class="book-now-signup book-now-signup-start-email">
            <p class="signup-subheader">
                <?php the_field( 'sign_up_copy' ); ?>
            </p>
            <?php the_field( 'sign_up_email_form' ); ?>
            <h6 class="existing-account-link">

                <?php 
                    $sign_up_link = get_field( 'sign_up_link' );
                    echo '<a href="' . $sign_up_link['url'] . '">' . $sign_up_link['title'] . '</a>';
                ?><span class="v1-icon-caret-right"></span>
            </h6>
        </div>
    </div>
</div><!-- ./hero -->

<!-- about-blurb -->

<div class="about-blurb">

    <?php $center_copy = get_field( 'ctr_copy' ); ?>

    <h2 class="about-blurb__content formatted-copy--mobile">
        <?php echo $center_copy; ?>
    </h2>

    <h2 class="about-blurb__content formatted-copy--tablet">
        <?php echo $center_copy; ?>
    </h2>

    <h2 class="about-blurb__content formatted-copy--desktop">
        <?php echo $center_copy; ?>
    </h2>
</div><!-- about-blurb -->

<!-- how it works -->

<div id="how-it-works" class="how-it-works">

    <?php 
        $i = 1;
        $rows = get_field('rows'); 

        foreach( $rows as $key => $value ) {

            echo '<div class="step step--' . $i . '">';
            echo '<div class="step__image"></div>';
            echo '<div class="step__text">';
            echo '<h6 class="step__header">';
            echo $value['header'];
            echo '</h6>';

            echo '<h3 class="step__title formatted-copy--mobile">';
            echo $value['title'];
            echo '</h3>';

            echo '<h3 class="step__title formatted-copy--tablet-desktop">';
            echo $value['title'];
            echo '</h3>';

            /* Investigate current mobile markup, very different */

            $paragraphs = $value['copy'];

            foreach( $paragraphs as $parakey => $p ) {             
                
                if ( $p['paragraph_header'] ) {
                    echo '<h5 class="step__subtitle formatted-copy--mobile">' . $p['paragraph_header'] . '</h5>';
                    echo '<h5 class="step__subtitle formatted-copy--tablet-desktop">' . $p['paragraph_header'] . '</h5>';
                }

                if ( $p['paragraph_link'] ) {

                    echo '<h5 class="step__link formatted-copy--mobile">
                    <a href="' . $p['paragraph_link']['url'] . '" class="cta-link">
                    <span class="cta-link-text">' . $p['paragraph_link']['title'] . '</span>
                    <span class="v1-icon-caret-right"></span>
                    </a>
                    </h5>';

                }

                if ( $p['paragraph_copy'] ) {
                    
                    echo '<p class="step__description">' . $p['paragraph_copy'];
                    
                    if ( $p['paragraph_link'] ) {

                        echo '<br><a href="' . $p['paragraph_link']['url'] . '" class="cta-link">
                            <span class="cta-link-text">' . $p['paragraph_link']['title'] . '</span>
                            <span class="v1-icon-caret-right"></span>
                            </a>';
                    }

                    echo '</p>';
                }
            }

            if ( $value['link'] ) {

                echo '<h5 class="step__link">
                    <a class="cta-link" href="' .  $value['link']['url'] . '" target="_self">
                    <span class="cta-link-text">' . $value['link']['title'] . '</span>
                    <span class="v1-icon-caret-right"></span>
                    </a>
                    </h5>';
            }

            echo '</div>';
            echo '</div>';
            echo '<hr>';
            $i++;
        }
    ?>
</div><!-- ./how-it-works -->

<!-- portfolio -->

<div class="portfolio">
    <h2 class="portfolio__header"><?php the_field( 'free_title' ); ?></h2>

    <?php the_field( 'free_html' ); ?>
    
</div><!-- ./portfolio -->

<!-- influencers -->

<div class="influencers"><h2 class="influencers__header"><?php the_field( 'cel_titleText' ); ?></h2>

    <?php $testimonials = get_field( 'cel_testimonials' ); ?>

    <!-- mobile -->

     <div class="influencers__testimonials influencers__testimonials--mobile">
        <div class="owl-carousel" data-owl-carousel>

            <?php foreach( $testimonials as $t ) { ?>

                <?php
                    $testimonial        = $t['cel_testimonial'];
                    $testimonial_avatar = get_field( 'avatar', $testimonial->ID );
                    $testimonial_link   = get_field( 'link', $testimonial->ID );
                ?>

                <div class="testimonial">
                    <img src="<?php echo $testimonial_avatar['url']; ?>" class="testimonial__image" />
                    <h5 class="testimonial__name"><?php echo get_the_title( $testimonial->ID ); ?></h5>
                    <p class="testimonial__text testimonial__text--1">
                        “<?php the_field( 'quote', $testimonial->ID ); ?>”
                    </p>
                    <h5 class="testimonial__link">
                        <a class="cta-link" href="<?php echo $testimonial_link['url']; ?>" target="_blank">
                            <span class="cta-link-text"><?php echo $testimonial_link['title']; ?></span>
                            <span class="v1-icon-caret-right"></span>
                        </a>
                    </h5>
                </div>
            
            <?php } ?>
            
        </div>
    </div><!-- ./mobile -->

    <!-- desktop -->

    <div class="influencers__testimonials influencers__testimonials--desktop">

        <?php foreach( $testimonials as $t ) { ?>

            <?php
                $testimonial        = $t['cel_testimonial'];
                $testimonial_avatar = get_field( 'avatar', $testimonial->ID );
                $testimonial_link   = get_field( 'link', $testimonial->ID );
            ?>

            <div class="testimonial">
            <img src="<?php echo $testimonial_avatar['url']; ?>" class="testimonial__image" />
            <h5 class="testimonial__name"><?php echo get_the_title( $testimonial->ID ); ?></h5>
            <p class="testimonial__text testimonial__text--1">“<?php the_field( 'quote', $testimonial->ID ); ?>”</p>
            <h5 class="testimonial__link">
            <a class="cta-link" href="<?php echo $testimonial_link['url']; ?>" target="_blank">
            <span class="cta-link-text"><?php echo $testimonial_link['title']; ?></span>
            <span class="v1-icon-caret-right"></span>
            </a>
            </h5>
            </div>
            
        <?php } ?>

    </div><!-- ./desktop -->
</div><!-- ./influencers -->

<!-- our-designers -->

<div class="our-designers">
    <h2 class="our-designers__header"><?php the_field( 'ctr2_title' ); ?></h2>
    <p class="our-designers__content"><?php the_field( 'ctr2_copy' ); ?></p>

    <?php $ctr2_link = the_field( 'ctr2_link' ); ?>

    <h5 class="our-designers__link our-designers__link--mobile">
        <a class="cta-link" href="<?php echo $ctr2_link['url']; ?>" target="_self">
            <span class="cta-link-text"><?php echo $ctr2_link['title']; ?></span><span class="v1-icon-caret-right"></span>
        </a>
    </h5>

    <h5 class="our-designers__link our-designers__link--desktop">
        <a class="cta-link" href="<?php echo $ctr2_link['url']; ?>" target="_self">
            <span class="cta-link-text"><?php echo $ctr2_link['title']; ?></span><span class="v1-icon-caret-right"></span>
        </a>
    </h5>
</div><!-- ./our-designers -->

<!-- press -->

<div class="press">
<div class="press__slides">
<div class="owl-carousel" data-owl-carousel>

    <!-- featured image goes in css? -->

    <?php
        $i = 1;
        $press_items = get_field( 'pss_slides' );

        foreach( $press_items as $key => $press ) { 

            $press_id       = $press['pss_slide']->ID; 
            $press_logo     = get_field( 'logo', $press_id );
            ?>

            <div class="slide slide--<?php echo $i; ?>">
                <h2 class="slide__quote slide__quote--<?php echo $i; ?>">
                    “<?php the_field( 'quote', $press_id ); ?>”
                </h2>

                <div class="slide__attribution">
                —
                <img src="<?php echo $press_logo['url']; ?>" class="slide__logo" />
                </div>
            </div>

    <?php $i++; } ?>

</div>
</div>
</div><!-- ./press -->

<!-- book-now -->

<?php $sur_link = get_field( 'sur_link' ); ?>

<div class="book-now-cta">
    <h5 class="cta-header"><?php the_field( 'sur_title' ); ?></h5>
    <h3 class="cta-content"><?php the_field( 'sur_subtitle' ); ?></h3>
    <a class="cta-button" data-track-book-now="true" data-button-id="inline_cta" href="<?php echo $sur_link['url']; ?>"><?php echo $sur_link['title']; ?></a>
</div>

<?php get_footer(); ?>