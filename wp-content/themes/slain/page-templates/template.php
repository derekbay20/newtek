<?php
/**
 * This is the template that displays default page template
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

/*
 * centurylib_breadcrumbs_section_template - hook
 *
 * @hooked - centurylib_breadcrumbs_section_callback - 10
 *
 * @since 1.0.0
 */
do_action( 'centurylib_breadcrumbs_section_template' );

$content_width = get_theme_mod( 'slain_wrapper_width_page', 'contained' );
$sticky_sidebar = get_theme_mod( 'slain_sticky_sidebar_page', 1 );
$enable_comment = get_theme_mod( 'slain_enable_comment_page', 'hide' );

$boxed_class =( $content_width==='boxed' ) ? 'boxed-wrapper' : '';
$contained_class = ($content_width=='contained') ? 'boxed-wrapper' : '';
?>
<div class="main-content clear-fix <?php echo esc_attr( $boxed_class ); ?>" data-sidebar-sticky="<?php echo esc_attr( $sticky_sidebar ); ?>">
	<div class="<?php echo esc_attr($contained_class); ?>">
		<!-- Main Container -->
		<div class="main-container">
			<?php
			while(have_posts()) : the_post();

				get_template_part( 'template-parts/single/content', get_post_type() );

			endwhile;

			if($enable_comment=='show'){
				// Comments
				get_template_part( 'template-parts/sections/comments', 'area' );
			}
			?>
		</div><!-- .main-container -->
		<?php get_sidebar(); ?>
	</div>
</div><!-- .main-content -->
<?php