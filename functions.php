<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}


function smo_widgets_init() {

	register_sidebar( array(
		'name'          => 'SMO Homepage 1',
		'id'            => 'smo_home_1',
		'description'   => __( 'Home 1.', 'text_domain' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'SMO Homepage 2',
		'id'            => 'smo_home_2',
		'description'   => __( 'Home 2.', 'text_domain' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => 'SMO Concerts Upcoming',
		'id'            => 'smo_concerts_upcoming',
		'description'   => __( 'Lists upcoming events.', 'text_domain' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'smo_widgets_init' );


add_action( 'after_setup_theme', 'child_custom_logo_setup', 11 );
function child_custom_logo_setup() {
	add_theme_support( 'custom-logo', array(
		'height'      => 480,
		'width'       => 480,
		'flex-height' => true,
	));
}
