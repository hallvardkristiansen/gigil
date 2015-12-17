<form class="row searchform" action="<?php echo home_url( '/' ); ?>" method="get">
  <div class="col-xs-10">
    <input type="search" name="s" id="searchfield" value="<?php the_search_query(); ?>">
    <button type="submit" class="button">Search</button>
  </div>
</form>