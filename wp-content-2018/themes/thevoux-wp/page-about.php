<?php get_header(); ?>

<!-- our-mission -->

<?php 

    $args = array( 
        get_field( 'th_mobile_image' ), 
        get_field( 'th_image' ), 
        '.landing-pages--about-us .our-mission'
    );
    echo hp_image_styles( $args );
?>

<div class="our-mission acf-text-hero">
    <h1 class="our-mission__tagline formatted-copy--mobile">
        <?php the_field( 'th_header' ); ?>
    </h1>

    <h1 class="our-mission__tagline formatted-copy--tablet-desktop">
        <?php the_field( 'th_header' ); ?>
    </h1>

    <p class="our-mission__body formatted-copy--mobile">
        <?php the_field( 'th_copy' ); ?>
    </p>

    <p class="our-mission__body formatted-copy--tablet-desktop" style="width:450px;">
        <?php the_field( 'th_copy' ); ?>
    </p>
</div><!-- ./our-mission -->

<!-- about-blurb -->

<div class="about-blurb center-text" style="margin-top:100px;">

    <?php $center_copy = get_field( 'ctr_copy' ); ?>

    <h2 class="about-blurb__content formatted-copy--mobile">
        <?php echo $center_copy; ?>
    </h2>

    <h2 class="about-blurb__content formatted-copy--tablet">
        <?php echo $center_copy; ?>
    </h2>

    <h2 class="about-blurb__content formatted-copy--desktop" style="max-width:900px;">
        <?php echo $center_copy; ?>
    </h2>
</div><!-- about-blurb -->

<!-- why-homepolish -->   

<div class="why-homepolish" style="padding-bottom: 0px;">
    <h5 class="why-homepolish__title">
        <?php the_field( 'title' ); ?>
    </h5>

    <h2 class="why-homepolish__header formatted-copy--mobile">
        <?php the_field( 'subtitle' ); ?>
    </h2>

    <h2 class="why-homepolish__header formatted-copy--tablet-desktop">
        <?php the_field( 'subtitle' ); ?>
    </h2>

    <?php
        $i = 1; 
        $row = array();
        $row = get_field( 'wch_row' ); 

        foreach( $row as $value ) { 
        ?>

        <div class="why-homepolish__section-container">
            <div class="why-homepolish__section">
                <?php

                    $args = array(
                        //$value['wchr_mobile_image'],
                        $value['wchr_image'],
                        $value['wchr_image'],
                        '.landing-pages--about-us .why-homepolish .section__image.section__image--' . $i
                    );
                    echo hp_image_styles( $args );
                ?>

                <div class="section__image section__image--<?php echo $i++; ?>"></div>
                <div class="section__text">
                    <div class="text__wrapper">
                        <h4 class="text__header" itemprop="specialty">
                            <?php echo $value['wchr_title']; ?>
                        </h4>
                        <p class="text__body formatted-copy--mobile">
                            <?php echo $value['wchr_copy']; ?>
                        </p>
                        <p class="text__body formatted-copy--tablet-desktop">
                            <?php echo $value['wchr_copy']; ?>
                        </p>

                        <?php if( $value['wchr_link'] ) { ?>
                            <h5 class="cta__link">
                                <a href="<?php echo $value['wchr_link']['url']; ?>" class="cta-link">
                                    <span class="cta-link-text"><?php echo $value['wchr_link']['title']; ?></span>
                                    <span class="v1-icon-caret-right"></span>
                                </a>
                            </h5>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>
</div><!-- ./why-homepolish -->

<div style="background-color: #f7f7f7;">
<?php get_template_part('templates/block', 'signup-2'); ?>
</div>

<!-- how it works -->

<div class="hiw">
    <h5 class="hiw__title">
        <?php the_field( 'hiw_title' ); ?>
    </h5>

    <h2 class="hiw__header formatted-copy--mobile">
        <?php the_field( 'hiw_subtitle' ); ?>
    </h2>

    <h2 class="hiw__header formatted-copy--tablet-desktop">
        <?php the_field( 'hiw_subtitle' ); ?>
    </h2>

    <div class="hiw__container">
        <?php
            $i = 1;
            $row = array();
            $row = get_field( 'hiw_row' );

            foreach( $row as $value ) {
            ?>

            <div class="hiw__section">
                <div class="section__text">
                    <div class="text__wrapper">
                        <h4 class="text__header" itemprop="specialty">
                            <?php echo $value['hiwr_title']; ?>
                        </h4>
                        <p class="text__body formatted-copy--mobile">
                            <?php echo $value['hiwr_copy']; ?>
                        </p>
                        <p class="text__body formatted-copy--tablet-desktop">
                            <?php echo $value['hiwr_copy']; ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
</div><!-- ./how it works -->

<div style="background-color: #f7f7f7;">
<?php get_template_part('templates/block', 'signup'); ?>
</div>

<?php get_footer(); ?>