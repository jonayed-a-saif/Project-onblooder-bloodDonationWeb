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
 * About Us Box Widget .
 *
 */
class Webteck_Footer_About_Us extends Widget_Base {

	public function get_name() {
		return 'webteckfooteraboutus';
	}

	public function get_title() {
		return __( 'Footer About Us', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck_footer_elements' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'aboutusd_section',
			[
				'label' 	=> __( 'About Us', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'About Us Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
					// 'layout_three'  		=> __( 'Style Three', 'webteck' ),
				]
			]
		);

		$this->add_control(
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
			'title', [
				'label' 		=> __( 'Title', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'About Company' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
				'condition'	=> ['layout_style' => ['layout_two']]
			]
		);
		$this->add_control(
			'desc', [
				'label' 		=> __( 'Description', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label' 	=> __( 'Social Icon', 'webteck' ),
				'type' 		=> Controls_Manager::ICONS,
				'default' 	=> [
					'value' 	=> 'fab fa-facebook-f',
					'library' 	=> 'solid',
				],
			]
		);

		$repeater->add_control(
			'icon_link',
			[
				'label' 		=> __( 'Link', 'webteck' ),
				'type' 			=> Controls_Manager::URL,
				'placeholder' 	=> __( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> true,
					'nofollow' 		=> true,
				],
			]
		);

		$this->add_control(

			'social_icon_list',
			[
				'label' 		=> __( 'Social Icon', 'webteck' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'social_icon' => __( 'Add Social Icon','webteck' ),
					],
				],
				// 'condition'	=> ['layout_style' => ['layout_two']]
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

		webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .widget_title',['layout_one','layout_two'], 'color' );
		webteck_all_elementor_style($this, 'Description', '{{WRAPPER}} .desc-selector',['layout_one','layout_two'], '--white-color' );



        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="widget footer-widget">';
                echo '<div class="th-widget-about">';
                    echo '<div class="about-logo">';
                        echo '<a href="home-web-agency.html"><img src="'.esc_url( $settings['image']['url'] ).'" alt="Webtek"></a>';
                    echo '</div>';
                    echo '<p class="about-text text-white desc-selector">'.esc_html( $settings['desc'] ).'</p>';
                    echo '<div class="th-social">';
                    	if( ! empty( $settings['social_icon_list'] ) ){
                            foreach( $settings['social_icon_list'] as $social_icon ){
	                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
	                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

	                            echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

	                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

	                          	echo '</a> ';
	                      	} 
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }else{
	    	echo '<div class="widget footer-widget">';
                echo '<h3 class="widget_title">'.esc_html( $settings['title'] ).'</h3>';
                echo '<div class="th-widget-about">';
                    echo '<p class="footer-text desc-selector">'.esc_html( $settings['desc'] ).'</p>';
                    echo '<div class="th-social">';
                    	if( ! empty( $settings['social_icon_list'] ) ){
                            foreach( $settings['social_icon_list'] as $social_icon ){
	                          	$social_target    = $social_icon['icon_link']['is_external'] ? ' target="_blank"' : '';
	                          	$social_nofollow  = $social_icon['icon_link']['nofollow'] ? ' rel="nofollow"' : '';

	                            echo '<a '.wp_kses_post( $social_target.$social_nofollow ).' href="'.esc_url( $social_icon['icon_link']['url'] ).'">';

	                            \Elementor\Icons_Manager::render_icon( $social_icon['social_icon'], [ 'aria-hidden' => 'true' ] );

	                          	echo '</a> ';
	                      	} 
                        }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
	    }
	}
}