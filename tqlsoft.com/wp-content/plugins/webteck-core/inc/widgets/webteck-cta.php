<?php
/**
* @version  1.0
* @package  webteck
*
* Websites: 
*
*/

/**************************************
* Creating CTA Widget
***************************************/

class webteck_newslater_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'webteck_newslater_widget', 
            
                // Widget name will appear in UI
                esc_html__( 'Webteck :: Newslatter', 'webteck' ),
            
                // Widget description
                array( 
                    'customize_selective_refresh'   => true,  
                    'description'                   => esc_html__( 'Add Subscribed Widget', 'webteck' ),   
                    'classname'                     => 'no-class newsletter-widget',
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $title      = ( !empty( $instance['title'] ) ) ? $instance['title'] : "";  
            $subtitle      = ( !empty( $instance['subtitle'] ) ) ? $instance['subtitle'] : "";  
   
            //before and after widget arguments are defined by themes
            echo $args['before_widget']; 

            echo '<h3 class="widget_title">'.esc_html( $title ).'</h3>';
            echo '<p class="footer-text">'.esc_html( $subtitle ).'</p>';
            echo '<form class="newsletter-form">';
                echo '<input class="form-control" type="email" placeholder="Enter Email" required="">';
                echo '<button type="submit" class="icon-btn"><i class="fa-solid fa-paper-plane"></i></button>';
            echo '</form>';
            echo '<div class="bg-shape" data-bg-src="'.WEBTECK_PLUGDIRURI . 'assets/img/bg_pattern_1.png"></div>';

            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }
            
        // Widget Backend 
        public function form( $instance ) {
    
            //Title 
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }else {
                $title = '';
            }
            if ( isset( $instance[ 'subtitle' ] ) ) {
                $subtitle = $instance[ 'subtitle' ];
            }else {
                $subtitle = '';
            }

            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ,'webteck'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>  
            <p>
                <label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ,'webteck'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
            </p>    
            <?php 
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();
            $instance['title']                  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['subtitle']                  = ( ! empty( $new_instance['subtitle'] ) ) ? strip_tags( $new_instance['subtitle'] ) : '';
            return $instance;
        }
    } // Class webteck_newslater_widget ends here
    

    // Register and load the widget
    function webteck_newslater_widget() {
        register_widget( 'webteck_newslater_widget' );
    }
    add_action( 'widgets_init', 'webteck_newslater_widget' );