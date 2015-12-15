<?php
/**
 * The default template for displaying content of type Artists
 * Used for both single and index/archive/search.
 */

$this_id = get_the_ID();
$events = get_posts(array(
	'post_type' => 'xjazz_events',
	'meta_query' => array(
		array(
			'key' => 'artists', // name of custom field
			'value' => '"' . $this_id . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
			'compare' => 'LIKE'
		)
	)
));
?>
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12">
        <?php if (get_field('carousel_media') || has_post_thumbnail()) : ?>
          <div class="col-xs-12 featured owl-carousel">
            <?php if (has_post_thumbnail()) : ?>
              <div class="imagewrapper">
                <?php echo the_post_thumbnail('title-image'); ?>
                <div class="image_captions">
                  <h4><?php echo get_post(get_post_thumbnail_id())->post_title; ?></h4>
                  <p><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
                </div>
              </div>
            <?php endif; ?>
            <?php if (get_field('carousel_media')) : ?>
              <?php while(has_sub_field('carousel_media')) : 
                if (get_sub_field('embed_media')) : 
                  if (get_sub_field('use_iframe_embed')) :
                    echo '<div class="videowrapper">'.get_sub_field('iframe_embed').'</div>';
                  else :
                    echo '<div class="videowrapper">'.get_sub_field('embed_media_url').'</div>';
                  endif;
                elseif (get_sub_field('images')) : 
                  foreach (get_sub_field('images') as $index=>$image) : ?>
                    <div class="imagewrapper">
                      <?php echo wp_get_attachment_image($image['id'], 'title-image'); ?>
                      <div class="image_captions">
                        <h4><?php echo $image['title']; ?></h4>
                        <p><?php echo $image['caption']; ?></p>
                      </div>
                    </div>
                <?php endforeach;
                endif; ?>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        <div class="modal fade" id="imgviewer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <img src="" alt="image" id="theimage" />
              </div>
            </div>
          </div>
        </div>
      <?php if ($events) : ?>
        <div class="row">
          <h1 class="col-xs-12">Upcoming gigs</h1>
          <div class="col-xs-12">
          <?php foreach ($events as $event) : ?>
              <div class="col-sm-4 col-xs-12">
                <div class="blog-entry">
                  <a href="<?php echo esc_url(get_permalink($event->ID)); ?>"><?php echo get_the_post_thumbnail($event->ID, 'thumbnail'); ?></a>
                  <h4>
                    <a href="<?php echo esc_url(get_permalink($event->ID)); ?>" rel="bookmark"><?php echo get_the_title($event->ID); ?>
                    </a>
                  </h4>
                  <?php echo get_the_excerpt($event->ID); ?>
                  <a class="button" href="<?php echo esc_url(get_permalink($event->ID)); ?>">Read more</a>
                </div>
              </div>
          <?php endforeach; ?>
          </div>
       </div>
      <?php endif; ?>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div>
          <h1><?php the_title(); ?></h1>
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
        <div>
          <div class="col-xs-6">
            <?php echo get_previous_post_link('%link', '<span class="arrow"></span>Previous artist'); ?>
          </div>
          <div class="col-xs-6">
            <?php echo get_next_post_link('%link', 'Next artist<span class="arrow"></span>'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>    
<?php get_footer(); ?>
