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
 * Banner Box Widget .
 *
 */
class Webteck_Banner extends Widget_Base {

	public function get_name() {
		return 'webteckbanner';
	}

	public function get_title() {
		return __( 'Webteck Banner v2', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'bannerd_section',
			[
				'label' 	=> __( 'Banner', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Banner Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  		=> __( 'Style Three', 'webteck' ),
				]
			]
		);
		
		
        $this->end_controls_section();


	    include webteck_get_elementor_option('banner-three-options.php');
	    include webteck_get_elementor_option('banner-four-options.php');
	    include webteck_get_elementor_option('banner-five-options.php');



	

        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);
		webteck_all_elementor_style($this, 'Subtitle', '{{WRAPPER}} .banner-subtitle',['layout_one','layout_two'], '--white-color' );
		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .banner-title',['layout_one','layout_two','layout_three'], '--white-color' );

		// webteck_all_elementor_style($this, 'Subtitle ', '{{WRAPPER}} .banner-subtitle',['layout_two'], 'color' );
		// webteck_all_elementor_style($this, 'Title ', '{{WRAPPER}} .banner-title',['layout_two'], 'color' );


		// webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .banner-desc',['layout_two',], 'color' );
		webteck_all_elementor_style($this, 'Description ', '{{WRAPPER}} .banner-desc',['layout_one',], '--white-color' );

        $this->end_controls_section();

        $this->start_controls_section(
		    'button_style_section',
		    [
		        'label' => __( 'Button Style', 'webteck' ),
		        'tab'   => Controls_Manager::TAB_STYLE,
		    ]
		);

			webteck_elementor_typography_style($this, 'Button', '{{WRAPPER}} .th-btn', ['layout_two','layout_three']);

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

					webteck_elementor_color_style($this, 'Button Text', '{{WRAPPER}} .th-btn', ['layout_one' , 'layout_two', 'layout_three']);
					webteck_elementor_color_style($this, 'Background', '{{WRAPPER}} .th-btn', ['layout_one' , 'layout_two', 'layout_three'], 'background-color');
					webteck_elementor_border_style($this, 'Button', '{{WRAPPER}} .th-btn', ['layout_one' , 'layout_two', 'layout_three']);

				$this->end_controls_tab();

				// Second Tab: Hover
				$this->start_controls_tab(
				    'sec_style_tab',
				    [
				        'label' => esc_html__( 'Hover', 'webteck' ),
				    ]
				);

