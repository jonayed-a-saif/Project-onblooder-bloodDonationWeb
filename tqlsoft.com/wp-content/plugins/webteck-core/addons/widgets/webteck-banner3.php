<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
/**
 *
 * Banner Widget.
 *
 */
class Traga_Banner_v3 extends Widget_Base {

	public function get_name() {
		return 'tragabannerv3';
	}

	public function get_title() {
		return __( 'Banner v3', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck_header_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'Banner_section',
			[
				'label' 	=> __( 'Banner', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Banner Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					'3' 		=> __( 'Style Three', 'webteck' ),
					'4' 		=> __( 'Style Four', 'webteck' ),
					'5' 		=> __( 'Style Five', 'webteck' ),
				],
			]
		);

		/*----------------------------------------- style one ------------------------------------*/


        $this->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image 1', 'webteck' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
        $this->add_control(
            'banner_img2',
            [
                'label'     => __( 'Banner Image 2', 'webteck' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
		$this->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'SECURE & IT SERVICES' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
        $this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'SECURE & IT SERVICES' , 'webteck' ),
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['2','5']]
			]
        );
        $this->add_control(
			'banner_desc', [
				'label' 		=> __( 'Description', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Energistically harness ubiquitous imperatives without state of the art collaboration and idea-sharing. Monotonectally parallel task cross-unit experiences and front-end.' , 'webteck' ),
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['1','2','3','4']]
			]
        );
        $this->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'DISCOBER MORE', 'webteck' ),
                'condition'	=> ['layout_style' => ['1','3','4','5']]
			]
        );

        $this->add_control(
			'button_link_1',
			[
				'label' 		=> esc_html__( 'First Button Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> ['layout_style' => ['1','3','4','5']]
			]
		);
		$this->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Second Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'CONTACT US', 'webteck' ),
                'condition'	=> ['layout_style' => ['1','3','5']]
			]
        );

        $this->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Second Button Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> ['layout_style' => ['1','3','5']]
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
				'condition'	=> ['layout_style' => ['5']]
			]
		);
		$this->add_control(
			'ratting_text',
			[
				'label' 	=> esc_html__( 'Ratting Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'CONTACT US', 'webteck' ),
                'condition'	=> ['layout_style' => ['5']]
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
				],
				'condition'	=> ['layout_style' => ['5']]
			]
		);

		
		$this->end_controls_section();

		

        //--------------------------------------- Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-head' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .th-head',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-head' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-head' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		
		//--------------------------------------- Desc Style---------------------------------------//

		$this->start_controls_section(
			'desc_style',
			[
				'label' 	=> __( 'Description Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Description Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'desc_typography',
				'label' 	=> __( 'Description Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .hero-text',
			]
        );
        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Description Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Description Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------Button Style---------------------------------------//

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'	=> ['layout_style' => ['1','4']]
			]
        );

        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Button Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'color: {{VALUE}}',
					'{{WRAPPER}} .play-btn > i' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_color_hover',
			[
				'label' 		=> __( 'Button Color Hover', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .play-btn:hover > i' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' 		=> 'background-color:{{VALUE}}',
					'{{WRAPPER}} .play-btn > i' => 'background-color:{{VALUE}}',
					'{{WRAPPER}} .play-btn:before , {{WRAPPER}} .play-btn:after' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after' => 'background-color:{{VALUE}}',
					'{{WRAPPER}} .play-btn:hover > i' => 'background-color:{{VALUE}}',
					'{{WRAPPER}} .play-btn:hover:before , {{WRAPPER}} .play-btn:hover:after' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border',
				'label' 	=> __( 'Border', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .btn2',
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'border_hover',
				'label' 	=> __( 'Border Hover', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .btn2:hover',
			]
		);

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .btn2',
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

		if( $settings['layout_style'] == '1' ){

			echo '<div class="th-hero-wrapper hero-7" id="hero">';
		        echo '<div class="hero-inner">';
		        	if(!empty($settings['banner_img']['url'])){
			            echo '<div class="th-hero-bg" data-bg-src="'.esc_url($settings['banner_img']['url']).'">';
			        }
		            echo '</div>';
		            echo '<div class="container th-container4">';
		                echo '<div class="row justify-content-center">';
		                    echo '<div class="col-lg-8">';
		                        echo '<div class="hero-style7 text-center">';
		                        	if(!empty($settings['heading'])){
			                            echo '<h1 class="hero-title th-head">'.wp_kses_post($settings['heading']).'</h1>';
			                        }
			                        if(!empty($settings['banner_desc'])){
			                            echo '<p class="hero-text">'.esc_html($settings['banner_desc']).'</p>';
			                        }
		                            echo '<div class="btn-group mt-35 justify-content-center">';
		                            	if(!empty($settings['button_text_1'])){
				                            echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn style-radius">'.esc_html($settings['button_text_1']).'</a>';
				                        }
				                        if(!empty($settings['button_text_2'])){
				                            echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="th-btn style6 style-radius">'.esc_html($settings['button_text_2']).'</a>';
				                        }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		                if(!empty($settings['banner_img2']['url'])){
			                echo '<div class="th-hero-thumb">';
			                    echo '<img src="'.esc_url($settings['banner_img2']['url']).'" alt="img">';
			                echo '</div>';
			            }
		            echo '</div>';
		       echo ' </div>';
		    echo '</div>';
		}elseif( $settings['layout_style'] == '2' ){
			echo '<div class="th-hero-wrapper hero-8" id="hero">';
		        echo '<div class="hero-inner">';
		        	if(!empty($settings['banner_img']['url'])){
			            echo '<div class="th-hero-bg" data-bg-src="'.esc_url($settings['banner_img']['url']).'">';
			        }
		            echo '</div>';
		            echo '<div class="container th-container4">';
		                echo '<div class="row justify-content-center align-items-center">';
		                    echo '<div class="col-xxl-5 col-xl-6">';
		                        echo '<div class="hero-style8">';
		                        	if(!empty($settings['heading'])){
			                            echo '<span class="sub-title th-head">'.wp_kses_post($settings['heading']).'</span>';
			                        }
			                        if(!empty($settings['title'])){
			                            echo '<h1 class="hero-title">'.wp_kses_post($settings['title']).'</h1>';
			                        }
			                        if(!empty($settings['banner_desc'])){
			                            echo '<p class="hero-text">'.wp_kses_post($settings['banner_desc']).'</p>';
			                        }
		                            echo '<div class="btn-group mt-30">';
		                            	if(!empty($settings['button_link_1']['url'])){
			                                echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn style7 style-radius"><img src="'.WEBTECK_PLUGDIRURI.'assets/img/play-store-btn.png" alt="img"></a>';
			                            }
			                            if(!empty($settings['button_link_2']['url'])){
			                                echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="th-btn style7 style-radius"><img src="'.WEBTECK_PLUGDIRURI.'assets/img/apple-btn.png" alt="img"></a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="col-xxl-7 col-xl-6">';
		                    	if(!empty($settings['banner_img2']['url'])){
			                        echo '<div class="th-hero-thumb">';
			                            echo '<img src="'.esc_url($settings['banner_img2']['url']).'" alt="img">';
			                        echo '</div>';
			                    }
		                   echo ' </div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}elseif( $settings['layout_style'] == '3' ){
			echo '<div class="th-hero-wrapper hero-10" id="hero">';
		        echo '<div class="container th-container4">';
		            echo '<div class="row align-items-end">';
		                echo '<div class="col-xl-7">';
		                    echo '<div class="hero-style10">';
		                    	if(!empty($settings['heading'])){
			                        echo '<h1 class="hero-title th-head">'.wp_kses_post($settings['heading']).'</h1>';
			                    }
			                    if(!empty($settings['banner_desc'])){
			                        echo '<p class="hero-text">'.wp_kses_post($settings['banner_desc']).'</p>';
			                    }
		                        echo '<div class="btn-group">';
		                        	if(!empty($settings['button_link_1']['url'])){
			                            echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn style8">'.esc_html($settings['button_text_1']).'</a>';
			                        }
			                        if(!empty($settings['button_text_2'])){
			                            echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="th-btn style5 style8">'.esc_html($settings['button_text_2']).'</a>';
			                        }
		                        echo '</div>';
		                    echo '</div>';

		                echo '</div>';
		                echo '<div class="col-xl-5">';
		                    echo '<div class="th-hero-img">';
		                    	if(!empty($settings['banner_img']['url'])){
			                        echo '<img src="'.esc_url($settings['banner_img']['url']).'" alt="">';
			                        echo '<div class="hero-line1"></div>';
			                        echo '<div class="hero-line2"></div>';
			                    }
			                    if(!empty($settings['banner_img2']['url'])){
			                        echo '<div class="hero10-shape">';
			                            echo '<img src="'.esc_url($settings['banner_img2']['url']).'" alt="">';
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';

		    echo '</div>';
		}elseif( $settings['layout_style'] == '4' ){
			echo '<div class="th-hero-wrapper hero-9" id="hero" data-bg-src="'.esc_url($settings['banner_img']['url']).'">';
		        echo '<div class="container th-container4">';
		            echo '<div class="row align-items-end">';
		                echo '<div class="col-xl-6">';
		                    echo '<div class="hero-style9">';
		                    	if(!empty($settings['heading'])){
			                        echo '<h1 class="hero-title th-head">'.wp_kses_post($settings['heading']).'</h1>';
			                    }
			                    if(!empty($settings['banner_desc'])){
			                        echo '<p class="hero-text">'.esc_html($settings['banner_desc']).'</p>';
			                    }
			                    if(!empty($settings['button_text_1'])){
			                        echo '<div class="btn-group">';
			                            echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn btn-gradient style-radius">'.esc_html($settings['button_text_1']).'</a>';
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		                if(!empty($settings['banner_img2']['url'])){
			                echo '<div class="col-xl-6">';
			                    echo '<div class="th-hero-img">';
			                        echo '<img src="'.esc_url($settings['banner_img2']['url']).'" alt="">';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}else{
			echo '<div class="th-hero-wrapper hero-13" id="hero" data-bg-src="'.esc_url($settings['banner_img']['url']).'">';
		        echo '<div class="container th-container4">';
		            echo '<div class="row align-items-center">';
		                echo '<div class="col-xl-7">';
		                    echo '<div class="hero-style13">';
		                    	if(!empty($settings['heading'])){
			                        echo '<span class="sub-title th-head">'.wp_kses_post($settings['heading']).'</span>';
			                    }
			                    if(!empty($settings['title'])){
			                        echo '<h1 class="hero-title">'.wp_kses_post($settings['title']).'</h1>';
			                    }
		                        echo '<div class="hero-wrapp">';
		                            echo '<div class="btn-group">';
		                            	if(!empty($settings['button_link_1']['url'])){
			                                echo '<div class="">';
			                                    echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn style3 text-capitalize">'.esc_html($settings['button_text_1']).'</a>';
			                                echo '</div>';
			                            }
			                            if(!empty($settings['button_link_2']['url'])){
			                                echo '<div class="call-btn">';
			                                    echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
			                                    echo '<div class="media-body">';
			                                        echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="btn-title popup-video">'.esc_html($settings['button_text_2']).'</a>';
			                                    echo '</div>';
			                                echo '</div>';
			                            }

		                            echo '</div>';
		                            echo '<div class="cilent-box">';
		                                echo '<img src="'.WEBTECK_PLUGDIRURI.'assets/img/arrow.png" alt="">';
		                                echo '<div class="about-content">';
		                                	if(!empty($settings['ratting_text'])){
			                                    echo '<span class="title">'.esc_html($settings['ratting_text']).'</span>';
			                                }
		                                    echo '<div class="about-wrapp">';
		                                        echo '<div class="about_review">';
		                                            if( $settings['client_rating'] == 'one' ){
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
													}elseif( $settings['client_rating'] == 'two' ){
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
													}elseif( $settings['client_rating'] == 'three' ){
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
													}elseif( $settings['client_rating'] == 'four' ){
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-light fa-star-sharp"></i>';
													}else{
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
														echo '<i class="fa-solid fa-star-sharp"></i>';
													}
		                                            
		                                        echo '</div>';
		                                    echo '</div>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		                if(!empty($settings['banner_img2']['url'])){
			                echo '<div class="col-xl-5">';
			                    echo '<div class="th-hero-img">';
			                        echo '<img src="'.esc_url($settings['banner_img2']['url']).'" alt="">';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="slider-area text-center">';
		            echo '<div class="swiper th-slider brand-slider7" id="brandSlider4" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"4"},"1200":{"slidesPerView":"3"},"1400":{"slidesPerView":"4"}}}\'>';
		                echo '<div class="swiper-wrapper">';

		                	foreach( $settings['logos'] as $singlelogo ) {
			                    echo '<div class="swiper-slide">';
			                        echo '<div class="brand-box">';
			                            echo '<img src="'.esc_url( $singlelogo['client_logo']['url'] ).'" alt="Brand Logo">';
			                        echo '</div>';
			                    echo '</div>';
			                }
		                    

		                echo '</div>';

		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}

}