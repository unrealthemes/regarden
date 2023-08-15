'use strict';

    // list_view
    $('.list_view').owlCarousel({
        loop:true, 
        autoWidth:false,
        // stagePadding: 100,                
        margin:20,
        string: 'item',  
        dots:false,
        navText: ["<div class='arrow arrow_left'></div>", "<div class='arrow arrow_right'></div>"],
        navContainer: '.owl_nav',  
        nav:true, 
        startPosition:1,
        responsiveRefreshRate:1000,
        responsive:{
        0:{items:1, margin:5},
        600:{items:1,margin:5}, 
        800:{items:1, margin:20},
        1024:{items:2}, 
        1300:{items:2},
        1310:{items:2}
        }
    });
    
     
    
     // play video
 
  $('.play-button').click(function() {
    var container = $(this).closest('.video-container');
    // var video = container.find('#video-iframe')[0];
    var video = container.find('.video-wrapper iframe')[0];
    video.src += '?autoplay=1';
    $(this).hide();
    container.find('.video-placeholder').hide();
    container.find('.overlay').hide();
    video.contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
  });
 

    
    
    
    
    function initializeCarousels(sync1Selector, sync2Selector) {
        var syncContainers = $(".item_galery");
    
        syncContainers.each(function() {
            var syncContainer = $(this);
            var sync1 = syncContainer.find(sync1Selector);
            var sync2 = syncContainer.find(sync2Selector);
            var slidesPerPage = 5; // глобально определенное количество элементов на странице
            var syncedSecondary = true;
    
            sync1.owlCarousel({
                items: 1, 
                checkVisibility: false,
                nav: true,
                responsiveRefreshRate: 0,
                autoplay: false,
                dots: false,
                loop: true,
                navText: ["<div class='arrow arrow_left'></div>", "<div class='arrow arrow_right'></div>"],
            }).on('changed.owl.carousel', syncPosition);
    
            sync2
                .on('initialized.owl.carousel', function() {
                    sync2.find(".owl-item").eq(0).addClass("current");
                })
                .owlCarousel({
                    items: slidesPerPage,
                    dots: false,
                    nav: false,
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: slidesPerPage,
                    responsiveRefreshRate: 0,
                    responsive: {
                        0: { items: 6 },
                        600: { items: 6 },
                        800: { items: 6 },
                        1024: { items: 6 },
                        1300: { items: 6 },
                        1310: { items: 6 }
                    },
                }).on('changed.owl.carousel', syncPosition2);
    
            sync2.on("click", ".owl-item", function(e) {
                e.preventDefault();
                var number = $(this).index();
                var targetSync1 = $(this).closest(".item_galery").find(sync1Selector);
                targetSync1.data('owl.carousel').to(number, 300, true);
            });
    
            function syncPosition(el) {
                var carousel = el.relatedTarget.selector;
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - (el.item.count / 2) - .5);
    
                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
    
                sync2
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = sync2.find('.owl-item.active').length - 1;
                var start = sync2.find('.owl-item.active').first().index();
                var end = sync2.find('.owl-item.active').last().index();
    
                if (current > end) {
                    $(carousel).data('owl.carousel').to(current, 100, true);
                }
                if (current < start) {
                    $(carousel).data('owl.carousel').to(current - onscreen, 100, true);
                }
            }
    
            function syncPosition2(el) {
                if (syncedSecondary) {
                    var carousel = el.relatedTarget.selector;
                    var number = el.item.index;
                    $(carousel).data('owl.carousel').to(number, 100, true);
                }
            }
        });
    }
    
    // Пример использования с двумя каруселями на странице
    initializeCarousels(".sync1", ".sync2");
    initializeCarousels(".sync3", ".sync4");
    initializeCarousels(".sync5", ".sync6");
    // ---------------------------------------------

     
        function toggleText(event) {
            var plusMinus = event.currentTarget;
            var text = plusMinus.querySelector(".text");
            var symbol = plusMinus.querySelector(".symbol");
            
            if (text.style.display === "" || text.style.display === "none") {
                text.style.display = "block";
                symbol.textContent = "×";
                 plusMinus.classList.add("diactive"); 
            } else {
                text.style.display = "none";
                symbol.textContent = "+";
               plusMinus.classList.remove("diactive");
            }
        }
    
    
 
    
    
    
     // home tabs 
    (function($){               
     $.fn.lightTabs = function(options){
            var createTabs = function(){
            var tabs = this;
            var i = 0;
            var prevIndex = 0;
    
            var showPage = function(i){
                $(tabs).children("div").children("div").hide();
                $(tabs).children("div").children("div").eq(i).show();
                $(tabs).children("ul").children("li").removeClass("tabactive");
                $(tabs).children("ul").children("li").eq(i).addClass("tabactive");
                $(tabs).children("ul").children("li").eq(prevIndex).removeClass("prev");
                $(tabs).children("ul").children("li").eq(i - 1).addClass("prev");
                prevIndex = i - 1;
            } 
            showPage(0);
            $(tabs).children("ul").children("li").eq(0).addClass("prev");
    
            $(tabs).children("ul").children("li").each(function(index, element){
                $(element).attr("data-page", i);
                i++;                        
            });
    
            $(tabs).children("ul").children("li").click(function(){
                var currentIndex = parseInt($(this).attr("data-page"));
                showPage(currentIndex);
            });                
        }; 
        return this.each(createTabs);
    };  
    })(jQuery);
    
    $(document).ready(function(){
    $(".tabs").lightTabs();
    });





    
    
    
    
    
    
    
    
    
