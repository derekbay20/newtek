<?php
/**
 * Title and tagline checkbox
 *
 * @since 1.0.0
 */
$title_tagline = $wp_customize->get_section('title_tagline');
if($title_tagline):
    $title_tagline->priority = 70;
endif;

$wp_customize->add_setting(
    'slain_header_logo_width',
    array(
        'default' => '200',
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'slain_header_logo_width',
        array(
            'priority'    => 8,
            'label' => esc_html__( 'Logo Width', 'slain' ),
            'section' => 'title_tagline',
            'type' => 'number',
            'description' => esc_html__( 'Please set your logo width to display it on header branding.', 'slain' ),
        )
    )
);

$wp_customize->add_setting(
    'slain_font_families[site_title]',
    array(
        'default' => '200',
        'sanitize_callback' => 'centurylib_sanitize_select'
    )
);
$wp_customize->add_control(
    new Slain_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'slain_font_families[site_title]',
        array(
            'priority'    => 8,
            'label' => esc_html__( 'Site title font family', 'slain' ),
            'section' => 'title_tagline',
            'type' => 'select',
            'choices' => slain_google_fontname_list(),
            'description' => esc_html__( 'Please set font family for your website title display on header branding.', 'slain' ),
        )
    )
);

$wp_customize->add_setting(
    'slain_header_branding_option',
    array(
        'default' => 'sidebar',
        'sanitize_callback' => 'centurylib_sanitize_select'
    )
);
$branding_choices = array(
    '' => esc_html__( 'None', 'slain' ),
    'sidebar' => esc_html__( 'Widgets', 'slain' ),
);
if(class_exists( 'WooCommerce' )){
    $branding_choices['ecommerce'] = esc_html__( 'eCommerce', 'slain' );
}
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize,
        'slain_header_branding_option',
        array(
            'priority'    => 70,
            'label' => esc_html__( 'Show section on Brands area.', 'slain' ),
            'section' => 'title_tagline',
            'type' => 'switch',
            'choices' => $branding_choices
        )
    )
);

$wp_customize->add_setting(
    'slain_header_branding_align',
    array(
        'default' => 'left',
        'sanitize_callback' => 'centurylib_sanitize_select'
    )
);
$wp_customize->add_control(
    new Centurylib_Customize_Switch_Control(
        $wp_customize,
        'slain_header_branding_align',
        array(
            'priority'    => 80,
            'label' => esc_html__( 'Branding alignment', 'slain' ),
            'section' => 'title_tagline',
            'type' => 'switch',
            'choices' => array(
                'left' => esc_html__( 'Left', 'slain' ),
                'center' => esc_html__( 'Center', 'slain' ),
                'right' => esc_html__( 'Right', 'slain' ),
            ),
        )
    )
);

$wp_customize->add_setting(
    'slain_branding_background_image',
    array(
        'default' => '',
        'sanitize_callback' => 'sanitize_url'
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'slain_branding_background_image',
        array(
            'priority'    => 90,
            'label' => esc_html__( 'Background Image', 'slain' ),
            'section' => 'title_tagline'
        )
    )
);

$wp_customize->add_setting(
    'slain_branding_background_size',
    array(
        'default' => 'cover',
        'sanitize_callback' => 'centurylib_sanitize_select'
    )
);
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'slain_branding_background_size',
        array(
            'priority'    => 90,
            'label' => esc_html__( 'Background Size', 'slain' ),
            'section' => 'title_tagline',
            'type'    => 'select',
            'choices' => array(
                'cover' => esc_html__( 'Cover', 'slain' ),
                'initial' => esc_html__( 'Pattern', 'slain' ),
            )
        )
    )
);


$wp_customize->add_setting(
    'slain_enable_parallax_image',
    array(
        'default' => 1,
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Slain_Toggle_Switch_Custom_control(
        $wp_customize,
        'slain_enable_parallax_image',
        array(
            'priority'    => 90,
            'label' => esc_html__( 'Enable Parallax', 'slain' ),
            'section' => 'title_tagline',
            'type' => 'checkbox',
        )
    )
);


$wp_customize->add_setting(
    'slain_branding_social_icons',
    array(
        'default' => 0,
        'sanitize_callback' => 'absint'
    )
);
$wp_customize->add_control(
    new Slain_Toggle_Switch_Custom_control(
        $wp_customize,
        'slain_branding_social_icons',
        array(
            'priority'    => 50,
            'label' => esc_html__( 'Display Social Icons', 'slain' ),
            'section' => 'title_tagline',
            'type' => 'checkbox',
        )
    )
);