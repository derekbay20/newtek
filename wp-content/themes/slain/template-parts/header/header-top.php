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

$header_width = get_theme_mod( 'slain_global_header_width', 'contained' );
$social_media = get_theme_mod( 'slain_top_social_option', 'show' );

$header_class = ($header_width==='contained') ? 'boxed-wrapper' : '';
?>
<div id="top-bar" class="clear-fix">
	<div class="<?php echo esc_attr($header_class); ?>">
		<?php
		
		// Menu
		$args = array(
			'theme_location' 	=> 'top',
			'menu_id' 		 	=> 'top-menu',
			'menu_class' 		=> '',
			'container' 	 	=> 'nav',
			'container_class'	=> 'top-menu-container',
			'fallback_cb' 		=> 'slain_top_menu_fallback'
		);
		wp_nav_menu( $args );

		if ( has_nav_menu('top') ) { ?>
				
			<!-- Mobile Menu Button -->
			<a class="mobile-menu-btn" href="javascript:void(0);">
				<i class="fa fa-bars"></i>
			</a>

			<?php

			// Mobile Menu
			$nav_args = array(
				'theme_location' 	=> 'top',
				'menu_id'        	=> 'mobile-menu',
				'menu_class' 		=> '',
				'container' 	 	=> 'nav',
				'container_class'	=> 'mobile-menu-container',
				'fallback_cb' 		=> false
			);
			wp_nav_menu( $nav_args );
		}
		if($social_media=='show'):

			// Social Icons
			slain_social_media( 'top-bar-socials', false );

		endif; 
		?>

	</div>
</div><!-- #top-bar -->