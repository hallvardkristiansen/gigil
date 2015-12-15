<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
    <div class="container content noBottomPadding">
      <div class="row">
        <h1 class="col-xs-12"><?php printf( __( 'Search Results for: %s', 'storyresearch' ), get_search_query() ); ?></h1>
        <span class="divider blue"></span>
      </div>
    </div>
    <div class="bg lightgray">
      <div class="container content noBottomPadding">
        <div class="row">
          <div class="col-xs-12">
        		<?php if (have_posts()) :
              while ( have_posts() ) : the_post();
              	get_template_part( 'content', 'search' );
              endwhile;
        		else :
        			get_template_part( 'content', 'none' );
        		endif; ?>
          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>