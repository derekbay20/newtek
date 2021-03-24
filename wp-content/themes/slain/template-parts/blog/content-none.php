<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
?>
<div class="no-result-found">
	<h1><?php esc_html_e( 'Nothing Found!', 'slain' ); ?></h1>
	<p>
		<?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'slain' ); ?>
	</p>
	<div class="slain-widget widget_search">
		<?php get_search_form(); ?>
	</div> 	
</div>