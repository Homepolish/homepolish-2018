<?php
// thb Social counter
class widget_socialnewsletter extends WP_Widget {
	function widget_socialnewsletter() {
		/* Widget settings. */
		$widget_ops = array('description' => __('Display Social Channels + Newsletter Signup', THB_THEME_NAME) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'socialnewsletter' );

		/* Create the widget. */
		$this->WP_Widget( 'socialnewsletter', __('Homepolish - Social & Newsletter',THB_THEME_NAME), $widget_ops, $control_ops );
	}

	function widget($args, $instance) {
		extract( $args );

		$facebook_page_id = 320079694731314;

		// Output
		echo $before_widget;

		?>
		  <div class="social-title">
		    <p class="small italic"><?php echo $instance['title']; ?></p>

		    <?php if (isset($instance['title_two'])) { ?>
				  <h6><?php echo $instance['title_two']; ?></h6>
		    <?php } ?>
			</div>

			<ul class="social-count-cont">
				<li><a href="https://www.pinterest.com/Homepolish/" class="tertiary" target="_blank"><span class="v1-icon-pinterest"></span><h6 class="count"><?php do_action('thb_pinFollowerCount'); ?></h6></a></li>
				<li><a href="https://instagram.com/homepolish/" class="tertiary" target="_blank"><span class="v1-icon-instagram"></span><h6 class="count"><?php do_action('thb_insFollowerCount'); ?></h6></a></li>
				<li><a href="https://www.facebook.com/Homepolish" class="tertiary" target="_blank"><span class="v1-icon-facebook"></span><h6 class="count"><?php do_action('thb_fbLikeCount', $facebook_page_id); ?></h6></a></li>
				<li><a href="https://twitter.com/homepolish" class="tertiary" target="_blank"><span class="v1-icon-twitter"></span><h6 class="count"><?php do_action('thb_twFollowerCount'); ?></h6></a></li>
			</ul>

			<div class="newsletter-subscribe-container">
				<h6>Subscribe to our newsletter</h6>

				<div class="newsletter-form-wrapper">
		      <form action="https://www.homepolish.com/newsletter_subscriptions.js" class="newsletter-signup-form" method="post" data-form-id="newsletter-subscribe-footer-sidebar">
		        <input id="form_id" name="form_id" type="hidden" value="newsletter-subscribe-footer-sidebar">
		        <input id="list_key" name="list_key" type="hidden" value="main">
		        <input class="newsletter-signup-input" name="email_address" placeholder="Your email address">
		        <input class="btn condensed" type="submit" value="Sign Up">
		      </form>
				</div>
			</div>
		<?php
		echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['title_two'] = strip_tags( $new_instance['title_two'] );

		return $instance;
	}
	// Settings form
	function form($instance) {
		/* Set up some default widget settings. */
		$defaults = array(
		'title' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'title_two' ); ?>">Title Pt. 2 (optional):</label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title_two' ); ?>" name="<?php echo $this->get_field_name( 'title_two' ); ?>" value="<?php echo $instance['title_two']; ?>" />
		</p>

		<p>Unleash the socials!</p>

    <?php
	}
}
function widget_socialnewsletter_init()
{
	register_widget('widget_socialnewsletter');
}
add_action('widgets_init', 'widget_socialnewsletter_init');

?>