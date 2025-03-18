<?php

  /**
  *   Generate variants of a word with 1-letter distance (Damerau-Levenshtein)
  *
  *   @example <cms:damelev_variants str='test' />
  *   @author @trendoman <tony.smirnov@gmail.com>
  *   @date   04.11.2022
  */

  $FUNCS->register_tag( 'damelev_variants', function($params, $node)
  {
      global $FUNCS, $CTX;
      extract( $FUNCS->get_named_vars(
                array(
                      'str'=>'',
                      'act'=>'rids',
                      'into'=>'',
                      'explain'=>'0'
                    ),
                $params)
           );

      $into = trim($into);
      $into = ( $FUNCS->is_variable_clean($into) ) ? $into : 'damelev_variants';
      $explain = ($explain == 1) ? 1 : 0;
      $variants = array();

      $str = str_replace( range(0, 9), '', trim($str) );
      $alphabet = range('a', 'z');
      $letters = str_split($str);
      $chr_cnt = strlen( $str );

      // deletions
      if( false !== stripos($act, 'd') ){
        foreach( $letters as $i => $l ){
          $tmpstr = substr_replace($str, '', $i, 1);
          $variants[] = $tmpstr . (($explain) ? " (deleted '$l')" : '');
        }
      }

      if( false !== stripos($act, 'i') ){
        // insertions
        foreach( $alphabet as $a ){
          for( $x=0; $x<$chr_cnt; $x++ ) {
            $tmpstr = substr( $str, 0, $x ) . $a . substr( $str, $x );
            $variants[] = $tmpstr . (($explain) ? " (inserted '$a' in pos $x)" : '');
          }
        }
      }

      if( false !== stripos($act, 'r') ){
        // replacements
        foreach( $letters as $i => $l ){
          foreach( $alphabet as $a ){
            if( $a === $l ) continue;
            $tmpstr = $str;
            $tmpstr[$i] = $a;
            $variants[] = $tmpstr . (($explain) ? " (replaced '$l' with '$a')" : '');
          }
        }
      }

      if( false !== stripos($act, 's') ){
        // swapping neighbors
        foreach( $letters as $i => $l ){
          $tmpstr = $str;
          $longstr = $str.$str;
          $tmpstr[$i] = $longstr[$i+1];
          if( $i+1 >= $chr_cnt ) $i=-1;
          $tmpstr[$i+1] = $longstr[$i];
          $variants[] = $tmpstr . (($explain) ? " (swapped '".$longstr[$i].$longstr[$i+1]."' --> '".$longstr[$i+1].$longstr[$i]."')" : '');
        }
      }

      return $CTX->set( $into, $variants );
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
