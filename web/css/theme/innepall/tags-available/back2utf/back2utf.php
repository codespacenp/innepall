<?php

   /**
   *   \u00f3 => ó
   *
   *   @example <cms:back2utf>
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   21.07.2022
   */

   namespace trendoman;

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   $FUNCS->register_tag( 'back2utf', function($params, $node) use ($FUNCS)
   {
      if( isset($params[0]['rhs']) ) {
        $html = $params[0]['rhs'];
        if( is_array($html) ) {
          $html = $FUNCS->json_encode($html);
        }
      }
      else {
        foreach( $node->children as $child ){
          $html .= $child->get_HTML();
        }
      }
      $html = trim( $html );
      return preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', '\trendoman\unicode_convert', $html);
   });

   function unicode_convert($match){
      return iconv("UTF-16BE", "UTF-8", pack('H*', $match[1]));
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
