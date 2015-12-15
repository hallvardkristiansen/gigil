<?php
/**
 * Template Name: LCE 6-10
 */
$lce_args = ['post_type'=>'story_lce_6-10'];
$lces = new WP_Query( $lce_args );

get_header();
while ( have_posts() ) : the_post(); ?>
    <div class="bg gray diagonal">
      <div class="container content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <h1 class="col-xs-12"><?php the_field('page_title'); ?></h1>
            <span class="divider black visible-xs"></span>
            <div class="subtitle col-sm-5 col-sm-offset-6">
              <span class="divider black hidden-xs"></span>
              <p><?php the_field('subtitle'); ?></p>
            </div>
            <div class="col-xs-12"><?php the_content(); ?></div>
          </div>
        </div>
      </div>
    </div>
<?php endwhile; ?>
<?php if ( $lces->have_posts() ) : ?>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 projects">
        <?php while ( $lces->have_posts() ) : $lces->the_post(); ?>
          <?php $img_src = wp_get_attachment_image_src(get_field('project_image'), 'article-image'); ?>
          <div class="col-xs-12 tb_margin_2em noPadding">
            <div class="col-sm-5 col-sm-offset-0 col-xs-10 col-xs-offset-1 b_margin_2em">
              <?php if ($img_src) : ?>
              <img src="<?php echo $img_src[0]; ?>" alt="image" />
              <?php endif; ?>
            </div>
            <div class="col-sm-6 col-sm-offset-1 col-xs-12">
              <h3><?php the_title(); ?></h3>
              <span class="divider orange"></span>
              <p><?php the_content(); ?></p>
              <a class="button" href="<?php the_field('project_link'); ?>" target="_blank">The project</a>
            </div>
          </div>
    		<?php endwhile; ?>
        </div>
      </div>
    </div>
<?php endif;
get_footer(); ?>