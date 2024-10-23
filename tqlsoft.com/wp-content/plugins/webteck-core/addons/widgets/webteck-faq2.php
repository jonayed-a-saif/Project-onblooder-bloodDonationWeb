<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Group_Control_Box_Shadow;
/**
 *
 * Faq Widget .
 *
 */
class Webteck_Faq extends Widget_Base {

	public function get_name() {
		return 'webteckfaq';
	}
	public function get_title() {
		return __( 'Faq v2', 'webteck' );
	}
	public function get_icon() {
		return 'th-icon';
    }
	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'faq_section',
			[
				'label'		 	=> __( 'Faq', 'webteck' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'Layout Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2'  		=> __( 'Style Two', 'webteck' ),
					'3'  		=> __( 'Style Three', 'webteck' ),
					'4'  		=> __( 'Style Four', 'webteck' ),
					'5'  		=> __( 'Style Five', 'webteck' ),
				],
			]
		);

        $this->add_control(
			'faq_id',
			[
				'label' 	=> __( 'Faq ID', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( '1', 'webteck' )
			]
        );

        $repeater = new Repeater();

        $repeater->add_control(
			'faq_question',
			[
				'label' 	=> __( 'Faq Question', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'rows' 		=> 2,
                'default'  	=> __( 'Our Principles', 'webteck' )
			]
        );

        $repeater->add_control(
			'faq_answer',
			[
				'label' 	=> __( 'Faq Answer', 'webteck' ),
                'type' 		=> Controls_Manager::WYSIWYG,
                'default'  	=> __( 'Morbi condimentum congue dui, elementum maximus augue porttitor a. Quisque volutpat et dui at fringilla. Integer sed justo quis lacus sodales porta. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aliquam molestie id nibh viverra fringilla. Nulla facilisi. Proin iaculis ornare lorem in imperdiet. Donec rutrum viverra dictum. Morbi et massa enim.', 'webteck' )
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

		$this->add_control(
			'faq_repeater',
			[
				'label' 		=> __( 'Faq', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'faq_question'    => __( 'Our Principles', 'webteck' ),
					],

				],
			]
		);

        $this->end_controls_section();

        //---------------------------------------
			//Style Section Start
		//---------------------------------------

		//-------------------------Question Style-----------------------//
        $this->start_controls_section(
			'faq_style_section',
			[
				'label' => __( 'Faq Question Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'faq_question_color',
			[
				'label' 	=> __( 'Color', 'webteck' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_control(
			'faq_question_active_color',
			[
				'label' 	=> __( 'Active Color', 'webteck' ),
				'type' 		=> Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .accordion-button:not(.collapsed)' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_question_typography',
				'label' 	=> __( 'Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .accordion-button',
			]
		);

        $this->add_responsive_control(
			'faq_question_margin',
			[
				'label' 		=> __( 'Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'faq_question_padding',
			[
				'label' 		=> __( 'Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

		$this->end_controls_section();

		//-------------------------Answer Style-----------------------//
		$this->start_controls_section(
			'faq_style_section2',
			[
				'label' => __( 'Faq Answer Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'faq_answer_color2',
			[
				'label' 		=> __( 'Content Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'color: {{VALUE}}',
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'faq_answer_typography2',
				'label' 	=> __( 'Content Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} .accordion-body p',
			]
        );

        $this->add_responsive_control(
			'faq_answer_margin2',
			[
				'label' 		=> __( 'Content Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

		$this->add_responsive_control(
			'faq_answer_padding',
			[
				'label' 		=> __( 'Answer Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .accordion-body p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
		);

        $this->end_controls_section();

	}

	protected function render() {

	$settings = $this->get_settings_for_display();

	if( $settings['layout_style'] == '1' ){
	?>

		<div class="accordion" id="faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
			<?php 
			$x = 0;
			$n = 1;
            foreach( $settings['faq_repeater'] as $single_data ):
            	$unique_id = uniqid();
            	$x++;
            	$n++;
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}
		 	 ?>
            <div class="accordion-card">
            	<?php if( ! empty( $single_data['faq_question'] ) ): ?>
                <div class="accordion-header" id="collapse-item-<?php echo esc_attr( $unique_id ); ?>">
                    <button class="accordion-button <?php echo esc_attr( $collesed ); ?>" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-<?php echo esc_attr( $unique_id ); ?>" aria-expanded="<?php echo esc_attr( $ariaexpanded ); ?>" aria-controls="collapse-<?php echo esc_attr( $unique_id ); ?>"><?php echo wp_kses_post($single_data['faq_question']); ?></button>
                </div>
                <?php endif; ?>
                <?php if( ! empty( $single_data['faq_answer'] ) ): ?>
                <div id="collapse-<?php echo esc_attr( $unique_id ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $class ); ?>"
                    aria-labelledby="collapse-item-<?php echo esc_attr( $unique_id ); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
                    <div class="accordion-body">
						<p class="faq-text"><?php echo wp_kses_post($single_data['faq_answer']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    <?php 
	}elseif( $settings['layout_style'] == '2' ){
		 echo '<div class="accordion-area accordion mb-30" id="faqAccordion'.esc_attr($settings['faq_id']).'">';
			$x = 1;
            foreach( $settings['faq_repeater'] as $single_data ){
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}


				echo '<div class="accordion-card style2 '.esc_attr( $is_active ).'">';
					if( ! empty( $single_data['faq_question'] ) ){
                        echo '<div class="accordion-header" id="collapse-item-2">';
                            echo '<button class="accordion-button '.esc_attr( $collesed ).'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.esc_attr( $x ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="collapse-'.esc_attr( $x ).'">'.esc_html($single_data['faq_question']).'</button>';
                        echo '</div>';
                    }
                    if( ! empty( $single_data['faq_answer'] ) ){
                        echo '<div id="collapse-'.esc_attr( $x ).'" class="accordion-collapse collapse '.esc_attr( $class ).' " aria-labelledby="collapse-item-'.esc_attr( $x ).'" data-bs-parent="#faqAccordion">';
                            echo '<div class="accordion-body style2">';
                            	if( ! empty( $single_data['image']['url'] ) ){
			                        echo '<div class="faq-img">';
			                            echo webteck_img_tag( array(
											'url'   => esc_url( $single_data['image']['url'] ),
										) );
			                        echo '</div>';
			                    }
                                echo '<p class="faq-text">'.esc_html($single_data['faq_answer']).'</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
				$x++;
            }
        echo '</div>';

	}elseif( $settings['layout_style'] == '3' ){
		echo '<div class="accordion-area accordion mb-30" id="faqAccordion'.esc_attr($settings['faq_id']).'">';
			$x = 1;
            foreach( $settings['faq_repeater'] as $single_data ){
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}


				echo '<div class="accordion-card style4 '.esc_attr( $is_active ).'">';
					if( ! empty( $single_data['faq_question'] ) ){
                        echo '<div class="accordion-header" id="collapse-item-2">';
                            echo '<button class="accordion-button '.esc_attr( $collesed ).'" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-'.esc_attr( $x ).'" aria-expanded="'.esc_attr( $ariaexpanded ).'" aria-controls="collapse-'.esc_attr( $x ).'">'.esc_html($single_data['faq_question']).'</button>';
                        echo '</div>';
                    }
                    if( ! empty( $single_data['faq_answer'] ) ){
                        echo '<div id="collapse-'.esc_attr( $x ).'" class="accordion-collapse collapse '.esc_attr( $class ).' " aria-labelledby="collapse-item-'.esc_attr( $x ).'" data-bs-parent="#faqAccordion">';
                            echo '<div class="accordion-body style2">';
                            	if( ! empty( $single_data['image']['url'] ) ){
			                        echo '<div class="faq-img">';
			                            echo webteck_img_tag( array(
											'url'   => esc_url( $single_data['image']['url'] ),
										) );
			                        echo '</div>';
			                    }
                                echo '<p class="faq-text">'.esc_html($single_data['faq_answer']).'</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                echo '</div>';
				$x++;
            }
        echo '</div>';
	}elseif( $settings['layout_style'] == '4' ){
		?>

		<div class="accordion-area style6 accordion" id="faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
			<?php 
			$x = 0;
			$n = 1;
            foreach( $settings['faq_repeater'] as $single_data ):
            	$unique_id = uniqid();
            	$x++;
            	$n++;
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}
		 	 ?>
            <div class="accordion-card style6">
            	<?php if( ! empty( $single_data['faq_question'] ) ): ?>
                <div class="accordion-header" id="collapse-item-<?php echo esc_attr( $unique_id ); ?>">
                    <button class="accordion-button <?php echo esc_attr( $collesed ); ?>" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-<?php echo esc_attr( $unique_id ); ?>" aria-expanded="<?php echo esc_attr( $ariaexpanded ); ?>" aria-controls="collapse-<?php echo esc_attr( $unique_id ); ?>"><?php echo wp_kses_post($single_data['faq_question']); ?></button>
                </div>
                <?php endif; ?>
                <?php if( ! empty( $single_data['faq_answer'] ) ): ?>
                <div id="collapse-<?php echo esc_attr( $unique_id ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $class ); ?>"
                    aria-labelledby="collapse-item-<?php echo esc_attr( $unique_id ); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
                    <div class="accordion-body">
						<p class="faq-text"><?php echo wp_kses_post($single_data['faq_answer']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    <?php 
	}else{
		?>

		<div class="accordion-area style5 accordion" id="faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
			<?php 
			$x = 0;
			$n = 1;
            foreach( $settings['faq_repeater'] as $single_data ):
            	$unique_id = uniqid();
            	$x++;
            	$n++;
				if( $x == '1' ){
					$ariaexpanded 	= 'true';
					$class 			= 'show';
					$collesed 		= '';
					$is_active 		= 'active';
				}else{
					$ariaexpanded 	= 'false';
					$class 			= '';
					$collesed 		= 'collapsed';
					$is_active 		= '';
				}
		 	 ?>
            <div class="accordion-card style5">
            	<?php if( ! empty( $single_data['faq_question'] ) ): ?>
                <div class="accordion-header" id="collapse-item-<?php echo esc_attr( $unique_id ); ?>">
                    <button class="accordion-button <?php echo esc_attr( $collesed ); ?>" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse-<?php echo esc_attr( $unique_id ); ?>" aria-expanded="<?php echo esc_attr( $ariaexpanded ); ?>" aria-controls="collapse-<?php echo esc_attr( $unique_id ); ?>"><?php echo wp_kses_post($single_data['faq_question']); ?></button>
                </div>
                <?php endif; ?>
                <?php if( ! empty( $single_data['faq_answer'] ) ): ?>
                <div id="collapse-<?php echo esc_attr( $unique_id ); ?>" class="accordion-collapse collapse <?php echo esc_attr( $class ); ?>"
                    aria-labelledby="collapse-item-<?php echo esc_attr( $unique_id ); ?>" data-bs-parent="#faqAccordion<?php echo esc_attr($settings['faq_id']) ?>">
                    <div class="accordion-body">
						<p class="faq-text"><?php echo wp_kses_post($single_data['faq_answer']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    <?php 
	}

	}
}