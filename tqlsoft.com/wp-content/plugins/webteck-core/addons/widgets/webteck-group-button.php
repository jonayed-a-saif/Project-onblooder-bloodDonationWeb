<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget .
 *
 */
class Traga_Group_Button extends Widget_Base {

	public function get_name() {
		return 'tragagroupbutton';
	}

	public function get_title() {
		return __( 'Group Button', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'button_section',
			[
				'label' 	=> __( 'Button', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->start_controls_tabs(
			'style_tabs3'
		);


		$this->start_controls_tab(
			'style_normal_tab3',
			[
				'label' => esc_html__( 'Button 1', 'webteck' ),
			]
		);

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Learn More', 'webteck' )
			]
        );

        $this->add_control(
			'button_link',
			[
				'label' 		=> __( 'Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'button_icon',
			[
				'label' 	=> __( 'Button Icon Class', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="far fa-arrow-right ms-2"></i>', 'webteck' )
			]
        );

		$this->end_controls_tab();

		//-----------------secound------------------//
		$this->start_controls_tab(
			'btn_tab_two',
			[
				'label' => esc_html__( 'Button 2', 'webteck' ),
			]
		);

		$this->add_control(
			'button_text2',
			[
				'label' 	=> __( 'Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Call Us On:', 'webteck' )
			]
        );

		$this->add_control(
			'button_number',
			[
				'label' 	=> __( 'Phone Number', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
				'rows' 		=> 2,
                'default'  	=> __( '+190-8800-0393', 'webteck' )
			]
        );
		$this->add_control(
			'button_icon2',
			[
				'label' 	=> __( 'Button Icon Class', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="fas fa-phone"></i>', 'webteck' )
			]
        );

		$this->end_controls_tab();
		$this->end_controls_tabs();

        $this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'webteck' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'start' 	=> [
						'title' 		=> __( 'Left', 'webteck' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'webteck' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'end' 	=> [
						'title' 		=> __( 'Right', 'webteck' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
			]
        );

        $this->end_controls_section();

        //---------------------------------------Button Style 1---------------------------------------//

		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'button_bg_color',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color',
			[
				'label' 		=> __( 'Background Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn:before' => 'background-color:{{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();
        
        //---------------------------------------Button Style 2---------------------------------------//

		$this->start_controls_section(
			'button_style_section2',
			[
				'label' 	=> __( 'Button 2 Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        

        $this->add_control(
			'button_bg_color2',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn' => '--theme-color:{{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'button_bg_hover_color2',
			[
				'label' 		=> __( 'Background Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn' => '--title-color:{{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', ' class', 'btn-group');
        $this->add_render_attribute( 'wrapper', ' class', esc_attr(  'justify-content-'.$settings['button_align'] ) );
        
		$this->add_render_attribute( 'button1', ' class', 'th-btn' );
		$this->add_render_attribute( 'button2', ' class', 'call-btn' );
		
        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
        	
        	if( ! empty( $settings['button_text'] ) ) {
        		if( ! empty( $settings['button_link']['url'] ) ) {
		            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
		        }
		        if( ! empty( $settings['button_link']['nofollow'] ) ) {
		            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
		        }

		        if( ! empty( $settings['button_link']['is_external'] ) ) {
		            $this->add_render_attribute( 'button', 'target', '_blank' );
		        }
		        echo '<a '.$this->get_render_attribute_string('button') .$this->get_render_attribute_string('button1').'>';

                    echo esc_html($settings['button_text']);
					if( ! empty( $settings['button_icon'] ) ){
						echo wp_kses_post($settings['button_icon']);
					}

                echo '</a>';
	        }

	        if( ! empty( $settings['button_text2'] ) ) {

				$phone_number = $settings['button_number'];
				$phone_url = esc_html(preg_replace('/[^+\d]/', '', $phone_number));

				echo '<div class="call-btn">';
					if( ! empty( $settings['button_icon2'] ) ){
						echo '<div class="play-btn">';
							echo wp_kses_post($settings['button_icon2']);
						echo '</div>';
					}
					
					echo '<div class="media-body">';
						echo '<span class="btn-text">'.esc_html($settings['button_text2']).'</span>';
						echo '<a href="tel:'.esc_html($phone_url).'" class="btn-title">'.esc_html($phone_number).'</a>';
					echo '</div>';
				echo '</div>';
	        }
        echo '</div>';
	}

}