<?php

   /**
   *   finds if a substring "ea" is in array ["seek", "peek", "peak"]
   *
   *   @example <cms:arr_substr_exists>
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   18.10.2022
   */

   $FUNCS->register_tag( 'arr_substr_exists', function($params, $node)
   {
      global $FUNCS;
      if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

      extract( $FUNCS->get_named_vars(
                  array( 'val'=>'',
                         'in'=>'',
                        ),
                  $params)
             );

      if( is_array($in) ){
        foreach( $in as $item ){
          if( stripos( $item, $val ) !== false ) return '1';
        }
      }
      return '0';
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
