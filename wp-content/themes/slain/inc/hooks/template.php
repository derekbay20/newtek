<?php
/**
 * Search Related hooks
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if(!function_exists( 'slain_templates_content_width' )):

	function slain_templates_content_width(){

		$content_width = 'contained';

		if(is_singular()){
			if(is_page()){
				$content_width = get_theme_mod( 'slain_wrapper_width_page', 'contained' );
			}else{
				$content_width = get_theme_mod( 'slain_wrapper_width_post', 'contained' );
			}

		}elseif(is_archive()){
			$content_width = get_theme_mod( 'slain_wrapper_width_archive', 'contained' );
		}elseif(is_search()){
			$content_width = get_theme_mod( 'slain_wrapper_width_search', 'contained' );
		}elseif(is_404()){
			$content_width = get_theme_mod( 'slain_wrapper_width_notfound', 'contained' );
		}else{
			$content_width = get_theme_mod( 'slain_wrapper_width_index', 'contained' );
		}
		return $content_width;

	}

endif;

if(!function_exists( 'slain_breadcrumbs_wrapper_class' )):

	function slain_breadcrumbs_wrapper_class(){

		$website_width = slain_templates_content_width();

		$content_class = ($website_width=='boxed') ? 'boxed-wrapper' : '';

		return $content_class;

	}

endif;

add_filter( 'centurylib_breadrumbs_wrapper_class', 'slain_breadcrumbs_wrapper_class', 10 );

if(!function_exists( 'centurylib_breadrumbs_content_class' )):

	function centurylib_breadrumbs_content_class(){

		$website_width = slain_templates_content_width();

		$content_class = ($website_width=='contained') ? 'boxed-wrapper' : '';

		return $content_class;

	}

endif;

add_filter( 'centurylib_breadrumbs_content_class', 'centurylib_breadrumbs_content_class', 10 );


if(!function_exists( 'slain_archive_title_prefix' )):

function slain_archive_title_prefix($prefix){

	$disable_prefix = get_theme_mod( 'slain_disable_prefix_archive', 1 );
	if($disable_prefix){
		return;
	}
	return $prefix;
	
}

endif;
add_filter( 'get_the_archive_title_prefix', 'slain_archive_title_prefix', 10, 1 );

 /*
** Custom Search Form
*/
function slain_custom_search_form( $html ) {

	$html  = '<form role="search" method="get" id="searchform" class="clear-fix" action="'. esc_url( home_url( '/' ) ) .'">';
	$html .= '<input type="search" name="s" id="s" placeholder="'. esc_attr__( 'Search...', 'slain' ) .'" data-placeholder="'. esc_attr__( 'Type then hit Enter...', 'slain' ) .'" value="'. get_search_query() .'" />';
	$html .= '<span class="svg-fa-wrap"><i class="fa fa-search"></i></span>';
	$html .= '<input type="submit" id="searchsubmit" value="st" />';
	$html .= '</form>';

	return $html;

	return $html;
}
add_filter( 'get_search_form', 'slain_custom_search_form' );


if(!function_exists( "slain_move_comments_field" )):

	// Move Comments Textarea
	function slain_move_comments_field( $fields ) {

		// unset/set
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;

		return $fields;
	}

endif;

add_filter( 'comment_form_fields', 'slain_move_comments_field' );
