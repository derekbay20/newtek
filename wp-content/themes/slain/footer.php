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

$social_icons = get_theme_mod( 'enable_social_icons_footer', 0 );
$footer_width = get_theme_mod( 'slain_footer_wrapper_width', 'contained' );
$enable_main_footer = get_theme_mod( 'slain_footer_widget_option', 'show' );

$boxed_class = ($footer_width==='boxed') ? 'boxed-wrapper' : '';
?>
		</div><!-- .page-content -->
		<!-- Page Footer -->
		<footer id="page-footer" class="<?php echo esc_attr($boxed_class); ?> clear-fix">
			<?php
			// Footer Socials
			if ( $social_icons ) {
				slain_social_media( 'footer-socials', true );
			}
			if($enable_main_footer!='hide'){
				// Footer Widgets
				get_template_part( 'template-parts/footer/footer', 'main' );
			}
			get_template_part( 'template-parts/footer/footer', 'bottom' );
			?>
		</footer><!-- #page-footer -->
	</div><!-- #page-wrap -->
<?php wp_footer(); ?>
</body>
</html>