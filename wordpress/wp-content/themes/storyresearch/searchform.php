<form class="row" action="<?php echo home_url( '/' ); ?>" method="get">
  <div class="col-xs-12">
    <label for="search">Search: </label>
    <input type="search" name="s" id="searchfield" value="<?php the_search_query(); ?>">
    <button type="submit" class="button">Search</button>
  </div>
</form>