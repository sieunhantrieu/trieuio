(function ($) {
  $.fn.menumaker = function (options) {
    var cssmenu = $(this),
      settings = $.extend({
        format: "dropdown",
        sticky: false
      }, options);
    return this.each(function () {
      $(this).find(".button").on('click', function () {
        $(this).toggleClass('menu-opened');
        var mainmenu = $(this).next('ul');
        if (mainmenu.hasClass('open')) {
          mainmenu.slideToggle().removeClass('open');
        } else {
          mainmenu.slideToggle().addClass('open');
          if (settings.format === "dropdown") {
            mainmenu.find('ul').show();
          }
        }
      });
      cssmenu.find('li ul').parent().addClass('has-sub');
      multiTg = function () {
        cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
        cssmenu.find('.submenu-button').on('click', function () {
          $(this).toggleClass('submenu-opened');
          if ($(this).siblings('ul').hasClass('open')) {
            $(this).siblings('ul').removeClass('open').slideToggle();
          } else {
            $(this).siblings('ul').addClass('open').slideToggle();
          }
        });
      };
      if (settings.format === 'multitoggle') multiTg();
      else cssmenu.addClass('dropdown');
      if (settings.sticky === true) cssmenu.css('position', 'fixed');
      resizeFix = function () {
        var mediasize = 1000;
        if ($(window).width() > mediasize) {
          cssmenu.find('ul').show();
        }
        if ($(window).width() <= mediasize) {
          cssmenu.find('ul').hide().removeClass('open');
        }
      };
      resizeFix();
      return $(window).on('resize', resizeFix);
    });
  };
})(jQuery);

$(document).ready(function () {
  $('.menu_top a[href*="#"]').on('click', function (e) {
    e.preventDefault()

    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top - 100,
      },
      500,
      'linear'
    )
  })
});
(function ($) {
  "use strict";

  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 200) {
      $(".menu-fixed").addClass("fixed-header");
    } else {
      $(".menu-fixed").removeClass("fixed-header");
    }
  });


})(jQuery);

var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction()
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document

$('#myBtn').click(function () {
  $("html, body").animate({
    scrollTop: 0
  }, 500);
});


$("#menu-mobile").click(function () {
  $("#side_nav").toggleClass("open-nav");
});

$(".main").click(function () {
  $("#side_nav").removeClass("open-nav");
});

































































/*
HTML/CSS3/PSD/AI/FIGMA/XD/SKETCH/PREMIERE/AFTEREFFECT/3DANIMATION/UX/UI/VIDEO/ 

2024 Copyright © 2024. Designed by ĐỖ NGUYÊN THANH TRIỀU

https://www.facebook.com/profile.php?id=100015727831838

Please Call me or Zalo App: 084 0901 479 994

Mọi thông tin vui lòng liên hệ Email: sngdesigner@gmail.com

Website: http://forum.sieunhan.xyz

2025 Copyright © 2025. Designed by Do Nguyen Thanh Trieu
*/