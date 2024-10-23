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
 * Testimonials Box Widget .
 *
 */
class Webteck_Testimonials extends Widget_Base {

	public function get_name() {
		return 'webtecktestimonials';
	}

	public function get_title() {
		return __( 'Testimonials v2', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'testimonialsd_section',
			[
				'label' 	=> __( 'Testimonials', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Testimonials Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
				]
			]
		);

		//----------------------------------------------------------style 1----------------------------------------------------------//


		//----------------------------------------------------------style 2----------------------------------------------------------//

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
			'quote',
			[
				'label' 		=> esc_html__( 'Quote Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'webteck' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feedback', [
				'label' 		=> __( 'Feedback', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Customer' , 'webteck' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_image',
			[
				'label' 		=> esc_html__( 'Client Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'company_image',
			[
				'label' 		=> esc_html__( 'Company Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'2_testimonials',
			[
				'label' 		=> __( 'Testimonials', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'	=> ['layout_style' => ['layout_one']]
			]
		);


		//----------------------------------------------------------style 1----------------------------------------------------------//

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'webteck' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'feedback', [
				'label' 		=> __( 'Feedback', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Customer' , 'webteck' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'client_image',
			[
				'label' 		=> esc_html__( 'Client Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'1_testimonials',
			[
				'label' 		=> __( 'Testimonials', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'name' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
				'condition'	=> ['layout_style' => ['layout_two']]
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
		webteck_elementor_color_style($this, 'Box BG', '{{WRAPPER}} .testi-box5', ['layout_one'],'--white-color' );


		webteck_all_elementor_style($this, 'Secion Subtitle', '{{WRAPPER}} .subtitle-selector',['layout_one'],'--white-color' );
		webteck_all_elementor_style($this, 'Secion Title', '{{WRAPPER}} .title-selector',['layout_one'],'--white-color' );




		webteck_all_elementor_style($this, 'Name', '{{WRAPPER}} .title-selector',['layout_one','layout_one'], '--title-color' );


		webteck_all_elementor_style($this, 'Designation ', '{{WRAPPER}} .desig-selector',['layout_one'], '--theme-color' );
		webteck_all_elementor_style($this, 'Feedback ', '{{WRAPPER}} .feedback-selector',['layout_one'], '--body-color' );


        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<section class="overflow-hidden bg-top-center th-radius3 m-4 mt-0 mb-0 space arrow-wrap" id="testi-sec">';
		        echo '<div class="container th-container2">';
		            echo '<div class="row justify-content-lg-between justify-content-center align-items-end">';
		                echo '<div class="col-xxl-4 col-xl-6">';
		                    echo '<div class="title-area text-center text-lg-start">';
		                        echo '<span class="sub-title style1 text-white subtitle-selector">'.esc_html( $settings['title'] ).'</span>';
		                        echo '<h2 class="sec-title text-white title-selector">'.esc_html( $settings['subtitle'] ).'</h2>';
		                    echo '</div>';
		                echo '</div>';
		                echo '<div class="col-lg-auto d-none d-xl-block">';
		                    echo '<div class="sec-btn">';
		                        echo '<div class="icon-box">';
		                            echo '<button data-slider-prev="#testiSlider2" class="slider-arrow style2 default"><i class="far fa-arrow-left"></i></button>';
		                            echo '<button data-slider-next="#testiSlider2" class="slider-arrow style2 default"><i class="far fa-arrow-right"></i></button>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		            echo '<div class="slider-area">'; ?>
		                <div class="swiper th-slider has-shadow" id="testiSlider2" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'> <?php
		                    echo '<div class="swiper-wrapper">';

		                    	foreach( $settings['2_testimonials'] as $data ) {
			                        echo '<div class="swiper-slide">';
			                            echo '<div class="testi-box5 th-ani">';
			                            	if( ! empty( $data['company_image']['url'] ) ){
				                                echo '<div class="testi-box5_image">';
				                                    echo webteck_img_tag( array(
							                            'url'       => esc_url( $data['company_image']['url'] ),
							                        ) );
				                                echo '</div>';
				                            }
				                            if( ! empty( $data['feedback']) ){
				                                echo '<p class="testi-box5_text feedback-selector">'.esc_html($data['feedback']).'</p>';
				                            }
			                                echo '<div class="testi-box5_wrapper">';
			                                    echo '<div class="testi-box5_profile">';
			                                    	if( ! empty( $data['client_image']['url'] ) ){
				                                        echo '<div class="testi-box5_author">';
				                                            echo webteck_img_tag( array(
									                            'url'       => esc_url( $data['client_image']['url'] ),
									                        ) );
				                                        echo '</div>';
				                                    }
			                                        echo '<div class="testi-box5_info">';
			                                            if( ! empty( $data['name']) ){
					                                        echo '<h3 class="box-title title-selector">'.esc_html($data['name']).'</h3>';
					                                    }
					                                    if( ! empty( $data['designation']) ){
					                                        echo '<span class="testi-box5_desig desig-selector">'.esc_html($data['designation']).'</span>';
					                                    }
			                                        echo '</div>';
			                                    echo '</div>';
			                                    if( ! empty( $settings['quote']['url'] ) ){
				                                    echo '<div class="testi-quote">';
				                                       	echo webteck_img_tag( array(
								                            'url'       => esc_url( $settings['quote']['url'] ),
								                        ) );
				                                    echo '</div>';
				                                }
			                                echo '</div>';
			                            echo '</div>';
			                        echo '</div>';
			                    }
		                    echo '</div>';
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
	    }else{
	    	echo '<div class="slider-area testi-grid2-area">';
                echo '<div class="testi-indicator">'; ?>
                    <div class="swiper th-slider testi-grid2-thumb" data-slider-options='{"effect":"slide","slidesPerView":"5","spaceBetween":13,"loop":true,"breakpoints":{"0":{"slidesPerView":4},"576":{"slidesPerView":"5"}}}' data-slider-tab="#testiSlide1"> <?php
                        echo '<div class="swiper-wrapper">';
                            foreach( $settings['1_testimonials'] as $data ) {
	                            echo '<div class="swiper-slide">';
	                                if( ! empty( $data['client_image']['url'] ) ){
				                        echo '<div class="box-img">';
				                            echo webteck_img_tag( array(
					                            'url'       => esc_url( $data['client_image']['url'] ),
					                        ) );
				                        echo '</div>';
				                    }
	                            echo '</div>';
	                        }
                        echo '</div>';
                    echo '</div>';
                echo '</div>'; ?>
                <div class="swiper th-slider" id="testiSlide7" data-slider-options='{"effect":"slide","loop":true,"thumbs":{"swiper":".testi-grid2-thumb"},"breakpoints":{"0":{"autoHeight":true},"576":{"autoHeight":false}}}'><?php
                    echo '<div class="swiper-wrapper">';

                    	foreach( $settings['1_testimonials'] as $data ) {
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="testi-card2">';
	                            	if( ! empty( $data['feedback']) ){
		                                echo '<p class="testi-card2_text feedback-selector">'.esc_html($data['feedback']).'</p>';
		                            }
	                                echo '<div class="testi-card2_profile">';
	                                    echo '<div class="testi-card2_content">';
	                                    	if( ! empty( $data['name']) ){
		                                        echo '<h3 class="box-title title-selector">'.esc_html($data['name']).'</h3>';
		                                    }
		                                    if( ! empty( $data['designation']) ){
		                                        echo '<span class="testi-card2_desig desig-selector">'.esc_html($data['designation']).'</span>';
		                                    }
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';

	                        echo '</div>';
	                    }
                    echo '</div>';
                    echo '<button data-slider-prev="#testiSlide1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                    echo '<button data-slider-next="#testiSlide1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
                echo '</div>';
                echo '<div class="testi-line"></div>';
            echo '</div>';
	    }
	}
}