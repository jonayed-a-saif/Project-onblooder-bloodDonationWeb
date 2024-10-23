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
 * About Widget.
 *
 */
class Traga_About extends Widget_Base {

	public function get_name() {
		return 'tragaabout';
	}

	public function get_title() {
		return __( 'Webteck About', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck_footer_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'about_section',
			[
				'label' 	=> __( 'About Widget', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'use_title',
			[
				'label' 		=> __( 'Use Title ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'webteck' ),
				'label_off' 	=> __( 'No', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);
       
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> ['use_title' => 'yes'] 
			]
        );

        $this->add_control(
			'logo_image',
			[
				'label' 		=> __( 'Upload Logo', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
                'condition'		=> ['use_title!' => 'yes'] 
			]
		);
        $this->add_control(
			'about_desc',
			[
				'label'     => __( 'About Description', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'default'   => __( 'Professionally redefine transparent ROI through low-risk high-yield imperatives. Progressively create empowered. cost effective users via team driven.', 'webteck' ),
			]
        );

        $repeater = new Repeater();
		$repeater->add_control(
			'social_icon', [
				'label' 		=> __( 'Social Icon', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="fab fa-facebook-f"></i>' , 'webteck' ),
				'label_block' 	=> true,
			]
        );
		$repeater->add_control(
			'social_link',
			[
				'label' 		=> esc_html__( 'Social Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://facebook.com/',
					'is_external' 	=> true,
					'nofollow' 		=> false,
				],
			]
		);
		$this->add_control(
			'social_links',
			[
				'label' 		=> __( 'Social Links', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' 		=> __( '<i class="fab fa-facebook-f"></i>', 'webteck' ),
						'social_link' 		=> __( 'https://facebook.com/', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ social_link }}}',
			]
		);
        
        $this->end_controls_section();

		//--------------------------------------- Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' 		=> __( 'Title Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .widget_title' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'title_border_color',
			[
				'label' 		=> __( 'Title Border Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .widget_title' => '--theme-color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .widget_title',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .widget_title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'title_padding',
			[
				'label' 		=> __( 'Title Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .widget_title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'logo_style',
			[
				'label' 	=> __( 'Logo Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
        $this->add_responsive_control(
			'logo_margin',
			[
				'label' 		=> __( 'Logo Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-logo' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'logo_padding',
			[
				'label' 		=> __( 'Title Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-logo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'desc_styling',
			[
				'label'     => __( 'Description Styling', 'webteck' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'desc_txt_color',
			[
				'label' 			=> __( 'Description Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .about-text' => '--body-color: {{VALUE}};',
                ]
			]
        );
        $this->add_responsive_control(
			'desc_margin',
			[
				'label' 		=> __( 'Title Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'desc_padding',
			[
				'label' 		=> __( 'Title Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .about-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
	}
	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="widget footer-widget">';
            if (!empty($settings['title'])) {
                echo '<h3 class="widget_title">'.esc_html($settings['title']).'</h3>';
            }
            echo '<div class="th-widget-about">';
                if (!empty($settings['logo_image']['url'])) {
                    echo '<div class="about-logo">';
                        echo '<a href="'.esc_url( home_url( '/' ) ).'">';
                            echo webteck_img_tag( array(
                                'url' => esc_url( $settings['logo_image']['url'] ),
                            ) );
                        echo '</a>';
                    echo '</div>';
                }
                if (!empty($settings['about_desc'])) {
                    echo '<p class="about-text">'.esc_html($settings['about_desc']).'</p>';
                }
                echo '<div class="th-social">';
                    foreach( $settings['social_links'] as $data ) {
                        $link_target = $data['social_link']['is_external'] ? ' target="_blank"' : '';
                        $link_nofollow = $data['social_link']['nofollow'] ? ' rel="nofollow"' : '';
                        echo '<a '.wp_kses_post( $link_nofollow.$link_target ).' href="'.esc_url( $data['social_link']['url'] ).'">'.wp_kses_post( $data['social_icon'] ).'</a>';
                    }
                echo '</div>';
            echo '</div>';
		echo '</div>';
	}
}