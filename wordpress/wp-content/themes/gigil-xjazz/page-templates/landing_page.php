<?php
/**
 * Template Name: Landing page
 */
 
get_header();
$category = get_field('associated_category');
$news_args = ['post_type'=>'posts', 'cat'=>$category, 'showposts'=>100];
$news = new WP_Query( $news_args );
$events_args = ['post_type'=>'xjazz_events', 'cat'=>$category, 'showposts'=>100];
$events = new WP_Query( $events_args );
$banners_args = ['post_type'=>'gigil_banners', 'cat'=>$category, 'showposts'=>10];
$banners = new WP_Query( $banners_args );
$this_id = get_the_ID();

get_template_part( 'template-parts/snippet', 'navigation' );
?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-xs-12">
      <?php if ( $events->have_posts() ) : ?>
        <div class="col-xs-12 featured owl-carousel">
          <?php while ( $events->have_posts() ) : $events->the_post();
            if (get_field('featured_on_home')) : ?>
            <div class="imagewrapper">
              <?php the_post_thumbnail('title-image'); ?>
              <div class="image_captions">
                <h4><?php the_title(); ?></h4>
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>
          <?php endif;
          endwhile; ?>
        </div>
        <div class="col-xs-12">
          <?php while ( $events->have_posts() ) : $events->the_post(); ?>
            <div class="col-md-4 col-sm-6 col-xs-6 block grid-item <?php echo custom_taxonomies_terms_classes(get_the_ID(), get_post_type()); ?>">
            <?php get_template_part( 'template-parts/snippet', 'grid_element' ); ?>
            </div>
          <?php endwhile; ?>
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