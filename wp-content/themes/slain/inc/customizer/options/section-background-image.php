<?php
/**
 * Section Background Image
 *
 * @since 1.0.0
 */

$background_image = $wp_customize->get_section('background_image');
if($background_image):
	$background_image->panel = 'site_setting_options';
	$background_image->priority = 20;
	$background_image->title = esc_html__( 'Site Background', 'slain' );
endif;

$background_color = $wp_customize->get_control( 'background_color' );
if($background_color){
	$background_color->section = 'background_image';
}