<?php if ( has_nav_menu( 'subsection' ) ) : ?>
  <div class="container-fluid" id="subsections">
    <div class="container">
      <nav class="row" role="navigation">
  			<?php
  				// Top level navigation menu.
  				wp_nav_menu(array(
  					'menu_class'     => 'col-xs-12',
  					'theme_location' => 'subsection',
  					'container'      => false,
  					'depth'          => 1
  				));
  			?>
      </nav>
    </div>
  </div>
<?php endif; ?>
<div class="container" name="top">
  <header class="row" id="header">
    <div class="col-xs-6 col-sm-6 col-md-5 col-lg-4 logo">
      <?php 
        $parents = xjazz_return_parent_pages();
        if (is_array($parents)) {
          $rootid = array_pop($parents);
          $logo = get_field('custom_logo', $rootid) ? esc_url(get_field('custom_logo', $rootid)) : esc_url(get_theme_mod( 'gigil_logo' ));
          $logo_mobile = get_field('custom_mobile_logo', $rootid) ? esc_url(get_field('custom_mobile_logo', $rootid)) : esc_url(get_theme_mod( 'gigil_mobile_logo' ));
        } else {
          $logo = get_field('custom_logo') ? esc_url(get_field('custom_logo')) : esc_url(get_theme_mod( 'gigil_logo' ));
          $logo_mobile = get_field('custom_mobile_logo') ? esc_url(get_field('custom_mobile_logo')) : esc_url(get_theme_mod( 'gigil_mobile_logo' ));
        }
        if ($logo) : ?>
        <div class='site-logo'>
          <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
            <img class="lg hidden-xs" src='<?php echo $logo; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
            <img class="sm visible-xs" src='<?php echo $logo_mobile; ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
          </a>
        </div>
      <?php else : ?>
        <hgroup>
          <h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
          <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
        </hgroup>
      <?php endif; ?>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-7 col-lg-8">
      <div id="search-field">
        <?php get_search_form(); ?>
      </div>
  		<?php if ( has_nav_menu( 'subsection' ) ) : ?>
        <nav id="navigation" role="navigation">
  				<?php
  					// Primary navigation menu.
  					wp_nav_menu(array(
              'menu'           => 'Secondary menu',
  						'menu_class'     => '',
  						'theme_location' => 'subsection',
  						'container'      => false,
              'sub_menu'       => true
  					));
  				?>
        </nav>
  		<?php endif; ?>
    </div>
  </header>
</div>
