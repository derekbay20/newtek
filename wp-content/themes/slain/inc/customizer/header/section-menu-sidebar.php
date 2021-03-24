<?php
/**
 * Slain Header Settings panel at Theme Customizer
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.8
 */

$sidebar_menu_area = $wp_customize->get_section( 'sidebar-widgets-menu-sidebar' );
if($sidebar_menu_area){
	$sidebar_menu_area->panel = 'site_header_panel';
	$sidebar_menu_area->priority = 80;
}
