<?php
	
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
		'name'          => 'SMO Homepage 3',
		'id'            => 'smo_home_3',
		'description'   => __( 'Home 3.', 'text_domain' ),
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
