<?php
/**
* @version  1.0
* @package  webteck
* @author   Traga <support@webteck.com>
*
* Websites: http://www.vecurosoft.com
*
*/

/**************************************
* Creating About Me Widget
***************************************/

class webteck_about_me_widget extends WP_Widget {

        function __construct() {
        
            parent::__construct(
                // Base ID of your widget
                'webteck_about_me_widget', 
            
                // Widget name will appear in UI
                esc_html__( 'Webteck :: About Me', 'webteck' ),
            
                // Widget description
                array( 
                    'classname'   					=> 'widget_admin',
                    'customize_selective_refresh' 	=> true,  
                    'description' 					=> esc_html__( 'Add About Me Widget', 'webteck' ),   
                )
            );

        }
    
        // This is where the action happens
        public function widget( $args, $instance ) {
            
            $about_img  	= ( !empty( $instance['about_img'] ) ) ? $instance['about_img'] : "";
            $author_name  	= ( !empty( $instance['author_name'] ) ) ? $instance['author_name'] : "";  
            $desc  			= ( !empty( $instance['desc'] ) ) ? $instance['desc'] : "";
            
            //before and after widget arguments are defined by themes
            echo '<!-- Author Widget -->';
            echo $args['before_widget']; 

            echo '<div class="author-widget-wrap">';
            	if( !empty( $about_img ) ) {
	                echo '<div class="avater">';
	                    echo webteck_img_tag( array(
                            "url"   => esc_url( $about_img ),
                        ) );
	                echo '</div>';
	            }
	            if( !empty( $author_name ) ) {
	                echo '<div class="author-info">';
	                    echo '<h4 class="name">'.esc_html( $author_name ).'</h4>';
	                echo '</div>';
	            }
	            if( !empty( $desc ) ) {
	                echo '<p class="author-bio">'.esc_html( $desc ).'</p>';
	            }
                echo '<div class="author-social">';
                    webteck_social_icon();
                echo '</div>';
            echo '</div>';
            echo $args['after_widget'];
            echo '<!-- End of Author Widget -->';
        }
            
        // Widget Backend 
        public function form( $instance ) {
    
            // Author Name	
            if ( isset( $instance[ 'author_name' ] ) ) {
                $author_name = $instance[ 'author_name' ];
            }else {
                $author_name = '';
            }
			
            // Description
            if ( isset( $instance[ 'desc' ] ) ) {
                $desc = $instance[ 'desc' ];
            }else {
                $desc = '';
            }
            
            //Image
            if ( isset( $instance[ 'about_img' ] ) ) {
                $about_img = $instance[ 'about_img' ];
            }else {
                $about_img = '';
            }

            // Widget admin form
            ?>

            <p>
                <label for="<?php echo $this->get_field_id( 'author_name' ); ?>"><?php _e( 'Author Name:' ,'webteck'); ?></label> 
                <input class="widefat" id="<?php echo $this->get_field_id( 'author_name' ); ?>" name="<?php echo $this->get_field_name( 'author_name' ); ?>" type="text" value="<?php echo esc_attr( $author_name ); ?>" />
            </p>
            <input class="widefat" id="<?php echo $this->get_field_id( 'about_img' ); ?>" name="<?php echo $this->get_field_name( 'about_img' ); ?>" type="text" placeholder="<?php echo esc_attr__('Image url', 'webteck'); ?>" value="<?php echo esc_attr( $about_img ); ?>" />

            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php _e( 'Description:' ,'webteck'); ?></label> 
                <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" cols="30" rows="10"><?php echo wp_kses_post( $desc ); ?></textarea>
            </p>
            <p>
               <?php echo __( 'Add Social link from ','webteck') . '<a href="'.esc_url( admin_url('admin.php?page=Traga&tab=17') ).'">'.__('Here','webteck').'</a>'; ?>
            </p>
			
            <?php 
        }
    
        
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            
            $instance = array();     
            $instance['author_name'] 	= ( ! empty( $new_instance['author_name'] ) ) ? strip_tags( $new_instance['author_name'] ) : '';      
            $instance['desc'] 	        = ( ! empty( $new_instance['desc'] ) ) ? wp_kses_post( $new_instance['desc'] ) : '';        
            $instance['about_img'] 	    = ( ! empty( $new_instance['about_img'] ) ) ? strip_tags( $new_instance['about_img'] ) : '';
            return $instance;
        }
    } // Class webteck_about_me_widget ends here
    

    // Register and load the widget
    function webteck_about_me_load_widget() {
        register_widget( 'webteck_about_me_widget' );
    }
    add_action( 'widgets_init', 'webteck_about_me_load_widget' );