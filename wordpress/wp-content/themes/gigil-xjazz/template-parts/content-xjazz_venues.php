<?php
/**
 * The default template for displaying content of type Venue
 * Used for both single and index/archive/search.
 */

$this_id = get_the_ID();
$events = get_posts(array(
  	'numberposts'	=> -1,
  	'post_type'		=> 'xjazz_events',
  	'post_parent' => 0,
  	'meta_key'		=> 'venue',
  	'meta_value'	=> $this_id,
  	'suppress_filters' => false
  ));
?>
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <?php get_template_part( 'template-parts/snippet', 'carousel' ); ?>
        <?php if ($events) : ?>
        <div class="row">
          <h1 class="col-xs-12">Upcoming gigs</h1>
          <div class="col-xs-12">
          <?php foreach ($events as $event) : ?>
              <div class="col-sm-4 col-xs-12">
                <div class="blog-entry">
                  <a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo get_the_post_thumbnail($event->ID, 'thumbnail'); ?></a>
                  <h4>
                    <a href="<?php echo esc_url(get_permalink($event->ID)); ?>" rel="bookmark"><?php echo get_the_title($event->ID); ?>
                    </a>
                  </h4>
                  <?php echo get_the_excerpt($event->ID); ?>
                  <a class="button" href="<?php echo esc_url(get_permalink($event->ID)); ?>">Read more</a>
                </div>
              </div>
          <?php endforeach; ?>
          </div>
       </div>
      <?php endif; ?>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div>
          <h1><?php the_title(); ?></h1>
          <div>
            <?php the_content(); ?>
          </div>
          <div>
            <?php if (get_field('links_and_resources')) : ?>
              <?php while(has_sub_field('links_and_resources')) : ?>
                <a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?></a>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
          <div>
            <div class="sharing"><?php echo do_shortcode('[ssba]'); ?></div>
          </div>
        </div>
        <div>
          <div class="col-xs-6">
            <?php echo get_previous_post_link('%link', '<span class="arrow"></span>Previous venue'); ?>
          </div>
          <div class="col-xs-6">
            <?php echo get_next_post_link('%link', 'Next venue<span class="arrow"></span>'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>    
<?php get_footer(); ?>
