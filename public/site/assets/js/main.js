
jQuery(document).ready(function ($) {
    // Scroll header

    $(function () {
        // scroll is still position
        var scroll = $(document).scrollTop();
        var headerHeight = $('.header-panel').outerHeight();
        //console.log(headerHeight);

        $(window).scroll(function () {
            // scrolled is new position just obtained
            var scrolled = $(document).scrollTop();

            // optionally emulate non-fixed positioning behaviour

            if (scrolled > headerHeight) {
                $('.header-panel').addClass('off-canvas');
            } else {
                $('.header-panel').removeClass('off-canvas');
            }

            if (scrolled > scroll) {
                // scrolling down
                $('.header-panel').removeClass('fixed');
            } else {
                //scrolling up
                $('.header-panel').addClass('fixed');
            }

            scroll = $(document).scrollTop();
        });
    });
// Search overlay
    $('#close-btn').click(function() {
        $('#search-overlay').fadeOut();
        $('#search-btn').show();
      });
      $('#search-btn').click(function() {
        $(this).hide();
        $('#search-overlay').fadeIn();
      });

    // Smooth scrolling using jQuery easing
    /* $('.navbar-light a').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - 99)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    }); */




    $('.navbar-toggler').click(function () {
        $('.navbar-collapse').toggleClass('show')

    });
    $('#hide-nav').click(function () {
        $('.navbar-collapse').toggleClass('show')

    });

    $('.banner-slider').slick({
        dots: false,
        infinite: false,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: false,
    });

    // end slick
// Recent news sliders
    $('.variable-width-slider').slick({
        arrows: false,
        dots: false,
        autoplay: true,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        //centerMode: true,
        // variableWidth: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });

    // service carousel
    $('.services-carousel').slick({
        arrows: true,
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        //centerMode: true,
        // variableWidth: true,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 2,
                infinite: true,
                dots: false
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 575,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });


    // dropdown
    (function ($) {
        $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
            if (!$(this).next().hasClass('show')) {
                $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');

            $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
                $('.dropdown-submenu .show').removeClass("show");
            });

            return false;
        });
    })(jQuery)

    // Javascript for simpleLightbox
    new SimpleLightbox({elements: '.moe-imageGallery a'});

    // or if using jQuery
    // $('.moe-imageGallery a').simpleLightbox();

});