<?php
/**
 * The template part for displaying a message that posts cannot be found
 */
?>
  <div class="col-xs-12 t_margin_2em b_margin_4em">
		<?php if ( is_search() ) : ?>
			<p class="center"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'gigil' ); ?></p>
			<?php get_search_form(); ?>
		<?php else : ?>
			<p class="center"><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'gigil' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
  </div>