<?php
/**
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
 if(!function_exists( 'slain_woocommerce_pagination' ) ):
	// Pagination
	function slain_woocommerce_pagination() {

		get_template_part( 'template-parts/sections/pagination' );

	}

endif;
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'slain_woocommerce_pagination', 10 );

if(!function_exists( 'slain_woo_before_shop_loop_wrapper_start' )):

	function slain_woo_before_shop_loop_wrapper_start(){
		?><div class="product-item-wrap"><?php
	}

endif;

add_action( 'woocommerce_before_shop_loop_item', 'slain_woo_before_shop_loop_wrapper_start', 1 );

if(!function_exists( 'slain_woo_before_shop_loop_wrap_end' )):

	function slain_woo_before_shop_loop_wrap_end(){
		?></div><!--product-item-wrap--><?php
	}

endif;

add_action( 'woocommerce_after_shop_loop_item', 'slain_woo_before_shop_loop_wrap_end', 30 );


// Remove Breadcrumbs
if ( ! function_exists('slain_remove_wc_breadcrumbs') ) {

	function slain_remove_wc_breadcrumbs() {

	    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

	}

}
add_action( 'init', 'slain_remove_wc_breadcrumbs' );

if(!function_exists('slain_woocommerce_output_content_wrapper')):
	// wrap woocommerce content - start
	function slain_woocommerce_output_content_wrapper() {

		$global_width = get_theme_mod( 'slain_woocommerce_global_width', 'boxed' );
		$layout = ( $global_width == 'boxed' ) ? ' boxed-wrapper': '';
		echo '<div class="main-content clear-fix'. esc_attr( $layout ) .'">';
			echo '<div class="main-container">';

	}

endif;
add_action( 'woocommerce_before_main_content', 'slain_woocommerce_output_content_wrapper', 5 );

if(!function_exists( 'slain_woocommerce_output_content_wrapper_end' )):
	// wrap woocommerce content - end
	function slain_woocommerce_output_content_wrapper_end() {

			echo '</div><!-- .main-container -->';
		echo '</div><!-- .main-content -->';

	}
endif;
add_action( 'woocommerce_after_main_content', 'slain_woocommerce_output_content_wrapper_end', 50 );

// Remove Default Sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// Change product grid columns
if ( ! function_exists('slain_woocommerce_grid_columns') ) {

	function slain_woocommerce_grid_columns() {

		$default_value = 3;
		if(is_archive()){
			return get_theme_mod( 'slain_archive_no_of_column', $default_value );
		}else{
			return get_theme_mod( 'slain_shop_no_of_column', $default_value );
		}
		return $default_value;

	}

}
add_filter( 'loop_shop_columns', 'slain_woocommerce_grid_columns' );

if(!function_exists( 'slain_woo_product_per_page' ) ):

	function slain_woo_product_per_page( $per_page ) {

	 	$default_per_page = 12;

	 	if(is_archive()){
	 		return get_theme_mod( 'slain_archive_no_of_products', 12 );
	 	}else{
	 		return get_theme_mod( 'slain_shop_no_of_products', 12 );
	 	}

		return $default_per_page;

	}

endif;
add_filter( 'loop_shop_per_page', 'slain_woo_product_per_page', 20 );


if(!function_exists( 'slain_related_products_args' )):

	function slain_related_products_args( $args ) {

	  	$args['posts_per_page'] = 3;
		$args['columns'] = 3;
		return $args;
		
	}

endif;
// Change related products grid columns
add_filter( 'woocommerce_output_related_products_args', 'slain_related_products_args' );


if(!function_exists( 'slain_shop_page_thumbnail_size' ) ){

	function slain_shop_page_thumbnail_size( $size ){

		if(is_shop() || is_search()){
			return get_theme_mod( 'slain_shop_thumbnail_size', 'slain-thumb-600x600' );
		}

		if(is_archive()){
			return get_theme_mod( 'slain_archive_thumbnail_size', 'slain-thumb-600x600' );
		}

		return $size;

	}

}
add_filter( 'single_product_archive_thumbnail_size', 'slain_shop_page_thumbnail_size', 10, 1 );

if(!function_exists( 'slain_woo_gallery_full_size') ):

	function slain_woo_gallery_full_size( $thumbnail_size ){

		if(is_single()){
			return get_theme_mod( 'slain_single_thumbnail_size', 'slain-thumb-600x600' );
		}
		return $thumbnail_size;
	}

endif;
add_filter( 'woocommerce_gallery_image_size', 'slain_woo_gallery_full_size', 10, 1 );
  



