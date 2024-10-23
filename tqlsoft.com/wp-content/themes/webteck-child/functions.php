<?php
/**
 *
 * @Packge      webteck 
 * @Author      Themeholy
 * @Author URL  https://themeforest.net/user/themeholy 
 * @version     1.0
 *
 */

/**
 * Enqueue style of child theme
 */
function webteck_child_enqueue_styles() {

    wp_enqueue_style( 'webteck-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'webteck-child-style', get_stylesheet_directory_uri() . '/style.css',array( 'webteck-style' ),wp_get_theme()->get('Version'));
}
add_action( 'wp_enqueue_scripts', 'webteck_child_enqueue_styles', 100000 );