<?php
/**
 * @package themecentury
 * @package Slain
 * @since 1.0.0
 */

// Slider Type Section.
$wp_customize->add_section(
	'slain_header_settings',
	array(
		'title'      => esc_html__( 'Header Settings', 'slain' ),
		'priority'   => 80,
		'capability' => 'edit_theme_options',
		'panel'      => 'site_header_panel',
	)
);


$wp_customize->add_setting(
	'slain_header_items_position',
	array(
		'default' => 'media,top,branding,navigation',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	new Slain_Pill_Checkbox_Custom_Control(
		$wp_customize,
		'slain_header_items_position',
		array(
			'input_attrs' => array(
				'sortable' => true,
				'fullwidth' => true
			),
			'choices' => array(
				'media' => esc_html__( 'Header Media', 'slain' ),
				'top' => esc_html__( 'Top Header', 'slain' ),
				'branding' => esc_html__( 'Branding', 'slain'  ),
				'navigation' => esc_html__( 'Navigation', 'slain'  ),
			),
			'label'          => esc_html__( 'Sortable headers section', 'slain' ),
			'section'			=> 'slain_header_settings'
		)
	)
);

$wp_customize->add_setting(
	'slain_global_header_width',
	array(
		'default' => 'contained',
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_global_header_width',
		array(
			'type'			=> 'select',
			'label'          => esc_html__( 'Header Width', 'slain' ),
			'section'			=> 'slain_header_settings',
			'choices' => array(
				'boxed' => esc_html__( 'Boxed', 'slain' ),
				'contained' => esc_html__( 'Contained', 'slain' ),
				'full' => esc_html__( 'Full', 'slain'  )
			),
		)
	)
);


$wp_customize->add_setting(
    'slain_merge_top_main_menu',
    array(
        'default' => 0,
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Slain_Toggle_Switch_Custom_control(
        $wp_customize,
        'slain_merge_top_main_menu',
        array(
            'priority'    => 30,
            'label' => esc_html__( 'Merge top and main menus', 'slain' ),
            'section' => 'slain_header_settings',
            'type' => 'checkbox',
            'description'	=> esc_html__( 'Checked to merge main and top menu on mobile device.', 'slain' ),
        )
    )
);