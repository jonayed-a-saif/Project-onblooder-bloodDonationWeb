<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Testimonial Slider Widget .
 *
 */
class Traga_Testimonial_Slider extends Widget_Base{

	public function get_name() {
		return 'tragatestimonial';
	}

	public function get_title() {
		return __( 'Webteck Testimonial', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'testimonial_slider_section',
			[
				'label' 	=> __( 'Testimonial Slider', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Testimonial Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options'		=> [
					'1'  			=> __( 'Style One', 'webteck' ),
					'2' 			=> __( 'Style Two', 'webteck' ),
					'3' 			=> __( 'Style Three', 'webteck' ),
					'4' 			=> __( 'Style Four', 'webteck' ),
					'5' 			=> __( 'Style Five', 'webteck' ),
				],
			]
		);

		//----------------------------feddback repeter start--------------------------------//

		$this->add_control(
			'quote_icon',
			[
				'label' 		=> __( 'Quote Icon', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater = new Repeater();
		$repeater->add_control(
			'client_image',
			[
				'label' 		=> __( 'Client Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'logo',
			[
				'label' 		=> __( 'Client Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'client_name', [
				'label' 		=> __( 'Client Name', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Alex Farnandes' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'client_designation', [
				'label' 		=> __( 'Client Designation', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'UI/UX Designer' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
        $repeater->add_control(
			'client_feedback', [
				'label' 		=> __( 'Client Feedback', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '“Phosfluorescently reinvent prospective metrics before granular schema. Professionally metrics before expedite client-centric methods of empow ment whereas effective solut ion.”' , 'webteck' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_rating',
			[
				'label' 	=> __( 'Client Rating / Not In Style 4', 'webteck' ),
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
			'slides',
			[
				'label' 		=> __( 'Slides', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'client_name' 		=> __( 'Alex Farnandes', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ client_name }}}',
			]
		);

		$this->end_controls_section();

	

		/*-----------------------------------------General styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'General Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'general_bg_color',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-card-slide'	=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} .testi-box'	=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} .testi-grid'	=> 'background-color: {{VALUE}};',
					'{{WRAPPER}} .testi-block-area'	=> 'background-color: {{VALUE}};',
				],
			]
        );
        $this->add_responsive_control(
			'general_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .testi-card-slide' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .testi-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .testi-grid' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .testi-block-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'selectors' 	=> [
						'{{WRAPPER}} .testi-card-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .testi-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .testi-grid' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .testi-block-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
                ],
			]
        );
        $this->add_control(
			'star_color',
			[
				'label' 		=> __( 'Star Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .testi-card_review'	=> 'color: {{VALUE}};',
					'{{WRAPPER}} .testi-grid_review'	=> 'color: {{VALUE}};',
					'{{WRAPPER}} .testi-box_review'	=> 'color: {{VALUE}};',
					'{{WRAPPER}} .testi-block_review'	=> 'color: {{VALUE}};',
				],
			]
        );

        $this->end_controls_section();


		/*-----------------------------------------Feedback styling------------------------------------*/

		$this->start_controls_section(
			'overview_con_styling',
			[
				'label' 	=> __( 'Feedback Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->start_controls_tabs(
			'style_tabs2'
		);


		$this->start_controls_tab(
			'style_normal_tab2',
			[
				'label' => esc_html__( 'Name', 'webteck' ),
			]
		);
        $this->add_control(
			'overview_title_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_title_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_title_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_title_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
		$this->end_controls_tab();

		//--------------------secound--------------------//

		$this->start_controls_tab(
			'style_hover_tab2',
			[
				'label' => esc_html__( 'Designation', 'webteck' ),
			]
		);
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} [class*="desig"]'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} [class*="desig"]',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} [class*="desig"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} [class*="desig"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		//--------------------three--------------------//

		$this->start_controls_tab(
			'style_hover_tab3',
			[
				'label' => esc_html__( 'Feedback', 'webteck' ),
			]
		);
		$this->add_control(
			'testi_feedback_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} [class*="text"]'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'testi_feedback_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} [class*="text"]',
			]
		);

        $this->add_responsive_control(
			'testi_feedback_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} [class*="text"]' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'testi_feedback_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} [class*="text"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->end_controls_tab();

		$this->end_controls_tabs();
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		
		
		if ( $settings['layout_style'] == '1' ){
			echo '<div class="testi-card-area slider-area">';
				echo '<div class="swiper th-slider" id="testiSlide1" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['slides'] as $singleslide ) {
							echo '<div class="swiper-slide">';
								echo '<div class="testi-card">';
									echo '<div class="testi-card_review">';
										if( $singleslide['client_rating'] == 'one' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'two' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'three' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'four' ){
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
									
									if( ! empty( $singleslide['client_feedback'] ) ) {
										echo '<p class="testi-card_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
									}
									
									echo '<div class="testi-card_profile">';
										if( ! empty( $singleslide['client_image']['url'] ) ){
											echo '<div class="testi-card_avater">';
												echo webteck_img_tag( array(
													'url'	=> esc_url( $singleslide['client_image']['url'] ),
												) );
											echo '</div>';
										}
										echo '<div class="media-body">';
											if( ! empty( $singleslide['client_name'] ) ) {
												echo '<h3 class="testi-card_name">'.esc_html( $singleslide['client_name'] ).'</h3>';
											}
											if( ! empty( $singleslide['client_designation'] ) ) {
												echo '<span class="testi-card_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
											}
										echo '</div>';
									echo '</div>';
									if( ! empty( $settings['quote_icon']['url'] ) ){
										echo '<div class="testi-card_quote">';
											echo webteck_img_tag( array(
												'url'	=> esc_url( $settings['quote_icon']['url'] ),
											) );
										echo '</div>';
									}
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<div class="testi-thumb-wrap">';
					echo '<div class="testi-thumb testi-card-tab" data-slider-tab="#testiSlide1">';
						$i = 0;
						foreach( $settings['slides'] as $singleslide ) {
							$i++;

							$active_class = $i == 1 ?'active': '';

							echo '<div class="tab-btn '.$active_class.'">';
								echo webteck_img_tag( array(
									'url'	=> esc_url( $singleslide['client_image']['url'] ),
								) );
							echo '</div>';
						}
						
					echo '</div>';
				echo '</div>';
			echo '</div>';
		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="testimonial_2">';
				echo '<div class="swiper th-slider has-shadow" id="testiSlider2" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"2"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['slides'] as $singleslide ) {
							echo '<div class="swiper-slide">';
								echo '<div class="testi-box">';
									if( ! empty( $singleslide['client_image']['url'] ) ){
										echo '<div class="testi-box_img">';
											echo webteck_img_tag( array(
												'url'	=> esc_url( $singleslide['client_image']['url'] ),
											) );
											if( ! empty( $settings['quote_icon']['url'] ) ){
												echo '<div class="testi-box_quote">';
													echo webteck_img_tag( array(
														'url'	=> esc_url( $settings['quote_icon']['url'] ),
													) );
												echo '</div>';
											}
										echo '</div>';
									}
									echo '<div class="testi-box_content">';
										if( ! empty( $singleslide['client_feedback'] ) ) {
											echo '<p class="testi-box_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
										}
										echo '<div class="testi-box_review">';
											if( $singleslide['client_rating'] == 'one' ){
												echo '<i class="fa-solid fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
											}elseif( $singleslide['client_rating'] == 'two' ){
												echo '<i class="fa-solid fa-star-sharp"></i>';
												echo '<i class="fa-solid fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
											}elseif( $singleslide['client_rating'] == 'three' ){
												echo '<i class="fa-solid fa-star-sharp"></i>';
												echo '<i class="fa-solid fa-star-sharp"></i>';
												echo '<i class="fa-solid fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
												echo '<i class="fa-light fa-star-sharp"></i>';
											}elseif( $singleslide['client_rating'] == 'four' ){
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
										if( ! empty( $singleslide['client_name'] ) ) {
											echo '<h3 class="box-title">'.esc_html( $singleslide['client_name'] ).'</h3>';
										}
										if( ! empty( $singleslide['client_designation'] ) ) {
											echo '<p class="testi-box_desig">'.esc_html( $singleslide['client_designation'] ).'</p>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<button data-slider-prev="#testiSlider2" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#testiSlider2" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
			echo '</div>';
		} elseif ( $settings['layout_style'] == '3' ) {
			echo '<div class="testimonial_3">';
				echo '<div class="swiper th-slider has-shadow" id="testiSlider3" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}\'>';
					echo '<div class="swiper-wrapper">';
						foreach( $settings['slides'] as $singleslide ) {
							echo '<div class="swiper-slide">';
								echo '<div class="testi-grid">';
									if( ! empty( $singleslide['client_image']['url'] ) ){
										echo '<div class="testi-grid_img">';
											echo webteck_img_tag( array(
												'url'	=> esc_url( $singleslide['client_image']['url'] ),
											) );
											if( ! empty( $settings['quote_icon']['url'] ) ){
												echo '<div class="testi-grid_quote">';
													echo webteck_img_tag( array(
														'url'	=> esc_url( $settings['quote_icon']['url'] ),
													) );
												echo '</div>';
											}
										echo '</div>';
									}
									echo '<div class="testi-grid_review">';
										if( $singleslide['client_rating'] == 'one' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'two' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'three' ){
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-solid fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
											echo '<i class="fa-light fa-star-sharp"></i>';
										}elseif( $singleslide['client_rating'] == 'four' ){
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
									echo '<div class="testi-grid_content">';
										if( ! empty( $singleslide['client_feedback'] ) ) {
											echo '<p class="testi-grid_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
										}
										
										if( ! empty( $singleslide['client_name'] ) ) {
											echo '<h3 class="box-title">'.esc_html( $singleslide['client_name'] ).'</h3>';
										}
										if( ! empty( $singleslide['client_designation'] ) ) {
											echo '<p class="testi-grid_desig">'.esc_html( $singleslide['client_designation'] ).'</p>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
				echo '</div>';
				echo '<button data-slider-prev="#testiSlider3" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#testiSlider3" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
			echo '</div>';
		} elseif ( $settings['layout_style'] == '4' ) {
			echo '<div class="testimonial_3">';
				echo '<div class="testi-block-area">';
					echo '<div class="swiper th-slider has-shadow testi-block-slide" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"1"},"992":{"slidesPerView":"1"},"1200":{"slidesPerView":"1"}}}\'>';
						echo '<div class="swiper-wrapper">';
							foreach( $settings['slides'] as $singleslide ) {
								echo '<div class="swiper-slide">';
									echo '<div class="testi-block">';
										if( ! empty( $singleslide['client_feedback'] ) ) {
											echo '<p class="testi-block_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
										}
										
										echo '<div class="testi-block_profile">';
											if( ! empty( $singleslide['client_image']['url'] ) ){
												echo '<div class="testi-block_avater">';
													echo webteck_img_tag( array(
														'url'	=> esc_url( $singleslide['client_image']['url'] ),
													) );
													
												echo '</div>';
											}
											echo '<div class="media-body">';
												if( ! empty( $singleslide['client_name'] ) ) {
													echo '<h3 class="box-title">'.esc_html( $singleslide['client_name'] ).'</h3>';
												}
												if( ! empty( $singleslide['client_designation'] ) ) {
													echo '<p class="testi-block_desig">'.esc_html( $singleslide['client_designation'] ).'</p>';
												}
											echo '</div>';
										echo '</div>';
									echo '</div>';
								echo '</div>';
							}
						echo '</div>';
						echo '<div class="slider-pagination"></div>';
					echo '</div>';
					if( ! empty( $settings['quote_icon']['url'] ) ){
						echo '<div class="testi-block-quote">';
							echo webteck_img_tag( array(
								'url'	=> esc_url( $settings['quote_icon']['url'] ),
							) );
						echo '</div>';
					}
				echo '</div>';
			echo '</div>';
		}else{
			echo '<div class="slider-area testi-grid4-area">';
                echo '<div class="swiper th-slider testiSlider8 has-shadow" id="testiSlide8" data-slider-options=\'{"thumbs":{"swiper":".testi-grid3-thumb"},"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1","centeredSlides":"true"},"768":{"slidesPerView":"1","centeredSlides":"true"},"992":{"slidesPerView":"1","centeredSlides":"true"},"1200":{"slidesPerView":"3","centeredSlides":"true"},"1400":{"slidesPerView":"4","centeredSlides":"true"}}}\'>';
                    echo '<div class="swiper-wrapper">';

                    	foreach( $settings['slides'] as $singleslide ) {
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="testi-box7 th-ani">';
	                            	if( ! empty( $singleslide['client_feedback'] ) ) {
										echo '<p class="testi-box7_text">'.wp_kses_post( $singleslide['client_feedback'] ).'</p>';
									}
	                                echo '<div class="testi-box7_wrapper">';
	                                    echo '<div class="testi-box7_profile">';
	                                    	if( ! empty( $singleslide['client_image']['url'] ) ){
												echo '<div class="testi-box7_author">';
													echo webteck_img_tag( array(
														'url'	=> esc_url( $singleslide['client_image']['url'] ),
													) );
												echo '</div>';
											}
	                                        echo '<div class="testi-box7_info">';
	                                            if( ! empty( $singleslide['client_name'] ) ) {
													echo '<h3 class="box-title">'.esc_html( $singleslide['client_name'] ).'</h3>';
												}
												if( ! empty( $singleslide['client_designation'] ) ) {
		                                            echo '<span class="testi-box7_desig">'.esc_html( $singleslide['client_designation'] ).'</span>';
		                                        }
	                                        echo '</div>';
	                                    echo '</div>';
	                                    echo '<div class="testi-box7_review">';
	                                        if( $singleslide['client_rating'] == 'one' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
											}elseif( $singleslide['client_rating'] == 'two' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
											}elseif( $singleslide['client_rating'] == 'three' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
											}elseif( $singleslide['client_rating'] == 'four' ){
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-light fa-star"></i>';
											}else{
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
												echo '<i class="fa-solid fa-star"></i>';
											}
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                        


                    echo '</div>';

                echo '</div>';

                echo '<div class="testi-indicator">';
                    echo '<div class="swiper th-slider testi-grid3-thumb" data-slider-options=\'{"effect":"slide","slidesPerView":"5","spaceBetween":13,"loop":true,"breakpoints":{"0":{"slidesPerView":4},"576":{"slidesPerView":"5"}}}\' data-slider-tab="#testiSlide1">';
                        echo '<div class="swiper-wrapper">';

                            foreach( $settings['slides'] as $singleslide ) {
                            	if( ! empty( $singleslide['logo']['url'] ) ){
		                            echo '<div class="swiper-slide">';
		                                echo '<div class="box-img">';
		                                    echo webteck_img_tag( array(
												'url'	=> esc_url( $singleslide['logo']['url'] ),
											) );
		                                echo '</div>';
		                            echo '</div>';
		                        }
	                        }
                            

                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#testiSlide8" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#testiSlide8" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
                echo '<div class="testi-line"></div>';
            echo '</div>';
		}

	}
}