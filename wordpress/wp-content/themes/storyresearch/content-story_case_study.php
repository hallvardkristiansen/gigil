<?php
/**
 * The default template for displaying posts of type case study
 */
?>

    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1><?php the_title(); ?></h1>
          <span class="divider red visible-xs"></span>
          <div class="subtitle col-sm-5 col-sm-offset-6">
            <span class="divider red hidden-xs"></span>
            <p><?php the_field('subtitle'); ?></p>
          </div>
          <div class="col-xs-12"><?php the_content(); ?></div>
        </div>
      </div>
    </div>
    <?php if (get_field('full_bleed_image')) : ?>
    <?php $img_src = get_field('full_bleed_image') ? wp_get_attachment_image_src(get_field('full_bleed_image'), 'full-bleed-image') : false; ?>
    <div class="container-fluid bigimg" style="background: transparent url(<?php echo $img_src[0]; ?>) no-repeat center center; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-sm-offset-1 col-xs-12 imgcaption">
            <h1><?php the_field('full_bleed_image_title'); ?></h1>
            <span class="divider red"></span>
            <div class="subtitle">
              <p><?php the_field('full_bleed_image_copy'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if (get_field('video_copy')) : ?>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <div class="col-xs-12"><?php the_field('video_copy'); ?></div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if (get_field('divider_subtitle')) : ?>
    <div class="bg lightgray">
      <div class="container content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="subtitle col-sm-6 col-sm-offset-5 t_margin_4em">
              <span class="divider red hidden-xs"></span>
              <p><?php the_field('divider_subtitle'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if (have_rows('timeline')) : ?>
    <div class="container content">
      <div class="row">
        <div class="col-xs-12 timeline">
          <div class="col-xs-12 noPadding">
            <div class="col-xs-2 col-xs-offset-5 start">
              <img src="<?php echo get_template_directory_uri(); ?>/grfx/start-stop_timeline.png" width="20" height="20" alt="image" />
            </div>
          </div>
          <?php while( have_rows('timeline') ): the_row(); ?>
          <?php $img_src = get_sub_field('timeline_image') ? wp_get_attachment_image_src(get_sub_field('timeline_image'), 'timeline-image') : false; ?>
          <div class="col-xs-12 tb_margin_2em noPadding">
            <div class="col-sm-2 col-sm-offset-5 col-xs-4 col-xs-offset-4">
              <img src="<?php echo $img_src[0]; ?>" alt="image" class="circular_mask" />
            </div>
            <div class="col-xs-8 col-xs-offset-2 event">
              <p><i><?php the_sub_field('timeline_date'); ?></i><br/>
                <?php the_sub_field('timeline_text'); ?></p>
            </div>
          </div>
          <?php endwhile; ?>
          <div class="col-xs-12 noPadding">
            <div class="col-xs-2 col-xs-offset-5 stop">
              <img src="<?php echo get_template_directory_uri(); ?>/grfx/start-stop_timeline.png" width="20" height="20" alt="image" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if (get_field('vimeo_embed_url') || get_field('video_poster_image')) : ?>
    <div class="bg lightgray">
      <div class="container content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <?php if (get_field('vimeo_embed_url')) : ?>
              <div class="videowrapper col-xs-12">
                <iframe src="<?php the_field('vimeo_embed_url'); ?>" width="560" height="349" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
              </div>
              <?php elseif (get_field('video_poster_image')) : ?>
              <div class="col-xs-12">
              <?php $img_src = get_field('video_poster_image') ? wp_get_attachment_image_src(get_field('video_poster_image'), 'video-image') : false; ?>
                <img src="<?php echo $img_src[0]; ?>" />
              <?php endif; ?>
              </div>          
            </div>          
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if (have_rows('articles')) : 
      $articleindex = 0;
    ?>
    <div class="container content">
      <div class="row">
        <div class="col-xs-12 projects">
          <?php while( have_rows('articles') ): the_row(); ?>
          <?php $img_src = get_sub_field('article_image') ? wp_get_attachment_image_src(get_sub_field('article_image'), 'article-image') : false; ?>
          <div class="col-xs-12 tb_margin_2em noPadding">
            <div class="col-sm-6 col-xs-12 b_margin_2em <?php if ($articleindex % 2) {echo 'rightfloat';} ?>">
              <img src="<?php echo $img_src[0]; ?>" alt="image" />
            </div>
            <div class="col-sm-6 col-xs-12 b_margin_2em">
              <h3><?php the_sub_field('article_title'); ?></h3>
              <span class="divider orange"></span>
              <p><?php the_sub_field('article_text'); ?></p>
            </div>
          </div>
          <?php $articleindex++; ?>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
    <?php if (get_field('concluding_text')) : ?>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <?php the_field('concluding_text'); ?>
        </div>
      </div>
    </div>
    <?php endif; ?>
