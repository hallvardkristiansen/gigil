<?php
/**
 * Template Name: xjazz_venues
 */
 
get_header();
$category = get_field('associated_category');
$venues_args = ['post_type'=>'xjazz_venues', 'cat'=>$category, 'showposts'=>100];
$venues = new WP_Query( $venues_args );
$banners_args = ['post_type'=>'gigil_banners', 'cat'=>$category, 'showposts'=>10];
$banners = new WP_Query( $banners_args );
$this_id = get_the_ID();

get_template_part( 'template-parts/snippet', 'navigation' );
?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-xs-12">
      <?php if ( $venues->have_posts() ) : ?>
        <div class="col-xs-12" id="google_map" data-catid="<?php echo $category; ?>">
        </div>
        <div class="col-xs-12 grid">
        <?php while ( $venues->have_posts() ) : $venues->the_post();
          get_template_part( 'template-parts/snippet', 'grid_location' );
        endwhile; ?>
        </div>
      <?php endif; ?>
      </div>
      <?php if ( $banners->have_posts() ) : ?>
        <div class="col-sm-3 hidden-xs banners">
          <?php while ( $banners->have_posts() ) : $banners->the_post();
            get_template_part( 'template-parts/snippet', 'banner' );
          endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>    
<?php get_footer(); ?>