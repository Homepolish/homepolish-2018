<?php
// thb Signup Widget
class thb_signup_widget extends WP_Widget {

	function thb_signup_widget() {

		/* Widget settings. */
		$widget_ops = array( 'description' => __('A widget that encourages users to signup for Homepolish.',THB_THEME_NAME), 'classname' => 'widget_signup_widget logged-out' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'signup_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'signup_widget', __('Homepolish - Signup Widget',THB_THEME_NAME), $widget_ops, $control_ops );

	}

	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$desc = $instance['desc'];
		$button_copy = $instance['button_copy'];
		$button_2_copy = $instance['button_2_copy'];

		echo $before_widget;

		?>
			<span class="v1-icon-logo"></span>

		  <?php echo ($title ? $before_title . $title . $after_title : ''); ?>

      <p class="small italic"><?php echo $desc; ?></p>

      <a href="<?php echo HMPL_SERVICE_URI ?>/start" class="btn"><?php echo $button_copy; ?></a>

      <h6>
	      <a href="<?php echo HMPL_SERVICE_URI ?>" class="tertiary">
		      <?php echo $button_2_copy; ?><span class="v1-icon-caret-right">
	      </a>
	    </h6>
		<?php

		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['desc'] = stripslashes( $new_instance['desc']);
		$instance['button_copy'] = stripslashes($new_instance['button_copy']);
		$instance['button_2_copy'] = stripslashes($new_instance['button_2_copy']);

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'title' => '',
		'desc' => '',
		'button_copy' => '',
		'button_2_copy' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>">Enticing Sentence: </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['desc'] ), ENT_QUOTES)); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_copy' ); ?>">Button Copy: </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_copy' ); ?>" name="<?php echo $this->get_field_name( 'button_copy' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['button_copy'] ), ENT_QUOTES)); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'button_2_copy' ); ?>">Button 2 Copy: </label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_2_copy' ); ?>" name="<?php echo $this->get_field_name( 'button_2_copy' ); ?>" value="<?php echo stripslashes(htmlspecialchars(( $instance['button_2_copy'] ), ENT_QUOTES)); ?>" />
		</p>


	<?php
	}
}
add_action( 'widgets_init', 'thb_signup_widgets' );

function thb_signup_widgets() {
	register_widget( 'thb_signup_widget' );
}

?>