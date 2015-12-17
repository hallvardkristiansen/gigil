<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header();
get_template_part( 'template-parts/snippet', 'navigation' );
while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/content', get_post_type() );
endwhile;
get_footer(); ?>