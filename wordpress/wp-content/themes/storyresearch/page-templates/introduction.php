<?php
/**
 * Template Name: Introduction
 */
get_header();
$count_factlets = 1;
while ( have_posts() ) : the_post(); ?>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12"><?php the_field('page_title'); ?></h1>
          <span class="divider red visible-xs"></span>
          <div class="subtitle col-sm-5 col-sm-offset-6">
            <span class="divider red hidden-xs"></span>
            <p><?php the_field('subtitle'); ?></p>
          </div>
          <div class="col-xs-12"><?php the_content(); ?></div>
        </div>
      </div>
    </div>
    <div class="container content factlets">
      <div class="row">
        <?php $rows = get_field('factlets'); ?>
        <?php while( have_rows('factlets') ): the_row(); ?>
          <?php if ($count_factlets%2): ?><div class="col-xs-12"><?php endif; ?>
            <div class="<?php the_sub_field('width_class'); ?> col-xs-12 <?php the_sub_field('offset_class'); ?>">
              <h3 class="<?php the_sub_field('colour'); ?>"><?php the_sub_field('title'); ?></h3>
              <span class="divider <?php the_sub_field('colour'); ?>"></span>
              <p><?php the_sub_field('text'); ?></p>
            </div>
          <?php if ($count_factlets%2 == 0 || $count_factlets == count($rows)): ?></div><?php endif; ?>
          <?php $count_factlets++; ?>
        <?php endwhile; ?>
      </div>
    </div>
    <div class="container-fluid bgGroupPhotoContainer" style="background-image: url(<?php the_field('group_image'); ?>);">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <h1 class="col-sm-10 col-sm-offset-1 col-xs-12"><?php the_field('group_image_title'); ?></h1>
            <span class="divider red visible-xs"></span>
            <div class="subtitle col-sm-6 col-sm-offset-6">
              <span class="divider red hidden-xs"></span>
              <p><?php the_field('group_image_copy'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php 
endwhile;
get_footer(); ?>