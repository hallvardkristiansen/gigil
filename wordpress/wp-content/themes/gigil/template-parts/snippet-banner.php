<?php
/**
 * The default template for displaying content of type banner
 */
$link = (get_field('link_to_external_content') ? get_field('ext_link') : get_field('internal_link')); ?>
<div class="banner">
  <a href="<?php echo $link; ?>"><?php the_post_thumbnail('banner-image'); ?></a>
  <?php echo '<button><a href="'.$link.'" rel="bookmark">'.get_field('banner_text').'</a></button>'; ?>
</div>