<?php
/**
 * The template for displaying header related content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'slain' ); ?></a>
	<!-- Preloader -->
	<?php get_template_part( 'template-parts/sections/preloader' ); ?>

	<!-- Page Wrapper -->
	<div id="page-wrap">

		<!-- Boxed Wrapper -->
		<?php
		$header_width = get_theme_mod( 'slain_global_header_width', 'contained' );
		$header_class = ($header_width=='boxed') ? 'boxed-wrapper' : '';
		?>
		<header id="page-header" class="<?php echo esc_attr($header_class); ?>">

		<?php

		$template_str = get_theme_mod( 'slain_header_items_position', 'media,top,branding,navigation' );
		$header_items = explode( ',', $template_str );
		foreach($header_items as $template_slug ){
			get_template_part( 'template-parts/header/header', $template_slug );
		}
		?>
		</header><!-- #page-header -->
		<!-- Page Content -->
		<div class="page-content" id="content">
			