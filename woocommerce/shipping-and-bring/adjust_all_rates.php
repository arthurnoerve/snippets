
<?php

function nettpilot_modify_shipping_methods($available_shipping_methods, $package) {

	/**
	 * 
	 * Price addition
	 * 
	 */

	$added_cost = 40;

	foreach ($available_shipping_methods as $key => $method) {
		$cost = $method->get_cost();

		if ($cost != 0) {
			// Actual cost - add 80% of $added
			$method->set_cost($cost + 0.8*$added_cost);

			// Tax - add 20% of $added
			$taxes = $method->get_taxes();
			$tax_key = reset(array_keys($taxes));
			$tax = reset(array_values($taxes));
			$method->set_taxes([$tax_key => $tax + 0.2*$added_cost]);
		}
	}

	return $available_shipping_methods;
}
add_filter('woocommerce_package_rates', 'nettpilot_modify_shipping_methods', 10, 2);
