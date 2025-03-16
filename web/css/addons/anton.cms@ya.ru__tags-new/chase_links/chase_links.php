<?php

    /**
    *   Performs network requests (XHR) as long as the requested page responds with another link.
    *
    *   @example <cms:chase_links k_template_link />
    *   @author @trendoman <tony.smirnov@gmail.com>
    *   @date   06.11.2022
    */

    $FUNCS->register_tag( 'chase_links', function($params, $node) {
      global $FUNCS, $CTX, $DB;

      extract( $FUNCS->get_named_vars(
                  array(
                      'base_link'=>'',
                      'debug'=>'',
                      'querystring'=>'',
                      'allow_recursion'=>'0',
                       ),
                  $params)
             );

      if( $allow_recursion != 1 ){
        if( !empty($_SERVER['HTTP_COUCHCMS_SELF_CALL_ONCE']) ){ return; } // no recurse
      }
      /* operate under lock to avoid simultaneous execution */
      $dblock_handle = 'lock__tag_' . $node->name . '_' . md5($node->ID);
      if( !$DB->is_free_lock($dblock_handle) ){ return; } // no free lock
      if( !$DB->get_lock($dblock_handle) ){ return; }
      register_shutdown_function(function() use ($DB, $dblock_handle) { $DB->release_lock( $dblock_handle ); });

      /* main thread works indefinitely */
      if( function_exists('set_time_limit') ){ set_time_limit(0); }

      $url = trim($base_link);
      $querystring = trim( $querystring );
      if( $querystring ){
        $sep = ( strpos($url, '?')===false ) ? '?' : '&';
        $url = $url . $sep . $querystring;
      }
      $FUNCS->dispatch_event( 'tag_add_querystring_executed', array(null, null, null, &$url) );

      $http_header = array();
      $http_header[] = "X-Requested-With: XMLHttpRequest";

      $referer = $CTX->get('k_page_link');
      $useragent = "CouchCMS ".$CTX->get('k_cms_version');
      $accept_cookie = 1;
      $send_cookie = 1;
      $mycookie = '';

      if( false !== strpos($url, K_SITE_URL) )
      {
         if( session_id() ) session_write_close(); /* Same-domain request - closing session, do not force commit */
         $DB->commit(0);
         if( $send_cookie ) {
            foreach( $_COOKIE as $k=>$v ){ if( is_array($k) === 0 ) $mycookie .= $k."=".$v."; "; }
         }
         $http_header[] = "CouchCMS-Self-Call-Once: true"; /* Protect from self-looping */
      }

      $total_time = 0;
      $safety = $count = 1;
      $errors = array();
      $can_loop = 1;

      if( extension_loaded('curl') ){

         $ch = curl_init();
         curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0 );
         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0 );
         curl_setopt($ch, CURLOPT_TIMEOUT, 20);
         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
         curl_setopt($ch, CURLOPT_AUTOREFERER, 1 );
         curl_setopt($ch, CURLOPT_MAXREDIRS, 3 );
         curl_setopt($ch, CURLOPT_REFERER, $referer);
         curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
         curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
         curl_setopt($ch, CURLOPT_COOKIE, $mycookie );

         if( $accept_cookie ){
             $cookie_file = $FUNCS->get_tmp_dir().'mycookies.txt';
             curl_setopt($ch, CURLOPT_COOKIESESSION, true);
             curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
         }
      }
      else {
         $opts = array();
         if( strpos($url, 'https')===0 ){
             $opts['ssl'] = array(
                 'verify_peer' => false,
                 'verify_host' => false,
                 'capture_peer_cert' => false,
             );
         }
         $opts['http']['header'] = implode("\r\n", $http_header) . "\r\nCookie: " . $mycookie;
         $opts['http']['ignore_errors'] = true;
         $context = stream_context_create( $opts );
      }

      while( $can_loop === 1 ){

        $can_loop = 0;
        $output = $status = NULL;
        $CTX->set('chase_link', $url);
        $CTX->set('chase_next', '');
        $CTX->set('chase_count', $count++);

        if( false !== filter_var( $url, FILTER_VALIDATE_URL ) ) {
          if( is_resource($ch) || is_object($ch) ){
            curl_setopt($ch, CURLOPT_URL, $url );
            $output = curl_exec($ch);
            $status = curl_getinfo($ch);

            $time = number_format( $status['total_time'], 3 );
            $total_time += $time;
            $CTX->set('chase_time', $time);
            $CTX->set('chase_total_time', $total_time);
          }
          elseif( is_resource($context) ){
            $time_start = k_get_time();
            $output = file_get_contents( $url, false, $context );
            $status = $http_response_header[0];

            $time = number_format( k_get_time() - $time_start, 3 );
            $total_time += $time;
            $CTX->set('chase_time', $time);
            $CTX->set('chase_total_time', $total_time);
          }
          else {
            $errors[] = 'ERROR: Tag "' . $node->name . '": Curl/Stream not started.';
          }

          if( $output && $status ){
            $CTX->set('chase_http_code', ( isset($status['http_code']) ? $status['http_code'] : substr($status, 9, 3) )) ;
            $CTX->set('chase_memory_mb', ( memory_get_usage(true) / 1024 / 1024 * 1.1 ) );
            $CTX->set('chase_response', $output);

            $rs = $FUNCS->json_decode( $output );
            if( !is_array($rs) ){
              $errors[] = 'ERROR: Tag "' . $node->name . '": Page must return valid JSON.';
            }
            else {
              if( isset($rs['message']) ){ $CTX->set( 'chase_message', is_array( $rs['message'] ) ? $FUNCS->json_encode( $rs['message'] ) : trim($rs['message']) ); }

              if( isset($rs['success']) && $rs['success'] ){
                if( isset($rs['continue']) && $rs['continue'] ){
                  if( isset($rs['chase_link']) && $rs['chase_link'] ){
                    $url = $rs['chase_link'];
                    $CTX->set('chase_next', $url);
                    $can_loop = 1;
                  }
                }
              }
              elseif( isset($rs['error']) && $rs['error'] ){
                $errors[] = is_array( $rs['error'] ) ? $FUNCS->json_encode( $rs['error'] ) : trim($rs['error']);
              }
              else {
                $errors[] = 'ERROR: Requested page must return valid JSON with "success" or "error".';
              }

            }
          }
          else {
            $errors[] = 'ERROR: Tag "' . $node->name . '": Could not perform request.';
          }
        }
        else {
          $errors[] = 'ERROR: Tag "' . $node->name . '": Invalid supplied URL: ' . $url;
        }

        if( $debug && $safety++ >= 3 ) $can_loop = 0;

        $CTX->set('chase_error', implode("\r\n", $errors) );
        $CTX->set('chase_done', !$can_loop);

        foreach( $node->children as $child ){
            $html .= $child->get_HTML();
        }

      } // end while

      if( is_resource($ch) || is_object($ch) ){
        curl_close($ch);
      }

      return $html;
    }, 1);

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
