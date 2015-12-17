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
  
  function gigil_add_post_type_args($singular, $plural, $taxonomies, $icon, $has_body=true, $has_excerpt=true, $has_revisions=true) {
    $supports = array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions');
    if (!$has_body) {
      unset($supports[1]);
    }
    if (!$has_excerpt) {
      unset($supports[2]);
    }
    if (!$has_revisions) {
      unset($supports[4]);
    }
  	$labels = array(
  		'name'                  => _x( $plural, 'Post Type General Name'),
  		'singular_name'         => _x( $singular, 'Post Type Singular Name'),
  		'menu_name'             => __( $plural),
  		'name_admin_bar'        => __( $plural),
  		'parent_item_colon'     => __( 'Parent '.$singular.':'),
  		'all_items'             => __( 'All '.$plural),
  		'add_new_item'          => __( 'Add New '.$singular),
  		'add_new'               => __( 'Add New'),
  		'new_item'              => __( 'New '.$singular),
  		'edit_item'             => __( 'Edit '.$singular),
  		'update_item'           => __( 'Update '.$singular),
  		'view_item'             => __( 'View '.$singular),
  		'search_items'          => __( 'Search '.$plural),
  		'not_found'             => __( 'Not found'),
  		'not_found_in_trash'    => __( 'Not found in Trash'),
  		'items_list'            => __( $plural.' list'),
  		'items_list_navigation' => __( $plural.' list navigation'),
  		'filter_items_list'     => __( 'Filter '.$plural.' list'),
  	);
  	$args = array(
  		'label'                 => __( $singular),
  		'description'           => __( $singular.' profiles'),
  		'labels'                => $labels,
  		'supports'              => $supports,
  		'taxonomies'            => $taxonomies,
  		'hierarchical'          => false,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 20,
  		'menu_icon'             => $icon,
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'show_in_rest'          => true,
  		'can_export'            => true,
  		'has_archive'           => false,		
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'capability_type'       => 'page',
  	);
  	return $args;
  }
  
  function gigil_create_custom_post_types() {  
  	register_post_type( 'gigil_sponsors', $this->gigil_add_post_type_args('Sponsor', 'Sponsors', array('category'), 'dashicons-businessman', false, false, false));
  	register_post_type( 'gigil_banners', $this->gigil_add_post_type_args('Banner', 'Banners', array('category'), 'dashicons-welcome-widgets-menus', false, false, false));    
  }
}
$gigil_post_types = new gigil_post_types;

?>