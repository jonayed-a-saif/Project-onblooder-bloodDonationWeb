<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Repeater;
/**
 *
 * List Widget .
 *
 */
class Traga_List extends Widget_Base {

	public function get_name() {
		return 'tragalist';
	}

	public function get_title() {
		return __( 'Webteck List', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'list_section',
			[
				'label'     => __( 'Traga List', 'webteck' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
			]
        );
		$this->add_control(
			'layout_style',
			[
				'label' 	=> __( 'List Style', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'default' 	=> '1',
				'options' 	=> [
					'1'  		=> __( 'Style One', 'webteck' ),
					'2' 		=> __( 'Style Two', 'webteck' ),
					'3' 		=> __( 'Style Three', 'webteck' ),
					'4' 		=> __( 'Style Four', 'webteck' ),
				],
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'list_text', [
				'label' 		=> esc_html__( 'List Text', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> esc_html__( 'List Text' , 'webteck' ),
				'placeholder' 	=> esc_html__( 'List Text', 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
        );
		$this->add_control(
			'list_icon', [
				'label' 		=> __( 'List Icon', 'webteck' ),
				'type' 			=> Controls_Manager::TEXTAREA,
				'default' 		=> __( '<i class="fas fa-circle-check"></i>' , 'webteck' ),
				'placeholder' 	=> __( '<i class="fas fa-circle-check"></i>', 'webteck' ),
				'rows' 			=> 2,
			]
        );
        
		$this->add_control(
			'upload_image',
			[
				'label' 		=> __( 'Upload Image?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'webteck' ),
				'label_off' 	=> __( 'No', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);
        $this->add_control(
			'icon_img',
			[
				'label' 		=> __( 'Icon Image', 'webteck' ),
				'type' 			=> Controls_Manager::MEDIA,
				'dynamic' 		=> [
					'active' 		=> true,
				],
				'default' 		=> [
					'url' 			=> WEBTECK_PLUGDIRURI.'assets/img/check_1.png',
				],
				'condition'		=> [ 'upload_image' =>  ['yes']  ],
			]
		);
		$this->add_control(
			'list_repeater',
			[
				'label' 		=> __( 'List Items', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'list_text' 		=> __( 'List Item', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ list_text }}}',
			]
		);

        $this->end_controls_section();

        //------------------------------------Style Control------------------------------------//

		$this->start_controls_section(
			'list_styling',
			[
				'label' 	=> __( 'List Style', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'list_icon_color',
			[
				'label' 		=> __( 'Icon Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} li > i' => 'color: {{VALUE}}',
				]
			],
        );
		$this->add_control(
			'list_text_color',
			[
				'label' 		=> __( 'Text Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} li' => 'color: {{VALUE}}',
				]
			],
        );
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'list_typography',
				'label' 	=> __( 'List Typography', 'webteck' ),
                'selector' 	=> '{{WRAPPER}} li',
			]
        );

		$this->end_controls_section();

	}

	protected function render() {
 
        $settings = $this->get_settings_for_display();

        if ( $settings['layout_style'] == '1' ) {
            $style_class = '';
		} elseif ( $settings['layout_style'] == '2' ) {
			$style_class = ' style2';
		} elseif ( $settings['layout_style'] == '3' ) {
			$style_class = ' style3';
		} else {
			$style_class = ' list-center style4';
		}

        if ( $settings['upload_image'] == 'yes' ) {
            $icon = webteck_img_tag( array(
                'url'   => esc_url( $settings['icon_img']['url']  ),
            ));
		} else {
			$icon = $settings['list_icon'];
		}

        
		echo '<div class="checklist'.$style_class.'">';
			echo '<ul>';
			foreach( $settings['list_repeater'] as $data ) {
				if( ! empty( $data['list_text']) ){
					echo '<li>'.wp_kses_post($icon).esc_html($data['list_text']).'</li>';
				}
			}
			echo '</ul>';
		echo '</div>';
		
	}
}