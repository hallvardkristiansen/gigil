<?php 
/**
 * The default template for displaying media carousel
 */

if (get_field('carousel_media') || has_post_thumbnail()) : ?>
  <div class="col-xs-12 featured owl-carousel noPadding">
    <?php if (has_post_thumbnail()) : ?>
      <div class="imagewrapper">
        <?php echo the_post_thumbnail('title-image'); ?>
        <div class="image_captions">
          <h4><?php echo get_post(get_post_thumbnail_id())->post_title; ?></h4>
          <p><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p>
        </div>
      </div>
    <?php endif; ?>
    <?php if (get_field('location')) : ?>
      <div class="mapwrapper">
        <div class="col-xs-12" id="google_map" data-venue-id="<?php echo get_the_ID(); ?>">
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
    <?php if (get_field('venue')) : ?>
      <div class="mapwrapper">
        <div class="col-xs-12" id="google_map" data-venue-id="<?php echo get_field('venue'); ?>">
        </div>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>