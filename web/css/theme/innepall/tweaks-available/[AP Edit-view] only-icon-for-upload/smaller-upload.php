<?php
    if( !defined('K_ADMIN') ) return;

    /**
    *   Оставляем только иконку в поле загрузки файла
    *
    *   Removes "Browse server" label on a button; only icon is kept
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @написал 05.02.2023
    */

    $FUNCS->add_event_listener( 'add_admin_css', function(){
      global $FUNCS;

      $FUNCS->add_css(" .upload-path + .btn {right: -47px; width: 48px;} ");
    });

    $FUNCS->add_event_listener( 'init', function(){
      global $FUNCS;

      if( defined('K_ADMIN') && K_ADMIN_LANG /*any*/){
          $t = array();
          $t['browse_server'] = '';
          $FUNCS->_t = array_merge( $FUNCS->_t, $t );
      }
    });
