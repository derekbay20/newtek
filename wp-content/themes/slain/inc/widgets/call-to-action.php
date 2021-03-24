<?php
/**
 * EDM: Banner Ads
 *
 * Widget show the banner ads of different size
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if(!class_exists( 'Slain_Call_To_Action_Widget' ) ):

	class Slain_Call_To_Action_Widget extends Centurylib_Master_Widget{

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'call-to-action',
				'description' => esc_html__( 'Call to action', 'slain' )
			);
			parent::__construct( 'slain_call_to_action', esc_html__( 'SL - Call to Action', 'slain' ), $widget_ops );
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
									'name'       => 'title',
									'default'  => esc_html__( 'Enter the title', 'slain' ),
									'title'      => esc_html__( 'Title', 'slain' ),
									'type' => 'text'
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
								'background_color' => array(
									'name'       => 'background_color',
									'title'      => esc_html__( 'Select background color', 'slain' ),
									'type' => 'color',
								),
								'background_image' => array(
									'name'       => 'background_image',
									'title'      => esc_html__( 'Select background image', 'slain' ),
									'type' => 'upload',
								),
								'is_parallax'    => array(
									'name'       => 'is_parallax',
									'title'      => esc_html__( 'Enable parallax', 'slain' ),
									'type' => 'checkbox'
								),
								'description'    => array(
									'name'       => 'description',
									'title'      => esc_html__( 'Description', 'slain' ),
									'type' => 'textarea',
									'centurylib_widgets_row' => 5,
									'default'  => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lobortis scelerisque fermentum dui faucibus in. Mollis nunc sed id semper risus. Tincidunt praesent semper feugiat nibh sed. Massa enim nec dui nunc mattis enim ut.', 'slain')
								),
								'button_text'    => array(
									'name'       => 'button_text',
									'title'      => esc_html__( 'Button Text', 'slain' ),
									'type' => 'text',
									'default'  => esc_html__( 'View More', 'slain'),
								),
								'button_target' => array(
									'name'       => 'button_target',
									'title'      => esc_html__( 'Open in new tab', 'slain' ),
									'type' => 'select',
									'default'  => '_self',
									'options' => centurylib_link_target(),
									'relation' => array(
                                        'exist' => array(
                                            'show_fields'   => array(
                                                'cta-button-link', 
                                            ),
                                        ),
                                        'empty' => array(
                                            'hide_fields'   => array(
                                                'cta-button-link', 
                                            ),
                                        ),
                                    ),
								),
								'button_url'     => array(
									'name'       => 'button_url',
									'title'      => esc_html__( 'Button Link', 'slain' ),
									'type' => 'url',
									'default'  => '#',
									'wrapper'   => 'cta-button-link',
								)
							)
						),
						'layout'=>array(
							'title'=>esc_html__('Layout', 'slain'),
							'options'=> array(
								'cta_layout' => array(
									'name'       => 'cta_layout',
									'title'      => esc_html__( 'CTA Layout', 'slain' ),
									'type' => 'select',
									'default' => 'layout1',
									'options' => array(
										'layout1'	=> esc_html__( 'Layout One', 'slain' ),
										'layout2'	=> esc_html__( 'Layout Two', 'slain' ),
									),
								),
							),
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

			if ( empty( $instance ) ) {
				return;
			}

			$cta_layout  = isset( $instance['cta_layout'] ) ? esc_attr($instance['cta_layout']) : 'layout1';		
			centurylib_before_widget($args);

			if($cta_layout == 'layout2' ){
				$this->layout_two($args, $instance);
			}else{
				$this->layout_one( $args, $instance );	
			}	
			
			centurylib_after_widget($args);

		}

		public function layout_two($args, $instance){

			extract( $args );

			$title  = isset( $instance['title'] ) ? $instance['title'] : '';
			$title 	= apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $title_target      = isset( $instance['title_target'] ) ? $instance['title_target']: '';
            $title_link  = isset( $instance['title_link'] ) ? $instance['title_link'] : '';
			$background_color = isset( $instance['background_color'] ) ? $instance['background_color'] : '';
			$background_image = isset( $instance['background_image'] ) ? $instance['background_image'] : '';
			$is_parallax    = isset( $instance['is_parallax'] ) ? true : '';
			$description    = isset( $instance['description'] ) ? $instance['description'] : '';
			$button_url     = isset( $instance['button_url'] ) ? $instance['button_url'] : '';
			$button_text    = isset( $instance['button_text'] ) ? $instance['button_text'] : '';
			$button_target  = isset( $instance['button_target'] ) ? $instance['button_target'] : '';
			$cta_layout  = isset( $instance['cta_layout'] ) ? esc_attr($instance['cta_layout']) : 'layout1';
			?>
			<div class="cta-section" style="background-image:url(<?php echo esc_url($background_image); ?>); background-color: <?php echo esc_attr($background_color); ?>;">
				<div class="boxed-wrapper">
					<div class="section-wrap">
						<div class="title-desc-wrap">
							<h2 class="section-title">
								<?php 
								if($title){
									if($title_target){
										?><a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>"><?php
									}
									echo $title;
									if($title_target){
										?></a><?php
									}
								}
								?>
							</h2>
							<p><?php echo esc_html( $description ); ?></p>
						</div>
						<div class="button-wrap">
							<a class="read-more button" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>" ><?php echo esc_html($button_text); ?></a>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		public function layout_one($args, $instance){

			extract( $args );

			$title  = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
			$title 	= apply_filters( 'widget_title', $title, $instance, $this->id_base );
            $title_target      = isset( $instance['title_target'] ) ? esc_html( $instance['title_target'] ) : '';
            $title_link  = isset( $instance['title_link'] ) ? esc_html( $instance['title_link'] ) : '';
			$background_color = isset( $instance['background_color'] ) ? $instance['background_color'] : '';
			$background_image = isset( $instance['background_image'] ) ? $instance['background_image'] : '';
			$is_parallax    = isset( $instance['is_parallax'] ) ? true : '';
			$description    = isset( $instance['description'] ) ? $instance['description'] : '';
			$button_url     = isset( $instance['button_url'] ) ? $instance['button_url'] : '';
			$button_text    = isset( $instance['button_text'] ) ? $instance['button_text'] : '';
			$button_target  = isset( $instance['button_target'] ) ? '_blank' : '_self';

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
			<div class="cta-wrapper">
				<div class="cta-content <?php echo esc_attr( $is_parallax ) ? 'parallax' : ''; ?> <?php echo esc_attr( $background_image ) ? 'has-overlay' : 'no-overlay'; ?>"
					style="background-image:url(<?php echo esc_url($background_image); ?>); background-color: <?php echo esc_attr($background_color); ?>;">
					<div class="boxed-wrapper">
						<?php 
						if($title){
							?><<?php echo esc_attr($title_tag_name); ?> class="section-title"><?php
							if($title_target){
								?><a href="<?php echo esc_url($title_link); ?>" target="<?php echo esc_attr($title_target); ?>"><?php
							}
							echo $title;
							if($title_target){
								?></a><?php
							}
							?></<?php echo esc_attr($title_tag_name); ?>><?php
						}
						?>
						<p><?php echo esc_html( $description ); ?></p>
						<?php
						if ( ! empty( $button_url ) ) {
							?>
							<a 
							class="button button-primary cta-button" 
							href="<?php echo esc_url( $button_url ); ?>"
							target="<?php echo esc_attr( $button_target ); ?>">
							<?php echo esc_html( $button_text ) ?>
						</a>
						<?php
					}
					?>
				</div>
			</div>
		</div><!-- .ads-wrapper -->
		<?php

	}

}
endif;