<?php
/**
 * The default template for displaying grid content of type event
 */
?>
<div class="col-sm-4 col-xs-12">
  <div class="blog-entry">
    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
    <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
    <?php the_excerpt(); ?>
    <a class="button" href="<?php echo esc_url(get_permalink()); ?>">Read more</a>
  </div>
</div>