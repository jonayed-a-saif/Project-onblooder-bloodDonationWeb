<?php

use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Header Widget .
 *
 */
class Webteck_Header extends Widget_Base {

	public function get_name() {
		return 'webteckheader';
	}
	public function get_title() {
		return __( 'Header v2', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck_header_elements' ];
	}
	protected function register_controls() {

		$this->start_controls_section(
			'header_section',
			[
				'label' 	=> __( 'Header', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'header_style',
			[
				'label' 		=> __( 'Header Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two' 		=> __( 'Style Two', 'webteck' ),
					'layout_three' 		=> __( 'Style Three', 'webteck' ),
					'layout_four' 		=> __( 'Style Four', 'webteck' ),
					'layout_five' 		=> __( 'Style Five', 'webteck' ),
					'layout_six' 		=> __( 'Style Six', 'webteck' ),
					'layout_seven' 		=> __( 'Style Seven', 'webteck' ),
				],
			]
		);

		$this->add_control(
			'show_topbar',
			[
				'label' 		=> __( 'Show Topbar ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'webteck' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','webteck' ),
					],
				],
				'condition'		=> [ 'show_topbar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'topbar_phone_icon',
			[
				'label' 		=> __( 'Phone Icon', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => [ 'yes' ] ],
			]
		);				
		$this->add_control(
			'topbar_phone',
			[
				'label' 		=> __( 'Phone', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => [ 'yes' ] ],
			]
		);		
		$this->add_control(
			'topbar_email_icon',
			[
				'label' 		=> __( 'Email Icon', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => [ 'yes' ] ],
			]
		);		
		$this->add_control(
			'topbar_email',
			[
				'label' 		=> __( 'Email', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'topbar_location_icon',
			[
				'label' 		=> __( 'Location Icon', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => [ 'yes' ] ],
			]
		);		
		$this->add_control(
			'topbar_location',
			[
				'label' 		=> __( 'Location', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'label_block' => true,
				'condition'		=> [ 'show_topbar' => [ 'yes' ] ],
			]
		);


		//----------------------------maim menu control----------------------------//

		$this->add_control(

			'logo_image',

			[
				'label' 		=> __( 'Upload Logo', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'default' 		=> [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		
		$this->add_control(
			'button_text',
			[
				'label' 		=> __( 'Button Text', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
			]
		);
		$this->add_control(
			'button_url',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 			=> Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
			]
		);

		$menus = $this->webteck_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'webteck_menu_select',
				[
					'label'     	=> __( 'Select Taxseco Menu', 'webteck' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'webteck' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		}else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'webteck' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'webteck' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

        $this->end_controls_section();

        //-------------------------Menu Bar Style-----------------------//
        $this->start_controls_section(
			'menubar_styling3',
			[
				'label'     => __( 'Menu Styling', 'webteck' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'menu_text_color',
			[
				'label' 			=> __( 'Menu Text Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'color: {{VALUE}};',
                ]
			]
        );

        $this->add_control(
			'menu_text_hover_color',
			[
				'label' 			=> __( 'Menu Hover Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu>ul>li>a:hover' => 'color: {{VALUE}};',
                ]
			]
        );

        $this->add_control(
			'dropdown_text_color',
			[
				'label' 			=> __( 'Dropdown Text Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a' => 'color: {{VALUE}};',
                ]
			]
        );

        $this->add_control(
			'dropdown_text_hover_color',
			[
				'label' 			=> __( 'Dropdown Hover Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a:hover' => 'color: {{VALUE}};',
                ]
			]
        );

		$this->add_control(
			'dropdown_icon_color',
			[
				'label' 			=> __( 'Dropdown Icon Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul.sub-menu li a:before' => 'color: {{VALUE}} !important;',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'menu_typography',
				'label' 		=> __( 'Menu Typography', 'webteck' ),
                'selector' 		=> '{{WRAPPER}} .main-menu>ul>li>a, {{WRAPPER}} .main-menu ul.sub-menu li a',
			]
		);

        $this->add_responsive_control(
			'menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
        );

        $this->add_responsive_control(
			'menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu>ul>li>a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ]
			]
		);

		$this->end_controls_section();

        //-------------------------Button Style-----------------------//
		$this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'button_typography',
				'label' 	=> __( 'Typography', 'webteck' ),
				'selector' 	=> '{{WRAPPER}} .th-btn',
			]
		);

		$this->start_controls_tabs(
			'style_tabs'
		);

			$this->start_controls_tab(
				'first_style_tab',
				[
					'label' => esc_html__( 'Normal', 'webteck' ),
				]
			);

			$this->add_control(
				'button_color',
				[
					'label' 		=> __( 'Color', 'webteck' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-btn' => 'color: {{VALUE}}',
					],
				]
			);
	
			$this->add_control(
				'button_bg',
				[
					'label' 		=> __( 'Background Color', 'webteck' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-btn' => 'background-color:{{VALUE}}',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'selector' => '{{WRAPPER}} .th-btn',
				]
			);

			$this->end_controls_tab();

			//--------------------secound--------------------//
			$this->start_controls_tab(
				'sec_style_tab',
				[
					'label' => esc_html__( 'Hover', 'webteck' ),
				]
			);

			$this->add_control(
				'button_h_color',
				[
					'label' 		=> __( 'Hover Color ', 'webteck' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-btn:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'button_h_bg',
				[
					'label' 		=> __( 'Background Hover Color', 'webteck' ),
					'type' 			=> Controls_Manager::COLOR,
					'selectors' 	=> [
						'{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after' => 'background-color:{{VALUE}} !important',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border2',
					'selector' => '{{WRAPPER}} .th-btn:hover',
				]
			);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
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
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);
		
		$this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();

    }

    public function webteck_menu_select(){
	    $webteck_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'webteck' );
	    foreach( $webteck_menu as $menu ){
	        $menu_array[ $menu->slug ] = $menu->name;
	    }
	    return $menu_array;
	}




	protected function render() {

        $settings = $this->get_settings_for_display();


        $webteck_avaiable_menu   = $this->webteck_menu_select();

		if( ! $webteck_avaiable_menu ){
			return;
		}

		$args = [
			'menu' 			=> $settings['webteck_menu_select'],
			'menu_class' 	=> 'webteck-menu',
			'container' 	=> '',
		];


	    echo '<!--=========================Mobile Menu========================= -->';
	    echo webteck_mobile_menu();

        



    	if($settings['header_style'] == 'layout_one' ){
    		echo '<header class="th-header header-layout2 header-absolute">';
		        echo '<div class="sticky-wrapper">';
		            echo '<!-- Main Menu Area -->';
		            echo '<div class="menu-area">';
		                echo '<div class="container">';
		                    echo '<div class="row align-items-center justify-content-between">';
		                        if( ! empty( $settings['logo_image']['url'] ) ){
		                    		echo '<div class="col-auto">';
			                            echo '<div class="header-logo">';
			                                echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Webteck"></a>';
			                            echo '</div>';
		                            echo '</div>';
		                        }
		                        echo '<div class="col-auto">';
		                            echo '<nav class="main-menu style2 d-none d-lg-inline-block">';
		                               	if( ! empty( $settings['webteck_menu_select'] ) ){
											wp_nav_menu( $args );
										} 
		                            echo '</nav>';
		                        echo '</div>';
		                        echo '<div class="col-auto">';
		                            echo '<div class="header-button">';
		                                echo '<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>';
		                                if(!empty($settings['button_text'])){
			                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="th-btn">'.esc_html( $settings['button_text'] ).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</header>';
		}elseif($settings['header_style'] == 'layout_two' ){
			$phone      = $settings['topbar_phone'];
	        $email      = $settings['topbar_email'];

	        $replace        = array(' ','-',' - ');
	        $with           = array('','','');

	        $phoneurl       = str_replace( $replace, $with, $phone );
	        $eamilurl       = str_replace( $replace, $with, $email );


			echo '<header class="th-header header-layout5">';
		        echo '<div class="header-top">';
		            echo '<div class="container th-container4">';
		                echo '<div class="row justify-content-center justify-content-lg-between align-items-center">';
		                    echo '<div class="col-auto d-none d-md-block">';
		                        echo '<div class="header-links">';
		                            echo '<ul>';
		                                echo '<li>'.wp_kses_post( $settings['topbar_phone_icon'] ).'<a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html($phone).'</a></li>';
		                                echo '<li class="d-none d-xl-inline-block">'.wp_kses_post( $settings['topbar_location_icon'] ).'';
		                                    echo '<span>'.esc_html( $settings['topbar_location'] ).'</span>';
		                                echo '</li>';
		                                echo '<li>'.wp_kses_post( $settings['topbar_email_icon'] ).'<a href="'.esc_attr( 'mailto:'.$email ).'">'.esc_html($email).'</a>';
		                                echo '</li>';

		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="col-auto">';
		                        echo '<div class="social-links">';
		                            echo '<span class="social-title">'.esc_html( 'Follow Us On:','webteck' ).'</span>';
		                            if( ! empty( $settings['social_icon_list'] ) ){
                                        foreach( $settings['social_icon_list'] as $social_icon ){
				                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
				                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

				                            echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

				                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

				                          	echo '</a> ';
				                      	} 
		                            }
		                            
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="sticky-wrapper">';
		            echo '<!-- Main Menu Area -->';
		            echo '<div class="menu-area">';
		                echo '<div class="container th-container4">';
		                    echo '<div class="row align-items-center justify-content-between">';
		                        if( ! empty( $settings['logo_image']['url'] ) ){
		                    		echo '<div class="col-auto">';
			                            echo '<div class="header-logo">';
			                                echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Webteck"></a>';
			                            echo '</div>';
		                            echo '</div>';
		                        }
		                        echo '<div class="col-auto">';
		                            echo '<nav class="main-menu style2 d-none d-lg-inline-block">';
		                                if( ! empty( $settings['webteck_menu_select'] ) ){
											wp_nav_menu( $args );
										} 
		                            echo '</nav>';

		                        echo '</div>';
		                        echo '<div class="col-auto">';
		                            echo '<div class="header-button">';
		                                echo '<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>';
		                                if(!empty($settings['button_text'])){
			                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="th-btn style-radius">'.esc_html( $settings['button_text'] ).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</header>';
		}elseif($settings['header_style'] == 'layout_three' ){
			echo '<header class="th-header header-layout4 header-absolute">';
		        echo '<div class="sticky-wrapper">';
		            echo '<!-- Main Menu Area -->';
		            echo '<div class="menu-area">';
		                echo '<div class="container th-container5">';
		                    echo '<div class="row align-items-center justify-content-between">';
		                        if( ! empty( $settings['logo_image']['url'] ) ){
		                    		echo '<div class="col-auto">';
			                            echo '<div class="header-logo">';
			                                echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Webteck"></a>';
			                            echo '</div>';
		                            echo '</div>';
		                        }
		                        echo '<div class="col-auto">';
		                            echo '<nav class="main-menu style2 d-none d-lg-inline-block">';
		                               	if( ! empty( $settings['webteck_menu_select'] ) ){
											wp_nav_menu( $args );
										} 
		                            echo '</nav>';
		                        echo '</div>';
		                        echo '<div class="col-auto">';
		                            echo '<div class="header-button">';
		                                echo '<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>';
		                                if(!empty($settings['button_text'])){
			                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="th-btn style6 style-radius">'.esc_html( $settings['button_text'] ).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</header>';
		}elseif($settings['header_style'] == 'layout_four' ){
			echo '<header class="th-header header-layout6">';
		        echo '<div class="sticky-wrapper">';
		            echo '<!-- Main Menu Area -->';
		            echo '<div class="menu-area">';
		                echo '<div class="container th-container4">';
		                    echo '<div class="row align-items-center justify-content-between">';
		                        echo '<div class="col-auto">';
		                        	if( ! empty( $settings['logo_image']['url'] ) ){
			                            echo '<div class="header-logo">';
			                                echo '<a class="icon-masking" href="'.esc_url( home_url( '/' ) ).'"><span data-mask-src="'.esc_url( $settings['logo_image']['url'] ).'" class="mask-icon"></span><img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Webteck"></a>';
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                        echo '<div class="col-auto">';
		                            echo '<nav class="main-menu style2 d-none d-lg-inline-block">';
		                                if( ! empty( $settings['webteck_menu_select'] ) ){
											wp_nav_menu( $args );
										} 
		                            echo '</nav>';
		                            echo '<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>';
		                        echo '</div>';
		                        echo '<div class="col-auto d-xl-block d-none">';
		                        	if(!empty($settings['button_text'])){
			                            echo '<div class="header-button">';
			                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="th-btn style-radius">'.esc_html( $settings['button_text'] ).'</a>';
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</header>';
		}elseif($settings['header_style'] == 'layout_five' ){
			echo '<header class="th-header header-layout7">';
		        echo '<div class="sticky-wrapper">';
		            echo '<!-- Main Menu Area -->';
		            echo '<div class="menu-area">';
		                echo '<div class="container th-container">';
		                    echo '<div class="row align-items-center justify-content-between">';
		                    	if( ! empty( $settings['logo_image']['url'] ) ){
			                        echo '<div class="col-auto">';
			                            echo '<div class="header-logo">';
			                                echo '<a class="icon-masking" href="'.esc_url( home_url( '/' ) ).'"><span data-mask-src="'.esc_url( $settings['logo_image']['url'] ).'" class="mask-icon"></span><img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Webteck"></a>';
			                            echo '</div>';
			                        echo '</div>';
			                    }
		                        echo '<div class="col-auto">';
		                            echo '<nav class="main-menu style2 d-none d-lg-inline-block">';
		                                if( ! empty( $settings['webteck_menu_select'] ) ){
											wp_nav_menu( $args );
										} 
		                            echo '</nav>';
		                            echo '<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>';
		                        echo '</div>';
		                        echo '<div class="col-auto d-none d-lg-inline-block">';
		                        	if(!empty($settings['button_text'])){
			                            echo '<div class="header-button">';
			                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="th-btn btn-gradient style-radius">'.esc_html( $settings['button_text'] ).'</a>';
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</header>';
		}elseif($settings['header_style'] == 'layout_six' ){
			$phone      = $settings['topbar_phone'];
	        $email      = $settings['topbar_email'];

	        $replace        = array(' ','-',' - ');
	        $with           = array('','','');

	        $phoneurl       = str_replace( $replace, $with, $phone );
	        $eamilurl       = str_replace( $replace, $with, $email );


			echo '<header class="th-header header-layout10">';
		        echo '<div class="header-top">';
		            echo '<div class="container th-container4">';
		                echo '<div class="row justify-content-center justify-content-lg-between align-items-center">';
		                    echo '<div class="col-auto d-none d-md-block">';
		                        echo '<div class="header-links">';
		                            echo '<ul>';
		                                echo '<li>'.wp_kses_post( $settings['topbar_phone_icon'] ).'<a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html($phone).'</a></li>';
		                                echo '<li class="d-none d-xl-inline-block">'.wp_kses_post( $settings['topbar_location_icon'] ).'';
		                                    echo '<span>'.esc_html( $settings['topbar_location'] ).'</span>';
		                                echo '</li>';
		                                echo '<li>'.wp_kses_post( $settings['topbar_email_icon'] ).'<a href="'.esc_attr( 'mailto:'.$email ).'">'.esc_html($email).'</a>';
		                                echo '</li>';

		                            echo '</ul>';
		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="col-auto">';
		                        echo '<div class="social-links">';
		                            echo '<span class="social-title">'.esc_html( 'Follow Us On:','webteck' ).'</span>';
		                            if( ! empty( $settings['social_icon_list'] ) ){
                                        foreach( $settings['social_icon_list'] as $social_icon ){
				                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
				                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

				                            echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

				                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

				                          	echo '</a> ';
				                      	} 
		                            }
		                            
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		        echo '<div class="sticky-wrapper">';
		            echo '<!-- Main Menu Area -->';
		            echo '<div class="menu-area">';
		                echo '<div class="container th-container4">';
		                    echo '<div class="row align-items-center justify-content-between">';
		                        if( ! empty( $settings['logo_image']['url'] ) ){
		                    		echo '<div class="col-auto">';
			                            echo '<div class="header-logo">';
			                                echo '<a href="'.esc_url( home_url( '/' ) ).'"><img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Webteck"></a>';
			                            echo '</div>';
		                            echo '</div>';
		                        }
		                        echo '<div class="col-auto">';
		                            echo '<nav class="main-menu style2 d-none d-lg-inline-block">';
		                                if( ! empty( $settings['webteck_menu_select'] ) ){
											wp_nav_menu( $args );
										} 
		                            echo '</nav>';

		                        echo '</div>';
		                        echo '<div class="col-auto">';
		                            echo '<div class="header-button">';
		                                echo '<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>';
		                                if(!empty($settings['button_text'])){
			                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="th-btn style-radius">'.esc_html( $settings['button_text'] ).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</header>';
		}else{
			echo '<header class="th-header header-layout11 header-absolute">';
		        echo '<div class="sticky-wrapper">';
		            echo '<!-- Main Menu Area -->';
		            echo '<div class="menu-area">';
		                echo '<div class="container th-container4">';
		                    echo '<div class="row align-items-center justify-content-between">';
		                        echo '<div class="col-auto">';
		                        	if( ! empty( $settings['logo_image']['url'] ) ){
			                            echo '<div class="header-logo">';
			                                echo '<a class="icon-masking" href="'.esc_url( home_url( '/' ) ).'"><span data-mask-src="'.esc_url( $settings['logo_image']['url'] ).'" class="mask-icon"></span><img src="'.esc_url( $settings['logo_image']['url'] ).'" alt="Webteck"></a>';
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                        echo '<div class="col-auto">';
		                            echo '<nav class="main-menu style2 d-none d-lg-inline-block">';
		                                if( ! empty( $settings['webteck_menu_select'] ) ){
											wp_nav_menu( $args );
										} 
		                            echo '</nav>';
		                            echo '<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="far fa-bars"></i></button>';
		                        echo '</div>';
		                        echo '<div class="col-auto d-xl-block d-none">';
		                        	if(!empty($settings['button_text'])){
			                            echo '<div class="header-button">';
			                                echo '<a href="'.esc_url( $settings['button_url'] ).'" class="th-btn style-radius">'.esc_html( $settings['button_text'] ).'</a>';
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</header>';
		}
	}
}