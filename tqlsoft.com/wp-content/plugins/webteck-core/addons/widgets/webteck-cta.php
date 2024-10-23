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
class Webteck_CTA extends Widget_Base {

	public function get_name() {
		return 'webteckcta';
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
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					// 'layout_three'  		=> __( 'Style Three', 'webteck' ),
					// 'layout_four'  		=> __( 'Style Four', 'webteck' ),

				]
			]
		);
		$this->end_controls_section();

		//---------------------------------------style 1---------------------------------------//
        $this->start_controls_section(
			'ctad_section',
			[
				'label' 	=> __( 'CTA', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'	=> ['layout_style' => ['layout_one']]
			]
        );
        
		$this->add_control(
			'bg',
			[
				'label' 		=> esc_html__( 'Background Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'phone_icon',
			[
				'label' 		=> esc_html__( 'Phone Icon', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'phone_label', [
				'label' 		=> __( 'Phone Label', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Call For More Info' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'phone', [
				'label' 		=> __( 'Phone Number', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '(+123) 5859 459' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> __( 'CTA Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Let’s Request a Schedule For Free Consultation' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Read Details', 'webteck' ),
			]
		);
		$this->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
			]
		);
		

		
        $this->end_controls_section();



        //---------------------------------------style 2---------------------------------------//
  //       $this->start_controls_section(
		// 	'ctad2_section',
		// 	[
		// 		'label' 	=> __( 'CTA', 'webteck' ),
		// 		'tab' 		=> Controls_Manager::TAB_CONTENT,
		// 		'condition'	=> ['layout_style' => ['layout_two']]
		// 	]
  //       );
        
		// $this->add_control(
		// 	'image1',
		// 	[
		// 		'label' 		=> esc_html__( 'Image 1', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::MEDIA,
		// 		'default' 		=> [
		// 			'url' =>  \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'image2',
		// 	[
		// 		'label' 		=> esc_html__( 'Image 2', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::MEDIA,
		// 		'default' 		=> [
		// 			'url' =>  \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'title2', [
		// 		'label' 		=> __( 'CTA Title', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' 		=> __( 'Lets’s consultation' , 'webteck' ),
		// 		'rows' 			=> 2,
		// 		'label_block' 	=> true,
		// 	]
		// );
		// $this->add_control(
		// 	'subtitle2', [
		// 		'label' 		=> __( 'CTA Subtitle', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' 		=> __( 'We Make Awesome IT Services For Your Newly Business' , 'webteck' ),
		// 		'rows' 			=> 2,
		// 		'label_block' 	=> true,
		// 	]
		// );
		// $this->add_control(
		// 	'phone_label2', [
		// 		'label' 		=> __( 'Phone Label', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' 		=> __( 'For any question' , 'webteck' ),
		// 		'rows' 			=> 2,
		// 		'label_block' 	=> true,
		// 	]
		// );
		// $this->add_control(
		// 	'phone2', [
		// 		'label' 		=> __( 'Phone Number', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' 		=> __( '(+123) 5859 459' , 'webteck' ),
		// 		'rows' 			=> 2,
		// 		'label_block' 	=> true,
		// 	]
		// );
		
		// $this->add_control(
		// 	'button_text2',
		// 	[
		// 		'label' 		=> esc_html__( 'Button Text', 'webteck' ),
		// 		'type' 		=> \Elementor\Controls_Manager::TEXT,
		//         'default'  	=> esc_html__( 'Read Details', 'webteck' ),
		// 	]
		// );
		// $this->add_control(
		// 	'button_link2',
		// 	[
		// 		'label' 		=> esc_html__( 'Button Link', 'webteck' ),
		// 		'type' 		=> \Elementor\Controls_Manager::TEXT,
		//         'default'  	=> esc_html__( '#', 'webteck' ),
		// 	]
		// );
		// $this->add_control(
		// 	'gallery',
		// 	[
		// 		'label' => esc_html__( 'Add Gallery Image', 'webteck' ),
		// 		'type' => \Elementor\Controls_Manager::GALLERY,
		// 		'default' => [],
		// 	]
		// );
		
		
  //       $this->end_controls_section();



         $this->start_controls_section(
			'ctad3_section',
			[
				'label' 	=> __( 'CTA', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'	=> ['layout_style' => ['layout_two']]
			]
        );

        $this->add_control(
			'title3', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Call For More Info' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'placeholder', [
				'label' 		=> __( 'Placeholder', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Call For More Info' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'btn', [
				'label' 		=> __( 'Button', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '(+123) 5859 459' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$this->end_controls_section();

		// //---------------------------------------style 2---------------------------------------//
  //       $this->start_controls_section(
		// 	'ctad4_section',
		// 	[
		// 		'label' 	=> __( 'CTA', 'webteck' ),
		// 		'tab' 		=> Controls_Manager::TAB_CONTENT,
		// 		'condition'	=> ['layout_style' => ['layout_four']]
		// 	]
  //       );
        
		// $this->add_control(
		// 	'4bg',
		// 	[
		// 		'label' 		=> esc_html__( 'Background', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::MEDIA,
		// 		'default' 		=> [
		// 			'url' =>  \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'4img',
		// 	[
		// 		'label' 		=> esc_html__( 'Logo Image', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::MEDIA,
		// 		'default' 		=> [
		// 			'url' =>  \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );
		// $this->add_control(
		// 	'4title', [
		// 		'label' 		=> __( 'CTA Title', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' 		=> __( 'Lets’s consultation' , 'webteck' ),
		// 		'rows' 			=> 2,
		// 		'label_block' 	=> true,
		// 	]
		// );
		// $this->add_control(
		// 	'4subtitle', [
		// 		'label' 		=> __( 'CTA Subtitle', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' 		=> __( 'We Make Awesome IT Services For Your Newly Business' , 'webteck' ),
		// 		'rows' 			=> 2,
		// 		'label_block' 	=> true,
		// 	]
		// );
		// $this->add_control(
		// 	'4offer', [
		// 		'label' 		=> __( 'CTA Offer', 'webteck' ),
		// 		'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
		// 		'default' 		=> __( 'We Make Awesome IT Services For Your Newly Business' , 'webteck' ),
		// 		'rows' 			=> 2,
		// 		'label_block' 	=> true,
		// 	]
		// );
		
		// $this->add_control(
		// 	'4button_text',
		// 	[
		// 		'label' 		=> esc_html__( 'Button Text', 'webteck' ),
		// 		'type' 		=> \Elementor\Controls_Manager::TEXT,
		//         'default'  	=> esc_html__( 'Read Details', 'webteck' ),
		// 	]
		// );
		// $this->add_control(
		// 	'4button_link',
		// 	[
		// 		'label' 		=> esc_html__( 'Button Link', 'webteck' ),
		// 		'type' 		=> \Elementor\Controls_Manager::TEXT,
		//         'default'  	=> esc_html__( '#', 'webteck' ),
		// 	]
		// );
  //       $this->end_controls_section();





        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one'], '--white-color' );
		webteck_all_elementor_style($this, 'Title ', '{{WRAPPER}} .title-selector',['layout_one'], '--title-color' );

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

        	$phone      = $settings['phone'];


	        $replace        = array(' ','-',' - ');
	        $with           = array('','','');

	        $phoneurl       = str_replace( $replace, $with, $phone );

        	echo '<section class="overflow-hidden">';
		        echo '<div class="container th-container4">';
		            echo '<div class="cta-sec6 bg-theme background-image" data-bg-src="'.esc_url( $settings['bg']['url'] ).'">';
		                echo '<div class="cta-content">';
		                    echo '<div class="cta-wrapper">';
		                    	if( ! empty( $settings['phone_icon']['url'] ) ){
			                        echo '<div class="cta-icon">';
			                            echo '<a href="'.esc_attr( 'tel:'.$phoneurl ).'"><img src="'.esc_url( $settings['phone_icon']['url'] ).'" alt=""></a>';
			                        echo '</div>';
			                    }
		                        echo '<div class="media-body">';
		                            echo '<span class="header-info_label text-white ">'.esc_html( $settings['phone_label'] ).'</span>';
		                            echo '<p class="header-info_link"><a href="'.esc_attr( 'tel:'.$phoneurl ).'">'.esc_html( $settings['phone'] ).'</a></p>';
		                        echo '</div>';
		                    echo '</div>';
		                    echo '<div class="title-area mb-0">';
		                        echo '<h4 class="sec-title text-white title-selector">'.esc_html( $settings['title'] ).'</h4>';
		                    echo '</div>';
		                    echo '<div class="cta-group">';
		                        echo '<a href="'.esc_url( $settings['button_link'] ).'" class="th-btn th-border style-radius">'.esc_html( $settings['button_text'] ).'</a>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="footer-top">';
                echo '<div class="row gx-0 align-items-center">';
                    echo '<div class="col-xl">';
                        echo '<div class="footer-newsletter">';
                            echo '<div class="footer-newsletter-content">';
                                echo '<h2 class="newsletter-title">'.esc_html( $settings['title3'] ).'</h2>';
                            echo '</div>';
                            echo '<form class="newsletter-form">';
                                echo '<i class="fa-sharp fa-light fa-envelope"></i>';
                                echo '<input class="form-control" type="email" placeholder="'.esc_attr( $settings['placeholder'] ).'" required="">';
                                echo '<button type="submit" class="th-btn">'.esc_html( $settings['btn'] ).'</button>';
                            echo '</form>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }
	}
}