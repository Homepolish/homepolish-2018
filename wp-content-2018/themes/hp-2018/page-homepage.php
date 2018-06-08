<?php get_header(); ?>

<!-- video hero -->

<div class="hero video-hero">
    <img src="<?php the_field( 'vh_image' ); ?>" alt="" class="">
    <video muted="" playsinline="" webkit-playsinline="" autoplay="true" loop="true" src="<?php the_field( 'vh_video_path' ); ?>" class="is-playing"></video>
    
    <div class="hero-content-container">
        <h1 class="hero__tagline"><?php the_field( 'vh_heading' ); ?></h1>
        <div class="hero__signup" data-hero-content>
            <div class="book-now-signup book-now-signup-start-email">
                <p class="signup-subheader">
                    <?php the_field( 'sign_up_copy' ); ?>
                </p>
                <?php the_field( 'sign_up_email_form' ); ?>
                <h6 class="existing-account-link"><?php the_field( 'sign_up_link' ); ?></h6>
            </div>
        </div>
    </div>
</div><!-- /.video hero -->

<!-- slideshow hero 

<div class="hero">
    <div class="hero__slideshow" data-slideshow>

        <?php 
            $i = 1;
            $slideshow = get_field( 'slideshow' );

            foreach( $slideshow as $key => $value ) {

                $args = array( 
                    $value['mobile_image']['url'], 
                    $value['image']['url'], 
                    '.landing-pages--homepage .hero .hero__slide.hero__slide--' . $i
                );
                echo hp_image_styles( $args  );
                ?>

                <div class="hero__slide hero__slide--<?php echo $i; ?>" data-slideshow-index="<?php echo $i; ?>"></div>

                <?php

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
            <h6 class="existing-account-link"><?php the_field( 'sign_up_link' ); ?></h6>
        </div>
    </div>
</div> --><!-- ./slideshow hero -->

<!-- about-blurb -->

<div class="about-blurb center-text">

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
        $rows = array();
        $rows = get_field('rows'); 

        foreach( $rows as $key => $value ) {

            $args = array( 
                $value['mobile_image']['url'], 
                $value['image']['url'], 
                '.landing-pages--homepage .how-it-works .step.step--' . $i . ' .step__image'
            );
            echo hp_image_styles( $args  );
            ?>

            <div class="step step--<?php echo $i; ?>">
            <div class="step__image"></div>
            <div class="step__text">
            <h6 class="step__header">
                <?php echo $value['header']; ?>
            </h6>

            <h3 class="step__title formatted-copy--mobile">
                <?php echo $value['title']; ?>
            </h3>

            <h3 class="step__title formatted-copy--tablet-desktop">
                <?php echo $value['title']; ?>
            </h3>

            <?php

            $paragraphs = $value['copy'];

            foreach( $paragraphs as $parakey => $p ) {             
                
                if( $p['paragraph_header'] ) {
                    echo '<h5 class="step__subtitle formatted-copy--mobile">' . $p['paragraph_header'] . '</h5>';
                    echo "\n";
                    echo '<h5 class="step__subtitle formatted-copy--tablet-desktop">' . $p['paragraph_header'] . '</h5>';
                }

                if( $p['paragraph_link'] ) {

                    echo '<h5 class="step__link formatted-copy--mobile">
                    <a href="' . $p['paragraph_link']['url'] . '" class="cta-link">
                    <span class="cta-link-text">' . $p['paragraph_link']['title'] . '</span>
                    <span class="v1-icon-caret-right"></span>
                    </a>
                    </h5>';

                }

                if( $p['paragraph_copy'] ) {
                    
                    echo '<p class="step__description">' . $p['paragraph_copy'];
                    
                    if( $p['paragraph_link'] ) {

                        echo '<br>
                            <a href="' . $p['paragraph_link']['url'] . '" class="cta-link">
                            <span class="cta-link-text">' . $p['paragraph_link']['title'] . '</span>
                            <span class="v1-icon-caret-right"></span>
                            </a>';
                    }

                    echo '</p>';
                }
            }

            if( $value['link'] ) {

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
    <h2 class="portfolio__header"><?php the_field( 'bs_title' ); ?></h2>
    <div class="portfolio__categories portfolio__categories--mobile">
        <div class="owl-carousel" data-owl-carousel>

        <?php 
            $i=1;
            $rows = array();
            $rows = get_field( 'bs_styles' );
            foreach( $rows as $key => $value ) {

                $term = get_term( $value );

                $name           = $term->name;
                $slug           = $term->slug;
                $description    = $term->description;
                $image          = get_field( 'style_tax_image', 'term_' . $term->term_id );
                $mobile_image   = get_field( 'style_tax_mobile_image', 'term_' . $term->term_id );

                ?>          

                <div class="category" data-carousel-index="<?php echo $i; ?>">

                <?php 
                    $args = array( 
                        $mobile_image,  
                        $image,  
                        '.landing-pages--homepage .portfolio .category__image.category__image--' . $i
                    );
                    echo hp_image_styles( $args  ); 
                ?>

                <div class="category__image category__image--<?php echo $i; ?>"></div>
                <h5 class="category__label">
                <a href="/portfolio?browseBy=style#<?php echo $slug; ?>" class="category__link">
                <?php echo $name; ?>
                </a>
                </h5>
                <div class="category__overlay category__overlay--active"></div>
                </div>            

                <?php
                $i++;
            }
        ?>
        </div>
    </div>
    <div class="portfolio__categories portfolio__categories--desktop">
        
        <?php 
            $i=1;
            $row = get_field( 'bs_styles' );
            foreach( $row as $value ) {

                $term = get_term( $value );

                $name           = $term->name;
                $slug           = $term->slug;
                $description    = $term->description;
                $image          = get_field( 'style_tax_image', 'term_' . $term->term_id );
                $mobile_image   = get_field( 'style_tax_mobile_image', 'term_' . $term->term_id );
                $args = array( 
                    $mobile_image,  
                    $image,  
                    '.landing-pages--homepage .portfolio .category__image.category__image--' . $i
                );
                echo hp_image_styles( $args  ); 
                ?>          
                    <div class="category">
                    <a href="/portfolio?browseBy=style#<?php echo $slug; ?>" class="category__link">
                    <div class="category__image category__image--<?php echo $i; ?>"></div>
                    <h5 class="category__label">
                    <?php echo $name; ?>
                    </h5>
                    </a>
                    </div>           
                <?php
                $i++;
            }
        ?>
    </div>

    <?php 
        $link = get_field( 'bs_link' );
        if( $link ) {
        ?>
            <h5 class="portfolio__link">
                <a class="cta-link" href="<?php echo $link['url'];?>" target="_self">
                <span class="cta-link-text"><?php echo $link['title'];?></span>
                <span class="v1-icon-caret-right"></span>
                </a>
            </h5>
        <?php 
    } ?>
    
</div><!-- ./portfolio -->

<!-- influencers -->

<div class="influencers">
    <h2 class="influencers__header"><?php the_field( 'cel_title' ); ?></h2>

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
                    <h5 class="testimonial__name"><?php the_field( 'testimonial_name', $testimonial->ID ); ?><?php //echo get_the_title( $testimonial->ID ); ?></h5>
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
            <h5 class="testimonial__name"><?php the_field( 'testimonial_name', $testimonial->ID ); ?><?php //echo get_the_title( $testimonial->ID ); ?></h5>
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

    <?php $ctr2_link = get_field( 'ctr2_link' ); ?>

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

<!-- press 

<div class="press">
<div class="press__slides">
<div class="owl-carousel" data-owl-carousel>

    <?php
        $i = 1;
        $press_items = get_field( 'pss_slides' );

        foreach( $press_items as $key => $press ) { 

            $press_id       = $press['pss_slide']->ID; 
            $press_logo     = get_field( 'logo', $press_id );

            $args = array( 
                get_the_post_thumbnail_url( $press_id ),  
                get_the_post_thumbnail_url( $press_id ),  
                '.landing-pages--homepage .press .slide.slide--' . $i
            );
            echo hp_image_styles( $args  );
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
</div>
--><!-- ./press -->

<!-- book-now -->

<?php get_template_part('templates/block', 'signup'); ?>

<?php get_footer(); ?>