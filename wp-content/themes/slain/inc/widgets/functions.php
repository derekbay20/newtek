<?php
/**
 * Custom hooks functions for different layout in widget section.
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */


/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Block Default Layout
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'slain_block_one_layout_section' ) ) :
	function slain_block_one_layout_section( $slain_args ) {
		$terms_ids = $slain_args['terms_ids'];
		$thumbnail_size = $slain_args['thumbnail_size'];
		$largeimg_size = $slain_args['largeimg_size'];
		$large_excerpt_length = $slain_args['large_excerpt_length'];
		$small_excerpt_length = $slain_args['small_excerpt_length'];
		$posts_page_page = 5;
		$block_args = array(
			'post_type' => 'post',
			'posts_per_page' => absint( $posts_page_page ),
		);
		if( ! empty( $terms_ids ) ){
			$block_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $terms_ids,
					'operator' => 'IN',
				),
			);
		}
		$block_query                 = new WP_Query( $block_args );
		$total_posts_count           = $block_query->post_count;
		if ( $block_query->have_posts() ) {
			$post_count = 1;
			while ( $block_query->have_posts() ){
				$block_query->the_post();
				if( $post_count == 1 ){
					echo '<div class="primary-block-wrap">';
					$title_size = 'large-size';
				}elseif ( $post_count == 2 ){
					echo '<div class="secondary-block-wrap">';
					$title_size = 'small-size';
				}else{
					$title_size = 'small-size';
				}

				$thumbnail_class = (has_post_thumbnail()) ? 'has_thumbnail' : 'no_thumbnail';
				?>
				<div class="single-post clear-fix">
					<div class="post-thumb <?php echo esc_attr($thumbnail_class); ?>">
						<a href="<?php the_permalink(); ?>">
							<?php
							if ( $post_count == 1 ) {
								the_post_thumbnail( $largeimg_size );
							} else {
								the_post_thumbnail( $thumbnail_size );
							}
							?>
						</a>
					</div><!-- .post-thumb -->
					<div class="post-content">
						<div class="post-categories"><?php slain_the_categories(); ?></div>
						<?php if($post_count == 1 ){ ?>
							<h3 class="post-title <?php echo esc_attr( $title_size ); ?>">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h3>
						<?php }else{ ?>
							<h5 class="post-title <?php echo esc_attr( $title_size ); ?>">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h5>
						<?php } ?>
						<div class="post-meta clear-fix">
							<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
							<span class="meta-sep">/</span>
							<?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
						</div>
						<?php if ( $post_count == 1 ) { ?>
							<div class="post-excerpt"><?php centurylib_the_excerpt($large_excerpt_length, false ); ?></div>
						<?php }else if($small_excerpt_length){ ?>
							<div class="post-excerpt"><?php centurylib_the_excerpt($small_excerpt_length, false ); ?></div>
						<?php } ?>
					</div><!-- .post-content -->
				</div><!-- .single-post -->
				<?php
				if( $post_count == 1 ){
					echo '</div><!-- .primary-block-wrap -->';
				}elseif( $post_count == $total_posts_count ){
					echo '</div><!-- .secondary-block-wrap -->';
				}
				$post_count ++;
			}
		}
		wp_reset_postdata();
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Block Second Layout
 *
 * @since 1.0.0
 */

