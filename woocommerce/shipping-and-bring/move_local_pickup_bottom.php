<?php


/*
 * Move local pickup to bottom
 */
function move_local_pickup_bottom( $available_shipping_methods, $package ) {

	if (isset($available_shipping_methods['flat_rate:1'])) {
		$local = $available_shipping_methods['flat_rate:1'];
		unset($available_shipping_methods['flat_rate:1']);

		$available_shipping_methods = $available_shipping_methods + [ "flat_rate:1" => $local ];
	}

	return $available_shipping_methods;
}
add_filter( 'woocommerce_package_rates', 'move_local_pickup_bottom', 10, 2 );
