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
class Traga_Header extends Widget_Base {

	public function get_name() {
		return 'tragaheader';
	}
	public function get_title() {
		return __( 'Header', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck_header_elements' ];
	}
	protected function register_controls() {

		$this->start_controls_section (
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
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
				],
			]
		);

	
		//---------------------------- main menu control----------------------------//

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
			'show_search_btn',
			[
				'label' 		=> __( 'Show Search ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'show_cart_btn',
			[
				'label' 		=> __( 'Show Cart ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'show_header_btn',
			[
				'label' 		=> __( 'Show Header Button ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 	=> __( 'Button Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Make Appointment', 'webteck' ),
				'condition'		=> [ 'show_header_btn' => [ 'yes' ] ],
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
			'show_top_bar',
			[
				'label' 		=> __( 'Show Topbar ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => [ '1' ] ],
			]
		);

		$this->add_control(
			'address_control',
			[
				'label' 		=> __( 'Address Area ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => [ '1' ], 'show_top_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'address',
			[
				'label' 		=> __( 'Address', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '1403 Washington Ave, United States ', 'webteck' ),
				'condition'		=> [ 'address_control' => [ 'yes' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);
		$this->add_control(
			'address_icon',
			[
				'label' 		=> __( 'Icon Class', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="fa-solid fa-location-dot"></i>', 'webteck' ),
				'condition'		=> [ 'address_control' => [ 'yes' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);
		$this->add_control(
			'phone_control',
			[
				'label' 		=> __( 'Phone Area ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => [ '1' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);

		$this->add_control(
			'phone',
			[
				'label' 		=> __( 'Phone', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( ' (+150)-4899-8221', 'webteck' ),
				'condition'		=> [ 'phone_control' => [ 'yes' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);
		$this->add_control(
			'phone_icon',
			[
				'label' 		=> __( 'Icon Class', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="fa-solid fa-phone"></i>', 'webteck' ),
				'condition'		=> [ 'phone_control' => [ 'yes' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);
		$this->add_control(
			'email_control',
			[
				'label' 		=> __( 'Email Area ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
				'condition'		=> [ 'header_style' => [ '1' ], 'show_top_bar' => [ 'yes' ] ],
			]
		);
		$this->add_control(
			'email',
			[
				'label' 		=> __( 'Email', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'info@webteck.com', 'webteck' ),
				'condition'		=> [ 'email_control' => [ 'yes' ] ],
				'condition'		=> [ 'email_control' => [ 'yes' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);
		$this->add_control(
			'email_icon',
			[
				'label' 		=> __( 'Icon Class', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( '<i class="fa-solid fa-envelope"></i>', 'webteck' ),
				'condition'		=> [ 'email_control' => [ 'yes' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);
		$this->add_control(
			'social_title',
			[
				'label' 		=> __( 'Social Title', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'rows' 			=> 2,
				'default' 		=> __( 'Follow Us On : ', 'webteck' ),
				'condition'		=> [ 'email_control' => [ 'yes' ] ],
				'condition'		=> [ 'email_control' => [ 'yes' ], 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
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
				'condition'		=> [ 'show_top_bar' => [ 'yes' ],'header_style' => [ '1' ] ],
			]
		);

		$menus = $this->webteck_menu_select();

		if( !empty( $menus ) ){
	        $this->add_control(
				'webteck_menu_select',
				[
					'label'     	=> __( 'Select A Menu', 'webteck' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'webteck' ), admin_url( 'nav-menus.php' ) ),
					'condition'		=> [ 'header_style' => [ '1','2' ] ],

				]
			);
		} else {
			$this->add_control(
				'no_menu1',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . __( 'There are no menus in your site.', 'webteck' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'webteck' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}

        $this->end_controls_section();
       
        //----------------------------------- Menubar Styling-------------------------------------//
        $this->start_controls_section(
			'tobar_styling',
			[
				'label'     => __( 'Topbar Styling', 'webteck' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'header_style' => [ '1' ] ],
			]
        );

        $this->add_control(
			'top_bg_color',
			[
				'label' 		=> __( 'Top Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .header-top' => 'background-color: {{VALUE}};',
                ],
			]
        );

        $this->add_control(
			'top_text_color',
			[
				'label' 		=> __( 'Top Text Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .header-top' => '--body-color: {{VALUE}};',
                ],
			]
        );
        $this->add_control(
			'top_link_hvr_color',
			[
				'label' 		=> __( 'Link Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .header-top a:hover' => 'color: {{VALUE}};',
                ],
			]
        );
		$this->end_controls_section();

		$this->start_controls_section(
			'menubar_styling',
			[
				'label'     => __( 'Menubar Styling', 'webteck' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'top_level_menu_bg_color',
			[
				'label' 		=> __( 'Menu Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .menu-area' => 'background-color: {{VALUE}};',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_txt_color',
			[
				'label' 			=> __( 'Menu Text Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'color: {{VALUE}};',
                ]
			]
        );
        $this->add_control(
			'top_level_menu_hover_txt_color',
			[
				'label' 			=> __( 'Menu Hover', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} .main-menu ul > li > a:hover' => 'color: {{VALUE}};',
                ]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 			=> 'top_level_menu_typography',
				'label' 		=> __( 'Menu Typography', 'webteck' ),
                'selector' 		=> '{{WRAPPER}} .main-menu ul > li > a',
			]
		);

        $this->add_responsive_control(
			'top_level_menu_margin',
			[
				'label' 		=> __( 'Menu Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'top_level_menu_padding',
			[
				'label' 		=> __( 'Menu Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .main-menu ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);

		$this->add_control(
			'top_level_menu_height',
			[
				'label' 		=> __( 'Height', 'webteck' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> [ 'px' ],
				'range' 	=> [
					'px' 	=> [
						'min' 	=> 0,
						'step' 	=> 1,
						'max'	=> 500
					],
				],
				'selectors' => [
					'{{WRAPPER}} .main-menu ul > li > a' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}};'
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
			'menu'  => $settings['webteck_menu_select'],
            'container'       => 'ul',
            'menu_class'      => '',
		];

	    echo '<!--=========================Mobile Menu========================= -->';
	    echo webteck_mobile_menu();

	    echo webteck_search_box();

	    global $woocommerce;
        if ( ! empty( $woocommerce->cart->cart_contents_count ) ){
          $count = $woocommerce->cart->cart_contents_count;
        } else {
          $count = "0";
        }
		
		echo '<!--Sidebar start-->';
		echo '<div class="sidemenu-wrapper d-none d-lg-block ">';
			echo '<div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
			echo '<div class="shopping-cart-wrapper">';
				echo '<div class="widget widget_shopping_cart">';
					echo '<h3 class="widget_title">'.esc_html__( 'Shopping cart', 'webteck' ).'</h3>';
					echo '<div class="widget_shopping_cart_content">';
						woocommerce_mini_cart();
					echo '</div>';
				echo '</div>';
			echo '</div>';
			echo '</div>';
		echo '</div>';
		echo '<!--Sidebar end-->';

		if( ! empty( $settings['button_link']['url'] ) ) {
            $this->add_render_attribute( 'button', 'href', esc_url( $settings['button_link']['url'] ) );
        }

        if( ! empty( $settings['button_link']['nofollow'] ) ) {
            $this->add_render_attribute( 'button', 'rel', 'nofollow' );
        }

        if( ! empty( $settings['button_link']['is_external'] ) ) {
            $this->add_render_attribute( 'button', 'target', '_blank' );
        }

	    if($settings['header_style'] == 1 ){
		    echo '<div class="th-header header-layout2">';
		        if ($settings['show_top_bar'] == 'yes' ) {
			        echo '<div class="header-top">';
			            echo '<div class="container">';
			                echo '<div class="row justify-content-center justify-content-lg-between align-items-center gy-2">';
			                    echo '<div class="col-auto d-none d-lg-block">';
									echo '<div class="header-links">';
										echo '<ul>';
											if($settings['address_control'] == 'yes'){
												echo '<li>';
													echo wp_kses_post($settings['address_icon']);
													echo esc_html($settings['address']);
												echo '</li>';
											}
											if($settings['phone_control'] == 'yes'){
												$phone    	= $settings['phone'];

												$replace        = array(' ','-',' - ');
												$with           = array('','','');

												$phoneurl       = str_replace( $replace, $with, $phone );

												echo '<li>';
													echo wp_kses_post($settings['phone_icon']);
													echo '<a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html($phone).'</a>';
												echo '</li>';
											}
											if($settings['email_control'] == 'yes'){
												$email    	= $settings['email'];
												$email_v          = is_email( $email );

												$replace        = array(' ','-',' - ');
												$with           = array('','','');

												$emailurl       = str_replace( $replace, $with, $email );

												echo '<li>';
													echo wp_kses_post($settings['email_icon']);
													echo '<a href="'.esc_attr( 'mailto:'.$emailurl ).'">'.esc_html($email).'</a>';
												echo '</li>';
											}
										echo '</ul>';
									echo '</div>';
			                    echo '</div>';
			                    if ( ! empty( $settings['social_icon_list'] ) ) {
				                    echo '<div class="col-auto">';
										echo '<div class="header-social">';
											if ( ! empty( $settings['social_title'] ) ) {
												echo '<span class="social-title">'.$settings['social_title'].'</span>';
											}
											
											foreach ( $settings['social_icon_list'] as $social_icon ) {
												$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
												$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

												echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

												\Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

												echo '</a> ';
											}
										echo '</div>';
				                    echo '</div>';
				                }
			                echo '</div>';
			            echo '</div>';
			        echo '</div>';
			    }
		        echo '<div class="sticky-wrapper">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
								if ( ! empty( $settings['logo_image']['url'] ) ) {
									echo '<div class="col-auto">';
										echo '<div class="header-logo">';
											echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo webteck_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) );
											echo '</a>';

										echo '</div>';
									echo '</div>';
								}

								echo '<div class="col-auto">';
									if ( ! empty( $settings['webteck_menu_select'] ) ) {
										echo '<nav class="main-menu d-none d-lg-inline-block">';
											wp_nav_menu( $args );
										echo '</nav>';
									}
									echo '<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
								echo '</div>';
								echo '<div class="col-auto d-none d-lg-block">';
									echo '<div class="header-button">';
										if ($settings['show_search_btn'] == 'yes') {
											echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if( $settings['show_cart_btn'] == 'yes' ){

											echo '<button type="button" class="icon-btn sideMenuToggler">';
												echo '<i class="far fa-cart-shopping"></i><span class="badge">'.esc_html( $count ).'</span>';
											echo '</button>';
										}
										if( $settings['show_header_btn'] == 'yes' ){
											if( ! empty( $settings['button_text'] ) ) {
												echo '<a '.$this->get_render_attribute_string('button').' class="th-btn">'.esc_html( $settings['button_text'] ).'<i class="fas fa-arrow-right ms-1"></i></a>';
											}
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
		        echo '</div>';
		    echo '</div>';
		} else {
			echo '<div class="th-header header-layout3">';
		        echo '<div class="sticky-wrapper">';
					echo '<!-- Main Menu Area -->';
					echo '<div class="menu-area">';
						echo '<div class="container">';
							echo '<div class="row align-items-center justify-content-between">';
								if( ! empty( $settings['logo_image']['url'] ) ){
									echo '<div class="col-auto">';
										echo '<div class="header-logo">';
											echo '<a href="'.esc_url( home_url( '/' ) ).'">';
												echo webteck_img_tag( array(
													'url' => esc_url( $settings['logo_image']['url'] ),
												) );
											echo '</a>';

										echo '</div>';
									echo '</div>';
								}
								echo '<div class="col-auto">';
									if ( ! empty( $settings['webteck_menu_select'] ) ) {
										echo '<nav class="main-menu d-none d-lg-inline-block">';
											wp_nav_menu( $args );
										echo '</nav>';
									}
									echo '<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
								echo '</div>';
								echo '<div class="col-auto d-none d-lg-block">';
									echo '<div class="header-button">';
										if ($settings['show_search_btn'] == 'yes'){
											echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
										}
										if( $settings['show_header_btn'] == 'yes' ){
											if( ! empty( $settings['button_text'] ) ) {
												echo '<a '.$this->get_render_attribute_string('button').' class="th-btn">'.esc_html( $settings['button_text'] ).'<i class="fas fa-arrow-right ms-1"></i></a>';
											}
										}
										if ( $settings['show_cart_btn'] == 'yes' ){
											if ( ! empty( $woocommerce->cart->cart_contents_count ) ){
											$count = $woocommerce->cart->cart_contents_count;
											} else{
											$count = "0";
											}
											echo '<button type="button" class="icon-btn sideMenuToggler d-none d-xl-block">';
												echo '<i class="far fa-cart-shopping"></i><span class="badge">'.esc_html( $count ).'</span>';
											echo '</button>';
										}
									echo '</div>';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
		        echo '</div>';
		    echo '</div>';
		}
	}
}
