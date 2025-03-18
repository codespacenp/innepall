<?php

   /**
   *   Join array values into a string
   *
   *   @example <cms:arr_join "array">
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   08.11.2022
   */

   $FUNCS->register_tag( 'arr_join', function($params, $node)
   {
      global $FUNCS, $CTX;
      if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

      extract( $FUNCS->get_named_vars(
                  array( 'val'=>'',
                         'sep'=>'',
                         'quotes'=>'1',
                        ),
                  $params)
             );

      $quote = ($quotes == 0) ? 0 : 1;
      if( !strlen( $sep ) ) $sep = ', ';
      if( !is_array($val) ){
        $arr = $CTX->get( $val );
        if( !is_array($arr) ){
          $arr = $FUNCS->json_decode( $val );
          if( !is_array($arr) ){
            return;
          }
        }
        $val = $arr;
      }

      foreach( $val as $v ){
        if( is_array($v) ) $v = 'Array';
        $html .= $quote ? $_sep . $FUNCS->json_encode( $v ) : $_sep . $v;
        $_sep = $sep;
      }

      return $html;
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
