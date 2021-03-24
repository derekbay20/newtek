<?php
/**
 * The template for default page post type
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */


// woocommerce global settings
$wp_customize->add_section( 
	'slain_woocommerce_global_settings' , 
	array(
		'title'		 => esc_html__( 'General Settings', 'slain' ),
		'priority'	 => 20,
		'capability' => 'edit_theme_options',
		'panel'		=> 'woocommerce'
	)
);

$wp_customize->add_setting(
	'slain_woocommerce_global_width',
	array(
		'default'	=> 'boxed',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control(
	'slain_woocommerce_global_width',
	array(
		'type'	=> 'select',
		'priority' => 10,
		'section'	=> 'slain_woocommerce_global_settings',
		'label'		=> esc_html__( 'Global Width', 'slain' ),
		'choices'	=> array(
			'full' => esc_html__( 'Full', 'slain' ),
			'boxed' => esc_html__( 'Boxed', 'slain' ),
			'contained' => esc_html__( 'Contained', 'slain' ),
		)
	)
);

$thumbnail_size = $wp_customize->get_control( 'woocommerce_thumbnail_cropping' );
if($thumbnail_size){
	$thumbnail_size->priority = 20;
	$thumbnail_size->section = 'slain_woocommerce_global_settings';
}