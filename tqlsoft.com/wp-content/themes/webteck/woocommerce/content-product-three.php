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
<div <?php wc_product_class( array( 'th-product', 'list-view' ), $product ); ?>>
	<?php
        if( has_post_thumbnail() ){
            echo '<div class="product-img">';
            
                the_post_thumbnail( 'webteck_140X140' );
            echo '</div>';
        }
        echo '<div class="product-content">';

            // Product Title
            echo '<h3 class="product-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( get_the_title() ).'</a></h3>';

            $short_description = webteck_meta( 'extra_description' );
            echo '<p class="product-text">';
                woocommerce_new_short_description($short_description);
            echo '</p>';
            
            // Product Price
            echo woocommerce_template_loop_price();

            echo '<div class="actions">';
                
                woocommerce_template_loop_textable_add_to_cart();

            echo '</div>';
        echo '</div>';
	?>
</div>