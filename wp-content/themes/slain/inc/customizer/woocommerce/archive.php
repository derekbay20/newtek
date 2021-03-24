<?php
/**
 * The template for archive page
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

// woocommerce global settings
$wp_customize->add_section( 
	'slain_woocommerce_archive_option' , 
	array(
		'title'		 => esc_html__( 'Archive Template', 'slain' ),
		'priority'	 => 40,
		'capability' => 'edit_theme_options',
		'panel'		=> 'woocommerce'
	)
);

$archive_display = $wp_customize->get_control( 'woocommerce_category_archive_display' );
if($archive_display){
	$archive_display->section = 'slain_woocommerce_archive_option';
}

$wp_customize->add_setting(
	'slain_archive_thumbnail_size',
	array(
		'default'	=> 'slain-thumb-600x600',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	new Slain_Dropdown_Select2_Custom_Control(
		$wp_customize,
		'slain_archive_thumbnail_size',
		array(
			'type'	=> 'select',
			'priority' => 30,
			'section'	=> 'slain_woocommerce_archive_option',
			'label'		=> esc_html__( 'Thumbnail Size', 'slain' ),
			'choices'	=> centurylib_get_image_sizes(),
		)
	)
);

$wp_customize->add_setting(
	'slain_archive_no_of_column',
	array(
		'default'	=> '3',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_archive_no_of_column',
		array(
			'type'	=> 'number',
			'priority' => 40,
			'input_attrs' => array(
				'pattern'	=> '[0-6]',
			),
			'section'	=> 'slain_woocommerce_archive_option',
			'label'		=> esc_html__( 'No of column', 'slain' ),
			'description' => esc_html__( 'Please put the number between 1 to 6.', 'slain')
		)
	)
);

$wp_customize->add_setting(
	'slain_archive_no_of_products',
	array(
		'default'	=> '12',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_archive_no_of_products',
		array(
			'type'	=> 'number',
			'priority' => 50,
			'section'	=> 'slain_woocommerce_archive_option',
			'label'		=> esc_html__( 'No of products', 'slain' ),
		)
	)
);