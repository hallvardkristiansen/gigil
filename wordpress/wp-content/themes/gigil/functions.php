<?php
if ( ! function_exists( 'gigil_setup' ) ) :
  function gigil_setup() {
  	add_theme_support( 'title-tag' );
  	add_theme_support('post-thumbnails');
  	add_image_size('title-image', 818, 460, true);
  	add_image_size('banner-image', 220, 140, true);
  	add_image_size('sponsor-logo-small', 140, 80, false);
  	add_image_size('sponsor-logo-medium', 280, 160, false);
  	add_image_size('sponsor-logo-large', 400, 200, false);
  
  	register_nav_menus( array(
  		'primary' => __( 'Primary Menu', 'gigil' ),
  		'footer_1'  => __( 'Footer Menu 1', 'gigil' ),
  		'footer_2'  => __( 'Footer Menu 2', 'gigil' ),
  		'footer_3'  => __( 'Footer Menu 3', 'gigil' ),
  		'footer_4'  => __( 'Footer Menu 4', 'gigil' ),
  		'social'  => __( 'Social Links Menu', 'gigil' ),
  		'social_sites'  => __( 'Social Sites', 'gigil' )
  	) );
  }
endif;
add_action( 'after_setup_theme', 'gigil_setup' );

// Add customization options to theme
function gigil_add_control_settings($setting_name, $default, $transport, $control_label, $section) {
  $wp_customize->add_setting($setting_name, array(
      'default'     => $default,
      'transport'   => $transport
  ));
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_name, array(
      'label'    => __( $control_label, 'gigil' ),
      'section'  => $section,
      'settings' => $setting_name
  )));
}
function gigil_theme_customizer( $wp_customize ) {
  // Logos
  $wp_customize->add_section('gigil_logo_section', array(
      'title'       => __('Logo', 'gigil'),
      'priority'    => 30,
      'description' => 'Upload a logo to replace the default site name and description in the header',
  ));
  gigil_add_control_settings('gigil_logo', false, 'refresh', 'Logo', 'gigil_logo_section');
  gigil_add_control_settings('gigil_mobile_logo', false, 'refresh', 'Mobile logo', 'gigil_logo_section');

  // Colours
  $wp_customize->add_section('gigil_color_section', array(
      'title'       => __('Colours', 'gigil'),
      'priority'    => 30,
      'description' => 'Alter colours of theme',
  ));
  gigil_add_control_settings('text_color', '#000000', 'postMessage', 'Text', 'gigil_color_section');
  gigil_add_control_settings('link_color', '#000000', 'postMessage', 'Link', 'gigil_color_section');
  gigil_add_control_settings('link_hover_color', '#000000', 'postMessage', 'Link hover', 'gigil_color_section');
  gigil_add_control_settings('primary_color', '#000000', 'postMessage', 'Primary', 'gigil_color_section');
  gigil_add_control_settings('secondary_color', '#000000', 'postMessage', 'Secondary', 'gigil_color_section');
  gigil_add_control_settings('error_color', '#FF0000', 'postMessage', 'Error', 'gigil_color_section');
  gigil_add_control_settings('warning_color', '#FFFF00', 'postMessage', 'Warning', 'gigil_color_section');
  gigil_add_control_settings('ok_color', '#00FFFF', 'postMessage', 'All ok', 'gigil_color_section');
  gigil_add_control_settings('search_bg_color', '#000000', 'postMessage', 'Search field background', 'gigil_color_section');
  gigil_add_control_settings('header_bg_color', '#FFFFFF', 'postMessage', 'Header background', 'gigil_color_section');
  gigil_add_control_settings('body_bg_color', '#FFFFFF', 'postMessage', 'Body background', 'gigil_color_section');
  gigil_add_control_settings('sponsors_bg_color', '#FFFFFF', 'postMessage', 'Sponsors background', 'gigil_color_section');
  gigil_add_control_settings('footer_bg_color', '#000000', 'postMessage', 'Footer background', 'gigil_color_section');
  gigil_add_control_settings('footer_text_color', '#FFFFFF', 'postMessage', 'Footer text', 'gigil_color_section');
  gigil_add_control_settings('footer_link_color', '#FFFFFF', 'postMessage', 'Footer link', 'gigil_color_section');
}
add_action( 'customize_register', 'gigil_theme_customizer' );

