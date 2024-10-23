<?php
/**
 * @Packge     : Webteck
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */
function webteck_essential_scripts() {

    wp_enqueue_style( 'webteck-style', get_stylesheet_uri() ,array(), wp_get_theme()->get( 'Version' ) );

    // google font
    wp_enqueue_style( 'webteck-fonts', webteck_google_fonts() ,array(), null );

    // Bootstrap Min
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) ,array(), '5.0.0' ); 

    // Font Awesome Five
    wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/fontawesome.min.css' ) ,array(), '6.0.0' );

    // Magnific Popup
    wp_enqueue_style( 'magnific-popup', get_theme_file_uri( '/assets/css/magnific-popup.min.css' ), array(), '1.0' );

    // Slick css
    wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.min.css' ) ,array(), '4.0.13' );
    wp_enqueue_style( 'swiper-bundle', get_theme_file_uri( '/assets/css/swiper-bundle.min.css' ) ,array(), '4.0.13' );

    // webteck main style
    wp_enqueue_style( 'webteck-main-style', get_theme_file_uri('/assets/css/style.css') ,array(), wp_get_theme()->get( 'Version' ) );


    // Load Js

    // Bootstrap
    wp_enqueue_script( 'bootstrap', get_theme_file_uri( '/assets/js/bootstrap.min.js' ), array( 'jquery' ), '5.0.0', true );

    // Slick
    wp_enqueue_script( 'slick', get_theme_file_uri( '/assets/js/slick.min.js' ), array('jquery'), '1.0.0', true );

    // isotpe
    wp_enqueue_script( 'isotope-pkgd', get_theme_file_uri( '/assets/js/isotope.pkgd.min.js' ), array('jquery'), '1.0.0', true );

    // magnific popup
    wp_enqueue_script( 'magnific-popup', get_theme_file_uri( '/assets/js/jquery.magnific-popup.min.js' ), array('jquery'), '1.0.0', true );

    // counterup
    wp_enqueue_script( 'counterup', get_theme_file_uri( '/assets/js/jquery.counterup.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'gsap', get_theme_file_uri( '/assets/js/gsap.min.js' ), array('jquery'), '1.0.0', true );

    // Circle Progress
    wp_enqueue_script( 'circle-progress', get_theme_file_uri( '/assets/js/circle-progress.js' ), array('jquery'), '1.0.0', true );

    // particle
    wp_enqueue_script( 'particle', get_theme_file_uri( '/assets/js/particles.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'jquery-ui', get_theme_file_uri( '/assets/js/jquery-ui.min.js' ), array('jquery'), '1.0.0', true );

    // particles-config
    wp_enqueue_script( 'particles-config', get_theme_file_uri( '/assets/js/particles-config.js' ), array('jquery'), '1.0.0', true );
    
    // tilt
    wp_enqueue_script( 'tilt', get_theme_file_uri( '/assets/js/tilt.jquery.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'swiper-bundle', get_theme_file_uri( '/assets/js/swiper-bundle.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'ScrollTrigger', get_theme_file_uri( '/assets/js/ScrollTrigger.min.js' ), array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'smooth-scroll', get_theme_file_uri( '/assets/js/smooth-scroll.js' ), array('jquery'), '1.0.0', true );

    //Imagesloaded
    wp_enqueue_script( 'imagesloaded' );
    
    // main script
    wp_enqueue_script( 'webteck-main-script', get_theme_file_uri( '/assets/js/main.js' ), array('jquery'), wp_get_theme()->get( 'Version' ), true );

    // comment reply
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'webteck_essential_scripts',99 );


function webteck_block_editor_assets( ) {
    // Add custom fonts.
    wp_enqueue_style( 'webteck-editor-fonts', webteck_google_fonts(), array(), null );
}

add_action( 'enqueue_block_editor_assets', 'webteck_block_editor_assets' );

/*
Register Fonts
*/
function webteck_google_fonts() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
     
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'webteck' ) ) {
        $font_url =  'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,700&family=Roboto:wght@300;400;500;700;900&display=swap';
    }
    return $font_url;
}