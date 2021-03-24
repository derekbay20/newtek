<?php
/*
 * Static Front Page
 */
$wp_customize->add_setting(
	'slain_static_homepage_layout',
	array(
		'default'      => 'default',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control( 
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_static_homepage_layout',
		array(
			'type'      => 'switch',
			'label'     => esc_html__( 'Homepage template options', 'slain' ),
			'description'   => esc_html__( 'Choose option for Static Home Page Template.', 'slain' ),
			'section'   => 'static_front_page',
			'choices'   => array(
				'widgetize'  => esc_html__( 'Widgetize', 'slain' ),
				'default'  => esc_html__( 'Default', 'slain' )
			),
			'priority'  => 20,
		)
	)
);
