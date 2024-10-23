<?php
    /**
     * Class For Builder
     */
    class TragaBuilder{

        function __construct(){
            // register admin menus
        	add_action( 'admin_menu', [$this, 'register_settings_menus'] );

            // Custom Footer Builder With Post Type
			add_action( 'init',[ $this,'post_type' ],0 );

 		    add_action( 'elementor/frontend/after_enqueue_scripts', [ $this,'widget_scripts'] );

			add_filter( 'single_template', [ $this, 'load_canvas_template' ] );

            add_action( 'elementor/element/wp-page/document_settings/after_section_end', [ $this,'webteck_add_elementor_page_settings_controls' ],10,2 );

		}

		public function widget_scripts( ) {
			wp_enqueue_script( 'webteck-core',WEBTECK_PLUGDIRURI.'assets/js/webteck-core.js',array( 'jquery' ),'1.0',true );
		}


        public function webteck_add_elementor_page_settings_controls( \Elementor\Core\DocumentTypes\Page $page ){

			$page->start_controls_section(
                'webteck_header_option',
                [
                    'label'     => __( 'Header Option', 'webteck' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );


            $page->add_control(
                'webteck_header_style',
                [
                    'label'     => __( 'Header Option', 'webteck' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'webteck' ),
    					'header_builder'       => __( 'Header Builder', 'webteck' ),
    				],
                    'default'   => 'prebuilt',
                ]
			);

            $page->add_control(
                'webteck_header_builder_option',
                [
                    'label'     => __( 'Header Name', 'webteck' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->webteck_header_choose_option(),
                    'condition' => [ 'webteck_header_style' => 'header_builder'],
                    'default'	=> ''
                ]
            );

            $page->end_controls_section();

            $page->start_controls_section(
                'webteck_footer_option',
                [
                    'label'     => __( 'Footer Option', 'webteck' ),
                    'tab'       => \Elementor\Controls_Manager::TAB_SETTINGS,
                ]
            );
            $page->add_control(
    			'webteck_footer_choice',
    			[
    				'label'         => __( 'Enable Footer?', 'webteck' ),
    				'type'          => \Elementor\Controls_Manager::SWITCHER,
    				'label_on'      => __( 'Yes', 'webteck' ),
    				'label_off'     => __( 'No', 'webteck' ),
    				'return_value'  => 'yes',
    				'default'       => 'yes',
    			]
    		);
            $page->add_control(
                'webteck_footer_style',
                [
                    'label'     => __( 'Footer Style', 'webteck' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => [
    					'prebuilt'             => __( 'Pre Built', 'webteck' ),
    					'footer_builder'       => __( 'Footer Builder', 'webteck' ),
    				],
                    'default'   => 'prebuilt',
                    'condition' => [ 'webteck_footer_choice' => 'yes' ],
                ]
            );
            $page->add_control(
                'webteck_footer_builder_option',
                [
                    'label'     => __( 'Footer Name', 'webteck' ),
                    'type'      => \Elementor\Controls_Manager::SELECT,
                    'options'   => $this->webteck_footer_build_choose_option(),
                    'condition' => [ 'webteck_footer_style' => 'footer_builder','webteck_footer_choice' => 'yes' ],
                    'default'	=> 'yes'
                ]
            );

			$page->end_controls_section();

        }

		public function register_settings_menus(){
			add_menu_page(
				esc_html__( 'Webteck Builder', 'webteck' ),
            	esc_html__( 'Webteck Builder', 'webteck' ),
				'manage_options',
				'webteck',
				[$this,'register_settings_contents__settings'],
				'dashicons-admin-site',
				2
			);

			add_submenu_page('webteck', esc_html__('Footer Builder', 'webteck'), esc_html__('Footer Builder', 'webteck'), 'manage_options', 'edit.php?post_type=webteck_footer_build');
			add_submenu_page('webteck', esc_html__('Header Builder', 'webteck'), esc_html__('Header Builder', 'webteck'), 'manage_options', 'edit.php?post_type=webteck_header');
			add_submenu_page('webteck', esc_html__('Tab Builder', 'webteck'), esc_html__('Tab Builder', 'webteck'), 'manage_options', 'edit.php?post_type=webteck_tab_builder');
		}

		// Callback Function
		public function register_settings_contents__settings(){
            echo '<h2>';
			    echo esc_html__( 'Welcome To Header And Footer Builder Of This Theme','webteck' );
            echo '</h2>';
		}

		public function post_type() {

			$labels = array(
				'name'               => __( 'Footer', 'webteck' ),
				'singular_name'      => __( 'Footer', 'webteck' ),
				'menu_name'          => __( 'Webteck Footer Builder', 'webteck' ),
				'name_admin_bar'     => __( 'Footer', 'webteck' ),
				'add_new'            => __( 'Add New', 'webteck' ),
				'add_new_item'       => __( 'Add New Footer', 'webteck' ),
				'new_item'           => __( 'New Footer', 'webteck' ),
				'edit_item'          => __( 'Edit Footer', 'webteck' ),
				'view_item'          => __( 'View Footer', 'webteck' ),
				'all_items'          => __( 'All Footer', 'webteck' ),
				'search_items'       => __( 'Search Footer', 'webteck' ),
				'parent_item_colon'  => __( 'Parent Footer:', 'webteck' ),
				'not_found'          => __( 'No Footer found.', 'webteck' ),
				'not_found_in_trash' => __( 'No Footer found in Trash.', 'webteck' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'webteck_footer_build', $args );

			$labels = array(
				'name'               => __( 'Header', 'webteck' ),
				'singular_name'      => __( 'Header', 'webteck' ),
				'menu_name'          => __( 'Webteck Header Builder', 'webteck' ),
				'name_admin_bar'     => __( 'Header', 'webteck' ),
				'add_new'            => __( 'Add New', 'webteck' ),
				'add_new_item'       => __( 'Add New Header', 'webteck' ),
				'new_item'           => __( 'New Header', 'webteck' ),
				'edit_item'          => __( 'Edit Header', 'webteck' ),
				'view_item'          => __( 'View Header', 'webteck' ),
				'all_items'          => __( 'All Header', 'webteck' ),
				'search_items'       => __( 'Search Header', 'webteck' ),
				'parent_item_colon'  => __( 'Parent Header:', 'webteck' ),
				'not_found'          => __( 'No Header found.', 'webteck' ),
				'not_found_in_trash' => __( 'No Header found in Trash.', 'webteck' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'webteck_header', $args );

			$labels = array(
				'name'               => __( 'Tab Builder', 'webteck' ),
				'singular_name'      => __( 'Tab Builder', 'webteck' ),
				'menu_name'          => __( 'Gesund Tab Builder', 'webteck' ),
				'name_admin_bar'     => __( 'Tab Builder', 'webteck' ),
				'add_new'            => __( 'Add New', 'webteck' ),
				'add_new_item'       => __( 'Add New Tab Builder', 'webteck' ),
				'new_item'           => __( 'New Tab Builder', 'webteck' ),
				'edit_item'          => __( 'Edit Tab Builder', 'webteck' ),
				'view_item'          => __( 'View Tab Builder', 'webteck' ),
				'all_items'          => __( 'All Tab Builder', 'webteck' ),
				'search_items'       => __( 'Search Tab Builder', 'webteck' ),
				'parent_item_colon'  => __( 'Parent Tab Builder:', 'webteck' ),
				'not_found'          => __( 'No Tab Builder found.', 'webteck' ),
				'not_found_in_trash' => __( 'No Tab Builder found in Trash.', 'webteck' ),
			);

			$args = array(
				'labels'              => $labels,
				'public'              => true,
				'rewrite'             => false,
				'show_ui'             => true,
				'show_in_menu'        => false,
				'show_in_nav_menus'   => false,
				'exclude_from_search' => true,
				'capability_type'     => 'post',
				'hierarchical'        => false,
				'supports'            => array( 'title', 'elementor' ),
			);

			register_post_type( 'webteck_tab_builder', $args );
		}

		function load_canvas_template( $single_template ) {

			global $post;

			if ( 'webteck_footer_build' == $post->post_type || 'webteck_header' == $post->post_type || 'webteck_tab_build' == $post->post_type ) {

				$elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';

				if ( file_exists( $elementor_2_0_canvas ) ) {
					return $elementor_2_0_canvas;
				} else {
					return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
				}
			}

			return $single_template;
		}

        public function webteck_footer_build_choose_option(){

			$webteck_post_query = new WP_Query( array(
				'post_type'			=> 'webteck_footer_build',
				'posts_per_page'	    => -1,
			) );

			$webteck_builder_post_title = array();
			$webteck_builder_post_title[''] = __('Select a Footer','Webteck');

			while( $webteck_post_query->have_posts() ) {
				$webteck_post_query->the_post();
				$webteck_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $webteck_builder_post_title;

		}

		public function webteck_header_choose_option(){

			$webteck_post_query = new WP_Query( array(
				'post_type'			=> 'webteck_header',
				'posts_per_page'	    => -1,
			) );

			$webteck_builder_post_title = array();
			$webteck_builder_post_title[''] = __('Select a Header','Traga');

			while( $webteck_post_query->have_posts() ) {
				$webteck_post_query->the_post();
				$webteck_builder_post_title[ get_the_ID() ] =  get_the_title();
			}
			wp_reset_postdata();

			return $webteck_builder_post_title;

        }

    }

    $builder_execute = new TragaBuilder();