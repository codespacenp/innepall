<?php

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    /**
    *   Удаляем страницу из базы по клику кнопки в Дополнительных настройках страницы
    *   Использовать желательно с твиком '[AP List-view] flash-msg-upon-delete'
    *
    *   Make happen the deleteing of page upon click (see 'group_advanced_settings')
    *   Best used with tweak '[AP List-view] flash-msg-upon-delete'
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @написал 02 Ноября 2022
    *   @обновил 02 Ноября 2022
    */

    $FUNCS->add_event_listener( 'ajax_action_my_deletepage', function(){
        global $FUNCS, $DB, $PAGE, $CTX;

        if( isset($_POST['page-id']) && isset($_POST['template-id']) ){

            if( !$FUNCS->is_non_zero_natural($_POST['page-id']) || !$FUNCS->is_non_zero_natural($_POST['template-id'])){
                die( 'ERROR: invalid input' );
            }
            $page_id = intval( $_POST['page-id'] );
            $template_id = intval( $_POST['template-id'] );

            $DB->begin();

            // serialize access.. lock template as this could involve working with nested pages tree.
            $DB->update( K_TBL_TEMPLATES, array('deleted'=>0), "id='" . $DB->sanitize( $template_id ) . "'" );

            $pg = new KWebpage( $template_id, $page_id );
            if( $pg->error ){
                ob_end_clean();
                die( 'ERROR in deletion: ' . $pg->err_msg );
            }

            // execute action
            $pg->delete();
            $FUNCS->invalidate_cache();

            if( $pg->tpl_nested_pages ){
                $pg->reset_weights_of(); // entire tree
            }

            $DB->commit();
        }
    });
