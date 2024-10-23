<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit();
}
/**
 * @Packge     : Webteck
 * @Version    : 1.0
 * @Author     : Themeholy
 * @Author URI : https://www.themeholy.com/
 *
 */

// enqueue css
function webteck_common_custom_css(){
	wp_enqueue_style( 'webteck-color-schemes', get_template_directory_uri().'/assets/css/color.schemes.css' );

    $CustomCssOpt  = webteck_opt( 'webteck_css_editor' );
	if( $CustomCssOpt ){
		$CustomCssOpt = $CustomCssOpt;
	} else {
		$CustomCssOpt = '';
	}

    $customcss = "";
    
    if( get_header_image() ){
        $webteck_header_bg =  get_header_image();
    } else {
        if( webteck_meta( 'page_breadcrumb_settings' ) == 'page' ){
            if( ! empty( webteck_meta( 'breadcumb_image' ) ) ){
                $webteck_header_bg = webteck_meta( 'breadcumb_image' );
            }
        }
    }
    
    if( !empty( $webteck_header_bg ) ){
        $customcss .= ".breadcumb-wrapper{
            background-image:url('{$webteck_header_bg}')!important;
        }";
    }
    
	// theme color
	$webteckthemecolor = webteck_opt('webteck_theme_color');

    if ($webteckthemecolor !== null) {
        list($r, $g, $b) = sscanf( $webteckthemecolor, "#%02x%02x%02x");
        $webteck_real_color = $r.','.$g.','.$b;
        if( !empty( $webteckthemecolor ) ) {
            $customcss .= ":root {
            --theme-color: rgb({$webteck_real_color});
            }";
        }
    }

    // theme body font
    $webteckthemebodyfont = webteck_opt('webteck_theme_body_typography', 'font-family');
    if( !empty( $webteckthemebodyfont ) ) {
        $customcss .= ":root {
          --body-font: $webteckthemebodyfont ;
        }";
    }

    // theme title font
    $webteckthemetitlefont = webteck_opt('webteck_theme_title_typography', 'font-family');
    if( !empty( $webteckthemetitlefont ) ) {
        $customcss .= ":root {
          --title-font: $webteckthemetitlefont ;
        }";
    }

	if( !empty( $CustomCssOpt ) ){
		$customcss .= $CustomCssOpt;
	}

    wp_add_inline_style( 'webteck-color-schemes', $customcss );
}
add_action( 'wp_enqueue_scripts', 'webteck_common_custom_css', 100 );