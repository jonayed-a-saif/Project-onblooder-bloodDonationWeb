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
 * Contact Tab Widget .
 *
 */
class Traga_Contact_Info extends Widget_Base {

	public function get_name() {
		return 'tragacontactinfo';
	}

	public function get_title() {
		return __( 'Webteck Contact Info', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {


		$this->start_controls_section(
			'contact_information',
			[
				'label' 	=> __( 'Contact Information', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Information Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					'3' 		=> __( 'Style Three', 'webteck' ),
					'4' 		=> __( 'Style Four', 'webteck' ),
				],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
			'widget_section',
			[
				'label' 	=> __( 'Contact Title', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
                'condition'     => [ 'layout_style' =>  ['2']  ],
			]
        );
        $this->add_control(
			'widget_title',
			[
				'label'     => __( 'Contact Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'CONTACT US', 'webteck' )
			]
        );
        $this->end_controls_section();


        $this->start_controls_section(
			'phone_section',
			[
				'label' 	=> __( 'Phone Info', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'phone_contact_label',
			[
				'label'     => __( 'Phone Label', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Call Us On:', 'webteck' )
			]
        );
        $this->add_control(
			'phone_contact_info',
			[
				'label'     => __( 'Phone Info', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '+190-8800-0393', 'webteck' )
			]
        );
        $this->add_control(
			'phone_contact_info2',
			[
				'label'     => __( 'Phone Info 2', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '+190-8800-0393', 'webteck' ),
                'condition'     => [ 'layout_style' =>  ['4']  ],
			]
        );
        $this->add_control(
			'phone_icon',
			[
				'label'     => __( 'Icon Class For Phone', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="fas fa-phone"></i>', 'webteck' )
			]
        );
        $this->end_controls_section();


        $this->start_controls_section(
			'email_section',
			[
				'label' 	=> __( 'Email Info', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'email_contact_label',
			[
				'label'     => __( 'Email Label', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Quick Mail Us:', 'webteck' )
			]
        );
        $this->add_control(
			'email_contact_info',
			[
				'label'     => __( 'Email Info', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'info@webteck.com', 'webteck' )
			]
        );
        $this->add_control(
			'email_contact_info2',
			[
				'label'     => __( 'Email Info 2', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'info.example@webteck.com', 'webteck' ),
                'condition'     => [ 'layout_style' =>  ['4']  ],
			]
        );
        $this->add_control(
			'email_icon',
			[
				'label'     => __( 'Icon Class For Email', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="fas fa-envelope"></i>', 'webteck' )
			]
        );
        $this->end_controls_section();
        

        $this->start_controls_section(
			'address_section',
			[
				'label' 	=> __( 'Adress Info', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
                'condition'     => [ 'layout_style!' =>  ['1']  ],
			]
        );
		$this->add_control(
			'address_contact_label',
			[
				'label'     => __( 'Address Label', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Location:', 'webteck' )
			]
        );
        $this->add_control(
			'address_contact_info',
			[
				'label'     => __( 'Address Info', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Burnsville, MN 55337 Streat, <br> United States', 'webteck' )
			]
        );
        $this->add_control(
			'address_contact_url',
			[
				'label'     => __( 'Address URL', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'https://www.google.com/maps', 'webteck' )
			]
        );
        $this->add_control(
			'address_icon',
			[
				'label'     => __( 'Icon Class For Address', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '<i class="fas fa-location-dot"></i>', 'webteck' )
			]
        );
        $this->end_controls_section();

        //--------------------------------------- Title Style---------------------------------------//

		$this->start_controls_section(
			'title_style',
			[
				'label' 	=> __( 'Title Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
                'condition' => [ 'layout_style' =>  ['2']  ],
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
                    '{{WRAPPER}} .box-title'    => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-contact_label'    => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 's_title_typography',
                'label'         => __( 'Typography', 'webteck' ),
                'selector'  => '{{WRAPPER}} .contact-feature_label',
                'selector'  => '{{WRAPPER}} .box-title',
                'selector'  => '{{WRAPPER}} .team-contact_label',
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
                    '{{WRAPPER}} .box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .team-contact_label' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .team-contact_label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

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
                    '{{WRAPPER}} a'    => 'color: {{VALUE}};',
                ]
            ]
        );
        $this->add_control(
            's_hover_content_color',
            [
                'label'         => __( 'Hover Color', 'webteck' ),
                'type'          => Controls_Manager::COLOR,
                'selectors'     => [
                    '{{WRAPPER}} a:hover'    => 'color: {{VALUE}};',
                ]
            ]
        );
        $this->add_group_control(
        Group_Control_Typography::get_type(),
            [
                'name'          => 's_content_typography',
                'label'         => __( 'Typography', 'webteck' ),
                'selector'  => '{{WRAPPER}} a',
            ]
        );

        $this->add_responsive_control(
            's_content_margin',
            [
                'label'         => __( 'Margin', 'webteck' ),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => [ 'px', '%', 'em' ],
                'selectors'     => [
                    '{{WRAPPER}} a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if ($settings['layout_style'] == 1 ) {
            echo '<div class="contact-feature-wrap">';
            	if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] && $settings['phone_icon'])){
            		$phone    	= $settings['phone_contact_info'];
            		// $phone2    	= $settings['phone_contact_info2'];
                    $replace        = array(' ','-',' - ');
                    $with           = array('','','');
                    $phonelurl       = str_replace( $replace, $with, $phone );
                    // $phonelurl2       = str_replace( $replace, $with, $phone2 );
                    echo '<div class="contact-feature">';
                        echo '<div class="icon-btn">';
                            echo wp_kses_post($settings['phone_icon']);
                        echo '</div>';
                        echo '<div class="media-body">';
                            echo '<p class="contact-feature_label">'.esc_html($settings['phone_contact_label']).'</p>';
                            echo '<a class="contact-feature_link" href="'.esc_attr( 'tel:'.$phonelurl ).'">'.esc_html($settings['phone_contact_info']).'</a>';
                        echo '</div>';
                    echo '</div>';
            	}
            	if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] && $settings['email_icon'])){
            		$email    	= $settings['email_contact_info'];
            		// $email2    	= $settings['email_contact_info2'];
                    $email          = is_email( $email );
                    // $email2          = is_email( $email2 );
                    $replace        = array(' ','-',' - ');
                    $with           = array('','','');
                    $emaillurl       = str_replace( $replace, $with, $email );
                    // $emaillurl2       = str_replace( $replace, $with, $email2 );
                    echo '<div class="contact-feature">';
                        echo '<div class="icon-btn">';
                            echo wp_kses_post($settings['email_icon']);
                        echo '</div>';
                        echo '<div class="media-body">';
                            echo '<p class="contact-feature_label">'.esc_html($settings['email_contact_label']).'</p>';
                            echo '<a class="contact-feature_link" href="'.esc_attr( 'mailto:'.$emaillurl ).'">'.esc_html($settings['email_contact_info']).'</a>';
                        echo '</div>';
                    echo '</div>';
            	}
            echo '</div>';
        } elseif ($settings['layout_style'] == 2 ) {
            echo '<div class="widget footer-widget">';
                echo '<h3 class="widget_title">'.esc_html($settings['widget_title']).'</h3>';
                echo '<div class="th-widget-contact">';
                    if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] && $settings['phone_icon'])){
                        $phone    	= $settings['phone_contact_info'];
                        // $phone2    	= $settings['phone_contact_info2'];
                        $replace        = array(' ','-',' - ');
                        $with           = array('','','');
                        $phonelurl       = str_replace( $replace, $with, $phone );
                        // $phonelurl2       = str_replace( $replace, $with, $phone2 );
                        echo '<div class="contact-feature">';
                            echo '<div class="icon-btn">';
                                echo wp_kses_post($settings['phone_icon']);
                            echo '</div>';
                            echo '<div class="media-body">';
                                echo '<p class="contact-feature_label">'.esc_html($settings['phone_contact_label']).'</p>';
                                echo '<a class="contact-feature_link" href="'.esc_attr( 'tel:'.$phonelurl ).'">'.esc_html($settings['phone_contact_info']).'</a>';
                            echo '</div>';
                        echo '</div>';
                    }
                    if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] && $settings['email_icon'])){
                        $email    	= $settings['email_contact_info'];
                        // $email2    	= $settings['email_contact_info2'];
                        $email          = is_email( $email );
                        // $email2          = is_email( $email2 );
                        $replace        = array(' ','-',' - ');
                        $with           = array('','','');
                        $emaillurl       = str_replace( $replace, $with, $email );
                        // $emaillurl2       = str_replace( $replace, $with, $email2 );
                        echo '<div class="contact-feature">';
                            echo '<div class="icon-btn">';
                                echo wp_kses_post($settings['email_icon']);
                            echo '</div>';
                            echo '<div class="media-body">';
                                echo '<p class="contact-feature_label">'.esc_html($settings['email_contact_label']).'</p>';
                                echo '<a class="contact-feature_link" href="'.esc_attr( 'mailto:'.$emaillurl ).'">'.esc_html($settings['email_contact_info']).'</a>';
                            echo '</div>';
                        echo '</div>';
                    }
                    if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] && $settings['address_icon'])){
                        echo '<div class="contact-feature">';
                            echo '<div class="icon-btn">';
                                echo wp_kses_post($settings['address_icon']);
                            echo '</div>';
                            echo '<div class="media-body">';
                                echo '<p class="contact-feature_label">'.esc_html($settings['address_contact_label']).'</p>';
                                echo '<a class="contact-feature_link" href="'.esc_url($settings['address_contact_url']).'">'.wp_kses_post($settings['address_contact_info']).'</a>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        } elseif ($settings['layout_style'] == 3 ) {
            echo '<div class="team-contact-wrap">';
                if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] && $settings['phone_icon'])){
                    $phone    	= $settings['phone_contact_info'];
                    // $phone2    	= $settings['phone_contact_info2'];
                    $replace        = array(' ','-',' - ');
                    $with           = array('','','');
                    $phonelurl       = str_replace( $replace, $with, $phone );
                    // $phonelurl2       = str_replace( $replace, $with, $phone2 );
                    echo '<div class="team-contact">';
                        echo '<div class="icon-btn">';
                            echo wp_kses_post($settings['phone_icon']);
                        echo '</div>';
                        echo '<div class="media-body">';
                            echo '<h6 class="team-contact_label">'.esc_html($settings['phone_contact_label']).'</h6>';
                            echo '<a class="team-contact_link" href="'.esc_attr( 'tel:'.$phonelurl ).'">'.esc_html($settings['phone_contact_info']).'</a>';
                        echo '</div>';
                    echo '</div>';
                }
                if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] && $settings['email_icon'])){
                    $email    	= $settings['email_contact_info'];
                    // $email2    	= $settings['email_contact_info2'];
                    $email          = is_email( $email );
                    // $email2          = is_email( $email2 );
                    $replace        = array(' ','-',' - ');
                    $with           = array('','','');
                    $emaillurl       = str_replace( $replace, $with, $email );
                    // $emaillurl2       = str_replace( $replace, $with, $email2 );
                    echo '<div class="team-contact">';
                        echo '<div class="icon-btn">';
                            echo wp_kses_post($settings['email_icon']);
                        echo '</div>';
                        echo '<div class="media-body">';
                            echo '<h6 class="team-contact_label">'.esc_html($settings['email_contact_label']).'</h6>';
                            echo '<a class="team-contact_link" href="'.esc_attr( 'mailto:'.$emaillurl ).'">'.esc_html($settings['email_contact_info']).'</a>';
                        echo '</div>';
                    echo '</div>';
                }
                if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] && $settings['address_icon'])){
                    echo '<div class="team-contact">';
                        echo '<div class="icon-btn">';
                            echo wp_kses_post($settings['address_icon']);
                        echo '</div>';
                        echo '<div class="media-body">';
                            echo '<h6 class="team-contact_label">'.esc_html($settings['address_contact_label']).'</h6>';
                            echo '<a class="team-contact_link" href="'.esc_url($settings['address_contact_url']).'">'.wp_kses_post($settings['address_contact_info']).'</a>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
        } elseif ($settings['layout_style'] == 4 ) {
            echo '<div class="row gy-4">';
                if(!empty($settings['address_contact_label'] && $settings['address_contact_info'] && $settings['address_icon'])){
                    echo '<div class="col-xl-4 col-md-6">';
                        echo '<div class="contact-info">';
                            echo '<div class="contact-info_icon">';
                                echo wp_kses_post($settings['address_icon']);
                            echo '</div>';
                            echo '<div class="media-body">';
                                echo '<h4 class="box-title">'.esc_html($settings['address_contact_label']).'</h4>';
                                echo '<span class="contact-info_text">';
                                    echo '<a href="'.esc_url($settings['address_contact_url']).'">'.wp_kses_post($settings['address_contact_info']).'</a>';
                                echo '</span>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                if(!empty($settings['phone_contact_label'] && $settings['phone_contact_info'] && $settings['phone_icon'])){
                    $phone      = $settings['phone_contact_info'];
                    $phone2     = $settings['phone_contact_info2'];
                    $replace        = array(' ','-',' - ');
                    $with           = array('','','');
                    $phonelurl       = str_replace( $replace, $with, $phone );
                    $phonelurl2       = str_replace( $replace, $with, $phone2 );

                    echo '<div class="col-xl-4 col-md-6">';
                        echo '<div class="contact-info">';
                            echo '<div class="contact-info_icon">';
                                echo wp_kses_post($settings['phone_icon']);
                            echo '</div>';
                            echo '<div class="media-body">';
                                echo '<h4 class="box-title">'.esc_html($settings['phone_contact_label']).'</h4>';
                                echo '<span class="contact-info_text">';
                                    echo '<a href="'.esc_attr( 'tel:'.$phonelurl ).'">'.esc_html($settings['phone_contact_info']).'</a>';
                                    echo '<a href="'.esc_attr( 'tel:'.$phonelurl2 ).'">'.esc_html($settings['phone_contact_info2']).'</a>';
                                echo '</span>';
                            echo '</div>';
                            
                        echo '</div>';
                    echo '</div>';
                }
                if(!empty($settings['email_contact_label'] && $settings['email_contact_info'] && $settings['email_icon'])){
                    $email      = $settings['email_contact_info'];
                    $email2     = $settings['email_contact_info2'];
                    $email          = is_email( $email );
                    $email2          = is_email( $email2 );
                    $replace        = array(' ','-',' - ');
                    $with           = array('','','');
                    $emaillurl       = str_replace( $replace, $with, $email );
                    $emaillurl2       = str_replace( $replace, $with, $email2 );
                    echo '<div class="col-xl-4 col-md-6">';
                        echo '<div class="contact-info">';
                            echo '<div class="contact-info_icon">';
                                echo wp_kses_post($settings['email_icon']);
                            echo '</div>';
                            echo '<div class="media-body">';
                                echo '<h4 class="box-title">'.esc_html($settings['email_contact_label']).'</h4>';
                                echo '<span class="contact-info_text">';
                                    echo '<a href="'.esc_attr( 'mailto:'.$emaillurl ).'">'.esc_html($settings['email_contact_info']).'</a>';
                                    echo '<a href="'.esc_attr( 'mailto:'.$emaillurl2 ).'">'.esc_html($settings['email_contact_info2']).'</a>';
                                echo '</span>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                
            echo '</div>';
        } else {
            // this is not using
            
        }
	}
}