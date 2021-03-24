<?php
/**
 * Widget: Carousel
 *
 * Widget show the posts from selected categories in carousel layouts.
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if( !class_exists( 'Slain_Post_Carousel_Widget' ) ):

	class Slain_Post_Carousel_Widget extends Centurylib_Master_Widget{

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {

			$widget_ops = array(
				'classname'   => 'posts-carousel',
				'description' => esc_html__( 'Displays posts from selected categories in carousel layouts.', 'slain' )
			);
			parent::__construct( 'slain_site_carousel', esc_html__( 'SL - Posts Carousel', 'slain' ), $widget_ops );

		}

		/**
		 * Helper function that holds widget fields
		 * Array is used in update and form functions
		 */
		public function widget_fields( $instance = array() ) {

			$fields = array(
				'tab'       => array(
					'name'     => 'tab',
					'title'    => esc_html__( 'General', 'slain' ),
					'default'  => 'general',
					'type'     => 'tabgroup',
					'options'  => array(
						'general'=>array(
							'title'=>esc_html__('General', 'slain'),
							'options'=> array(
								'title' => array(
									'name'        => 'title',
									'title'       => esc_html__( 'Title', 'slain' ),
									'centurylib_widget_field_description' => esc_html__( 'Enter your block title. (Optional - Leave blank to hide title.)', 'slain' ),
									'type'  => 'text'
								),
								'title_target'    => array(
	                                'name'     => 'title_target',
	                                'wrapper'   => 'title-target',
	                                'title'    => esc_html__( 'Link Target', 'slain' ),
	                                'default'  => '',
	                                'type'     => 'select',
	                                'options'  => centurylib_link_target(),
	                                'relation' => array(
	                                    'exist' => array(
	                                        'show_fields'   => array(
	                                            'title-link', 
	                                        ),
	                                    ),
	                                    'empty' => array(
	                                        'hide_fields'   => array(
	                                            'title-link', 
	                                        ),
	                                    ),
	                                ),
	                            ),
	                            'title_link'    => array(
	                                'name'     => 'title_link',
	                                'wrapper'   => 'title-link',
	                                'title'    => esc_html__( 'Title link', 'slain' ),
	                                'default'  => '',
	                                'type'     => 'text',
	                            ),
								'term_ids' => array(
									'name'          => 'term_ids',
									'title'         => esc_html__( 'Categories', 'slain' ),
									'type'   => 'multitermlist',
									'taxonomy' => 'category',
								),
								'posts_per_page' => array(
									'name'          => 'posts_per_page',
									'title'         => esc_html__( 'No of post to show', 'slain' ),
									'default'  => 6,
									'type'   => 'number',
								),
								'no_of_column' => array(
									'name'          => 'no_of_column',
									'title'         => esc_html__( 'No of column', 'slain' ),
									'default'  => 3,
									'type'   => 'select',
									'options' => array(
										'1' => esc_html__('Column One', 'slain'),
										'2' => esc_html__('Column Two', 'slain'),
										'3' => esc_html__('Column Three', 'slain'),
										'4' => esc_html__('Column Four', 'slain'),
									),
								),
								'excerpt_length' => array(
                                	'name'         => 'excerpt_length',
                                	'title'        => esc_html__( 'Description Length', 'slain' ),
                                	'default'      => '25',
                                	'type'   => 'number',
                                	'centurylib_widget_field_description'  => esc_html__( 'Enter the short description length in character.', 'slain'),
                                ),
                                'thumbnail_size' => array(
									'name'         => 'thumbnail_size',
									'title'        => esc_html__( 
										'Thumbnail Image Size', 'slain' ),
									'default'=> 'slain-thumb-600x600',
									'type' => 'select',
									'options'   => centurylib_get_image_sizes(),
								),
							)
						),
						'layout'=>array(
							'title'=>esc_html__('Layout', 'slain'),
							'options'=> array(
								'carousel_layout' => array(
									'name'          => 'carousel_layout',
									'title'         => esc_html__( 'Carousel Layout', 'slain' ),
									'type'   => 'select',
									'default'  => 'layout2',
									'options' => array(
										'layout1' => esc_html__('Layout One', 'slain'),
										'layout2' => esc_html__('Layout Two', 'slain'),
									),
								),
								'enable_navigation' => array(
									'name'          => 'enable_navigation',
									'title'         => esc_html__( 'Enable Navigation', 'slain' ),
									'type'   => 'checkbox',
									'default'  => 1
								),
								'adaptive_height' => array(
									'name'          => 'adaptive_height',
									'title'         => esc_html__( 'Enable Adaptive Height?', 'slain' ),
									'type'   => 'checkbox',
									'default'  => 1
								),
							)
						),
					)
				)
			);

			$widget_fields_key = 'fields_'.$this->id_base;
			$widgets_fields = apply_filters( $widget_fields_key, $fields );
			return $widgets_fields;

		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
	
			/*
			 * Title Section
			 */			
			$before_title = (isset($args['before_title'])) ? $args['before_title'] : '';
			$after_title = (isset($args['after_title'])) ? $args['after_title'] : '';

			/*
			 * General Tab
			 */
			$title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
            $title  = apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $title_target      = isset( $instance['title_target'] ) ? esc_html( $instance['title_target'] ) : '';
            $title_link  = isset( $instance['title_link'] ) ? esc_html( $instance['title_link'] ) : '';
            $term_ids  = isset( $instance['term_ids'] ) ? $instance['term_ids'] : '';
            $posts_per_page  = isset( $instance['posts_per_page'] ) ? absint($instance['posts_per_page']) : 6;
            $no_of_column  = isset( $instance['no_of_column'] ) ? absint($instance['no_of_column']) : 3;
            $excerpt_length  = isset( $instance['excerpt_length'] ) ? absint($instance['excerpt_length']) : 0;
            $thumbnail_size  = isset( $instance['thumbnail_size'] ) ? esc_attr($instance['thumbnail_size']) : 'slain-thumb-600x600';

            /*
			 * Layout Tab
			 */
            $carousel_layout  = isset( $instance['carousel_layout'] ) ? $instance['carousel_layout'] : 'layout2';
            $enable_navigation  = isset( $instance['enable_navigation'] ) ? absint($instance['enable_navigation']) : 0;
            $adaptive_height  = isset( $instance['adaptive_height'] ) ? absint($instance['adaptive_height']) : 1;

			$slain_block_args   = array(
				'query_args' => array(
					'post_type'	=> 'post',
					'post_status' => 'publish',
					'posts_per_page' => absint( $posts_per_page )
				),
				'carousel_settings'		=> array(
					'thumbnail_size'	=> $thumbnail_size,
					'no_of_column'		=> $no_of_column,
					'excerpt_length'	=> $excerpt_length,
					'adaptive_height'	=> $adaptive_height,
				),
			);
			if($term_ids){
				$slain_block_args['query_args']['tax_query'] = array(
					'relation' => 'AND',
					array(
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => $term_ids,
						'operator' => 'IN'
					),
				);
			}

			centurylib_before_widget($args);
			?>
			<div class="boxed-wrapper">
				<div data-layout="<?php echo esc_attr( $carousel_layout ); ?>"
					class="block-wrapper carousel-posts clear-fix <?php echo esc_attr( $carousel_layout ); ?>">
					<div class="block-title-nav-wrap">
						<?php
						$title_args = array(
							'title' => $title,
							'title_target'	=> $title_target,
							'title_link'	=> $title_link,
							'before_title'	=> $before_title,
							'after_title'	=> $after_title,
						);
						do_action( 'centurylib_widget_title', $title_args);
						?>
					</div> <!-- full-width-title-nav-wrap -->
					<div class="block-posts-wrapper">
						<?php slain_carousel_layout_section( $slain_block_args ); ?>
						<?php if($enable_navigation): ?>
							<div class="carousel-nav-action">
								<div class="navPrev carousel-controls"><i class="fa fa-angle-left"></i></div>
								<div class="navNext carousel-controls"><i class="fa fa-angle-right"></i></div>
							</div>
						<?php endif; ?>
					</div><!-- .block-posts-wrapper -->
				</div><!--- .block-wrapper -->
			</div>
			<?php
			centurylib_after_widget($args);
		}

	}

endif;