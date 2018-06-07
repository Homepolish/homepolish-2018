<?php
// thb Social counter
class widget_image_link extends WP_Widget {
  function widget_image_link() {
    $widget_ops = array('description' => __('An Image Link', THB_THEME_NAME) );

    $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'image_link' );

    $this->WP_Widget( 'image_link', __('Homepolish - Image & Link',THB_THEME_NAME), $widget_ops, $control_ops );
  }

  function widget($args, $instance) {
    extract( $args );

    echo $before_widget;
    ?>

      <a href="<?php echo $instance['destination']?>">
        <img src="<?php echo $instance['image_url'] ?>" />
      </a>

    <?php
    echo $after_widget;
  }

  function update( $new_instance, $old_instance ) {  
    $instance = $old_instance; 

    $instance['destination'] = stripslashes( $new_instance['destination'] );
    $instance['image_url'] = stripslashes( $new_instance['image_url'] );

    return $instance;
  }

  // Settings form
  function form($instance) {
    /* Set up some default widget settings. */
    $defaults = array(
      'url' => 'https://www.homepolish.com',
      'image_url' => 'https://www.homepolish.com/wp-content/uploads/the_image.png'
    );
    $instance = wp_parse_args( (array) $instance, $defaults );

    ?>

    <p>
      <label for="<?php echo $this->get_field_id( 'destination' ); ?>">Link Destination:</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'destination' ); ?>" name="<?php echo $this->get_field_name( 'destination' ); ?>" value="<?php echo $instance['destination']; ?>" />
    </p>

    <p>
      <label for="<?php echo $this->get_field_id( 'image_url' ); ?>">Image URL:</label>
      <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo $instance['image_url']; ?>" />
    </p>

    <?php
  }
}

function widget_image_link_init() {
  register_widget('widget_image_link');
}
add_action('widgets_init', 'widget_image_link_init');
?>
