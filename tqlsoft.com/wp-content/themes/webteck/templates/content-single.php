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

    webteck_setPostViews( get_the_ID() );

    ?>
    <div <?php post_class(); ?>>
    <?php
        if( class_exists('ReduxFramework') ) {
            $webteck_post_details_title_position = webteck_opt('webteck_post_details_title_position');
        } else {
            $webteck_post_details_title_position = 'header';
        }

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
        // Blog Post Thumbnail
        do_action( 'webteck_blog_post_thumb' );

        if( $webteck_post_details_title_position != 'header' ) {
            echo '<h2 class="blog-title h3">'.wp_kses( get_the_title(), $allowhtml ).'</h2>';
        }
        
        echo '<div class="blog-content">';
            // Blog Post Meta
            do_action( 'webteck_blog_post_meta' );

            if( get_the_content() ){

                the_content();
                // Link Pages
                webteck_link_pages();
            }
        echo '</div>';

        if ( class_exists('ReduxFramework') ) {
            $webteck_post_details_share_options = webteck_opt('webteck_post_details_share_options');
        } else {
            $webteck_post_details_share_options = false;
        }
        
        $webteck_post_tag = get_the_tags();
        
        if( ! empty( $webteck_post_tag )  || $webteck_post_details_share_options ){
            echo '<div class="share-links clearfix">';
                echo '<div class="row justify-content-between">';
                    if( is_array( $webteck_post_tag ) && ! empty( $webteck_post_tag ) ){
                        if( count( $webteck_post_tag ) > 1 ){
                            $tag_text = __( 'Tags:', 'webteck' );
                        }else{
                            $tag_text = __( 'Tag:', 'webteck' );
                        }
                        echo '<div class="col-sm-auto">';
                        echo '<span class="share-links-title">'.$tag_text.'</span>';

                            echo '<div class="tagcloud">';
                                foreach( $webteck_post_tag as $tags ){
                                    echo '<a href="'.esc_url( get_tag_link( $tags->term_id ) ).'">'.esc_html( $tags->name ).'</a>';
                                }
                            echo '</div>';
                        echo '</div>';
                    }

                    /**
                    *
                    * Hook for Blog Details Share Options
                    *
                    * Hook webteck_blog_details_share_options
                    *
                    * @Hooked webteck_blog_details_share_options_cb 10
                    *
                    */
                    do_action( 'webteck_blog_details_share_options' );
                echo '</div>';
            echo '</div>';
        }

         

        /**
        *
        * Hook for Blog Details Author Bio
        *
        * Hook webteck_blog_details_author_bio
        *
        * @Hooked webteck_blog_details_author_bio_cb 10
        *
        */
        do_action( 'webteck_blog_details_author_bio' );

        /**
        *
        * Hook for Blog Details Comments
        *
        * Hook webteck_blog_details_comments
        *
        * @Hooked webteck_blog_details_comments_cb 10
        *
        */
    echo '</div>'; 
    
    do_action( 'webteck_blog_details_comments' );