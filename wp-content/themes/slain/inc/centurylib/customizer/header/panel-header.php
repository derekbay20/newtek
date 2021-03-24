<?php
/*
 * Panel Header
 */
$wp_customize->add_panel(
	'site_header_panel',
	array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__('Header Options', 'slain'),
		'description'    => esc_html__('Header related settings and sections goes here. You can manage header from this panel.', 'slain'),
	)
);

require_once centurylib_file_directory( 'customizer/header/section-site-identity.php' );