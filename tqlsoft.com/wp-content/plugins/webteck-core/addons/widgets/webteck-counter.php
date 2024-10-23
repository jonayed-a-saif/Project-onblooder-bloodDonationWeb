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
 * Counter Widget .
 *
 */
class Traga_Counter extends Widget_Base {

	public function get_name() {
		return 'tragacounter';
	}

	public function get_title() {
		return __( 'Webteck Counter', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'counter_section',
			[
				'label' 	=> __( 'Counter', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Counter Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					'3' 		=> __( 'Style Three', 'webteck' ),
				],
			]
		);
		$this->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style' => ['3']]
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title Area', 'webteck' )
			]
        );
        $repeater->add_control(
			'number',
			[
				'label'     => __( 'Number', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '15', 'webteck' )
			]
        );
        $repeater->add_control(
			'number_suffix',
			[
				'label'     => __( 'Number Suffix', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '+', 'webteck' )
			]
        );
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
        $this->add_control(
			'counters',
			[
				'label' 		=> __( 'Counters', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
			]
		);

        $this->end_controls_section();


        /*----------------------------------------- Icon styling------------------------------------*/

		$this->start_controls_section(
			'icon_style_section',
			[
				'label' 	=> __( 'Icon Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'icon_bg_color',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-card_icon:after'	=> 'background-color: {{VALUE}};',
				],
			]
        );

		$this->add_control(
			'icon_shape_color',
			[
				'label' 		=> __( 'Background Shape Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .counter-card_icon:before'	=> 'background-color: {{VALUE}};',
				],
			]
        );
		
        $this->end_controls_section();

		/*-----------------------------------------counters styling------------------------------------*/

		$this->start_controls_section(
			'title_style_section',
			[
				'label' 	=> __( 'Number Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h2'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} h2',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
        /*-----------------------------------------counters styling------------------------------------*/

		$this->start_controls_section(
			'contetnt_style_section',
			[
				'label' 	=> __( 'Title Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'webteck_content_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'webteck_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'webteck_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'webteck_content_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

			if ( $settings['layout_style'] == '1' ) {
				echo '<div class="counter-area">';
				echo '<div class="row gy-40 justify-content-between">';
					foreach( $settings['counters'] as $data ) {     
						echo '<div class="col-6 col-lg-auto">';
							echo '<div class="counter-card">';
								if( ! empty( $data['image']['url'] ) ){
									echo '<div class="counter-card_icon">';
										echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
									echo '</div>';
								}
								echo '<div class="media-body">';
									if( ! empty( $data['number'] ) ){
										echo '<h2 class="counter-card_number"><span class="counter-number">'.esc_html( $data['number'] ).'</span>'.esc_html( $data['number_suffix'] ).'</h2>';
									}
									if( ! empty( $data['title'] ) ){
										echo '<p class="counter-card_text">'.esc_html( $data['title'] ).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					
				echo '</div>';
			echo '</div>';
		} elseif ( $settings['layout_style'] == '2' ) {
			echo '<div class="counter-area">';
				echo '<div class="row gy-40 justify-content-between">';
					foreach( $settings['counters'] as $data ) {     
						echo '<div class="col-6 col-lg-auto">';
							echo '<div class="counter-card">';
								if( ! empty( $data['image']['url'] ) ){
									echo '<div class="icon">';
										echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
									echo '</div>';
								}
								echo '<div class="media-body">';
									if( ! empty( $data['number'] ) ){
										echo '<h2 class="counter-card_number"><span class="counter-number">'.esc_html( $data['number'] ).'</span>'.esc_html( $data['number_suffix'] ).'</h2>';
									}
									if( ! empty( $data['title'] ) ){
										echo '<p class="counter-card_text">'.wp_kses_post( $data['title'] ).'</p>';
									}
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					
				echo '</div>';
			echo '</div>';
		}else{
			echo '<div class="about-counter-wrapp">';
				if( ! empty( $settings['image']['url'] ) ){
	                echo '<div class="img1">';
	                    echo webteck_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
						) );
	                echo '</div>';
	            }
                echo '<div class="counter-card8-wrap">';

                    foreach( $settings['counters'] as $data ) { 
	                    echo '<div class="counter-card8">';
	                        echo '<div class="media-body">';
	                        	if( ! empty( $data['number'] ) ){
		                            echo '<h3 class="box-number"><span class="counter-number">'.esc_html( $data['number'] ).'</span>'.esc_html( $data['number_suffix'] ).'</h3>';
		                        }
		                        if( ! empty( $data['title'] ) ){
		                            echo '<p class=" counter-text mb-0">'.wp_kses_post( $data['title'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                }
                    

                echo '</div>';
            echo '</div>';
		}
	}
}