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
 * About Us Box Widget .
 *
 */
class Webteck_Review extends Widget_Base {

	public function get_name() {
		return 'webteckreviews';
	}

	public function get_title() {
		return __( 'Reviews', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'aboutusd_section',
			[
				'label' 	=> __( 'About Us', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'About Us Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					// 'layout_two'  		=> __( 'Style Two', 'webteck' ),
					// 'layout_three'  		=> __( 'Style Three', 'webteck' ),
				]
			]
		);


		$this->add_control(
			'a_title', [
				'label' 		=> __( 'Appointment Label', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Make An Appointment' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Gallery Image', 'acadu' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);

		$this->add_control(
			'c_title', [
				'label' 		=> __( 'Client’s Label', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Happily active client’s' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'number', [
				'label' 		=> __( 'Number', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '258362548' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);

		$this->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '5',
				'options' 	=> [
					'one'  		=> __( 'One Star', 'webteck' ),
					'two' 		=> __( 'Two Star', 'webteck' ),
					'three' 	=> __( 'Three Star', 'webteck' ),
					'four' 		=> __( 'Four Star', 'webteck' ),
					'five' 	 	=> __( 'Five Star', 'webteck' ),
				],
			]
		);
		$this->add_control(
			'r_title', [
				'label' 		=> __( 'Reviews Label', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '2960+Client Reviews' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);


        $this->end_controls_section();





        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		// webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one','layout_two'], '--title-color' );
		// webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .desc-selector',['layout_one','layout_two'], '--body-color' );



        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){


        	echo '<div class="down-option-area">';
                echo '<div class="down-option-area_wrapper">';
                    echo '<div class="about-client-box mb-sm-0 mb-5">';
                        echo '<div class="client-thumb-group">';
                        	foreach ( $settings['gallery'] as $single_data ) {
	                            echo '<div class="thumb"><img src="'.esc_url( $single_data['url'] ).'" alt="avater"></div>';
	                        }
                        echo '</div>';
                        echo '<span class="cilent-box_title">'.esc_html( $settings['a_title'] ).'</span>';
                    echo '</div>';
                    echo '<div class="about-counter">';
                        echo '<h2 class="mb-0"><span class="counter-number">'.esc_html( $settings['number'] ).'</span></h2>';
                        echo '<span class="cilent-box_title">Happily <span class="cilent-box_title">'.esc_html( $settings['c_title'] ).'</span></span>';
                    echo '</div>';
                    echo '<div class="cilent-box">';
                        echo '<div class="about_review">';
                        	if( $settings['client_rating'] == 'one' ){
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                            }elseif( $settings['client_rating'] == 'two' ){
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                            }elseif( $settings['client_rating'] == 'three' ){
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                            }elseif( $settings['client_rating'] == 'four' ){
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp far fa-star"></i>';
                            }else{
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                                echo '<i class="fa-sharp fa-solid fa-star"></i>';
                            }
                            
                        echo '</div>';
                        echo '<h4 class="cilent-box_counter">'.wp_kses_post( $settings['r_title'] ).'</h4>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }
	}
}