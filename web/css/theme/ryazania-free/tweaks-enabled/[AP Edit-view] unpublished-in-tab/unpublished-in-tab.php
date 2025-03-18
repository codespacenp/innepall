<?php
    if( !defined('K_ADMIN') ) return;

    /**
    *   Ставим статус 'неопубликовано' в закладку редактируемой страницы
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @написал 31.10.2023
    *   @обновил 31.10.2023
    */

    $FUNCS->add_event_listener( 'add_admin_js', function(){
        global $FUNCS, $CTX;
        if( '0000-00-00 00:00:00' !== $CTX->get('k_page_date') ){ return; }

        $js = '';
        ob_start();
?>
        //-
        // Покажем статус неопубликованной страницы в закладке
        // Adds "not public" status to admin-panel 'Edit' tab
        // by Антон С. tony.smirnov@gmail.com
        //-
        $(function(){
            var $a = $("li#tab-pages").find('a[href="#tab-pane-pages"]');
            var $span = $('<span />').addClass('label label-error').html('unpublished');
            $span.css({"margin-left": "5px", "line-height": "1.4em"});
            $a.append($span);
        });

<?php
        $js = ob_get_clean();
        $FUNCS->add_js( $js );
    });
