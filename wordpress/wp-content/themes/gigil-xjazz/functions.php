<?php

$searchable_post_types = array('post', 'page', 'xjazz_events', 'xjazz_artists', 'xjazz_venues'); 

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

function searchfilter($query) {
  global $searchable_post_types;
  if ($query->is_search) {
    $query->set('post_type', $searchable_post_types);
  }
  return $query;
}
add_filter('pre_get_posts','searchfilter');


// Utility functions
// For fetching page hierarchy
function xjazz_return_parent_pages() {
  $parents = get_post_ancestors(get_the_ID());
  if (array_count_values($parents)) {
    return $parents;
  } else if (get_post_type() == 'page') {
    return false;
  } else {
    return xjazz_get_parent_pages();
  }
}

function xjazz_get_parent_pages_with_cat($catid, $exclude) {
  return get_posts(array(
  	'numberposts'	=> -1,
  	'post_type'		=> 'page',
  	'post_parent' => 0,
  	'exclude'     => $exclude,
  	'meta_key'		=> 'associated_category',
  	'meta_value'	=> $catid,
  	'suppress_filters' => false
  ));
}
function xjazz_get_parent_pages() {
  if (get_field('associated_category')) {
    $parents = xjazz_get_parent_pages_with_cat(get_field('associated_category'), get_the_ID());
  } else {
    $categories = get_the_category();
    $parents = [];
    foreach($categories as $cat) {
      $parents = array_merge($parents, xjazz_get_parent_pages_with_cat($cat->term_id, get_the_ID()));
    }
  }
  $parentids = array_map(function($post) {
    return $post->ID;
  }, $parents);
  return $parentids;
}

// Show submenu if post has same category as page
// add hook
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects_toggle', 10, 2);
// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_toggle( $sorted_menu_items, $args ) {
  // find the current menu item parent    
  $origin = wp_get_referer();
  $page_parents = xjazz_get_parent_pages();
  $menu_item_parents = [];
  $current_page_set = false;
  foreach ( $sorted_menu_items as $key => $item ) {
    if (in_array($item->object_id, $page_parents) && strpos($origin, $item->url) !== false) {
      $menu_item_parents[] = $item->ID;
      $item->classes[] = "current-menu-parent";
      $sorted_menu_items[$key] = $item;
    }
    if ($item->current) {
      $current_page_set = true;
      break;
    }
  }
  if ( isset( $args->sub_menu ) ) {
    if (!$current_page_set) {
      foreach ( $sorted_menu_items as $key => $item ) {
        if (in_array($item->menu_item_parent, $menu_item_parents) ) {
          if (strpos($origin, $item->url) !== false) {
            $item->current = true;
            $item->classes[] = "current-menu-parent";
            $current_page_set = true;
            break;
          }
          $sorted_menu_items[$key] = $item;
        }
      }
    }
    if (!$current_page_set) {
      foreach ( $sorted_menu_items as $key => $item ) {
        if (in_array($item->menu_item_parent, $menu_item_parents) ) {
          $template_name = get_post_meta( $item->object_id, '_wp_page_template', true );
          $page_post_type = str_ireplace('.php', '', $template_name);
          $page_post_type = str_ireplace('page-templates/', '', $page_post_type);
          if (get_post_type() == $page_post_type) {
            $item->current = true;
            $item->classes[] = "current-menu-parent";
            $current_page_set = true;
            break;
          }
        }
      }
    }
    if (!$current_page_set) {
      foreach ( $sorted_menu_items as $key => $item ) {
        if ($item->object_id == $page_parents[count($page_parents) - 1]) {
          $item->current = true;
          $item->classes[] = "current-menu-parent";
          $current_page_set = true;
          break;
        }
      }
    }
    return $sorted_menu_items;
    
  }
  if (!$current_page_set) {
    foreach ( $sorted_menu_items as $key => $item ) {
      if ($item->object_id == $page_parents[count($page_parents) - 1]) {
        $item->current = true;
        $item->classes[] = "current-menu-parent";
        $current_page_set = true;
        break;
      }
    }
  }
  return $sorted_menu_items;
}


?>