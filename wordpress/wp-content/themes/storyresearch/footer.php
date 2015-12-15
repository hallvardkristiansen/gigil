
    <div class="container content noBottomPadding subscribe_news">
      <a href="#top" id="scrolltotop">top</a>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12">Stay in touch</h1>
          <span class="divider green"></span>
          <p class="col-xs-12 center">Subscribe to get all news on STORY and on all LCE 6-10 projects!</p>
        </div>
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <?php echo do_shortcode('[contact-form-7 id="147" title="Newsletter subscription"]'); ?>
        </div>
      </div>
    </div>
    <div id="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-sm-offset-1">
            <h3>STORY</h3>
            <span class="divider"></span>
            <p>STORY wants to demonstrate and evaluate innovative approaches for energy storage systems.</p>
            <p>All content created, filmed & styled by <a href="http://www.loptafilm.com" target="_blank">Lopta Film GmbH</a> with help of <br/><a href="http://www.foundry.berlin" target="_blank">FOUNDRY Berlin</a></p>
          </div>
          <div class="col-sm-3 col-sm-offset-1">
            <h3>LEGAL</h3>
            <span class="divider"></span>
        		<?php if ( has_nav_menu( 'social' ) ) : ?>
        			<nav id="legal-navigation" class="legal-navigation" role="navigation">
        				<?php
        					// Legal links navigation menu.
        					wp_nav_menu( array(
        						'theme_location' => 'legal',
        						'depth'          => 1,
        						'link_before'    => '<span class="screen-reader-text">',
        						'link_after'     => '</span>',
        					) );
        				?>
        			</nav><!-- .social-navigation -->
        		<?php endif; ?>
          </div>
          <div class="col-sm-3 col-sm-offset-1 flagquote">
            <img src="<?php echo get_template_directory_uri(); ?>/grfx/EU_flag.png" class="flag" alt="EU flag" />
            <p>This project has received funding from the European Union’s Horizon 2020 research and innovation programme under grant agreement No 646426</p>
            <p>Project STORY - H2020-LCE-2014-3</p>
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
        			</nav><!-- .social-navigation -->
        		<?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    <?php wp_footer(); ?>
  </body>
</html>