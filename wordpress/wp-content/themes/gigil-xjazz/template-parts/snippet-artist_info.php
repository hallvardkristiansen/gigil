<?php
/**
 * The default template for displaying artist text
 */
?>
  <div>
    <h1><?php the_title(); ?></h1>
    <div class="col-xs-12 noPadding">
      <div class="col-xs-6 noPadding">
        <?php echo get_previous_post_link('%link', '&laquo; Previous artist'); ?>
      </div>
      <div class="col-xs-6 noPadding text-right">
        <?php echo get_next_post_link('%link', 'Next artist &raquo;'); ?>
      </div>
    </div>
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
