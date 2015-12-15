<?php
/**
 * Page template
 */
 
get_header();
$grid_content_type = get_field('is_isotope') ? get_field('grid_content_type') : false;
if ($grid_content_type) {
  $grid_elements_args = ['post_type'=>$grid_content_type, 'showposts'=>100];
  $grid_elements = new WP_Query( $grid_elements_args );
  $filters = get_object_taxonomies($grid_content_type, 'names');
  $filter_values = get_terms($filters);
}
$banners_args = ['post_type'=>'gigil_banners', 'showposts'=>10];
$banners = new WP_Query( $banners_args );
$this_id = get_the_ID();
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
            if (in_array($this_id, get_field('parent_page'))) : ?>
              <div class="col-sm-4 col-xs-12 grid-item <?php echo custom_taxonomies_terms_classes(get_the_ID(), $grid_content_type); ?>">
                <div class="blog-entry">
                  <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                  <?php the_title(sprintf('<h4><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h4>'); ?>
                  <?php the_excerpt(); ?>
                  <a class="button" href="<?php echo esc_url(get_permalink()); ?>">Read more</a>
                </div>
              </div>
            <?php endif;
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
        <div class="col-md-3 hidden-sm hidden-xs">
          <?php while ( $banners->have_posts() ) : $banners->the_post();
            if (get_field('globally_visible') || in_array($this_id, get_field('visible_on'))) :
              get_template_part( 'template-parts/snippet', 'banner' );
            endif;
          endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>    
<?php get_footer(); ?>