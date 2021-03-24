<?php
/**
 * The template for displaying footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
$show_social = get_theme_mod('slain_branding_social_icons', 0 );
$header_textcolor = get_theme_mod( 'header_textcolor' );
$header_width = get_theme_mod( 'slain_global_header_width', 'contained' );
$branding_options = get_theme_mod( 'slain_header_branding_option', 'sidebar');
$branding_background = get_theme_mod( 'slain_branding_background_image' );
$enable_parallax = get_theme_mod( 'slain_enable_parallax_image', 1 );
$branding_alignment = get_theme_mod( 'slain_header_branding_align', 'left' );

if(!$branding_background){
	$enable_parallax = 0;
}

$contained_class = ($header_width==='contained') ? 'boxed-wrapper' : '';
?>
<div class="header-branding <?php echo esc_attr( $branding_alignment ); ?> clear-fix" data-parallax="<?php echo esc_attr($enable_parallax); ?>" data-image="<?php echo esc_attr($branding_background); ?>">
	<div class="<?php echo esc_attr($contained_class); ?> clear-fix">
		<div class="header-logo">
			<?php 
			if(has_custom_logo()){
				the_custom_logo();
			}
			if($header_textcolor!='blank'){
				if(is_home() || is_front_page() ){
					?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo bloginfo( 'title' ); ?></a>
					</h1>
				<?php
				}else{
					?>
					<div class="site-title">
					<a href="<?php echo esc_url( home_url('/') ); ?>"><?php echo bloginfo( 'title' ); ?></a>
					</div>
					<?php

				}
				if ( '' !== get_bloginfo( 'description' ) ): 
					?>
					<p class="site-description"><?php echo bloginfo( 'description' ); ?></p>
					<?php 
				endif;
			}
			?>				
		</div>
		<?php if( $branding_options=='sidebar' ): ?>
			<div class="branding-area">
				<?php dynamic_sidebar( 'slain_header_branding_area' ) ?>
			</div>
		<?php elseif($branding_options=='ecommerce'):
			do_action('slain_header_branding_ecommerce');
		else:
			do_action('slain_header_branding_space');
		endif; ?>
		<?php // Social Icons
		if ( $show_social ) {
			slain_social_media( 'header-socials', false );
		}
		?>
	</div>
</div>