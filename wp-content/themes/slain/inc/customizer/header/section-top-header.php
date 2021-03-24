<?php
/**
 * Slain Top Header Section
 */

/**
 * Top Header Section
 */
$wp_customize->add_section(
	'slain_top_header_section',
	array(
		'title'    => esc_html__( 'Top Header', 'slain' ),
		'priority' => 30,
		'panel'    => 'site_header_panel'
	)
);

/**
 * Switch option for Social Icon
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_top_social_option',
	array(
		'default'           => 'show',
		'sanitize_callback' => 'centurylib_sanitize_select',
	)
);
$wp_customize->add_control( 
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_top_social_option',
		array(
			'type'        => 'switch',
			'label'       => esc_html__( 'Social Icons', 'slain' ),
			'description' => esc_html__( 'Show/Hide option for social media icons at top header section.', 'slain' ),
			'section'     => 'slain_top_header_section',
			'choices'     => array(
				'show' => esc_html__( 'Show', 'slain' ),
				'hide' => esc_html__( 'Hide', 'slain' )
			),
			'priority'    => 30,
		)
	)
);
