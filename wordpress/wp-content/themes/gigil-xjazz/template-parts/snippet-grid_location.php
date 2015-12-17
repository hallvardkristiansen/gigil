<?php
/**
 * The default template for displaying grid content
 */
?>
<div class="col-md-4 col-sm-6 col-xs-6 block grid-item <?php echo custom_taxonomies_terms_classes(get_the_ID(), get_post_type()); ?>">
  <div class="inner">
    <a href="<?php echo esc_url(get_permalink()); ?>" class="thumb"><?php the_post_thumbnail('thumbnail'); ?></a>
    <div class="element-info">
      <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/grfx/mapmarker.svg" class="mapmarker" /><p><?php $loc = get_field('location'); echo $loc['address']; ?></p>
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
</div>
