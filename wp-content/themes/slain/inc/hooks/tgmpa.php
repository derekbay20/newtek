<?php
/**
 * Register the recommended plugins for this theme.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function slain_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(
		
		array(
			'name'     => esc_html__('Century ToolKit', 'slain'),
			'slug'     => 'century-toolkit',
			'required' => false,
		),
		
	);

	tgmpa( $plugins );
}


/**
 * This file contains the recommended plugin lists to this theme
 */

add_action( 'tgmpa_register', 'slain_register_required_plugins' );