<?php
/**
 * @Packge     : Traga
 * @Version    : 1.0
 * @Author     : Traga
 * @Author URI : https://www.themeholy.com/
 *
 */


// Blocking direct access
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

function webteck_core_essential_scripts( ) {
    wp_enqueue_script('webteck-ajax',WEBTECK_PLUGDIRURI.'assets/js/webteck.ajax.js',array( 'jquery' ),'1.0',true);
    wp_localize_script(
    'webteck-ajax',
    'webteckajax',
        array(
            'action_url' => admin_url( 'admin-ajax.php' ),
            'nonce'	     => wp_create_nonce( 'webteck-nonce' ),
        )
    );
}

add_action('wp_enqueue_scripts','webteck_core_essential_scripts');


// webteck Section subscribe ajax callback function
add_action( 'wp_ajax_webteck_subscribe_ajax', 'webteck_subscribe_ajax' );
add_action( 'wp_ajax_nopriv_webteck_subscribe_ajax', 'webteck_subscribe_ajax' );

function webteck_subscribe_ajax( ){
  $apiKey = webteck_opt('webteck_subscribe_apikey');
  $listid = webteck_opt('webteck_subscribe_listid');
   if( ! wp_verify_nonce($_POST['security'], 'webteck-nonce') ) {
    echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('You are not allowed.', 'webteck').'</div>';
   }else{
       if( !empty( $apiKey ) && !empty( $listid )  ){
           $MailChimp = new DrewM\MailChimp\MailChimp( $apiKey );

           $result = $MailChimp->post("lists/{$listid}/members",[
               'email_address'    => esc_attr( $_POST['sectsubscribe_email'] ),
               'status'           => 'subscribed',
           ]);

           if ($MailChimp->success()) {
               if( $result['status'] == 'subscribed' ){
                   echo '<div class="alert alert-success mt-2" role="alert">'.esc_html__('Thank you, you have been added to our mailing list.', 'webteck').'</div>';
               }
           }elseif( $result['status'] == '400' ) {
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('This Email address is already exists.', 'webteck').'</div>';
           }else{
               echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Sorry something went wrong.', 'webteck').'</div>';
           }
        }else{
           echo '<div class="alert alert-danger mt-2" role="alert">'.esc_html__('Apikey Or Listid Missing.', 'webteck').'</div>';
        }
   }

   wp_die();

}

add_action('wp_ajax_webteck_addtocart_notification','webteck_addtocart_notification');
add_action('wp_ajax_nopriv_webteck_addtocart_notification','webteck_addtocart_notification');
function webteck_addtocart_notification(){

    $_product = wc_get_product($_POST['prodid']);
    $response = [
        'img_url'   => esc_url( wp_get_attachment_image_src( $_product->get_image_id(),array('60','60'))[0] ),
        'title'     => wp_kses_post( $_product->get_title() )
    ];
    echo json_encode($response);

    wp_die();
}