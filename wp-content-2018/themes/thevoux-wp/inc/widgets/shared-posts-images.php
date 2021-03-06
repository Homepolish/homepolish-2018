<?php
// thb shared Posts w/ Images
class widget_sharedimages extends WP_Widget {
       function widget_sharedimages() {
               /* Widget settings. */
               $widget_ops = array( 'description' => __('Display most shared posts with images',THB_THEME_NAME) );

               /* Widget control settings. */
               $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'sharedimages' );

               /* Create the widget. */
               $this->WP_Widget( 'sharedimages', __('Fuel Themes - Most Shared Posts with Images',THB_THEME_NAME), $widget_ops, $control_ops );
       }

       function widget($args, $instance) {
               extract($args);
               $title = apply_filters('widget_title', $instance['title']);
               $show = $instance['show'];
               global $post, $wpdb;
               
               $args = array(
               		'nopaging' => 0, 
               		'post_type'=>'post', 
               		'post_status' => 'publish', 
               		'ignore_sticky_posts' => 1,
               		'no_found_rows' => true,
               		'suppress_filters' => 0,
               		'showposts' => $show,
               		'meta_key' => 'thb_pssc_counts',  
               		'orderby' => 'meta_value_num'
               	);
               $posts = new WP_Query( $args );

               echo $before_widget;
               echo ($title ? $before_title . $title . $after_title : '');
               echo '<ul>';
               while  ($posts->have_posts()) : $posts->the_post(); ?>
	           <li class="post">
	           	   <figure>
	               <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
	               <?php if ( has_post_thumbnail() ) {
	               		the_post_thumbnail();
	               } else { ?>
	               		<img src="<?php echo THB_THEME_ROOT; ?>/assets/img/nothumb.jpg" alt="No Post Image for <?php the_title(); ?>" width="40" height="40" />
	               <?php } ?>
	               </a>
	               </figure>
	               <header class="post-title">
	               		<h6><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
	               </header>
	               <div class="post-excerpt">
	               	<?php get_template_part( 'inc/postformats/post-just-shares' ); ?>
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
               $defaults = array( 'title' => 'Most Shared', 'show' => '3' );
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
function widget_sharedimages_init()
{
       register_widget('widget_sharedimages');
}
add_action('widgets_init', 'widget_sharedimages_init');

?>