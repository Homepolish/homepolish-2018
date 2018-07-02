<?php $sur_link = get_field( 'sur_link' ); ?>

<div class="book-now-cta">
    <h5 class="cta-header"><?php the_field( 'sur_title' ); ?></h5>
    <h3 class="cta-content"><?php the_field( 'sur_subtitle' ); ?></h3>
    <a class="cta-button" data-track-book-now="true" data-button-id="inline_cta" href="<?php echo $sur_link['url']; ?>"><?php echo $sur_link['title']; ?></a>
</div>