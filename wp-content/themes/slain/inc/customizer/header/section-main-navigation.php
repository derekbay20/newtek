<?php
/**
 * section header main navigation
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
$wp_customize->add_section(
	'slain_header_main_navigation',
	array(
		'title'    => esc_html__( 'Main Navigation', 'slain' ),
		'priority' => 80,
		'panel'    => 'site_header_panel'
	)
);

/**
 * Show sidebar
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_main_nav_show_sidebar',
	array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_main_nav_show_sidebar',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Show Menu Sidebar', 'slain' ),
			'description' => esc_html__( 'Checked to Show sidebar option for at primary menu.', 'slain' ),
			'section'     => 'slain_header_main_navigation',
			'priority'    => 20,
		)
	)
);


$wp_customize->add_setting(
	'slain_main_nav_random_icon',
	array(
		'default'           => 0,
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_main_nav_random_icon',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Enable random Icon', 'slain' ),
			'description' => esc_html__( 'Checked to Show random icon at primary menu.', 'slain' ),
			'section'     => 'slain_header_main_navigation',
			'priority'    => 20,
		)
	)
);

/**
 * Switch option for alignment
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_main_navigation_alignment',
	array(
		'default'           => 'left',
		'sanitize_callback' => 'centurylib_sanitize_select',
	)
);
$wp_customize->add_control( 
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_main_navigation_alignment',
		array(
			'type'        => 'switch',
			'label'       => esc_html__( 'Alignment', 'slain' ),
			'description' => esc_html__( 'Navigation menu alignment on header', 'slain' ),
			'section'     => 'slain_header_main_navigation',
			'choices'     => array(
				'left' => esc_html__( 'Left', 'slain' ),
				'center' => esc_html__( 'Center', 'slain' ),
				'right' => esc_html__( 'Right', 'slain' ),
			),
			'priority'    => 20,
		)
	)
);


/**
 * Show Search icon
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_main_nav_search_icon',
	array(
		'default'           => '',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_main_nav_search_icon',
		array(
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Enable Search Icon', 'slain' ),
			'description' => esc_html__( 'Checked to Show search icon at primary menu.', 'slain' ),
			'section'     => 'slain_header_main_navigation',
			'priority'    => 20,
		)
	)
);

$wp_customize->add_setting(
	'slain_main_navigation_font_style',
	array(
		'default'           => 'center',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_main_navigation_font_style',
		array(
			'switch_type' => 'checkbox',
			'label'       => esc_html__( 'Font Style', 'slain' ),
			'description' => esc_html__( 'Navigation menu font style on header', 'slain' ),
			'section'     => 'slain_header_main_navigation',
			'choices'     => array(
				'bold' => esc_html__( 'Bold', 'slain' ),
				'italic' => esc_html__( 'Italic', 'slain' ),
				'underline' => esc_html__( 'Underline', 'slain' ),
			),
			'priority'    => 20,
		)
	)
);

$wp_customize->add_setting(
	'slain_main_navigation_font_transform',
	array(
		'default'           => 'uppercase',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 
	new WP_Customize_Control(
		$wp_customize,
		'slain_main_navigation_font_transform',
		array(
			'type' 		  => 'select',
			'label'       => esc_html__( 'Text Transform', 'slain' ),
			'description' => esc_html__( 'Navigation menu text transfom on header', 'slain' ),
			'section'     => 'slain_header_main_navigation',
			'choices'     => array(
				'none'		=> esc_html__( 'None', 'slain' ),
				'capitalize' => esc_html__( 'Capitalize', 'slain' ),
				'uppercase' => esc_html__( 'Uppercase', 'slain' ),
				'lowercase' => esc_html__( 'Lowercase', 'slain' ),
			),
			'priority'    => 20,
		)
	)
);