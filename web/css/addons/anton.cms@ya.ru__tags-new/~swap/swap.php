
<?php

   /**
   *   Replace strings in a text
   *
   *   @example <cms:swap val with is_regex=''>text</cms:swap>
   *   @example val: string|array, with: string|array, is_regex: 0|1
   *   @author Anto N aka @trendoman <tony.smirnov@gmail.com>
   *   @date   07.12.2022
   */

   $FUNCS->register_tag( 'swap', function($params, $node)
   {
      global $FUNCS, $CTX;

      extract( $FUNCS->get_named_vars(
                  array( 'val'=>'',
                         'with'=>'',
                         'is_regex'=>'0',
                        ),
                  $params)
             );

      $text = '';

      foreach( $node->children as $child ) { $text .= $child->get_html(); }

      $is_regex = ($is_regex == 1) ? 1 : 0;

      if( is_string($val) ){ $val = array( $val ); }

      if( !$is_regex )
      {
        if( is_string($val) && is_array($with) ) { $with = $with[0]; }

        return $html = trim(str_replace( $val, $with, $text )); // check uneven # of array elems
      }

      $html = $text;

      foreach( $val as $i=>$pattern )
      {
        $replacement = is_array($with) ? $with[$i] : $with;

        if( preg_match($pattern, '') === false )
        {
          die(
            "ERROR: Tag \"$node->name\" detected invalid regex: ".
            "Value: <strong>`<font color='red'>$pattern</font>`</strong> ".
            "was to be replaced with <strong>`<font color='green'>$replacement</font>`</strong>."
            );
        }

        $html = preg_replace( $pattern, $replacement, $html );
      }

      return trim($html);
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
