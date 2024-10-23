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
class Traga_Team extends Widget_Base {

	public function get_name() {
		return 'tragateam';
	}

	public function get_title() {
		return __( 'Webteck Team', 'webteck' );
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
				'label'     => __( 'Team Slider', 'webteck' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Team Style', 'webteck' ),
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
			'name', [
				'label' 		=> __( 'Name', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Rayan Athels' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'Your Name', 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'profile_link',
			[
				'label' 		=> esc_html__( 'Profile Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://angfuzsoft.com/wordpress/webteck/team-details',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Founder & CEO' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'Your Designation', 'webteck' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'team_image',
			[
				'label' 		=> esc_html__( 'Profile Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
        );
        $repeater->add_control(
			'fb_link',
			[
				'label' 		=> esc_html__( 'Facebook Link', 'webteck' ),
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
			'twitter_link',
			[
				'label' 		=> esc_html__( 'Twitter Link', 'webteck' ),
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
			'instagram_link',
			[
				'label' 		=> esc_html__( 'Instagram Link', 'webteck' ),
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
			'linkedin_link',
			[
				'label' 		=> esc_html__( 'Linkedin Link', 'webteck' ),
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
			'particle_enable',
			[
				'label' 		=> __( 'Show Particle ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'team_members',
			[
				'label' 		=> __( 'Speaker Member', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
			]
		);

        $this->end_controls_section();

        //------------------------------------feature Control------------------------------------//

		$this->start_controls_section(
			'team_control',
			[
				'label'     => __( 'Team Control', 'webteck' ),
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
		// 			'size' 			=> 4,
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
		// 			'size' 		=> 3,
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

		$this->start_controls_section(
			'team_slider_general_style',
			[
				'label' 	=> __( 'General Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'team_box_background',
			[
				'label' 		=> __( 'Team Box Background', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-card .team-content' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .team-box' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .team-grid' => 'background-color: {{VALUE}}',
				]
			]
        );

		$this->add_control(
			'team_box_hvre_background',
			[
				'label' 		=> __( 'Team Box Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-card:hover .team-content' =>  'background-color: {{VALUE}}',
					'{{WRAPPER}} .team-box:hover' =>  'background-color: {{VALUE}}',
					'{{WRAPPER}} .team-grid:hover' =>  'background-color: {{VALUE}}',
				]
			]
        );

       	$this->add_responsive_control(
			'team_box_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-card .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .team-box .team-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .team-grid' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );

       	$this->add_responsive_control(
			'team_box_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
		
		$this->end_controls_section();

		/*----------------------------------------- Name styling------------------------------------*/

		$this->start_controls_section(
			'team_name_styling',
			[
				'label' 	=> __( 'Name Styling', 'webteck' ),
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
					'{{WRAPPER}} .box-title'	=> 'color: {{VALUE}}!important;',
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
					'{{WRAPPER}} .th-team:hover .box-title'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'hover_title_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}}  .th-team:hover .box-title',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'team_title_margin',
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
			'team_title_padding',
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

		/*----------------------------------------- Designation styling------------------------------------*/

		$this->start_controls_section(
			'team_desig_styling',
			[
				'label' 	=> __( 'Designation Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs3'
		);

		$this->start_controls_tab(
			'desig_normal_tab2',
			[
				'label' => esc_html__( 'Normal', 'webteck' ),
			]
		);
        $this->add_control(
			'desig_normal_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .team-desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'normal_desig_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .team-desig',
			]
		);

		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'desig_hover_tab2',
			[
				'label' => esc_html__( 'Hover', 'webteck' ),
			]
		);
		$this->add_control(
			'hover_desig_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-team:hover .team-desig'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'hover_desig_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}}  .th-team:hover .team-desig',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'team_desig_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-desig' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'team_desig_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .team-desig' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();
   
		// if ($settings['make_it_slider'] == 'yes'){
		// 	$this->add_render_attribute( 'wrapper', 'class', 'row slider-shadow th-carousel' );
		// 	$this->add_render_attribute( 'wrapper', 'data-slide-show', $settings['desktop_items']['size'] );
	 //        $this->add_render_attribute( 'wrapper', 'data-lg-slide-show', $settings['laptop_items']['size'] );
	 //        $this->add_render_attribute( 'wrapper', 'data-md-slide-show', $settings['tablet_items']['size'] );
	 //        $this->add_render_attribute( 'wrapper', 'data-sm-slide-show', $settings['mobile_items']['size'] );	
	 //        $this->add_render_attribute( 'wrapper', 'data-xs-slide-show', $settings['small_mobile_items']['size'] );
	 //        $this->add_render_attribute( 'wrapper', 'data-infinite', false );
		// 	if ($settings['slider_arrows'] == 'yes') {
		// 		$this->add_render_attribute( 'wrapper', 'data-arrows', true );
		// 	} else {

		// 	}
		// 	if ($settings['particle_enable'] == 'yes') {
		// 		$this->add_render_attribute( 'wrapper', 'data-infinite', false );
		// 	} else {
		// 		$this->add_render_attribute( 'wrapper', 'data-infinite', true );
		// 	}
		// } else {
		// 	$this->add_render_attribute( 'wrapper', 'class', 'row gy-40 slider-shadow' );
		// }

		if ( $settings['layout_style'] == '1' ) {
			echo '<div class="team_1">';
				if ($settings['make_it_slider'] == 'yes'){
				echo '<div class="swiper th-slider has-shadow" id="teamSlider2" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}\'>';
					echo '<div class="swiper-wrapper">';
				}else{
					echo '<div class="row gy-40">';
				}
						$i = 0; 

						foreach( $settings['team_members'] as $data ) {
							$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

							$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
							$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

							$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
							$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

							$i_target = $data['instagram_link']['is_external'] ? ' target="_blank"' : '';
							$i_nofollow = $data['instagram_link']['nofollow'] ? ' rel="nofollow"' : '';

							$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
							$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
							
							$i++;

							echo '<!-- Single Item -->';
							if ($settings['make_it_slider'] == 'yes'){
								echo '<div class="swiper-slide">';
							}else{
								echo '<div class="col-lg-3 col-md-6">';
							}
								echo '<div class="th-team team-card">';
									if( ! empty( $data['team_image']['url'] ) ){
										echo '<div class="team-img">';
											echo webteck_img_tag( array(
												'url'       => esc_url( $data['team_image']['url'] ),
											) );
										echo '</div>';
									}
									echo '<div class="team-content">';
										if ($settings['particle_enable'] == 'yes') {
											echo '<div class="box-particle" id="team-p'. $i .'"></div>';
										}
										echo '<div class="team-social">';
											if( ! empty( $data['fb_link']['url']) ){
												echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
											}
											if( ! empty( $data['twitter_link']['url']) ){
												echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
											}
											if( ! empty( $data['instagram_link']['url']) ){
												echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['instagram_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
											}
											if( ! empty( $data['linkedin_link']['url']) ){
												echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
											}
										echo '</div>';
										if( ! empty( $data['name']) ){
											echo '<h3 class="box-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
										}
										if( ! empty( $data['designation']) ){
											echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
										}
										
									echo '</div>';
								echo '</div>';

							echo '</div>';
						}  
					echo '</div>';
				if ($settings['make_it_slider'] == 'yes'){
					echo '</div>';
				}
				if ($settings['make_it_slider'] == 'yes'){
					echo '<button data-slider-prev="#teamSlider2" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
	                echo '<button data-slider-next="#teamSlider2" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
	            }
			echo '</div>';	
		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="team_2">';
				if ($settings['make_it_slider'] == 'yes'){
				echo '<div class="swiper th-slider has-shadow" id="teamSlider2" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}\'>';
					echo '<div class="swiper-wrapper">';
				}else{
					echo '<div class="row gy-40">';
				}
						$i = 0; 
						foreach( $settings['team_members'] as $data ) {
							$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

							$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
							$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

							$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
							$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

							$i_target = $data['instagram_link']['is_external'] ? ' target="_blank"' : '';
							$i_nofollow = $data['instagram_link']['nofollow'] ? ' rel="nofollow"' : '';

							$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
							$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
							
							$i++;

							echo '<!-- Single Item -->';
							if ($settings['make_it_slider'] == 'yes'){
								echo '<div class="swiper-slide">';
							}else{
								echo '<div class="col-lg-3 col-md-6">';
							}
								echo '<div class="th-team team-box">';
									if( ! empty( $data['team_image']['url'] ) ){
										echo '<div class="team-img">';
											echo webteck_img_tag( array(
												'url'       => esc_url( $data['team_image']['url'] ),
											) );
											echo '<div class="team-social">';
												echo '<div class="play-btn"><i class="far fa-plus"></i></div>';
												echo '<div class="th-social">';
													if( ! empty( $data['fb_link']['url']) ){
														echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
													}
													if( ! empty( $data['twitter_link']['url']) ){
														echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
													}
													if( ! empty( $data['instagram_link']['url']) ){
														echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['instagram_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
													}
													if( ! empty( $data['linkedin_link']['url']) ){
														echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
													}
												echo '</div>';
											echo '</div>';
										echo '</div>';
									}
									echo '<div class="team-content">';
										if ($settings['particle_enable'] == 'yes') {
											echo '<div class="box-particle" id="teamtwo-p'. $i .'"></div>';
										}
										if ( ! empty( $data['name']) ){
											echo '<h3 class="box-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
										}
										if ( ! empty( $data['designation']) ){
											echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
										}
									echo '</div>';
								echo '</div>';

							echo '</div>';
						}  
					echo '</div>';
				if ($settings['make_it_slider'] == 'yes'){
					echo '</div>';
					echo '<button data-slider-prev="#teamSlider2" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
                	echo '<button data-slider-next="#teamSlider2" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
				}
				
			echo '</div>';
		} else {
			echo '<div class="team_3">';
				echo '<div class="swiper th-slider has-shadow" id="teamSlider1" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
						$i = 0; 
						foreach( $settings['team_members'] as $data ) {
							$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

							$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
							$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

							$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
							$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

							$i_target = $data['instagram_link']['is_external'] ? ' target="_blank"' : '';
							$i_nofollow = $data['instagram_link']['nofollow'] ? ' rel="nofollow"' : '';

							$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
							$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';
							
							$i++;

							echo '<!-- Single Item -->';
							echo '<div class="swiper-slide">';
								echo '<div class="th-team team-grid">';
									if( ! empty( $data['team_image']['url'] ) ){
										echo '<div class="team-img">';
											echo webteck_img_tag( array(
												'url'       => esc_url( $data['team_image']['url'] ),
											) );
										echo '</div>';
									}
									echo '<div class="team-social">';
										echo '<div class="play-btn"><i class="far fa-plus"></i></div>';
										echo '<div class="th-social">';
											if( ! empty( $data['fb_link']['url']) ){
												echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
											}
											if( ! empty( $data['twitter_link']['url']) ){
												echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
											}
											if( ! empty( $data['instagram_link']['url']) ){
												echo '<a '.wp_kses_post( $i_nofollow.$i_target ).' href="'.esc_url( $data['instagram_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
											}
											if( ! empty( $data['linkedin_link']['url']) ){
												echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
											}
										echo '</div>';
									echo '</div>';
									
									if( ! empty( $data['name']) ){
										echo '<h3 class="box-title"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
									}
									if( ! empty( $data['designation']) ){
										echo '<span class="team-desig">'.esc_html($data['designation']).'</span>';
									}
									if($settings['particle_enable'] == 'yes') {
										echo '<div class="box-particle" id="team-p'. $i .'"></div>';
									}
								echo '</div>';
							echo '</div>';
						}  
					echo '</div>';
				echo '</div>';
				echo '<button data-slider-prev="#teamSlider1" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#teamSlider1" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
			echo '</div>';
		}
		
	}
}