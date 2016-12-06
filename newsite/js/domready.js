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
      if (prevTrigger) {
        var prev_project = $(prevTrigger).parents('.grid-item').prev('.grid-item').find('.trigger');
      }
      switch(what) {
        case 'in':
          if (!prev_project.length) {
            var prev_project = $('.grid').find('.grid-item .trigger').last();
          }
          prev_project.addClass('hover');
          console.log('in', prev_project);
          break;
        case 'out':
          $('.trigger').removeClass('hover');
          console.log('out');
          break;
      }
      break;
    case 'next':
      if (prevTrigger) {
        var next_project = $(prevTrigger).parents('.grid-item').next('.grid-item').find('.trigger');
      }
      switch(what) {
        case 'in':
          if (!next_project.length) {
            var next_project = $('.grid').find('.grid-item .trigger').first();
          }
          next_project.addClass('hover');
          console.log('in', next_project);
          break;
        case 'out':
          $('.trigger').removeClass('hover');
          console.log('out');
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
      if (!prevTrigger.length || !prev_project.length) {
        var prev_project = $('.grid .grid-item .trigger').last();
      }
      $(prev_project).click();
      break;
    case 'next':
      if (prevTrigger) {
        var next_project = $(prevTrigger).parents('.grid-item').next('.grid-item').find('.trigger');
      }
      if (!prevTrigger.length || !next_project.length) {
        var next_project = $('.grid .grid-item .trigger').first();
      }
      $(next_project).click();
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
  
//  $('#logo').click(function() {
//    viewProject('next');
//    hoverProject('next', 'in');
//  });
//  $('#logo').hover(function() {
//    hoverProject('next', 'in');
//  }, function() {
//    hoverProject('next', 'out');
//  });
  
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
    var targetWidth = $('#displaypane').width();
    var targetPos = {
      x: $('#displaypane').offset().left,
      y: 0
    };
    var thisItem = $(this).parents('.grid-item');
    thisItem.addClass('animate');
    thisItem.css({
      'width': '33.33%',
      'left': '50%',
      'top': '5%',
      'margin-left': '-16.66%'
    });
    var prevItem = prevTrigger.length ? $(prevTrigger).parents('.grid-item') : false;
    setTimeout(function() {
      $('.grid .selected').removeClass('selected');
      thisItem.hide();
      if (prevItem.length) {
        prevItem.removeClass('animate');
        prevItem.show();
        prevItem.css({
          'width': '',
          'left': '',
          'top': '',
          'margin-left': ''
        });
        var oldPane = $('#displaypane').find('.infopane').detach();
        $(oldPane).hide().insertAfter(prevItem.find('.trigger'));
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
    }, 150);
    $('.trigger').removeClass('hover');
    prevTrigger = $(that);
  });
  
  
  $('.initial .trigger').click();
  
  var logo = new logo_stringify({
    'selector': '#logo',
    'initialized': false,
    'origin': [$('#logo').width() - ($('#logo').width() / 3.5), $('#logo').height() - 10],
    'w': $('#logo').width(),
    'h': $('#logo').height() + 32,
    'isDown': false,
    'cpos': [$('#logo').width(), $('#logo').height()],
    'currentVectors': [],
    'startVectors': [],
    'deltas': [],
    'scale': 0.5,
    'zeropoints': logo_startvectors,
    'newpoints': logo_endvectors
  });
  $('#logo').empty();
  logo.init();
  logo.introanim();
  logo.svg.on('mousedown', function() {
    logo.isDown = true;//(cpos[0] > origin[0] - 20 && cpos[0] < origin[0] + 20 && cpos[1] > origin[1] - 20 && cpos[1] < origin[1] + 20);
  });
  logo.svg.on('mousemove', function() {
    if (logo.isDown){
      logo.cpos = d3.mouse(this);
      logo.path.attr('d', logo.dragPath(logo.cpos));
      logo.grab.attr("cx", logo.cpos[0]).attr("cy", logo.cpos[1]);
    }
  });
  logo.svg.on('mouseup', function() {
    logo.cpos = d3.mouse(this);
    if (logo.isDown) {
      logo.isDown = false;
    }
  });
});

$(window).load(function() {
  $grid.isotope('layout');
});