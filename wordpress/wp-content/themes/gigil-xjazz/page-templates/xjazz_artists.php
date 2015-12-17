<?php
/**
 * Template Name: xjazz_artists
 */
 
get_header();
$category = get_field('associated_category');
$grid_content_type = get_field('is_isotope') ? get_field('grid_content_type') : false;
if ($grid_content_type) {
  $grid_elements_args = ['post_type'=>$grid_content_type, 'showposts'=>100];
  $grid_elements = new WP_Query( $grid_elements_args );
  $filters = get_object_taxonomies($grid_content_type, 'names');
  if (($key = array_search('category', $filters)) !== false) {
    $categories = get_terms($filters[$key]);
    unset($filters[$key]);
  }
  $filter_values = get_terms($filters);
}
$this_id = get_the_ID();

get_template_part( 'template-parts/snippet', 'navigation' );
?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
      <?php if ($grid_content_type) : ?>
      <?php if ($grid_elements->have_posts()) : ?>
        <div class="row dual-filter-buttons">
          <div class="col-xs-6 button-group filter-button-group" data-filter-group="genre">
            <button data-filter="" class="is-checked">All</button>
            <?php foreach($filter_values as $id=>$term) : ?>
              <button data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
            <?php endforeach; ?>
          </div>
          <div class="col-xs-6 button-group filter-button-group text-right inverted" data-filter-group="category">
            <button data-filter="" class="is-checked">All</button>
            <?php foreach($categories as $id=>$term) : ?>
              <button data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 grid">
          <?php while ( $grid_elements->have_posts() ) : $grid_elements->the_post(); ?>
            <div class="col-md-3 col-sm-4 col-xs-6 block grid-item <?php echo custom_taxonomies_terms_classes(get_the_ID(), get_post_type()); ?>">
            <?php get_template_part( 'template-parts/snippet', 'grid_element' ); ?>
            </div>
          <?php endwhile; ?>
          </div>
       </div>
      <?php endif;
      else : 
      while ( have_posts() ) : the_post();
      	get_template_part( 'template-parts/content', 'page' );
      endwhile;
      endif; ?>
      </div>
    </div>
  </div>    
<?php get_footer(); ?>