<?php
/**
 * Template Name: Media
 */
get_header();
while ( have_posts() ) : the_post(); ?>
  <div class="container content">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-xs-12">
        <h1 class="col-xs-12"><?php the_field('page_title'); ?></h1>
        <span class="divider blue"></span>
        <div class="col-xs-12 center"><?php the_content(); ?></div>
      </div>
      <div class="col-sm-10 col-sm-offset-1 col-xs-12 contactinfo center tb_margin_2em">
        <?php $rows = get_field('press_contacts');
        while( have_rows('press_contacts') ): the_row(); ?>
          <?php if (count($rows) == 1): ?>
            <div class="col-sm-4 col-xs-12"></div>
          <?php endif; ?>
          <div class="col-sm-4 col-xs-12">
            <h2><?php the_sub_field('role'); ?></h2>
            <span class="divider orange"></span>
            <p class="noBottomMargin"><?php the_sub_field('name'); ?></p>
            <a href="mailto:<?php the_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a>
          </div>
          <?php if (count($rows) == 1): ?>
            <div class="col-sm-4 col-xs-12"></div>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
  <div class="bg contact noTopMargin">
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12 tb_margin_2em bottomPadding6pct">
          <div class="col-sm-6 tb_margin_2em">
            <?php the_field('downloads_copy'); ?>
            <?php while( have_rows('press_materials') ): the_row(); ?>
              <?php the_sub_field('file_description'); ?>
              <a class="button white" target="_blank" href="<?php the_sub_field('file_for_download'); ?>">Download</a>
            <?php endwhile; ?>
          </div>
          <div class="col-sm-5 col-sm-offset-1 tb_margin_2em">
            <?php while( have_rows('press_links') ): the_row(); ?>
              <a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?></a>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endwhile;
get_footer(); ?>