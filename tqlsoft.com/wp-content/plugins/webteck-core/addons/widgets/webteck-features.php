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
class Traga_Feature extends Widget_Base {

	public function get_name() {
		return 'tragafeature';
	}

	public function get_title() {
		return __( 'Webteck Feature', 'webteck' );
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
					'3' 		=> __( 'Style Three', 'webteck' ),
					'4' 		=> __( 'Style Four', 'webteck' ),
					'5' 		=> __( 'Style Five', 'webteck' ),
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
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}};',
					'{{WRAPPER}} h4'	=> 'color: {{VALUE}};',
					'{{WRAPPER}} .item'	=> 'color: {{VALUE}};',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} h3, {{WRAPPER}} .item',
			]
		);

        $this->add_responsive_control(
			'overview_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} h3' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} p'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'webteck_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} p',
			]
		);

        $this->add_responsive_control(
			'webteck_content_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
	}

	protected function render() {

        $settings = $this->get_settings_for_display();
        if ( $settings['layout_style'] == '1' ){
        	echo '<div class="about-feature-wrap">';
				foreach( $settings['features'] as $data ) {  
					echo '<div class="about-feature">';
						if( !empty( $data['image']['url'] ) ){
							echo '<div class="about-feature_icon">';
								echo webteck_img_tag( array(
									'url'   => esc_url( $data['image']['url'] ),
								) );
							echo '</div>';
						}
						echo '<div class="media-body">';
							if( ! empty( $data['title'] ) ){
								echo '<h3 class="about-feature_title">'.esc_html( $data['title'] ).'</h3>';
							}
							if( ! empty( $data['content'] ) ){
								echo '<p class="about-feature_text">'.esc_html( $data['content'] ).'</p>';
							}
						echo '</div>';
					echo '</div>';
				}  
            echo '</div>';
	    } elseif ( $settings['layout_style'] == '2' ) {
	    	echo '<div class="row gy-4 justify-content-center">';
                foreach( $settings['features'] as $data ) {
					echo '<div class="col-xl-4 col-md-6">';
						echo '<div class="feature-card">';
							if( ! empty( $data['image']['url'] ) ){
								echo '<div class="shape-icon">';
									echo webteck_img_tag( array(
										'url'   => esc_url( $data['image']['url'] ),
									) );
								echo '</div>';
							}
							if( ! empty( $data['title'] ) ){
								echo '<h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
							}
							if( ! empty( $data['content'] ) ){
								echo '<p class="feature-card_text">'.esc_html( $data['content'] ).'</p>';
							}
						echo '</div>';
					echo '</div>';
	            }
                
            echo '</div>';
	    } elseif ( $settings['layout_style'] == '3' ) {
			echo '<div class="service-feature-wrap">';
				foreach( $settings['features'] as $data ) {
					echo '<div class="service-feature">';
						if( ! empty( $data['image']['url'] ) ){
							echo '<div class="service-feature_icon">';
								echo webteck_img_tag( array(
									'url'   => esc_url( $data['image']['url'] ),
								) );
							echo '</div>';
						}
						echo '<div class="media-body">';
							if ( ! empty( $data['title'] ) ){
								echo '<h4 class="service-feature_title">'.esc_html( $data['title'] ).'</h4>';
							}
							if ( ! empty( $data['content'] ) ){
								echo '<p class="service-feature_text">'.esc_html( $data['content'] ).'</p>';
							}
						echo '</div>';
					echo '</div>';
				}
            echo '</div>';
			
		} elseif ( $settings['layout_style'] == '4' ) {
			echo '<div class="why-feature-wrap-4-1">';

                foreach( $settings['features'] as $data ) {            
	                echo '<div class="about-feature style3">';
	                	if( ! empty( $data['image']['url'] ) ){
		                    echo '<div class="about-feature_icon">';
		                        echo webteck_img_tag( array(
									'url'   => esc_url( $data['image']['url'] ),
								) );
		                    echo '</div>';
		                }
	                    echo '<div class="media-body">';
	                    	if ( ! empty( $data['title'] ) ){
		                        echo '<h3 class="about-feature_title">'.esc_html( $data['title'] ).'</h3>';
		                    }
		                    if ( ! empty( $data['content'] ) ){
		                        echo '<p class="about-feature_text">'.esc_html( $data['content'] ).'</p>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            }
                

            echo '</div>';
		}else{
			echo '<div class="marquee-area overflow-hidden">';
		        echo '<div class="marquee-content_wrapper">';
		            echo '<div class="marquee">';
		                echo '<div class="marquee-group">';
		                	foreach( $settings['features'] as $data ) {   
			                    echo '<div class="item "><img src="'.esc_url( $data['image']['url'] ).'" alt="">'.esc_html( $data['title'] ).'</div>';
			                }
		                echo '</div>';
		                echo '<div aria-hidden="true" class="marquee-group">';
		                	foreach( $settings['features'] as $data ) {  
			                    echo '<div class="item "><img src="'.esc_url( $data['image']['url'] ).'" alt="">'.esc_html( $data['title'] ).'</div>';
			                } 
		                echo '</div>';
		            echo '</div>';

		        echo '</div>';
		    echo '</div>';
		}
	}
}