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




//
// custom SMO event list widget
//
add_action( 'widgets_init', function(){
    register_widget( 'smo_event_list' );
});

class smo_event_list extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'smo-event-list',
            'description' => '',
        );

        parent::__construct( 'smo_event_list', 'SMO Event List', $widget_ops );
    }


    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
        // outputs the content of the widget
        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }
        include 'smo-event-list.php';
        // echo __( 'Hello, World!', 'text_domain' );
        echo $args['after_widget'];
    }


    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
        // outputs the options form on admin
        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Upcoming Concerts', 'text_domain' );
        ?>
            <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>

        <?php
    }


    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update( $new_instance, $old_instance ) {
        // processes widget options to be saved
        foreach( $new_instance as $key => $value )
        {
            $updated_instance[$key] = sanitize_text_field($value);
        }

        return $updated_instance;
    }
}



//
// Add custom styles to TinyMCE
//

// Callback function to insert 'styleselect' into the $buttons array
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {
	// Define the style_formats array
	$style_formats = array(
		// Each array child is a format with it's own settings
		array(
			'title' => 'SMO callout',
			'block' => 'div',
			'classes' => 'smo-callout',
			'wrapper' => true,

		),
        array(
	        'title' => 'SMO button (apply to a link)',
	        'selector' => 'a',
	        'classes' => 'smo-button'
        ),

	);
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );

	return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );
