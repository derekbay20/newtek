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

$footer_logo = get_theme_mod( 'slain_bottom_footer_logo', '' );
$scroll_top = get_theme_mod( 'slain_enable_scroll_top', 1 );
$footer_width = get_theme_mod( 'slain_footer_wrapper_width', 'contained' );
$copyright = get_theme_mod( 'footer_copyright_text', esc_html__( '$copy $year All rights reserved.', 'slain') );
$contained_class = ($footer_width==='contained') ? 'boxed-wrapper' : '';
?>
<div class="footer-copyright">
	<div class="page-footer-inner <?php echo esc_attr($contained_class); ?>">
		<!-- Footer Logo -->
		<?php if ( $footer_logo ) : ?>
			<div class="footer-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr( bloginfo('name') ); ?>">
					<img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php esc_attr( bloginfo('name') ); ?>">
				</a>
			</div>
		<?php endif; ?>
		<div class="copyright-info">
			<?php
				$copyright = str_replace( '$year', date_i18n( 'Y' ), $copyright );
				$copyright = str_replace( '$copy', '&copy;', $copyright );
				echo wp_kses_post( $copyright );
				if ( $copyright !== '' ) {
					esc_html_e( ' | ', 'slain' );
				}
			?>
			<span class="credit">
			<?php
			/* translators: %1$s: theme name, %2$s link, %3$s theme author */
			printf( __( 'Theme by <a href="%1$s">%2$s.</a>', 'slain' ), esc_url( 'https://themecentury.com/' ), esc_html__( 'Themecentury', 'slain') );
			?>
			</span>
			<?php 
			wp_nav_menu( 
				array(
					'theme_location' 	=> 'footer',
					'menu_id' 		 	=> 'footer-menu',
					'menu_class' 		=> '',
					'container' 	 	=> 'nav',
					'container_class'	=> 'footer-menu-container',
					'depth'				=> 1,
					'fallback_cb' 		=> false
				) 
			);
			?>
		</div>
		<?php if ( $scroll_top ) : ?>
			<span class="scrolltop">
				<span class="icon-angle-up"></span>
				<span class="text"><?php esc_html_e( 'Go to top', 'slain' ); ?></span>
			</span>
		<?php endif; ?>
	</div>
</div><!-- .boxed-wrapper -->