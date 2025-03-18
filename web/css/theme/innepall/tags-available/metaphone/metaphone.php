<?php

   /**
   *   Generate a metaphone for a word — https://www.php.net/manual/en/function.metaphone
   *
   *   @example <cms:metaphone str='test' />
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   04.11.2022
   */

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   $FUNCS->register_tag( 'metaphone', function($params, $node)
   {
      return metaphone( $str = trim($params[0]['rhs']) );
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
