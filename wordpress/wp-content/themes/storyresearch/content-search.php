<?php
/**
 * The default template for displaying search results
 */
 echo get_post_type();
 if (get_post_type() == 'story_partner') {
   $permalink = esc_url(get_site_url() . '/project-partners/');
 } else if (get_post_type() == 'story_lce_6-10') {
   $permalink = esc_url(get_site_url() . '/lce-6-10/');
 } else {
   $permalink = esc_url(get_permalink());
 }
?>
                <div class="col-sm-4 col-xs-12">
                  <?php if (get_the_post_thumbnail()) : ?>
                  <div class="blog-entry">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
                    <?php else : ?>
                  <div class="blog-entry t_padding_1em">                    
                    <?php endif; ?>
                    <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', $permalink), '</a></h4>'); ?>
                    <span class="divider blue"></span>
                    <?php the_excerpt(); ?>
                    <a class="button" href="<?php echo $permalink; ?>">Read more</a>
                  </div>
                </div>
