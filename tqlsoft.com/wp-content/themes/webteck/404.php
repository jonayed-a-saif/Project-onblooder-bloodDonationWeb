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

    //title//
    if (webteck_opt( 'webteck_fof_title' )){
        $webteck404title        = webteck_opt( 'webteck_fof_title' );  
    } else {
        $webteck404title        = __( 'OooPs! Page Not Found', 'webteck' );
    }
    

    //description//
    if (webteck_opt( 'webteck_fof_description' )){
        $webteck404description  = webteck_opt( 'webteck_fof_description' );  
    } else {
        $webteck404description  = __( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'webteck' );
    }

    //404  image//
    if (webteck_opt( 'webteck_404_img','url' )){
        $webteck404img          = webteck_opt( 'webteck_404_img','url' );
    } else {
        $webteck404img          = ''.WEBTECK_DIR_ASSIST_URI.'img/theme-img/error.svg';
    }

    //button text//
    if (webteck_opt( 'webteck_fof_btn_text' )){
        $webteck404btntext      = webteck_opt( 'webteck_fof_btn_text' );  
    } else {
        $webteck404btntext      = __( ' Back To Home', 'webteck' );
    }



    
    // get header
    get_header();

    echo '<div class="bg-auto space">';
        echo '<div class="container">';
            echo '<div class="error-img">';
                echo webteck_img_tag( array(
                    'url'   => esc_url($webteck404img),
                ) ); 
            echo '</div>';
            echo '<div class="error-content">';
                echo '<h2 class="error-title">'.esc_html( $webteck404title ).'</h2>';
                echo '<p class="error-text">'.esc_html( $webteck404description ).'</p>';
                echo '<a href="'.esc_url( home_url('/') ).'" class="th-btn"><i class="far fa-home me-2"></i>'.esc_html( $webteck404btntext ).'</a>';
            echo '</div>';
        echo '</div>';
    echo '</div>';

    //footer
    get_footer();