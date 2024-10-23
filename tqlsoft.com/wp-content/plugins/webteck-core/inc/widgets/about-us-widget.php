<?php
/**
* @version  1.0
* @package  webteck
* @author   Traga <support@angfuzsoft.com>
*
* Websites: http://www.angfuzsoft.com
*
*/

/**************************************
* Creating About Us Widget
***************************************/

class webteck_aboutus_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                // Base ID of your widget
                'webteck_aboutus_widget',

                // Widget name will appear in UI
                esc_html__( 'Webteck :: About Us Widget', 'webteck' ),

                // Widget description
                array(
                    'customize_selective_refresh'   => true,
                    'description'                   => esc_html__( 'Add About Us Widget', 'webteck' ),
                    'classname'                     => 'no-class',
                )
            );

        }

        // This is where the action happens
        public function widget( $args, $instance ) {

            $title              = apply_filters( 'widget_title', $instance['title'] );
            $about_us           = apply_filters( 'widget_about_us', $instance['about_us'] );
            $social_icon        = isset( $instance['social_icon'] ) ? $instance['social_icon'] : false; 


            //before and after widget arguments are defined by themes
            echo $args['before_widget'];
                if( !empty( $title ) ){
                    echo '<h3 class="widget_title">'.esc_html($title).'</h3>';
                }
                echo '<div class="th-widget-about">';
                    if( !empty( $about_us ) ){
                        echo '<p class="about-text">'.wp_kses_post( $about_us ).'</p>';
                    }                    
                    if ( !empty( $social_icon ) ){
                        echo '<div class="th-social">';
                            webteck_social_icon();
                        echo '</div>';
                    }
                echo '</div>';
            echo $args['after_widget'];
        }

        // Widget Backend
        public function form( $instance ) {           
            
            if ( isset( $instance[ 'about_us' ] ) ) {
                $about_us = $instance[ 'about_us' ];
            } else {
                $about_us = '';
            }

            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            } else {
                $title = '';
            }

            $social_icon = isset( $instance['social_icon'] ) ? (bool) $instance['social_icon'] : false;
            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>">
                    <?php
                        _e( 'Title:' , 'webteck');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" rows="1" cols="80"><?php echo esc_html( $title ); ?></textarea>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'about_us' ); ?>">
                    <?php
                        _e( 'About Us:' , 'webteck');
                    ?>
                </label>
                <textarea class="widefat" id="<?php echo $this->get_field_id( 'about_us' ); ?>" name="<?php echo $this->get_field_name( 'about_us' ); ?>" rows="8" cols="80"><?php echo esc_html( $about_us ); ?></textarea>
            </p>


            <p>
                <input class="checkbox" type="checkbox"<?php checked( $social_icon ); ?> id="<?php echo $this->get_field_id( 'social_icon' ); ?>" name="<?php echo $this->get_field_name( 'social_icon' ); ?>" />
                <label for="<?php echo $this->get_field_id( 'social_icon' ); ?>"><?php _e( 'Display Social Icon?' ); ?></label>
            </p>
            
            <?php
        }


         // Updating widget replacing old instances with new
         public function update( $new_instance, $old_instance ) {

            $instance = array();          
            $instance['title']           = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['about_us']           = ( ! empty( $new_instance['about_us'] ) ) ? strip_tags( $new_instance['about_us'] ) : '';

            $instance['social_icon']      = isset( $new_instance['social_icon'] ) ? (bool) $new_instance['social_icon'] : false;
            return $instance;
        }
    } // Class webteck_aboutus_widget ends here


    // Register and load the widget
    function webteck_aboutus_load_widget() {
        register_widget( 'webteck_aboutus_widget' );
    }
    add_action( 'widgets_init', 'webteck_aboutus_load_widget' );