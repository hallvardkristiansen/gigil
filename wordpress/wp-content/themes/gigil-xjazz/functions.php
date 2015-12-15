<?php

if ( ! function_exists( 'xjazz_setup' ) ) :
  function xjazz_setup() {
  	register_nav_menus( array(
  		'subsection' => __( 'Festival Menu', 'gigil' )
  	) );
  }
endif;
add_action( 'after_setup_theme', 'xjazz_setup' );

function xjazz_scripts() {
	wp_enqueue_style('xjazz-fonts', 'https://fonts.googleapis.com/css?family=Oxygen:400,700', array(), null);
  wp_enqueue_script( 'xjazz-map-script', get_stylesheet_directory_uri() . '/js/google_maps.js', array('jquery'), '20150330', true);
}
add_action( 'wp_enqueue_scripts', 'xjazz_scripts' );

?>