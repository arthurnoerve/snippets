<?php


/*
* ORDER ITEM LIST ON SHIPPING LABEL ---------------------------------------------------------------------
*/

function products_on_shipping_label( $order, $current_reference ) {
	
	// Map order line items
	$products = array_map(function($item){

		// Limit to certain categories
		// if ( !has_term(array( 'CATEGORY' ), 'product_cat', $item->get_product_id()) ) return "";
		

		$name = $item->get_name();

		// Do basic clean up
		$slug = str_replace([" | ", " – "], "", $name);
		$slug = str_replace(["|", ",", ":","–"], "", $slug);
		$slug = trim($slug);
		
		$qty = $item->get_quantity();
		
		$slug = $qty==1 ? "{$slug}" : "{$qty}x{$slug}";

		return $slug;
	}, $order->get_items());

	// Assemble to string
	$info = implode(",", array_filter($products));

	return $info; 
}
add_filter( 'bring_senders_reference', 'products_on_shipping_label', 10, 2);
