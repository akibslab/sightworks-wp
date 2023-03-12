<?php

/**
 * SS Latest Services Menu List Widget
 *
 *
 * @author 		Theme_Junction
 * @category 	Widgets
 * @package 	TJCore/Widgets
 * @version 	1.0.0
 * @extends 	WP_Widget
 */


add_action('widgets_init', 'TJ_Latest_Services_Menu_List_Widget');
function TJ_Latest_Services_Menu_List_Widget() {
	register_widget('TJ_Latest_Services_Menu_List_Widget');
}
class TJ_Latest_Services_Menu_List_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct('tj-services-menu-list', 'SS Services Menu', array(
			'description'	=> 'SS Services Menu'
		));
	}


	public function widget($args, $instance) {

		extract($args);
		echo $before_widget;
		if ($instance['title']) :
			echo $before_title; ?>
			<?php echo apply_filters('widget_title', $instance['title']); ?>
			<?php echo $after_title; ?>
		<?php endif; ?>

		<div class="services__widget-content">
			<div class="services__link">
				<?php
				wp_nav_menu(array(
					'theme_location'    => 'service-menu',
					'menu_class'        => '',
					'container'         => '',
				));
				?>
			</div>
		</div>

		<?php echo $after_widget; ?>

	<?php
	}



	public function form($instance) {
		$title = !empty($instance['title']) ? $instance['title'] : '';
		$count = !empty($instance['count']) ? $instance['count'] : esc_html__('3', 'tjcore');
		$posts_order = !empty($instance['posts_order']) ? $instance['posts_order'] : esc_html__('DESC', 'tjcore');
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
		</p>

<?php }
}
