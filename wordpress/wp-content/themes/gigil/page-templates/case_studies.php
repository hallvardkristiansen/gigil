<?php
/**
 * Template Name: Case Studies
 */
 
get_header();
$case_studies_args = ['post_type'=>'story_case_study', 'showposts'=>100];
$case_studies = new WP_Query( $case_studies_args );
the_post(); ?>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12"><?php the_field('page_title'); ?></h1>
          <span class="divider red visible-xs"></span>
          <div class="subtitle col-sm-5 col-sm-offset-6 col-xs-12">
            <span class="divider red hidden-xs"></span>
            <p><?php the_field('subtitle'); ?></p>
          </div>
          <div class="col-xs-12"><?php the_content(); ?></div>
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
    <?php if (get_field('map_copy')): ?>
    <div class="container content tb_margin_2em">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <div class="col-xs-12"><?php the_field('map_copy'); ?></div>
        </div>
      </div>
    </div>
    <?php endif; ?>
<?php get_footer(); ?>