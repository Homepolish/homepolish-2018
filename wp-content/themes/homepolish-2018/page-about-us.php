<?php get_header(); ?>

<!-- to do, fix 2x links that are floating left (PHASE 2) -->

<!-- our-mission -->

    

<style>
.landing-pages--about-us .our-mission {url(<?php the_field( 'mobile_image' )['url']; ?>);}
@media only screen and (-webkit-min-device-pixel-ratio: 1.3) and (min-width: 768px), not all, only screen and (-webkit-min-device-pixel-ratio: 1.30208) and (min-width: 768px), only screen and (min-resolution: 125dpi) and (min-width: 768px), only screen and (min-resolution: 1.3dppx) and (min-width: 768px) {
    .landing-pages--about-us .our-mission {url(<?php the_field( 'image' )['url']; ?>);}
}

<div class="our-mission">
    <h1 class="our-mission__tagline formatted-copy--mobile">
        <?php the_field( 'header' ); ?>
    </h1>

    <h1 class="our-mission__tagline formatted-copy--tablet-desktop">
        <?php the_field( 'header' ); ?>
    </h1>

    <p class="our-mission__body formatted-copy--mobile">
        <?php the_field( 'copy' ); ?>
    </p>

    <p class="our-mission__body formatted-copy--tablet-desktop">
        <?php the_field( 'copy' ); ?>
    </p>
</div><!-- ./our-mission -->

<!-- our-promise -->

<!-- make each box a repeater -->

<div class="our-promise">

    <?php 
        $row = get_field( 'row' ); 
        foreach( $row as $key => $value ) {
        ?>

        <div class="our-promise__section">
            <h5 class="section__header"><?php echo $value['2xl_title']; ?></h5>
            <p class="section__body formatted-copy--mobile">
                <?php echo $value['2xl_copy']; ?>
            </p>
            <p class="section__body formatted-copy--tablet-desktop">
                <?php echo $value['2xl_copy']; ?>
            </p>
        </div>
        <div class="our-promise__section">
            <h5 class="section__header"><?php echo $value['2xr_title']; ?></h5>
            <p class="section__body formatted-copy--mobile">
                <?php echo $value['2xr_copy']; ?>
            </p>
            <p class="section__body formatted-copy--tablet-desktop">
                <?php echo $value['2xr_copy']; ?>
            </p>
        </div>

        <? } 
   ?>
</div><!-- ./our-promise -->

<!-- why-homepolish -->   

<div class="why-homepolish">
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
        $row = get_field( 'wch_row' ); 

        foreach( $row as $value ) { 
        ?>

        <div class="why-homepolish__section">
            <div class="section__image section__image--<?php echo $i++; ?>">
                <!-- <?php echo $value['wchr_image']; ?> --></div>
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

    <?php } ?>
</div><!-- ./why-homepolish -->

<!-- ctas -->

<div class="ctas">

    <?php 
        $row = get_field( '2x2_row' ); 
        foreach( $row as $key => $value ) {
        ?>

        <div class="cta">
            <h5 class="cta__header">
                <?php echo $value['2x2l_title']; ?>
            </h5>
            <p class="cta__body formatted-copy--mobile-tablet">
                <?php echo $value['2x2l_copy']; ?>
            </p>
            <p class="cta__body formatted-copy--desktop">
                <?php echo $value['2x2l_copy']; ?>
            </p>
            <h5 class="cta__link">
                <a class="cta-link" href="<?php echo $value['2x2l_link']['url']; ?>" target="_self">
                    <span class="cta-link-text"><?php echo $value['2x2l_link']['title']; ?></span>
                    <span class="v1-icon-caret-right"></span>
                </a>
            </h5>
        </div>
        <div class="cta">
            <h5 class="cta__header">
                <?php echo $value['2x2r_title']; ?>
            </h5>
            <p class="cta__body formatted-copy--mobile-tablet">
                <?php echo $value['2x2r_copy']; ?>
            </p>
            <p class="cta__body formatted-copy--desktop">
                <?php echo $value['2x2r_copy']; ?>
            </p>
            <h5 class="cta__link">
                <a class="cta-link" href="<?php echo $value['2x2r_link']['url']; ?>" target="_self">
                    <span class="cta-link-text"><?php echo $value['2x2r_link']['title']; ?></span>
                    <span class="v1-icon-caret-right"></span>
                </a>
            </h5>
        </div>

    <?php } ?>
</div><!-- ./ -->

<?php get_template_part('templates/block', 'signup'); ?>

<?php get_footer(); ?>