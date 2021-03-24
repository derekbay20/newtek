<?php
/**
 * Widget Area Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
	'slain_footer_settings_section',
	array(
		'title'		=> esc_html__( 'Footer Settings', 'slain' ),
		'panel'     => 'site_footer_options',
		'priority'  => 1,
	)
);

$wp_customize->add_setting(
	'slain_footer_wrapper_width',
	array(
		'default'	=> 'contained',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	'slain_footer_wrapper_width',
	array(
		'type'	=> 'select',
		'section'	=> 'slain_footer_settings_section',
		'label'		=> esc_html__( 'Footer Width', 'slain' ),
		'choices'	=> array(
			'full' => esc_html__( 'Full', 'slain' ),
			'boxed' => esc_html__( 'Boxed', 'slain' ),
			'contained' => esc_html__( 'Contained', 'slain' ),
		)
	)
);