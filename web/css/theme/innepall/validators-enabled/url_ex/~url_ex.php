<?php

    /**
    *   Validator for website link
    *
    *   @author @trendoman <tony.smirnov@gmail.com>
    *   @date   03.12.2022
    */

    function url_ex( $field ){

      // Pattern from http://mathiasbynens.be/demo/url-regex :: UPDATED

      $pattern = "%^(?:(?:https?|ftp)://)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]-*)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,}))\.?)(?::\d{2,5})?(?:[/?#]\S*)?$%iuS";

      $url = trim( $field->get_data() );

      if( strlen($url) ){

        if( !preg_match("~^(?:f|ht)tps?://~i", $url) ) $url = "http://" . $url;

        if( !preg_match($pattern, $url) ){
          error_log( "ERROR: Validator 'Website': Invalid URL: ".$url );
          return KFuncs::raise_error( "Invalid URL" );
        }

      }

    }

    /*
    // ~~~~~~~~~~~~~
    // Credits
    // ~~~~~~~~~~~~~
    // You should have downloaded this code from https://github.com/trendoman
    // ~~~~~~~~~~~~~
    // Support
    // ~~~~~~~~~~~~~
    // Write me at <anton.cms@ya.ru>, <tony.smirnov@gmail.com> "Anton S aka Trendoman"
    // Telegram: https://t.me/couchcms
    */
