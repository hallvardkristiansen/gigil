<?php
/**
 * The default template for displaying grid content
 */
?>
  <div class="inner">
    <a href="<?php echo esc_url(get_permalink()); ?>" class="thumb"><?php the_post_thumbnail('thumbnail'); ?></a>
    <div class="element-info">
      <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
      <?php the_excerpt(); ?>
      <?php if (get_field('ticket_url')) : ?>
        <div class="buttons">
          <a class="button tickets" target="_blank" href="<?php echo esc_url(get_field('ticket_url')); ?>">Get tickets</a>
          <a class="button" href="<?php echo esc_url(get_permalink()); ?>">Read more</a>
        </div>
      <?php else : ?>
        <a class="button" href="<?php echo esc_url(get_permalink()); ?>">Read more</a>
      <?php endif; ?>
    </div>
  </div>
