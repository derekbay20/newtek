<?php
/**
 * Slain General Settings panel at Theme Customizer
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
$wp_customize->add_section(
    'slain_siebar_option',
    array(
        'title'         => esc_html__( 'Sidebar Options', 'slain' ),
        'description'   => esc_html__( 'You can manage sidebar related settings here.', 'slain' ),
        'priority'      => 40,
        'panel'         => 'site_setting_options',
    )
);

$wp_customize->add_setting(
    'slain_single_sidebar_width',
    array( 
        'default'           => 270,
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control(
    'slain_single_sidebar_width',
    array(
        'type'      => 'number',
        'priority'  => 10,
        'label'     => esc_html__('Sidebar Width(Single)', 'slain' ),
        'section'   => 'slain_siebar_option',
        'description' => esc_html__( 'Please choose the sidebar width in px when your website have single sidebar.', 'slain' ),
    )
);

$wp_customize->add_setting(
    'slain_both_sidebar_width',
    array( 
        'default'           => 200,
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control(
    'slain_both_sidebar_width',
    array(
        'type'      => 'number',
        'priority'  => 10,
        'label'     => esc_html__('Sidebar Width(Both)', 'slain' ),
        'section'   => 'slain_siebar_option',
        'description' => esc_html__( 'Please choose the sidebar width in px when your website have both sidebar.', 'slain' ),
    )
);

$wp_customize->add_setting(
    'slain_left_sidebar_title_align',
    array( 
        'default'           => 'left',
        'sanitize_callback' => 'centurylib_sanitize_select',
    )
);

$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize,
        'slain_left_sidebar_title_align',
        array(
            'type'      => 'switch',
            'priority'  => 10,
            'choices'   => array(
                'left'      => esc_html__( 'Left', 'slain' ),
                'center'    => esc_html__( 'Center', 'slain' ),
                'right'     => esc_html__( 'Right', 'slain' )
            ),
            'label'     => esc_html__('Title Alignment(Left Sidebar)', 'slain' ),
            'section'   => 'slain_siebar_option',
            'description' => esc_html__( 'You can align your widget title to your sidebar by default widget title left align.', 'slain' ),
        )
    )
);

$wp_customize->add_setting(
    'slain_right_sidebar_title_align',
    array( 
        'default'           => 'left',
        'sanitize_callback' => 'centurylib_sanitize_select',
    )
);

$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize,
        'slain_right_sidebar_title_align',
        array(
            'type'      => 'switch',
            'priority'  => 10,
            'choices'   => array(
                'left'      => esc_html__( 'Left', 'slain' ),
                'center'    => esc_html__( 'Center', 'slain' ),
                'right'     => esc_html__( 'Right', 'slain' )
            ),
            'label'     => esc_html__('Title Alignment(Right Sidebar)', 'slain' ),
            'section'   => 'slain_siebar_option',
            'description' => esc_html__( 'You can align your widget title to your sidebar by default widget title left align.', 'slain' ),
        )
    )
);