var app = {
  init: function init() {
    app.windowResize();
    app.modals();
    app.menu();
    app.custom();
    app.fancybox();
    app.masonry();
    app.sliders();
    app.tabs();
    app.accordeon();
    // app.map();
  },




  windowResize: function windowResize() {
    $(window).on('resize', function () {});
  },

  windowLoad: function windowLoad() {
    $(window).on('load', function () {});
  },

  menu: function menu() {
    var $btnMenu = $('.jsMenu');
    $btnMenu.click(function () {
      $(this).toggleClass('menu-is-active');
      $('.header_menu').slideToggle(200);
      $('body').toggleClass('menuopen');
    });
  },

  custom: function custom() {

    $('.header_inner').sticky({
      topSpacing: 0,
      zIndex: 20
    });

    $('.mobile_title').each(function () {
      var $this = $(this);
      $this.on('click', function () {
        $this.toggleClass('active');
        $this.parent().find('.services_section').slideToggle(200);
      });
    });

    $('.b_service_description .more_wrapper a').on('click', function (event) {
      var $header = $('header').outerHeight();
      if (this.hash !== '') {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
          scrollTop: $(hash).offset().top - $header
        });
      }
    });

    $('.jsMoreTables').on('click', function (e) {
      e.preventDefault();
      $(this).parents('.cost_wrapper').find('.tables_list').addClass('all');
      $(this).parents('.more_wrapper').hide();
    });

    $('.jsMegaMenu').on('click', function () {
      $(this).toggleClass('active');
      $('.mega_menu_wrapper').slideToggle(200);
    });

    $('.jsNextMenu').on('click', function () {
      if ($(window).width() < 992) {
        $(this).toggleClass('active').next('.sub-menu').slideToggle(200);
      }
    });
  },

  fancybox: function fancybox() {
    $('[data-fancybox]').fancybox({
      backFocus: false,
      animationEffect: false
    });
  },

  masonry: function masonry() {
    $('.masonry').each(function () {
      var $masonry = $(this);
      // let $masonryItem = $masonry.find('.masonry-item');
      $masonry.masonry({
        // itemSelector: $masonryItem,
        itemSelector: '.masonry-item',
        columnWidth: '.masonry-item',
        percentPosition: true
      });
    });
  },

  sliders: function sliders() {
    $('.jsTeamSlider').slick({
      arrows: false,
      slidesToShow: 4,
      slidesToScroll: 1,
      touchThreshold: 200,
      dots: false,
      responsive: [{
        breakpoint: 1200,
        settings: {
          slidesToShow: 3
        }
      }, {
        breakpoint: 992,
        settings: {
          slidesToShow: 2
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 1
        }
      }]
    });

    $('.jsDocumentationSlider').slick({
      arrows: false,
      slidesToShow: 3,
      slidesToScroll: 1,
      touchThreshold: 200,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 3000,
      dots: false,
      responsive: [{
        breakpoint: 992,
        settings: {
          slidesToShow: 3
        }
      }, {
        breakpoint: 600,
        settings: {
          slidesToShow: 1
        }
      }]
    });
  },

  modals: function modals() {
    $('.jsOpenModals').magnificPopup({
      removalDelay: 300,
      mainClass: 'my-mfp-slide-bottom',
      fixedContentPos: true
    });

    $('.jsCloseModal').each(function () {
      var $this = $(this);
      $this.on('click', function () {
        $this.parents('.b_modal').magnificPopup('close');
      });
    });
  },

  tabs: function tabs() {
    var tabs = $('.jsTabs');
    tabs.each(function () {
      var tabs = $(this),
          tab = tabs.find('.jsTabsTab'),
          content = tabs.find('.jsTabsItem');
      tab.each(function (index, element) {
        $(this).attr('data-tab', index);
      });

      function showContent(i) {
        tab.removeClass('-active');
        content.removeClass('-active').removeClass('-fade');
        tab.eq(i).addClass('-active');
        content.eq(i).addClass('-active');
        setTimeout(function () {
          content.eq(i).addClass('-fade');
        }, 1);
      }
      tab.on('click', function (e) {
        e.preventDefault();
        showContent(parseInt($(this).attr('data-tab')));
      });
    });
  },

  accordeon: function accordeon() {
    $('.jsAccord').each(function () {
      var accord = $(this),
          accord_btn = accord.find('.jsAccordBtn');

      accord_btn.on('click', function (e) {
        e.preventDefault();
        var $this = $(this),
            $this_item = $this.closest('.jsAccordItem'),
            $this_content = $this.closest('.jsAccordItem').find('.jsAccordContent');
        if ($this.hasClass('-active')) {
          $this.removeClass('-active');
          $this_content.slideUp(200);
          $this_item.removeClass('item_active');
        } else {
          $this.addClass('-active');
          $this_content.slideDown(200);
          $this_item.addClass('item_active');
        }
      });
    });
  },

  map: function map() {
    if ($('#map').length > 0) {
      var init = function init() {
        var myMap = new ymaps.Map('map', {
          center: [55.776608, 37.462182],
          zoom: 16,
          controls: ['zoomControl', 'fullscreenControl']
        }, {
          searchControlProvider: 'yandex#search'
        }),
            mainLocation = new ymaps.Placemark([55.776608, 37.462182], {
          iconCaption: 'г. Москва, пр-кт Маршала Жукова, дом 51, офис 29',
          hintContent: 'г. Москва, пр-кт Маршала Жукова, дом 51, офис 29',
          balloonContent: 'Россия, г. Москва, пр-кт Маршала Жукова, дом 51, офис 29'
        }, {
          preset: 'islands#redDotIconWithCaption',
          iconLayout: 'default#image'
          // iconImageHref: 'images/pin.png',
          // iconImageSize: [53, 65],
          // iconImageOffset: [-26, -33]
        });

        myMap.behaviors.disable('scrollZoom');

        myMap.geoObjects.add(mainLocation);
        function onResizeMap() {
          if ($(window).width() < 992) {
            myMap.setCenter([55.776608, 37.462182]);
          } else {
            myMap.setCenter([55.776608, 37.462182]);
          }
        }
        onResizeMap();
      };

      ymaps.ready(init);

      ;
    }
  }

};

$(document).ready(app.init());

app.windowLoad();