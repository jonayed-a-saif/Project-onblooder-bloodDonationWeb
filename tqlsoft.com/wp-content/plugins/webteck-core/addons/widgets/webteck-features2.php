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
 * Features Box Widget .
 *
 */
class Webteck_Features extends Widget_Base {

	public function get_name() {
		return 'webteckfeatures';
	}

	public function get_title() {
		return __( 'Features v2', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'featuresd_section',
			[
				'label' 	=> __( 'Features', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Features Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  	=> __( 'Style Three', 'webteck' ),
					'layout_four'  		=> __( 'Style Four', 'webteck' ),
					'layout_five'  		=> __( 'Style Five', 'webteck' ),
					'layout_six'  		=> __( 'Style Six', 'webteck' ),
					'layout_seven'  		=> __( 'Style Seven', 'webteck' ),
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
			'content', [
				'label' 		=> __( 'Content', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 4,
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
			'url', [
				'label' 		=> __( 'URL', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '#' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);


		$this->add_control(
			'features',
			[
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> ['layout_style' => ['layout_two','layout_three','layout_five','layout_six']]
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
			'number', [
				'label' 		=> __( 'Number', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '01' , 'webteck' ),
				'rows' 			=> 4,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'content', [
				'label' 		=> __( 'Content', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Review and edit the content for accuracy, grammar, style....' , 'webteck' ),
				'rows' 			=> 4,
				'label_block' 	=> true,
			]
		);
		$this->add_control(
			'features2',
			[
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> ['layout_style' => ['layout_one']]
			]
		);

		$repeater3 = new \Elementor\Repeater();

		$repeater3->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater3->add_control(
			'content', [
				'label' 		=> __( 'Content', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 4,
				'label_block' 	=> true,
			]
		);

		$repeater3->add_control(
			'icon', [
				'label' 		=> __( 'Icon', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( '' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);


		$this->add_control(
			'features3',
			[
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater3->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> ['layout_style' => ['layout_four']]
			]
		);

		$repeater7 = new \Elementor\Repeater();

		$repeater7->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		
		$repeater7->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);


		$this->add_control(
			'features7',
			[
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater7->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> ['layout_style' => ['layout_seven']]
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

		
		webteck_all_elementor_style($this, 'Title ', '{{WRAPPER}} .title-selector',['layout_one','layout_three','layout_four','layout_five','layout_six','layout_seven'], 'color' );
		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_two'], '--title-color' );
		webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .desc-selector',['layout_two','layout_three','layout_four','layout_five','layout_six'], '--body-color' );




        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="work-area">';
                echo '<h5 class="mb-30 text-white">'.esc_html( $settings['title'] ).'</h5>';
                echo '<div class="work-item_wrapper">';
                    foreach( $settings['features2'] as $data ) { 
	                    echo '<div class="work-item">';
	                        echo '<span class="work-item_number">'.esc_html( $data['number'] ).'</span>';
	                        echo '<p class="work-text title-selector">'.esc_html( $data['title'] ).'</p>';
	                    echo '</div>';
	                }
                    
                echo '</div>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="row gy-4 justify-content-center justify-content-lg-between">';
                foreach( $settings['features'] as $data ) { 
	                echo '<div class="col-lg-4 col-md-6">';
	                    echo '<div class="choose-feature">';
	                    	if( ! empty( $data['image']['url'] ) ){
				                echo '<div class="box-icon">';
				                    echo webteck_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
				                echo '</div>';
				            }
	                        echo '<div class="choose-feature_content">';
	                        	if( ! empty( $data['title'] ) ){
				                    echo '<h3 class="box-title title-selector">'.esc_html( $data['title'] ).'</h3>';
				                }
				                if( ! empty( $data['content'] ) ){
			                        echo '<p class="choose-feature_text desc-selector">'.esc_html( $data['content'] ).'</p>';
			                    }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
                
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_three' ){
	    	echo '<div class="row gy-4 justify-content-center">';
                foreach( $settings['features'] as $data ) { 
	                echo '<div class="col-xl-3 col-lg-4 col-md-6 feature-card-wrap2">';
	                    echo '<div class="feature-card style2">';
	                    	if( ! empty( $data['image']['url'] ) ){
		                        echo '<div class="feature-card-icon">';
		                            echo webteck_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
		                        echo '</div>';
		                    }
		                    if( ! empty( $data['title'] ) ){
		                        echo '<h3 class="box-title title-selector">'.esc_html( $data['title'] ).'</h3>';
		                    }
		                    if( ! empty( $data['content'] ) ){
		                        echo '<p class="feature-card_text desc-selector">'.esc_html( $data['content'] ).'</p>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            }
                

            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_four' ){
	    	foreach( $settings['features3'] as $data ) { 
		    	echo '<div class="about-feature style2">';
		    		if( ! empty( $data['icon'] ) ){
		                echo '<div class="about-feature_icon">';
		                    echo wp_kses_post( $data['icon'] );
		                echo '</div>';
		            }
	                echo '<div class="media-body">';
	                	if( ! empty( $data['title'] ) ){
		                    echo '<h3 class="about-feature_title title-selector">'.esc_html( $data['title'] ).'</h3>';
		                }
		                if( ! empty( $data['content'] ) ){
		                    echo '<p class="about-feature_text desc-selector">'.esc_html( $data['content'] ).'</p>';
		                }
	                echo '</div>';
	            echo '</div>';
	        }
	    }elseif( $settings['layout_style'] == 'layout_five' ){
	    	echo '<div class="slider-area">';
                echo '<div class="swiper th-slider has-shadow" id="serviceSlider7" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}},"loop":"false"}\'>';
                    echo '<div class="swiper-wrapper">';

                        foreach( $settings['features'] as $data ) { 
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="service-box7 th-ani">';
	                            	if( ! empty( $data['image']['url'] ) ){
		                                echo '<div class="service-box7_thumb">';
		                                    echo webteck_img_tag( array(
												'url'   => esc_url( $data['image']['url'] ),
											) );
		                                echo '</div>';
		                            }
	                                echo '<div class="service-box7_content">';
	                                	if( ! empty( $data['title'] ) ){
		                                    echo '<h3 class="box-title title-selector"><a href="'.esc_url( $data['url'] ).'">'.esc_html( $data['title'] ).'</a></h3>';
		                                }
		                                if( ! empty( $data['content'] ) ){
		                                    echo '<p class="service-box7_text desc-selector">'.esc_html( $data['content'] ).'</p>';
		                                }
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                        

                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_six' ){
	    	echo '<div class="feature-area3 overflow-hidden">';
		        echo '<div class="container th-container4">';
		            echo '<div class="choose-feature2-wrap">';

		                foreach( $settings['features'] as $data ) { 
			                echo '<div class="choose-feature2">';
			                	if( ! empty( $data['image']['url'] ) ){
				                    echo '<div class="box-icon">';
				                        echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
				                    echo '</div>';
				                }
			                    echo '<div class="choose-feature2_content">';
			                        if( ! empty( $data['title'] ) ){
	                                    echo '<h3 class="box-title title-selector">'.esc_html( $data['title'] ).'</h3>';
	                                }
	                                if( ! empty( $data['content'] ) ){
				                        echo '<p class="choose-feature2_text desc-selector">'.esc_html( $data['content'] ).'</p>';
				                    }
			                    echo '</div>';
			                echo '</div>';
			                echo '<div class="divider"></div>';
			            }
		            echo '</div>';
		       echo ' </div>';
		    echo '</div>';
	    }else{
	    	echo '<div class="nav nav-tabs appointment-tabs" id="nav-tab" role="tablist">';
	    		foreach( $settings['features7'] as $data ) { 
	                echo '<button class="nav-link title-selector"><img src="'.esc_url( $data['image']['url'] ).'" alt="">'.esc_html( $data['title'] ).'</button>';
	            }
                
            echo '</div>';
	    }
	}
}