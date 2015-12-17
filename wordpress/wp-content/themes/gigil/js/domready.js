$ = jQuery;

// flatten object by concatting values
function concatValues( obj ) {
  var value = '';
  for ( var prop in obj ) {
    value += obj[ prop ];
  }
  return value;
}

$(document).ready(function() {
  $('#toggle_navigation').on('click', function () {
    if ($('#navigation').hasClass('active')) {
      $('#navigation').removeClass('active');
      $('body').removeClass('slideout');
      $('#dimmer').animate({ opacity: 0 }, 500, function() {
        $('#dimmer').remove();
      });
    } else {
      $('#navigation').addClass('active');
      $('body').addClass('slideout');
      $('<div />').attr('id', 'dimmer')
        .css({
          'background-color': '#000000',
          'opacity': 0,
          'width': '100%',
          'height': '100%',
          'position': 'fixed',
          'top': 0,
          'left': 0,
          'z-index': '9999'})
        .appendTo('body')
        .animate({ opacity: 0.5 }, 500)
        .on('click', function() {
          $('#toggle_navigation').click();
        });
    }
  });


// Isotope grids
  var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'masonry'
  });
// filter items on button click
  var filters = {};
  $('.dual-filter-buttons').on( 'click', 'button', function() {
    var $this = $(this);
    // get group key
    var $buttonGroup = $this.parents('.button-group');
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $(this).addClass('is-checked');
    var filterGroup = $buttonGroup.attr('data-filter-group');
    // set filter for group
    filters[ filterGroup ] = $this.attr('data-filter');
    // combine filters
    var filterValue = concatValues( filters );
    $grid.isotope({ filter: filterValue });
  });
  
  $('.single-filter-buttons').on( 'click', 'button', function() {
    $('.is-checked').removeClass('is-checked');
    $(this).addClass('is-checked');
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });



  $('.owl-carousel').owlCarousel({
    nav: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    singleItem: true,
    autoPlay: true,
    stopOnHover: true,
    loop: true,
    margin: 10
  });
  
  $('#imgviewer').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var imgsource = button.data('img-url');
    var img = new Image;
    img.src = imgsource;
    img.alt = 'an image!';
    img.id = 'theimage';
    $('#theimage').remove();
    $(img).appendTo($(this).find('.modal-body'));
  });
  $('#scrolltotop').click(function() {
    $('html,body').animate({
      scrollTop: 0
    }, 1000);
    return false;
  });
  
  
  // Xjazz functions, to be moved
  $('.searchform #searchfield').focus(function() {
    $('.searchform button').fadeIn();
  }).blur(function() {
    $('.searchform button').fadeOut();
  });
});