<?php
/**
 * Template Name: Contact
 */
get_header();
while ( have_posts() ) : the_post(); ?>
  <div class="container content">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-xs-12">
        <h1 class="col-xs-12"><?php the_field('page_title'); ?></h1>
        <span class="divider orange"></span>
        <div class="col-xs-12 center"><?php the_content(); ?></div>
      </div>
      <div class="col-sm-10 col-sm-offset-1 col-xs-12 contactinfo center tb_margin_2em">
        <?php $rows = get_field('contact_people');
          while( have_rows('contact_people') ): the_row(); ?>
          <?php if (count($rows) == 1): ?>
            <div class="col-sm-4 col-xs-12"></div>
          <?php endif; ?>
            <div class="col-sm-4 col-xs-12">
              <h2><?php the_sub_field('role'); ?></h2>
              <span class="divider green"></span>
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
<?php endwhile; ?>
  <div class="bg contact">
    <div class="bg diagonal-top">
      <div class="container content">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <?php echo do_shortcode('[contact-form-7 id="52" title="Contact form"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>