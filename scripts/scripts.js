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

        document.addEventListener( 'wpcf7mailsent', function( event ) {
            $.magnificPopup.open({items: {src: '#thanks'},type: 'inline'});
        }, false );
    },

};

$(document).ready( MAIN.init() );