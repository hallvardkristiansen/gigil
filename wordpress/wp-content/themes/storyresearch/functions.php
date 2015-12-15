<?php
if ( ! function_exists( 'story_research_setup' ) ) :
  function story_research_setup() {
  	add_theme_support( 'title-tag' );
  
  	/*
  	 * Enable support for Post Thumbnails on posts and pages.
  	 *
  	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
  	 */
  	add_theme_support('post-thumbnails');
  	set_post_thumbnail_size(350, 245, true);
  	add_image_size('blog-main-image', 915, 606, true);
  	add_image_size('gallery-image', 350, 245, true);
  	add_image_size('timeline-image', 250, 250, true);
  	add_image_size('article-image', 800, 533, true);
  	add_image_size('full-bleed-image', 1600, 1200, true);
  	add_image_size('video-image', 1000, 600, true);
  	add_image_size('partner-image', 600, 400, false);
  
  	register_nav_menus( array(
  		'legal'  => __( 'Legal Links Menu', 'story_research' ),
  		'social'  => __( 'Social Links Menu', 'story_research' ),
  		'social_sites'  => __( 'Social Sites', 'story_research' ),
  		'primary' => __( 'Primary Menu',      'story_research' )
  	) );
  	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', story_research_fonts_url() ) );
  }
endif;
add_action( 'after_setup_theme', 'story_research_setup' );

if ( ! function_exists( 'story_research_fonts_url' ) ) :
function story_research_fonts_url($fonts) {
	$fonts_url = '';
	$subsets   = 'latin';
	$fonts_url = add_query_arg( array(
		'family' => urlencode( implode( '|', $fonts ) ),
		'subset' => urlencode( $subsets ),
	), 'https://fonts.googleapis.com/css' );

	return $fonts_url;
}
endif;

function story_research_scripts() {
	wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2');
	wp_enqueue_style('story_research-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,500,700|Playfair+Display:400italic', array(), null);
	wp_enqueue_style('bootstraptheme-style', get_template_directory_uri() . '/lib/bootstrap-3.3.5-dist/css/bootstrap-theme.min.css');
	wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/lib/bootstrap-3.3.5-dist/css/bootstrap.min.css');
	wp_enqueue_style('owl_carousel-style', get_template_directory_uri() . '/lib/owl.carousel.2.0.0-beta.2.4/assets/owl.carousel.css');
	wp_enqueue_style('owl_carousel-theme-style', get_template_directory_uri() . '/lib/owl.carousel.2.0.0-beta.2.4/assets/owl.carousel.theme.css');
	wp_enqueue_style('story_research-style', get_stylesheet_uri());

	wp_enqueue_script( 'owl_carousel-script', get_template_directory_uri() . '/lib/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js', array('jquery'), '20150330', true);
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/lib/bootstrap-3.3.5-dist/js/bootstrap.min.js', array('jquery'), '20150330', true);
	wp_enqueue_script( 'story_research_-script', get_template_directory_uri() . '/js/domready.js', array('jquery'), '20150330', true);
}
add_action( 'wp_enqueue_scripts', 'story_research_scripts' );


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

function strip_shortcode_gallery( $content ) {
  preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
  if ( ! empty( $matches ) ) {
    foreach ( $matches as $shortcode ) {
      if ( 'gallery' === $shortcode[2] ) {
        $pos = strpos( $content, $shortcode[0] );
        if ($pos !== false) {
          return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
        }
      }
    }
  }
  return $content;
}

// Custom filter function to modify default gallery shortcode output
function my_post_gallery( $output, $attr ) {
	global $post, $wp_locale;
	static $instance = 0;
	$instance++;
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) unset( $attr['orderby'] );
	}
	// Get attributes from shortcode
	extract( shortcode_atts( array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr ) );

	// Initialize
	$id = intval( $id );
	$attachments = array();
	if ( $order == 'RAND' ) $orderby = 'none';

	if ( ! empty( $include ) ) {
		// Include attribute is present
		$include = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

		// Setup attachments array
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}
	} else if ( ! empty( $exclude ) ) {

		// Exclude attribute is present 
		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

		// Setup attachments array
		$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	} else {
		// Setup attachments array
		$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
	}

	if ( empty( $attachments ) ) return '';

	// Filter gallery differently for feeds
	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		return $output;
	}

	// Filter tags and attributes
	$itemtag = tag_escape( $itemtag );
	$captiontag = tag_escape( $captiontag );
	$columns = intval( $columns );
	$itemwidth = $columns > 0 ? floor( 100 / $columns ) : 100;
	$float = is_rtl() ? 'right' : 'left';
	$selector = "gallery-{$instance}";

	// Filter gallery CSS
	
	$output = '<div class="container-fluid carousel"><div class="owl-carousel">';
	// Iterate through the attachments in this gallery instance
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
  	$galleryimg = wp_get_attachment_image_src($id, 'large');
		$output .= '<div>';
    $output .= '<a class="viewimg" data-toggle="modal" data-target="#imgviewer" data-img-url="'. $galleryimg[0] .'">';
    $output .= wp_get_attachment_image($id, 'gallery-image');
    $output .= '</a>';
    $output .= '</div>';
	}
	// End gallery output
	$output .= "</div></div>";
	return $output;
}

// Apply filter to default gallery shortcode
add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
?>