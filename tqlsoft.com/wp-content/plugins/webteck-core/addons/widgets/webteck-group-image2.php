<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Repeater;
/**
 *
 * Group Image Box Widget .
 *
 */
class Webteck_Group_Image extends Widget_Base {

	public function get_name() {
		return 'webteckgrpimg';
	}

	public function get_title() {
		return __( 'Group Image', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'featuresd_section',
			[
				'label' 	=> __( 'Group Image', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Group Image Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  	=> __( 'Style Three', 'webteck' ),
					'layout_four'  	=> __( 'Style Four', 'webteck' ),
					'layout_five'  	=> __( 'Style Five', 'webteck' ),
					'layout_six'  	=> __( 'Style Six', 'webteck' ),
				]
			]
		);
		
		
        $this->end_controls_section();




	    // include webteck_get_elementor_option('group-image-one-options.php');
	    include webteck_get_elementor_option('group-image-two-options.php');
	    include webteck_get_elementor_option('group-image-three-options.php');
	    include webteck_get_elementor_option('group-image-four-options.php');
	    include webteck_get_elementor_option('group-image-five-options.php');
	    include webteck_get_elementor_option('group-image-Six-options.php');



	
       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="img-box6">';
	    		if( ! empty( $settings['1_img_1']['url'] ) ){
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
							'url'   => esc_url( $settings['1_img_1']['url'] ),
						) );
	                echo '</div>';
	            }
                echo '<div class="th-experience dance">';
                    echo '<div class="th-experience_content">';
                        echo '<h2 class="experience-year"><span class="counter-number">'.esc_html( $settings['years'] ).'</span></h2>';
                        echo '<p class="experience-text">'.esc_html( $settings['1_content'] ).'</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="faq-img4">';
	    		if( ! empty( $settings['3_img_1']['url'] ) ){
	                echo '<div class="img1 th-anim">';
	                    echo webteck_img_tag( array(
							'url'   => esc_url( $settings['3_img_1']['url'] ),
						) );
	                echo '</div>';
	            }
	            if( ! empty( $settings['3_img_2']['url'] ) ){
	                echo '<div class="img2 dance2 th-anim">';
	                    echo webteck_img_tag( array(
							'url'   => esc_url( $settings['3_img_2']['url'] ),
						) );
	                echo '</div>';
	            }
	            if( ! empty( $settings['3_img_3']['url'] ) ){
	                echo '<div class="faq-client-box jump">';
	                    echo '<div class="client-thumb-group">';
	                        echo webteck_img_tag( array(
								'url'   => esc_url( $settings['3_img_3']['url'] ),
							) );
	                    echo '</div>';
	                    echo '<span class="cilent-box_title">'.esc_html( $settings['3_content'] ).'</span>';
	                echo '</div>';
	            }
                echo '<div class="faq-shape"></div>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_three' ){
	    	echo '<div class="img-box10 text-center mb-xl-0 mt-xl-0 mt-n4">';
		    	echo '<div class="img1">';
		    		if( ! empty( $settings['2_img_1']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['2_img_1']['url'] ),
						) );
		            }
		            if( ! empty( $settings['2_img_2']['url'] ) ){
		                echo '<div class="img2 jump">';
		                    echo webteck_img_tag( array(
								'url'   => esc_url( $settings['2_img_2']['url'] ),
							) );
		                echo '</div>';
		            }
	            echo '</div>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_four' ){
	    	echo '<div class="img-box11">';
                echo '<div class="img1">';
                    if( ! empty( $settings['2_img_1']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['2_img_1']['url'] ),
						) );
		            }
                echo '</div>';
                if( ! empty( $settings['2_img_2']['url'] ) ){
	                echo '<div class="img2 jump">';
	                    echo webteck_img_tag( array(
							'url'   => esc_url( $settings['2_img_2']['url'] ),
						) );
	                echo '</div>';
	            }
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_five' ){
	    	echo '<div class="img-box9">';
                echo '<div class="img1">';
                    if( ! empty( $settings['5_img_1']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['5_img_1']['url'] ),
						) );
		            }
                echo '</div>';
                echo '<div class="img2">';
                    if( ! empty( $settings['5_img_2']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['5_img_2']['url'] ),
						) );
		            }
                echo '</div>';
                echo '<div class="img3">';
                    if( ! empty( $settings['5_img_3']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['5_img_3']['url'] ),
						) );
		            }
                echo '</div>';
                echo '<div class="th-experience">';
                    echo '<div class="th-experience_content">';
                        echo '<h2 class="experience-year"><span class="counter-number">'.esc_html( $settings['6_years'] ).'</span></h2>';
                        echo '<p class="experience-text">'.esc_html( $settings['6_content'] ).'</p>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }else{
	    	echo '<div class="img-box14">';
                echo '<div class="img1">';
                    if( ! empty( $settings['6_img_1']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['6_img_1']['url'] ),
						) );
		            }
                echo '</div>';
                echo '<div class="img2">';
                    if( ! empty( $settings['6_img_2']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['6_img_2']['url'] ),
						) );
		            }
                echo '</div>';
                echo '<div class="img3">';
                    if( ! empty( $settings['6_img_3']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['6_img_3']['url'] ),
						) );
		            }
                echo '</div>';
                echo '<div class="shape1">';
                    if( ! empty( $settings['6_img_4']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['6_img_4']['url'] ),
						) );
		            }
                echo '</div>';
                echo '<div class="shape2">';
                    if( ! empty( $settings['6_img_5']['url'] ) ){
		                echo webteck_img_tag( array(
							'url'   => esc_url( $settings['6_img_5']['url'] ),
						) );
		            }
                echo '</div>';
            echo '</div>';
	    }
	}
}