<?php
/**
 * The default template for displaying content of type post
 * Used for both single and index/archive/search.
 */
  $gallery = get_post_gallery();
  $content = strip_shortcode_gallery( get_the_content() );                                        
  $content = str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', $content ) ); ?>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12"><?php the_title(); ?></h1>
          <span class="divider orange visible-xs"></span>
          <div class="subtitle col-sm-5 col-sm-offset-6">
            <span class="divider orange hidden-xs"></span>
            <?php the_field('subtitle'); ?>
          </div>
          <div class="col-xs-12 tb_margin_2em">
            <?php the_post_thumbnail('blog-main-image'); ?>
          </div>
          <div class="col-xs-12">
            <?php echo $content; ?>
          </div>
          <div class="blog-footer col-xs-12">
            <?php if (has_tag()) { ?>
              <div class="tags col-xs-8"><?php the_tags(); ?></div>
            <?php } else { ?>
              <div class="col-xs-8"></div>
            <?php } ?>
            <div class="sharing">Share: <?php echo do_shortcode('[ssba]'); ?></div>
          </div>
        </div>
      </div>
    </div>
    <?php echo $gallery; ?>
    <div class="modal fade" id="imgviewer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
            <img src="<?php echo get_template_directory_uri(); ?>/grfx/img_blog_1.jpg" alt="image" id="theimage" />
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid post-nav tb_margin_2em">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="col-xs-6">
              <?php echo get_previous_post_link('%link', '<span class="arrow"></span>Older post'); ?>
            </div>
            <div class="col-xs-6">
              <?php echo get_next_post_link('%link', 'Recent post<span class="arrow"></span>'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
