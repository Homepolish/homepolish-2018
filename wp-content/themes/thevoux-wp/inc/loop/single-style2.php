<!-- single-style2--><?php 
	$id = get_the_id();
	$post_image = get_post_meta($id, 'post-top-image', true) ? get_post_meta($id, 'post-top-image', true) : '';
?>
<?php 
	$fixed = ot_get_option('article_fixed_sidebar', 'on'); 
	$fullwidth = ot_get_option('article_fullwidth', 'off');
	$dropcap = ot_get_option('article_dropcap', 'on');
	$adv_postend = ot_get_option('adv_postend');
	$adv_postend_ajax = ot_get_option('adv_postend_ajax');

	$talking_points = get_field('talking_points');
  $social_description = $talking_points ? $talking_points : get_the_excerpt();
?>
<div class="post-detail-row style2">
	<div class="parallax_bg post-header" data-stellar-background-ratio="0.5" style="background-image: url(<?php echo $post_image; ?>);"></div>

	<div class="row post-detail-style2"<?php if ($fixed == 'on') { ?> data-equal=">.columns"<?php } ?>>
		<div class="small-12 medium-12 <?php echo ($fullwidth == 'on' ? 'large-12' : 'large-8'); ?> columns">
			<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post post-detail'); ?> id="post-<?php the_ID(); ?>" role="article" data-id="<?php the_ID(); ?>" data-url="<?php the_permalink(); ?>">
				<?php do_action( 'thb_fb_information' ); ?>
				<header class="post-title entry-header">
					<?php if(has_category()) { ?>
					<aside class="post-meta cf"><?php the_category(', '); ?></aside>
					<?php } ?>
					<?php if ( $ajax == '0' ) { ?>
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
					<?php } else { ?>
						<?php the_title('<h1 class="entry-title"><a href="'.get_permalink().'" title="'.the_title_attribute("echo=0").'">', '</a></h1>'); ?>
					<?php } ?>
					<aside class="post-author">
						<time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time> <em><?php _e('by', THB_THEME_NAME); ?></em> <?php the_author_posts_link(); ?>
					</aside>
				</header>
				<?php do_action('thb_social_article_detail', false, $social_description, true, 'hide-for-small'); ?>
				<div class="post-content-container">
					<?php
					  // The following determines what the post format is and shows the correct file accordingly
					  $format = get_post_format();
					  if ($format) {
					  	get_template_part( 'inc/postformats/'.$format );
					  }
					?>
					<div class="post-content entry-content cf"<?php if ($dropcap== 'on') { ?> data-first="<?php echo thb_FirstLetter(); ?>"<?php } ?>>
						<?php echo the_content(); ?>
						
						<?php
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', THB_THEME_NAME ),
								'after'  => '</div>',
							) );
						?>
						<?php $posttags = get_the_tags(); ?>
						<?php if (!empty($posttags)) { ?>
						<footer class="article-tags entry-footer">
							<strong><?php _e('Tags:'); ?></strong> 
							<?php
							if ($posttags) {
								$return = '';
								foreach($posttags as $tag) {
									$return .= '<a href="'. get_tag_link($tag->term_id).'" title="'. get_tag_link($tag->name).'">' . $tag->name . '</a>, ';
								}
								echo substr($return, 0, -2);
							} ?>
						</footer>
						<?php } ?>
						<?php if (ot_get_option('article_author', 'on') == 'on') { ?> 
						<div class="category_container author-information">
							<div class="inner">
								<section id="authorpage" class="authorpage">
									<?php do_action('thb_author'); ?>
								</section>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<?php do_action('thb_social_article_detail', false, $social_description, false, 'show-for-small'); ?>
			</article>
			<?php if ( $ajax == '0' ) { ?>
			<!-- Start #comments -->
			<section id="comments" class="cf full">
				<?php comments_template('', true ); ?>
			</section>
			<!-- End #comments -->
			<?php } ?>
			<?php if ($ajax == '0' && ot_get_option('related_posts', 'on') !== 'off') { ?>
				<?php get_template_part( 'inc/postformats/post-related' ); ?>
			<?php } ?>
		</div>
		<?php if ($fullwidth == 'off') { ?>
			<?php 
				if ( $ajax == '0' ) { 
					get_sidebar('single');
			 	} else {
			 		get_sidebar('single-ajax');
			 	}
			 ?>
		 <?php } ?>
	</div>
	<?php 
		if ( $ajax == '0' && $adv_postend) { 
			echo '<aside class="ad_container_bottom">'.do_shortcode(wp_kses_post($adv_postend)).'</aside>';
	 	} else if ( $ajax == '1' && $adv_postend_ajax) {
	 		echo '<aside class="ad_container_bottom">'.do_shortcode(wp_kses_post($adv_postend_ajax)).'</aside>';
	 	}
	 ?>
</div>