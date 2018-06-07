<?php get_header(); ?>
<section class="content404">
	<div class="row">
		<div class="small-12 medium-5 columns text-left">
			<h1><?php _e( "Oops!", THB_THEME_NAME ); ?></h1>
			<p><?php _e( "We're sorry. But the page you are looking for cannot be found. You might try searching our site.", THB_THEME_NAME ); ?></p>

			<?php get_search_form(); ?> 
			
			<a href="<?php echo get_home_url(); ?>" class="btn"><?php _e('Back To Home', THB_THEME_NAME); ?></a>
		</div>
	</div>
</section>
<?php get_footer(); ?>