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

$thumbnail_size = 'slain-thumb-500x300';

if(is_search()){
	$show_date = get_theme_mod( 'centurylib_enable_date_search', 'show' );
	$description = get_theme_mod( 'slain_post_description_search', 'excerpt' );
	$excerpt_length = get_theme_mod( 'centurylib_excerpt_length_search', 100 );
	$show_comments = get_theme_mod( 'slain_enable_comment_count_search', 'show' );
	$show_author = get_theme_mod( 'centurylib_enable_authorname_search', 'show' );
	$show_categories = get_theme_mod( 'centurylib_enable_categories_search', 'show' );
	$related_posts = get_theme_mod( 'slain_enable_related_search', 0 );
	$show_featured_image = get_theme_mod( 'centurylib_enable_featured_image_search', 'show' );
	$readmore = get_theme_mod( 'centurylib_readmore_text_search', esc_html__( 'Read More...', 'slain') );
}elseif(is_archive()){
	$show_date = get_theme_mod( 'centurylib_enable_date_archive', 'show' );
	$description = get_theme_mod( 'slain_post_description_archive', 'excerpt' );
	$excerpt_length = get_theme_mod( 'centurylib_excerpt_length_archive', 100 );
	$show_comments = get_theme_mod( 'slain_enable_comment_count_archive', 'show' );
	$show_author = get_theme_mod( 'centurylib_enable_authorname_archive', 'show' );
	$show_categories = get_theme_mod( 'centurylib_enable_categories_archive', 'show' );
	$related_posts = get_theme_mod( 'slain_enable_related_archive', 0 );
	$show_featured_image = get_theme_mod( 'centurylib_enable_featured_image_archive', 'show' );
	$readmore = get_theme_mod( 'centurylib_readmore_text_archive', esc_html__( 'Read More...', 'slain') );	
}else{
	$show_date = get_theme_mod( 'centurylib_enable_date_index', 'show' );
	$description = get_theme_mod( 'slain_post_description_index', 'excerpt' );
	$excerpt_length = get_theme_mod( 'centurylib_excerpt_length_index', 100 );
	$show_comments = get_theme_mod( 'slain_enable_comment_count_index', 'show' );
	$show_author = get_theme_mod( 'centurylib_enable_authorname_index', 'show' );
	$show_categories = get_theme_mod( 'centurylib_enable_categories_index', 'show' );
	$related_posts = get_theme_mod( 'slain_enable_related_index', 0 );
	$show_featured_image = get_theme_mod( 'centurylib_enable_featured_image_blog', 'show' );
	$readmore = get_theme_mod( 'centurylib_readmore_text_index', esc_html__( 'Read More...', 'slain') );
}
?>
<li class="blog-grid-style">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post' ); ?>>
		<?php if(has_post_thumbnail() && $show_featured_image=='show'): ?>
			<div class="post-media">
				<a href="<?php echo esc_url( get_permalink() ); ?>"></a>
				<?php the_post_thumbnail('slain-thumb-500x300'); ?>
			</div>
		<?php endif ?>
		<header class="post-header">
			<?php if ( $show_categories != 'hide' ) : ?>
			<div class="post-categories"><?php slain_the_categories(); ?></div>
			<?php endif; ?>
			<?php if ( get_the_title() ) : ?>
			<h2 class="post-title">
				<a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a>
			</h2>
			<?php endif; ?>
			<span class="border-divider"></span>
			<?php if ( $show_comments!='hide' && comments_open() ): ?>
			<div class="post-meta clear-fix">
				<?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
			</div>
			<?php endif; ?>
		</header>
		<?php if ( $description !== 'none' ) : ?>
		<div class="post-content">
			<?php
				if ( $description === 'content' ) {
					the_content('');
				} elseif ( $description === 'excerpt' ) {
					centurylib_the_excerpt( $excerpt_length, $readmore );
				}
			?>
		</div>
		<?php endif; ?>
		<footer class="post-footer">
			<?php if ( $show_author != 'hide' ) : ?>
			<span class="post-author">
				<span><?php esc_html_e( 'By ', 'slain' ); ?></span>
				<?php the_author_posts_link(); ?>
			</span>
			<?php endif; ?>
			<?php if ( $show_date != 'hide' ) : ?>
			<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
			<?php endif; ?>
		</footer>
	</article>
</li>