<?php
/**
 * Color option for theme
 *
 * @since 1.0.0
 */

$wp_customize->add_setting(
    'slain_content_accent_color',
    array(
        'default'     => '#00a9ff',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control(
        $wp_customize,
        'slain_content_accent_color',
        array(
            'label'      => esc_html__( 'Accent', 'slain' ),
            'section'    => 'colors',
            'priority'   => 10
        )
    )
);

$wp_customize->add_setting(
    'slain_header_hover_text_color',
    array(
        'default'     => '#111111',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control(
        $wp_customize,
        'slain_header_hover_text_color',
        array(
            'label'      => esc_html__( 'Header Text Hover Color', 'slain' ),
            'section'    => 'colors',
            'priority'   => 20
        )
    )
);


$wp_customize->add_setting(
    'slain_branding_background_color',
    array(
        'default'     => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control(
        $wp_customize,
        'slain_branding_background_color',
        array(
            'label'      => esc_html__( 'Branding Background Color', 'slain' ),
            'section'    => 'colors',
            'priority'   => 30
        )
    )
);

$wp_customize->add_setting(
    'slain_content_background_color',
    array(
        'default'     => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control(
        $wp_customize,
        'slain_content_background_color',
        array(
            'label'      => esc_html__( 'Content Background Color', 'slain' ),
            'section'    => 'colors',
            'priority'   => 40
        )
    )
);
