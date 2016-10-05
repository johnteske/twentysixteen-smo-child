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
