'use strict';

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