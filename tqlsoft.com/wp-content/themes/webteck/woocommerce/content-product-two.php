<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php wc_product_class( array( 'th-product', 'product_style1' ), $product ); ?>>
	<?php
	echo '<div class="th-product">';
            if( has_post_thumbnail() ){
                echo '<div class="product-img">';
                
                    echo '<img src="'.esc_url( get_the_post_thumbnail_url() ).'" alt="'.esc_attr( webteck_img_default_alt(  get_the_post_thumbnail_url() )).'" >';
                echo '</div>';
            }
            echo '<div class="product-content">';

                echo '<div class="rating-wrap">';
                // Product Rating
                    woocommerce_template_loop_rating();
                echo '</div>';
                
                // Product Title
                echo '<h3 class="product-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h3>';
                // Product Price
                echo woocommerce_template_loop_price();

                echo '<div class="actions">';
                    
                    // Quick View Button
                    if( class_exists( 'WPCleverWoosq' ) ){
                        echo do_shortcode('[woosq]');
                    }
                    // Cart Button
                    woocommerce_template_loop_add_to_cart();
                    // Wishlist Button
                    if( class_exists( 'TInvWL_Admin_TInvWL' ) ){
                        echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                    }
                echo '</div>';
                // if( $product->is_type('simple') || $product->is_type('external') || $product->is_type('grouped') ) {

                //     $regular_price  = get_post_meta( $product->get_id(), '_regular_price', true ); 
                //     $sale_price     = get_post_meta( $product->get_id(), '_sale_price', true );
                //     if( !empty($sale_price) ) {
                //         if( $regular_price > $sale_price ){
                //             echo '<span class="category">'.esc_html__('Sale', 'webteck').'</span>';
                //         }
                //     }
                // }
            echo '</div>';
        echo '</div>';
	?>
</div>