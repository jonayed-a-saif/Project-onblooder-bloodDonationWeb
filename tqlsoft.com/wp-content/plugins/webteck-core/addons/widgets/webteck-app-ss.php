<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
/**
 *
 * Brand Logo Widget .
 *
 */
class Webteck_App_Screnshot extends Widget_Base {

	public function get_name() {
		return 'appss';
	}

	public function get_title() {
		return __( 'Webteck Apps', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'client_logo_section',
			[
				'label' 	=> __( 'Brand Logo', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'App Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
				],
			]
		);
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Section Title', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'webteck' ),
                'condition' => [
					'layout_style' => ['4']
				]
			]
        );

        $repeater = new Repeater();

		$repeater->add_control(
			'client_logo',
			[
				'label' 	=> __( 'App Interface', 'webteck' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'url',
			[
				'label' 	=> __( 'URL', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( '#', 'webteck' ),
			]
        );
		$this->add_control(
			'logos',
			[
				'label' 		=> __( 'Brand Logos', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_logo' => Utils::get_placeholder_image_src(),
					],
				]
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if ( $settings['layout_style'] == '1' ) {

			echo '<div class="container-fluid p-0">';
	            echo '<div class="slider-area text-center">';
	                echo '<div class="swiper th-slider screen-slider1" id="screenSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2","centeredSlides":"true"},"768":{"slidesPerView":"4","centeredSlides":"true"},"992":{"slidesPerView":"4","centeredSlides":"true"},"1200":{"slidesPerView":"4","centeredSlides":"true"},"1400":{"slidesPerView":"6","centeredSlides":"true"}}}\'>';
	                    echo '<div class="swiper-wrapper">';

	                    	foreach( $settings['logos'] as $singlelogo ) {
		                        echo '<div class="swiper-slide">';
		                            echo '<a href="'.esc_url( $singlelogo['url'] ).'" class="screetshot-thumb">';
		                                echo webteck_img_tag( array(
				                            'url'   => esc_url( $singlelogo['client_logo']['url'] ),
				                        ) );
		                            echo '</a>';
		                        echo '</div>';
		                    }
	                        
	                    echo '</div>';
	                    echo '<div class="slider-pagination">`</div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
		} 
	}
}