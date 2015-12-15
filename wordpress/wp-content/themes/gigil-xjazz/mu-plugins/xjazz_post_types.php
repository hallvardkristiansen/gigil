<?php
/**
 * Must-Use Functions
 * 
 * A class filled with functions that will never go away upon theme deactivation.
 * 
 * @package WordPress
 * @subpackage gigil
 */

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

class xjazz_post_types {

  public function __construct() {
		add_action( 'init', array( $this, 'xjazz_create_custom_post_types' ) );
  }
  function xjazz_create_custom_post_types() {  
      
    register_post_type( 'xjazz_artists',
      array(
        'labels' => array(
          'name' => __( 'Artists' ),
          'singular_name' => __( 'Artist' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 31
      )
    );
    
    register_post_type( 'xjazz_events',
      array(
        'labels' => array(
          'name' => __( 'Events' ),
          'singular_name' => __( 'Event' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 35
      )
    );
    
    register_post_type( 'xjazz_venues',
      array(
        'labels' => array(
          'name' => __( 'Venues' ),
          'singular_name' => __( 'Venue' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 36
      )
    );    
  }
}
$xjazz_post_types = new xjazz_post_types;

?>