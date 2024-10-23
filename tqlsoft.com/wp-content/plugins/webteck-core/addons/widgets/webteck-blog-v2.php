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
class Webteck_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'webteckblogpost';
	}

	public function get_title() {
		return __( 'Webteck Blog Post v2', 'webteck' );
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
			'layout_style',
			[
				'label' 		=> __( 'Brand Style', 'webteck' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'layout_one',
				'options' 		=> [
					'layout_one'  		=> __( 'Style One', 'webteck' ),
     //                'layout_two'        => __( 'Style Two', 'webteck' ),
     //                'layout_three'      => __( 'Style Three', 'webteck' ),
					// 'layout_four'  	       => __( 'Style Four', 'webteck' ),
				],

			]
		);
		// $this->add_control(
		// 	'image',
		// 	[
		// 		'label' 		=> __( 'Choose Image', 'webteck' ),
		// 		'type' 			=> Controls_Manager::MEDIA,
		// 		'dynamic' 		=> [
		// 			'active' 		=> true,
		// 		],
		// 		'condition'	=> [
  //                   'layout_style' => ['layout_two']
  //               ]
		// 	]
		// );
  //       $this->add_control(
		// 	'section_subtitle',
		// 	[
		// 		'label' 	=> __( 'Section Subtitle', 'webteck' ),
  //               'type' 		=> Controls_Manager::TEXTAREA,
  //               'default'  	=> __( 'Section Subtitle', 'webteck' ),
		// 		'condition'	=> [
  //                   'layout_style' => ['layout_two']
  //               ]
		// 	]
  //       );
		// $this->add_control(
		// 	'section_title',
		// 	[
		// 		'label' 	=> __( 'Section Title', 'webteck' ),
  //               'type' 		=> Controls_Manager::TEXTAREA,
  //               'default'  	=> __( 'Section Title', 'webteck' ),
		// 		'condition'	=> [
  //                   'layout_style' => ['layout_two']
  //               ]
		// 	]
  //       );
        $this->add_control(
            'blog_post_count',
            [
                'label'     => __( 'No of Post to show', 'webteck' ),
                'type'      => Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'   => __( '4', 'webteck' )
            ]
        );
        $this->add_control(
			'blog_post_count2',
			[
				'label' 	=> __( 'No of Post to show right', 'webteck' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'webteck' ),
                'condition' => [
                    'layout_style' => ['layout_two']
                ]
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'webteck' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '5', 'webteck' ),
			]
		);
		$this->add_control(
			'con_count',
			[
				'label' 	=> __( 'Excerpt Length', 'webteck' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '16', 'webteck' ),
			]
		);

        $this->add_control(
            'blog_post_order',
            [
                'label'     => __( 'Order', 'webteck' ),
                'type'      => Controls_Manager::SELECT,
                'options'   => [
                    'ASC'       => __('ASC','webteck'),
                    'DESC'      => __('DESC','webteck'),
                ],
                'default'   => 'DESC'
            ]
        );
        $this->add_control(
			'blog_post_order2',
			[
				'label' 	=> __( 'Order 2', 'webteck' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','webteck'),
                    'DESC'   	=> __('DESC','webteck'),
                ],
                'default'  	=> 'DESC',
                'condition' => [
                    'layout_style' => ['layout_two']
                ]
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


         $this->start_controls_section(
			'section_title_style_section',
			[
				'label' => __( 'Style', 'webteck' ),
				'tab' 	=> Controls_Manager::TAB_STYLE,
			]
		);

        webteck_all_elementor_style($this, 'Title', '{{WRAPPER}} .title-selector',['layout_one'], '--title-color' );


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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count2'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count2'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count2'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count2'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count2'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count2'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
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
            $args2 = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count2'] ),
                'order'                 => esc_attr( $settings['blog_post_order2'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }


        $blogpost = new WP_Query( $args );
        $blogpost2 = new WP_Query( $args2 );

        if( $settings['layout_style'] == 'layout_one' ){

        	echo '<div class="slider-area">';
                echo '<div class="swiper th-slider has-shadow" id="blogSlider4" data-slider-options=\'{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}\'>';
                    echo '<div class="swiper-wrapper">';
                    	while( $blogpost->have_posts() ) {$blogpost->the_post();
                            $categories = get_the_category();
                        
	                        echo '<div class="swiper-slide">';
	                            echo '<div class="blog-box2">';
	                                echo '<div class="blog-img">';
	                                    the_post_thumbnail( 'webteck_312X241' );
	                                echo '</div>';
	                                echo '<div class="blog-box2_content">';
	                                    echo '<p class="blog-tag">'.esc_html( $categories[0]->name ).'</p>';
	                                    echo '<div class="blog-meta">';
	                                        echo '<a href="'.esc_url( webteck_blog_date_permalink() ).'"><i class="far fa-calendar"></i>'.esc_html( get_the_date( 'd M,Y' ) ).'</a>';
	                                        echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="far fa-user"></i>By '.esc_html( get_the_author() ).'</a>';
	                                    echo '</div>';
	                                    echo '<h3 class="box-title title-selector"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
	                                    if(!empty($settings['read_more'])){
		                                    echo '<a href="'.esc_url( get_permalink() ).'" class="line-btn">'.esc_html($settings['read_more']).'<i class="fa-solid fa-angles-right"></i></a>';
		                                }
	                                echo '</div>';
	                            echo '</div>';
	                        echo '</div>';
	                    }
	                    wp_reset_postdata();
                    echo '</div>';
                echo '</div>';
                echo '<button data-slider-prev="#blogSlider4" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                echo '<button data-slider-next="#blogSlider4" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
            echo '</div>';

        }
	}
}