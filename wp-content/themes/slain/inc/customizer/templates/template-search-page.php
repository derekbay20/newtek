<?php
/**
 * Archive Settings
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
	'slain_wrapper_width_search',
	array(
		'default'	=> 'contained',
		'sanitize_callback' => 'centurylib_sanitize_select'
	)
);
$wp_customize->add_control(
	'slain_wrapper_width_search',
	array(
		'type'	=> 'select',
		'priority' => 5,
		'section'	=> 'template_search_options',
		'label'		=> esc_html__( 'Wrapper Width', 'slain' ),
		'choices'	=> array(
			'full' => esc_html__( 'Full', 'slain' ),
			'boxed' => esc_html__( 'Boxed', 'slain' ),
			'contained' => esc_html__( 'Contained', 'slain' ),
		)
	)
);

$wp_customize->add_setting(
	'slain_sticky_sidebar_search',
	array(
		'default'		=> '1',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_sticky_sidebar_search',
		array(
			'label'		=> esc_html__( 'Enable Sticky Sidebar', 'slain' ),
			'section' => 'template_search_options',
            'priority' => 20,
            'type'=>'checkbox',
		)
	)
);

$wp_customize->add_setting(
	'slain_full_first_search',
	array(
		'default'           => '1',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( 
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_full_first_search',
		array(
			'label'    => esc_html__( 'Full width first post?', 'slain' ),
			'description' => esc_html__( 'Checked to enable full width for first post on search page.', 'slain' ),
			'section'  => 'template_search_options',
			'priority' => 20
		)
	)
);

/**
 * Image Radio field for search layout
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
	'slain_content_layout_search',
	array(
		'default'           => 'list',
		'sanitize_callback' => 'sanitize_key',
	)
);
$wp_customize->add_control( 
	new Centurylib_Customize_Imageoptions_Control(
		$wp_customize,
		'slain_content_layout_search',
		array(
			'label'    => esc_html__( 'Archive Layouts', 'slain' ),
			'description' => esc_html__( 'Choose layout from available layouts', 'slain' ),
			'section'  => 'template_search_options',
			'choices'  => array(
				'full' => array(
					'label' => esc_html__( 'Full', 'slain' ),
					'url'   => '%s/inc/centurylib/assets/img/layouts/layout6.png'
				),
				'grid' => array(
					'label' => esc_html__( 'Grid', 'slain' ),
					'url'   => '%s/inc/centurylib/assets/img/layouts/layout5.png'
				),
				'list' => array(
					'label' => esc_html__( 'List', 'slain' ),
					'url'   => '%s/assets/img/layout-list.png'
				),
			),
			'priority' => 20
		)
	)
);

$wp_customize->add_setting(
	'slain_enable_drop_caps_search',
	array(
		'default'		=> 'disable',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_drop_caps_search',
		array(
			'label'		=> esc_html__( 'Enable Drop Caps(First Big Letter)', 'slain' ),
			'section' => 'template_search_options',
            'priority' => 35,
            'type'=>'switch',
            'choices'=> array(
                'enable'=> esc_html__('Enable', 'slain'),
                'disable'=> esc_html__('Disable', 'slain'),
            ),
            'description' => esc_html__( 'Enable to show drop caps on your search page and disable it to show normal post.', 'slain' )
		)
	)
);

$wp_customize->add_setting(
	'slain_enable_comment_count_search',
	array(
		'default'		=> 'show',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_enable_comment_count_search',
		array(
			'label'		=> esc_html__( 'Show Comment Counts', 'slain' ),
			'section' => 'template_search_options',
            'priority' => 65,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description' => esc_html__( 'Hide it if you want to hide comment count on your post.', 'slain' )
		)
	)
);

$wp_customize->add_setting(
	'slain_post_description_search',
	array(
		'default'		=> 'excerpt',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_post_description_search',
		array(
			'label'		=> esc_html__( 'Post Description', 'slain' ),
			'section' => 'template_search_options',
            'priority' => 65,
            'type'=>'switch',
            'choices'=> array(
                'none'=> esc_html__('None', 'slain'),
                'excerpt'=> esc_html__('Excerpt', 'slain'),
                'content'=> esc_html__('Content', 'slain'),
            ),
            'description' => esc_html__( 'Hide it if you want to hide comment count on your post.', 'slain' )
		)
	)
);


$wp_customize->add_setting(
	'slain_enable_related_search',
	array(
		'default'		=> '0',
		'sanitize_callback'		=> 'absint'
	),
);

$wp_customize->add_control(
	new Slain_Toggle_Switch_Custom_control(
		$wp_customize,
		'slain_enable_related_search',
		array(
			'label'		=> esc_html__( 'Enable Related Posts', 'slain' ),
			'section' => 'template_search_options',
            'priority' => 70,
            'type'=>'checkbox',
		)
	)
);

$wp_customize->add_setting(
	'slain_related_title_search',
	array(
		'default'		=> esc_html__( 'You may also like', 'slain' ),
		'sanitize_callback'		=> 'sanitize_text_field'
	),
);
$wp_customize->add_control(
	'slain_related_title_search',
	array(
		'label'		=> esc_html__( 'Related Posts title', 'slain' ),
		'section' => 'template_search_options',
        'priority' => 90,
        'type'=>'text',
	)
);

$wp_customize->add_setting(
	'slain_related_from_search',
	array(
		'default'		=> 'category',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'slain_related_from_search',
		array(
			'label'		=> esc_html__( 'Related Posts from', 'slain' ),
			'section' => 'template_search_options',
            'priority' => 100,
            'type'=>'select',
            'choices'=> centurylib_taxonomy_list( 'post' )
		)
	)
);

$wp_customize->add_setting(
	'slain_pagination_layout_search',
	array(
		'default'		=> 'default',
		'sanitize_callback'		=> 'centurylib_sanitize_select'
	),
);

$wp_customize->add_control(
	new Centurylib_Customize_Switch_Control(
		$wp_customize,
		'slain_pagination_layout_search',
		array(
			'label'		=> esc_html__( 'Pagination Layout', 'slain' ),
			'section' => 'template_search_options',
            'priority' => 100,
            'type'=>'select',
            'choices'=> array(
            	'default' => esc_html__( 'Default', 'slain' ),
            	'numeric' => esc_html__( 'Numeric', 'slain' ),
            )
		)
	)
);

$wp_customize->get_setting( 'centurylib_readmore_text_search' )->transport = 'postMessage';
$wp_customize->selective_refresh->add_partial( 
	'centurylib_readmore_text_search',
	array(
		'selector' => '.hmc-search-more > a',
		'render_callback' => 'slain_customize_partial_search_more',
	)
);
