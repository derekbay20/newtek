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
$authordesc = get_the_author_meta( 'description' );
?>
<div class="author-description">  
	<a class="author-avatar" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
	</a>
	<div class="author-content">
		<h3><?php the_author_posts_link(); ?></h3>
		<?php if ( ! empty( $authordesc ) ) : ?>
			<p><?php the_author_meta( 'description' ); ?></p>
		<?php endif; ?>
	</div>
</div>

