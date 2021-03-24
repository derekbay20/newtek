<?php
/**
 * EDM: Page Block
 *
 * Widget show the banner ads of different size
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if(!class_exists( 'Slain_Page_Block_Widget' ) ):

	class Slain_Page_Block_Widget extends Centurylib_Master_Widget{

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'slain-page-block',
				'description' => esc_html__( 'Call to action widget', 'slain' )
			);
			parent::__construct( 'slain_page_block_widget', esc_html__( 'SL - Page Block', 'slain' ), $widget_ops );
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
								'block_page_id' => array(
									'name'       => 'block_page_id',
									'title'      => esc_html__( 'Choose Page', 'slain' ),
									'default'  => '',
									'type' => 'pagelist',
								),
								'thumbnail_size' => array(
									'name'       => 'thumbnail_size',
									'title'      => esc_html__( 'Page thumbnail size', 'slain' ),
									'default'  => 'full',
									'type' => 'select',
									'options'   => centurylib_get_image_sizes(),
								),
								'readmore_text' => array(
									'name'       => 'readmore_text',
									'title'      => esc_html__( 'Readmore Button Text', 'slain' ),
									'default'  => esc_html__( 'Read More', 'slain' ),
									'type' => 'text',
								),
								'primary_button_text' => array(
									'name'       => 'primary_button_text',
									'title'      => esc_html__( 'Primary Button Text', 'slain' ),
									'default'  => '',
									'type' => 'text',
								),
								'primary_button_url' => array(
									'name'       => 'primary_button_url',
									'title'      => esc_html__( 'Primary Button url', 'slain' ),
									'default'  => '#',
									'type' => 'url',
								),
								'background_color' => array(
									'name'       => 'background_color',
									'title'      => esc_html__( 'Background color', 'slain' ),
									'default'  => '#1e73be',
									'type' => 'color',
								),
								'background_image' => array(
									'name'       => 'background_image',
									'title'      => esc_html__( 'Background Image', 'slain' ),
									'default'  => '',
									'type' => 'upload',
								),
								'excerpt_length' => array(
									'name'       => 'excerpt_length',
									'title'      => esc_html__( 'Excerpt Length', 'slain' ),
									'default'  => '55',
									'type' => 'number',
								),
							)
						)
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

			extract( $args );
			if ( empty( $instance ) ) {
				return;
			}
           
            $block_page_id  = isset( $instance['block_page_id'] ) ? $instance['block_page_id'] : '';
            $thumbnail_size  = isset( $instance['thumbnail_size'] ) ? $instance['thumbnail_size'] : 'full';
            $readmore_text  = isset( $instance['readmore_text'] ) ? $instance['readmore_text'] : '';
            $primary_button_text  = isset( $instance['primary_button_text'] ) ? $instance['primary_button_text'] : '';
            $primary_button_url  = isset( $instance['primary_button_url'] ) ? $instance['primary_button_url'] : '';
            $background_color  = isset( $instance['background_color'] ) ? sanitize_hex_color( $instance['background_color'] ) : '';        
            $background_image  = isset( $instance['background_image'] ) ? esc_url( $instance['background_image'] ) : '';
            $excerpt_length  = isset( $instance['excerpt_length'] ) ? absint( $instance['excerpt_length'] ) : 55;

			$page_args = array(
				'post_type' 	=> 'page',
				'post_status' 	=> 'publish',
				'posts_per_page' => 1,
			);
			if($block_page_id){
				$page_args['p'] = absint($block_page_id);
			}
			$page_result = new WP_Query($page_args);
			centurylib_before_widget($args);

			$title_tag_name = 'h4';
			$main_widget_areas = array(
				'slain_home_content_area',
				'slain_home_middle_section_area',
				'slain_home_bottom_section_area',
			);
			$widget_area_id = ($args['id']) ? $args['id'] : '';
			if(in_array($widget_area_id, $main_widget_areas)){
				$title_tag_name = 'h2';
			}

			?>
			<div class="about-us-wrapper" style="background-color: <?php echo esc_attr($background_color); ?>; background-image:url(<?php echo esc_url($background_image); ?>);">
				<div class="boxed-wrapper">
					<div class="row about-content-media-wrap">
						<?php 
						if($page_result->have_posts()){
							while($page_result->have_posts()):
								$page_result->the_post();
								?>
								<div class="about-content-part <?php echo (has_post_thumbnail( get_the_ID() )) ? 'has-thumbnail' : 'no-thumbnail';  ?>">
									<div class="about-content-inner">
										<div class="about-block-title">
											<<?php echo esc_attr($title_tag_name); ?>><?php the_title(); ?></<?php echo esc_attr($title_tag_name); ?>>
										</div>
										<?php centurylib_the_excerpt( $excerpt_length, false ); ?>
										<div class="about-btns-wrap buttons-wrap">
											<?php if($readmore_text){ ?>
												<a class="button button-secondary" href="<?php the_permalink(); ?>"><?php echo esc_html($readmore_text); ?></a>
											<?php } ?>
											<?php if($primary_button_text){ ?>
												<a class="button button-primary" href="<?php echo esc_url($primary_button_url); ?>"><?php echo esc_html($primary_button_text); ?></a>
											<?php } ?>
										</div>
									</div> 
								</div>
								<?php if(has_post_thumbnail( get_the_ID() )): ?>
									<div class="about-media-part" style="">
										<figure class="page-thumbnail-wrap">
											<?php the_post_thumbnail( $thumbnail_size ); ?>
										</figure>
									</div>
									<?php
								endif;
							endwhile;
							wp_reset_postdata();
						}
						?>
					</div>
				</div>
			</div>
			<?php
			centurylib_after_widget($args);

		}

	}

endif;