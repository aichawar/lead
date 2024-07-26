var jQueryBridget = require('jquery-bridget');
//Filtering and Sorting
var Isotope = require('isotope-layout');
jQueryBridget( 'isotope', Isotope, $ );

import Typed from 'typed.js';

$(document).ready(function($){

    const extra = 140;
    const windowEl = $(window);
    const containerEl = $('.lame--scroll--container');
    const itemEls = $('.lame--scroll--item');

    initCarousel();
    initTrigger();
    initIsotope();
    animationTyped();
    scrollTo();

    if(containerEl.length > 0) {
        // Démarrer l'animation initiale
        updateScrollItems();
    }

    function scrollTo(){
        $('a[href^="#"]').on("click", function(e) {
            e.preventDefault();
            var scrollToPosition = $($(this).attr("href")).offset().top -  $('.navbar').outerHeight();

            window.scrollTo({
                top: scrollToPosition,
                behavior: "smooth"
            });
        });
    }


    function updateScrollItems() {
        if(windowEl.width() > 767) {
            const windowScroll = windowEl.scrollTop() + (windowEl.height() / 2) - extra;
            const end = containerEl.offset().top + containerEl.height() - extra;

            itemEls.each(function () {
                let decalage = 0;
                const lameEl = $(this).closest('.lame--scroll');

                if (lameEl.hasClass('lame--scroll--1')) {
                    decalage = extra;
                }

                if (windowScroll >= (lameEl.offset().top - decalage) && windowScroll < end) {
                    const el = $(this);
                    itemEls.removeClass('active');
                    el.addClass('active');
                    el.css({ 'top': windowScroll - lameEl.offset().top + 'px' });
                }
            });
        }

        // Demande une nouvelle animation frame
        requestAnimationFrame(updateScrollItems);
    }

    function initIsotope() {
        //filtering actus
        var $grid = $('.grid--actus').isotope({
            itemSelector: '.grid--actus--items',
            layoutMode: 'fitRows'
        });

        $('.grid--actus--filters').on( 'click', '.grid--actus--filter', function() {
            $('.grid--actus--filter.active').removeClass('active')
            $(this).toggleClass('active');
            var filterValue = "";
            filterValue = $(this).attr('data-filter');

            if(filterValue === "") {
                filterValue = "*";
            }

            console.log(filterValue)
            $grid.isotope({ filter: filterValue });
        });
    }

    function initTrigger() {
        $('.burger').click(function(){
            $(this).toggleClass('open');
        });

        $('.video--miniature').click(function () {
            if($(this).parent().find('video').length > 0) {
                $(this).parent().find('video').get(0).play();
            }
            $(this).remove();
        });

        $(".picto input").on("focus", function (){

            const parentDiv = $(this).closest(".picto");
            parentDiv.addClass("focus");
        })

        $(".picto input").on("focusout", function (){

            const parentDiv = $(this).closest(".picto");
            parentDiv.removeClass("focus");
        })

        $(".picto input").on("input", function (){
            const parentDiv = $(this).closest(".picto");

            if ($(this).val() !== "") {
                parentDiv.addClass("focus");
            } else {
                parentDiv.removeClass("focus");
            }
        })

    }

    function initCarousel() {

        jQuery(".owl-carousel.owl-carousel-partenaires").owlCarousel({
            'items' : 4,
            responsive : {
                0 : {
                    'items' : 2,
                },
                756 : {
                    'items' : 4,
                },
                1200 : {
                    'items' : 6,
                }
            },
            'dots' : false,
            'autoplay' : true,
            'margin':30,
            'autoWidth':true,
            'slideTransition': 'linear',
            'autoplayTimeout': 1500,
            'autoplaySpeed': 1550,
            'loop': true,
        });

        jQuery(".owl-carousel.owl-carousel-etudes-cas").owlCarousel({
            responsive : {
                0 : {
                    'items' : 1,
                },
                750 : {
                    'items' : 2,
                },
                1200 : {
                    'items' : 3,
                }
            },
            'dots' : false,
            'margin': 15,
            'loop': true,
            'slideTransition': 'linear',
            'autoplayTimeout': 5000,
            'autoplaySpeed': 5000,
            'autoplay' : true,

        });

        $(".owl-carousel.owl-carousel-clients").each(function() {

            $(this).owlCarousel({
                'items' : 6,
                responsive : {
                    0 : {
                        'items' : 3,
                    },
                    756 : {
                        'items' : 4,
                    },
                    1200 : {
                        'items' : 5,
                    }
                },
                'dots' : false,
                'autoplay' : true,
                'slideTransition': 'linear',
                'autoplayTimeout': 1500,
                'autoplaySpeed': 1550,
                'margin': 10,
                'loop': true,
            });
        });

        $(".owl-carousel.owl-carousel-clients-blog").each(function() {

            $(this).owlCarousel({
                'items' : 8,
                responsive : {
                    0 : {
                        'items' : 3,
                    },
                    756 : {
                        'items' : 5,
                    },
                    1200 : {
                        'items' : 7,
                    }
                },
                'dots' : false,
                'autoplay' : true,
                'slideTransition': 'linear',
                'autoplayTimeout': 1500,
                'autoplaySpeed': 1550,
                'margin': 30,
                'loop': true,

            });
        });

        $(".owl-carousel.owl-carousel-clients-contact").each(function() {
            $(this).owlCarousel({
                responsive : {
                    0 : {
                        'items' : 2,
                    },
                    756 : {
                        'items' : 4,
                    },
                    1200 : {
                        'items' : 8,
                    }
                },
                'dots' : false,
                'autoplay' : true,
                'slideTransition': 'linear',
                'autoplayTimeout': 1500,
                'autoplaySpeed': 1550,
                'margin': 30,
                'autoWidth':true,
                'loop': true,
            });
        });


    }

    // Fonction pour charger davantage d'études de cas en utilisant Ajax
    function loadMoreEtudesDeCas(paged) {
        $('.load-more-button').addClass('loading');
        $.ajax({
            url: genesii_loadmore.ajaxurl, // Le point d'entrée pour les requêtes Ajax dans WordPress
            type: 'POST',
            data: {
                action: 'load_more_etudes_de_cas',
                paged: paged
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    console.log("test")
                    $('.load-more-button').removeClass('loading');

                    $('.page__etude--content--grid').append(response.data); // Ajoute les nouvelles études de cas à la liste existante

                    $('.grid--actus').isotope('reloadItems').isotope('layout');
                    $('.grid--actus--filter.all').click();

                    if($('.grid--actus--items').length >= $('.load-more-button').data('total')) {
                        $('.load-more-button').remove();
                    }
                } else {
                    console.log('Erreur lors du chargement des études de cas.');
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log('Erreur Ajax : ' + errorThrown);
            }
        });
    }

    function animationTyped() {
        if($('.typedjs').length > 0) {

            var typed = new Typed('.typedjs', {
                strings: $('.typedjs').data('phrase').split(';;'),
                typeSpeed: 50,
                backSpeed: 30,
                backDelay: 1500,
                loop: true
            });
        }
    }
});
