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
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="col-12 col-md-6 col-lg-3">
	<div class="top-sale_product_wrapper">
	<?php
	/** 
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	
	// do_action( 'woocommerce_before_shop_loop_item' );


	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
	do_action( 'woocommerce_before_shop_loop_item_title' ); ?>

		<div class="row no-gutters">
			<div class="col-9">
				<div class="top-sale_desc_wrapper">
			
<?/**
 * Hook: woocommerce_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_product_title - 10
 */
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_open', 5);
do_action( 'woocommerce_shop_loop_item_title' );

/**
 * Hook: woocommerce_after_shop_loop_item_title.
 *
 * @hooked woocommerce_template_loop_rating - 5
 * @hooked woocommerce_template_loop_price - 10
 */
do_action( 'woocommerce_after_shop_loop_item_title' ); ?>


			<?php /**
			 * Hook: woocommerce_after_shop_loop_item.
			 *
			 * @hooked woocommerce_template_loop_product_link_close - 5
			 * @hooked woocommerce_template_loop_add_to_cart - 10
			 */
			remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
			do_action( 'woocommerce_after_shop_loop_item' );
			?>
				<p class="weight">1 кг</p>
				</div> <!-- top-sale_desc_wrapper -->
			</div> <!-- col-10 -->

			<div class="col-3">
			<?php

			echo sprintf( '<a rel="nofollow" href="%s" data-quantity="1" data-product_id="%s" data-product_sku="%s" class="add-to-cart d-flex justify-content-center"><span class="align-self-center">+</span></a>',
			  esc_url( $product->add_to_cart_url() ),
			  esc_attr( $product->id ),
			  esc_attr( $product->get_sku() )
			);

			?>
			</div> <!-- col-2 -->
		</div> <!-- row no-gutters -->
	</div> <!-- top-sale_product_wrapper -->
</div> <!-- col -->
