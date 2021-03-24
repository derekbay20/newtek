<?php
/**
 * Section Preloader Settings
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'slain_general_options',
    array(
        'title'         => esc_html__( 'General Options', 'slain' ),
        'description'   => esc_html__( 'You can manage general options here.', 'slain' ),
        'priority'      => 10,
        'panel'         => 'site_setting_options',
    )
);

$wp_customize->add_setting(
	'slain_related_posts_onmob',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_related_posts_onmob',
		array(
			'label'		=> esc_html__( 'Visible on mobile?', 'slain' ),
			'section' => 'slain_general_options',
            'priority' => 10,
            'type'=>'checkbox',
            'description'	=> esc_html__( 'You can manage related post visibility on mobile device', 'slain' )
		)
	)
);
