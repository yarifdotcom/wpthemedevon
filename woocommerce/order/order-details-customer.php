<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="woocommerce-customer-details">

	<?php if ( $show_shipping ) : ?>

	<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">
		<div class="woocommerce-column woocommerce-column--1 woocommerce-column--billing-address col-1">

	<?php endif; ?>

	<h2 class="woocommerce-column__title"><?php esc_html_e( 'Billing address', 'woocommerce' ); ?></h2>

	<address>
		<p><strong>Name :</strong> <?php echo esc_html( $order->get_billing_first_name() . ' ' . $order->get_billing_last_name() ); ?></p>

		<?php if ( $order->get_billing_company() ) : ?>
			<p><strong>Company :</strong> <?php echo esc_html( $order->get_billing_company() ); ?></p>
		<?php endif; ?>

		<p><strong>Address :</strong>
			<?php echo esc_html( $order->get_billing_address_1() ); ?> . 
			<?php if ( $order->get_billing_address_2() ) : ?>
				<?php echo esc_html( $order->get_billing_address_2() ); ?> . 
			<?php endif; ?>
			<?php echo esc_html( $order->get_billing_city() ); ?>,
			<?php echo esc_html( $order->get_billing_state() ); ?>,
			<?php echo esc_html( $order->get_billing_postcode() ); ?> .
			<?php echo esc_html( $order->get_billing_country() ); ?>
		</p>

		<?php if ( $order->get_billing_phone() ) : ?>
			<p><strong>Phone :</strong> <?php echo esc_html( $order->get_billing_phone() ); ?></p>
		<?php endif; ?>

		<?php if ( $order->get_billing_email() ) : ?>
			<p><strong>Email :</strong> <?php echo esc_html( $order->get_billing_email() ); ?></p>
		<?php endif; ?>

		<?php
			/**
			 * Action hook fired after an address in the order customer details.
			 *
			 * @since 8.7.0
			 * @param string $address_type Type of address (billing or shipping).
			 * @param WC_Order $order Order object.
			 */
			do_action( 'woocommerce_order_details_after_customer_address', 'billing', $order );
		?>
	</address>

	<?php if ( $show_shipping ) : ?>

		</div><!-- /.col-1 -->

		<div class="woocommerce-column woocommerce-column--2 woocommerce-column--shipping-address col-2">
			<h2 class="woocommerce-column__title"><?php esc_html_e( 'Shipping address', 'woocommerce' ); ?></h2>
			<address>
				<p><strong>Name :</strong> <?php echo esc_html( $order->get_shipping_first_name() . ' ' . $order->get_shipping_last_name() ); ?></p>

				<?php if ( $order->get_shipping_company() ) : ?>
					<p><strong>Company :</strong> <?php echo esc_html( $order->get_shipping_company() ); ?></p>
				<?php endif; ?>

				<p><strong>Address :</strong>
					<?php echo esc_html( $order->get_shipping_address_1() ); ?> .
					<?php if ( $order->get_shipping_address_2() ) : ?>
						<?php echo esc_html( $order->get_shipping_address_2() ); ?> . 
					<?php endif; ?>
					<?php echo esc_html( $order->get_shipping_city() ); ?>,
					<?php echo esc_html( $order->get_shipping_state() ); ?>,
					<?php echo esc_html( $order->get_shipping_postcode() ); ?> .
					<?php echo esc_html( $order->get_shipping_country() ); ?>
				</p>

				<?php if ( $order->get_shipping_phone() ) : ?>
					<p><strong>Phone :</strong> <?php echo esc_html( $order->get_shipping_phone() ); ?></p>
				<?php endif; ?>

				<?php
					/**
					 * Action hook fired after an address in the order customer details.
					 *
					 * @since 8.7.0
					 * @param string $address_type Type of address (billing or shipping).
					 * @param WC_Order $order Order object.
					 */
					do_action( 'woocommerce_order_details_after_customer_address', 'shipping', $order );
				?>
			</address>
		</div><!-- /.col-2 -->

	</section><!-- /.col2-set -->

	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_customer_details', $order ); ?>

</section>
