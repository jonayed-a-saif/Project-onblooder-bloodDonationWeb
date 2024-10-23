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
 * Counter Up Box Widget .
 *
 */
class Webteck_Counter_Up extends Widget_Base {

	public function get_name() {
		return 'webteckcounterup';
	}

	public function get_title() {
		return __( 'Counter Up', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'counterupd_section',
			[
				'label' 	=> __( 'Counter Up', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Counter Up Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					'layout_three'  		=> __( 'Style Three', 'webteck' ),
					'layout_four'  		=> __( 'Style Four', 'webteck' ),
				]
			]
		);
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'counter_text', [
				'label' 		=> __( 'Title', 'konsal' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Return on investment' , 'konsal' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'counter_suffix', [
				'label' 		=> __( 'After Title', 'konsal' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'X' , 'konsal' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'counter_number', [
				'label' 		=> __( 'Number', 'konsal' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( '20' , 'konsal' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'desc', [
				'label' 		=> __( 'Short Description', 'konsal' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Return on investment is a financial metric that measures' , 'konsal' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' 		=> esc_html__( 'Image', 'konsal' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'counterup',
			[
				'label' 		=> __( 'Counter Up', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ title }}}',
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

		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one','layout_four'], '--title-color' );
		webteck_all_elementor_style($this, 'Title ', '{{WRAPPER}} .title-selector',['layout_three'], 'color' );
		webteck_all_elementor_style($this, 'Number', '{{WRAPPER}} .number-selector',['layout_one','layout_two','layout_four'], '--title-color' );
		webteck_all_elementor_style($this, 'Number ', '{{WRAPPER}} .box-number',['layout_three'], 'color' );
		webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .desc-selector',['layout_one','layout_two'], '--body-color' );



        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="counter-card4-wrap">';

                foreach( $settings['counterup'] as $data ) {
	                echo '<div class="counter-card4">';
	                	if( ! empty( $data['image']['url']  ) ){
		                    echo '<div class="counter-card4_icon">';
		                        echo webteck_img_tag( array(
				                    'url'   => esc_url( $data['image']['url']  ),
				                ));
		                    echo '</div>';
		                }
	                    echo '<div class="media-body">';
	                    	if( ! empty( $data['counter_number'] ) ){
	                    		$counter_suffix =  $data['counter_suffix'] ?  $data['counter_suffix'] : '';
		                        echo '<h3 class="box-number number-selector"><span class="counter-number ">'.esc_html( $data['counter_number'] ).'</span>'.esc_html( $counter_suffix ).'</h3>';
		                    }
		                    if( ! empty( $data['counter_text'] ) ){
		                        echo '<h6 class="counter-title title-selector">'.esc_html( $data['counter_text'] ).'</h6>';
		                    }
		                    if( ! empty( $data['desc'] ) ){
		                        echo '<p class="mb-0 desc-selector">'.esc_html( $data['desc'] ).'</p>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	                echo '<div class="divider"></div>';
	            }
                
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_two' ){
	    	echo '<div class="row">';

                foreach( $settings['counterup'] as $data ) {
	                echo '<div class="col-sm-6 col-xl-3 counter-card-wrap style2">';
	                    echo '<div class="counter-card style2">';
	                    	if( ! empty( $data['image']['url']  ) ){
			                    echo '<div class="box-icon">';
			                        echo webteck_img_tag( array(
					                    'url'   => esc_url( $data['image']['url']  ),
					                ));
			                    echo '</div>';
			                }
	                        echo '<div class="media-body">';
	                        	if( ! empty( $data['counter_number'] ) ){
		                    		$counter_suffix =  $data['counter_suffix'] ?  $data['counter_suffix'] : '';
		                            echo '<h2 class="box-number text-white number-selector"><span class="counter-number">'.esc_html( $data['counter_number'] ).'</span>'.esc_html( $counter_suffix ).'</h2>';
		                        }
		                        if( ! empty( $data['desc'] ) ){
		                            echo '<p class="box-text text-white desc-selector">'.esc_html( $data['desc'] ).'</p>';
		                        }
	                        echo '</div>';
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }elseif( $settings['layout_style'] == 'layout_three' ){
	    	echo '<div class="container th-container4">';
	            echo '<div class="counter-area-7">';
	                echo '<div class="row justify-content-md-between justify-content-center">';

	                    foreach( $settings['counterup'] as $data ) {
		                    echo '<div class="col-xl-3 col-md-6">';
		                        echo '<div class="counter-card7">';
		                            echo '<div class="divider"></div>';
		                            if( ! empty( $data['counter_number'] ) ){
		                            	$counter_suffix =  $data['counter_suffix'] ?  $data['counter_suffix'] : '';
			                            echo '<h3 class="box-number"><span class="counter-number number-selector">'.esc_html( $data['counter_number'] ).'</span>'.esc_html( $counter_suffix ).'</h3>';
			                        }
			                        if( ! empty( $data['counter_text'] ) ){
			                            echo '<div class="media-body">';
			                                echo '<p class=" counter-text mb-n2 title-selector">'.wp_kses_post( $data['counter_text'] ).'</span></p>';
			                            echo '</div>';
			                        }
		                        echo '</div>';
		                    echo '</div>';
		                }
	                    

	                echo '</div>';
	            echo '</div>';
	        echo '</div>';
	    }else{
	    	echo '<div class="skill-circle-wrap">';
                foreach( $settings['counterup'] as $data ) {       
	                echo '<div class="skill-circle">';
	                    echo '<div class="progressbar" data-path-color="#3E66F3">';
	                    	if( ! empty( $data['counter_number'] ) ){
		                        echo '<div class="circle number-selector" data-percent="'.esc_attr( $data['counter_number'] ).'">';
		                            echo '<div class="circle-num"></div>';
		                            if( ! empty( $data['counter_text'] ) ){
			                            echo '<span class="box-text title-selector">'.wp_kses_post( $data['counter_text'] ).'</span>';
			                        }
		                        echo '</div>';
		                    }
	                    echo '</div>';
	                echo '</div>';
	            }
            echo '</div>';
	    }
	}
}