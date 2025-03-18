<?php

   /**
   *   Fetch fulltext content for a given page
   *
   *   @example <cms:get_fulltext id=k_page_id />
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   04.11.2022
   */

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   $FUNCS->register_tag( 'get_fulltext', function($params, $node)
   {
      global $DB;

      $id = (int) $params[0]['rhs'];
      return ($id > 0) ? $DB->select( K_TBL_FULLTEXT, array("content"), "page_id = '$id'" )[0]['content'] : '';
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
