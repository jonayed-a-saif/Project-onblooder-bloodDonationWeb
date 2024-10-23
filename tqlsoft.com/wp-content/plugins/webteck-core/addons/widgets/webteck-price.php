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
 * Price Box Widget .
 *
 */
class Konsal_Price extends Widget_Base {

	public function get_name() {
		return 'webteckprice';
	}

	public function get_title() {
		return __( 'Price', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'priced_section',
			[
				'label' 	=> __( 'Price', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Price Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  		=> __( 'Style three', 'webteck' ),
				]
			]
		);
		$this->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
		         'condition'	=> ['layout_style' => ['layout_two','layout_three']]
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		        'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
		        'condition'	=> ['layout_style' => ['layout_two','layout_three']]
			]
		);
		$this->add_control(
			'desc',
			[
				'label'     => __( 'Description', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		        'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
		        'condition'	=> ['layout_style' => ['layout_two','layout_three']]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
			]
		);
		$repeater->add_control(
			'price',
			[
				'label'     => __( 'Price', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 3,
		         'default'  	=> esc_html__( '$55/Per Month', 'webteck' ),
			]
		);
		$repeater->add_control(
			'badge',
			[
				'label'     => __( 'Badge Text', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 3,
		         'default'  	=> esc_html__( '$55/Per Month', 'webteck' ),
			]
		);	

		$repeater->add_control(
			'features', [
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'default' 		=> __( '12 Hour Session' , 'webteck' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'webteck' ),
		        'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
			]
		);

		$repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
			]
		);

		$this->add_control(
			'price_list',
			[
				'label' 		=> __( 'Price List', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
				'condition'	=> ['layout_style' => ['layout_one']]
			]
		);
		
        $this->end_controls_section();


        $this->start_controls_section(
			'priced_section_year',
			[
				'label' 	=> __( 'Yearly', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'	=> ['layout_style' => ['layout_two','layout_three']]
			]
        );
        $this->add_control(
			'y_title',
			[
				'label'     => __( 'Year Title', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Yearly', 'webteck' ),
			]
		);
		$this->add_control(
			'save',
			[
				'label'     => __( 'Save Text', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		         'default'  	=> esc_html__( '35%', 'webteck' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::WYSIWYG,
		         'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
			]
		);
		$repeater->add_control(
			'price',
			[
				'label'     => __( 'Price', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 3,
		         'default'  	=> esc_html__( '$55/Per Month', 'webteck' ),
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label'     => __( 'Description', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Perfect plan to get started', 'webteck' ),
			]
		);
		$repeater->add_control(
			'badge',
			[
				'label'     => __( 'Badge Text', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 3,
		         'default'  	=> esc_html__( '$55/Per Month', 'webteck' ),
			]
		);	

		$repeater->add_control(
			'features', [
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'default' 		=> __( '12 Hour Session' , 'webteck' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'webteck' ),
		        'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
			]
		);

		$repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
			]
		);

		$this->add_control(
			'price_list2',
			[
				'label' 		=> __( 'Price List', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
			]
		);
		
		
        $this->end_controls_section();

        $this->start_controls_section(
			'priced_section_month',
			[
				'label' 	=> __( 'Monthly', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
				'condition'	=> ['layout_style' => ['layout_two','layout_three']]
			]
        );
        $this->add_control(
			'm_title',
			[
				'label'     => __( 'Month Title', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Monthly', 'webteck' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::WYSIWYG,
		         'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
			]
		);
		$repeater->add_control(
			'subtitle',
			[
				'label'     => __( 'Subtitle', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Basic Plan', 'webteck' ),
			]
		);
		$repeater->add_control(
			'price',
			[
				'label'     => __( 'Price', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 3,
		         'default'  	=> esc_html__( '$55/Per Month', 'webteck' ),
			]
		);
		$repeater->add_control(
			'desc',
			[
				'label'     => __( 'Description', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 2,
		         'default'  	=> esc_html__( 'Perfect plan to get started', 'webteck' ),
			]
		);
		$repeater->add_control(
			'badge',
			[
				'label'     => __( 'Badge Text', 'webteck' ),
		        'type'      => \Elementor\Controls_Manager::TEXTAREA,
		        'rows' 		=> 3,
		         'default'  	=> esc_html__( '$55/Per Month', 'webteck' ),
			]
		);	

		$repeater->add_control(
			'features', [
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'default' 		=> __( '12 Hour Session' , 'webteck' ),
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label' 	=> esc_html__( 'Button Text', 'webteck' ),
		        'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Choose Plan', 'webteck' ),
			]
		);

		$repeater->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
			]
		);

		$this->add_control(
			'price_list3',
			[
				'label' 		=> __( 'Price List', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
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

		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one'], '--white-color' );
		webteck_all_elementor_style($this, 'Title ', '{{WRAPPER}} .title-selector',['layout_two','layout_three'], '--theme-color' );
		webteck_all_elementor_style($this, 'Subtitle', '{{WRAPPER}} .subtitle-selector',['layout_one'], '--white-color' );
		webteck_all_elementor_style($this, 'Subtitle ', '{{WRAPPER}} .subtitle-selector',['layout_two','layout_three'], '--title-color' );


        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="row gy-4 justify-content-center">';
                $i = 0;
        		foreach( $settings['price_list'] as $data ) {  
        			$i++;

        			$active_class = $i == 2 ? 'active' : '';

	                echo '<div class="col-xl-4 col-md-6">';
	                    echo '<div class="price-box th-ani '.esc_attr( $active_class ).'">';
	                    	if( !empty( $data['title'] ) ){
		                        echo '<h3 class="box-title title-selector">'.esc_html($data['title']).'</h3>';
		                    }
		                    if( !empty( $data['badge'] ) ){
		                        echo '<span class="offer-tag">'.esc_html($data['badge']).'</span>';
		                    }
		                    if( !empty( $data['price'] ) ){
		                        echo '<h4 class="price-box_price">'.wp_kses_post( $data['price'] ).'</h4>';
		                    }
		                    if( !empty( $data['subtitle'] ) ){
		                        echo '<h6 class="price-box_text">'.esc_html($data['subtitle']).'</h6>';
		                    }
	                        echo '<div class="price-box_content">';
	                        	if( !empty( $data['features'] ) ){
		                            echo '<div class="available-list">';
		                                
		                            echo wp_kses_post( $data['features'] );

		                            echo '</div>';
		                        }
		                        if( !empty( $data['button_link'] ) ){
		                            echo '<a href="'.esc_url($data['button_link']).'" class="th-btn btn-fw style-radius">'.esc_html($data['button_text']).'</a>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
        	
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="container th-container4">';
	            echo '<div class="title-area text-center">';
	                echo '<span class="sub-title title-selector">';
	                    echo esc_html( $settings['title'] );
	                echo '</span>';
	                echo '<h2 class="sec-title subtitle-selector">'.esc_html( $settings['subtitle'] ).'</h2>';
	                echo '<p>'.esc_html( $settings['desc'] ).'</p>';
	                echo '<div class="pricing-tabs">';
	                    echo '<div class="switch-area">';
	                    	if( !empty( $settings['m_title'] ) ){
		                        echo '<label class="toggler toggler--is-active ms-0" id="filt-monthly">'.esc_html( $settings['m_title'] ).'</label>';
		                    }
	                        echo '<div class="toggle">';
	                            echo '<input type="checkbox" id="switcher" class="check">';
	                            echo '<b class="b switch"></b>';
	                        echo '</div>';
	                        if( !empty( $settings['y_title'] ) ){
		                        echo '<label class="toggler" id="filt-yearly">'.esc_html( $settings['y_title'] ).'</label>';
		                    }
	                    echo '</div>';
	                    if( !empty( $settings['save'] ) ){
		                    echo '<div class="discount-tag">';
		                    	echo '<svg width="54" height="41" viewBox="0 0 54 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5389 7.99353C15.4629 8.44111 15.3952 8.82627 15.3583 9.02966C15.1309 10.2666 14.942 13.4078 14.062 15.5433C13.3911 17.1727 12.3173 18.2233 10.6818 17.8427C9.19525 17.4967 8.26854 16.0251 7.82099 13.9916C6.85783 9.61512 8.00529 2.6265 8.90147 0.605294C8.99943 0.384693 9.25826 0.284942 9.48075 0.382666C9.70224 0.479891 9.80333 0.737018 9.70537 0.957619C8.84585 2.89745 7.75459 9.6061 8.67913 13.8076C9.04074 15.4498 9.68015 16.7144 10.881 16.9937C12.0661 17.2698 12.7622 16.3933 13.2485 15.2121C14.1054 13.134 14.273 10.0757 14.4938 8.87118C14.6325 8.11613 15.0798 5.22149 15.1784 4.9827C15.3016 4.68358 15.5573 4.69204 15.641 4.70108C15.7059 4.708 16.0273 4.76322 16.0423 5.15938C16.2599 10.808 20.5327 19.3354 26.8096 25.0475C33.0314 30.7095 41.2522 33.603 49.4783 28.0026C49.6784 27.8669 49.9521 27.9178 50.0898 28.1157C50.2269 28.3146 50.1762 28.5863 49.9762 28.7219C41.3569 34.5897 32.7351 31.6217 26.217 25.6902C20.7234 20.6913 16.7462 13.5852 15.5389 7.99353Z" fill="var(--theme-color)" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M49.2606 28.5952C48.2281 28.5096 47.1974 28.4571 46.1708 28.2919C43.4358 27.8522 40.6863 26.8206 38.4665 25.1551C38.2726 25.0089 38.2345 24.7355 38.3799 24.5438C38.5267 24.3517 38.8021 24.3145 38.9955 24.4592C41.1013 26.0411 43.7143 27.0136 46.3092 27.4305C47.4844 27.6191 48.6664 27.6581 49.8489 27.7714C49.9078 27.7778 50.4232 27.8114 50.53 27.8482C50.7793 27.9324 50.8288 28.1252 50.8402 28.2172C50.8506 28.2941 50.8446 28.3885 50.7944 28.4939C50.7528 28.5801 50.6349 28.7253 50.4357 28.886C49.7992 29.4029 48.1397 30.3966 47.8848 30.5884C44.9622 32.7862 42.6161 35.3187 40.0788 37.9235C39.9097 38.0958 39.6311 38.1004 39.4566 37.9332C39.2821 37.766 39.2778 37.49 39.4459 37.3172C42.0151 34.6792 44.3946 32.1179 47.353 29.8939C47.5278 29.7615 48.5366 29.0813 49.2606 28.5952Z" fill="var(--theme-color)" />
                        </svg>';
		                        echo esc_html( $settings['save'] );
		                    echo '</div>';
		                }
	                echo '</div>';
	            echo '</div>';
	           echo ' <div id="monthly" class="wrapper-full">';
	                echo '<div class="row justify-content-center">';



	                    foreach( $settings['price_list3'] as $data ) {  
		                    echo '<div class="col-xl-4 col-md-6">';
		                        echo '<div class="price-box style2 th-ani">';
		                        	if( !empty( $data['badge'] ) ){
			                        	echo '<span class="offer-tag"><span class="tag">'.wp_kses_post( $data['badge'] ).'</span></span>';
			                        }

		                        	if( !empty( $data['title'] ) ){
			                            echo wp_kses_post( $data['title'] );
			                        }
			                        if( !empty( $data['subtitle'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['subtitle']).'</p>';
			                        }
			                        if( !empty( $data['price'] ) ){
				                        echo '<h4 class="price-box_price">'.wp_kses_post( $data['price'] ).'</h4>';
				                    }
				                    if( !empty( $data['desc'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['desc']).'</p>';
			                        }
		                            echo '<div class="price-box_content">';
		                                
	                                   if( !empty( $data['features'] ) ){
				                            echo '<div class="available-list">';
				                                
				                            echo wp_kses_post( $data['features'] );

				                            echo '</div>';
				                        } 
				                        if( !empty( $data['button_link'] ) ){
			                                echo '<a href="'.esc_url($data['button_link']).'" class="th-btn btn-fw style-radius">'.esc_html($data['button_text']).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                }

	                    

	                echo '</div>';
	            echo '</div>';
	            echo '<div id="yearly" class="wrapper-full hide">';
	                echo '<div class="row justify-content-center">';


	                	foreach( $settings['price_list2'] as $data ) {  
		                    echo '<div class="col-xl-4 col-md-6">';
		                        echo '<div class="price-box style2 th-ani">';
		                        	if( !empty( $data['badge'] ) ){
			                        	echo '<span class="offer-tag"><span class="tag">'.wp_kses_post( $data['badge'] ).'</span></span>';
			                        }

		                        	if( !empty( $data['title'] ) ){
			                            echo wp_kses_post( $data['title'] );
			                        }
			                        if( !empty( $data['subtitle'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['subtitle']).'</p>';
			                        }
			                        if( !empty( $data['price'] ) ){
				                        echo '<h4 class="price-box_price">'.wp_kses_post( $data['price'] ).'</h4>';
				                    }
				                    if( !empty( $data['desc'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['desc']).'</p>';
			                        }
		                            echo '<div class="price-box_content">';
		                                
	                                   if( !empty( $data['features'] ) ){
				                            echo '<div class="available-list">';
				                                
				                            echo wp_kses_post( $data['features'] );

				                            echo '</div>';
				                        } 
				                        if( !empty( $data['button_link'] ) ){
			                                echo '<a href="'.esc_url($data['button_link']).'" class="th-btn btn-fw style-radius">'.esc_html($data['button_text']).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                }

	                    
	                echo '</div>';
	            echo '</div>';
	       	echo ' </div>';
	    }else{
	    	echo '<div class="container th-container4">';
	            echo '<div class="title-area text-center">';
	                echo '<span class="sub-title sub-title2 title-selector">';
	                    echo esc_html( $settings['title'] );
	                echo '</span>';
	                echo '<h2 class="sec-title  subtitle-selector">'.esc_html( $settings['subtitle'] ).'</h2>';
	                echo '<p>'.esc_html( $settings['desc'] ).'</p>';
	                echo '<div class="pricing-tabs style3">';
	                    echo '<div class="switch-area">';
	                    	if( !empty( $settings['m_title'] ) ){
		                        echo '<label class="toggler toggler--is-active ms-0" id="filt-monthly">'.esc_html( $settings['m_title'] ).'</label>';
		                    }
	                        echo '<div class="toggle">';
	                            echo '<input type="checkbox" id="switcher" class="check">';
	                            echo '<b class="b switch"></b>';
	                        echo '</div>';
	                        if( !empty( $settings['y_title'] ) ){
		                        echo '<label class="toggler" id="filt-yearly">'.esc_html( $settings['y_title'] ).'</label>';
		                    }
	                    echo '</div>';
	                    if( !empty( $settings['save'] ) ){
		                    echo '<div class="discount-tag">';
		                    	echo '<svg width="54" height="41" viewBox="0 0 54 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.5389 7.99353C15.4629 8.44111 15.3952 8.82627 15.3583 9.02966C15.1309 10.2666 14.942 13.4078 14.062 15.5433C13.3911 17.1727 12.3173 18.2233 10.6818 17.8427C9.19525 17.4967 8.26854 16.0251 7.82099 13.9916C6.85783 9.61512 8.00529 2.6265 8.90147 0.605294C8.99943 0.384693 9.25826 0.284942 9.48075 0.382666C9.70224 0.479891 9.80333 0.737018 9.70537 0.957619C8.84585 2.89745 7.75459 9.6061 8.67913 13.8076C9.04074 15.4498 9.68015 16.7144 10.881 16.9937C12.0661 17.2698 12.7622 16.3933 13.2485 15.2121C14.1054 13.134 14.273 10.0757 14.4938 8.87118C14.6325 8.11613 15.0798 5.22149 15.1784 4.9827C15.3016 4.68358 15.5573 4.69204 15.641 4.70108C15.7059 4.708 16.0273 4.76322 16.0423 5.15938C16.2599 10.808 20.5327 19.3354 26.8096 25.0475C33.0314 30.7095 41.2522 33.603 49.4783 28.0026C49.6784 27.8669 49.9521 27.9178 50.0898 28.1157C50.2269 28.3146 50.1762 28.5863 49.9762 28.7219C41.3569 34.5897 32.7351 31.6217 26.217 25.6902C20.7234 20.6913 16.7462 13.5852 15.5389 7.99353Z" fill="var(--theme-color)" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M49.2606 28.5952C48.2281 28.5096 47.1974 28.4571 46.1708 28.2919C43.4358 27.8522 40.6863 26.8206 38.4665 25.1551C38.2726 25.0089 38.2345 24.7355 38.3799 24.5438C38.5267 24.3517 38.8021 24.3145 38.9955 24.4592C41.1013 26.0411 43.7143 27.0136 46.3092 27.4305C47.4844 27.6191 48.6664 27.6581 49.8489 27.7714C49.9078 27.7778 50.4232 27.8114 50.53 27.8482C50.7793 27.9324 50.8288 28.1252 50.8402 28.2172C50.8506 28.2941 50.8446 28.3885 50.7944 28.4939C50.7528 28.5801 50.6349 28.7253 50.4357 28.886C49.7992 29.4029 48.1397 30.3966 47.8848 30.5884C44.9622 32.7862 42.6161 35.3187 40.0788 37.9235C39.9097 38.0958 39.6311 38.1004 39.4566 37.9332C39.2821 37.766 39.2778 37.49 39.4459 37.3172C42.0151 34.6792 44.3946 32.1179 47.353 29.8939C47.5278 29.7615 48.5366 29.0813 49.2606 28.5952Z" fill="var(--theme-color)" />
                        </svg>';
		                        echo esc_html( $settings['save'] );
		                    echo '</div>';
		                }
	                echo '</div>';
	            echo '</div>';
	           echo ' <div id="monthly" class="wrapper-full">';
	                echo '<div class="row justify-content-center">';



	                    foreach( $settings['price_list3'] as $data ) {  
		                    echo '<div class="col-xl-4 col-md-6">';
		                        echo '<div class="price-box style3 th-ani">';
		                        	if( !empty( $data['badge'] ) ){
			                        	echo '<span class="offer-tag"><span class="tag">'.wp_kses_post( $data['badge'] ).'</span></span>';
			                        }

		                        	if( !empty( $data['title'] ) ){
			                            echo wp_kses_post( $data['title'] );
			                        }
			                        if( !empty( $data['subtitle'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['subtitle']).'</p>';
			                        }
			                        if( !empty( $data['price'] ) ){
				                        echo '<h4 class="price-box_price">'.wp_kses_post( $data['price'] ).'</h4>';
				                    }
				                    if( !empty( $data['desc'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['desc']).'</p>';
			                        }
		                            echo '<div class="price-box_content">';
		                                
	                                   if( !empty( $data['features'] ) ){
				                            echo '<div class="available-list">';
				                                
				                            echo wp_kses_post( $data['features'] );

				                            echo '</div>';
				                        } 
				                        if( !empty( $data['button_link'] ) ){
			                                echo '<a href="'.esc_url($data['button_link']).'" class="th-btn btn-gradient btn-fw style-radius">'.esc_html($data['button_text']).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                }

	                    

	                echo '</div>';
	            echo '</div>';
	            echo '<div id="yearly" class="wrapper-full hide">';
	                echo '<div class="row justify-content-center">';


	                	foreach( $settings['price_list2'] as $data ) {  
		                    echo '<div class="col-xl-4 col-md-6">';
		                        echo '<div class="price-box style3 th-ani">';
		                        	if( !empty( $data['badge'] ) ){
			                        	echo '<span class="offer-tag"><span class="tag">'.wp_kses_post( $data['badge'] ).'</span></span>';
			                        }

		                        	if( !empty( $data['title'] ) ){
			                            echo wp_kses_post( $data['title'] );
			                        }
			                        if( !empty( $data['subtitle'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['subtitle']).'</p>';
			                        }
			                        if( !empty( $data['price'] ) ){
				                        echo '<h4 class="price-box_price">'.wp_kses_post( $data['price'] ).'</h4>';
				                    }
				                    if( !empty( $data['desc'] ) ){
			                            echo '<p class="price-box_text">'.esc_html($data['desc']).'</p>';
			                        }
		                            echo '<div class="price-box_content">';
		                                
	                                   if( !empty( $data['features'] ) ){
				                            echo '<div class="available-list">';
				                                
				                            echo wp_kses_post( $data['features'] );

				                            echo '</div>';
				                        } 
				                        if( !empty( $data['button_link'] ) ){
			                                echo '<a href="'.esc_url($data['button_link']).'" class="th-btn btn-gradient btn-fw style-radius">'.esc_html($data['button_text']).'</a>';
			                            }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                }

	                    
	                echo '</div>';
	            echo '</div>';
	       echo ' </div>';
	    }
	}
}