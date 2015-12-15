<?php
/**
 * Template Name: Project Partners
 */ 
$partners_args = ['post_type'=>'story_partner'];
$partners = new WP_Query( $partners_args );

get_header();
while ( have_posts() ) : the_post(); ?>
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
<?php endwhile; ?>
<?php if ( $partners->have_posts() ) : ?>
    <div class="container content">
      <div class="row">
        <div class="col-xs-12">
        <?php while ( $partners->have_posts() ) : 
          $partners->the_post();
          $logo_src = wp_get_attachment_image_src(get_field('partner_logo'), 'partner-image');
          $img_src = wp_get_attachment_image_src(get_field('the_team_image'), 'article-image');
          $img_src_hover = wp_get_attachment_image_src(get_field('the_team_image_hover'), 'article-image'); 
          if ($logo_src) : ?>
            <div class="col-sm-3 col-xs-6 tb_margin_15px gridimg" id="open_projectinfo_<?php echo the_ID(); ?>" data-toggle="collapse" data-target="#projectinfo_<?php echo the_ID(); ?>">
              <img src="<?php echo $logo_src[0]; ?>" alt="<?php the_title(); ?>" />
            </div>
            <div class="col-xs-12 tb_margin_15px bg lightgray collapse projectbox" id="projectinfo_<?php echo the_ID(); ?>">
              <a class="close" data-toggle="collapse" data-target="#projectinfo_<?php echo the_ID(); ?>">close</a>
              <div class="col-sm-10 col-sm-offset-1 tb_margin_2em t_margin_4em">
                <h1>Introduction</h1>
                <span class="divider black"></span>
                <div><?php the_field('introduction'); ?></div>
              </div>
              <div class="col-sm-10 col-sm-offset-1 tb_margin_2em">
                <h1>The project</h1>
                <span class="divider orange"></span>
                <div><?php the_field('the_project'); ?></div>
              </div>
              <div class="col-sm-10 col-sm-offset-1 tb_margin_2em b_margin_4em">
                <h1>The team</h1>
                <span class="divider orange"></span>
                <div class="col-sm-6">
                <?php if ($img_src && $img_src_hover) : ?>
                  <div class="greybox b_margin_2em hover-toggle"><img src="<?php echo $img_src_hover[0]; ?>" alt="<?php the_title(); ?>" /><img class="hideonhover" src="<?php echo $img_src[0]; ?>" alt="<?php the_title(); ?>" /></div>
                <?php endif; ?>
                </div>
                <div class="col-sm-6"><?php the_field('the_team'); ?></div>
              </div>
            </div>
          <?php endif; ?>
    		<?php endwhile; ?>
        </div>
      </div>
    </div>
<?php endif;
get_footer(); ?>