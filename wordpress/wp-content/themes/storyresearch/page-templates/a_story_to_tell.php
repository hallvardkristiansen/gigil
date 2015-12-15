<?php
/**
 * Template Name: A Story To Tell
 */

get_header();
while ( have_posts() ) : the_post(); ?>

    <div class="bg gray diagonal">
      <div class="container content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <h1 class="col-xs-12"><?php the_field('page_title'); ?></h1>
            <span class="divider orange visible-xs"></span>
            <div class="subtitle col-sm-5 col-sm-offset-6">
              <span class="divider orange hidden-xs"></span>
              <p><?php the_field('subtitle'); ?></p>
            </div>
            <div class="col-xs-12"><?php the_content(); ?></div>
          </div>
        </div>
      </div>
    </div>
    <?php if (have_rows('videos')) : ?>
    <div class="container content">
      <div class="row">
        <?php while( have_rows('videos') ): the_row(); ?>
          <?php $img_src = get_sub_field('video_image') ? wp_get_attachment_image_src(get_sub_field('video_image'), 'video-image') : false; ?>
          <?php if (get_sub_field('vimeo_embed_url') || get_sub_field('video_image')) : ?>
          <div class="col-sm-10 col-sm-offset-1 col-xs-12 tb_margin_2em">
            <?php if (get_sub_field('vimeo_embed_url')) : ?>
              <div class="col-xs-12">
                <div class="videowrapper">
                  <iframe src="<?php the_sub_field('vimeo_embed_url'); ?>" width="560" height="349" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                </div>
              </div>
            <?php elseif ($img_src) : ?>
              <div class="col-xs-12 tb_margin_2em">
                <img src="<?php echo $img_src[0]; ?>" />
              </div>
            <?php endif; ?>
            <div class="col-xs-12"><?php the_sub_field('video_text'); ?></div>
          </div>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>
<?php 
endwhile;
get_footer(); ?>