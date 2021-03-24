<?php
/**
 * The template for default page post type
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
get_header(); 

$front_page_layout = get_theme_mod( 'slain_static_homepage_layout', 'default' );

if(is_front_page()){

	get_template_part( 'page-templates/template', $front_page_layout );

}else{

	get_template_part( 'page-templates/template' );

}

get_footer();