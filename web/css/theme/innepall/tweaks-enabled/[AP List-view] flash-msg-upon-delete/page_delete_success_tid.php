<?php

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    /**
    *   Отправим сообщение о количестве удаленных страниц.
    *
    *   Sending a message about number of deleted pages.
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    */

    # Fire an incremented 'flash' per each deleted page per masterpage
    # If 10 pages are deleted, then the caught flashmsg will have value 10
    $FUNCS->add_event_listener( 'page_deleted', function($kwebpage) use ($KSESSION) {
        static $__tpl = array();

        $tid = $kwebpage->tpl_id;
        $__tpl[$tid] += 1;
        $KSESSION->set_flash( "page_delete_success_$tid", $__tpl[$tid] );
    });
