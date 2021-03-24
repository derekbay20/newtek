<?php
/**
 * The template for shop page
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$checkout_template = $wp_customize->get_section( 'woocommerce_checkout' );
if($checkout_template){
	$checkout_template->priority = 60;
	$checkout_template->title = esc_html__( 'Checkout Template', 'slain' );
}

