<?php
/**
 * The default template for displaying search results
 */
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