if ( ! function_exists( 'slain_block_second_layout_section' ) ) :

	function slain_block_second_layout_section( $slain_args ) {
		
		$terms_ids = $slain_args['terms_ids'];
		$thumbnail_size = $slain_args['thumbnail_size'];
		$largeimg_size = $slain_args['largeimg_size'];
		$large_excerpt_length = $slain_args['large_excerpt_length'];
		$small_excerpt_length = $slain_args['small_excerpt_length'];
		$posts_page_page = 6;
		$block_args = array(
			'post_type' => 'post',
			'posts_per_page' => absint( $posts_page_page ),
		);
		if( ! empty( $terms_ids ) ){
			$block_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $terms_ids,
					'operator' => 'IN',
				),
			);
		}
		$block_query                 = new WP_Query( $block_args );
		$total_posts_count           = $block_query->post_count;
		if ( $block_query->have_posts() ) {
			$post_count = 1;
			while ( $block_query->have_posts() ) {

				$block_query->the_post();
				if ( $post_count == 1 ) {
					echo '<div class="primary-block-wrap clear-fix">';
				} elseif ( $post_count == 3 ) {
					echo '<div class="secondary-block-wrap clear-fix">';
				}
				if ( $post_count <= 2 ) {
					$title_size = 'large-size';
				} else {
					$title_size = 'small-size';
				}
				$thumbnail_class = (has_post_thumbnail()) ? 'has_thumbnail' : 'no_thumbnail';
				?>
				<div class="single-post clear-fix">
					<div class="post-thumb <?php echo esc_attr($thumbnail_class); ?>">
						<a href="<?php the_permalink(); ?>">
							<?php
							if ( $post_count <= 2 ) {
								the_post_thumbnail( $largeimg_size );
							} else {
								the_post_thumbnail( $thumbnail_size );
							}
							?>
						</a>
					</div><!-- .post-thumb -->
					<div class="post-content">
						<div class="post-categories"><?php slain_the_categories(); ?></div>
						<?php if($post_count<=2){ ?>
							<h4 class="post-title <?php echo esc_attr( $title_size ); ?>">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
						<?php }else{ ?>
							<h5 class="post-title <?php echo esc_attr( $title_size ); ?>">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h5>
						<?php } ?>
						<div class="post-meta">
							<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
							<span class="meta-sep">/</span>
							<?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
						</div>
						<?php if ( $post_count <= 2 && $large_excerpt_length ) { ?>
							<div class="post-excerpt"><?php centurylib_the_excerpt($large_excerpt_length, false ); ?></div>
						<?php }else{
							if($small_excerpt_length){
							 ?>
								<div class="post-excerpt"><?php centurylib_the_excerpt($small_excerpt_length, false ); ?></div>
							<?php
						}
						} ?>
					</div><!-- .post-content -->
				</div><!-- .single-post -->
				<?php
				if ( $post_count == 2 ) {
					echo '</div><!-- .primary-block-wrap -->';
				} elseif ( $post_count == $total_posts_count ) {
					echo '</div><!-- .secondary-block-wrap -->';
				}
				$post_count ++;
			}
		}
		wp_reset_postdata();
	}
endif;
/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Block Box Layout
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'slain_block_box_layout_section' ) ) :

	function slain_block_box_layout_section( $slain_args ) {

		$terms_ids = $slain_args['terms_ids'];
		$thumbnail_size = $slain_args['thumbnail_size'];
		$largeimg_size = $slain_args['largeimg_size'];
		$large_excerpt_length = $slain_args['large_excerpt_length'];
		$small_excerpt_length = $slain_args['small_excerpt_length'];
		$posts_page_page = 4;
		$block_args = array(
			'post_type' => 'post',
			'posts_per_page' => absint( $posts_page_page ),
		);
		if( ! empty( $terms_ids ) ){
			$block_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $terms_ids,
					'operator' => 'IN',
				),
			);
		}
		$block_query                 = new WP_Query( $block_args );
		$total_posts_count           = $block_query->post_count;
		if ( $block_query->have_posts() ) {
			$post_count = 1;
			while ( $block_query->have_posts() ) {
				$block_query->the_post();
				if ( $post_count == 1 ) {
					echo '<div class="primary-block-wrap">';
					$title_size = 'large-size';
				} elseif ( $post_count == 2 ) {
					echo '<div class="secondary-block-wrap clear-fix">';
					$title_size = 'small-size';
				} else {
					$title_size = 'small-size';
				}
				$thumbnail_class = (has_post_thumbnail()) ? 'has_thumbnail' : 'no_thumbnail';
				?>
				<div class="single-post <?php echo esc_attr($thumbnail_class); ?>">
					<div class="post-thumb <?php echo esc_attr($thumbnail_class); ?>">
						<a href="<?php the_permalink(); ?>">
							<?php
							if ( $post_count == 1 ) {
								the_post_thumbnail( $largeimg_size );
							} else {
								the_post_thumbnail( $thumbnail_size );
							}
							?>
						</a>
					</div><!-- .post-thumb -->
					<div class="post-content">
						<div class="post-categories"><?php slain_the_categories(); ?></div>
						<?php if($post_count==1){ ?>
						<h3 class="post-title <?php echo esc_attr( $title_size ); ?>">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<?php }else{ ?>
							<h5 class="post-title <?php echo esc_attr( $title_size ); ?>">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h5>
						<?php } ?>
						<div class="post-meta">
							<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
							<span class="meta-sep">/</span>
							<?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
						</div>
					</div><!-- .post-content -->
				</div><!-- .single-post -->
				<?php
				if ( $post_count == 1 ) {
					echo '</div><!-- .primary-block-wrap -->';
				} elseif ( $post_count == $total_posts_count ) {
					echo '</div><!-- .secondary-block-wrap -->';
				}
				$post_count ++;
			}
		}
		wp_reset_postdata();
	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Block blog style
 *
 * @since 1.0.0
 */

