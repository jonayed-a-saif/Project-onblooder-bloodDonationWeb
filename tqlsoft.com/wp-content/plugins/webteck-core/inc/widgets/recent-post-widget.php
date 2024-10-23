<?php

/**
* @version  1.0
* @package  Traga
* @author   Themeholy <support@angfuzsoft.com>
*
* Websites: http://www.angfuzsoft.com
*
*/
/**************************************
* Creating Recent Post Widget
***************************************/

class webteck_recent_posts_widget extends WP_Widget {

        function __construct() {

            parent::__construct(

                // Base ID of your widget

                'webteck_recent_posts_widget',

                // Widget name will appear in UI

                esc_html__( 'Webteck :: Recent Posts', 'webteck' ),

                // Widget description

                array(
                    'classname'                     => 'widget',
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add Recent Posts Widget', 'webteck' ),
                )
            );
        }



        // This is where the action happens

        public function widget( $args, $instance ) {

            $title      = ( !empty( $instance['title'] ) ) ? $instance['title'] : ""; 
            $show_date      = isset( $instance['show_date'] ) ? $instance['show_date'] : false;


            //Post Count
            if ( isset( $instance[ 'post_count' ] ) ) {
                $post_count = $instance[ 'post_count' ];
            }else {
                $post_count = '4';
            }

            //before and after widget arguments are defined by themes

            echo $args['before_widget'];

                if( !empty( $title ) ){
                    echo '<h3 class="widget_title">'.esc_html( $title ).'</h3>';
                }
                $query_args = array(
                    "post_type"             => "post",
                    "posts_per_page"        => esc_attr( $post_count ),
                    "post_status"           => "publish",
                    "ignore_sticky_posts"   => true,
                );



                $recentposts = new WP_Query( $query_args );

                if( $recentposts->have_posts(  ) ) {

                    echo '<div class="recent-post-wrap">';
                        while( $recentposts->have_posts(  ) ) {
                            $recentposts->the_post();     
                            echo '<div class="recent-post">';
                                if( has_post_thumbnail() ){
                                    echo '<div class="media-img">';
                                        echo '<a href="'.get_the_permalink().'">';
                                            echo webteck_img_tag( array(
                                                "url"   => esc_url( get_the_post_thumbnail_url( null, 'webteck_80X80' ) ),
                                            ) );
                                        echo '</a>';
                                    echo '</div>';
                                }
                                echo '<div class="media-body">';
                                    
                                    echo '<h4 class="post-title">';
                                        echo '<a class="text-inherit" href="'.esc_url( get_the_permalink() ).'">'.wp_trim_words( wp_kses_post( get_the_title() ), '6', '' ).'</a>';
                                    echo '</h4>';
                                    echo '<div class="recent-post-meta">';
                                        if($show_date){
                                            echo '<a href="'.esc_url( get_the_permalink() ).'"><i class="fal fa-calendar-days"></i> '.esc_html( get_the_time( 'M d Y' ) ).'</a>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        wp_reset_postdata();
                        }        
                    echo '</div>';
                }
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {

            //Title
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }

            //Post Count
            if ( isset( $instance[ 'post_count' ] ) ) {
                $post_count = $instance[ 'post_count' ];
            }else {
                $post_count = '4';
            }

            // Show Date

            $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;


            // Widget admin form

            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'webteck'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'post_count' ); ?>"><?php _e( 'Number of Posts to show:' ,'webteck'); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'post_count' ); ?>" name="<?php echo $this->get_field_name( 'post_count' ); ?>" type="text" value="<?php echo esc_attr( $post_count ); ?>" />
            </p>
            <p>
                <input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
            </p>
            <?php
        }


        // Updating widget replacing old instances with new

        public function update( $new_instance, $old_instance ) {

            $instance = array();
            $instance['title']          = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['post_count']     = ( ! empty( $new_instance['post_count'] ) ) ? strip_tags( $new_instance['post_count'] ) : '4';
            $instance['show_date']      = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;

            return $instance;
        }
    } // Class webteck_recent_posts_widget ends here


    // Register and load the widget
    function webteck_recent_posts_load_widget() {
        register_widget( 'webteck_recent_posts_widget' );
    }
    add_action( 'widgets_init', 'webteck_recent_posts_load_widget' );