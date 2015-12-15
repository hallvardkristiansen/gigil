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
      
    register_post_type( 'gigil_case_study',
      array(
        'labels' => array(
          'name' => __( 'Case studies' ),
          'singular_name' => __( 'Case study' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 31
      )
    );
    
    register_post_type( 'gigil_partner',
      array(
        'labels' => array(
          'name' => __( 'Project partners' ),
          'singular_name' => __( 'Project partner' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 35
      )
    );
    
    register_post_type( 'gigil_lce_6-10',
      array(
        'labels' => array(
          'name' => __( 'LCE 6-10s' ),
          'singular_name' => __( 'LCE 6-10' )
        ),
        'public' => true,
        'has_archive' => false,
        'menu_position' => 36
      )
    );    
  }
}
$gigil_post_types = new gigil_post_types;

?>