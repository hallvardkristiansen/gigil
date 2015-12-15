$ = jQuery;
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
  $('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    nav:true
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
  $('.projectbox').on('show.bs.collapse', function (event) {
    var that = this;
    var trigger = $('#open_' + $(that).attr('id'));
    var nextlineelement = false;
    $(that).siblings('.collapse').collapse('hide');
    $(that).siblings().not('.collapse').each(function(index, el) {
      var triggerpos = $(trigger).position();
      var elpos = $(el).position();
      if (!nextlineelement && elpos.top > triggerpos.top) {
        nextlineelement = el;
      }
    });
    var infobox = $(that).detach();
    if (!nextlineelement) {
      $(infobox).insertAfter($(trigger));
    } else {
      $(infobox).insertBefore($(nextlineelement));
    }
  });
  if ($('.mapContainer').length) {
    $('.marker').click(function() {
      var target = $(this).attr('data-target');
      $(target).show();
      var widthOfBox = $(target).width();
      var positionOfBox = $(target).offset();
      var positionOfThis = $(this).offset();
      var widthOfWindow = $(window).width();
      $(target).hide();
      if (positionOfThis.left - (widthOfBox / 2) < 0) {
        $(target).css('left', (widthOfBox / 2));
        $(target).find('.arrow').css('margin-left', -1-((widthOfBox / 2) - positionOfThis.left));
      } else if (positionOfThis.left + (widthOfBox / 2) > widthOfWindow) {
        $(target).css('left', widthOfWindow - widthOfBox);
        $(target).find('.arrow').css('margin-left', -1);
      } else {
        $(target).css('left', positionOfThis.left);
        $(target).find('.arrow').css('margin-left', -1);
      }
      
      $($(this).attr('data-target')).fadeToggle();
      $('.mapContainer .info').not($(this).attr('data-target')).fadeOut();
    });
    $('.mapContainer .cross').click(function() {
      $($(this).attr('data-target')).fadeOut();
    });
  }
  $(window).on('resize', function() {
    $('.mapContainer .info').fadeOut();
  });
  $('#scrolltotop').click(function() {
    $('html,body').animate({
      scrollTop: 0
    }, 1000);
    return false;
  });
});