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

$post_id = get_the_ID();
if(is_single()){
	$taxonomy = get_theme_mod( 'centurylib_related_posts_from', 'category' );
	$title = get_theme_mod( 'centurylib_related_posts_title', esc_html__( 'Related Posts','slain' ) );
}elseif(is_search()){
	$taxonomy = get_theme_mod( 'slain_related_from_search', 'category' );
	$title = get_theme_mod( 'slain_related_title_search', esc_html__( 'You may also like','slain' ) );
}elseif(is_archive()){
	$taxonomy = get_theme_mod( 'slain_related_from_archive', 'category' );
	$title = get_theme_mod( 'slain_related_title_archive', esc_html__( 'You may also like','slain' ) );
}else{
	$taxonomy = get_theme_mod( 'slain_related_from_index', 'category' );
	$title = get_theme_mod( 'slain_related_title_index', esc_html__( 'You may also like','slain' ) );
}

$current_terms = get_the_terms( $post_id, $taxonomy );
if(!$current_terms){
	return;
}
$term_ids = array();
foreach($current_terms as $single_term){
	$term_ids[] = $single_term->term_id;
}

if(!$term_ids){
	return;
}
$args = array(
	'post_type'				=> 'post',
	'post__not_in'			=> array( $post_id ),
	'posts_per_page'		=> 3,
	'ignore_sticky_posts'	=> 1,
	'tax_query'				=> array(
		array(
			'taxonomy' => $taxonomy,
			'terms'    => $term_ids,
			'field'    => 'term_id'
		)
	),
	'meta_query' => array(
		array(
		   	'key' => '_thumbnail_id',
		    'compare' => 'EXISTS'
		),
	)
);

$similar_posts = new WP_Query( $args );	
if ( $similar_posts->have_posts() ) {
	?>
	<div class="related-posts">
		<?php if($title): ?>
			<h3><?php echo esc_html( $title ); ?></h3>
		<?php endif; 
		while ( $similar_posts->have_posts() ) : $similar_posts->the_post();
			?>
			<div class="related-item">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slain-thumb-500x300'); ?></a>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<span class="related-post-date"><?php echo esc_html( get_the_time( get_option('date_format') ) ); ?></span>
			</div>
		<?php endwhile; ?>
	</div>
	<div class="clear-fix"></div>
	<?php
} // end have_posts()
wp_reset_postdata();
