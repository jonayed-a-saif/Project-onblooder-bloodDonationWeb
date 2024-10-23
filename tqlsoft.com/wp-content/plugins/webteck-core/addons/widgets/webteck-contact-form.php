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
 * Contact Box Widget .
 *
 */
class Traga_Contact extends Widget_Base {

	public function get_name() {
		return 'tragacontactus';
	}

	public function get_title() {
		return __( 'Webteck Contact Form', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'feature_section',
			[
				'label' 	=> __( 'Contact', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'feature_style',
			[
				'label' 		=> __( 'Contact Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
				],
			]
		);

		$this->add_control(
			'exclude_post_name',
			[
				'label'         => __( 'Chose a style from here', 'webteck' ),
                'type'          => Controls_Manager::SELECT,
				'options'       => $this->webteck_cf7_id(),
			]
        );

        $this->add_control(
			'form_title',
			[
				'label'     => __( 'Form Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'condition'		=> [ 'feature_style' =>  ['1']  ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
			'con_title_styling',
			[
				'label' 	=> __( 'Title Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'con_title_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'con_title_typography',
		 		'label' 		=> esc_html__( 'Typography', 'webteck' ),
		 		'selector' 		=> '{{WRAPPER}} h3',
		 	]
		);

        $this->add_responsive_control(
			'con_title_margin',
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
			'con_title_padding',
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
	}

	// Get Specific Post
    public function webteck_cf7_id(){
        $args = array(
            'post_type'         => 'wpcf7_contact_form',
            'posts_per_page'    => -1,
        );

        $webteck_cf7 = new WP_Query( $args );

        $postarray = [];

        while( $webteck_cf7->have_posts() ){
            $webteck_cf7->the_post();
            $postarray[get_the_title()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $wpdb;
        $postTitle = $settings['exclude_post_name']; 
        $postID = $wpdb->get_var($wpdb->prepare("SELECT ID FROM {$wpdb->posts} WHERE   post_type='wpcf7_contact_form' AND post_title = %s",$postTitle));

        if( $settings['feature_style'] == '1' ){
	        echo '<div>';
				if( ! empty($settings['form_title']) ){
					echo '<h3 class="h4 mt-n2 mb-30 text-center">'.esc_html($settings['form_title']).'</h3>';
				}
	            echo do_shortcode( '[contact-form-7 id="'.esc_attr($postID).'" title="'.esc_attr($settings['exclude_post_name']).'"]' );
	        echo '</div>';
		} else {
			echo do_shortcode( '[contact-form-7 id="'.esc_attr($postID).'" title="'.esc_attr($settings['exclude_post_name']).'"]' );
		}


	}
}