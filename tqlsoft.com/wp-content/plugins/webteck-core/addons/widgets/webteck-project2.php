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
 * Project Box Widget .
 *
 */
class Webteck_Project extends Widget_Base {

	public function get_name() {
		return 'webteckprojects';
	}

	public function get_title() {
		return __( 'Project v2', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'projectsd_section',
			[
				'label' 	=> __( 'Project', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Project Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  		=> __( 'Style Three', 'webteck' ),
					'layout_four'  		=> __( 'Style Four', 'webteck' ),
				]
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
			'desc', [
				'label' 		=> __( 'Description', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Read Details', 'webteck' ),
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
			]
		);


		$this->add_control(
			'projects',
			[
				'label' 		=> __( 'Projects', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> ['layout_style' => ['layout_two']]
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
			'cat', [
				'label' 		=> __( 'Category', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Details Page', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
			]
		);
		$this->add_control(
			'projects2',
			[
				'label' 		=> __( 'Projects', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> ['layout_style' => ['layout_one','layout_three','layout_four']]
			]
		);
		$this->add_control(
			'shape',
			[
				'label' 		=> esc_html__( 'Shape Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style' => ['layout_four']]
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


		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one', 'layout_two'], '--white-color' );
		webteck_all_elementor_style($this, 'Title ', '{{WRAPPER}} .title-selector',['layout_three'], 'color' );
		webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .desc-selector',['layout_two'], '--body-color' );


        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="slider-area project-slider4">'; ?>
                <div class="swiper th-slider has-shadow" id="projectSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"2"}}}'> <?php
                    echo '<div class="swiper-wrapper">';

                    	foreach( $settings['projects2'] as $data ) { 
	                        echo '<!-- Single Item -->';
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="project-box4">';
	                            	if( ! empty( $data['image']['url'] ) ){
			                            echo '<div class="project-img">';
			                                echo webteck_img_tag( array(
												'url'   => esc_url( $data['image']['url'] ),
											) );
			                            echo '</div>';
			                        }
	                                echo '<div class="project-content">';
	                                    echo '<div class="media-body">';
	                                    	if( ! empty( $data['title'] ) ){
				                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
				                            }
	                                        echo '<div class="project-tags">';
	                                        echo wp_kses_post( $data['cat'] ); 

	                                        echo '</div>';
	                                    echo '</div>';

	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="slider-area">'; ?>
                <div class="swiper th-slider has-shadow" id="projectSlider1" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'> <?php
                    echo '<div class="swiper-wrapper">';

                    	foreach( $settings['projects'] as $data ) { 
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="project-card5">';
	                            	if( ! empty( $data['image']['url'] ) ){
			                            echo '<div class="project-img">';
			                                echo webteck_img_tag( array(
												'url'   => esc_url( $data['image']['url'] ),
											) );
			                            echo '</div>';
			                        }
	                                echo '<div class="project-content">';
	                                    if( ! empty( $data['title'] ) ){
			                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
			                            }
			                            if( ! empty( $data['desc'] ) ){
		                                    echo '<p class="desc-selector">'.esc_html( $data['desc'] ).'</p>';
		                                }
	                                    echo '<a href="'.esc_url( $data['button_link'] ).'" class="line-btn">'.esc_html( $data['button_text'] ).'<i class="far fa-arrow-right"></i></a>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#projectSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#projectSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_three' ){
	    	echo '<div class="slider-area">';
                echo '<div class="swiper th-slider has-shadow" id="projectSlider7" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}\'>';
                    echo '<div class="swiper-wrapper">';
                        foreach( $settings['projects2'] as $data ) { 
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="project-box style2">';
	                                if( ! empty( $data['image']['url'] ) ){
			                            echo '<div class="project-img">';
			                                echo webteck_img_tag( array(
												'url'   => esc_url( $data['image']['url'] ),
											) );
			                            echo '</div>';
			                        }
	                                echo '<div class="project-box_content">';
	                                	if( ! empty( $data['cat'] ) ){
		                                    echo '<p class="project-box_desc">'.esc_html( $data['cat'] ).'</p>';
		                                }
	                                    if( ! empty( $data['title'] ) ){
			                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
			                            }
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#projectSlider7" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#projectSlider7" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';
	    }else{
	    	echo '<div class="row gy-4 filter-active">';

                foreach( $settings['projects2'] as $data ) { 
	                echo '<div class="col-md-6 col-xxl-auto filter-item">';
	                    echo '<div class="project-card2">';
	                        if( ! empty( $data['image']['url'] ) ){
	                            echo '<div class="project-img">';
	                                echo webteck_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
	                            echo '</div>';
	                        }
	                        echo '<div class="project-content-wrap">';

	                        	$shape_iamge = $settings['shape']['url'] ? $settings['shape']['url'] : '#';

	                            echo '<div class="project-content" data-mask-src="'.esc_url( $shape_iamge ).'">';
	                            	if( ! empty( $data['cat'] ) ){
	                                    echo '<p class="project-subtitle">'.esc_html( $data['cat'] ).'</p>';
	                                }
	                                if( ! empty( $data['title'] ) ){
		                                echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['button_link'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
		                            }
	                                echo '<a href="'.esc_url( $data['image']['url'] ).'" class="icon-btn popup-image"><i class="fa-regular fa-magnifying-glass"></i></a>';
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }

                

            echo '</div>';
	    }
	}
}