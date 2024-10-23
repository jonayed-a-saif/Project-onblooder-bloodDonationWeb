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
 * Team Box Widget .
 *
 */
class Webteck_Team extends Widget_Base {

	public function get_name() {
		return 'webteckteam';
	}

	public function get_title() {
		return __( 'Team v2', 'webteck' );
	}


	public function get_icon() {
		return 'th-icon';
    }


	public function get_categories() {
		return [ 'webteck' ];
	}


	protected function register_controls() {

		$this->start_controls_section(
			'teamd_section',
			[
				'label' 	=> __( 'Team', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'layout_style',
			[
				'label' 		=> __( 'Team Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
					'layout_two'  		=> __( 'Style Two', 'webteck' ),
				]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label' 		=> __( 'Name', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXTAREA,
				'default' 		=> __( 'Safe Cleaning Supplies' , 'webteck' ),
				'rows' 			=> 2,
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'profile_link',
			[
				'label' 		=> esc_html__( 'Profile Link', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'designation', [
				'label' 		=> __( 'Designation', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::TEXT,
				'default' 		=> __( 'Customer' , 'webteck' ),
				'label_block' 	=> true,
			]
		);
		$repeater->add_control(
			'team_image',
			[
				'label' 		=> esc_html__( 'Speaker Image', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::MEDIA,
				'default' 		=> [
					'url' =>  \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'fb_link',
			[
				'label' 		=> esc_html__( 'Facebook Link', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'twitter_link',
			[
				'label' 		=> esc_html__( 'Twitter Link', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
				'default' 		=> [
					'url' 			=> '#',
					'is_external' 	=> false,
					'nofollow' 		=> false,
				],
			]
		);
		$repeater->add_control(
			'linkedin_link',
			[
				'label' 		=> esc_html__( 'Linkedin Link', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
			]
		);
		$repeater->add_control(
			'insta_link',
			[
				'label' 		=> esc_html__( 'Instagram Link', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::URL,
				'placeholder' 	=> esc_html__( 'https://your-link.com', 'webteck' ),
				'show_external' => true,
			]
		);

		$this->add_control(
			'team_members',
			[
				'label' 		=> __( 'Team Member', 'webteck' ),
				'type' 			=> \Elementor\Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						'title' 		=> __( 'Your Name', 'webteck' ),
					],
				],
				'title_field' 	=> '{{{ name }}}',
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

		webteck_all_elementor_style($this, 'Name', '{{WRAPPER}} .title-selector',['layout_one','layout_two'], 'color' );
		webteck_all_elementor_style($this, 'Designation', '{{WRAPPER}} .desig-selector',['layout_one','layout_two'], 'color' );

        $this->end_controls_section();

       
	}

	protected function render() {

        $settings = $this->get_settings_for_display();

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="slider-area">'; ?>
                <div class="swiper th-slider has-shadow" id="teamSlider2" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}'> <?php
                    echo '<div class="swiper-wrapper">';
                       
                       	foreach( $settings['team_members'] as $data ) {
		            		$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

							$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
							$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

							$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
							$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

							$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
							$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';

							$i_target = $data['insta_link']['is_external'] ? ' target="_blank"' : '';
							$i_nofollow = $data['insta_link']['nofollow'] ? ' rel="nofollow"' : '';

	                        echo '<!-- Single Item -->';
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="th-team team-card2">';
	                                echo '<div class="team-img">';
	                                    if( ! empty( $data['team_image']['url'] ) ){
				                            echo webteck_img_tag( array(
					                            'url'       => esc_url( $data['team_image']['url'] ),
					                        ) );
					                    }
	                                    echo '<div class="social-links">';
	                                        if( ! empty( $data['fb_link']['url']) ){
				                                echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
				                            }
				                            if( ! empty( $data['twitter_link']['url']) ){
				                                echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
				                            }
				                            if( ! empty( $data['linkedin_link']['url']) ){
				                                echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
				                            }
				                            if( ! empty( $data['insta_link']['url']) ){
				                                echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['insta_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
				                            }
	                                    echo '</div>';
	                                echo '</div>';
	                                echo '<div class="box-content">';
	                                    echo '<div class="media-body">';
	                                    	if( ! empty( $data['name']) ){
						                        echo '<h3 class="box-title title-selector"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
						                    }
	                                        if( ! empty( $data['designation']) ){
						                        echo '<span class="team-desig desig-selector">'.esc_html($data['designation']).'</span>';
						                    }
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#teamSlider2" class="slider-arrow style2 slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#teamSlider2" class="slider-arrow style2 slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';
	                
	    }else{
	    	echo '<div class="slider-area">';
                echo '<div class="swiper th-slider has-shadow" id="teamSlider5" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"3"},"1200":{"slidesPerView":"4"}}}\'>';
                    echo '<div class="swiper-wrapper">';

                        foreach( $settings['team_members'] as $data ) {
		            		$target = $data['profile_link']['is_external'] ? ' target="_blank"' : '';
							$nofollow = $data['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

							$f_target = $data['fb_link']['is_external'] ? ' target="_blank"' : '';
							$f_nofollow = $data['fb_link']['nofollow'] ? ' rel="nofollow"' : '';

							$t_target = $data['twitter_link']['is_external'] ? ' target="_blank"' : '';
							$t_nofollow = $data['twitter_link']['nofollow'] ? ' rel="nofollow"' : '';

							$l_target = $data['linkedin_link']['is_external'] ? ' target="_blank"' : '';
							$l_nofollow = $data['linkedin_link']['nofollow'] ? ' rel="nofollow"' : '';

							$i_target = $data['insta_link']['is_external'] ? ' target="_blank"' : '';
							$i_nofollow = $data['insta_link']['nofollow'] ? ' rel="nofollow"' : '';

	                        echo '<!-- Single Item -->';
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="th-team team-card3">';
	                                echo '<div class="team-img">';
	                                    if( ! empty( $data['team_image']['url'] ) ){
				                            echo webteck_img_tag( array(
					                            'url'       => esc_url( $data['team_image']['url'] ),
					                        ) );
					                    }
	                                echo '</div>';
	                                echo '<div class="box-content">';
	                                    echo '<div class="social-links">';
	                                        if( ! empty( $data['fb_link']['url']) ){
				                                echo '<a '.wp_kses_post( $f_nofollow.$f_target ).' href="'.esc_url( $data['fb_link']['url'] ).'"><i class="fab fa-facebook-f"></i></a>';
				                            }
				                            if( ! empty( $data['twitter_link']['url']) ){
				                                echo '<a '.wp_kses_post( $t_nofollow.$t_target ).' href="'.esc_url( $data['twitter_link']['url'] ).'"><i class="fab fa-twitter"></i></a>';
				                            }
				                            if( ! empty( $data['linkedin_link']['url']) ){
				                                echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['linkedin_link']['url'] ).'"><i class="fab fa-linkedin-in"></i></a>';
				                            }
				                            if( ! empty( $data['insta_link']['url']) ){
				                                echo '<a '.wp_kses_post( $l_nofollow.$l_target ).' href="'.esc_url( $data['insta_link']['url'] ).'"><i class="fab fa-instagram"></i></a>';
				                            }
	                                    echo '</div>';
	                                    echo '<div class="media-body">';
	                                        if( ! empty( $data['name']) ){
						                        echo '<h3 class="box-title title-selector"><a '.wp_kses_post( $nofollow.$target ).' href="'.esc_url( $data['profile_link']['url'] ).'">'.esc_html($data['name']).'</a></h3>';
						                    }
	                                        if( ! empty( $data['designation']) ){
						                        echo '<span class="team-desig desig-selector">'.esc_html($data['designation']).'</span>';
						                    }
	                                    echo '</div>';
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#teamSlider5" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#teamSlider5" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';
	    }
	}
}