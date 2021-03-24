<?php
/**
 * @widget_name: Author Widget
 * @description: The Widget will display author details in your sidebar with lot's of filters
 * @package: themecentury
 * @subpackage: centurylib
 * @author: themecentury
 * @author_uri: https://themecentury.com
 * @since 1.0.0
 */

if (!class_exists('Centurylib_Author_Info_Widget')) {

    class Centurylib_Author_Info_Widget extends Centurylib_Master_Widget {

        public  function __construct() {

            $widget_options = array(
                'classname' => 'centurylib-autor-info',
                'description' => esc_html__( 'A widget to display posts and thumbs with a lots of filters.', 'slain' ));
            parent::__construct('centurylib-autor-info', esc_html__( 'SL - Author Info', 'slain' ), $widget_options);	

        }

    	/**
    	 * Helper function that holds widget fields
    	 * Array is used in update and form functions
    	 */
    	public function widget_fields( $instance = array() ){

            $centurylib_author_listing = centurylib_author_listing();
            $centurylib_link_target = centurylib_link_target();

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
                                    'default'  => esc_html__( 'Author Info', 'slain' ),
                                    'type'     => 'text',
                                ),
                                'title_target'    => array(
                                    'name'     => 'title_target',
                                    'wrapper'   => 'title-target',
                                    'title'    => esc_html__( 'Title Target', 'slain' ),
                                    'default'  => '',
                                    'type'     => 'select',
                                    'options'  => $centurylib_link_target,
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
                                'author_id'    => array(
                                    'name'     => 'author_id',
                                    'wrapper'   => 'centurylib-post-type',
                                    'title'    => esc_html__( 'Choose author/user', 'slain' ),
                                    'default'  => 'post',
                                    'type'     => 'select',
                                    'options'  => $centurylib_author_listing,
                                ),
                                'author_designation'   => array(
                                    'name'     => 'author_designation',
                                    'wrapper'   => 'author-designation',
                                    'title'    => esc_html__( 'Author Designation', 'slain' ),
                                    'default'  => esc_html__('CEO / Co-Founder', 'slain'),
                                    'type'     => 'text',
                                ),
                                'show_avatar'    => array(
                                    'name'     => 'show_avatar',
                                    'wrapper'   => 'show-avatar',
                                    'title'    => esc_html__( 'Show Author Avatar?', 'slain' ),
                                    'default'  => 1,
                                    'type'     => 'checkbox',
                                    'relation' => array(
                                        'exist' => array(
                                            'show_fields'   => array(
                                                'avatar-size', 
                                            ),
                                        ),
                                        'empty' => array(
                                            'hide_fields'   => array(
                                                'avatar-size', 
                                            ),
                                        ),
                                    ),
                                ),
                                'avatar_size'          => array(
                                    'name'     => 'avatar_size',
                                    'wrapper'   => 'avatar-size',
                                    'title'    => esc_html__( 'Avatar Size', 'slain' ),
                                    'default'  => 150,
                                    'type'     => 'number'
                                )
                            )
),
'layout'=>array(
    'title'    => esc_html__('Layout', 'slain'),
    'options'          => array(
        'show_description'=>array(
            'name'     => 'show_description',
            'title'    => esc_html__( 'Show Author Description?', 'slain' ),
            'default'  => 1,
            'type'     => 'checkbox',
            'relation' => array(
                'empty'=>array(
                    'hide_fields'=>array(
                        'description-limit',
                    ),
                ),
                'exist'=>array(
                    'show_fields'=>array(
                        'description-limit',
                    ),
                ),
            ),
        ),
        'description_limit'=>array(
            'name'     => 'description_limit',
            'title'    => esc_html__( 'Description Limit', 'slain' ),
            'wrapper'   => 'description-limit',
            'default'  => '300',
            'type'     => 'number',
            'description'=> esc_html__('Specify number of characters to limit author description length', 'slain'),
        ),
        'author_link_target'=>array(
            'name'     => 'author_link_target',
            'wrapper'   => 'view-all-option',
            'title'         => esc_html__( 'Author link target', 'slain' ),
            'default'  => 'disable',
            'type'     => 'select',
            'options'  => $centurylib_link_target,
        ),
        'all_link_text'=>array(
            'name'     => 'all_link_text',
            'wrapper'   => 'all-link-text',
            'title'    => esc_html__( 'All link text', 'slain' ),
            'default'  => esc_html__( 'View All', 'slain' ),
            'type'     => 'text',
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
    	 * Display the widget
    	 */	
    	function widget( $args, $instance ) {

            /*
             * Args Values
             */
            $before_title = isset( $args['before_title'] ) ? $args['before_title'] : '';
            $after_title  = isset( $args['after_title'] ) ? $args['after_title'] : '';

            /*
             * Instance General Tab Value
             */
            $title      = isset( $instance['title'] ) ? esc_html( $instance['title'] ) : '';
            $title_target      = isset( $instance['title_target'] ) ? esc_html( $instance['title_target'] ) : '';
            $title_link      = isset( $instance['title_link'] ) ? esc_html( $instance['title_link'] ) : '';
            $author_id    = isset($instance['author_id']) ? absint( $instance['author_id'] ) : 0;
            $author_designation       = isset( $instance['author_designation'] ) ? esc_html( $instance['author_designation'] ) : '';
            $show_avatar       = isset( $instance['show_avatar'] ) ? esc_html( $instance['show_avatar'] ) : '';
            $avatar_size       = isset( $instance['avatar_size'] ) ? esc_html( $instance['avatar_size'] ) : 120;

            /*
             * Instance Layout Tab Value
             */
            $show_description = isset( $instance['show_description'] ) ? absint( $instance['show_description'] ) : 0;
            $description_limit = isset( $instance['description_limit'] ) ? absint( $instance['description_limit'] ) : '';
            $author_link_target = isset( $instance['author_link_target'] ) ? esc_attr( $instance['author_link_target'] ) : '';
            $all_link_text = isset( $instance['all_link_text'] ) ? esc_html( $instance['all_link_text'] ) : '';

            //Get origional Author Link for author_id
            $author_link = get_author_posts_url( get_the_author_meta( 'ID', $author_id ) );
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
            <div class="card card-profile">
                <?php if ( $show_avatar ) { ?>
                    <div class="card-avatar">
                        <a href="<?php echo esc_url($author_link); ?>"><?php 
                        echo get_avatar( get_the_author_meta( 'ID', $author_id ), $avatar_size ); 
                        ?></a>
                    </div>
                <?php } ?>
                <div class="card-content">
                    <?php 
                    if ( ! empty( $author_designation ) ): 
                        ?><h5 class="category text-gray"><?php echo esc_html( $author_designation ) ?></h5><?php 
                    endif; 
                    ?>
                    <h4 class="card-title"><?php echo esc_html(get_the_author_meta( 'display_name', $author_id ) ); ?></h4>
                    <?php 
                    if ( $show_description ) : ?>
                        <div class="card-description">
                            <?php 
                            $description = get_the_author_meta( 'description', $author_id ); 
                            echo wpautop( $this->trim_chars( $description, $description_limit ) );
                            if ( $author_link_target && $all_link_text ) : 
                                ?><a href="<?php echo esc_url( $author_link ); ?>"
                                   class="button secondary radius "><?php echo esc_html( $all_link_text ); ?></a><?php 
                               endif;
                               ?>
                           </div>
                           <?php 
                       endif; 
                       ?>
                   </div>
               </div>
               <?php 
               centurylib_after_widget($args);
           }

        /**
         * Limit character description
         *
         * @param string $string Content to trim
         * @param int $limit Number of characters to limit
         * @param string $more Chars to append after trimmed string
         *
         * @return string Trimmed part of the string
         */
        public function trim_chars( $string, $limit, $more = '...' ) {
            if ( ! empty( $limit ) ) {
                $text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $string ), ' ' );
                preg_match_all( '/./u', $text, $chars );
                $chars = $chars[0];
                $count = count( $chars );

                if ( $count > $limit ) {
                    $chars = array_slice( $chars, 0, $limit );

                    for ( $i = ( $limit - 1 ); $i >= 0; $i -- ) {
                        if ( in_array( $chars[ $i ], array( '.', ' ', '-', '?', '!' ) ) ) {
                            break;
                        }
                    }

                    $chars  = array_slice( $chars, 0, $i );
                    $string = implode( '', $chars );
                    $string = rtrim( $string, ".,-?!" );
                    $string .= $more;
                }
            }

            return $string;
        }
    }

}