<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class Traga_Particle extends Widget_Base {

	public function get_name() {
		return 'tragaparticle';
	}

	public function get_title() {
		return __( 'Webteck Particle', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'particle_section',
			[
				'label' 	=> __( 'Particle', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'layout_style',
			[
				'label' 		=> esc_html__( 'Select Particle Style', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
					'1'  			    => esc_html__( 'Style 1', 'webteck' ),
					'2'  			    => esc_html__( 'Style 2', 'webteck' ),
					'3'  			    => esc_html__( 'Style 3', 'webteck' ),
					'6'  			    => esc_html__( 'Style 6', 'webteck' ),
					'7'  			    => esc_html__( 'Style 7', 'webteck' ),
					'8'  			    => esc_html__( 'Style 8', 'webteck' ),
				],
				'default' => [ '1'],
			]
		);
		$this->add_control(
			'extra_class',
			[
				'label' 		=> __( 'Add Extra Class', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'description' 	=> __( 'There are are some extra for same style in different size. example: small', 'webteck' ),
			]
		);

		$this->add_control(
			'from_top',
			[
				'label' 		=> __( 'Top', 'webteck' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
			]
		);
		$this->add_control(
			'from_left',
			[
				'label' 		=> __( 'Left', 'webteck' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_right',
			[
				'label' 		=> __( 'Right', 'webteck' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);
		$this->add_control(
			'from_bottom',
			[
				'label' 		=> __( 'Bottom', 'webteck' ),
				'type' 			=> Controls_Manager::SLIDER,
				'size_units' 	=> '%',
				'range' 		=> [
					'%' 			=> [
						'min' 			=> 0,
						'max' 			=> 100,
					],
				],
			]
		);

		$this->add_control(
			'responsive_style',
			[
				'label' 		=> esc_html__( 'Responsive Styling', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::SELECT2,
				'multiple' 		=> true,
				'options' 		=> [
					'd-none d-xl-block'  		=> esc_html__( 'Hide From large Device', 'webteck' ),
					'd-none d-lg-block'  		=> esc_html__( 'Hide From Laptop', 'webteck' ),
					'd-none d-md-block'  		=> esc_html__( 'Hide From Tablet', 'webteck' ),
					'd-none d-sm-block'  		=> esc_html__( 'Hide From Mobile', 'webteck' ),
					' '  						=> esc_html__( 'Default', 'webteck' ),
				],
			]
		);
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','shape-mockup');
        $this->add_render_attribute('wrapper','class', $settings['responsive_style']);

        if($settings['from_bottom']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-bottom', $settings['from_bottom']['size'] .'%' );
	    }
	    if($settings['from_top']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-top', $settings['from_top']['size'] .'%' );
	    }
	    if($settings['from_right']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-right', $settings['from_right']['size'] .'%' );
	    }
	    if($settings['from_left']['size']){
	        $this->add_render_attribute( 'wrapper', 'data-left', $settings['from_left']['size'] .'%' );
	    }


        if ( $settings['layout_style'] == '1' ) {
            $layout_class = 'particle-1';
        } elseif ( $settings['layout_style'] == '2' ) {
            $layout_class = 'particle-2';
        } elseif ( $settings['layout_style'] == '3' ) {
            $layout_class = 'particle-3';
        } elseif ( $settings['layout_style'] == '4' ) {
            $layout_class = 'particle-4';
        } else {
            $layout_class = 'particle-1';
        }

        $uid = uniqid();

        echo '<div '.$this->get_render_attribute_string('wrapper').'>';
            echo '<div class="'.$layout_class.' '.$settings['extra_class'].'" id="particle-'.$uid.'"></div>';
        echo '</div>';
	}
}