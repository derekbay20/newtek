<?php
/**
 * Template part for displaying content post in single.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$thumbnail_size = 'slain-thumb-1140xauto';	

$featured_image = get_theme_mod( 'centurylib_enable_featured_image_post', 'show' );
$before_after_link = get_theme_mod( 'centurylib_prev_next_button_post', 'show' );
?>
<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( $featured_image!=='hide' && has_post_thumbnail() ) : ?>
		?>
		<div class="post-media">
			<?php the_post_thumbnail( $thumbnail_size ); ?>
		</div>
		<?php
	endif;	
	if ( get_the_title() !== '' ) {
		?>
		<header class="post-header">
			<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>
		</header>
	<?php } ?>
		<div class="post-content">
			<?php
			the_content();
			// Post Pagination
			$defaults = array(
				'before' => '<p class="single-pagination">'. esc_html__( 'Pages:', 'slain' ),
				'after' => '</p>'
			);
			if($before_after_link=='show'){
				wp_link_pages( $defaults );
			}
			?>
		</div>
</article>