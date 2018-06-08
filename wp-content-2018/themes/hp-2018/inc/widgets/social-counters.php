<?php
// thb Social counter
class widget_socialcounter extends WP_Widget { 
	function widget_socialcounter() {
		/* Widget settings. */
		$widget_ops = array('description' => __('Display a Social Counter', THB_THEME_NAME) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'socialcounter' );

		/* Create the widget. */
		$this->WP_Widget( 'socialcounter', __('Fuel Themes - Social Counter',THB_THEME_NAME), $widget_ops, $control_ops );
	}
	
	function widget($args, $instance) {
		extract($args);
		$twitter = $instance['Twitter'];
		$facebook = $instance['Facebook'];
		$facebook_username = $instance['Facebook-username'];
		$instagram = $instance['Instagram'];
		$google = $instance['Google'];
		
		// Output
		echo $before_widget;
		?>
			<ul>
				<?php if ($facebook) { ?>
				<li><a href="http://facebook.com/<?php echo $facebook_username; ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i> <?php do_action('thb_fbLikeCount', $facebook); ?> <em><?php _e('Likes', THB_THEME_NAME); ?></em> <span><?php _e('LIKE', THB_THEME_NAME); ?></span></a></li>
				<?php } ?>
				<?php if ($twitter) { ?>
				<li><a href="http://twitter.com/<?php echo ot_get_option('twitter_bar_username'); ?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i> <?php do_action('thb_twFollowerCount'); ?> <em><?php _e('Followers', THB_THEME_NAME); ?></em> <span><?php _e('FOLLOW', THB_THEME_NAME); ?></span></a></li>
				<?php } ?>
				<?php if ($instagram) { ?>
				<li><a href="http://instagram.com/<?php echo ot_get_option('instagram_username'); ?>" class="instagram" target="_blank"><i class="fa fa-instagram"></i> <?php do_action('thb_insFollowerCount'); ?> <em><?php _e('Followers', THB_THEME_NAME); ?></em> <span><?php _e('FOLLOW', THB_THEME_NAME); ?></span></a></li>
				<?php } ?>
				<?php if ($google) { ?>
				<li><a href="https://plus.google.com/<?php echo ot_get_option('gp_username'); ?>" class="google-plus" target="_blank"><i class="fa fa-google-plus"></i> <?php do_action('thb_gpFollowerCount'); ?> <em><?php _e('Fans', THB_THEME_NAME); ?></em> <span><?php _e('LIKE', THB_THEME_NAME); ?></span></a></li>
				<?php } ?>
			</ul>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['Twitter'] = strip_tags( $new_instance['Twitter'] );
		$instance['Facebook'] = strip_tags( $new_instance['Facebook'] );
		$instance['Facebook-username'] = strip_tags( $new_instance['Facebook-username'] );
		$instance['Instagram'] = strip_tags( $new_instance['Instagram'] );
		$instance['Google'] = strip_tags( $new_instance['Google'] );
		
		return $instance;
	}
	// Settings form
	function form($instance) {
		$defaults = array(
			'Twitter' => false,
			'Facebook' => '256430061166535',
			'Facebook-username' => 'FuelThemes',
			'Instagram' => false,
			'Google' => false
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>

			<p>
		    <input id="<?php echo $this->get_field_id('Twitter'); ?>" name="<?php echo $this->get_field_name('Twitter'); ?>" type="checkbox" <?php if ($instance['Twitter']) { ?>checked="checked" <?php } ?> />
		    <label for="<?php echo $this->get_field_id('Twitter'); ?>"><?php _e('Display Twitter Counter?'); ?></label>
		    <small><?php _e('Please make sure you fill out the settings inside Theme Options -> Twitter Oauth for Twitter Counts'); ?></small>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'Facebook' ); ?>">Facebook Page ID:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'Facebook' ); ?>" name="<?php echo $this->get_field_name( 'Facebook' ); ?>" value="<?php echo $instance['Facebook']; ?>" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'Facebook-username' ); ?>">Facebook Username:</label>
				<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'Facebook-username' ); ?>" name="<?php echo $this->get_field_name( 'Facebook-username' ); ?>" value="<?php echo $instance['Facebook-username']; ?>" />
			</p>
			<p>
			  <input id="<?php echo $this->get_field_id('Instagram'); ?>" name="<?php echo $this->get_field_name('Instagram'); ?>" type="checkbox" <?php if ($instance['Instagram']) { ?>checked="checked" <?php } ?> />
			  <label for="<?php echo $this->get_field_id('Instagram'); ?>"><?php _e('Display Instagram Counter?'); ?></label>
			  <small><?php _e('Please make sure you fill out the settings inside Theme Options -> Instagram Oauth for Instagram Counts'); ?></small>
			</p>
			<p>
			  <input id="<?php echo $this->get_field_id('Google'); ?>" name="<?php echo $this->get_field_name('Google'); ?>" type="checkbox" <?php if ($instance['Google']) { ?>checked="checked" <?php } ?> />
			  <label for="<?php echo $this->get_field_id('Google'); ?>"><?php _e('Display Google+ Counter?'); ?></label>
			  <small><?php _e('Please make sure you fill out the settings inside Theme Options -> Google+ Oauth for Google Counts'); ?></small>
			</p>
    <?php
	}
}
function widget_socialcounter_init()
{
	register_widget('widget_socialcounter');
}
add_action('widgets_init', 'widget_socialcounter_init');

?>