/*------------------------------------------------
Imroz - Creative Agency WordPress Theme
All Main Js init here
--------------------------------------------------*/

(function (window, document, $, undefined) {
    'use strict';

    var imroz = {
        t: function (e) {
            imroz.s();
            imroz.methods()
        },

        s: function (e) {
            this._window = $(window),
			this._document = $(document),
			this._body = $('body'),
            this._html = $('html')
        },

        methods: function (e) {
            imroz.wowinit();
            imroz.feature();
            imroz.scrollup();
            imroz.preloaderInit();
            imroz.mobileMenu();
            imroz.addLastMenuClass();
            imroz.slickyHeader();
            imroz.counterUpInit();
            imroz.portfoliTranslate();
            imroz.smothScroll();
            imroz._slickactivation();
            imroz._clickDoc();
        },

        wowinit: function () {
            new WOW().init();
        },

        smothScroll: function () {
            $(document).on('click', '.smoth-animation', function (event) {
                event.preventDefault();
                $('html, body').animate({
                    scrollTop: $($.attr(this, 'href')).offset().top - 50
                }, 500);
            });
        },


        portfoliTranslate: function (e) {
            $('.im_portfolio').each(function () {
                var innerHeight = $(this).find('.portfolio_hover').height();
                var innerHeightWithSpace = $(this).find('.portfolio_hover').height() + 10;
                $(this).find('.portfolio_hover').css({'height': innerHeight + 'px'});
                // $(this).find('.portfolio_heading').css({'transform': 'translateY(0px)'});
                $(this).on('mouseover', function() {
                    $(this).find('.portfolio_heading').css({'transform': 'translateY(-' + innerHeightWithSpace + 'px)'});
                });
                $(this).on('mouseout', function() {
                    $(this).find('.portfolio_heading').css({'transform': 'translateY(0px)'});
                });
            });
        },

        counterUpInit: function () {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        feature: function () {
            feather.replace()
        },

        scrollup: function () {
            var scrollTop = $('.active-scroll-to-top .rn-back-top');
            $(window).scroll(function () {
                var topPos = $(this).scrollTop();
                if (topPos > 150) {
                    $(scrollTop).css('opacity', '1');
                } else {
                    $(scrollTop).css('opacity', '0');
                }
            });
            $(scrollTop).on('click', function () {
                $('html, body').animate({
                    scrollTop: 0,
                    easingType: 'linear',
                }, 10);
                return false;
            });
        },
        
        preloaderInit: function(){
            imroz._window.on('load', function () {
                $('.preloader').fadeOut('slow', function () {
                    $(this).remove();
                });
            });
        },

        mobileMenu: function (e) {
            $('.humberger-menu').on('click', function (e) {
                e.preventDefault();
                $('.rn-popup-mobile-menu').addClass('menu-open');
            });

            $('.rn-popup-mobile-menu .mainmenu-item .has-children > a').on('click', function (e) {
                e.preventDefault();
                $(this).siblings('.submenu').toggleClass('active').slideToggle('400');
                $(this).toggleClass('open')
            })

            $('.rn-popup-mobile-menu').on('click', function (e) {
                e.target === this && $('.rn-popup-mobile-menu').removeClass('menu-open') && $('.rn-popup-mobile-menu .mainmenu-item .has-children > a').siblings('.submenu').removeClass('active').slideUp('400') && $('.rn-popup-mobile-menu .mainmenu-item .has-children > a').removeClass('open');
            });

            $('.close-menu').on('click', function (e) {
                e.preventDefault()
                $('.rn-popup-mobile-menu').removeClass('menu-open');
                $('.rn-popup-mobile-menu .mainmenu-item .has-children > a').siblings('.submenu').removeClass('active').slideUp('400');
                $('.rn-popup-mobile-menu .mainmenu-item .has-children > a').removeClass('open')
            });

            $('.imroz-active-onepage-navigation .rn-popup-mobile-menu ul.mainmenu-item li a').on('click', function (e) {
                e.preventDefault()
                $('.rn-popup-mobile-menu').removeClass('menu-open');
            });

        },

        slickyHeader: function (e) {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 250) {
                    $('.header--sticky').addClass('sticky')
                } else {
                    $('.header--sticky').removeClass('sticky')
                }
            })
        },

        addLastMenuClass: function () {
            $('nav.mainmenunav > ul > li').slice(-4).addClass('last-elements');
        },

        
        _slickactivation: function (e) {
            $('.imroz-carousel-gallery').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
            });
            $('.rn-arrow-activation').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
            });
        },
        


        _clickDoc: function (e) {
            var onepageClick

            onepageClick = function (e) {
                e.preventDefault();
                $('.header-wrapper').removeClass('menu-open');
                $('body').removeClass('body-overlay');
            };

            imroz._document
            .on('click', '.imroz-active-onepage-navigation .header-area .mainmenu > li > .nav-link, .imroz-active-onepage-navigation .header-area .mainmenu > li .submenu li .nav-link', onepageClick)
        },

    }
    imroz.t()
})(window, document, jQuery);








