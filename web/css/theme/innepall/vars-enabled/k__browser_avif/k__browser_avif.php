<?php

   /**
   *   Ставим флаг k__browser_avif = 1, если браузер поддерживает AVIF
   *
   *   Visitor's browser headers analysed for AVIF image support.
   *   Adds "k__browser_avif" to the global context.
   *
   *   @author tony.smirnov@gmail.com (https://t.me/couchcms_chat)
   *   @date   27 Oct 2023
   */

   $FUNCS->add_event_listener( 'add_render_vars', function () {
      global $CTX;

      $allow_avif = ( strpos( $_SERVER['HTTP_ACCEPT'], 'image/avif' ) === false ) ? 0 : 1;
      $CTX->set('k__browser_avif', $allow_avif);
   });
