<?php
/**
 * The default template for displaying content of type Events
 * Used for both single and index/archive/search.
 */

$this_id = get_the_ID();
?>
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <?php get_template_part( 'template-parts/snippet', 'carousel' ); ?>
        <div class="col-xs-12 col-sm-12 visible-sm visible-xs t_margin_2em">
          <?php get_template_part( 'template-parts/snippet', 'event_info' ); ?>
        </div>
        <?php if (get_field('artists')) : ?>
        <div class="row">
          <h1 class="col-xs-12 text-center t_margin_2em b_margin_2em">Featured artists</h1>
          <div class="col-xs-12 grid">
          <?php foreach (get_field('artists') as $artist) : ?>
              <div class="col-sm-4 col-xs-12 block grid-item">
                <div class="inner">
                  <a href="<?php echo esc_url(get_permalink($artist->ID)); ?>" class="thumb"><?php echo get_the_post_thumbnail($artist->ID, 'thumbnail'); ?></a>
                  <div class="element-info">
                    <?php echo '<h4><a href="'.esc_url(get_permalink($artist->ID)).'" rel="bookmark">'.get_the_title($artist->ID).'</a></h4>'; ?>
                    <p><?php echo get_the_excerpt($artist->ID); ?></p>
                    <a class="button" href="<?php echo esc_url(get_permalink($artist->ID)); ?>">Read more</a>
                  </div>
                </div>
              </div>
          <?php endforeach; ?>
          </div>
       </div>
      <?php endif; ?>
      </div>
      <div class="col-md-3 hidden-sm hidden-xs">
        <?php get_template_part( 'template-parts/snippet', 'event_info' ); ?>
      </div>
    </div>
  </div>    
<?php get_footer(); ?>
