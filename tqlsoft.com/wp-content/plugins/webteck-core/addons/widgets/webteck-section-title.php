<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Border;
use \Elementor\Utils;
/**
 *
 * Section Title Widget .
 *
 */
class Webteck_Section_Title_Widget extends Widget_Base {

	public function get_name() {
		return 'webtecksectiontitle';
	}

	public function get_title() {
		return __( 'Section Title', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_title_section',
			[
				'label'		 	=> __( 'Section Title', 'webteck' ),
				'tab' 			=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
            'layout_style',
            [
                'label' => __('Select Layout', 'webteck'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'default' => 'layout_one',
                'options' => [
                    'layout_one' 	=> __('Layout One', 'webteck'),
                    'layout_two' 	=> __('Layout Two', 'webteck'),
                ]
            ]
        );
        $this->add_control(
			'section_subtitle',
			[
				'label' 	=> __( 'Section Subtitle', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Subtitle', 'webteck' ),
			]
        );

        $this->add_control(
			'section_subtitle_tag',
			[
				'label' 	=> __( 'Subitle Tag', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'p'  => 'P',
					'span'  => 'span',
				],
				'default' 	=> 'span',
				'condition'	=> ['section_subtitle!' => '']
			]
		);

		$this->add_control(
			'section_title',
			[
				'label' 	=> __( 'Section Title', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Title', 'webteck' )
			]
        );
        $this->add_control(
			'section_title_tag',
			[
				'label' 	=> __( 'Title Tag', 'webteck' ),
				'type' 		=> Controls_Manager::SELECT,
				'options' 	=> [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'span'  => 'span',
				],
				'default' => 'h2',
			]
        );
		$this->add_control(
			'section_description',
			[
				'label' 	=> __( 'Section Description', 'webteck' ),
                'type' 		=> Controls_Manager::TEXTAREA,
                'default'  	=> __( 'Section Description', 'webteck' )
			]
        );
        $this->add_responsive_control(
			'section_align',
			[
				'label' 		=> __( 'Alignment', 'webteck' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left' 	=> [
						'title' 		=> __( 'Left', 'webteck' ),
						'icon' 			=> 'eicon-text-align-left',
					],
					'center' 	=> [
						'title' 		=> __( 'Center', 'webteck' ),
						'icon' 			=> 'eicon-text-align-center',
					],
					'right' 	=> [
						'title' 		=> __( 'Right', 'webteck' ),
						'icon' 			=> 'eicon-text-align-right',
					],
				],
				'default' 	=> 'left',
				'toggle' 	=> true,
				'selectors' 	=> [
					'{{WRAPPER}} .title-area' => 'text-align: {{VALUE}};',
                ]
			]
		);

        $this->end_controls_section();

       

        //-------------------------------------title styling-------------------------------------//

        $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Section Title Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [
                    'section_title!'    => ''
                ]
			]
		);
		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one','layout_two'] );

        $this->end_controls_section();


        //-------------------------------------subtitle styling-------------------------------------//

        $this->start_controls_section(
			'section_subtitle_style_section',
			[
				'label' => __( 'Section Subtitle Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' => [
                    'section_subtitle!'    => ''
                ],
			]
		);
		webteck_all_elementor_style($this, 'Subtitle', '{{WRAPPER}} .subtitle-selector',['layout_one','layout_two'] );

		
        $this->end_controls_section();

        
        //-------------------------------------description styling-------------------------------------//

        $this->start_controls_section(
			'section_desc_style_section',
			[
				'label' => __( 'Section Description Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
				'condition' 	=> [
                    'section_description!'    => ''
                ]
			]
		);
		webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .desc-selector',['layout_one','layout_two'] );

		
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( ! empty( $settings['section_description'] ) ){
        	$this->add_render_attribute( 'wrapper', 'class', 'title-area mb-25' );
        	$sec_title = 'sec-title mb-20';
        }else{
        	$this->add_render_attribute( 'wrapper', 'class', 'title-area' );
        	$sec_title = 'sec-title';
        }
        echo '<div '.$this->get_render_attribute_string( 'wrapper' ).' >';
        	if( !empty( $settings['section_subtitle'] ) ) {
        		if( $settings['layout_style'] == 'layout_one' ){
        			$allign = $settings['section_align'] == 'center' ? '' : 'style1';
        		}else{
        			$allign = $settings['section_align'] == 'center' ? 'sub-title3' : 'sub-title3 style1';
        		}

	            echo '<'.esc_attr($settings['section_subtitle_tag']).' class="sub-title '.esc_attr( $allign ).' subtitle-selector">';
	            	
	                echo wp_kses_post( $settings['section_subtitle'] );
	                
	            echo '</'.esc_attr($settings['section_subtitle_tag']).'>';
	        }
	        if( ! empty( $settings['section_title'] ) ) {
	            echo '<'.esc_attr($settings['section_title_tag']).' class=" '.esc_attr( $sec_title ).'  title-selector">'.wp_kses_post( $settings['section_title'] ).'</'.esc_attr($settings['section_title_tag']).'>';
	        }

	        if( ! empty( $settings['section_description'] ) ){
				echo webteck_paragraph_tag( array(
					'text'	=> wp_kses_post( $settings['section_description'] ),
					'class'	=> 'desc-selector'
				) );
			}
	    echo '</div>';
        
        
        	
	}
}