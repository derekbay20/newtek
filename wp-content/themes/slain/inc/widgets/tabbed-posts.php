<?php
/**
 * EDM: Default Tabbed
 *
 * Widget to display latest posts and comment in tabbed layout.
 *
 * @package themecentury
 * @subpackage slain
 * @since 1.0.0
 */

if(!class_exists( 'Slain_Tabbed_Posts_Widget' ) ):

    class Slain_Tabbed_Posts_Widget extends Centurylib_Master_Widget{

	   /**
         * Register widget with WordPress.
         */
       public function __construct() {

            $widget_ops = array(
                'classname' => 'tabbed-posts ',
                'description' => esc_html__( 'A widget shows recent posts and comment in tabbed layout.', 'slain' )
            );
            parent::__construct( 'slain_tabbed_posts', esc_html__( 'SL - Tabbed Posts', 'slain' ), $widget_ops );

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
                                'post_accordion' => array(
                                    'name'         => 'post_accordion',
                                    'title'        => esc_html__( 'Latest Post Accordion', 'slain' ),
                                    'type'   => 'accordion',
                                    'options'=> array(
                                        array(
                                            'name'         => 'latest_tab_title',
                                            'title'        => esc_html__( 'Latest Posts Tab', 'slain' ),
                                            'options'=> array(
                                                'latest_tab_title' => array(
                                                    'name'         => 'latest_tab_title', 'title'        => esc_html__( 'Latest Tab title', 'slain' ), 'default'      => esc_html__( 'Latest', 'slain' ), 'type'   => 'text', 
                                                ),
                                                'no_of_posts' => array(
                                                    'name'         => 'no_of_posts', 'title'        => esc_html__( 'No of latest post.', 'slain' ), 'default'      => 5, 'type'   => 'number', 
                                                ),
                                                'excerpt_length' => array(
                                                    'name'         => 'excerpt_length', 
                                                    'title'        => esc_html__( 'Excerpt Length', 'slain' ), 
                                                    'default'      => 55, 
                                                    'type'   => 'number', 
                                                ),
                                                'image_thumbnail' => array(
                                                    'name'         => 'image_thumbnail', 
                                                    'title'        => esc_html__( 'Thumbnail Size', 'slain' ),
                                                    'default' => 'slain-thumb-400x600',
                                                    'options' => centurylib_get_image_sizes(), 
                                                    'type'   => 'select', 
                                                ),
                                            )
                                        ),
                                    ),
                                ),
                                'comments_accordion' => array(
                                    'name'         => 'comments_accordion',
                                    'title'        => esc_html__( 'Comments Accordion', 'slain' ),
                                    'type'   => 'accordion',
                                    'options'=> array(
                                        array(
                                            'name'         => 'latest_tab_title',
                                            'title'        => esc_html__( 'Comments Tab', 'slain' ),
                                            'options'=> array(
                                                'comments_tab_title' => array(
                                                    'name'         => 'comments_tab_title',
                                                    'title'        => esc_html__( 'Comments Tab title', 'slain' ),
                                                    'default'      => esc_html__( 'Comments', 'slain' ),
                                                    'type'   => 'text'
                                                ),
                                                'no_of_comments' => array(
                                                    'name'         => 'no_of_comments', 'title'        => esc_html__( 'No of comments.', 'slain' ), 'default'      => 5, 'type'   => 'number', 
                                                ),
                                                'comment_length' => array(
                                                    'name'         => 'comment_length', 
                                                    'title'        => esc_html__( 'Comment Length', 'slain' ), 
                                                    'default'      => 55, 'type'   => 'number', 
                                                ),
                                                'comment_thumbnail' => array(
                                                    'name'         => 'comment_thumbnail', 'title'        => esc_html__( 'Comment Image Size(in px).', 'slain' ), 
                                                    'default'      => 150, 'type'   => 'number', 
                                                ),
                                            )
                                        ),
                                    ),
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
         * @param array $args     Widget arguments.
         * @param array $instance Saved values from database.
         */
        public function widget( $args, $instance ) {
            extract( $args );
            if( empty( $instance ) ) {
                return ;
            }

            //Post Accordion
            $latest_tab_title   = isset( $instance['latest_tab_title'] ) ? $instance['latest_tab_title'] :  esc_html__( 'Latest', 'slain' );
            $no_of_posts   = isset( $instance['no_of_posts'] ) ? $instance['no_of_posts'] :  5;
            $excerpt_length   = isset( $instance['excerpt_length'] ) ? $instance['excerpt_length'] :  150;
            $image_thumbnail   = isset( $instance['image_thumbnail'] ) ? $instance['image_thumbnail'] : 'slain-thumb-400x600';

            //Comments Accordion
            $comments_tab_title   = isset( $instance['comments_tab_title'] ) ? $instance['comments_tab_title'] :  esc_html__( 'Comments', 'slain' );
            $no_of_comments   = isset( $instance['no_of_comments'] ) ? $instance['no_of_comments'] :  5;
            $comment_thumbnail   = isset( $instance['comment_thumbnail'] ) ? $instance['comment_thumbnail'] :  150;
            $comment_length   = isset( $instance['comment_length'] ) ? $instance['comment_length'] :  150;

            centurylib_before_widget($args);
            ?>
            <div class="default-tabbed-wrapper clear-fix" id="tabbed-widget<?php echo esc_attr($this->number); ?>">

                <ul class="widget-tabs clear-fix widget-tab" id="widget-tab<?php echo esc_attr($this->number); ?>">
                    <li class="active-item"><a href="#latest<?php echo esc_attr($this->number); ?>"><?php echo esc_html( $latest_tab_title ); ?></a></li>
                    <li><a href="#comments<?php echo esc_attr($this->number); ?>"><?php echo esc_html( $comments_tab_title ); ?></a></li>
                </ul><!-- .widget-tabs -->

                <div id="latest<?php echo esc_attr($this->number); ?>" class="tabbed-section active-content clear-fix">
                    <?php
                    $latest_args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => absint($no_of_posts),
                    );
                    $latest_query = new WP_Query( $latest_args );
                    if( $latest_query->have_posts() ) {
                        while( $latest_query->have_posts() ) {
                            $latest_query->the_post();
                            $thumbanil_class = (has_post_thumbnail( get_the_ID() ) ) ? 'has-thumbnail' : 'no-thumbnail';
                            ?>
                            <div class="single-post clear-fix">
                                <div class="post-thumb <?php echo esc_attr($thumbanil_class); ?>">
                                    <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( $image_thumbnail ); ?> </a>
                                </div><!-- .post-thumb -->
                                <div class="post-content">
                                    <h5 class="post-title small-size"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                                    <?php centurylib_the_excerpt($excerpt_length, false); ?>
                                    <div class="post-meta">
                                        <span class="post-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
                                        <span class="meta-sep">/</span>
                                        <?php comments_popup_link( esc_html__( '0 Comments', 'slain' ), esc_html__( '1 Comment', 'slain' ), '% '. esc_html__( 'Comments', 'slain' ), 'post-comments'); ?>
                                    </div>
                                </div><!-- .post-content -->
                            </div><!-- .single-post -->
                            <?php
                        }
                    }
                    wp_reset_postdata();
                    ?>
                </div><!-- #latest -->

                <div id="comments<?php echo esc_attr($this->number); ?>" class="tabbed-section comments-content clear-fix">
                    <ul>
                        <?php
                        $slain_comments = get_comments( 
                            array( 
                                'status' => 'approve',
                                'number' => $no_of_comments 
                            )
                        );
                        foreach( $slain_comments as $comment  ) {
                            ?>
                            <li class="single-comment clear-fix">
                                <?php
                                $title = get_the_title( $comment->comment_post_ID );
                                echo '<div class="comment-avatar">'. get_avatar( $comment, $comment_thumbnail ) .'</div>';
                                ?>
                                <div class="comment-desc-wrap">
                                    <strong><?php echo esc_html(strip_tags( $comment->comment_author )); ?></strong>
                                    <?php esc_html_e( '&nbsp;commented on', 'slain' ); ?>
                                    <a href="<?php echo esc_url( get_permalink( $comment->comment_post_ID ) ); ?>" rel="external nofollow" title="<?php echo esc_attr( $title ); ?>"> <?php echo esc_html( $title ); ?></a>: <?php echo esc_html(wp_html_excerpt( $comment->comment_content, $comment_length ) ); ?>
                                </div><!-- .comment-desc-wrap -->
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div><!-- #comments -->

            </div><!-- .default-tabbed-wrapper -->
            <?php
            centurylib_after_widget($args);
        }

    }

endif;