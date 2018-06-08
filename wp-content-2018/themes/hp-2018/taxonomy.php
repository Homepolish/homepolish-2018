<!-- taxonomy.php -->
<?php
  $taxonomy_term = get_queried_object();
  if (have_posts()) {
  	$child_attachments = hmpl_tax_child_attachments($posts, $taxonomy_term);
  }  
?>
<?php get_header(); ?>
<?php include(locate_template('inc/header/taxonomy-title.php')); ?>
<div class="row posts archive-page-container">
	<div class="small-12 columns">
		<?php if (have_posts()) { ?>
			<div class="taxonomy-nav">
				<?php hmpl_nav_links(); ?>
			</div>
		  <?php
			  while (have_posts()) {
			  	the_post();

			  	$attachments = array_filter($child_attachments, function($attachment) use ($post) {
			  		return $attachment->post_parent == $post->ID;
			  	});

					$attachments = hmpl_txn_sort_child_attachments($attachments, 8);

			  	include(locate_template('inc/loop/homepolish/style-hp-taxonomy.php'));
			  }
			?>
			<div class="taxonomy-nav">
				<?php hmpl_nav_links(); ?>
			</div>
		<?php } else {
			get_template_part( 'inc/loop/notfound' );
		} ?>
	</div>
</div>
<?php get_footer();?>
