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
get_header(); 

/*
 * centurylib_breadcrumbs_section_template - hook
 *
 * @hooked - centurylib_breadcrumbs_section_callback - 10
 *
 * @since 1.0.0
 */
do_action( 'centurylib_breadcrumbs_section_template' );

$sticky_sidebar = get_theme_mod( 'slain_sticky_sidebar_post', 1 );
$content_width = get_theme_mod( 'slain_wrapper_width_post', 'contained' );
$author_details = get_theme_mod( 'centurylib_author_info_post', 'show' );
$show_navigation = get_theme_mod( 'centurylib_prev_next_button_post', 'show' );
$show_related = get_theme_mod( 'centurylib_enable_related_posts', 'show' );
$enable_comment = get_theme_mod( 'slain_enable_comment_post', 'show' );

$boxed_class = ($content_width=='boxed') ? 'boxed-wrapper' : '';
$contained_class = ($content_width=='contained') ? 'boxed-wrapper' : '';
?>
<!-- Page Content -->
<div class="main-content clear-fix <?php echo esc_attr($boxed_class); ?>" data-sidebar-sticky="<?php echo esc_attr( $sticky_sidebar  ); ?>">
	<div class="<?php echo esc_attr($contained_class); ?>">
		<!-- Main Container -->
		<div class="main-container">
			<?php
			while (have_posts()): the_post();

				// Single Post
				get_template_part( 'template-parts/single/content', get_post_type() );

			endwhile;
			
			if ( $author_details == 'show' ) {

				// Author Description
				get_template_part( 'template-parts/sections/author', 'details' );

			}
			if($author_details == 'show' ){

				// Single Navigation
				get_template_part( 'template-parts/sections/navigation' );

			}
			if($show_related == 'show' ){

				// Related Posts
				get_template_part( 'template-parts/sections/related', 'post' );

			}

			if( $enable_comment=='show' ){

				// Comments
				get_template_part( 'template-parts/sections/comments', 'area' );
				
			}

			?>
		</div><!-- .main-container -->
		<?php  get_sidebar(); ?>
	</div>
</div><!-- .page-content -->
<?php
get_footer();