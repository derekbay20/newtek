<?php
/**
 * Search Related hooks
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

/**
 * Enqueue scripts and styles for only admin
 *
 * @since 1.0.0
 */
function slain_admin_scripts( $hook ) {

    wp_enqueue_style( 'slain-admin-style', get_template_directory_uri() . '/assets/css/admin.min.css', array(), esc_attr( '1.0.0' ) );

    if ( 'widgets.php' != $hook && 'customize.php' != $hook && 'edit.php' != $hook && 'post.php' != $hook && 'post-new.php' != $hook ) {
        return;
    }

    wp_enqueue_script( 'jquery-ui-button' );

    
}

add_action( 'admin_enqueue_scripts', 'slain_admin_scripts' );

/**
 * Enqueue scripts and styles.
 *
 * @since 1.0.0
 */
function slain_enqueue_scripts(){

    global $slain_version;

    wp_enqueue_style( 'slain-fonts', slain_fonts_url() );

    // Fontello Icons
    wp_enqueue_style( 'fontello', get_template_directory_uri().'/assets/vendor/fontello/css/fontello.css'  );

    // Slick Slider
    wp_enqueue_style( 'slick-css', get_template_directory_uri().'/assets/vendor/slick/css/slick.min.css' );

    // Scrollbar
    wp_enqueue_style( 'perfect-scrollbar-css', get_template_directory_uri() . '/assets/vendor/perfect-scrollbar/css/perfect-scrollbar.css' );

    wp_enqueue_style( 'font-awesome', centurylib_assets_url('library/font-awesome/css/font-awesome.min.css'), array(), '4.7.0');

    wp_enqueue_style( 'slain-main', get_template_directory_uri() . '/assets/css/main.min.css', array(), esc_attr( $slain_version ) );
    wp_style_add_data( 'slain-main', 'rtl', 'replace' );

    // WooCommerce
    wp_enqueue_style( 'slain-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.min.css' );
    wp_style_add_data( 'slain-woocommerce', 'rtl', 'replace' );

    // Theme Responsive CSS
    wp_enqueue_style( 'slain-responsive', get_template_directory_uri() . '/assets/css/responsive.min.css' );
    wp_enqueue_style( 'slain-style', get_stylesheet_uri(), array(), esc_attr( '1.0.0' ) );


    // Enqueue Custom Scripts
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/vendor/slick/js/slick.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'fitvids-js', get_template_directory_uri() . '/assets/vendor/fitvids/js/fitvids.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'flexmenu-js', get_template_directory_uri() . '/assets/vendor/flexmenu/js/flexmenu.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'sticky-kit-js', get_template_directory_uri() . '/assets/vendor/sticky-kit/js/sticky-kit.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'perfect-scrollbar-js', get_template_directory_uri() . '/assets/vendor/perfect-scrollbar/js/perfect-scrollbar.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'parallax-js', get_template_directory_uri() . '/assets/vendor/parallax/js/parallax.min.js', array( 'jquery' ), false, true );

    wp_enqueue_script( 'slain-custom-scripts', get_template_directory_uri() . '/assets/js/custom-scripts.js', array( 'jquery' ), false, true );
    
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

 
}

add_action( 'wp_enqueue_scripts', 'slain_enqueue_scripts', 20 );


function slain_customize_preview_init() {
    wp_enqueue_script( 'slain_customizer', get_template_directory_uri() . '/assets/js/customizer-preview.min.js', array( 'customize-preview' ), '20151215', true );
}

add_action( 'customize_preview_init', 'slain_customize_preview_init' );