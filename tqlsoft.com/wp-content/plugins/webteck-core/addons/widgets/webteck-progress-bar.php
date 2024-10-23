<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
/**
 *
 * List Widget .
 *
 */
class Traga_Progress_Bar extends Widget_Base {

	public function get_name() {
		return 'tragaprogressbar';
	}

	public function get_title() {
		return __( 'Webteck Progress Bar', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'progress_section',
			[
				'label'     => __( 'Traga Progress Bar', 'webteck' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Progress Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'progress_title', [
				'label' 		=> esc_html__( 'Title', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Business Strategy' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'Title', 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'progress_percent', [
				'label' 		=> __( 'Progress Percent', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '85' , 'webteck' ),
				'placeholder' 	=> __( '1-100', 'webteck' ),
				'rows' 			=> 2,
			]
        );
        
		$this->add_control(
			'progress_repeater',
			[
				'label' 		=> __( 'Progress Items', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'progress_title' 		=> __( 'Business Strategy', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ progress_title }}}',
				'condition' => [
					'layout_style!' => ['2']
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'progress_title', [
				'label' 		=> esc_html__( 'Title', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Business Strategy' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'Title', 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'progress_text', [
				'label' 		=> esc_html__( 'Content', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'Business Strategy' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'Content', 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'progress_percent', [
				'label' 		=> __( 'Progress Percent', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '85' , 'webteck' ),
				'placeholder' 	=> __( '1-100', 'webteck' ),
				'rows' 			=> 2,
			]
        );
        
		$this->add_control(
			'progress_repeater2',
			[
				'label' 		=> __( 'Progress Items', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'progress_title' 		=> __( 'Business Grow', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ progress_title }}}',
				'condition' => [
					'layout_style' => ['2']
				]
			]
		);

        $this->end_controls_section();

        //------------------------------------ Style Control------------------------------------//

		$this->start_controls_section(
			'progress_styling',
			[
				'label' 	=> __( 'Progress Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'progress_title_color',
			[
				'label' 		=> __( 'Title Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> ['{{WRAPPER}} h3' => 'color: {{VALUE}}']
			],
        );
		$this->add_control(
			'progress_text_color',
			[
				'label' 		=> __( 'Text Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> ['{{WRAPPER}} p' => 'color: {{VALUE}}'],
				'condition' => [
					'layout_style' => ['1']
				]
			],
        );
		$this->add_control(
			'progress_percent_color',
			[
				'label' 		=> __( 'Percent Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .progress-value' => 'color: {{VALUE}}',
					'{{WRAPPER}} .circle-num' => 'color: {{VALUE}}',
				]
			],
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} h3'
			]
        );
        $this->add_control(
			'progress_color',
			[
				'label' 		=> __( 'Progress Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .skill-feature .progress-bar' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'layout_style' => ['1']
				]
			],
        );
        $this->add_control(
			'progress_bg_color',
			[
				'label' 		=> __( 'Progress Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .skill-feature .progress' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'layout_style' => ['1']
				]
			],
        );

		$this->add_control(
			'progress_color2', [
				'label' 		=> __( 'Progress Color', 'webteck' ),
				'description'   => __( 'Place a hex color value here.' , 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( '#0060FF' , 'webteck' ),
				'placeholder' 	=> __( '#0060FF', 'webteck' ),
				'condition' => [
					'layout_style' => ['2']
				]
			]
        ); 

		$this->add_responsive_control(
			'progress_margin',
			[
				'label' 		=> __( 'Progress Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .skill-feature:not(:last-child)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
			
        );

		$this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if ( $settings['layout_style'] == '1' ) {
            foreach( $settings['progress_repeater'] as $data ) {
				echo '<div class="skill-feature">';
					echo '<h3 class="skill-feature_title">'.esc_html($data['progress_title']).'</h3>';
					echo '<div class="progress">';
						echo '<div class="progress-bar" style="width: '.$data['progress_percent'].'%;">';
							echo '<div class="progress-value">'.$data['progress_percent'].'%</div>';
						echo '</div>';
					echo '</div>';
				echo '</div>';
			}
		} else {
			echo '<div class="feature-circle-wrap">';
				foreach( $settings['progress_repeater2'] as $data ) {
					echo '<div class="feature-circle">';
						echo '<div class="progressbar" data-path-color="'.esc_attr($settings['progress_color2']).'">';
							echo '<div class="circle" data-percent="'.$data['progress_percent'].'">';
								echo '<div class="circle-num"></div>';
							echo '</div>';
						echo '</div>';
						echo '<div class="media-body">';
							echo '<h3 class="feature-circle_title">'.esc_html($data['progress_title']).'</h3>';
							echo '<p class="feature-circle_text">'.esc_html($data['progress_text']).'</p>';
						echo '</div>';
					echo '</div>';
				}
			echo '</div>';
		}
	}
}