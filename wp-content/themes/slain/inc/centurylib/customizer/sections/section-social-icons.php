<?php
/**
 * Social Icons Section
 * @package themecentury
 * @subpackage centurylib
 * @since 1.0.0
 */
$wp_customize->add_section(
    'social_icons_section', 
    array(
        'title' => esc_html__('Social Icons', 'slain'),
        'panel' => 'site_additional_sections',
        'priority' => 10,
        'description' => esc_html__('Social media icons to display sidebar and widget from here.', 'slain'),
    )
);

/**
 * Repeater field for social media icons
 *
 * @since 1.0.0
 */
$wp_customize->add_setting(
    'social_media_icons', array(
        'sanitize_callback' => 'centurylib_sanitize_repeater_data',
        'default' => json_encode(
            array(
                array(
                    'icon_class' => 'fa-facebook-f',
                    'icon_url' => '',
                    'icon_color' => '',
                    'icon_title' => '',
                )
            )
        )
    )
);
$wp_customize->add_control(
    new Centurylib_Customizer_Repeater_Control(
        $wp_customize, 
        'social_media_icons', 
        array(
            'label' => esc_html__('Social Media Icons', 'slain'),
            'section' => 'social_icons_section',
            'settings' => 'social_media_icons',
            'priority' => 10,
            'add_row_label' => esc_html__('Add Icon', 'slain'),
            'wraper_item_label' => esc_html__('Social Media Icon', 'slain'),
            'description' => esc_html__('Social media icons for sharing article page and posts.', 'slain'),
            
        ), 
        array(
            'icon_class' => array(
                'type' => 'icons',
                'label' => esc_html__('Social Media Icon', 'slain'),
                'description' => esc_html__('Choose social media icon.', 'slain')
            ),
            'icon_url' => array(
                'type' => 'url',
                'label' => esc_html__('Social Icon Url', 'slain'),
                'description' => esc_html__('Enter social media url.', 'slain')
            ),
            'icon_color' => array(
                'type' => 'color',
                'default' => '#214d74',
                'label' => esc_html__('Icon Color', 'slain'),
                'description' => esc_html__('Choose social media icon color.', 'slain')
            ),
            'icon_title' => array(
                'type' => 'text',
                'default' => '',
                'label' => esc_html__('Icon Title', 'slain'),
                'description' => esc_html__('Enter your social media icon title here.', 'slain')
            ),
        )
    )
);

$wp_customize->add_setting(
    'social_media_target', 
    array(
        'sanitize_callback' => 'centurylib_sanitize_select',
        'default' => '_blank'
    )
);

$wp_customize->add_control(
    'social_media_target', 
        array(
            'label' => esc_html__('Social Media Target', 'slain'),
            'section' => 'social_icons_section',
            'priority' => 20,
            'type'     => 'select',
            'choices'     => array(
                '_slef'     => esc_html__( 'Open with same tab', 'slain' ),
                '_blank'     => esc_html__( 'Open with new tab', 'slain' ),
            ),           
        )
);
