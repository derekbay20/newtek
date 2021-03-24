<?php
$wp_customize->get_setting( 'footer_copyright_text' )->transport = 'postMessage';
$wp_customize->selective_refresh->add_partial( 
	'footer_copyright_text',
	array(
		'selector' => 'span.hmc-copyright-text',
		'render_callback' => 'slain_customize_partial_copyright',
	)
);

/**
 * Logo footer
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_bottom_footer_logo',
	array(
		'default'    => '',
		'sanitize_callback' => 'esc_url'
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control(
		$wp_customize,
		'slain_bottom_footer_logo',
		array(
			'label'      => esc_html__('Logo image', 'slain' ),
			'section'    => 'footer_bottom_section',
			'priority'  => 5,
		)
	)   
);

$wp_customize->add_setting(
	'slain_enable_scroll_top',
	array(
		'default'	=> 1,
		'sanitize_callback' => 'absint'
	)
);
$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_enable_scroll_top',
		array(
			'type'	=> 'checkbox',
			'priority'  => 30,
			'section'	=> 'footer_bottom_section',
			'label'		=> esc_html__( 'Enable scroll top', 'slain' ),
			'description'	=> esc_html__( 'Enable to display scroll top button at the bottom of website.', 'slain' )
		)
	)
);