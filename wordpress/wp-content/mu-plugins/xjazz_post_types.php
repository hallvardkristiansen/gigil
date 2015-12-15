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
  
  function xjazz_add_post_type_args($singular, $plural, $taxonomies, $icon) {
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
  		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', ),
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
  		'query_var'             => true,
  		'can_export'            => true,
  		'has_archive'           => true,		
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'capability_type'       => 'page',
  	);
  	return $args;
  }
  
  function xjazz_add_taxonomy_args($singular, $plural, $slug) {
    $labels = array(
        'name'              => _x( $plural, 'taxonomy general name' ),
        'singular_name'     => _x( $singular, 'taxonomy singular name' ),
        'search_items'      => __( 'Search '.$plural ),
        'all_items'         => __( 'All '.$plural ),
        'parent_item'       => __( 'Parent '.$singular ),
        'parent_item_colon' => __( 'Parent '.$singular.':' ),
        'edit_item'         => __( 'Edit '.$singular ),
        'update_item'       => __( 'Update '.$singular ),
        'add_new_item'      => __( 'Add New '.$singular ),
        'new_item_name'     => __( 'New '.$singular.' Name' ),
        'menu_name'         => __( $singular ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $slug ),
        'show_in_rest'       => true,
        'rest_base'          => $slug,
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    );
    return $args;
  }
  
  function xjazz_create_custom_post_types() {  
    register_taxonomy('genres', 'genres', $this->xjazz_add_taxonomy_args('Genre', 'Genres', 'genre'));
  	register_post_type( 'xjazz_artists', $this->xjazz_add_post_type_args('Artist', 'Artists', array('genres'), 'dashicons-groups'));
  	register_post_type( 'xjazz_events', $this->xjazz_add_post_type_args('Event', 'Events', array('genres'), 'dashicons-tickets-alt'));
  	register_post_type( 'xjazz_venues', $this->xjazz_add_post_type_args('Venue', 'Venues', array(), 'dashicons-location'));
  }
}
$xjazz_post_types = new xjazz_post_types;

?>