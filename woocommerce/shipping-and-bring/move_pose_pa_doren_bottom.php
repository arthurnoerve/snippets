<?php


/*
* Move pose local pickup to bottom
*/
function move_pose_pa_doren_bottom( $available_shipping_methods, $package ) {

	$pa_doren_key = current(array_filter(array_keys($available_shipping_methods), function($key){return strpos($key,'bring:3584:doren') !== false;}) ?? []);

	if ($pa_doren_key) {
		$local = $available_shipping_methods[$pa_doren_key];
		unset($available_shipping_methods[$pa_doren_key]);

		$available_shipping_methods = [ "$pa_doren_key" => $local ] + $available_shipping_methods;
	}

	return $available_shipping_methods;
}
add_filter( 'woocommerce_package_rates', 'move_pose_pa_doren_bottom', 10, 2 );
