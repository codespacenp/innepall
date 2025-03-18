<?php

   /**
   *   Hilite parts of phrase (with <b></b>)
   *
   *   @example <cms:hilite str='Nvidia' parts='i, ia' />
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   25.10.2022
   */

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   $FUNCS->register_tag( 'hilite', function($params, $node)
   {
      global $FUNCS;
      extract( $FUNCS->get_named_vars(
                array(
                      'str'=>'',
                      'parts'=>'',
                    ),
                $params)
           );

      $str = (string) $str;
      $parts = (string) $parts;
      if( trim($parts) === '' || trim($str) === '' ) return $str;
      $str1 = urlencode( mb_strtolower($str, 'UTF-8') );
      $str2 = urlencode( $str );

      $words = preg_split( '~[^\p{L}\p{N}\']+~u', preg_quote($parts, '/') );
      $words = array_filter($words, 'strlen');
      $protected_chars = $replacement_arr = array();
      // shorter kwds have less priority
      array_multisort(array_map('strlen', $words), SORT_DESC, $words);
      foreach( $words as $w ) {
        $offset = 0;
        $w = urlencode(mb_strtolower($w, K_CHARSET));
        while( false !== ($pos = strpos( $str1, $w, $offset )) ){
          $offset = $pos + strlen($w);
          for( $i=$pos; $i<$offset; $i++ ){
            if( false === isset($protected_chars[$i]) ){
              $protected_chars[$i] = $replacement_arr[$pos] = $w;
            }
          }
        }
      }
      krsort( $replacement_arr );
      foreach( $replacement_arr as $pos=>$kw){
        $klen = strlen($kw);
        $str2 = substr_replace( $str2, '<b>'.substr($str2,$pos,$klen).'</b>', $pos, $klen );
      }
      $str = str_replace( '</b><b>', '', $str2 );
      $str = urldecode( $str2 );

      return $str;
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
