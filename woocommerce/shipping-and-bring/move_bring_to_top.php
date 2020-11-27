<?php


/*
 * Move Bring options to top
 */
function move_bring_to_top( $available_shipping_methods, $package ) {

	// Bruk denne til å finne ut hvilke metoder som kommer ut
	// Ta bort kommentaren ogberegn frakt i handlekurven
	// file_put_contents(__DIR__."/methods.txt",print_r($available_shipping_methods,1));

	$bring = [];
	$others = [];

	foreach ($available_shipping_methods as $key => $method) {

		if ( strpos($key,'bring') !== false ) {
			$bring[$key] = $method;
		}
		else {
			$others[$key] = $method;
		}
	}

	return $bring + $others;
}

add_filter( 'woocommerce_package_rates', 'move_bring_to_top', 10, 2 );