if ( ! function_exists( 'slain_block_blog_style_section' ) ) :

	function slain_block_blog_style_section($slain_args){

		$terms_ids = $slain_args['terms_ids'];
		$thumbnail_size = $slain_args['thumbnail_size'];
		$largeimg_size = $slain_args['largeimg_size'];
		$large_excerpt_length = $slain_args['large_excerpt_length'];
		$small_excerpt_length = $slain_args['small_excerpt_length'];
		$posts_page_page = 3;
		$block_args = array(
			'post_type' => 'post',
			'posts_per_page' => absint( $posts_page_page ),
		);
		if( ! empty( $terms_ids ) ){
			$block_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $terms_ids,
					'operator' => 'IN',
				),
			);
		}
		$block_query                 = new WP_Query( $block_args );
		$total_posts_count           = $block_query->post_count;
		if ( $block_query->have_posts() ) {
			$post_index = 0;
			while ( $block_query->have_posts() ) {
				$block_query->the_post();
				$post_index++;
				if($post_index > $posts_page_page ){
					break;
				}
				?>
				<article <?php post_class('block-posts-blog'); ?>>
					<div class="blog-post-style">
						<figure class="blog-thumb-wrapper">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( $thumbnail_size ); ?>
							</a>
						</figure><!-- .post-thumb -->
						<div class="blog-post-content">
							<div class="post-categories"><?php slain_the_categories(); ?></div>
							<h4 class="blog-post-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<span class="border-divider"></span>
							<div class="post-meta clear-fix">
								<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
								<span class="meta-sep">/</span>
								<?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
							</div>
							<div class="blog-post-excerpt"><?php centurylib_the_excerpt($large_excerpt_length, esc_html__( 'Read More', 'slain' ) ); ?></div>
						</div><!-- .post-content -->
					</div><!-- .single-post -->
				</article>
				<?php
			}

		}

		wp_reset_postdata();

	}

endif;

/*-----------------------------------------------------------------------------------------------------------------------*/

