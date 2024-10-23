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
    exit;
}

 // theme option callback
function webteck_opt( $id = null, $url = null ){
    global $webteck_opt;

    if( $id && $url ){

        if( isset( $webteck_opt[$id][$url] ) && $webteck_opt[$id][$url] ){
            return $webteck_opt[$id][$url];
        }
    }else{
        if( isset( $webteck_opt[$id] )  && $webteck_opt[$id] ){
            return $webteck_opt[$id];
        }
    }
}

// theme logo
function webteck_theme_logo() {
    // escaping allow html
    $allowhtml = array(
        'a'    => array(
            'href' => array()
        ),
        'span' => array(),
        'i'    => array(
            'class' => array()
        )
    );
    $siteUrl = home_url('/');
    if( has_custom_logo() ) {
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $siteLogo = '';
        $siteLogo .= '<a class="logo" href="'.esc_url( $siteUrl ).'">';
        $siteLogo .= webteck_img_tag( array(
            "class" => "img-fluid",
            "url"   => esc_url( wp_get_attachment_image_url( $custom_logo_id, 'full') )
        ) );
        $siteLogo .= '</a>';

        return $siteLogo;
    } elseif( !webteck_opt('webteck_text_title') && webteck_opt('webteck_site_logo', 'url' )  ){

        $siteLogo = '<img class="img-fluid" src="'.esc_url( webteck_opt('webteck_site_logo', 'url' ) ).'" alt="'.esc_attr( get_bloginfo('name') ).'" />';
        return '<a class="logo" href="'.esc_url( $siteUrl ).'">'.$siteLogo.'</a>';


    }elseif( webteck_opt('webteck_text_title') ){
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.wp_kses( webteck_opt('webteck_text_title'), $allowhtml ).'</a></h2>';
    }else{
        return '<h2 class="mb-0"><a class="logo" href="'.esc_url( $siteUrl ).'">'.esc_html( get_bloginfo('name') ).'</a></h2>';
    }
}

// custom meta id callback
function webteck_meta( $id = '' ){
    $value = get_post_meta( get_the_ID(), '_webteck_'.$id, true );
    return $value;
}


// Blog Date Permalink
function webteck_blog_date_permalink() {
    $year  = get_the_time('Y');
    $month_link = get_the_time('m');
    $day   = get_the_time('d');
    $link = get_day_link( $year, $month_link, $day);
    return $link;
}

//audio format iframe match
function webteck_iframe_match() {
    $audio_content = webteck_embedded_media( array('audio', 'iframe') );
    $iframe_match = preg_match("/\iframe\b/i",$audio_content, $match);
    return $iframe_match;
}


//Post embedded media
function webteck_embedded_media( $type = array() ){
    $content = do_shortcode( apply_filters( 'the_content', get_the_content() ) );
    $embed   = get_media_embedded_in_content( $content, $type );


    if( in_array( 'audio' , $type) ){
        if( count( $embed ) > 0 ){
            $output = str_replace( '?visual=true', '?visual=false', $embed[0] );
        }else{
           $output = '';
        }

    }else{
        if( count( $embed ) > 0 ){
            $output = $embed[0];
        }else{
           $output = '';
        }
    }
    return $output;
}


// WP post link pages
function webteck_link_pages(){
    wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'webteck' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'webteck' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
    ) );
}


// Data Background image attr
function webteck_data_bg_attr( $imgUrl = '' ){
    return 'data-bg-img="'.esc_url( $imgUrl ).'"';
}

// image alt tag
function webteck_image_alt( $url = '' ){
    if( $url != '' ){
        // attachment id by url
        $attachmentid = attachment_url_to_postid( esc_url( $url ) );
       // attachment alt tag
        $image_alt = get_post_meta( esc_html( $attachmentid ) , '_wp_attachment_image_alt', true );
        if( $image_alt ){
            return $image_alt ;
        }else{
            $filename = pathinfo( esc_url( $url ) );
            $alt = str_replace( '-', ' ', $filename['filename'] );
            return $alt;
        }
    }else{
       return;
    }
}


