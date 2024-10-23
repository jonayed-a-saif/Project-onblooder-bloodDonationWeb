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
 * Project Widget .
 *
 */
class Traga_Project_Info extends Widget_Base {

	public function get_name() {
		return 'tragaprojectinfo';
	}

	public function get_title() {
		return __( 'Webteck Project Info', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

        $this->start_controls_section(
			'project_information',
			[
				'label' 	=> __( 'Project Information', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
                
			]
        );
        $this->add_control(
			'widget_title',
			[
				'label'     => __( 'Widget Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Project Information', 'webteck' )
			]
        );
        $repeater = new Repeater();
        $repeater->add_control(
			'project_info_icon',
			[
				'label'         => __( 'Info Icon', 'webteck' ),
                'type'          => Controls_Manager::TEXTAREA,
                'rows' 		    => 2,
                'default'  	    => __( '<i class="fa-solid fa-user"></i>', 'webteck' ),
                'placeholder'  	=> __( '<i class="fa-solid fa-user"></i>', 'webteck' )
			]
        );
		$repeater->add_control(
			'project_label',
			[
				'label'     => __( 'Info Label', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Clients:', 'webteck' )
			]
        );
        $repeater->add_control(
			'project_info',
			[
				'label'     => __( 'Project Info', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'David Jackson', 'webteck' )
			]
        );
        $repeater->add_control(
			'project_info_url',
			[
				'label'         => __( 'Project Info URL', 'webteck' ),
                'type'          => Controls_Manager::TEXTAREA,
                'rows' 		    => 2,
                'placeholder'  	=> __( '', 'webteck' )
			]
        );
        $this->add_control(
			'info_repeater',
			[
				'label' 		=> __( 'Info Items', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'project_label' 		=> __( 'Clients:', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ project_label }}}',
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

        /*----------------------------------------- section Content styling------------------------------------*/

        $this->start_controls_section(
            'section_con_styling',
            [
                'label'     => __( 'Content Style', 'webteck' ),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs1'
        );


        $this->start_controls_tab(
            'style_normal_tab1',
            [
                'label' => esc_html__( 'Label', 'webteck' ),
            ]
        );
        $this->add_control(
            's_title_color',
            [
                'label'         => __( 'Color', 'webteck' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-feature_label'    => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 's_title_typography',
                'label'         => __( 'Typography', 'webteck' ),
                'selector'  => '{{WRAPPER}} .contact-feature_label',
            ]
        );

        $this->add_responsive_control(
            's_title_margin',
            [
                'label'         => __( 'Margin', 'webteck' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-feature_label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            's_title_padding',
            [
                'label'         => __( 'Padding', 'webteck' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-feature_label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );
        $this->end_controls_tab();

        //--------------------secound--------------------//

        $this->start_controls_tab(
            'style_hover_tab2',
            [
                'label' => esc_html__( 'Info', 'webteck' ),
            ]
        );
        $this->add_control(
            's_content_color',
            [
                'label'         => __( 'Color', 'webteck' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-feature_link'    => 'color: {{VALUE}};',
                ]
            ]
        );
        $this->add_control(
            's_hover_content_color',
            [
                'label'         => __( 'Hover Color', 'webteck' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} .contact-feature_link:hover'    => 'color: {{VALUE}};',
                ]
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 's_content_typography',
                'label'         => __( 'Typography', 'webteck' ),
                'selector'  => '{{WRAPPER}} .contact-feature_link',
            ]
        );

        $this->add_responsive_control(
            's_content_margin',
            [
                'label'         => __( 'Margin', 'webteck' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-feature_link' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            's_content_padding',
            [
                'label'         => __( 'Padding', 'webteck' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} .contact-feature_link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        echo '<div class="widget widget_info">';

            if(!empty($settings['widget_title'] )){
                echo '<h3 class="widget_title">'.esc_html($settings['widget_title']).'</h3>';
            }

            echo '<div class="project-info-list">';
                foreach ( $settings['info_repeater'] as $data ) {
                    if( ! empty( $data['project_label']) ){
                        echo '<div class="contact-feature">';
                            echo '<div class="icon-btn">';
                                echo wp_kses_post($data['project_info_icon']);
                            echo '</div>';
                            echo '<div class="media-body">';
                                echo '<p class="contact-feature_label">'.esc_html($data['project_label']).'</p>';
                                if( ! empty( $data['project_info_url']) ){
                                    echo '<a class="contact-feature_link" href="'.esc_attr($data['project_info_url']).'">'.esc_html($data['project_info']).'</a>';
                                } else {
                                    echo '<span class="contact-feature_link">'.esc_html($data['project_info']).'</span>';
                                }
                                
                            echo '</div>';
                        echo '</div>';
                    }
                }
            echo '</div>';
        echo '</div>';
	}
}