// Output custom colours as css
function gigil_customize_css() {
  echo '<style type="text/css">';
  echo 'body { color: ' . get_theme_mod('text_color', '#000000') . '; background-color: ' . get_theme_mod('body_bg_color', '#FFFFFF') . ';}';
  echo 'a:link, a:visited { color: ' . get_theme_mod('link_color', '#000000') . ';}';
  echo 'a:hover, a:active { color: ' . get_theme_mod('link_hover_color', '#000000') . ';}';
  echo '.primary { background-color: ' . get_theme_mod('primary_color', '#000000') . ';}';
  echo '.secondary { background-color: ' . get_theme_mod('secondary_color', '#000000') . ';}';
  echo '.error { color: ' . get_theme_mod('error_color', '#000000') . ';}';
  echo '.warning { color: ' . get_theme_mod('warning_color', '#000000') . ';}';
  echo '.ok { color: ' . get_theme_mod('ok_color', '#000000') . ';}';
  echo '#search-field { background-color: ' . get_theme_mod('search_bg_color', '#000000') . ';}';
  echo '#header { background-color: ' . get_theme_mod('header_bg_color', '#FFFFFF') . ';}';
  echo '#sponsors { background-color: ' . get_theme_mod('sponsors_bg_color', '#FFFFFF') . ';}';
  echo '#footer { color: ' . get_theme_mod('footer_text_color', '#FFFFFF') . '; background-color: ' . get_theme_mod('footer_bg_color', '#FFFFFF') . ';}';
  echo '#footer a.link, #footer a.visited { color: ' . get_theme_mod('footer_link_color', '#000000') . ';}';
  echo '</style>';
}
add_action( 'wp_head', 'gigil_customize_css');

// Add necessary javascript to enable live preview of colour changes
function gigil_livepreview() {
	wp_enqueue_script( 'livepreview-script', get_template_directory_uri() . '/js/livepreview.js', array('jquery'), '20150330', true);
}
add_action( 'customize_preview_init', 'gigil_livepreview' );


// Enqueue scripts
function gigil_scripts() {
	wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2');
	wp_enqueue_style('gigil-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700', array(), null);
	wp_enqueue_style('bootstraptheme-style', get_template_directory_uri() . '/lib/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css');
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css');
	wp_enqueue_style('owl_carousel-style', get_template_directory_uri() . '/lib/owl-carousel/owl.carousel.css');
	wp_enqueue_style('owl_carousel-theme-style', get_template_directory_uri() . '/lib/owl-carousel/owl.theme.css');
	wp_enqueue_style('owl_carousel-transitions-style', get_template_directory_uri() . '/lib/owl-carousel/owl.transitions.css');
	wp_enqueue_style('gigil-style', get_stylesheet_uri());

	wp_enqueue_script( 'owl_carousel-script', get_template_directory_uri() . '/lib/owl-carousel/owl.carousel.min.js', array('jquery'), '20150330', true);
	wp_enqueue_script( 'isotope-script', get_template_directory_uri() . '/lib/isotope/isotope.pkgd.min.js', array('jquery'), '20150330', true);
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/lib/bootstrap-3.3.5-dist/js/bootstrap.min.js', array('jquery'), '20150330', true);
	wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js', array(), '', true);
	wp_enqueue_script( 'gigil_-script', get_template_directory_uri() . '/js/domready.js', array('jquery'), '20150330', true);
}
add_action( 'wp_enqueue_scripts', 'gigil_scripts' );


// add hook
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects_sub_menu', 10, 2);
// filter_hook function to react on sub_menu flag
function my_wp_nav_menu_objects_sub_menu( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          } 
        }
      }
    }
    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    
    return $sorted_menu_items;
    
  } else if (isset($args->social_menu)) {
    foreach ( $sorted_menu_items as $key => $menu_item ) {
      $menu_item->title = '';
      $menu_item->target = '_blank';
      $sorted_menu_items[$key] = $menu_item;
    }
    
    return $sorted_menu_items;
    
  }
  return $sorted_menu_items;
}

add_filter('next_post_link', 'posts_link_attributes_1');
add_filter('previous_post_link', 'posts_link_attributes_2');

function posts_link_attributes_1($output) {
    $code = 'class="nextpost"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}
function posts_link_attributes_2($output) {
    $code = 'class="prevpost"';
    return str_replace('<a href=', '<a '.$code.' href=', $output);
}


add_action( 'rest_api_init', 'slug_register_acf' );
function slug_register_acf() {
  $post_types = get_post_types(['public'=>true], 'names');
  foreach ($post_types as $type) {
    register_api_field( $type,
        'acf',
        array(
            'get_callback'    => 'slug_get_acf',
            'update_callback' => null,
            'schema'          => null,
        )
    );
  }
}
function slug_get_acf( $object, $field_name, $request ) {
    return get_fields($object[ 'id' ]);
}


// Get all terms from all taxonomies for element(for isotope filtering)
function custom_taxonomies_terms_classes($id, $type) {
  $taxonomies = get_object_taxonomies( $type, 'objects' );
  $out = array();
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
    $terms = get_the_terms( $id, $taxonomy_slug );
    if ( !empty( $terms ) ) {
      foreach ( $terms as $term ) {
        $out[] = $term->slug;
      }
    }
  }
  return implode(' ', $out );
}

?>