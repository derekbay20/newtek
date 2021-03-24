<?php
/**
 * Featured Slider Template Part
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

$slider_width = get_theme_mod( 'slain_featured_slider_width', 'boxed' );
$display_post_by = get_theme_mod( 'slain_featured_slider_postby', 'all' );
$cats_string = get_theme_mod( 'slain_featured_slider_categories' );
$posts_per_page = get_theme_mod( 'slain_featured_slider_perpage', 3 );
$navigation_arrow = get_theme_mod( 'slain_featured_slider_arrow', 1 );
$slider_dots = get_theme_mod( 'slain_featured_slider_dots', 1 );


$boxed_class = ($slider_width=='boxed') ? 'boxed-wrapper' : '';
$contained_class = ($slider_width=='contained') ? 'boxed-wrapper' : '';
$categories = explode(',', $cats_string);

$slider_data = array(
	'fade' => 1,
	'slidesToShow' => 1,
	'slidesToScroll' => 1,
	'infinite'=>0,
	'arrows' => 0,
	'dots' => 0
);
if( $navigation_arrow ){
	$slider_data['arrows'] = 1;
}
if($slider_dots){
	$slider_data['dots'] = 1;
}

// Query Args
$args = array(
	'post_type'		      	=> array( 'post' ),
	'order'			      	=> 'DESC',
	'posts_per_page'      	=> $posts_per_page,
	'ignore_sticky_posts'	=> 1,
	'meta_query' 			=> array( 
		array(
			'key' 		=> '_thumbnail_id',
			'compare' 	=> 'EXISTS'
		)
	),	
);

if ( $display_post_by == 'category' && $categories ) {

	$args['tax_query'] = array(
		array(
			'taxonomy' => 'category',
           	'field'    => 'term_id',
           	'terms'    => $categories,
		)
	);

}

$sliderQuery = new WP_Query($args);
if ( $sliderQuery->have_posts() ):
	?>
	<!-- Wrap Slider Area -->
	<div class="featured-slider-area <?php echo esc_attr($boxed_class); ?>">
		<!-- Featured Slider -->
		<ul id="featured-slider" class="slain-featured-slider before-initialize <?php echo esc_attr($contained_class); ?>" data-args="<?php echo esc_attr( json_encode($slider_data) ); ?>">
			<?php
			// Loop Start
			
			while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post();
				$featured_image = get_the_post_thumbnail_url( null, 'slain-thumb-1200x540' );
			?>
			<li class="slider-item">
				<div class="slider-item-bg" style="background-image:url(<?php echo esc_url($featured_image); ?>);"></div>
				<div class="cv-container image-overlay">
					<div class="cv-outer">
						<div class="cv-inner">
							<div class="slider-info">	
								<div class="slider-categories">
									<?php slain_the_categories(); ?>
								</div> 
								<h2 class="slider-title"> 
									<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>	
								</h2>
								<div class="slider-read-more">
									<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more','slain' ); ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php
			endwhile; // Loop end
			?>
		</ul><!-- #featured-slider -->
	</div><!-- .featured-slider-area -->
	<?php
endif;
wp_reset_postdata();

