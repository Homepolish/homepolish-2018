<?php
// thb Featured Video
class widget_thbfeaturedvideo extends WP_Widget { 
	function widget_thbfeaturedvideo() {
		/* Widget settings. */
		$widget_ops = array('description' => __('Display an embeded video on your sidebar',THB_THEME_NAME) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'featured_video' );

		/* Create the widget. */
		$this->WP_Widget( 'featured_video', __('Fuel Themes - Featured Video',THB_THEME_NAME), $widget_ops, $control_ops );
	}
	
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$video_title = $instance['video_title'];
		$embed = $instance['embed'];
		global $wp_embed;
		// Output
		echo $before_widget;
		echo ($title ? $before_title . $title . $after_title : '');
		
		if ($title) {
			echo '<h6>'.esc_attr($video_title).'</h6>';	
		}
		
		echo $wp_embed->run_shortcode('[embed]'.$embed.'[/embed]');
		
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['video_title'] = strip_tags( $new_instance['video_title'] );
		$instance['embed'] = strip_tags( $new_instance['embed'] );

		return $instance;
	}
	// Settings form
	function form($instance) {
		$defaults = array( 'title' => 'Featured Video', 'embed' => '', 'video_title' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'video_title' ); ?>">Video Title:</label>
			<input id="<?php echo $this->get_field_id( 'video_title' ); ?>" name="<?php echo $this->get_field_name( 'video_title' ); ?>" value="<?php echo $instance['video_title']; ?>" style="width:100%;" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'embed' ); ?>">Video URL:</label>
			<input id="<?php echo $this->get_field_id( 'embed' ); ?>" name="<?php echo $this->get_field_name( 'embed' ); ?>" value="<?php echo $instance['embed']; ?>" style="width:100%;" />
		</p>
    <?php
	}
}
function widget_thbfeaturedvideo_init()
{
	register_widget('widget_thbfeaturedvideo');
}
add_action('widgets_init', 'widget_thbfeaturedvideo_init');

?>