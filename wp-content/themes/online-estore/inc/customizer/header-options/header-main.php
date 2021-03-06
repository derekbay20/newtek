<?php
/**
* Main Header
*/
  $wp_customize->add_section('online_estore_header_main', array(
    'title' => esc_html__('Main Header', 'online-estore'),
    'panel' => $this->panel,
    'priority' => 26,
  ));


   $wp_customize->remove_section('header_image');
   $wp_customize->get_control('header_image')->section = 'online_estore_header_main';
   $wp_customize->get_control('header_image' )->priority = 10;


    // Background Option MSG    
    $wp_customize->add_setting(
        'main-header-bg-option-msg',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    $wp_customize->add_control(
        new OnlineEstore_Customize_Heading(
            $wp_customize,
            'main-header-bg-option-msg',
            array(
                'label'   => esc_html__( 'Background Options', 'online-estore' ),
                'section' => 'online_estore_header_main',
            )
        )
    );

   /**
    * Style
    */
   $wp_customize->add_setting("online_estore_main_header_bg_type", array(
       'default' => 'color-bg',
       'sanitize_callback' => 'online_estore_select_type_sanitize',
       // 'transport' => 'postMessage'
   ));

   $wp_customize->add_control("online_estore_main_header_bg_type", array(
       'section' => 'online_estore_header_main',
       'type' => 'select',
       'label' => esc_html__('Background Type', 'online-estore'),
       'priority' => 8,
       'choices' => array(
           'color-bg' => esc_html__('Color Background', 'online-estore'),
           'gradient-bg' => esc_html__('Gradient Background', 'online-estore'),
           'image-bg' => esc_html__('Image Background', 'online-estore'),
       ),
       
   ));

   $wp_customize->add_setting("online_estore_main_header_bg_color", array(
       'default' => '#fff',
       'sanitize_callback' => 'online_estore_sanitize_color_alpha',
       // 'transport' => 'postMessage'
   ));

   $wp_customize->add_control(new OnlineEstore_Alpha_Color_Control($wp_customize, "online_estore_main_header_bg_color", array(
       'section' => 'online_estore_header_main',
       'label' => esc_html__('Background Color', 'online-estore'),
       'priority' => 9,

   )));

   $wp_customize->add_setting("online_estore_main_header_bg_gradient", array(
       'sanitize_callback' => 'sanitize_text_field',
       // 'transport' => 'postMessage'
   ));

   $wp_customize->add_control(new OnlineEstore_Gradient_Control($wp_customize, "online_estore_main_header_bg_gradient", array(
       'section' => 'online_estore_header_main',
       'label' => esc_html__('Gradient Background', 'online-estore'),
       
   )));

   $wp_customize->add_setting("online_estore_main_header_parallax_effect", array(
       'sanitize_callback' => 'sanitize_text_field',
       'default' => 'none',
       // 'transport' => 'postMessage'
   ));

   $wp_customize->add_control("online_estore_main_header_parallax_effect", array(
       'type' => 'radio',
       'section' => 'online_estore_header_main',
       'label' => esc_html__('Background Effect', 'online-estore'),
       'choices' => array(
           'none' => esc_html__('None', 'online-estore'),
           'fixed' => esc_html__('Enable Parallax', 'online-estore'),
           'scroll' => esc_html__('Horizontal Moving', 'online-estore')
       ),
       
   ));

   $wp_customize->add_setting("online_estore_main_header_overlay_color", array(
       'default' => 'rgba(255,255,255,0)',
       'sanitize_callback' => 'online_estore_sanitize_color_alpha',
       // 'transport' => 'postMessage'
   ));

   $wp_customize->add_control(new OnlineEstore_Alpha_Color_Control($wp_customize, "online_estore_main_header_overlay_color", array(
       'label' => esc_html__('Background Overlay Color', 'online-estore'),
       'section' => 'online_estore_header_main',
       'palette' => array(
           'rgb(255, 255, 255, 0.3)', // RGB, RGBa, and hex values supported
           'rgba(0, 0, 0, 0.3)',
           'rgba( 255, 255, 255, 0.2 )', // Different spacing = no problem
           '#00CC99', // Mix of color types = no problem
           '#00C439',
           '#00C569',
           'rgba( 255, 234, 255, 0.2 )', // Different spacing = no problem
           '#AACC99', // Mix of color types = no problem
           '#33C439',
       ),
   )));

   /*Margin & Padding*/
   $wp_customize->add_setting(
       'main-header-padding-margin-msg',
       array(
           'sanitize_callback' => 'wp_kses_post',
       )
   );
   $wp_customize->add_control(
       new OnlineEstore_Customize_Heading(
           $wp_customize,
           'main-header-padding-margin-msg',
           array(
               'label'   => esc_html__( 'Margin & Padding', 'online-estore' ),
               'section' => 'online_estore_header_main',
           )
       )
   );

   /* Margin*/
   $wp_customize->add_setting(
       'header-main-margin',
       array(
           'sanitize_callback' => 'online_estore_sanitize_field_default_css_box',
           'default'           => $header_defaults['header-main-margin'],
           'transport'         => 'postMessage',
       )
   );
   $wp_customize->add_control(
       new OnlineEstore_Custom_Control_Cssbox(
           $wp_customize,
           'header-main-margin',
           array(
               'label'    => esc_html__( 'Margin', 'online-estore' ),
               'section'  => 'online_estore_header_main',
               'settings' => 'header-main-margin',
           ),
           array(),
           array()
       )
   );

   /* Padding*/
   $wp_customize->add_setting(
       'header-main-padding',
       array(
           'sanitize_callback' => 'online_estore_sanitize_field_default_css_box',
           'default'           => $header_defaults['header-main-padding'],
           'transport'         => 'postMessage',
       )
   );
   $wp_customize->add_control(
       new OnlineEstore_Custom_Control_Cssbox(
           $wp_customize,
           'header-main-padding',
           array(
               'label'    => esc_html__( 'Padding', 'online-estore' ),
               'section'  => 'online_estore_header_main',
               'settings' => 'header-main-padding',
           ),
           array(),
           array()
       )
   );

   /*Middle Row*/
   $wp_customize->add_setting(
       'main-header-border-styling-msg',
       array(
           'sanitize_callback' => 'wp_kses_post',
       )
   );
   $wp_customize->add_control(
       new OnlineEstore_Customize_Heading(
           $wp_customize,
           'main-header-border-styling-msg',
           array(
               'label'   => esc_html__( 'Border & Box Options', 'online-estore' ),
               'section' => 'online_estore_header_main',
           )
       )
   );

   $wp_customize->add_setting(
       'header-main-border-styling',
       array(
           'sanitize_callback' => 'online_estore_sanitize_field_background',
           'default'           =>  $header_defaults['header-main-border-styling'],
           // 'transport'         => 'postMessage',
       )
   );
   $wp_customize->add_control(
       new OnlineEstore_Custom_Control_Group(
           $wp_customize,
           'header-main-border-styling',
           array(
               'label'    => esc_html__( 'Border & Box', 'online-estore' ),
               'section'  => 'online_estore_header_main',
               'settings' => 'header-main-border-styling',
           ),
           array(
               'border-style'     => array(
                   'type'    => 'select',
                   'label'   => esc_html__( 'Border Style', 'online-estore' ),
                   'options' => online_estore_header_border_style(),
               ),
               'border-width'     => array(
                   'type'       => 'cssbox',
                   'label'      => esc_html__( 'Border Width', 'online-estore' ),
                   'class'      => 'spwp-element-show',
                   'box_fields' => array(
                       'top'    => true,
                       'right'  => true,
                       'bottom' => true,
                       'left'   => true,
                   ),
                   'attr'       => array(
                       'min'       => 0,
                       'max'       => 1000,
                       'step'      => 1,
                       'link'      => 1,
                       'devices'   => array(
                           'desktop' => array(
                               'icon' => 'dashicons-laptop',
                           ),
                       ),
                       'link_text' => esc_html__( 'Link', 'online-estore' ),
                   ),
               ),
               'border-color'     => array(
                   'type'  => 'color',
                   'label' => esc_html__( 'Border Color', 'online-estore' ),
               ),
               'border-radius'    => array(
                   'type'       => 'cssbox',
                   'label'      => esc_html__( 'Border Radius', 'online-estore' ),
                   'class'      => 'spwp-element-show',
                   'box_fields' => array(
                       'top'    => true,
                       'right'  => true,
                       'bottom' => true,
                       'left'   => true,
                   ),
                   'attr'       => array(
                       'min'       => 0,
                       'max'       => 1000,
                       'step'      => 1,
                       'link'      => 1,
                       'devices'   => array(
                           'desktop' => array(
                               'icon' => 'dashicons-laptop',
                           ),
                       ),
                       'link_text' => esc_html__( 'Link', 'online-estore' ),
                   ),
               ),
               'box-shadow-color' => array(
                   'type'  => 'color',
                   'label' => esc_html__( 'Box Shadow Color', 'online-estore' ),
               ),
               'box-shadow-css'   => array(
                   'type'       => 'cssbox',
                   'class'      => 'spwp-element-show',
                   'box_fields' => array(
                       'x'      => true,
                       'Y'      => true,
                       'BLUR'   => true,
                       'SPREAD' => true,
                   ),
                   'attr'       => array(
                       'min'         => 0,
                       'max'         => 1000,
                       'step'        => 1,
                       'link'        => 1,
                       'link_toggle' => false,
                       'devices'     => array(
                           'desktop' => array(
                               'icon' => 'dashicons-laptop',
                           ),
                       ),
                       'link_text'   => esc_html__( 'INSET', 'online-estore' ),
                   ),
               ),
           )
       )
   );