<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Button Widget .
 *
 */
class Webteck_Button extends Widget_Base {

	public function get_name() {
		return 'webteckbutton';
	}

	public function get_title() {
		return __( 'Button v2', 'webteck' );
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
 		$this->add_control(
            'layout_style',
            [
                'label' => __('Select Layout', 'webteck'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' => __('Layout One', 'webteck'),
                ]
            ]
        );

        $this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Button Text', 'webteck' )
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
                'rows' 		=> 2
			]
        );

		$this->add_control(
			'button_icon_position',
			[
				'label' 	=> __( 'Button Icon Position', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Before Text', 'webteck' ),
					'2' 		=> __( 'After Text', 'webteck' ),
				],
			]
		);

        $this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'webteck' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'webteck' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'webteck' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'webteck' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 		=> 'left',
				'toggle' 		=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .btn-wrapper' => 'text-align: {{VALUE}}',
                ],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
		    'button_style_section',
		    [
		        'label' => __( 'Button Style', 'webteck' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

			webteck_elementor_typography_style($this, 'Button', '{{WRAPPER}} .th-btn', ['layout_one']);

			$this->start_controls_tabs(
			    'style_tabs'
			);

				// First Tab: Normal
				$this->start_controls_tab(
				    'first_style_tab',
				    [
				        'label' => esc_html__( 'Normal', 'webteck' ),
				    ]
				);

					webteck_elementor_color_style($this, 'Button Text', '{{WRAPPER}} .th-btn', ['layout_one']);
					webteck_elementor_color_style($this, 'Background', '{{WRAPPER}} .th-btn', ['layout_one'], 'background-color');
					webteck_elementor_border_style($this, 'Button', '{{WRAPPER}} .th-btn', ['layout_one']);

				$this->end_controls_tab();

				// Second Tab: Hover
				$this->start_controls_tab(
				    'sec_style_tab',
				    [
				        'label' => esc_html__( 'Hover', 'webteck' ),
				    ]
				);

					webteck_elementor_color_style($this, 'Button Text Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one']);
					webteck_elementor_color_style($this, 'Background Hover', '{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after', ['layout_one'], 'background-color');
					webteck_elementor_border_style($this, 'Button Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one']);

				$this->end_controls_tab();

			$this->end_controls_tabs();
		$this->end_controls_section();



      

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'wrapper', 'class', 'btn-wrapper');
        $this->add_render_attribute( 'wrapper', 'class', esc_attr(  $settings['button_align'] ) );
        
		$this->add_render_attribute( 'button', 'class', 'th-btn style6 style-radius' );
		
	    


        if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

        echo '<!-- Button -->';
        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
        	
        	if( ! empty( $settings['button_text'] ) ) {
                echo '<a '.$this->get_render_attribute_string('button').'>';
                if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '1'  ){
					echo wp_kses_post($settings['button_icon']);
				}
                echo esc_html( $settings['button_text'] );
                if( ! empty( $settings['button_icon'] ) && $settings['button_icon_position'] == '2'  ){
					echo wp_kses_post($settings['button_icon']);
				}
                echo '</a>';
	        }
        echo '</div>';
        echo '<!-- End Button -->';
	}

}