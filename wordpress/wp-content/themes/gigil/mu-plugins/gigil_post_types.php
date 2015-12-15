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

class gigil_post_types {

  public function __construct() {
		add_action( 'init', array( $this, 'gigil_create_custom_post_types' ) );
  }
  function gigil_create_custom_post_types() {  
      
    register_post_type( 'gigil_sponsors',
      array(
        'labels' => array(
          'name' => __( 'Sponsors' ),
          'singular_name' => __( 'Sponsor' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 31
      )
    );
    
    register_post_type( 'gigil_banners',
      array(
        'labels' => array(
          'name' => __( 'Banners' ),
          'singular_name' => __( 'Banner' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 32
      )
    );
    
  }
}
$gigil_post_types = new gigil_post_types;

?>