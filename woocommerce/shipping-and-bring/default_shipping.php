
<?php


function set_default_shipping_method( $method, $available_methods ) {

	$default = "..."; // Replace ... with key of method in the $available_methods array

	if( $method && array_key_exists($method, $available_methods ) ) return $default;
    else return $method;

}
add_filter('woocommerce_shipping_chosen_method', 'set_default_shipping_method', 100, 2);
