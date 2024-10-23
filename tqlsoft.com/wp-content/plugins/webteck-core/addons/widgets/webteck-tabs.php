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
 * Tab Widget .
 *
 */
class Traga_Tabs extends Widget_Base {

	public function get_name() {
		return 'tragatabs';
	}

	public function get_title() {
		return __( 'Webteck Tabs', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tabs_section',
			[
				'label' 	=> __( 'Tabs', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Tabs Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'menu_text',
			[
				'label'     => __( 'Menu Text', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Menu Text', 'webteck' )
			]
        );
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
			'content',
			[
				'label'     => __( 'Content', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 4,
                'default'  	=> __( 'Content Area', 'webteck' )
			]
        );
        $repeater->add_control(
			'btn_text',
            [
				'label'         => __( 'Button Text', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'About More' ,'webteck' ),
				'rows' 		    => 2,
			]
		);

		$repeater->add_control(
			'button_url',
			[
				'label' => esc_html__( 'Link', 'webteck' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'webteck' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
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
			'tabs_repeat',
			[
				'label' 		=> __( 'Tabs', 'webteck' ),
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


        /*---------------------------------------- styling ------------------------------------*/

		$this->start_controls_section(
			'title_style_section',
			[
				'label' 	=> __( 'Title Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*----------------------------------------- styling ------------------------------------*/

		$this->start_controls_section(
			'contetnt_style_section',
			[
				'label' 	=> __( 'Content Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'webteck_content_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} p'	=> 'color: {{VALUE}};',
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

        /*----------------------------------------- styling ------------------------------------*/

		$this->start_controls_section(
			'menu_style_section',
			[
				'label' 	=> __( 'Menu Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'webteck_btn_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} button'	=> 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'webteck_btn_bg_color',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .achivement-tab'	=> 'background-color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'webteck_btn_bg_active_color',
			[
				'label' 		=> __( 'Background Active Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .achivement-tab'	=> '--theme-color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'webteck_btn_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} button',
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        if ( $settings['layout_style'] == '1' ){
        	echo '<div class="process-card-area">';
				if ( ! empty( $settings['process_line']['url'] ) ) {
					echo '<div class="process-line position-top">';
						echo webteck_img_tag( array(
							'url'   => esc_url( $settings['process_line']['url'] ),
						) );
					echo '</div>';
				}
            echo '</div>';
            echo '<div class="achivement-tab filter-menu-active indicator-active">';
                $i = 0;
                foreach ( $settings['tabs_repeat'] as $data ) {
                    $i++;
                    if ($i == 1) {
                        $active_class = "active";
                    } else {
                        $active_class = "";
                    }
                    if ( ! empty( $data['menu_text'] ) ) {
                        echo '<button data-filter=".cat'.esc_attr( $i ).'" class="'.esc_attr( $active_class ).'" type="button">'.esc_html( $data['menu_text'] ).'</button>';
                    }
                }
            echo '</div>';
            echo '<div class="achivement-box-area filter-active-cat1">';
                $i = 0;
                foreach( $settings['tabs_repeat'] as $data ) {
                    $i++;
                    echo '<div class="filter-item w-100 cat'.esc_attr( $i ).'">';
                        echo '<div class="achivement-box">';
                            if ( ! empty( $data['image']['url'] ) ) {
                                echo '<div class="achivement-box_img">';
                                    echo webteck_img_tag( array(
                                        'url'   => esc_url( $data['image']['url'] ),
                                    ) );
                                echo '</div>';
                            }
                            echo '<div class="media-body">';
                                if ( ! empty( $data['title'] ) ) {
                                    echo '<h3 class="box-title">'.wp_kses_post( $data['title'] ).'</h3>';
                                }
                                if ( ! empty( $data['content'] ) ) {
                                    echo '<p class="achivement-box_text">'.esc_html( $data['content'] ).'</p>';
                                }
                                echo '<a href="'.esc_url( $data['button_url']['url'] ).'" class="th-btn">'.esc_html( $data['btn_text'] ).'</a>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            echo '</div>';
	    } else {
			
		}
	}
}