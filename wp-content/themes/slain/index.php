<?php
/**
 * The template for displaying all post posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
get_header(); 

/*
 * centurylib_breadcrumbs_section_template - hook
 *
 * @hooked - centurylib_breadcrumbs_section_callback - 10
 *
 * @since 1.0.0
 */
do_action( 'centurylib_breadcrumbs_section_template' );

$enable_slider = get_theme_mod( 'slain_featured_slider_index', 1 );
$enable_blocks = get_theme_mod( 'slain_featured_blocks_index', 0 );
$first_post_full = get_theme_mod( 'slain_full_first_index', 1 );
$sticky_sidebar = get_theme_mod( 'slain_sticky_sidebar_index', 1 );
$content_layout = get_theme_mod( 'slain_content_layout_index', 'list' );
$content_width = get_theme_mod( 'slain_wrapper_width_index', 'contained' );

$boxed_class = ($content_width=='boxed') ? 'boxed-wrapper' : '';
$contained_class = ($content_width=='contained') ? 'boxed-wrapper' : '';

// Featured Slider, Carousel
if ( $enable_slider ) {

	get_template_part( 'template-parts/sections/featured', 'slider' );

}

// Featured Links, Banners
if ( $enable_blocks ) {

		get_template_part( 'template-parts/sections/featured', 'blocks' ); 

}

?>
<div class="main-content clear-fix <?php echo esc_attr( $boxed_class ); ?>" data-sidebar-sticky="<?php echo esc_attr( $sticky_sidebar ); ?>">
	<div class="<?php echo esc_attr($contained_class); ?>">
		<div class="main-container">
			<ul class="blog-grid">
			<?php
			wp_reset_postdata();
			// Loop Start
			if ( have_posts() ) : while ( have_posts() ) : the_post();

			// Classic Class
			$current_post_index = $wp_query->current_post;
			if ( $current_post_index == 0 && $first_post_full ) {
				$is_first_full = true;
			}else{
				$is_first_full = false;
			}
			// Blog Feed Wrapper
			if($is_first_full){
				get_template_part( 'template-parts/blog/content', 'full' );
			}else{
				get_template_part( 'template-parts/blog/content', $content_layout );
			}
			endwhile; // Loop End
			else:
		 	get_template_part( 'template-parts/blog/content', 'none' );
		 	endif; ?>
			</ul>
			<?php get_template_part( 'template-parts/sections/pagination' ); ?>
		</div><!-- .main-container -->
		<?php  get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
