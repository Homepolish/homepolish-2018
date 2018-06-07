<!-- Start Related Posts -->
<?php
	global $post;
  $postId = $post->ID;

  if ($postId) {
    $query = get_blog_posts_related_by_category($postId);
  }
?>
<?php if ($query->have_posts()) : ?>

<div class="related-posts-container">
  <div class="row">
    <div class="small-12 medium-12 large-12 columns">
      <h5><?php _e( 'You might also like', THB_THEME_NAME ); ?></h5>
    </div>
  </div>

  <div class="row posts">
    <div class="related-posts hide-on-print" data-equal=">.columns">
      <?php while ($query->have_posts()) : $query->the_post(); ?>
        <div class="small-12 medium-3 large-3 columns">
          <?php get_template_part( 'inc/loop/homepolish/style-related-posts' ); ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</div>

<?php endif; ?>
<?php wp_reset_query(); ?>
<!-- End Related Posts -->