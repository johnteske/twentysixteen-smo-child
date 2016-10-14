<?php
add_action( 'after_setup_theme', 'child_custom_logo_setup', 11 );
function child_custom_logo_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 480,
		'width'       => 480,
		'flex-height' => true,
	));
}
