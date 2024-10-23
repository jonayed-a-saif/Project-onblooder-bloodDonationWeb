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
 * Contact Form Box Widget .
 *
 */
class Webteck_Contact_Form extends Widget_Base {

	public function get_name() {
		return 'webteckcontactform';
	}

	public function get_title() {
		return __( 'Contact Form', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}

	public function get_as_contact_form(){
        if ( ! class_exists( 'WPCF7' ) ) {
            return;
        }
        $as_cfa         = array();
        $as_cf_args     = array( 'posts_per_page' => -1, 'post_type'=> 'wpcf7_contact_form' );
        $as_forms       = get_posts( $as_cf_args );
        $as_cfa         = ['0' => esc_html__( 'Select Form', 'webteck' ) ];
        if( $as_forms ){
            foreach ( $as_forms as $as_form ){
                $as_cfa[$as_form->ID] = $as_form->post_title;
            }
        }else{
            $as_cfa[ esc_html__( 'No contact form found', 'webteck' ) ] = 0;
        }
        return $as_cfa;
    }

	protected function register_controls() {

		$this->start_controls_section(
			'teamd_section',
			[
				'label' 	=> __( 'Contact Form', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Contact Form Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					// 'layout_two'  		=> __( 'Style Two', 'webteck' ),
					// 'layout_three'  	=> __( 'Style Three', 'webteck' ),
					// 'layout_four'  	=> __( 'Style Four', 'webteck' ),
				]
			]
		);
		$this->add_control(
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['layout_one']]
			]
		);

		$this->add_control(
		    'webteck_select_contact_form',
		    [
		        'label'   => esc_html__( 'Select Form', 'webteck' ),
		        'type'    => \Elementor\Controls_Manager::SELECT,
		        'default' => '0',
		        'options' => $this->get_as_contact_form(),
		    ]
		);

		
		
        $this->end_controls_section();

	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){
            if( !empty($settings['webteck_select_contact_form']) ){
            	
            	echo '<div class="appointment-area-wrapp">';
            		echo '<h6 class="title">'.esc_html( $settings['title'] ).'</h6>';
					echo do_shortcode( '[contact-form-7  id="'.$settings['webteck_select_contact_form'].'"]' ); 
				echo '</div>';
			}else{
				echo '<div class="alert alert-warning"><p class="m-0">' . __('Please Select contact form.', 'webteck' ). '</p></div>';
			}
	    }
	}
}