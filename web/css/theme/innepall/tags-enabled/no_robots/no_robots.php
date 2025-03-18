<?php

   /**
   *   Send a X-Robots-Tag header for SEO
   *
   *   @example <cms:no_robots />
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   04.11.2022
   */

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   $FUNCS->register_tag( 'no_robots', function($params, $node)
   {
      $arr = array();
      if( isset($params[0]['rhs']) ){
       $hint = trim($params[0]['rhs']);
       if( false !== stripos($hint, 'noindex') ) $arr[] = 'noindex';
       if( false !== stripos($hint, 'nofollow') ) $arr[] = 'nofollow';
       if( false !== stripos($hint, 'noarchive') ) $arr[] = 'noarchive';
       if( false !== stripos($hint, 'nosnippet') ) $arr[] = 'nosnippet';
       if( false !== stripos($hint, 'notranslate') ) $arr[] = 'notranslate';
       if( false !== stripos($hint, 'noimageindex') ) $arr[] = 'noimageindex';
      }
      $directive = count($arr) ? implode(", ", $arr) : 'none';
      return header("X-Robots-Tag: $directive ", true);
   });

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
