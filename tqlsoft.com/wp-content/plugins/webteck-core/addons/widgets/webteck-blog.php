<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Blog Post Widget .
 *
 */
class Traga_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'tragablogpost';
	}

	public function get_title() {
		return __( 'Webteck Blog Post', 'webteck' );
	}

	public function get_icon() {
		return 'th-icon';
    }

	public function get_categories() {
		return [ 'webteck' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'webteck' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'Number of Post to show', 'webteck' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'webteck' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'webteck' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '8', 'webteck' ),
			]
		);
		$this->add_control(
			'show_blog_text',
			[
				'label' 		=> __( 'Show Blog Content ?', 'webteck' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Show', 'webteck' ),
				'label_off' 	=> __( 'Hide', 'webteck' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);
		$this->add_control(
			'con_count',
			[
				'label' 	=> __( 'Content Length', 'webteck' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '15', 'webteck' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'webteck' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','webteck'),
                    'DESC'   	=> __('DESC','webteck'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'webteck' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'webteck' ),
                    'author'    => __( 'Author', 'webteck' ),
                    'title'    	=> __( 'Title', 'webteck' ),
                    'date'    	=> __( 'Date', 'webteck' ),
                    'rand'    	=> __( 'Random', 'webteck' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'webteck' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->webteck_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'webteck' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->webteck_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'webteck' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->webteck_post_id(),
			]
        );
        $this->add_control(
			'read_more',
			[
				'label' 	=> __( 'Read More Text', 'webteck' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Read More', 'webteck' ),
			]
        );
        $this->end_controls_section();

        

		/*----------------------------------------- General styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'General Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'con_bg_color',
			[
				'label' 		=> __( 'Background Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .blog-content'	=> 'background-color: {{VALUE}};',
				],
			]
        );
        $this->end_controls_section();


        /*-----------------------------------------meta styling------------------------------------*/

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'meta_hvr_color',
			[
				'label' 		=> __( 'Meta Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'webteck' ),
				'selector' 	=> '{{WRAPPER}} .blog-meta a',
			]
		);

		$this->add_control(
			'admin_color',
			[
				'label' 		=> __( 'Author Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card .author' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'author_typography',
				'label' 	=> __( 'Author Typography', 'webteck' ),
				'selector' 	=> '{{WRAPPER}} .blog-card .author',
			]
		);
		$this->end_controls_section();

		/*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
			'blog_title_styling',
			[
				'label' 	=> __( 'Title Styling', 'webteck' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'blog_title_color',
			[
				'label' 		=> __( 'Title Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .box-title'	=> 'color: {{VALUE}};',
				]
			]
        );
        $this->add_control(
			'blog_title_hvr_color',
			[
				'label' 		=> __( 'Title Hover Color', 'webteck' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .box-title a:hover'	=> '--theme-color: {{VALUE}};',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'blog_title_typography',
		 		'label' 		=> esc_html__( 'Title Typography', 'webteck' ),
		 		'selector' 		=> '{{WRAPPER}} .box-title',
		 	]
		);

        $this->add_responsive_control(
			'blog_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .box-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'blog_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'webteck' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .box-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();
    }

    public function webteck_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'webteck');
        }

        return $catarr;
    }

    public function webteck_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'webteck');
        }

        return $catarr;
    }

    // Get Specific Post
    public function webteck_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $webteck_post = new WP_Query( $args );

        $postarray = [];

        while( $webteck_post->have_posts() ){
            $webteck_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }


        $blogpost = new WP_Query( $args );

        

        echo '<div class="slider-area">';
	    	echo '<div class="swiper th-slider has-shadow" id="blogSlider1" data-slider-options=\'{"loop":true,"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}\'>';
	    		echo '<div class="swiper-wrapper">';
		            while( $blogpost->have_posts() ) {$blogpost->the_post();
		            	$post_tags = get_the_tags();
		            	
		        		echo '<div class="swiper-slide">';
		                    echo '<div class="blog-card">';
		                        if(has_post_thumbnail()){
			                        echo '<div class="blog-img">';
			                            the_post_thumbnail('webteck_391X250');
			                        echo '</div>';
			                    }
		                        echo '<div class="blog-content">';
		                            echo '<div class="blog-meta">';
		                                echo '<a href="'.esc_url( webteck_blog_date_permalink() ).'"><i class="fa-light fa-calendar-days"></i>'.esc_html( get_the_date( 'd M, Y' ) ).'</a>';
										if( get_comments_number() == 1 ){
				                            $comment_text = __( ' Comment', 'webteck' );
				                        }else{
				                            $comment_text = __( ' Comments', 'webteck' );
				                        }
				                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'" class="comment"><i class="fa-regular fa-comments"></i> '.esc_html( get_comments_number() ).''.$comment_text.'</a>';
		                            echo '</div>';
		                            if( get_the_title() ){
			                            echo '<h3 class="box-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
			                        }
		                            if ( ($settings['show_blog_text']) == 'yes' ){
			                            echo '<p class="box-text">'.esc_html( wp_trim_words( get_the_content(), $settings['con_count'], '' ) ).'</p>';
			                        }
		                            echo '<div class="blog-bottom">';
										echo '<a class="author" href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'">'.
										webteck_img_tag( array(
											"url"   => esc_url( get_avatar_url( get_the_author_meta('ID'), array() ) ),
											"width"  => 30,
											"height"  => 30
										) )
										.esc_html__('By ', 'acadu').esc_html( ucwords( get_the_author() ) ).'</a>';
		                            	if(!empty($settings['read_more'])){
				                            echo '<a href="'.esc_url( get_permalink() ).'" class="line-btn">'.esc_html($settings['read_more']).'<i class="fas fa-arrow-right"></i></a>';
				                        }
		                            echo '</div>';
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';     
			        }
				echo '</div>';
			echo '</div>';
			echo '<button data-slider-prev="#blogSlider1" class="slider-arrow style3 slider-prev"><i class="far fa-arrow-left"></i></button>';
            echo '<button data-slider-next="#blogSlider1" class="slider-arrow style3 slider-next"><i class="far fa-arrow-right"></i></button>';
		echo '</div>';
	}
}