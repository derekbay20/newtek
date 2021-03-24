<?php
/**
 * Page Settings
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
	'slain_wrapper_width_page',
	array(
		'default'	=> 'contained',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	'slain_wrapper_width_page',
	array(
		'type'	=> 'select',
		'priority' => 5,
		'section'	=> 'template_page_options',
		'label'		=> esc_html__( 'Wrapper Width', 'slain' ),
		'choices'	=> array(
			'full' => esc_html__( 'Full', 'slain' ),
			'boxed' => esc_html__( 'Boxed', 'slain' ),
			'contained' => esc_html__( 'Contained', 'slain' ),
		)
	)
);

$wp_customize->add_setting(
	'slain_sticky_sidebar_page',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_sticky_sidebar_page',
		array(
			'label'		=> esc_html__( 'Enable Sticky Sidebar', 'slain' ),
			'section' => 'template_page_options',
            'priority' => 25,
            'type'=>'checkbox',
		)
	)
);

$wp_customize->add_setting(
	'slain_enable_drop_caps_page',
	array(
		'default'		=> 'enable',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_drop_caps_page',
		array(
			'label'		=> esc_html__( 'Enable Drop Caps(First Big Letter)', 'slain' ),
			'section' => 'template_page_options',
            'priority' => 35,
            'type'=>'switch',
            'choices'=> array(
                'enable'=> esc_html__('Enable', 'slain'),
                'disable'=> esc_html__('Disable', 'slain'),
            ),
            'description' => esc_html__( 'Enable to show drop caps on your page details and disable it to show normal page.', 'slain' )
		)
	)
);

$wp_customize->add_setting(
	'slain_enable_drop_caps_page',
	array(
		'default'		=> 'enable',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_drop_caps_page',
		array(
			'label'		=> esc_html__( 'Enable Drop Caps(First Big Letter)', 'slain' ),
			'section' => 'template_page_options',
            'priority' => 35,
            'type'=>'switch',
            'choices'=> array(
                'enable'=> esc_html__('Enable', 'slain'),
                'disable'=> esc_html__('Disable', 'slain'),
            ),
            'description' => esc_html__( 'Enable to show drop caps on your page details and disable it to show normal page.', 'slain' )
		)
	)
);

$wp_customize->add_setting(
	'slain_comment_count_page',
	array(
		'default'		=> 'show',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_comment_count_page',
		array(
			'label'		=> esc_html__( 'Show Comment Counts', 'slain' ),
			'section' => 'template_page_options',
            'priority' => 65,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description' => esc_html__( 'Hide it if you want to hide comment count on your page by default its visible.', 'slain' )
		)
	)
);

$wp_customize->add_setting(
	'slain_enable_comment_page',
	array(
		'default'		=> 'hide',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_comment_page',
		array(
			'label'		=> esc_html__( 'Enable Comment?', 'slain' ),
			'section' => 'template_page_options',
            'priority' => 80,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description' => esc_html__( 'Hide it if you want to hide comment on your page by default its hidden.', 'slain' )
		)
	)
);