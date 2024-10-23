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
 * Mission Box Widget .
 *
 */
class Webteck_Mission extends Widget_Base {

	public function get_name() {
		return 'webteckmission';
	}

	public function get_title() {
		return __( 'Mission', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'missiond_section',
			[
				'label' 	=> __( 'Mission', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Mission Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					// 'layout_three'  	=> __( 'Style Three', 'webteck' ),
					// 'layout_four'  		=> __( 'Style Four', 'webteck' ),
				]
			]
		);
		$this->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style' => ['layout_one']]
			]
		);

		$this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['layout_one']]
			]
		);
		$this->add_control(
			'subtitle', [
				'label' 		=> __( 'Subtitle', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['layout_one']]
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Read Details', 'webteck' ),
		        'condition'	=> ['layout_style' => ['layout_one']]
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
		        'condition'	=> ['layout_style' => ['layout_one']]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'url', [
				'label' 		=> __( 'URL', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'webteck' ),
				'rows' 			=> 4,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'mission',
			[
				'label' 		=> __( 'Mission', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
			]
		);

		
        $this->end_controls_section();


        $this->start_controls_section(
		    'button_style_section',
		    [
		        'label' => __( 'Button Style', 'webteck' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

			webteck_elementor_typography_style($this, 'Button', '{{WRAPPER}} .th-btn', ['layout_one']);

			$this->start_controls_tabs(
			    'style_tabs'
			);

				// First Tab: Normal
				$this->start_controls_tab(
				    'first_style_tab',
				    [
				        'label' => esc_html__( 'Normal', 'webteck' ),
				    ]
				);

					webteck_elementor_color_style($this, 'Button Text', '{{WRAPPER}} .th-btn', ['layout_one']);
					webteck_elementor_color_style($this, 'Background', '{{WRAPPER}} .th-btn', ['layout_one'], 'background-color');
					webteck_elementor_border_style($this, 'Button', '{{WRAPPER}} .th-btn', ['layout_one']);

				$this->end_controls_tab();

				// Second Tab: Hover
				$this->start_controls_tab(
				    'sec_style_tab',
				    [
				        'label' => esc_html__( 'Hover', 'webteck' ),
				    ]
				);

					webteck_elementor_color_style($this, 'Button Text Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one']);
					webteck_elementor_color_style($this, 'Background Hover', '{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after', ['layout_one'], 'background-color');
					webteck_elementor_border_style($this, 'Button Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one']);

				$this->end_controls_tab();

			$this->end_controls_tabs();
		$this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class=" position-relative overflow-hidden">';
		        echo '<div class="container th-container5">';
		            echo '<div class="about-sec4 position-relative overflow-hidden" data-bg-src="'.esc_url( $settings['image']['url'] ).'">';
		                echo '<div class="about-shape4">';
		                    echo '<div class="marquee-wrapper">';
		                        echo '<div class="marquee">';
		                            echo '<div class="marquee-group">';
		                              	foreach( $settings['mission'] as $data ) {
		                                    echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
		                                }  
		                                
		                            echo '</div>';
		                            echo '<div aria-hidden="true" class="marquee-group">';
		                                
		                            	foreach( $settings['mission'] as $data ) {
		                                    echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
		                                } 

		                            echo '</div>';
		                        echo '</div>';
		                        echo '<div class="marquee marquee--reverse">';
		                            echo '<div class="marquee-group">';
		                                
		                            	foreach( $settings['mission'] as $data ) {
		                                    echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
		                                } 

		                            echo '</div>';
		                            echo '<div aria-hidden="true" class="marquee-group">';
		                                
		                            	foreach( $settings['mission'] as $data ) {
		                                    echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
		                                } 

		                            echo '</div>';
		                        echo '</div>';
		                        echo '<div class="marquee">';
		                            echo '<div class="marquee-group">';
		                                
		                            	foreach( $settings['mission'] as $data ) {
		                                    echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
		                                } 

		                            echo '</div>';
		                            echo '<div aria-hidden="true" class="marquee-group">';
		                                
		                            	foreach( $settings['mission'] as $data ) {
		                                    echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
		                                } 

		                            echo '</div>';
		                        echo '</div>';

		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="about-area2">';
		                    echo '<div class="title-area-wrapper">';
		                        echo '<div class="title-area mb-40">';
		                            echo '<span class="sub-title style1 text-white">'.esc_html( $settings['title'] ).'</span>';
		                            echo '<h2 class="sec-title text-white">'.esc_html( $settings['subtitle'] ).'</h2>';
		                        echo '</div>';
		                        if( ! empty( $settings['button_link'] ) ){
		                            echo '<a href="'.esc_url( $settings['button_link'] ).'" class="th-btn style5 style-radius">'.esc_html( $settings['button_text'] ).'</a>';
		                        }
		                    echo '</div>';
		                echo '</div>';

		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }else{
	    	echo '<div class="marquee-wrapper style2">';
                echo '<div class="marquee">';
                    echo '<div class="marquee-group">';
                        foreach( $settings['mission'] as $data ) {
                            echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
                        } 
                        
                    echo '</div>';
                    echo '<div aria-hidden="true" class="marquee-group">';
                        foreach( $settings['mission'] as $data ) {
                            echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
                        } 
                        
                    echo '</div>';
                echo '</div>';
                echo '<div class="marquee marquee--reverse">';
                    echo '<div class="marquee-group">';
                        foreach( $settings['mission'] as $data ) {
                            echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
                        } 
                        
                    echo '</div>';
                    echo '<div aria-hidden="true" class="marquee-group">';
                        foreach( $settings['mission'] as $data ) {
                            echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
                        } 
                        
                    echo '</div>';
                echo '</div>';
                echo '<div class="marquee">';
                    echo '<div class="marquee-group">';
                        foreach( $settings['mission'] as $data ) {
                            echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
                        } 
                        
                    echo '</div>';
                    echo '<div aria-hidden="true" class="marquee-group">';
                        foreach( $settings['mission'] as $data ) {
                            echo '<div class="text">'.esc_html( $data['title'] ).'</div>';
                        } 
                       
                    echo '</div>';
                echo '</div>';

            echo '</div>';
	    }
	}
}