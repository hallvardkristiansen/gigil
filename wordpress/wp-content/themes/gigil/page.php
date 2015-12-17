<?php
/**
 * Page template
 */
 
get_header();
$category = get_field('associated_category');
$grid_content_type = get_field('is_isotope') ? get_field('grid_content_type') : false;
if ($grid_content_type) {
  $grid_elements_args = ['post_type'=>$grid_content_type, 'cat'=>$category, 'showposts'=>100];
  $grid_elements = new WP_Query( $grid_elements_args );
  $filters = get_object_taxonomies($grid_content_type, 'names');
  if (($key = array_search('category', $filters)) !== false) {
    unset($filters[$key]);
  }
  $filter_values = get_terms($filters);
}
$banners_args = ['post_type'=>'gigil_banners', 'cat'=>$category, 'showposts'=>10];
$banners = new WP_Query( $banners_args );
$this_id = get_the_ID();

get_template_part( 'template-parts/snippet', 'navigation' );
?>
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-sm-12">
      <?php if ($grid_content_type) : ?>
      <?php if ($grid_elements->have_posts()) : ?>
        <div class="row">
          <div class="col-xs-12 button-group filter-button-group">
            <button data-filter="*">show all</button>
            <?php foreach($filter_values as $id=>$term) : ?>
              <button data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
            <?php endforeach; ?>
          </div>
          <div class="col-xs-12 grid">
          <?php while ( $grid_elements->have_posts() ) : $grid_elements->the_post();
            get_template_part( 'template-parts/snippet', 'grid_element' );
          endwhile; ?>
          </div>
       </div>
      <?php endif;
      else : 
      while ( have_posts() ) : the_post();
      	get_template_part( 'template-parts/content', 'page' );
      endwhile;
      endif; ?>
      </div>
      <?php if ( $banners->have_posts() ) : ?>
        <div class="col-md-3 hidden-sm hidden-xs banners">
          <?php while ( $banners->have_posts() ) : $banners->the_post();
            get_template_part( 'template-parts/snippet', 'banner' );
          endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>    
<?php get_footer(); ?>