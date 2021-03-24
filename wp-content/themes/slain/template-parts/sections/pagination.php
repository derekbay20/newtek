<?php
/**
 * The pagination for single post 
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$post_pagination = get_theme_mod( 'slain_pagination_layout_index', 'default' );

global $paged;
global $wp_query;
$pages = $wp_query->max_num_pages;
$range = 2;
$showitems = ( $range * 2 ) + 1;

if ( empty( $paged ) ) {
	$pagedd = 1;
} else {
	$pagedd = $paged;
}
if ( ! $pages ) {
	$pages = 1;
}
if ( $pages == 1 ) {
	return;
}
// Check for WooCommerce
if ( class_exists( 'WooCommerce' ) ) {
	if ( is_shop() ) {
		$post_pagination = 'numeric';
	}
}
?>
<nav class="blog-pagination clear-fix <?php echo esc_attr( $post_pagination ); ?>" data-max-pages="<?php echo esc_attr( $wp_query->max_num_pages ); ?>" data-loading="<?php esc_attr_e( 'Loading...', 'slain' ); ?>" >
	<?php
	// Numeric Pagination
	if ( $post_pagination == 'numeric' ) {
		//  Previous Page
		if ( $pagedd > 1 ) {
			echo '<a href="'. esc_url( get_pagenum_link( $pagedd - 1 ) ) .'" class="numeric-prev-page" ><i class="fa fa-chevron-left"></i></a>';
		}
		// Pagination
		for ( $i = 1; $i <= $pages; $i++ ) {
			if ( 1 != $pages &&( !( $i >= $pagedd + $range + 1 || $i <= $pagedd - $range - 1 ) || $pages <= $showitems ) ) {
				if ( $pagedd == $i ) {
					echo '<span class="numeric-current-page">'. esc_html( $i ) .'</span>';
				} else {
					echo '<a href="'. esc_url( get_pagenum_link( $i ) ). '">'. esc_html( $i ) .'</a>';
				}
			}
		}
		// Next Page
		if ( $pagedd < $pages ) {
			echo '<a href="'. esc_url( get_pagenum_link( $pagedd + 1 ) ).'" class="numeric-next-page" ><i class="fa fa-chevron-right"></i></a>';
		}
	// Default Pagination
	} elseif ( $post_pagination == 'default' ) {
		if ( get_next_posts_link() ) {
			echo '<div class="previous-page">';
				next_posts_link( '<i class="fa fa-chevron-left"></i>&nbsp;'.esc_html__( 'Older Posts', 'slain' ) );
			echo '</div>';
		}
		if ( get_previous_posts_link() ) {
			echo '<div class="next-page">';
				previous_posts_link( esc_html__( 'Newer Posts', 'slain' ).'&nbsp;<i class="fa fa-chevron-right"></i>' );
			echo '</div>';
		}
	// Load More / Infinite Scroll
	} else {
		next_posts_link( esc_html__( 'Load More', 'slain' ) );
	}
	?>
</nav>
