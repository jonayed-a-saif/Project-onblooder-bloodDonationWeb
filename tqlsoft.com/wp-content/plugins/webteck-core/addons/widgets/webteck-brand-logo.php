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
class Traga_Brand_Logo extends Widget_Base {

	public function get_name() {
		return 'tragabrandlogo';
	}

	public function get_title() {
		return __( 'Webteck Brand Logo', 'webteck' );
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
				'label' 	=> __( 'Band Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					'3' 		=> __( 'Style Three', 'webteck' ),
					'4' 		=> __( 'Style Four', 'webteck' ),
					'5' 		=> __( 'Style Five', 'webteck' ),
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
				'label' 	=> __( 'Brand Logo', 'webteck' ),
				'type' 		=> Controls_Manager::MEDIA,
				'default' => [
					'url' 	=> Utils::get_placeholder_image_src(),
				],
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
			echo '<div class="slider-area text-center">';
				echo '<div class="swiper th-slider" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5"}}}\'>';
					echo '<div class="swiper-wrapper">';
			        	foreach( $settings['logos'] as $singlelogo ) {
			        		echo '<div class="swiper-slide">';
			                    echo '<div class="brand-box">';
			                        echo webteck_img_tag( array(
			                            'url'   => esc_url( $singlelogo['client_logo']['url'] ),
			                        ) );
			                    echo '</div>';
			                echo '</div>';
				        } 
			        echo '</div>';
		        echo '</div>';
	        echo '</div>';
		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="brand-sec1">';
				echo '<div class="container py-5">';
					echo '<div class="swiper th-slider" id="brandSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5"}}}\'>';
						echo '<div class="swiper-wrapper">';
							foreach( $settings['logos'] as $singlelogo ) {
								echo '<div class="swiper-slide">';
									echo '<div class="brand-box py-20">';
										echo webteck_img_tag( array(
											'url'   => esc_url( $singlelogo['client_logo']['url'] ),
										) );
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		} elseif ( $settings['layout_style'] == '3' ) {
			echo '<div class="brand-sec3 overflow-hidden">';
		        echo '<div class="container th-container4">';
		            echo '<div class="slider-area text-center">';
		                echo '<div class="swiper th-slider" id="brandSlider3" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5"}}}\'>';
		                    echo '<div class="swiper-wrapper">';

		                    	foreach( $settings['logos'] as $singlelogo ) {
			                        echo '<div class="swiper-slide">';
			                            echo '<a href="#" class="brand-box">';
			                                echo webteck_img_tag( array(
												'url'   => esc_url( $singlelogo['client_logo']['url'] ),
											) );
			                            echo '</a>';
			                        echo '</div>';
			                    }
		                        

		                    echo '</div>';

		                echo '</div>';
		           echo '</div>';
		        echo '</div>';
		    echo '</div>';
		} elseif ( $settings['layout_style'] == '4' ) {
			echo '<div class="brand-sec4">';
		        echo '<div class="container th-container4">';
		            echo '<div class="title-area mb-60 text-center">';
		                echo '<h3 class="brand-title mt-n2">'.esc_html( $settings['title'] ).'</h3>';
		            echo '</div>';
		            echo '<div class="slider-area text-center">';
		                echo '<div class="swiper th-slider brand-slider4" id="brandSlider4" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}\'>';
		                    echo '<div class="swiper-wrapper">';
		                    	foreach( $settings['logos'] as $singlelogo ) {
			                        echo '<div class="swiper-slide">';
			                            echo '<a href="about.html" class="brand-box">';
			                                echo webteck_img_tag( array(
												'url'   => esc_url( $singlelogo['client_logo']['url'] ),
											) );
			                            echo '</a>';
			                        echo '</div>';
			                    }
		                        
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<div class="brand-sec5 overflow-hidden space">';
		        echo '<div class="container th-container4">';
		            echo '<div class="slider-area text-center">';
		                echo '<div class="swiper th-slider brand-slider5" id="brandSlider4" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"5"},"1400":{"slidesPerView":"6"}}}\'>';
		                    echo '<div class="swiper-wrapper">';
		                    	foreach( $settings['logos'] as $singlelogo ) {
		                        
			                        echo '<div class="swiper-slide">';
			                            echo '<div class="brand-item style2">';
			                                echo '<a href="">';
			                                    echo '<img class="original" src="'.esc_url( $singlelogo['client_logo']['url'] ).'" alt="Brand Logo">';
			                                    echo '<img class="gray" src="'.esc_url( $singlelogo['client_logo']['url'] ).'" alt="Brand Logo">';
			                                echo '</a>';
			                            echo '</div>';
			                        echo '</div>';
			                    }
		                        


		                    echo '</div>';

		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}