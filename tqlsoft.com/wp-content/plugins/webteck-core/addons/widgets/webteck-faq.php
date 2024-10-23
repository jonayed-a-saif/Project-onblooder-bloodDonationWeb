<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class Traga_Faq extends Widget_Base {

	public function get_name() {
		return 'tragafaq';
	}

	public function get_title() {
		return __( 'Webteck Faq', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'webteck' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Faq Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2'  		=> __( 'Style Two', 'webteck' ),
					'3'  		=> __( 'Style Three', 'webteck' ),
				],
			]
		);

		$this->add_control(
			'faq_id',
			[
				'label' 	  => __( 'Area ID', 'webteck' ),
                'type' 		  => Controls_Manager::TEXTAREA,
                'rows' 		  => 2,
                'description' => __( 'Provide Different ID if used multiple faq', 'webteck' ),
                'placeholder' => __( 'One, Two, Three', 'webteck' ),
			]
        );
		$this->add_control(
			'active_collapse',
			[
				'label' 	  => __( 'Active Items Number', 'webteck' ),
                'type' 		  => Controls_Manager::TEXTAREA,
                'rows' 		  => 2,
                'placeholder' => __( '0, 1, 2, 3', 'webteck' ),
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Where can I get analytics help?', 'webteck' )
			]
        );
        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.', 'webteck' )
			]
        );

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'Where can I get analytics help?', 'webteck' ),
						'faq_answer'      => __( 'Dramatically disseminate real-time portals rather than top-line action items. Uniquely provide access to low-risk high-yield products without dynamic products. Progressively re-engineer low-risk high-yield ideas rather than emerging alignments.', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ faq_question }}}',
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Faq Question Color', 'webteck' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Faq Question Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Faq Question Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Faq Question Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->add_control(
			'faq_answer_color',
			[
				'label' 		=> __( 'Faq Answer Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
				'separator'		=> 'before'
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography',
				'label' 	=> __( 'Faq Answer Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin',
			[
				'label' 		=> __( 'Faq Answer Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Faq Answer Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if ( $settings['layout_style'] == '1' ) {
			$style_class = "";
		} elseif ( $settings['layout_style'] == '2' ) {
			$style_class = "style2 ";
		} else {
			$style_class = "style3 ";
		}

		if ( ! empty( $settings['faq_id'] ) ) {
			$faq_id = $settings['faq_id'];
		} else {
			$faq_id = '';
		}
		
		if ( ! empty( $settings['active_collapse'] ) ) {
			$active_number = $settings['active_collapse'];
		} else {
			$active_number = 1;
		}

		if ( ! empty( $settings['faq_repeater'] ) ){
			echo '<div class="accordion-area accordion" id="faqAccordion'.esc_attr( $faq_id ).'">';
				$x = 1;
				foreach ( $settings['faq_repeater'] as $single_data ) {
					if ( $x == $active_number ) {
						$ariaexpanded 	= 'true';
						$class 			= 'show';
						$collesed 		= '';
						$is_active 		= 'active';
					} else {
						$ariaexpanded 	= 'false';
						$class 			= '';
						$collesed 		= 'collapsed';
						$is_active 		= '';
					}
					echo '<div class="accordion-card '.esc_attr( $style_class ).esc_attr( $is_active ).'">';
						if ( ! empty( $single_data['faq_question'] ) ) {
							echo '<div class="accordion-header" id="collapse-item-'.esc_attr( $x . $faq_id ).'">';
								echo '<button class="accordion-button '.esc_attr( $collesed ).'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.esc_attr( $x . $faq_id ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="collapse-'.esc_attr( $x . $faq_id ).'">'.esc_html($single_data['faq_question']).'</button>';
							echo '</div>';
						}
						if ( ! empty( $single_data['faq_answer'] ) ) {
							echo '<div id="collapse-'.esc_attr( $x . $faq_id ).'" class="accordion-collapse collapse '.esc_attr( $class ).' " aria-labelledby="collapse-item-'.esc_attr( $x . $faq_id ).'" data-bs-parent="#faqAccordion'.esc_attr( $faq_id ).'">';
								echo '<div class="accordion-body">';
									echo '<p class="faq-text">'.esc_html($single_data['faq_answer']).'</p>';
								echo '</div>';
							echo '</div>';
						}
					echo '</div>';
					$x++;
				}
			echo '</div>';
		}
        
	}
}