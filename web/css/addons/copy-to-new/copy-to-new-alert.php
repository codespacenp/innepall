<?php
    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    /**
    *   Добавим алерт на страницу клона о том, что надо сохранить
    *
    *   Visible info alert that a clone is being edited and must save
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @начало 26 Июня 2022
    *   @обнова 30 Октября 2023
    */

    $FUNCS->add_event_listener( 'add_admin_html', function(){
        global $FUNCS, $CTX;

        if( 'copy_view' === $CTX->get('k_route_name') ){
            $html = $FUNCS->show_alert( 'Copy to New', 'You are editing a copy of the previous page - please save!', 'info' );
            $FUNCS->add_html( $html );
        }
    });
