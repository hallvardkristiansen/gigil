<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <meta name="title" content="<?php bloginfo('name'); ?>">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <meta property="og:site_name" content="<?php bloginfo('name'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php bloginfo('url'); ?>">
    <meta property="og:title" content="<?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php bloginfo('description'); ?>">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/favicons/apple-touch-icon-180x180.png">
    <meta property="og:locale" content="en_US">
    <meta name="twitter:widgets:csp" content="on">
    <meta name="twitter:url" content="https://twitter.com/H2020STORY">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="<?php bloginfo('name'); ?>">
    <meta name="twitter:description" content="<?php bloginfo('description'); ?>">
    <meta name="twitter:site" content="<?php bloginfo('url'); ?>">

    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/favicons/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
  	<link rel="profile" href="http://gmpg.org/xfn/11">
  	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  	<!--[if lt IE 9]>
  	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
  	<![endif]-->
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="collapse" id="search-field">
      <div class="container">
        <?php get_search_form(); ?>
      </div>
    </div>
    <div class="container" name="top">
      <header class="row" id="header">
        <div class="col-xs-2 search">
          <button type="button" class="toggle_search" data-toggle="collapse" data-target="#search-field">Search</button>
        </div>
        <div class="col-xs-8 logo">
          <?php if ( get_theme_mod( 'gigil_logo' ) ) : ?>
            <div class='site-logo'>
              <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
                <img class="lg hidden-xs" src='<?php echo esc_url( get_theme_mod( 'gigil_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
                <img class="sm visible-xs" src='<?php echo esc_url( get_theme_mod( 'gigil_mobile_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
              </a>
            </div>
          <?php else : ?>
            <hgroup>
              <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
              <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
            </hgroup>
          <?php endif; ?>
        </div>
        <div class="col-xs-2 login">
          <button type="button" class="btn btn-default navbar-toggle visible-xs" id="toggle_navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
      </header>
  		<?php if ( has_nav_menu( 'primary' ) ) : ?>
        <nav class="row" id="navigation" role="navigation">
  				<?php
  					// Primary navigation menu.
  					wp_nav_menu(array(
  						'menu_class'     => 'col-xs-12',
  						'theme_location' => 'primary',
  						'container'      => false
  					));
            wp_nav_menu(array(
  						'menu_class'     => 'secondary_navigation hidden-xs col-sm-12',
              'menu'           => 'Secondary menu',
  						'container'      => false,
  						'theme_location' => 'primary',
              'sub_menu'       => true
            ));
  				?>
        </nav>
  		<?php endif; ?>
    </div>
