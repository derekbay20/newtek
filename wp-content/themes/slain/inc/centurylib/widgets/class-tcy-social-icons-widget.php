<?php
/**
 * @widget_name: Social Icons Widget
 * @description: This class handles everything that needs to be handled with the widget:the settings, form, display, and update.  Nice!
 * @package: themecentury
 * @subpackage: centurylib
 * @author: themecentury
 * @author_uri: https://themecentury.com
 * @since 1.0.0
 */
class Centurylib_Social_Icons_Widget extends Centurylib_Master_Widget{
	
	public  function __construct(){

		$widget_options = array(
			'classname' => 'centurylib-social-icons',
			'description' => esc_html__( 'A Widget to display social icons.', 'slain' ));
		parent::__construct('centurylib-social-icons', esc_html__( 'SL - Social Icons', 'slain' ), $widget_options);	

	}

	/**
	 * Helper function that holds widget fields
	 * Array is used in update and form functions
	 */
	public function widget_fields( $instance = array() ){

        $target = centurylib_link_target();

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
                            'title'    => array(
                                'name'     => 'title',
                                'wrapper'   => 'title',
                                'title'    => esc_html__( 'Title', 'slain' ),
                                'default'  => esc_html__( 'Connect with us', 'slain'),
                                'type'     => 'text',
                            ),
                            'title_target'    => array(
                                'name'     => 'title_target',
                                'wrapper'   => 'title-target',
                                'title'    => esc_html__( 'Link Target', 'slain' ),
                                'default'  => '',
                                'type'     => 'select',
                                'options'  => $target,
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
                            'social_icon_size'        => array(
                                'name'         => 'social_icon_size',
                                'title'        => esc_html__( 'Icons Size', 'slain' ),
                                'default'      => '',
                                'type'         => 'select',
                                'options'      => centurylib_faicon_sizes(),
                            ),
                            'social_media_target'        => array(
                                'name'         => 'social_media_target',
                                'title'        => esc_html__( 'Social icon open with', 'slain' ),
                                'default'      => '_blank',
                                'type'         => 'select',
                                'options'      => $target,
                            ),
                            'social_icon_list'         => array(
                                'name'     => 'social_icon_list',
                                'title'    => esc_html__( 'Social Icon List', 'slain' ),
                                'type'     => 'repeater',
                                'description'    => esc_html__('To add social icon click to add icon.', 'slain'),
                                'row_title'    => esc_html__('Social Icon', 'slain'),
                                'addnew_label' => esc_html__('Add Icon', 'slain'),
                                'default' => array(
                                    array(
                                        'social_media_link' => 'https://facebook.com/',
                                        'social_media_icon' => 'fa-facebook',
                                        'social_media_color' => '#0f233a',
                                    ),
                                    array(
                                        'social_media_link' => 'https://twitter.com/',
                                        'social_media_icon' => 'fa-twitter',
                                        'social_media_color' => '#214d74',
                                    ),
                                    array(
                                        'social_media_link' => 'https://linkedin.com/',
                                        'social_media_icon' => 'fa-linkedin',
                                        'social_media_color' => '#214d74',
                                    ),
                                ),
                                'options'  => array(
                                    'social_media_icon'  => array(
                                        'name'     => 'social_media_icon',
                                        'title'    => esc_html__( 'Social Media Icon', 'slain' ),
                                        'default'  => '',
                                        'type'     => 'icon',
                                    ),
                                    'social_media_link' => array(
                                        'name'     => 'social_media_link',
                                        'title'    => esc_html__( 'Social Media Link', 'slain' ),
                                        'default'  => '',
                                        'type'     => 'url',
                                    ),
                                    'social_media_color' => array(
                                        'name'     => 'social_media_color',
                                        'title'    => esc_html__( 'Social Icon Color', 'slain' ),
                                        'default'  => '#00a0d2',
                                        'type'     => 'color',
                                    ),
                                ),
                            ),
                            
                        )
),
),
),
);

$widget_fields_key = 'fields_'.$this->id_base;
$widgets_fields = apply_filters( $widget_fields_key, $fields );
return $widgets_fields;

}

	/**
	 * Display the widget
	 */	
	function widget( $args, $instance ) {

        /*
         * Args Values
         */
        $before_title = isset( $args['before_title'] ) ? $args['before_title'] : '';
        $after_title  = isset( $args['after_title'] ) ? $args['after_title'] : '';

        $title = isset( $instance['title'] ) ? esc_attr($instance['title']) : '';
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $title_link = isset( $instance['title_link'] ) ? esc_url($instance['title_link']) : '';
        $title_target = isset( $instance['title_target'] ) ? esc_attr($instance['title_target']) : '';
        $social_icon_size = isset( $instance['social_icon_size'] ) ? esc_attr($instance['social_icon_size']) : '';
        $social_media_target = isset( $instance['social_media_target'] ) ? esc_attr($instance['social_media_target']) : '';
        $social_icon_list = isset( $instance['social_icon_list'] ) ? $instance['social_icon_list'] : array();

		/* Before widget (defined by themes).
		 * Display the widget title if one was input (before and after defined by themes). 
		 */
		centurylib_before_widget($args);

        $title_args = array(
            'title' => $title,
            'title_target'=> $title_target,
            'title_link' => $title_link,
            'before_title'=>$before_title,
            'after_title'=>$after_title
        );
        do_action('centurylib_widget_title', $title_args);
        ?>
        <div class="social-icons">
            <?php
            foreach($social_icon_list as $index=>$social_media_details){

                $social_media_link = (isset($social_media_details['social_media_link'])) ? esc_attr($social_media_details['social_media_link']) : '';
                $social_media_icon = (isset($social_media_details['social_media_icon'])) ? esc_attr($social_media_details['social_media_icon']) : '';
                $social_media_color = (isset($social_media_details['social_media_color'])) ? esc_attr($social_media_details['social_media_color']) : '';
                ?><a 
                title="<?php esc_attr_e('Social Media Icons', 'slain'); ?>" 
                target="<?php echo esc_attr($social_media_target); ?>" 
                <?php if($social_media_target){ ?>
                    href="<?php echo esc_attr($social_media_link); ?>" 
                <?php } ?> 
                style="background-color:<?php echo esc_attr( $social_media_color ); ?>"
                ><i 
                class="fa <?php echo esc_attr($social_media_icon).' '.esc_attr($social_icon_size); ?>" 
                ></i></a><?php
            }
            ?>
        </div>
        <!-- End  social-icons -->
        <?php	
        /* After widget (defined by themes). */
        centurylib_after_widget($args);

    }

}
