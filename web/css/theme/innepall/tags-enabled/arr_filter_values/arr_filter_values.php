<?php

   /**
   *   get only array values that contain a substring
   *
   *   @example <cms:arr_filter_values>
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   18.10.2022
   */

   $FUNCS->register_tag( 'arr_filter_values', function($params, $node)
   {
      global $FUNCS, $CTX;
      if( count($node->children) ) {die("ERROR: Tag \"".$node->name."\" is a self closing tag");}

      extract( $FUNCS->get_named_vars(
                  array( 'val'=>'',
                         'in'=>'',
                         'into'=>'',
                        ),
                  $params)
             );

      $into = trim($into);
      $matches = array_filter($in, function($item) use ($val) { return stripos( $item, $val ) !== false; });
      $matches = array_values($matches);

      return ( $into ) ? $CTX->set( $into, $matches ) : $FUNCS->json_encode($matches);
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
