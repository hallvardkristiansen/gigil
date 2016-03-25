$ = jQuery;
// flatten object by concatting values
function concatValues( obj ) {
  var value = '';
  for ( var prop in obj ) {
    value += obj[ prop ];
  }
  return value;
}
var $grid = false;
var prevTrigger = false;

function hoverProject(which, what) {
  switch(which) {
    case 'prev':
      switch(what) {
        case 'in':
          if (prevTrigger) {
            $(prevTrigger).parents('.grid-item').prev('.grid-item').find('.trigger').addClass('hover');
          } else {
            $('.grid').find('.grid-item .trigger').last().addClass('hover');
          }
          break;
        case 'out':
          $('.trigger').removeClass('hover');
          break;
      }
      break;
    case 'next':
      switch(what) {
        case 'in':
          if (prevTrigger) {
            $(prevTrigger).parents('.grid-item').next('.grid-item').find('.trigger').addClass('hover');
          } else {
            $('.grid').find('.grid-item .trigger').first().addClass('hover');
          }
          break;
        case 'out':
          $('.trigger').removeClass('hover');
          break;
      }
      break;
  }
}
function viewProject(which) {
  switch(which) {
    case 'prev':
      if (prevTrigger) {
        var prev_project = $(prevTrigger).parents('.grid-item').prev('.grid-item').find('.trigger');
      }
      if (!prevTrigger || !prev_project) {
        var prev_project = $('.grid').find('.grid-item .trigger').last();
      }
      $(prev_project).click();
      $(prev_project).parents('.grid-item').prev('.grid-item').find('.trigger').addClass('hover');
      break;
    case 'next':
      if (prevTrigger) {
        var next_project = $(prevTrigger).parents('.grid-item').next('.grid-item').find('.trigger');
      }
      if (!prevTrigger || !next_project) {
        var next_project = $('.grid').find('.grid-item .trigger').first();
      }
      $(next_project).click();
      $(next_project).parents('.grid-item').next('.grid-item').find('.trigger').addClass('hover');
      break;
  }
}

$(document).ready(function() {
  $grid = $('.grid').isotope({
    layoutMode: 'packery',
    itemSelector: '.grid-item',
    stamp: '.stamp',
    percentPosition: true,
    getSortData: {
      websites: '.websites',
      interfaces: '.interfaces',
      print: '.print',
      electronics: '.electronics',
      games: '.games'
    }
  });
  $('.owl-carousel').owlCarousel({
    items: 1,
    loop: true,
    center: true,
    nav: true,
    lazyLoad: true,
    video: true,
    onResized: function() {
      $grid.isotope('layout');
    }
  });
  var allCarousels = $('.owl-carousel').data('owlCarousel');
  $('.infopane').hide();
  
  $('#logo').click(function() {
    viewProject('next');
    hoverProject('next', 'in');
  });
  $('#logo').hover(function() {
    hoverProject('next', 'in');
  }, function() {
    hoverProject('next', 'out');
  });
  
  var filters = {};
  $('.filters').on( 'click', 'a', function() {
    var $buttonGroup = $(this).parents('.button-group');
    $buttonGroup.find('.is-checked').removeClass('is-checked');
    $(this).addClass('is-checked');
    $grid.isotope({ sortBy: $(this).attr('data-filter') });
  });
  
  $(window).keydown(function(e) {
    var key = e.which;
    var carousel = $('#displaypane').find('.owl-carousel').data('owlCarousel');
    switch(key) {
      case 38:
        viewProject('prev');
        hoverProject('prev', 'in');
        e.preventDefault();
      break;
      case 40:
        viewProject('next');
        hoverProject('next', 'in');
        e.preventDefault();
      break;
      case 37:
        carousel.prev();
      break;
      case 39:
        carousel.next();
      break;
      case 32:
        $('#displaypane').find('.owl-item.active .owl-video-play-icon').click();
        e.preventDefault();
      break;
    }
  });  

  $('.trigger').click(function() {
    var that = this;
    $(this).parents('.grid-item').css('z-index', 4).animate({
      'top': 0,
      'left': $('#displaypane').offset().left,
      'width': $('#displaypane').width(),
      'height': $('#displaypane .owl-carousel').height(),
      'opacity': 0.2
    }, 100, function() {
      $(that).parents('.grid-item').hide();
      if (prevTrigger) {
        $(prevTrigger).parents('.grid-item').css({
          'top': '0%',
          'left': '-40%',
          'width': '',
          'height': '',
          'opacity': '',
          'z-index': 1
        }).show();
        var oldPane = $('#displaypane').find('.infopane').detach();
        $(oldPane).hide().insertAfter(prevTrigger);
      } else {
        $('#displaypane').empty();
      }
      var newPane = $(that).siblings('.infopane').detach();
      $(newPane).appendTo('#displaypane').show();
      var carousel = $('#displaypane').find('.owl-carousel').data('owlCarousel');
      carousel._width = $('#displaypane').find('.infopane').width();
      carousel.invalidate('width');
      carousel.refresh();
      $grid.isotope('layout');
      prevTrigger = $(that);
    });
    $('.trigger').removeClass('hover');
  });
  
  
  $('.initial .trigger').click();
});

$(window).load(function() {
  $grid.isotope('layout');
});