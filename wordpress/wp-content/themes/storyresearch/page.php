<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header();
while ( have_posts() ) : the_post();
	get_template_part( 'content', 'page' );
endwhile;
get_footer(); ?>
