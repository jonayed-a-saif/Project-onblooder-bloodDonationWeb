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
 * Footer Menu Widget .
 *
 */
class Traga_Footer_Menu extends Widget_Base {

	public function get_name() {
		return 'tragafootermenu';
	}

	public function get_title() {
		return __( 'Webteck Footer Menu', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck_footer_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'footer_menu_section',
			[
				'label' 	=> __( 'Footer Menu', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
       
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
			]
        );

        $menus = $this->webteck_menu_select();

		if ( !empty( $menus ) ){
	        $this->add_control(
				'webteck_menu_select',
				[
					'label'     	=> __( 'Select Traga Menu', 'webteck' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $menus,
					'description' 	=> sprintf( __( 'Go to the <a href="%s" target="_blank">Menus screen</a> to manage your menus.', 'webteck' ), admin_url( 'nav-menus.php' ) ),
				]
			);
		} else {
			$this->add_control(
				'no_menu',
				[
					'type' 				=> Controls_Manager::RAW_HTML,
					'raw' 				=> '<strong>' . _( 'There are no menus in your site.', 'webteck' ) . '</strong><br>' . sprintf( _( 'Go to the <a href="%s" target="_blank">Menus screen</a> to create one.', 'webteck' ), admin_url( 'nav-menus.php?action=edit&menu=0' ) ),
					'separator' 		=> 'after',
					'content_classes' 	=> 'elementor-panel-alert elementor-panel-alert-info',
				]
			);
		}
        
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
			'menu_styling',
			[
				'label'     => __( 'Menu Styling', 'webteck' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'menu_txt_color',
			[
				'label' 			=> __( 'Menu Text Color', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} a' => '--body-color: {{VALUE}};',
                ]
			]
        );
        $this->add_control(
			'menu_hover_txt_color',
			[
				'label' 			=> __( 'Menu Hover', 'webteck' ),
				'type' 				=> Controls_Manager::COLOR,
				'selectors' 		=> [
					'{{WRAPPER}} a' => '--theme-color: {{VALUE}};',
                ]
			]
        );
		$this->end_controls_section();
	}

	public function webteck_menu_select(){
	    $webteck_menu = wp_get_nav_menus();
	    $menu_array  = array();
		$menu_array[''] = __( 'Select A Menu', 'evona' );
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

        echo '<div class="footer-widget widget_nav_menu">';
        	if(!empty($settings['title'])){
	            echo '<h3 class="widget_title">'.esc_html($settings['title']).'</h3>';
	        }
            echo '<div class="menu-all-pages-container">';
                if( ! empty( $settings['webteck_menu_select'] ) ){
					wp_nav_menu( $args );
				} 
            echo '</div>';
        echo '</div>';
	}
}