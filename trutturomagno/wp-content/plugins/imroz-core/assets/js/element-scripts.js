(function ($) {
    "use strict";

    var $document = $(document),
        $window = $(window),
        isEditMode = false;

    function mybe_note_undefined($selector, $data_atts) {
		return ($selector.data($data_atts) !== undefined) ? $selector.data($data_atts) : '';
	}

    /**
     * Video Popup
     * @param $scope
     * @param $
     * @constructor
     */
    var PlayBtn = function($scope, $){
        /*----------------------------------
        03. Feature Icon Activation
        --------------------------------------*/
        $('.play__btn').magnificPopup({
            type: 'iframe',
        });
    }

    /**
     * slickactivation
     * @param $scope
     * @param $
     */
    var slickactivationforPortfolio = function($scope, $){
        var portfolio_carousel_options = $scope.find('.rn-slick-activation').eq(0);
        if ( portfolio_carousel_options.length > 0) {
            var settings            = portfolio_carousel_options.data('settings');
            var arrows              = settings['arrows'];
            var dots                = settings['dots'];
            var autoplay            = settings['autoplay'];
            var autoplay_speed      = parseInt(settings['autoplay_speed']) || 2500;
            var infinite      = settings['infinite'];
            var for_xl_desktop      = settings['for_xl_desktop'];
            var slidesToShow      = settings['slidesToShow'];
            var for_laptop      = settings['for_laptop'];
            var for_tablet      = settings['for_tablet'];
            var for_mobile      = settings['for_mobile'];
            var for_xs_mobile      = settings['for_xs_mobile'];
            portfolio_carousel_options.not('.slick-initialized').slick({
                slidesToShow: for_xl_desktop,
                slidesToScroll: 1,
                dots: dots,
                centerMode: false,
                focusOnSelect: true,
                arrows: arrows,
                prevArrow: '<button class="slick-btn slick-prev"></button>',
                nextArrow: '<button class="slick-btn slick-next"></button>',
                autoplay: autoplay,
                autoplaySpeed: autoplay_speed,
                infinite: infinite,
                adaptiveHeight: true,
                responsive: [
                    {
                        breakpoint: 1921,
                        settings: {
                            slidesToShow: slidesToShow
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: for_laptop
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: for_tablet,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: for_mobile,
                            arrows: false
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: for_xs_mobile,
                            arrows: false
                        }
                    }
                ]
            });
        }
    }

    /**
     * Gallery Options
     * @param $scope
     * @param $
     * @constructor
     */
    var Gallery = function ($scope, $){
        var rn_gallery_area = $scope.find('.rn-gallery-area').eq(0);
        var uniq_id = rn_gallery_area.attr('id');

        $('#' + uniq_id + ' .rn-masonary-wrapper').imagesLoaded(function () {
            // filter items on button click
            $('#' + uniq_id + ' .messonry-button').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            // init Isotope
            var $grid = $('#' + uniq_id + ' .mesonry-list').isotope({
                itemSelector: '.masonry_item',
                percentPosition: true,
                transitionDuration: '0.7s',
                layoutMode: 'fitRows',
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.masonry_item',
                }
            });
        });

        $('#' + uniq_id + ' .messonry-button button').on('click', function (event) {
            $(this).siblings('.is-checked').removeClass('is-checked');
            $(this).addClass('is-checked');
            event.preventDefault();
        });
    }

    /**
     * CounterUp
     */
    var Counterup = function ($scope, $){
        $('.count').counterUp({
            delay: 10,
            time: 1000
        });
    }

    /**
     * Parallax
     * @param $scope
     * @param $
     * @constructor
     */
    var Parallax = function ($scope, $){
        function stellarParallax() {
            if ($(window).width() > 1024) {
                $.stellar();
            } else {
                $.stellar('destroy');
                $('.parallax').css('background-position', '');
            }
        }
        function SetResizeContent() {
            stellarParallax();
        }
        SetResizeContent();
    }

    /**
     * particles
     */
    var Particles = function ($scope, $){
        // slider-creative-agency
        var creative_agency_options = $scope.find('.slider-creative-agency').eq(0);
        if ( creative_agency_options.length > 0) {
            var settings            = creative_agency_options.data('settings');
            var id                  = settings['id'];
            var parallax            = settings['parallax'];
            var particles           = settings['particles'];
            var particles_color     = (settings['particles_color'] ? settings['particles_color'] : '#ffffff');
            var particles_opacity   = (settings['particles_opacity'] ? settings['particles_opacity'] : '0.5');
        }
        if (particles){
            particlesJS(id,

                {
                    "particles": {
                        "number": {
                            "value": 50,
                            "density": {
                                "enable": true,
                                "value_area": 800
                            }
                        },
                        "color": {
                            "value": particles_color
                        },
                        "shape": {
                            "type": "circle",
                            "stroke": {
                                "width": 0,
                                "color": "#000000"
                            },
                            "polygon": {
                                "nb_sides": 4
                            },
                            "image": {
                                "src": "img/github.svg",
                                "width": 100,
                                "height": 100
                            }
                        },
                        "opacity": {
                            "value": particles_opacity,
                            "random": false,
                            "anim": {
                                "enable": false,
                                "speed": 1,
                                "opacity_min": 0.1,
                                "sync": false
                            }
                        },
                        "size": {
                            "value": 4,
                            "random": true,
                            "anim": {
                                "enable": false,
                                "speed": 40,
                                "size_min": 0.1,
                                "sync": false
                            }
                        },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": particles_color,
                            "opacity": 0.4,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 6,
                            "direction": "none",
                            "random": false,
                            "straight": false,
                            "out_mode": "out",
                            "attract": {
                                "enable": false,
                                "rotateX": 600,
                                "rotateY": 1200
                            }
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": {
                                "enable": true,
                                "mode": "repulse"
                            },
                            "onclick": {
                                "enable": true,
                                "mode": "push"
                            },
                            "resize": true
                        },
                        "modes": {
                            "grab": {
                                "distance": 400,
                                "line_linked": {
                                    "opacity": 1
                                }
                            },
                            "bubble": {
                                "distance": 400,
                                "size": 40,
                                "duration": 2,
                                "opacity": 8,
                                "speed": 3
                            },
                            "repulse": {
                                "distance": 200
                            },
                            "push": {
                                "particles_nb": 4
                            },
                            "remove": {
                                "particles_nb": 2
                            }
                        }
                    },
                    "retina_detect": true,
                    "config_demo": {
                        "hide_card": false,
                        "background_color": "#b61924",
                        "background_image": "",
                        "background_position": "50% 50%",
                        "background_repeat": "no-repeat",
                        "background_size": "cover"
                    }
                }

            );
        }

    }






    // Init 
	$(window).on('elementor/frontend/init', function () {
	    if(elementorFrontend.isEditMode()) {
	        isEditMode = true;
	    }
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-video-popup.default', PlayBtn);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-video-banner.default', PlayBtn);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-designer-banner.default', PlayBtn);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-portfolio.default', slickactivationforPortfolio);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-gallery.default', Gallery);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-counterup.default', Counterup);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-blog.default', slickactivationforPortfolio);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-agency-banner.default', Particles);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-agency-banner.default', Parallax);
        elementorFrontend.hooks.addAction('frontend/element_ready/imroz-main-slider.default', slickactivationforPortfolio);
    });


}(jQuery));