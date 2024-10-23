<?php
/**
 * @Packge     : Traga
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
 *
 */

    // Block direct access

    if( ! defined( 'ABSPATH' ) ){

        exit();

    }

/**

 * Admin Custom Login Logo

 */

function webteck_custom_login_logo() {

    $logo = ! empty( webteck_opt( 'webteck_admin_login_logo', 'url' ) ) ? webteck_opt( 'webteck_admin_login_logo', 'url' ) : '' ;

    if( isset( $logo ) && ! empty( $logo ) ){

        echo '<style type="text/css">body.login div#login h1 a { background-image:url('.esc_url( $logo ).'); }</style>';
    }
}

add_action( 'login_enqueue_scripts', 'webteck_custom_login_logo' );

/**
* Admin Custom css
*/

add_action( 'admin_enqueue_scripts', 'webteck_admin_styles' );

function webteck_admin_styles() {

  if ( ! empty( $webteck_admin_custom_css ) ) {
        $webteck_admin_custom_css = str_replace(array("\r\n", "\r", "\n", "\t", '    '), '', $webteck_admin_custom_css);
        echo '<style rel="stylesheet" id="webteck-admin-custom-css" >';
            echo esc_html( $webteck_admin_custom_css );
        echo '</style>';
    }
}

// share button code for blog

 function webteck_social_sharing_buttons() {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $instagram      = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
    // Add sharing button at the end of page/page content

    $content = '';

    $content .= '<li><a href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>';
    $content .= ' <li><a href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a></li>';
    $content .= ' <li><a href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>';
    $content .= ' <li><a href="'.esc_url( $instagram ).'" target="_blank"><i class="fab fa-instagram"></i></a></li>';


    return $content;

};

// share button code for product single

 function webteck_product_sigle_social_sharing_buttons() {

    // Get page URL

    $URL        = get_permalink();
    $Sitetitle  = get_bloginfo('name');
    // Get page title

    $Title  = str_replace( ' ', '%20', get_the_title());

    // Construct sharing URL without using any script

    $twitterURL     = 'https://twitter.com/share?text='.esc_html( $Title ).'&url='.esc_url( $URL );
    $facebookURL    = 'https://www.facebook.com/sharer/sharer.php?u='.esc_url( $URL );
    $instagram      = 'http://pinterest.com/pin/create/link/?url='.esc_url( $URL ).'&media='.esc_url(get_the_post_thumbnail_url()).'&description='.wp_kses_post(get_the_title());
    $linkedin       = 'https://www.linkedin.com/shareArticle?mini=true&url='.esc_url( $URL ).'&title='.esc_html( $Title );
    // Add sharing button at the end of page/page content

    $content = '';

    $content .= '<a href="'.esc_url( $facebookURL ).'" target="_blank"><i class="fab fa-facebook-f"></i></a>';
    $content .= ' <a href="'. esc_url( $twitterURL ) .'" target="_blank"><i class="fab fa-twitter"></i></a>';
    $content .= ' <a href="'.esc_url( $linkedin ).'" target="_blank"><i class="fab fa-linkedin-in"></i></a>';
    $content .= ' <a href="'.esc_url( $instagram ).'" target="_blank"><i class="fab fa-instagram"></i></a>';


    return $content;

};

//Post Reading Time Count

function webteck_estimated_reading_time() {
    global $post;
    // get the content
    $the_content = $post->post_content;
    // count the number of words
    $words = str_word_count( strip_tags( $the_content ) );
    // rounding off and deviding per 100 words per minute
    $minute = floor( $words / 100 );
    // rounding off to get the seconds
    $second = floor( $words % 100 / ( 100 / 60 ) );
    // calculate the amount of time needed to read
    $estimate = $minute . esc_html__(' Min', 'webteck') . ( $minute == 1 ? '' : 's' ) . esc_html__(' Read', 'webteck');
    // create output
    $output = $estimate;
    // return the estimate
    return $output;
}



//add SVG to allowed file uploads

function webteck_mime_types( $mimes ) {

    $mimes['svg']   = 'image/svg+xml';
    $mimes['svgz']  = 'image/svgz+xml';
    $mimes['exe']   = 'program/exe';
    $mimes['dwg']   = 'image/vnd.dwg';
    return $mimes;
}

add_filter('upload_mimes', 'webteck_mime_types');



function webteck_wp_check_filetype_and_ext( $data, $file, $filename, $mimes ) {

    $wp_filetype        = wp_check_filetype( $filename, $mimes );
    $ext                = $wp_filetype['ext'];
    $type               = $wp_filetype['type'];
    $proper_filename    = $data['proper_filename'];

    return compact( 'ext', 'type', 'proper_filename' );

}

add_filter( 'wp_check_filetype_and_ext', 'webteck_wp_check_filetype_and_ext', 10, 4 );



// Add Image Size

add_image_size( 'webteck_80X80', 80, 80, true );
add_image_size( 'webteck_391X250', 391, 250, true ); 
add_image_size( 'webteck_140X140', 140, 140, true );

remove_filter( 'render_block', 'wp_render_layout_support_flag', 10, 2 );
remove_filter( 'render_block', 'gutenberg_render_layout_support_flag', 10, 2 );