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
 * Feature Box Widget .
 *
 */
class Webteck_Feature_v2 extends Widget_Base {

	public function get_name() {
		return 'webteckfeaturesv2';
	}

	public function get_title() {
		return __( 'Webteck Feature v3', 'webteck' );
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
				'label' 	=> __( 'Feature', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Feature Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					// '3' 		=> __( 'Style Three', 'webteck' ),
				],
			]
		);
		 $this->add_control(
			'heading',
			[
				'label' 	=> __( 'Section Heading', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Heading', 'webteck' ),
                'condition'	=> ['layout_style' => ['1']]
			]
        );
		$this->add_control(
			'title',
			[
				'label' 	=> __( 'Section Title', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'webteck' ),
                'condition'	=> ['layout_style' => ['1']]
			]
        );
        $this->add_control(
			'desc',
			[
				'label' 	=> __( 'Section Description', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'webteck' ),
                'condition'	=> ['layout_style' => ['1']]
			]
        );
        $this->add_control(
			'btn_text',
            [
				'label'         => __( 'Button Text', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Read More' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2',
				'condition'	=> ['layout_style' => ['1']]
			]
		);
		$this->add_control(
			'btn_url',
            [
				'label'         => __( 'Button URL', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '#' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2',
				'condition'	=> ['layout_style' => ['1']]
			]
		);
		$this->add_control(
			'shape',
			[
				'label' 		=> __( 'Shape Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);

        $repeater = new Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => __( 'Title', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Title Area', 'webteck' )
			]
        );
        $repeater->add_control(
			'content',
			[
				'label'     => __( 'Content', 'webteck' ),
                'type'      => Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Content Area', 'webteck' )
			]
        );
        $repeater->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'button_text',
            [
				'label'         => __( 'Button Text', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Read More' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2',
			]
		);
		$repeater->add_control(
			'button_link',
            [
				'label'         => __( 'Button URL', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '#' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2',
			]
		);
        $this->add_control(
			'features',
			[
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
				'condition'	=> ['layout_style' => ['1']]
			]
		);

		$repeater2 = new Repeater();

        $repeater2->add_control(
			'content',
			[
				'label'     => __( 'Content', 'webteck' ),
                'type'      => Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Content Area', 'webteck' )
			]
        );
        $repeater2->add_control(
			'image',
			[
				'label' 		=> __( 'Choose Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater2->add_control(
			'button_text',
            [
				'label'         => __( 'Button Text', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( 'Read More' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2',
			]
		);
		$repeater2->add_control(
			'button_link',
            [
				'label'         => __( 'Button URL', 'webteck' ),
				'type'          => Controls_Manager::TEXTAREA,
				'default'       => __( '#' , 'webteck' ),
				'label_block'   => true,
				'rows' 			=> '2',
			]
		);
        $this->add_control(
			'features2',
			[
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
				'condition'	=> ['layout_style' => ['2']]
			]
		);

        $this->end_controls_section();


        /*-----------------------------------------features styling------------------------------------*/

		$this->start_controls_section(
			'title_style_section',
			[
				'label' 	=> __( 'Title Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'overview_content_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-title'	=> 'color: {{VALUE}};',

				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .th-title',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'overview_content_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        /*-----------------------------------------features styling------------------------------------*/

		$this->start_controls_section(
			'contetnt_style_section',
			[
				'label' 	=> __( 'Content Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );
		$this->add_control(
			'webteck_content_color',
			[
				'label' 		=> __( 'Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'webteck_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} .th-desc',
			]
		);

        $this->add_responsive_control(
			'webteck_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'webteck_content_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .th-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        if ( $settings['layout_style'] == '1' ){

        	echo '<section class="process-area-3 overflow-hidden">';
		        echo '<div class="container th-container4">';
		            echo '<div class="title-area text-xl-start text-center">';
		            	if( ! empty( $settings['heading'] ) ){
			                echo '<span class="sub-title">'.esc_html( $settings['heading'] ).'</span>';
			            }
			            if( ! empty( $settings['title'] ) ){
			                echo '<h2 class="sec-title">'.esc_html( $settings['title'] ).'</h2>';
			            }
			            if( ! empty( $settings['desc'] ) ){
			                echo '<p class="sec-text mt-25">'.esc_html( $settings['desc'] ).'</p>';
			            }
			            if( ! empty( $settings['btn_url'] ) ){
			                echo '<a href="'.esc_url( $settings['btn_url'] ).'" class="th-btn style-radius">'.esc_html( $settings['btn_text'] ).'</a>';
			            }
		            echo '</div>';
		            echo '<div class="process-card-area3">';
		            	if( !empty( $settings['shape']['url'] ) ){
			                echo '<div class="process-line position-top">';
			                    echo webteck_img_tag( array(
									'url'   => esc_url( $settings['shape']['url'] ),
								) );
			                echo '</div>';
			            }
		                echo '<div class="row gy-40 justify-content-xl-between justify-content-center">';
		                	$x = 0;
		                	foreach( $settings['features'] as $data ) { 
		                		$x++;
                    			// $k = str_pad($x, 2, '0', STR_PAD_LEFT); 

			                    echo '<div class="col-md-6 col-xl-auto process-card-wrap">';
			                        echo '<div class="process-card style3">';
			                        	if( !empty( $data['image']['url'] ) ){
				                            echo '<div class="process-card_icon">';
				                                echo webteck_img_tag( array(
													'url'   => esc_url( $data['image']['url'] ),
												) );
				                            echo '</div>';
				                        }
			                            echo '<div class="process-card_number">'.esc_html( $x ).'</div>';
			                            if( ! empty( $data['title'] ) ){
				                            echo '<h2 class="box-title th-title">'.esc_html( $data['title'] ).'</h2>';
				                        }
				                        if( ! empty( $data['content'] ) ){
				                            echo '<p class="process-card_text th-desc">'.esc_html( $data['content'] ).'</p>';
				                        }
				                        if( ! empty( $data['button_link'] ) ){
				                            echo '<a href="'.esc_url( $data['button_link'] ).'" class="link-btn">'.esc_html( $data['button_text'] ).'<i class="fas fa-arrow-right"></i></a>';
				                        }
			                        echo '</div>';
			                    echo '</div>';
			                }
		                echo '</div>';
		            echo '</div>';
		        echo '</div>';
		    echo '</section>';
	    }else{
	    	echo '<div class="feature-wrap7">';
	    		if( !empty( $settings['shape']['url'] ) ){
	                echo '<div class="feature-bg-line">';
	                    echo webteck_img_tag( array(
							'url'   => esc_url( $settings['shape']['url'] ),
						) );
	                echo '</div>';
	            }
                echo '<div class="row gy-80 justify-content-center justify-content-lg-between align-items-center">';
                	$x = 0;
                	foreach( $settings['features2'] as $data ) { 
                		$x++;

                		$aa_wrap = $x % 2 == 0 ? 'order-lg-4' : '';


                		if( !empty( $data['image']['url'] ) ){
		                    echo '<div class="col-lg-6  '.esc_attr( $aa_wrap ).'">';
		                        echo '<div class="feature-thumb7-1">';
		                            echo webteck_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
		                        echo '</div>';
		                    echo '</div>';
		                }
	                    echo '<div class="col-xl-5 col-lg-6">';
	                        echo '<div class="feature-content me-xl-5">';
	                            if( ! empty( $data['content'] ) ){
	                            	echo wp_kses_post( $data['content'] );
	                            }
	                            echo '<div class="btn-wrap">';
	                            	if( ! empty( $data['button_link'] ) ){
		                                echo '<a href="'.esc_url( $data['button_link'] ).'" class="th-btn style-radius">'.esc_html( $data['button_text'] ).'</a>';
		                            }
	                            echo '</div>';
	                        echo '</div>';
	                    echo '</div>';
	                }
                echo '</div>';
            echo '</div>';
	    }
	}
}