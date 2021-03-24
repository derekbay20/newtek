<?php
/**
 * Section Preloader Settings
 *
 * @since 1.0.0
 */
$wp_customize->add_section(
    'slain_wesbsite_preloader',
    array(
        'title'         => esc_html__( 'Preloader Options', 'slain' ),
        'description'   => esc_html__( 'Choose a Image For Website Preloader', 'slain' ),
        'priority'      => 30,
        'panel'         => 'site_setting_options',
    )
);

$wp_customize->add_setting(
    'slain_enable_preloader',
    array( 
        'default'           => '',
        'sanitize_callback' => 'absint',
    )
);

$wp_customize->add_control(
    new Slain_Toggle_Switch_Custom_control(
        $wp_customize,
        'slain_enable_preloader',
        array(
            'priority'      => 10,
            'type'      => 'checkbox',
            'label'      => esc_html__('Enable preloader', 'slain' ),
           'section'    => 'slain_wesbsite_preloader',
           'settings'   => 'slain_enable_preloader',
       )  
    )
);

