<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>


	<div class="shop_table shop_table_responsive">

	<!-- Удалил подытог -->

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<div class="shipping row">
				<div class="col-12">Доставка</div>
				<div data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></div>
			</tr>

		<?php endif; ?>

	</div>


	<hr>

	<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

	<div class="row mb-4">
		<div class="col-12">
			<div class="order-total text-right">
				<span class="font-weight-bold" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">Итого: <?php wc_cart_totals_order_total_html(); ?></span>
			</div>
		</div>
	</div>


	<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>
	
	<div class="row">
		<div class="col-12 d-flex justify-content-end">
			<div class="wc-proceed-to-checkout">
				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
			</div>
		</div>
	</div>


		<?php do_action( 'woocommerce_after_cart_totals' ); ?>

	</div> <!-- cart_totals -->
</div> <!-- cart_wrapper	 -->






