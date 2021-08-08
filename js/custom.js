;(function($){
    "use strict"
    var headerFixed = function() {
        $('#header').each(function() {
            var nav = $('#header');
            $(window).on('load', function(){
                var header = $('#header');
                var offsetTop = $('#header').offset().top;
                var headerHeight = $('#header').height();
                var buffer  = $('<div>', { height: headerHeight }).insertAfter(header);
                    buffer.hide();

                $(window).on('load scroll', function(){
                    if ( $(window).scrollTop() > offsetTop  ) {
                        $('#header').addClass('fixed-header');
                        buffer.show();
                    } else {
                        $('#header').removeClass('fixed-header');
                        buffer.hide();
                    }
                });
            });
        });
    };
    headerFixed();

    $('.main_slider').on('init', function (e, slick) {
        var $firstAnimatingElements = $('div.slider_item:first-child').find('[data-animation]');
        doAnimations($firstAnimatingElements);
    });
    $('.main_slider').on('beforeChange', function (e, slick, currentSlide, nextSlide) {
        var $animatingElements = $('div.slider_item[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
        doAnimations($animatingElements);
    });
    $('.main_slider').slick({
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 2000,
        dots: false,
        fade: true,
        prevArrow: ".left_arrow",
        nextArrow: ".right_arrow",
    });

    function doAnimations(elements) {
        var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
        elements.each(function () {
            var $this = $(this);
            var $animationDelay = $this.data('delay');
            var $animationType = 'animated ' + $this.data('animation');
            $this.css({
                'animation-delay': $animationDelay,
                '-webkit-animation-delay': $animationDelay
            });
            $this.addClass($animationType).one(animationEndEvents, function () {
                $this.removeClass($animationType);
            });
        });
    }

    if ($('.video_slider').length) {
        $('.video_slider').slick({
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 3000,
            speed: 1000,
            vertical: true,
            dots: false,
            arrows: true,
            prevArrow:'.prev',
            nextArrow:'.next',
        });
    }

    if ($('.post_slider').length) {
        $('.post_slider').slick({
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,
            prevArrow:'.prev',
            nextArrow:'.next',
        });
    }

    if ($('#testimonial').length) {
        $('#testimonial').slick({
            autoplay: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplaySpeed: 2000,
            speed: 1000,
            dots: false,
            arrows: true,
            prevArrow:'.prev_two',
            nextArrow:'.next_two',
            responsive: [
                 {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    }

    if ($('#testimonial_two').length) {
        $('#testimonial_two').slick({
            autoplay: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplaySpeed: 3000,
            speed: 1000,
            dots: true,
            arrows: false,
            responsive: [
                 {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    }

    if ($('.portfolio_slider').length) {
        $('.portfolio_slider').slick({
            autoplay: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplaySpeed: 2500,
            speed: 1000,
            dots: false,
            arrows: true,
            prevArrow:'.p_prev',
            nextArrow:'.p_next',
            responsive: [
                 {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },{
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }

            ]
        });
    }

    if ($('.service_slider').length) {
        $('.service_slider').slick({
            autoplay: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplaySpeed: 2500,
            speed: 1000,
            dots: false,
            arrows: true,
            prevArrow:'.prev',
            nextArrow:'.next',
            responsive: [
                 {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },{
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },{
                    breakpoint: 400,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }

            ]
        });
    }


    if ($('.testimonial_slider_four').length) {
        $('.testimonial_slider_four').slick({
            autoplay: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplaySpeed: 2500,
            speed: 1000,
            dots: true,
            arrows: false,
        });
    }

    /*===========Portfolio isotope js===========*/
    function portfolioMasonry(){
        var portfolio = $("#work-portfolio");
        if( portfolio.length ){
            portfolio.imagesLoaded( function() {
              // images have loaded
                // Activate isotope in container
                portfolio.isotope({
                    itemSelector: '.portfolio_item',
                    layoutMode: 'masonry',
                    animationOptions :{
                        duration:1000
                    },
                    hiddenStyle: {
                        opacity: 0,
                        transform: 'scale(.4)rotate(60deg)',
                    },
                    visibleStyle: {
                        opacity: 1,
                        transform: 'scale(1)rotate(0deg)',
                    },
                    stagger: 0,
                    transitionDuration: '0.5s',
                });

                // Add isotope click function
                $("#portfolio_filter div").on('click',function(){
                    $("#portfolio_filter div").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    portfolio.isotope({
                        filter: selector,
                        animationOptions: {
                          animationDuration: 750,
                          easing: 'linear',
                          queue: false
                      }
                    })
                    return false;
                })
            })
        }
    }
    portfolioMasonry();
    /*
    function parallax(){
        if($(".parallaxie").length){
            $('.parallaxie').parallaxie({
                speed: 0.5,
            });
        }
    }
    parallax();*/
    /*------- datetimepicker js -------*/
    $( ".date-input-css" ).datepicker();

    if($('.baSlider').length){
        $('.baSlider').baSlider();
    }

    /* Counter Js */
    function counterUp(){
        if ( $('.counter').length ){
            $('.counter').counterUp({
                delay: 1,
                time: 250
            });
        };
    };

    counterUp();

    /*--------------- End popup-js--------*/
    function popupGallery(){
        if($('.popup-youtube').length){
            $('.popup-youtube').magnificPopup({
                type: 'iframe',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false,
                mainClass:  'mfp-with-zoom mfp-img-mobile',
            });
        }
        if ($(".img_popup").length) {
            $(".img_popup").each(function(){
                $(".img_popup").magnificPopup({
                    type: 'image',
                    tLoading: 'Loading image #%curr%...',
                    removalDelay: 300,
                    mainClass:  'mfp-with-zoom mfp-img-mobile',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image,
                    }
                });
            })
        }
    }
    popupGallery();

    /*--------- WOW js-----------*/
    function wowAnimation(){
        new WOW({
            offset: 100,
            mobile: true
        }).init()
    }
    wowAnimation();

    if ($(window).width() < 991) {
         $(".submenu a").on('click', function () {
             var target = $(this).parent().children(".dropdown-menu");
             $(target).slideToggle();
         });
    }

    $('.search a').on('click', function(){
        if( $(this).parent().hasClass('open') ){
            $(this).parent().removeClass('open')
        }
        else{
            $(this).parent().addClass('open')
        }
        return false
    });

    function loader(){
        $(window).on('load', function() {
            $('.loader').delay(700).queue(function () {
                $(this).remove();
            });
        });
    }
    loader();

})(jQuery)
