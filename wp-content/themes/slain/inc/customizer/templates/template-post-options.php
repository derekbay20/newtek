<?php
/**
 * Post Settings
 *
 * @since 1.0.0
 */

$wp_customize->get_setting( 'centurylib_related_posts_title' )->transport = 'postMessage';
$wp_customize->selective_refresh->add_partial(
	'centurylib_related_posts_title',
	array(
		'selector' => 'h2.hmc-related-title',
		'render_callback' => 'slain_customize_partial_related_title',
	)
);

$wp_customize->add_setting(
	'slain_wrapper_width_post',
	array(
		'default'	=> 'contained',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	'slain_wrapper_width_post',
	array(
		'type'	=> 'select',
		'priority' => 5,
		'section'	=> 'template_post_options',
		'label'		=> esc_html__( 'Wrapper Width', 'slain' ),
		'choices'	=> array(
			'full' => esc_html__( 'Full', 'slain' ),
			'boxed' => esc_html__( 'Boxed', 'slain' ),
			'contained' => esc_html__( 'Contained', 'slain' ),
		)
	)
);

$wp_customize->add_setting(
	'slain_sticky_sidebar_post',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_sticky_sidebar_post',
		array(
			'label'		=> esc_html__( 'Enable Sticky Sidebar', 'slain' ),
			'section' => 'template_post_options',
            'priority' => 25,
            'type'=>'checkbox',
		)
	)
);

$wp_customize->add_setting(
	'slain_enable_drop_caps_post',
	array(
		'default'		=> 'enable',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_drop_caps_post',
		array(
			'label'		=> esc_html__( 'Enable Drop Caps(First Big Letter)', 'slain' ),
			'section' => 'template_post_options',
            'priority' => 35,
            'type'=>'switch',
            'choices'=> array(
                'enable'=> esc_html__('Enable', 'slain'),
                'disable'=> esc_html__('Disable', 'slain'),
            ),
            'description' => esc_html__( 'Enable to show drop caps on your post details and disable it to show normal post.', 'slain' )
		)
	)
);

$wp_customize->add_setting(
	'slain_enable_drop_caps_post',
	array(
		'default'		=> 'enable',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_drop_caps_post',
		array(
			'label'		=> esc_html__( 'Enable Drop Caps(First Big Letter)', 'slain' ),
			'section' => 'template_post_options',
            'priority' => 35,
            'type'=>'switch',
            'choices'=> array(
                'enable'=> esc_html__('Enable', 'slain'),
                'disable'=> esc_html__('Disable', 'slain'),
            ),
            'description' => esc_html__( 'Enable to show drop caps on your post details and disable it to show normal post.', 'slain' )
		)
	)
);

$wp_customize->add_setting(
	'slain_comment_count_post',
	array(
		'default'		=> 'show',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_comment_count_post',
		array(
			'label'		=> esc_html__( 'Show Comment Counts', 'slain' ),
			'section' => 'template_post_options',
            'priority' => 65,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description' => esc_html__( 'Hide it if you want to hide comment count on your post by default its visible.', 'slain' )
		)
	)
);


$wp_customize->add_setting(
	'slain_enable_comment_post',
	array(
		'default'		=> 'show',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_comment_post',
		array(
			'label'		=> esc_html__( 'Enable Comment?', 'slain' ),
			'section' => 'template_post_options',
            'priority' => 130,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description' => esc_html__( 'Hide it if you want to hide comment on your post by default its visible.', 'slain' )
		)
	)
);