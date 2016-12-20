jQuery(document).ready(function($) {
// Scroll to top button Show/Hide
$(function(){

	$(document).on( 'scroll', function(){

		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
});
// Scroll to top button click
$(function(){

	$(document).on( 'scroll', function(){

		if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});

	$('.scroll-top-wrapper').on('click', scrollToTop);
});

function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

// Bullets
setTimeout(function bullets() {
    var lastElement = false;
    $(".roles li").each(function() {
      $(this).removeClass("nobullet");
        if (lastElement && lastElement.offset().top != $(this).offset().top) {
            $(lastElement).addClass("nobullet");
        }
        lastElement = $(this);
    }).last().addClass("nobullet");
}, 2000)

  // Superfish Setup
  var sf = $('.nav-menu'),
      bp = 769;
  if($(document).width() >= bp){
      sf.superfish({
          delay: 200,
          speed: 'fast'
      });

  }

  // Window Resize
  $(window).resize(function(){
      if($(document).width() > bp & !sf.hasClass('sf-js-enabled')){
          sf.superfish({
              delay: 200,
              speed: 'fast'
          });
					$('#site-navigation').removeClass('toggled');
      } else if($(document).width() < bp) {
          sf.superfish('destroy');
      }
			var lastElement = false;
			$(".roles li").each(function() {
				$(this).removeClass("nobullet");
					if (lastElement && lastElement.offset().top != $(this).offset().top) {
							$(lastElement).addClass("nobullet");
					}
					lastElement = $(this);
			}).last().addClass("nobullet");

  });


// Nav icon toggler
$('.menu-toggle').click(function() {
    $("i", this).toggleClass("fa-times fa-list-ul");
});

});
