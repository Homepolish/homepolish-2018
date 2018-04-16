<!-- our-mission -->

<?php 

    $args = array( 
        get_field( 'mobile_image' ), 
        get_field( 'image' ), 
        '.landing-pages--about-us .our-mission'
    );
    echo hp_image_styles( $args );
?>

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