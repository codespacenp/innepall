<?php

   /**
   *   &quot; => "
   *
   *   @example <cms:back2html>
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   06.11.2022
   */

   namespace trendoman;

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   $FUNCS->register_tag( 'back2html', '\trendoman\back2html' );
   $FUNCS->register_tag( 'html_decode', '\trendoman\back2html' );
   $FUNCS->register_tag( 'htmldecode', '\trendoman\back2html' );

    function back2html ($params, $node) {
      global $FUNCS;

      if( isset($params[0]['rhs']) ) {
        $html = $params[0]['rhs'];
        if( is_array($html) ) {
          array_walk_recursive( $html, function(&$value, $key, $FUNCS){ $value = $FUNCS->unhtmlentities( $value, K_CHARSET ); }, $FUNCS );
          return $FUNCS->json_encode($html);
        }
      }
      else {
        foreach( $node->children as $child ){
          $html .= $child->get_HTML();
        }
      }
      $html = trim( $html );

      return ( isset($html[0]) ? $FUNCS->unhtmlentities( $html, K_CHARSET ) : '' );
    }


   /*
   // ~~~~~~~~~~~~~
   // Credits
   // ~~~~~~~~~~~~~
   // You should have downloaded this code from https://github.com/trendoman/Tweakus-Dilectus
   // Code is based on this → SO answer: https://stackoverflow.com/a/2934602/7524904
   // ~~~~~~~~~~~~~
   // Support
   // ~~~~~~~~~~~~~
   // Write me at <anton.cms@ya.ru>, <tony.smirnov@gmail.com> "Anton S aka Trendoman"
   // Telegram: https://t.me/couchcms
   */
