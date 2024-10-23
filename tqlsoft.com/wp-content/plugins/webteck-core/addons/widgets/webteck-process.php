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
 * Process Box Widget .
 *
 */
class Traga_Process extends Widget_Base {

	public function get_name() {
		return 'tragaprocess';
	}

	public function get_title() {
		return __( 'Webteck Process', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'process_section',
			[
				'label' 	=> __( 'Process', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Process Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '1',
				'options' 		=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					'3' 		=> __( 'Style Three', 'webteck' ),
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
                'rows' 		=> 4,
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
			'process_line',
			[
				'label' 		=> __( 'Process Line', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> Utils::get_placeholder_image_src(),
				],
				'condition'	=> ['layout_style' => ['1','2']]
			]
		);
        $this->add_control(
			'process_repeat',
			[
				'label' 		=> __( 'Features', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
				'condition'	=> ['layout_style' => ['1','2']]
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
                'rows' 		=> 4,
                'default'  	=> __( 'Content Area', 'webteck' )
			]
        );
        
        $this->add_control(
			'process_repeat2',
			[
				'label' 		=> __( 'Step', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'title', 'webteck' ),
					],
				],
				'condition'	=> ['layout_style' => ['3']]
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
					'{{WRAPPER}} h3'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'overview_content_typography',
		 		'label' 		=> __( 'Typography', 'webteck' ),
		 		'selector' 	=> '{{WRAPPER}} h3',
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
        	echo '<div class="process-card-area">';
				if( ! empty( $settings['process_line']['url'] ) ){
					echo '<div class="process-line position-top">';
						echo webteck_img_tag( array(
							'url'   => esc_url( $settings['process_line']['url'] ),
						) );
					echo '</div>';
				}
				echo '<div class="row gy-4 justify-content-between">';
					foreach( $settings['process_repeat'] as $data ) {
						echo '<div class="col-sm-6 col-xl-auto process-card-wrap">';
							echo '<div class="process-card">';
								echo '<div class="pulse"></div>';
								if( ! empty( $data['image']['url'] ) ){
									echo '<div class="process-card_icon">';
										echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
									echo '</div>';
								}
								if( ! empty( $data['title'] ) ){
									echo '<h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
								}
								if( ! empty( $data['content'] ) ){
									echo '<p class="process-card_text">'.esc_html( $data['content'] ).'</p>';
								}
							echo '</div>';
						echo '</div>';
					}
					
				echo '</div>';
            echo '</div>';
	    } elseif ( $settings['layout_style'] == '2' ){
			echo '<div class="process-card-area">';
				if( ! empty( $settings['process_line']['url'] ) ){
					echo '<div class="process-line">';
						echo webteck_img_tag( array(
							'url'   => esc_url( $settings['process_line']['url'] ),
						) );
					echo '</div>';
				}
				echo '<div class="row gy-40">';
                    $i = 0;
					foreach( $settings['process_repeat'] as $data ) {
                        $i++;
			        	$k = str_pad($i, 2, '0', STR_PAD_LEFT);
						echo '<div class="col-sm-6 col-xl-3 process-card-wrap">';
							echo '<div class="process-card">';
								echo '<div class="process-card_number">'.esc_html($k).'</div>';
								if( ! empty( $data['image']['url'] ) ){
									echo '<div class="process-card_icon">';
										echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
									echo '</div>';
								}
								if( ! empty( $data['title'] ) ){
									echo '<h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
								}
								if( ! empty( $data['content'] ) ){
									echo '<p class="process-card_text">'.esc_html( $data['content'] ).'</p>';
								}
							echo '</div>';
						echo '</div>';
					}
					
				echo '</div>';
            echo '</div>';
			
		}else{

			$i = 0;
			foreach( $settings['process_repeat2'] as $data ) {
                $i++;
	        	

				echo '<div class="process-item">';
	                echo '<span class="process-item_number">'.esc_html($i).'</span>';
	                echo '<div class="process-item_content">';
	                    echo '<h3 class="box-title">'.esc_html( $data['title'] ).'</h3>';
	                    echo '<p class="process-item_text">'.esc_html( $data['content'] ).'</p>';
	                echo '</div>';
	            echo '</div>';
	        }
		}
	}
}