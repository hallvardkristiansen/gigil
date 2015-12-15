<?php
/**
 * Template Name: Venues
 */
 
get_header();
$venues_args = ['post_type'=>'xjazz_venues', 'showposts'=>100];
$venues = new WP_Query( $venues_args );
$banners_args = ['post_type'=>'gigil_banners', 'showposts'=>10];
$banners = new WP_Query( $banners_args );
$this_id = get_the_ID();

?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-xs-12">
      <?php if ( $venues->have_posts() ) : ?>
        <div class="col-xs-12" id="google_map">
        </div>
        <div class="col-xs-12">
        <?php while ( $venues->have_posts() ) : $venues->the_post();
          if (in_array($this_id, get_field('parent_page'))) : 
            get_template_part( 'template-parts/snippet', 'grid_venue' );
          endif;
        endwhile; ?>
        </div>
      <?php endif; ?>
      </div>
      <?php if ( $banners->have_posts() ) : ?>
        <div class="col-sm-3 hidden-xs">
          <?php while ( $banners->have_posts() ) : $banners->the_post();
            if (get_field('globally_visible') || in_array($this_id, get_field('visible_on'))) :
              get_template_part( 'template-parts/snippet', 'banner' );
            endif;
          endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>    
<?php get_footer(); ?>