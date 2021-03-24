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
$background_image = get_theme_mod( 'slain_main_footer_background', '' );
$footer_width = get_theme_mod( 'slain_footer_wrapper_width', 'contained' );
$no_of_area = get_theme_mod( 'footer_main_no_of_area', 4 );

$footer_class = ($footer_width==='contained') ? 'boxed-wrapper' : '';

?>
<div id="footer-main" class="footer-widgets clear-fix" style="background-image:url(<?php echo esc_attr($background_image); ?>); background-size:cover; background-repeat: no-repeat;">
	<div class="footer-widget-area page-footer-inner <?php echo esc_attr($footer_class); ?>">
		<?php
		
		for( $i=0; $i<$no_of_area; $i++){
			$sidebar_name = 'slain_footer_sidebar';
			if($i){
				$sidebar_name.='-'.($i+1);
			}
			?>
			<div class="footer-column column<?php echo absint($no_of_area); ?>">
				<?php dynamic_sidebar( $sidebar_name ); ?>
			</div>
			<?php
		}
		?>
	</div>
</div>