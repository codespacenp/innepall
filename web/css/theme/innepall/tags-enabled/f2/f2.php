<?php

   /**
   *   Rename a file
   *
   *   @example <cms:f2 "log.txt" />
   *   @example <cms:f2 "log.txt.f2ed" "log.old.txt" />
   *   @example <cms:f2 "log.old.txt" null />
   *   @author @trendoman <tony.smirnov@gmail.com>
   *   @date   06.12.2022
   */

   namespace trendoman;

   if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

   class F2 {

      static function tag_rename_processor($params, $node)
      {
        if( !trim($params[0]['rhs'], '\ /') ) return;

        $oldname = K_SITE_DIR . str_replace( array(K_SITE_DIR, K_SITE_URL, "\\"), array('','','/'), trim($params[0]['rhs'], '\ /') );

        if( !file_exists($oldname) ) return;

        if( !isset($params[1]) )
        {
          $newname = "$oldname.f2ed";

          @rename($oldname, $newname);

          return;
        }

        if( '' == trim($params[1]['rhs'], '\ /') )
        {
          if( is_dir($oldname) )
          {
            @rmdir($oldname); // won't work if there are files inside
          }
          else
          {
            @unlink( $oldname );
          }

          return;
        }

        $newname = K_SITE_DIR . str_replace( array(K_SITE_DIR, K_SITE_URL, "\\"), array('','','/'), trim($params[1]['rhs'], '\ /') );

        if( !file_exists($newname) ) @rename($oldname, $newname);
      }

   }

   $FUNCS->register_tag( 'f2', array('\trendoman\F2', 'tag_rename_processor') );
   $FUNCS->register_tag( 'ren', array('\trendoman\F2', 'tag_rename_processor') );
   $FUNCS->register_tag( 'rename', array('\trendoman\F2', 'tag_rename_processor') );

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
