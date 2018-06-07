<?php
  /*
	$id = get_the_id();
	$redirect_url = "{$parent_url}?gallery_id={$id}";
	wp_redirect($redirect_url);
	*/
  $fixed = ot_get_option('article_fixed_sidebar', 'on'); 
	$parent = $post->post_parent;
	$parent_url = trim(get_permalink($parent), '/');
	$parent_title = get_the_title($parent);
	$caption = $post->post_excerpt;
?>

<?php get_header(); ?>
	<div class="post-detail-row attachment-page">
		<div class="row"<?php if ($fixed == 'on') { ?> data-equal=">.columns"<?php } ?>>
			<div class="small-12 medium-12 large-8 columns">
				<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post post-detail'); ?> id="post-<?php the_ID(); ?>" role="article" data-id="<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>">
					<div class="notification no-x">
						<p>This is a snap from <span class="bold"><?php echo $parent_title; ?></span>.</p>
						<p>Want to see more from Homepolish? We thought so. <a href="<?php echo $parent_url; ?>" class="secondary">Read the full article</a><span class="v1-icon-caret-right"></span></p>
					</div>
					<header class="post-title entry-header">
					</header>
					<div class="post-content-container">
						<figure class="post-gallery">
							<?php
								$attachment = get_post($attachment_id);
								$full_image = wp_get_attachment_image_src($attachment_id, 'full');
								$image_dimensions = hmpl_get_image_dim($full_image);
								$alt_text = $attachment->post_title . ($attachment->post_excerpt ? " " . $attachment->post_excerpt : "");
								$desktop_img = aq_resize( $full_image[0], $image_dimensions['desktop_dim'][0], $image_dimensions['desktop_dim'][1], true, false, true );
								echo hmpl_get_attachment_image( $desktop_img, $alt_text, false );
							?>
						</figure>
					<div class="post-content">
						<div class="row columns" data-equal=">.columns">
							<div class="small-12 medium-2 large-2 columns show-for-medium-up">
								<h6>Share</h6>
								<?php do_action('thb_social_article_detail', $attachment_id, $alt_text, false, false, false, false); ?>
							</div>
							<div class="small-12 medium-10 large-10 columns">
								<?php if ($caption) { ?>
									<p class="italic"><?php echo $caption; ?></p>
								<?php } ?>
							</div>
						</div>
				</article>
			</div>
       <?php get_sidebar('single'); ?>
		</div>
	</div>
<?php get_footer(); ?>
