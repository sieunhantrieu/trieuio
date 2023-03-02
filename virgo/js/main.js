jQuery(function ($) {
    "use strict";

    /*****************************
     * Commons Variables
     *****************************/
    var $window = $(window),
        $body = $('body');


   
 
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
				var scrollTop1 = $("#back-to-top");

                if (scrollTop > scrollTrigger) {
					$(scrollTop1).css("opacity", "1");
                    
                } else {
                    $(scrollTop1).css("opacity", "0");
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 0);
        });
    }
})

window.onscroll = function () {
    scrollMenu()
  };
function showForm() {
    var element = document.getElementById("form-search");
    element.classList.toggle('show')
}
