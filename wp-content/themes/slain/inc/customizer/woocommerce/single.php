<?php
/**
 * The template for product details page
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

// woocommerce global settings
$wp_customize->add_section( 
	'slain_woocommerce_single_option' , 
	array(
		'title'		 => esc_html__( 'Product Details', 'slain' ),
		'priority'	 => 40,
		'capability' => 'edit_theme_options',
		'panel'		=> 'woocommerce'
	)
);

$wp_customize->add_setting(
	'slain_single_thumbnail_size',
	array(
		'default'	=> 'slain-thumb-600x600',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	new Slain_Dropdown_Select2_Custom_Control(
		$wp_customize,
		'slain_single_thumbnail_size',
		array(
			'type'	=> 'select',
			'priority' => 20,
			'section'	=> 'slain_woocommerce_single_option',
			'label'		=> esc_html__( 'Thumbnail Size', 'slain' ),
			'choices'	=> centurylib_get_image_sizes(),
		)
	)
);