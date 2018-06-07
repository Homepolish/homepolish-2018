<div class="table full-height-content text-center no-result">
	<div>
		<?php if( is_search()) { ?>
			<h4><?php _e( 'Sorry, but nothing matched your search criteria.', THB_THEME_NAME ); ?></h4>
		<?php } else { ?>
			<h4><?php _e( 'Sorry, there\'s nothing to see here.', THB_THEME_NAME ); ?></h4>
		<?php } ?>
		<a href="<?php echo home_url(); ?>" class="btn large"><?php _e( 'Back to Home Page', THB_THEME_NAME ); ?></a>
	</div>
</div>