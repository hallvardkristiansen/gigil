<?php
/**
 * Template Name: Landing page
 */
get_header();
$blog_posts_args = ['post_type'=>'post', 'showposts'=>3];
$blog_posts = new WP_Query( $blog_posts_args );
$case_studies_args = ['post_type'=>'story_case_study', 'showposts'=>100];
$case_studies = new WP_Query( $case_studies_args );
the_post(); ?>
    <div class="bg gray diagonal">
      <div class="container illustration">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <img src="<?php the_field('hero_illustration'); ?>" />
          </div>
        </div>
      </div>
    </div>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12"><?php the_field('page_title'); ?></h1>
          <span class="divider red visible-xs"></span>
          <div class="subtitle col-sm-5 col-sm-offset-6">
            <span class="divider red hidden-xs"></span>
            <p><?php the_field('subtitle'); ?></p>
          </div>
          <div class="col-xs-12">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="bg lightgray">
      <div class="container content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <h1 class="col-xs-12"><?php the_field('video_title'); ?></h1>
            <span class="divider orange"></span>
            <p class="col-xs-12"><?php the_field('video_content'); ?></p>
            <div class="videowrapper col-xs-12">
              <?php if (get_field('vimeo_embed_url')) : ?>
                <iframe src="<?php the_field('vimeo_embed_url'); ?>" width="560" height="349" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              <?php elseif (get_field('video_poster_image')) : ?>
                <?php $img_src = wp_get_attachment_image_src(get_field('video_poster_image'), 'video-image'); ?>
                <img src="<?php echo $img_src[0]; ?>" />
              <?php endif; ?>
            </div>          
            <a class="button black" href="<?php the_field('video_read_more_link'); ?>">See more</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container content noBottomPadding">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12"><?php the_field('map_title'); ?></h1>
          <span class="divider orange"></span>
          <p class="col-xs-12"><?php the_field('map_content'); ?></p>
        </div>
      </div>
    </div>
    <?php if ( $case_studies->have_posts() ) : ?>
    <div class="container-fluid t_margin_4em">
      <div class="row">
        <div class="col-xs-12 mapContainer">
          <img class="map" src="<?php echo get_template_directory_uri(); ?>/grfx/eu_map.png" alt="EU map" />
          <div class="map_overlay">
            <?php while ( $case_studies->have_posts() ) : $case_studies->the_post(); ?>
              <a class="marker" style="left: <?php the_field('map_point_x'); ?>%; top: <?php the_field('map_point_y'); ?>%;" data-target="#info_<?php the_ID(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/grfx/mapmarker.png" alt="marker" /></a>
              <div class="info" id="info_<?php the_ID(); ?>" style="left: <?php the_field('map_point_x'); ?>%; top: <?php the_field('map_point_y'); ?>%;">
                <div class="txt">
                  <h3><?php the_title(); ?></h3>
                  <span class="divider orange"></span>
                  <p><?php the_field('map_info_box_text'); ?></p>
                  <a class="button" href="<?php the_permalink(); ?>">Read more</a>
                </div>
                <a class="cross" data-target="#info_<?php the_ID(); ?>">Close</a>
                <span class="arrow"></span>
              </div>
        		<?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php rewind_posts(); the_post(); ?>
    <?php if (get_field('call_to_action_title')) : ?>
    <div class="container content t_margin_neg_4em">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12"><?php the_field('call_to_action_title'); ?></h1>
          <span class="divider green visible-xs"></span>
          <div class="subtitle col-sm-5 col-sm-offset-6">
            <span class="divider green hidden-xs"></span>
            <p><?php the_field('call_to_action_subtitle'); ?></p>
          </div>
          <div class="col-xs-12"><?php the_field('call_to_action_content'); ?></div>
          <div class="col-xs-12 center">
      			<nav id="social-navigation" class="social-navigation social-sites" role="navigation">
      				<?php
      					// Social sites navigation menu.
      					wp_nav_menu( array(
      						'theme_location' => 'social_sites',
      						'depth'          => 1,
      						'link_before'    => '<span class="screen-reader-text">',
      						'link_after'     => '</span>',
      						'social_menu'    => true
      					) );
      				?>
      			</nav>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if ( $blog_posts->have_posts() ) : ?>
    <div class="bg lightgray">
      <div class="container content noBottomPadding">
        <div class="row">
          <div class="col-xs-12">
            <h1 class="col-xs-12">Blog</h1>
            <span class="divider blue"></span>
            <?php while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
            <div class="col-sm-4 col-xs-12">
              <div class="blog-entry">
                <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
                <?php the_title(sprintf('<h4 class="col-xs-12"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
                <span class="divider blue"></span>
                <?php the_excerpt(); ?>
                <a class="button" href="<?php echo esc_url(get_permalink()); ?>">Read more</a>
              </div>
            </div>
        		<?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
<?php 
get_footer();
?>