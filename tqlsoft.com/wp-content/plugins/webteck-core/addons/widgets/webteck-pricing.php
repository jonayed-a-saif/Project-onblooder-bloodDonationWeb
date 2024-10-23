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
 * Pricing Box Widget .
 *
 */
class Traga_Pricing extends Widget_Base {

	public function get_name() {
		return 'tragapricing';
	}

	public function get_title() {
		return __( 'Webteck Pricing', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'pricing_section',
			[
				'label' 	=> __( 'Pricing', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'plan',
			[
				'label'     => __( 'Plan', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default' 	=> __( 'Silver Package', 'webteck' ),
			]
        );
        $this->add_control(
			'pricing_plan',
			[
				'label'     => __( 'Price', 'webteck' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default' 	=> __( '$199.00 <span class="duration">/Per Month</span>', 'webteck' ),
			]
        );
        $this->add_control(
			'desc',
			[
				'label'     => __( 'Description', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
                'default' 	=> __( 'Pricing plan for IT Solution company', 'webteck' ),
			]
        );
        $this->add_control(
			'features',
			[
				'label'     => __( 'Features List', 'webteck' ),
                'type'      => Controls_Manager::WYSIWYG,
			]
        );
        $this->add_control(
			'btn_txt',
			[
				'label'     => __( 'Button Text', 'webteck' ),
                'type'      => Controls_Manager::TEXT,
                'default' 	=> __( 'PURCHASE NOW', 'webteck' ),
			]
        );
        $this->add_control(
			'btn_url',
			[
				'label'     => __( 'Button Url', 'webteck' ),
                'type'      => Controls_Manager::TEXT,
                'rows' 		=> 2,
                'default' 	=> __( '#', 'webteck' ),
			]
        );

        $this->end_controls_section();

        /*-----------------------------------------GENERAL styling------------------------------------*/

        $this->start_controls_section(
			'basic_styling',
			[
				'label' 	=> __( 'General Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'general_color',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card'	=> 'background-color: {{VALUE}};',
				]
			]
        );    

        $this->add_responsive_control(
			'general_padding',
			[
				'label' 		=> __( 'Box Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .price-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);    
        $this->add_control(
			'plan_bg_color',
			[
				'label' 		=> __( 'Plan BG Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_top'	=> 'background-color: {{VALUE}};',
				]
			]
        );
        $this->add_control(
			'price_color',
			[
				'label' 		=> __( 'Price Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .price-card_price'	=> 'color: {{VALUE}};',
				]
			]
        );
        $this->end_controls_section();

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
                ],
			]
        );

        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Button Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Button Background Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Button Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .th-btn',
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

        echo '<div class="price-card">';
			echo '<div class="price-card_top">';
				if ( ! empty( $settings['plan'] ) ){
					echo '<h3 class="price-card_title">'.esc_html( $settings['plan'] ).'</h3>';
				}
				if ( ! empty( $settings['desc'] ) ){
					echo '<p class="price-card_text">'.esc_html( $settings['desc'] ).'</p>';
				}
				if ( ! empty( $settings['pricing_plan'] ) ){
					echo '<h4 class="price-card_price">';
					  echo wp_kses_post( $settings['pricing_plan'] );
					echo '</h4>';
				}
				echo '<div class="particle">';
					echo '<div class="price-particle" data-bg-src="'.WEBTECK_PLUGDIRURI.'assets/img/price_particle.png'.'"></div>';
				echo '</div>';
			echo '</div>';
			echo '<div class="price-card_content">';
				if ( ! empty( $settings['features'] ) ) {
					echo wp_kses_post( $settings['features'] );   
				}
				if ( ! empty( $settings['btn_txt'] ) ){
					echo '<a href="'.esc_url( $settings['btn_url'] ).'" class="th-btn">'.esc_html( $settings['btn_txt'] ).'<i class="far fa-arrow-right ms-2"></i></a>';
				}
			echo '</div>';
        echo '</div>';

	}
}