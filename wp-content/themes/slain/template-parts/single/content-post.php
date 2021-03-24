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
$enable_categories = get_theme_mod( 'centurylib_enable_categories_post', 'show' );
$enable_date = get_theme_mod( 'centurylib_enable_date_post', 'show' );
$enable_date = get_theme_mod( 'centurylib_enable_date_post', 'show' );
$featured_image = get_theme_mod( 'centurylib_enable_featured_image_post', 'show' );
$show_author_name = get_theme_mod( 'centurylib_enable_authorname_post', 'show' );
$show_tags = get_theme_mod( 'centurylib_enable_tags_post', 'show' );
$before_after_link = get_theme_mod( 'centurylib_prev_next_button_post', 'show' );
$comment_counts = get_theme_mod( 'slain_comment_count_post', 'show' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( $featured_image!=='hide' && has_post_thumbnail() ) : ?>
		<div class="post-media">
			<?php the_post_thumbnail( $thumbnail_size ); ?>
		</div>
	<?php endif; ?>
	<header class="post-header">
		<?php if ( $enable_categories == 'show' ) : ?>
		<div class="post-categories"><?php slain_the_categories(); ?></div>
		<?php endif; ?>
		<?php if ( get_the_title() ) : ?>
		<h1 class="post-title"><?php the_title(); ?></h1>
		<?php endif; ?>
		<span class="border-divider"></span>
		<div class="post-meta clear-fix">
			<?php if ( $enable_date=='show' ) : ?>
			<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<?php endif; ?>
		</span>
	</header>
	<div class="post-content">
		<?php
		// The Post Content
		the_content('');
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
	<footer class="post-footer clear-fix">
		<?php 
		if($show_tags=='show'){
			the_tags( '<div class="post-tags">','','</div>' );
		}
		if ( $show_author_name=='show' ) : ?>
			<span class="post-author"><?php esc_html_e( 'By', 'slain' ); ?>&nbsp;<?php the_author_posts_link(); ?></span>
			<?php 
		endif;
		if ( $comment_counts == 'show' && comments_open() ) {
			comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments');
		}
		?>
	</footer>
</article>
