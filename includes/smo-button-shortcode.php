<?php

// Add [smo_button] Shortcode
function smo_button_shortcode( $atts , $content = null ) {

	// Attributes
	$atts = shortcode_atts(
		array(
			'url' => '#',
		),
		$atts,
		'smo_button'
	);

	// Return image HTML code
	return '<a href="' . $atts['url'] . '" class="smo-button">' . $content . '</a>';

}
add_shortcode( 'smo_button', 'smo_button_shortcode' );
