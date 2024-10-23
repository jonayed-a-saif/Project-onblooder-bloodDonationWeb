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
 * Service Box Widget .
 *
 */
class Webteck_Service extends Widget_Base {

	public function get_name() {
		return 'webteckservices';
	}

	public function get_title() {
		return __( 'Service', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'servicesd_section',
			[
				'label' 	=> __( 'Service', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Service Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  	=> __( 'Style Three', 'webteck' ),
					'layout_four'  		=> __( 'Style Four', 'webteck' ),
					'layout_five'  		=> __( 'Style Five', 'webteck' ),
					'layout_six'  		=> __( 'Style Six', 'webteck' ),
				]
			]
		);

		$this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['layout_four']]
			]
		);
		$this->add_control(
			'desc', [
				'label' 		=> __( 'Description', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['layout_four']]
			]
		);
		$this->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style' => ['layout_four']]
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'desc', [
				'label' 		=> __( 'Description', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Read Details', 'webteck' ),
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
			]
		);


		$this->add_control(
			'services',
			[
				'label' 		=> __( 'Services', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Read Details', 'webteck' ),
		        'condition'	=> ['layout_style' => ['layout_five']]
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
		        'condition'	=> ['layout_style' => ['layout_five']]
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

		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one','layout_two','layout_three','layout_five','layout_six'], '--title-color' );
		webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .desc-selector',['layout_one','layout_two','layout_three','layout_five','layout_six'], '--body-color' );

		webteck_all_elementor_style($this, 'Title ', '{{WRAPPER}} .title-selector',['layout_four'], '--white-color' );
		webteck_all_elementor_style($this, 'Description ', '{{WRAPPER}} .desc-selector',['layout_four'], 'color' );




        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="slider-area">'; ?>
                <div class="swiper th-slider has-shadow" id="serviceSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'> <?php
                    echo '<div class="swiper-wrapper">';
                        
                    	foreach( $settings['services'] as $data ) { 
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="service-item th-ani">';
	                            	if( ! empty( $data['image']['url'] ) ){
						                echo '<div class="service-item_icon">';
						                    echo webteck_img_tag( array(
												'url'   => esc_url( $data['image']['url'] ),
											) );
						                echo '</div>';
						            }
	                                echo '<div class="service-item_content">';
	                                	if( ! empty( $data['title'] ) ){
			                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
			                            }
			                            if( ! empty( $data['desc'] ) ){
		                                    echo '<p class="service-item_text desc-selector">'.esc_html( $data['desc'] ).'</p>';
		                                }
	                                    echo '<a href="'.esc_url( $data['button_link'] ).'" class="line-btn">'.esc_html( $data['button_text'] ).'</a>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                        
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#serviceSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#serviceSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';

        	
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="slider-area">'; ?>
                <div class="swiper th-slider has-shadow" id="serviceSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'> <?php 

                    echo '<div class="swiper-wrapper">';
                        foreach( $settings['services'] as $data ) { 
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="service-grid7 th-ani">';
	                            	if( ! empty( $data['image']['url'] ) ){
						                echo '<div class="service-grid7_icon">';
						                    echo webteck_img_tag( array(
												'url'   => esc_url( $data['image']['url'] ),
											) );
						                echo '</div>';
						            }
	                                echo '<div class="service-grid7_content">';
	                                	if( ! empty( $data['title'] ) ){
			                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
			                            }
			                            if( ! empty( $data['desc'] ) ){
		                                    echo '<p class="service-grid7_text desc-selector">'.esc_html( $data['desc'] ).'</p>';
		                                }
		                                if( ! empty( $data['button_link'] ) ){
		                                    echo '<a href="'.esc_url( $data['button_link'] ).'" class="line-btn">'.esc_html( $data['button_text'] ).'<i class="fa-regular fa-arrow-right"></i></a>';
		                                }
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#serviceSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#serviceSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_three' ){
	    	echo '<div class="row gy-3 justify-content-between align-items-center">';
                foreach( $settings['services'] as $data ) { 
	                echo '<div class="col-md-6 col-xl-3">';
	                    echo '<div class="service-box2 wow fadeInRight">';
	                    	if( ! empty( $data['image']['url'] ) ){
		                        echo '<div class="service-box2_shape"></div>';
		                    }
	                        echo '<div class="service-box2_content">';
	                            echo '<div class="service-box2_icon">';
	                                echo '<img src="'.esc_url( $data['image']['url'] ).'" alt="Icon">';
	                            echo '</div>';
	                            if( ! empty( $data['title'] ) ){
	                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
	                            }
	                            if( ! empty( $data['desc'] ) ){
		                            echo '<p class="service-box2_text desc-selector">'.esc_html( $data['desc'] ).'</p>';
		                        }
		                        if( ! empty( $data['button_link'] ) ){
		                            echo '<a href="'.esc_url( $data['button_link'] ).'" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_four' ){
	    	echo '<div class="container th-container4">';
	            
	            echo '<div class="row gy-4 justify-content-between align-items-center">';
	                echo '<div class="service-card2_wrap style1">';

	                    echo '<div class="service-card2_wrap">';

	                    	foreach( $settings['services'] as $data ) { 
		                        echo '<div class="service-card2 wow fadeInRight">';
		                            echo '<div class="service-card2_content">';
		                            	if( ! empty( $data['image']['url'] ) ){
			                                echo '<div class="service-card2_icon">';
			                                    echo '<img src="'.esc_url( $data['image']['url'] ).'" alt="Icon">';
			                                echo '</div>';
			                            }
			                            if( ! empty( $data['title'] ) ){
			                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
			                            }
			                            if( ! empty( $data['desc'] ) ){
			                                echo '<p class="service-card2_text desc-selector">'.esc_html( $data['desc'] ).'</p>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    }


	                    
	                    echo '</div>';
	                    echo '<div class="service-card2 style1 wow fadeInUp" data-bg-src="'.esc_url( $settings['image']['url'] ).'">';
	                        echo '<div class="service-card2_content">';
	                        	if( ! empty( $settings['title'] ) ){
		                            echo '<h3 class="service-title">'.esc_html( $settings['title'] ).'</h3>';
		                        }
		                        if( ! empty( $settings['desc'] ) ){
		                            echo '<h4 class="cilent-box_counter">'.wp_kses_post( $settings['desc'] ).'</h4>';
		                        }
	                            echo '<span class="ser-shape"><img src="'.WEBTECK_PLUGDIRURI.'assets/img/ser-shape.svg" alt=""></span>';
	                        echo '</div>';
	                    echo '</div>';
	                    echo '<div class="shape-mockup service-shape spin d-none d-xl-block" data-top="46%" data-left="23.5%"><img src="'.WEBTECK_PLUGDIRURI.'assets/img/star.svg" alt="shape"></div>';
	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_five' ){
	    	echo '<div class="row gy-4 justify-content-between align-items-center">';
                foreach( $settings['services'] as $data ) { 
	                echo '<div class="col-md-6 col-xl-3">';
	                    echo '<div class="service-box3">';
	                        echo '<div class="service-box3_content">';
	                        	if( ! empty( $data['image']['url'] ) ){
					                echo '<div class="service-box3_icon">';
					                    echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
					                echo '</div>';
					            }
	                            if( ! empty( $data['title'] ) ){
	                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
	                            }
	                            if( ! empty( $data['desc'] ) ){
                                    echo '<p class="service-box3_text desc-selector">'.esc_html( $data['desc'] ).'</p>';
                                }
	                            echo '<a href="'.esc_url( $data['button_link'] ).'" class="line-btn">'.esc_html( $data['button_text'] ).'<i class="fa-regular fa-arrow-right"></i></a>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
                if( ! empty( $settings['button_link'] ) ){
	                echo '<div class="col-md-6 col-xl-3">';
	                    echo '<div class="service-btn-area">';
	                        echo '<a href="'.esc_url( $settings['button_link'] ).'" class="th-btn service-btn text-capitalize">'.esc_html( $settings['button_text'] ).'<i class="fa-regular fa-arrow-right ms-2"></i></a>';
	                        // echo '<div class="ser-shape">';
	                        //     echo '<img src="assets/img/icon/circle.png" alt="">';
	                        // echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }else{
	    	echo '<div class="slider-area">';
                echo '<div class="swiper th-slider has-shadow" id="serviceSlider12" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}\'>';
                    echo '<div class="swiper-wrapper">';
                        foreach( $settings['services'] as $data ) { 
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="service-item2 th-ani">';
	                                echo '<div class="service-item2_content">';
	                                    if( ! empty( $data['title'] ) ){
			                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
			                            }
			                            if( ! empty( $data['desc'] ) ){
		                                    echo '<p class="service-item2_text desc-selector">'.esc_html( $data['desc'] ).'</p>';
		                                }
	                                    echo '<a href="'.esc_url( $data['button_link'] ).'" class="line-btn">'.esc_html( $data['button_text'] ).'<i class="fa-solid fa-arrow-right ms-2"></i></a>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#serviceSlider12" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#serviceSlider12" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';
	    }
	}
}