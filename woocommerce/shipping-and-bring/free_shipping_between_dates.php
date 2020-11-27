<?php


/*
 * Free shipping in interval
 */
function free_shipping_between_dates( $available_shipping_methods, $package ) {

	$now = new DateTime( current_time( 'mysql' ) );
	$begin = new DateTime("2019-07-12 06:00:00");
	$over = new DateTime("2019-07-13 00:00:00");


	if( $over >= $now && $begin <= $now){
		foreach ($available_shipping_methods as $id => $rate) {
			$rate->cost = 0;
			$rate->taxes = [];
		}
	}


	return $available_shipping_methods;
}
add_filter( 'woocommerce_package_rates', 'free_shipping_between_dates', 10, 2 );
