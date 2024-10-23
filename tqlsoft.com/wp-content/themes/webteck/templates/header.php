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

    if( class_exists( 'ReduxFramework' ) && defined('ELEMENTOR_VERSION') ) {
        if( is_page() || is_page_template('template-builder.php') ) {
            $webteck_post_id = get_the_ID();

            // Get the page settings manager
            $webteck_page_settings_manager = \Elementor\Core\Settings\Manager::get_settings_managers( 'page' );

            // Get the settings model for current post
            $webteck_page_settings_model = $webteck_page_settings_manager->get_model( $webteck_post_id );

            // Retrieve the color we added before
            $webteck_header_style = $webteck_page_settings_model->get_settings( 'webteck_header_style' );
            $webteck_header_builder_option = $webteck_page_settings_model->get_settings( 'webteck_header_builder_option' );

            if( $webteck_header_style == 'header_builder'  ) {

                if( !empty( $webteck_header_builder_option ) ) {
                    $webteckheader = get_post( $webteck_header_builder_option );
                    echo '<header class="header">';
                        echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $webteckheader->ID );
                    echo '</header>';
                }
            } else {
                // global options
                $webteck_header_builder_trigger = webteck_opt('webteck_header_options');
                if( $webteck_header_builder_trigger == '2' ) {
                    echo '<header>';
                    $webteck_global_header_select = get_post( webteck_opt( 'webteck_header_select_options' ) );
                    $header_post = get_post( $webteck_global_header_select );
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $header_post->ID );
                    echo '</header>';
                } else {
                    // wordpress Header
                    webteck_global_header_option();
                }
            }
        } else {
            $webteck_header_options = webteck_opt('webteck_header_options');
            if( $webteck_header_options == '1' ) {
                webteck_global_header_option();
            } else {
                $webteck_header_select_options = webteck_opt('webteck_header_select_options');
                $webteckheader = get_post( $webteck_header_select_options );
                echo '<header class="header">';
                    echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $webteckheader->ID );
                echo '</header>';
            }
        }
    } else {
        webteck_global_header_option();
    }