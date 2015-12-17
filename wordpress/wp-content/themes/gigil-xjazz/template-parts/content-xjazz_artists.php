<?php
/**
 * The default template for displaying content of type Artists
 * Used for both single and index/archive/search.
 */

$this_id = get_the_ID();
$events = get_posts(array(
	'post_type' => 'xjazz_events',
	'meta_query' => array(
		array(
			'key' => 'artists', // name of custom field
			'value' => '"' . $this_id . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
			'compare' => 'LIKE'
		)
	)
));
?>
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12">
      <?php get_template_part( 'template-parts/snippet', 'carousel' ); ?>
      <?php if ($events) : ?>
        <div class="row">
          <h1 class="col-xs-12 text-center t_margin_2em b_margin_2em">Upcoming gigs</h1>
          <div class="col-xs-12">
          <?php foreach ($events as $event) : ?>
              <div class="col-sm-4 col-xs-12 block">
                <div class="inner">
                  <a href="<?php echo esc_url(get_permalink($event->ID)); ?>" class="thumb"><?php echo get_the_post_thumbnail($event->ID, 'thumbnail'); ?></a>
                  <div class="element-info">
                    <?php echo '<h4><a href="'.esc_url(get_permalink($event->ID)).'" rel="bookmark">'.get_the_title($event->ID).'</a></h4>'; ?>
                    <?php echo get_the_excerpt($event->ID); ?>
                    <?php if (get_field('ticket_url', $event->ID)) : ?>
                      <div class="buttons">
                        <a class="button tickets" target="_blank" href="<?php echo esc_url(get_field('ticket_url', $event->ID)); ?>">Get tickets</a>
                        <a class="button" href="<?php echo esc_url(get_permalink($event->ID)); ?>">Read more</a>
                      </div>
                    <?php else : ?>
                      <a class="button" href="<?php echo esc_url(get_permalink($event->ID)); ?>">Read more</a>
                    <?php endif; ?>
                  </div>
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
            <?php echo get_previous_post_link('%link', '<span class="arrow"></span>Previous artist'); ?>
          </div>
          <div class="col-xs-6">
            <?php echo get_next_post_link('%link', 'Next artist<span class="arrow"></span>'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>    
<?php get_footer(); ?>
