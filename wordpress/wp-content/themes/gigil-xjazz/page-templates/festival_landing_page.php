<?php
/**
 * Template Name: Xjazz landing page
 */
 
get_header();
$news_args = ['post_type'=>'posts', 'showposts'=>100];
$news = new WP_Query( $news_args );
$events_args = ['post_type'=>'xjazz_events', 'showposts'=>100];
$events = new WP_Query( $events_args );
$banners_args = ['post_type'=>'gigil_banners', 'showposts'=>10];
$banners = new WP_Query( $banners_args );
$this_id = get_the_ID();

?>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-xs-12">
      <?php if ( $events->have_posts() ) : ?>
        <div class="col-xs-12 featured owl-carousel">
          <?php while ( $events->have_posts() ) : $events->the_post();
            if (in_array($this_id, get_field('parent_page')) && get_field('featured_on_home')) : ?>
            <div>
              <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('title-image'); ?></a>
              <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
            </div>
          <?php endif;
          endwhile; ?>
        </div>
        <div class="col-xs-12">
          <?php while ( $events->have_posts() ) : $events->the_post();
            if (in_array($this_id, get_field('parent_page'))) : ?>
              <div class="col-sm-4 col-xs-12">
                <div class="blog-entry">
                  <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                  <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
                  <?php the_excerpt(); ?>
                  <a class="button" href="<?php echo esc_url(get_permalink()); ?>">Read more</a>
                </div>
              </div>
          <?php endif;
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