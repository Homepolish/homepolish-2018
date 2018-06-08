<?php
// thb latest Posts List
class widget_latestlist extends WP_Widget {
       function widget_latestlist() {
               /* Widget settings. */
               $widget_ops = array( 'description' => __('Display latest posts with excerpts',THB_THEME_NAME) );

               /* Widget control settings. */
               $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'latestlist' );

               /* Create the widget. */
               $this->WP_Widget( 'latestlist', __('Fuel Themes - Latest Posts with Excerpts',THB_THEME_NAME), $widget_ops, $control_ops );
       }

       function widget($args, $instance) {
               extract($args);
               $title = apply_filters('widget_title', $instance['title']);
               $show = $instance['show'];
               global $post, $wpdb;
               $themePath = THB_THEME_ROOT;
               $pop = new WP_Query();
               $pop->query('showposts='.$show.'');

               echo $before_widget;
               echo ($title ? $before_title . $title . $after_title : '');
               echo '<ul>';
               while  ($pop->have_posts()) : $pop->the_post(); ?>
	           <li class="post">
	           		<aside class="post-author">
	               <time class="time" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time>
	              </aside>
	               <header class="post-title">
	               	<h6><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
	               </header>
	               <div class="post-content small">
									<?php echo thb_excerpt(60, '&hellip;'); ?>
	               </div>
	           </li>
	           <?php endwhile;
               echo '</ul>';
               echo $after_widget;
               
               wp_reset_query();
       }
       function update( $new_instance, $old_instance ) {
               $instance = $old_instance;

               /* Strip tags (if needed) and update the widget settings. */
               $instance['title'] = strip_tags( $new_instance['title'] );
               $instance['show'] = strip_tags( $new_instance['show'] );

               return $instance;
       }
       function form($instance) {
               $defaults = array( 'title' => 'Latest Posts', 'show' => '3' );
               $instance = wp_parse_args( (array) $instance, $defaults ); ?>

               <p>
                       <label for="<?php echo $this->get_field_id( 'title' ); ?>">Widget Title:</label>
                       <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
               </p>

               <p>
                       <label for="<?php echo $this->get_field_id( 'name' ); ?>">Number of Posts:</label>
                       <input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'show' ); ?>" value="<?php echo $instance['show']; ?>" style="width:100%;" />
               </p>
   <?php
       }
}
function widget_latestlist_init()
{
       register_widget('widget_latestlist');
}
add_action('widgets_init', 'widget_latestlist_init');

?>