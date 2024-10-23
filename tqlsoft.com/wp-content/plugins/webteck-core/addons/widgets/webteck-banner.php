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
class Traga_Banner extends Widget_Base {

	public function get_name() {
		return 'tragabanner';
	}

	public function get_title() {
		return __( 'Banner', 'webteck' );
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
				],
			]
		);

		/*----------------------------------------- style one ------------------------------------*/

		$repeater = new Repeater();

        $repeater->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'webteck' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
            ]
        );
		$repeater->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'SECURE & IT SERVICES' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_title1', [
				'label' 		=> __( 'Title 1', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Perfect IT Solution' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'For Your Business' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'banner_desc', [
				'label' 		=> __( 'Description', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Energistically harness ubiquitous imperatives without state of the art collaboration and idea-sharing. Monotonectally parallel task cross-unit experiences and front-end.' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'DISCOBER MORE', 'webteck' ),
			]
        );

        $repeater->add_control(
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
			]
		);
		$repeater->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Second Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'CONTACT US', 'webteck' ),
			]
        );

        $repeater->add_control(
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
			]
		);

		$this->add_control(
            'shape_img1',
            [
                'label'     => __( 'Shape Image 1', 'webteck' ),
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
            'shape_img2',
            [
                'label'     => __( 'Shape Image 2', 'webteck' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style' => ['1', '3', '4']]
            ]
        );
		$this->add_control(
            'shape_img3',
            [
                'label'     => __( 'Shape Image 3', 'webteck' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style' => ['1', '3']]
            ]
        );
		
		$this->add_control(
			'banners_one',
			[
				'label' 		=> __( 'Banners', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'banner_title' 		=> __( 'Banner One', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ banner_title }}}',
				'condition'	=> ['layout_style' => '1']
			]
		);

		/*----------------------------------------- Style Two ------------------------------------*/
		$this->add_control(
            'banner_img',
            [
                'label'     => __( 'Banner Image', 'webteck' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style!' => '1']
            ]
        );
        $this->add_control(
            'banner_img_phone',
            [
                'label'     => __( 'Banner Image Phone', 'webteck' ),
                'type'      => Controls_Manager::MEDIA,
                'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 		=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style!' => ['1', '3']]
            ]
        );        
        $this->add_control(
			'heading', [
				'label' 		=> __( 'Heading', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'SECURE & IT SERVICES' , 'webteck' ),
				'label_block' 	=> true,
				'condition'	=> ['layout_style!' => '1']
			]
        );
        $this->add_control(
			'banner_title1', [
				'label' 		=> __( 'Title 1', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Traga Is The Best' , 'webteck' ),
				'label_block' 	=> true,
				'condition'	=> ['layout_style!' => '1']
			]
        );
        $this->add_control(
			'banner_title2', [
				'label' 		=> __( 'Title 2', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'IT Solution 2023' , 'webteck' ),
				'label_block' 	=> true,
				'condition'	=> ['layout_style!' => '1']
			]
        );
        $this->add_control(
			'banner_desc', [
				'label' 		=> __( 'Description', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Energistically harness ubiquitous imperatives without state of the art collaboration and idea-sharing. Monotonectally parallel task cross-unit experiences and front-end.' , 'webteck' ),
				'label_block' 	=> true,
				'condition'	=> ['layout_style!' => '1']
			]
        );
        $this->add_control(
			'button_text_1',
			[
				'label' 	=> esc_html__( 'First Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'About Us', 'webteck' ),
				'condition'	=> ['layout_style!' => '1']
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
				'condition'	=> ['layout_style!' => '1']
			]
		);
		$this->add_control(
			'button_text_2',
			[
				'label' 	=> esc_html__( 'Video Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Watch Our Story', 'webteck' ),
				'condition'	=> ['layout_style!' => '1']
			]
        );
		$this->add_control(
			'button_label_2',
			[
				'label' 	=> esc_html__( 'Video Button Label', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> esc_html__( 'Subscribe Now', 'webteck' ),
				'condition'	=> ['layout_style!' => '1']
			]
        );

        $this->add_control(
			'button_link_2',
			[
				'label' 		=> esc_html__( 'Video Button Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://www.youtube.com/watch?v=_sI_Ps7JSEk', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
				'condition'	=> ['layout_style!' => '1']
			]
		);
		$this->add_control(
			'particle_enable',
			[
				'label' 		=> __( 'Show Particle ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> ['layout_style' => '4'] 
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'social_text', [
				'label' 		=> __( 'Social Text', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Facebook' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'social_link',
			[
				'label' 		=> esc_html__( 'Social Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://facebook.com/',
					'is_external' 	=> true,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'social_links',
			[
				'label' 		=> __( 'Social Links', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_text' 		=> __( 'Facebook', 'webteck' ),
						'social_link' 		=> __( 'https://facebook.com/', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ social_text }}}',
				'condition'	=> ['layout_style' => '2']
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
					'{{WRAPPER}} .hero-title' => 'color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .hero-title',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .hero-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();

		//---------------------------------------subtitle Style---------------------------------------//

		$this->start_controls_section(
			'subtitle_style',
			[
				'label' 	=> __( 'Subtitle Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'subtitle_color',
			[
				'label' 		=> __( ' Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => '--theme-color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'subtitle_typography',
				'label' 	=> __( ' Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .hero-subtitle',
			]
        );
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' 		=> __( ' Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' 		=> __( ' Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .hero-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			echo '<div class="th-hero-wrapper hero-2" id="hero">';
		       	echo '<div class="slider-area">';
					echo '<div class="swiper th-slider hero-slider-2" id="heroSlider2" data-slider-options=\'{"autoHeight":"true","effect":"fade","breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}\'>';
		                echo '<div class="swiper-wrapper">';
				       		foreach( $settings['banners_one'] as $data ) {
				       			echo '<div class="swiper-slide">';
						            echo '<div class="th-hero-slide">';
						            	if(!empty($data['banner_img']['url'])){
							                echo '<div class="th-hero-bg" data-bg-src="'.esc_url($data['banner_img']['url']).'">';
							                echo '</div>';
							            }
						                echo '<div class="container">';
						                    echo '<div class="hero-style2">';
												echo '<div class="ripple-shape">';
													echo '<span class="ripple-1"></span><span class="ripple-2"></span><span class="ripple-3"></span><span class="ripple-4"></span><span class="ripple-5"></span><span class="ripple-6"></span>';
												echo '</div>';
						                        if(!empty($data['heading'])){
													echo '<span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">'.esc_html($data['heading']).'</span>';
												}
						                        if(!empty($data['banner_title1'])){
							                        echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s">'.wp_kses_post($data['banner_title1']).'</h1>';
							                    }
							                    if(!empty($data['banner_title2'])){
							                        echo '<h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.5s">'.wp_kses_post($data['banner_title2']).'</h1>';
							                    }
							                    if(!empty($data['banner_desc'])){
							                        echo '<p class="hero-text" data-ani="slideinleft" data-ani-delay="0.7s">'.esc_html($data['banner_desc']).'</p>';
							                    }
						                        echo '<div class="btn-group" data-ani="slideinleft" data-ani-delay="0.9s">';
					                                if(!empty($data['button_text_1'])){
							                            echo '<a href="'.esc_url( $data['button_link_1']['url'] ).'" class="th-btn style3">'.esc_html($data['button_text_1']).'<i class="fas fa-long-arrow-right ms-2"></i></a>';
							                        }
							                        if(!empty($data['button_text_2'])){
							                            echo '<a href="'.esc_url( $data['button_link_2']['url'] ).'" class="th-btn style2 btn2">'.esc_html($data['button_text_2']).'<i class="fas fa-long-arrow-right ms-2"></i></a>';
							                        }

						                        echo '</div>';
						                    echo '</div>';
						                echo '</div>';
						            echo '</div>';
					            echo '</div>';
					        }    
		       			echo ' </div>';

		       			echo '<button data-slider-prev="#heroSlider2" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
            			echo '<button data-slider-next="#heroSlider2" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
		       		echo ' </div>';
		       	
					echo '<div class="hero-shape1">';
					echo '</div>';
				   	if(!empty($settings['shape_img2']['url'])){
						echo '<div class="hero-shape2">';
							echo webteck_img_tag( array(
								'url' => esc_url( $settings['shape_img2']['url'] ),
							) );
						echo '</div>';
					}
				   	if(!empty($settings['shape_img3']['url'])){
						echo '<div class="hero-shape3">';
							echo webteck_img_tag( array(
								'url' => esc_url( $settings['shape_img3']['url'] ),
							) );
						echo '</div>';
					}
		    	echo '</div>';
		    echo '</div>';
		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="th-hero-wrapper hero-3" id="hero">';
				if(!empty($settings['banner_img']['url'])){
					echo '<div class="hero-img">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['banner_img']['url'] ),
						) );
						echo '<div class="shape-blur"></div>';
					echo '</div>';
				}
				if(!empty($settings['banner_img_phone']['url'])){
					echo '<div class="hero-img-phone">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['banner_img_phone']['url'] ),
						) );
						echo '<div class="shape-blur"></div>';
					echo '</div>';
				}
				echo '<div class="container">';
					echo '<div class="hero-style3">';
						if (!empty($settings['heading'])){
							echo '<span class="hero-subtitle">'.esc_html($settings['heading']).'</span>';
						}
						if (!empty($settings['banner_title1'])){
							echo '<h1 class="hero-title">'.wp_kses_post($settings['banner_title1']).'</h1>';
						}
						if (!empty($settings['banner_title2'])){
							echo '<h1 class="hero-title">'.wp_kses_post($settings['banner_title2']).'</h1>';
						}
						if (!empty($settings['banner_desc'])){
							echo '<p class="hero-text">'.esc_html($settings['banner_desc']).'</p>';
						}
						echo '<div class="btn-group">';
							if (!empty($settings['button_text_1'])){
								echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn">'.esc_html($settings['button_text_1']).'<i class="fas fa-long-arrow-right ms-2"></i></a>';
							}
							if (!empty($settings['button_text_2'])){
								echo '<div class="call-btn">';
									echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
									echo '<div class="media-body">';
										echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="btn-title popup-video">'.esc_html($settings['button_text_2']).'</a>';
										echo '<span class="btn-text">'.esc_html($settings['button_label_2']).'</span>';
									echo '</div>';
								echo '</div>';
							}

						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="hero-social">';
					foreach( $settings['social_links'] as $data ) {
						$link_target = $data['social_link']['is_external'] ? ' target="_blank"' : '';
						$link_nofollow = $data['social_link']['nofollow'] ? ' rel="nofollow"' : '';
						echo '<a '.wp_kses_post( $link_nofollow.$link_target ).' href="'.esc_url( $data['social_link']['url'] ).'">'.esc_html( $data['social_text'] ).'</a>';
					}
				echo '</div>';

				if(!empty($settings['shape_img1']['url'])){
					echo '<div class="hero-shape1">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['shape_img1']['url'] ),
						) );
					echo '</div>';
				}
		    echo '</div>';
		} elseif ( $settings['layout_style'] == '3' ){
			echo '<div class="th-hero-wrapper hero-1" id="hero">';
				if(!empty($settings['banner_img']['url'])){
					echo '<div class="hero-img tilt-active">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['banner_img']['url'] ),
						) );
					echo '</div>';
				}
				echo '<div class="container">';
					echo '<div class="hero-style1">';
						if (!empty($settings['heading'])){
							echo '<span class="hero-subtitle">'.esc_html($settings['heading']).'</span>';
						}
						if (!empty($settings['banner_title1'])){
							echo '<h1 class="hero-title">'.wp_kses_post($settings['banner_title1']).'</h1>';
						}
						if (!empty($settings['banner_title2'])){
							echo '<h1 class="hero-title">'.wp_kses_post($settings['banner_title2']).'</h1>';
						}
						if (!empty($settings['banner_desc'])){
							echo '<p class="hero-text">'.esc_html($settings['banner_desc']).'</p>';
						}
						echo '<div class="btn-group">';
							if (!empty($settings['button_text_1'])){
								echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn">'.esc_html($settings['button_text_1']).'<i class="fas fa-long-arrow-right ms-2"></i></a>';
							}
							if (!empty($settings['button_text_2'])){
								echo '<div class="call-btn">';
									echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
									echo '<div class="media-body">';
										echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="btn-title popup-video">'.esc_html($settings['button_text_2']).'</a>';
										echo '<span class="btn-text">'.esc_html($settings['button_label_2']).'</span>';
									echo '</div>';
								echo '</div>';
							}

						echo '</div>';
					echo '</div>';
				echo '</div>';
				if(!empty($settings['shape_img1']['url'])){
					echo '<div class="hero-shape1">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['shape_img1']['url'] ),
						) );
					echo '</div>';
				}
			   	if(!empty($settings['shape_img2']['url'])){
					echo '<div class="hero-shape2">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['shape_img2']['url'] ),
						) );
					echo '</div>';
				}
			   	if(!empty($settings['shape_img3']['url'])){
					echo '<div class="hero-shape3">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['shape_img3']['url'] ),
						) );
					echo '</div>';
				}
		   	echo '</div>';
		} else {
			echo '<div class="th-hero-wrapper hero-4" id="hero">';
				if ($settings['particle_enable'] == 'yes') {
					echo '<div class="body-particle" id="body-particlebanner"></div>';
				}
				if(!empty($settings['banner_img']['url'])){
					echo '<div class="hero-img tilt-active">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['banner_img']['url'] ),
						) );
					echo '</div>';
				}
				echo '<div class="container">';
					echo '<div class="hero-style4">';
						echo '<div class="ripple-shape">';
							echo '<span class="ripple-1"></span><span class="ripple-2"></span><span class="ripple-3"></span><span class="ripple-4"></span><span class="ripple-5"></span><span class="ripple-6"></span>';
						echo '</div>';
						if (!empty($settings['heading'])){
							echo '<span class="hero-subtitle">'.esc_html($settings['heading']).'</span>';
						}
						if (!empty($settings['banner_title1'])){
							echo '<h1 class="hero-title">'.wp_kses_post($settings['banner_title1']).'</h1>';
						}
						if (!empty($settings['banner_title2'])){
							echo '<h1 class="hero-title">'.wp_kses_post($settings['banner_title2']).'</h1>';
						}
						if (!empty($settings['banner_desc'])){
							echo '<p class="hero-text">'.esc_html($settings['banner_desc']).'</p>';
						}
						echo '<div class="btn-group">';
							if (!empty($settings['button_text_1'])){
								echo '<a href="'.esc_url( $settings['button_link_1']['url'] ).'" class="th-btn">'.esc_html($settings['button_text_1']).'<i class="fas fa-long-arrow-right ms-2"></i></a>';
							}
							if (!empty($settings['button_text_2'])){
								echo '<div class="call-btn">';
									echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
									echo '<div class="media-body">';
										echo '<a href="'.esc_url( $settings['button_link_2']['url'] ).'" class="btn-title popup-video">'.esc_html($settings['button_text_2']).'</a>';
										echo '<span class="btn-text">'.esc_html($settings['button_label_2']).'</span>';
									echo '</div>';
								echo '</div>';
							}

						echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="triangle-1"></div>';
        		echo '<div class="triangle-2"></div>';
				if(!empty($settings['shape_img1']['url'])){
					echo '<div class="hero-shape2">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['shape_img1']['url'] ),
						) );
					echo '</div>';
				}
			   	if(!empty($settings['shape_img2']['url'])){
					echo '<div class="hero-shape3">';
						echo webteck_img_tag( array(
							'url' => esc_url( $settings['shape_img2']['url'] ),
						) );
					echo '</div>';
				}
		   	echo '</div>';
		}
	}

}