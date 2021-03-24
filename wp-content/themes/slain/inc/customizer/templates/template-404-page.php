<?php
/**
 * The template for 404 page
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$wp_customize->add_setting(
	'slain_wrapper_width_notfound',
	array(
		'default'	=> 'contained',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	'slain_wrapper_width_notfound',
	array(
		'type'	=> 'select',
		'priority' => 5,
		'section'	=> 'template_notfound_options',
		'label'		=> esc_html__( 'Wrapper Width', 'slain' ),
		'choices'	=> array(
			'full' => esc_html__( 'Full', 'slain' ),
			'boxed' => esc_html__( 'Boxed', 'slain' ),
			'contained' => esc_html__( 'Contained', 'slain' ),
		)
	)
);

$wp_customize->add_setting(
	'slain_sticky_sidebar_notfound',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_sticky_sidebar_notfound',
		array(
			'label'		=> esc_html__( 'Enable Sticky Sidebar', 'slain' ),
			'section' => 'template_notfound_options',
            'priority' => 20,
            'type'=>'checkbox',
		)
	)
);