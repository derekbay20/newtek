<?php
/**
 * Widget Area Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
	'slain_main_footer_section',
	array(
		'title'		=> esc_html__( 'Footer Main', 'slain' ),
		'panel'     => 'site_footer_options',
		'priority'  => 20,
	)
);

$wp_customize->add_setting(
	'enable_social_icons_footer',
	array(
		'default'	=> 0,
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	'enable_social_icons_footer',
	array(
		'type'	=> 'checkbox',
		'section'	=> 'slain_main_footer_section',
		'label'		=> esc_html__( 'Enable social icons', 'slain' ),
		'description'	=> esc_html__( 'If you enable social icons then it will be visible on the top of the footer widgets.', 'slain' )
	)
);

/**
 * Switch option for Top Header
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_footer_widget_option',
	array(
		'default' => 'show',
		'sanitize_callback' => 'centurylib_sanitize_select',
	)
);
$wp_customize->add_control( 
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_footer_widget_option',
		array(
			'type'      => 'switch',
			'label'     => esc_html__( 'Footer Widget Section', 'slain' ),
			'description'   => esc_html__( 'Show/Hide option for footer widget area section.', 'slain' ),
			'section'   => 'slain_main_footer_section',
			'choices'   => array(
				'show'  => esc_html__( 'Show', 'slain' ),
				'hide'  => esc_html__( 'Hide', 'slain' )
			),
			'priority'  => 10,
		)
	)
);

/**
 * Parallax footer
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_main_footer_background',
	array(
		'default'    => '',
		'sanitize_callback' => 'esc_url'
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'slain_main_footer_background',
		array(
			'label'      => esc_html__('Background image', 'slain' ),
			'section'    => 'slain_main_footer_section',
			'priority'  => 20,
		)
	)   
);

/**
 * Field for Image Radio
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'footer_main_no_of_area',
	array(
		'default'           => '4',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 
	new Centurylib_Customize_Imageoptions_Control(
		$wp_customize,
		'footer_main_no_of_area',
		array(
			'label'    => esc_html__( 'Footer Widget Layout', 'slain' ),
			'description' => esc_html__( 'Choose layout from available layouts', 'slain' ),
			'section'  => 'slain_main_footer_section',
			'choices'  => array(
				'4' => array(
					'label' => esc_html__( 'Columns Four', 'slain' ),
					'url'   => '%s/inc/centurylib/assets/img/grid/four-column.png'
				),
				'3' => array(
					'label' => esc_html__( 'Columns Three', 'slain' ),
					'url'   => '%s/inc/centurylib/assets/img/grid/three-column.png'
				),
				'2' => array(
					'label' => esc_html__( 'Columns Two', 'slain' ),
					'url'   => '%s/inc/centurylib/assets/img/grid/two-column.png'
				),
				'1' => array(
					'label' => esc_html__( 'Column One', 'slain' ),
					'url'   => '%s/inc/centurylib/assets/img/grid/one-column.png'
				)
			),
			'priority' => 30
		)
	)
);

