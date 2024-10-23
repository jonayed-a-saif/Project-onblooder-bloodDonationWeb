<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Border;
/**
 *
 * Image Widget .
 *
 */
class Traga_Video_Box extends Widget_Base {

	public function get_name() {
		return 'tragavideobox';
	}

	public function get_title() {
		return __( 'Webteck Video Box v2', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'image_section',
			[
				'label' 	=> __( 'Video Image', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  		=> __( 'Style Three', 'webteck' ),
				]
			]
		);

        $this->add_control(
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
			'image_wrapper_class',
			[
				'label'     => __( 'Image Wrapper Class', 'webteck' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __( 'video-box1', 'webteck' ),
			]
        );
        $this->add_control(
			'show_vdo',
			[
				'label' 		=> __( 'Show Video Button?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'yes',
			]
		);
		$this->add_control(
			'video_link',
			[
				'label' 		=> __( 'Video Url', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
                'placeholder' 	=> __( 'https://your-link.com', 'webteck' ),
                'show_external' => true,
				'default' 		=> [
					'url' 			=> 'https://www.youtube.com/watch?v=_sI_Ps7JSEk',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
				'condition'		=> [ 'show_vdo' => [ 'yes' ] ],
			]
        );
        $this->add_control(
			'image_class',
			[
				'label'     => __( 'Image Class', 'webteck' ),
                'type'      => Controls_Manager::TEXT,
				'default'   => __( 'tilt-active', 'webteck' ),
			]
        );
        $this->end_controls_section();

		//------------------------------------Style Control------------------------------------//

        $this->start_controls_section(
			'image_style_section',
			[
				'label' 	=> __( 'Image Style', 'webteck' ),
                'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 		=> 'image_border',
				'selector' 	=> '{{WRAPPER}} .custom_css_handelar img',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%' ],
				'selectors' 	=> [
					'{{WRAPPER}} .custom_css_handelar img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();



		//-------------------------------video button styling------------------------------- //

		$this->start_controls_section(
			'video_btn_style_section',
			[
				'label' 	=> __( 'Video Button Style', 'mechon' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
				'condition'		=> [ 'show_vdo' => [ 'yes' ] ],
			]
		);

		$this->add_control(
			'video_btn_color',
			[
				'label' 	=> __( 'Video Button Color', 'webteck' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'color: {{VALUE}}',
                ]
			]
        );

		$this->add_control(
			'video_btn_hover_color',
			[
				'label' 	=> __( 'Video Button Hover Color', 'webteck' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'color: {{VALUE}};',
                ]
			]
        );

		$this->add_control(
			'video_btn_background_color',
			[
				'label' 	=> __( 'Video Button Background Color', 'webteck' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn i' => 'background-color: {{VALUE}}!important;',
                ]
			]
		);

		$this->add_control(
			'video_btn_background_hover_color',
			[
				'label' 	=> __( 'Video Button Background Hover Color', 'webteck' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .play-btn:hover i' => 'background-color: {{VALUE}}!important;',
                ]
			]
		);

		$this->add_control(
			'video_btn_ripple_effect_color',
			[
				'label' 		=> __( 'Video Button Ripple Effect Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .play-btn:after,{{WRAPPER}} .play-btn:before' => 'background-color: {{VALUE}}!important;',
                ]
			]
        );

		$this->end_controls_section();
		
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('wrapper','class','custom_css_handelar');

        $this->add_render_attribute('wrapper','class',esc_attr( $settings['image_wrapper_class'] ));

        
        echo '<!-- Image -->';
            echo '<div '.$this->get_render_attribute_string('wrapper').'>';
            	if( $settings['layout_style'] == 'layout_one' ){
					if (!empty($settings['image']['url'])) {
						echo webteck_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
							'class' => $settings['image_class'],
						));
					}

					if($settings['show_vdo'] == 'yes'){

						if( !empty( $settings['video_link']['url'] ) ) {
							echo '<a href="'.esc_url($settings['video_link']['url']).'" class="play-btn popup-video"><i class="fas fa-play"></i></a>';
						}				
					}
				}elseif( $settings['layout_style'] == 'layout_two' ){
					echo '<div class="img1">';
                        if (!empty($settings['image']['url'])) {
							echo webteck_img_tag( array(
								'url'   => esc_url( $settings['image']['url'] ),
								'class' => $settings['image_class'],
							));
						}
                    echo '</div>';
                    if($settings['show_vdo'] == 'yes'){
                        echo '<div class="video-box4">';
                        	if( !empty( $settings['video_link']['url'] ) ) {
	                            echo '<a href="'.esc_url($settings['video_link']['url']).'" class="play-btn popup-video"><i class="fa-sharp fa-solid fa-play"></i></a>';
	                        }
                        echo '</div>';
                    }
				}else{

                    if (!empty($settings['image']['url'])) {
						echo webteck_img_tag( array(
							'url'   => esc_url( $settings['image']['url'] ),
							'class' => $settings['image_class'],
						));
					}
					if( !empty( $settings['video_link']['url'] ) ) {
	                    echo '<a href="'.esc_url($settings['video_link']['url']).'" class="video-play-btn popup-video"><i class="fa-regular fa-play"></i></a>';
	                }
				}
            echo '</div>';
        echo '<!-- End Image -->';

	}

}