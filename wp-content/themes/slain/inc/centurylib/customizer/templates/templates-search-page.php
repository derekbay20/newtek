<?php
/**
 * Template Search
 * @package themecentury
 * @subpackage centurylib
 * @since 1.0.0
 */
$wp_customize->add_section(
    'template_search_options', 
    array(
        'title' => esc_html__('Search Options', 'slain'),
        'panel' => 'site_template_options',
        'priority' => 60,
    )
);

/**
 * Enable Breadcrumbs
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_enable_breadcrumbs_search', array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default'           => 'enable',
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize, 
        'centurylib_enable_breadcrumbs_search', 
        array(
            'label' => esc_html__('Enable Breadcrumbs?', 'slain'),
            'section' => 'template_search_options',
            'priority' => 10,
            'type'=>'switch',
            'choices'=> array(
                'enable'=> esc_html__('Enable', 'slain'),
                'disable'=> esc_html__('Disable', 'slain'),
            ),
            'description'=> esc_html__('You can enable breadcrumbs to show before search page.', 'slain'),
        )
    )
);

/**
 * Sidebar Layouts
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_default_search_sidebar',
    array(
        'default'           => 'right_sidebar',
        'sanitize_callback' => 'centurylib_sanitize_select',
    )
);
$wp_customize->add_control( 
    new Centurylib_Customize_Imageoptions_Control(
        $wp_customize,
        'centurylib_default_search_sidebar',
        array(
            'label'    => esc_html__( 'Sidebar Layout', 'slain' ),
            'description' => esc_html__( 'Choose sidebar from available layouts', 'slain' ),
            'section'  => 'template_search_options',
            'choices'  => array(
                'left_sidebar' => array(
                    'label' => esc_html__( 'Left Sidebar', 'slain' ),
                    'url'   => '%s/inc/centurylib/assets/img/sidebars/left-sidebar.png'
                ),
                'right_sidebar' => array(
                    'label' => esc_html__( 'Right Sidebar', 'slain' ),
                    'url'   => '%s/inc/centurylib/assets/img/sidebars/right-sidebar.png'
                ),
                'no_sidebar' => array(
                    'label' => esc_html__( 'No Sidebar', 'slain' ),
                    'url'   => '%s/inc/centurylib/assets/img/sidebars/no-sidebar.png'
                ),
                'no_sidebar_center' => array(
                    'label' => esc_html__( 'No Sidebar Center', 'slain' ),
                    'url'   => '%s/inc/centurylib/assets/img/sidebars/no-sidebar-center.png'
                ),
                'both_sidebar' => array(
                    'label' => esc_html__( 'Both Sidebar', 'slain' ),
                    'url'   => '%s/inc/centurylib/assets/img/sidebars/both-sidebar.png'
                )
            ),
            'priority' => 20
        )
    )
);

/**
 * Enable Featured Image
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_enable_featured_image_search', array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default'           => 'show',
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize, 
        'centurylib_enable_featured_image_search', 
        array(
            'label' => esc_html__('Show Featured Image?', 'slain'),
            'section' => 'template_search_options',
            'priority' => 30,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description'=> esc_html__('If you can show featured image on search page check on show button.', 'slain'),
        )
    )
);

/**
 * Enable Categories
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_enable_categories_search', array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default'           => 'show',
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize, 
        'centurylib_enable_categories_search', 
        array(
            'label' => esc_html__('Show Categories?', 'slain'),
            'section' => 'template_search_options',
            'priority' => 40,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description'=> esc_html__('If you check to show button show categories list on posts.', 'slain'),
        )
    )
);

$wp_customize->add_setting(
    'centurylib_enable_date_search', array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default'           => 'show',
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize, 
        'centurylib_enable_date_search', 
        array(
            'label' => esc_html__('Show date on post?', 'slain'),
            'section' => 'template_search_options',
            'priority' => 50,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description'=> esc_html__('If you check to show button show date on posts.', 'slain'),
        )
    )
);

/**
 * Read More Text Search 
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_readmore_text_search', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__('Read More...', 'slain'),
    )
);
$wp_customize->add_control(
    'centurylib_readmore_text_search', 
    array(
        'type'=>'text',
        'priority' => 30,
        'label' => esc_html__('Readmore Text', 'slain'),
        'section' => 'template_search_options',
        'description'=> esc_html__('If you can show featured image on search page check on show button.', 'slain'),
    )
);

/**
 * Short Description Length 
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_excerpt_length_search', array(
        'sanitize_callback' => 'absint',
        'default'           => 50,
    )
);
$wp_customize->add_control(
    'centurylib_excerpt_length_search', 
    array(
        'type'=>'number',
        'priority' => 40,
        'label' => esc_html__('Description Length', 'slain'),
        'section' => 'template_search_options',
        'description'=> esc_html__('Please choose no of character to display description length in search page.', 'slain'),
    )
);

/**
 * Enable Post Date
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_enable_date_search', array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default'           => 'show',
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize, 
        'centurylib_enable_date_search', 
        array(
            'label' => esc_html__('Show date on posts?', 'slain'),
            'section' => 'template_search_options',
            'priority' => 50,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description'=> esc_html__('If you can show post date on search page please check show button.', 'slain'),
        )
    )
);

/**
 * Enable Author Name
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_enable_authorname_search', 
    array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default'           => 'show',
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize, 
        'centurylib_enable_authorname_search', 
        array(
            'label' => esc_html__('Show author name on posts?', 'slain'),
            'section' => 'template_search_options',
            'priority' => 60,
            'type'=>'switch',
            'choices'=> array(
                'show'=> esc_html__('Show', 'slain'),
                'hide'=> esc_html__('Hide', 'slain'),
            ),
            'description'=> esc_html__('If you can show author name on search page please check show button.', 'slain'),
        )
    )
);
