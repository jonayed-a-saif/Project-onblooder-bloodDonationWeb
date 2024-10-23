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
    *
    * Hook for Footer Content
    *
    * Hook webteck_footer_content
    *
    * @Hooked webteck_footer_content_cb 10
    *
    */
    do_action( 'webteck_footer_content' );

    /**
    *
    * Hook for Back to Top Button
    *
    * Hook webteck_back_to_top
    *
    * @Hooked webteck_back_to_top_cb 10
    *
    */
    do_action( 'webteck_back_to_top' );

    wp_footer();
    ?>
</body>
</html>