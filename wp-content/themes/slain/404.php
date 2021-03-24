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


$content_width = get_theme_mod( 'slain_wrapper_width_notfound', 'contained' );
$sticky_sidebar = get_theme_mod( 'slain_sticky_sidebar_notfound', 1 );

$boxed_class =( $content_width==='boxed' ) ? 'boxed-wrapper' : '';
$contained_class = ( $content_width==='contained' ) ? 'boxed-wrapper' : '';


$not_found_title = get_theme_mod( 'centurylib_notfound_page_title', esc_html__( 'Oops! That page can&rsquo;t be found.', 'slain' ) );
$not_found_description = get_theme_mod( 'centurylib_notfound_page_description', esc_html__( 'It looks like nothing was found at this location.', 'slain' ) );

?>
<div class="main-content clear-fix <?php echo esc_attr($boxed_class); ?>">
	<div class="<?php echo esc_attr($contained_class); ?>">
		<div class="main-container">
			<div class="page-404">
				<h2><?php echo esc_html( $not_found_title ); ?></h2>
				<p><?php echo esc_html( $not_found_description ); ?></p>
				<?php
				$instance = array(
					'title' => '',
				);
				$args = array(
					'after_title' => '</h4></div>',
					'before_title' => '<div class="widget-title"><h4>',
					'before_widget'	=> '<div class="slain-widget widget_search">',
					'after_widget'	=> '</div>',
				);
				the_widget('WP_Widget_Search', $instance, $args );
				?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
