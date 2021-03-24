<?php
/**
 * Slain Theme Customizer
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function slain_customize_register( $wp_customize ) {

	require_once slain_file_directory( 'inc/customizer/controls/controls.php' );

	require_once slain_file_directory( 'inc/customizer/upsell/slain-upsell-section.php' );
	require_once slain_file_directory( 'inc/customizer/header/panel-header.php' );
	require_once slain_file_directory( 'inc/customizer/sections/panel-sections.php' );
	require_once slain_file_directory( 'inc/customizer/templates/panel-templates.php' );
	require_once slain_file_directory( 'inc/customizer/footer/panel-footer.php' );
	require_once slain_file_directory( 'inc/customizer/colors/panel-colors.php' );
	require_once slain_file_directory( 'inc/customizer/options/panel-options.php' );
	require_once slain_file_directory( 'inc/customizer/woocommerce/panel-woocommerce.php' );

}

add_action( 'customize_register', 'slain_customize_register' );