					webteck_elementor_color_style($this, 'Button Text Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one' , 'layout_two', 'layout_three']);
					webteck_elementor_color_style($this, 'Background Hover', '{{WRAPPER}} .th-btn:before, {{WRAPPER}} .th-btn:after', ['layout_one' , 'layout_two', 'layout_three'], 'background-color');
					webteck_elementor_border_style($this, 'Button Hover', '{{WRAPPER}} .th-btn:hover', ['layout_one' , 'layout_two', 'layout_three']);

				$this->end_controls_tab();

			$this->end_controls_tabs();
		$this->end_controls_section();
       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="th-hero-wrapper hero-5" id="hero">';
		        echo '<div class="hero-inner">';
		            echo '<div class="th-hero-bg" data-bg-src="'.esc_url( $settings['img5']['url'] ).'">';
		            echo '</div>';
		            echo '<div class="container th-container5">';
		                echo '<div class="hero-style5">';
		                    echo '<span class="sub-title style1 text-white banner-subtitle">'.esc_html( $settings['title5'] ).'</span>';
                            echo '<h1 class="hero-title text-white banner-title">'.esc_html( $settings['subtitle5'] ).'</h1>';
                            echo '<p class="hero-text text-white banner-desc">'.esc_html( $settings['desc5'] ).'</p>';
                            if( !empty( $settings['button_link5'] ) ){
                                echo '<div class="btn-group mt-40 justify-content-center justify-content-lg-start">';
                                    echo '<a href="'.esc_url($settings['button_link5']).'" class="th-btn style6 style-radius">'.esc_html($settings['button_text5']).'</a>';
                                echo '</div>';
                            }
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="th-hero-wrapper hero-6" id="hero">'; ?>
		        <div class="swiper th-slider" id="heroSlide3" data-slider-options='{"effect":"fade"}'><?php
		            echo '<div class="swiper-wrapper">';
		                
		            	foreach( $settings['banners3'] as $data ) { 
			                echo '<div class="swiper-slide">';
			                    echo '<div class="hero-inner">';
			                        echo '<div class="th-hero-bg" data-bg-src="'.esc_url( $data['img']['url'] ).'">';
			                            echo '<img src="'.esc_url( $settings['overlay']['url'] ).'" alt="Hero Image">';
			                        echo '</div>';
			                        echo '<div class="container">';
			                            echo '<div class="hero-style6">';
			                                echo '<span class="sub-title banner-subtitle" data-ani="slideinup" data-ani-delay="0.5s">'.esc_html( $data['title'] ).'</span>';
			                                echo '<h1 class="hero-title banner-title" data-ani="slideinup" data-ani-delay="0.6s">'.esc_html( $data['subtitle'] ).'</h1>';
			                                echo '<div class="hero-big"><h1 class="hero-big_text">'.esc_html( $data['shadow'] ).'</h1></div>';
			                                echo '<div class="btn-group justify-content-center">';
			                                	echo '<div class="" data-ani="slideinleft" data-ani-delay="0.8s">';
			                                	if( !empty( $data['button_link'] ) ){
				                                    echo '<a href="'.esc_url($data['button_link']).'" class="th-btn style3 style-radius">'.esc_html($data['button_text']).'</a>';
				                                }
				                                echo '</div>';
				                                if( !empty( $data['video_link'] ) ){
				                                    echo '<div class="call-btn" data-ani="slideinright" data-ani-delay="0.9s">';
				                                        echo '<a href="'.esc_url($data['video_link']).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
				                                        echo '<div class="media-body"><a href="'.esc_url($data['video_link']).'" class="btn-title popup-video">'.esc_html($data['video_text']).'</a></div>';
				                                    echo '</div>';
				                                }
			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		        echo '</div>';
		        echo '<button data-slider-prev="#heroSlide3" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
		        echo '<button data-slider-next="#heroSlide3" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
		    echo '</div>';
	    }else{
	    	echo '<div class="th-hero-wrapper hero-12" id="hero" data-bg-src="'.esc_url( $settings['overlay2']['url'] ).'">';
		        echo '<div class="swiper th-slider" id="heroSlide3" data-slider-options=\'{"effect":"fade"}\'>';
		            echo '<div class="swiper-wrapper">';
		            	foreach( $settings['banners5'] as $data ) {
			                echo '<div class="swiper-slide">';
			                    echo '<div class="hero-inner">';
			                        echo '<div class="container th-container4">';
			                            echo '<div class="hero-style12">';
			                                echo '<h1 class="hero-title banner-title" data-ani="slideinup" data-ani-delay="0.6s">'.wp_kses_post( $data['title'] ).'</h1>';
			                                echo '<div class="btn-group" data-ani="slideinup" data-ani-delay="0.9s">';
			                                	if( !empty( $data['button_link'] ) ){
				                                    echo '<a href="'.esc_url($data['button_link']).'" class="th-btn style3 style-radius text-capitalize">'.esc_html($data['button_text']).'</a>';
				                                }
				                                if( !empty( $data['button_link2'] ) ){
				                                    echo '<a href="'.esc_url($data['button_link2']).'" class="th-btn blue-border style-radius text-capitalize">'.esc_html($data['button_text2']).'</a>';
				                                }
			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                    echo '</div>';
			                    echo '<div class="th-hero-img">';
			                        echo '<img src="'.esc_url( $data['img']['url'] ).'" alt="">';
			                    echo '</div>';
			                echo '</div>';
			            }
		            echo '</div>';
		            echo '<div class="container th-container4">';
		                echo '<div class="row">';
		                    echo '<div class="col-12">';
		                        echo '<div class="hero-watch-area">';
		                            echo '<div class="btn-group justify-content-center justify-content-md-between">';
		                                echo '<div class="call-btn hero-btn">';
		                                	if( !empty( $settings['video_link'] ) ){
			                                    echo '<a href="'.esc_url($settings['video_link']).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
			                                    echo '<div class="media-body">';
			                                        echo '<a href="'.esc_url($settings['video_link']).'" class="btn-title popup-video">'.esc_html($settings['video_text']).'</a>';
			                                    echo '</div>';
			                                }
		                                echo '</div>';
		                                if( !empty( $settings['button_link'] ) ){
		                                    echo '<a href="'.esc_url($settings['button_link']).'" class="th-btn style5 style-radius text-capitalize">'.esc_html($settings['button_text']).'</a>';
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