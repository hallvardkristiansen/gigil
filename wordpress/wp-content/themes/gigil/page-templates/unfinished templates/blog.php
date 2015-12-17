<?php
/**
 * Template Name: Blog
 */
$args = ['post_type'=>'post', 'posts_per_page' => 10];
$posts = new WP_Query( $args );

get_header(); ?>
    <div class="container content noBottomPadding">
      <div class="row">
        <h1 class="col-xs-12">Blog</h1>
        <span class="divider blue"></span>
      </div>
    </div>
    <div class="bg lightgray">
      <div class="container content noBottomPadding">
        <div class="row">
          <div class="col-xs-12">
        		<?php if ($posts->have_posts()) :
        			while ($posts->have_posts()) : $posts->the_post(); ?>

                <div class="col-sm-4 col-xs-12">
                  <div class="blog-entry">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail(); ?></a>
                    <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
                    <span class="divider blue"></span>
                    <?php the_excerpt(); ?>
                    <a class="button" href="<?php echo esc_url(get_permalink()); ?>">Read more</a>
                  </div>
                </div>

        		<?php endwhile;
        
        			// Previous/next page navigation.
        			the_posts_pagination( array(
        				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
        				'next_text'          => __( 'Next page', 'twentyfifteen' ),
        				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
        			) );
        
        		// If no content, include the "No posts found" template.
        		else :
        			get_template_part( 'content', 'none' );
        		endif; ?>

          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>