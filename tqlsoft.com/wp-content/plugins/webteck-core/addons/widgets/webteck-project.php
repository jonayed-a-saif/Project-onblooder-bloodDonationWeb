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
 * Team Widget .
 *
 */
class Traga_Project extends Widget_Base {

	public function get_name() {
		return 'tragaproject';
	}

	public function get_title() {
		return __( 'Webteck Project', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'team_section',
			[
				'label'     => __( 'Project Slider', 'webteck' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Project Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					'3' 		=> __( 'Style Three', 'webteck' ),
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> __( 'Project Title', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'IT Consultency' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'Project Title', 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'project_link',
			[
				'label' 		=> esc_html__( 'Project Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://angfuzsoft.com/wordpress/webteck/project-details',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'subtitle', [
				'label' 		=> __( 'Subtitle / Content', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Technology' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'Project Subtitle / Content', 'webteck' ),
				'rows' 			=> 4,
			]
        );
        $repeater->add_control(
			'project_image',
			[
				'label' 		=> esc_html__( 'Project Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
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
                'condition' => [
					'layout_style' => ['1']
				]
			]
		);
		$this->add_control(
			'project_list',
			[
				'label' 		=> __( 'Project Title', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Project Title', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);

        $this->end_controls_section();

        //------------------------------------feature Control------------------------------------//

		$this->start_controls_section(
			'slider_control',
			[
				'label'     => __( 'Slider Control', 'webteck' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'make_it_slider',
			[
				'label' 		=> __( 'Use it as slider ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

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
		// 			'size' 			=> 3,
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
		// 			'size' 		=> 2,
		// 		],
		// 		'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
		// 	]
		// );

  //       $this->add_control(
		// 	'small_mobile_items',
		// 	[
		// 		'label' 		=> __( 'Small Mobile Items', 'webteck' ),
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

		// $this->add_control(
		// 	'slider_arrows',
		// 	[
		// 		'label' 		=> __( 'Slider Arrows', 'webteck' ),
		// 		'type' 			=> Controls_Manager::SWITCHER,
		// 		'label_on' 		=> __( 'Show', 'webteck' ),
		// 		'label_off' 	=> __( 'Hide', 'webteck' ),
		// 		'return_value' 	=> 'yes',
		// 		'default' 		=> 'yes',
		// 		'condition'		=> [ 'make_it_slider' => [ 'yes' ] ],
		// 	]
		// );

		$this->end_controls_section();

        /*----------------------------------------- General styling------------------------------------*/
		$this->start_controls_section(
			'box_general_style',
			[
				'label' 	=> __( 'General Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'box_background',
			[
				'label' 		=> __( 'Box Background', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .project-grid_content' => 'background-color: {{VALUE}}',
				]
			]
        );

       	$this->add_responsive_control(
			'box_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .project-grid_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

       	$this->add_responsive_control(
			'box_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .project-card' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .project-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .project-grid' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
		
		$this->end_controls_section();

		/*----------------------------------------- Title styling------------------------------------*/

		$this->start_controls_section(
			'title_styling',
			[
				'label' 	=> __( 'Title Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);

		$this->start_controls_tab(
			'title_normal_tab2',
			[
				'label' => esc_html__( 'Normal', 'webteck' ),
			]
		);
        $this->add_control(
			'title_normal_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .box-title'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'normal_title_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .box-title',
			]
		);

		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'title_hover_tab2',
			[
				'label' => esc_html__( 'Hover', 'webteck' ),
			]
		);
		$this->add_control(
			'hover_title_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .box-title a:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'hover_title_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .box-title a:hover',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_section();

		/*----------------------------------------- Subtitle styling------------------------------------*/

		$this->start_controls_section(
			'content_styling',
			[
				'label' 	=> __( 'Subtitle Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'content_normal_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .project-subtitle'	=> 'color: {{VALUE}};',
					'{{WRAPPER}} .project-grid_text'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'normal_desig_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .project-subtitle',
			]
		);

		$this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		

		if ( $settings['layout_style'] == '1' ) {
			echo '<div class="project_1">';
				if ($settings['make_it_slider'] == 'yes'){
				echo '<div class="swiper th-slider has-shadow" id="projectSlider1" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
				}else{
					echo '<div class="row gy-4">';
				}
						$i = 0; 
						foreach( $settings['project_list'] as $data ) {
							
							$i++;
							$target = $data['project_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['project_link']['nofollow'] ? ' rel="nofollow"' : '';

							if ($settings['make_it_slider'] == 'yes'){
								echo '<div class="swiper-slide">';
							}else{
								echo '<div class="col-lg-4 col-md-6">';
							}
								echo '<div class="project-card">';
									if( ! empty( $data['project_image']['url'] ) ){
										echo '<div class="project-img">';
											echo webteck_img_tag( array(
												'url'       => esc_url( $data['project_image']['url'] ),
											) );
										echo '</div>';
									}
	                                echo '<div class="project-content-wrap">';
	                                    echo '<div class="project-content">';
	                                        if($settings['particle_enable'] == 'yes') {
	                                            echo '<div class="box-particle" id="project-p'. $i .'"></div>';
	                                        }
	                                        if( ! empty( $data['title']) ){
	                                            echo '<h3 class="box-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['project_link']['url'] ).'">'.esc_html($data['title']).'</a></h3>';
	                                        }
	                                        if( ! empty( $data['subtitle']) ){
	                                            echo '<p class="project-subtitle">'.esc_html($data['subtitle']).'</p>';
	                                        }
	                                        if( ! empty( $data['project_image']['url'] ) ){
	                                            echo '<a href="'.$data['project_image']['url'].'" class="icon-btn popup-image"><i class="far fa-plus"></i></a>';
	                                        }
	                                        
	                                    echo '</div>';
	                                echo '</div>';
								echo '</div>';
							echo '</div>';
						}  
					echo '</div>';
				if ($settings['make_it_slider'] == 'yes'){
					echo '</div>';
					echo '<button data-slider-prev="#projectSlider1" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
	                echo '<button data-slider-next="#projectSlider1" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
	            }
			echo '</div>';	
		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="project_2">';
				echo '<div class="swiper th-slider has-shadow" id="projectSlider2" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['project_list'] as $data ) {
							$target = $data['project_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['project_link']['nofollow'] ? ' rel="nofollow"' : '';
							echo '<div class="swiper-slide">';
								echo '<div class="project-grid">';
									if( ! empty( $data['project_image']['url'] ) ){
										echo '<div class="project-grid_img">';
											echo webteck_img_tag( array(
												'url'       => esc_url( $data['project_image']['url'] ),
											) );
	                                        if( ! empty( $data['project_image']['url'] ) ){
	                                            echo '<a href="'.$data['project_image']['url'].'" class="play-btn style3 popup-image"><i class="far fa-plus"></i></a>';
	                                        }
										echo '</div>';
									}
	                                echo '<div class="project-grid_content">';
	                                    if( ! empty( $data['title']) ){
	                                        echo '<h3 class="box-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['project_link']['url'] ).'">'.esc_html($data['title']).'</a></h3>';
	                                    }
	                                    if( ! empty( $data['subtitle']) ){
	                                        echo '<p class="project-grid_text">'.esc_html($data['subtitle']).'</p>';
	                                    }
	                                echo '</div>';
								echo '</div>';
							echo '</div>';
						}  
					echo '</div>';
				echo '</div>';
				echo '<button data-slider-prev="#projectSlider2" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#projectSlider2" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
			echo '</div>';
		} else {
			echo '<div class="project_3">';
				echo '<div class="swiper th-slider has-shadow" id="projectSlider3" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['project_list'] as $data ) {
							$target = $data['project_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['project_link']['nofollow'] ? ' rel="nofollow"' : '';
							echo '<div class="swiper-slide">';
								echo '<div class="project-box">';
									if( ! empty( $data['project_image']['url'] ) ){
										echo '<div class="project-img">';
											echo webteck_img_tag( array(
												'url'       => esc_url( $data['project_image']['url'] ),
											) );
										echo '</div>';
									}
	                                echo '<div class="project-content">';
	                                    echo '<div class="media-body">';
	                                        if( ! empty( $data['title']) ){
	                                            echo '<h3 class="box-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['project_link']['url'] ).'">'.esc_html($data['title']).'</a></h3>';
	                                        }
	                                        if( ! empty( $data['subtitle']) ){
	                                            echo '<p class="project-subtitle">'.esc_html($data['subtitle']).'</p>';
	                                        }
	                                    echo '</div>';
										if( ! empty( $data['project_image']['url'] ) ){
											echo '<a href="'.$data['project_image']['url'].'" class="icon-btn popup-image"><i class="far fa-plus"></i></a>';
										}
	                                echo '</div>';
								echo '</div>';
							echo '</div>';
						}  
					echo '</div>';
				echo '</div>';
				echo '<button data-slider-prev="#projectSlider3" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#projectSlider3" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
			echo '</div>';	
		}
		
	}
}