<?php $sur_link = get_field( 'sur_link_2' ); ?>

<div class="book-now-cta">
    <h5 class="cta-header"><?php the_field( 'sur_title_2' ); ?></h5>
    <h3 class="cta-content"><?php the_field( 'sur_subtitle_2' ); ?></h3>
    <a class="cta-button" data-track-book-now="true" data-button-id="inline_cta" href="<?php echo $sur_link['url']; ?>"><?php echo $sur_link['title']; ?></a>
</div>