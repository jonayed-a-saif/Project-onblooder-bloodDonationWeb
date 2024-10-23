<?php
/**
 * @Packge     : Webteck
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
 *
 */

    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit();
    }

    if( defined( 'CMB2_LOADED' )  ){
        if( !empty( webteck_meta('page_breadcrumb_area') ) ) {
            $webteck_page_breadcrumb_area  = webteck_meta('page_breadcrumb_area');
        } else {
            $webteck_page_breadcrumb_area = '1';
        }
    }else{
        $webteck_page_breadcrumb_area = '1';
    }
    
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array()
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
        'sub'       => array(),
        'sup'       => array(),
    );
    
    if(  is_page() || is_page_template( 'template-builder.php' )  ) {
        if( $webteck_page_breadcrumb_area == '1' ) {
            echo '<!-- Page title 2 -->';
            echo '<div class="breadcumb-wrapper">';
                echo '<div class="container z-index-common">';
                    echo '<div class="breadcumb-content">';
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {
                            if( !empty( webteck_meta('page_breadcrumb_settings') ) ) {
                                if( webteck_meta('page_breadcrumb_settings') == 'page' ) {
                                    $webteck_page_title_switcher = webteck_meta('page_title');
                                } else {
                                    $webteck_page_title_switcher = webteck_opt('webteck_page_title_switcher');
                                }
                            } else {
                                $webteck_page_title_switcher = '1';
                            }
                        } else {
                            $webteck_page_title_switcher = '1';
                        }

                        if( $webteck_page_title_switcher ){
                            if( class_exists( 'ReduxFramework' ) ){
                                $webteck_page_title_tag    = webteck_opt('webteck_page_title_tag');
                            }else{
                                $webteck_page_title_tag    = 'h1';
                            }

                            if( defined( 'CMB2_LOADED' )  ){
                                if( !empty( webteck_meta('page_title_settings') ) ) {
                                    $webteck_custom_title = webteck_meta('page_title_settings');
                                } else {
                                    $webteck_custom_title = 'default';
                                }
                            }else{
                                $webteck_custom_title = 'default';
                            }

                            if( $webteck_custom_title == 'default' ) {
                                echo webteck_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $webteck_page_title_tag ),
                                        "text"  => esc_html( get_the_title( ) ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                echo webteck_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $webteck_page_title_tag ),
                                        "text"  => esc_html( webteck_meta('custom_page_title') ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            }

                        }
                        if( defined('CMB2_LOADED') || class_exists('ReduxFramework') ) {

                            if( webteck_meta('page_breadcrumb_settings') == 'page' ) {
                                $webteck_breadcrumb_switcher = webteck_meta('page_breadcrumb_trigger');
                            } else {
                                $webteck_breadcrumb_switcher = webteck_opt('webteck_enable_breadcrumb');
                            }

                        } else {
                            $webteck_breadcrumb_switcher = '1';
                        }

                        if( $webteck_breadcrumb_switcher == '1' && (  is_page() || is_page_template( 'template-builder.php' ) )) {
                            webteck_breadcrumbs(
                                array(
                                    'breadcrumbs_classes' => 'nav',
                                )
                            );
                        }
                    echo '</div>';
                   
                echo '</div>';
            echo '</div>';
            echo '<!-- End of Page title -->';
            
        }
    } else {
        if ( class_exists( 'ReduxFramework' ) && is_shop()){
            $woo_class = 'custom-woo-class';
        }elseif(is_404()){
            $woo_class = 'custom-fof-class';
        }elseif(is_search()){
            $woo_class = 'custom-search-class';
        }elseif(is_archive()){
            $woo_class = 'custom-archive-class';
        }else{
            $woo_class = '';
        }
        echo '<!-- Page title 3 -->';
        echo '<div class="breadcumb-wrapper '.esc_attr($woo_class).'">';
            echo '<div class="container z-index-common">';
                echo '<div class="breadcumb-content">';
                    if( class_exists( 'ReduxFramework' )  ){
                        $webteck_page_title_switcher  = webteck_opt('webteck_page_title_switcher');
                    }else{
                        $webteck_page_title_switcher = '1';
                    }

                    if( $webteck_page_title_switcher ){
                        if( class_exists( 'ReduxFramework' ) ){
                            $webteck_page_title_tag    = webteck_opt('webteck_page_title_tag');
                        }else{
                            $webteck_page_title_tag    = 'h1';
                        }
                        if( class_exists('woocommerce') && is_shop() ) {
                            echo webteck_heading_tag(
                                array(
                                    "tag"   => esc_attr( $webteck_page_title_tag ),
                                    "text"  => wp_kses( woocommerce_page_title( false ), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_archive() ){
                            echo webteck_heading_tag(
                                array(
                                    "tag"   => esc_attr( $webteck_page_title_tag ),
                                    "text"  => wp_kses( get_the_archive_title(), $allowhtml ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif ( is_home() ){
                            $webteck_blog_page_title_setting = webteck_opt('webteck_blog_page_title_setting');
                            $webteck_blog_page_title_switcher = webteck_opt('webteck_blog_page_title_switcher');
                            $webteck_blog_page_custom_title = webteck_opt('webteck_blog_page_custom_title');
                            if( class_exists('ReduxFramework') ){
                                if( $webteck_blog_page_title_switcher ){
                                    echo webteck_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $webteck_page_title_tag ),
                                            "text"  => !empty( $webteck_blog_page_custom_title ) && $webteck_blog_page_title_setting == 'custom' ? esc_html( $webteck_blog_page_custom_title) : esc_html__( 'Latest News', 'webteck' ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }else{
                                echo webteck_heading_tag(
                                    array(
                                        "tag"   => "h1",
                                        "text"  => esc_html__( 'Latest News', 'webteck' ),
                                        'class' => 'breadcumb-title',
                                    )
                                );
                            }
                        }elseif( is_search() ){
                            echo webteck_heading_tag(
                                array(
                                    "tag"   => esc_attr( $webteck_page_title_tag ),
                                    "text"  => esc_html__( 'Search Result', 'webteck' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_404() ){
                            echo webteck_heading_tag(
                                array(
                                    "tag"   => esc_attr( $webteck_page_title_tag ),
                                    "text"  => esc_html__( '404 PAGE', 'webteck' ),
                                    'class' => 'breadcumb-title'
                                )
                            );
                        }elseif( is_singular( 'product' ) ){
                            $posttitle_position  = webteck_opt('webteck_product_details_title_position');
                            $postTitlePos = false;
                            if( class_exists( 'ReduxFramework' ) ){
                                if( $posttitle_position && $posttitle_position != 'header' ){
                                    $postTitlePos = true;
                                }
                            }else{
                                $postTitlePos = false;
                            }

                            if( $postTitlePos != true ){
                                echo webteck_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $webteck_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $webteck_post_details_custom_title  = webteck_opt('webteck_product_details_custom_title');
                                }else{
                                    $webteck_post_details_custom_title = __( 'Shop Details','webteck' );
                                }

                                if( !empty( $webteck_post_details_custom_title ) ) {
                                    echo webteck_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $webteck_page_title_tag ),
                                            "text"  => wp_kses( $webteck_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }else{
                            $posttitle_position  = webteck_opt('webteck_post_details_title_position');
                            $postTitlePos = false;
                            if( is_single() ){
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }
                            if( is_singular( 'product' ) ){
                                $posttitle_position  = webteck_opt('webteck_product_details_title_position');
                                $postTitlePos = false;
                                if( class_exists( 'ReduxFramework' ) ){
                                    if( $posttitle_position && $posttitle_position != 'header' ){
                                        $postTitlePos = true;
                                    }
                                }else{
                                    $postTitlePos = false;
                                }
                            }

                            if( $postTitlePos != true ){
                                echo webteck_heading_tag(
                                    array(
                                        "tag"   => esc_attr( $webteck_page_title_tag ),
                                        "text"  => wp_kses( get_the_title( ), $allowhtml ),
                                        'class' => 'breadcumb-title'
                                    )
                                );
                            } else {
                                if( class_exists( 'ReduxFramework' ) ){
                                    $webteck_post_details_custom_title  = webteck_opt('webteck_post_details_custom_title');
                                }else{
                                    $webteck_post_details_custom_title = __( 'Blog Details','webteck' );
                                }

                                if( !empty( $webteck_post_details_custom_title ) ) {
                                    echo webteck_heading_tag(
                                        array(
                                            "tag"   => esc_attr( $webteck_page_title_tag ),
                                            "text"  => wp_kses( $webteck_post_details_custom_title, $allowhtml ),
                                            'class' => 'breadcumb-title'
                                        )
                                    );
                                }
                            }
                        }
                    }
                    if( class_exists('ReduxFramework') ) {
                        $webteck_breadcrumb_switcher = webteck_opt( 'webteck_enable_breadcrumb' );
                    } else {
                        $webteck_breadcrumb_switcher = '1';
                    }
                    if( $webteck_breadcrumb_switcher == '1' ) {
                        webteck_breadcrumbs(
                            array(
                                'breadcrumbs_classes' => 'nav',
                            )
                        );
                    }
                echo '</div>';                
            echo '</div>';
        echo '</div>';
        echo '<!-- End of Page title -->';
    }