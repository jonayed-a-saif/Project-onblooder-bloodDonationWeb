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
 * CTA Box Widget .
 *
 */
class Webteck_CTA2 extends Widget_Base {

	public function get_name() {
		return 'webteckcta2';
	}

	public function get_title() {
		return __( 'CTA v2', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'ctstyle_section',
			[
				'label' 	=> __( 'Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'CTA Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style Two', 'webteck' ),
				]
			]
		);
		$this->end_controls_section();

		



        //---------------------------------------style 2---------------------------------------//
        $this->start_controls_section(
			'ctad2_section',
			[
				'label' 	=> __( 'CTA', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'	=> ['layout_style' => ['layout_one']]
			]
        );
        
		$this->add_control(
			'image1',
			[
				'label' 		=> esc_html__( 'Image 1', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'image2',
			[
				'label' 		=> esc_html__( 'Image 2', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'title2', [
				'label' 		=> __( 'CTA Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Lets’s consultation' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'subtitle2', [
				'label' 		=> __( 'CTA Subtitle', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'We Make Awesome IT Services For Your Newly Business' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'phone_label2', [
				'label' 		=> __( 'Phone Label', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'For any question' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'phone2', [
				'label' 		=> __( 'Phone Number', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '(+123) 5859 459' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		
		$this->add_control(
			'button_text2',
			[
				'label' 		=> esc_html__( 'Button Text', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Read Details', 'webteck' ),
			]
		);
		$this->add_control(
			'button_link2',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
			]
		);
		$this->add_control(
			'gallery',
			[
				'label' => esc_html__( 'Add Gallery Image', 'webteck' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
		
		
        $this->end_controls_section();



        





        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one'], 'color' );
		webteck_all_elementor_style($this, 'SubTitle ', '{{WRAPPER}} .subtitle-selector',['layout_one'], 'color' );

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

					webteck_elementor_color_style($this, 'Button Text', '{{WRAPPER}} .th-btn', ['layout_one','layout_three']);
					webteck_elementor_color_style($this, 'Background', '{{WRAPPER}} .th-btn', ['layout_one','layout_three'], 'background-color');
					webteck_elementor_border_style($this, 'Button', '{{WRAPPER}} .th-btn', ['layout_one','layout_three']);

				$this->end_controls_tab();

				// Second Tab: Hover
				$this->start_controls_tab(
				    'sec_style_tab',
				    [
				        'label' => esc_html__( 'Hover', 'webteck' ),
				    ]
				);

					webteck_elementor_color_style($this, 'Button Text Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one','layout_three']);
					webteck_elementor_color_style($this, 'Background Hover', '{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after', ['layout_one','layout_three'], 'background-color');
					webteck_elementor_border_style($this, 'Button Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one','layout_three']);

				$this->end_controls_tab();

			$this->end_controls_tabs();
		$this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        


        if( $settings['layout_style'] == 'layout_one' ){

        	$phone      = $settings['phone2'];


	        $replace        = array(' ','-',' - ');
	        $with           = array('','','');

	        $phoneurl       = str_replace( $replace, $with, $phone );
	        echo '<div class="cta-area9 ">';
	    		echo '<div class="container th-container4">';
	            	echo '<div class="row">';
	            		echo '<div class="col-lg-3">';
		                    echo '<div class="cta-feature_img th-anim">';
		                        echo '<img src="'.esc_url( $settings['image1']['url'] ).'" alt="">';
		                    echo '</div>';
	                    echo '</div>';

	                    echo '<div class="col-lg-6">';
		                    echo '<div class="cta-title-area2">';
		                        echo '<div class="title-area text-center">';
		                            echo '<span class="sub-title title-selector">'.esc_html( $settings['title2'] ).'</span>';
		                            echo '<h2 class="sec-title subtitle-selector">'.esc_html( $settings['subtitle2'] ).'</h2>';
		                        echo '</div>';
		                        echo '<div class="feature-area2">';
		                            echo '<a href="'.esc_url( $settings['button_link2'] ).'" class="th-btn style8 style-radius">'.esc_html( $settings['button_text2'] ).'</a>';
		                            echo '<div class="feature-wrapper style2">';
		                                echo '<div class="feature-icon">';
		                                    echo '<a href="'.esc_attr( 'tel:'.$phoneurl ).'"><i class="fa-solid fa-phone"></i></a>';
		                                echo '</div>';
		                                echo '<div class="media-body">';
		                                    echo '<p class="header-info_link"><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html( $settings['phone2'] ).'</a></p>';
		                                    echo '<span class="header-info_label">'.esc_html( $settings['phone_label2'] ).'</span>';
		                                echo '</div>';
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
	                    echo '</div>';

	                    echo '<div class="col-lg-3">';
		                    echo '<div class="cta-feature_img th-anim">';
		                        echo '<img src="'.esc_url( $settings['image2']['url'] ).'" alt="">';
		                    echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	                
	            echo '</div>';
	        echo '</div>';




	        echo '<div class="brand-area6 space-bottom" data-pos-for=".cta-area9" data-sec-pos="top-half">';
		        echo '<div class="container th-container4">';
		            echo '<div class="brand-sec6 bg-theme">';
		                echo '<div class="slider-area text-center">';
		                    echo '<div class="swiper th-slider" id="brandSlider2" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":2},"576":{"slidesPerView":"2"},"768":{"slidesPerView":"3"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"},"1400":{"slidesPerView":"5"}}}\'>';
		                        echo '<div class="swiper-wrapper">';

		                            foreach ( $settings['gallery'] as $single_data ) {
			                            echo '<div class="swiper-slide">';
			                                echo '<div class="brand-box">';
			                                    echo '<img src="'.esc_url( $single_data['url'] ).'" alt="Brand Logo">';
			                                echo '</div>';
			                            echo '</div>';
			                        }
		                            

		                        echo '</div>';

		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }
	}
}