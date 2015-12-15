<?php
/**
 * The default template for displaying content of type banner
 */
$link = (get_field('link_to_external_content') ? get_field('ext_link') : get_field('internal_link')); ?>
<div>
  <a href="<?php echo $link; ?>"><?php the_post_thumbnail('banner-image'); ?></a>
  <?php echo '<h4><a href="'.$link.'" rel="bookmark">'.get_field('banner_text').'</a></h4>'; ?>
</div>