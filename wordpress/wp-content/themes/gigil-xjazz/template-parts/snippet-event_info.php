<?php
/**
 * The default template for displaying event text
 */
?>
  <div>
    <h1><?php the_title(); ?></h1>
    <div class="col-xs-12 noPadding">
      <div class="col-xs-6 noPadding">
        <?php echo get_previous_post_link('%link', '&laquo; Previous event'); ?>
      </div>
      <div class="col-xs-6 noPadding text-right">
        <?php echo get_next_post_link('%link', 'Next event &raquo;'); ?>
      </div>
    </div>
    <?php
      $venue = get_post(get_field('venue'));
      if ($venue) : ?>
      <div class="venue col-md-12 col-sm-6 col-xs-12">
      <?php $loc = get_field('location', $venue->ID); ?>
          <h4>
            <a href="<?php echo esc_url(get_permalink($venue->ID)); ?>" rel="bookmark">
              <svg class="venuemarker" width="17px" height="21px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;"><path d="M8.458,0c4.669,0 8.459,3.79 8.459,8.458c0,4.669 -7.581,11.733 -8.459,11.733c-0.877,0 -8.458,-7.064 -8.458,-11.733c0,-4.668 3.79,-8.458 8.458,-8.458ZM8.458,4.683c2.084,0 3.776,1.691 3.776,3.775c0,2.084 -1.692,3.776 -3.776,3.776c-2.084,0 -3.775,-1.692 -3.775,-3.776c0,-2.084 1.691,-3.775 3.775,-3.775Z" id="mapmarker" fill="#F20000"/></svg>
              <?php echo get_the_title($venue->ID); ?>
            </a>
          </h4>
          <p><?php echo $loc['address']; ?></p>
          <a class="button" href="<?php echo esc_url(get_permalink($venue->ID)); ?>">Read more</a>
      </div>
    <?php endif; ?>
    <div class="t_margin_3em">
      <?php the_content(); ?>
    </div>
    <?php if (get_field('links_and_resources')) : ?>
      <div>
        <?php while(has_sub_field('links_and_resources')) : ?>
          <a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?></a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
    <div>
      <div class="sharing"><?php echo do_shortcode('[ssba]'); ?></div>
    </div>
  </div>
