'use strict';

let MAIN = {

    init: function init() {

        MAIN.other();
    },

    other: function other() { 

        $('.show-gallery-js').on('click', function() {   
            $(this).hide();
            $(this).parents('.b_gallery').find('.masonry-item.hidden').removeClass('hidden');
            $('.masonry').masonry();
        });
        
        $('.show-services-js').on('click', function() {   
            $(this).hide();
            $(this).parents('.services_wrapper').find('.service_item.hidden').removeClass('hidden');
        });
        
        $('.show-articles-js').on('click', function() {   
            $(this).hide();
            $(this).parents('.articles_list').find('.article_row.hidden').removeClass('hidden');
        });
        
        $('.show-related-js').on('click', function() {   console.log('Click');
            $(this).hide();
            $(this).parents('.articles_wrapper').find('.article_row.hidden').removeClass('hidden');
        });
        
        $('.jsMoreTablesPost').on('click', function() {   
            $(this).hide();
            $(this).parents('.tables_list').find('.table_row.hidden').removeClass('hidden');
        });
        //
        document.addEventListener( 'wpcf7mailsent', function( event ) {
            $.magnificPopup.open({items: {src: '#thanks'},type: 'inline'});
        }, false );
        //
        let $megaMenu = $('.jsMegaMenu');
        let $menuWrapper = $('.mega_menu_wrapper .mega_menu');
        $(document).on('click', function (e) {
            if (!$megaMenu.is(e.target) && $megaMenu.has(e.target).length === 0 && 
                !$menuWrapper.is(e.target) && $menuWrapper.has(e.target).length === 0) {
                $('.mega_menu_wrapper').slideUp(200);
                $megaMenu.removeClass('active');
            }
        });
        //   
        // if ( $(window).width() > 992 ) {    
        //     $('.mega_menu_wrapper .menu_left > ul > li').hover(
        //         function() {    
        //             var elem = $(this);
        //             setTimeout(function() {    // console.log('hover');
        //                 elem.find('.sub-menu').css({'opacity':'1', 'visibility':'visible', 'pointerEvents':'all'});
        //             }, 1000);
        //         }, 
        //         function() {
        //             var elem = $(this);
        //             setTimeout(function() {    // console.log('un hover');
        //                 // elem.find('.sub-menu').css({'opacity':'0', 'visibility':'hidden', 'pointerEvents':'none'});
        //                 $('.sub-menu').css({'opacity':'0', 'visibility':'hidden', 'pointerEvents':'none'});
        //             }, 1000);
        //         }
        //     );
        // }

        $('.btn.steps').on('click', function() {  
            var number = $(this).data('step');
            $(this).parent().removeClass('active-step').next().addClass('active-step');

            console.log( number );
        });

    },

};

$(document).ready( MAIN.init() );