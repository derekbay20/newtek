<?php

require_once slain_file_directory( 'inc/customizer/upsell/upsell-section.php' );

$wp_customize->register_section_type( 'Slain_Customize_Upsell_Section' );

// Register sections.
$wp_customize->add_section(
	new Slain_Customize_Upsell_Section(
		$wp_customize,
		'theme_upsell',
		array(
			'title'    => esc_html__( 'Slain Pro', 'slain' ),
			'pro_text' => esc_html__( 'View Pro', 'slain' ),
			'pro_url'  => 'https://themecentury.com/downloads/slain-pro-premium-wordpress-plugin/?ref=slain-upsell-button',
			'priority' => 1,
		)
	)
);