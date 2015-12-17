<?php if ( has_nav_menu( 'subsection' ) ) : ?>
  <div class="container">
    <nav class="row" id="subsections" role="navigation">
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
<?php endif; ?>
<div class="container" name="top">
  <header class="row" id="header">
    <div class="col-xs-6 logo">
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
    <div class="col-sm-6 col-xs-12">
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
    <div class="col-xs-2 mobile_menu">
      <button type="button" class="btn btn-default navbar-toggle visible-xs" id="toggle_navigation">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
  </header>
</div>
