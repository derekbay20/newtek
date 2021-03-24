<?php
/**
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
 if(!function_exists( 'slain_elementor_wordpress_widgets' ) ):
	// Pagination
	function slain_elementor_wordpress_widgets($widget_args, $elementor_class ) {

		$instance = $elementor_class->get_widget_instance();
		$widget_args['before_title'] = '<div class="widget-title"><h2><span class="title-wrapper">';
		$widget_args['after_title'] = '</span></h2></div>';
		$widget_args['before_widget'] = '<section class="slain-widget '.esc_attr($instance->widget_options['classname']).'">';
		$widget_args['after_widget'] = '</section>';
		return $widget_args;

	}

endif;

add_filter( 'elementor/widgets/wordpress/widget_args', 'slain_elementor_wordpress_widgets', 10, 2 );
