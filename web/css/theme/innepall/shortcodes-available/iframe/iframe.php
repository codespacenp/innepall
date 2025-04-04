<?php

   /**
   *   IFrame shortcode.
   *
   *   @example [iframe src="http://www.somesite.com/" width="100" height="100" scrolling="yes" frameborder="1" marginheight="2" allow=""]
   *   @example <cms:do_shortcodes><cms:show my_content /></cms:do_shortcodes>
   */

   $FUNCS->register_shortcode( 'iframe', function( $params, $content=null ) {
      global $FUNCS;

      extract( $FUNCS->get_named_vars(array(
         'src' => '',
         'width' => '100%',
         'height' => '500',
         'scrolling' => 'no',
         'frameborder' => '0',
         'marginheight' => '0',
         'allow' => ''
      ), $params) );

      $html =<<<EOS
      <iframe src="$src" title="" width="$width" height="$height" scrolling="$scrolling" frameborder="$frameborder" marginheight="$marginheight" allow="$allow">
      <a href="$src" target="_blank">$src</a>
      </iframe>
EOS;
      return $html;
   });
