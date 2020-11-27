<?php



/*
 * Go through the $available_shipping_methods array and return only methods whose key contains $str
 */

function filter_shipping_list($available_shipping_methods,$str) {

	$methods = [];

	foreach ($available_shipping_methods as $id => $rate) {
		if ( strpos($id, $str) !== false ) continue;
		else $methods[$id] = $rate;
	}

	return $methods;
}
