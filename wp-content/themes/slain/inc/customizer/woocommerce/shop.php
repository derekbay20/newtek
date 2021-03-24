<?php
/**
 * The template for shop page
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$shop_template = $wp_customize->get_section( 'woocommerce_product_catalog' );
if($shop_template){
	$shop_template->priority = 30;
	$shop_template->title = esc_html__( 'Shop Template', 'slain' );
}

$wp_customize->add_setting(
	'slain_shop_thumbnail_size',
	array(
		'default'	=> 'slain-thumb-600x600',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	new Slain_Dropdown_Select2_Custom_Control(
		$wp_customize,
		'slain_shop_thumbnail_size',
		array(
			'type'	=> 'select',
			'priority' => 30,
			'section'	=> 'woocommerce_product_catalog',
			'label'		=> esc_html__( 'Thumbnail Size', 'slain' ),
			'choices'	=> centurylib_get_image_sizes(),
		)
	)
);

$wp_customize->add_setting(
	'slain_shop_no_of_column',
	array(
		'default'	=> '3',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_shop_no_of_column',
		array(
			'type'	=> 'number',
			'priority' => 40,
			'input_attrs' => array(
				'pattern'	=> '[0-6]',
			),
			'section'	=> 'woocommerce_product_catalog',
			'label'		=> esc_html__( 'No of column', 'slain' ),
			'description' => esc_html__( 'Please put the number between 1 to 6.', 'slain')
		)
	)
);

$wp_customize->add_setting(
	'slain_shop_no_of_products',
	array(
		'default'	=> '12',
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_shop_no_of_products',
		array(
			'type'	=> 'number',
			'priority' => 50,
			'section'	=> 'woocommerce_product_catalog',
			'label'		=> esc_html__( 'No of products', 'slain' ),
		)
	)
);