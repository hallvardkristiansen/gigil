<?php
$sponsors_args = ['post_type'=>'gigil_sponsors'];
$sponsors = new WP_Query( $sponsors_args );
if ( $sponsors->have_posts() ) : ?>
    <div id="sponsors">
      <div class="container content noBottomPadding subscribe_news">
        <a href="#top" id="scrolltotop">top</a>
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>
              <div class="col-xs-4 tb_margin_2em noPadding">
                <a href="<?php the_field('link_to_sponsors_website'); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
              </div>
        		<?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>
    <div id="footer">
      <div class="container">
        <div class="row">
      		<?php if ( has_nav_menu( 'footer_1' ) ) : ?>
          <div class="col-sm-3 col-xs-6">
      			<nav id="footer-navigation-1" class="footer-navigation" role="navigation">
      				<?php
      					wp_nav_menu( array(
      						'theme_location' => 'footer_1',
      						'depth'          => 1,
      						'link_before'    => '<span class="screen-reader-text">',
      						'link_after'     => '</span>',
      					) );
      				?>
      			</nav>
          </div>
      		<?php endif; ?>
      		<?php if ( has_nav_menu( 'footer_2' ) ) : ?>
          <div class="col-sm-3 col-xs-6">
      			<nav id="footer-navigation-2" class="footer-navigation" role="navigation">
      				<?php
      					wp_nav_menu( array(
      						'theme_location' => 'footer_2',
      						'depth'          => 1,
      						'link_before'    => '<span class="screen-reader-text">',
      						'link_after'     => '</span>',
      					) );
      				?>
      			</nav>
          </div>
      		<?php endif; ?>
      		<?php if ( has_nav_menu( 'footer_3' ) ) : ?>
          <div class="col-sm-3 col-xs-6">
      			<nav id="footer-navigation-3" class="footer-navigation" role="navigation">
      				<?php
      					wp_nav_menu( array(
      						'theme_location' => 'footer_3',
      						'depth'          => 1,
      						'link_before'    => '<span class="screen-reader-text">',
      						'link_after'     => '</span>',
      					) );
      				?>
      			</nav>
          </div>
      		<?php endif; ?>
      		<?php if ( has_nav_menu( 'footer_4' ) ) : ?>
          <div class="col-sm-3 col-xs-6">
      			<nav id="footer-navigation-4" class="footer-navigation" role="navigation">
      				<?php
      					wp_nav_menu( array(
      						'theme_location' => 'footer_4',
      						'depth'          => 1,
      						'link_before'    => '<span class="screen-reader-text">',
      						'link_after'     => '</span>',
      					) );
      				?>
      			</nav>
          </div>
      		<?php endif; ?>
          <div class="col-sm-3 col-xs-6">
        		<?php if ( has_nav_menu( 'social' ) ) : ?>
        			<nav id="social-navigation" class="social-navigation" role="navigation">
        				<?php
        					// Social links navigation menu.
        					wp_nav_menu( array(
        						'theme_location' => 'social',
        						'depth'          => 1,
        						'link_before'    => '<span class="screen-reader-text">',
        						'link_after'     => '</span>',
        						'social_menu'    => true
        					) );
        				?>
        			</nav>
        		<?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>