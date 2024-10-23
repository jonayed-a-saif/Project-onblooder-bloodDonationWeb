<?php
/**
 * @Packge     : Webteck
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
 *
 */

    // Block direct access
    if( ! defined( 'ABSPATH' ) ){
        exit();
    }

    // preloader hook function
    if( ! function_exists( 'webteck_preloader_wrap_cb' ) ) {
        function webteck_preloader_wrap_cb() {
            $preloader_display              =  webteck_opt('webteck_display_preloader');

            if( class_exists('ReduxFramework') ){
                if (webteck_opt('webteck_mouse_effect')){
                    echo '<div class="cursor"></div>';
                    echo '<div class="cursor2"></div>';
                }
                if( $preloader_display ){
                    $str = webteck_opt( 'webteck_preloader_text' );
                    $chars = str_split($str);

                    echo '<div id="preloader" class="preloader">';
                        echo '<button class="th-btn th-radius preloaderCls">Cancel Preloader </button>';
                        echo '<div id="loader" class="th-preloader">';
                            echo '<div class="animation-preloader">';
                                echo '<div class="txt-loading">';
                                    foreach ($chars as $char) {
                                        echo '<span preloader-text="'.esc_attr($char).'" class="characters">'.esc_html($char).'</span>';
                                    }

                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
            }
        }
    }

    // Header Hook function
    if( !function_exists('webteck_header_cb') ) {
        function webteck_header_cb( ) {
            get_template_part('templates/header');
            get_template_part('templates/header-menu-bottom');
        }
    }

    // back top top hook function
    if( ! function_exists( 'webteck_back_to_top_cb' ) ) {
        function webteck_back_to_top_cb( ) {
            $backtotop_trigger = webteck_opt('webteck_display_bcktotop');
            if( class_exists( 'ReduxFramework' ) ) {
                if( $backtotop_trigger ) {
                    echo '<!-- Scroll To Top -->';
                    echo '<div class="scroll-top">';
                        echo '<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">';
                            echo '<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>';
                        echo '</svg>';
                    echo '</div>';
                    echo '<!-- End of Scroll To Top Button -->';
                }
            }

        }
    }

    // Blog Start Wrapper Function
    if( !function_exists('webteck_blog_start_wrap_cb') ) {
        function webteck_blog_start_wrap_cb() {
            echo '<section class="th-blog-wrapper space-top space-extra-bottom arrow-wrap">';
                echo '<div class="container">';
                    echo '<div class="row ">';
        }
    }

    // Blog End Wrapper Function
    if( !function_exists('webteck_blog_end_wrap_cb') ) {
        function webteck_blog_end_wrap_cb() {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // Blog Column Start Wrapper Function
    if( !function_exists('webteck_blog_col_start_wrap_cb') ) {
        function webteck_blog_col_start_wrap_cb() {
            if( class_exists('ReduxFramework') ) {
                $webteck_blog_sidebar = webteck_opt('webteck_blog_sidebar');
                if( $webteck_blog_sidebar == '2' && is_active_sidebar('webteck-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7 order-lg-last">';
                } elseif( $webteck_blog_sidebar == '3' && is_active_sidebar('webteck-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('webteck-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }
    // Blog Column End Wrapper Function
    if( !function_exists('webteck_blog_col_end_wrap_cb') ) {
        function webteck_blog_col_end_wrap_cb() {
            echo '</div>';
        }
    }

    // Blog Sidebar
    if( !function_exists('webteck_blog_sidebar_cb') ) {
        function webteck_blog_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_blog_sidebar = webteck_opt('webteck_blog_sidebar');
            } else {
                $webteck_blog_sidebar = 2;
                
            }
            if( $webteck_blog_sidebar != 1 && is_active_sidebar('webteck-blog-sidebar') ) {
                // Sidebar
                get_sidebar();
            }
        }
    }


    if( !function_exists('webteck_blog_details_sidebar_cb') ) {
        function webteck_blog_details_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_blog_single_sidebar = webteck_opt('webteck_blog_single_sidebar');
            } else {
                $webteck_blog_single_sidebar = 4;
            }
            if( $webteck_blog_single_sidebar != 1 ) {
                // Sidebar
                get_sidebar();
            }

        }
    }

    // Blog Pagination Function
    if( !function_exists('webteck_blog_pagination_cb') ) {
        function webteck_blog_pagination_cb( ) {
            get_template_part('templates/pagination');
        }
    }

    // Blog Content Function
    if( !function_exists('webteck_blog_content_cb') ) {
        function webteck_blog_content_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_blog_grid = webteck_opt('webteck_blog_grid');
            } else {
                $webteck_blog_grid = '1';
            }

            if( $webteck_blog_grid == '1' ) {
                $webteck_blog_grid_class = 'col-lg-12';
            } elseif( $webteck_blog_grid == '2' ) {
                $webteck_blog_grid_class = 'col-sm-6';
            } else {
                $webteck_blog_grid_class = 'col-lg-4 col-sm-6';
            }

            echo '<div class="row">';
                if( have_posts() ) {
                    while( have_posts() ) {
                        the_post();
                        echo '<div class="'.esc_attr($webteck_blog_grid_class).'">';
                            get_template_part('templates/content',get_post_format());
                        echo '</div>';
                    }
                    wp_reset_postdata();
                } else{
                    get_template_part('templates/content','none');
                }
            echo '</div>';
        }
    }

    // footer content Function
    if( !function_exists('webteck_footer_content_cb') ) {
        function webteck_footer_content_cb( ) {

            if( class_exists('ReduxFramework') && did_action( 'elementor/loaded' )  ){
                if( is_page() || is_page_template('template-builder.php') ) {
                    $post_id = get_the_ID();

                    // Get the page settings manager
                    $page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

                    // Get the settings model for current post
                    $page_settings_model = $page_settings_manager->get_model( $post_id );

                    // Retrieve the Footer Style
                    $footer_settings = $page_settings_model->get_settings( 'webteck_footer_style' );

                    // Footer Local
                    $footer_local = $page_settings_model->get_settings( 'webteck_footer_builder_option' );

                    // Footer Enable Disable
                    $footer_enable_disable = $page_settings_model->get_settings( 'webteck_footer_choice' );

                    if( $footer_enable_disable == 'yes' ){
                        if( $footer_settings == 'footer_builder' ) {
                            // local options
                            $webteck_local_footer = get_post( $footer_local );
                            echo '<footer>';
                            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $webteck_local_footer->ID );
                            echo '</footer>';
                        } else {
                            // global options
                            $webteck_footer_builder_trigger = webteck_opt('webteck_footer_builder_trigger');
                            if( $webteck_footer_builder_trigger == 'footer_builder' ) {
                                echo '<footer>';
                                $webteck_global_footer_select = get_post( webteck_opt( 'webteck_footer_builder_select' ) );
                                $footer_post = get_post( $webteck_global_footer_select );
                                echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                                echo '</footer>';
                            } else {
                                // wordpress widgets
                                webteck_footer_global_option();
                            }
                        }
                    }
                } else {
                    // global options
                    $webteck_footer_builder_trigger = webteck_opt('webteck_footer_builder_trigger');
                    if( $webteck_footer_builder_trigger == 'footer_builder' ) {
                        echo '<footer>';
                        $webteck_global_footer_select = get_post( webteck_opt( 'webteck_footer_builder_select' ) );
                        $footer_post = get_post( $webteck_global_footer_select );
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_post->ID );
                        echo '</footer>';
                    } else {
                        // wordpress widgets
                        webteck_footer_global_option();
                    }
                }
            } else {
                echo '<div class="footer-wrapper footer-sitcky footer-layout1">';
                    echo '<div class="copyright-wrap">';
                        echo '<div class="container">';
                            echo '<p class="copyright-text text-center">'.sprintf( 'Copyright <i class="fal fa-copyright"></i> %s <a href="%s">%s</a> All Rights Reserved by <a href="%s">%s</a>',date('Y'),esc_url('#'),__( 'Webteck.','webteck' ),esc_url('#'),__( 'Themeholy', 'webteck' ) ).'</p>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

        }
    }

    // blog details wrapper start hook function
    if( !function_exists('webteck_blog_details_wrapper_start_cb') ) {
        function webteck_blog_details_wrapper_start_cb( ) {
            echo '<section class="th-blog-wrapper blog-details space-top space-extra-bottom">';
                echo '<div class="container">';
                    
                    echo '<div class="row">';
        }
    }

    // blog details column wrapper start hook function
    if( !function_exists('webteck_blog_details_col_start_cb') ) {
        function webteck_blog_details_col_start_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_blog_single_sidebar = webteck_opt('webteck_blog_single_sidebar');
                if( $webteck_blog_single_sidebar == '2' && is_active_sidebar('webteck-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7 order-last">';
                } elseif( $webteck_blog_single_sidebar == '3' && is_active_sidebar('webteck-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }

            } else {
                if( is_active_sidebar('webteck-blog-sidebar') ) {
                    echo '<div class="col-xxl-8 col-lg-7">';
                } else {
                    echo '<div class="col-lg-12">';
                }
            }
        }
    }

    // blog details post meta hook function
    if( !function_exists('webteck_blog_post_meta_cb') ) {
        function webteck_blog_post_meta_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_display_post_tag   =  webteck_opt('webteck_display_post_tag');
                $webteck_display_post_date      =  webteck_opt('webteck_display_post_date');
                $webteck_display_post_author      =  webteck_opt('webteck_display_post_author');
                $webteck_display_post_comment      =  webteck_opt('webteck_display_post_comment');
            } else {
                $webteck_display_post_tag   = '1';
                $webteck_display_post_date      = '1';
                $webteck_display_post_author      = '1';
                $webteck_display_post_comment      = '0';
            }

            echo '<!-- Blog Meta -->';
                echo '<div class="blog-meta">';
                    if( $webteck_display_post_author ){
                        echo '<a href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'"><i class="fa-regular fa-user"></i>'.esc_html__('by ','webteck').esc_html( ucwords( get_the_author() ) ).'</a>';
                    }
                    if( $webteck_display_post_date ){
                        echo '<a href="'.esc_url( webteck_blog_date_permalink() ).'"><i class="fal fa-calendar-alt"></i>';
                            echo '<time datetime="'.esc_attr( get_the_date( DATE_W3C ) ).'">'.esc_html( get_the_date() ).'</time>';
                        echo '</a>';
                    }
                    if( $webteck_display_post_comment ){
                        if( get_comments_number() == 1 ){
                            $comment_text = __( ' Comment', 'webteck' );
                        } else {
                            $comment_text = __( ' Comments', 'webteck' );
                        }

                        echo '<a href="'.esc_url( get_comments_link( get_the_ID() ) ).'"><i class="fa-regular fa-comments"></i>'.esc_html( get_comments_number() ).''.$comment_text.'</a>';
                    }
                    if( $webteck_display_post_tag ){
                        $categories = get_the_category();  
                        echo '<a href="'.esc_url( get_category_link( $categories[0]->term_id ) ).'"><i class="fa-regular fa-tag"></i>'.esc_html( $categories[0]->name ).'</a>';
                    }
                echo '</div>';
        }
    }

    // blog details share options hook function
    if( !function_exists('webteck_blog_details_share_options_cb') ) {
        function webteck_blog_details_share_options_cb( ) {
            if ( class_exists('ReduxFramework') ) {
                $webteck_post_details_share_options = webteck_opt('webteck_post_details_share_options');
            } else {
                $webteck_post_details_share_options = false;
            }
            if ( function_exists( 'webteck_social_sharing_buttons' ) && $webteck_post_details_share_options ) {
                echo '<div class="col-md-auto text-xl-end">';
                echo '<span class="share-links-title">'.__( 'Share:', 'webteck' ).'</span>';
                    echo '<ul class="social-links">';
                        echo webteck_social_sharing_buttons();
                    echo '</ul>';
                    echo '<!-- End Social Share -->';
                echo '</div>';
            }
        }
    }

    // Blog Details Post Navigation hook function
    if( !function_exists( 'webteck_blog_details_post_navigation_cb' ) ) {
        function webteck_blog_details_post_navigation_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_post_details_post_navigation = webteck_opt('webteck_post_details_post_navigation');
            } else {
                $webteck_post_details_post_navigation = true;
            }

            $prevpost = get_previous_post();
            $nextpost = get_next_post();

            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );

            if( $webteck_post_details_post_navigation && ! empty( $prevpost ) || !empty( $nextpost ) ) {
                echo '<div class="blog-navigation">';
                    echo '<div>';
                        if( ! empty( $prevpost ) ) {
                            echo '<a href="'.esc_url( get_permalink( $prevpost->ID ) ).'" class="nav-btn prev">';
                            if( class_exists('ReduxFramework') ) {
                                if (has_post_thumbnail( $prevpost->ID )) {
                                    echo get_the_post_thumbnail( $prevpost->ID, 'webteck_80X80' );
                                };
                            }
                                echo '<span class="nav-text">'.esc_html__( ' Previous Post', 'webteck' ).'</span>';
                            echo '</a>';
                        }
                    echo '</div>';

                    echo '<a href="'.get_permalink( get_option( 'page_for_posts' ) ).'" class="blog-btn"><i class="fa-solid fa-grid"></i></a>';

                    echo '<div>';
                        if( ! empty( $nextpost ) ) {
                            echo '<a href="'.esc_url( get_permalink( $nextpost->ID ) ).'" class="nav-btn next">';
                                if( class_exists('ReduxFramework') ) {
                                    if (has_post_thumbnail($nextpost->ID)) {
                                        echo get_the_post_thumbnail( $nextpost->ID, 'webteck_80X80' );
                                    };
                                }
                                echo '<span class="nav-text">'.esc_html__( ' Next Post', 'webteck' ).'</span>';
                            echo '</a>';
                        }
                    echo '</div>';
                echo '</div>';
            }
        }
    }
    
    // blog details author bio hook function
    if( !function_exists('webteck_blog_details_author_bio_cb') ) {
        function webteck_blog_details_author_bio_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $postauthorbox =  webteck_opt( 'webteck_post_details_author_desc_trigger' );
            } else {
                $postauthorbox = '1';
            }
            if( !empty( get_the_author_meta('description')  ) && $postauthorbox == '1' ) {

                echo '<div class="blog-author">';
                    echo '<div class="auhtor-img">';
                        echo webteck_img_tag( array(
                            "url"   => esc_url( get_avatar_url( get_the_author_meta('ID'), array(
                                "size"  => '240'
                                ) ) ),
                            ) );
                    echo '</div>';
                    echo '<div class="media-body">';
                        echo '<h3 class="author-name"><a class="text-inherit" href="'.esc_url( get_author_posts_url( get_the_author_meta('ID') ) ).'">'.esc_html( ucwords( get_the_author() ) ).'</a></h3>';
                        if( ! empty( get_the_author_meta('description') ) ) {
                            echo '<p class="author-text">';
                                echo esc_html( get_the_author_meta('description') );
                            echo '</p>';
                        }

                        $webteck_social_icons = get_user_meta( get_the_author_meta('ID'), '_webteck_social_profile_group',true );

                        if( is_array( $webteck_social_icons ) && !empty( $webteck_social_icons ) ) {
                            echo '<ul class="social-links">';
                            foreach( $webteck_social_icons as $singleicon ) {
                                if( ! empty( $singleicon['_webteck_social_profile_icon'] ) ) {
                                    echo '<li><a href="'.esc_url( $singleicon['_webteck_lawyer_social_profile_link'] ).'"><i class="'.esc_attr( $singleicon['_webteck_social_profile_icon'] ).'"></i></a></li>';
                                }
                            }
                            echo '</ul>';
                        }
                    echo '</div>';
                echo '</div>';
            }

        }
    }

    // Blog Details Comments hook function
    if( !function_exists('webteck_blog_details_comments_cb') ) {
        function webteck_blog_details_comments_cb( ) {
            if ( ! comments_open() ) {
                echo '<div class="blog-comment-area">';
                    echo webteck_heading_tag( array(
                        "tag"   => "h3",
                        "text"  => esc_html__( 'Comments are closed', 'webteck' ),
                        "class" => "inner-title"
                    ) );
                echo '</div>';
            }

            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }
        }
    }

    // Blog Details Column end hook function
    if( !function_exists('webteck_blog_details_col_end_cb') ) {
        function webteck_blog_details_col_end_cb( ) {
            echo '</div>';
        }
    }

    // Blog Details Wrapper end hook function
    if( !function_exists('webteck_blog_details_wrapper_end_cb') ) {
        function webteck_blog_details_wrapper_end_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page start wrapper hook function
    if( !function_exists('webteck_page_start_wrap_cb') ) {
        function webteck_page_start_wrap_cb( ) {
            
            if( is_page( 'cart' ) ){
                $section_class = "th-cart-wrapper space-top space-extra-bottom";
            }elseif( is_page( 'checkout' ) ){
                $section_class = "th-checkout-wrapper space-top space-extra-bottom";
            }elseif( is_page('wishlist') ){
                $section_class = "wishlist-area space-top space-extra-bottom";
            }else{
                $section_class = "space-top space-extra-bottom";  
            }
            echo '<section class="'.esc_attr( $section_class ).'">';
                echo '<div class="container">';
                    echo '<div class="row">';
        }
    }

    // page wrapper end hook function
    if( !function_exists('webteck_page_end_wrap_cb') ) {
        function webteck_page_end_wrap_cb( ) {
                    echo '</div>';
                echo '</div>';
            echo '</section>';
        }
    }

    // page column wrapper start hook function
    if( !function_exists('webteck_page_col_start_wrap_cb') ) {
        function webteck_page_col_start_wrap_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_page_sidebar = webteck_opt('webteck_page_sidebar');
            }else {
                $webteck_page_sidebar = '1';
            }
            if( $webteck_page_sidebar == '2' && is_active_sidebar('webteck-page-sidebar') ) {
                echo '<div class="col-xxl-8 col-lg-7 order-last">';
            } elseif( $webteck_page_sidebar == '3' && is_active_sidebar('webteck-page-sidebar') ) {
                echo '<div class="col-xxl-8 col-lg-7">';
            } else {
                echo '<div class="col-lg-12">';
            }

        }
    }

    // page column wrapper end hook function
    if( !function_exists('webteck_page_col_end_wrap_cb') ) {
        function webteck_page_col_end_wrap_cb( ) {
            echo '</div>';
        }
    }

    // page sidebar hook function
    if( !function_exists('webteck_page_sidebar_cb') ) {
        function webteck_page_sidebar_cb( ) {
            if( class_exists('ReduxFramework') ) {
                $webteck_page_sidebar = webteck_opt('webteck_page_sidebar');
            }else {
                $webteck_page_sidebar = '1';
            }

            if( class_exists('ReduxFramework') ) {
                $webteck_page_layoutopt = webteck_opt('webteck_page_layoutopt');
            }else {
                $webteck_page_layoutopt = '3';
            }

            if( $webteck_page_layoutopt == '1' && $webteck_page_sidebar != 1 ) {
                get_sidebar('page');
            } elseif( $webteck_page_layoutopt == '2' && $webteck_page_sidebar != 1 ) {
                get_sidebar();
            }
        }
    }

    // page content hook function
    if( !function_exists('webteck_page_content_cb') ) {
        function webteck_page_content_cb( ) {
            if(  class_exists('woocommerce') && ( is_woocommerce() || is_cart() || is_checkout() || is_page('wishlist') || is_account_page() )  ) {
                echo '<div class="woocommerce--content">';
            } else {
                echo '<div class="page--content clearfix">';
            }

                the_content();

                // Link Pages
                webteck_link_pages();

            echo '</div>';
            // comment template.
            if ( comments_open() || get_comments_number() ) {
                comments_template();
            }

        }
    }

    if( !function_exists('webteck_blog_post_thumb_cb') ) {
        function webteck_blog_post_thumb_cb( ) {
            if( get_post_format() ) {
                $format = get_post_format();
            }else{
                $format = 'standard';
            }

            $webteck_post_slider_thumbnail = webteck_meta( 'post_format_slider' );

            if( !empty( $webteck_post_slider_thumbnail ) ){ ?>
                <div class="blog-img th-slider" data-slider-options='{"effect":"fade"}'> <?php
                    echo '<div class="swiper-wrapper">';
                        foreach( $webteck_post_slider_thumbnail as $single_image ){
                            echo '<div class="swiper-slide">';
                                echo webteck_img_tag( array(
                                    'url'   => esc_url( $single_image )
                                ) );
                            echo '</div>';
                        }
                        
                    echo '</div>';
                    echo '<button class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>';
                    echo '<button class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>';
                echo '</div>';
            }elseif( has_post_thumbnail() && $format == 'standard' ) {
                echo '<!-- Post Thumbnail -->';
                echo '<div class="blog-img">';
                    if( ! is_single() ){
                        echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                    }

                    the_post_thumbnail();

                    if( ! is_single() ){
                        echo '</a>';
                    }
                echo '</div>';
                echo '<!-- End Post Thumbnail -->';
            }elseif( $format == 'video' ){
                if( has_post_thumbnail() && ! empty ( webteck_meta( 'post_format_video' ) ) ){
                    echo '<div class="blog-img">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            the_post_thumbnail();
                        if( ! is_single() ){
                            echo '</a>';
                        }
                        echo '<a href="'.esc_url( webteck_meta( 'post_format_video' ) ).'" class="popup-video play-btn">';
                            echo '<i class="fas fa-play"></i>';
                        echo '</a>';
                    echo '</div>';
                }elseif( ! has_post_thumbnail() && ! is_single() ){
                    echo '<div class="blog-video">';
                        if( ! is_single() ){
                            echo '<a href="'.esc_url( get_permalink() ).'" class="post-thumbnail">';
                        }
                            echo webteck_embedded_media( array( 'video', 'iframe' ) );
                        if( ! is_single() ){
                            echo '</a>';
                        }
                    echo '</div>';
                }
            }elseif( $format == 'audio' ){
                $webteck_audio = webteck_meta( 'post_format_audio' );
                if( ! empty( $webteck_audio ) ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $webteck_audio );
                    echo '</div>';
                }elseif( ! is_single() ){
                    echo '<div class="blog-audio">';
                        echo wp_oembed_get( $webteck_audio );
                    echo '</div>';
                }
            }

        }
    }

    if( !function_exists('webteck_blog_post_content_cb') ) {
        function webteck_blog_post_content_cb( ) {
            $allowhtml = array(
                'p'         => array(
                    'class'     => array()
                ),
                'span'      => array(),
                'a'         => array(
                    'href'      => array(),
                    'title'     => array()
                ),
                'br'        => array(),
                'em'        => array(),
                'strong'    => array(),
                'b'         => array(),
            );
            if( class_exists( 'ReduxFramework' ) ) {
                $webteck_excerpt_length          = webteck_opt( 'webteck_blog_postExcerpt' );
                $webteck_display_post_category   = webteck_opt( 'webteck_display_post_category' );
            } else {
                $webteck_excerpt_length          = '48';
                $webteck_display_post_category   = '1';
            }

            if( class_exists( 'ReduxFramework' ) ) {
                $webteck_blog_admin = webteck_opt( 'webteck_blog_post_author' );
                $webteck_blog_readmore_setting_val = webteck_opt('webteck_blog_readmore_setting');
                if( $webteck_blog_readmore_setting_val == 'custom' ) {
                    $webteck_blog_readmore_setting = webteck_opt('webteck_blog_custom_readmore');
                } else {
                    $webteck_blog_readmore_setting = __( 'Read More', 'webteck' );
                }
            } else {
                $webteck_blog_readmore_setting = __( 'Read More', 'webteck' );
                $webteck_blog_admin = true;
            }
            echo '<!-- blog-content -->';

                do_action( 'webteck_blog_post_thumb' );
                
                echo '<div class="blog-content">';

                    // Blog Post Meta
                    do_action( 'webteck_blog_post_meta' );

                    echo '<!-- Post Title -->';
                    echo '<h2 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.wp_kses( get_the_title( ), $allowhtml ).'</a></h2>';
                    echo '<!-- End Post Title -->';

                    echo '<!-- Post Summary -->';
                        echo webteck_paragraph_tag( array(
                            "text"  => wp_kses( wp_trim_words( get_the_excerpt(), $webteck_excerpt_length, '' ), $allowhtml ),
                            "class" => 'blog-text',
                        ) );

                        if( !empty( $webteck_blog_readmore_setting ) ){
                            echo '<!-- Button -->';
                                echo '<a href="'.esc_url( get_permalink() ).'" class="th-btn">'.esc_html( $webteck_blog_readmore_setting ).'<i class="fas fa-arrow-right ms-2"></i></a>';
                            echo '<!-- End Button -->';
                        }
                    echo '<!-- End Post Summary -->';
                echo '</div>';
            echo '<!-- End Post Content -->';
        }
    }
