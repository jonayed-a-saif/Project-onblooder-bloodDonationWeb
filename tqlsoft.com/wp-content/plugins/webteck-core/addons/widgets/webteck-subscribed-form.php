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
 * Footer Subscribed Widget .
 *
 */
class Traga_Footer_Subscribe extends Widget_Base {

	public function get_name() {
		return 'tragafootersubscribe';
	}

	public function get_title() {
		return __( 'Webteck Footer Subscribe', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck_footer_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'footer_subscribe_section',
			[
				'label' 	=> __( 'Footer Subscribe', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Subscribe Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
				],
			]
		);
       
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
			]
        );
        $this->add_control(
			'sub_desc',
			[
				'label'     => __( 'Subtitle', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 3,
				'default'   => __( 'Subsrcibe to our upcoming latest article and news resources. Sign up today for hints. tips and the latest product news.', 'webteck' ),
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
					'{{WRAPPER}} h3' => 'color: {{VALUE}}',
                ],
			]
        );
		$this->add_control(
			'title_border_color',
			[
				'label' 		=> __( 'Title Border Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3' => '--theme-color: {{VALUE}}',
                ],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'title_typography',
				'label' 	=> __( 'Title Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} h3',
			]
        );
        $this->add_responsive_control(
			'title_margin',
			[
				'label' 		=> __( 'Title Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} p' => '--body-color: {{VALUE}};',
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
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
		$this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

		if ( $settings['layout_style'] == '1' ) {
			echo '<div class="newsletter-widget footer-widget">';
				if(!empty($settings['title'])){
					echo '<h3 class="widget_title">'.esc_html($settings['title']).'</h3>';
				}
				echo '<div class="newsletter-widget">';
					if(!empty($settings['sub_desc'])){
						echo '<p class="footer-text">'.esc_html($settings['sub_desc']).'</p>';
					}
					echo '<form class="newsletter-form">';
						echo '<input class="form-control" type="email" placeholder="'.esc_attr('Enter Email Address', 'webteck').'" required="">';
						echo '<button type="submit" class="icon-btn"><i class="fa-solid fa-paper-plane"></i></button>';
					echo '</form>';
				echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="newsletter-wrap">';
				echo '<div class="newsletter-content">';
					if(!empty($settings['title'])){
						echo '<h3 class="newsletter-title">'.esc_html($settings['title']).'</h3>';
					}
					if(!empty($settings['sub_desc'])){
						echo '<p class="newsletter-text">'.esc_html($settings['sub_desc']).'</p>';
					}
				echo '</div>';
				echo '<form class="newsletter-form">';
					echo '<div class="form-group">';
						echo '<input class="form-control" type="email" placeholder="'.esc_attr('Email Address', 'webteck').'" required="">';
						echo '<i class="fal fa-envelope"></i>';
					echo '</div>';
					echo '<button type="submit" class="th-btn style3">'.esc_html('Subscribe', 'webteck').'</button>';
				echo '</form>';
			echo '</div>';
		}
	}
}