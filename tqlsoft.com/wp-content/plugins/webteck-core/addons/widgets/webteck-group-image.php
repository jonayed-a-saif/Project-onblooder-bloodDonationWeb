<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class Traga_Group_Image extends Widget_Base {

	public function get_name() {
		return 'tragagroupimage';
	}

	public function get_title() {
		return __( 'Webteck Group Image', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Group Image', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Group Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2'  		=> __( 'Style Two', 'webteck' ),
					'3'  		=> __( 'Style Three', 'webteck' ),
					'4'  		=> __( 'Style Four', 'webteck' ),
					'5'  		=> __( 'Style Five', 'webteck' ),
					'6'  		=> __( 'Style Six', 'webteck' ),
					'7'  		=> __( 'Style Seven', 'webteck' ),
				],
			]
		);

        $this->add_control(
			'image1',
			[
				'label' 		=> __( 'Image 1', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'image2',
			[
				'label' 		=> __( 'Image 2', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout_style' =>  ['3']  ],
			]
		);
		$this->add_control(
			'image3',
			[
				'label' 		=> __( 'Image 3', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout_style' =>  ['3']  ],
			]
		);

		$this->add_control(
			'shape1',
			[
				'label' 		=> __( 'Shape 1', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout_style' =>  ['1', '3', '4', '5', '6']  ],
			]
		);

		$this->add_control(
			'shape2',
			[
				'label' 		=> __( 'Shape 2', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'		=> [ 'layout_style' =>  ['4', '5', '6']  ],
			]
		);
		
		$this->add_control(
			'experience_text',
            [
				'label'         => __( 'Experience Text', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( 'Years Experience' , 'webteck' ),
				'label_block'   => true,
				'condition'		=> [ 'layout_style' =>  ['1', '7']  ],
			]
		);
		$this->add_control(
			'experience_year',
            [
				'label'         => __( 'Experience Year', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default'       => __( '25' , 'webteck' ),
				'label_block'   => true,
				'condition'		=> [ 'layout_style' =>  ['1', '7']  ],
			]
		);
		$this->add_control(
			'experience_counter',
            [
				'label'         => __( 'Counter On', 'webteck' ),
				'type'          => Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'On', 'webteck' ),
				'label_off' 	=> __( 'Off', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'layout_style' =>  ['1', '7']  ],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        if ( $settings['layout_style'] == '1' ) {
			if( $settings['experience_counter'] == 'yes' ) {
				$counter_class = 'counter-number1';
			} else {
				$counter_class = '';
			}
        	echo '<div class="img-box1">';
        		if (!empty($settings['image1']['url'])) {
					
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape1']['url'])) {
	                echo '<div class="shape1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if(!empty($settings['experience_text'])){
					echo '<div class="year-counter">';
						echo '<h3 class="year-counter_number"><span class="'.$counter_class.'">'.wp_kses_post($settings['experience_year']).'</span></h3>';
						echo '<p class="year-counter_text">'.wp_kses_post($settings['experience_text']).'</p>';
					echo '</div>';
	            }
            echo '</div>';

        } elseif ( $settings['layout_style'] == '2' ) {
        	echo '<div class="img-box2">';
        		if(!empty($settings['image1']['url'])){
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
            echo '</div>';
        } elseif ( $settings['layout_style'] == '3' ) {
			echo '<div class="img-box3">';
        		if (!empty($settings['image1']['url'])) {
					
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['image2']['url'])) {
	                echo '<div class="img2">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image2']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['image3']['url'])) {
	                echo '<div class="img3">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image3']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape1']['url'])) {
	                echo '<div class="shape1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape1']['url']  ),
		                ));
	                echo '</div>';
	            }
            echo '</div>';
		} elseif ( $settings['layout_style'] == '4' ) {
			echo '<div class="img-box6">';
        		if (!empty($settings['image1']['url'])) {
					
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape1']['url'])) {
	                echo '<div class="shape1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape2']['url'])) {
	                echo '<div class="shape2">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape2']['url']  ),
		                ));
	                echo '</div>';
	            }
            	echo '<div class="color-animate"></div>';
            echo '</div>';
		} elseif ( $settings['layout_style'] == '5' ) {
			echo '<div class="img-box7">';
        		if (!empty($settings['image1']['url'])) {
					
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape1']['url'])) {
	                echo '<div class="shape1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape2']['url'])) {
	                echo '<div class="shape2">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape2']['url']  ),
		                ));
	                echo '</div>';
	            }
            	echo '<div class="color-animate"></div>';
            echo '</div>';
		} elseif ( $settings['layout_style'] == '6' ) {
			echo '<div class="img-box8">';
        		if (!empty($settings['image1']['url'])) {
					
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape1']['url'])) {
	                echo '<div class="shape1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape1']['url']  ),
		                ));
	                echo '</div>';
	            }
	            if (!empty($settings['shape2']['url'])) {
	                echo '<div class="shape2">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['shape2']['url']  ),
		                ));
	                echo '</div>';
	            }
            	echo '<div class="color-animate"></div>';
            echo '</div>';
		} elseif ( $settings['layout_style'] == '7' ) {
			if( $settings['experience_counter'] == 'yes' ) {
				$counter_class = 'counter-number1';
			} else {
				$counter_class = '';
			}
        	echo '<div class="img-box5">';
        		if (!empty($settings['image1']['url'])) {
					
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
		                    'url'   => esc_url( $settings['image1']['url']  ),
		                    'class'   => 'tilt-active',
		                ));
	                echo '</div>';
	            }
	            if(!empty($settings['experience_text'])){
					echo '<div class="year-counter">';
						echo '<h3 class="year-counter_number"><span class="'.$counter_class.'">'.wp_kses_post($settings['experience_year']).'</span></h3>';
						echo '<p class="year-counter_text">'.wp_kses_post($settings['experience_text']).'</p>';
					echo '</div>';
	            }
	            if(!empty($settings['experience_year'])){
	                echo '<a href="'.esc_url($settings['experience_counter']).'" class="order-btn"></a>';
	            }
            echo '</div>';
		}
         
	}

}

