<?php
/**
 * The default template for displaying content of type page
 */
?>
    <div class="container content">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-xs-12">
          <h1 class="col-xs-12"><?php the_title(); ?></h1>
          <span class="divider orange visible-xs"></span>
          <div class="col-xs-12">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>