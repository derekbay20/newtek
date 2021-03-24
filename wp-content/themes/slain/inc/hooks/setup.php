<?php
/**
 * slain functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if (!function_exists('slain_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function slain_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on slain, use a find and replace
         * to change 'slain' to the name of your theme in all the template files.
         */
        load_theme_textdomain('slain', get_template_directory() . '/languages');

        /*
         * Add post format support
         */
        add_theme_support( 
            'post-formats',
            array( 
                'aside', 
                'gallery',
                'link',
                'image',
                'quote',
                'status',
                'video',
                'audio',
                'chat'
            )
        );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5', 
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            )
        );

        // Add theme support for Custom Logo.
        add_theme_support(
            'custom-logo', 
            array(
                'width' => 450,
                'height' => 200,
                'flex-width' => true,
                'flex-height' => true,
            )
        );

        $header_image_args = array(
            'width'                 => 1300,
            'height'                => 500,
            'default-image'          => '',
            'flex-height'            => true,
            'flex-width'             => true,
            'uploads'                => true,
            'random-default'         => false,
            'header-text'            => true,
            'video'                  => true,
        );
        add_theme_support( 'custom-header', $header_image_args );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background', 
            apply_filters(
                'slain_custom_background_args', 
                array(
                    'default-color'          => '',
                    'default-image'          => '',
                    'default-repeat'         => 'no-repeat',
                    'default-position-x'     => 'center',
                    'default-position-y'     => 'center',
                    'default-size'           => 'cover',
                    'default-attachment'     => 'fixed',
                )
            )
        );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        // Declare WooCommerce support
        $woocommerce_settings = apply_filters(
            'slain_woocommerce_args',
            array(
                'single_image_width'            => 555,
                'thumbnail_image_width'         => 262,
                'gallery_thumbnail_image_width' => 160,
                'product_grid'                  => array(
                    'default_columns' => 3,
                    'default_rows'    => 4,
                    'min_columns'     => 1,
                    'max_columns'     => 6,
                    'min_rows'        => 1,
                ),
            )
        );
        add_theme_support( 'woocommerce', $woocommerce_settings );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        // Switch default core markup for search form, comment form, and comments to output valid HTML5
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        // Gutenberg Embeds
        add_theme_support( 'responsive-embeds' ); 

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        add_image_size('slain-thumb-75x75', 70, 70, true);
        add_image_size('slain-thumb-300x200', 300, 200, true);
        add_image_size('slain-thumb-300x300', 300, 300, true);
        add_image_size('slain-thumb-400x500', 400, 500, true);
        add_image_size('slain-thumb-400x600', 400, 600, true);
        add_image_size('slain-thumb-500x300', 500, 300, true);
        add_image_size('slain-thumb-500x365', 500, 365, true);
        add_image_size('slain-thumb-600x600', 600, 600, true);
        add_image_size('slain-thumb-800x600', 800, 600, true);
        add_image_size('slain-thumb-1140xauto', 1140, 0, false );
        add_image_size('slain-thumb-1200x540', 1200, 540, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'top' => esc_html__('Top Menu', 'slain'),
            'main' => esc_html__('Primary Menu', 'slain'),
            'footer' => esc_html__('Footer Menu', 'slain')
        ));

        add_editor_style( slain_fonts_url() );

        add_editor_style( get_template_directory_uri() . '/assets/css/editor-style.css' );

        $remove_src_set = get_theme_mod( 'slain_remove_src_set', 1 );

        if($remove_src_set){
            add_filter( 'wp_calculate_image_srcset', '__return_false' );
        }

    }

endif;

add_action('after_setup_theme', 'slain_setup');

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function slain_content_width()
{
    $GLOBALS['content_width'] = apply_filters('slain_content_width', 640);
}

add_action('after_setup_theme', 'slain_content_width', 0);

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Set the theme version
 *
 * @global int $slain_version
 * @since 1.0.0
 */
function slain_theme_version()
{
    $slain_theme_info = wp_get_theme();
    $GLOBALS['slain_version'] = $slain_theme_info->get('Version');
}

add_action('after_setup_theme', 'slain_theme_version', 10);

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function slain_pingback_header()
{
    if (is_singular() && pings_open()) {
        echo '<link rel="pingback" href="'. esc_url(get_bloginfo('pingback_url')). '">';
    }
}

add_action('wp_head', 'slain_pingback_header');



function slain_excerpt_more( $link ) {

    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'slain' ), get_the_title( get_the_ID() ) )
    );

    return '...';
}
add_filter( 'excerpt_more', 'slain_excerpt_more' );