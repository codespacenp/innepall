<?php

   /**
   *   Replaces values of existing parameters; sort keys from shortest to longest
   *
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   11.11.2022
   */

   $FUNCS->add_event_listener( 'tag_add_querystring_executed', function($tag_name, $params, $node, &$html){
      parse_str( parse_url( $html, PHP_URL_QUERY), $arr );
      array_multisort( array_map( 'strlen', array_keys($arr) ), SORT_ASC, $arr );
      $html = strtok($html, '?') . '?' . http_build_query($arr);
   });

   /*
   // ~~~~~~~~~~~~~
   // Credits
   // ~~~~~~~~~~~~~
   // You should have downloaded this code from https://github.com/trendoman/Tweakus-Dilectus
   // ~~~~~~~~~~~~~
   // Support
   // ~~~~~~~~~~~~~
   // Write me at <anton.cms@ya.ru>, <tony.smirnov@gmail.com> "Anton S aka Trendoman"
   // Telegram: https://t.me/couchcms
   */