// Flat Content wysiwyg output with meta key and post id

function webteck_get_textareahtml_output( $content ) {
    global $wp_embed;

    $content = $wp_embed->autoembed( $content );
    $content = $wp_embed->run_shortcode( $content );
    $content = wpautop( $content );
    $content = do_shortcode( $content );

    return $content;
}

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */

function webteck_pingback_header() {
    if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'webteck_pingback_header' );


// Excerpt More
function webteck_excerpt_more( $more ) {
    return '...';
}

add_filter( 'excerpt_more', 'webteck_excerpt_more' );


// webteck comment template callback
function webteck_comment_callback( $comment, $args, $depth ) {
        $add_below = 'comment';
    ?>
    <li <?php comment_class( array('th-comment-item') ); ?>>
        <div id="comment-<?php comment_ID() ?>" class="th-post-comment">
            <?php
                if( get_avatar( $comment, 100 )  ) :
            ?>
            <!-- Author Image -->
            <div class="comment-avater">
                <?php
                    if ( $args['avatar_size'] != 0 ) {
                        echo get_avatar( $comment, 110 );
                    }
                ?>
            </div>
            <!-- Author Image -->
            <?php
                endif;
            ?>
            <!-- Comment Content -->
            <div class="comment-content">
                <span class="commented-on"> <i class="fal fa-calendar-alt"></i> <?php printf( esc_html__('%1$s', 'webteck'), get_comment_date() ); ?> </span>
                <h3 class="name"><?php echo esc_html( ucwords( get_comment_author() ) ); ?></h3>
                <?php comment_text(); ?>
                <div class="reply_and_edit">
                    <?php
                        $reply_text = wp_kses_post( '<i class="fas fa-reply"></i> Reply', 'webteck' );

                        $edit_reply_text = wp_kses_post( '<i class="fas fa-pencil-alt"></i> Edit', 'webteck' );

                        comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 3, 'max_depth' => 5, 'reply_text' => $reply_text ) ) );
                        edit_comment_link( $edit_reply_text, '  ', '' );
                    ?>  
                </div>
                <?php if ( $comment->comment_approved == '0' ) : ?>
                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'webteck' ); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Comment Content -->
<?php
}

