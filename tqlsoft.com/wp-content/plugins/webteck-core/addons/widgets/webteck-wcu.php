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
 * Why Chose Us Box Widget .
 *
 */
class Webteck_Why_Chose_Us extends Widget_Base {

	public function get_name() {
		return 'webteckwcu';
	}

	public function get_title() {
		return __( 'Why Chose Us', 'webteck' );
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
				'label' 	=> __( 'Why Chose Us', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Why Chose Us Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					// 'layout_three'  		=> __( 'Style Three', 'webteck' ),
					// 'layout_four'  		=> __( 'Style Four', 'webteck' ),
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
			'features_list', [
				'label' 		=> __( 'Features', 'webteck' ),
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
			'features',
			[
				'label' 		=> __( 'Why Chose Us', 'webteck' ),
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


		$repeater2 = new \Elementor\Repeater();

		$repeater2->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater2->add_control(
			'content', [
				'label' 		=> __( 'Content', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::WYSIWYG,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'label_block' 	=> true,
			]
		);

		$repeater2->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater2->add_control(
			'button_text',
			[
				'label' 		=> esc_html__( 'Button Text', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( 'Read Details', 'webteck' ),
			]
		);
		$repeater2->add_control(
			'button_link',
			[
				'label' 		=> esc_html__( 'Button Link', 'webteck' ),
				'type' 		=> \Elementor\Controls_Manager::TEXT,
		        'default'  	=> esc_html__( '#', 'webteck' ),
			]
		);
		$this->add_control(
			'features2',
			[
				'label' 		=> __( 'Why Chose Us', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater2->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
				'condition'	=> ['layout_style' => ['layout_two']]
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
		webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .box-text',['layout_one'], '--body-color' );



        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="choose-tabs-wrapper">';
                echo '<div class="nav nav-tabs choose-tabs-tabs" id="nav-tab" role="tablist">';
                	$i = 0;
                    foreach( $settings['features'] as $data ) { 
                    	$i++;

                    	$active_class = $i == 1 ? 'active' : '';

	                    echo '<button class="nav-link '.esc_attr( $active_class ).'" id="nav-step'.esc_attr( $i ).'-tab" data-bs-toggle="tab" data-bs-target="#nav-step'.esc_attr( $i ).'" type="button">'.esc_html( $data['title'] ).'</button>';
	                }
                echo '</div>';
                echo '<div class="tab-content" id="nav-tabContent">';

                	$i = 0;
                    foreach( $settings['features'] as $data ) { 
                    	$i++;

                    	$active_class = $i == 1 ? 'show active' : '';

	                    echo '<div class="tab-pane fade '.esc_attr( $active_class ).'" id="nav-step'.esc_attr( $i ).'" role="tabpanel">';
	                        echo '<div class="choose-wrapper">';
	                            echo '<div class="choose-content">';
	                                echo '<div class="title-area mb-30">';
	                                    echo '<h5 class="sec-title mb-2 text-white title-selector">'.esc_html( $data['title'] ).'</h5>';
	                                    echo '<p class="box-text">'.esc_html( $data['content'] ).'</p>';
	                                echo '</div>';
	                                echo '<div class="checklist">';
	                                
	                                echo wp_kses_post( $data['features_list'] );

	                                echo '</div>';

	                                echo '<a href="'.esc_url( $data['button_link'] ).'" class="th-btn style6 style-radius">'.esc_html( $data['button_text'] ).'</a>';
	                            echo '</div>';
	                            if( ! empty( $data['image']['url'] ) ){
		                            echo '<div class="choose-image th-anim">';
		                                echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
		                            echo '</div>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                }
                echo '</div>';
            echo '</div>';
	    }else{
	    	echo '<div class="process-tabs-wrapper">';
                echo '<div class="nav nav-tabs process-tabs-tabs" id="nav-tab" role="tablist">';

                    $i = 0;
                    foreach( $settings['features2'] as $data ) { 
                    	$i++;

                    	$active_class = $i == 1 ? 'active' : '';

                    	$k = str_pad($i, 2, '0', STR_PAD_LEFT);

                    	echo '<button class="nav-link '.esc_attr( $active_class ).'" id="nav-step1-tab" data-bs-toggle="tab" data-bs-target="#nav-step'.esc_attr( $i ).'" type="button"><span class="step">STEP-'.esc_html( $k ).'</span><span class="title">'.esc_html( $data['title'] ).'</span></button>';
                    }
                    

                echo '</div>';
                echo '<div class="tab-content" id="nav-tabContent">';

                	$i = 0;
                    foreach( $settings['features2'] as $data ) { 
                    	$i++;

                    	$active_class = $i == 1 ? 'show active' : '';

	                    echo '<div class="tab-pane fade '.esc_attr( $active_class ).'" id="nav-step'.esc_attr( $i ).'" role="tabpanel">';
	                        echo '<div class="process-wrapper">';

	                            echo '<div class="process-content">';
	                            	if( !empty( $data['content'] ) ){
		                            	echo wp_kses_post( $data['content'] );
		                            }
		                            echo '<a href="'.esc_url( $data['button_link'] ).'" class="th-btn style-radius">'.esc_html( $data['button_text'] ).'</a>';
	                            echo '</div>';
	                            if( ! empty( $data['image']['url'] ) ){
		                            echo '<div class="process-image th-anim">';
		                                echo webteck_img_tag( array(
											'url'   => esc_url( $data['image']['url'] ),
										) );
		                            echo '</div>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                }
                echo '</div>';

            echo '</div>';
	    }
	}
}