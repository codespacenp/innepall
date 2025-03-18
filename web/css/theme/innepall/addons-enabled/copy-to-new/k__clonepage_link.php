<?php

    /**
    *   Переменная с ссылкой для клонирования страницы с фронтенда
    *
    *   Variable to access cloning action of Addon 'copy-to-new' from the frontend.
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @написал 26 Ноября 2022
    *   @обновил 02 Ноября 2023
    */

    $FUNCS->add_event_listener( 'add_render_vars', function () {
        global $CTX, $FUNCS, $PAGE, $AUTH;

        if( $PAGE->id>0 && $PAGE->tpl_is_clonable && $AUTH->user->access_level >= K_ACCESS_LEVEL_ADMIN )
        {
            $link = K_ADMIN_URL . K_ADMIN_PAGE . "?o=".urlencode($PAGE->tpl_name) . "&q=copy/";
            $link.= $FUNCS->create_nonce('edit_page_'.$PAGE->id) . "/" . $PAGE->id;

            $CTX->set('k__clonepage_link', $link, 'global' );
        }
    });
