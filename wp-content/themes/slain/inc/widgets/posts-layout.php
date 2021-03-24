<?php
/**
 * Widget: Block Posts
 *
 * Widget show the block posts from selected category in different layouts.
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */
if(!class_exists( 'Slain_Posts_Layout_Widget' ) ):

	class Slain_Posts_Layout_Widget extends Centurylib_Master_Widget{

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$widget_ops = array(
				'classname'   => 'posts-layout',
				'description' => esc_html__( 'Displays block posts from selected category in different layouts.', 'slain' )
			);
			parent::__construct( 'slain_post_layout', esc_html__( 'SL - Posts Layouts', 'slain' ), $widget_ops );
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
									'default'  => esc_html__( 'Posts', 'slain' ),
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
								'block_term_ids' => array(
									'name'          => 'block_term_ids',
									'title'         => esc_html__( 'Block Category', 'slain' ),
									'default'       => 0,
									'type'   => 'multitermlist',
									'taxonomy' => 'category',
								),
								'tab_term_list' => array(
									'name'         => 'tab_term_list',
									'title'        => esc_html__( 'Tab Category List', 'slain' ),
									'default'      => 'none',
									'type'   => 'select',
									'options' => array(
										'none' => esc_html__( 'None', 'slain' ),
										'selected' => esc_html__( 'Block Category List', 'slain' ),
										'otherterm' => esc_html__( 'Others Category List', 'slain' ),
									),
									'relation' => array(
										'values' => array(
											'otherterm' => array(
												'show_fields'   => array(
													'tabs-terms', 
													'default-tablabel',
												),
											),
											'none' => array(
												'hide_fields'   => array(
													'tabs-terms', 
													'default-tablabel',
												),
											),
											'selected' => array(
												'hide_fields'   => array(
													'tabs-terms', 
												),
												'show_fields'   => array(
													'default-tablabel',
												),
											),
										),
									),
								),
								'tabs_terms' => array(
									'name'         => 'tabs_terms',
									'wrapper'       => 'tabs-terms',
									'title'        => esc_html__( 'Tab Categories', 'slain' ),
									'default'      => 0,
									'type'   => 'multitermlist',
									'taxonomy' => 'category',
								),
								'default_tablabel' => array(
									'name'         => 'default_tablabel',
									'wrapper'       => 'default-tablabel',
									'title'        => esc_html__( 'All Tab Label', 'slain' ),
									'default'      => esc_html__('All', 'slain'),
									'type'         => 'text',
								),
								
							),
						),
						'layout'=>array(
							'title'=>esc_html__('Layout', 'slain'),
							'options'=> array(
								'block_layout' => array(
									'name'         => 'block_layout',
									'title'        => esc_html__( 'Block Layouts', 'slain' ),
									'default'      => 'layout5',
									'type'   => 'select',
									'options' => array(
										'layout1' => esc_html__( 'Layout 1 - (LeftBig - Right list)', 'slain' ),
										'layout2' => esc_html__( 'Layout 2 - (TwoBig - List bottom)', 'slain' ),
										'layout3' => esc_html__( 'Layout 3 - (BigTop - three small)', 'slain' ),
										'layout4' => esc_html__( 'Layout 4 - (Alternate Grid)', 'slain' ),
										'layout5' => esc_html__( 'Layout 5 - (Blog Style)', 'slain' ),
									),
								),
								'largeimg_size' => array(
									'name'         => 'largeimg_size',
									'title'        => esc_html__( 
										'Large Image Size', 'slain' ),
									'default'=> 'full',
									'type' => 'select',
									'options'   => centurylib_get_image_sizes(),
								),
								'large_excerpt_length' => array(
									'name'         => 'large_excerpt_length',
									'title'        => esc_html__( 'Large Description Length', 'slain' ),
									'default'      => '55',
									'type'   => 'number',
									'centurylib_widget_field_description'  => esc_html__( 'Enter the large description length in character.', 'slain'),
								),
								'thumbnail_size' => array(
									'name'         => 'thumbnail_size',
									'title'        => esc_html__( 
										'Thumbnail Image Size', 'slain' ),
									'default'=> 'slain-thumb-600x600',
									'type' => 'select',
									'options'   => centurylib_get_image_sizes(),
								),
								'small_excerpt_length' => array(
									'name'         => 'small_excerpt_length',
									'title'        => esc_html__( 'Small Description Length', 'slain' ),
									'default'      => '25',
									'type'   => 'number',
									'centurylib_widget_field_description'  => esc_html__( 'Enter the short description length in character.', 'slain'),
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

			/*
			 * Title Section
			 */			
			$before_title = (isset($args['before_title'])) ? $args['before_title'] : '';
			$after_title = (isset($args['after_title'])) ? $args['after_title'] : '';

			/*
			 * General Tab
			 */			
			$title  = isset( $instance['title'] ) ? $instance['title'] : '';
			$title 	= apply_filters( 'widget_title', $title, $instance, $this->id_base );
			$title_target      = isset( $instance['title_target'] ) ? $instance['title_target'] : '';
			$title_link  = isset( $instance['title_link'] ) ? $instance['title_link'] : '';
			$block_term_ids = isset( $instance['block_term_ids'] ) ? $instance['block_term_ids'] : '';
			$default_tablabel   = isset( $instance['default_tablabel'] ) ? $instance['default_tablabel'] : '';
			$tab_term_list   = isset( $instance['tab_term_list'] ) ? $instance['tab_term_list'] : 'none';
			$tabs_terms   = isset( $instance['tabs_terms'] ) ? $instance['tabs_terms'] : '';

	        /*
	         * Layout Tab
	         */
	        $block_layout   = isset( $instance['block_layout'] ) ? $instance['block_layout'] : 'layout1';
	        $thumbnail_size = isset( $instance['thumbnail_size'] ) ? $instance['thumbnail_size'] : 'slain-thumb-600x600';
	        $small_excerpt_length   = isset( $instance['small_excerpt_length'] ) ? $instance['small_excerpt_length'] : 25;
	        $largeimg_size = isset( $instance['largeimg_size'] ) ? $instance['largeimg_size'] : 'full';
	        $large_excerpt_length   = isset( $instance['large_excerpt_length'] ) ? $instance['large_excerpt_length'] : 55;

	        centurylib_before_widget($args);

	        $title_args = array(
	        	'title' => $title,
	        	'title_target'=> $title_target,
	        	'title_link' => $title_link,
	        	'before_title'=>$before_title,
	        	'after_title'=>$after_title
	        );
	        if($tab_term_list!='none'){
	        	$title_args['title_terms'] = ($tab_term_list=='otherterm') ? $tabs_terms : $block_term_ids;
	        	$title_args['default_tablabel'] = isset( $instance['default_tablabel'] ) ? esc_attr($instance['default_tablabel']) : '';
	        	$title_args['tab_ajax_data'] = array(
	        		'type'      => 'POST',
	        		'dataType'  => 'json',
	        		'url'       => admin_url( 'admin-ajax.php' ),
	        		'data'      => array(
	        			'action'                => 'slain_block_posts_tabs',
	        			'block_layout'          => $block_layout,
	        			'thumbnail_size'        => $thumbnail_size,
	        			'largeimg_size'         => $largeimg_size,
	        			'small_excerpt_length'  => $small_excerpt_length,
	        			'large_excerpt_length'  => $large_excerpt_length,
	        			'posts_per_page'        => 6,
	        			'block_posts_nonce'    => wp_create_nonce( 'slain_block_post_tabs_nonce' )
	        		),
	        	);
	        }
	        ?>
	        <div class="boxed-wrapper">
	        	<?php
	        	do_action('centurylib_widget_title', $title_args);
	        	?>
	        	<div class="block-wrapper block-posts clear-fix <?php echo esc_attr( $block_layout ); ?>">
	        		<div class="block-posts-wrapper centurylib-tab-alldata tab-active">
	        			<?php
	        			$slain_args = array(
	        				'terms_ids' => $block_term_ids,
	        				'thumbnail_size' => $thumbnail_size,
	        				'largeimg_size' => $largeimg_size,
	        				'small_excerpt_length'  => $small_excerpt_length,
	        				'large_excerpt_length' => $large_excerpt_length,
	        			);
	        			switch ( $block_layout ) {
	        				case 'layout2':
	        				slain_block_second_layout_section( $slain_args );
	        				break;
	        				case 'layout3':
	        				slain_block_box_layout_section( $slain_args );
	        				break;
	        				case 'layout4':
	        				slain_block_alternate_grid_section( $slain_args );
	        				break;
	        				case 'layout5':
	        				slain_block_blog_style_section( $slain_args );
	        				break;
	        				default:
	        				slain_block_one_layout_section( $slain_args );
	        				break;
	        			}
	        			?>
	        			<?php do_action( 'slain_widget_blockposts_pagination', $slain_args ); ?>
	        		</div><!-- .block-posts-wrapper -->
	        		<figure class="tcy-wdgt-preloader hidden">
	        			<span class="helper"></span>
	        			<img src="<?php echo esc_url( centurylib_directory_uri('assets/img/preloader/loader1.gif') ); ?>" height="100" width="100" alt="Preloader" title="Preloader" />
	        		</figure>
	        	</div><!--- .block-wrapper -->
	        </div>
	        <?php
	        centurylib_after_widget($args);

	    }

	}

endif;