/**
 * Block alternate grid
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'slain_block_alternate_grid_section' ) ) :
	function slain_block_alternate_grid_section( $slain_args ){
		$terms_ids = $slain_args['terms_ids'];
		$thumbnail_size = $slain_args['thumbnail_size'];
		$largeimg_size = $slain_args['largeimg_size'];
		$large_excerpt_length = $slain_args['large_excerpt_length'];
		$small_excerpt_length = $slain_args['small_excerpt_length'];
		$posts_page_page = 3;
		$block_args = array(
			'post_type' => 'post',
			'posts_per_page' => absint( $posts_page_page ),
		);
		if( ! empty( $terms_ids ) ){
			$block_args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'term_id',
					'terms'    => $terms_ids,
					'operator' => 'IN',
				),
			);
		}
		$block_query                 = new WP_Query( $block_args );
		$total_posts_count           = $block_query->post_count;
		if ( $block_query->have_posts() ) {
			$post_index=0;
			while ( $block_query->have_posts() ) {
				$block_query->the_post();
				$post_index++;
				if($post_index > $posts_page_page ){
					break;
				}
				?>
				<article <?php post_class( 'slain-alternative-block' ); ?> >
					<div class="alternate-block-inner">
						<figure class="alternate-block-thumb">
							<a href="<?php the_permalink(); ?>" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(null, $thumbnail_size)); ?>); ">&nbsp;</a>
						</figure><!-- .post-thumb -->
						<div class="alternative-post-content">
							<div class="alternate-content-inner">
								<div class="alternate-center-part">
									<div class="post-categories"><?php slain_the_categories(); ?></div>
									<h3 class="alt-grid-post-title">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<div class="post-meta clear-fix">
										<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
										<span class="meta-sep">/</span>
										<?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
									</div>
									<div class="alternate-post-excerpt"><?php centurylib_the_excerpt($large_excerpt_length, false ); ?></div>
								</div>
							</div><!-- .post-content -->
						</div>
					</div><!-- .single-post -->
				</article>
				<?php
			}
		}
		wp_reset_postdata();

	}
endif;

/*-----------------------------------------------------------------------------------------------------------------------*/
/**
 * Carousel Default Layout
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'slain_carousel_layout_section' ) ) :

	function slain_carousel_layout_section( $block_args ) {

		$query_args = $block_args['query_args'];
		$carousel_settings = $block_args['carousel_settings'];
		$thumbnail_size = $carousel_settings['thumbnail_size'];
		$no_of_column = $carousel_settings['no_of_column'];
		$excerpt_length = $carousel_settings['excerpt_length'];
		$adaptive_height = $carousel_settings['adaptive_height'];
		$carousel_args = array(
			'autoplay'		=> true,
			'infinite'		=> true,
			'pauseOnHover'	=> true,
			'pager'			=> false,
			'arrows'		=> true,
			'adaptiveHeight'=> ($adaptive_height) ? true : false,
			'slideMargin'	=> 15,
			'rows'			=> 1,
			'slidesToScroll'=> 1,
			'slidesToShow' 	=> $no_of_column,
			'responsive'	=> array(
				array(
					'breakpoint'		=> 991,
					'settings'			=> array(
						'slidesToShow'	=> ($no_of_column>=2) ? 2 : $no_of_column,
					),
				),
				array(
					'breakpoint'		=> 480,
					'settings'			=> array(
						'slidesToShow'	=> 1,
					)
				)
			)
		);
		$slain_block_query = new WP_Query( $query_args );
		if ( $slain_block_query->have_posts() ) {
			echo '<ul class="slain-block-carousel before-initialize" data-carousel='.esc_attr(json_encode( $carousel_args ) ).'>';
			while ( $slain_block_query->have_posts() ){
				$slain_block_query->the_post();
				?>
				<li class="carousel-list <?php echo esc_attr( 'column'.$no_of_column ) ?>">
					<div class="single-post clear-fix">
						<div class="post-thumb">
							<a href="<?php the_permalink(); ?>" class="<?php echo (has_post_thumbnail(get_the_ID())) ? 'has-thumbnail' : 'no-thumbnail'; ?>">
								<?php the_post_thumbnail( $thumbnail_size ); ?>
							</a>
						</div><!-- .post-thumb -->
						<div class="post-content">
							<div class="post-categories"><?php slain_the_categories(); ?></div>
							<h3 class="post-title small-size"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="post-meta clear-fix">
								<span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
								<span class="meta-sep">/</span>
								<?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
								</div>
							<?php if($excerpt_length): ?>
								<div class="post-excerpt"><?php centurylib_the_excerpt($excerpt_length, false ); ?></div>
							<?php endif; ?>
						</div><!-- .post-content -->
					</div><!-- .single-post -->
				</li>
				<?php
			}
			echo '</ul>';
		}

		wp_reset_postdata();

	}

endif;
