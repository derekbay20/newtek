<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if(!function_exists('slain_register_sidebar') ):

    function slain_register_sidebar() {

        $widget_layout = get_theme_mod( 'homepage_widget_layout', 'layout2' );

        /**
         * Register Menu sidebar
         *
         * @since 1.0.0
         */
        register_sidebar( 
            array(
                'name'          => esc_html__( 'Menu Sidebar', 'slain' ),
                'id'            => 'menu-sidebar',
                'description'   => esc_html__( 'Add widgets here to appear in your menu fixed sidebar.', 'slain' ),
                'before_widget' => '<div id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<div class="alt-widget-title"><h4><span class="title-wrapper">',
                'after_title'   => '</span></h4></div>',
            ) 
        );

        /**
         * Header widget area
         *
         * @since 1.0.0
         */
        register_sidebar(
            array(
                'name'          => esc_html__( 'Branding Area', 'slain' ),
                'id'            => 'slain_header_branding_area',
                'description'   => esc_html__( 'Add widgets here to display header branding section.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<h4 class="widget-title"><span class="title-wrapper">',
                'after_title'   => '</span></h4>',
            )
        );
        
        /**
         * Register right sidebar
         *
         * @since 1.0.0
         */
        register_sidebar( 
            array(
                'name'          => esc_html__( 'Right Sidebar', 'slain' ),
                'id'            => 'sidebar-right',
                'description'   => esc_html__( 'Add widgets here.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<div class="widget-title"><h4><span class="title-wrapper">',
                'after_title'   => '</span></h4></div>',
            )
        );

        /**
         * Register left sidebar
         *
         * @since 1.0.0
         */
        register_sidebar(
            array(
                'name'          => esc_html__( 'Left Sidebar', 'slain' ),
                'id'            => 'sidebar-left',
                'description'   => esc_html__( 'Add widgets here.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<div class="widget-title"><h4><span class="title-wrapper">',
                'after_title'   => '</span></h4></div>',
            )
        );

        

        /**
         * Register home Content area
         *
         * @since 1.0.0
         */
        register_sidebar( 
            array(
                'name'          => esc_html__( 'Top Home Area (Full Width)', 'slain' ),
                'id'            => 'slain_home_content_area',
                'description'   => esc_html__( 'Add widgets here.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<div class="widget-title"><h2><span class="title-wrapper">',
                'after_title'   => '</span></h2></div>',
            ) 
        );

        /**
         * Register home middle section area
         *
         * @since 1.0.0
         */
        register_sidebar( 
            array(
                'name'          => esc_html__( 'Home Left Area( Middle Part )', 'slain' ),
                'id'            => 'slain_home_middle_section_area',
                'description'   => esc_html__( 'Add widgets here.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<div class="widget-title"><h2><span class="title-wrapper">',
                'after_title'   => '</span></h2></div>',
            ) 
        );

        /**
         * Register home middle aside area
         *
         * @since 1.0.0
         */
        register_sidebar( 
            array(
                'name'          => esc_html__( 'Home Sidebar( Middle part ) ', 'slain' ),
                'id'            => 'slain_home_middle_aside_area',
                'description'   => esc_html__( 'Add widgets here.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<div class="widget-title"><h4><span class="title-wrapper">',
                'after_title'   => '</span></h4></div>',
            ) 
        );

        /**
         * Register home bottom section area
         *
         * @since 1.0.0
         */
        register_sidebar( 
            array(
                'name'          => esc_html__( 'Bottom Home Area', 'slain' ),
                'id'            => 'slain_home_bottom_section_area',
                'description'   => esc_html__( 'Add widgets here.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<div class="widget-title"><h2><span class="title-wrapper">',
                'after_title'   => '</span></h2></div>',
            ) 
        );


        /**
         * Register 4 different footer area
         *
         * @since 1.0.0
         */
        register_sidebars( 4, 
            array(
                /* translators: %d: Sidebar ID */
                'name'          => esc_html__( 'Footer %d', 'slain' ),
                'id'            => 'slain_footer_sidebar',
                'description'   => esc_html__( 'Added widgets are display at Footer Widget Area.', 'slain' ),
                'before_widget' => '<section id="%1$s" class="slain-widget %2$s">',
                'after_widget'  => '</section>',
                'before_title'  => '<div class="alt-widget-title"><h4><span class="title-wrapper">',
                'after_title'   => '</span></h4></div>',
            ) 
        );
        
    }

endif;

add_action('widgets_init', 'slain_register_sidebar');

if(!function_exists('slain_register_widgets')):

    function slain_register_widgets(){

        require_once slain_file_directory('inc/widgets/functions.php');
        require_once slain_file_directory('inc/widgets/posts-layout.php');
        require_once slain_file_directory('inc/widgets/call-to-action.php');
        require_once slain_file_directory('inc/widgets/post-carousel.php');
        require_once slain_file_directory('inc/widgets/tabbed-posts.php');
        require_once slain_file_directory('inc/widgets/page-block.php');

        register_widget( 'Slain_Posts_Layout_Widget' );
        register_widget( 'Slain_Call_To_Action_Widget' );
        register_widget( 'Slain_Post_Carousel_Widget' );
        register_widget( 'Slain_Tabbed_Posts_Widget' );
        register_widget( 'Slain_Page_Block_Widget' );
 
    }

endif;

add_action('widgets_init', 'slain_register_widgets');


if(!function_exists( 'slain_body_sidebar_class' )):

    function slain_body_sidebar_class( $body_class ){

        $sidebar_class = 'body_'.slain_get_sidebar_name();
        $body_class[] = esc_attr($sidebar_class);
        return $body_class;

    }

endif;

add_action( 'body_class', 'slain_body_sidebar_class', 10, 1 );