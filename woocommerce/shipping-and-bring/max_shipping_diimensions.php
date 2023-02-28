
<?php




function tegne_set_max_shipping_dimensions( $dimensions, $package ) {

	$l = $dimensions[ 'length' ];
	$h = $dimensions[ 'height' ];
	$w = $dimensions[ 'width' ];

	if ($l > 120) $l = 120;
	if ($h > 60)  $h = 60;
	if ($w > 60)  $w = 60;

	// Create new dims array
	$new_dimensions = [];
	$new_dimensions[ 'length' ] = $l;
	$new_dimensions[ 'height' ] = $h;
	$new_dimensions[ 'width' ]  = $w;

	return $new_dimensions;
}
add_filter('bring_calculated_shipping_dimensions', 'tegne_set_max_shipping_dimensions', 100, 2);
