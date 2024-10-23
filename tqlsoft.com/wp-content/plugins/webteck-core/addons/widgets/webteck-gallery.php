<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
/**
 *
 * Gallery Widget .
 *
 */
class Traga_Gallery extends Widget_Base{

	public function get_name() {
		return 'tragagallery';
	}

	public function get_title() {
		return __( 'Webteck Gallery', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'gallery_section',
			[
				'label' 	=> __( 'Gallery', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
				],
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'webteck' ),
                'condition'     => [ 'layout_style' =>  ['2']  ],
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				 'condition'     => [ 'layout_style' =>  ['2']  ],
			]
		);
		//----------------------------feddback repeter start--------------------------------//

		$repeater = new Repeater();
        $repeater->add_control(
			'gallery_image',
			[
				'label' 		=> __( 'Gallery Image', 'webteck' ),
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
			'repeater_list',
			[
				'label' 		=> __( 'Images', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'gallery_image'    => ['url'=> Utils::get_placeholder_image_src()]
					],
				],
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( $settings['layout_style'] == '1' ){
			echo '<div class="row gy-4">';
				foreach( $settings['repeater_list'] as $single_data ){
					echo '<div class="col-md-6 col-xl-4">';
						echo '<div class="gallery-card">';
							echo '<div class="gallery-img">';
								echo webteck_img_tag( array(
									'url'	=> esc_url( $single_data['gallery_image']['url'] ),
								) );
								echo '<a href="'.esc_url( $single_data['gallery_image']['url'] ).'" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}  
			echo '</div>';
		}else{
			echo '<div class="container th-container4">';
            
	            echo '<div class="slider-area">';
	                echo '<div class="swiper th-slider has-shadow" id="projectSlider6" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}\'>';
	                    echo '<div class="swiper-wrapper">';


	                    	foreach( $settings['repeater_list'] as $single_data ){
		                        echo '<div class="swiper-slide">';
		                            echo '<div class="project-box style2">';
		                                echo '<div class="project-img">';
		                                    echo webteck_img_tag( array(
												'url'	=> esc_url( $single_data['gallery_image']['url'] ),
											) );
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    }

	                        

	                    echo '</div>';
	                echo '</div>';
	                echo '<button data-slider-prev="#projectSlider6" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
	                echo '<button data-slider-next="#projectSlider6" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
	            echo '</div>';
	        echo '</div>';
	        echo '<div class="sec-shape mt-5 pt-3">';
	            echo '<a href="'.esc_url( $settings['button_link']['url'] ).'" class="th-btn btn-gradient style-radius">'.esc_html( $settings['button_text'] ).'</a>';
	        echo '</div>';
		}
	}
}