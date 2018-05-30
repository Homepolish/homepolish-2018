<!-- category-mag.php -->
<?php get_header(); ?>
<?php //$blog_featured = get_ot_option_do_a_search_for_this('blog_featured'); ?>

<?php
// Get first post
$args = array(
	'post_type' => array('post'),
	'posts_per_page' => 1
);
$query = new WP_query ( $args );
if( $query->have_posts() ) { ?>

	<div class="row row-outer featured-post" itemscope itemtype="http://schema.org/BlogPosting">
		<div class="small-12 large-4 large-offset-1 columns featured-post-meta">

			<h2 itemprop="headline" class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<aside class="entry-meta">
				<?php if(has_category()) { ?>
				<?php hp_2018_get_category_aside(); ?>
				<?php } ?> |
				<?php 
	                //City
	                $location_hash = wp_get_post_terms($post->ID, 'location'); // Grab just the first location
	                $location_name = $location_hash ? $location_hash[0]->name : null;
	                $location_slug = $location_hash ? $location_hash[0]->slug : null;

	                if( $location_name && $location_slug ) { ?>
	                    <a href="<?php echo get_term_link($location_slug, 'location') ?>" class="tertiary"><?php echo $location_name; ?></a>
	                <?php }   
            	?></aside>
		</div>
		<div class="small-12 large-8 large-offset-3 columns">

			<?php if ( has_post_thumbnail() ) { ?>
				<figure class="post-gallery">
				
					<?php
					    $image_id = get_post_thumbnail_id();
					    $image_link = wp_get_attachment_image_src($image_id,'full');
					    $image_title = esc_attr( get_the_title($post->ID) );
				
						$image = aq_resize( $image_link[0], 1170, 1000, true, false, true);  // Blog
				
					?>
					<a href="<?php the_permalink(); ?>"><img itemprop="image" src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
				</figure>
			<?php } ?>
		</div>
		<span class="blogposting-itemprops" style="display:none">
			<span class="author" itemprop="author"><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></span>
			<span class="datePublished" itemprop="datePublished"><?php echo $post->post_date; ?></span>
			<span class="publisher" itemprop="publisher">Homepolish</span>
		</span>
	</div>

<?php } 
wp_reset_postdata(); ?>

<!-- 2/3 -->

<div class="row row-outer collapsed cat-2x">

<?php
$args = array(
	'post_type' => array('post'),
	'offset' => 1,
	'posts_per_page' => 2
);
$query = new WP_query ( $args );
if( $query->have_posts() ) {
while ( $query->have_posts() ) : $query->the_post(); /* start the loop */ ?>

	<div class="large-6 columns" itemscope itemtype="http://schema.org/BlogPosting">
		<div class="row collapse">
			<div class="large-11 large-centered columns">
				<?php if ( has_post_thumbnail() ) { ?>
				<?php
					    $image_id = get_post_thumbnail_id();
					    $image_link = wp_get_attachment_image_src($image_id,'full');
					    $image_title = esc_attr( get_the_title($post->ID) );
				
						$image = aq_resize( $image_link[0], 740, 380, true, false, true);  // Blog
				
					?>
					<a href="<?php the_permalink(); ?>"><img itemprop="image" src="<?php echo esc_url($image[0]); ?>" width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" alt="<?php echo esc_attr($image_title); ?>" /></a>
				<?php } ?>
			</div>
			<div class="large-10 large-centered columns">';         
				<h3 itemprop="headline" class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<?php if(has_category()) { ?>
					<?php hp_2018_get_category_aside(); ?>
				<?php } ?> | 
				<?php 
                    //City
                    $location_hash = wp_get_post_terms($post->ID, 'location'); // Grab just the first location
                    $location_name = $location_hash ? $location_hash[0]->name : null;
                    $location_slug = $location_hash ? $location_hash[0]->slug : null;

                    if( $location_name && $location_slug ) { ?>
                        <a href="<?php echo get_term_link($location_slug, 'location') ?>" class="secondary"><?php echo $location_name; ?></a>
                    <?php }   
                    ?>
                </span>
			</div>
		</div>
		<span class="blogposting-itemprops" style="display:none">
			<span class="author" itemprop="author"><?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></span>
			<span class="datePublished" itemprop="datePublished"><?php echo $post->post_date; ?></span>
			<span class="publisher" itemprop="publisher">Homepolish</span>
		</span>
	</div>

<?php endwhile;
}
wp_reset_postdata(); ?>

</div>

<!-- posts -->

<div class="row row-outer blog-list" data-equalizer>

<?php
$args = array(
	'post_type' => array('post'),
	'offset' => 3,
	'posts_per_page' => 20
);
$query = new WP_query ( $args );
if ( $query->have_posts() ) {
while ( $query->have_posts() ) : $query->the_post(); /* start the loop */ ?>

		<?php get_template_part( 'inc/loop/blog-list' ); ?>

<?php endwhile;
}
wp_reset_postdata(); ?>

</div>

<?php //exit; ?>

<?php if ( get_next_posts_link() || get_previous_posts_link()) { ?>
	<div class="blog_nav">
		<?php if ( get_next_posts_link() ) : ?>
			<a href="<?php echo next_posts(); ?>" class="next"><i class="fa fa-angle-left"></i> <?php _e( 'Older Posts', THB_THEME_NAME ); ?></a>
		<?php endif; ?>
	
		<?php if ( get_previous_posts_link() ) : ?>
			<a href="<?php echo previous_posts(); ?>" class="prev"><?php _e( 'Newer Posts', THB_THEME_NAME ); ?> <i class="fa fa-angle-right"></i></a>
		<?php endif; ?>
	</div>
<?php } ?>

<?php get_footer(); ?>