//body class
add_filter( 'body_class', 'webteck_body_class' );
function webteck_body_class( $classes ) {


    if( class_exists('ReduxFramework') ) {
        $webteck_blog_single_sidebar = webteck_opt('webteck_blog_single_sidebar');
        if( ($webteck_blog_single_sidebar != '2' && $webteck_blog_single_sidebar != '3' ) || ! is_active_sidebar('webteck-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
        $new_class = is_page() ? webteck_meta('custom_body_class') : null;

        if ( $new_class ) {
            $classes[] = $new_class;
        }
    } else {
        if( !is_active_sidebar('webteck-blog-sidebar') ) {
            $classes[] = 'no-sidebar';
        }
    }
    return $classes;
}


function webteck_footer_global_option(){
    // Webteck Widget Enable Disable
    if ( class_exists( 'ReduxFramework' ) ){
        $webteck_footer_widget_enable                  = webteck_opt( 'webteck_footerwidget_enable' );
        $webteck_footer_logo                           = webteck_opt( 'webteck_footer_logo','url' );
        $webteck_footer_shape_1                        = webteck_opt( 'webteck_footer_shape_1','url' );
        // $webteck_footer_shape_3                        = webteck_opt( 'webteck_footer_shape_3','url' );
        $webteck_footer_shape_2                        = webteck_opt( 'webteck_footer_shape_2' );
        $footer_contact_phone_label                  = webteck_opt( 'footer_contact_phone_label' );
        $footer_contact_phone_number                 = webteck_opt( 'footer_contact_phone_number' );
        $footer_contact_email_label                  = webteck_opt( 'footer_contact_email_label' );
        $footer_contact_email                        = webteck_opt( 'footer_contact_email' );
        $footer_contact_location_label               = webteck_opt( 'footer_contact_location_label' );
        $footer_contact_location                     = webteck_opt( 'footer_contact_location' );
        $footer_contact_location_url                 = webteck_opt( 'footer_contact_location_url' );
        $webteck_footer_bottom_active                  = webteck_opt( 'webteck_disable_footer_bottom' );
        $webteck_footer_top_active                     = webteck_opt( 'webteck_footer_top_active' );
    } else {
        $webteck_footer_widget_enable                  = '';
        $webteck_footer_logo                           = '';
        $webteck_footer_shape_1                        = '';
        // $webteck_footer_shape_3                        = '';
        $webteck_footer_shape_2                        = '1';
        $footer_contact_phone_label                  = '';
        $footer_contact_phone_number                 = '';
        $footer_contact_email_label                  = '';
        $footer_contact_email                        = '';
        $footer_contact_location_label               = '';
        $footer_contact_location                     = '';
        $footer_contact_location_url                 = '';
        $webteck_footer_bottom_active                  = '1';
        $webteck_footer_top_active                     = '1';
    }
    $allowhtml = array(
        'p'         => array(
            'class'     => array()
        ),
        'i'         => array(
            'class'     => array()
        ),
        'span'      => array(
            'class'     => array(),
        ),
        'a'         => array(
            'href'      => array(),
            'title'     => array(),
            'class'     => array(),
        ),
        'br'        => array(),
        'em'        => array(),
        'strong'    => array(),
        'b'         => array(),
    );

    if ( $webteck_footer_widget_enable == '1' || $webteck_footer_bottom_active == '1' ){
        echo '<!-- Footer Area -->';
        echo '<footer class="footer-wrapper footer-layout1 footer-custom">';

            if ( $webteck_footer_top_active == '1' ){
                echo '<div class="footer-top">';
                    echo '<div class="logo-bg"></div>';
                    echo '<div class="container">';
                        echo '<div class="row align-items-center">';
                            echo '<div class="col-xl-3">';
                                echo '<div class="footer-logo">';
                                    echo '<a href="home-startup-company.html">';
                                        echo '<img src="'.esc_url($webteck_footer_logo).'" alt="'.esc_attr('Logo', 'webteck').'">';
                                    echo '</a>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="col-xl-9">';
                                echo '<div class="footer-contact-wrap">';
                                    if ( $footer_contact_phone_label || $footer_contact_phone_number ){
                                        echo '<div class="footer-contact">';
                                            echo '<div class="footer-contact_icon">';
                                                echo '<i class="fas fa-phone"></i>';
                                            echo '</div>';
                                            echo '<div class="media-body">';
                                                echo '<span class="footer-contact_text">' .esc_html($footer_contact_phone_label). '</span>';
                                                echo '<a href="tel:' .esc_html(preg_replace('/[^+\d]/', '', $footer_contact_phone_number)). '" class="footer-contact_link">' .esc_html($footer_contact_phone_number). '</a>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                    
                                    if ( $footer_contact_email_label || $footer_contact_email ){
                                        echo '<div class="footer-contact">';
                                            echo '<div class="footer-contact_icon">';
                                                echo '<i class="fas fa-envelope"></i>';
                                            echo '</div>';
                                            echo '<div class="media-body">';
                                                echo '<span class="footer-contact_text">' .esc_html($footer_contact_email_label). '</span>';
                                                echo '<a href="mailto:' .esc_html($footer_contact_email). '" class="footer-contact_link">' .esc_html($footer_contact_email). '</a>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                    
                                    if ( $footer_contact_location || $footer_contact_location_label ){
                                        echo '<div class="footer-contact">';
                                            echo '<div class="footer-contact_icon">';
                                                echo '<i class="fas fa-location-dot"></i>';
                                            echo '</div>';
                                            echo '<div class="media-body">';
                                                echo '<span class="footer-contact_text">' .esc_html($footer_contact_location_label). '</span>';
                                                echo '<a href="' .esc_html($footer_contact_location_url). '" class="footer-contact_link">' .esc_html($footer_contact_location). '</a>';
                                            echo '</div>';
                                        echo '</div>';
                                    }
                                    
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            }

            echo '<div class="widget-area">';
                echo '<div class="container">';
                    echo '<div class="row justify-content-between">';
                            if( is_active_sidebar( 'webteck-footer-1' )){
                                dynamic_sidebar( 'webteck-footer-1' ); 
                            }
                            if( is_active_sidebar( 'webteck-footer-2' )){
                                dynamic_sidebar( 'webteck-footer-2' ); 
                            }
                            if( is_active_sidebar( 'webteck-footer-3' )){
                                dynamic_sidebar( 'webteck-footer-3' ); 
                            }
                            if( is_active_sidebar( 'webteck-footer-4' )){
                                dynamic_sidebar( 'webteck-footer-4' ); 
                            }
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<div class="copyright-wrap bg-title">';
                echo '<div class="container">';
                    echo '<div class="row justify-content-between align-items-center">';
                        echo '<div class="col-lg-6">';
                            echo '<p class="copyright-text">'.wp_kses( webteck_opt( 'webteck_copyright_text' ), $allowhtml ).'</p>';
                        echo '</div>';
                        if ( has_nav_menu( 'footer-menu' ) ){
                            echo '<div class="col-lg-6 text-end d-none d-lg-block">';
                                echo '<div class="footer-links">';
                                    wp_nav_menu( array(
                                        'theme_location'  => 'footer-menu',
                                    ) );
                                echo '</div>';
                            echo '</div>';
                        }
                    echo '</div>';
                echo '</div>'; 
            echo '</div>';
            echo '<div class="shape-left">';
                echo '<img src="'.esc_url($webteck_footer_shape_1).'" alt="'.esc_attr('shape', 'webteck').'">';
            echo '</div>';
            if ( $webteck_footer_shape_2 == '1' ){
                echo '<div class="shape-right">';
                    echo '<div class="footer-particle" id="particle-12"></div>';
                echo '</div>';
            }
        echo '</footer>';
    }
}

function webteck_social_icon(){
    $webteck_social_icon = webteck_opt( 'webteck_social_links' );
    if( ! empty( $webteck_social_icon ) && isset( $webteck_social_icon ) ){
        foreach( $webteck_social_icon as $social_icon ){
            if( ! empty( $social_icon['title'] ) ){
                echo '<a href="'.esc_url( $social_icon['url'] ).'"><i class="'.esc_attr( $social_icon['title'] ).'"></i></a> ';
            }
        }
    }
}

// global header
function webteck_global_header_option() {
    
    if( class_exists( 'ReduxFramework' ) ){

        $webteck_header_btn_text             = webteck_opt('webteck_header_btn_text');
        $webteck_btn_url                     = webteck_opt('webteck_btn_url');
        $webteck_search_enable               = webteck_opt( 'webteck_search_enable' );
        $webteck_sticky_enable               = webteck_opt( 'webteck_sticky_enable' );
        $webteck_cart_enable                 = webteck_opt( 'webteck_cart_enable' );
        $webteck_emargency_contact_number    = webteck_opt( 'webteck_emargency_contact_number' );

        //validation phone number
        $replace        = array(' ','-',' - ', '(', ')');
        $with           = array('','','', '', '');

        if ($webteck_emargency_contact_number !== null) {
            $phoneurl = str_replace( $replace, $with, $webteck_emargency_contact_number );
        }
        // Webteck Widget Enable Disable
        echo webteck_search_box();
        echo webteck_mobile_menu();

        global $woocommerce;
        if( ! empty( $woocommerce->cart->cart_contents_count ) ){
          $count = $woocommerce->cart->cart_contents_count;
        }else{
          $count = "0";
        }

            echo '<!--Sidebar start-->';
            echo '<div class="sidemenu-wrapper d-none d-lg-block ">';
                echo '<div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>';
                echo '<div class="shopping-cart-wrapper">';
                    echo '<div class="widget widget_shopping_cart">';
                        echo '<h3 class="widget_title">'.esc_html__( 'Shopping cart', 'webteck' ).'</h3>';
                        echo '<div class="widget_shopping_cart_content">';
                            woocommerce_mini_cart();
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!--Sidebar end-->';
        
        echo '<header class="th-header header-layout1">';
            webteck_header_topbar();

            if ( $webteck_sticky_enable ) {
                $sticky_class = 'sticky-wrapper';
            } else {
                $sticky_class = 'no-sticky';
            }
            echo '<div class="'.$sticky_class.'">';
                echo '<div class="menu-area">';
                    echo '<div class="container">';
                        echo '<div class="row align-items-center justify-content-between">';
                            echo '<div class="col-auto">';
                                echo '<div class="header-logo">';
                                    echo webteck_theme_logo();
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="col-auto">';
                                if( has_nav_menu( 'primary-menu' ) ) {
                                    echo '<nav class="main-menu d-none d-lg-inline-block">';
                                        wp_nav_menu( array(
                                            "theme_location"    => 'primary-menu',
                                            "container"         => '',
                                            "menu_class"        => ''
                                        ) );
                                    echo '</nav>';
                                }
                                echo '<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
                            echo '</div>';
                        echo ' <div class="col-auto d-none d-lg-block">';
                                echo '<div class="header-button">';
                                    if ($webteck_search_enable){
                                        echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
                                    }
                                    if ($webteck_cart_enable ){
                                        if ( ! empty( $woocommerce->cart->cart_contents_count ) ){
                                        $count = $woocommerce->cart->cart_contents_count;
                                        } else {
                                        $count = "0";
                                        }
                                        echo '<button type="button" class="icon-btn sideMenuToggler">';
                                            echo '<i class="far fa-cart-shopping"></i>';
                                            echo '<span class="cart-count badge">'.esc_html( $count ).'</span>';
                                        echo '</button>';
                                    }
                                    if (!empty($webteck_header_btn_text)){
                                        echo '<a href="'.esc_url($webteck_btn_url).'" class="th-btn style3">'.esc_html( $webteck_header_btn_text ).'<i class="fas fa-arrow-right ms-1"></i></a>';
                                    }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="logo-bg"></div>';
                echo '</div>';   
            echo '</div>';
             
        echo '</header>';
    } else {
        webteck_global_header();
    }
}

// webteck woocommerce breadcrumb
function webteck_woo_breadcrumb( $args ) {
    return array(
        'delimiter'   => '',
        'wrap_before' => '<ul class="breadcumb-menu">',
        'wrap_after'  => '</ul>',
        'before'      => '<li>',
        'after'       => '</li>',
        'home'        => _x( 'Home', 'breadcrumb', 'webteck' ),
    );
}

add_filter( 'woocommerce_breadcrumb_defaults', 'webteck_woo_breadcrumb' );

function webteck_custom_search_form( $class ) {
    echo '<!-- Search Form -->';

    echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'" class="'.esc_attr( $class ).'">';
        echo '<label class="searchIcon">';
            echo webteck_img_tag( array(
                "url"   => esc_url( get_theme_file_uri( '/assets/img/search-2.svg' ) ),
                "class" => "svg"
            ) );
            echo '<input value="'.esc_html( get_search_query() ).'" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'webteck').'">';
        echo '</label>';
    echo '</form>';
    echo '<!-- End Search Form -->';
}

//Fire the wp_body_open action.
if ( ! function_exists( 'wp_body_open' ) ) {
    function wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

//Remove Tag-Clouds inline style
add_filter( 'wp_generate_tag_cloud', 'webteck_remove_tagcloud_inline_style',10,1 );
function webteck_remove_tagcloud_inline_style( $input ){
   return preg_replace('/ style=("|\')(.*?)("|\')/','',$input );
}

function webteck_setPostViews( $postID ) {
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        $count = 0;
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
    }else{
        $count++;
        update_post_meta( $postID, $count_key, $count );
    }
}

function webteck_getPostViews( $postID ){
    $count_key  = 'post_views_count';
    $count      = get_post_meta( $postID, $count_key, true );
    if( $count == '' ){
        delete_post_meta( $postID, $count_key );
        add_post_meta( $postID, $count_key, '0' );
        return __( '0', 'webteck' );
    }
    return $count;
}


/* This code filters the Categories archive widget to include the post count inside the link */
add_filter( 'wp_list_categories', 'webteck_cat_count_span' );
function webteck_cat_count_span( $links ) {
    $links = str_replace('</a> (', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}

/* This code filters the Archive widget to include the post count inside the link */
add_filter( 'get_archives_link', 'webteck_archive_count_span' );
function webteck_archive_count_span( $links ) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="category-number">', $links);
    $links = str_replace(')', '</span>', $links);
    return $links;
}
//header search box
if(! function_exists('webteck_search_box')){
    function webteck_search_box(){
        echo '<div class="popup-search-box d-none d-lg-block  ">';
            echo '<button class="searchClose border-theme text-theme"><i class="fal fa-times"></i></button>';
            echo '<form role="search" method="get" action="'.esc_url( home_url( '/' ) ).'">';
                echo '<input value="'.esc_html( get_search_query() ).'" class="border-theme" name="s" required type="search" placeholder="'.esc_attr__('What are you looking for?', 'webteck').'">';
                echo '<button type="submit"><i class="fal fa-search"></i></button>';
            echo '</form>';
        echo '</div>';
    }
}
//header mobile menu
if(! function_exists('webteck_mobile_menu')){
    function webteck_mobile_menu(){
        echo '<!--==========Mobile Menu============= -->';
        echo '<div class="th-menu-wrapper">';
            echo '<div class="th-menu-area text-center">';
                echo '<button class="th-menu-toggle"><i class="fal fa-times"></i></button>';
                echo '<div class="mobile-logo">';
                    echo webteck_theme_logo();
                echo '</div>';
                echo '<div class="th-mobile-menu">';
                    if( has_nav_menu( 'primary-menu' ) ) {
                        echo '<div class="th-mobile-menu">';
                            wp_nav_menu( array(
                                "theme_location"    => 'primary-menu',
                                "container"         => '',
                                "menu_class"        => ''
                            ) );
                        echo '</div>';
                    }
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}


// Webteck Default Header for unit test
if( ! function_exists( 'webteck_global_header' ) ){
    function webteck_global_header(){
        echo webteck_search_box();
        echo webteck_mobile_menu();

        if( class_exists( 'ReduxFramework' ) ){ 
            $class = '';
        } else {
            $class = 'unittest-header';
        }

        echo '<!--======== Header ========-->';
        echo '<header class="th-header header-layout1 ' . esc_attr($class) . ' ">';
           echo ' <div class="sticky-wrapper">';
                echo '<div class="sticky-active">';
                    echo '<div class="menu-area">';
                        echo '<div class="container">';
                            echo '<div class="row gx-20 align-items-center justify-content-between">';
                                echo '<div class="col-auto">';
                                    echo '<div class="header-logo">';
                                        echo webteck_theme_logo();
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="col-auto">';
                                    if( has_nav_menu( 'primary-menu' ) ) {
                                        echo '<nav class="main-menu d-none d-lg-inline-block">';
                                            wp_nav_menu( array(
                                                "theme_location"    => 'primary-menu',
                                                "container"         => '',
                                                "menu_class"        => ''
                                            ) );
                                        echo '</nav>';
                                    }                                    
                                    echo '</nav>';
                                    echo '<button type="button" class="th-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>';
                                echo '</div>';
                                echo '<div class="col-auto d-none d-xl-block">';
                                    echo '<div class="header-button">';
                                        echo '<button type="button" class="icon-btn searchBoxToggler"><i class="far fa-search"></i></button>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</header>';
    }
}

/**
 *This is custom Function for showning default Topbar entity
 *if you want you may add the custom entity from redux option
 *before adding entity in thid function you must add the required fild into theme uption file 
 */

if ( ! function_exists( 'webteck_header_topbar' ) ){
    function webteck_header_topbar(){

        $user_id                   = get_current_user_id();
        $user                      = get_user_by('ID', $user_id);
        
        $webteck_show_header_topbar          = webteck_opt( 'webteck_header_topbar_switcher' );
        $webteck_show_social_icon            = webteck_opt( 'webteck_header_topbar_social_icon_switcher' );
        $webteck_menu_topbar_location        = webteck_opt( 'webteck_menu_topbar_location' );
        $webteck_menu_topbar_phone           = webteck_opt( 'webteck_menu_topbar_phone' );
        $webteck_menu_topbar_email           = webteck_opt( 'webteck_menu_topbar_email' );
        $webteck_menu_topbar_social_title    = webteck_opt( 'webteck_menu_topbar_social_title' );

        if( $webteck_show_header_topbar ){
            $allowhtml = array(
                'a'    => array(
                    'href' => array(),
                    'class' => array()
                ),
                'u'    => array(
                    'class' => array()
                ),
                'span' => array(
                    'class' => array()
                ),
                'i'    => array(
                    'class' => array()
                )
            );
            echo '<!--header-top-wrapper start-->';

            echo '<div class="header-top">';
                echo '<div class="container">';
                    echo '<div class="row justify-content-center justify-content-lg-between align-items-center gy-2">';
                        
                        echo '<div class="col-auto d-none d-lg-block">';
                            echo '<div class="header-links">';
                                echo '<ul>';
                                    if (!empty($webteck_menu_topbar_location)) {
                                        echo '<li><i class="fas fa-map-location"></i>' .esc_html($webteck_menu_topbar_location). '</li>';
                                    };
                                    if (!empty($webteck_menu_topbar_phone)) {
                                        echo '<li><i class="fas fa-phone"></i><a href="tel:' .esc_html(preg_replace('/[^+\d]/', '', $webteck_menu_topbar_phone)). '">' .esc_html($webteck_menu_topbar_phone). '</a></li>';
                                    };
                                    if (!empty($webteck_menu_topbar_email)) {
                                        echo '<li><i class="fas fa-envelope"></i><a href="mailto:' .esc_html($webteck_menu_topbar_email). '">' .esc_html($webteck_menu_topbar_email). '</a></li>';
                                    };
                                echo '</ul>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="col-auto">';
                            if ( $webteck_show_social_icon ) {
                                echo '<div class="header-social">';
                                    echo '<span class="social-title">' .esc_html($webteck_menu_topbar_social_title). '</span>';
                                    webteck_social_icon();
                                echo '</div>';
                            }
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
            echo '<!--header-top-wrapper end-->';
        }
    }
}

// Add Extra Class On Comment Reply Button
function webteck_custom_comment_reply_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content);
}

add_filter('comment_reply_link', 'webteck_custom_comment_reply_link', 99);

// Add Extra Class On Edit Comment Link
function webteck_custom_edit_comment_link( $content ) {
    $extra_classes = 'reply-btn';
    return preg_replace( '/comment-edit-link/', 'comment-edit-link ' . $extra_classes, $content);
}

add_filter('edit_comment_link', 'webteck_custom_edit_comment_link', 99);


function webteck_post_classes( $classes, $class, $post_id ) {
    if ( get_post_type() === 'post' ) {
        $classes[] = "th-blog blog-single";
    }elseif( get_post_type() === 'product' ){
        // Return Class
    }elseif( get_post_type() === 'page' ){
        $classes[] = "page--item";
    }
    
    return $classes;
}
add_filter( 'post_class', 'webteck_post_classes', 10, 3 );
add_filter('wpcf7_autop_or_not', '__return_false');