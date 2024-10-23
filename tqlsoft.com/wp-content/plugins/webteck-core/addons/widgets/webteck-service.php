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
 * Service Widget .
 *
 */
class Traga_Service extends Widget_Base {

	public function get_name() {
		return 'tragaservice';
	}

	public function get_title() {
		return __( 'Services', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'layout_section',
			[
				'label'     => __( 'Layout Style', 'webteck' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Services Style', 'webteck' ),
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

		$this->end_controls_section();

		$this->start_controls_section(
			'service_section',
			[
				'label'     => __( 'Services', 'webteck' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );

		$repeater = new Repeater();

        $repeater->add_control(
			'service_title',
            [
				'label'         => __( 'Service Title', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Web Development' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2'
			]
		);

		$repeater->add_control(
			'service_icon',
			[
				'label'     => __( 'Service Icon', 'webteck' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'service_img',
			[
				'label'     	  => __( 'Service Image', 'webteck' ),
				'description'     => __( 'This Image field is only for style3', 'webteck' ),
				'type'      	  => Controls_Manager::MEDIA,
				'dynamic'         => [
					'active' 	  => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'service_text',
            [
				'label'         => __( 'Service Description', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Conveniently promote transparent materials and stand-alone strategic theme areas.' ,'webteck' ),
				'label_block'   => true,
			]
		);

		$repeater->add_control(
			'button_url',
			[
				'label' => esc_html__( 'Link', 'webteck' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'webteck' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => 'https://angfuzsoft.com/wordpress/webteck/service-details/',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_control(
			'service_bg',
			[
				'label'     => __( 'Service BG', 'webteck' ),
				'type'      => Controls_Manager::MEDIA,
				'dynamic'   => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'layout_style' => ['2', '3', '5']
				]
			]
		);
		$this->add_control(
			'service_btn_text',
            [
				'label'         => __( 'Button Text', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Read More' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2',
				'condition' => [
					'layout_style' => ['2', '3', '4', '5']
				],
			]
		);

		$this->add_control(
			'servicelist',
			[
				'label' 		=> __( 'Service List', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'IT Management', 'webteck' ),
					],
					[
						'service_title' 		=> __( 'Cloud Computing', 'webteck' ),
					],
					[
						'service_title' 		=> __( 'Backup & Recovery', 'webteck' ),
					],
					[
						'service_title' 		=> __( 'Machine Learning', 'webteck' ),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'layout_style' => ['1']
				]
			]
		);

		$this->add_control(
			'servicelist2',
			[
				'label' 		=> __( 'Service List', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Web Development', 'webteck' ),
						'service_text' 			=> __( 'Intrinsicly redefine competitive e-business before adaptive potentialiti. Professionally build progressive users with.', 'webteck' ),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'layout_style' => ['2']
				]
			]
		);

		$this->add_control(
			'servicelist3',
			[
				'label' 		=> __( 'Service List', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Web Development', 'webteck' ),
						'service_text' 			=> __( 'Intrinsicly redefine competitive e-business before adaptive.', 'webteck' ),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'layout_style' => ['3']
				]
			]
		);
		$this->add_control(
			'servicelist4',
			[
				'label' 		=> __( 'Service List', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Web Development', 'webteck' ),
						'service_text' 			=> __( 'Intrinsicly maximize best-of-breed strategic theme areas whereas premium alignments. Collaboratively transition client.', 'webteck' ),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'layout_style' => ['4']
				]
			]
		);
		$this->add_control(
			'servicelist5',
			[
				'label' 		=> __( 'Service List', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'service_title' 		=> __( 'Web Development', 'webteck' ),
						'service_text' 			=> __( 'Continually engage customized infomediarie and quality growth strategies. Appropriately.', 'webteck' ),
					],
				],
				'title_field' 	=> '{{service_title}}',
				'condition' => [
					'layout_style' => ['5']
				]
			]
		);

		// $this->add_control(
		// 	'make_it_slider',
		// 	[
		// 		'label' 		=> __( 'Use it as slider ?', 'webteck' ),
		// 		'type' 			=> Controls_Manager::SWITCHER,
		// 		'label_on' 		=> __( 'Show', 'webteck' ),
		// 		'label_off' 	=> __( 'Hide', 'webteck' ),
		// 		'return_value' 	=> 'yes',
		// 		'default' 		=> 'yes',
		// 	]
		// );

		// $this->add_control(
		// 	'desktop_items',
		// 	[
		// 		'label' 		=> __( 'Items To Show', 'webteck' ),
		// 		'type' 			=> Controls_Manager::SLIDER,
		// 		'size_units' 	=> [ '%' ],
		// 		'range' 		=> [
		// 			'%' 	=> [
		// 				'min' 		=> 0,
		// 				'step' 		=> 1,
		// 				'max' 		=> 10,
		// 			],
		// 		],
		// 		'default' 		=> [
		// 			'unit' 			=> '%',
		// 			'size' 			=> 5,
		// 		],
		// 		'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
		// 	]
		// );
		// $this->add_control(
		// 	'laptop_items',
		// 	[
		// 		'label' 		=> __( 'Laptop Items', 'webteck' ),
		// 		'type' 			=> Controls_Manager::SLIDER,
		// 		'size_units' 	=> [ '%' ],
		// 		'range' 		=> [
		// 			'%' 	=> [
		// 				'min' 	=> 0,
		// 				'step' 	=> 1,
		// 				'max' 	=> 10,
		// 			],
		// 		],
		// 		'default' 	=> [
		// 			'unit' 		=> '%',
		// 			'size' 		=> 2,
		// 		],
		// 		'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
		// 	]
		// );

  //       $this->add_control(
		// 	'tablet_items',
		// 	[
		// 		'label' 		=> __( 'Tablet Items', 'webteck' ),
		// 		'type' 			=> Controls_Manager::SLIDER,
		// 		'size_units' 	=> [ '%' ],
		// 		'range' 		=> [
		// 			'%' 	=> [
		// 				'min' 	=> 0,
		// 				'step' 	=> 1,
		// 				'max' 	=> 10,
		// 			],
		// 		],
		// 		'default' 	=> [
		// 			'unit' 		=> '%',
		// 			'size' 		=> 2,
		// 		],
		// 		'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
		// 	]
		// );

  //       $this->add_control(
		// 	'mobile_items',
		// 	[
		// 		'label' 		=> __( 'Mobile Items', 'webteck' ),
		// 		'type' 			=> Controls_Manager::SLIDER,
		// 		'size_units' 	=> [ '%' ],
		// 		'range' 		=> [
		// 			'%' 	=> [
		// 				'min' 	=> 0,
		// 				'step' 	=> 1,
		// 				'max' 	=> 10,
		// 			],
		// 		],
		// 		'default' 	=> [
		// 			'unit' 		=> '%',
		// 			'size' 		=> 1,
		// 		],
		// 		'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
		// 	]
		// );

		$this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

        //---------------------------------------General Style---------------------------------------//

		$this->start_controls_section(
			'service_general_style',
			[
				'label' 	=> __( 'General Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'service_box_background',
			[
				'label' 		=> __( 'Service Box Background', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> ['{{WRAPPER}} .elementor-box' => 'background-color: {{VALUE}}']
			]
        );

       $this->add_responsive_control(
			'service_box_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> ['{{WRAPPER}} .elementor-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
			]
        );
		

		$this->end_controls_section();

		/*-----------------------------------------Title styling------------------------------------*/
		$this->start_controls_section(
			'service_title_style',
			[
				'label' 	=> __( 'Title Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> ['{{WRAPPER}} .box-title'	=> 'color: {{VALUE}};',],
			]
        );
         $this->add_control(
			'title_color2',
			[
				'label' 		=> __( 'Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> ['{{WRAPPER}} .box-title a:hover'	=> 'color: {{VALUE}};',]
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'title_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .box-title',
			]
		);

        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> ['{{WRAPPER}} .box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> ['{{WRAPPER}} .box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'],
			]
        );
        $this->end_controls_section();

		/*-----------------------------------------Description styling------------------------------------*/

		$this->start_controls_section(
			'service_desc_style',
			[
				'label' 	=> __( 'Description Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-featured_text, {{WRAPPER}} .service-grid_text, {{WRAPPER}} .service-card_text, {{WRAPPER}} .service-box_text, {{WRAPPER}} .service-3d_text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );	
        $this->add_control(
			'desc_color2',
			[
				'label' 		=> __( 'Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .service-box:hover .service-box_text'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-card:hover .service-card_text'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-grid:hover .service-grid_text'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-3d:hover .service-3d_text'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .service-featured:hover .service-featured_text'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'desc_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .service-featured_text, {{WRAPPER}} .service-grid_text, {{WRAPPER}} .service-card_text, {{WRAPPER}} .service-box_text, {{WRAPPER}} .service-3d_text',
			]
		);

		$this->end_controls_section();

		/*-----------------------------------------Button styling------------------------------------*/

		$this->start_controls_section(
			'button_styling',
			[
				'label' 	=> __( 'Button Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout_style' => ['2', '4', '5']
				]
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);

		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Normal', 'webteck' ),
			]
		);
        $this->add_control(
			'button_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-box .th-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-box .th-btn'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .elementor-box .th-btn',
			]
		);

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-box .th-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-box .th-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Hover', 'webteck' ),
			]
		);
		$this->add_control(
			'button_hover_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-box .th-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
		$this->add_control(
			'button_hover_bg_color',
			[
				'label' 		=> __( 'Background Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .elementor-box .th-btn:hover:before'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();


	

		 if( $settings['layout_style'] == '2' ): ?>

			<div class="service-style2">
				<div class="row gy-4">
					<?php $i = 0; foreach( $settings['servicelist2'] as $data ):
						$i++;
			        	$k = str_pad($i, 2, '0', STR_PAD_LEFT);
						?>
						<div class="col-md-6 col-xl-4">
							<div class="service-card elementor-box">
								<div class="service-card_number"><?php echo esc_html($k);?></div>
								<?php if(!empty($data['service_icon']['url'])){ ?>
									<div class="shape-icon">
										<?php echo webteck_img_tag( array(
											'url'   => esc_url( $data['service_icon']['url']  ),
										)); ?>
										<span class="dots"></span>
									</div>
								<?php } ?>
								<?php if( ! empty( $data['service_title'])): ?>
									<h3 class="box-title"><a href="<?php echo esc_url( $data['button_url']['url'] );?>"><?php echo esc_html( $data['service_title'] );?></a></h3>
								<?php endif; ?>
								<?php if( ! empty( $data['service_text'])): ?>
									<p class="service-card_text"><?php echo esc_html( $data['service_text'] );?></p>
								<?php endif; ?>
								<a href="<?php echo esc_url( $data['button_url']['url'] );?>" class="th-btn"><?php echo esc_html( $settings['service_btn_text'] );?><i class="fa-regular fa-arrow-right ms-2"></i></a>
								<?php if(!empty($settings['service_bg']['url'])){ ?>
									<div class="bg-shape">
										<?php echo webteck_img_tag( array(
											'url'   => esc_url( $settings['service_bg']['url']  ),
										)); ?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

        <?php elseif( $settings['layout_style'] == '3' ): ?>

        	<div class="service-style3">
				<div class="swiper th-slider has-shadow" id="projectSlider2" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
					<div class="swiper-wrapper">
						<?php foreach( $settings['servicelist3'] as $data ): ?>
							<div class="swiper-slide">
								<div class="service-box elementor-box">
									<?php if(!empty($data['service_img']['url'])){ ?>
										<div class="service-box_img">
											<?php echo webteck_img_tag( array(
												'url'   => esc_url( $data['service_img']['url']  ),
											)); ?>
										</div>
									<?php } ?>
									<div class="service-box_content">
										<?php if(!empty($data['service_icon']['url'])){ ?>
											<div class="service-box_icon">
												<?php echo webteck_img_tag( array(
													'url'   => esc_url( $data['service_icon']['url']  ),
												)); ?>
											</div>
										<?php } ?>
										<?php if( ! empty( $data['service_title'])): ?>
											<h3 class="box-title"><a href="<?php echo esc_url( $data['button_url']['url'] );?>"><?php echo esc_html( $data['service_title'] );?></a></h3>
										<?php endif; ?>
										<?php if( ! empty( $data['service_text'])): ?>
											<p class="service-box_text"><?php echo esc_html( $data['service_text'] );?></p>
										<?php endif; ?>
										<a href="<?php echo esc_url( $data['button_url']['url'] );?>" class="link-btn"><?php echo esc_html( $settings['service_btn_text'] );?><i class="fas fa-arrow-right ms-2"></i></a>
										<?php if(!empty($settings['service_bg']['url'])){ ?>
											<div class="bg-shape">
												<?php echo webteck_img_tag( array(
													'url'   => esc_url( $settings['service_bg']['url']  ),
												)); ?>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>

         <?php elseif( $settings['layout_style'] == '4' ): ?>

			<div class="service-style4">
				<div class="swiper th-slider has-shadow" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
					<div class="swiper-wrapper">
						<?php foreach( $settings['servicelist4'] as $data ): ?>
							<div class="swiper-slide">
								<div class="service-3d elementor-box">
									<?php if(!empty($data['service_icon']['url'])){ ?>
										<div class="service-3d_icon">
											<?php echo webteck_img_tag( array(
												'url'   => esc_url( $data['service_icon']['url']  ),
											)); ?>
										</div>
									<?php } ?>
									<div class="service-3d_content">
										<?php if( ! empty( $data['service_title'])): ?>
											<h3 class="box-title"><a href="<?php echo esc_url( $data['button_url']['url'] );?>"><?php echo esc_html( $data['service_title'] );?></a></h3>
										<?php endif; ?>
										<?php if( ! empty( $data['service_text'])): ?>
											<p class="service-3d_text"><?php echo esc_html( $data['service_text'] );?></p>
										<?php endif; ?>
										<a href="<?php echo esc_url( $data['button_url']['url'] );?>" class="th-btn"><?php echo esc_html( $settings['service_btn_text'] );?><i class="fa-regular fa-arrow-right ms-2"></i></a>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						</div>
				</div>
			</div>

         <?php elseif( $settings['layout_style'] == '5' ): ?>

			<div class="service-style5">
				<div class="swiper th-slider has-shadow" id="serviceSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'>
					<div class="swiper-wrapper">
						<?php foreach( $settings['servicelist5'] as $data ): ?>
							<div class="swiper-slide">
								<div class="service-grid elementor-box">
									<?php if(!empty($data['service_icon']['url'])){ ?>
										<div class="service-grid_icon">
											<?php echo webteck_img_tag( array(
												'url'   => esc_url( $data['service_icon']['url']  ),
											)); ?>
										</div>
									<?php } ?>
									<div class="service-grid_content">
										<?php if( ! empty( $data['service_title'])): ?>
											<h3 class="box-title"><a href="<?php echo esc_url( $data['button_url']['url'] );?>"><?php echo esc_html( $data['service_title'] );?></a></h3>
										<?php endif; ?>
										<?php if( ! empty( $data['service_text'])): ?>
											<p class="service-grid_text"><?php echo esc_html( $data['service_text'] );?></p>
										<?php endif; ?>
										<a href="<?php echo esc_url( $data['button_url']['url'] );?>" class="th-btn"><?php echo esc_html( $settings['service_btn_text'] );?><i class="fa-regular fa-arrow-right ms-2"></i></a>
										<?php if(!empty($settings['service_bg']['url'])){ ?>
											<div class="bg-shape">
												<?php echo webteck_img_tag( array(
													'url'   => esc_url( $settings['service_bg']['url']  ),
												)); ?>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
         	
    	<?php else: ?>

				<div class="slider-area">
	                <div class="swiper th-slider has-shadow" data-slider-options='{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}'>
	                    <div class="swiper-wrapper">
							<?php foreach( $settings['servicelist'] as $data ): ?>
								<div class="swiper-slide">
									<div class="service-featured elementor-box">
										<div class="service-featured_content">
											<?php if(!empty($data['service_icon']['url'])){ ?>
												<div class="shape-icon">
													<?php echo webteck_img_tag( array(
														'url'   => esc_url( $data['service_icon']['url']  ),
													)); ?>
													<span class="dots"></span>
												</div>
											<?php } ?>
											<?php if( ! empty( $data['service_title'])): ?>
												<h3 class="box-title"><a href="<?php echo esc_url( $data['button_url']['url'] );?>"><?php echo esc_html( $data['service_title'] );?></a></h3>
											<?php endif; ?>
											<?php if( ! empty( $data['service_text'])): ?>
												<p class="service-featured_text"><?php echo esc_html( $data['service_text'] );  ?></p>
											<?php endif; ?>
											<a href="<?php echo esc_url( $data['button_url']['url'] );?>" class="icon-btn"><i class="fa-regular fa-arrow-right"></i></a>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
    	<?php endif; ?>

    	<?php

	}

}