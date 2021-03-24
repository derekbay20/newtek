<?php
/**
 * Slain Theme Customizer
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

/*
** Featured Slider =====
*/
$wp_customize->add_section(
    'slain_featured_slider_section',
    array(
        'title'         => esc_html__( 'Featured Slider', 'slain' ),
        'description'   => esc_html__( 'Choose a site to display your website more effectively.', 'slain' ),
        'priority'      => 10,
        'panel'         => 'site_additional_sections',
    )
);

$wp_customize->add_setting(
	'slain_featured_slider_postby',
	array(
		'default'	=> 'all',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_featured_slider_postby',
		array(
			'type'		=> 'select',
			'priority'	=> 10,
			'transport'	=> 'refresh',
			'label'		=> esc_html__( 'Display Posts', 'slain' ),
			'section'		=> 'slain_featured_slider_section',
			'choices'	=> array(
				'all'		=> esc_html__( 'All', 'slain' ),
				'category'	=> esc_html__( 'Posts by Categories', 'slain' )
			)
		)
	)
);


$wp_customize->add_setting(
	'slain_featured_slider_categories',
	array(
		'default'	=> 'all',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	new Slain_Dropdown_Select2_Custom_Control(
		$wp_customize,
		'slain_featured_slider_categories',
		array(
			'type'		=> 'select',
			'priority'	=> 20,
			'transport'	=> 'refresh',
			'label'		=> esc_html__( 'Display Posts by Categories', 'slain' ),
			'section'		=> 'slain_featured_slider_section',
			'choices'	=> centurylib_term_list(),
			'input_attrs'	=> array(
				'multiselect' => true
			)
		)
	)
);

$wp_customize->add_setting(
	'slain_featured_slider_perpage',
	array(
		'default'	=> '3',
		'sanitize_callback' => 'absint'
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_featured_slider_perpage',
		array(
			'type'		=> 'number',
			'priority'	=> 30,
			'transport'	=> 'refresh',
			'label'		=> esc_html__( 'No of slide', 'slain' ),
			'section'		=> 'slain_featured_slider_section'
		)
	)
);

$wp_customize->add_setting(
	'slain_featured_slider_width',
	array(
		'default'	=> 'boxed',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_featured_slider_width',
		array(
			'type'		=> 'select',
			'priority'	=> 40,
			'transport'	=> 'refresh',
			'label'		=> esc_html__( 'Width', 'slain' ),
			'section'		=> 'slain_featured_slider_section',
			'choices'		=> array(
				'full' => esc_html__( 'Full', 'slain' ),
				'boxed' => esc_html__( 'Boxed', 'slain' ),
				'contained' => esc_html__( 'Contained', 'slain' )
			)
		)
	)
);

$wp_customize->add_setting(
	'slain_featured_slider_arrow',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_featured_slider_arrow',
		array(
			'label'		=> esc_html__( 'Enable Arrow', 'slain' ),
			'section' => 'slain_featured_slider_section',
            'priority' => 50,
            'type'=>'checkbox',
		)
	)
);

$wp_customize->add_setting(
	'slain_featured_slider_dots',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_featured_slider_dots',
		array(
			'label'		=> esc_html__( 'Enable Dots', 'slain' ),
			'section' => 'slain_featured_slider_section',
            'priority' => 60,
            'type'=>'checkbox',
		)
	)
);


$wp_customize->add_setting(
	'slain_featured_slider_onmob',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_featured_slider_onmob',
		array(
			'label'		=> esc_html__( 'Visible on mobile?', 'slain' ),
			'section' => 'slain_featured_slider_section',
            'priority' => 70,
            'type'=>'checkbox',
		)
	)
);
