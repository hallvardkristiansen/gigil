<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); 
get_template_part( 'template-parts/snippet', 'navigation' );
$filter_values = get_post_types(array('public'=>true), 'objects');
?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <h1><?php printf( __( 'Search Results for: %s', 'gigil' ), get_search_query() ); ?></h1>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
    		<?php if (have_posts()) : ?>
        <div class="row single-filter-buttons">
          <div class="col-xs-12 button-group filter-button-group">
            <button data-filter="*" class="is-checked">All</button>
            <?php foreach($searchable_post_types as $type) : ?>
              <button data-filter=".<?php echo $type; ?>"><?php echo $filter_values[$type]->labels->name; ?></button>
            <?php endforeach; ?>
          </div>
          <div class="col-xs-12 grid">
          <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-3 col-sm-4 col-xs-6 block grid-item <?php echo get_post_type(); ?>">
            <?php get_template_part( 'template-parts/snippet', 'grid_element' ); ?>
            </div>
          <?php endwhile; ?>
          </div>
       </div>
    		<?php else :
    			get_template_part( 'template-parts/content', 'none' );
    		endif; ?>
      </div>
    </div>
  </div>
<?php get_footer(); ?>