<?php
/**
 * Social Icons Section
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'centurylib_breadcrumbs_section', 
    array(
        'title' => esc_html__('Breadcrumbs', 'slain'),
        'panel' => 'site_additional_sections',
        'priority' => 30,
    )
);

/**
 * Breadcrumbs Layout
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_breadcrumbs_layout', 
    array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default' => 'layout1'
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize, 
        'centurylib_breadcrumbs_layout', 
        array(
            'label' => esc_html__('Breadcrumbs Layout', 'slain'),
            'section' => 'centurylib_breadcrumbs_section',
            'priority' => 10,
            'type'=>'switch',
            'choices'=> array(
                'layout1'=> esc_html__('Layout One', 'slain'),
                'layout2'=> esc_html__('Layout Two', 'slain'),
            ),
            'description'=> esc_html__('You can choose breadcrumbs layout to show website.', 'slain'),
        )
    )
);

/**
 * Breadcrumbs Background
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'centurylib_breadcrumbs_background', 
    array(
        'sanitize_callback' => 'sanitize_url',
        'default'           => ''
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'centurylib_breadcrumbs_background', 
        array(
            'type'      => 'image',
            'label'     => esc_html__('Breadcrumbs Background', 'slain'),
            'section'   => 'centurylib_breadcrumbs_section',
            'priority'  => 20,
        )
    )
);

