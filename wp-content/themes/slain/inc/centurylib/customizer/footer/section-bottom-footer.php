<?php
/**
 * Bottom Footer
 * @package themecentury
 * @subpackage centurylib
 * @since 1.0.0
 */
$wp_customize->add_section(
	'footer_bottom_section',
	array(
		'priority'      => 30,
		'title'         => esc_html__( 'Footer Bottom', 'slain' ),
		'panel'         => 'site_footer_options',
	)
);

/**
 * Copyright Text
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'footer_copyright_text', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( '$copy $year All rights reserved.', 'slain'),
    )
);
$wp_customize->add_control(
    'footer_copyright_text', 
    array(
        'type'=>'textarea',
        'priority' => 10,
        'label' => esc_html__('Copyright Text', 'slain'),
        'section' => 'footer_bottom_section',
        'description'=> esc_html__('Enter $year to update the year automatically and $copy for the copyright symbol to display copyright text at the bottom of footer.', 'slain'),
    )
);